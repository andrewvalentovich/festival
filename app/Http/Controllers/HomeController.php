<?php

namespace App\Http\Controllers;

use App\Models\Jury;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jury = Jury::all();
        return view('index', compact('jury'));
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
        return view('about');
    }

    public function gallery()
    {
        return view('about');
    }

    public function video()
    {
        return view('about');
    }

    public function partners()
    {
        return view('about');
    }

    public function archive()
    {
        return view('about');
    }

    public function events()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('about');
    }

    public function auth_abort()
    {
        return view('auth_abort');
    }
}
