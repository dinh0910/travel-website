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
        <div class="card">
            <div class="card-body table-responsive">
                <h4 class="m-t-0 header-title mb-4"><b>Lịch sử hoạt động</b></h4>

                <ul class="nav nav-pills navtab-bg nav-justified">
                  <li class="nav-item">
                    <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
                      <span class="d-block d-sm-none"><i class="mdi mdi-home-variant-outline font-18"></i></span>
                      <span class="d-none d-sm-block">Admin</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                      <span class="d-block d-sm-none"><i class="mdi mdi-account-outline font-18"></i></span>
                      <span class="d-none d-sm-block">User</span>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane" id="home1">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                      Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                      mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                      quis enim.</p>
                    <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                      rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                      Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                      Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                  </div>
                  <div class="tab-pane show active" id="profile1">
                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                      imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer
                      tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean
                      leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                      dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
                      ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                      consequat massa quis enim.</p>
                  </div>
                </div>

                <table id="datatable" class="table table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th>Request</th>
                      <th>Đường dẫn</th>
                      <th>Ngày tạo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($logs as $item)
                      <tr>
                        <td>{{$item->request}}</td>
                        <td>{{$item->endpoint}}</td>
                        <td>{{date('Y-m-d', strtotime($item->created_at))}}</td>
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