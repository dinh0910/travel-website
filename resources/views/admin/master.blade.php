<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Responsive bootstrap 4 admin template" name="description">
  <meta content="Coderthemes" name="author">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{asset('assets')}}\admin\images\favicon.ico">

  <script src="https://cdn.tiny.cloud/1/wy8hvpex1ve9bh8o8j4bu8ty0cab0sa9l5e903f7cc0cg96p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>  <script>
    tinymce.init({
      selector: '#content'
    });
  </script>

  <!-- Plugins css-->
  <link href="{{asset('assets')}}\admin\libs\sweetalert2\sweetalert2.min.css" rel="stylesheet" type="text/css">

  <link href="{{asset('assets')}}\admin\libs\switchery\switchery.min.css" rel="stylesheet" type="text/css">

  <!-- third party css -->
  <link href="{{asset('assets')}}\admin\libs\datatables\dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('assets')}}\admin\libs\datatables\buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('assets')}}\admin\libs\datatables\responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('assets')}}\admin\libs\datatables\select.bootstrap4.min.css" rel="stylesheet" type="text/css"> 

  <link href="{{asset('assets')}}\admin\libs\select2\select2.min.css" rel="stylesheet" type="text/css">

  <!-- App css -->
  <link href="{{asset('assets')}}\admin\css\bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
  <link href="{{asset('assets')}}\admin\css\icons.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('assets')}}\admin\css\app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet">

  <style>
    .table-fixed td{
      max-width: 250px;
      max-height: 100%;
      word-wrap: break-word;
    }
  </style>

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

  <!-- Required datatable js -->
  <script src="{{asset('assets')}}\admin\libs\datatables\jquery.dataTables.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="{{asset('assets')}}\admin\libs\datatables\dataTables.buttons.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\buttons.bootstrap4.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\jszip\jszip.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\pdfmake\pdfmake.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\pdfmake\vfs_fonts.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\buttons.html5.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\buttons.print.min.js"></script>

  <!-- Responsive examples -->
  <script src="{{asset('assets')}}\admin\libs\datatables\dataTables.responsive.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\responsive.bootstrap4.min.js"></script>

  <script src="{{asset('assets')}}\admin\libs\datatables\dataTables.keyTable.min.js"></script>
  <script src="{{asset('assets')}}\admin\libs\datatables\dataTables.select.min.js"></script>

  <!-- Datatables init -->
  <script src="{{asset('assets')}}\admin\js\pages\datatables.init.js"></script>

  <!-- Plugin js-->
  <script src="{{asset('assets')}}\admin\libs\parsleyjs\parsley.min.js"></script>

  <script src="{{asset('assets')}}\admin\libs\switchery\switchery.min.js"></script>

  <!-- Validation init js-->
  <script src="{{asset('assets')}}\admin\js\pages\form-validation.init.js"></script>

  <script src="{{asset('assets')}}\admin\libs\select2\select2.min.js"></script>

  <script src="{{asset('assets')}}\admin\js\pages\form-advanced.init.js"></script>

  <!-- App js -->
  <script src="{{asset('assets')}}\admin\js\app.min.js"></script>

</body>

</html>