@include('layouts.footer_partials.link.header')
  <!-- Header section start -->
  <header>
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">
          <img src="{{asset('assets/modules/images/logo.png')}}" alt="img" style="height: 50px; width: 120px;">
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Directory</a>
            </li>
            
               <li class="nav-item">
                  <a class="nav-link" href="sign-in/sign-in.html">
                Sing In
              </a>
               </li>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registration.html">Sign Up</a>
            </li>
            <style>
              #post{
                margin-right:50px;
              }
            </style>
            <li class="nav-item">
              <a class="nav-link" href="#" id="post">Add New Post</a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="search_header">
        <div class="row">
          <div class="col-xl-12">
            <div class="search_product">
              
            
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </header>
  <br/>