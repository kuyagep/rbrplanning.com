@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Section Details</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Section Details</li>
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
                        <div class="card-header bg-primary text-white">
                            Section Details
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Grade:</div>
                                <div class="col-md-8">{{ $section->grade->name }}</div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4 font-weight-bold">Section Name:</div>
                                <div class="col-md-8">{{ $section->section_name }}</div>
                            </div>


                            <h5>Assigned Teachers</h5>
                            <ul>
                                @foreach ($section->personnels as $personnel)
                                    <li>{{ $personnel->full_name }} - {{ $personnel->position->name }}
                                        <form action="{{ route('sections.removeTeacher', [$section->id, $personnel->id]) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                            <h5>Assign Teacher</h5>
                            <form action="{{ route('sections.assignTeacher', $section->id) }}" method="POST">
                                @csrf
                                <div>
                                    <label for="personnel_id">Select Teacher:</label>
                                    <select class="form-control" style="width: 10%"id="personnel_id" name="personnel_id">
                                        @forelse ($personnels as $personnel)
                                            <option value="{{ $personnel->id }}">
                                                {{ $personnel->full_name }}
                                            </option>
                                        @empty
                                            <option value="">
                                                N/A
                                            </option>
                                        @endforelse
                                    </select>
                                    @error('personnel_id')
                                        <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Assign</button>
                            </form>



                            <div class="d-flex justify-content-right mt-4">
                                <a href="{{ route('sections.index') }}" class="btn btn-default mr-2">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                                <a href="{{ route('sections.edit', $section->id) }}" class="mr-2 btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('sections.destroy', $section->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mr-2">Delete</button>
                                </form>
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
        });
    </script>
@endsection
