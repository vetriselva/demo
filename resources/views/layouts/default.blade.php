<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input type="hidden" name="baseurl" value="{{URL::to('/')}}" id="baseurl">
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            @include('includes.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
        @include('layouts.modal-delete-confirmation')
</body>
</html>
@include('includes.footer')
@yield('footer_scripts')

