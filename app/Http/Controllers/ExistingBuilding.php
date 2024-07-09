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
use Illuminate\Support\Facades\Auth;

class ExistingBuilding extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory_of_school_building = InventoryOfSchoolBuilding::where('school_id', Auth::user()->school->id)->first();
        $tls = TLS::where('school_id', Auth::user()->school->id)->first();
        $makeshift = MakeShift::where('school_id', Auth::user()->school->id)->first();
        $inventory_of_classrooms = InventoryOfClassroom::where('school_id', Auth::user()->school->id)->first();
        $inventory_of_furniture = InventoryOfFurniture::where('school_id', Auth::user()->school->id)->first();
        return view('user-panel.existing-buildings.index', compact(
            'inventory_of_school_building',
            'tls',
            'makeshift',
            'inventory_of_classrooms',
            'inventory_of_furniture',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = School::all();
        $schoolYears = SchoolYear::all();
        return view('user-panel.existing-buildings.create', compact('schools', 'schoolYears'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
            'school_year_id' => 'required|exists:school_years,id',
            // Validation rules for each inventory table
            'good_condition' => 'required|integer',
            'minor_repair' => 'required|integer',
            'major_repair' => 'required|integer',
            'condemnation_demolition' => 'required|integer',
            'on_going_contruction' => 'required|integer',
            'for_completion' => 'required|integer',
            'no_of_tls' => 'required|integer',
            'no_of_classes_in_tls' => 'required|integer',
            'no_of_makeshift_rooms' => 'required|integer',
            'no_of_classes_in_makeshift_rooms' => 'required|integer',
            'good_condition_classrooms' => 'required|integer',
            'minor_repair_classrooms' => 'required|integer',
            'major_repair_classrooms' => 'required|integer',
            'comdemnation_demolition_classrooms' => 'required|integer',
            'on_going_construction_classrooms' => 'required|integer',
            'for_completion_classrooms' => 'required|integer',
            'kinder_modular_table' => 'required|integer',
            'kinder_chair' => 'required|integer',
            'arm_chair' => 'required|integer',
            'school_desk' => 'required|integer',
            'other_classroom_table' => 'required|integer',
            'other_classroom_chair' => 'required|integer',
            'sets_of_tables_and_chairs' => 'required|integer',
        ]);
        // dd($request->all());
        // Create entries in each inventory table
        InventoryOfSchoolBuilding::create([
            'school_id' => $request->school_id,
            'school_year_id' => $request->school_year_id,
            'good_condition' => $request->good_condition,
            'minor_repair' => $request->minor_repair,
            'major_repair' => $request->major_repair,
            'condemnation_demolition' => $request->condemnation_demolition,
            'on_going_contruction' => $request->on_going_contruction,
            'for_completion' => $request->for_completion,
        ]);

        TLS::create([
            'school_id' => $request->school_id,
            'no_of_tls' => $request->no_of_tls,
            'no_of_classes_in_tls' => $request->no_of_classes_in_tls,
            'school_year_id' => $request->school_year_id,
        ]);

        MakeShift::create([
            'school_id' => $request->school_id,
            'no_of_makeshift_rooms' => $request->no_of_makeshift_rooms,
            'no_of_classes_in_makeshift_rooms' => $request->no_of_classes_in_makeshift_rooms,
            'school_year_id' => $request->school_year_id,
        ]);

        InventoryOfClassroom::create([
            'school_id' => $request->school_id,
            'good_condition' => $request->good_condition_classrooms,
            'minor_repair' => $request->minor_repair_classrooms,
            'major_repair' => $request->major_repair_classrooms,
            'comdemnation_demolition' => $request->comdemnation_demolition_classrooms,
            'on_going_construction' => $request->on_going_construction_classrooms,
            'for_completion' => $request->for_completion_classrooms,
            'school_year_id' => $request->school_year_id,
        ]);

        InventoryOfFurniture::create([
            'school_id' => $request->school_id,
            'kinder_modular_table' => $request->kinder_modular_table,
            'kinder_chair' => $request->kinder_chair,
            'arm_chair' => $request->arm_chair,
            'school_desk' => $request->school_desk,
            'other_classroom_table' => $request->other_classroom_table,
            'other_classroom_chair' => $request->other_classroom_chair,
            'sets_of_tables_and_chairs' => $request->sets_of_tables_and_chairs,
            'school_year_id' => $request->school_year_id,
        ]);

        notyf()->success('Inventory report submitted successfully.');

        return redirect()->route('user.existing-buildings.index');

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
}
