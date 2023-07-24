<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\UpdateRequest;
use App\Models\Option;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Show page.
     */
    public function show()
    {
        $page = [];
        $options = Option::where('key', 'LIKE', '%about_%')->get();

        foreach ($options as $option) {
            $page[$option['key']] = $option['value'];
        }

        return view('admin.about.show', compact('page'));
    }

    /**
     * Edit page.
     */
    public function edit()
    {
        $page = [];
        $options = Option::where('key', 'LIKE', '%about_%')->get();

        foreach ($options as $option) {
            $page[$option['key']] = $option['value'];
        }

        return view('admin.about.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param About $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        $data = $request->validated();

        foreach ($data as $key => $value) {
            if(is_null($data[$key])) {
                unset($data[$key]);
            }
        }

        // Если есть картинка
        if (isset($data['about_image'])) {

            // Кладём картинку в Storage
            $data['about_image'] = Storage::disk('public')->put('/images', $data['about_image']);
        }

        foreach ($data as $key => $value) {
            $option = Option::where('key', '=', $key)->first();

            if (isset($option)) {
                // Если поле существует, то обновим его
                $option->update(['value' => $value]);
            } else {
                // Если поля не существует, то создадим его
                $row = [
                    'key' => $key,
                    'value' => $value,
                    'type' => 'text',
                ];

                Option::create($row);
            }
        }

        return redirect()->route('admin.about.show');
    }
}
