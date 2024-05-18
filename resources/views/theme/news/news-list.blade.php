@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/blog.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Danh sách tin tức')
@section('content')

<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Tin tức</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-header">
        <h2 class="s-header__title">Tin tức</h2>
    </div>
    <div class="s-main blogpage-wrap">
        <div class="m-news containerx">
            <div class="post-news">
                <div class="featured-post">
                    <div class="featured-items">
                        <div class="featured-item">
                            <a href="{{ route('theme.news_detail', $defaultPosts[1]->slug) }}" class="img-post post-master-thumnail">
                                <img src="{{ asset('storage/posts/'.$defaultPosts[1]->id.'/'.$defaultPosts[1]->cover_image) }}" alt="featured image">
                            </a>
                            <a href="{{ route('theme.news_detail', $defaultPosts[1]->slug) }}" class="featured-item__title">
                                {{$defaultPosts[1]->title}}
                            </a>
                        </div>
                        <div class="featured-item">
                            <a href="{{ route('theme.news_detail', $defaultPosts[2]->slug) }}" class="img-post post-master-thumnail">
                                <img src="{{ asset('storage/posts/'.$defaultPosts[2]->id.'/'.$defaultPosts[2]->cover_image) }}" alt="featured image">
                            </a>
                            <a href="{{ route('theme.news_detail', $defaultPosts[2]->slug) }}" class="featured-item__title">
                                {{$defaultPosts[2]->title}}
                            </a>
                        </div>
                    </div>
                    <div class="featured-master">
                        <a href="{{ route('theme.news_detail', $defaultPosts[0]->slug) }}" class="img-post post-master-thumnail">
                            <img src="{{ asset('storage/posts/'.$defaultPosts[0]->id.'/'.$defaultPosts[0]->cover_image) }}" alt="featured image">
                        </a>
                        <a href="#" class="title-post">
                           <h3>{{$defaultPosts[0]->title}}</h3>
                        </a>
                    </div>
                </div>
                @foreach($defaultPosts as $post)
                <div class="post">
                    <a href="{{ route('theme.news_detail', $post->slug) }}" class="img-post">
                        <img src="{{ asset('storage/posts/'.$post->id.'/'.$post->cover_image) }}" alt="">
                    </a>
                    <div class="content-post">
                        <div class="meta-category">
                            @foreach($post->tags as $tag)
                                <a href="">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                        <a href="{{ route('theme.news_detail', $post->slug) }}" class="title-post">
                            <h3>{{ $post->title }}</h3>
                        </a>
                        <div class="excerpt">
                            {!! $post->description !!}
                        </div>
                        <!-- <p class="author">
                            <a href="">Antelope Staff</a>
                            <span>November 6, 2023</span>
                        </p> -->
                    </div>
                </div>
                @endforeach
                <!-- <ul class="page-munbers">
                    <li class="fist-number">1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>...</li>
                    <li>31</li>
                    <li class="last-number"><a href="">Next <span><i class="fa-solid fa-angles-right"></i></span></a></li>
                </ul> -->
            </div>
            <div class="lists-news">
                <h4 class="head-more-news">Tin tức mới nhất</h4>
                @foreach($latestPosts as $post)
                    <div class="more-news">
                        <a href="{{ route('theme.news_detail', $post->slug) }}" class="entry-image">
                            <img src="{{ asset('storage/posts/'.$post->id.'/'.$post->cover_image) }}" alt="">
                        </a>
                        <a href="{{ route('theme.news_detail', $post->slug) }}" class="entry-title">
                            <h4>{{ $post->title }}</h4>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection