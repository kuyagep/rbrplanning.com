<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\EmploymentStatus;
use App\Models\FundingSource;
use App\Models\Personnel;
use App\Models\Position;
use App\Models\Region;
use App\Models\School;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function personnelIndex(Request $request)
    {
        $query = Personnel::query();

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
                $q->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%');
            });
        }

        // Pagination and ordering
        $paginated = $query->orderBy('created_at', 'desc')->paginate(10);

        // Fetching all regions, divisions, and districts for filter dropdowns
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();

        return view('user-panel.personnels.index', compact('paginated', 'regions', 'divisions', 'districts', 'schools'));
    }

    public function personnelCreate()
    {
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();
        $positions = Position::select('id', 'name')->get();
        $employment_statuses = EmploymentStatus::select('id', 'name')->get();
        $funding_sources = FundingSource::select('id', 'fund_source')->get();
        return view('user-panel.personnels.create', compact('employment_statuses', 'regions', 'divisions', 'districts', 'schools', 'positions', 'funding_sources'));
    }

    public function personnelStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'employee_number' => 'required|unique:personnels|max:255',
            'item_number' => 'required|unique:personnels|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'middle_name' => 'nullable|max:255',
            'birth_date' => 'required|date',
            'mobile_number' => 'required|max:255',
            'deped_email' => 'required|email|max:255',
            'sex' => 'required|in:Male,Female',
            'employment_status_id' => 'required|exists:employment_statuses,id',
            'position_id' => 'required|exists:positions,id',
            'school_id' => 'required|exists:schools,id',
            'funding_source_id' => 'required|exists:funding_sources,id',
            'remarks' => 'nullable|max:255',
        ]);

        $personnel = new Personnel();
        $personnel->employee_number = $request->input('employee_number');
        $personnel->item_number = $request->input('item_number');
        $personnel->first_name = $request->input('first_name');
        $personnel->last_name = $request->input('last_name');
        $personnel->middle_name = $request->input('middle_name');
        $personnel->birth_date = $request->input('birth_date');
        $personnel->mobile_number = $request->input('mobile_number');
        $personnel->deped_email = $request->input('deped_email');
        $personnel->sex = $request->input('sex');
        $personnel->employment_status_id = $request->input('employment_status_id');
        $personnel->position_id = $request->input('position_id');
        $personnel->school_id = $request->input('school_id');
        $personnel->funding_source_id = $request->input('funding_source_id');
        $personnel->remarks = $request->input('remarks');
        $personnel->save();

        notyf()->success('Personnel created successfully.');

        return redirect()->route('user.personnels.index');
    }

    public function personnelShow($id)
    {
        $personnel = Personnel::findOrFail($id);

        return view('user-panel.personnels.show', compact('personnel'));
    }

    public function personnelEdit($id)
    {
        $personnel = Personnel::findOrFail($id);

        $employmentStatuses = EmploymentStatus::all();
        $positions = Position::all();
        $schools = School::all();
        $fundingSources = FundingSource::all();

        return view('user-panel.personnels.edit', compact('personnel', 'employmentStatuses', 'positions', 'schools', 'fundingSources'));
    }

    public function personnelUpdate(Request $request, $id)
    {
        $personnel = Personnel::findOrFail($id);

        $request->validate([
            'employee_number' => 'required|string|max:255',
            'item_number' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'mobile_number' => 'required|string|max:255',
            'deped_email' => 'required|email|max:255',
            'sex' => 'required|string|max:255',
            'employment_status_id' => 'required|exists:employment_statuses,id',
            'position_id' => 'required|exists:positions,id',
            'school_id' => 'required|exists:schools,id',
            'funding_source_id' => 'required|exists:funding_sources,id',
        ]);

        $personnel->employee_number = $request->input('employee_number');
        $personnel->item_number = $request->input('item_number');
        $personnel->first_name = $request->input('first_name');
        $personnel->middle_name = $request->input('middle_name');
        $personnel->last_name = $request->input('last_name');
        $personnel->birth_date = $request->input('birth_date');
        $personnel->mobile_number = $request->input('mobile_number');
        $personnel->deped_email = $request->input('deped_email');
        $personnel->sex = $request->input('sex');
        $personnel->employment_status_id = $request->input('employment_status_id');
        $personnel->position_id = $request->input('position_id');
        $personnel->school_id = $request->input('school_id');
        $personnel->funding_source_id = $request->input('funding_source_id');

        $personnel->save();
        notyf()->success('Personnel updated successfully.');
        return redirect()->route('user.personnels.index');
    }

    public function personnelDestroy(Request $request, $id)
    {
        // Check if request is AJAX
        if ($request->ajax()) {
            $personnel = Personnel::findOrFail($id);
            $personnel->delete();

            // Return success JSON response
            return response()->json([
                'icon' => 'success',
                'title' => 'Success!',
                'message' => 'Personnel deleted successfully!',
            ]);
        }

        // Redirect to index if not AJAX request
        return redirect()->route('user.personnels.index');
    }

}
