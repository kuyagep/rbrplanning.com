<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryOfSchoolBuildingController extends Controller
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'good_condition' => 'nullable|integer',
            'minor_repair' => 'nullable|integer',
            'major_repair' => 'nullable|integer',
            'condemnation_demolition' => 'nullable|integer',
            'on_going_contruction' => 'nullable|integer',
            'for_completion' => 'nullable|integer',
        ]);

        // Create a new instance of InventoryOfSchoolBuilding model
        $inventory = new InventoryOfSchoolBuilding();

        // Assign validated data to the model attributes
        $inventory->school_id = $validatedData['school_id'];
        $inventory->good_condition = $validatedData['good_condition'];
        $inventory->minor_repair = $validatedData['minor_repair'];
        $inventory->major_repair = $validatedData['major_repair'];
        $inventory->condemnation_demolition = $validatedData['condemnation_demolition'];
        $inventory->on_going_contruction = $validatedData['on_going_contruction'];
        $inventory->for_completion = $validatedData['for_completion'];

        // Save the model instance
        $inventory->save();

        // Notify success message using notyf()
        notyf()->success('Inventory of School Building created successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('inventory_of_school_buildings.index');
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
