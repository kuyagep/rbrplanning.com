<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Models\Strand;
use App\Models\Track;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Specialization::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.specializations.index', compact('paginated', 'search'));
    }

    public function create()
    {
        $tracks = Track::select('id', 'name')->get();
        $strands = Strand::select('id', 'name')->get();
        return view('admin.specializations.create', compact('tracks', 'strands'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:specializations,name|max:255',
                'strand_id' => 'required',
            ]);

            $specialization = new Specialization();
            $specialization->strand_id = $request->strand_id;
            $specialization->name = $request->name;
            $specialization->save();

            notyf()->success('Specialization created successfully!');

            return redirect('specializations');
        } catch (\Exception $e) {

            notyf()->error($e->getMessage());

            return redirect()->back();
        }
    }

    public function show(Request $request, $id)
    {
        $specialization = Specialization::where('id', $id)->first();
        return view('admin.specializations.show', compact('specialization'));
    }

    public function edit(Request $request, $specialization)
    {
        $tracks = Track::all();
        $strands = Strand::all();
        $specialization = Specialization::where('id', $specialization)->first();
        return view('admin.specializations.edit', compact('strands', 'tracks', 'specialization'));
    }

    public function update(Request $request, Specialization $specialization)
    {
        $request->validate([
            'strand_id' => 'required',
            'name' => 'required|unique:specializations,name,' . $specialization->id . '|max:255',
        ]);

        $specialization->update($request->all());

        notyf()->success('Specialization updated successfully!');

        return redirect()->route('specializations.index');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $specialization = Specialization::findOrFail($id);

            if (!is_null($specialization)) {
                $specialization->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'specialization deleted successfully!']);
        }
        return redirect()->route('specialization.index');
    }

    public function fetchStrands(Request $request)
    {
        $strands = Strand::where('track_id', $request->track_id)->get();
        return response()->json(['strands' => $strands]);
    }

}
