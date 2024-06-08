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
@section('title','Về Phoenix')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Về Phoenix</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            <ul class="cate-wrap">
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_phoenix') }}" id="" class="cate-link cate-link--active">Về phoenix</a>
                    </div>
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.about_history') }}" id="" class="cate-link">Lịch sử hình thành</a>
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
                <h2 class="s-header__title" style="margin-bottom: 2rem;">Về Phoenix</h2>
            </div>
            <div class="">
                <div class="" style="text-align: center; padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem;">
                    <img src="/assets/theme/imgs/about/ve-chung-toi.png" alt="phoenix">
                </div>
                <p style="text-align: justify;">
                    Công ty cổ phần điện tử và công nghệ Phượng Hoàng được thành lập tháng 1 năm 2015 (tiền thân là công ty cổ phần điện tử Phượng Hoàng). Hoạt động trong lĩnh vực nhập khẩu và phân phối thiết bị âm thanh tại thị trường Việt Nam, hướng tới sự mở rộng ra thị trường quốc tế.
                </p>
                <p style="text-align: justify;">
                    Từ khi thành lập công ty cổ phần điện tử và công nghệ Phượng Hoàng luôn không ngừng nỗ lực nghiên cứu để mở rộng thị trường và mang đến cho khách hàng những sản phẩm chất lượng cao đi cùng dịch vụ khách hàng tốt nhất. Thành công của công ty được khẳng định qua sự ghi nhận của của hàng trăm khách hàng, đối tác uy tín trong ngành điện tử và thiết bị âm thanh trong nước và quốc tế. Điều đó càng khẳng định sự đúng đắn của công ty trong việc theo đuổi những giá trị cốt lõi trong nhiều năm qua. 
                </p>
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: flex-start;">
                    <div class="" style="width: 50%;">
                        <img src="/assets/theme/imgs/about/su-menh.png" alt="phoenix 1" style="width: 90%;">
                    </div>
                    <div class="" style="width: 50%; padding-left: 2.5rem;">
                        <h2 style="text-align: center">Tầm nhìn chiến lược</h2>
                        <p style="margin-top: 2rem; text-align: justify;">
                            Phoenix theo đuổi mục tiêu trở thành nhà cung cấp thiết bị âm thanh top 5 của thị trường Việt Nam tới năm 2025. Tầm nhìn 2023 công ty sẽ trở thành đơn vị cung cấp âm thanh cho thị trường Đông Nam Á
                        </p>
                    </div>
                </div>
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: flex-start;">
                    <div class="" style="width: 50%; padding-right: 2.5rem;">
                        <h2 style="text-align: center">Sứ mệnh</h2>
                        <p style="margin-top: 2rem; text-align: justify;">
                            Phoenix audio được xây dựng lên với sứ mệnh mang đến những giá trị âm thanh đích thức cho người tiêu dùng bằng những sản phẩm chính hãng, chất lượng cao. Với đối tác kinh doanh chúng tôi cam kết mang tới sự đồng hành, gắn kết phát triển sự hợp tác bền vững.
                        </p>
                    </div>
                    <div class="" style="width: 50%; text-align: end;">
                        <img src="/assets/theme/imgs/about/su-menh-1.png" alt="phoenix 1" style="width: 90%;">
                    </div>
                </div>
                <div class="text-wrap" style="margin-top: 4rem; display: flex; align-items: flex-start;">
                    <div class="" style="width: 50%;">
                        <img src="/assets/theme/imgs/about/gia-tri-cot-loi.png" alt="phoenix 1" style="width: 90%;">
                    </div>
                    <div class="" style="width: 50%; padding-left: 2.5rem;">
                        <h2 style="text-align: center">Giá trị cốt lõi</h2>
                        <p style="margin-top: 2rem; text-align: justify;">
                            Chất lượng sản phẩm cho tiêu chuẩn quốc tế. Kết nối và chia sẻ giá trị cho sự phát triển bền vững. Sự tận tâm của đội ngũ nhân sự chuyên nghiệp. Trách nhiệm đến cùng với đại lý, người tiêu dùng và cán bộ nhân viên
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection