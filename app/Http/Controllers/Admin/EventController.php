<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreRequest;
use App\Http\Requests\Event\UpdateRequest;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Изменяем дату-время, чтобы в базу пришло корректное значение
        // Получаем из формы "DD/MM/YYYY HH:mm:ss", преобразуем в "YYYY/MM/DD HH:mm:ss"
        if(isset($data['date'])) {
            $data['date'] = preg_replace('/^(\d{2})\/(\d{2})\/(\d{4})/','$3/$2/$1', $data['date']);
        }

        Event::create($data);

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Event $event)
    {
        $data = $request->validated();

        // Изменяем дату-время, чтобы в базу пришло корректное значение
        // Получаем из формы "DD/MM/YYYY HH:mm:ss", преобразуем в "YYYY/MM/DD HH:mm:ss"
        if(isset($data['date'])) {
            $data['date'] = preg_replace('/^(\d{2})\/(\d{2})\/(\d{4})/','$3/$2/$1', $data['date']);
        }

        $event->update($data);

        return redirect()->route('events.show', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
