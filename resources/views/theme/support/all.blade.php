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
        .cate-wrap {
            list-style-type: none;
            padding-left: 0;
        }
        .cate-wrap a {
            padding-top: 8px;
            padding-bottom: 8px;
            padding-right: 8px;
            background-color: transparent;
            color: black;
            border-bottom: 2px solid var(--bg__grey--regular);
            transition: all 300ms ease-in-out;
            width: max-content;
        }
        .cate-wrap a:hover {
            color: var(--color__base);
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
            padding-left: 16px;
        }
        .cate-link--active {
            background: var(--color__base) !important;
            color: white !important;
            padding-left: 8px !important;
        }
        .category-by-product-wrap {
            min-width: 280px !important;
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
@section('title','Hỗ trợ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Hỗ trợ</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            @if($categories != null)
            <ul class="cate-wrap">
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.support_all') }}" id="all" class="cate-link cate-link--active">Hỗ trợ</a>
                    </div>
                </li>
                @foreach($categories as $cate)
                    <li class="cate-item">
                        <div class="cate-item-btn">
                            <span id="{{ $cate->id }}" style="padding: 8px 0;">{{ $cate->name }} :</span>
                        </div>
                        @if(count($cate->childs) != 0)
                        <ul id="dropdown_{{$cate->id}}" class="cate-wrap cate-dropdown e-show">
                            @foreach($cate->childs as $cate2)
                            <li class="cate-item">
                                <div class="cate-item-btn">
                                    @if($cate2->slug == 'dang-ky-dai-ly-kinh-doanh')
                                        <a href="{{ route('theme.register_agency') }}" id="{{ $cate2->id }}" class="cate-link">{{ $cate2->name }}</a>
                                    @else
                                        <a href="{{ route('theme.support_index', $cate2->slug) }}" id="{{ $cate2->id }}" class="cate-link">{{ $cate2->name }}</a>
                                    @endif
                                    
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        
        <div class="list-brands">
            <?= $postHoTro->detail ?>
        </div>
    </div>
</section>

@endsection



