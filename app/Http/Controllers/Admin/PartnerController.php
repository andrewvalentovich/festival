<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Partner\StoreRequest;
use App\Http\Requests\Admin\Partner\UpdateRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // Кладём картинку в Storage
        $data['logo_image'] = Storage::disk('public')->put('/images', $data['logo_image']);

        Partner::create($data);

        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     * @param Partner $partner
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Partner $partner
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Partner $partner)
    {
        $data = $request->validated();

        // Создание превью, если изменили фотографию
        if(isset($data['logo_image'])) {
            $data['logo_image'] = Storage::disk('public')->put('/images', $data['logo_image']);
        }

        $partner->update($data);

        return redirect()->route('admin.partners.show', compact('partner'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Partner $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        return redirect()->route('admin.partners.index');
    }
}
