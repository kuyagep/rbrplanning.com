@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Dashboard</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Statistics</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href=""
                        class="btn btn-sm btn-default mr-2 d-none d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i class="fa fa-regular fa-file-excel"></i>
                        Export as Excel
                    </a>
                    <a href="" target="_blank"
                        class="btn btn-sm btn-default mr-2 mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force"
                        style="margin-right: 5px;">
                        <i class="fa fa-download"></i>
                        Generate PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 4.5</td>
                                        <td>Mac OS 8-9</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.1</td>
                                        <td>Mac OS 7.6-9</td>
                                        <td>1</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.2</td>
                                        <td>Mac OS 8-X</td>
                                        <td>1</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>NetFront 3.1</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>NetFront 3.4</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Dillo 0.8</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Links</td>
                                        <td>Text only</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Lynx</td>
                                        <td>Text only</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>IE Mobile</td>
                                        <td>Windows Mobile 6</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>PSP browser</td>
                                        <td>PSP</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Other browsers</td>
                                        <td>All others</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>U</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
@section('script')
@endsection
