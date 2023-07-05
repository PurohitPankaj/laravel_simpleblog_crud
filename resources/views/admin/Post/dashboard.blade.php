@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{ __('Welcome to User Dashboard') }}</div>
            </div>
            @include('includes.errors')
        </div>
    </div>
</div>

  <div class="d-flex justify-content-center p-2 m-2">
        <div class="card p-2 w-50">
            <div class="d-flex justify-content-between">
                <div class="">
                    <h3>Posts List</h3>
                </div>
                <div class="">
                    <a href="{{ route('posts.create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i> New Post</button></a>
                </div>
            </div>
            <hr class="my-1">
            <div class="">
                <table class="table table-bordered " >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Created on</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($posts->count())
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td class="d-flex">
                                <a class="mx-1" href="{{ route('posts.show' ,$post->id) }}"><button class="btn fa fa-eye text-success"></button></a>
                                <a class="mx-1" href="{{ route('posts.edit', $post->id) }}"><button class="btn fa fa-edit text-primary"></button></a>
                                <form action="{{ route('posts.destroy', [$post->id]) }}" class="mr-1" method="POST">
                                    @method('DELETE')
                                    @csrf 
                                    <button type="submit" class="btn"> 
                                        <i class="fas fa-trash text-danger"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                                @else   
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                @endif
                    </tbody>
                </table>
                
                    {!! $posts->links() !!}
                
            </div>
        </div>
    </div>

@endsection
