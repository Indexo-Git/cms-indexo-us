@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-7">
                    <h1>E-Commerce <br><small class="text-muted">in Colorado.</small></h1>
                    <h4 class="mb-3">Elevate your Colorado e-commerce business with our expert solutions</h4>
                    <ul class="list-none list-sign">
                        <li>Personalized design.</li>
                        <li>Multiple Payment Methods Available</li>
                        <li>Indexing on Google.</li>
                        <li>Optimized loading time.</li>
                    </ul>
                    <br>
                    <a id="download-quote-e-commerce" href="{{ asset('web/quotes/e_Commerce_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Quote
                    </a>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/products/e-commerce.svg') }}" alt="e-Commerce Custom Solutions">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-area my-5 mt-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner bg-fb5c71 br-radius-10">
                        <div class="row height-180 align-items-center">
                            <div class="col-lg-9">
                                <div class="cta-text">
                                    <h3>Website Price</h3>
                                    <p>We invite you to use our <strong class="text-white">Website Price Calculator</strong> and start your e-Commerce today.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="cta-btn text-right">
                                    <a href="{{ route('website-cost-calculator') }}" class="btn-common mt-sm-25">Check price</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-45">
                        <h2>Payment Methods? You Name It</h2>
                        <p class="mt-15">In the dynamic world of online commerce, offering a wide range of payment options is crucial for customer satisfaction and business success. As a developer agency with a focus on bespoke e-commerce solutions, we possess the flexibility and technical expertise to integrate virtually any payment platform you desire into your online store. </p>
                        <p class="mb-5">Whether it's widely-used systems like PayPal, Stripe, or credit card processors, or more specialized or regional payment methods, our team is adept at seamlessly incorporating them into your e-commerce site.</p>
                        <div class="row mt-5">
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/stripe.svg') }}" alt="Stripe">
                            </div>
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/apple_pay.svg') }}" alt="Apple Pay">
                            </div>
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/paypal.svg') }}" alt="PayPal">
                            </div>
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/google_pay.svg') }}" alt="Google Pay">
                            </div>
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/square.svg') }}" alt="Square">
                            </div>
                            <div class="col-4 col-md-2">
                                <img src="{{ asset('web/svg/payments/amazon_pay.svg') }}" alt="Amazon Pay">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-45">
                        <h2>E-commerce for Success</h2>
                        <p class="mt-15">We offer a platform that not only allows you to sell your products efficiently but is also powered by cutting-edge technology that gives you a competitive edge.</p>
                        <p>With our solution, SEO, speed, and customization are not an issue. Discover how your online store can stand out.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <div class="section-title mb-40">
                        <h2>Automated SEO</h2>
                        <p class="mt-15">Forget worrying about the technical details of SEO. Our tool automatically manages your metadata, keywords, and more, so your store is always visible in search engines.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="row mt-sm-80">
                        <div class="dots-h">
                            <img class="img-fluid" src="{{ asset('web/svg/extras/seo-check.svg') }}" alt="Automated SEO">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5 py-5">
                <div class="col-lg-5">
                    <div class="row mt-sm-80">
                        <div class="dots-h">
                            <img class="img-fluid" src="{{ asset('web/svg/extras/speed.svg') }}" alt="Unmatched Speed">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="section-title mb-40">
                        <h2>Unmatched Speed</h2>
                        <p class="mt-15">Images are automatically optimized for ultra-fast loading. Your customers will enjoy a shopping experience without waiting.</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <div class="section-title mb-40">
                        <h2>Total Customization</h2>
                        <p class="mt-15">Your online store is unique, and it should be. We customize every detail to fit your Colorado based business, from appearance to functionalities.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="row mt-sm-80">
                        <div class="dots-h">
                            <img class="img-fluid" src="{{ asset('web/svg/extras/custom.svg') }}" alt="Total Customization">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
