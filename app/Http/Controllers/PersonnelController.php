<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
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
                $q->where('school_name', 'like', '%' . $search . '%');
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
        $funding_sources = FundingSource::select('id', 'fund_source')->get();
        return view('user-panel.personnels.create', compact('regions', 'divisions', 'districts', 'schools', 'positions', 'funding_sources'));
    }

    public function personnelStore(Request $request)
    {
        dd($request->all());
    }
}
