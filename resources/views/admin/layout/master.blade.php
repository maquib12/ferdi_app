<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ferdi</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/treeview.min.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="http://pepupsales.net/ferdi/assets/css/bootstrap-select.min.css">
    <link rel="shortcut icon" href="" />
  </head>
  <body>
   
      
    <div class="container-scroller">
        <!-- navbar -->
        @include('admin.include.navbar')
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
        @include('admin.include.sidebar')
         @include('admin.flash-message')
      @yield('content')
      @include('admin.include.copyright')
    </div>



    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/moment.js')}}"></script>
    <script src="{{asset('assets/js/datetimepicker.min.js')}}"></script>
    <script src="http://pepupsales.net/ferdi/assets/js/bootstrap-select.min.js"></script>
    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/validate.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.min.js')}}"></script>
    <script src="https://code.highcharts.com/highcharts.js')}}"></script>
    <script src="{{asset('assets/vendors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/js/sample.js')}}"></script>
    <script src="{{asset('assets/js/treeview.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
  </body>
</html>