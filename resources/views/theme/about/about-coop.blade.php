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
        @media screen and (max-width: 769px) {
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
        @media screen and (max-width: 576px) {
            .text-wrap {
                flex-direction: column;
            }
            .text-wrap div {
                width: 100% !important;
                padding: 0 !important;
                text-align: center !important;
            }
            .text-wrap div img{
                width: 70% !important;
            }
        }
    </style>
@endpush
@section('title','Đối tác')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Đối tác</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            <ul class="cate-wrap">
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_phoenix') }}" id="" class="cate-link">Về phoenix</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_history') }}" id="" class="cate-link">Lịch sử hình thành</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_ceo') }}" id="" class="cate-link">Đội ngũ lãnh đạo</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_coop') }}" id="" class="cate-link cate-link--active">Đối tác</a>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="list-brands">
            <div class="s-header">
                <h2 class="s-header__title" style="margin-bottom: 2rem;">Hợp tác quốc tế</h2>
            </div>
            <div class="" style="margin-top: 2rem;">
                <img src="/assets/theme/imgs/about/dmx.png" alt="dmx logo">
                <p>
                    GUANGZHOU REGAL ELECTRONIC CO., LTD </br>
                    Address: No.3 Guang Qi Avenue, Qian Feng North Road, Shi Ji Town, Pan Yu District, Guangzhou, China</br>
                    Tel: 020-39938866 Fax: 020-34617653</br>
                    Email: dmx@dmxaudio.cn</br>
                </p>
                <img src="/assets/theme/imgs/about/dmx-cef.png" alt="">
            </div>
            <div class="" style="margin-top: 2rem;">
                <img src="/assets/theme/imgs/about/pow.png" alt="pow logo">
                <p>
                    Powersoft Advanced Technology Corp </br>
                    199 US-206</br>
                    Suite B</br>
                    Flanders, NJ 07836</br>
                    Phone: +1 (201) 299-5300</br>
                </p>
                <img src="/assets/theme/imgs/about/pow-cef.png" alt="">
            </div>
            <div class="" style="margin-top: 2rem;">
                <img src="/assets/theme/imgs/about/bbs.png" alt="bbs logo">
                <p>
                    Welcome to join us and create brilliance together</br>
                    Address: BBS Science and Technology Culture Industrial Park, Ebu Street, Shenshan Special Cooperation Zone, Shenzhen</br>
                    Tel: 0755-28055222</br>
                    Email: bbs@bbsacoustics.com</br>
                </p>
                <img src="/assets/theme/imgs/about/bbs-cef.png" alt="">
            </div>
        </div>
    </div>
</section>

@endsection