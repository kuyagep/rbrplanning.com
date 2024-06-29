<?php

namespace App\Http\Controllers;

use App\Models\FundingSource;
use Illuminate\Http\Request;

class FundingSourceController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = FundingSource::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('fund_source', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.funding-sources.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.funding-sources.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'fund_source' => 'required|unique:funding_sources,fund_source|max:255',
        ]);

        // Create a new region using validated data
        FundingSource::create($request->all());

        notyf()->success('Funding Sources created successfully!');
        // Redirect back with success message
        return redirect('funding-sources');
    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $funding_source = FundingSource::findOrFail($id);

        // Return view with region data
        return view('admin.funding-sources.show', compact('funding_source'));
    }

    // Show the form for editing the specified resource.
    public function edit(FundingSource $funding_source)
    {
        // Return view with region data for editing
        return view('admin.funding-sources.edit', compact('funding_source'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, FundingSource $funding_source)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:funding_sources,fund_source,' . $funding_source->id . '|max:255',
        ]);

        // Update the region with validated data
        $funding_source->update($request->all());
        notyf()->success('Funding Sources updated successfully!');
        // Redirect back with success message
        return redirect()->route('funding-sources.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $funding_source = FundingSource::findOrFail($id);
            $funding_source->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Funding Sources deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('funding-sources.index');
    }
}
