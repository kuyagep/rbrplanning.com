<?php

namespace App\Http\Controllers;

use App\Models\EmploymentStatus;
use Illuminate\Http\Request;

class EmploymentStatusController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        // Retrieve search query from request
        $search = $request->input('search');

        // Initialize query builder for regions
        $query = EmploymentStatus::query();

        // Apply search filter if provided
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate results and order by creation date
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        // Return view with paginated regions and search query
        return view('admin.employment-status.index', compact('paginated', 'search'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('admin.employment-status.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:employment_statuses,name|max:255',
        ]);

        // Create a new region using validated data
        EmploymentStatus::create($request->all());
        notyf()->success('Employment Status created successfully!');
        // Redirect back with success message
        return redirect('employment-statuses');
    }

    // Display the specified resource.
    public function show($id)
    {
        // Find Position Category by ID
        $employment_status = EmploymentStatus::findOrFail($id);

        // Return view with region data
        return view('admin.employment-status.show', compact('employment_status'));
    }

    // Show the form for editing the specified resource.
    public function edit(EmploymentStatus $employment_status)
    {
        // Return view with region data for editing
        return view('admin.employment-status.edit', compact('employment_status'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, EmploymentStatus $employment_status)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|unique:employment_statuses,name,' . $employment_status->id . '|max:255',
        ]);

        // Update the region with validated data
        $employment_status->update($request->all());
        notyf()->success('Employment Status updated successfully!');
        // Redirect back with success message
        return redirect()->route('employment-statuses.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            // Find Position Category by ID and delete it
            $employment_status = EmploymentStatus::findOrFail($id);
            $employment_status->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Employment Status deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('employment-statuses.index');
    }
}
