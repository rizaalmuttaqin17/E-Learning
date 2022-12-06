<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="{{ asset('assets-elearning/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/flaticon-two.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/flaticon-three.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/odometer.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/magnific-popup.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/nice-select.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets-elearning/css/responsive.css') }}">

        <title>UNU Kaltim</title>

        <link rel="icon" type="image/png" href="{{ asset('assets-elearning/img/logo/unu_kt.png') }}">
    </head>

    <body>

        <!-- Preloader Area -->
        <div class="preloader-area">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
        <!-- End Preloader Area -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="exto-responsive-nav">
                <div class="container">
                    <div class="exto-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('assets-elearning/img/logo/logo-elearning.png') }}" width="35" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="exto-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('assets-elearning/img/logo/logo-elearning.png') }}" alt="logo" width="200">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Perkuliahan
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="services.html" class="nav-link">Fakultas Farmasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="single-services.html" class="nav-link">Fakultas Ekonomi & Bisnis</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="single-services.html" class="nav-link">Fakultas Ilmu sosial & Keperawatan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="single-services.html" class="nav-link">Fakultas Teknik</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">Quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">About</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.html" class="nav-link">Contact</a>
                                </li>
                            </ul>
                            <div class="others-options startup-option">
                                <div class="language-list">
                                    <div class="select-box">
                                        <select>
                                            <option value="0">Ina</option>
                                            <option value="1">Eng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sidebar-menu" data-bs-toggle="modal" data-bs-target="#myModal2">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

        <!-- Start Sidebar Modal -->
		<div class="sidebar-modal">
			<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">
									<i class="fa fa-times"></i>
								</span>
							</button>
							<h2 class="modal-title" id="myModalLabel2">
								<a href="index.html">
									<img src="{{ asset('assets-elearning/img/logo/logo.png') }}" alt="Logo">
								</a>
							</h2>
						</div>
						<div class="modal-body">
							<div class="sidebar-modal-widget">
                                <h3 class="title">Welcome To Exto</h3>
                                <img src="{{ asset('assets-elearning/img/about.jpg') }}" alt="">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dolore saepe exercitationem alias unde, blanditiis non error</p>
							</div>
							<div class="sidebar-modal-widget">
								<h3 class="title">Contact Info</h3>
								<ul class="contact-info">
									<li>
										<i class="fa fa-map-marker"></i>
										Address
										<span>121 King St, VIC 3000, Australia</span>
									</li>
									<li>
										<i class="fa fa-phone"></i>
										Email
										<span>info@exto.com</span>
									</li>
									<li>
										<i class="fa fa-envelope"></i>
										Phone
										<span>098-123-23455</span>
                                    </li>
								</ul>
							</div>
							<div class="sidebar-modal-widget">
								<h3 class="title">Connect With Us</h3>
								<ul class="social-list">
									<li>
										<a href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-linkedin-in"></i>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- End Sidebar Modal -->

        <!-- Start Startup Home Area -->
        <div class="startup-home-area">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6 col-md-12">
								<div class="hero-content">
                                    <span><i class="far fa-dot-circle"></i> E-Learning UNU Kaltim</span>
									<h1>Achieve Your Goals With <b>Strong Mind</b></h1>
                                    <p>Kuliah jadi asik dengan e-learning yang dapat diakses dimana saja dan kapan saja</p>
                                    <div class="startup-btn">
                                        <a href="#" class="startup-btn-one">Belajar Sekarang</a>
                                    </div>
								</div>
                            </div>

                            <div class="col-lg-6 col-md-12">
								<div class="startup-image">
                                    <img src="{{ asset('assets-elearning/img/unu/main-bg.png') }}" class="wow fadeInUp " width="500" data-wow-delay="0.6s" alt="image">
                                </div>
                            </div>
                            <div class="startup-shape">
                                <img src="{{ asset('assets-elearning/img/startup-home/startup-shape.png') }}" alt="image">
                            </div>
						</div>
					</div>
				</div>
            </div>

            <div class="shape-img1">
                <img src="{{ asset('assets-elearning/img/shape/1.svg') }}" alt="image">
            </div>
            <div class="shape-img2">
                <img src="{{ asset('assets-elearning/img/shape/2.svg') }}" alt="image">
            </div>
            <div class="shape-img3">
                <img src="{{ asset('assets-elearning/img/shape/3.png') }}" alt="image">
            </div>
            <div class="shape-img4">
                <img src="{{ asset('assets-elearning/img/shape/4.png') }}" alt="image">
            </div>
            <div class="shape-img5">
                <img src="{{ asset('assets-elearning/img/shape/6.png') }}" alt="image">
            </div>
		</div>
        <!-- End Startup Home Area -->

        <!-- Start Partner Two Area -->
        <div class="partnar-two-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="success-area-content d-flex">
                            <img class="align-self-start" src="{{ asset('assets-elearning/img/icon/global.png') }}" alt="" width="80">
                            <div class="ps-3">
                                <h3>Akses Dimana Saja</h3>
                                <span>Nikmati perkuliahan yang dapat kamu akses dimana saja dan kapan saja</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="success-area-content d-flex">
                            <img class="align-self-start" src="{{ asset('assets-elearning/img/icon/global.png') }}" alt="" width="80">
                            <div class="ps-3">
                                <h3>Akses Dimana Saja</h3>
                                <span>Nikmati perkuliahan yang dapat kamu akses dimana saja dan kapan saja</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="success-area-content d-flex">
                            <img class="align-self-start" src="{{ asset('assets-elearning/img/icon/global.png') }}" alt="" width="80">
                            <div class="ps-3">
                                <h3>Akses Dimana Saja</h3>
                                <span>Nikmati perkuliahan yang dapat kamu akses dimana saja dan kapan saja</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Partner Two Area -->

        <!-- Start Blog Section -->
        <section class="blog-section startup-blog pt-100 pb-70">
            <div class="container">
                <div class="blog-title">
                    <h3>Solusi Terbaik Untuk Kuliah Secara Daring</h3>
                    <div class="blog-btn">
                        <a href="blog.html" class="blog-btn-one">Belajar Sekarang</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html">
                                        <h3>Teknologi Cair dan Semi Padat</h3>
                                    </a>
                                    <p>Lorem ipsum dolor sit amconsectetur adipiscing elit, sed do eiusmodor.</p>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="flaticon-user"></i>
                                            12 Materi
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>
                                        03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html">
                                        <h3>Teknologi Cair dan Semi Padat</h3>
                                    </a>
                                    <p>Lorem ipsum dolor sit amconsectetur adipiscing elit, sed do eiusmodor.</p>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="flaticon-user"></i>
                                            12 Materi
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>
                                        03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html">
                                        <h3>Teknologi Cair dan Semi Padat</h3>
                                    </a>
                                    <p>Lorem ipsum dolor sit amconsectetur adipiscing elit, sed do eiusmodor.</p>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="flaticon-user"></i>
                                            12 Materi
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>
                                        03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Section -->

        <!-- Start Counter Area -->
        <section class="counter-area bg-color">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-facts">
                            <h3>
                                <span class="odometer" data-count="10">00</span><span class="sign-icon"></span>
                            </h3>
                            <p>Program Studi</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-facts">
                            <h3>
                                <span class="odometer" data-count="300">00</span><span class="sign-icon">+</span>
                            </h3>
                            <p>Mahasiswa Aktif</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-facts">
                            <h3>
                                <span class="odometer" data-count="250">00</span><span class="sign-icon">+</span>
                            </h3>
                            <p>Mata Kuliah</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-fun-facts">
                            <h3>
                                <span class="odometer" data-count="1000">00</span><span class="sign-icon">+</span>
                            </h3>
                            <p>Materi Tersedia</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counter Area -->

        <!-- Start Blog Section -->
        <section class="blog-section startup-blog-2 pt-100 pb-70">
            <div class="container">
                <div class="blog-title-2">
                    <span>Events & Program</span>
                    <h3>Kami Mempermudah Proses Perkuliahan</h3>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item-2">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html">
                                        <h3>Quiz Ranking 1 Fiskep</h3>
                                    </a>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="flaticon-user"></i>
                                            Kampus 2 UNU Kaltim
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>
                                        03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item-2">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html"><h3>Quiz Ranking 1 Fiskep</h3></a>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html"><i class="flaticon-user"></i>Kampus 2 UNU Kaltim</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-item">
                            <div class="blog-image">
                                <a href="single-blog.html">
                                    <img src="{{ asset('assets-elearning/img/unu/solution.png') }}" alt="image">
                                </a>
                            </div>
                            <div class="single-blog-item-2">
                                <div class="blog-content">
                                    <span>Farmasi</span>
                                    <a href="single-blog.html">
                                        <h3>Quiz Ranking 1 Fiskep</h3>
                                    </a>
                                </div>
                                <ul class="blog-list">
                                    <li>
                                        <a href="single-blog.html">
                                            <i class="flaticon-user"></i>
                                            Kampus 2 UNU Kaltim
                                        </a>
                                    </li>
                                    <li>
                                        <i class="flaticon-appointment"></i>
                                        03 January 2022
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Section -->

        <!-- Start Footer Section -->
        <footer class="footer-section startup-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-area-content">
                            <img src="{{ asset('assets-elearning/img/logo/unu-footer.png') }}" alt="image">
                            <p>Jl. KH. Harun Nafsi Gg. Dharma, Kel. Rapak Dalam Kec. Loa Janan Ilir Samarinda</p>
                        </button>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Perkuliahan</h3>
                            <ul class="footer-quick-links">
                                <li>
                                    <a href="#">Fakultas Farmasi</a>
                                </li>
                                <li>
                                    <a href="#">Fakultas Ekonomi & Bisnis</a>
                                </li>
                                <li>
                                    <a href="#">Fakultas Ilmu Sosial & Kependidikan</a>
                                </li>
                                <li>
                                    <a href="#">Fakultas Teknik</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Explore Us</h3>
                            <ul class="footer-quick-links">
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Condition</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>Getting Touch</h3>
                            <ul class="footer-quick-links">
                                <li>
                                    <a href="#">unukaltim@gmail.com</a>
                                </li>
                                <li>
                                    <a href="#">+62 857 5041 7213</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <p>
                                Copyright © 2022 All Rights Reserved by UNU Kaltim
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <ul>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape shape-1">
                <img src="{{ asset('assets-elearning/img/shape/13.png') }}" alt="">
            </div>
            <div class="shape shape-2">
                <img src="{{ asset('assets-elearning/img/shape/14.png') }}" alt="">
            </div>
            <div class="shape shape-3">
                <img src="{{ asset('assets-elearning/img/shape/15.png') }}" alt="">
            </div>
            <div class="shape shape-4">
                <img src="{{ asset('assets-elearning/img/shape/16.png') }}" alt="">
            </div>
        </footer>
        <!-- End Footer Section -->

       <!-- Start Subscribe -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Subscribe Newsleter</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="startup-form">
                            <input type="email" class="input-newsletter" placeholder="Enter email adddress">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe -->

        <!-- Start Go Top Section -->
        <div class="go-top">
            <i class="fas fa-chevron-up"></i>
            <i class="fas fa-chevron-up"></i>
        </div>
        <!-- End Go Top Section -->

        <script src="{{ asset('assets-elearning/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/jquery.meanmenu.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/jquery.appear.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/odometer.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets-elearning/js/form-validator.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/jquery.ajaxchimp.min.js') }}"></script>
		<script src="{{ asset('assets-elearning/js/contact-form-script.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/particles.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/progressbar.min.js') }}"></script>
        <script src="{{ asset('assets-elearning/js/main.js') }}"></script>
    </body >
</html>
