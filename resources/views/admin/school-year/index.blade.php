@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">School Year</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">School Year</span>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-xs-12 pull-right">
                                    <a href="{{ route('school-year.create') }}" class="btn btn-dark mb-2 ">
                                        <i class="ik ik-user-plus"></i>
                                        Add School Year</a>

                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <form action="{{ route('school-year.index') }}" method="GET"
                                        class="form-inline float-right">
                                        @csrf
                                        <input type="text" name="search" value="{{ request('search') }}" id="search"
                                            class="form-control mb-2 mr-sm-2" placeholder="Search school-year...">

                                        <button type="submit" class="btn btn-primary mb-2">
                                            <i class="ik ik-search"></i> Search</button>
                                    </form>

                                </div>
                            </div>
                            <div class="table-data">
                                <div class="table-responsive">
                                    <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>

                                                <th>ID</th>
                                                <th>School Year</th>
                                                <th class="nosort">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($paginated as  $school_year)
                                                <tr>

                                                    <td>{{ $school_year->id }}</td>
                                                    <td>{{ $school_year->school_year }}</td>

                                                    <td class="text-center">
                                                        <div class="table-actions ">
                                                            <a href="{{ url('/school-year', $school_year->id) }}"><i
                                                                    class="ik ik-eye"></i></a>
                                                            <a href="{{ route('school-year.edit', $school_year->id) }}"><i
                                                                    class="ik ik-edit-2"></i></a>
                                                            <a href="#" data-id="{{ $school_year->id }}"
                                                                id="deleteButton"><i class="ik ik-trash-2"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">No data found!</td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>
                                    {{ $paginated->appends(['search' => request('search')])->links() }}
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

            // Delete Function
            $('table').on('click', '#deleteButton', function(e) {
                e.preventDefault();

                var schoolYearID = $(this).data('id');
                var route = "{{ route('school-year.destroy', ':id') }}".replace(':id', schoolYearID);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this school years?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: route,
                            dataType: 'json',
                            success: function(response) {
                                // location.reload();
                                $('.table').load(location.href + ' .table');

                                Swal.fire({
                                    icon: response.icon,
                                    title: response.title,
                                    text: response.message,
                                    timer: 2000
                                });
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred. Please try again.',
                                    timer: 2000
                                });
                            }
                        });
                    }
                });
            });

        });
    </script>
@endsection
