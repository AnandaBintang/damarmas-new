@props(['product'])
<div class="product-item col-lg-4 col-md-6 col-sm-6">
    <a href="{{ route('product-detail', $product->slug) }}" class="image-holder">
        <img src="{{ $product->media_path ? asset('storage/' . $product->media_path) : 'https://placehold.co/400x500' }}"
            alt="{{ $product->name }}" class="product-image" />
    </a>
    <div class="product-detail">
        <h3 class="product-title">
            <a href="{{ route('product-detail', $product->slug) }}">{{ $product->name }}</a>
        </h3>
        {{ toRupiah($product->price) }}
    </div>
</div>
