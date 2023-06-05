<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Penilaian Kinerja Karyawan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{!! asset('img/favicon.png') !!}" rel="icon"> --}}
    <link href="{!! asset('img/apple-touch-icon.png') !!}" rel="apple-touch-icon">
    <link href="{!! asset('img/dokumen.png') !!}" rel="shortcut icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{!! asset('vendor/aos/aos.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/bootstrap-icons/bootstrap-icons.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/boxicons/css/boxicons.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/glightbox/css/glightbox.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/remixicon/remixicon.css') !!}" rel="stylesheet">
    <link href="{!! asset('vendor/swiper/swiper-bundle.min.css') !!}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="">E-Kinerja</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="{!! asset('img/logo.png') !!}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    @auth
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        {{-- @can('admin') --}}
                        <li><a class="nav-link scrollto" href="#kriteria">Kriteria</a></li>
                        {{-- @endcan --}}
                        <li><a class="nav-link scrollto" href="#kuisioner">Kuisioner</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Welcome back, {{ auth()->user()->username }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" style="font-size: 15px;" href="/profile">Profile<i
                                            class="bi bi-person-fill"></i></a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#kriteria">Kriteria</a></li>
                        <li><a class="nav-link scrollto" href="#kuisioner">Kuisioner</a></li>
                        <li><a class="getstarted scrollto" href="/login">Login</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div></div>
    <div>
        @yield('container')
    </div>

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 mx-auto footer-contact">
                        <h3>MONSTER SOLO</h3>
                        <p>
                            Perum Griya Edelweis no. F.10 <br>
                            Dusun V, Joho, Kec. Mojolaban <br>
                            Kab. Sukoharjo, Jawa Tengah 57554 <br><br>
                            <strong>Phone:</strong> +62 21225 62887<br>
                            <strong>Email:</strong> info@monstergroup.co.id<br>
                            <strong>Website:</strong><a href="https://monstergroup.co.id/">
                                https://monstergroup.co.id/</a><br>
                        </p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#home">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#kriteria">Kriteria</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#kuisioner">Kuisioner</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 ms-auto footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Anda bisa menghubungi kami melaului sosial media yang tertera dibawah ini</p>
                        <div class="social-links mt-3">
                            <a href="" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix text-center">
            <div class="copyright ">
                &copy; Copyright <strong><span>Harjuno Setyawan</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{!! asset('vendor/aos/aos.js') !!}"></script>
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('vendor/glightbox/js/glightbox.min.js') !!}"></script>
    <script src="{!! asset('vendor/isotope-layout/isotope.pkgd.min.js') !!}"></script>
    <script src="{!! asset('vendor/swiper/swiper-bundle.min.js') !!}"></script>
    <script src="{!! asset('vendor/waypoints/noframework.waypoints.js') !!}"></script>
    <script src="{!! asset('vendor/php-email-form/validate.js') !!}"></script>

    <!-- Template Main JS File -->
    <script src="{!! asset('js/main.js') !!}"></script>

</body>

</html>
