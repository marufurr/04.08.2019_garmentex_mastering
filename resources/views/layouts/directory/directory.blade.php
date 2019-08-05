@extends('layouts.directory.layout.master')
@section('directory')
<div class="container-fluid">
            <div id="carouselExampleControls" class="carousel slide mt-2" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/modules/images/bg_banner_2.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 450px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/modules/images/bg_banner_3.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 450px">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    
        <!-- For New Menu -->

        <br>
        <div class="container" id="border">
         
                <div class="row background">
                    <div class="col-xl-3 Garments">
                        <div class="nav-item">
                            <span class="nav-link">
                             <i class="fas fa-tshirt"></i>
                                <span class="nav-txt"><a href="">Garments</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
        <i class="fas fa-industry"></i>
        <span class="nav-txt"><a href="">Textile</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
       <i class="far fa-keyboard"></i>
        <span class="nav-txt"><a href="#">Accessories</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
        <i class="fas fa-hdd"></i>
        <span class="nav-txt"><a href="#">Machinaries</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
       <i class="fas fa-box-open"></i>
        <span class="nav-txt"><a href="#">Packaging &amp; Printing</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
        <i class="fas fa-atom"></i>
        <span class="nav-txt"><a href="#">Chemicals</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
        <i class="fas fa-user-md"></i>
        <span class="nav-txt"><a href="#">Job Vacancey</a></span>
                            </span>
                        </div>
                    </div>

                    <div class="col-xl-3 Garments">
                        <div class="nav-item J-scroll selected" cz-anchor="J-scroll-block-1">
                            <span class="nav-link">
        <i class="fas fa-gopuram"></i>
        <span class="nav-txt"><a href="#">Others</a></span>
                            </span>
                        </div>
                    </div>

                </div>
           
        </div>

        <style>
        @media (max-width: 575.98px) {
                #phn_responsive {
                    margin-bottom: 200px;
                    overflow: hidden;
                    display: block;
                }
            } 
                #border {
                margin-top: 25px;
                padding: 5px solid white;
                color: white;
                background: #355677;
                color: #555;
                font-size: 14px;
                background: #fff;
                display: block;
                padding-left: 5px;
                height: 28px;
                line-height: 18px;
                text-decoration: none;
                cursor: pointer;
                margin-bottom: 50px;
            }
            
    
            .Garments:hover {
                background: #e0dbdb;
              /*  color: white;*/
            }
        </style>
        <br>
        <!-- end -->
        <div class="browse_items mt-5">
            <div class="container-fluid">
                <h4 class="font_bold text-center" id="phn_responsive">Directory</h4>
                <div class="row mt-4">
                            <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                     <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                     <div class="col-xl-4">
                        <div class="browse_item border_1 rounded text-center">
                            <div class="browse_img overflow_hidden">
                                <img src="{{asset('assets/modules/images/browse_item_img.png')}}" alt="img" class="img-fluid">
                                <span class="browse_logo overflow_hidden rounded-circle d-block">
                     <a href="{{route('home-page')}}"> <img src="{{asset('assets/modules/images/browse_island.png')}}" alt="img" class="img-fluid"></a>
                    </span>
                            </div>
                            <div class="browse_content p-4">
                                <a href="{{route('home-page')}}" class="clr_grey font_s_20">Island</a>
                                <p>
                                    <img src="{{asset('assets/modules/images/mexico.jpg')}}" alt="img"> Germany , Abensberg</p>
                                <p class="font_bold font_s_12">LAND & PLOTS</p>
                                <div class="row mt-5">
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">POSTS</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">VIEWS</p>
                                        <p class="font_bold">1,490</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <p class="font_s_12 clr_grey">LIKES</p>
                                        <p class="font_bold">01</p>
                                    </div>
                                </div>
                                <div class="browse_social_icon mt-5">
                                    <ul class="list-unstyled">
                                        <li class="d-inline">
                                            <a href="#" title="Facebook"><i class="fa fa-facebook rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Twitter"><i class="fa fa-twitter rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Google Plus"><i class="fa fa-google-plus rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Youtube"><i class="fa fa-play rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                        <li class="d-inline">
                                            <a href="#" title="Link"><i class="fa fa-link rounded-circle text-white font_s_18" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
      </div>
        <div class="col-xl-6 offset-xl-3">
            <!-- Pagination Start -->
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                    <li class="page-item"><a class="page-link" href="#">10</a></li>
                    <li class="page-item"><a class="page-link" href="#">11</a></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    <li class="page-item"><a class="page-link" href="#">13</a></li>
                    <li class="page-item"><a class="page-link" href="#">14</a></li>

                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-xl-3"></div>
            <!-- Pagination End -->

<br><br>

@endsection