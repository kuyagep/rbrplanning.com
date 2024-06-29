<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = Region::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginatedRegions = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.regions.index', compact('paginatedRegions', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.regions.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:regions,name|max:255',
        ]);

        // Create a new region using validated data
        Region::create($request->all());
        notyf()->success('Region created successfully.');
        // Redirect back with success message
        return redirect('regions');
    }

    // Display the specified resource.
    public function show($id)
    {
        // Find region by ID
        $region = Region::findOrFail($id);

        // Return view with region data
        return view('admin.regions.show', compact('region'));
    }

    // Show the form for editing the specified resource.
    public function edit(Region $region)
    {
        // Return view with region data for editing
        return view('admin.regions.edit', compact('region'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Region $region)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:regions,name,' . $region->id . '|max:255',
        ]);

        // Update the region with validated data
        $region->update($request->all());
        notyf()->success('Region updated successfully.');
        // Redirect back with success message
        return redirect()->route('regions.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find region by ID and delete it
            $region = Region::findOrFail($id);
            $region->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Region deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('regions.index');
    }
}
