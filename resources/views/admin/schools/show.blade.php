@extends('admin.layouts.master')
@section('style')
    {{-- style --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>School Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $school->name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{ asset('uploads/logos/' . $school->logo) }}" class="img-fluid" alt="School Logo">
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
                                            <td>{{ $school->district->division->division_name }}</td>
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
@endsection
@section('script')
    {{-- script --}}
@endsection
