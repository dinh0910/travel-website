@extends('admin.master')

@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Thêm khách sạn</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ Admin</a></li>
              <li class="breadcrumb-item"><a href="{{route('hotel.index')}}">Danh sách khách sạn</a></li>
              <li class="breadcrumb-item active">Thêm khách sạn</li>
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

            <form class="parsley-examples" action="{{route('hotel.update', $hotel)}}" method="POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="userName">Tên khách sạn<span class="text-danger">*</span></label>
                <input type="text" name="name" parsley-trigger="change" required="" placeholder="Nhập tên khách sạn"
                  class="form-control" id="userName" value="{{$hotel->name}}">
              </div>

              <div class="form-group">
                <label>View biển</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio1" value="0" name="view_sea" class="custom-control-input" {{$hotel->view_sea == 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio1">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio2" value="1" name="view_sea" class="custom-control-input" {{$hotel->view_sea != 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio2">Không</label>
                </div>
              </div>

              <div class="form-group">
                <label>Nhà hàng & coffee</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio3" value="0" name="restaurant_coffee" class="custom-control-input" {{$hotel->restaurant_coffee == 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio3">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio4" value="1" name="restaurant_coffee" class="custom-control-input" {{$hotel->restaurant_coffee != 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio4">Không</label>
                </div>
              </div>

              <div class="form-group">
                <label>Wifi</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio5" value="0" name="wifi" class="custom-control-input" {{$hotel->wifi == 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio5">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio6" value="1" name="wifi" class="custom-control-input" {{$hotel->wifi != 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio6">Không</label>
                </div>
              </div>

              <div class="form-group">
                <label>Máy lạnh</label>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio7" value="0" name="air_conditional" class="custom-control-input" {{$hotel->air_conditional == 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio7">Có</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customRadio8" value="1" name="air_conditional" class="custom-control-input" {{$hotel->air_conditional != 0 ? 'checked' : ''}}>
                  <label class="custom-control-label text-xs" for="customRadio8">Không</label>
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="price">Giá<span class="text-danger">*</span></label>
                <input type="number" min="10000" max="999999999" name="price" parsley-trigger="change" required="" placeholder="Nhập giá"
                  class="form-control" id="price" value="{{$hotel->price}}">
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