@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Schools</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Schools</li>
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
                            <h4>{{ $school->name }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('uploads/logos/' . $school->logo) }}" class="img-fluid"
                                        alt="School Logo">
                                </div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Region</th>
                                                <td>{{ $school->district->division->region->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Division</th>
                                                <td>{{ $school->district->division->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">District</th>
                                                <td>{{ $school->district->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">School ID</th>
                                                <td>{{ $school->school_id }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">School CODE</th>
                                                <td>{{ $school->code }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Address</th>
                                                <td>{{ $school->address }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Mobile Number</th>
                                                <td>{{ $school->mobile_number }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">School Email</th>
                                                <td>{{ $school->school_email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">School Description</th>
                                                <td>{{ $school->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('schools.index') }}" class="btn btn-primary">Back</a>
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
