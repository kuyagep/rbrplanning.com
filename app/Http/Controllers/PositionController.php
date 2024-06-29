<?php

namespace App\Http\Controllers;

use App\Models\EmploymentStatus;
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
        $employment_statuses = EmploymentStatus::select('id', 'name')->get();
        $position_categories = PositionCategory::select('id', 'name')->get();
        return view('admin.positions.create', compact('position_categories', 'employment_statuses'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:positions,name|max:255',
                'position_category_id' => 'required',
                'employment_status_id' => 'required',
            ]);

            $position = new Position();
            $position->name = $request->name;
            $position->position_category_id = $request->position_category_id;
            $position->employment_status_id = $request->employment_status_id;
            $position->save();

            notyf()->success('Position created successfully!');

            return redirect('positions');
        } catch (\Exception $e) {

            notyf()->error($e->getMessage());

            return redirect()->back();
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
        $employment_statuses = EmploymentStatus::select('id', 'name')->get();
        return view('admin.positions.edit', compact('position', 'position_categories', 'employment_statuses'));
    }

    public function update(Request $request, Position $position)
    {
        try {
            $request->validate([
                'name' => 'required|unique:positions,name,' . $position->id . '|max:255',
                'position_category_id' => 'required',
                'employment_status_id' => 'required',
            ]);

            $position->update($request->all());
            notyf()->success('Position updated succesfully!');
            return redirect('positions');
        } catch (\Exception $e) {
            notyf()->success($e->getMessage());
            return redirect()->back();
        }

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
