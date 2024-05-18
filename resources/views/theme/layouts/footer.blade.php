<footer id="footer">
        <div class="footer-area">
            <div class="network-area">
                <div class="social-network">
                    <a href="https://www.facebook.com/phoenixproffessionalaudio" class="social-network__link social-network__link--facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.youtube.com/@Phoenixaudio1501" class="social-network__link social-network__link--youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <!--<a href="" class="social-network__link social-network__link--instagram"><i class="fa-brands fa-instagram"></i></a>-->
                    <!--<a href="" class="social-network__link social-network__link--twitter"><i class="fa-brands fa-twitter"></i></a>-->
                    <!-- <a href="" class="social-network__link social-network__link--soundcloud"><i class="fa-brands fa-soundcloud"></i></a>
                    <a href="" class="social-network__link social-network__link--linkedin"><i class="fa-brands fa-linkedin"></i></a> -->
                </div>
            </div>
            <div class="f-logo">
                <a href="">
                    <img src="{{ asset('assets/theme/imgs/logo/phoenixaudio_logo.png') }}" alt="">
                </a>
            </div>
            <div class="footer-wrap">
                <div class="fcol-area">
                    <h4 class="fcol__title">công ty cổ phần điện tử và công nghệ phượng hoàng</h4>
                    <div class="fcol-wrap">
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="fcol-row__content">Miền Bắc: M01-L07 Khu đô thị Dương Nội A, phường La Khê, quận Hà Đông, TP.Hà Nội</span>
                        </div>
                        <div class="fcol-row">
                           <span class="fcol-row__icon"><i class="fa-solid fa-phone"></i></span>
                           <span class="fcol-row__content">Hotline miền Bắc: 0933 991 338</span>
                        </div>
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-location-dot"></i></span>
                            <span class="fcol-row__content">Miền Nam: 14 Phan Thị Hành, Phú Thọ Hoà, Tân Phú, TP.Hồ Chí Minh</span>
                        </div>
                        <div class="fcol-row">
                           <span class="fcol-row__icon"><i class="fa-solid fa-phone"></i></span>
                           <span class="fcol-row__content">Hotline miền Nam: 0913 337 662</span>
                        </div>
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-envelope"></i></span>
                            <span class="fcol-row__content">cskh@phoenixaudio.vn </span>
                        </div>
                        
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-user"></i></span>
                            <span class="fcol-row__content">Hỗ trợ kỹ thuật: 0986 331 983</span>
                        </div>
                    </div>
                </div>
                <div class="fcol-area">
                    <h4 class="fcol__title">quy định và chính sách</h4>
                    <div class="fcol-wrap">
                        <!-- <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-angle-right"></i></span>
                            <a href="#" class="fcol-row__content fcol-row__link">Đơn hàng</a>
                        </div>
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-angle-right"></i></span>
                            <a href="#" class="fcol-row__content fcol-row__link">Thanh toán</a>
                        </div> -->
                        @php
                            $policyCat = App\Models\Category::where('slug', "quy-dinh-va-chinh-sach")->first();
                            $policies = App\Models\Post::where('category_id', $policyCat->id)->orderBy('id', 'ASC')->get();
                        @endphp
                        @foreach($policies as $policy)
                        <div class="fcol-row">
                            <span class="fcol-row__icon"><i class="fa-solid fa-angle-right"></i></span>
                            <a href="{{route('theme.policy', $policy->slug )}}" class="fcol-row__content fcol-row__link">{{ $policy->title }}</a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="fcol-area">
                    <h4 class="fcol__title">đăng ký tư vấn</h4>
                    <div class="fcol-wrap">
                        <div class="fcol-row">
                            <form action="" class="form-subscribe">
                                <input class="form-subscribe__input" type="text" placeholder="Địa chỉ email ...">
                                <button class="form-subscribe__btn">Đăng ký</button>
                            </form>
                        </div>
                        <div class="fcol-row">
                            <span class="fcol-row__content fcol-row__content--orange">Từ thứ 2 - thứ 7 | 8h00 - 17h00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <span>2023 - Công ty Cổ phần Điện Tử và Công nghệ Phượng Hoàng</span>
        </div>
    </footer>