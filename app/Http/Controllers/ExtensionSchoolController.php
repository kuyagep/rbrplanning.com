<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\ExtensionSchool;
use App\Models\Region;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtensionSchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = ExtensionSchool::query();

        // Filtering based on region, division, and district
        if ($request->filled('region_id')) {
            $query->whereHas('school.district.division.region', function ($q) use ($request) {
                $q->where('id', $request->region_id);
            });
        }

        if ($request->filled('division_id')) {
            $query->whereHas('school.district.division', function ($q) use ($request) {
                $q->where('id', $request->division_id);
            });
        }

        if ($request->filled('district_id')) {
            $query->whereHas('school.district', function ($q) use ($request) {
                $q->where('id', $request->district_id);
            });
        }
        if ($request->filled('school_id')) {
            $query->whereHas('school', function ($q) use ($request) {
                $q->where('id', $request->school_id);
            });
        }

        // Searching by school name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('school_name', 'like', '%' . $search . '%');
            });
        }

        // Pagination and ordering
        $paginated = $query->orderBy('created_at', 'desc')->paginate(10);

        // Fetching all regions, divisions, and districts for filter dropdowns
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();

        return view('admin.extension-schools.index', compact('paginated', 'regions', 'divisions', 'districts', 'schools'));
    }
    public function create()
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();
        return view('admin.extension-schools.create', compact('regions', 'divisions', 'districts', 'schools'));
    }

    public function fetchsSchool(Request $request)
    {
        $schools = School::where('district_id', $request->district_id)->get();
        return response()->json(['schools' => $schools]);
    }
    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'region_id' => 'required|exists:regions,id',
                'division_id' => 'required|exists:divisions,id',
                'district_id' => 'required|exists:districts,id',
                'school_id' => 'required|string|exists:schools,id',
                'schoolid' => 'required|string|unique:extension_schools,schoolid',
                'school_name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'mobile_number' => 'required|string|max:15',
                'school_email' => 'required|email|max:255|unique:extension_schools,school_email',
                'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Handle file upload
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/logos'), $logoName);
            }

            /// Create a new school record
            $ex_school = new ExtensionSchool();
            $ex_school->school_id = $request->school_id;
            $ex_school->schoolid = $request->schoolid;
            $ex_school->school_name = $request->school_name;
            $ex_school->address = $request->address;
            $ex_school->mobile_number = $request->mobile_number;
            $ex_school->school_email = $request->school_email;
            $ex_school->logo = $logoName ?? null;

            // Save the school record to the database
            $ex_school->save();

            return redirect('extension-schools')->with([
                'status' => 'Success',
                'message' => 'Extension School created successfully!',
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
        $ex_school = ExtensionSchool::where('id', $id)->first();

        return view('admin.extension-schools.show', compact('ex_school'));
    }

    public function edit(ExtensionSchool $extension_school)
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'division_name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();
        return view('admin.extension-schools.edit', compact('extension_school', 'regions', 'divisions', 'districts', 'schools'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'region_id' => 'required|exists:regions,id',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'school_id' => 'required|string|exists:schools,id',
            'schoolid' => 'required|string|unique:extension_schools,schoolid',
            'school_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile_number' => 'required|string|max:15',
            'school_email' => 'required|email|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the school record
        $ex_school = ExtensionSchool::findOrFail($id);

        // Handle logo upload if a new file is provided
        if ($request->hasFile('logo')) {
            // Delete the old logo file if it exists
            if ($ex_school->logo) {
                Storage::delete('public/logos/' . $ex_school->logo);
            }

            // Upload and store the new logo file
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('uploads/logos'), $logoName);
            $ex_school->logo = $logoName;
        }

        // Update school record with form data
        $ex_school->school_id = $request->school_id;
        $ex_school->schoolid = $request->schoolid;
        $ex_school->school_name = $request->school_name;
        $ex_school->address = $request->address;
        $ex_school->mobile_number = $request->mobile_number;
        $ex_school->school_email = $request->school_email;

        // Save the updated school record
        $ex_school->save();

        return redirect()->route('extension-schools.index')->with('success', 'Extension School updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $ex_school = ExtensionSchool::findOrFail($id);

            if (!is_null($ex_school)) {
                $ex_school->delete();
            }
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Division deleted successfully!']);
        }
        return redirect()->route('extension-schools.index');
    }
}
