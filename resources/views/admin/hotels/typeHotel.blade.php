@extends('admin.master')

@section('title', 'Danh sách loại khách sạn')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Danh sách khách sạn</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ Admin</a></li>
              <li class="breadcrumb-item"><a href="{{route('hotel.index')}}">Danh sách khách sạn</a></li>
              <li class="breadcrumb-item active">Danh sách loại khách sạn</li>
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
            <div class="d-flex justify-content-start mb-4">
              <button class="btn btn-outline-primary mr-3" data-toggle="modal" data-target=".bs-modal-lg">Thêm mới</button>
            </div>

            <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Thêm khách sạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('type-hotel.store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="name">Loại khách sạn<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Nhập loại khách sạn" required class="form-control" />
                      </div>
                      <div class="form-group text-right mb-0">
                        <button class="btn btn-outline-primary waves-effect waves-light mr-1" type="submit">
                          Thêm
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <table id="datatable-sort-2" class="table table-bordered table-striped table-fixed dt-responsive"
              style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th width="5%"></th>
                  <th>Loại khách sạn</th>
                  <th>Ngày tạo</th>
                  <th>Ngày cập nhật</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($types as $item)
                  <tr>
                    <td>
                      <div class="d-flex justify-content-center">
                        <button data-toggle="modal" data-target=".bs-typehotel-{{$item->id}}" class="btn btn-outline-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                          <i class="mdi mdi-playlist-edit"></i>
                        </button>
                        <div class="modal fade bs-typehotel-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Cập nhật loại khách sạn</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                <form action="{{route('type-hotel.update', $item->id)}}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-group">
                                    <label for="name">Loại</label>
                                    <input type="text" name="name" id="name" value="{{$item->name}}" class="form-control">
                                  </div>
                                  <div class="form-group text-right mb-0">
                                    <button class="btn btn-outline-primary waves-effect waves-light mr-1" type="submit">
                                      Cập nhật
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-outline-danger" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                          <i class="mdi mdi-trash-can"></i>
                        </button>
                        <div class="modal fade bs-{{$item->id}}-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-sm">
                            <div class="modal-content" style="width: 350px;">
                              <div class="modal-header">
                                <h5 class="modal-title" id="mySmallModalLabel">Bạn chắc chắn muốn xóa?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-footer">
                                <form action="{{route('type-hotel.destroy', $item->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-outline-danger">Xóa</button>  
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
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