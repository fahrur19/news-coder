@extends('backend.layout.master')

@section('title', 'Dashboard')

@push('styles')
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('backend/components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('backend/components/jvectormap/jquery-jvectormap.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>
        
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row (main row) -->
    
    </section>
    <!-- /.content -->
@endsection

@push('scripts')
    <!-- Morris.js charts -->
    <script src="{{ asset('backend/components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend/components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('backend/components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('backend/components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
@endpush
