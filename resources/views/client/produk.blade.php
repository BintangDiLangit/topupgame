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
                    <div class="tab-content" id="imageTabContent">
                        <div class="tab-pane show active" id="one" role="tabpanel" aria-labelledby="one-tab">
                            <a href="{{ $produks[0]->kategori->image_kategori }}" class="popup-image"><img
                                    src="{{ $produks[0]->kategori->image_kategori }}" alt="img"></a>
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
                    <h2 class="title">{{ $produks[0]->kategori->masterKategori->nama_master_kategori . ' (' . $produks[0]->kategori->nama_kategori . ')' }}</h2>
                    <div class="shop__details-price">
                        <span class="amount">
                            {{ 'Start From Rp ' . number_format($produks[0]->harga_jual, 0, ',', '.') }}<span
                                class="stock-status"> -
                                IN
                                STOCK</span></span>
                    </div>
                    <div class="shop__details-short-description">
                        <p class="mb-3">{{ $produks[0]->kategori->desc }}
                        </p>
                        <a href="/tos/page/bimy">Term & Services</a>
                    </div>
                    <div id="error-message" class=""></div>
                    <form class="offCanvas__newsletter-form" id="payment_form"
                        action="{{ route('place.order', ['game_name' => 'mobile-legend', 'slug' => 'diamonds']) }}"
                        method="post">
                        @csrf
                        <div class="offCanvas__newsletter mb-4">
                            <h4 class="small-title">Account ID <span class="text-danger">*</span></h4>
                            <input type="text" class="in-num bg-dark text-white" name="id_user" placeholder="account id"
                                id="id_user" required>

                        </div>
                        <div class="offCanvas__newsletter mb-4">
                            <h4 class="small-title">Zone ID <span class="text-danger">*</span></h4>
                            <input type="text" class="in-num bg-dark text-white" name="zone_user" id="zone_user"
                                placeholder="zone id" required>
                        </div>
                        <div class="offCanvas__newsletter">
                            <p class="small-title">Diamonds <span class="text-danger">*</span></p>
                            <select name="game_code" id="game_code" class="text-white form-control bg-dark ml-2 mr-2"
                                required>
                                <option value=""> - Choose Package - </option>
                                @foreach ($produks as $item)
                                    <option value="{{ $item['code'] . ';' . $item['harga_jual'] }}">
                                        <li>{{ $item['jumlah'] . ' Diamonds ' }}</li>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="offCanvas__newsletter" id="nicknameShow">
                            <h5 class="small-title"></h5>
                        </div>
                        <div class="offCanvas__newsletter">
                            <h4 class="small-title">Total</h4>
                            <input type="text" class="in-num bg-dark text-white" readonly name="total_amount"
                                id="total_amount" value="0">

                        </div>
                        <div class="shop__details-qty">
                            <div class="cart-plus-minus d-flex flex-wrap align-items-center">
                                <button class="shop__details-cart-btn" onclick="submitForm()" id="submit-btn"
                                    type="button">pay</button>
                            </div>
                        </div>
                    </form>
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
                                <p>{{ $produks[0]->kategori->desc }}</p>
                            </div>
                            <div class="tab-pane animation-none fade" id="info" role="tabpanel"
                                aria-labelledby="info-tab">
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
                                    {{-- <div class="right-rc">
                                        <a href="#">Write a review</a>
                                    </div> --}}
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#game_code').on('change', function(e) {
                e.preventDefault();
                var zone_user = $("input[name=zone_user]").val();
                var id_user = $("input[name=id_user]").val();
                if (zone_user == '' || zone_user == null || id_user == '' || id_user == null) {
                    const reminder = confirm('Silahkan Masukkan ID Akun dan ID Zone kamu');
                    $('#game_code').val($("#game_code option:first").val());
                } else {
                    var h5Element = $('#nicknameShow h5');

                    if (h5Element.text().trim().length === 0 || $('#nicknameShow h5').hasClass(
                            'text-danger')) {

                        // loading
                        $("#submit-btn").html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        ).attr("disabled", true);
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('cek.user') }}",
                            data: {
                                zone_user: zone_user,
                                id_user: id_user
                            },
                            success: function(data) {
                                if (data == null || data == undefined || data == '') {
                                    $('#nicknameShow').addClass('mb-3 mt-3');
                                    h5Element.text('Account Not Found');
                                    h5Element.addClass('text-danger');
                                    $('#game_code').val($("#game_code option:first").val());
                                } else {
                                    h5Element.removeClass('text-danger');
                                    h5Element.text('Account Found : ' + data);
                                    $('#nicknameShow').addClass('mb-3 mt-3');
                                    $('#nicknameShow').prepend(
                                        '<p class="text-warning mb-2">Akun telah di set, jika ingin mengubah account id atau zone id silahkan refresh page ini</p>'
                                    );

                                    var selectedValue = $('#game_code').val();
                                    var parts = selectedValue.split(';');
                                    let value = parseInt(parts[1]);
                                    let total = value
                                    const rupiah = (total) => {
                                        return new Intl.NumberFormat("id-ID", {
                                            style: "currency",
                                            currency: "IDR"
                                        }).format(total);
                                    }
                                    $('input[name="total_amount"]').val(rupiah(total));
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                // Handle error response
                            },
                            complete: function() {
                                // Hide spinner and re-enable button
                                $("#submit-btn").html("Pay").removeAttr("disabled");
                            }
                        });
                    } else {
                        var selectedValue = $(this).val();
                        var parts = selectedValue.split(';');
                        let value = parseInt(parts[1]);
                        let total = value
                        const rupiah = (total) => {
                            return new Intl.NumberFormat("id-ID", {
                                style: "currency",
                                currency: "IDR"
                            }).format(total);
                        }
                        $('input[name="total_amount"]').val(rupiah(total));

                        $('#zone_user').attr('readonly', true);
                        $('#id_user').attr('readonly', true);
                    }
                }

            });
        });

        function submitForm() {
            var form = document.getElementById("payment_form");
            var formData = new FormData(form);

            $("#submit-btn").html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            ).attr("disabled", true);

            fetch(form.action, {
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        if (response.status === 400) {
                            const errorMessage = document.getElementById("error-message");
                            errorMessage.innerText = "Pastikan data terisi dengan lengkap";
                            errorMessage.classList.add('text-danger', 'text-small', 'mb-3');
                        }
                        if (response.status === 208) {
                            const errorMessage = document.getElementById("error-message");
                            errorMessage.innerText = "Pastikan data terisi dengan lengkap";
                            errorMessage.classList.add('text-warning', 'text-small', 'mb-3');
                            throw new Error("Warning: " + response.statusText);
                        }
                    }
                    return response.text();
                })
                .then(text => {
                    window.location.replace(text);
                })
                .catch(error => {
                    // console.log(error);
                })
                .finally(() => {
                    $("#submit-btn").html("Pay").removeAttr("disabled");
                });
        }
    </script>
@endpush