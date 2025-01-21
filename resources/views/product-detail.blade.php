@extends('layouts.app')

@section('content')
    <section class="breadcrumbs padding-small">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6 text-center">
                    <ul class="d-flex justify-content-center list-unstyled">
                        <li><a href="index.html">Beranda</a></li>
                        <li><span class="mx-2">&gt;</span></li>
                        <li><a href="shop.html">Toko</a></li>
                        <li><span class="mx-2">&gt;</span></li>
                        <li>Instalasi Videotron</li>
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
                            <img src="images/products/instalasi-videotron.png" alt="Product" class="main-image"
                                id="mainImage" />
                        </div>
                        <div class="thumbnails-container">
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 1"
                                    class="thumbnail active" loading="lazy" />
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 2" class="thumbnail"
                                    loading="lazy" />
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 3" class="thumbnail"
                                    loading="lazy" />
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 3" class="thumbnail"
                                    loading="lazy" />
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 3" class="thumbnail"
                                    loading="lazy" />
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="images/products/instalasi-videotron.png" alt="Thumbnail 3" class="thumbnail"
                                    loading="lazy" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-info">
                        <h1 class="product-title">Instalasi Videotron</h1>
                        <p class="product-price">Rp. 1.500.000</p>
                        <div class="product-description">
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Officiis iure sequi numquam, voluptatibus quae velit veritatis
                                voluptates accusantium minima! Ad culpa quisquam praesentium
                                officia ducimus distinctio consequatur consequuntur,
                                exercitationem fugiat inventore fugit nam repellat voluptatum
                                illum sapiente quam, debitis nobis consectetur laudantium et.
                                Aperiam repudiandae reprehenderit soluta hic rerum expedita.
                            </p>
                            <h3>Lorem, ipsum dolor.</h3>
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                            </ul>
                            <h3>Lorem, ipsum.</h3>
                            <ol>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                            </ol>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                Sequi, facilis officia tempore nostrum et provident inventore
                                similique cum aliquid rem, vero illum odit voluptates saepe?
                                Officiis quis velit minima minus.
                            </p>
                        </div>
                        <a href='https://api.whatsapp.com/send?phone=6281226090061&amp;text=Saya%20membutuhkan%20info%20lebih%20lanjut%20tentang%20barang%20"Instalasi%Videotron"%20yang%20ada%20di%20damarmas.co.id%20.%20Tolong%20dibantu%20ya!'
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
