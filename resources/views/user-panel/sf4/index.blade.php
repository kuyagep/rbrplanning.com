@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Personnel</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Personnel</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">

                    <a href=""
                        class="btn btn-sm btn-default mr-2 d-none d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i class="fa fa-regular fa-file-excel"></i>
                        Export as Excel
                    </a>
                    <a href="" target="_blank"
                        class="btn btn-sm btn-default mr-2 mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force"
                        style="margin-right: 5px;">
                        <i class="fa fa-download"></i>
                        Generate PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h6>School Form 4 (SF4) Monthly Learner's Movement and Attendance</h6>
            <p>(This replaced Form 3 & STS Form 4-Absenteeism and Dropout Profile)</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>School ID: {{ Auth::user()->school->school_id }}</td>
                                    <td>Region: {{ Auth::user()->school->district->division->region->name }}</td>
                                    <td>Division: {{ Auth::user()->school->district->division->name }}</td>
                                    <td>District: {{ Auth::user()->school->district->name }}</td>
                                </tr>
                                <tr>
                                    <td>School Name: {{ Auth::user()->school->name }}</td>
                                    <td>School Year: </td>
                                    <td>Report for the Month of </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('user.sf4.form') }}" class="btn btn-danger mb-3">
                                Submit New SF4</a>
                            <div class="table-data">
                                <div class="table-responsive">
                                    <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                        <thead class="bg-danger">
                                            <tr>
                                                <th>School Year</th>
                                                <th>Section</th>
                                                <th>Month</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($reports as $report)
                                                <tr>
                                                    <td>{{ $report->school_year->school_year ?? 'N/A' }}</td>
                                                    <td>{{ $report->section->section_name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($report->month)->format('F Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('user.sf4.showDetails', $report->id) }}"
                                                            class="btn btn-info btn-sm">View</a>
                                                        <a href="{{ route('user.sf4.edit', $report->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form action="{{ route('user.sf4.destroy', $report->id) }}"
                                                            method="POST" class="d-inline-block"
                                                            onsubmit="return confirm('Are you sure you want to delete this report?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">No reports found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <!-- Pagination Links -->
                                    <div class="mt-3">
                                        {{ $reports->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Token header setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection
