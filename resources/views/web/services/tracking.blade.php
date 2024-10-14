@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
    <link rel="stylesheet" href="{{ asset('app/vendor/magnific-popup/magnific-popup.css') }}">
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-6">
                    <h1>Tracking Website<br><small class="text-muted">in Colorado.</small></h1>
                    <h4 class="mb-3">Enhance your marketing with our Colorado-based tracking websites.</h4>
                    <ul class="list-none list-sign">
                        <li>Advanced Administration Panel.</li>
                        <li>Detailed Statistics.</li>
                        <li>Comprehensive Content Management.</li>
                        <li>Customization and Scalability.</li>
                    </ul>
                    <br>
                    <a id="download-quote-tracked-website" href="{{ asset('web/quotes/Tracking_Website_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Quote
                    </a>
                </div>
                <div class="col-lg-6 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img src="{{ asset('web/svg/products/tracked-website.svg') }}" alt="Tracking Website">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-1 py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-45">
                        <h2>What is a Tracking Website?</h2>
                        <p class="mt-15">A tracking website is a data-driven web solution that revolutionizes the way of understanding and optimizing your online presence.</p>
                        <a class="image-popup-no-margins" href="{{ asset('web/images/tracking-website/panel.png') }}">
                            <picture>
                                <source srcset="{{ asset('web/webp/tracking-website/panel.webp') }}" type="image/webp">
                                <img class="img-fluid pt-3 mt-4" src="{{ asset('web/images/tracking-website/panel.png') }}" alt="indexo panel">
                            </picture>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-title py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Do I Need a Tracking Website?</h2>
                        <p class="mt-15">Do you know the exact number of people who contact you through your website via phone calls?</p>
                        <p>Do you have information about the <strong>percentage of leads</strong> generated through your website by people who contact you via phone calls or contact forms?</p>
                        <p>Can you compare these data over time?</p>
                        <p>If your answer is "no" to any of these questions, then, my friend, it's time to consider a tracking website.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="services-area py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Features of a Tracking Website</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-25">
                <div class="col-lg-12">
                    <div class="service-single style-4">
                        <i class="ti-mobile"></i>
                        <div class="service-single-brief">
                            <h4>Call Tracking Technology</h4>
                            <p>Are you already familiar with <a href="{{ url('call-tracking') }}">how Call Tracking works</a>? Now you can monitor and analyze every call made through your website. Review your missed call rates and, best of all, identify unique call percentages and lead conversion rates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="service-single style-4">
                        <i class="ti-email"></i>
                        <div class="service-single-brief">
                            <h4>Lead Classification</h4>
                            <p>Do you receive contact messages through your website? Of course! But, how do you distinguish between spam, messages from agencies, and the most valuable: the leads? Thanks to our artificial intelligence, we can analyze emails and assign a classification. This allows us to accurately measure the percentage of leads generated through contact forms on your website.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="service-single style-4">
                        <i class="ti-stats-up"></i>
                        <div class="service-single-brief">
                            <h4>Analytics Integration</h4>
                            <p>Google Analytics offers real-time data on website traffic, user behavior, and conversion rates. While access to Google Analytics is common, now you can get page visit statistics in relation to your calls and contact messages to your Colorado based business with just one click.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('app/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            $('.image-popup-no-margins').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                }
            });

        }(jQuery));
    </script>
@endsection
