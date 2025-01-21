<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product)
    {
        $product = Product::where('slug', $product)->orWhere('id', $product)->firstOrFail();
        $product->webname = str_replace(' ', '%20', $product->name);

        $productMedia = $product->media()->get()->map(function ($item) {
            return DB::table('media')->where('id', $item->path)->first();
        });

        return view('shop._entry', compact('product', 'productMedia'));
    }

    public function homepage()
    {
        $newestProducts = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->whereRaw('product_media.id IS NULL OR product_media.id = (
                    SELECT MIN(pm2.id)
                    FROM product_media pm2
                    WHERE pm2.product_id = products.id
                )')
            ->orderBy('products.created_at', 'desc')
            ->take(6)
            ->get();

        return view('homepage', compact('newestProducts'));
    }

    public function shop()
    {
        $rawProduct = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->whereRaw('product_media.id IS NULL OR product_media.id = (
                SELECT MIN(pm2.id)
                FROM product_media pm2
                WHERE pm2.product_id = products.id
            )')
            ->orderBy('products.created_at', 'desc');

        $allProducts = $rawProduct->paginate(12);

        $products = [
            'all' => $allProducts,
            'lighting' => $allProducts->filter(function ($item) {
                return $item->category_id == 1;
            }),
            'advertising' => $allProducts->filter(function ($item) {
                return $item->category_id == 2;
            }),
            'running-text' => $allProducts->filter(function ($item) {
                return $item->category_id == 3;
            }),
            'videotron' => $allProducts->filter(function ($item) {
                return $item->category_id == 4;
            }),
        ];

        return view('shop.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->get('keyword');

        $rawProduct = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->whereRaw('product_media.id IS NULL OR product_media.id = (
                SELECT MIN(pm2.id)
                FROM product_media pm2
                WHERE pm2.product_id = products.id
            )')
            ->where('products.name', 'like', "%$search%")
            ->where(function ($query) {
                $query->whereNotNull('media.path')
                    ->orWhereNull('product_media.path');
            })
            ->orderBy('products.created_at', 'desc');

        $allProducts = $rawProduct->paginate(12);

        $products = [
            'all' => $allProducts,
            'lighting' => $allProducts->filter(function ($item) {
                return $item->category_id == 1;
            }),
            'advertising' => $allProducts->filter(function ($item) {
                return $item->category_id == 2;
            }),
            'running-text' => $allProducts->filter(function ($item) {
                return $item->category_id == 3;
            }),
            'videotron' => $allProducts->filter(function ($item) {
                return $item->category_id == 4;
            }),
        ];

        return view('shop.index', compact('products'));
    }

    public function filterByPrice(Request $request)
    {
        $priceRange = $request->get('price');

        $rawProduct = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->whereRaw('product_media.id IS NULL OR product_media.id = (
            SELECT MIN(pm2.id)
            FROM product_media pm2
            WHERE pm2.product_id = products.id
        )')
            ->orderBy('products.created_at', 'desc');

        // Filter produk berdasarkan harga
        if ($priceRange == 'under_500k') {
            $rawProduct->where('products.price', '<', 500000);
        } elseif ($priceRange == '500k_1m') {
            $rawProduct->whereBetween('products.price', [500000, 1000000]);
        } elseif ($priceRange == '1m_1_5m') {
            $rawProduct->whereBetween('products.price', [1000000, 1500000]);
        } elseif ($priceRange == '1_5m_2m') {
            $rawProduct->whereBetween('products.price', [1500000, 2000000]);
        } elseif ($priceRange == 'above_2m') {
            $rawProduct->where('products.price', '>', 2000000);
        }

        $allProducts = $rawProduct->paginate(12);

        $products = [
            'all' => $allProducts,
            'lighting' => $allProducts->filter(function ($item) {
                return $item->category_id == 1;
            }),
            'advertising' => $allProducts->filter(function ($item) {
                return $item->category_id == 2;
            }),
            'running-text' => $allProducts->filter(function ($item) {
                return $item->category_id == 3;
            }),
            'videotron' => $allProducts->filter(function ($item) {
                return $item->category_id == 4;
            }),
        ];

        return view('shop.index', compact('products'));
    }
}
