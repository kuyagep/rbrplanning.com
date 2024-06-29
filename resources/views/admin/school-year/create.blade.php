@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>School Year</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">School Year</li>
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
                            <h3>Add School Year</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{ route('school-year.store') }}"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="school_year" class="col-sm-3 col-form-label">School Year</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="school_year" name="school_year"
                                            value="{{ old('school_year') }}" required>
                                        @error('school_year')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" id="btn-save" class="btn btn-primary mr-2">Create School
                                    Year</button>
                                <a href="{{ route('school-year.index') }}" class="btn btn-light">Back</a>
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
