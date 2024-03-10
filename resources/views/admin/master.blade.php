<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dashboard 1 | Velonic - Responsive Bootstrap 4 Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Responsive bootstrap 4 admin template" name="description">
  <meta content="Coderthemes" name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset('assets')}}\admin\images\favicon.ico">

  <!-- Plugins css-->
  <link href="{{asset('assets')}}\admin\libs\sweetalert2\sweetalert2.min.css" rel="stylesheet" type="text/css">
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="{{asset('assets')}}\admin\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
  <link href="{{asset('assets')}}\admin\css\icons.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('assets')}}\admin\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

</head>

<body>

  <!-- Begin page -->
  <div id="wrapper">

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      
      @yield('content')

      {{-- @include('admin.layouts.footer') --}}

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

  </div>
  <!-- END wrapper -->

  <!-- Vendor js -->
  <script src="{{asset('assets')}}\admin\js\vendor.min.js"></script>

  <script src="{{asset('assets')}}\admin\libs\moment\moment.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\jquery-scrollto\jquery.scrollTo.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\sweetalert2\sweetalert2.min.js"></script>
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>

  <!-- Chat app -->
  <script src="{{asset('assets')}}\admin\js\pages\jquery.chat.js"></script>

  <!-- Todo app -->
  <script src="{{asset('assets')}}\admin\js\pages\jquery.todo.js"></script>

  <!--Morris Chart-->
  <script src="{{asset('assets')}}\admin\libs\morris-js\morris.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\raphael\raphael.min.js"></script>

  <!-- Sparkline charts -->
  <script src="{{asset('assets')}}\admin\libs\jquery-sparkline\jquery.sparkline.min.js"></script>

  <!-- Dashboard init JS -->
  <script src="{{asset('assets')}}\admin\js\pages\dashboard.init.js"></script>

  <!-- App js -->
  <script src="{{asset('assets')}}\admin\js\app.min.js"></script>

</body>

</html>