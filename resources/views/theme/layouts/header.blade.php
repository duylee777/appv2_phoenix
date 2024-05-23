<style>
    .v2h_cushion {
        height: 154px;
        /* background-color: var(--bg__grey--light); */
        /* background-color: black; */
    }
    #v2h_cushion {
        display: block;
    }
    #header-v2 {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 99;
        width: 100%;
        background-color: rgba(0,0,0,0.9);
        padding-top: 0.5rem;
        display: block;
    }
    .v2h_wrap {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    .v2h_trademark {
        width: 6rem;
    }
    .v2h_content {
        flex-grow: 1;
    }
    .v2h_line1 {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    .v2h_line1 .v2h_mainmenu {
        justify-content: space-between;
        gap: 0.5rem;
    }
    .v2h_line1 .v2h_searchbar {
        
    }
    .v2h_line2 {
        margin-top: 0.5rem;
    }
    .v2h_line2 .v2h_brands {
        width: 100%;
    }
    .v2h_toggle-menu {
        width: 12rem;
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
    }
    .header-area {
        display: none;
    }

    .hook_submenu {
        position: relative;
    }
    .hook_submenu-v2 {
        position: relative;
    }
    .hook_submenu:hover .submenu {
        display: block;
    }
    .hook_submenu-v2:hover .submenu-v2 {
        display: block;
    }
    .submenu {
        position: absolute;
        display: none;
        left: 50%;
        top: 100%;
        z-index: 10;
        width: max-content;
        background: rgba(0,0,0,0.9);
        border-radius: 0.5rem;
    }
    .submenu-v2 {
        position: absolute;
        display: none;
        left: 100%;
        top: 0;
        z-index: 10;
        width: max-content;
        background: rgba(0,0,0,0.9);
        border-radius: 0.5rem;
    }
    .submenu__link {
        text-transform: unset;
        padding: 0.5rem 1rem;
    }
    .box__link {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    .box__link span {
        color: white;
        cursor: pointer;
    }
    .bottom__zero {
        padding-bottom: 0 !important;
    }
    .width__full {
        width: 100%;
    }
    .item__flex {
        display: flex;
        justify-content: space-between;
    }
    .m-support__btn-toggle {
        color: var(--bg__grey--light);
        display: inline-block;
        width: 2rem;
        text-align: center;
        cursor: pointer;
    }
    .m-support-toggle {
        display: none;
    }
    .m-support-portfolio {
        list-style-type: none;
    }
    .m-sub-support-portfolio {
        display: none;
        list-style-type: none;
    }


    @media screen and (max-width: 993px) {
        #header-v2 {
            display: none;
        }
        #v2h_cushion {
            display: none;
        }
        .header-area {
            display: block;
        }
        .morewrap .dropdown_m {
            display: block;
        }
        .dropdown_m_wrap {
            display: flex;
            justify-content: flex-end;
            padding-bottom: 1rem;
        }
    }
    @media screen and (min-width: 1920px) {
        #header-v2 {
            padding-left: calc((100% - 1920px) / 2);
            padding-right: calc((100% - 1920px) / 2);
        }
    }

