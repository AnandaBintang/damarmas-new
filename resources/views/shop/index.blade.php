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
                            <a href="{{ route('homepage') }}">Home /</a>
                        </span>
                        <span class="item">Toko</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (request()->has('keyword'))
        <div class="container padding-medium no-padding-bottom">
            <div class="row">
                <div class="col-md-12">
                    <h2>Hasil Pencarian "{{ request()->keyword }}"</h2>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('shop') }}" class="btn btn-dark">Hapus Pencarian</a>
                </div>
            </div>
        </div>
    @endif

    @if (request()->has('price'))
        <div class="container padding-medium no-padding-bottom">
            <div class="row">
                <div class="col-md-12">
                    <h2>Produk dengan Harga
                        @if (request()->price == 'under_500k')
                            Dibawah Rp. 500.000
                        @elseif (request()->price == '500k_1m')
                            Rp. 500.000 - Rp. 1.000.000
                        @elseif (request()->price == '1m_1_5m')
                            Rp. 1.000.000 - Rp. 1.500.000
                        @elseif (request()->price == '1_5m_2m')
                            Rp. 1.500.000 - Rp. 2.000.000
                        @elseif (request()->price == 'above_2m')
                            Diatas Rp. 2.000.000
                        @endif
                    </h2>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('shop') }}" class="btn btn-dark">Hapus Filter</a>
                </div>
            </div>
        </div>
    @endif

    <div class="shopify-grid padding-medium no-padding-bottom">
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
                                    @foreach ($products['all'] as $item)
                                        <x-product-card :product="$item" />
                                    @endforeach
                                </div>
                            </div>
                            <div id="lighting" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    @foreach ($products['lighting'] as $item)
                                        <x-product-card :product="$item" />
                                    @endforeach
                                </div>
                            </div>
                            <div id="runningtext" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    @foreach ($products['running-text'] as $item)
                                        <x-product-card :product="$item" />
                                    @endforeach
                                </div>
                            </div>
                            <div id="videotron" data-tab-content>
                                <div class="row d-flex flex-wrap">
                                    @foreach ($products['videotron'] as $item)
                                        <x-product-card :product="$item" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
                            <div class="pagination loop-pagination d-flex justify-content-center">
                                @if ($products['all']->onFirstPage())
                                    <span class="pagination-arrow d-flex align-items-center disabled">
                                        <i class="icon icon-arrow-left"></i>
                                    </span>
                                @else
                                    <a href="{{ $products['all']->previousPageUrl() }}"
                                        class="pagination-arrow d-flex align-items-center">
                                        <i class="icon icon-arrow-left"></i>
                                    </a>
                                @endif
                                @foreach ($products['all']->getUrlRange(1, $products['all']->lastPage()) as $page => $url)
                                    @if ($page == $products['all']->currentPage())
                                        <span aria-current="page" class="page-numbers current">{{ $page }}</span>
                                    @else
                                        <a href="{{ $url }}" class="page-numbers">{{ $page }}</a>
                                    @endif
                                @endforeach
                                @if ($products['all']->hasMorePages())
                                    <a href="{{ $products['all']->nextPageUrl() }}"
                                        class="pagination-arrow d-flex align-items-center">
                                        <i class="icon icon-arrow-right"></i>
                                    </a>
                                @else
                                    <span class="pagination-arrow d-flex align-items-center disabled">
                                        <i class="icon icon-arrow-right"></i>
                                    </span>
                                @endif
                            </div>
                        </nav>
                    </div>
                </section>

                <aside class="col-md-3">
                    <div class="sidebar">
                        <div class="widgets widget-menu">
                            <div class="widget-search-bar">
                                <form role="search" method="get" action="{{ route('shop.search') }}" class="d-flex">
                                    <input class="search-field" placeholder="Search" type="text" name="keyword" />
                                    <button class="btn btn-dark" type="submit">
                                        <i class="icon icon-search"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                        <div class="widgets widget-price-filter">
                            <h5 class="widget-title">Range Harga</h5>
                            <ul class="product-tags sidebar-list list-unstyled">
                                <li class="tags-item">
                                    <a href="{{ route('shop.price', ['price' => 'under_500k']) }}">Dibawah Rp. 500.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="{{ route('shop.price', ['price' => '500k_1m']) }}">Rp. 500.000 - Rp.
                                        1.000.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="{{ route('shop.price', ['price' => '1m_1_5m']) }}">Rp. 1.000.000 - Rp.
                                        1.500.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="{{ route('shop.price', ['price' => '1_5m_2m']) }}">Rp. 1.500.000 - Rp.
                                        2.000.000</a>
                                </li>
                                <li class="tags-item">
                                    <a href="{{ route('shop.price', ['price' => 'above_2m']) }}">Diatas Rp. 2.000.000</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection
