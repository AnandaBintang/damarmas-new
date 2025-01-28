@props(['product'])

<div class="swiper-slide">
    <div class="product-item">
        <a href="{{ route('product-detail', $product->slug) }}" class="image-holder">
            <img src="{{ $product->media_path ? asset('storage/' . $product->media_path) : 'https://placehold.co/400x500' }}"
                alt="{{ $product->name }}" class="product-image" />
        </a>
        <div class="product-detail">
            <h3 class="product-title">
                <a href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a>
            </h3>
            <span class="item-price text-primary">{{ toRupiah($product->price) }}</span>
        </div>
    </div>
</div>
