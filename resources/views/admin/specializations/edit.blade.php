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
                            <h5>Edit Specialization</h5>
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
                        <h3>Edit Specialization</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12">
                                <form method="post" class="needs-validation"
                                    action="{{ route('specializations.update', $specialization->id) }}" novalidate=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="id" id="id" value="{{ $specialization->id }}">

                                    <div class="form-group row">
                                        <label for="track_id" class="col-sm-3 col-form-label">Track</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="track_id" name="track_id">
                                                <option>Choose...</option>
                                                @foreach ($tracks as $track)
                                                    <option value="{{ $track->id }}"
                                                        {{ $track->id == $specialization->strand->track->id ? 'selected' : '' }}>
                                                        {{ $track->name }}
                                                    </option>
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
                                                    <option value="{{ $strand->id }}"
                                                        {{ $strand->id == $specialization->strand->id ? 'selected' : '' }}>
                                                        {{ $strand->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Specialization</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ old('name', $specialization->name) }}">
                                        </div>
                                    </div>

                                    <a href="{{ route('specializations.index') }}" class="btn btn-secondary float-right"><i
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


        });
    </script>
@endsection
