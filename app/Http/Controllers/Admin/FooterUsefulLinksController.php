<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLinks;
use Illuminate\Http\Request;

class FooterUsefulLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinksDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-useful-links.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-useful-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required'],
        ]);

        $link = new FooterUsefulLinks();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Created Successfully!', 'success');
        return redirect()->route('admin.footer-useful-links.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $link = FooterUsefulLinks::findOrFail($id);
        return view('admin.footer-useful-links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'url' => ['required'],
        ]);

        $link = FooterUsefulLinks::findOrFail($id);
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Update Successfully!', 'success');
        return redirect()->route('admin.footer-useful-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useful = FooterUsefulLinks::findOrFail($id);
        $useful->delete();
    }
}
