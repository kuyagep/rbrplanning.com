<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Personnel;
use App\Models\Region;
use App\Models\School;
use App\Models\User;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch the counts of each entity
        $regionCount = Region::count();
        $divisionCount = Division::count();
        $districtCount = District::count();
        $schoolCount = School::count();
        $personnelCount = Personnel::count();
        $userCount = User::count();

        // // Fetch the counts of male and female personnels
        // $malePersonnelCount = Personnel::where('sex', 'Male')->count();
        // $femalePersonnelCount = Personnel::where('sex', 'Female')->count();

        // // Fetch the counts of personnels by employment status
        // $personnelByStatus = Personnel::select('employment_status_id', DB::raw('count(*) as count'))
        //     ->groupBy('employment_status_id')
        //     ->get();

        // // Fetch the counts of schools by region
        // $schoolsByRegion = School::select('district_id', DB::raw('count(*) as count'))
        //     ->groupBy('district_id')
        //     ->where('district')
        //     ->get();

        // // Fetch the counts of schools by division
        // $schoolsByDivision = School::select('division_id', DB::raw('count(*) as count'))
        //     ->groupBy('division_id')
        //     ->get();

        // // Fetch the counts of schools by district
        // $schoolsByDistrict = School::select('district_id', DB::raw('count(*) as count'))
        //     ->groupBy('district_id')
        //     ->get();

        // // Fetch the counts of users by role
        // $usersByRole = User::select('role', DB::raw('count(*) as count'))
        //     ->groupBy('role')
        //     ->get();

        // // Fetch recent activities (dummy example, replace with actual logic)
        // $recentActivities = []; // Implement your own logic to fetch recent activities

        return view('admin.dashboard.index', compact(
            'regionCount',
            'divisionCount',
            'districtCount',
            'schoolCount',
            'personnelCount',
            'userCount',
            // 'malePersonnelCount',
            // 'femalePersonnelCount',
            // 'personnelByStatus',
            // 'schoolsByRegion',
            // 'schoolsByDivision',
            // 'schoolsByDistrict',
            // 'usersByRole',
            // 'recentActivities'
        ));

    }

}
