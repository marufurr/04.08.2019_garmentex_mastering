   <footer class="pt-5 pb-5 mt-3 overflow_hidden text-white">
        <div class="container-fluid">
            <div class="subscribe mb-4">
                <p>Trade Alert-Delivering the latest product trends and industry news straight to your inbox.</p>
                <form class="form-inline mt-3">
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Your Email" style="width: 30%;margin-left: 35%">

                    <button type="submit" class="btn btn-danger mb-2" id="subscribe">subscribe</button>
                </form>
            </div>
            <div class="footer_content">
                <h4>Customer Services</h4>
                <ul class="mt-3 list-unstyled">
                    <li>
                        <a href="footer_pages/helpcenter.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Help Center
                        </a>
                    </li>
                    <li>
                        <a href="footer_pages/Contact Us.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="footer_pages/Report Abuse.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Report Abuse
                        </a>
                    </li>
                    <li>
                        <a href="{{route('terms_condition')}}">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Terms & conditions
                        </a>
                    </li>

                </ul>
            </div>
            <div class="footer_content">
                <h4>About Us</h4>
                <ul class="mt-3 list-unstyled">
                    <li>
                        <a href="{{route('about_us')}}">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> About us
                        </a>
                    </li>

                    <li>
                        <a href="footer_pages/Site Map.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Site Map
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer_content">
                <h4>Buy On Garmentex</h4>
                <ul class="mt-3 list-unstyled">
                    <li>
                        <a href="footer_pages/All Categories.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> All Categories
                        </a>
                    </li>
                    <li>
                        <a href="footer_pages/Request for Quotations.html">
                            <span><i class="fa fa-angle-right" aria-hidden="true"></i></span> Request for Quotations
                        </a>
                    </li>
                </ul>
            </div>

            <div class="footer_content">

                <ul class="mt-3 list-unstyled">
                    <h4>Follow Us :</h4>
                    <li>
                        <a href="#"><i class="fab fa-facebook"></i>&nbsp;&nbsp;</a>
                        <a href="#"><i class="fab fa-twitter"></i>&nbsp;&nbsp;</a>
                        <a href="#"><i class="fab fa-youtube"></i>&nbsp;&nbsp;</a>
                        <a href="#"><i class="fab fa-google"></i>&nbsp;&nbsp;</a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                    <a href="#">
                        <img src="{{asset('assets/modules/images/google1.png')}}" alt="" height="35px" width="110px">
                    </a>

                    <a href="#">
                        <img src="{{asset('assets/modules/images/google_play.png')}}" alt="" height="100px" width="110px">
                    </a>
                </ul>

            </div>
        </div>


        <button onclick="topFunction()" id="myBtn5" class="pull-right"><i class="fas fa-arrow-up"></i></button>

        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn5").style.display = "block";
                } else {
                    document.getElementById("myBtn5").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </footer>
    <p style="text-align: center; background: black;"> Reserved All Information Copyright © 2019 by <span><a href="http://activexitltd.com/"> <u style="color:white;"> <i class="fas fa-heart">  Activex IT </i></u></a></span> </p>
        <script src="https://kit.fontawesome.com/aaddd51471.js"></script>