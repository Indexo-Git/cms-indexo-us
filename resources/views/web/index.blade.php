@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')

@endsection

@section('content')
    <div class="banner-area py-140 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-7 section-title">
                    <h1 id="alt-h1" class="text-muted">Web Agency in Colorado.<br><i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i></h1>
                    <h2 id="alt-h2">Integrated Digital Solutions.</h2>
                    <p class="mt-15">Recently established in Colorado, our digital marketing and <strong>web agency</strong> specializes in merging web development, user-centered design, and data-driven marketing strategies. </p>
                    <p>We collaborate with passionate businesses to create <strong>digital solutions</strong> that not only attract viewers but also convert.</p>
                    <div class="banner-action">
                        <a href="{{ route('solutions') }}" class="btn-common btn-common-2 radius-50 mr-20">Discover</a>
                    </div>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="dots-h">
                        <img src="{{ asset('web/svg/home.svg') }}" alt="Integrated Digital Solutions.">
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center my-5">
                <div class="col-2">
                    <a href="https://www.google.com/search?q=indexo&stick=H4sIAAAAAAAA_-NgU1I1qLAwN0uyMDc3Mk1NNTUyMTG1MqiwNDWytEw1SDa1TElNSkqxXMTKlpmXklqRDwCoAaqPMgAAAA" target="_blank" title="Google My Business Profile">
                        <img src="{{ asset('web/svg/verifications/google.svg') }}" class="google-logo" alt="indexo Colorado Web Agency in Google">
                    </a>
                </div>
                <div class="col-4 text-center">
                    <a href="https://www.designrush.com/agency/profile/indexo" target="_blank" title="DesignRush Profile">
                        <img src="{{ asset('web/svg/verifications/designrush.svg') }}" class="designrush-logo" alt="indexo Colorado Web Agency in Design Rush">
                    </a>
                </div>
                <div class="col-3 text-center">
                    <a href="https://www.yelp.com/biz/indexo-wheat-ridge" target="_blank" title="Yelp Profile">
                        <img src="{{ asset('web/svg/verifications/yelp.svg') }}" class="yelp-logo" alt="indexo Colorado Web Agency in Yelp">
                    </a>
                </div>
                <div class="col-3 text-right">
                    <a href="https://clutch.co/profile/indexo-0" target="_blank" title="Clutch Profile">
                        <img src="{{ asset('web/svg/verifications/clutch.svg') }}" class="clutch-logo" alt="indexo Colorado Web Agency in Clutch">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-1 py-100 pt-sm-90 pb-sm-80">
        <div class="container z-index">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title">
                        <h2>Services.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{ url('web-design') }}" title="Web Design">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/web-design-service.svg') }}" class="img-fluid mb-3" alt="Service image web design">
                            <div class="service-single-brief">
                                <h4>Web Design</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('e-commerce') }}" title="E-Commerce">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/e-commerce-service.svg') }}" class="img-fluid mb-3" alt="Service image e-commerce">
                            <div class="service-single-brief">
                                <h4>E-Commerce</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('tracking-website') }}" title="Tracking Website">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/web-track-service.svg') }}" class="img-fluid mb-3" alt="Service image tracking website">
                            <div class="service-single-brief">
                                <h4>Tracking Website</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('web-development') }}" title="Web Development">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/web-dev-service.svg') }}" class="img-fluid mb-3" alt="Service image web development">
                            <div class="service-single-brief">
                                <h4>Web Development</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-lg-3">
                    <a href="{{ url('search-engine-optimization') }}" title="Search Engine Optimization">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/seo-service.svg') }}" class="img-fluid mb-3" alt="Service image web search engine optimization">
                            <div class="service-single-brief">
                                <h4>SEO</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('call-tracking') }}" title="Call Tracking">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/call-tracking-service.svg') }}" class="img-fluid mb-3" alt="Service image web call tracking">
                            <div class="service-single-brief">
                                <h4>Call Tracking</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{ url('web-consulting') }}" title="Web Consulting">
                        <div class="service-single style-3 style-5 mt-30">
                            <img src="{{ asset('web/svg/services/icons/consulting-service.svg') }}" class="img-fluid mb-3" alt="Service image web web consulting">
                            <div class="service-single-brief">
                                <h4>Web Consulting</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-100 pt-sm-80 pb-62 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-40">
                        <h2>Is indexo right for you?</h2>
                        <p class="mt-35">With all those <strong>web design companies</strong> out there, we understand how overwhelming this choice can be. Yes, we aspire to be the ideal web agency for you, but we recognize that every business has a unique vision and working style, and we may not always be the <strong>best match</strong>.</p>
                        <div id="webAgencyAccordion">
                            <div class="card single-faq">
                                <div class="card-header faq-heading style-2" id="headingOne">
                                    <h5>
                                        <a href="#collapseOne" class="btn btn-link" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                            <span>What do we want to offer you as a web agency?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#webAgencyAccordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <p>People talk about <i>UX design</i>, but at indexo, our goals extend beyond merely enhancing <strong>user experience</strong> (UX) in website design.</p>
                                                <p>We strive to thoroughly understand your processes to identify any friction from the moment your client discovers your services to the point they have paid for and received your product or service. Armed with this knowledge, we strive to refine, through <strong>integrated digital solutions</strong>, the experience of both potential and current clients—ensuring that, by choosing indexo as your web agency, elevates the quality of your services.
                                            </div>
                                            <div class="col-md-4">
                                                <picture>
                                                    <source srcset="{{ asset('web/gifs/quality.webp') }}" type="image/webp">
                                                    <img src="{{ asset('web/gifs/quality.png') }}" alt="Quality Web agency in Colorado gif">
                                                </picture>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-faq">
                                <div class="card-header faq-heading style-2" id="headingTwo">
                                    <h5>
                                        <a href="#collapseTwo" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                            <span>What we DON'T want to offer you as a web agency?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#webAgencyAccordion">
                                    <div class="card-body">
                                        <p>As part of the innovation we champion, we don't use <i>WordPress</i>. While it's a popular tool, we avoid the security breaches and inherently unoptimized sites it can produce. Instead, we've developed our own digital solution to provide you with <strong>high-quality</strong>, user-friendly, and SEO-friendly web design. It concerns us to see other "qualified web agencies" delivering products with questionable <strong>optimization</strong> when this can be addressed from the very conception.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-faq">
                                <div class="card-header faq-heading style-2" id="headingThree">
                                    <h5>
                                        <a href="#collapseThree" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                            <span>How will you feel after working with indexo?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#webAgencyAccordion">
                                    <div class="card-body">
                                        <p>Secure. You'll join the ranks of those implementing best practices in their businesses. Feel confident knowing your business not only has a robust <strong>online presence</strong> but also a user-friendly tool that enhances customer service. With indexo, you'll be equipped to make <strong>data-driven</strong> decisions that not only ensure your satisfaction but also help you achieve your objectives.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-faq">
                                <div class="card-header faq-heading style-2" id="headingFour">
                                    <h5>
                                        <a href="#collapseFour" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                            <span>How will we feel after working with you?</span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#webAgencyAccordion">
                                    <div class="card-body">
                                        <p>We will be more than honored to have earned your trust. Entrusting your project to us means you're helping us demonstrate the skills that aim to establish us as one of the <strong>top web agencies in Colorado</strong>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Ready to work with the new experts in town?</h4>
                        <p>We offer a <strong>free 30-minute consultation</strong> to discover your needs and propose an integrated digital solution for your project.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="calendly-inline-widget" data-url="https://calendly.com/indexo-us/30min" style="min-width:320px;height:700px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-title mb-40 text-center">
                        <h2>They trust us.</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/storage-containers.svg') }}" width="125" height="100" alt="indexo client EVANS Storage Containers LLC">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/youngyoung.svg') }}" width="125" height="100" alt="indexo client Young & Young">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/charted-course.svg') }}" width="125" height="100" alt="indexo client Charted Course LLC">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/measuretwice.svg') }}" width="125" height="100" alt="indexo client Measure Twice">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/sandra-aguilar.svg') }}" width="125" height="100" alt="indexo client Sandra Aguilar-Gomez">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/danae.svg') }}" width="125" height="100" alt="indexo client Danae Hernandez">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/mgroup.svg') }}" width="125" height="100" alt="indexo client M Brokers">
                </div>
                <div class="col-6 col-lg-3 text-center">
                    <img class="img-fluid" src="{{ asset('web/svg/clients/hialeah.svg') }}" width="125" height="100" alt="indexo client Hialeah Chakras">
                </div>
            </div>
        </div>
    </div>
    @include('web.includes.cta')
    <div class="testimonial-area pt-100 pt-sm-90">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h3>Our Client's reviews</h3>
                    </div>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-lg-4 d-flex align-items-end">
                    <div class="ds-sm-none">
                        <img class="img-fluid" src="{{ asset('web/svg/extras/reviews.svg') }}" alt="Reseñas indexo">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 mb-4 special-action-blank" data-target="https://www.designrush.com/agency/profile/indexo#reviews">
                            <div class="testimonial-single">
                                <div class="testimonial-info">
                                    <div class="testimonial-thumb">
                                        <img src="https://media.designrush.com/agency_reviews/453939/conversions/1516954879525-user-avatar.jpg" alt="Attorney /Owner at Young Law Corp">
                                    </div>
                                    <div class="testimonial-name">
                                        <h5>Tyler Young</h5>
                                        <span>Attorney /Owner at Young Law Corp</span>
                                        <div class="mt-2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>...indexo was great! They had great ideas and performed in a timely manner. Website looks great.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="testimonial-single special-action-blank" data-target="https://www.designrush.com/agency/profile/indexo#reviews">
                                <div class="testimonial-info">
                                    <div class="testimonial-thumb">
                                        <img src="https://media.designrush.com/agency_reviews/485821/conversions/1612972762042-user-avatar.jpg" alt="Director at MBrokers">
                                    </div>
                                    <div class="testimonial-name">
                                        <h5>Antonio Mendoza</h5>
                                        <span>Director at MBrokers</span>
                                        <div class="mt-2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>...I would recommend indexo to my network given the chance and would work with them in the future without a doubt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="testimonial-single special-action-blank" data-target="https://www.designrush.com/agency/profile/indexo#reviews">
                                <div class="testimonial-info">
                                    <div class="testimonial-thumb">
                                        <img src="https://media.designrush.com/agency_reviews/455759/conversions/1667409018952-user-avatar.jpg" alt="Researcher/Professor">
                                    </div>
                                    <div class="testimonial-name">
                                        <h5>Danae Hernandez</h5>
                                        <span>Researcher</span>
                                        <div class="mt-2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>.. They created my website in about 3 days, which is way faster than other companies I was looking at...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="testimonial-single special-action-blank" data-target="https://www.designrush.com/agency/profile/indexo#reviews">
                                <div class="testimonial-info">
                                    <div class="testimonial-thumb">
                                        <img src="https://media.designrush.com/agency_reviews/493375/conversions/1573319021299-user-avatar.jpg" alt="Owner at Measure Twice">
                                    </div>
                                    <div class="testimonial-name">
                                        <h5>Maria Paula Torres</h5>
                                        <span>Owner at Measure Twice</span>
                                        <div class="mt-2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>...Jesus is very knowledgeable and has a lot of interesting ideas that were very helpful for the creation of our website...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="testimonial-single special-action-blank" data-target="https://www.designrush.com/agency/profile/indexo#reviews">
                                <div class="testimonial-info">
                                    <div class="testimonial-thumb">
                                        <img src="https://media.designrush.com/agency_reviews/592506/conversions/1662923194349-user-avatar.jpg" alt="Researcher/Professor">
                                    </div>
                                    <div class="testimonial-name">
                                        <h5>Sandra Aguilar</h5>
                                        <span>Researcher/Professor</span>
                                        <div class="mt-2">
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half text-warning"></i>
                                        </div>                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>...I could not recommend Indexo enough. We worked together until I had the ideal academic website...</p>
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
    <script>
        let errorMessage = {{ $errors->count() ? 'true' : 'false' }};
        if (errorMessage) {
            let formElement = document.getElementById('connect');
            if (formElement) {
                formElement.scrollIntoView({ behavior: 'smooth' });
            }
        }
    </script>
@endsection
