@extends('layouts.app')

@section('content')
    <section class="site-banner jarallax min-height300 padding-large"
        style="background: url({{ asset('images/hero.png') }}) no-repeat">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Tentang Kami</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="index.html">Beranda /</a>
                        </span>
                        <span class="item">Tentang Kami</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="shipping-information" class="padding-large">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center justify-content-between">
                <div class="col-md-3 col-sm-6">
                    <div class="icon-box">
                        <i class="icon icon-truck"></i>
                        <h4 class="block-title">
                            <strong>Pelayanan Cepat</strong> 24 Jam
                        </h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-box">
                        <i class="icon icon-return"></i>
                        <h4 class="block-title"><strong>Harga</strong> Terjangkau</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-box">
                        <i class="icon icon-tags1"></i>
                        <h4 class="block-title"><strong>Banyak</strong> Diskon</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="icon-box">
                        <i class="icon icon-help_outline"></i>
                        <h4 class="block-title">
                            <strong>Ada Pertanyaan?</strong> Kami bersedia menjawab
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-us">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="image-holder">
                        <img src="images/hero.png" alt="single" class="about-image" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="detail">
                        <div class="display-header">
                            <h2 class="section-title">Bagaimana Damarmas Terbentuk?</h2>
                            <p>
                                Perusahaan ini didirikan sejak tahun 2019. Perusahaan ini
                                bergerak dibidang produk customize elektronik dan teknologi
                                Serta kemampuan instlalasi hingga reparasi alat elektronik.
                                <br />
                                PT. DAMARMAS NUSANTARA SEJAHTERA didirikan berdasar Akta
                                Notaris RIZKY AYU NATARIA EL CHIDTIAN, S.H.,M.Kn. pada tanggal
                                28 Agustus 2023
                            </p>
                            <div class="btn-wrap">
                                <a href="shop.html" class="btn btn-dark btn-medium d-flex align-items-center"
                                    tabindex="0">Lihat Toko Kami<i class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="padding-large">
        <div class="container">
            <div class="reviews-content">
                <div class="row d-flex flex-wrap">
                    <div class="col-md-2">
                        <div class="review-icon">
                            <i class="icon icon-right-quote"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="swiper testimonial-swiper overflow-hidden">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-detail">
                                        <p>
                                            "Damarmas Nusantara Sejahtera adalah perusahaan yang
                                            sangat baik dalam bidang elektronik dan teknologi. Saya
                                            sangat puas dengan pelayanan yang diberikan oleh
                                            perusahaan ini."
                                        </p>
                                        <div class="author-detail">
                                            <div class="name">By Bogi Putra</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-detail">
                                        <p>
                                            "Damarmas Nusantara Sejahtera adalah perusahaan yang
                                            sangat baik dalam bidang elektronik dan teknologi. Saya
                                            sangat puas dengan pelayanan yang diberikan oleh
                                            perusahaan ini."
                                        </p>
                                        <div class="author-detail">
                                            <div class="name">By Aldo</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-arrows">
                            <button class="prev-button">
                                <i class="icon icon-arrow-left"></i>
                            </button>
                            <button class="next-button">
                                <i class="icon icon-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
