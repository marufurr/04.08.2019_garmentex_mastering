@extends('layouts.master')



@section('after_styles')
	
    <link href="{{ asset('assets/modules/home/css/home.css') }}" rel="stylesheet">

@endsection

@section('search')
	@include('layouts.search')
@endsection


@section('left-sidebar')
	@include('layouts.left-sidebar')
@endsection

@section('tranding-products')
	@include('layouts.tranding-products')
@endsection

@section('advertainment')
	@include('layouts.advertainment')
@endsection

@section('garments')
	@include('layouts.garments')
@endsection


@section('textile')
	@include('layouts.textile')
@endsection

@section('accessories')
	@include('layouts.accessories')
@endsection

@section('machinaries')
	@include('layouts.machinaries')
@endsection

@section('packing and printing')
	@include('layouts.packing and printing')
@endsection

@section('chemical')
	@include('layouts.chemical')
@endsection

@section('job vacancey')
	@include('layouts.job vacancey')
@endsection


@section('other')
	@include('layouts.other')
@endsection

{{-- blog section --}}
@section('blog')
	@include('layouts.blog')
@endsection

{{-- event section --}}
@section('event')
	@include('layouts.event')
@endsection

@section('about_us')
	{{-- @include('layouts.about_us') --}}
	@include('layouts.footer_partials.about_us')
@endsection



@section('content')
	<div class="main-container" id="homepage">
		
		@if (Session::has('flash_notification'))
			@include('common.spacer')
			<?php $paddingTopExists = true; ?>
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						@include('flash::message')
					</div>
				</div>
			</div>
		@endif
			
		@if (isset($sections) and $sections->count() > 0)
			@foreach($sections as $section)
				@if (view()->exists($section->view))
					@include($section->view, ['firstSection' => $loop->first])
				@endif
			@endforeach
		@endif
		
	</div>
@endsection

@section('after_scripts')
<script src="https://kit.fontawesome.com/aaddd51471.js"></script>
@endsection
