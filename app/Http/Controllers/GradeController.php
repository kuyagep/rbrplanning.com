<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the grades with their associated schools.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Fetch all grades with their associated schools
        $grades = Grade::with('schools')->get();

        return response()->json($grades);
    }

    /**
     * Store a newly created grade in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|unique:grades,name',

        ]);

        // Create a new grade
        $grade = Grade::create($request->only('name'));

        return response()->json($grade, 201);
    }

    /**
     * Display the specified grade with its associated schools.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Grade $grade)
    {
        // Load the grade with its associated schools
        $grade->load('schools');

        return response()->json($grade);
    }

    /**
     * Update the specified grade in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Grade $grade)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|unique:grades,name,' . $grade->id,
        ]);

        // Update the grade
        $grade->update($request->only('name'));

        return response()->json($grade);
    }

    /**
     * Remove the specified grade from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        // Delete the grade
        $grade->delete();

        return response()->json(null, 204);
    }
}
