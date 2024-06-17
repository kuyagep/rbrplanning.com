@extends('layouts.dashboard.main')
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
                            <h5>Division Details</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Division Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"></div>
                        <table id="" class="table table-striped table-bordered nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $division->id ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>Division</td>
                                    <td>{{ $division->division_name }}</td>
                                </tr>
                                <tr>
                                    <td>Region</td>
                                    <td>{{ $division->regions->name }}</td>
                                </tr>

                            </tbody>
                        </table>
                        <a onclick="history.back()" class="btn btn-secondary"><i class="ik ik-chevron-left"></i> Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- script --}}
@endsection
