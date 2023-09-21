<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JuryCategory\StoreRequest;
use App\Http\Requests\Admin\JuryCategory\UpdateRequest;
use App\Models\JuryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JuryCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jury_categories = JuryCategory::orderBy('id', 'desc')->get();
        return view('admin.jury_categories.index', compact('jury_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jury_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        JuryCategory::create($data);

        return redirect()->route('admin.jury_categories.index');
    }

    /**
     * Display the specified resource.
     * @param JuryCategory $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(JuryCategory $contact)
    {
        return view('admin.jury_categories.show', compact('contact'));
    }

    /**
     * Edit the specified resource.
     * @param JuryCategory $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(JuryCategory $contact)
    {
        return view('admin.jury_categories.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param JuryCategory $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, JuryCategory $contact)
    {
        $data = $request->validated();
        $contact->update($data);

        return redirect()->route('admin.jury_categories.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     * @param JuryCategory $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(JuryCategory $contact)
    {
        $contact->delete();
        return redirect()->route('admin.jury_categories.index');
    }
}
