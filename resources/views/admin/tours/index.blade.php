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
          <h4 class="page-title">Danh sách Tour du lịch</h4>
          <div class="page-title-right">
            <ol class="breadcrumb p-0 m-0">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Danh sách Tour du lịch</li>
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

                <table id="datatable" class="table table-bordered table-fixed table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <thead>
                    <tr>
                      <th width="5%">STT</th>
                      <th>Tên Tour</th>
                      <th>Địa điểm</th>
                      <th>Hành trình</th>
                      <th>Khởi hành</th>
                      <th>Phương tiện</th>
                      <th>Giá</th>
                      <th>Sale</th>
                      <th>Giá sale</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tours as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          @foreach ($places as $place)
                            @if ($item->place_id == $place->id)
                              {{$place->name}}
                            @endif
                          @endforeach
                        </td>
                        <td>
                          @foreach ($journeys as $j)
                            @if ($item->journey_id == $j->id)
                              {{$j->name}}
                            @endif
                          @endforeach
                        </td>
                        <td>{{$item->departure}}</td>
                        <td>{{$item->vehicle}}</td>
                        <td>{{number_format($item->price, 0, ',', ',')}} VND</td>
                        <td>{{$item->sale}}</td>
                        <td>{{number_format($item->sale_price, 0, ',', ',')}} VND</td>
                        <td>
                          <div class="float-end">
                            <a href="{{route('tour.show', $item)}}" class="btn btn-info mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                              <i class="mdi mdi-information-outline"></i>
                            </a>
                            <a href="{{route('tour.edit', $item)}}" class="btn btn-purple mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
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
                                    <form action="{{route('tour.destroy', $item->id)}}" method="post">
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