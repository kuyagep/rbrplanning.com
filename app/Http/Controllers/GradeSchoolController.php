<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\School;
use Illuminate\Http\Request;

class GradeSchoolController extends Controller
{
    /**
     * Display a listing of the grades with their associated schools.
     *
     *
     */
    public function index()
    {
        // Fetch all grades with their associated schools
        $grades = Grade::with('schools')->get();

        return view('admin.grades.index', ['grades' => $grades]);
    }

    /**
     * Store a newly created grade in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeGrade(Request $request)
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
    public function showGrade(Grade $grade)
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
    public function updateGrade(Request $request, Grade $grade)
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
    public function destroyGrade(Grade $grade)
    {
        // Delete the grade
        $grade->delete();

        return response()->json(null, 204);
    }

    /**
     * Store a newly created school in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeSchool(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|unique:schools,name',
        ]);

        // Create a new school
        $school = School::create($request->only('name'));

        return response()->json($school, 201);
    }

    /**
     * Display the specified school.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\JsonResponse
     */
    public function showSchool(School $school)
    {
        return response()->json($school);
    }

    /**
     * Update the specified school in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSchool(Request $request, School $school)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|unique:schools,name,' . $school->id,
        ]);

        // Update the school
        $school->update($request->only('name'));

        return response()->json($school);
    }

    /**
     * Remove the specified school from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroySchool(School $school)
    {
        // Delete the school
        $school->delete();

        return response()->json(null, 204);
    }

    /**
     * Attach a school to a grade (create the relationship).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\JsonResponse
     */
    public function attachSchool(Request $request, Grade $grade)
    {
        // Validate the request data
        $request->validate([
            'school_id' => 'required|exists:schools,id',
        ]);

        // Attach the school to the grade (create the relationship)
        $grade->schools()->attach($request->school_id);

        // Reload the grade with updated relationships
        $grade->load('schools');

        return response()->json($grade);
    }

    /**
     * Detach a school from a grade (delete the relationship).
     *
     * @param  \App\Models\Grade  $grade
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function detachSchool(Grade $grade, School $school)
    {
        // Detach the school from the grade (delete the relationship)
        $grade->schools()->detach($school->id);

        return response()->json(null, 204);
    }
}
