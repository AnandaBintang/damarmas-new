<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class ContactController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::select('portfolios.*', 'media.directory as media_directory', 'media.path as media_path')
            ->leftJoin('media', 'portfolios.path', '=', 'media.id')
            ->orderBy('portfolios.created_at', 'desc')
            ->take(6)
            ->get();

        return view('contact', compact('portfolios'));
    }
}
