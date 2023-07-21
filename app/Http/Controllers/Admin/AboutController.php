<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\UpdateRequest;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index');
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
        dd($data);


        return redirect()->route('admin.about.index');
    }
}
