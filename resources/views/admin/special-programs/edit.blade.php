@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Special Programs</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Special Programs</li>
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
                            <h3>Edit Special Programs</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation"
                                action="{{ route('special-programs.update', $special_program->id) }}" novalidate
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" id="id" value="{{ $special_program->id }}">

                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">Special Programs</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $special_program->name) }}" required>
                                        <div class="invalid-feedback">
                                            Please provide a special program name.
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <a href="{{ route('special-programs.index') }}" class="btn btn-secondary"><i
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
