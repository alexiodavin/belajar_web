@extends('layouts.admin')

@section('content')
@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Artikel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('home') }}">artikel</a></li>
            <li class="breadcrumb-item active">Artikel</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
<div class="container-fluid p-4">
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <h1 class="text-danger">Summernote</h1>
            <form action="/post" method="post" enctype="multipart/form-data">
              @csrf   
              <img id="preview_image" src="" style="max-width: 100%; height: auto;">
              <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control-file">
              </div>
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" name="content" id="content"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
  </div>    
  

  <script>
        $(document).ready(function() {
            $('#cover_image').change(function() {
                var reader = new FileReader();
                reader.onload = function(e) {
            $('#preview_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
  });
    });
    </script>
  
    <div id="summernote"></div>
    <script src="{{ asset('js/summernote-bs4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                placeholder: 'Enter content',
                tabsize: 2,
                height: 550
            });
        });
    </script>
    

    
@endsection
  