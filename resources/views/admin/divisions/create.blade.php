@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Division</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Division</li>
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
                            <h3>Add Division</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{ route('divisions.store') }}"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-9">
                                        <select class="form-control custom-select" id="region_id" name="region_id">
                                            <option>Choose...</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Division</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <button type="submit" id="btn-save" class="btn btn-primary mr-2">
                                    <i class="fas fa-save"></i> Create Region
                                </button>
                                <a onclick="history.back()" class="btn btn-light">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </form>
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
