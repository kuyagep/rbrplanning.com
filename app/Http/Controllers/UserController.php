<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.all-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create-users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $temp_password = Str::random(6);
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/|max:255',
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($temp_password);
        $user->save();

        return redirect('users')->with([
            'status' => 'Success',
            'message' => 'User created successfully!',
            'email' => $user->email,
            'temp_password' => $temp_password],

        );
        // return redirect('all.user')->route('all.user', compact(['temp_password', 'user']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        return view('admin.users.view-users', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = User::where('id', $request->id)->first();

        return view('admin.users.edit-users', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $data = User::findOrFail($id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('all.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = User::findOrFail($id)->delete();

        return redirect()->route('all.user');
    }
}
