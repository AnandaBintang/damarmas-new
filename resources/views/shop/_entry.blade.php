@extends('layouts.app')
@section('content')
    <section class="breadcrumbs padding-small">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <ul class="d-flex justify-content-center list-unstyled">
                        <li><a href="{{ route('homepage') }}">Beranda</a></li>
                        <li><span class="mx-2">&gt;</span></li>
                        <li><a href="{{ route('shop') }}">Toko</a></li>
                        <li><span class="mx-2">&gt;</span></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="product-detail padding-large no-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-images">
                        <div class="main-image-container">
                            <div class="loading" id="loading"></div>
                            <img src="{{ asset('storage/' . $productMedia->first()->path) }}" alt="{{ $product->name }}"
                                class="main-image" id="mainImage" />
                        </div>
                        <div class="thumbnails-container">
                            @foreach ($productMedia as $index => $media)
                                <div class="thumbnail-wrapper">
                                    <img src="{{ asset('storage/' . $media->path) }}"
                                        alt="{{ $product->name }} {{ $index + 1 }}"
                                        class="thumbnail {{ $loop->first ? 'active' : '' }}" loading="lazy" />
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-info">
                        <h1 class="product-title">{{ $product->name }}</h1>
                        <p class="product-price">{{ toRupiah($product->price) }}</p>
                        <div class="product-description">
                            {!! $product->description !!}
                        </div>
                        <a href='https://api.whatsapp.com/send?phone=6281226090061&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20"{{ $product->webname }}"%20yang%20ada%20di%20https://damarmas.co.id%20.%20Tolong%20dibantu%20ya!'
                            class="btn btn-whatsapp btn-medium">
                            Pesan Item Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Zoomed View -->
        <div class="zoomed-view" id="zoomedView">
            <div class="zoomed-image-container">
                <img src="" alt="Zoomed Product" class="zoomed-image" id="zoomedImage" />
                <button class="close-zoom" id="closeZoom">×</button>
            </div>
        </div>
    </section>
@endsection
