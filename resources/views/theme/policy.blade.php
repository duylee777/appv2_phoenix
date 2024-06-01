@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/blog.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Quy định và chính sách')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <a href="{{ route('theme.news') }}">Quy định và chính sách</a>
        <span>&gt;</span>
        <span>{{ $post->title }}</span>
    </div>
</section>
<section class="s-area blogpage-area">
    <div class="s-main blogpage-wrap">
        <div class="m-news containerx">
            <div class="lists-news">
                {{-- <h4 class="head-more-news">Chính sách khác</h4> --}}
                @php
                    $policyCat = App\Models\Category::where('slug', "quy-dinh-va-chinh-sach")->first();
                    $policies = App\Models\Post::where('category_id', $policyCat->id)->orderBy('id', 'ASC')->get();
                @endphp
                
                @foreach($policies as $policy)
                    @if($policy->slug != $post->slug)
                    <div class="more-news">
                        <a href="{{ route('theme.policy', $policy->slug) }}" class="entry-title">
                            <h4>{{ $policy->title }}</h4>
                        </a>
                    </div>
                    @endif
                @endforeach
            </div>
            <div class="post-news">
                <div class="s-header" style="margin-bottom: 1rem;">
                    {{-- <div class="inner-link">
                        @foreach($post->tags as $tag)
                            <a href="">{{ $tag->name }}</a>
                        @endforeach
                    </div> --}}
                    <h1 class="s-header__title">{{ $post->title }}</h1>
                </div>
                {!! $post->detail !!}
            </div>
        </div>
    </div>
</section>

@endsection