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
                        <h4 class="pd-0 mg-0 text-10">Section</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Section</span>
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
            <form action="{{ route('sections.index') }}" method="GET">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control" placeholder="Search sections" name="search"
                                    id="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('sections.create') }}" class="btn btn-danger mb-3">Add Section</a>
                            <div class="table-data">
                                <div class="table-responsive">
                                    <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                        <thead class="bg-danger">
                                            <tr>
                                                <th>Grade Level</th>
                                                <th>Section Name</th>
                                                <th class="nosort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sections as  $section)
                                                <tr>
                                                    <td>{{ $section->grade->name }}</td>
                                                    <td>{{ $section->section_name }}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{ route('sections.show', $section->id) }}"
                                                                class="btn btn-sm btn-info" title="View">
                                                                <i class="fas fa-search"></i>
                                                            </a>
                                                            <a href="{{ route('sections.edit', $section->id) }}"
                                                                class="btn btn-sm btn-primary" title="Edit">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <button class="btn btn-sm btn-danger" title="Delete"
                                                                data-id="{{ $section->id }}" id="deleteButton">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
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

                var sectionID = $(this).data('id');
                var route = "{{ route('sections.destroy', ':id') }}".replace(':id', sectionID);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this section?",
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
