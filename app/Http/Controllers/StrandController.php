<?php

namespace App\Http\Controllers;

use App\Models\Strand;
use App\Models\Track;
use Illuminate\Http\Request;

class StrandController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Strand::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.strands.index', compact('paginated', 'search'));
    }

    public function create()
    {
        $tracks = Track::select('id', 'name')->get();
        return view('admin.strands.create', compact('tracks'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:strands,name|max:255',
                'track_id' => 'required',
            ]);

            $strand = new Strand();
            $strand->name = $request->name;
            $strand->track_id = $request->track_id;
            $strand->save();

            notyf()->success('Strand created successfully!');

            return redirect('strands');
        } catch (\Exception $e) {

            notyf()->error($e->getMessage());

            return redirect()->back();
        }
    }

    public function show(Request $request, $id)
    {
        $strand = Strand::where('id', $id)->first();

        return view('admin.strands.show', compact('strand'));
    }

    public function edit(Strand $strand)
    {
        $tracks = Track::select('id', 'name')->get();
        return view('admin.strands.edit', compact('strand', 'tracks'));
    }

    public function update(Request $request, Strand $strand)
    {
        $request->validate([
            'name' => 'required|unique:strands,name,' . $strand->id . '|max:255',
        ]);

        $strand->update($request->all());

        notyf()->success('Strand updated successfully!');
        return redirect()->route('strands.index');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $strand = Strand::findOrFail($id);

            if (!is_null($strand)) {
                $strand->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Strand deleted successfully!']);
        }
        return redirect()->route('strands.index');
    }
}
