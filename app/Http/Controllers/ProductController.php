<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Portfolio;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($product)
    {
        $product = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->where('products.slug', $product)
            ->orWhere('products.id', $product)
            ->firstOrFail();
        $product->webname = str_replace(' ', '%20', $product->name);

        $productMedia = $product->media()->get()->map(function ($item) {
            return DB::table('media')->where('id', $item->path)->first();
        });

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('shop._entry', compact('product', 'productMedia', 'portfolios'));
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

        $categories = Category::select('categories.*', 'media.path as media_path')
            ->leftJoin('media', 'categories.cover_path', '=', 'media.id')
            ->orderBy('categories.created_at', 'desc')
            ->get();

        $categories = $categories->keyBy('name');

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('homepage', compact('newestProducts', 'categories', 'portfolios'));
    }

    public function shop()
    {
        $products = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->whereRaw('product_media.id IS NULL OR product_media.id = (
                SELECT MIN(pm2.id)
                FROM product_media pm2
                WHERE pm2.product_id = products.id
            )')
            ->orderBy('products.created_at', 'desc')
            ->paginate(12);

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('shop.index', compact('products', 'portfolios'));
    }

    public function showByCategory($category)
    {
        if ($category !== 'all') {
            $category = Category::where('slug', $category)->orWhere('id', $category)->firstOrFail();
        }

        $products = Product::select('products.*', 'media.path as media_path')
            ->leftJoin('product_media', 'products.id', '=', 'product_media.product_id')
            ->leftJoin('media', 'product_media.path', '=', 'media.id')
            ->when($category !== 'all', function ($query) use ($category) {
                return $query->where('products.category_id', $category->id);
            })
            ->leftJoin(
                DB::raw('(SELECT pm2.product_id, MIN(pm2.id) as min_id
                         FROM product_media pm2
                         GROUP BY pm2.product_id) as pm_subquery'),
                function ($join) {
                    $join->on('products.id', '=', 'pm_subquery.product_id')
                        ->on('product_media.id', '=', 'pm_subquery.min_id');
                }
            )
            ->orderBy('products.created_at', 'desc')
            ->paginate(12);

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('shop.index', compact('products', 'portfolios'));
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

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('shop.index', compact('products', 'portfolios'));
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

        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('shop.index', compact('products'), compact('portfolios'));
    }
}
