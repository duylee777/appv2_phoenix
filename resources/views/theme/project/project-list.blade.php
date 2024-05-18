@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/blog.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Dự án')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Dự án</span>
    </div>
</section>

<section class="s-area blogpage-area">
    <div class="s-header">
        <h2 class="s-header__title">Dự án của chúng tôi</h2>
    </div>
    <div class="s-main blogpage-wrap">
        <div class="containerx">
            <div class="project-master">
                <div class="project-master-item">
                    <a class="project-master-item-thumnail" href="{{ route('theme.project_detail', $projects[0]->slug) }}">
                        <img src="{{ asset('storage/posts/'.$projects[0]->id.'/'.$projects[0]->cover_image) }}" alt="">
                    </a>
                    <a class="project-master-item-title" href="">
                        {{ $projects[0]->title }}
                    </a>
                </div>
            </div>
            <div class="post-news-grid">
                @foreach($projects as $project)
                <div class="post">
                    <a class="img-post" href="{{ route('theme.project_detail', $project->slug) }}">
                        <img src="{{ asset('storage/posts/'.$project->id.'/'.$project->cover_image) }}" alt="">
                    </a>
                    <div class="content-post">
                        <a href="{{ route('theme.project_detail', $project->slug) }}" class="title-post">
                            <h3 style="padding-top: 0;">{{ $project->title }}</h3>
                        </a>
                        <p class="excerpt">{!! $project->description !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <ul class="page-numbers">
                <li class="fist-number">1</li>
                <li>2</li>
                <li>3</li>
                <li>...</li>
                <li>31</li>
            </ul> -->
        </div>
    </div>
</section>
@endsection