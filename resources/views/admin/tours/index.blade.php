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
                <button class="btn btn-outline-primary mr-3" data-toggle="modal" data-target=".bs-modal-lg">Thêm mới</button>
                <a href="{{route('place.index')}}" class="btn btn-outline-primary">Địa điểm</a>
              </div>

              <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myLargeModalLabel">Thêm Tour du lịch</h5>
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
                          <label for="count_input">Địa điểm<span class="text-danger"> (Nhập số địa điểm trong tour)*</span></label>
                          <input type="number" class="form-control" name="count_input" id="count_input" oninput="diaDiem();">
                        </div>
                        <div class="form-row" id="html"></div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="journey-day">Ngày<span class="text-danger">*</span></label>
                            <input type="number" min="1" max="50" class="form-control" name="journey_day" id="journey-day" required placeholder="Nhập số ngày">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="journey-night">Đêm<span class="text-danger">*</span></label>
                            <input type="number" min="1" max="50" class="form-control" name="journey_night" id="journey-night" required placeholder="Nhập số đêm">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="departure">Khởi hành<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="departure" id="departure" required placeholder="Nhập khởi hành">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="vehicle">Phương tiện<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="vehicle" id="vehicle" required placeholder="Nhập phương tiện">
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="price">Giá<span class="text-danger">*</span></label>
                            <input type="number" min="10000" max="999999999" class="form-control" name="price" id="price" required oninput="tinhSale();" placeholder="Nhập giá">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="sale">Sale</label>
                            <input type="number" value="0" min="0" max="100" class="form-control" name="sale" id="sale" required oninput="tinhSale();" placeholder="Nhập sale(%)">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="saleprice">Giá đã sale</label>
                            <input type="number" min="0" max="999999999" class="form-control" name="sale_price" id="saleprice" required>
                          </div>
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

              <table id="datatable-start-end" class="table table-bordered table-fixed table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                  <tr>
                    <th width="5%">Hành động</th>
                    <th>Tên Tour</th>
                    <th>Địa điểm</th>
                    <th>Hành trình</th>
                    <th>Khởi hành</th>
                    <th>Phương tiện</th>
                    <th>Giá</th>
                    <th>Sale &#40;%&#41;</th>
                    <th>Giá sale</th>
                    <th width="5%">Chi tiết</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tours as $item)
                    <tr>
                      <td>
                        <div class="d-flex justify-content-center">
                          @if ($item->active == 1)
                            <button data-toggle="modal" data-target=".bs-tourpage-{{$item->id}}" class="btn btn-outline-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                              <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                            </button>
                          @else
                            <button data-toggle="modal" data-target=".bs-tourpage-{{$item->id}}" class="btn btn-outline-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                              <i class="mdi mdi-check-circle-outline"></i>
                            </button>
                          @endif

                          <button data-toggle="modal" data-target=".bs-{{$item->id}}" class="btn btn-outline-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
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
                                      <label for="count_input">Địa điểm<span class="text-danger"> (Nhập số địa điểm trong tour)*</span></label>
                                      <input type="number" class="form-control" value="{{count($item->place)}}"
                                      oninput="diaDiemEdit({{$item->id}});" name="count_input" id="count_input_edit_{{$item->id}}">
                                    </div>
                                    <div class="form-row" id="html-edit-{{$item->id}}">
                                      @for($i = 0; $i<count($item->place); $i++)
                                        <div class="form-group col-md-3">
                                          <select class="form-control" name="place[]" disabled>
                                            @foreach($places as $p)
                                              <option value="{{$p->id}}" {{($item->place['key'.$i] == $p->id) ? 'selected' : ''}}>{{$p->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                      @endfor
                                    </div>

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="journey-day">Ngày<span class="text-danger">*</span></label>
                                        <input type="number" min="1" max="50" class="form-control" value="{{$item->journey['day']}}" name="journey_day" id="journey-day" required placeholder="Nhập số ngày">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="journey-night">Đêm<span class="text-danger">*</span></label>
                                        <input type="number" min="1" max="50" class="form-control" value="{{$item->journey['night']}}" name="journey_night" id="journey-night" required placeholder="Nhập số đêm">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="departure">Khởi hành<span class="text-danger">*</span></label>
                                        <input type="text" value="{{$item->departure}}" class="form-control" name="departure" id="departure" required placeholder="Nhập khởi hành">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="vehicle">Phương tiện<span class="text-danger">*</span></label>
                                        <input type="text" value="{{$item->vehicle}}" class="form-control" name="vehicle" id="vehicle" required placeholder="Nhập phương tiện">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="price-edit-{{$item->id}}">Giá<span class="text-danger">*</span></label>
                                        <input type="number" value="{{$item->price}}" min="10000" max="999999999" class="form-control" name="price" id="price-edit-{{$item->id}}" required placeholder="Nhập giá" oninput="tinhSales({{$item->id}});">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="sale-edit-{{$item->id}}">Sale</label>
                                        <input type="number" value="{{$item->sale}}" min="0" max="100" class="form-control" name="sale" id="sale-edit-{{$item->id}}" required placeholder="Nhập sale(%)" oninput="tinhSales({{$item->id}});">
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="saleprice-edit-{{$item->id}}">Giá đã sale</label>
                                        <input type="number" min="0" max="999999999" value="{{$item->sale_price}}" class="form-control" name="sale_price" id="saleprice-edit-{{$item->id}}" required placeholder="Nhập giá đã sale">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                          <input id="checkbox-{{$item->id}}" type="checkbox" style="cursor: pointer;"
                                            onchange="check({{$item->id}});"
                                            {{($item->special['color'] != null) ? 'checked' : 'unchecked'}}
                                          >
                                          <label for="checkbox-{{$item->id}}" style="cursor: pointer;" class="noselect">
                                            Đặc biệt
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-4">
                                        <label for="color-{{$item->id}}">Màu</label>
                                        <input class="form-control" id="color-{{$item->id}}" type="color" name="color"
                                          {{($item->special['color'] == null) ? 'disabled' : ''}} value="{{$item->special['color']}}"
                                        >
                                      </div>
                                      <div class="form-group col-md-4">
                                        <label for="special-{{$item->id}}">Tình trạng</label>
                                        <select class="form-control" name="status" id="special-{{$item->id}}" 
                                          {{($item->special['status'] == null) ? 'disabled' : ''}}
                                        >
                                          <option value="HOT" {{($item->special['status'] == 'HOT') ? 'selected' : ''}}>HOT</option>
                                          <option value="NEW" {{($item->special['status'] == 'NEW') ? 'selected' : ''}}>NEW</option>
                                        </select>
                                      </div>
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

                          @if ($item->active != 1)
                            <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-outline-secondary"
                              style="width: 40px; padding: 3px; height: 100%; font-size: 17px;" disabled
                            >
                              <i class="mdi mdi-trash-can"></i>
                            </button>
                          @else
                            <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-outline-danger"
                              style="width: 40px; padding: 3px; height: 100%; font-size: 17px;"
                            >
                              <i class="mdi mdi-trash-can"></i>
                            </button>
                          @endif


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
                                    <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-outline-danger">Xóa</button>  
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <td>{{$item->name}}</td>
                      <td>
                        @php
                          $p = '';
                          for ($i = 0; $i < count($item->place); $i++) { 
                            foreach($places as $place){
                              if($place->id == $item->place['key'.$i]){
                                $p .= $place->name;
                              }
                            }
                            if($i < count($item->place)-1){
                              $p .= ' - ';
                            }
                          }
                          echo $p;
                        @endphp
                      </td>
                      <td>
                        {{$item->journey['day']}} ngày {{$item->journey['night']}} đêm
                      </td>
                      <td>{{$item->departure}}</td>
                      <td>{{$item->vehicle}}</td>
                      <td>{{number_format($item->price, 0, ',', ',')}} VND</td>
                      <td>{{$item->sale}}%</td>
                      <td>{{number_format($item->sale_price, 0, ',', ',')}} VND</td>
                      <td>
                        <div class="d-flex justify-content-center">
                          <a href="" class="btn btn-outline-primary" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                            <i class="mdi mdi-file-document-box-plus-outline"></i>
                          </a>  
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

<script>
  function tinhSale(){
    var a = document.getElementById('price').value
    var b = document.getElementById('sale').value
    var c = document.getElementById('saleprice').value

    document.getElementById('saleprice').value = a - (a * ( b / 100 ))
  }

  function tinhSales(c){
    var a = document.getElementById('price-edit-' + c).value
    var b = document.getElementById('sale-edit-' + c).value

    document.getElementById('saleprice-edit-' + c).value = a - (a * ( b / 100 ))
  }

  function diaDiem(){
    var a = document.getElementById('count_input').value
    var input = ''
    for(var i = 0; i < a; i++){
      input += `<div class="form-group col-md-3">
                  <select class="form-control" name="place[]">
                    <option value="null" selected>Chọn địa điểm đến</option>  
                    @foreach ($places as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>`
    }
    document.getElementById('html').innerHTML = input
  }

  function diaDiemEdit(ids){
    const a = document.getElementById('count_input_edit_' + ids).value
    var input = ''
    for(var i = 0; i < a; i++){
      input += `<div class="form-group col-md-3">
                  <select class="form-control" name="place[]">
                    <option value="null" selected>Chọn địa điểm đến</option>  
                    @foreach ($places as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                </div>`
    }

    console.log(input);

    document.getElementById('html-edit-' + ids).innerHTML = input
  }

  function check(id){
    var a = document.getElementById('checkbox-' + id)
    console.log(id);
    document.getElementById('color-' + id).disabled = !a.checked
    document.getElementById('special-' + id).disabled = !a.checked
  }
</script>

@endsection