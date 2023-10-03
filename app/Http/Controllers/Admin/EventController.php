<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Event\StoreRequest;
use App\Http\Requests\Admin\Event\UpdateRequest;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Изменяем дату-время, чтобы в базу пришло корректное значение
        // Получаем из формы "DD/MM/YYYY HH:mm:ss", преобразуем в "YYYY/MM/DD HH:mm:ss"
        if(isset($data['date'])) {
            $data['date'] = preg_replace('/^(\d{2})\/(\d{2})\/(\d{4})/','$3/$2/$1', $data['date']);
        }

        // Кладём картинку в Storage
        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }

        Event::create($data);

        return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     * @param Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Event $event
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Event $event)
    {
        $data = $request->validated();

        // Изменяем дату-время, чтобы в базу пришло корректное значение
        // Получаем из формы "DD/MM/YYYY HH:mm:ss", преобразуем в "YYYY/MM/DD HH:mm:ss"
        if(isset($data['date'])) {
            $data['date'] = preg_replace('/^(\d{2})\/(\d{2})\/(\d{4})/','$3/$2/$1', $data['date']);
        }

        // Кладём картинку в хранилище, если изменили её
        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }

        $event->update($data);

        return redirect()->route('admin.events.show', compact('event'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index');
    }
}
