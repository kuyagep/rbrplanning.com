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
                            <h5>Add District</h5>
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
                        <h3>Add District</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" class="needs-validation" action="{{ route('districts.store') }}"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="region_id" name="region_id">
                                        <option>Choose...</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
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
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('division_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">District</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('name')
                                       is-invalid
                                    @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required="true">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" id="btn-save" class="btn btn-primary mr-2">Create District</button>
                            <a href="{{ route('districts.index') }}" class="btn btn-light">Back</a>
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

            // Fetch divisions based on selected region
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
                                    '">' + value.division_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#division_id').empty();
                    $('#division_id').append('<option value="">Choose...</option>');
                }
            });

            // Create Function
            // $('#form').submit(function(e) {
            //     e.preventDefault();

            //     $('#btn-save').html('Sending...');

            //     // Serialize the form data using FormData
            //     let formData = new FormData($('#form')[0]);

            //     // Send the form data via AJAX using jQuery store function
            //     $.ajax({
            //         // Replace with your route URL
            //         type: 'POST',
            //         url: "{{ route('store.user') }}",
            //         data: formData,
            //         cache: false,
            //         contentType: false,
            //         processData: false,
            //         success: (response) => {
            //             // Handle the response from the server (if needed)
            //             $('#btn-save').html('Submitted');
            //             $('#form').trigger("reset");

            //             // Display the message on the page
            //             Swal.fire({
            //                 icon: response.icon,
            //                 title: response.title,
            //                 text: response.message,
            //                 timer: 2000
            //             });
            //         },
            //         error: (response) => {
            //             // Handle the error (if needed)
            //             $('#error').html("<div class='alert alert-danger'>" + response[
            //                 'responseJSON']['message'] + "</div>");
            //             $('#btn-save').html('Save');
            //         }
            //     });
            // });
        });
    </script>
@endsection
