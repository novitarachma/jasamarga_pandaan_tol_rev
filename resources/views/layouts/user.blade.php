<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>PT Jasamarga Pandaan Tol</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo-jpt.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css'>
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.2/bootstrap-material-design.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">



    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('assets/css/slider.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    @yield('css')

    <style>
    nav {
        background-image: url("{{ asset('assets/img/putih-tekstur.jpg') }}");
    }
    </style>

</head>

<body>
    <header id="header" class="fixed-top">
        <nav id=" navbar" class="navbar">

            <h1 class="logo"><img src="assets/img/LogoJPT.png" alt="" class="img-fluid">
            </h1>
            <ul>
                <li><a class="nav-link scrollto" href="{{ route('home') }}">Home</a></li>
                <li><a class="nav-link scrollto" href="/about">About</a></li>
                <li><a class="nav-link scrollto" href="/service">Services</a></li>
                <li><a class="nav-link scrollto" href="{{ route('berita') }}">Berita</a>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('galeri') }}">Galeri</a>
                </li>
                <li><a class="nav-link scrollto" href="/contact">Contact</a></li>
                @hasanyrole('user')
                <li class="dropdown"><a href="#"><span>Dokumen </span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="{{ route('perusahaan') }}"><span>Dokumen
                                    Perusahaan</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li class="dropdown"><a href="#"><span>FINANCE</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>GA & Business
                                            Development</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}#">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>HR & Legal</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}#">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Pakta
                                                Integritas</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Maintenance</span> <i
                                            class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Toll Collection
                                            Management</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Instruksi
                                                Kerja</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#"><span>Traffic
                                            Management</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="{{ route('perusahaan') }}">Surat
                                                Keputusan Direksi</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Prosedur</a>
                                        </li>
                                        <li><a href="{{ route('perusahaan') }}">Instruksi
                                                Kerja</a></li>
                                        <li><a href="{{ route('perusahaan') }}">Formulir</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{ route('karyawan') }}"><span>Dokumen
                                    Karyawan</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ route('karyawan') }}">HC & GA</a></li>
                                <li><a href="{{ route('karyawan') }}">MAINTENANCE</a></li>
                                <li><a href="{{ route('karyawan') }}">FINANCE</a></li>
                                <li><a href="{{ route('karyawan') }}">TOLL COLLECTION
                                        MANAGEMENT</a></li>
                                <li><a href="{{ route('karyawan') }}">TRAFFIC MANAGEMENT</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endhasanyrole
                <li class="dropdown"><a href="#"><span>Profil Perusahaan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/visimisi">Visi, Misi dan Tata Nilai</a></li>
                        <li><a href="/struktur-organisasi">Struktur Organisasi</a></li>
                        <li><a href="/susunan-dewan-komisaris">Susunan Dewan Komisaris</a>
                        </li>
                        <li><a href="/susunan-direksi">Susunan Direksi</a></li>
                        <li><a href="/pustaka">Pustaka</a></li>
                        <li><a href="/link">Link</a></li>
                    </ul>
                </li>
                <!-- <a class="getstarted scrollto" href="#about">Get Started</a> -->
                <li>
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link scrollto" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="dropdown">
                            <a id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul>
                                <li><a href="{{route('profil')}}">Profil Anda</a></li>
                                
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </header>
    <main>
        @yield('content')
    </main>
    <div id="chat-circle" class="btn btn-raised">
        <div id="chat-overlay"></div>
        <i class="material-icons">speaker_phone</i>
    </div>

    <div class="chat-box">
        <div class="chat-box-header">
            ChatBox
            <span class="chat-box-toggle"><i class="material-icons">close</i></span>
        </div>
        <div class="chat-box-body">
            <div class="chat-box-overlay">
            </div>
            <div class="chat-logs">

            </div>
            <!--chat-log -->
        </div>
        <div class="chat-input">
            <form>
                <input type="text" id="chat-input" placeholder="Send a message..." />
                <button type="submit" class="chat-submit" id="chat-submit"><i class="material-icons">send</i></button>
            </form>
        </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3><img src="assets/img/LogoJPT.png" alt="" class="img-fluid"></h3>
                            <p>
                                Kali Tengah, Karang Jati, Kec. Pandaan,
                                Pasuruan, Jawa Timur 67156 <br>
                                <br>
                                <strong>Phone:</strong> (0343) 5650727<br>
                                <strong>Email:</strong> jasamarga.pandaantol@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">

                                <a href="https://www.facebook.com/official.jpt/" target="_blank" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/official.jpt/" target="_blank" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Jasa E-Tol</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Rescue</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Tentang Kami</h4>
                        <p>Terima Kasih sudah berkunjung</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>PT Jasamarga Pandaan Tol</span></strong>. <br>All Rights
                Reserved</br>
            </div>
            <div class="credits">
                Designed by <strong>IT PT Jasamarga Pandaan Tol</strong></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- <div>
        <input type="checkbox" id="check"> <label class="chat-btn" for="check">
            <i class="fa fa-commenting-o comment"></i> <i class="fa fa-close close">
            </i> </label>
        <div class="wrapper">
            <div class="header">
                <h6>Let's Chat - Online</h6>
            </div>
            <div class="text-center p-2"> <span>Please fill out the form to start chat!</span>
            </div>
            <div class="chat-form"> <input type="text" class="form-control" placeholder="Name">
                <input type="text" class="form-control" placeholder="Email">
                <textarea class="form-control" placeholder="Your Text Message">
        </textarea> <button class="btn btn-success btn-block">Submit</button>
            </div> -->

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/chatbox.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/tarif/choice.js"></script>
    <script src="assets/js/tarif/custom.js"></script>

    <script src="assets/js/tarif/flatpick.js"></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js'>
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/setprofile.js"></script>

    @yield('script')
</body>

</html>