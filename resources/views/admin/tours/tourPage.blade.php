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
          <h4 class="page-title">Danh sách trang Tour</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('tour.index')}}">Danh sách Tour du lịch</a></li>
              <li class="breadcrumb-item active">Danh sách trang Tour</li>
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
              <a href="{{route('tour.index')}}" class="btn btn-primary">Danh sách Tour</a>
            </div>

            <table id="datatable" class="table table-bordered table-fixed table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th width="5%"></th>
                  <th width="15%">Tour du lịch</th>
                  <th width="15%">Tiêu đề</th>
                  <th width="15%">Mô tả</th>
                  <th width="50%">Nội dung</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($tp as $item)
                  <tr>
                    <td>
                      <div class="d-flex justify-content-center">
                        <button data-toggle="modal" data-target=".bs-{{$item->id}}" class="btn btn-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                          <i class="mdi mdi-playlist-edit"></i>
                        </button>

                        <div class="modal fade bs-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Sửa trang {{$item->title}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                <form class="parsley-examples" action="{{route('tourpage.update.tp', $item->id)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="tour_id" value="{{$item->tour_id}}">
                                  <div class="form-group">
                                    <label for="userName">Tên tiêu đề<span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{$item->title}}" parsley-trigger="change" required="" placeholder="Nhập tiêu đề"
                                      class="form-control" id="userName">
                                  </div>
                                  <div class="form-group">
                                    <label for="desc">Mô tả<span class="text-danger">*</span></label>
                                    <input type="text" name="description" value="{{$item->description}}" parsley-trigger="change" required="" placeholder="Nhập mô tả"
                                      class="form-control" id="desc">
                                  </div>
                                  <div class="form-group">
                                    <label for="content">Nội dung<span class="text-danger">*</span></label>
                                    <textarea name="content" parsley-trigger="change" required=""
                                      class="form-control" id="content">{!!$item->content!!}</textarea>
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

                        <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-danger"
                          style="width: 40px; padding: 3px; height: 100%; font-size: 17px;"
                        >
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
                                <form action="{{route('tourpage.destroy', $item)}}" method="post">
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
                    <td>
                      @foreach ($tours as $t)
                        @if ($t->id == $item->tour_id)
                          {{$t->name}}
                        @endif
                      @endforeach
                    </td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                      <div style="max-height: 300px;">
                        {!! substr($item->content, 0, 100) !!}
                      </div>
                    </td>
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