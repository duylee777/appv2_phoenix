@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/product.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
@endpush
@section('title','Chi tiết sản phẩm')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{ route('theme.home') }}">Trang chủ</a>
        <span>&gt;</span>
        <a href="{{ route('theme.category', $category->slug) }}">{{  $category->name }}</a>
        <span>&gt;</span>
        <span>{{ $product->name }}</span>
    </div>
</section>
<style>
    #carouselProduct .carousel-inner {
        height: 28rem;
    }
    
    #carouselProduct .carousel-item {
       text-align: center;
    }
    #carouselProduct .carousel-item:hover .img-zoom-result{
        opacity: 1;
    }
   
    #carouselProduct .carousel-item img {
        display: inline-block;
        height: 28rem;
        width: auto;
        border-radius: 8px;
        overflow: hidden;
    } 
    .mini-albums {
        margin-top: 1rem;    
        padding-bottom: 0.5rem;
        display: flex;
        justify-content: center;
        overflow-x: scroll;
        gap: 1rem;
    }

    .mini-albums .item {
        overflow: hidden;
        border-radius: 8px;
        background-color: white;
        width: 12rem;
        min-width: 10rem;
        height: auto;
        /* height: 10rem; */
        cursor: pointer;
    }
    .img-zoom-container {
        position: relative;
    }
    .img-zoom-result {
        width: 16rem;
        height: 16rem;
        position: absolute;
        z-index: 9;
        top: 3rem;
        right: 4rem;
        opacity: 0;
        /* border: 1px solid red; */
    }
    .img-zoom-lens {
        position: absolute;
        cursor: pointer;
        width: 100px;
        height: 100px;
        /* border: 1px solid red; */
        /* z-index: 2; */
        left: 5rem;
    }
    @media screen and (min-width: 1920px) {
        #carouselProduct .carousel-inner {
            height: 34rem;
        }
        #carouselProduct .carousel-item img {
            height: 34rem;
        } 
        .mini-albums .item {
            width: 20rem;
            min-width: 16rem;
        }
        .img-zoom-result {
            width: 24rem;
            height: 24rem;
        }
    }
    @media screen and (max-width: 993px) {
        #carouselProduct .carousel-inner {
            height: 24rem;
        }
        #carouselProduct .carousel-item img {
            height: 24rem;
        } 
        .img-zoom-result {
            width: 18rem;
            height: 18rem;
        }
    }
    @media screen and (max-width: 769px) {
        #carouselProduct .carousel-inner {
            height: 20rem;
        }
        #carouselProduct .carousel-item img {
            height: 20rem;
        } 
        .img-zoom-result {
            width: 14rem;
            height: 14rem;
        }
    }
    @media screen and (max-width: 576px) {
        #carouselProduct .carousel-inner {
            height: 10rem;
        }
        #carouselProduct .carousel-item img {
            height: 10rem;
        }
        .mini-albums .item {
            width: 5rem;
            min-width: 5rem;
        }
        .img-zoom-result {
            width: 5rem;
            height: 5rem;
        }
    }
</style>
<section class="s-area product-area">
    <h1 class="product__name containerx">{{ $product->name }}</h1>
    <div class="containerx">
        <!-- test -->
        <!-- ////////////////// -->
        <div id="carouselProduct" class="carousel slide">
            <div class="carousel-inner">
                
                @foreach($listImg as $key => $item)
                <?php  $link = asset('storage/products/'.$product->code.'/image/'.$item); ?>
                    @if($key == 0)
                        <div  class="carousel-item active img-zoom-container">
                            <img id="img{{$key}}" src="{{ asset('storage/products/'.$product->code.'/image/'.$item) }}" class="" alt="...">
                            <div id="myresult{{$key}}" class="img-zoom-result"></div>
                        </div>
                    @else
                        <div class="carousel-item img-zoom-container">
                            <img id="img{{$key}}" src="{{ asset('storage/products/'.$product->code.'/image/'.$item) }}" class="" alt="...">
                            <div id="myresult{{$key}}" class="img-zoom-result"></div>
                        </div>
                    @endif
                @endforeach
               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                <span aria-hidden="true"<i class="fa-solid fa-chevron-left"></i></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                <span aria-hidden="true"<i class="fa-solid fa-chevron-right"></i></span>
            </button>    
                                  
        </div>
        <div class="mini-albums">
            <!-- carousel-indicators -->
          
            @foreach($listImg as $key => $item)
                @if($key == 0)
                    <div data-bs-target="#carouselProduct" data-bs-slide-to="{{$key}}" class="item active" aria-current="true">
                        <img src="{{ asset('storage/products/'.$product->code.'/image/'.$item) }}" alt="">
                    </div>
                @else
                    <div data-bs-target="#carouselProduct" data-bs-slide-to="{{$key}}" class="item" aria-current="true">
                        <img src="{{ asset('storage/products/'.$product->code.'/image/'.$item) }}" alt="">
                    </div>
                @endif
            @endforeach
                
            </div>     
        <!-- -------------- -->
        
        <!-- end test -->
        <div class="row row-gap-4 ">
            <!-- @foreach($listImg as $key => $img)
                @if($key==0)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" hidden>
                    <div class="d-flex justify-content-center align-items-center p-4 overflow-hidden bg-white shadow w-full rounded img-wrap">
                        <img src="{{ asset('storage/products/'.$product->code.'/image/'.$img) }}" class="" alt="{{ $product->name }}">
                    </div>
                </div>
                @else
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="d-flex justify-content-center align-items-center p-4 overflow-hidden bg-white shadow w-full rounded img-wrap">
                        <img src="{{ asset('storage/products/'.$product->code.'/image/'.$img) }}" class="" alt="{{ $product->name }}">
                    </div>
                </div>
                @endif
            @endforeach -->
        </div>
        
    </div>
    <nav class="containerx tab-nav">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                <i class="fa-solid fa-file"></i>
                Mô tả
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                <i class="fa-solid fa-microchip"></i>    
                Thông số kỹ thuật
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                <i class="fa-solid fa-download"></i>
                Tải xuống
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <div id="description" class="containerx">
                <div class="description-content">
                    {!! json_decode($product->description) !!}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <div id="specifications" class="containerx">
                <table class="specifications-data">
                    @if(count($dataSpecPerType) == 1 && $dataSpecPerType[0] == '')
                        <td>(Chưa có thông số kỹ thuật)</td>
                    @else
                        @foreach($dataSpecPerType as $spec)
                            <?php 
                                $convertData = explode(":", $spec); 
                                // var_dump($convertData);
                            ?>
                            <tr>
                                @if( !isset($convertData[1]))
                                    <td>{!! $convertData[0] !!}</td>
                                    <td></td>
                                @else
                                    <td>{!! $convertData[0] !!}</td>
                                    <td>{!! $convertData[1] !!}</td>
                                @endif
                            </tr>
                        
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
        <div style="padding:1rem;" class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div id="download" class="containerx">
                <div class="download-wrap">
                    <div class="document">
                        <h6>Tài liệu</h6>
                        @if(!empty($documentProduct))
                        @foreach($documentProduct as $document)
                            <div class="download-item" style="clear:both">
                                <a target="_blank" href="{{ asset('storage/products/'.$product->code.'/document/'.$document) }}"> 
                                
                                    <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="download-title">{{ $document }}</span>
                                    <span class="download-ext">(PDF - File) </span>
                                </a>
                                <!-- <div class="download-meta">3. June 2019</div> -->
                            </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="controller-software">
                        <h6>Phầm mềm điều khiển</h6>
                        @if(!empty($softwareProduct))
                        @foreach($softwareProduct as $software)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/products/'.$product->code.'/software/'.$software) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $software }}</span>
                                <span class="download-ext">(ZIP - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019 - Revision 3.9.1</div> -->
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="">
                        <h6>Driver</h6>
                        @if(!empty($driverProduct))
                        @foreach($driverProduct as $driver)
                        <div class="download-item" style="clear:both">
                            <a target="_blank" href="{{ asset('storage/products/'.$product->code.'/driver/'.$driver) }}"> 
                                <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                <span class="download-title">{{ $driver }}</span>
                                <span class="download-ext">(ZIP - File) </span>
                            </a>
                            <!-- <div class="download-meta">3. June 2019 - Revision 3.9.1</div> -->
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
<script>
    function imageZoom(imgId, resultId) {
        let img, lens, result, cx, cy;
        img = document.getElementById(imgId);
        result = document.getElementById(resultId);
        // tạo ống kính
        lens = document.createElement('div');
        lens.setAttribute('class', 'img-zoom-lens');
        //chèn ống kính
        img.parentElement.insertBefore(lens, img);
        // tính tỉ lệ giữa kết quả div và ống kính
        cx = result.offsetWidth / lens.offsetWidth;
        cy = result.offsetHeight / lens.offsetHeight;
        // đặt thuộc tính cho kết quả div
        result.style.backgroundImage = "url('" + img.src + "')";
        result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
        // thực thi một chức năng khi di chuyển con trỏ qua hình ảnh
        lens.addEventListener("mousemove", moveLens);
        img.addEventListener("mousemove", moveLens);
        //và cho màn hình cảm ứng
        lens.addEventListener("touchmove", moveLens);
        img.addEventListener("touchmove", moveLens);


        function moveLens(e) {
            let pos, x, y;
            // chặn bất kỳ hành động nào khác có thể xảy ra khi di chuyển qua hình ảnh
            e.preventDefault();
            // lấy vị trí x, y của con trỏ
            pos = getCursorPos(e);
            // tính vị trí của thấu kính
            x = pos.x - (lens.offsetWidth / 2);
            y = pos.y - (lens.offsetHeight / 2);
            // ngăn không cho ống kính định vị bên ngoài hình ảnh
            if(x > img.width - lens.offsetWidth) {x= img.width - lens.offsetWidth;}
            if(x < 0) {x = 0;}
            if(y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
            if(y < 0) {y = 0;}
            // đặt vị trí của thấu kính
            lens.style.left = x + "px";
            lens.style.top = y + "px";
            // hiển thị vị trí ống kính nhìn thấy
            result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y*cy) + "px";
        }

        function getCursorPos(e) {
            let a, x = 0, y = 0;
            e = e || window.event;
            // lấy vị trí x, y của hình ảnh
            a = img.getBoundingClientRect();
            // tính tọa độ x và y của con trỏ, liên quan đến hình ảnh
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            // xem xét bất kỳ cuộn trang
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {x : x, y : y};
        }
    }

</script>
<script>
    var list = document.querySelectorAll('.carousel-item');
    
    let prev = document.querySelector('.carousel-control-prev');
    let next = document.querySelector('.carousel-control-next');

    let items = document.querySelectorAll('.item');
    for(let j = 0; j < items.length; j++) {
        items[j].addEventListener("click", function(e) {
            e.preventDefault();
            imageZoom("img"+j, "myresult"+j);
        });
    }

    for(let i = 0; i < list.length; i++) {
        if(list[i].classList.contains('active')) {
            imageZoom("img"+i, "myresult"+i);
        }
    }

    prev.addEventListener("click", function(e) {
        e.preventDefault();
        for(let i = 0; i < list.length; i++) {
            if(list[i].classList.contains('active')) {
                if(i == 0) {
                    imageZoom("img"+(list.length-1), "myresult"+(list.length-1));
                }
                else {
                    imageZoom("img"+(i-1), "myresult"+(i-1));
                }
            }
        }
    });

    next.addEventListener("click", function(e) {
        e.preventDefault();
        for(let i = 0; i < list.length; i++) {
            if(list[i].classList.contains('active')) {
                if(i == list.length-1) {
                    imageZoom("img"+0, "myresult"+0);
                }
                else {
                    imageZoom("img"+(i+1), "myresult"+(i+1));
                }
            }
        }
    });
</script>
@endsection