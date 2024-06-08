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
                        <a href="{{ route('theme.about_history') }}" id="" class="cate-link cate-link--active">Lịch sử hình thành</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_ceo') }}" id="" class="cate-link">Đội ngũ lãnh đạo</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_coop') }}" id="" class="cate-link">Đối tác</a>
                    </div>
                </li>
            </ul>
        </div>
        
        <div class="list-brands">
            <div class="s-header">
                <h2 class="s-header__title" style="margin-bottom: 2rem;">Lịch sử hình thành và phát triển</h2>
            </div>
            <div class="">
                <p style="margin-top: 2rem; text-align: justify;">
                    Vào những năm 2012, khi làn sóng phát triển các thiết bị âm thanh chuyên nghiệp bắt đầu có xu hướng phát triển nhanh tại thị trường Việt Nam, trên thị trường bắt đầu xuất hiện các đơn vị Nhập khẩu và phân phối các sản phẩm âm thanh với quy mô nhỏ lẻ và tự phát.
                </p>
                <p style="text-align: justify;">
                    Nhìn nhận xu thế phát triển của thị trường, vào năm 2014, những thành viên sáng lập của Phoenix audio đã gặp mặt, lên ý tưởng kinh doanh về một doanh nghiệp nhập khẩu và phân phối âm thanh chuyên nghiệp tại Việt Nam. Với sứ mệnh tạo ra sự kết nối kinh doanh bền vững nghành cũng như mang tới cho người tiêu dùng Việt Nam những giá trị âm thanh đích thực, ngày 15 tháng 01 năm 2015 công ty cổ phần điện tử Phượng Hoàng chính thức được thành lập.
                </p>
                <p style="text-align: justify;">
                    Trải qua thời gian phát triển, vượt qua những khó khăn của thị trường và tình hình dịch bệnh, sự suy thoái kinh tế trên toàn thế giới, hiện nay chúng tôi tự hào là một trong những đơn vị hàng đầu trong lĩnh vực nhập khẩu và phân phối thiết bị âm thanh tại Việt Nam. Tầm nhìn hướng tới năm 2023 chúng tôi sẽ trở thành đơn vị cung cấp thiết bị âm thanh chuyên nghiệp cho thị trường Đông Nam Á.
                </p>
            </div>
            <div class="s-header">
                <h2 class="s-header__title" style="margin-bottom: 2rem;">Các dấu ấn và cột mốc quan trọng</h2>
            </div>
            <div class="">
                <div class="">
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-diamond"></i>
                        2024
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Đạt mốc 500 đại lý kinh doanh trên toàn quốc </br>
                        Chính thức trở thành đại diện nghành âm thanh của Philips tại thị trường Việt Nam </br>
                        Kiện toàn ban lãnh đạo công ty </br>
                        Xác định tầm nhìn 2030 vươn ra thị trường quốc tế
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2023
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Chính thức đổi tên “ Công ty cổ phần điện tử và công nghệ Phượng Hoàng” </br>
                        Xây dựng chi nhánh tại Thành phố Hồ Chí Minh </br>
                        Chính thức là đại diện thương hiệu Powersoft tại thị trường Việt Nam </br>
                        Chính thức trở thành đại diện thương hiệu BBS tại thị trường Việt Nam </br>
                        Chính thức trở thành đại diện thương hiệu NoVa tại thị trường Việt Nam
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2022
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Đạt mốc 300 đại lý kinh doanh tại thị trường miền bắc và miền trung Việt Nam </br>
                        Duy trì vị thế doanh nghiệp top đầu nhập khẩu và phân phối thiết bị âm thanh </br>
                        Vinh danh của thương hiệu DMX tai thị trường Châu Á thái bình dương </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2021
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Top những đơn vị nhập và phân phối âm thanh tại thị trường miền bắc </br>
                        Mở rộng kinh doanh thị trường miền trung Việt Nam </br>
                        Tiếp tục là đơn vị có doanh số top 1 tại thị trường Đông Nam á của thương hiệu DMX </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2019-2020
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Vượt qua sự khó khăn do dịch bệnh covid 19 </br>
                        Giữ vị thế là nhà đại diện thương hiệu DMX tại thị trường Việt Nam </br>
                        Doanh số top 1 thị trường đông nam Á của thương hiệu DMX </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2018
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Đạt mốc 200 đại lý kinh doanh tại thị trường miền bắc </br>
                        Duy trì vị thế là đại diện thương hiệu DMX tại thị trường Việt Nam </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2017
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Đạt mốc 150 đại lý kinh doanh tại thị trường miền bắc </br>
                        Đại diện thương hiệu DMX trên thị trường toàn quốc </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2016
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Đạt mốc 100 đại lý kinh doanh tại thị trường miền bắc </br>
                        Đại diện thương hiệu DMX tại thị trường phía bắc Việt Nam </br>
                    </p>
                    <span style="display: flex; align-items: center; gap: 1rem; font-weight: 600; color: red;">
                        <i class="fa-solid fa-caret-up" style="margin-left: 0.25rem;"></i>
                        2015
                    </span>
                    <p style="text-align: justify; display: block; padding-left: 1.5rem; padding-top: 0.5rem; padding-bottom: 0.5rem; margin-left: 0.5rem; margin-bottom: 0; border-left: 2px dashed red;">
                        Chính thức gia nhập thị trường âm thanh tại Việt Nam </br>
                        Tên gọi công ty cổ phần điện tử Phượng Hoàng </br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection