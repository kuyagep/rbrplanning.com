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
                        <h4 class="pd-0 mg-0 text-10">Inventory Report by School Year</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Inventory Report by School Year</span>
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
            <h1>Reports for School Year: {{ $schoolYear->school_year }}</h1>

            <h2>Inventory of School Buildings</h2>
            <table class="table">
                <thead>
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
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->school->name }}</td>
                            <td>{{ $report->good_condition }}</td>
                            <td>{{ $report->minor_repair }}</td>
                            <td>{{ $report->major_repair }}</td>
                            <td>{{ $report->condemnation_demolition }}</td>
                            <td>{{ $report->on_going_contruction }}</td>
                            <td>{{ $report->for_completion }}</td>
                            <td>{{ $report->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>TLS (Temporary Learning Spaces)</h2>
            <table class="table">
                <thead>
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
                            <td>{{ $tls->school->name }}</td>
                            <td>{{ $tls->no_of_tls }}</td>
                            <td>{{ $tls->no_of_classes_in_tls }}</td>
                            <td>{{ $tls->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>MakeShift Rooms</h2>
            <table class="table">
                <thead>
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
                            <td>{{ $makeShift->school->name }}</td>
                            <td>{{ $makeShift->no_of_makeshift_rooms }}</td>
                            <td>{{ $makeShift->no_of_classes_in_makeshift_rooms }}</td>
                            <td>{{ $makeShift->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Inventory of Classrooms</h2>
            <table class="table">
                <thead>
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
                            <td>{{ $classroom->school->name }}</td>
                            <td>{{ $classroom->good_condition }}</td>
                            <td>{{ $classroom->minor_repair }}</td>
                            <td>{{ $classroom->major_repair }}</td>
                            <td>{{ $classroom->comdemnation_demolition }}</td>
                            <td>{{ $classroom->on_going_construction }}</td>
                            <td>{{ $classroom->for_completion }}</td>
                            <td>{{ $classroom->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Inventory of Furniture</h2>
            <table class="table">
                <thead>
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
                            <td>{{ $furniture->school->name }}</td>
                            <td>{{ $furniture->kinder_modular_table }}</td>
                            <td>{{ $furniture->kinder_chair }}</td>
                            <td>{{ $furniture->arm_chair }}</td>
                            <td>{{ $furniture->school_desk }}</td>
                            <td>{{ $furniture->other_classroom_table }}</td>
                            <td>{{ $furniture->other_classroom_chair }}</td>
                            <td>{{ $furniture->sets_of_tables_and_chairs }}</td>
                            <td>{{ $furniture->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

            // Fetch divisions based on selected region
            $('#region_id').change(function() {
                var regionId = $(this).val();
                if (regionId) {
                    $.ajax({
                        url: '{{ route('fetch.divisions') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            region_id: regionId
                        },
                        success: function(data) {
                            $('#division_id').empty();
                            $('#division_id').append(
                                '<option value="">Select Division</option>');
                            $.each(data.divisions, function(key, value) {
                                $('#division_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#division_id').empty();
                }
            });


            // Fetch districts based on selected division
            $('#division_id').change(function() {
                var divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: '{{ route('fetch.districts') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            division_id: divisionId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#district_id').empty();
                            $('#district_id').append(
                                '<option value="">Select District</option>');
                            $.each(data.districts, function(key, value) {
                                $('#district_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">Select District</option>');
                }
            });

            // Fetch schools based on selected district
            $('#district_id').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '{{ route('fetch.schools') }}',
                        type: 'POST',
                        data: {
                            district_id: districtId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#school_id').empty();
                            $('#school_id').append('<option value="">Select School</option>');
                            $.each(data.schools, function(key, value) {
                                $('#school_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#school_id').empty();
                    $('#school_id').append('<option value="">Select School</option>');
                }
            });
        });
    </script>
@endsection
