<header>
    <div id="sticky-header" class="tg-header__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                                    <li class="{{ Request::is('about-us') ? 'active' : '' }}"><a href="/about-us">ABOUT
                                            US</a></li>
                                    {{-- <li class="menu-item-has-children"><a href="#">TOURNAMENT</a>
                                        <ul class="sub-menu">
                                            <li><a href="tournament.html">TOURNAMENT</a></li>
                                            <li><a href="tournament-details.html">TOURNAMENT Single</a></li>
                                        </ul>
                                    </li> --}}
                                    {{-- <li class=""><a href="#">News</a></li> --}}
                                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a
                                            href="/contact">contact</a></li>
                                </ul>
                            </div>

                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="flaticon-swords-in-cross-arrangement"></i></div>
                            <div class="nav-logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="list-wrap">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>

    <!-- offCanvas-area -->
    <div class="offCanvas__wrap">
        <div class="offCanvas__body">
            <div class="offCanvas__top">
                <div class="offCanvas__logo logo">
                    <a href="/"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="offCanvas__toggle">
                    <i class="flaticon-swords-in-cross-arrangement"></i>
                </div>
            </div>
            <div class="offCanvas__content">
                <h2 class="title">Best Seller of Month Ideas for <span>TOP UP Game</span></h2>
                <div class="offCanvas__contact">
                    <h4 class="small-title">CONTACT US</h4>
                    <ul class="offCanvas__contact-list list-wrap">
                        <li><a href="https://wa.me/6281252519417">+62 8125-2519-417</a></li>
                        <li><a href="mailto:bintangmfhd@gmail.com">bintangmfhd@gmail.com</a></li>
                        <li>Malang City ,Indonesia</li>
                    </ul>
                </div>
                <ul class="offCanvas__social list-wrap">
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="offCanvas__copyright">
                <p>Copyright © 2023 - By <span>BiMy</span></p>
            </div>
        </div>
    </div>
    <div class="offCanvas__overlay"></div>
    <!-- offCanvas-area-end -->

</header>
