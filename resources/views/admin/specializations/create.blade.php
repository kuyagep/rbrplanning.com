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
                            <h5>Add Specialization</h5>
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


                <div class="card">
                    <div class="card-header">
                        <h3>Add Specialization</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" class="needs-validation"
                            action="{{ route('specializations.store') }}" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="track_id" class="col-sm-3 col-form-label">Track</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="track_id" name="track_id">
                                        <option>Choose...</option>
                                        @foreach ($tracks as $track)
                                            <option value="{{ $track->id }}">{{ $track->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="strand_id" class="col-sm-3 col-form-label">Strand</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="strand_id" name="strand_id">
                                        <option>Choose...</option>
                                        @foreach ($strands as $strand)
                                            <option value="{{ $strand->id }}">{{ $strand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('strand_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Specialization</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('name')
                                       is-invalid
                                    @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" id="btn-save" class="btn btn-primary mr-2">Create
                                Specialization</button>
                            <a href="{{ route('specializations.index') }}" class="btn btn-light">Back</a>
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
