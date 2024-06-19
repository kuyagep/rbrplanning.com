<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\Region;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = School::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $paginated = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('admin.schools.index', compact('paginated', 'search'));
    }

    public function fetchDistricts(Request $request)
    {
        $districts = District::where('division_id', $request->division_id)->get();
        return response()->json(['districts' => $districts]);
    }
    public function create()
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        $districts = District::select('id', 'name')->get();
        return view('admin.schools.create', compact('regions', 'divisions', 'districts'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'region_id' => 'required|exists:regions,id',
                'division_id' => 'required|exists:divisions,id',
                'district_id' => 'required|exists:districts,id',
                'school_id' => 'required|string|max:255|unique:schools,school_id',
                'code' => 'required|string|max:255|unique:schools,code',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'mobile_number' => 'required|string|max:15',
                'school_email' => 'required|email|max:255|unique:schools,school_email',
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required|string',
            ]);

            // Handle file upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logos'), $logoName);
            }

            /// Create a new school record
            $school = new School();
            $school->district_id = $request->district_id;
            $school->school_id = $request->school_id;
            $school->code = $request->code;
            $school->name = $request->name;
            $school->address = $request->address;
            $school->mobile_number = $request->mobile_number;
            $school->school_email = $request->school_email;
            $school->logo = $logoName ?? '';
            $school->description = $request->description;

            // Save the school record to the database
            $school->save();

            return redirect('schools')->with([
                'status' => 'Success',
                'message' => 'School created successfully!',
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
        $school = School::where('id', $id)->first();

        return view('admin.schools.show', compact('school'));
    }

    public function edit(School $school)
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        $districts = District::select('id', 'name')->get();
        return view('admin.schools.edit', compact('school', 'regions', 'divisions', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'region_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'school_id' => 'required|string',
            'code' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'mobile_number' => 'required|string',
            'school_email' => 'required|email',
            'description' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation as needed
        ]);

        // Find the school record
        $school = School::findOrFail($id);

        // Handle logo upload if a new file is provided
        if ($request->hasFile('logo')) {
            // Delete the old logo file if it exists
            if ($school->logo) {
                Storage::delete('public/logos/' . $school->logo);
            }

            // Upload and store the new logo file
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logos'), $logoName);
        }

        // Update school record with form data
        $school->district_id = $request->input('district_id');
        $school->school_id = $request->input('school_id');
        $school->code = $request->input('code');
        $school->name = $request->input('name');
        $school->address = $request->input('address');
        $school->mobile_number = $request->input('mobile_number');
        $school->school_email = $request->input('school_email');
        $school->logo = $logoName ?? '';
        $school->description = $request->input('description');

        // Save the updated school record
        $school->save();

        return redirect()->route('schools.index')->with('success', 'School updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $school = School::findOrFail($id);

            if (!is_null($school)) {
                $school->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Division deleted successfully!']);
        }
        return redirect()->route('divisions.index');
    }
}
