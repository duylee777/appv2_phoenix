@extends('theme.layouts.index')
@push('styles')
    <!-- <link rel="stylesheet" href="{{ asset('./assets/theme/css/agency.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('./assets/theme/css/breadcrumb.css') }}"> -->
    <link rel="stylesheet" href="/assets/theme/css/agency.css">
    <link rel="stylesheet" href="/assets/theme/css/product.css">
    <link rel="stylesheet" href="/assets/theme/css/breadcrumb.css">
    <style>
        .e-show {
            display: block;
        }
        .e-hidden {
            display: none;
        }
        .seach-product-code-input {
            padding: 0.25rem 1rem;
        }
    </style>
@endpush
@section('title','Phần mềm hỗ trợ')
@section('content')
<section class="cushion-layer"></section>
<section class="breadcrumb-area">
    <div class="breadcrumb containerx">
        <a href="{{route('theme.home')}}">Trang chủ</a>
        <span>&gt;</span>
        <span>Hỗ trợ</span>
        <span>&gt;</span>
        <span>Phần mềm hỗ trợ</span>
    </div>
</section>

<section class="s-area">
    <div class="s-header containerx">
        <h2 class="s-header__title">Phần mềm hỗ trợ</h2>
    </div>
    <div class="containerx wrap">
        <div class="agency-filter">
            <div class="agency-filter-select">
                <select name="" id="" onchange="viewContent(this);">
                    <option id="option_all" value="all">Tất cả sản phẩm</option>
                    @if($products)
                        @foreach($products as $product)
                            <option id="option_{{ $product->id }}" value="{{ $product->id }}" >{{ $product->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="agency-filter-search">
                <label for="seach-product-code">Tìm kiếm theo:</label>
                <input type="text" placeholder="Mã hoặc tên sản phẩm ..." class="seach-product-code-input" onchange="searchProduct();">
            </div>
        </div>
        @if($products)
        @foreach($products as $product)
        <div class="download show-all" id="{{$product->id}}">
            <h3 class="download__title">
                <span id="product_id_{{$product->id}}" class="product-code">{{ $product->code }}</span>
                <span> - </span>
                <span class="product-name">{{ $product->name }}</span>
            </h3>
            
            <div class="download-wrap">
                <div class="download__thumnail download__thumnail--grow">
                    <?php $listImg = json_decode($product->image); ?>
                    @if(!empty($listImg))
                    <img src="{{ asset('storage/products/'.$product->code.'/image/'.$listImg[0]) }}" alt="{{ $product->name }}">
                    @else
                    <img id="" class="w-full" src="https://images.pexels.com/photos/4841450/pexels-photo-4841450.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="Extra large image">
                    @endif
                </div>
                <div class="document">
                    <h6>Tài liệu</h6>
                    @if(json_decode($product->document) != "")
                        @foreach( json_decode($product->document) as $document)
                            <div class="download-item" style="clear:both">
                                <a target="_blank" href="{{ asset('storage/documents/'.$product->code.'/'.$document) }}"> 
                                    <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="download-title">{{ $document }}</span>
                                    <span class="download-ext">(PDF - File) </span>
                                </a>
                                <!-- <div class="download-meta">3. June 2019</div> -->
                            </div>
                        @endforeach
                    @else
                        <span>(Không có tài liệu)</span>
                    @endif
                </div>
                <div class="driver">
                    <h6>Driver</h6>
                    @if(json_decode($product->driver) != "")
                        @foreach( json_decode($product->driver) as $driver)
                            <div class="download-item" style="clear:both">
                                <a target="_blank" href="{{ asset('storage/driver/'.$product->code.'/'.$driver) }}"> 
                                    <span class="download-icon"><i class="fa-solid fa-file-pdf"></i></span>
                                    <span class="download-title">{{ $driver }}</span>
                                    <span class="download-ext">(PDF - File) </span>
                                </a>
                                <!-- <div class="download-meta">3. June 2019</div> -->
                            </div>
                        @endforeach
                    @else
                        <span>(Không có driver)</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

    <script>
        function viewContent(obj) {
            var value = obj.value;
            var listContent = document.querySelectorAll('.show-all');
            
            if(value == 'all') {
                document.getElementById('option_'+obj.value).selected = "true";
                for(let i = 0; i<listContent.length; i++) {
                    if(listContent[i].classList.contains('e-hidden')) {
                        listContent[i].classList.remove('e-hidden');
                        listContent[i].classList.add('e-show');
                    }
                }
            }
            else {
                document.getElementById('option_'+obj.value).selected = "true";
                if(document.getElementById(value).classList.contains('e-hidden')) {
                    document.getElementById(value).classList.remove('e-hidden');
                    document.getElementById(value).classList.add('e-show');
                }

                for(let i = 0; i<listContent.length; i++) {
                    if(value != listContent[i].id) {
                        listContent[i].classList.remove('e-show');
                        listContent[i].classList.add('e-hidden');
                    }
                }
            }   
        }

        function searchProduct() {
            console.log(1)
            document.getElementById('option_all').selected = "true";
            viewContent(document.getElementById('option_all'));
            
            let input = document.querySelector('.seach-product-code-input').value;
            let dataProductCode = document.querySelectorAll('.product-code');
            let dataProductName = document.querySelectorAll('.product-name');

            for(let i = 0; i<dataProductCode.length; i++) {
                if(input.toLowerCase() == dataProductCode[i].innerHTML.toLowerCase() || input.toLowerCase() == dataProductName[i].innerHTML.toLowerCase()) {
                    // viewContent();
                    let idProduct = dataProductCode[i].id;
                    viewContent(document.getElementById('option_'+idProduct.slice(idProduct.length-2, idProduct.length)));
                }
            }
        }
        
    </script>
</section>


@endsection