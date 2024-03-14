@extends('admin.master')

@section('title', 'Danh sách Tour du lịch')
@section('content')
<div class="content">
  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Danh sách Tour du lịch</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Danh sách Tour du lịch</li>
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
                      <th>Request</th>
                      <th>Path</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection