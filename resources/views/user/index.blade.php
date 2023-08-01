@extends('bootstrap')

@section('title')
    Halaman Awal
@endsection

@section('body')
    <!-- basic -->
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    {{-- <link rel="icon" href="images/fevicon.png" type="image/gif"> --}}
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">


    <body>
        <!--header section start -->
        <div class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="logo"><a href="index.html">
                            <h1 class="text-white" style="font-weight: bold !important;">FrozenFresh!</h1>
                        </a></div><a href="index.html">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav"><a href="index.html">
                        </a>
                        <ul class="navbar-nav ml-auto"><a href="index.html">
                            </a>
                            <li class="nav-item active"><a href="index.html">
                                </a><a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="gallery.html">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="services.html">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--header section end -->
        <!-- banner section start -->
        <div class="banner_section layout_padding">
            <div class="container">
                <div id="main_slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital">
                                        <!-- <h1 class="outstanding_text">Kami Menyediakan</h1> -->
                                        <h1 class="coffee_text">Ikan Laut Fresh</h1>
                                        <p class="there_text">Kami menyediakan beberapa jenis ikan laut segar yang siap kami
                                            antar sampai ke rumah dengan harga yang murah</p>
                                        <div class="learnmore_bt"><a href="#">Order</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital">
                                        <!-- <h1 class="outstanding_text">Kami Siap Antar</h1> -->
                                        <h1 class="coffee_text">Kami Siap Antar</h1>
                                        <p class="there_text">Anda malas untuk ke pasar karena ramai? Tenang, kami siap
                                            mengantar pesanan anda sampai rumah</p>
                                        <div class="learnmore_bt"><a href="#">Order</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- banner section end -->
        <!-- about section start -->
        <div class="about_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="about_taital_main">
                            <div class="about_taital">Kenapa Harus Kami ?</div>
                            <p class="about_text">1. Kami menyediakan beberapa jenis ikan laut yang murah untuk dijadikan
                                makanan siap saji</p>
                            <p class="about_text">2. Frozen food kami dihasilkan dengan standar kualitas yang tinggi dan
                                menjalani proses pengawetan yang tepat. Ini memastikan bahwa makanan tetap segar, nutrisi
                                terjaga, dan rasa tetap optimal.</p>
                            <p class="about_text">3. Produk frozen kami sangat cocok bagi pelanggan yang memiliki jadwal
                                sibuk. Mereka dapat menikmati makanan berkualitas tanpa harus menghabiskan waktu lama untuk
                                persiapan atau membuang makanan yang tidak terpakai.</p>

                            <!-- <div class="read_bt"><a href="#">Read More</a></div> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about_img"><img src="images/ikan/4.jpeg"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about section end -->
        <!-- gallery section start -->
        <div class="gallery_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="gallery_taital">Jenis Ikan</h1>
                        <p class="gallery_text">Kami menyediakan beberapa jenis ikan laut yang beragam yang dapat dipilih
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="gallery_section_2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/1.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/2.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/3.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery_section_2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/4.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/5.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="overlay">
                                            <div class="text"><a href="#"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/6.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="overlay">
                                            <div class="text"><a href="#"><i class="fa fa-search"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gallery_section_2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/7.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/8.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="/images/ikan/9.jpeg" alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seemore_bt"><a href="#">See More</a></div>
            </div>
        </div>
        <!-- gallery section end -->
        <!-- services section start -->
        <div class="services_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="services_taital">Layanan Kami</h1>
                        <p class="services_text">Bagi kami, kenyamanan pelanggan adalah perihal penting bagi kami</p>
                    </div>
                </div>
                <div class="services_section_2">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12 col-md-4">
                            <div class="box_main active">
                                <!-- <div class="house_icon">
                                         <img src="images/icon1.png" class="image_1">
                                         <img src="images/icon1.png" class="image_2">
                                      </div> -->
                                <h3 class="decorate_text">Siap Antar</h3>
                                <p class="tation_text">Kami bisa membuat pesanan anda sampai tujuan</p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4">
                            <div class="box_main">
                                <!-- <div class="house_icon">
                                         <img src="images/icon2.png" class="image_1">
                                         <img src="images/icon2.png" class="image_2">
                                      </div> -->
                                <h3 class="decorate_text">Terpercaya</h3>
                                <p class="tation_text">Kami sudah memiliki lebih dari 100 pelanggan dalam 7 hari belakangan
                                </p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4">
                            <div class="box_main">
                                <!-- <div class="house_icon">
                                         <img src="images/icon3.png" class="image_1">
                                         <img src="images/icon3.png" class="image_2">
                                      </div> -->
                                <h3 class="decorate_text">Berkualitas</h3>
                                <p class="tation_text">Ikan yang kami jual adalah ikan yang masih segar </p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services section end -->
        <!-- testimonial section start -->
        <!-- <div class="client_section layout_padding">
                       <div class="container">
                          <div class="row">
                             <div class="col-sm-12">
                                <h1 class="client_taital">Testimonial</h1>
                                <p class="client_text">Eeven slightly believable. If you are going to use a passage of Lorem Ipsum, you need to</p>
                             </div>
                          </div>
                       </div>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <div class="client_section_2">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="testimonial_section_2">
                                          <h4 class="client_name_text">Monila <span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                                          <p class="customer_text">many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All themany variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some embarrassing hidden in the middle of text. All the</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <div class="client_section_2">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="testimonial_section_2">
                                          <h4 class="client_name_text">Monila <span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                                          <p class="customer_text">many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All themany variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some embarrassing hidden in the middle of text. All the</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          </div>
                        </div>
                        <div class="carousel-item">
                          <div class="client_section_2">
                              <div class="container">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="testimonial_section_2">
                                          <h4 class="client_name_text">Monila <span class="quick_icon"><img src="images/quick-icon.png"></span></h4>
                                          <p class="customer_text">many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All themany variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some embarrassing hidden in the middle of text. All the</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   </div> -->
        <!-- testimonial section end -->
        <!-- contact section start -->
        <div class="contact_section layout_padding">
            <div class="container">
                <h1 class="contact_text">Order Sekarang 👇 👇</h1>
            </div>
        </div>
        <div class="contact_section_2 layout_padding">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 padding_0">
                        <div class="mail_section">
                            <div class="email_text">
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="Nama" name="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="WhatsApp" name="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="email-bt" placeholder="No Telp" name="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="massage-bt" placeholder="Alamat Lengkap" rows="5" id="comment" name="Massage"></textarea>
                                </div>
                                <div class="send_btn">
                                    <div type="text" class="main_bt"><a href="#">Order</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 padding_0">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=-6.400942,107.410343"
                                style="border:0; width: 100%;" allowfullscreen="" width="600" height="508"
                                frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact section end -->
        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <h3 class="useful_text">About</h3>
                        <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h3 class="useful_text">Menu</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h1 class="useful_text">Useful Link</h1>
                        <p class="dummy_text">Adipiscing Elit, sed do Eiusmod Tempor incididunt </p>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <h1 class="useful_text">Contact Us</h1>
                        <div class="location_text">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><span
                                            class="padding_left_10">Address : Loram Ipusm</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_10">Call
                                            : +01 1234567890</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-envelope" aria-hidden="true"></i><span
                                            class="padding_left_10">Email : demo@gmail.com</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer section end -->
        <!-- copyright section start -->
        <div class="copyright_section">
            <div class="container">
                <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                        Templates</a></p>
            </div>
        </div>
        <!-- copyright section end -->
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/plugin.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
    @endsection
