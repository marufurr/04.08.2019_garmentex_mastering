
@extends('layouts.directory.layout.master')
@section('title','contact-us')
@section('contact-us')




 <style>
        .nav_padding {
            padding-right: 20px;
        }
        
        .main_nav {
            color: white;
        }
        
        #margin {
            margin-right: 60px;
        }
        
        #navbarNav>ul>li>a:hover {
            background: #971732;
        }
        
        #dropdown_hover>a:hover {
            background: #971732;
        }
    </style>
    <!-- Header section end -->

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

            <br>
            <!-- content section -->
            <style>
                #list_hover>li:hover {
                    background: #e6ecf2;
                }
                
                #padding {
                    padding: 10px;
                }
                
                #list_hover .active_x {
                    background: #e6ecf2;
                }
            </style>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="sr-layout-block contact-block">

                            <h5><b>  <span>Contact Details</span></b></h5>
                            <br>

                            <div class="contact-info">
                                <div class="row">
                                    <span style="margin-left:15px;">Address/Office Address/Factory Address:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>
                                <div class="row">
                                    <span style="margin-left:15px;">Email:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                </div>
                                <div class="row">
                                    <span style="margin-left:15px;">Phone/Telephone Number:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="row">
                                    <span style="margin-left:15px;">Website:</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                

                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <h5 class="ml-3px"><b>Send your message to this supplier</b></h5>
                        <br>
                        <div class="container">
                            <div>

                                <div class="card">
                                    <div class="card-body">
                                        <form action="" method="">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label for="">From*</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="Enter Your Email address" id="FullName">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>To*</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" placeholder="To" id="FullName">
                                                </div>

                                            </div>
                                            <br>
                                            <div class="row">

                                                <label class="col-md-2">Message</label>
                                                <div class="col-md-10">
                                                    <textarea name="" id="" cols="" rows="" class="form-control" placeholder="We suggest you detail your product requirements and company information here." maxlength="4000" style="text-align:center;height: 147px;"></textarea>

                                                </div>
                                            </div>
                                            <p style="margin-left: 142px; margin-top: 5px;">Enter between 20 to 4,000 characters.</p>
                                            <br>
                                            <div class="row">
                                                <input type="button" value="Send" class="btn btn-xs btn-block btn-info" style="margin-left: 160px;">
                                                <!--   <p style="margin-top: 2px;"> This is not what you are looking for?</p> -->
                                            </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3">
                        <div>
                            <div class="card padding">
                                <div class="card-body">
                                    <span><b>Contact Supplier</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#exampleModal"><i class="far fa-address-card"></i></a></span>
                                    <br>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Business Card</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Scan the QR code or leave your email address, you'll take my contact card on your mobile phone!

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Modal -->

                                    <img src="images/customer.jpg" alt="img" style="margin-top:12px;width: 90px" ; height="80px"> Md.Marufur Rahman Chat with Supplier

                                </div>
                            </div>
                            <style>
                                #margin-top {
                                    margin-top: 5px;
                                }
                            </style>
                            <button type="button" id="margin-top" class="btn btn-xs btn-block btn-danger"><i class="fas fa-envelope"></i>&nbsp;&nbsp;Contact Now</button>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    </div>
    </div>

    <!-- end content section -->

    <!-- Main section end -->
    <style>
        #subscribe {
            @media(min-width: 576px) {
                float: right;
                margin-right: 150px;
                #inlineFormInputName {
                    margin-left: 46px;
                }
            }
        }
    </style>
    <!-- Footer section start -->
@endsection