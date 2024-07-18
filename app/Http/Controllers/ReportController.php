<?php

namespace App\Http\Controllers;

use App\Models\InventoryOfClassroom;
use App\Models\InventoryOfFurniture;
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

    public function bySchoolYear(Request $request, SchoolYear $schoolYear)
    {

        $schoolYears = SchoolYear::all();
        $schoolID = Auth::user()->school_id;
        $schoolYearId = SchoolYear::latest();

        $reports = InventoryOfSchoolBuilding::where('school_year_id', $schoolYearId)->where('school_id', $schoolId)
            ->with('school')->get();
        $tlsReports = TLS::where('school_year_id', $schoolYearId)->where('school_id', $schoolId)
            ->with('school')->get();
        $makeShiftReports = MakeShift::where('school_year_id', $schoolYearId)->where('school_id', $schoolId)
            ->with('school')->get();
        $classroomReports = InventoryOfClassroom::where('school_year_id', $schoolYearId)->where('school_id', $schoolId)
            ->with('school')->get();
        $furnitureReports = InventoryOfFurniture::where('school_year_id', $schoolYearId)->where('school_id', $schoolId)
            ->with('school')->get();

        return response()->json([
            'reports' => $reports,
            'tlsReports' => $tlsReports,
            'makeShiftReports' => $makeShiftReports,
            'classroomReports' => $classroomReports,
            'furnitureReports' => $furnitureReports,
        ]);
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
