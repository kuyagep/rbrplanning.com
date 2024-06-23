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
                            <h5>Add Funding Source</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Funding Source</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" action="{{ route('funding-sources.store') }}"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="fund_source" class="col-sm-3 col-form-label">Funding Source</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control " id="fund_source" name="fund_source"
                                        value="{{ old('fund_source') }}" required>
                                    @error('fund_source')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3 col-form-label"></div>
                                <div class="col-sm-9">
                                    <button type="submit" id="btn-save" class="btn btn-primary mr-2">
                                        Create Funding Source</button>
                                    <a href="{{ route('funding-sources.index') }}" class="btn btn-light">Back</a>
                                </div>
                            </div>
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
