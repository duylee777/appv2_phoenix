@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/agency.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Đại lý')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <a href="{{route('theme.agency')}}">Đại lý</a>
        <span>&gt;</span>
        <span>{{$agency->name}}</span>
    </div>
</section>
<section class="s-area agency-area">
        <div class="s-header containerx">
            <h2 class="s-header__title">{{$agency->name}}</h2>
        </div>

        <div class="containerx">
            @if(!empty($agency))
                <div class="view-screen">
                    <div class="agency-wrap m-view">
                        <div class="agency-thumnail">
                            <img src="{{asset('../storage/agencies/'.$agency->id.'/'.$agency->logo)}}" alt="" class="agency__logo">
                        </div>
                        <div class="agency-info">
                            <!-- <h4 class="agency__name">{{ $agency->name }}</h4> -->
                            <span class="agency__phone">
                                <span><i class="fa-solid fa-envelope"></i></span>
                                <span>{{ $agency->email }}</span>
                            </span>
                            <span class="agency__phone">
                                <span><i class="fa-solid fa-phone"></i></span>
                                <span>{{ $agency->phone }}</span>
                            </span>
                            <span class="agency__address">
                                <span><i class="fa-solid fa-location-dot"></i></span>
                                <span>{{ $agency->address }} - <span class="agency__city">{{ $agency->city }}</span></span>
                            </span>
                            
                            <div class="agency-link-wrap">
                                <!-- <a href="{{ json_decode($agency->map_link) == '' ? json_decode($agency->map_link) : '#'}}" class="agency-link__findonmaps" target="_blank">Xem trên bản đồ</a> -->
                                <a href="{{ json_decode($agency->product_link) == '' ? json_decode($agency->product_link) : '#'}}" class="agency-link__buyfromhere" target="_blank">Mua từ đây</a>
                            </div>
                        </div>
                    </div>
                    <div class="agency-wrap map-wrap">
                        <div class="map-box">
                            <!-- {{ json_decode($agency->map_link) == '' ? json_decode($agency->map_link) : '(Chưa nhúng bản đồ !)'}} -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.3096599736773!2d105.83896007431578!3d20.980220780656992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac42b587b0f7%3A0x31666a37efef5148!2zQuG6v24gWGUgR2nDoXAgQsOhdA!5e0!3m2!1svi!2s!4v1713247171136!5m2!1svi!2s" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>  
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection