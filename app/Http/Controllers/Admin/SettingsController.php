<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {

        $title = 'System Settings';
        $data = 'Setup system settings';
        return view('admin.settings.index', compact('title', 'data'));
    }
}
