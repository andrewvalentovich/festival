<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Jury\StoreRequest;
use App\Http\Requests\Jury\UpdateRequest;
use App\Models\Jury;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $jury = Jury::all();
        return view('admin.jury.index', compact('jury'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.jury.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Создание превью
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

        Jury::create($data);

        return redirect()->route('jury.index');
    }

    /**
     * Display the specified resource.
     * @param Jury $jury
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Jury $jury)
    {
        return view('admin.jury.show', compact('jury'));
    }

    /**
     * Edit the specified resource.
     * @param Jury $jury
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Jury $jury)
    {
        return view('admin.jury.edit', compact('jury'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Jury $jury
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Jury $jury)
    {
        $data = $request->validated();

        // Создание превью, если изменили фотографию
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

        $jury->update($data);

        return redirect()->route('jury.show', compact('jury'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Jury $jury
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Jury $jury)
    {
        $jury->delete();
        return redirect()->route('jury.index');
    }
}
