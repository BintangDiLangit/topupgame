@extends('landing.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="{{ asset('assets/img/bg/breadcrumb_bg02.jpg') }}">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">Mobile Legends: BANG BANG</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Our Shop</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- shop-area -->
    <section class="shop-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-8 col-md-11">
                    <div class="shop__top-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-sm-6">
                                <div class="shop__showing-result">
                                    <p>Showing 1 - 3 of 3 results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="row justify-content-center row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1">
                        <div class="col">
                            <div class="shop__item">
                                <div class="shop__item-thumb">
                                    <a
                                        href="{{ route('game.detail', [
                                            'slug' => $data['data_slug'][0]['slug'],
                                            'game_name' => $data['data_slug'][0]['game']['slug'],
                                        ]) }}"><img
                                            src="{{ asset('assets/img/products/twilight_pass.png') }}" alt="img"></a>
                                    <a href="#" class="wishlist-button"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="shop__item-line"></div>
                                <div class="shop__item-content">
                                    <div class="shop__item-content-top">
                                        <h4 class="title"><a
                                                href="{{ route('game.detail', [
                                                    'slug' => $data['data_slug'][0]['slug'],
                                                    'game_name' => $data['data_slug'][0]['game']['slug'],
                                                ]) }}">{{ $data['data_tp']['name'] }}</a>
                                        </h4>
                                        <div class="shop__item-price">
                                            {{ 'Rp ' . number_format($data['data_tp']['price']['basic'], 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="shop__item-cat"><a href="shop.html">{{ $data['data_tp']['name'] }}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop__item">
                                <div class="shop__item-thumb">
                                    <a
                                        href="{{ route('game.detail', [
                                            'slug' => $data['data_slug'][1]['slug'],
                                            'game_name' => $data['data_slug'][1]['game']['slug'],
                                        ]) }}"><img
                                            src="{{ asset('assets/img/products/weeklypass.png') }}" alt="img"></a>
                                    <a href="#" class="wishlist-button"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="shop__item-line"></div>
                                <div class="shop__item-content">
                                    <div class="shop__item-content-top">
                                        <h4 class="title"><a
                                                href="{{ route('game.detail', [
                                                    'slug' => $data['data_slug'][1]['slug'],
                                                    'game_name' => $data['data_slug'][1]['game']['slug'],
                                                ]) }}">WDP</a>
                                        </h4>
                                        <div class="shop__item-price">
                                            {{ 'Rp ' . number_format($data['data_wdp']['price']['basic'], 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="shop__item-cat"><a href="shop.html">{{ $data['data_wdp']['name'] }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="shop__item">
                                <div class="shop__item-thumb">
                                    <a
                                        href="{{ route('game.detail', [
                                            'slug' => $data['data_slug'][2]['slug'],
                                            'game_name' => $data['data_slug'][2]['game']['slug'],
                                        ]) }}"><img
                                            src="{{ asset('assets/img/products/diamond.png') }}" alt="img"></a>
                                    <a href="#" class="wishlist-button"><i class="far fa-heart"></i></a>
                                </div>
                                <div class="shop__item-line"></div>
                                <div class="shop__item-content">
                                    <div class="shop__item-content-top">
                                        <h4 class="title"><a
                                                href="{{ route('game.detail', [
                                                    'slug' => $data['data_slug'][2]['slug'],
                                                    'game_name' => $data['data_slug'][2]['game']['slug'],
                                                ]) }}">Diamonds</a>
                                        </h4>
                                        <div class="shop__item-price">
                                            {{ 'Rp ' . number_format($data['data_mlb'][0]['price']['basic'], 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="shop__item-cat"><a href="shop.html">Diamonds</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination__wrap">
                        <ul class="list-wrap d-flex flex-wrap justify-content-center">
                            <li><a href="#" class="page-numbers current">01</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-area-end -->
@endsection
