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
                    <div class="logo mt-1"><a href="index.html">
                            <h1 class="text-white" style="font-weight: bold !important;">E-Lapor</h1>
                        </a></div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav"><a href="index.html">
                        </a>
                        <ul class="navbar-nav ml-auto"><a href="index.html">
                            </a>
                            <li class="nav-item"><a href="index.html">
                                </a><a class="nav-link" href="{{route('register')}}">Daftar</a>
                            </li>
                            <li class="nav-item"><a href="index.html">
                                </a><a class="nav-link" href="{{route('login')}}">Masuk</a>
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
                                        <h1 class="coffee_text">Laporan Layanan</h1>
                                        <p class="there_text">Website ini digunakan untuk digunakan masyarakat guna melapor
                                            fasilitas pemerintah </p>
                                        <div class="learnmore_bt"><a href="#">Panduan</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="banner_taital">
                                        <!-- <h1 class="outstanding_text">Kami Siap Antar</h1> -->
                                        <h1 class="coffee_text">Kenyamanan Masyarakat</h1>
                                        <p class="there_text">Kami memberikan kenyamanan masyarakat dalam menggunakan
                                            fasilitas pemerintah. Masyarakat diperbolehkan untuk melapor fasilitas
                                            pemerintah yang rusak</p>
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
                            <p class="about_text" align="justify">1. Tanggung Jawab Kewarganegaraan: Melaporkan fasilitas
                                pemerintah yang rusak merupakan tanggung jawab setiap warga negara untuk menjaga dan
                                memelihara lingkungan sekitarnya. Dengan melaporkan, Anda turut berkontribusi dalam menjaga
                                keindahan dan kenyamanan lingkungan tempat tinggal.</p>
                            <p class="about_text" align="justify">2. Keselamatan Masyarakat: Fasilitas pemerintah yang
                                rusak dapat menimbulkan bahaya bagi masyarakat. Misalnya, trotoar yang rusak dapat
                                menyebabkan kecelakaan bagi pejalan kaki, jalan berlubang dapat menyebabkan kecelakaan lalu
                                lintas, atau taman yang tidak terawat dapat menjadi tempat berkumpulnya binatang berbahaya
                                atau lingkungan yang tidak aman.</p>
                            <p class="about_text" align="justify">3. Meningkatkan Kualitas Hidup: Fasilitas publik yang
                                berfungsi dengan baik meningkatkan kualitas hidup penduduknya. Dengan melaporkan fasilitas
                                yang rusak, Anda berperan dalam meningkatkan kualitas infrastruktur dan pelayanan publik,
                                sehingga semua orang bisa menikmati fasilitas tersebut dengan lebih nyaman.</p>

                            <!-- <div class="read_bt"><a href="#">Read More</a></div> -->
                        </div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center justify-content-end">
                        <div class="about_img"><img
                                src="https://1.bp.blogspot.com/-l0J3DXYO5FI/V_oM2yQjxhI/AAAAAAAADw4/XmXsFlewJbIrHCZQut70BxO_D4eIrosTgCPcB/s1600/Kabupaten%2BKarawang.png">
                        </div>
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
                        <h1 class="gallery_taital">Laporan Yang Sudah Ditanggapi</h1>
                        <p class="gallery_text">Kami bertanggung jawab untuk membangun kenyamanan dan keselamatan
                            masyarakat. Maka dari itu, dibawah ini adalah beberapa fasilitas pemerintah yang sudah kami
                            tanggapi dari laporan masyarakat</p>
                    </div>
                </div>
                <div class="">
                    <div class="gallery_section_2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="https://awsimages.detik.net.id/community/media/visual/2023/05/08/10-km-jalan-kali-cbl-rusak-parah-dan-bahayakan-pengendara.jpeg?w=1200"
                                        alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="https://awsimages.detik.net.id/visual/2020/07/15/ilustrasi-jalan-rusak-cnbc-indonesiamuhammad-sabki-1_169.jpeg?w=1200"
                                        alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="https://asset.kompas.com/crops/vJa7BVjP8fHZezNrItOWUTCV4HQ=/0x0:0x0/750x500/data/photo/2023/03/09/6409b6e75c86d.jpg"
                                        alt="Avatar" class="image">
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
                                    <img src="https://www.nativeindonesia.com/foto/alun-alun-karawang/alun-alun-karawang.jpg"
                                        alt="Avatar" class="image">
                                    <div class="overlay">
                                        <div class="text"><a href="#"><i class="fa fa-search"
                                                    aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="container_main">
                                    <img src="https://promoliburan.com/userfiles/uploads/idn-alun-9a7f26d93eacd1ab8c93231d1c9ebbe9600x400.jpg"
                                        alt="Avatar" class="image">
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
                                    <img src="https://cdn.antaranews.com/cache/800x533/2018/01/Tempat_sampah.jpg"
                                        alt="Avatar" class="image">
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
                        <p class="services_text">Bagi kami, kenyamanan masyarakat adalah perihal penting bagi kami</p>
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
                                <h3 class="decorate_text">Menanggapi Secepatnya</h3>
                                <p class="tation_text">Kami akan menanggapi laporan dari masyarakt secepatnya</p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4">
                            <div class="box_main">
                                <!-- <div class="house_icon">
                                                                                                         <img src="images/icon2.png" class="image_1">
                                                                                                         <img src="images/icon2.png" class="image_2">
                                                                                                      </div> -->
                                <h3 class="decorate_text">Perbaikan Fasilitas</h3>
                                <p class="tation_text">Kami akan memperbaiki fasilitas yang rusak berdasarkan laporan yang
                                    masuk dari masyrakat</p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 col-md-4">
                            <div class="box_main">
                                <!-- <div class="house_icon">
                                                                                                         <img src="images/icon3.png" class="image_1">
                                                                                                         <img src="images/icon3.png" class="image_2">
                                                                                                      </div> -->
                                <h3 class="decorate_text">Rekomendasi Fasilitas</h3>
                                <p class="tation_text">Kami menerima rekomendasi fasilitas dari masyarakat</p>
                                <div class="readmore_bt"><a href="#">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=-6.400942,107.410343"
                style="border:0; width: 100%;" allowfullscreen="" width="600" height="508"
                frameborder="0"></iframe>
        </div>

        <!-- footer section start -->
        <div class="footer_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <h3 class="useful_text">About</h3>
                        <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <h3 class="useful_text">Menu</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">Kenapa Kami</a></li>
                                <li><a href="gallery.html">Laporan Ditanggapi</a></li>
                                <li><a href="services.html">Layanan</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <h1 class="useful_text">Contact Us</h1>
                        <div class="location_text">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i><span
                                            class="padding_left_10">Address : Kab. Karawang, Jawa Barat </span>
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
