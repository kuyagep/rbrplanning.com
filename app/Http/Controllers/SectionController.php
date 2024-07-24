<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search');

        $sections = Section::where('school_id', Auth::user()->school_id)->get();

        return view('user-panel.sections.index', compact('sections', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $grades = Grade::all();
        return view('user-panel.sections.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'section_name' => 'required|string|unique:sections|max:255',
            'grade' => 'required|exists:grades,id',
        ]);

        try {
            $section = new Section;
            $section->grade_id = $request->grade;
            $section->school_id = Auth::user()->school_id;
            $section->section_name = $request->section_name;
            $section->save();

            notyf()->success('Section created successfully.');
        } catch (\Exception $e) {
            notyf()->error('Failed to create section: ' . $e->getMessage());
            return redirect()->back();
        }

        return redirect('/user/sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Section $section)
    {

        return view('user-panel.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $grades = Grade::all();
        return view('user-panel.sections.edit', compact('section', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Update the region with validated data
        $section->update($request->all());

        notyf()->success('Section updated successfully.');

        return redirect()->route('user.sections.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();

        notyf()->success('Section deleted successfully.');
        return redirect()->route('sections.index');
    }

}
