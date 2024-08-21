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
                        <h6 class="pd-0 mg-0 text-10">Existing Building</h6>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Existing Building</span>
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
            <div class="row">
                <div class="col-6">
                    <a href="{{ route('user.existing-buildings.create') }}" class="btn btn-primary">
                        Add Submission Report</a>
                </div>
                <div class="col-6">
                    <form action="{{ route('user.existing-buildings.index') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="search"> Reports by School Year</label>
                                            <div class="input-group">
                                                <select name="search" id="search" class="form-control custom-select">
                                                    <option value="">--Select School Year--</option>
                                                    @foreach ($schoolYears as $schoolYear)
                                                        <option value="{{ $schoolYear->id }}"
                                                            {{ $schoolYear->id == request('search') ? 'selected' : '' }}>
                                                            {{ $schoolYear->school_year }}</option>
                                                    @endforeach
                                                </select>

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-lg btn-primary">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h6>Reports for School Year:
                @foreach ($school_year as $year)
                    <span class="badge badge-primary">{{ $year->school_year }}</span>
                @endforeach
            </h6>
            <div class="card">
                <div class="card-header">Inventory of School Buildings</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr>
                                <th>School</th>
                                <th>Good Condition</th>
                                <th>Minor Repair</th>
                                <th>Major Repair</th>
                                <th>Condemnation/Demolition</th>
                                <th>Ongoing Construction</th>
                                <th>For Completion</th>
                                <th>Timestamps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory_of_school_buildings as $inventory_of_school_building)
                                <tr>
                                    <td>{{ $inventory_of_school_building->school->name ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->good_condition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->minor_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->major_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->condemnation_demolition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->on_going_contruction ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->for_completion ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->created_at->format('F j, Y g:i A') ?? 'N/A' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">TLS (Temporary Learning Spaces)</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr>
                                <th>School</th>
                                <th>No. of TLS</th>
                                <th>No. of Classes in TLS</th>
                                <th>Timestamps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tlsReports as $tls)
                                <tr>
                                    <td>{{ $tls->school->name ?? 'N/A' }}</td>
                                    <td>{{ $tls->no_of_tls ?? 'N/A' }}</td>
                                    <td>{{ $tls->no_of_classes_in_tls ?? 'N/A' }}</td>
                                    <td>{{ $tls->created_at->format('F j, Y g:i A') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    MakeShift Rooms
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr>
                                <th>School</th>
                                <th>No. of MakeShift Rooms</th>
                                <th>No. of Classes in MakeShift Rooms</th>
                                <th>Timestamps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($makeShiftReports as $makeShift)
                                <tr>
                                    <td>{{ $makeShift->school->name ?? 'N/A' }}</td>
                                    <td>{{ $makeShift->no_of_makeshift_rooms ?? 'N/A' }}</td>
                                    <td>{{ $makeShift->no_of_classes_in_makeshift_rooms ?? 'N/A' }}</td>
                                    <td>{{ $makeShift->created_at->format('F j, Y g:i A') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Inventory of Classrooms</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr>
                                <th>School</th>
                                <th>Good Condition</th>
                                <th>Minor Repair</th>
                                <th>Major Repair</th>
                                <th>Condemnation/Demolition</th>
                                <th>Ongoing Construction</th>
                                <th>For Completion</th>
                                <th>Timestamps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classroomReports as $classroom)
                                <tr>
                                    <td>{{ $classroom->school->name ?? 'N/A' }}</td>
                                    <td>{{ $classroom->good_condition ?? 'N/A' }}</td>
                                    <td>{{ $classroom->minor_repair ?? 'N/A' }}</td>
                                    <td>{{ $classroom->major_repair ?? 'N/A' }}</td>
                                    <td>{{ $classroom->comdemnation_demolition ?? 'N/A' }}</td>
                                    <td>{{ $classroom->on_going_construction ?? 'N/A' }}</td>
                                    <td>{{ $classroom->for_completion ?? 'N/A' }}</td>
                                    <td>{{ $classroom->created_at->format('F j, Y g:i A') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header">Inventory of Furniture</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-danger">
                            <tr>
                                <th>School</th>
                                <th>Kinder Modular Table</th>
                                <th>Kinder Chair</th>
                                <th>Arm Chair</th>
                                <th>School Desk</th>
                                <th>Other Classroom Table</th>
                                <th>Other Classroom Chair</th>
                                <th>Sets of Tables and Chairs</th>
                                <th>Timestamps</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($furnitureReports as $furniture)
                                <tr>
                                    <td>{{ $furniture->school->name ?? 'N/A' }}</td>
                                    <td>{{ $furniture->kinder_modular_table ?? 'N/A' }}</td>
                                    <td>{{ $furniture->kinder_chair ?? 'N/A' }}</td>
                                    <td>{{ $furniture->arm_chair ?? 'N/A' }}</td>
                                    <td>{{ $furniture->school_desk ?? 'N/A' }}</td>
                                    <td>{{ $furniture->other_classroom_table ?? 'N/A' }}</td>
                                    <td>{{ $furniture->other_classroom_chair ?? 'N/A' }}</td>
                                    <td>{{ $furniture->sets_of_tables_and_chairs ?? 'N/A' }}</td>
                                    <td>{{ $furniture->created_at->format('F j, Y g:i A') ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
