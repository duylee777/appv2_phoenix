@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/blog.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Hỗ trợ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <a href="#">Hỗ trợ</a>
        <span>&gt;</span>
        <span>{{ $post->title }}</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-header containerx">
        <div class="inner-link">
            @foreach($post->tags as $tag)
                <a href="">{{ $tag->name }}</a>
            @endforeach
        </div>
        <h1 class="s-header__title">{{ $post->title }}</h1>
    </div>
    <div class="s-main blogpage-wrap">
        <div class="m-news containerx">
            <div class="post-news">
                {!! $post->detail !!}
            </div>
            <div class="lists-news">
                <h4 class="head-more-news">{{ $parentCate->name }}</h4>
                @foreach($otherCategorys as $cate)
                    
                    <div class="more-news">
                        <a href="{{ route('theme.support_index', $cate->slug) }}" class="entry-title">
                            <h4>{{ $cate->name }}</h4>
                        </a>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection