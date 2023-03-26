@extends('errors.custom_layouts.master')

@section('content')
<section class="breadcrumb-area mb-5" data-background="assets/img/bg/breadcrumb_bg01.jpg">
    <div class="container">
        <div class="breadcrumb__wrapper">
            <div class="row">
                <div class="col-xl-6 col-lg-7">
                    <div class="breadcrumb__content">
                        <h2 class="title"><span class="text-danger">500</span> | Server Error</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 position-relative d-none d-lg-block">
                    <div class="breadcrumb__img">
                        <img src="{{ asset('assets/img/others/breadcrumb_img02.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
      <div class="col text-center">
        <h2 class="mb-3"><span class="text-warning">Sorry :(</span></h2>
        <h4 class="mb-5">We will back soon</h4>
        <a href="/" class="btn btn-primary">Back to Home</a>
      </div>
    </div>
</div>
@endsection