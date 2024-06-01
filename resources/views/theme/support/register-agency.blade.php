@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product-list.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product-list.css">
    <link rel="stylesheet" href="/assets/theme/css/contact.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
    <style>
        .category-list-wrap{
            display: flex;
            align-items: flex-start;
        }
        .list-brands {
            padding-left: 1rem;
            flex-grow: 1;
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
        .contactpage-form-wrap {
            width: 100%;
            margin-top: 1rem;
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
@section('title','Đăng ký đại lý kinh doanh')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Đăng ký đại lý kinh doanh</span>
    </div>
</section>
<section class="category-list">
    <div class="containerx category-list-wrap">
        <div class="category-by-product-wrap">
            @if($categories != null)
            <ul class="cate-wrap">
                <li class="cate-item">
                    <div class="cate-item-btn">
                        <a href="{{ route('theme.support_all') }}" id="all" class="cate-link">Hỗ trợ</a>
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
                                        <a href="{{ route('theme.register_agency') }}" id="{{ $cate2->id }}" class="cate-link cate-link--active">{{ $cate2->name }}</a>
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
            <h3 class="company-name">Trở thành đại lý của Phượng Hoàng</h3>
            <div class="company-info">
                <span><i class="fa-solid fa-hand-holding-heart"></i> Phân phối các mã sản phẩm của Phoenix</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Giao hàng tận nơi</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Chế độ bảo hành nhanh chóng</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Chế độ chăm sóc đặc biệt</span>
            </div>
            <div class="contactpage-form-wrap">
                <form action="{{ route('theme.register_agency_post') }}" method="post" class="contactpage-form" enctype="multipart/form-data">
                    @csrf
                    <div class="contactpage-form__item">
                        <label for="name">Tên đại lý <span style="color:red;">*</span></label>
                        <input type="text" id="name" name="name" placeholder="Nhập tên đại lý ..." required>
                    </div>
                    <div class="contactpage-form__item">
                        <label for="email">Email <span style="color:red;">*</span></label>
                        <input type="email" id="email" name="email" placeholder="Nhập email ..." required>
                    </div>
                    <div class="contactpage-form__item">
                        <label for="phone">Số điện thoại <span style="color:red;">*</span></label>
                        <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại ..." required>
                    </div>
                    <div class="contactpage-form__item">
                        <label for="message">Nội dung <span style="color:red;">*</span></label>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Nhập nội dung của bạn ..." required></textarea>
                    </div>
                    <div class="contactpage-form-btn">
                        <button type="submit" class="contactpage-btn">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection


{{-- @extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/contact.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Đăng ký đại lý kinh doanh')
@section('content')
<style>
    .company-info span{
        font-size: 18px;
    }
    .company-name {
        font-size: 20px;
    }
</style>
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Đăng ký đại lý kinh doanh</span>
    </div>
</section>
<section class="s-area contactpage-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Đăng ký đại lý kinh doanh</h2>
    </div>
    
    <div class="contactpage-wrap containerx">
        <div class="contactpage-info">
            <h3 class="company-name">Trở thành đại lý của Phượng Hoàng</h3>
            <div class="company-info">
                <span><i class="fa-solid fa-hand-holding-heart"></i> Phân phối các mã sản phẩm của Phoenix</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Giao hàng tận nơi</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Chế độ bảo hành nhanh chóng</span>
                <span><i class="fa-solid fa-hand-holding-heart"></i> Chế độ chăm sóc đặc biệt</span>
            </div>

            <div class="" style="margin-top: 40px;  margin-bottom: 20px;">
                <h3 class="company-name">Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</h3>

                <div class="company-info">
                    <span><i class="fa-solid fa-location-dot"></i> M01-L07 Khu đô thị Dương Nội A, phường La Khê, quận Hà Đông, TP.Hà Nội</span>
                    <span><i class="fa-solid fa-phone"></i> Hotline miền Bắc: 0933 991 338</span>
                    <span><i class="fa-solid fa-location-dot"></i> Miền Nam: 14 Phan Thị Hành, Phú Thọ Hoà, Tân Phú, TP.Hồ Chí Minh</span>
                    <span><i class="fa-solid fa-phone"></i> Hotline miền Nam: 0913 337 662</span>
                    <span><i class="fa-solid fa-envelope"></i>  cskh@phoenixaudio.vn </span>
                </div>
            </div>
        </div>
        <div class="contactpage-form-wrap">
            <form action="{{ route('theme.register_agency_post') }}" method="post" class="contactpage-form" enctype="multipart/form-data">
                @csrf
                <div class="contactpage-form__item">
                    <label for="name">Tên đại lý <span style="color:red;">*</span></label>
                    <input type="text" id="name" name="name" placeholder="Nhập tên đại lý ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="email">Email <span style="color:red;">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Nhập email ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="phone">Số điện thoại <span style="color:red;">*</span></label>
                    <input type="tel" id="phone" name="phone" placeholder="Nhập số điện thoại ..." required>
                </div>
                <div class="contactpage-form__item">
                    <label for="message">Nội dung <span style="color:red;">*</span></label>
                    <textarea name="message" id="message" cols="30" rows="5" placeholder="Nhập nội dung của bạn ..." required></textarea>
                </div>
                <div class="contactpage-form-btn">
                    <button type="submit" class="contactpage-btn">Gửi</button>
                </div>
            </form>
        </div>
        
    </div>
</section>
@if(Session::has('msg'))
    <input id="notification" value="{{ Session::get('msg') }}" hidden></input>
@endif
@if(Session::has('error'))
    <input id="error" value="{{ Session::get('error') }}" hidden></input>
@endif

<script>
    console.log($('#notification').val())
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if($('#notification').val() != undefined) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: $('#notification').val(),
                showConfirmButton: false,
                timer: 2000
            });
        }
        if($('#error').val() != undefined) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: $('#error').val(),
                showConfirmButton: false,
                timer: 2000
            });
        }

        $(".contactpage-btn1").click(function(e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var message = $("#message").val();

            $.ajax({
                type: 'POST',
                url: "{{ route('theme.register_agency_post') }}",
                data: {
                    "name":name, 
                    "email": email, 
                    "phone": phone,
                    "message": message
                },
                success: function() {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title:"Cảm ơn khách hàng đã đăng ký trở thành đại lý của chúng tôi !",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        location.reload();
                    });
                    
                },
                error: function() {
                    alert('Thông tin chưa được gửi đi !');
                }
            })
        });
    });
</script>
@endsection --}}