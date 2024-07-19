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
        $sections = Section::with(['grade', 'school'])->get();

        return view('user-panel.sections.index', compact('sections'));
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
            'section_name' => 'required|string|max:255',
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

        return redirect('sections');
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
        // $section = Section::where('id', $section)->first();

        return view('user-panel.sections.edit', compact('section'));
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
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Section::findOrFail($id);
            $data->delete();
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'User deleted successfully!']);
        }
        return redirect()->route('users.index');
    }

    public function deleteMultiple(Request $request)
    {
        $userIds = $request->input('user_ids');

        if (!empty($userIds)) {
            Section::whereIn('id', $userIds)->delete();
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Selected users have been deleted!']);
        }

        return response()->json(['error' => 'No sections selected for deletion.'], 400);
    }

}
