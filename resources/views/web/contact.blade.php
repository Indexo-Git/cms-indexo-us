@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    <div class="banner-area py-140 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption mb-4">
                <div class="col text-center">
                    <h1>What caught your attention?</h1>
                    <h5 class="text-muted">If you have any questions about our digital solutions, do not hesitate to contact us.</h5>
                </div>
            </div>
            <div class="row banner-caption align-items-center text-lg-left">
                <div class="col-lg-6">
                    <div class="contact-form style-2 mt-3">
                        <form id="contact" method="POST" action="{{ route('contact-message') }}">
                            @csrf
                            @if(Session::has('message'))
                                <div class="alert alert-success mb-3">{{ Session::get('message') }}</div>
                            @endif
                            @include('includes.errors.g-token')
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Full Name*" value="{{ old('name') }}" required autocomplete="off">
                                @error('name')
                                <div class="form-control-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="email" class="sr-only">Email</label>
                                        <input id="email" name="email" type="text" class="form-control" placeholder="E-mail*" value="{{ old('email') }}" required autocomplete="off">
                                        @error('email')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="phone" class="sr-only">Phone</label>
                                        <input id="phone" name="phone" type="text" class="form-control" placeholder="Phone*" required maxlength="10" value="{{ old('phone') }}" minlength="7" autocomplete="off">
                                        @error('phone')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <lable for="subject" class="sr-only">Subject</lable>
                                <select id="subject" class="form-control" name="subject" required>
                                    <option disabled selected>What are we going to talk about?</option>
                                    @foreach($services as $service)
                                        <option>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject')
                                    <div class="form-control-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="message" class="sr-only">Message</label>
                                <textarea id="message" name="message" class="form-control" placeholder="How can we help?" required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="form-control-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn-common btn-common-2 mt-25">Enviar</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mt-sm-60 text-center">
                    <div class="calendly-inline-widget" data-url="https://calendly.com/indexo-us/30min" style="min-width:320px;height:700px;"></div>
                    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
                </div>
            </div>
            <div class="row mt-5 py-5">
                <div class="col-lg-5">
                    <div class="customer-supporter">
                        <div class="section-title">
                            <h3>Contact us</h3>
                        </div>
                        <div class="single-supporter mt-35">
                            <div class="row">
                                <div class="col-6 col-md-5">
                                    <picture>
                                        <source srcset="{{ asset('web/webp/team/erika.webp') }}" type="image/webp">
                                        <img src="{{ asset('web/images/team/erika.jpg') }}" class="img-thumbnail" alt="Erika Whitesides">
                                    </picture>
                                </div>
                                <div class="col-6 col-md-7">
                                    <div class="supporter-desc">
                                        <h3>Erika W.</h3>
                                        <p>UX Design</p>
                                        <p><a href="tel:{{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}">{{ $settings['phone']->value }}</a></p>
                                        <p><a href="mailto:erika@indexo.us">erika@indexo.us</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-supporter mt-65">
                            <div class="row">
                                <div class="col-6 col-md-5">
                                    <picture>
                                        <source srcset="{{ asset('web/webp/team/jesus.webp') }}" type="image/webp">
                                        <img src="{{ asset('web/images/team/jesus.jpg') }}" class="img-thumbnail" alt="Jesús Vergara">
                                    </picture>
                                </div>
                                <div class="col-6 col-md-7">
                                    <div class="supporter-desc">
                                        <h3>Jesus Vergara</h3>
                                        <p>Web Development</p>
                                        <p><a href="tel:{{ preg_replace('/[^0-9]/', '', $settings['phone']->value) }}">{{ $settings['phone']->value }}</a></p>
                                        <p><a href="mailto:jesus@indexo.us">jesus@indexo.us</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-sm-80">
                    <div id="googleMap" class="google-map" style="height: 500px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7XWCUV0bPSBM9L1dWXeu1K90l3xUIL_g"></script>
    <script>
        (function ($) {
            "use strict";
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var mapOptions = {
                    zoom: 12,
                    scrollwheel: true,
                    center: new google.maps.LatLng(39.7700285, -105.0786969), // New York
                    styles:
                        [
                            {
                                "featureType": "all",
                                "elementType": "labels.text.fill",
                                "stylers": [
                                    {
                                        "saturation": 36
                                    },
                                    {
                                        "color": "#333333"
                                    },
                                    {
                                        "lightness": 40
                                    }
                                ]
                            },
                            {
                                "featureType": "all",
                                "elementType": "labels.text.stroke",
                                "stylers": [
                                    {
                                        "visibility": "on"
                                    },
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "featureType": "all",
                                "elementType": "labels.icon",
                                "stylers": [
                                    {
                                        "visibility": "off"
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#fefefe"
                                    },
                                    {
                                        "lightness": 17
                                    },
                                    {
                                        "weight": 1.2
                                    }
                                ]
                            },
                            {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 20
                                    }
                                ]
                            },
                            {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f5f5f5"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#dedede"
                                    },
                                    {
                                        "lightness": 21
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            },
                            {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 29
                                    },
                                    {
                                        "weight": 0.2
                                    }
                                ]
                            },
                            {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 18
                                    }
                                ]
                            },
                            {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#ffffff"
                                    },
                                    {
                                        "lightness": 16
                                    }
                                ]
                            },
                            {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#f2f2f2"
                                    },
                                    {
                                        "lightness": 19
                                    }
                                ]
                            },
                            {
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [
                                    {
                                        "color": "#e9e9e9"
                                    },
                                    {
                                        "lightness": 17
                                    }
                                ]
                            }
                        ]
                };
                var mapElement = document.getElementById('googleMap');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(39.7700285, -105.0786969),
                    map: map
                });
            }
        })(jQuery);
    </script>
    @include('includes.google-recaptcha', ['form' => 'contact'])
@endsection
