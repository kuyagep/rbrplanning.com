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
                        <div class="card-header bg-primary text-white">
                            Employee Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Employee Number:</div>
                                <div class="col-md-8">{{ $personnel->employee_number }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Item Number:</div>
                                <div class="col-md-8">{{ $personnel->item_number }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Name:</div>
                                <div class="col-md-8">{{ $personnel->first_name }} {{ $personnel->middle_name }}
                                    {{ $personnel->last_name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Birth Date:</div>
                                <div class="col-md-8">{{ \Carbon\Carbon::parse($personnel->birth_date)->format('F d, Y') }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Mobile Number:</div>
                                <div class="col-md-8">{{ $personnel->mobile_number }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">DepEd Email:</div>
                                <div class="col-md-8">{{ $personnel->deped_email }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Sex:</div>
                                <div class="col-md-8">{{ $personnel->sex }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Employment Status:</div>
                                <div class="col-md-8">{{ $personnel->employmentStatus->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Position:</div>
                                <div class="col-md-8">{{ $personnel->position->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">School:</div>
                                <div class="col-md-8">{{ $personnel->school->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Funding Source:</div>
                                <div class="col-md-8">{{ $personnel->fundingSource->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Remarks:</div>
                                <div class="col-md-8">{{ $personnel->remarks }}</div>
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('user.personnels.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <a href="{{ route('user.personnels.edit', $personnel->id) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
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
