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
        } else {
            return Redirect::to('/dashboard');
        }
    }
}
