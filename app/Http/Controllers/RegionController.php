<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Region::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginatedRegions = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.regions.index', compact('paginatedRegions', 'search'));
    }

    public function create()
    {
        return view('admin.regions.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:regions,name|max:255',
        ]);

        Region::create($request->all());

        return redirect('regions')->with([
            'status' => 'Success',
            'message' => 'Region created successfully!',
        ]
        );

    }

    public function show(Request $request, $id)
    {
        $region = Region::where('id', $id)->first();

        return view('admin.regions.view', compact('region'));
    }

    public function edit(Region $region)
    {
        return view('admin.regions.edit', compact('region'));
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'name' => 'required|unique:regions,name,' . $region->id . '|max:255',
        ]);

        $region->update($request->all());

        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $region = Region::findOrFail($id);

            if (!is_null($region)) {
                $region->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Region deleted successfully!']);
        }
        return redirect()->route('regions.index');
    }

}
