@extends('admin.master')

@section('title', 'Lịch sử hoạt động')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Lịch sử hoạt động</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Lịch sử hoạt động</li>
            </ol>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card-box">
          <ul class="nav nav-pills navtab-bg nav-justified">
            <li class="nav-item">
              <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                <span class="d-block d-sm-none"><i class="mdi mdi-home-variant-outline font-18"></i></span>
                <span class="d-none d-sm-block">Admin</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                <span class="d-block d-sm-none"><i class="mdi mdi-account-outline font-18"></i></span>
                <span class="d-none d-sm-block">User</span>
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane show active" id="home1">
              <table id="datatable" class="table table-bordered table-striped table-fixed" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th width="60%">Request</th>
                    <th width="20%">Đường dẫn</th>
                    <th width="20%">Ngày tạo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logs as $item)
                    @if ($item->type === 'admin')
                    <tr>
                      <td>{{$item->request}}</td>
                      <td>{{$item->endpoint}}</td>
                      <td>{{date('Y-m-d', strtotime($item->created_at))}}</td>
                    </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="tab-pane show" id="profile1">
              <table id="datatable1" class="table table-bordered table-striped table-fixed" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th width="60%">Request</th>
                    <th width="20%">Đường dẫn</th>
                    <th width="20%">Ngày tạo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($logs as $item)
                    @if ($item->type !== 'admin')
                    <tr>
                      <td>{{$item->request}}</td>
                      <td>{{$item->endpoint}}</td>
                      <td>{{date('Y-m-d', strtotime($item->created_at))}}</td>
                    </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection