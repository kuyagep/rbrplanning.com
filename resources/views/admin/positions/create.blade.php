@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Position</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Position</li>
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
                            <h3>Add Position</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{ route('positions.store') }}"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="position_category_id" class="col-sm-3 col-form-label">Position
                                        Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="position_category_id" name="position_category_id">
                                            <option value="">Select Position Category</option>
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
                                <div class="form-group row">
                                    <label for="employment_status_id" class="col-sm-3 col-form-label">Employment Status
                                    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="employment_status_id" name="employment_status_id">
                                            <option value="">Select Employmet Status</option>
                                            @foreach ($employment_statuses as $employment_status)
                                                <option value="{{ $employment_status->id }}">
                                                    {{ $employment_status->name }}
                                                </option>
                                            @endforeach
                                        </select>
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

            $('#track_id').change(function() {
                var trackID = $(this).val();
                if (trackID) {
                    $.ajax({
                        url: '{{ route('fetch.strands') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            track_id: trackID
                        },
                        success: function(data) {
                            $('#strand_id').empty();
                            $('#strand_id').append('<option value="">Choose...</option>');
                            $.each(data.strands, function(key, value) {
                                $('#strand_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#strand_id').empty();
                    $('#strand_id').append('<option value="">Choose...</option>');
                }
            });
        });
    </script>
@endsection
