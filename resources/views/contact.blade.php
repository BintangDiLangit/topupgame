@extends('landing.master')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb__hide-img" data-background="assets/img/bg/breadcrumb_bg02.jpg">
        <div class="container">
            <div class="breadcrumb__wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h2 class="title">Contact us</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="contact__content">
                        <h2 class="overlay-title"><span>contact us</span></h2>
                        <h2 class="title">CONTACT US AND FIND YOUR bimy</h2>
                        {{-- <p>Axcepteur sint occaecat atat non proident, sunt culpa officia deserunt mollit anim id est labor
                            umLor emdolor</p> --}}
                        <div class="footer-el-widget">
                            <h4 class="title">information</h4>
                            <ul class="list-wrap">
                                <li><a href="https://wa.me/6281252519417">+62 8125-2519-417</a></li>
                                <li><a href="mailto:team@konsulinaja.id">team@konsulinaja.id</a></li>
                                <li>Malang, Indonesia</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-10">
                    <div class="contact__form-wrap">
                        <form id="contact-form" action="/contact" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-grp">
                                        <input name="name" type="text" placeholder="Name *" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-grp">
                                        <input name="email" type="email" placeholder="Email *" required>
                                    </div>
                                </div>
                            </div>
                            <div class="input-grp message-grp">
                                <textarea name="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
                            </div>
                            <button class="submit-btn">Submit Now</button>
                        </form>
                        <p class="ajax-response"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

    <!-- contact-map -->
    <div class="contact-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.840841108174!2d112.61834731423885!3d-7.979743894250578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd692506420b4ad%3A0xc4e8fc4b4e7ba4d4!2sMalang%2C%20Kota%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sen!2sid!4v1647835588267!5m2!1sen!2sid"
            allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- contact-map-end -->
@endsection
