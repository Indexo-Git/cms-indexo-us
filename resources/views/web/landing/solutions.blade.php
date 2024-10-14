@extends('layouts.landing')

@section('schema')
    @include('web.includes.schema')
    <!-- Google tag (gtag.js) event - delayed navigation helper -->
    <script>
        // Helper function to delay opening a URL until a gtag event is sent.
        // Call it in response to an action that should navigate to a URL.
        function gtagSendEvent(url) {
            var callback = function () {
                if (typeof url === 'string') {
                    window.location = url;
                }
            };
            gtag('event', 'ads_conversion_Form_1', {
                'event_callback': callback,
                'event_timeout': 2000,
                // <event_parameters>
            });
            return false;
        }
    </script>
@endsection

@section('content')
    <div id="sticker" class="header-bottom stick d-none">
    </div>
    <div id="loader" class="d-none">
        <div class="container">
            <div class="row my-5">
                <div class="col text-center">
                    <i class="fa fa-spinner fa-spin text-primary fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
    <div id="intro" class="banner-area mt-100 py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div id="logo-landing" class="mb-5">
                        <svg id="text" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="283px" height="76px" version="1.1" style="geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 296.23 79.75" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="logo-gray" d="M9.6 75.59l0 -52.15c0,-0.07 0.01,-0.14 0.01,-0.21 0,-2.14 -1.77,-3.87 -3.95,-3.87 -2.17,0 -3.94,1.73 -3.94,3.87 0,0.07 0,0.14 0.01,0.21l0 52.15c-0.01,0.07 -0.01,0.14 -0.01,0.2 0,2.14 1.77,3.87 3.94,3.87 2.18,0 3.95,-1.73 3.95,-3.87 0,-0.06 -0.01,-0.13 -0.01,-0.2z"/><path class="logo-gray" d="M64.53 76.01l0 0c0,2.04 -1.66,3.69 -3.69,3.69 -2.04,0 -3.69,-1.65 -3.69,-3.69l-0.01 0 0 -32.38c0,-4.67 -1.72,-8.69 -5.14,-12.06 -3.42,-3.37 -7.4,-5.05 -11.97,-5.05 -4.64,0 -8.66,1.68 -12.08,5.05 -3.42,3.37 -5.13,7.39 -5.13,12.06l0 32.11c0,0.09 0.01,0.18 0.01,0.27 0,2.05 -1.66,3.71 -3.71,3.71 -2.05,0 -3.7,-1.66 -3.7,-3.71 0,-0.09 0,-0.18 0.01,-0.27l0 -31.33c0,-7.2 2.33,-13.18 7,-17.94 4.66,-4.77 10.53,-7.15 17.6,-7.15 7,0 12.83,2.38 17.5,7.15 4.67,4.76 7,10.74 7,17.94l0 31.6z"/><path class="logo-gray" d="M237.73 72.71c4.38,5.45 -3.19,9.43 -6.23,5.09l-15.21 -23.23 -15.09 23.23c-2.84,4.32 -10.1,0.55 -5.9,-4.88l16.3 -24.7 -16.49 -23.69c-2.68,-4.07 2.96,-8.26 5.97,-4.12l15.28 21.53 14.78 -21.54c2.89,-4.24 9.45,0.03 6.57,4.14l-16.79 23.86 16.81 24.31z"/><path class="logo-gray" d="M188.79 51.98l-44.84 0c0.61,5.83 3.09,10.64 7.43,14.44 4.34,3.8 9.46,5.66 15.36,5.6 9.15,-0.14 15.7,-4.38 19.63,-12.72 2.68,-6.72 10.03,-3.34 7.55,1.81 -2.53,5.25 -5.65,9.74 -10.3,13.04 -5.15,3.66 -10.88,5.53 -17.19,5.6 -7.93,0.13 -14.95,-2.77 -21.05,-8.7 -6.11,-5.93 -9.22,-13 -9.36,-21.21 -0.2,-8.68 2.86,-16.15 9.21,-22.43 6.34,-6.27 13.81,-9.17 22.42,-8.69 7.73,0.47 14.45,3.66 20.14,9.56 4.52,4.8 7.18,10.05 7.98,15.77 0.47,2.49 -0.49,7.97 -6.98,7.93zm-0.39 -7.12c-1.08,-5.43 -3.62,-9.82 -7.63,-13.17 -4,-3.36 -8.78,-5.07 -14.34,-5.14 -5.56,-0.07 -10.42,1.59 -14.59,4.98 -4.17,3.39 -6.8,7.83 -7.89,13.33l44.45 0z"/><path class="logo-gray" d="M129.91 49.39c0,8.33 -2.77,15.52 -8.93,21.58 -6.16,6.06 -13.4,8.95 -21.73,8.68 -8.05,-0.2 -14.87,-3.25 -20.46,-9.14 -5.58,-5.89 -8.37,-12.89 -8.37,-21.02 0,-8.46 3.01,-15.72 9.02,-21.77 6,-6.06 13.16,-8.96 21.47,-8.69 8.53,0.34 15.62,3.76 21.29,10.26l0 -25.44 0 0c0,-2.12 1.73,-3.85 3.86,-3.85 2.13,0 3.85,1.73 3.85,3.85l0 0 0 45.54zm-7.71 -0.61c-0.14,-6.12 -2.29,-11.35 -6.47,-15.7 -4.16,-4.35 -9.24,-6.53 -15.21,-6.53 -6.11,-0.07 -11.35,2.1 -15.72,6.48 -4.38,4.38 -6.6,9.66 -6.67,15.85 -0.07,6.11 1.97,11.48 6.11,16.06 4.13,4.59 9.19,6.99 15.16,7.2 6.38,0.33 11.83,-1.88 16.33,-6.64 4.52,-4.75 6.67,-10.34 6.47,-16.72z"/><circle class="logo-gray" cx="5.66" cy="5.96" r="5.66"/><path class="logo-gray" d="M296.23 49.46c0,8.29 -3.02,15.45 -9.06,21.49 -6.03,6.03 -13.19,8.92 -21.49,8.65 -8.02,-0.21 -14.81,-3.24 -20.38,-9.11 -5.56,-5.86 -8.34,-12.84 -8.34,-20.93 0,-8.43 3,-15.66 9,-21.7 6,-6.03 13.15,-8.91 21.44,-8.64 8.03,0.27 14.84,3.35 20.43,9.25 5.6,5.9 8.4,12.9 8.4,20.99zm-7.69 -0.61c-0.2,-6.1 -2.38,-11.31 -6.54,-15.64 -4.15,-4.33 -9.17,-6.51 -15.05,-6.51 -6.16,-0.07 -11.4,2.09 -15.71,6.46 -4.34,4.36 -6.53,9.62 -6.59,15.79 -0.14,6.09 1.85,11.43 5.98,16 4.11,4.57 9.15,6.96 15.1,7.16 6.36,0.34 11.79,-1.87 16.27,-6.61 4.5,-4.73 6.67,-10.29 6.54,-16.65z"/></svg>
                        <svg id="hand" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="91px" height="102px" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 71.14 87.26" xmlns:xlink="http://www.w3.org/1999/xlink"><path class="logo-blue" d="M41.68 10.56l0.03 11.32c3.54,0.13 6.63,2.07 8.35,4.93 0.33,-0.03 0.67,-0.05 1.01,-0.05 3.72,-0.01 6.98,1.97 8.77,4.95 0.34,-0.04 0.69,-0.06 1.05,-0.06 5.62,-0.01 10.19,4.53 10.21,10.16 0.01,5.61 0.03,11.22 0.04,16.83 0.04,15.76 -12.7,28.58 -28.47,28.62 -8.1,0.02 -15.77,-3.36 -21.21,-9.36 -0.54,-0.6 -1.05,-1.21 -1.54,-1.85l-16.74 -20.18c-0.18,-0.16 -0.35,-0.33 -0.51,-0.5 -3.72,-3.94 -3.4,-9.81 0.01,-13.83 0.93,-1.09 2.08,-1.96 3.4,-2.53 4.81,-2.1 10.36,0.17 15.32,3.31l-0.08 -31.71c-0.01,-0.13 -0.01,-0.26 -0.01,-0.39 -0.02,-5.63 4.53,-10.21 10.16,-10.22 5.63,-0.01 10.2,4.54 10.22,10.16 0,0.14 0,0.27 -0.01,0.4zm-10.2 -5.27c2.71,-0.01 4.91,2.18 4.92,4.89 0,0.09 0,0.18 -0.01,0.27l0.06 21.08c0.27,-2.45 2.34,-4.36 4.86,-4.37 2.71,-0.01 4.91,2.18 4.92,4.89 0,0.09 0,0.19 -0.01,0.28l0.01 3.98c0.31,-2.4 2.36,-4.26 4.85,-4.27 2.71,0 4.91,2.19 4.92,4.9 0,0.09 0,0.18 -0.01,0.27 0.01,1.1 0.02,3.12 0.02,4.09 0.01,0.81 -0.02,0.53 0.03,0.01 0.27,-2.45 2.34,-4.37 4.86,-4.37 2.7,-0.01 4.9,2.18 4.91,4.88 0.01,5.61 0.03,11.22 0.04,16.84 0.04,12.84 -10.35,23.28 -23.19,23.31 -6.85,0.02 -13.01,-2.92 -17.28,-7.62 -0.46,-0.52 -0.9,-1.04 -1.32,-1.59l-17.08 -20.59c-0.16,-0.13 -0.32,-0.27 -0.47,-0.43 -1.81,-1.92 -1.51,-4.76 0.2,-6.78 4.31,-5.07 15.29,4.18 20,7.81l-0.11 -42.29c0,-0.09 -0.01,-0.18 -0.01,-0.28 0,-2.7 2.19,-4.91 4.89,-4.91z"/></svg>
                    </div>
                    <h2 class="animate__animated animate__fadeIn">Let's prioritize your needs</h2>
                    <h5 class="animate__animated animate__fadeIn mt-3 mb-5">And give us a chance to show off our programming and design skills.</h5>
                    <div class="banner-action animate__animated animate__fadeIn animate__delay-2s">
                        <button onclick="showFirstStep()" class="btn-common btn-common-2 radius-50 mr-20">Let's go</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.includes.landing.step', [
        'id' => 'firstStep',
        'number' => '01',
        'title' => 'Digital Needs.',
        'question' => 'What is the main goal of your website or application?',
        'image1file' => 'vender',
        'image1name' => 'Sell Online',
        'image2file' => 'leads',
        'image2name' => 'Generate Leads',
        'image3file' => 'info',
        'image3name' => 'Provide Information',
        'image4file' => 'community',
        'image4name' => 'Foster Community',
        'answer1' => 'A site designed to facilitate transactions and online sales.',
        'answer2' => 'A site focused on capturing and converting visitors into clients.',
        'answer3' => 'A site that offers valuable and educational content to your visitors.',
        'answer4' => 'A site that fosters interaction and engagement among users.',
    ])
    @include('web.includes.landing.step', [
        'id' => 'secondStep',
        'number' => '02',
        'title' => 'Selection Criteria.',
        'question' => 'What concerns do you have when choosing a web agency?',
        'image1file' => 'costos',
        'image1name' => 'Costs',
        'image2file' => 'tiempo',
        'image2name' => 'Delivery Times',
        'image3file' => 'communication',
        'image3name' => 'Communication',
        'image4file' => 'resenas',
        'image4name' => 'Experience',
        'answer1' => 'Ensuring justified costs without compromising project quality.',
        'answer2' => 'Importance of meeting the agreed project deadlines.',
        'answer3' => 'The need for clear communication and efficient management.',
        'answer4' => 'Recognition  of the agency\'s track record and credibility.',
    ])
    @include('web.includes.landing.step', [
        'id' => 'thirdStep',
        'number' => '03',
        'title' => 'Elements of Excellence.',
        'question' => 'What qualities must your website have to meet your expectations?',
        'image1file' => 'personalizacion',
        'image1name' => 'Attractive Design',
        'image2file' => 'velocidad',
        'image2name' => 'Loading Speed',
        'image3file' => 'seo-check',
        'image3name' => 'SEO Optimization',
        'image4file' => 'stats',
        'image4name' => 'Measurable Impact',
        'answer1' => 'A visually appealing site aligned with your brand.',
        'answer2' => 'A site that loads quickly to enhance user experience.',
        'answer3' => 'A site optimized to appear in top search results.',
        'answer4' => 'A site that offers clear and measurable performance metrics.',
    ])
    @include('web.includes.landing.step', [
        'id' => 'fourthStep',
        'number' => '04',
        'title' => 'Support and Future Growth.',
        'question' => 'What do you expect from post-development support for your website?',
        'image1file' => 'soporte',
        'image1name' => 'Support',
        'image2file' => 'updates',
        'image2name' => 'Maintenance',
        'image3file' => 'escalabilidad',
        'image3name' => 'Scalability',
        'image4file' => 'autonomia',
        'image4name' => 'Autonomy',
        'answer1' => 'Availability of technical assistance and support when needed.',
        'answer2' => 'Periodic updates and improvements to keep the site operational.',
        'answer3' => 'Ability of the site to grow and adapt to new needs.',
        'answer4' => 'Ease for you to manage and update the site yourself.',
    ])
    <div id="fifthStep" class="animate__animated section-title mt-md-4 py-3 py-md-5 pt-sm-40 pb-sm-10 d-none">
        <div class="container">
            <div class="row mt-50">
                <div class="col-lg-5 d-flex align-items-end">
                    <img class="img-fluid" src="{{ asset('web/svg/extras/reviews.svg') }}" alt="Reseñas indexo">
                </div>
                <div class="col-lg-7">
                    <h3>You have completed the test!</h3>
                    <p>If you would like to receive a detailed report with our personalized recommendations, please enter your email address below.</p>
                    <form id="solutions" method="post" action="{{ route('post-solutions') }}">
                        @csrf
                        <div class="subscribe-form style-3 my-5">
                            <label for="email" class="sr-only"></label>
                            <input id="email" type="email" placeholder="Email" name="email">
                            <button type="submit">Receive Report</button>
                        </div>
                        <button type="submit" class="btn-common btn-white radius-50">No, Thanks</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="progress" class="d-none">
        <div class="container">
            <hr>
            <div class="row my-3 my-md-5">
                <div id="progress-bar-container" class="col-6 col-md-9">
                    <div class="progress mt-4">
                        <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div id="progress-button-container" class="col-6 col-md-3">
                    <button id="progressButton" class="btn-common btn-progress radius-50 btn-block disabled">Next <i class="fa fa-angle-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div id="sixthStep" class="animate__animated section-title mt-md-4 py-3 pt-sm-40 pb-sm-10 d-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-4">What is the benefit of working with indexo <span class="text-primary">according to your responses</span>?</h3>
                    <div class="accordion" id="accordionResult">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    1.- Goals.
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionResult">
                                <div class="card-body">
                                    <p id="answer-01-01" class="d-none">{!! $answers['01-01'] !!}</p>
                                    <p id="answer-01-02" class="d-none">{!! $answers['01-02'] !!}</p>
                                    <p id="answer-01-03" class="d-none">{!! $answers['01-03'] !!}</p>
                                    <p id="answer-01-04" class="d-none mb-0">{!! $answers['01-04'] !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2.- Considerations.
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionResult">
                                <div class="card-body">
                                    <p id="answer-02-01" class="d-none">{!! $answers['02-01'] !!}</p>
                                    <p id="answer-02-02" class="d-none">{!! $answers['02-02'] !!}</p>
                                    <p id="answer-02-03" class="d-none">{!! $answers['02-03'] !!}</p>
                                    <p id="answer-02-04" class="d-none mb-0">{!! $answers['02-04'] !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3.- Qualities.
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionResult">
                                <div class="card-body">
                                    <p id="answer-03-01" class="d-none">{!! $answers['03-01'] !!}</p>
                                    <p id="answer-03-02" class="d-none">{!! $answers['03-02'] !!}</p>
                                    <p id="answer-03-03" class="d-none">{!! $answers['03-03'] !!}</p>
                                    <p id="answer-03-04" class="d-none mb-0">{!! $answers['03-04'] !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    4.- Expectations.
                                </button>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionResult">
                                <div class="card-body">
                                    <p id="answer-04-01" class="d-none">{!! $answers['04-01'] !!}</p>
                                    <p id="answer-04-02" class="d-none">{!! $answers['04-02'] !!}</p>
                                    <p id="answer-04-03" class="d-none">{!! $answers['04-03'] !!}</p>
                                    <p id="answer-04-04" class="d-none mb-0">{!! $answers['04-04'] !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-50 mb-5">
                <div class="col-xl-4 col-6 offset-3 offset-lg-0 text-center order-2 order-lg-1">
                    <picture>
                        <source type="image/webp" srcset="{{ asset('web/webp/design-rush.webp') }}">
                        <img src="{{ asset('web/images/design-rush.png') }}" alt="Design Rush">
                    </picture>
                    <br>
                    <a href="https://www.designrush.com/agency/profile/indexo" target="_blank" title="Ver perfil DesignRush" class="small">Agency Verified by <br>DesignRush</a>
                </div>
                <div class="col-xl-8 order-1 order-lg-2">
                    <div class="row testimonial-carousel" data-slick='{"slidesToShow": 2}'>
                        <div class="col-lg-6">
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
                                    <p>"indexo was great! They had great ideas and performed in a timely manner. Website looks great.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-single">
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
                                    <p>"...I would recommend indexo to my network given the chance and would work with them in the future without a doubt.”</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-single">
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
                                    <p>"Jesus is very knowledgeable and has a lot of interesting ideas that were very helpful for the creation of our website...”</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-single">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="testimonial-desc">
                                    <p>"...I could not recommend Indexo enough. We worked together until I had the ideal academic website...”</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="testimonial-single">
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
                                    <p>".. They created my website in about 3 days, which is way faster than other companies I was looking at...”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5 mt-lg-0">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <a id="landing-call" href="https://calendly.com/indexo-us/30min" target="_blank" class="btn-common btn-common-2 radius-50 mb-3 btn-block">
                        <i class="fa fa-calendar mr-1"></i> Free Consultation
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a id="landing-call" href="tel:+52{{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}" class="btn-common btn-common-2 radius-50 mb-3 btn-block">
                        <i class="fa fa-phone mr-1"></i> {{ $settings['phone']->value }}
                    </a>
                </div>
                <div class="col-12 col-lg-4">
                    <a id="landing-call" href="{{ route('contact') }}" class="btn-common btn-common-2 radius-50 mb-3 btn-block">
                        <i class="fa fa-envelope mr-1"></i> Contact us
                    </a>
                </div>
            </div>
        </div>
        <div class="container mt-5 mt-lg-0">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ route('index') }}" class="small">Continue exploring our site</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'solutions'])
    <script>
        let intro = document.getElementById('intro');
        let firstStep = document.getElementById('firstStep');
        let secondStep = document.getElementById('secondStep');
        let thirdStep = document.getElementById('thirdStep');
        let fourthStep = document.getElementById('fourthStep');
        let fifthStep = document.getElementById('fifthStep');
        let sixthStep = document.getElementById('sixthStep');
        let progress = document.getElementById('progress');
        let progressBar = document.getElementById('progressBar');
        let progressButton = document.getElementById('progressButton');
        let progressBarContainer = document.getElementById('progress-bar-container');
        let progressButtonContainer = document.getElementById('progress-button-container');

        //let loader = document.querySelector('#loader');

        let currentStepIndex = 0;
        let steps = [firstStep, secondStep, thirdStep, fourthStep];

        const landingButtons = document.querySelectorAll('.landing-button');

        // Add click event listener to each button
        landingButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });

        function showFirstStep() {
            intro.classList.add('animate__animated', 'animate__fadeOutUp');
            setTimeout(function() {
                intro.remove();
                firstStep.classList.add('animate__animated', 'animate__fadeIn');
                firstStep.classList.remove('d-none');
                progress.classList.add('animate__animated', 'animate__fadeIn','animate__delay-2s');
                progress.classList.remove('d-none');
            }, 1000);
        }

        function setupButtonToggle(container) {
            container.addEventListener('click', function(event) {
                let target = event.target;
                while (target !== container && !target.classList.contains('landing-button')) {
                    target = target.parentNode;
                }
                if (target.classList.contains('landing-button')) {
                    let hasSelected = Array.from(container.querySelectorAll('.landing-button'))
                        .some(btn => btn.classList.contains('selected'));
                    if (hasSelected) {
                        progressButton.classList.remove('disabled');
                    } else {
                        progressButton.classList.add('disabled');
                    }
                }
            });
        }

        setupButtonToggle(firstStep);
        setupButtonToggle(secondStep);
        setupButtonToggle(thirdStep);
        setupButtonToggle(fourthStep);

        progressButton.addEventListener('click', function() {
            if (!this.classList.contains('disabled')) {
                steps[currentStepIndex].classList.add('animate__animated', 'animate__fadeOutLeft');
                goToStep(currentStepIndex + 1); // Go to the next step
            }
        });

        function goToStep(stepIndex) {
            if (stepIndex < 0 || stepIndex >= steps.length) {
                if(stepIndex == 4){
                    steps.forEach(step => step.classList.add('d-none'));
                    finishForm(stepIndex);
                }
                return; // Prevent going to an undefined step
            }
            setTimeout(function() {
                // Hide all steps
                steps.forEach(step => step.classList.add('d-none'));
                // Show the targeted step
                steps[stepIndex].classList.remove('d-none');
                steps[stepIndex].classList.add('animate__animated', 'animate__fadeInRight');
                currentStepIndex = stepIndex; // Update the current step index
                progressButton.classList.add('disabled');
                updateProgressBar(currentStepIndex);
            }, 500);
        }

        function updateProgressBar(stepIndex) {
            const percentage = (stepIndex / steps.length) * 100;
            progressBar.style.width = `${percentage}%`;
            progressBar.setAttribute('aria-valuenow', percentage);
        }

        function finishForm(stepIndex){
            updateProgressBar(stepIndex);
            fifthStep.classList.remove('d-none');
            fifthStep.classList.add('animate__animated', 'animate__fadeInRight');
            progressBarContainer.classList.remove('col-6','col-md-9');
            progressBarContainer.classList.add('col-12');
            progressButtonContainer.classList.add('animate__animated', 'animate__fadeOutDown');
            progressButtonContainer.classList.add('d-none');
            progress.classList.add('animate__animated', 'animate__fadeOutDown','animate__delay-4s');
        }

        const form = document.getElementById('solutions');

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent normal form submission

            // Collect selected button values
            const selectedValues = Array.from(document.querySelectorAll('.landing-button.selected'))
                .map(button => button.dataset.value);

            // Collect email
            const email = document.getElementById('email').value;

            // Prepare data to be sent
            const formData = new FormData(this);  // 'this' refers to the form, includes CSRF token
            formData.append('email', email);  // Append the email again just to ensure it's set
            selectedValues.forEach(value => {
                formData.append('selectedValues[]', value); // Notice the brackets indicating an array
            });
            console.log(formData); // If you're using FormData
            console.log({ email: email, selectedValues: selectedValues });
            // Perform the AJAX request
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // To handle as AJAX in Laravel
                }
            }).then(response => response.json())
                .then(data => {
                    console.log(data); // Handle the response data
                    console.log('check responses', selectedValues);
                    selectedValues.forEach(value => {
                        document.getElementById('answer-' + value).classList.remove('d-none');
                    });
                    fifthStep.classList.add('animate__animated', 'animate__fadeOutLeft', 'd-none');
                    sixthStep.classList.remove('d-none');
                    sixthStep.classList.add('animate__animated', 'animate__fadeInRight');

                })
                .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
