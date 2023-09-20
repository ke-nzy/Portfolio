<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class SkillSectionSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showSkillSetting = SkillSectionSetting::first();
        return view('admin.skill-setting.index', compact('showSkillSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:300'],
            'sub_title' => ['required', 'max:1500'],
            'image' => ['image', 'max:10000'],
        ]);
        $skill = SkillSectionSetting::first();
        $imagPath = handleUpload('image', $skill);

        SkillSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => (!empty($imagPath) ? $imagPath : $skill->image),
            ]);
            toastr()->success('Updated successfully!', 'Yaaay!');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
