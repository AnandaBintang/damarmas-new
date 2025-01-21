<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
