<?php

namespace App\Http\Controllers;

use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\SF4;
use Illuminate\Http\Request;

class SF4Controller extends Controller
{
    public function index()
    {

        // Fetch the reports, with related school year and section data
        $reports = SF4::with(['school_year', 'section'])
            ->orderBy('created_at', 'desc') // Optional: to display the latest reports first
            ->paginate(10); // Paginate results
        return view('user-panel.sf4.index', compact('reports'));
        // return view('user-panel.sf4.index');
    }

    public function form()
    {
        $sections = Section::all();
        $schoolYears = SchoolYear::all();
        return view('user-panel.sf4.form', compact('sections', 'schoolYears'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'section_id' => 'required|exists:sections,id',
            'report_month' => 'required|date_format:Y-m', // Validate the month
            'registered_learners_male' => 'required|integer',
            'registered_learners_female' => 'required|integer',
            'daily_ave_male' => 'required|integer',
            'daily_ave_female' => 'required|integer',
            'percentage_for_the_month_male' => 'required|integer',
            'percentage_for_the_month_female' => 'required|integer',
            'dropped_out_previous_month_male' => 'required|integer',
            'dropped_out_previous_month_female' => 'required|integer',
            'dropped_out_end_of_month_male' => 'required|integer',
            'dropped_out_end_of_month_female' => 'required|integer',
            'transferred_out_previous_month_male' => 'required|integer',
            'transferred_out_previous_month_female' => 'required|integer',
            'transferred_out_end_of_month_male' => 'required|integer',
            'transferred_out_end_of_month_female' => 'required|integer',
            'transferred_in_previous_month_male' => 'required|integer',
            'transferred_in_previous_month_female' => 'required|integer',
            'transferred_in_end_of_month_male' => 'required|integer',
            'transferred_in_end_of_month_female' => 'required|integer',
        ]);

        $sectionId = $request->section_id;
        $reportMonth = $request->report_month . '-01'; // Convert to date format

        // Check if a report for the section and month already exists
        if (SF4::where('section_id', $sectionId)->where('report_month', $reportMonth)->exists()) {
            return redirect()->back()->withErrors(['report_month' => 'A report for this section and month already exists.']);
        }

        $report = new SF4;
        $report->section_id = $sectionId;
        $report->report_month = $reportMonth;
        $report->registered_learners_male = $request->registered_learners_male;
        $report->registered_learners_female = $request->registered_learners_female;
        $report->daily_ave_male = $request->daily_ave_male;
        $report->daily_ave_female = $request->daily_ave_female;
        $report->percentage_for_the_month_male = $request->percentage_for_the_month_male;
        $report->percentage_for_the_month_female = $request->percentage_for_the_month_female;
        $report->dropped_out_previous_month_male = $request->dropped_out_previous_month_male;
        $report->dropped_out_previous_month_female = $request->dropped_out_previous_month_female;
        $report->dropped_out_end_of_month_male = $request->dropped_out_end_of_month_male;
        $report->dropped_out_end_of_month_female = $request->dropped_out_end_of_month_female;
        $report->transferred_out_previous_month_male = $request->transferred_out_previous_month_male;
        $report->transferred_out_previous_month_female = $request->transferred_out_previous_month_female;
        $report->transferred_out_end_of_month_male = $request->transferred_out_end_of_month_male;
        $report->transferred_out_end_of_month_female = $request->transferred_out_end_of_month_female;
        $report->transferred_in_previous_month_male = $request->transferred_in_previous_month_male;
        $report->transferred_in_previous_month_female = $request->transferred_in_previous_month_female;
        $report->transferred_in_end_of_month_male = $request->transferred_in_end_of_month_male;
        $report->transferred_in_end_of_month_female = $request->transferred_in_end_of_month_female;
        $report->save();

        notyf()->success('Monthly report submitted successfully.');

        return redirect('user/sf4/form');
    }
}
