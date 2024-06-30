<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TLSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tlsRecords = TLS::all();
        return view('tls.index', compact('tlsRecords'));
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
        return view('tls.create', compact('schools'));
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
            'no_of_tls' => 'required|integer',
            'no_of_classes_in_tls' => 'required|integer',
        ]);

        // Create a new instance of TLS model
        TLS::create($validatedData);

        // Notify success message using notyf()
        notyf()->success('TLS record created successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('tls.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TLS  $tls
     * @return \Illuminate\Http\Response
     */
    public function edit(TLS $tls)
    {
        // Assuming you have a schools table to populate the school_id field in the form
        $schools = School::all(); // Adjust based on your actual school model and data
        return view('tls.edit', compact('tls', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TLS  $tls
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TLS $tls)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'school_id' => 'required|exists:schools,id',
            'no_of_tls' => 'required|integer',
            'no_of_classes_in_tls' => 'required|integer',
        ]);

        // Update the TLS record
        $tls->update($validatedData);

        // Notify success message using notyf()
        notyf()->success('TLS record updated successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('tls.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TLS  $tls
     * @return \Illuminate\Http\Response
     */
    public function destroy(TLS $tls)
    {
        // Delete the TLS record
        $tls->delete();

        // Notify success message using notyf()
        notyf()->success('TLS record deleted successfully.');

        // Optionally, redirect to a relevant route or return a response
        return redirect()->route('tls.index');
    }
}
