<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Event;


class EventsController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get(['title', 'date', 'slug']);
        foreach ($events as $event) {
            $event->date = Date('d.m.Y', strtotime($event->date));
        }

        return json_encode($events, JSON_UNESCAPED_UNICODE);
    }
}
