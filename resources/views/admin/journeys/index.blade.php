@extends('admin.master')

@section('title', 'Danh sách hành trình')
@section('content')
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Danh sách hành trình</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Trang chủ Admin</a></li>
              <li class="breadcrumb-item active">Danh sách hành trình</li>
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
                <h4 class="m-t-0 header-title mb-4"><b></b></h4>

                <table id="datatable" class="table table-bordered table-striped table-fixed"
                 style="border-collapse: collapse; border-spacing: 0; width: 100%;"
                >
                  <thead>
                    <tr>
                      <th width="5%">STT</th>
                      <th>Hành trình</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($journeys as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          <div class="float-end">
                            <a href="{{route('journey.edit', $item)}}" class="btn btn-warning mr-1" style="width: 75px;">Edit</a>
                            <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-danger" style="width: 75px;">Delete</button>
                            <div class="modal fade bs-{{$item->id}}-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content" style="width: 350px;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="mySmallModalLabel">Bạn chắc chắn muốn xóa?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  </div>
                                  <div class="modal-footer">
                                    <form action="{{route('journey.destroy', $item->id)}}" method="post">
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