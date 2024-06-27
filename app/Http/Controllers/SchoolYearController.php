<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = SchoolYear::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('school_year', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.school-year.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.school-year.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'school_year' => 'required|unique:school_years,school_year|max:255',
        ]);

        // Create a new region using validated data
        SchoolYear::create($request->all());

        // Redirect back with success message
        return redirect('school-year')->with([
            'status' => 'Success',
            'message' => 'School Year created successfully!',
        ]);
    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $school_year = SchoolYear::findOrFail($id);

        // Return view with region data
        return view('admin.school-year.show', compact('school_year'));
    }

    // Show the form for editing the specified resource.
    public function edit(SchoolYear $school_year)
    {
        // Return view with region data for editing
        return view('admin.school-year.edit', compact('school_year'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, SchoolYear $school_year)
    {
        // Validate incoming request data
        $request->validate([
            'school_year' => 'required|unique:school_years,school_year,' . $school_year->id . '|max:255',
        ]);

        // Update the region with validated data
        $school_year->update($request->all());

        // Redirect back with success message
        return redirect()->route('school-year.index')->with('success', 'School Year updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $school_year = SchoolYear::findOrFail($id);
            $school_year->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'School Year deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('school-year.index');
    }
}