</style>
<section id="v2h_cushion" class=""></section>
<header>
    <section id="header-v2">
        <div class="display-pc">
            <div class="containerx v2h_wrap">
                <div class="v2h_trademark">
                    <a href="/" class="trademark__link">
                        <div class="trademark__logo">
                                <!-- <img src="assets/imgs/brands/phoenix.png" alt=""> -->
                                <img src="{{ asset('assets/theme/imgs/logo/phoenixaudio_logo.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="v2h_content">
                    <div class="v2h_line1">
                        <nav class="mainmenu v2h_mainmenu">
                            <a href="{{ route('theme.about') }}" class="mainmenu__link">Giới thiệu</a>
                            <a href="{{ route('theme.project') }}" class="mainmenu__link">Dự án</a>
                            <a href="{{ route('theme.news') }}" class="mainmenu__link">Tin tức</a>
                            <a href="{{ route('theme.agency') }}" class="mainmenu__link">Đại lý</a>
                            @php 
                                $spCate = App\Models\Category::where('slug', 'ho-tro')->first(); 
                                $spChildCates = App\Models\Category::where('is_visible', true)->where('parent_id', $spCate->id)->get();
                            @endphp
                            <div class="hook_submenu">
                                <div class="box__link">
                                    <a href="#" class="mainmenu__link">Hỗ trợ</a>
                                    <span><i class="fa-solid fa-angle-down"></i></span>
                                </div>
                                <nav class="submenu">
                                    @foreach($spChildCates as $cate)
                                    <div class="hook_submenu-v2">
                                        <div class="box__link">
                                            @if($cate->slug == 'phan-mem-ho-tro')
                                            <a href="{{ route('theme.support_software') }}" class="mainmenu__link submenu__link">{{ $cate->name }}</a>
                                            @else
                                            <a class="mainmenu__link submenu__link">{{ $cate->name }}</a>
                                            @endif
                                            @if(count($cate->childs) != 0)
                                            <span><i class="fa-solid fa-angle-right"></i></span>
                                            @endif
                                        </div>
                                        @if(count($cate->childs) != 0)
                                        <nav class="submenu-v2">
                                            @foreach($cate->childs as $child)
                                            <a href="{{ route('theme.support_index', $child->slug) }}" class="mainmenu__link submenu__link">{{ $child->name }}</a>
                                            @endforeach
                                        </nav>
                                        @endif
                                    </div>
                                    @endforeach
                                </nav>
                            </div>
                            
                            <a href="{{ route('theme.download') }}" class="mainmenu__link">Tải về</a>
                            <a href="{{ route('theme.contact') }}" class="mainmenu__link">Liên hệ</a>
                        </nav>
                        <div class="searchbar v2h_searchbar">
                            <form method="GET" action="{{ route('theme.search') }}">
                                <input type="text" name="keyword" placeholder="Nhập từ khóa bạn muốn tìm kiếm ...">
                                <button><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="morewrap">
                            <div class="dropdown">
                                <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-globe"></i></button>
                                <div class="gtranslate_wrapper dropdown-menu"></div>
                            </div>
                            
                            <!-- end test -->
                        </div>
                    </div>
                    <div class="v2h_line2">
                        <div class="brands v2h_brands">
                            <nav>
                                @if(App\Models\Brand::get())
                                    @foreach(App\Models\Brand::get() as $brand)
                                    <a href="{{ route('theme.brand',$brand->slug) }}" class="brands__name">
                                        <img src="{{asset('./storage/brands/'.$brand->slug.'/'.$brand->image)}}" alt="" width="60">
                                    </a>
                                    @endforeach
                                @endif
                                
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="v2h_category">
            <div class="containerx toggle-menu v2h_toggle-menu">
                <button id="toggleMenuBtn"><i class="fa-solid fa-bars-staggered"></i> <span>sản phẩm</span></button>
            </div>
            <div class="product-portfolio-toggle">
                <ul class="product-portfolio">
                
                    @if(App\Models\Category::get() != null)
                        @foreach(App\Models\Category::get() as $cate)
                            @if($cate->parent_id == 3)
                            <li class="product-wrap">
                                <a href="{{ route('theme.category',$cate->slug) }}" class="product__link">{{$cate->name}}
                                @if(count($cate->childs) != 0) 
                                    <i class="fa-solid fa-angle-right"></i>
                                @endif
                                </a>
                                @if(count($cate->childs) != 0) 
                                    <ul class="sub-product-portfolio">
                                        @foreach($cate->childs as $child)
                                        <li class="sub-product-wrap">
                                            <a href="{{ route('theme.category',$child->slug) }}" class="sub-product__link">{{$child->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li> 
                            @endif
                        @endforeach    
                    @endif
                    
                </ul>
            </div>
        </div>
    </section>
    <section class="header-area">
        <div class="top-layer"></div>
        <div class="mask__top">
            <div class="header-wrap">
                <div class="trademark">
                    <a href="/" class="trademark__link">
                        <div class="trademark__logo">
                                <!-- <img src="assets/imgs/brands/phoenix.png" alt=""> -->
                                <img src="{{ asset('assets/theme/imgs/logo/phoenixaudio_logo.png') }}" alt="">
                        </div>
                    </a>
                </div>
                <nav class="mainmenu">
                    <a href="{{ route('theme.about') }}" class="mainmenu__link">Giới thiệu</a>
                    <a href="{{ route('theme.project') }}" class="mainmenu__link">Dự án</a>
                    <a href="{{ route('theme.news') }}" class="mainmenu__link">Tin tức</a>
                    <a href="{{ route('theme.agency') }}" class="mainmenu__link">Đại lý</a>
                    <div class="hook_submenu">
                        <div class="box__link">
                            <a href="#" class="mainmenu__link">Hỗ trợ</a>
                            <span><i class="fa-solid fa-angle-down"></i></span>
                        </div>
                        <nav class="submenu">
                            @foreach($spChildCates as $cate)
                            <div class="hook_submenu-v2">
                                <div class="box__link">
                                    @if($cate->slug == 'phan-mem-ho-tro')
                                    <a href="{{ route('theme.support_software') }}" class="mainmenu__link submenu__link">{{ $cate->name }}</a>
                                    @else
                                    <a class="mainmenu__link submenu__link">{{ $cate->name }}</a>
                                    @endif
                                    @if(count($cate->childs) != 0)
                                    <span><i class="fa-solid fa-angle-right"></i></span>
                                    @endif
                                </div>
                                @if(count($cate->childs) != 0)
                                <nav class="submenu-v2">
                                    @foreach($cate->childs as $child)
                                    <a href="{{ route('theme.support_index', $child->slug) }}" class="mainmenu__link submenu__link">{{ $child->name }}</a>
                                    @endforeach
                                </nav>
                                @endif
                            </div>
                            @endforeach
                        </nav>
                    </div>
                    <a href="{{ route('theme.download') }}" class="mainmenu__link">Tải về</a>
                    <a href="{{ route('theme.contact') }}" class="mainmenu__link">Liên hệ</a>
                </nav>
                <div class="searchbar">
                    <form method="GET" action="{{ route('theme.search') }}">
                        <input type="text" name="keyword" placeholder="Nhập từ khóa bạn muốn tìm kiếm ...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="morewrap">
                    <div class="dropdown">
                        <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-globe"></i></button>
                        <div class="gtranslate_wrapper dropdown-menu"></div>

                    </div>
                    <!-- <div class="dropdown">
                        <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-circle-user"></i></button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-menu__link">Đăng nhập</a>
                            <a href="#" class="dropdown-menu__link">Tạo tài khoản</a>
                        </div>
                    </div> -->
                    <button id="moreButton" class="morewrap__btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-bars"></i></button>

                    <div class="m-area offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel"></h5>
                            <button type="button" class="morewrap__btn" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                        <div class="offcanvas-body">
                            <div class="m-product-portfolio-wrap">
                                <div class="dropdown_m_wrap">
                                    <div class="dropdown dropdown_m">
                                        <button class="morewrap__btn dropdown-btn"><i class="fa-solid fa-globe"></i></button>
                                        <div class="gtranslate_wrapper dropdown-menu"></div>
                                    </div>
                                </div>
                                <button id="toggleMenuMobileBtn"><i class="fa-solid fa-bars-staggered"></i> <span>sản phẩm</span><i class="fa-solid fa-chevron-down"></i></button>
                                <div class="m-product-portfolio-toggle">
                                    @if(App\Models\Category::get() != null)
                                        <ul class="m-product-portfolio">
                                        @foreach(App\Models\Category::get() as $cate)
                                            @if($cate->parent_id == 3)
                                            <li class="m-product-wrap">
                                                <div class="m-product">
                                                    <a href="{{ route('theme.category',$cate->slug) }}" class="m-product__link">{{$cate->name}}</a>
                                                    @if(count($cate->childs) != 0) 
                                                        <span class="m-product__btn-toggle"><i class="fa-solid fa-angle-down"></i></span>
                                                    @endif
                                                </div>
                                                @if(count($cate->childs) != 0) 
                                                    <ul class="m-sub-product-portfolio">
                                                        @foreach($cate->childs as $child)
                                                        <li class="sub-product-wrap">
                                                            <div class="m-sub-product">
                                                                <a href="{{ route('theme.category',$child->slug) }}" class="sub-product__link">{{$child->name}}</a>
                                                            </div>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li> 
                                            @endif
                                        @endforeach    
                                        </ul>
                                    @endif
                                    
                                </div>
                            </div>
                            {{-- mobile menu --}}
                            <nav class="m-mainmenu">
                                <a href="{{ route('theme.about') }}" class="mainmenu__link m-mainmenu__link">Giới thiệu</a>
                                <a href="{{ route('theme.project') }}" class="mainmenu__link m-mainmenu__link">Dự án</a>
                                <a href="{{ route('theme.news') }}" class="mainmenu__link m-mainmenu__link">Tin tức</a>
                                <a href="{{ route('theme.agency') }}" class="mainmenu__link m-mainmenu__link">Đại lý</a>
                                <div class="">
                                    <a id="toggleSupport" class="mainmenu__link m-mainmenu__link dropdown-btn item__flex">
                                        <span>Hỗ trợ</span>
                                        <i class="fa-solid fa-chevron-down"></i>
                                    </a>
                                    <div class="m-support-toggle">
                                        <ul class="m-support-portfolio">
                                            @foreach($spChildCates as $cate)
                                            <li class="m-product-wrap">
                                                <div class="m-product">
                                                    @if($cate->slug == 'phan-mem-ho-tro')
                                                    <a href="{{ route('theme.support_software') }}" class="m-product__link">{{ $cate->name }}</a>
                                                    @else
                                                    <a class="m-product__link">{{ $cate->name }}</a>
                                                    @endif
                                                    @if(count($cate->childs) != 0)
                                                    <span class="m-support__btn-toggle"><i class="fa-solid fa-angle-down"></i></span>
                                                    @endif
                                                </div>
                                                @if(count($cate->childs) != 0)
                                                <ul class="m-sub-support-portfolio">
                                                    @foreach($cate->childs as $child)
                                                    <li class="sub-product-wrap">
                                                        <div class="m-sub-product">
                                                            <a href="{{ route('theme.support_index', $child->slug) }}" class="m-product__link">{{ $child->name }}</a>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <a href="{{ route('theme.download') }}" class="mainmenu__link m-mainmenu__link">Tải về</a>
                                <a href="{{ route('theme.contact') }}" class="mainmenu__link m-mainmenu__link">Liên hệ</a>
                            </nav>
                        </div>
                    </div>
                    <!-- end test -->
                </div>
            </div>
        </div>
        <div class="mask">
            <div class="header-wrap header-wrap--gray">
                <div class="toggle-menu">
                    <button id="toggleMenuBtn"><i class="fa-solid fa-bars-staggered"></i> <span>sản phẩm</span></button>
                </div>
                <div class="brands">
                    <nav>
                        @if(App\Models\Brand::get())
                            @foreach(App\Models\Brand::get() as $brand)
                            <a href="{{ route('theme.brand',$brand->slug) }}" class="brands__name">
                                <img src="{{asset('../storage/brands/'.$brand->slug.'/'.$brand->image)}}" alt="" width="60">
                            </a>
                            @endforeach
                        @endif
                        
                    </nav>
                </div>
            </div>
            <div class="product-portfolio-toggle">
                <ul class="product-portfolio">
               
                    @if(App\Models\Category::get() != null)
                        @foreach(App\Models\Category::get() as $cate)
                            @if($cate->parent_id == 3)
                            <li class="product-wrap">
                                <a href="{{ route('theme.category',$cate->slug) }}" class="product__link">{{$cate->name}}
                                @if(empty($cate->childs)) 
                                    <i class="fa-solid fa-angle-right"></i>
                                @endif
                                </a>
                                @if(!empty($cate->childs)) 
                                    <ul class="sub-product-portfolio">
                                        @foreach($cate->childs as $child)
                                        <li class="sub-product-wrap">
                                            <a href="" class="sub-product__link">{{$child->name}}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li> 
                            @endif
                        @endforeach    
                    @endif
                    
                </ul>
            </div>
        </div>
    
    </section>

    
</header>