@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container pt-md-5">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-12">
                    <h1 class="mb-0">Exclusive Neighborhood Offer!</h1>
                    <p class="mb-1">We recently moved to the area and want to offer our neighbors a special deal.</p>
                    <p class="mb-1">Are you a local business owner looking to establish a strong online presence?</p>
                    <p class="mb-1">Take advantage of this limited-time offer to get a professionally designed website at a fraction of the cost.</p>
                </div>
                <div class="col-lg-6">
                    <h4 class="mb-1">Get a Standard Website for Just </h4>
                    <h2 class="mb-1" style="color:#ebac26;">$830</h2>
                    <h4 class="mb-4 text-muted">Regular Price: $2,760</h4>
                    <h3>What you get</h3>
                    <ul class="list-none list-sign">
                        <li>5 Content Sections.</li>
                        <li>1 Contact form.</li>
                        <li>Indexing on Google.</li>
                        <li>Optimized loading time</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="mt-3 btn-common btn-common-2 radius-50">
                        Contact Us
                    </a>
                </div>
                <div class="col-lg-6 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/extras/discount.svg') }}" alt="Exclusive Neighborhood Offer!">
                    </div>
                    <h4 class="text-center mt-5">This offer ends in:</h4>
                    <h2 id="end-of-june" class="py-3 text-center" style="color: #ea4335;"></h2>
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
                    </div>
                </div>
            </div>
            <div class="row mt-45 justify-content-center">
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
                            <h3>Website in construction</h3>
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
                            <h3>Website in construction</h3>
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
                        <h2>Quality as a Priority.</h2>
                        <p class="mt-15">At indexo, we offer high-quality <strong>web design</strong> to turn your digital visions into reality. Communication is key to understanding your ideas and goals.</p>
                        <p>We understand the web thoroughly; there are no limitations regarding the type of project or industry. Without neglecting visual aspects, we <strong>optimize</strong> your site to look exceptional on any device. We consider both users and <strong>search engines</strong> in every development phase.</p>
                    </div>
                </div>
                <div class="col-lg-5 mt-sm-50 text-center">
                    <picture>
                        <source type="image/webp" src="{{ asset('web/webp/design-rush.webp') }}">
                        <img src="{{ asset('web/images/design-rush.png') }}" alt="Design Rush">
                    </picture>
                    <br>
                    <a href="https://www.designrush.com/agency/profile/indexo" target="_blank" title="Ver perfil DesignRush">Agency Verified by <br>DesignRush</a>
                    <div class="mt-2">
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
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
                                    <p>We invite you to use our <strong class="text-white">Website Price Calculator</strong> and start your website today.</p>
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
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $("#end-of-june")
            .countdown("2024/09/30", function(event) {
                $(this).text(
                    event.strftime('%D days %H:%M:%S')
                );
            });
    </script>
@endsection
