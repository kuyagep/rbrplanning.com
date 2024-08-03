<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Models\Section;

class SF4Controller extends Controller
{
    public function index()
    {
        return view('user-panel.sf4.index');
    }

    public function create()
    {
        $schools = Section::all();
        $schoolYears = SchoolYear::all();
        return view('user-panel.sf4.create', compact('schools', 'schoolYears'));
    }
}
