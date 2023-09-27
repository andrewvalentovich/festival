<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\StoreRequest;
use App\Http\Requests\Admin\Contact\UpdateRequest;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }

        Contact::create($data);

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Display the specified resource.
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    /**
     * Edit the specified resource.
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateRequest $request
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Contact $contact)
    {
        $data = $request->validated();

        if(isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $contact->update($data);

        return redirect()->route('admin.contacts.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Contact $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index');
    }
}
