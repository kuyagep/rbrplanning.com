@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Dashboard</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Statistics</span>
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
                <!-- Total Regions -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Regions</h5>
                            <p class="card-text">{{ $regionCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Divisions -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Divisions</h5>
                            <p class="card-text">{{ $divisionCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Districts -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Districts</h5>
                            <p class="card-text">{{ $districtCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Schools -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Schools</h5>
                            <p class="card-text">{{ $schoolCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Personnels -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Personnels</h5>
                            <p class="card-text">{{ $personnelCount }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text">{{ $userCount }}</p>
                        </div>
                    </div>
                </div>


            </div>





        </div>

    </section>
@endsection
@section('script')
@endsection
