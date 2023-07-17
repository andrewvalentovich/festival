<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Album\UpdateRequest;
use App\Http\Requests\Admin\Album\StoreRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Album::create($data);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('admin.albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Album $album)
    {
        $data = $request->validated();

        // Изменяем дату-время, чтобы в базу пришло корректное значение (*чилсо-месяц -> месяц-число)
        if(isset($data['created_at'])) {
            $data['created_at'] = preg_replace('/^(\d{2}\/)(\d{2}\/)/','$2$1', $data['created_at']);
        }

        $album->update($data);

        return redirect()->route('albums.show', compact('album'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        // Удаляем фотографии, принадлежащие данному альбому
        foreach ($album->photos() as $photo) {
            $photo->delete();
        }

        $album->delete();
        return redirect()->route('albums.index');
    }
}
