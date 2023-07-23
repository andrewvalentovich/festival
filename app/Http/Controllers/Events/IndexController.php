<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;

class IndexController extends Controller
{
    /**
     * List events.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->paginate(10);

        return view('events.index', compact( 'events'));
    }

    /**
     * Show detail event.
     *
     * @param string $slug
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail(string $slug)
    {
        $event = Event::where('slug', $slug)->first();

        return view('events.detail', compact( 'event'));
    }
}