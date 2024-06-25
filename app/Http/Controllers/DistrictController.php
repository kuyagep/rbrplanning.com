<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Region;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = District::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.districts.index', compact('paginated', 'search'));
    }

    public function create()
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        return view('admin.districts.create', compact('regions', 'divisions'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'division_id' => 'required|unique:divisions,division_name|max:255',
                'region_id' => 'required',
            ]);

            $district = new District();
            $district->division_id = $request->division_id;
            $district->name = $request->name;
            $district->save();

            return redirect('districts')->with([
                'status' => 'Success',
                'message' => 'Districts created successfully!',
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
        $division = District::where('id', $id)->first();

        return view('admin.districts.view', compact('division'));
    }

    public function edit(District $district)
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        // $district = District::select('id', 'name')->where('id', $district->id)->get();
        return view('admin.districts.edit', compact('divisions', 'regions', 'district'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|unique:districts,name,' . $district->id . '|max:255',
        ]);

        $district->update($request->all());

        return redirect()->route('districts.index')->with('success', 'District updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $district = District::findOrFail($id);

            if (!is_null($district)) {
                $district->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Districts deleted successfully!']);
        }
        return redirect()->route('districts.index');
    }

    public function fetchDivisions(Request $request)
    {
        $divisions = Division::where('region_id', $request->region_id)->get();
        return response()->json(['divisions' => $divisions]);
    }

}
