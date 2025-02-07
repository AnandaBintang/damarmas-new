@extends('layouts.app')

@section('content')
    <section id="billboard" class="overflow-hidden">
        <button class="button-prev">
            <i class="icon icon-chevron-left"></i>
        </button>
        <button class="button-next">
            <i class="icon icon-chevron-right"></i>
        </button>
        <div class="swiper main-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"
                    style="
              background-image: url('{{ asset('images/hero.png') }}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
            ">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="banner-title">
                                        Damarmas <span>Nusantara</span>
                                    </h2>
                                    <p>
                                        Perusahaan ini bergerak dibidang produk kustomisasi
                                        elektronik dan teknologi Serta kemampuan instalasi hingga
                                        reparasi alat elektronik.
                                    </p>
                                    <div class="btn-wrap">
                                        <a href="{{ asset('pdf/catalog-profile.pdf') }}" target="_blank"
                                            class="btn btn-outline-light btn-medium d-flex align-items-center"
                                            tabindex="0">Klik Disini <i class="icon icon-arrow-io"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide"
                    style="
              background-image: url('{{ asset('images/hero-2.png') }}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
            ">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="banner-title">Visual <span>Display</span></h2>
                                    <p>
                                        Anda membutuhkan instalasi teknologi visual? Kami lah
                                        jawaban anda! Kami menyediakan berbagai brand dan produk
                                        visual display yang dapat menyesuaikan kebutuhan dan
                                        preferensi anda
                                    </p>
                                    <div class="btn-wrap">
                                        <a href="{{ route('shop') }}"
                                            class="btn btn-light btn-light-arrow btn-medium d-flex align-items-center"
                                            tabindex="0">Lihat Produk <i class="icon icon-arrow-io"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-products" class="product-store padding-large">
        <div class="container">
            <div class="section-header d-flex flex-wrap align-items-center justify-content-between">
                <h2 class="section-title">Produk Terbaru</h2>
                <div class="btn-wrap">
                    <a href="{{ route('shop') }}" class="d-flex align-items-center">Lihat Semua Produk <i
                            class="icon icon icon-arrow-io"></i></a>
                </div>
            </div>
            <div class="swiper product-swiper overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach ($newestProducts as $product)
                        <x-new-product-card :product="$product" />
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="shoppify-section-banner">
        <div class="container">
            <div class="product-collection">
                <div class="left-content collection-item">
                    <div class="products-thumb">
                        <img src="{{ $categories['Videotron']['media_path'] ? asset('storage/' . $categories['Videotron']['media_path']) : asset('storage/category/default/Videotron.png') }}"
                            alt="{{ $categories['Videotron']['name'] }}" class="large-image image-rounded" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
                        <div class="categories">Produk</div>
                        <h3 class="item-title">Videotron.</h3>
                        <p>
                            Damarmas menyediakan berbagai macam produk Videotron yang dapat
                            menyesuaikan kebutuhan dan preferensi anda.
                        </p>
                        <div class="btn-wrap">
                            <a href="{{ route('shop') }}" class="d-flex align-items-center">Lihat Produk <i
                                    class="icon icon-arrow-io"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="latest-collection">
        <div class="container">
            <div class="product-collection row">
                <div class="col-lg-7 col-md-12 left-content">
                    <div class="collection-item">
                        <div class="products-thumb">
                            <img src="{{ $categories['Lighting']['media_path'] ? asset('storage/' . $categories['Lighting']['media_path']) : asset('storage/category/default/Lighting.png') }}"
                                alt="{{ $categories['Lighting']['name'] }}" class="large-image image-rounded" />
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 product-entry">
                            <div class="categories">Produk</div>
                            <h3 class="item-title">Lighting.</h3>
                            <p>
                                Damarmas menyediakan berbagai macam produk lighting yang dapat
                                menyesuaikan kebutuhan dan preferensi anda.
                            </p>
                            <div class="btn-wrap">
                                <a href="{{ route('shop') }}" class="d-flex align-items-center">Lihat Produk <i
                                        class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 right-content flex-wrap">
                    <div class="collection-item top-item">
                        <div class="products-thumb">
                            <img src="{{ $categories['Advertising']['media_path'] ? asset('storage/' . $categories['Advertising']['media_path']) : asset('storage/category/default/Advertising.png') }}"
                                alt="{{ $categories['Advertising']['name'] }}" class="small-image image-rounded" />
                        </div>
                        <div class="col-md-6 product-entry">
                            <div class="categories">Layanan</div>
                            <h3 class="item-title">Advertising.</h3>
                            <div class="btn-wrap">
                                <a href="{{ route('shop') }}" class="d-flex align-items-center">Lihat Produk <i
                                        class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="collection-item bottom-item">
                        <div class="products-thumb">
                            <img src="{{ $categories['Running Text']['media_path'] ? asset('storage/' . $categories['Running Text']['media_path']) : asset('storage/category/default/Runningtextt.png') }}"
                                alt="{{ $categories['Running Text']['name'] }}" class="small-image image-rounded" />
                        </div>
                        <div class="col-md-6 product-entry">
                            <div class="categories">Produk</div>
                            <h3 class="item-title">Running Text.</h3>
                            <div class="btn-wrap">
                                <a href="{{ route('shop') }}" class="d-flex align-items-center">Lihat Produk <i
                                        class="icon icon-arrow-io"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
