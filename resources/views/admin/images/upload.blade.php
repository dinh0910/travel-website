@extends('admin.master')

@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Image Upload</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Multiple File Upload</li>
            </ol>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <!-- end page title -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-4">Image Upload</h4>

            <form action="{{route('admin.upload')}}" method="post" id="my-awesome-dropzone" method="post" enctype="multipart/form-data">
              @csrf
              <div class="fallback">
                <input name="file[]" type="file" multiple>
              </div>
            </form>

            <div class="clearfix text-right mt-3">
              <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
            </div>
            <script>
              document.getElementById('submitButton').addEventListener('click', function() {
                document.getElementById('my-awesome-dropzone').submit();
              });
            </script>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->

  </div>
  <!-- end container-fluid -->

</div>
@endsection