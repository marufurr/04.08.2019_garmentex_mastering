@extends('layouts.directory.layout.master')
@section('title','home-page')
@section('home-page')

{{-- @include('layouts/directory/pages/css/style.css') --}}
{{-- <link rel="stylesheet" href="layouts/directory/pages/css/style.css"> --}}
    <!-- Header section end -->
    <style>
                .nav_padding {
            padding-right: 20px;
        }
        /*.sr-nav-title {
    display: block;
    padding: 0 30px;
    color: #fff;
    line-height: 40px;
    cursor: pointer;
}*/
        
        .main_nav {
            color: white;
        }
        
        #margin {
            margin-right: 60px;
        }
        
        #navbarNav>ul>li>a:hover {
            background: #971732;
            ;
        }
        
        #dropdown_hover>a:hover {
            background: #971732;
            ;
        }
    </style>
    <!-- Main section start -->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light mt-3" style="background: #e64545;
    font-size: 14px; width: 100%;">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav_padding" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active" id="margin">
                        <a class="nav-link" href="{{route('home-page')}}" style="color: white;">Home</a>
                    </li>

                    <li class="nav-item dropdown" id="margin">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                            <i class="fas fa-bars">&nbsp;&nbsp;</i>Products</a>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background: #e64545" id="dropdown_hover">
                            <a class="dropdown-item" href="#" style="color: white;">Garments</a>
                            <a class="dropdown-item" href="#" style="color: white;">Textiles</a>
                            <a class="dropdown-item" href="#" style="color: white;">Accessories</a>
                            <a class="dropdown-item" href="#" style="color: white;">Machinaries</a>
                            <a class="dropdown-item" href="#" style="color: white;">Packing & Printing</a>
                            <a class="dropdown-item" href="#" style="color: white;">Chemicals</a>
                            <a class="dropdown-item" href="#" style="color: white;">Job Vacancey</a>
                            <a class="dropdown-item" href="#" style="color: white;">Others</a>

                        </div>
                    </li>

                    </li>
                    <li class="nav-item" id="margin">
                        <a class="nav-link" href="{{route('about-page')}}" style="color: white;">About Us</a>
                    </li>
                    <li class="nav-item" id="margin">
                        <a class="nav-link" href="{{route('contact-us')}}" style="color: white;">Contact Us</a>
                    </li>

                </ul>
            </div>
        </nav>
        <div>
            <!-- start slider -->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 430px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 430px">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid" alt="banner_img" style="height: 430px">
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

            <!-- end slider -->
            <br>
            <!-- content section -->
            <style>
                #list_hover>li:hover {
                    background: #b5b0b0;
                }
                
                #padding {
                    padding: 10px;
                }
            </style>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5><span><b>Product Groups</b></span></h5>
                                <ul class="list-unstyled" id="list_hover">
                                    <li class="list-item" id="padding">Garments</li>
                                    <li class="list-item" id="padding">Textiles</li>
                                    <li class="list-item" id="padding">Accessories</li>
                                    <li class="list-item" id="padding">Machinaries</li>
                                    <li class="list-item" id="padding">Packing & Printing</li>
                                    <li class="list-item" id="padding">Chemicals</li>
                                    <li class="list-item" id="padding">Job Vacancey</li>
                                    <li class="list-item" id="padding">Others</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">

                        <div class="card">
                            <div class="card-body">
                                <!--- start Textile --->
                                <!--       <div class="recomanded_product pt-5">
        <h4 class="font_bold clr_black mb-4 text-uppercase">Textile</h4> -->
                                <div class="row">

                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xl-3">
                                        <a href="#" class="product_item border_1 bg-white p-3 d-block">
                                            <div class="product_img">
                                                <img src="{{asset('assets/modules/images/product_01.jpg')}}" alt="img" style="width: 175px" height="250px">
                                            </div>
                                            <div class="product_details pt-3">
                                                <p>Heavy Embroidery Designer Low Price Party Wear Indian Saree Manufacturer</p>
                                                <p><span class="font_bold">$17.50-$21.50</span> / Piece 10 Pieces (Min. Order)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <!--- end Textile --->
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <!-- end content section -->

@endsection