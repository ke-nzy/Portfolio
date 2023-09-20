<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLinks;
use Illuminate\Http\Request;

class FooterHelpLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinksDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-help-links.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer-help-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'url' => ['required']
        ]);

        $link = new FooterHelpLinks();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Created Successfully', 'success');
        return redirect()->route('admin.footer-help-links.index');
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
        $link = FooterHelpLinks::findOrFail($id);
        return view('admin.footer-help-links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'url' => ['required']
        ]);

        $link = FooterHelpLinks::findOrFail($id);
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr('Updated Successfully', 'success');
        return redirect()->route('admin.footer-help-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = FooterHelpLinks::findOrFail($id);
        $link->delete();
    }
}
