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
                            <h5>Extension School Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        School ID: {{ $ex_school->id }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $ex_school->name }}</h5>
                        <p class="card-text"><strong>Region:</strong>
                            {{ $ex_school->school->district->division->region->name }}</p>
                        <p class="card-text"><strong>Division:</strong>
                            {{ $ex_school->school->district->division->name }}
                        </p>
                        <p class="card-text"><strong>District:</strong> {{ $ex_school->school->district->name }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $ex_school->address }}</p>
                        <p class="card-text"><strong>Mobile Number:</strong> {{ $ex_school->mobile_number }}</p>
                        <p class="card-text"><strong>Email:</strong> {{ $ex_school->school_email }}</p>
                        <p class="card-text"><strong>Ext. School ID:</strong> {{ $ex_school->schoolid }}</p>
                        <p class="card-text"><strong>Ext. School Name:</strong> {{ $ex_school->school_name }}</p>
                        @if ($ex_school->logo)
                            <p class="card-text"><strong>Logo:</strong></p>
                            <img src="{{ asset('uploads/logos/' . $ex_school->logo) }}" alt="School Logo"
                                style="max-width: 200px;">
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('extension-schools.index') }}" class="btn btn-primary mt-3">Back to
                                    List</a>
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
