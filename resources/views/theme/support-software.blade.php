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
        .product-code {
            font-size: 12px;
            display: block;
        }
        .product-name {
            display: block;
            font-size: 16px;
        }
        .download-wrap {
            gap: 0.5rem;
            grid-template-columns: auto auto;
        }
        .containerx.wrap {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-end;
            gap: 1rem;
        }
        .containerx.wrap .download {
            flex-grow: 1;
        }
        .download-btn-wrap {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }
        .download-btn {
            font-size: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 4px;
            border: 1px solid var(--color__base);
            border-radius: 8px;
            color: var(--color__base);
            transition: all ease-in-out 300ms;
        }
        .download-btn:hover {
            background: var(--color__base--hover);
            color: white;
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
        <p>Phần mềm hỗ trợ các sản phẩm Vang số/Mixer của Phoenix</p>
    </div>

    <div class="containerx">
        <div class="agency-filter">
            <div class="agency-filter-select">
                <select name="" id="" onchange="viewContent(this);">
                    <option id="option_all" value="all">Tất cả sản phẩm</option>
                    @if($products)
                        @foreach($products as $product)
                        @php 
                            $softwares = (array)json_decode($product->software);
                        @endphp
                            @if(!empty($softwares))
                                @if($softwares[0] != "")
                                <option id="option_{{ $product->id }}" value="{{ $product->id }}" >{{ $product->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            {{-- <div class="agency-filter-search">
                <label for="seach-product-code">Tìm kiếm theo:</label>
                <input type="text" placeholder="Mã hoặc tên sản phẩm ..." class="seach-product-code-input" onchange="searchProduct();">
            </div> --}}
        </div>
    </div>
    
    <div class="containerx wrap">
        @if($products)
            @foreach($products as $product)
            @php 
                $softwares = (array)json_decode($product->software);
            @endphp
                @if(!empty($softwares))
                    @if($softwares[0] != "")
                    <div class="download show-all" id="{{$product->id}}">
                        <h3 class="download__title">
                            <span id="product_id_{{$product->id}}" class="product-code">{{ $product->code }}</span>
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
                            <div class="download-btn-wrap">
                                @foreach($softwares as $software)
                                <a href="{{ asset('storage/products/'.$product->code.'/software/'.$software) }}" class="download-btn" target="">
                                    <span><i class="fa-regular fa-circle-down"></i></span>
                                    <span>Tải về</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                @endif
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