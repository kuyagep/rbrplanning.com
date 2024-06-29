@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Position</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Position</li>
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
                            <h3>Position Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive"></div>
                            <table id="" class="table table-striped table-bordered nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $position->id ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Position</td>
                                        <td>{{ $position->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Category</td>
                                        <td>{{ $position->positionCategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>{{ $position->employmentStatus->name }}</td>
                                    </tr>

                                </tbody>
                            </table>
                            <a href="{{ route('positions.index') }}" class="btn btn-secondary">
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
