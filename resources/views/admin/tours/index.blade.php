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
              <div class="d-flex justify-content-start mb-4">
                <button class="btn btn-primary mr-3" data-toggle="modal" data-target=".bs-modal-lg">Thêm mới</button>
                <a href="{{route('tour.tourpage')}}" class="btn btn-primary">Trang Tour du lịch</a>
              </div>

              <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myLargeModalLabel">Thêm khách sạn</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
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
                          <label for="journey">Hành trình<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" name="journey" id="journey" required placeholder="Nhập hành trình">
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
                          <input type="number" min="10000" max="999999999" class="form-control" name="price" id="price" required oninput="tinhSale();" placeholder="Nhập giá">
                        </div>
                        <div class="form-group">
                          <label for="sale">Sale</label>
                          <input type="number" value="0" min="0" max="100" class="form-control" name="sale" id="sale" required oninput="tinhSale();" placeholder="Nhập sale(%)">
                        </div>
                        <div class="form-group">
                          <label for="saleprice">Giá đã sale</label>
                          <input type="number" min="0" max="999999999" class="form-control" name="sale_price" id="saleprice" required>
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

              <table id="datatable" class="table table-bordered table-fixed table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th width="5%"></th>
                    <th>Tên Tour</th>
                    <th>Địa điểm</th>
                    <th>Hành trình</th>
                    <th>Khởi hành</th>
                    <th>Phương tiện</th>
                    <th>Giá</th>
                    <th>Sale</th>
                    <th>Giá sale</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tours as $item)
                    <tr>
                      <td>
                        <div class="d-flex justify-content-center">
                          <button data-toggle="modal" data-target=".bs-tourpage-{{$item->id}}" class="btn btn-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                            <i class="mdi mdi-information-outline"></i>
                          </button>

                          <div class="modal fade bs-tourpage-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myLargeModalLabel">Thêm nội dung Tour {{$item->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  @forelse ($tq as $i)
                                    @if ($item->id == $i->tour_id)
                                      <div class="card">
                                        <div class="card-body">
                                          <h5 class="">Tiêu đề: {{$i->title}}</h5>
                                          <h6 class="my-4">Mô tả: {{$i->description}}</h6>
                                          <div class="overflow-auto" style="font-size: 16px;">
                                            {!! $i->content !!}
                                          </div>
                                        </div>
                                      </div>
                                    @endif
                                  @empty
                                  <form class="parsley-examples" action="{{route('tourpage.create')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tour_id" value="{{$item->id}}">
                                    <div class="form-group">
                                      <label for="userName">Tên tiêu đề<span class="text-danger">*</span></label>
                                      <input type="text" name="title" parsley-trigger="change" required="" placeholder="Nhập tiêu đề trang"
                                        class="form-control" id="userName">
                                    </div>
                                    <div class="form-group">
                                      <label for="desc">Mô tả<span class="text-danger">*</span></label>
                                      <input type="text" name="description" parsley-trigger="change" required="" placeholder="Nhập mô tả trang"
                                        class="form-control" id="desc">
                                    </div>
                                    <div class="form-group">
                                      <label for="content">Nội dung<span class="text-danger">*</span></label>
                                      <textarea name="content" parsley-trigger="change" required="" placeholder="Nhập nội dung"
                                        class="form-control" id="content"></textarea>
                                    </div>
                                    <div class="form-group text-right mb-0">
                                      <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                        Cập nhật
                                      </button>
                                    </div>
                                  </form>
                                  @endforelse
                                </div>
                                <div class="modal-footer">
                                  @foreach ($tq as $i)
                                    @if ($item->id == $i->tour_id)
                                    <button type="button" data-toggle="modal" data-target=".bs-tourpage-edit-{{$i->id}}" class="btn btn-primary waves-effect">Sửa</button>

                                    <div class="modal fade bs-tourpage-edit-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="myLargeModalLabel">Sửa trang {{$i->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                          </div>
                                          <div class="modal-body">
                                            <form class="parsley-examples" action="{{route('tourpage.update', $i->id)}}" method="POST">
                                              @csrf
                                              @method('PUT')
                                              <input type="hidden" name="tour_id" value="{{$item->id}}">
                                              <div class="form-group">
                                                <label for="userName">Tên tiêu đề<span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="{{$i->title}}" parsley-trigger="change" required="" placeholder="Nhập tiêu đề"
                                                  class="form-control" id="userName">
                                              </div>
                                              <div class="form-group">
                                                <label for="desc">Mô tả<span class="text-danger">*</span></label>
                                                <input type="text" name="description" value="{{$i->description}}" parsley-trigger="change" required="" placeholder="Nhập mô tả"
                                                  class="form-control" id="desc">
                                              </div>
                                              <div class="form-group">
                                                <label for="content">Nội dung<span class="text-danger">*</span></label>
                                                <textarea name="content" parsley-trigger="change" required=""
                                                  class="form-control" id="content">{!!$i->content!!}</textarea>
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
                                    @endif
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>

                          <button data-toggle="modal" data-target=".bs-{{$item->id}}" class="btn btn-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                            <i class="mdi mdi-playlist-edit"></i>
                          </button>

                          <div class="modal fade bs-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myLargeModalLabel">Cập nhật Tour du lịch {{$item->name}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form class="parsley-examples" action="{{route('tour.update', $item)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                      <label for="userName">Tên Tour du lịch<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$item->name}}" name="name" parsley-trigger="change" required="" placeholder="Nhập tên Tour du lịch"
                                        class="form-control" id="userName">
                                    </div>
                                    <div class="form-group">
                                      <label for="place">Địa điểm<span class="text-danger">*</span></label>
                                      <select class="form-control" id="place" name="place_id">
                                        @foreach ($places as $p)
                                          @if ($p->id == $item->place_id)
                                            <option value="{{$p->id}}" selected>{{$p->name}}</option>
                                          @endif
                                          <option value="{{$p->id}}">{{$p->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="journey">Hành trình<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$item->journey}}" class="form-control" name="journey" id="journey" required placeholder="Nhập hành trình">
                                    </div>
                                    <div class="form-group">
                                      <label for="departure">Khởi hành<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$item->departure}}" class="form-control" name="departure" id="departure" required placeholder="Nhập khởi hành">
                                    </div>
                                    <div class="form-group">
                                      <label for="vehicle">Phương tiện<span class="text-danger">*</span></label>
                                      <input type="text" value="{{$item->vehicle}}" class="form-control" name="vehicle" id="vehicle" required placeholder="Nhập phương tiện">
                                    </div>
                                    <div class="form-group">
                                      <label for="price-edit-{{$item->id}}">Giá<span class="text-danger">*</span></label>
                                      <input type="number" value="{{$item->price}}" min="10000" max="999999999" class="form-control" name="price" id="price-edit-{{$item->id}}" required placeholder="Nhập giá" oninput="tinhSales({{$item->id}});">
                                    </div>
                                    <div class="form-group">
                                      <label for="sale-edit-{{$item->id}}">Sale</label>
                                      <input type="number" value="{{$item->sale}}" min="0" max="100" class="form-control" name="sale" id="sale-edit-{{$item->id}}" required placeholder="Nhập sale(%)" oninput="tinhSales({{$item->id}});">
                                    </div>
                                    <div class="form-group">
                                      <label for="saleprice-edit-{{$item->id}}">Giá đã sale</label>
                                      <input type="number" value="{{$item->sale_price}}" min="0" max="999999999" class="form-control" name="sale_price" id="saleprice-edit-{{$item->id}}" required placeholder="Nhập giá đã sale">
                                    </div>
                                    <script>
                                      function tinhSales(c){
                                        var a = document.getElementById('price-edit-' + c).value
                                        var b = document.getElementById('sale-edit-' + c).value
                                    
                                        document.getElementById('saleprice-edit-' + c).value = a - (a * ( b / 100 ))
                                      }
                                    </script>
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

                      <td>{{$item->name}}</td>
                      <td>
                        @foreach ($places as $place)
                          @if ($item->place_id == $place->id)
                            {{$place->name}}
                          @endif
                        @endforeach
                      </td>
                      <td>
                        {{$item->journey}}
                      </td>
                      <td>{{$item->departure}}</td>
                      <td>{{$item->vehicle}}</td>
                      <td>{{number_format($item->price, 0, ',', ',')}} VND</td>
                      <td>{{$item->sale}}</td>
                      <td>{{number_format($item->sale_price, 0, ',', ',')}} VND</td>
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

<script>
  function tinhSale(){
    var a = document.getElementById('price').value
    var b = document.getElementById('sale').value
    var c = document.getElementById('saleprice').value

    document.getElementById('saleprice').value = a - (a * ( b / 100 ))
  }
</script>

@endsection