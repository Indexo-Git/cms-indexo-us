@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-6">
                    <h1>Web Consulting<br><small class="text-muted">in Colorado.</small></h1>
                    <h4 class="mb-3">Empowering Colorado enterprises through professional web consulting.</h4>
                    <ul class="list-none list-sign">
                        <li>Analysis and Strategy.</li>
                        <li>Web Design and Development.</li>
                        <li>Search Engine Optimization (SEO).</li>
                        <li>Analytics and Performance Measurement.</li>
                        <li>Training and Support</li>
                    </ul>
                    <br>
                    <a id="download-quote-web-consulting" href="{{ asset('web/pricing/Web_Consulting_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Pricing
                    </a>
                </div>
                <div class="col-lg-6 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/services/consulting.svg') }}" alt="Web Consulting">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="section-title text-center mb-45">
                        <h2>Benefits of Web Consulting.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="service-single mt-05">
                        <i class="ti-timer"></i>
                        <div class="service-single-brief">
                            <h4>Optimization of Resources and Time</h4>
                            <p>In a world where time is money, the optimization of resources is essential. Many companies and projects lack the necessary time to delve into technologies outside their area of expertise.</p>
                            <p>Delegating this work to experts like indexo represents a significant optimization of resources, as it saves valuable time and resources.</p>
                        </div>
                    </div>
                    <div class="service-single">
                        <i class="ti-panel"></i>
                        <div class="service-single-brief">
                            <h4>Customized Solutions</h4>
                            <p>Many companies face systems or applications developed by personnel or agencies that are no longer available.</p>
                            <p>At indexo, we offer customized solutions to improve operational efficiency. We intervene, analyze, and provide specific solutions to address any problem, ensuring that your internal systems function smoothly.</p>
                        </div>
                    </div>
                    <div class="service-single">
                        <i class="ti-headphone-alt"></i>
                        <div class="service-single-brief">
                            <h4>Constant Support and Communication</h4>
                            <p>Our relationship with clients Colorado based goes beyond the initial project. We commit to maintaining constant communication and offering continuous support. We are available to resolve doubts and make subsequent modifications, ensuring that we are by your side as your project evolves.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
