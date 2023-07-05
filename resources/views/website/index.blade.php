@extends('layouts.website')

@section('content')
 <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>Project - {{ config('app.name', 'Laravel') }}</h2>
                            <span class="subheading">A Blog Theme by Start Bootstrap</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

<div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @if($posts->count())
                    @foreach($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                    <a href="{{ route('website.post', ['slug' => $post->slug]) }}">
                            <h2 class="post-title">{{ Str::title($post->title) }}</h2>
                            <h3 class="post-subtitle">{{  Str::limit($post->description,40) }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $post->user->name.' '.$post->user->last_name }}</a>
                            on {{ $post->published_at->format('M d, Y')}}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
                    @else   
                                    <tr>
                                        <td colspan="6">
                                            <h5 class="text-center">No posts found.</h5>
                                        </td>
                                    </tr>
                                @endif
                    <!-- Bootstrap Pagination-->
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
@endsection