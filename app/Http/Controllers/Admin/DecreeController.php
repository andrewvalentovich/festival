<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Decree\StoreRequest;
use App\Http\Requests\Admin\Decree\UpdateRequest;
use App\Models\Decree;

class DecreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decrees = Decree::all();
        return view('admin.decrees.index', compact('decrees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.decrees.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Decree::create($data);

        return redirect()->route('decrees.index');
    }

    /**
     * Display the specified resource.
     * @param Decree $decree
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Decree $decree)
    {
        return view('admin.decrees.show', compact('decree'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Decree $decree
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Decree $decree)
    {
        return view('admin.decrees.edit', compact('decree'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Decree $decree
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Decree $decree)
    {
        $data = $request->validated();
        $decree->update($data);

        return redirect()->route('decrees.show', compact('decree'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Decree $decree
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Decree $decree)
    {
        $decree->delete();
        return redirect()->route('decrees.index');
    }
}
