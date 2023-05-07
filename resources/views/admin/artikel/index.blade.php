@extends('layouts.admin')
@section('page-title','admin - list artikel')
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
            <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Artikel</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection
@section('content')
  <div class="container-fluid p-4">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
    @endif
    
    
    <div class="row justify-content-md-center">
        <div class="col-md-9">
            <h1 class="text-danger">Make Some Article</h1>
            <a href="/artikel1" class="btn btn-primary">add new post</a> 
                <!-- /.card-header -->
              
            <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-primary">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                        <th>Cover</th>
                      </tr>
                </thead>
                    @php
                    $num=1;
                    @endphp
                    @foreach ($posts as $post)
                      <tr> 
                        <td>{{ $num++ }}</td>
                        <td>{{ $post->title  }}</td>
                        <td>
                        <div>
                            {{ Str::limit($post->strip_description, 250, '... Read More') }}
                        </div>
                        </td>
                        <td >
                            <a href="{{  url('edit/'.$post->id) }}" value="edit" class="btn btn-icon"><i class="fa-solid fa-pen-to-square" style="color: #009dff;"></i></a>
                            <form action="/artikel/{{ $post->id }}" method="POST">
                                @csrf
                                @method('post')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-icon" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa-solid fa-trash" style="color: #ff0000;"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        anda yakin untuk menghapus?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" value="Delete" class="btn btn-danger">hapus</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </td>
                        <td>
                            <img src="{{ $post->coverImageUrl()}}" class="d-block mx-auto w-50" alt="Gambar">
                        </td>
                      </tr>
                      @endforeach
            </table>
            {{ $posts->links() }}
            </div>
        </div>
    </div>

@endsection
  
 