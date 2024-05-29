@extends('theme.layouts.index')
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
@endsection