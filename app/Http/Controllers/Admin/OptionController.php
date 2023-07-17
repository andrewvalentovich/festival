<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Option\StoreRequest;
use App\Http\Requests\Admin\Option\UpdateRequest;
use App\Models\Option;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::all();
        return view('admin.options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.options.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Option::create($data);

        return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     * @param Option $option
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Option $option)
    {
        return view('admin.options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Option $option
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Option $option)
    {
        return view('admin.options.edit', compact('option'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Option $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Option $option)
    {
        $data = $request->validated();
        $option->update($data);

        return redirect()->route('options.show', compact('option'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Option $option
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('options.index');
    }
}
