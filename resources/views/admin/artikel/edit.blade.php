@extends('layouts.admin')

@section('content')
@section('content-header')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Artikel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ Route('home') }}">edit artikel</a></li>
            <li class="breadcrumb-item active">Artikel</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@section('content')
  <div class="container-fluid p-4">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection
<div class="container-fluid p-4">
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <h1 class="text-danger">Summernote</h1>
            <form action="{{ route('put.edit',['id' => $post->id]) }}" method="POST">
              @csrf
              <img id="preview_image" src="{{ $post->coverImageUrl() }}" alt="Preview image" style="max-width: 100%; height: auto;">
              <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" name="cover_image" id="cover_image" class="form-control-file">
              </div>
              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" value="{{ $post->title }}"name="title" id="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                  <label for="content">Content</label>
                  <textarea class="form-control" name="content" id="content">{{ $post->description }}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>
  </div>    
  
  <script>
    $(document).ready(function() {
        $('#cover_image').update(function() {
        previewImage(this);
    })});
    function previewImage(input){
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
    $('#preview_image').attr('src', e.target.result);
}
DataURL(this.files[0]);
        }
};
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

    <div class="card">
        <div class="card-body">
            {!! $post->description !!}
        </div>
    </div>
@endsection
