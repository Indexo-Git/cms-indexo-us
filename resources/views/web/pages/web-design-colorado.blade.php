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
                    <h1>Web Design.<br><small class="text-muted">in Colorado</small></h1>
                    <h4>Standard Website</h4>
                    <ul class="list-none list-sign">
                        <li>5 Content Sections.</li>
                        <li>1 Contact form.</li>
                        <li>Indexing on Google.</li>
                        <li>Optimized loading time</li>
                    </ul>
                    <br>
                    <a id="download-quote-web-design" href="{{ asset('web/quotes/Web_Design_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Quote
                    </a>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/services/web-design.svg') }}" alt="Web Design">
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
                                    <h3>Exclusive Neighborhood Offer!</h3>
                                    <p>Are you a Colorado-based business owner aiming to establish a robust online presence?</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="cta-btn text-right">
                                    <a href="{{ route('neighborhood-offer') }}" class="btn-common mt-sm-25">Check offer!</a>
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
                <div class="col-lg-7">
                    <div class="section-title mb-40">
                        <h2>Now in Colorado!</h2>
                        <p class="mt-15">We're thrilled to announce that we've recently established our base in <strong>Wheat Ridge</strong>, Colorado! Having honed our expertise over many years, we bring a wealth of experience in <strong>web design</strong> and digital strategy to the local market.</p>
                        <p>Our move represents a commitment to not only grow our business but to also empower local Colorado businesses with <strong>digital solutions</strong>.</p>
                    </div>
                </div>
                <div class="col-lg-5 mt-md-5 mt-sm-50 text-center">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-05.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-05.jpg') }}" alt="Jesus and Erika in Colorado">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Portfolio</h2>
                        <p class="mt-15">While we've just recently set up shop in Colorado and haven't completed any local projects yet, this is your chance to be our first showcase in the area! </p>
                    </div>
                </div>
            </div>
            <div class="row mt-45 justify-content-center">
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/webp/web-design/colorado-flag.webp') }}" type="image/webp">
                                <img src="{{ asset('web/images/web-design/colorado-flag.jpg') }}" alt="Colorado Flag Blured">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Your Future Website</h3>
                        </div>
                        <span class="special-action enter-arrow" data-target="{{ route('neighborhood-offer') }}">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://utahinjury.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-16.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-16.jpg') }}" alt="Young & Young Law">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://utahinjury.com/">Young & Young Law</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://utahinjury.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://measuretwicecorp.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-17.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-17.jpg') }}" alt="Measure Twice">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://measuretwicecorp.com/">Measure Twice</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://measuretwicecorp.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://mgroupbrokers.ch/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-09.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-09.jpg') }}" alt="M Group Brokers">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://mgroupbrokers.ch/">M Group Brokers</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://mgroupbrokers.ch/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://hernandezcortes.github.io/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-11.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-11.jpg') }}" alt="Danae Hernandez">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://hernandezcortes.github.io/">Danae Hernandez</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://hernandezcortes.github.io/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://sandraaguilargomez.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-20.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-20.jpg') }}" alt="Sandra Aguilar-Gomez">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://sandraaguilargomez.com/">Sandra Aguilar-Gomez</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://sandraaguilargomez.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/webp/web-design/web-design-21.webp') }}" type="image/webp">
                                <img src="{{ asset('web/images/web-design/web-design-21.jpg') }}" alt="Website in construction">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Storage Containers</h3>
                            <h5 class="text-muted"><small>Under construction</small></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/webp/web-design/web-design-22.webp') }}" type="image/webp">
                                <img src="{{ asset('web/images/web-design/web-design-22.jpg') }}" alt="Website in construction">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Business System</h3>
                            <h5 class="text-muted"><small>Under construction</small></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="work-process-area bg-1 pt-65 pt-sm-45 pb-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Web Design Process.</h2>
                    </div>
                </div>
            </div>
            <div class="row work-process-inner mt-45">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-light-bulb"></i>
                        <h4>Design</h4>
                        <span>01</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-ruler-pencil"></i>
                        <h4>Construction</h4>
                        <span>02</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-bolt"></i>
                        <h4>Optimization</h4>
                        <span>03</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-rocket"></i>
                        <h4>Launch</h4>
                        <span>04</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
