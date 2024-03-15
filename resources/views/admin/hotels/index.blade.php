@extends('admin.master')

@section('title', 'Danh sách khách sạn')
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
              <li class="breadcrumb-item active">Danh sách khách sạn</li>
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
              <a href="{{route('hotelpage.index')}}" class="btn btn-primary">Trang khách sạn</a>
            </div>

            <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Thêm khách sạn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                    <form class="parsley-examples" action="{{route('hotel.store')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="userName">Tên khách sạn<span class="text-danger">*</span></label>
                        <input type="text" maxlength="100" name="name" parsley-trigger="change" required="" placeholder="Nhập tên khách sạn"
                          class="form-control" id="userName">
                      </div>
        
                      <div class="form-group">
                        <label for="view_sea">View biển</label>
                        <input type="checkbox" unchecked id="view_sea" name="view_sea" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                      </div>

                      <div class="form-group">
                        <label for="restaurant_coffee">Nhà hàng & coffee</label>
                        <input type="checkbox" unchecked id="restaurant_coffee" name="restaurant_coffee" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                      </div>
        
                      <div class="form-group">
                        <label for="wifi">Wifi</label>
                        <input type="checkbox" unchecked id="wifi" name="wifi" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                      </div>
        
                      <div class="form-group">
                        <label for="air_conditional">Máy lạnh</label>
                        <input type="checkbox" unchecked id="air_conditional" name="air_conditional" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                      </div>
                      
                      <div class="form-group mt-3">
                        <label for="price">Giá<span class="text-danger">*</span></label>
                        <input type="number" min="10000" max="999999999" name="price" parsley-trigger="change" required="" placeholder="Nhập giá"
                          class="form-control" id="price">
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

            <table id="datatable" class="table table-bordered table-striped table-fixed dt-responsive"
              style="border-collapse: collapse; border-spacing: 0; width: 100%;"
            >
              <thead>
                <tr>
                  <th width="50px"></th>
                  <th>Tên khách sạn</th>
                  <th>Cảnh biển</th>
                  <th>Nhà hàng & coffee</th>
                  <th>Wifi</th>
                  <th>Máy lạnh</th>
                  <th>Giá</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($hotels as $item)
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
                                <h5 class="modal-title" id="myLargeModalLabel">Thêm nội dung khách sạn {{$item->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                @forelse ($hq as $i)
                                  @if ($item->id == $i->hotel_id)

                                  @endif
                                @empty
                                <form class="parsley-examples" action="{{route('hotelpage.create')}}" method="POST">
                                  @csrf
                                  <input type="hidden" name="hotel_id" value="{{$item->id}}">
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
                                @foreach ($hq as $i)
                                  @if ($item->id == $i->hotel_id)
                                  <button type="button" data-toggle="modal" data-target=".bs-tourpage-edit-{{$i->id}}" class="btn btn-primary waves-effect">Sửa</button>

                                  <div class="modal fade bs-tourpage-edit-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="myLargeModalLabel">Sửa trang khách sạn {{$item->nam}}</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                          <form class="parsley-examples" action="{{route('hotelpage.update', $i->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="hotel_id" value="{{$item->id}}">
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

                        <button href="{{route('hotel.edit', $item)}}" data-toggle="modal" data-target=".bs-{{$item->id}}" class="btn btn-primary mr-1" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                          <i class="mdi mdi-playlist-edit"></i>
                        </button>
                        <div class="modal fade bs-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Sửa khách sạn {{$item->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              </div>
                              <div class="modal-body">
                                <form class="parsley-examples" action="{{route('hotel.update', $item)}}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="id" value="{{$item->id}}">
                                  <div class="form-group">
                                    <label for="userName">Tên khách sạn<span class="text-danger">*</span></label>
                                    <input type="text" value="{{$item->name}}" maxlength="100" name="name" parsley-trigger="change" required="" placeholder="Nhập tên khách sạn"
                                      class="form-control" id="userName">
                                  </div>
                    
                                  <div class="form-group">
                                    <label for="view_sea">View biển</label>
                                    <input type="checkbox" 
                                    @if ($item->view_sea == 'on')
                                      checked
                                    @endif
                                    id="view_sea" name="view_sea" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                                  </div>
            
                                  <div class="form-group">
                                    <label for="restaurant_coffee">Nhà hàng & coffee</label>
                                    <input type="checkbox" 
                                      @if ($item->restaurant_coffee == 'on')
                                        checked
                                      @endif
                                      id="restaurant_coffee" name="restaurant_coffee" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                                  </div>
                    
                                  <div class="form-group">
                                    <label for="wifi">Wifi</label>
                                    <input type="checkbox" 
                                      @if ($item->wifi == 'on')
                                        checked
                                      @endif
                                      id="wifi" name="wifi" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                                  </div>
                    
                                  <div class="form-group">
                                    <label for="air_conditional">Máy lạnh</label>
                                    <input type="checkbox"
                                      @if ($item->air_conditional == 'on')
                                        checked
                                      @endif
                                      id="air_conditional" name="air_conditional" data-plugin="switchery" data-color="#3bc0c3" data-size="small" />
                                  </div>
                                  
                                  <div class="form-group mt-3">
                                    <label for="price">Giá<span class="text-danger">*</span></label>
                                    <input type="number" value="{{$item->price}}" min="10000" max="999999999" name="price" parsley-trigger="change" required="" placeholder="Nhập giá"
                                      class="form-control" id="price">
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

                        <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-danger" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
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
                                <form action="{{route('hotel.destroy', $item->id)}}" method="post">
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
                      {{($item->view_sea == 0) ? 'Có' : 'Không'}}
                    </td>
                    <td>
                      {{($item->restaurant_coffee == 0) ? 'Có' : 'Không'}}
                    </td>
                    <td>
                      {{($item->wifi == 0) ? 'Có' : 'Không'}}
                    </td>
                    <td>
                      {{($item->air_conditional == 0) ? 'Có' : 'Không'}}
                    </td>
                    <td>{{number_format($item->price, 0, ',', ',')}} VND</td>
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