@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/agency.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Danh sách đại lý')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Đại lý</span>
    </div>
</section>
<section class="s-area agency-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Đại lý của chúng tôi</h2>
    </div>
    <div class="agency-filter containerx">
        <div class="agency-filter-select">
            <select name="select-city" id="select-city">
                <option value="all" selected>-- Chọn thành phố --</option>
                @if(!empty($agencies))
                    @foreach($agencies as $agency)
                        <option value="{{$agency->city}}">{{$agency->city}}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="containerx agency-table-wrap">
        <table class="agency-table">
            <thead>
                <tr class="agency-table__title">
                    <th>Tên cửa hàng</th>
                    <th>Địa chỉ</th>
                    <th>Tỉnh / Thành phố</th>
                    <th>Điện thoại</th>
                </tr>
            </thead>
            <tbody>
            @if(!empty($agencies))
                @foreach($agencies as $agency)
                    <tr class="agency-item" data-city="{{ $agency->city }}">
                        <th>
                            <a href="{{route('theme.agency_detail', $agency->slug)}}" class="agency__link">{{ $agency->name }}</a>
                        </th>
                        <td>{{ $agency->address }}</td>
                        <td>{{ $agency->city }}</td>
                        <td>{{ $agency->phone }}</td>
                    </tr>
                @endforeach
            @endif  
            </tbody>
        </table>
    </div>
</section>
<script>
    let select = document.querySelector('#select-city');
    let agencies = document.querySelectorAll('.agency-item');
    select.addEventListener("change", function(e) {
        e.preventDefault();
        if(select.value == 'all') {
            agencies.forEach(function(agency, index) {
                agency.style.display = "table-row";
            });
        }
        else {
            agencies.forEach(function(agency, index) {
                if(agency.dataset.city != select.value) {
                    agency.style.display = "none";
                }
                else {
                    agency.style.display = "table-row";
                }
            });
        }  
    });
</script>
@endsection