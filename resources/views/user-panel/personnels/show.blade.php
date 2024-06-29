@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Personnel Details</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Personnel Details</li>
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
                        <div class="card-header">Employee Details</div>

                        <div class="card-body">
                            <h5>Employee Number: {{ $personnel->employee_number }}</h5>
                            <h5>Item Number: {{ $personnel->item_number }}</h5>
                            <h5>Name: {{ $personnel->first_name }} {{ $personnel->middle_name }} {{ $personnel->last_name }}
                            </h5>
                            <h5>Birth Date: {{ $personnel->birth_date }}</h5>
                            <h5>Mobile Number: {{ $personnel->mobile_number }}</h5>
                            <h5>DepEd Email: {{ $personnel->deped_email }}</h5>
                            <h5>Sex: {{ $personnel->sex }}</h5>
                            <h5>Employment Status: {{ $personnel->employmentStatus->name }}</h5>
                            <h5>Position: {{ $personnel->position->name }}</h5>
                            <h5>School: {{ $personnel->school->name }}</h5>
                            <h5>Funding Source: {{ $personnel->fundingSource->name }}</h5>
                            <h5>Remarks: {{ $personnel->remarks }}</h5>

                            <a href="{{ route('user.personnels.index') }}" class="btn btn-secondary">Back to List</a>
                            <a href="{{ route('user.personnels.edit', $personnel->id) }}" class="btn btn-primary">Edit</a>
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
