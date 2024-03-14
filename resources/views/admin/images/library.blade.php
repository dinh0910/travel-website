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

    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Default Example</b></h4>

                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>Hình ảnh</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($images as $item)
                      <tr>
                        <td>
                          <img src="{{asset('storage/images')}}/{{$item->path}}" width="75" height="75" style="border: 1px solid rgba(0, 0, 0, .07);" />
                          <span>{{$item->path}}</span>
                        </td>
                        <td></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection