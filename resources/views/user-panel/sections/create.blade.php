@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Add Section</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Section</li>
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
                            <h6>Add Section</h6>
                        </div>
                        <div class="card-body">
                            <form id="form" method="post" class="needs-validation"
                                action="{{ route('sections.store') }}" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="grade" class="col-sm-3 col-form-label text-lg-right">Grade
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control  @error('grade') is-invalid @enderror"
                                            style="width: 100%;" id="grade" name="grade">
                                            <option value="">Choose...</option>
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('grade')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <label for="section_name" class="col-sm-3 col-form-label text-lg-right">
                                        Section Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('section_name') is-invalid @enderror"
                                            id="section_name" name="section_name" value="{{ old('section_name') }}">
                                        @error('section_name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Create Section</button>
                                        <a href="{{ route('sections.index') }}" class="btn btn-light">Back</a>
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
