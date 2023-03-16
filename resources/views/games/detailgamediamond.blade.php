@extends('landing.master')
@section('content')
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="assets/img/bg/breadcrumb_bg02.jpg">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">product single</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product single</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shop-area shop-details-area">
        <div class="container">
            <div class="row">
                <div class="shop__details-images-wrap">
                    <ul class="nav nav-tabs" id="imageTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="one-tab" data-bs-toggle="tab" data-bs-target="#one"
                                type="button" role="tab" aria-controls="one" aria-selected="true">
                                <img src="{{ asset('assets/img/products/diamond.png') }}" alt="img">
                            </button>
                            <button class="nav-link" id="two-tab" data-bs-toggle="tab" data-bs-target="#two"
                                type="button" role="tab" aria-controls="two" aria-selected="true">
                                <img src="{{ asset('assets/img/products/diamond-2.png') }}" alt="img">
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="imageTabContent">
                        <div class="tab-pane show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <a href="{{ asset('assets/img/products/diamond.png') }}" class="popup-image"><img
                                    src="{{ asset('assets/img/products/diamond.png') }}" alt="img"></a>
                        </div>
                        <div class="tab-pane show" id="two" role="tabpanel" aria-labelledby="two-tab">
                            <a href="{{ asset('assets/img/products/diamond-2.png') }}" class="popup-image"><img
                                    src="{{ asset('assets/img/products/diamond-2.png') }}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <div class="shop__details-content">
                    <div class="shop__details-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="rating-count">( 3 Customer Review )</span>
                    </div>
                    <h2 class="title">{{ $game->name . ' (' . $game->game->name . ')' }}</h2>
                    <div class="shop__details-price">
                        <span class="amount">
                            {{ 'Rp ' . number_format($mlB[0]['price']['basic'], 0, ',', '.') }}<span class="stock-status">-
                                IN
                                STOCK</span></span>
                    </div>
                    <div class="shop__details-short-description">
                        <p>Lorem ipsum dolor sit amet, consteur adipiscing Duis elementum solliciin is yaugue
                            euismods Nulla ullaorper.</p>
                    </div>
                    <form class="offCanvas__newsletter-form" id="payment_form" action="{{ route('place.order', ['game_name'=>'mobile-legend', 'slug'=>'diamonds']) }}" method="post">
                        @csrf
                        <div class="shop__details-model d-flex align-items-center">
                            <p class="model m-0">Diamonds:</p>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col">
                                    <div class="shop__ordering">
                                        <select name="game_code" class="orderby">
                                            @foreach ($mlB as $item)
                                                <option value="{{ $item['code'] . ';' . $item['price']['basic'] }}">
                                                    <li>{{ $item['name'] }}</li>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        <div class="offCanvas__newsletter">
                            <h4 class="small-title">Total</h4>
                            <input type="text" class="in-num" name="total_amount" id="total_amount" value="0">

                        </div>
                        <div class="shop__details-qty">
                            <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                                <button class="shop__details-cart-btn" onclick="submitForm()" type="button">pay</button>
                            </div>
                        </div>
                    </form>
                    <div class="shop__details-bottom">
                        <div class="posted_in">
                            <b>Categories :</b>
                            <a href="shop.html">Gamdias,</a>
                            <a href="shop.html">Apple,</a>
                            <a href="shop.html">Huawei</a>
                        </div>
                        <div class="tagged_as">
                            <b>Tags :</b>
                            <a href="shop.html">Silver,</a>
                            <a href="shop.html">Pink,</a>
                            <a href="shop.html">Green</a>
                        </div>
                        <div class="product_share">
                            <b>Share :</b>
                            <a href="shop.html"><i class="fab fa-facebook-f"></i></a>
                            <a href="shop.html"><i class="fab fa-twitter"></i></a>
                            <a href="shop.html"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product__desc-wrap">
                        <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab"
                                    aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                    type="button" role="tab" aria-controls="info" aria-selected="false">Additional
                                    Information</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews
                                    (0)</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="descriptionTabContent">
                            <div class="tab-pane animation-none fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p>Lorem ipsum dolor sit amet, consteur adipiscing Duis elementum solliciin is
                                    yaugue euismods Nulla ullaorper. Lorem Ipsum is simply dummy text of the
                                    printing and typesetting industry. Lorem Ipsum has been the industry's standard
                                    dummy text
                                    ever since the 1500s.</p>
                                <p>Don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum, you need to be sure there isn't anything embarrassing hidden in the
                                    middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                                    predefined chunks as necessary, making this the first true generator on the
                                    Internet. It uses a dictionary of over 200 Latin words, combined with a handful
                                    of model sentence structures, to generate Lorem Ipsum which looks reasonable.
                                    The generated Lorem Ipsum is therefore always free from repetition, injected
                                    humour.</p>
                            </div>
                            <div class="tab-pane animation-none fade" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row">General</th>
                                            <td>PS5 Digital Platform</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Technical Information</th>
                                            <td>Qualcomm Snapdragon XR2</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Display</th>
                                            <td>3664 x 1920</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">RAM & Storage</th>
                                            <td>8GB/256GB</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Included</th>
                                            <td>PS5 VR Streaming Assistant</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane animation-none fade" id="reviews" role="tabpanel"
                                aria-labelledby="reviews-tab">
                                <div class="product__desc-review">
                                    <div class="product__desc-review-title mb-15">
                                        <h5 class="title">Customer Reviews (0)</h5>
                                    </div>
                                    <div class="left-rc">
                                        <p>No reviews yet</p>
                                    </div>
                                    <div class="right-rc">
                                        <a href="#">Write a review</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.orderby').on('change', function() {
                var selectedValue = $(this).val();
                var parts = selectedValue.split(';');
                var value = parts[1];
                const rupiah = (value)=>{
                    return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                    }).format(value);
                }
                $('input[name="total_amount"]').val(rupiah(value));
            });
        });
        function submitForm() {
                var form = document.getElementById("payment_form");
                var formData = new FormData(form);

                fetch(form.action, {
                method: "POST",
                body: formData
                })
                .then(response => {
                console.log(response);
                // Lakukan sesuatu setelah berhasil mengirim data form
                })
                .catch(error => {
                console.error(error);
                // Lakukan sesuatu jika terjadi error saat mengirim data form
                });
        }
    </script>
@endpush
