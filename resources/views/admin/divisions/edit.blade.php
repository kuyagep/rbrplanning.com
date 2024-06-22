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
                            <h5>Edit Region</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0 "><strong>{{ session('message') }}</strong></h6>


                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Edit Region</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12">
                                <form method="post" class="needs-validation"
                                    action="{{ route('divisions.update', $division->id) }}" novalidate=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="id" id="id" value="{{ $division->id }}">

                                    <div class="form-group row">
                                        <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="region_id" name="region_id">
                                                <option>Choose...</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}"
                                                        {{ $region->id == $division->region_id ? 'selected' : '' }}>
                                                        {{ $region->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Division</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $division->name) }}">
                                        </div>
                                    </div>

                                    <a href="{{ route('divisions.index') }}" class="btn btn-secondary float-right"><i
                                            class="ik ik-chevron-left"></i>Back</a>
                                    <button type="submit" class="btn btn-primary mr-2 float-right"><i
                                            class="ik ik-save"></i>
                                        Update</button>
                                </form>
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
