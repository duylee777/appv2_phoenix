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
@section('title','Giới thiệu')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Giới thiệu</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            @if($postAbouts != null)
            <ul class="cate-wrap">
                @foreach($postAbouts as $post)
                    <li class="cate-item">
                        <div class="cate-item-btn">
                            @if($post->slug != 've-chung-toi')
                                <a href="{{ route('theme.post_about', $post->slug) }}" id="{{ $post->id }}" class="cate-link">{{ $post->title }}</a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
            @endif
        </div>
        
        <div class="list-brands">
            <div class="s-header">
                <h2 class="s-header__title" style="margin-bottom: 1rem;">{{ $about->title }}</h2>
            </div>
            {!! $about->detail !!}
        </div>
    </div>
</section>

@endsection


{{-- @extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/about.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Giới thiệu')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Giới thiệu</span>
    </div>
</section>
<section class="aboutpage-area">
        <div class="s-header">
            <h2 class="s-header__title">Về chúng tôi</h2>
        </div>
        <div class="aboutpage-content">
            {!! $about->detail !!}
        </div>
    </section>
@endsection --}}
    {{-- <div class="aboutpage-content">
        <h3>Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng, tiền thân là Công ty Cổ phần Điện Tử Phượng Hoàng (Công ty Phượng Hoàng)</h3>
        <div class="aboutpage-content-paragraph">
            <p>
                Được thành lập từ năm 2015, trải qua gần 10 năm hoạt động và phát triển, Chúng tôi  được biết đến là một trong những công ty thương mại chuyên cung cấp thiết bị âm thanh chuyên nghiệp hàng đầu Việt Nam. Chúng tôi định hướng phát triển công ty theo hướng doanh nghiệp có giá trị bền vững. Điều này dựa trên tiêu chí là luôn đảm bảo duy trì hài hòa lợi ích của công ty với khách hàng, đối tác và người lao động.</p>
        </div>
        <div class="aboutpage-content-wrap">
            <div class="aboutpage-content__img">
                <img src="{{ asset('assets/theme/imgs/about/about1.jpg') }}" alt="">
            </div>
            <div class="aboutpage-content__detail">
                <p>Công ty Phượng Hoàng Cam kết đem lại giá trị thực sự cho khách hàng thông qua các sản phẩm, dịch vụ có chất lượng theo tiêu chuẩn quốc tế.</p><br>
                <p>Chúng tôi tạo dựng một môi trường làm việc với tinh thần tập thể cao, khuyến khích nhân viên chia sẻ, đoàn kết cùng nhau hướng đến mục tiêu. Mọi thành viên trong công ty đều được trao cơ hội để cống hiến và phát triển bản thân, được công nhận và đãi ngộ xứng đáng.</p>
            </div>
        </div>
        <div class="aboutpage-content-wrap">
            <div class="aboutpage-content__detail">
                <p>Từ khi thành lập Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng luôn không ngừng nỗ lực nghiên cứu để mở rộng thị trường và mang đến cho khách hàng những sản phẩm chất lượng cao và dịch vụ tốt nhất. Thành công của công ty được khẳng định qua sự ghi nhận của của hàng trăm khách hàng, đối tác uy tín trong ngành điện tử và thiết bị âm thanh trên toàn quốc. Điều đó càng khẳng định sự đúng đắn của công ty trong việc theo đuổi những giá trị cốt lõi trong nhiều năm qua.</p>
            </div>
            <div class="aboutpage-content__img">
                <img src="{{ asset('assets/theme/imgs/about/about2.png') }}" alt="">
            </div>
        </div>
        <div class="aboutpage-content-wrap">
            <div class="aboutpage-content__img">
                <img src="{{ asset('assets/theme/imgs/about/about3.jpg') }}" alt="">
            </div>
            <div class="aboutpage-content__detail">
                <p><strong>Niềm tin của khách hàng dành chúng tôi chính là giá trị lớn nhất và ý nghĩa nhất với chúng tôi.</strong></p>
                <p>Trải qua thời gian, thử thách và biến động của thị trường,  đội ngũ lãnh đạo và cán bộ nhân viên đã cùng nhau xây dựng nên những giá trị cốt lõi và bản sắc văn hoá riêng, tạo nên tầm vóc mới, sức mạnh mới cho thương hiệu Công ty Phượng Hoàng. Chúng tôi tin tưởng rằng, với sự ủng hộ mạnh mẽ hơn nữa của các Quý khách hàng, đối tác, đội ngũ lãnh đạo và nhân viên, cùng chiến lược hoạt động đúng đắn, Công ty Cổ phần Điện Tử Phượng Hoàng sẽ phát triển ngày một lớn mạnh.</p>
            </div>
        </div>
    </div> --}}