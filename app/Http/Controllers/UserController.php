<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Models\District;
use App\Models\Division;
use App\Models\Region;
use App\Models\School;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = User::where('role', '!=', 'super_admin');

        if ($search) {
            $query->where('first_name', 'like', '%' . $search . '%')
                ->orWhere('last_name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }
        $paginatedUsers = $query->orderBy('created_at', 'desc')->paginate(10);

        // $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('paginatedUsers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::select('id', 'name')->get();
        return view('admin.users.create', compact('regions'));
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
        // dd($request->all());
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->school_id = $request->school_id ?? null;
        $user->password = Hash::make($temp_password);
        $user->save();

        notyf()->success('User created successfully.');

        return redirect('users')->with([
            'status' => 'Success',
            'message' => 'User created successfully!',
            'email' => $user->email,
            'temp_password' => $temp_password],
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user)
    {

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // $user = User::where('id', $user)->first();
        $regions = Region::select('id', 'name')->get();
        $divisions = Division::select('id', 'name')->get();
        $districts = District::select('id', 'name')->get();
        $schools = School::select('id', 'name')->get();
        return view('admin.users.edit', compact('user', 'regions', 'divisions', 'districts', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Update the region with validated data
        $user->update($request->all());

        notyf()->success('User updated successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = User::findOrFail($id);
            $data->delete();
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'User deleted successfully!']);
        }
        return redirect()->route('users.index');
    }

    public function search(Request $request)
    {
        // dd($request->get('search'));
        $users = User::where('first_name', 'like', "%{$request->search}%")
            ->orWhere('last_name', 'like', "%{$request->search}%")
            ->orWhere('email', 'like', "%{$request->search}%")
            ->get();
        return view('admin.users.all-users', ['users' => $users->paginate(10)]);
    }

    public function deleteMultiple(Request $request)
    {
        $userIds = $request->input('user_ids');

        if (!empty($userIds)) {
            User::whereIn('id', $userIds)->delete();
            return response()->json(['icon' => 'success', 'title' => 'Success!', 'message' => 'Selected users have been deleted!']);
        }

        return response()->json(['error' => 'No users selected for deletion.'], 400);
    }

    public function resetPassword(Request $request)
    {
        // dd($request->id);

        $temp_password = Str::random(6);

        $user = User::findOrFail($request->id);
        $user->password = Hash::make($temp_password);
        $user->save();
        notyf()->info('User password resetted successfully.');
        return redirect()->back()->with([
            'status' => 'Info',
            'message' => 'User password resetted successfully!',
            'email' => $user->email,
            'temp_password' => $temp_password],
        );
    }

    public function exportExcelUser()
    {
        return Excel::download(new UserExport, time() . '-users.xlsx');
    }

    public function exportPdfUser()
    {
        $users = User::all();
        $pdf = Pdf::loadView('admin.users.export-users', ['users' => $users]);
        return $pdf->stream('user-details.pdf');

    }
}
