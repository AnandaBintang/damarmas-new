@extends('layouts.app')

@section('content')
    <section class="site-banner jarallax min-height300 padding-large"
        style="
        background: url({{ asset('images/hero.png') }}) no-repeat;
        background-position: top;
      ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">Toko</h1>
                    <div class="breadcrumbs">
                        <span class="item">
                            <a href="index.html">Home /</a>
                        </span>
                        <span class="item">Toko</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="shopify-grid padding-large no-padding-bottom">
        <div class="container">
            <div class="row">
                <section id="selling-products" class="col-md-9 product-store">
                    <div class="container">
                        <ul class="tabs list-unstyled">
                            <li data-tab-target="#all" class="active tab">Semua Produk</li>
                            <li data-tab-target="#videotron" class="tab">Videotron</li>
                            <li data-tab-target="#lighting" class="tab">Lighting</li>
                            <li data-tab-target="#advertising" class="tab">Advertising</li>
                            <li data-tab-target="#runningtext" class="tab">Running Text</li>
                        </ul>
                        <div class="tab-content">
                            <div id="all" data-tab-content class="active">
                                <div class="row d-flex flex-wrap">
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/instalasi-videotron.png" alt="Video Tron"
                                                class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="{{ route('product-detail') }}">Instalasi Videotron</a>
                                            </h3>
                                            <div class="item-price text-primary">Rp. 1.200.000</div>
                                        </div>
                                    </div>
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/neonbox.png" alt="Neon" class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="#">Neonbox</a>
                                            </h3>
                                            <span class="item-price text-primary">Rp. 520.000</span>
                                        </div>
                                    </div>
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/running-text.png" alt="Running Text"
                                                class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="#">Running Text</a>
                                            </h3>
                                            <span class="item-price text-primary">Rp. 240.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="lighting" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/neonbox.png" alt="Neon" class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="#">Neonbox</a>
                                            </h3>
                                            <span class="item-price text-primary">Rp. 520.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="runningtext" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/running-text.png" alt="Running Text"
                                                class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="#">Running Text</a>
                                            </h3>
                                            <span class="item-price text-primary">Rp. 240.000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="videotron" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                                        <a href="#" class="image-holder">
                                            <img src="images/products/instalasi-videotron.png" alt="Video Tron"
                                                class="product-image" />
                                        </a>
                                        <div class="product-detail">
                                            <h3 class="product-title">
                                                <a href="single-product.html">Instalasi Videotron</a>
                                            </h3>
                                            <div class="item-price text-primary">Rp. 1.200.000</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
                            <div class="pagination loop-pagination d-flex justify-content-center">
                                <a href="#" class="pagination-arrow d-flex align-items-center">
                                    <i class="icon icon-arrow-left"></i>
                                </a>
                                <span aria-current="page" class="page-numbers current">1</span>
                                <a class="page-numbers" href="#">2</a>
                                <a class="page-numbers" href="#">3</a>
                                <a href="#" class="pagination-arrow d-flex align-items-center">
                                    <i class="icon icon-arrow-right"></i>
                                </a>
                            </div>
                        </nav>
                    </div>
                </section>

                <aside class="col-md-3">
                    <div class="sidebar">
                        <div class="widgets widget-menu">
                            <div class="widget-search-bar">
                                <form role="search" method="get" class="d-flex">
                                    <input class="search-field" placeholder="Search" type="text" />
                                    <button class="btn btn-dark">
                                        <i class="icon icon-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="widgets widget-price-filter">
                            <h5 class="widget-title">Range Harga</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="">Dibawah Rp. 500.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Rp. 500.000 - Rp. 1.000.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Rp. 1.000.000 - Rp. 1.500.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Rp. 1.500.000 - Rp. 2.000.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="">Diatas Rp. 2.000.000</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
