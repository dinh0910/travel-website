@extends('admin.master')

@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Cập nhật hành trình {{$journey->name}}</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{route('journey.index')}}">Danh sách hành trình</a></li>
              <li class="breadcrumb-item active">Cập nhật hành trình {{$journey->name}}</li>
            </ol>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h4 class="header-title mb-4"></h4>

            <form class="parsley-examples" action="{{route('journey.update', $journey)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="userName">Hành trình<span class="text-danger">*</span></label>
                <input type="text" name="name" required="" value="{{$journey->name}}"
                  class="form-control" id="userName">
              </div>
              <div class="form-group text-right mb-0">
                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                  Cập nhật
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection