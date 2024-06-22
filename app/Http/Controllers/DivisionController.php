<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Region;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Division::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginatedDivisions = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.divisions.index', compact('paginatedDivisions', 'search'));
    }

    public function create()
    {
        $regions = Region::select('id', 'name')->get();
        return view('admin.divisions.create', compact('regions'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:divisions,name|max:255',
                'region_id' => 'required',
            ]);

            $division = new Division();
            $division->name = $request->name;
            $division->region_id = $request->region_id;
            $division->save();

            return redirect('divisions')->with([
                'status' => 'Success',
                'message' => 'Division created successfully!',
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'status' => 'Error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ])->withInput();
        }
    }

    public function show(Request $request, $id)
    {
        $division = Division::where('id', $id)->first();

        return view('admin.divisions.view', compact('division'));
    }

    public function edit(Division $division)
    {
        $regions = Region::select('id', 'name')->get();
        return view('admin.divisions.edit', compact('division', 'regions'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate([
            'name' => 'required|unique:divisions,name,' . $division->id . '|max:255',
        ]);

        $division->update($request->all());

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $division = Division::findOrFail($id);

            if (!is_null($division)) {
                $division->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Division deleted successfully!']);
        }
        return redirect()->route('divisions.index');
    }
}
