<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryOfClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventoryOfClassrooms = InventoryOfClassroom::all();
        return view('inventory_of_classrooms.index', compact('inventoryOfClassrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Assuming you have a schools table to populate the school_id field in the form
        $schools = School::all(); // Adjust based on your actual school model and data
        return view('inventory_of_classrooms.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'good_condition' => 'required|integer',
            'minor_repair' => 'required|integer',
            'major_repair' => 'required|integer',
            'comdemnation_demolition' => 'required|integer',
            'on_going_construction' => 'required|integer',
            'for_completion' => 'required|integer',
        ]);

        // Create a new instance of InventoryOfClassroom model
        InventoryOfClassroom::create($validatedData);

        // Notify success message using notyf()
        notyf()->success('Inventory of Classroom record created successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('inventory_of_classrooms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryOfClassroom  $inventoryOfClassroom
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOfClassroom $inventoryOfClassroom)
    {
        // Assuming you have a schools table to populate the school_id field in the form
        $schools = School::all(); // Adjust based on your actual school model and data
        return view('inventory_of_classrooms.edit', compact('inventoryOfClassroom', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventoryOfClassroom  $inventoryOfClassroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventoryOfClassroom $inventoryOfClassroom)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'good_condition' => 'required|integer',
            'minor_repair' => 'required|integer',
            'major_repair' => 'required|integer',
            'comdemnation_demolition' => 'required|integer',
            'on_going_construction' => 'required|integer',
            'for_completion' => 'required|integer',
        ]);

        // Update the InventoryOfClassroom record
        $inventoryOfClassroom->update($validatedData);

        // Notify success message using notyf()
        notyf()->success('Inventory of Classroom record updated successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('inventory_of_classrooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryOfClassroom  $inventoryOfClassroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOfClassroom $inventoryOfClassroom)
    {
        // Delete the InventoryOfClassroom record
        $inventoryOfClassroom->delete();

        // Notify success message using notyf()
        notyf()->success('Inventory of Classroom record deleted successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('inventory_of_classrooms.index');
    }
}
