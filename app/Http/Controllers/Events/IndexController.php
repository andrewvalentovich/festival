<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;

class IndexController extends Controller
{
    /**
     * List events.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = Event::where('date', ">", Carbon::today()->format('Y-m-d HH:ii:ss'))->orderBy('date', 'asc')->paginate(10);

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
