<?php

namespace App\Http\Controllers;

use App\Models\PositionCategory;
use Illuminate\Http\Request;

class PositionCategoryController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = PositionCategory::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.positions-categories.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.positions-categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:position_catogories,name|max:255',
        ]);

        // Create a new region using validated data
        PositionCategory::create($request->all());

        // Redirect back with success message
        return redirect('regions')->with([
            'status' => 'Success',
            'message' => 'Position Category created successfully!',
        ]);
    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $positionCategory = PositionCategory::findOrFail($id);

        // Return view with region data
        return view('admin.positions-categories.show', compact('positionCategory'));
    }

    // Show the form for editing the specified resource.
    public function edit(PositionCategory $positionCategory)
    {
        // Return view with region data for editing
        return view('admin.positions-categories.edit', compact('positionCategory'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, PositionCategory $positionCategory)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:positions-categories,name,' . $positionCategory->id . '|max:255',
        ]);

        // Update the region with validated data
        $positionCategory->update($request->all());

        // Redirect back with success message
        return redirect()->route('positions-categories.index')->with('success', 'Position Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $positionCategory = PositionCategory::findOrFail($id);
            $positionCategory->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Position Category deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('positions-categories.index');
    }
}
