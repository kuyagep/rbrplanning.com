<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = Track::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.tracks.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.tracks.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:tracks,name|max:255',
        ]);

        // Create a new region using validated data
        Track::create($request->all());

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->success('Tracks created successfully!');
        return redirect()->back();

    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $track = Track::findOrFail($id);

        // Return view with region data
        return view('admin.tracks.show', compact('funding_source'));
    }

    // Show the form for editing the specified resource.
    public function edit(Track $track)
    {
        // Return view with region data for editing
        return view('admin.tracks.edit', compact('funding_source'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Track $track)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:tracks,name,' . $track->id . '|max:255',
        ]);

        // Update the region with validated data
        $track->update($request->all());

        // Redirect back with success message
        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->success('Funding Sources updated successfully.');
        return redirect()->back();
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $track = Track::findOrFail($id);
            $track->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Tracks deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('tracks.index');
    }
}
