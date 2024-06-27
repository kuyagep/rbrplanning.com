<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {

        $title = 'Reports';
        $data = 'Generate reports coming soon!';
        return view('admin.reports.index', compact('title', 'data'));
    }
}
