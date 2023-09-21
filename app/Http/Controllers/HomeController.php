<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\Contact;
use App\Models\Decree;
use App\Models\Document;
use App\Models\Event;
use App\Models\Jury;
use App\Models\JuryCategory;
use App\Models\Option;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $appeals = Appeal::orderBy('id', 'desc')->get();

        return view('index', compact('appeals'));
    }

    public function about()
    {
        $page = [];
        $options = Option::where('key', 'LIKE', '%about_%')->get();

        foreach ($options as $option) {
            $page[$option['key']] = $option['value'];
        }
        return view('about', compact('page'));
    }

    public function jury()
    {
        $jury = DB::select('select * from (select * from jury order by last_name desc) a order by category_id desc');
        $categories = JuryCategory::all();

        return view('jury', compact('jury', 'categories'));
    }

    public function video()
    {
        return view('video');
    }

    public function live()
    {
        return view('live');
    }

    public function decrees()
    {
        $decrees = Decree::orderBy('id', 'desc')->get();

        return view('decrees', compact('decrees'));
    }

    public function documents()
    {
        $documents = Document::orderBy('id', 'desc')->get();

        return view('documents', compact('documents'));
    }

    public function calendar()
    {
        return view('calendar');
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
