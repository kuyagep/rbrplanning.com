<?php

namespace App\Http\Controllers;

use App\Models\SpecialPrograms;
use Illuminate\Http\Request;

class SpecialProgramsController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = SpecialPrograms::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.special-programs.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.special-programs.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:special_programs,name|max:255',
        ]);

        // Create a new region using validated data
        SpecialPrograms::create($request->all());

        notyf()->success('Special Program created successfully!');
        return redirect()->back();

    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $special_program = SpecialPrograms::findOrFail($id);

        // Return view with region data
        return view('admin.special-programs.show', compact('track'));
    }

    // Show the form for editing the specified resource.
    public function edit(SpecialPrograms $special_program)
    {
        // Return view with region data for editing
        return view('admin.special-programs.edit', compact('special_program'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, SpecialPrograms $special_program)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:special_programs,name,' . $special_program->id . '|max:255',
        ]);

        // Update the region with validated data
        $special_program->update($request->all());

        // Redirect back with success message
        notyf()->success('Special Program updated successfully.');
        return redirect()->back();
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $special_program = SpecialPrograms::findOrFail($id);
            $special_program->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Special Program deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('special-programs.index');
    }
}
