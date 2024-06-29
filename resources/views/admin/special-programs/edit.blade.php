@extends('admin.layouts.master')

@section('style')
    {{-- Add any custom styles if needed --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Edit Special Programs</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Special Programs</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" action="{{ route('regions.update', $region->id) }}"
                            novalidate enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="id" id="id" value="{{ $region->id }}">

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Region Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $region->name) }}" required>
                                    <div class="invalid-feedback">
                                        Please provide a region name.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <a href="{{ route('regions.index') }}" class="btn btn-secondary"><i
                                            class="ik ik-chevron-left"></i> Back</a>
                                    <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- Add any custom scripts if needed --}}
@endsection
