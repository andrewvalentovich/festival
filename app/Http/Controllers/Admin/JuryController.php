<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Jury\StoreRequest;
use App\Http\Requests\Admin\Jury\UpdateRequest;
use App\Models\Jury;
use App\Models\JuryCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $jury = Jury::orderBy('id', 'desc')->get();
        $categories = JuryCategory::all();
        return view('admin.jury.index', compact('jury', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $jury_categories = JuryCategory::all();
        return view('admin.jury.create', compact('jury_categories'));
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
        Jury::create($data);

        return redirect()->route('admin.jury.index');
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
        $jury_categories = JuryCategory::all();
        return view('admin.jury.edit', compact('jury', 'jury_categories'));
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

        if(isset($data['category_id'])) {
            $data['category_id'] = $data['category_id'] == 0 ? null : $data['category_id'];
        }

        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $jury->update($data);

        return redirect()->route('admin.jury.show', compact('jury'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Jury $jury
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Jury $jury)
    {
        $jury->delete();
        return redirect()->route('admin.jury.index');
    }
}
