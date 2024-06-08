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
@section('title','Đội ngũ lãnh đạo')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Đội ngũ lãnh đạo</span>
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
                        <a href="{{ route('theme.about_ceo') }}" id="" class="cate-link cate-link--active">Đội ngũ lãnh đạo</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_coop') }}" id="" class="cate-link">Đối tác</a>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="list-brands">
            <div class="s-header">
                <h2 class="s-header__title" style="margin-bottom: 2rem;">Đội ngũ lãnh đạo</h2>
            </div>
            <div class="">
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: center;">
                    <div class="" style="width: 50%; text-align: center;">
                        <img src="/assets/theme/imgs/about/cthdqt.png" alt="phoenix 1" style="width: 90%;">
                        <span style="display: block; text-align: center; font-weight: 600; color: red;">Ông Bùi Hồng Vinh: Chủ tịch HĐQT</span>
                    </div>
                    <div class="" style="width: 50%; padding-left: 2.5rem;">
                        <p style="margin-top: 2rem; text-align: justify;">
                            “ Giá trị mang lại cho khách hàng trong từng sản phẩm, dịch vụ là điều quan trọng hàng đầu ”
                        </p>
                    </div>
                </div>
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: center;">
                    <div class="" style="width: 50%; padding-right: 2.5rem;">
                        <p style="margin-top: 2rem; text-align: justify;">
                            “ Kết nối và chia sẻ giá trị là cốt lõi của doanh nghiệp bền vững ”
                        </p>
                    </div>
                    <div class="" style="width: 50%; text-align: center;">
                        <img src="/assets/theme/imgs/about/tgd.png" alt="phoenix 1" style="width: 90%;">
                        <span style="display: block; text-align: center; font-weight: 600; color: red;">Ông Nguyễn Văn Quân: Tổng Giám Đốc</span>
                    </div>
                </div>
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: center;">
                    <div class="" style="width: 50%; text-align: center;">
                        <img src="/assets/theme/imgs/about/gdkd.png" alt="phoenix 1" style="width: 90%;">
                        <span style="display: block; text-align: center; font-weight: 600; color: red;">Ông Đặng Đức Quang : Giám đốc kinh doanh</span>
                    </div>
                    <div class="" style="width: 50%; padding-left: 2.5rem;">
                        <p style="margin-top: 2rem; text-align: justify;">
                            “ Sự cam kết và đồng hành là con đường chúng ta cùng đi tới đích một cách nhanh nhất”
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection