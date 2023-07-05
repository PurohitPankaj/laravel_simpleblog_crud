@extends('layouts.app')

@section('content')


<!-- Main content -->
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @include('includes.errors')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Edit Post - {{ $post->name }}</h3>
                            <a href="{{ route('posts.index') }}" class="btn btn-primary">Go Back to Post List</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                <div class="card-body">
                                    <form action="{{ route('posts.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf 
                                        @method('PUT')
                                        <div class="form-group p-2">
                                            <label for="title">Post title</label>
                                            <input type="name" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
                                        </div>
                                        <div class="form-group p-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="image">Select New Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" accept="image/*" name="image" class="custom-file-input" id="image">
                                                    </div>
                                                </div>
                                                <div class="col-6 text-right">
                                                     <label for="image">Old Image</label>
                                                     <div style="max-width: 300px; max-height:300px;overflow:hidden">
                                                        <img src="{{ asset('posts/images/'.$post->image) }}" class="img-fluid" alt="{{ $post->title }}">
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group p-2">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" rows="4" class="form-control"
                                                placeholder="Enter description">{{ $post->description }}</textarea>
                                        </div>
                                        <div class="form-group p-2">
                                            <button type="submit" class="btn btn-lg btn-primary">Update Post</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection