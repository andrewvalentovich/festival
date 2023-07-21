<?php

namespace App\Http\Controllers\Galleries;

use App\Http\Controllers\Controller;
use App\Models\Album;

class IndexController extends Controller
{
    /**
     * List articles.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Album::orderBy('created_at', 'desc')->get();

        return view('galleries.index', compact( 'albums'));
    }

    /**
     * Show detail album.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(string $slug)
    {
        $album = Album::where('slug', $slug)->first();
        $photos = $album->photos;

        return view('galleries.detail', compact('album', 'photos'));
    }
}
