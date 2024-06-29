@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Extension School</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Extension School</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            School Information
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Ext. School ID: {{ $ex_school->id }}</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> {{ $ex_school->name }}</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                            Address: {{ $ex_school->address }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Mobile Number: {{ $ex_school->mobile_number }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>
                                            Email: {{ $ex_school->school_email }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-globe"></i></span>
                                            Region: {{ $ex_school->school->district->division->region->name }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-globe"></i></span>
                                            Division: {{ $ex_school->school->district->division->name }}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-globe"></i></span>
                                            District: {{ $ex_school->school->district->name }}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    @if ($ex_school->logo)
                                        <img src="{{ asset('uploads/logos/' . $ex_school->logo) }}" alt="School Logo"
                                            class="img-circle img-fluid"
                                            style="width: 100px; height: 100px; border-radius: 50%, object-fit: center;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="{{ route('extension-schools.index') }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
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
