<?php

namespace App\Http\Controllers;

use App\Models\InventoryOfClassroom;
use App\Models\InventoryOfFurniture;
use App\Models\InventoryOfSchoolBuilding;
use App\Models\MakeShift;
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
}
