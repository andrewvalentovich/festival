<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Photo\StoreRequest;
use App\Http\Requests\Admin\Photo\UpdateRequest;
use App\Models\Album;
use App\Models\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Album $album)
    {
        $photos = $album->photos()->get();

        return view('admin.photos.index', compact('album', 'photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Album $album)
    {
        return view('admin.photos.create', compact('album'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request, Album $album)
    {
        $data = $request->validated();

        // Создание превью
        // Сохранение картинки и превью_картинки в хранилище
        // Формирование $data для сохранения картинок в бд
        if (isset($data['image'])) {

            $previewName = 'prev_' . md5(Carbon::now()
                    . '_' . $data['image']->getClientOriginalName())
                . '.' .$data['image']->getClientOriginalExtension()
            ;

            $previewPath = storage_path() . '/app/public/images/' . $previewName;

            // Сохраняем фото и превью (сделанное из фото) в хранилище Storage
            Image::make($data['image'])->fit(150, 150)->save($previewPath);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

            $data['preview_image'] = 'images/' . $previewName;
        }

        $photo = $album->photos()->create($data);

        return redirect()->route('admin.albums.photos.index', compact('album'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        return view('admin.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Photo $photo)
    {
        $data = $request->validated();

        // Создание превью, если изменили фотографию
        // Сохранение картинки и превью_картинки в хранилище
        // Формирование $data для сохранения картинок в бд
        if (isset($data['image'])) {

            $previewName = 'prev_' . md5(Carbon::now()
                    . '_' . $data['image']->getClientOriginalName())
                . '.' .$data['image']->getClientOriginalExtension()
            ;

            $previewPath = storage_path() . '/app/public/images/' . $previewName;

            // Сохраняем фото и превью (сделанное из фото) в хранилище Storage
            Image::make($data['image'])->fit(150, 150)->save($previewPath);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);

            $data['preview_image'] = 'images/' . $previewName;
        }

        $photo->update($data);

        return redirect()->route('admin.photos.show', compact('photo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $album = $photo->album()->get()[0];
        // Отвязываем фото от альбома, сохраняем изменения и удаляем фото
        $photo->album()->dissociate();
        $photo->save();
        $photo->delete();

        return redirect()->route('admin.albums.photos.index', compact('album'));
    }
}
