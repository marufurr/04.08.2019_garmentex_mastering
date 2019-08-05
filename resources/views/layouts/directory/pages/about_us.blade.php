@extends('layouts.directory.layout.master')
@section('title','about')
@section('about-page')

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
                    <div class="col-xl-3">
                        <div class="card ">
                            <div id="myNavbar" class="card-body">
                                <span class="ml-3"><b>About Us</b></span>
                                <ul id="" class="navbar list-unstyled ">
                                    <li class="list-item active_x" id="padding"><a href="#">Company Profile</a></li>
                                    <li class="list-item" id="padding"><a id="" href="#tradecapacity">Trade Capacity</a></li>
                                    <li class="list-item" id="padding"><a href="#productioncapacity"> Production Capacity</a></li>
                                    <li class="list-item" id="padding"><a href="#companyshow">Company Show</a></li>
                                </ul>
                            </div>
                        </div>
                        <br>

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

                                    <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="margin-top:12px;width: 90px" ; height="80px"> Md.Marufur Rahman Chat with Supplier

                                 
                                </div>
                                <form action="">
                                    <textarea name="" id="" cols="39" rows="5" class="form-control" placeholder="Enter between 20 to 4,000 characters."></textarea>

                                    <p style="color: red;">Your inquiry content must be between 20 to 4000 characters.</p>
                                    <input type="email" name="email" class="form-control" placeholder="Your Email Address">
                                </form>
                            </div>

                        </div>
                    </div>
                    <br>

                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-xl-12">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid width" alt="banner_img" style="height: 240px;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid width" alt="banner_img" style="height: 240px;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('assets/modules/images/bg_banner_1.jpg')}}" class="d-block w-100 img-fluid width" alt="banner_img" style="height: 240px;">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                                </div>
                                &nbsp;

                              
                            </div>

                            <div class="col-xl-3">

                                <tbody>
                                    <tr>
                                        <td width="16">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span class="info-label-txt" style="color: #888;">Business Type:</span>
                                        </td>
                              
                                    </tr>
                                    <br>
                                    <tr>
                                        <td width="16">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <span class="info-label-txt" style="color: #888; line-height: 40px">Main Products:</span>
                                        </td>
                                    </tr>

                                    <br>
                                   
                            

                                    <tr>
                                        <td width="16">
                                            <i class="fa fa-check-square" aria-hidden="true"></i>
                                        </td>
                                        <td class="info-label-td">
                                            <span class="info-label-txt" style="color: #888; line-height: 40px">Year of Establishment:</span>
                                        </td>
                                       
                                    </tr>
                                    <br>

                                   

                            </tbody>
                        </div>
      
                        <br>
              <style>
              h5.font_bold.clr_black.mb-4.text-uppercase {
                 margin-left: 277px;
                }
             </style>
                   
<div class="container">

    <div class="row">
     <div class="col-xl-12">
            <h5 class="font_bold clr_black mb-4 text-uppercase"> About GarmentexBd</h5>
            <hr/>
            <p >Founded in 2019, Garmentexbd.com is a leading B2B e-commerce platform in Bangladesh developed and operated by Activex IT Ltd. It is a platform for being together with buyer, seller, manufacturer, supplier and visitors focusing on their product, offering concession, promotion, and other activities to attract their customers. Any Business entity can create a profile highlighting their Products, Latest Product with Price, Current Auction, Contact Details, Clients, Nominated Suppliers, Compliance Issues, Factory, Certification, Award, Management Team, and Career.<br/><br/>Each registered company can receive notifications to its provided e-mail address. Each registered firm can enjoy rating service in its own page created by the individual firm in the website. Buyers can quote about a product via Get Quotation, Send Inquiry, Send Private Messages and Comment options.<br/><br/>Garmentexbd provides a login or user panel to each individual company registered as its member, through which the user can edit or upload any information or image on his/her profile. All of their information and quotation are confidential and will be viewable only to them. This helps maintain confidentiality.<br/><br/>Every individual supplier will get unbelievable power to share and express his/her latest news, views, offers and any kind of Business activities. Buyers and Suppliers can contact each other through the updated and latest information details provided under each company’s profile. Foreign buyers have the opportunity to visit the factories listed as a member of Garmentexbd. web: <a href="garmentexbd.com" style="color: blue;">www.garmentexbd.com</a></p>
            <hr/>

            


          </div>

        
      
          </div>
                      <!-- end about -->

    
                        <div class="container-fluid">
                            <div id="tradecapacity">
                                <h5 class="ml-3px"><b>Trade Capacity</b></h5>
                                <br>

                                <div class="row">
                                    <span style="color: green;"> ✔ &nbsp; </span>Membership: &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Average Lead Time: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔ &nbsp; </span>Main Customers: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Export Year: &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Main Market: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>

                                

                            </div>
                            <br>
                            <div id="productioncapacity">
                                <h5 class="ml-3px"><b>Production Capacity</b></h5>
                                <br>

                                <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Factory Address: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔ &nbsp; </span>Production Line &nbsp;&nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="row">
                                    <span style="color: green;"> ✔ &nbsp; </span>No. of Staff: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>
                               
                                <div class="row">
                                    <span style="color: green;"> ✔ &nbsp; </span>R&D Capacity:&nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>

                                 <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Annual Output Value: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>
                                 <div class="row">
                                    <span style="color: green;"> ✔  &nbsp;</span>Ever Annual Output Of Main Products: &nbsp;&nbsp;&nbsp;&nbsp; 
                                </div>
                            </div>
                            <br>
                            <div id="companyshow">
                                <h5 class="ml-3px"><b>Company Show</b></h5>

                                <div class="row">
                                    <div class="col-xl-3 mt-3">
                                        <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="width: 190px" ; height="130px">
                                        <div class="customer_details pt-3">
                                            <p>Customer Visit</p>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 mt-3">
                                        <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="width: 190px" ; height="130px">
                                        <div class="customer_details pt-3">
                                            <p>Customer Visit</p>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 mt-3">
                                        <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="width: 190px" ; height="130px">
                                        <div class="customer_details pt-3">
                                            <p>Customer Visit</p>

                                        </div>
                                    </div>

                                    <div class="col-xl-3 mt-3">
                                        <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="width: 190px" ; height="130px">
                                        <div class="customer_details pt-3">
                                            <p>Customer Visit</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <h5 class="ml-3px"><b>Staff Activity</b></h5>

                            <div class="row">
                                <div class="col-xl-3 mt-3">
                                    <img src="{{asset('assets/modules/images/customer.jpg')}}" alt="img" style="width: 190px" ; height="130px">
                                    <div class="customer_details pt-3">
                                        <p>Customer Visit</p>

                                    </div>
                                </div>

                            </div>
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
                                                  
                                                </div>

                                        </div>

                                    </div>
                                </div>
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
    

@endsection
