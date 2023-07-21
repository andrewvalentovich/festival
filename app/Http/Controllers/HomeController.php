<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Jury;
use App\Models\Partner;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jury = Jury::orderBy('id', 'desc')->get();

        return view('index', compact('jury'));
    }

    public function about()
    {
        return view('about');
    }

    public function jury()
    {
        $jury = Jury::orderBy('id', 'desc')->get();

        return view('jury', compact('jury'));
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
        $partners = Partner::orderBy('id', 'desc')->get();

        return view('partners', compact('partners'));
    }

    public function contacts()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();

        return view('contacts', compact('contacts'));
    }

    public function auth_abort()
    {
        return view('auth_abort');
    }
}
