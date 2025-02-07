<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Damarmas | VISUAL - AUDIO - LIGHTING - ADVERTISING MECHANICAL - ELECTRICAL
        - PLUMBING
    </title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/icomoon/icomoon.css') }}" />
    {{-- <link rel="icon" href="icon/favicon.ico" sizes="32x32" type="image/x-icon"> --}}
    <link rel="stylesheet" type="text/css" media="all"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <!-- script
    ================================================== -->
    <script src="{{ asset('plugins/modernizr.js') }}"></script>
</head>

<body>
    <div class="preloader-wrapper">
        <div class="preloader"></div>
    </div>

    <header id="header">
        <div id="header-wrap">
            <nav class="primary-nav padding-small">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 col-md-2">
                            <div class="main-logo">
                                <a href="{{ route('homepage') }}">
                                    <img src="{{ asset('images/logo.png') }}" width="auto" alt="logo" />
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10">
                            <div class="navbar">
                                <div id="main-nav" class="stellarnav d-flex justify-content-end right">
                                    <ul class="menu-list">
                                        <li>
                                            <a href="{{ route('homepage') }}"
                                                class="item-anchor {{ request()->is('/') ? 'active' : '' }}"
                                                data-effect="Home">Beranda</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('about') }}"
                                                class="item-anchor {{ request()->is('about') ? 'active' : '' }}"
                                                data-effect="About">Tentang
                                                Kami</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('shop') }}"
                                                class="item-anchor {{ request()->is('shop') ? 'active' : '' }}"
                                                data-effect="Shop">Toko</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('contact') }}"
                                                class="item-anchor {{ request()->is('contact' ? 'active' : '') }}"
                                                data-effect="Contact">Kontak</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <hr />

    <section id="instagram" class="padding-large">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Dokumentasi & Portofolio</h2>
            </div>
            <div class="row d-flex flex-wrap justify-content-between">
                @foreach ($portfolios as $item)
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <figure class="zoom-effect">
                            <img src="{{ asset('storage/' . $item->media_path) }}" alt="{{ $item->title }}"
                                class="insta-image" />
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="container padding-medium">
            <div class="footer-menu-list">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-menu">
                            <h5 class="widget-title">Damarmas</h5>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item">
                                    <a href="{{ route('about') }}">Tentang Kami</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('shop') }}">Toko</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#instagram">Dokumentasi & Portofolio</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('contact') }}">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="footer-menu">
                            <h5 class="widget-title">Hubungi Kami</h5>
                            <p>
                                Anda mempunyai pertanyaan? <br />
                                <a href="mailto:damarmas.corp@gmail.com" class="email">damarmas.corp@gmail.com</a>
                            </p>
                            <p>
                                <strong><a
                                        href="https://api.whatsapp.com/send?phone=6281226090061&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20yang%20ada%20di%20damarmas.co.id%20.%20Tolong%20dibantu%20ya!"
                                        target="_blank">+62 812 2609 0061</a></strong>
                            </p>
                            <p>
                                <strong><a
                                        href="https://api.whatsapp.com/send?phone=628113120999&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20yang%20ada%20di%20damarmas.co.id%20.%20Tolong%20dibantu%20ya!"
                                        target="_blank">+62 811 3120 999</a></strong>
                            </p>
                        </div>
                        <div class="social-links">
                            <ul class="d-flex list-unstyled">
                                <li>
                                    <a href="https://www.instagram.com/damarmas.ns/" target="_blank">
                                        <i class="icon icon-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </footer>

    <a href="https://api.whatsapp.com/send?phone=6281226090061&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20yang%20ada%20di%20damarmas.co.id%20.%20Tolong%20dibantu%20ya!"
        class="whatsapp-fab" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" />
    </a>

    <script src="{{ asset('plugins/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('plugins/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
