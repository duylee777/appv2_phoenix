@extends('theme.layouts.index')
@section('title','Trang chủ')
@section('bg-video')
<section id="homebanner" class="homebanner">
    <div class="homebanner__mask">
        <video muted loop autoplay>
            <source src="{{ asset('assets/theme/videos/V_1.mp4') }}" type="video/mp4">
        </video>
    </div>
</section>
@endsection
@section('content')
<section class="featured-product-area">
    <div class="featured-product-wrap containerx">
        <div class="category-by-product-wrap">
            @if($cateOfProds != null)
            <ul class="category-by-product">
                @foreach($cateOfProds as $cate)
                <li class="category-by-product-item">
                    <a href="{{ route('theme.category',$cate->slug) }}" class="category-by-product-link">{{ $cate->name }}</a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="visible-featured-product">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach($products as $key => $product)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}" aria-current="true" aria-label="Slide {{$key}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                @foreach($products as $key => $product)
                @php 
                    $img = json_decode($product->image);
                @endphp
                @if($key == 0)
                    <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}" class="carousel-item active">
                        <!-- <img src="{{ asset('storage/products/'.$product->code.'/image/'.$img[0]) }}" alt="{{ $product->name }}" class="" alt="..."> -->
                        <img src="{{ asset('storage/products/'.$product->code.'/thumbnails/'.$product->code.'.webp') }}" alt="{{ $product->name }}" class="reponsive-slide" alt="...">
                    </a>
                @else
                    <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}" class="carousel-item">
                        <img src="{{ asset('storage/products/'.$product->code.'/thumbnails/'.$product->code.'.webp') }}" alt="{{ $product->name }}" class="" alt="...">
                    </a>
                @endif
                @endforeach
                    <!-- <a href="" class="carousel-item">
                        <img src="https://images.pexels.com/photos/1612351/pexels-photo-1612351.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="" alt="...">
                    </a> -->
                </div>
                @if(count($products) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="blog-area">
    <div class="s-header">
        <h2 class="s-header__title">Dự án</h2>
    </div>
    <div class="s-main list-news containerx">
        @foreach($projects as $project)
        @php
            $link = asset('storage/posts/'.$project->id.'/'.$project->cover_image);
        @endphp
        <div class="project-item">
            <span class="project--attack"><i class="fa-regular fa-circle"></i></span>
            <div class="project-item-wrap">
                <h3 class="project-item__title">{{ $project->title }}</h3>
                <div class="project-item__thumnail">
                    <img src="{{$link}}" alt="">
                </div>
                <div class="project-item__link-wrap">
                    <a href="{{ route('theme.project_detail', $project->slug) }}" class="project-item__link">Xem dự án <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="" style="text-align: center; margin-top: 1rem;">
        <a href="{{ route('theme.project') }}" class="inner-about">Xem tất cả ...</a>
    </div>
</section>
<section class="blog-area">
    <div class="s-header">
        <h2 class="s-header__title">Bài viết mới</h2>
    </div>
    <div class="s-main list-news containerx">
        @foreach($news as $newsItem)
        @php
            $link = asset('storage/posts/'.$newsItem->id.'/'.$newsItem->cover_image);
        @endphp
        <div class="news-item">
            <div class="news-item-wrap">
                <div class="news__thumnail">
                    <img src="{{$link}}" alt="">
                </div>
                <div class="coating">
                    <div class="content-news">
                        <p class="content-news__title">{{ $newsItem->title }}</p>
                        <span class="content-news__description">{!! $newsItem->description !!}</span>
                    </div>
                </div>
                <div class="content-news__link">
                    <a href="{{ route('theme.news_detail', $newsItem->slug) }}"><span>Chi tiết <i class="fa-solid fa-arrow-right"></i></span></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="" style="text-align: center; margin-top: 1rem;">
        <a href="{{ route('theme.news') }}" class="inner-about">Xem tất cả ...</a>
    </div>
</section>
@endsection