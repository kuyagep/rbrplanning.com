@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>District</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">District</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>District</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"></div>
                            <table id="" class="table table-striped table-bordered nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $district->id ?? '' }}</td>
                                    </tr>

                                    <tr>
                                        <td>District</td>
                                        <td>{{ $district->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Division</td>
                                        <td>{{ $district->division->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Region</td>
                                        <td>{{ $district->division->region->name }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <a href="{{ route('schools.index') }}" class="btn btn-secondary">
                                <i class="ik ik-chevron-left"></i>
                                Back
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function($) {
            // token header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });
    </script>
@endsection
