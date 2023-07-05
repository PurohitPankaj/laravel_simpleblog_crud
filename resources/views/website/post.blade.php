@extends('layouts.website')
@section('content')

        <header class="masthead" style="background-image: url({{ asset('posts/images/'.$post->image) }}); background-size: contain;">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-10 col-xl-10">
                        <div class="post-heading">
                            <h1>{{ Str::title($post->title) }}</h1>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{ $post->user->name.' '.$post->user->last_name }}</a>
                            on {{ $post->published_at->format('M d, Y')}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
         <!-- Post Content-->

        <section class="bg-light py-10">
                        <div class="container px-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-10 col-xl-8">
                                    <div class="single-post">
                                        <h1>{{ Str::title($post->title) }}</h1>
                                       <div class="d-flex align-items-center justify-content-between mb-5">
                                            <div class="single-post-meta me-4">
                                                <div class="single-post-meta-details">
                                                    <div class="single-post-meta-details-name">Posted by {{ Str::title($post->user->name.' '.$post->user->last_name) }}</div>
                                                    <div class="single-post-meta-details-date">{{ $post->published_at->format('M d, Y')}}</div>
                                                </div>
                                            </div>
                                            <div class="single-post-meta-links">
                                                <a href="#!"><i class="fab fa-twitter fa-fw"></i></a>
                                                <a href="#!"><i class="fab fa-facebook-f fa-fw"></i></a>
                                                <a href="#!"><i class="fas fa-bookmark fa-fw"></i></a>
                                            </div>
                                        </div>
                                           <div class="single-post-text my-5">
                                                {!! $post->description !!}
                                             <hr class="my-5" />
                                        <div class="text-center"><a class="btn btn-transparent-dark" href="{{ route('website') }}">Back to Blog Overview</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

@endsection