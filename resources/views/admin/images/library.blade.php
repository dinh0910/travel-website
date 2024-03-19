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
              <div class="d-flex justify-content-start mb-4">
                <button class="btn btn-outline-primary mr-3" data-toggle="modal" data-target=".bs-modal-lg">Thêm mới</button>
              </div>

              <div class="modal fade bs-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="myLargeModalLabel">Thêm hình ảnh</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      @include('admin.images.upload')
                    </div>
                  </div>
                </div>
              </div>

              <table id="datatable-library" class="table table-bordered table-fixed table-striped" style="border-collapse: collapse; border-spacing: 0; width: 100%;">                <thead>
                  <tr>
                    <th></th>
                    <th>Tên ảnh</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($images as $item)
                    <tr>
                      <td>
                        <div class="float-end">
                          <button class="btn btn-outline-primary mr-1" data-toggle="modal" data-target=".bs-{{$item->id}}" style="width: 40px; padding: 3px; height: 100%; font-size: 17px;">
                            <i class="mdi mdi-playlist-edit"></i>
                          </button>

                          <div class="modal fade bs-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myLargeModalLabel">Sửa hình ảnh</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                  <form class="parsley-examples" action="{{route('image.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                      <label for="userName">Địa điểm<span class="text-danger">*</span></label>
                                      <input type="file" name="file"
                                        class="form-control" id="userName">
                                    </div>
                                    <div class="form-group text-right mb-0">
                                      <button class="btn btn-outline-primary waves-effect waves-light mr-1" type="submit">
                                        Sửa
                                      </button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>

                          <button data-toggle="modal" data-target=".bs-{{$item->id}}-modal-sm" class="btn btn-outline-danger"
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
                                    <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xóa?')" class="btn btn-outline-danger">Xóa</button>  
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      <td>{{$item->path}}</td>
                      <td>
                        <style>
                          #myImg-{{$item->id}} {
                            border-radius: 5px;
                            cursor: pointer;
                            transition: 0.3s;
                          }

                          #myImg-{{$item->id}}:hover {opacity: 0.7;}

                          /* The Modal (background) */
                          .modal-img {
                            display: none;
                            position: fixed;
                            z-index: 1; /* Sit on top */
                            padding-top: 100px; /* Location of the box */
                            left: 0;
                            top: 0;
                            width: 100%; /* Full width */
                            height: 100%; /* Full height */
                            overflow: auto; /* Enable scroll if needed */
                            background-color: rgb(0,0,0); /* Fallback color */
                            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                          }

                          .modal-content {
                            margin: auto;
                            display: block;
                            width: 80%;
                            max-width: 700px;
                          }

                          #caption {
                            margin: auto;
                            display: block;
                            width: 80%;
                            max-width: 700px;
                            text-align: center;
                            color: #ccc;
                            padding: 10px 0;
                            height: 150px;
                          }

                          .modal-content, #caption {  
                            -webkit-animation-name: zoom;
                            -webkit-animation-duration: 0.6s;
                            animation-name: zoom;
                            animation-duration: 0.6s;
                          }

                          @-webkit-keyframes zoom {
                            from {-webkit-transform:scale(0)} 
                            to {-webkit-transform:scale(1)}
                          }

                          @keyframes zoom {
                            from {transform:scale(0)} 
                            to {transform:scale(1)}
                          }

                          .close-{{$item->id}} {
                            position: absolute;
                            top: 15px;
                            right: 35px;
                            color: #f1f1f1;
                            font-size: 40px;
                            font-weight: bold;
                            transition: 0.3s;
                          }

                          .close-{{$item->id}}:hover,
                          .close-{{$item->id}}:focus {
                            color: #bbb;
                            text-decoration: none;
                            cursor: pointer;
                          }

                          /* 100% Image Width on Smaller Screens */
                          @media only screen and (max-width: 700px){
                            .modal-content {
                              width: 100%;
                            }
                          }

                          .page-link{
                            position: static !important;
                          }

                          .navbar-custom{
                            position: static !important;
                          }

                          .content-page{
                            margin-top: 0px;
                          }
                        </style>

                        <img id="myImg-{{$item->id}}" src="{{asset('storage/images')}}/{{$item->path}}" width="75" height="50" style="border: 1px solid rgba(0, 0, 0, .07);" />
                        
                      </td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->updated_at}}</td>
                    </tr>
                    <div id="myModal-{{$item->id}}" class="modal-img">
                      <span class="close-{{$item->id}} mt-lg-5">&times;</span>
                      <img class="modal-content" id="img-{{$item->id}}">
                      {{-- <div id="caption"></div> --}}
                    </div>
                    <script>
                      var modal = document.getElementById("myModal-" + {{$item->id}});

                      var img = document.getElementById("myImg-" + {{$item->id}});
                      var modalImg = document.getElementById("img-" + {{$item->id}});
                      // var captionText = document.getElementById("caption");
                      img.onclick = function(){
                        modal.style.display = "block";
                        modalImg.src = this.src;
                        // captionText.innerHTML = this.alt;
                      }

                      var span = document.getElementsByClassName("close-" + {{$item->id}})[0];

                      span.onclick = function() { 
                        modal.style.display = "none";
                      }

                      document.addEventListener("keydown", function(event) {
                        if (event.keyCode === 27 || event.key === "Escape") {
                          modal.style.display = "none";
                        }
                      });
                    </script>
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