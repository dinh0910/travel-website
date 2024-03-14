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
                        <td>
                          <div class="float-end">
                            <a href="" class="btn btn-purple mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                              <i class="mdi mdi-playlist-edit"></i>
                            </a>
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
                                    <form action="{{route('image.delete')}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <input type="hidden" name="id" value="{{$item->id}}">
                                      <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>  
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
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