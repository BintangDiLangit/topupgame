<footer class="footer-style-one">
    <div class="footer__top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7">
                    <div class="footer-widget">
                        <div class="footer-logo logo">
                            <a href="/"
                                ><img
                                    src="{{
                                        asset('assets/img/logo/logo.png')
                                    }}"
                                    alt="Logo"
                            /></a>
                        </div>
                        <div class="footer-text">
                            <p class="desc">PT AIRA TECHNOLOGY INDONESIA - BIMY</p>
                            <ul class="list-wrap menu">
                                <li>
                                    <span><i class="fas fa-angle-double-right"></i></span>
                                    <span class="text-secondary">Jl. Polowijen 2, No 312, Blimbing, Kota Malang, Jawa Timur</span>
                                </li>
                                <li>
                                    <span><i class="fas fa-angle-double-right"></i></span>
                                    <span class="text-secondary">Telp. +62 8788 1377 842 | +62 8125 2519 417</span>
                                </li>
                            </ul>
                            <div class="footer-social mt-4">
                                <a href="#"><img src="{{ asset('assets/img/icons/social_icon01.png') }}"
                                        alt="iocn"></a>
                                <a href="#"><img src="{{ asset('assets/img/icons/social_icon02.png') }}"
                                        alt="iocn"></a>
                                <a href="#"><img src="{{ asset('assets/img/icons/social_icon03.png') }}"
                                        alt="iocn"></a>
                                <a href="#"><img src="{{ asset('assets/img/icons/social_icon04.png') }}"
                                        alt="iocn"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6">
                    <div class="footer-widget widget_nav_menu">
                        <h4 class="fw-title">quick link</h4>
                        <ul class="list-wrap menu">
                            <li>
                                <a
                                    href="{{ '/client/'. $item->slug_master_kategori }}"
                                    >Mobile Legends</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-5 col-sm-6">
                    <div class="footer-widget widget_nav_menu">
                        <h4 class="fw-title">Supports</h4>
                        <ul class="list-wrap menu">
                            <li><a href="/tos/page/bimy">Term & Service</a></li>
                            <li>
                                <a href="https://wa.me/6281252519417"
                                    >Help & Support</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright__wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="copyright__text">
                        <p>
                            Copyright © 2023 - All Rights Reserved By
                            <span>BiMy</span>
                        </p>
                    </div>
                </div>
                {{--
                <div class="col-md-5">
                    <div class="copyright__card text-center text-md-end">
                        <img
                            src="{{
                                asset('assets/img/others/payment_card.png')
                            }}"
                            alt="img"
                        />
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
</footer>
