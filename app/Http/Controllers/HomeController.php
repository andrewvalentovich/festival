<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Jury;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $articles;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jury = Jury::all();
        $articles = $this->articles;

        return view('index', compact('jury', 'articles'));
    }

    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function jury()
    {
        return view('jury');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function video()
    {
        return view('about');
    }

    public function partners()
    {
        return view('partners');
    }

    public function archive()
    {
        return view('about');
    }

    public function events()
    {
        return view('events.index');
    }

    public function events_detail()
    {
        return view('events.detail');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function auth_abort()
    {
        return view('auth_abort');
    }
}
