@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product-list.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product-list.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
    <style>
        .category-list-wrap{
            display: flex;
            align-items: flex-start;
        }
        .list-brands {
            padding-left: 1rem;
        }
        .e-show {
            display: block;
        }
        .e-hidden {
            display: none;
        }
                .cate-wrap {
            list-style-type: none;
            padding-left: 0;
        }
        .cate-wrap button {
            padding: 8px 0;
            background-color: transparent;
            border-bottom: 2px solid var(--bg__grey--regular);
            transition: all 300ms ease-in-out;
        }
        .cate-item-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .cate-link {
            flex-grow: 1;
            text-align: start;
        }
        .cate-dropdown {
            margin-bottom: 0;
            padding-left: 1.5rem;
        }
        .cate-link--active {
            background: var(--color__base) !important;
            color: white;
            padding-left: 8px !important;
        }
        @media screen and (max-width: 576px) {
            .category-list-wrap{
                flex-direction: column;
            }
            .category-by-product-wrap {
                width: 100% !important;
            }
            .category-list .list {
                width: 100%;
            }
        }
    </style>
@endpush
@section('title','Sản phẩm mới')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Sản phẩm mới</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            @if($categories != null)
            <ul class="cate-wrap">
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <button type="button" id="all" class="cate-link  cate-link--active" onclick="selectCategory(this);">Tất cả sản phẩm</button>
                    </div>
                </li>
                @foreach($categories as $cate)
                @if($cate->parent_id == 3)
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <button type="button" id="{{ $cate->id }}" class="cate-link" onclick="selectCategory(this);">{{ $cate->name }}</button>
                        @if(count($cate->childs) != 0)
                        <button id="child_{{$cate->id}}" data-dropdown="dropdown_{{$cate->id}}" class="drop-btn" onclick="dropdownChildCate(this);"><i class="fa-solid fa-chevron-down"></i></button>
                        @endif
                    </div>
                    @if(count($cate->childs) != 0)
                    <ul id="dropdown_{{$cate->id}}" class="cate-wrap cate-dropdown e-hidden">
                        @foreach($cate->childs as $cate2)
                        <li class="cate-item">
                            <div class="cate-item-btn">
                                <button type="button" id="{{ $cate2->id }}" class="cate-link" onclick="selectCategory(this);">{{ $cate2->name }}</button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endif
                @endforeach
            </ul>
            @endif
        </div>
        
        <div class="list list-brands">
            @if(count($newProducts) > 0)
                @foreach($newProducts as $product)
                    @if($product->is_active == true)
                    <div class="list-item e-show" data-cateid="cate_{{$product->category->id}}">
                        <div class="list-item-thumnail">
                            <?php $listImg = json_decode($product->image);  ?>
                            <img src="{{ asset('storage/products/'.$product->code.'/image/'.$listImg[0]) }}" alt="{{ $product->name }}">
                        </div>
                        <h5 class="list-item__name">{{ $product->name }}</h5>
                        <a href="{{ route('theme.product_detail',['slug_category' => $product->category->slug, 'slug_product' => $product->slug]) }}" class="list-item__link"></a>
                    </div>
                    @endif
                @endforeach
            @else
                <span>(Chưa có sản phẩm thuộc thương hiệu)</span>
            @endif
        </div>
    </div>
</section>

<script>
    function dropdownChildCate(obj) {
        let btn = document.querySelector('#'+obj.id);
        let dropdown = document.querySelector('#'+obj.dataset.dropdown);
        
        if(dropdown.classList.contains('e-hidden')) {
            dropdown.classList.remove('e-hidden');
        }
        else {
            dropdown.classList.add('e-hidden');
        }
    }
    
    function selectCategory(obj) {
        let item = document.querySelectorAll('.cate-link');
        let products = document.querySelectorAll('.list-item');
        
        for(let i = 0; i < item.length; i++) {
            if(obj.id == item[i].id) {
                item[i].classList.add('cate-link--active');
            }
            else {
                if(item[i].classList.contains('cate-link--active')) {
                    item[i].classList.remove('cate-link--active');
                }
            }
        }
        
        if(obj.id == 'all') {
            for(let i = 0; i < item.length; i++) {
                if(products[i].classList.contains('e-hidden')) {
                    products[i].classList.remove('e-hidden');
                    products[i].classList.add('e-show');
                }
            }
        }
        
        if(obj.id != 'all') {
            for(let i = 0; i < products.length; i++) {
                if(products[i].dataset.cateid == "cate_"+obj.id) {
                    if(products[i].classList.contains('e-hidden')) {
                        products[i].classList.remove('e-hidden');
                        products[i].classList.add('e-show');
                    }
                }
                else {
                    if(products[i].classList.contains('e-show')) {
                        products[i].classList.remove('e-show');
                        products[i].classList.add('e-hidden');
                    }
                }
            }
        }
    }
</script>
@endsection



