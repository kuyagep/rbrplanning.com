@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>District</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">District</li>
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
                            <h3>Edit District</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">
                                    <form method="post" class="needs-validation"
                                        action="{{ route('districts.update', $district->id) }}" novalidate=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" id="id" value="{{ $district->id }}">

                                        <div class="form-group row">
                                            <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="region_id" name="region_id">
                                                    <option>Choose...</option>
                                                    @foreach ($regions as $region)
                                                        <option value="{{ $region->id }}"
                                                            {{ $region->id == $district->division->region->id ? 'selected' : '' }}>
                                                            {{ $region->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="division_id" class="col-sm-3 col-form-label">Division</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="division_id" name="division_id">
                                                    <option>Choose...</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}"
                                                            {{ $division->id == $district->division->id ? 'selected' : '' }}>
                                                            {{ $division->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">District</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $district->name) }}">
                                            </div>
                                        </div>

                                        <a href="{{ route('districts.index') }}" class="btn btn-secondary float-right"><i
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

            // Fetch divisions based on selected region
            $('#region_id').change(function() {
                var regionId = $(this).val();
                if (regionId) {
                    $.ajax({
                        url: '{{ route('fetch.divisions') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            region_id: regionId
                        },
                        success: function(data) {
                            $('#division_id').empty();
                            $('#division_id').append('<option value="">Choose...</option>');
                            $.each(data.divisions, function(key, value) {
                                $('#division_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#division_id').empty();
                    $('#division_id').append('<option value="">Choose...</option>');
                }
            });


        });
    </script>
@endsection
