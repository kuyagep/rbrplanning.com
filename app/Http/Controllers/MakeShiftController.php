<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MakeShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeShifts = MakeShift::all();
        return view('make_shifts.index', compact('makeShifts'));
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
        return view('make_shifts.create', compact('schools'));
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
            'no_of_makeshift_rooms' => 'required|integer',
            'no_of_classes_in_makeshift_rooms' => 'required|integer',
        ]);

        // Create a new instance of MakeShift model
        MakeShift::create($validatedData);

        // Notify success message using notyf()
        notyf()->success('Make Shift record created successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('make_shifts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MakeShift  $makeShift
     * @return \Illuminate\Http\Response
     */
    public function edit(MakeShift $makeShift)
    {
        // Assuming you have a schools table to populate the school_id field in the form
        $schools = School::all(); // Adjust based on your actual school model and data
        return view('make_shifts.edit', compact('makeShift', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MakeShift  $makeShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MakeShift $makeShift)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'no_of_makeshift_rooms' => 'required|integer',
            'no_of_classes_in_makeshift_rooms' => 'required|integer',
        ]);

        // Update the MakeShift record
        $makeShift->update($validatedData);

        // Notify success message using notyf()
        notyf()->success('Make Shift record updated successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('make_shifts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MakeShift  $makeShift
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakeShift $makeShift)
    {
        // Delete the MakeShift record
        $makeShift->delete();

        // Notify success message using notyf()
        notyf()->success('Make Shift record deleted successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('make_shifts.index');
    }
}
