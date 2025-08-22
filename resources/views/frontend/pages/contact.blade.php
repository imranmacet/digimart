@extends('frontend.layouts.master')

@section('content')
    <!-- ======================== Breadcrumb Two Section Start ===================== -->
    <section class="breadcrumb border-bottom p-0 d-block section-bg position-relative z-index-1"
        style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="breadcrumb-two">
            <img src="{{ asset('assets/frontend/images/gradients/breadcrumb-gradient-bg.png') }}" alt="" class="bg--gradient">
            <div class="container container-two">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="breadcrumb-two-content text-center">

                            <ul class="breadcrumb-list flx-align gap-2 mb-2 justify-content-center">
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <a href="index.html" class="breadcrumb-list__link text-body hover-text-main">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__icon font-10"><i class="fas fa-chevron-right"></i></span>
                                </li>
                                <li class="breadcrumb-list__item font-14 text-body">
                                    <span class="breadcrumb-list__text">{{ __('Contact Us') }}</span>
                                </li>
                            </ul>

                            <h3 class="breadcrumb-two-content__title mb-0 text-capitalize">{{ __('Contact Us') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Breadcrumb Two Section End ===================== -->

    <!-- =========================== Contact Section Start ========================== -->
    <section class="wsus__contact_us padding-y-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__contact_single_info">
                        <span><i class="fas fa-phone-alt"></i></span>
                        <a href="callto:{{ $contact?->phone_one }}">{{ $contact?->phone_one }}</a>
                        <a href="callto:{{ $contact?->phone_two }}">{{ $contact?->phone_two }}</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__contact_single_info">
                        <span><i class="fas fa-envelope"></i></span>
                        <a href="mailto:{{ $contact?->email_one }}">{{ $contact?->email_one }}</a>
                        <a href="mailto:{{ $contact?->email_two }}">{{ $contact?->email_two }}</a>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="wsus__contact_single_info">
                        <span><i class="fas fa-globe"></i></span>
                        <a href="{{ $contact?->link_one }}" target="_blank">{{ $contact?->link_one }}</a>
                        <a href="{{ $contact?->link_two }}" target="_blank">{{ $contact?->link_two }}</a>
                    </div>
                </div>
            </div>
            <div class="row mt_120 xs_mt_80">
                <div class="col-xl-12 col-lg-12">
                    <form action="{{ route('contact.send-mail') }}" method="POST" class="wsus__contact_form wsus__comment_input_area">
                        @csrf
                        <h3>Feel Free to Get in Touch</h3>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>name*</legend>
                                        <input type="text" placeholder="Garikoka Thomash" name="name">
                                    </fieldset>
                                </div>
                            </div>
                            
                            <div class="col-xl-6">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>email*</legend>
                                        <input type="email" placeholder="infoyour@gmail.com" name="email">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>subject*</legend>
                                        <input type="text" placeholder="Your Subject" name="subject">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__comment_single_input">
                                    <fieldset>
                                        <legend>message*</legend>
                                        <textarea rows="6" placeholder="Write a Message" name="message"></textarea>
                                    </fieldset>
                                </div>
                                <button class="btn btn-main btn-lg" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="wsus__contact_map">
                {{-- <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.7518483647655!2d90.42582381534564!3d23.827421691745684!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c777d7d14d27%3A0x1b06642f473dee69!2sBashundhara%20Convention%20Hall!5e0!3m2!1sen!2sbd!4v1678073799309!5m2!1sen!2sbd"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

                    {!! $contact?->map !!}
            </div>
        </div>
    </section>
    <!-- =========================== Contact Section End ========================== -->
@endsection
