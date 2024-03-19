<form action="{{route('admin.upload')}}" method="post" id="my-awesome-dropzone" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group mb-3">
    <label for="upload"></label>
    <input name="file[]" type="file" multiple id="upload" class="form-control">
  </div>
  <button type="submit" class="btn btn-outline-primary" id="submitButton">Thêm</button>
</form>