<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>FoodAp</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/animate-css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/popup/magnific-popup.css') }}">
        <!-- main css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    </head>
    <body data-spy="scroll" data-target="#mapinNav" data-offset="70">

        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<a class="navbar-brand logo_h" href="{{ url('/') }}">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="#feature">FEATURES</a></li>
								<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="home_banner_area" id="home">
            <div class="banner_inner">
				<div class="container">
					<div class="row banner_content">
						<div class="col-lg-9">
							<h2>The best Food App <br />in Town</h2>
							<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women.</p>
							<a class="banner_btn" href="#">Explore Now</a>
						</div>
						<div class="col-lg-3">
							<div class="banner_map_img">
								<img class="img-fluid" src="img/banner/right-mobile.png" alt="">
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Feature Area =================-->
        <section class="feature_area p_120" id="feature">
        	<div class="container">
        		<div class="main_title">
        			<h2>Unique Features</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
        		</div>
        		<div class="feature_inner row">
        			<div class="col-lg-3 col-md-6">
        				<div class="feature_item">
        					<img src="img/icon/f-icon-1.png" alt="">
        					<h4>Maintenance</h4>
        					<p>inappropriate behavior is often laughed off as boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="feature_item">
        					<img src="img/icon/f-icon-1.png" alt="">
        					<h4>Maintenance</h4>
        					<p>inappropriate behavior is often laughed off as boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="feature_item">
        					<img src="img/icon/f-icon-1.png" alt="">
        					<h4>Maintenance</h4>
        					<p>inappropriate behavior is often laughed off as boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.</p>
        				</div>
        			</div>
        			<div class="col-lg-3 col-md-6">
        				<div class="feature_item">
        					<img src="img/icon/f-icon-1.png" alt="">
        					<h4>Maintenance</h4>
        					<p>inappropriate behavior is often laughed off as boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.</p>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->

        <!--================Interior Area =================-->
        <section class="interior_area">
        	<div class="container">
        		<div class="interior_inner row">
        			<div class="col-lg-6">
        				<img class="img-fluid" src="img/interior-1.png" alt="">
        			</div>
        			<div class="col-lg-5 offset-lg-1">
        				<div class="interior_text">
        					<h4>We Believe that Interior beautifies the Total Architecture</h4>
        					<p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed off.</p>
        					<a class="main_btn" href="#">See Details</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Interior Area =================-->

        <!--================Feature Area =================-->
        <section class="screenshot_area p_120" id="screen">
        	<div class="container">
        		<div class="main_title">
        			<h2>Unique Screenshots</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
        		</div>
        		<div class="screenshot_inner owl-carousel">
        			<div class="item">
        				<img src="img/feature/feature-1.jpg" alt="">
        			</div>
        			<div class="item">
        				<img src="img/feature/feature-2.jpg" alt="">
        			</div>
        			<div class="item">
        				<img src="img/feature/feature-3.jpg" alt="">
        			</div>
        			<div class="item">
        				<img src="img/feature/feature-4.jpg" alt="">
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Feature Area =================-->

        <!--================Testimonials Area =================-->
        <section class="testimonials_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Testimonials</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
        		</div>
        		<div class="testi_slider owl-carousel">
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-1.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>Alpha Olomi</h4>
									<h5>Creator, FoodApp</h5>
								</div>
							</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="testi_item">
							<div class="media">
								<div class="d-flex">
									<img src="img/testimonials/testi-2.png" alt="">
								</div>
								<div class="media-body">
									<p>Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware.</p>
									<h4>James Emmanuel</h4>
									<h5>User</h5>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Testimonials Area =================-->

        <!--================Download App Area =================-->
        <section class="download_app_area p_120">
        	<div class="container">
        		<div class="app_inner">
        			<h2>Download This App Today!</h2>
        			<p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the introduction of Virtual Game, it has been achieving great heights so far as its popularity and technological advancement are concerned.</p>
        			<div class="app_btn_area">

        				<div class="app_btn">
        					<div class="media">
								<div class="d-flex">
									<i class="fa fa-android" aria-hidden="true"></i>
								</div>
								<div class="media-body">
									<a href="#"><h4>Available</h4></a>
									<p>on Play Store</p>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Download App Area =================-->



        <!--================ start footer Area  =================-->
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                           <h6 class="footer_title">Top Products</h6>
                            <ul class="list">
                            	<li><a href="#">Github Project</a></li>
                            	<li><a href="#">App Project</a></li>
                            	<li><a href="#">API Documentation</a></li>
                            	<li><a href="#">Admin panel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-6">
                        <div class="single-footer-widget news_widgets">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>You can trust us. we only send promo offers, not a single spam.</p>
                            <div id="mc_embed_signup">
                                <form target="_blank" action="#" method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Your email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn">Get Started</button>
                                    </div>
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; {{ date('Y') }} All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
    </body>
</html>
