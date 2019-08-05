<?php
/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: http://www.bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from Codecanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Observer;

use App\Models\Category;
use App\Models\Message;
use App\Models\Payment;
use App\Models\Picture;
use App\Models\Sourcing;
use App\Models\SourcingValue;
use App\Models\SavedSourcing;
use App\Models\Scopes\StrictActiveScope;
use App\Notifications\SourcingActivated;
use App\Notifications\SourcingReviewed;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SourcingObserver
{
	/**
	 * Listen to the Entry updating event.
	 *
	 * @param  Sourcing $sourcing
	 * @return void
	 */
	public function updating(Sourcing $sourcing)
	{
		// Get the original object values
		$original = $sourcing->getOriginal();
		
		if (config('settings.mail.confirmation') == 1) {
			try {
				// Sourcing Email address or Phone was not verified, and Sourcing was not approved (reviewed)
				if (($original['verified_email'] != 1 || $original['verified_phone'] != 1) && $original['reviewed'] != 1) {
					if (config('settings.single.sourcings_review_activation') == 1) {
						if ($sourcing->verified_email == 1 && $sourcing->verified_phone == 1) {
							if ($sourcing->reviewed == 1) {
								$sourcing->notify(new SourcingReviewed($sourcing));
							} else {
								$sourcing->notify(new SourcingActivated($sourcing));
							}
						}
					} else {
						if ($sourcing->verified_email == 1 && $sourcing->verified_phone == 1) {
							$sourcing->notify(new SourcingReviewed($sourcing));
						}
					}
				}
				
				// Sourcing Email address or Phone was not verified, and Sourcing was approved (reviewed)
				if (($original['verified_email'] != 1 || $original['verified_phone'] != 1) && $original['reviewed'] == 1) {
					if ($sourcing->verified_email == 1 && $sourcing->verified_phone == 1) {
						$sourcing->notify(new SourcingReviewed($sourcing));
					}
				}
			} catch (\Exception $e) {
				flash($e->getMessage())->error();
			}
		}
	}
	
	/**
	 * Listen to the Entry deleting event.
	 *
	 * @param  Sourcing $sourcing
	 * @return void
	 */
	public function deleting(Sourcing $sourcing)
	{
		// Delete all the Sourcing's Custom Fields Values
		$sourcingValues = SourcingValue::where('sourcing_id', $sourcing->id)->get();
		if ($sourcingValues->count() > 0) {
			foreach ($sourcingValues as $sourcingValue) {
				$sourcingValue->delete();
			}
		}
		
		// Delete all Messages
		$messages = Message::where('sourcing_id', $sourcing->id)->get();
		if ($messages->count() > 0) {
			foreach ($messages as $message) {
				$message->delete();
			}
		}
		
		// Delete all Saved Sourcings
		$savedSourcings = SavedSourcing::where('sourcing_id', $sourcing->id)->get();
		if ($savedSourcings->count() > 0) {
			foreach ($savedSourcings as $savedSourcing) {
				$savedSourcing->delete();
			}
		}
		
		// Delete all Pictures
		$pictures = Picture::where('sourcing_id', $sourcing->id)->get();
		if ($pictures->count() > 0) {
			foreach ($pictures as $picture) {
				$picture->delete();
			}
		}
		
		// Delete the Payment(s) of this Sourcing
		$payments = Payment::withoutGlobalScope(StrictActiveScope::class)->where('sourcing_id', $sourcing->id)->get();
		if ($payments->count() > 0) {
			foreach ($payments as $payment) {
				$payment->delete();
			}
		}
		
		// Check Reviews plugin
		if (config('plugins.reviews.installed')) {
			try {
				// Delete the reviews of this Sourcing
				$reviews = \App\Plugins\reviews\app\Models\Review::where('sourcing_id', $sourcing->id)->get();
				if ($reviews->count() > 0) {
					foreach ($reviews as $review) {
						$review->delete();
					}
				}
			} catch (\Exception $e) {
			}
		}
		
		// Remove the ad media folder
		if (!empty($sourcing->country_code) && !empty($sourcing->id)) {
			$directoryPath = 'files/' . strtolower($sourcing->country_code) . '/' . $sourcing->id;
			Storage::deleteDirectory($directoryPath);
		}
		
		// Removing Entries from the Cache
		$this->clearCache($sourcing);
	}
	
	/**
	 * Listen to the Entry saved event.
	 *
	 * @param  Sourcing $sourcing
	 * @return void
	 */
	public function saved(Sourcing $sourcing)
	{
		// Create a new email token if the sourcing's email is marked as unverified
		if ($sourcing->verified_email != 1) {
			if (empty($sourcing->email_token)) {
				$sourcing->email_token = md5(microtime() . mt_rand());
				$sourcing->save();
			}
		}
		
		// Create a new phone token if the sourcing's phone number is marked as unverified
		if ($sourcing->verified_phone != 1) {
			if (empty($sourcing->phone_token)) {
				$sourcing->phone_token = mt_rand(100000, 999999);
				$sourcing->save();
			}
		}
		
		// Removing Entries from the Cache
		$this->clearCache($sourcing);
	}
	
	/**
	 * Listen to the Entry deleted event.
	 *
	 * @param  Sourcing $sourcing
	 * @return void
	 */
	public function deleted(Sourcing $sourcing)
	{
		/*
		// Remove the ad media folder
		if (!empty($sourcing->country_code) && !empty($sourcing->id)) {
			$directoryPath = 'files/' . strtolower($sourcing->country_code) . '/' . $sourcing->id;
			Storage::deleteDirectory($directoryPath);
		}
		
		// Removing Entries from the Cache
		$this->clearCache($sourcing);
		*/
	}
	
	/**
	 * Removing the Entity's Entries from the Cache
	 *
	 * @param $sourcing
	 */
	private function clearCache($sourcing)
	{
		Cache::forget($sourcing->country_code . '.sitemaps.sourcings.xml');
		
		Cache::forget($sourcing->country_code . '.home.getSourcings.sponsored');
		Cache::forget($sourcing->country_code . '.home.getSourcings.latest');
		
		Cache::forget('sourcing.withoutGlobalScopes.with.city.pictures.' . $sourcing->id);
		Cache::forget('sourcing.with.city.pictures.' . $sourcing->id);
		
		Cache::forget('sourcing.withoutGlobalScopes.with.city.pictures.' . $sourcing->id . '.' . config('app.locale'));
		Cache::forget('sourcing.with.city.pictures.' . $sourcing->id . '.' . config('app.locale'));
		
		Cache::forget('sourcings.similar.category.' . $sourcing->category_id . '.sourcing.' . $sourcing->id);
		Cache::forget('sourcings.similar.city.' . $sourcing->city_id . '.sourcing.' . $sourcing->id);
	}
}
