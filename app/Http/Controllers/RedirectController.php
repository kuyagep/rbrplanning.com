<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) { //checking if it is authenticated
            return Redirect::to('/login');
        }

        if (auth()->user()->role == 'super_admin') {
            return Redirect::to('/dashboard');
        }

        if (auth()->user()->role == 'admin') {
            return Redirect::to('/dashboard');
        }

        if (auth()->user()->role == 'user') {
            return Redirect::to('/user/dashboard');
        }

        // return abort(403, 'Unauthorized');
    }
}
