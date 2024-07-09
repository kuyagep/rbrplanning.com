<?php

namespace App\Http\Controllers;

use App\Models\InventoryOfSchoolBuilding;
use App\Models\MakeShift;
use App\Models\School;
use App\Models\SchoolYear;
use App\Models\TLS;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function index(Request $request)
    {

        $title = 'Reports';
        $data = 'Generate reports coming soon!';
        return view('admin.reports.index', compact('title', 'data'));
    }

    public function bySchoolYear(SchoolYear $schoolYear)
    {
        // Fetch all reports for the given school year
        $reports = InventoryOfSchoolBuilding::where('school_year_id', $schoolYear->id)
            ->with('school')
            ->get();

        // Example for fetching TLS data for the same school year
        $tlsReports = TLS::where('school_year_id', $schoolYear->id)
            ->with('school')
            ->get();

        // Example for fetching MakeShift data for the same school year
        $makeShiftReports = MakeShift::where('school_year_id', $schoolYear->id)
            ->with('school')
            ->get();

        return view('reports.by_school_year', compact('schoolYear', 'reports', 'tlsReports', 'makeShiftReports'));
    }

    public function bySchool(School $school)
    {
        // Fetch all reports for the given school
        $reports = InventoryOfSchoolBuilding::where('school_id', $school->id)
            ->with('schoolYear')
            ->get();

        // Example for fetching TLS data for the same school
        $tlsReports = TLS::where('school_id', $school->id)
            ->with('schoolYear')
            ->get();

        // Example for fetching MakeShift data for the same school
        $makeShiftReports = MakeShift::where('school_id', $school->id)
            ->with('schoolYear')
            ->get();

        return view('reports.by_school', compact('school', 'reports', 'tlsReports', 'makeShiftReports'));
    }
}
