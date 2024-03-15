@extends('admin.master')

@section('title', 'Danh sách địa điểm')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Danh sách địa điểm</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ Admin</a></li>
              <li class="breadcrumb-item active">Danh sách địa điểm</li>
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
              <button class="btn btn-primary mb-4" data-toggle="modal" data-target=".bs-modal-lg">Thêm mới</button>

              <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myLargeModalLabel">Thêm khách sạn</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form class="parsley-examples" action="{{route('place.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="userName">Địa điểm<span class="text-danger">*</span></label>
                          <input type="text" name="name" parsley-trigger="change" required="" placeholder="Nhập địa điểm"
                            class="form-control" id="userName">
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

              <table id="datatable" class="table table-bordered table-striped table-fixed"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;"
              >
                <thead>
                  <tr>
                    <th width="50px"></th>
                    <th>Địa điểm</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($places as $item)
                    <tr>
                      <td>
                        <div class="d-flex justify-content-center">
                          <button class="btn btn-warning mr-1" style="width: 75px;" data-toggle="modal" data-target=".bs-{{$item->id}}">Edit</button>
                          <div class="modal fade bs-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myLargeModalLabel">Thêm địa điểm</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form class="parsley-examples" action="{{route('place.update', $item)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                      <label for="userName">Địa điểm<span class="text-danger">*</span></label>
                                      <input type="text" name="name" parsley-trigger="change" required="" placeholder="Nhập địa điểm"
                                        class="form-control" id="userName" value="{{$item->name}}">
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

                          <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-danger" style="width: 75px;">Delete</button>
                          <div class="modal fade bs-{{$item->id}}-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content" style="width: 350px;">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="mySmallModalLabel">Bạn chắc chắn muốn xóa?</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-footer">
                                  <form action="{{route('place.destroy', $item)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>  
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>{{$item->name}}</td>
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