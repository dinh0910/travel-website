@extends('admin.master')

@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Thêm Tour du lịch</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ Admin</a></li>
              <li class="breadcrumb-item active">Thêm Tour du lịch</li>
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

            <form class="parsley-examples" action="{{route('tour.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="userName">Tên Tour du lịch<span class="text-danger">*</span></label>
                <input type="text" name="name" parsley-trigger="change" required="" placeholder="Nhập tên Tour du lịch"
                  class="form-control" id="userName">
              </div>
              <div class="form-group">
                <label for="place">Địa điểm<span class="text-danger">*</span></label>
                <select class="form-control" id="place" name="place_id">
                  @foreach ($places as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="time">Hành trình<span class="text-danger">*</span></label>
                <select class="form-control" id="time" name="journey_id">
                  @foreach ($journeys as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="departure">Khởi hành<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="departure" id="departure" required placeholder="Nhập khởi hành">
              </div>
              <div class="form-group">
                <label for="vehicle">Phương tiện<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="vehicle" id="vehicle" required placeholder="Nhập phương tiện">
              </div>
              <div class="form-group">
                <label for="price">Giá<span class="text-danger">*</span></label>
                <input type="number" min="10000" max="999999999" class="form-control" name="price" id="price" required placeholder="Nhập giá">
              </div>
              <div class="form-group">
                <label for="sale">Sale</label>
                <input type="number" value="0" min="0" max="100" class="form-control" name="sale" id="sale" required placeholder="Nhập sale(%)">
              </div>
              <div class="form-group">
                <label for="saleprice">Giá đã sale</label>
                <input type="number" value="0" min="0" max="999999999" class="form-control" name="sale_price" id="saleprice" required placeholder="Nhập giá đã sale">
              </div>
              <div class="form-group text-right mb-0">
                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                  Thêm
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