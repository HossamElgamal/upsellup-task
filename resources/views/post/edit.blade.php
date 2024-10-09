@extends('layouts.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Edit Post</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}"  >
                                    @error('title')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="content" class="form-label">Content</label>
                                    <textarea class="form-control" name="contnt" id="content" rows="5" >{{ $post->content }}</textarea>
                                    @error('cc')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="author" class="form-label">Author</label>
                                    <input type="text" class="form-control" name="author" id="author" value="{{ $post->author }}">
                                    @error('author')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Post</button>
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
