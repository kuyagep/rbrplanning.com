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
                            <h5>Add Position</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if (session('status') == 'Success')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('status') == 'Error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>Validation Errors:</strong></h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Add Position</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" action="{{ route('divisions.store') }}" novalidate=""
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="position_category_id" class="col-sm-3 col-form-label">Position Category</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="position_category_id" name="position_category_id">
                                        <option>Select Position Category</option>
                                        @foreach ($position_categories as $position)
                                            <option value="{{ $position->id }}">{{ $position->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Position Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}">

                                </div>
                            </div>


                            <button type="submit" id="btn-save" class="btn btn-primary mr-2">Create Position</button>
                            <a href="{{ route('positions.index') }}" class="btn btn-light">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
