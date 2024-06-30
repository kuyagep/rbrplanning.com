<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} | Redesign</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Division Planning Management System">
    <meta name="keywords" content="DPMS, Planning Management System">
    <meta name="author" content="Project DAVAOSUR">
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" {{-- href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> --}} <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('theme/assets/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('theme/assets/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('theme/assets/') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('theme/assets/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('theme/assets/') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('theme/assets/') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <script src="{{ asset('theme/assets/') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/moment/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/assets/dist/css/adminlte.min.css') }}">

    @yield('style')
</head>

<body class="layout-fixed sidebar-mini layout-navbar-fixed sidebar-closed accent-secondary">
    <div class="wrapper">

        <!-- Navbar -->
        @include('user-panel.partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-danger elevation-1">
            <!-- Brand Logo -->
            @include('user-panel.partials.brand-logo')

            <!-- Sidebar -->
            @include('user-panel.partials.sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper text-sm">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        @include('user-panel.layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('theme/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('theme/assets/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('theme/assets/') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- Select2 -->
    <script src="{{ asset('theme/assets/') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('theme/assets/') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme/assets/dist/js/adminlte.min.js') }}"></script>
    <script>
        $(function() {
            $('.select2').select2();
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

    @yield('script')
</body>

</html>
