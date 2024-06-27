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
                            <h5>User Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>User Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"></div>
                        <table id="" class="table table-striped table-bordered nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $user->id ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>School</td>
                                    <td>{{ $user->school->name ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary"><i class="ik ik-chevron-left"></i>
                            Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- script --}}
@endsection
