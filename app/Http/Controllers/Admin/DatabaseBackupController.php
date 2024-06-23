<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DatabaseBackupController extends Controller
{
    public function index(Request $request)
    {

        $title = 'Database Backup';
        $data = 'Backup Database here!';
        return view('admin.backup.index', compact('title', 'data'));
    }
}
