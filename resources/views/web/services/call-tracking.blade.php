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
                    <h1>Call Tracking<br><small class="text-muted">in Colorado.</small></h1>
                    <h4 class="mb-3">Optimize customer interactions with our Colorado call tracking service.</h4>
                    <ul class="list-none list-sign">
                        <li>Assignment of Unique Numbers.</li>
                        <li>Call Analysis.</li>
                        <li>Call Recording.</li>
                        <li>Reports and Data Visualization.</li>
                    </ul>
                    <br>
                    <a id="download-quote-call-tracking" href="{{ asset('web/pricing/Call_Tracking_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Pricing
                    </a>
                </div>
                <div class="col-lg-6 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/services/call-tracking.svg') }}" alt="Call Tracking">
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
                        <h2>How does call tracking work?</h2>
                        <p class="mt-15">To understand call tracking, it is necessary to forget the concepts of traditional telephone infrastructure.</p>
                        <p>The virtual phone numbers we use in this service operate over the Internet, allowing effective communication in three simple steps:</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-single style-3">
                        <i class="ti-target"></i>
                        <div class="service-single-brief">
                            <h4>Tracking Number</h4>
                            <p>We provide you with a unique phone number, exclusive to your website.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-single style-3">
                        <i class="ti-mobile"></i>
                        <div class="service-single-brief">
                            <h4>Redirection Number</h4>
                            <p>You tell us the number to which you want calls from your website to be redirected.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-single style-3">
                        <i class="ti-stats-up"></i>
                        <div class="service-single-brief">
                            <h4>Statistics</h4>
                            <p>Consult in real time the history of received calls and missed calls.</p>
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
                        <h2>Call Tracking Process</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="process-single">
                        <img class="w-70" src="{{ asset('web/svg/extras/call-client.svg') }}" alt="Customer calls">
                        <h4 class="mt-3">Customer calls</h4>
                        <p class="px-2">The customer calls the tracking number that we assign you at indexo.</p>
                        <span>01</span>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="process-single">
                        <img class="w-70" src="{{ asset('web/svg/extras/call-desktop.svg') }}" alt="Website processes calls">
                        <h4 class="mt-3">Web Register</h4>
                        <p class="px-2">Your website receives, records, and redirects the call.</p>
                        <span>02</span>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="process-single">
                        <img class="w-70" src="{{ asset('web/svg/extras/call-you.svg') }}" alt="You receive the call">
                        <h4 class="mt-3">Received Call</h4>
                        <p class="px-2">You receive the call on the telephone number of your choice.</p>
                        <span>03</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mb-45">
                        <h2>Any Doubts?</h2>
                        <p class="mt-15">We know this concept might seem unusual, let us show you in <strong>real time</strong> how our tool works.</p>
                        <p>Give us a call and experience the instant update of your phone number in our records!</p>
                        <a href="tel:+1{{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}" class="btn-common mt-15 radius-50">Call</a>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center">
                    <div class="desktop-frame">
                        <div class="browser-window">
                            <div class="browser-header">
                                <div class="browser-buttons">
                                    <div class="browser-button close"></div>
                                    <div class="browser-button minimize"></div>
                                    <div class="browser-button maximize"></div>
                                </div>
                            </div>
                            <div class="table-container">
                                <div class="table-responsive">
                                    <table id="calls" class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Phone</th>
                                                <th>Datetime</th>
                                                <th>Status</th>
                                                <th>Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($calls as $call)
                                            <tr class="text-center">
                                                <td>{{ '*****' . substr($call->cli_number, -3) }}</td>
                                                <td>{{ setTimezone($call->start)->format($settings['call_tracking_date_format']->value. ' H:i:s')   }}</td>
                                                <td>
                                                    @if($call->dialstatus == 'ANSWER')
                                                        <i class="fa fa-check-circle-o text-success mr-1"></i><span class="call-status text-success">{{ __('calls.answered') }}</span>
                                                    @else
                                                        <i class="fa fa-times-circle-o text-danger mr-1"></i><span class="call-status text-danger">{{ __('calls.missed') }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ formatMinutesSeconds($call->duration_billed) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="desktop-brand"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-100 mt-sm-90 mb-sm-80 bg-primary">
        <div class="container">
            <div class="row height-380 align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="cta-text">
                        <h3>Gain full control of your calls today.</h3>
                        <p class="mt-25">Optimize, track, and convert calls into opportunities.</p>
                    </div>
                    <div class="cta-btn-2 mt-45">
                        <a href="{{ route('contact') }}" class="btn-common br-type text-white">Learn how</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3><span class="highlight web-hl">Call Tracking</span> FAQ's</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-55 mt-40">
                        <div class="col-lg-12">
                            <div id="accordionTwo">
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingSeven">
                                        <h5>
                                            <a href="#collapseSeven" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSeven">
                                                <span>What is Call Tracking?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>Call Tracking, also known as Call Tracking, is an advanced technology used to record and analyze incoming phone calls to a business or website. This technology allows for assigning unique phone numbers to different marketing sources, such as online ads, email campaigns, or social networks. When a potential customer makes a call to one of these numbers, the call tracking system records valuable data, such as the call duration and the dialed phone number.</p>
                                            <p>The basic operation of <strong>call tracking</strong> involves using specific phone numbers for each marketing source. When a customer makes a call to one of these numbers, the call tracking technology automatically identifies the source that generated the call. This allows businesses to know which marketing strategies are generating <strong>phone conversions</strong> and optimize their efforts accordingly.</p>
                                            <p>Call tracking not only provides valuable information about the effectiveness of marketing campaigns but also allows a better understanding of customer behavior and helps in making informed decisions to improve the marketing strategy.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingTen">
                                        <h5>
                                            <a href="#collapseTen" class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                <span>Are There Legal Issues with Call Tracking?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>No, Call Tracking is legal as long as it is used ethically and complies with data privacy regulations. It is important to obtain customer consent, as there is the possibility of recording calls, and it is necessary to ensure compliance with local and national privacy laws.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingEight">
                                        <h5>
                                            <a href="#collapseEight" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseEight">
                                                <span>What Kind of Information About Calls Can I Track and Analyze with the Call Tracking Service?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>With the Call Tracking service, you can track and analyze valuable information, such as the duration of the call, the originating phone number, the date and time of the call, and the recording of the conversation (if appropriate consent is obtained). This provides you with useful data to measure the effectiveness of your marketing campaigns and improve customer service in Colorado.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
