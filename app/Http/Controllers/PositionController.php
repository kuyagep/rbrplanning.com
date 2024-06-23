<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\PositionCategory;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Position::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginated = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.positions.index', compact('paginated', 'search'));
    }

    public function create()
    {
        $position_categories = PositionCategory::select('id', 'name')->get();
        return view('admin.positions.create', compact('position_categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:positions,name|max:255',
                'position_category_id' => 'required',
            ]);

            $position = new Position();
            $position->name = $request->name;
            $position->position_category_id = $request->position_category_id;
            $position->save();

            return redirect('positions')->with([
                'status' => 'Success',
                'message' => 'Position created successfully!',
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
        $position = Position::where('id', $id)->first();

        return view('admin.positions.view', compact('position'));
    }

    public function edit(Position $position)
    {
        $position_categories = PositionCategory::select('id', 'name')->get();
        return view('admin.positions.edit', compact('position', 'position_categories'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|unique:positions,name,' . $position->id . '|max:255',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $position = Position::findOrFail($id);

            if (!is_null($position)) {
                $position->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Position deleted successfully!']);
        }
        return redirect()->route('positions.index');
    }
}
