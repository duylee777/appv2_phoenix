@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product-list.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product-list.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Danh sách sản phẩm')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>{{ $category->name }}</span>
    </div>
</section>
<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">{{ $category->name }}</h2>
    </div>
</section>
<section class="category-list">
    <div class="list containerx">
        @if(count($listProduct) > 0)
        @foreach($listProduct as $product)
            @if($product->is_active == true)
            <div class="list-item">
                <div class="list-item-thumnail">
                    <?php 
                        $listImg = json_decode($product->image);  
                        
                    ?>
                    @if(!empty($listImg))
                        <img src="{{asset('../storage/products/'.$product->code.'/image/'.$listImg[0])}}">
                    @else
                        <img src="https://images.pexels.com/photos/4841450/pexels-photo-4841450.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Extra large image">
                    @endif
                </div>
                <h5 class="list-item__name">{{ $product->name }}</h5>
                <a href="{{ route('theme.product_detail',['slug_category' => $category->slug, 'slug_product' => $product->slug]) }}" class="list-item__link"></a>
            </div>
            @endif
        @endforeach
        @else
            <span>(Chưa có sản phẩm)</span>
        @endif
    </div>
</section>
@endsection



