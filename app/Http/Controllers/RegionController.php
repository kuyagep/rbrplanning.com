<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Region::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginatedRegions = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.regions.index', compact('paginatedRegions', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $region = new Region;
        $region->name = $request->name;
        $region->save();

        return redirect('regions')->with([
            'status' => 'Success',
            'message' => 'Region created successfully!',
        ]
        );
        // return redirect('regions.index')->route('regions.index', compact(['temp_password', 'user']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $region = Region::where('id', $id)->first();

        return view('admin.regions.view', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $region = Region::where('id', $id)->first();

        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = Region::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('regions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $region = Region::findOrFail($request->id);

            if (!is_null($region)) {
                $region->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Region deleted successfully!']);
        }
        return redirect()->route('regions.index');
    }

    public function deleteMultiple(Request $request)
    {
        $Ids = $request->input('region_ids');
        dd($Ids);
        if (!empty($Ids)) {

            Region::whereIn('id', $Ids)->delete();

            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Selected Regions have been deleted!']);
        }

        // return response()->json(['error' => 'No regions selected for deletion.'], 400);
    }

}
