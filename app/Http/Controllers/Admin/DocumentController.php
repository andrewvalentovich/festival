<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Document\StoreRequest;
use App\Http\Requests\Admin\Document\UpdateRequest;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::all();
        return view('admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.documents.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Document::create($data);

        return redirect()->route('admin.documents.index');
    }

    /**
     * Display the specified resource.
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Document $document
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Document $document
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Document $document)
    {
        $data = $request->validated();
        $document->update($data);

        return redirect()->route('admin.documents.show', compact('document'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Document $document
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index');
    }
}
