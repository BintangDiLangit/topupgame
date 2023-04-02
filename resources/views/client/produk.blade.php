@extends('landing.master') @section('content')
<section class="breadcrumb-area breadcrumb__hide-img">
    <div class="container">
        <div class="breadcrumb__wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb__content">
                        <h2 class="title">product single</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    product single
                                </li>
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
        <div class="row mb-5 justify-content-center text-center">
            <h2 class="title">
                {{ $produks[0]->kategori->masterKategori->nama_master_kategori . ' (' .
                $produks[0]->kategori->nama_kategori . ')' }}
            </h2>
        </div>
        <div class="row">
            <div class="shop__details-images-wrap">
                <div class="tab-content" id="imageTabContent">
                    <div class="tab-pane show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <a href="{{ $produks[0]->kategori->image_kategori }}" class="popup-image"><img
                                src="{{ $produks[0]->kategori->image_kategori }}" alt="img" /></a>
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
                <!-- <h2 class="title">
                    {{ $produks[0]->kategori->masterKategori->nama_master_kategori . ' (' .
                    $produks[0]->kategori->nama_kategori . ')' }}
                </h2> -->
                <div class="shop__details-price">
                    <span class="amount">{{ 'Start From Rp ' . number_format($produks[0]->harga_jual, 0, ',', '.')


                        }}<span class="stock-status"> - IN STOCK</span></span>
                </div>
                <div class="shop__details-short-description">
                    <!-- <p class="mb-3">{{ $produks[0]->kategori->desc }}</p> -->
                    <a href="/tos/page/bimy">Term & Services</a>
                </div>
                <div id="error-message" class=""></div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="contact__form-wrap">


                    <form class="contact-form" id="payment_form"
                        action="{{ route('place.order', ['game_name' => 'mobile-legend', 'slug' => 'diamonds']) }}"
                        method="post">
                        @csrf
                        <div class="input-grp mb-4">
                            <p class="small-title">
                                Diamonds <span class="text-danger">*</span>
                            </p>
                            <select name="game_code" id="game_code"
                                class="text-white form-control bg-dark ml-2 mr-2 @error('game_code') is-invalid @enderror"
                                required>
                                <option value="">- Choose Package -</option>
                                @foreach ($produks as $item)
                                <option value="{{ $item['code'] . ';' . $item['harga_jual'] }}">
                                    <li>{{ $item['jumlah'] . ' Diamonds ' }}</li>
                                </option>
                                @endforeach @error('game_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </select>
                            <div id="err-game_code" class="invalid-feedback text-danger">
                                Please choose Package.
                            </div>
                        </div>
                        <div class="input-grp mb-4">
                            <h4 class="small-title">Harga</h4>
                            <input type="text" class="in-num bg-dark text-white" readonly name="total_amount"
                                id="total_amount" value="0" />
                        </div>
                        <div class="input-grp mb-4">
                            <h4 class="small-title">
                                Account ID
                                <span class="text-danger @error('id_user') is-invalid @enderror">*</span>
                            </h4>
                            <input type="text" class="in-num bg-dark text-white" name="id_user" placeholder="account id"
                                id="id_user" required value="{{ old('id_user') }}" />
                            @error('id_user')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div id="err-id_user" class="invalid-feedback text-danger">
                                Please provide a Account ID.
                            </div>
                        </div>
                        <div class="input-grp mb-4">
                            <h4 class="small-title">
                                Server ID <span class="text-danger">*</span>
                            </h4>
                            <input type="text" class="in-num bg-dark text-white @error('id_user') is-invalid @enderror"
                                name="zone_user" id="zone_user" placeholder="server id" required
                                value="{{ old('zone_user') }}" />
                            @error('zone_user')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div id="err-zone_user" class="invalid-feedback text-danger">
                                Please provide a valid Server ID.
                            </div>
                        </div>

                        <!-- <div class="offCanvas__newsletter" id="nicknameShow">
                        <h5 class="small-title"></h5>
                    </div> -->
                        <div class="input-grp mb-4">
                            <h4 class="small-title">Akun Email</h4>
                            <input type="email"
                                class="in-num bg-dark text-white @error('game_code') is-invalid @enderror" name="email"
                                placeholder="email kamu" id="email" />
                            <!-- <div class="valid-feedback">
                            Looks good!
                        </div> -->
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="shop__details-qty">
                            <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                                <!-- <button
                                class="shop__details-cart-btn comment-form"
                                onclick="submitForm()"
                                id="submit-btn"
                                type="submit"
                            >
                                pay
                            </button> -->

                                <!-- Button trigger modal -->
                                <button id="checkout" class="shop__details-cart-btn" type="button"
                                    class="btn btn-primary">
                                    Checkout
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="checkoutModal" tabindex="-1" data-bs-backdrop="static"
                                    data-bs-keyboard="false" aria-labelledby="checkoutModalLabel" aria-hidden="true">
                                    <div class="modal-dialog bg-dark">
                                        <div class="modal-content bg-dark">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="checkoutModalLabel">
                                                    INVOICE
                                                </h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form
                                                action="{{ route('place.order', ['game_name' => 'mobile-legend', 'slug' => 'diamonds']) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="px-2">
                                                        <ul class="list-unstyled">
                                                            <li class="" id="nicknameShow">Hello John Doe</li>
                                                            <!-- <div class="offCanvas__newsletter" id="nicknameShow">
                                                            <h5 class="small-title"></h5>
                                                        </div> -->
                                                            <li class="mt-1">
                                                                April 17 2021
                                                            </li>
                                                        </ul>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <p class="float-start">
                                                                    <b>Account ID</b>
                                                                </p>
                                                                <p class="float-end">
                                                                    2133431
                                                                </p>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <p class="float-start">
                                                                    <b>Zone ID</b>
                                                                </p>
                                                                <p class="float-end">
                                                                    2033
                                                                </p>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <p class="float-start">
                                                                    <b>Email</b>
                                                                </p>
                                                                <p class="float-end">
                                                                    thoriq@gmail.com
                                                                </p>
                                                            </div>
                                                            <hr style="border: 2px solid white;" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <p class="float-start">
                                                                    <b>Diamonds</b>
                                                                </p>
                                                                <p class="float-end">
                                                                    86
                                                                </p>
                                                            </div>
                                                            <hr style="border: 2px solid white;" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <p class="small-title float-start">
                                                                    <b>TOTAL : </b>
                                                                </p>
                                                                <p class="small-title float-end">
                                                                    Rp. 20.000
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn shop__details-cart-btn">
                                                        Pay
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product__desc-wrap">
                    <ul class="nav nav-tabs" id="descriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">
                                Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="false">
                                Additional Information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                type="button" role="tab" aria-controls="reviews" aria-selected="false">
                                Reviews (0)
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="descriptionTabContent">
                        <div class="tab-pane animation-none fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <p>{{ $produks[0]->kategori->desc }}</p>
                            <p>
                                Butuh bantuan? langsung hubungi kami
                                <a href="https://wa.me/6281252519417">disini</a>
                                yaa
                            </p>
                        </div>
                        <div class="tab-pane animation-none fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <th scope="row">Produk</th>
                                        <td>Diamonds Mobile Legends</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Term & Services</th>
                                        <td><a href="/tos/page/bimy">Go</a></td>
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
                                {{--
                                <div class="right-rc">
                                    <a href="#">Write a review</a>
                                </div>
                                --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection @push('script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $("#checkout").click(function () {
            var zone_user = $("input[name=zone_user]").val();
            var id_user = $("input[name=id_user]").val();
            var game_code = $("#game_code").val()

            $("#err-zone_user").attr("class", "invalid-feedback text-danger");
            $("#err-id_user").attr("class", "invalid-feedback text-danger");
            $("#err-game_code").attr("class", "invalid-feedback text-danger");

            if (zone_user == "" ||
                zone_user == null) {
                $("#err-zone_user").attr("class", "invalid-feedback-active text-danger");
            }
            if (id_user == "" ||
                id_user == null) {
                $("#err-id_user").attr("class", "invalid-feedback-active text-danger");
            }
            if (game_code == "" ||
                game_code == null) {
                $("#err-game_code").attr("class", "invalid-feedback-active text-danger");
            }



            if (
                zone_user == "" ||
                zone_user == null ||
                id_user == "" ||
                id_user == null ||
                game_code == "" ||
                game_code == null
            ) {
                $('#checkoutModal').modal('hide');
            } else {
                var h5Element = $("#nicknameShow h5");

                // loading
                $("#checkout")
                    .html(
                        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                    )
                    .attr("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('cek.user') }}",
                    data: {
                        zone_user: zone_user,
                        id_user: id_user,
                    },
                    success: function (data) {
                        if (
                            data == null ||
                            data == undefined ||
                            data == ""
                        ) {
                            $("#nicknameShow").addClass("mb-3 mt-3");
                            h5Element.text("Account Not Found");
                            h5Element.addClass("text-danger");
                            $("#game_code").val(
                                $("#game_code option:first").val()
                            );
                        } else {
                            h5Element.removeClass("text-danger");
                            h5Element.text("Account Found : " + data);
                            $("#nicknameShow").addClass("mb-3 mt-3");
                            $("#nicknameShow").prepend(
                                '<p class="text-warning mb-2">Akun telah di set, jika ingin mengubah account id atau zone id silahkan refresh page ini</p>'
                            );

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#checkout")
                            .html(
                                'Checkout'
                            )
                            .attr("disabled", false);
                    },
                    complete: function () {
                        $('#checkoutModal').modal('show');

                        $("#checkout")
                            .html(
                                'Checkout'
                            )
                            .attr("disabled", false);
                    },
                });


            }
        });

        $("#game_code").on("change", function (e) {
            var selectedValue = $("#game_code").val();
            var parts = selectedValue.split(";");
            let value = parseInt(parts[1]);
            let total = value;
            const rupiah = (total) => {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                }).format(total);
            };
            $('input[name="total_amount"]').val(
                rupiah(total)
            );
        });
    });



    function submitForm() {
        var form = document.getElementById("payment_form");
        var formData = new FormData(form);

        if (
            $("#id_user").val() &&
            $("#zone_user").val() &&
            $("#game_code").val()
        ) {
            $("#submit-btn")
                .html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                )
                .attr("disabled", true);
            $("#payment_form").submit(); // Menambahkan ini untuk mengirimkan formulir
        } else if ($("#game_code").val()) {
            $("#submit-btn").html("Pay").attr("disabled", false);
        }
    }
</script>
@endpush
