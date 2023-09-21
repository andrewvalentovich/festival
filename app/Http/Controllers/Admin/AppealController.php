<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Appeal\StoreRequest;
use App\Http\Requests\Admin\Appeal\UpdateRequest;
use App\Models\Appeal;
use App\Models\JuryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AppealController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $appeals = Appeal::orderBy('id', 'desc')->get();
        $categories = JuryCategory::all();
        return view('admin.appeals.index', compact('appeals', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $categories = JuryCategory::all();
        return view('admin.appeals.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        Appeal::create($data);

        return redirect()->route('admin.appeals.index');
    }

    /**
     * Display the specified resource.
     * @param Appeal $appeal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Appeal $appeal)
    {
        return view('admin.appeals.show', compact('appeal'));
    }

    /**
     * Edit the specified resource.
     * @param Appeal $appeal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Appeal $appeal)
    {
        $categories = JuryCategory::all();
        return view('admin.appeals.edit', compact('appeal', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Appeal $appeal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Appeal $appeal)
    {
        $data = $request->validated();

        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $appeal->update($data);

        return redirect()->route('admin.appeals.show', compact('appeal'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Appeal $appeal
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Appeal $appeal)
    {
        $appeal->delete();
        return redirect()->route('admin.appeals.index');
    }
}
