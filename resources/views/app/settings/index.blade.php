@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrapv5-colorpicker/css/bootstrap-colorpicker.css') }}">
@endsection

@section('content')
    <form class="action-buttons-fixed" action="{{ route('update-setting') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="tabs-modern row" style="min-height: 490px;">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <div class="nav flex-column" id="tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" href="#general" role="tab" aria-controls="general" aria-selected="true"><i class="bx bx-cog me-2"></i> {{ __('settings.general') }}</a>
                                    <a class="nav-link" id="schema-tab" data-bs-toggle="pill" data-bs-target="#schema" href="#schema" role="tab" aria-controls="schema" aria-selected="false"><i class="bx bx-block me-2"></i> Schema.org</a>
                                    <a class="nav-link" id="google-tab" data-bs-toggle="pill" data-bs-target="#google" href="#google" role="tab" aria-controls="google" aria-selected="false"><i class="bx bxl-google me-2"></i> Google</a>
                                    <a class="nav-link" id="seo-tab" data-bs-toggle="pill" data-bs-target="#seo" href="#seo" role="tab" aria-controls="seo" aria-selected="false"><i class="bx bx-search me-2"></i> {{ __('seo.search-engine-optimization') }}</a>
                                    <a class="nav-link" id="design-tab" data-bs-toggle="pill" data-bs-target="#design" href="#design" role="tab" aria-controls="design" aria-selected="false"><i class="bx bx-palette me-2"></i> {{ __('settings.design') }}</a>
                                    <a class="nav-link" id="share-tab" data-bs-toggle="pill" data-bs-target="#share" href="#share" role="tab" aria-controls="design" aria-selected="false"><i class="bx bx-share-alt me-2"></i> {{ __('settings.social-media') }}</a>
                                    <a class="nav-link" id="shop-tab" data-bs-toggle="pill" data-bs-target="#shop" href="#shop" role="tab" aria-controls="shop" aria-selected="false"><i class="bx bx-cart me-2"></i> {{ __('settings.shop') }}</a>
                                    <a class="nav-link" id="shipping-tab" data-bs-toggle="pill" data-bs-target="#shipping" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false"><i class="bx bxs-truck me-2"></i> {{ __('settings.shipping') }}</a>
                                    <a class="nav-link" id="call-tracking-tab" data-bs-toggle="pill" data-bs-target="#call-tracking" href="#shop" role="tab" aria-controls="call-tracking" aria-selected="false"><i class="bx bx-phone me-2"></i> {{ __('settings.call-tracking') }}</a>
                                </div>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        @include('app.includes.forms.text', ['label' => __('settings.website-name'), 'required' => false, 'input' => 'website_name', 'value' => $settings['website_name']->value, 'placeholder' => env('APP_NAME', 'indexo Shop'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.contact-email'), 'required' => false, 'input' => 'email', 'value' => $settings['email']->value, 'placeholder' => __('words.contact').'@'.Request::getHost(), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.contact-phone'), 'required' => false, 'input' => 'phone', 'value' => $settings['phone']->value, 'placeholder' => __('settings.contact-phone'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('words.address'), 'required' => false, 'input' => 'address', 'value' => $settings['address']->value, 'placeholder' => __('words.address'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('words.city'), 'required' => false, 'input' => 'city', 'value' => $settings['city']->value, 'placeholder' => __('words.city'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('words.state'), 'required' => false, 'input' => 'region', 'value' => $settings['region']->value, 'placeholder' => __('words.state'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('words.postal-code'), 'required' => false, 'input' => 'postal_code', 'value' => $settings['postal_code']->value, 'placeholder' => __('words.postal-code'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.maintenance-heading'), 'required' => false, 'input' => 'maintenance_heading', 'value' => $settings['maintenance_heading']->value, 'placeholder' => __('settings.maintenance-heading'), 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="schema" role="tabpanel" aria-labelledby="schema-tab">
                                        <div class="form-group row align-items-center pb-3">
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('forms.visit-website') }}</label>
                                            <div class="col-lg-7 col-xl-6">
                                                <a href="https://schema.org/" target="_blank">Schema.org</a>
                                            </div>
                                        </div>
                                        @include('app.includes.forms.text', ['label' => __('settings.schema_type'), 'required' => false, 'input' => 'schema_type', 'value' => $settings['schema_type']->value, 'placeholder' => __('settings.schema_type'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.price_currency'), 'required' => false, 'input' => 'priceCurrency', 'value' => $settings['priceCurrency']->value, 'placeholder' => __('settings.price_currency'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.address_country'), 'required' => false, 'input' => 'addressCountry', 'value' => $settings['addressCountry']->value, 'placeholder' => __('settings.address_country'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.price_range'), 'required' => false, 'input' => 'priceRange', 'value' => $settings['priceRange']->value, 'placeholder' => __('settings.price_range'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.opening_hours'), 'required' => false, 'input' => 'openingHours', 'value' => $settings['openingHours']->value, 'placeholder' => __('settings.opening_hours'), 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="google" role="tabpanel" aria-labelledby="google-tab">
                                        @include('app.includes.forms.textarea', ['label' => 'Analytics Tag', 'required' => false, 'input' => 'google_analytics', 'value' => $settings['google_analytics']->value, 'placeholder' => '<!-- Global site tag (gtag.js) - Google Analytics -->', 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                                        @include('app.includes.forms.text', ['label' => __('settings.meta-title-min'), 'required' => true, 'input' => 'meta_title_min_length',  'value' => $settings['meta_title_min_length']->value, 'placeholder' => $settings['meta_title_min_length']->value, 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.meta-title-max'), 'required' => true, 'input' => 'meta_title_max_length',  'value' => $settings['meta_title_max_length']->value, 'placeholder' => $settings['meta_title_max_length']->value, 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.meta-description-min'), 'required' => true, 'input' => 'meta_description_min_length',  'value' => $settings['meta_description_min_length']->value, 'placeholder' => $settings['meta_description_min_length']->value, 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.meta-description-max'), 'required' => true, 'input' => 'meta_description_max_length',  'value' => $settings['meta_description_max_length']->value, 'placeholder' => $settings['meta_description_max_length']->value, 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="design" role="tabpanel" aria-labelledby="design-tab">
                                        @include('app.includes.forms.image', [
                                            'label' => __('words.logo'),
                                            'required' => false,
                                            'input' => 'logo',
                                            'paddingBottom' => true,
                                            'previewFile' => false,
                                            'previewPath' => '',
                                            'showDelete' => false
                                        ])
                                        @include('app.includes.forms.select', ['label' => __('words.format'), 'required' => false, 'input' => 'format_logo', 'paddingBottom' => true, 'options' => [
                                            'svg' => 'SVG',
                                            'png' => 'PNG',
                                            'jpg' => 'JPG'
                                        ], 'conditionSelected' => $settings['format_logo']->value])
                                        @include('app.includes.forms.image', [
                                                    'label' => 'Favicon',
                                                    'required' => false,
                                                    'input' => 'favicon',
                                                    'paddingBottom' => true,
                                                    'previewFile' => false,
                                                    'previewPath' => '',
                                                    'showDelete' => false
                                        ])
                                        @include('app.includes.forms.colorpicker', ['label' => __('settings.color-primary'), 'required' => false, 'input' => 'color_primary', 'value' => $settings['color_primary']->value, 'paddingBottom' => true])
                                        @include('app.includes.forms.select', ['label' => __('words.font'), 'required' => false, 'input' => 'font', 'paddingBottom' => true, 'options' => [
                                           'Lato' => 'Lato',
                                           'Mulish' => 'Mulish',
                                           'Poppins' => 'Poppins',
                                           'Rubik' => 'Rubik',
                                           'Merriweather' => 'Merriweather',
                                           'Alatsi' => 'Alatsi'
                                        ], 'conditionSelected' => $settings['font']->value])
                                        @include('app.includes.forms.textarea', ['label' => __('settings.custom-css'), 'required' => false, 'input' => 'custom_css', 'value' => $settings['custom_css']->value, 'placeholder' => '/* Custom css rules */', 'paddingBottom' => true])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.top-bar'), 'input' => 'top_bar', 'checked' => $settings['top_bar']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.top-bar-content'), 'required' => false, 'input' => 'content_top_bar', 'value' => $settings['content_top_bar']->value, 'placeholder' => '', 'paddingBottom' => false, 'help' => 'Lorem ipsum <strong>50%</strong> <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ms-2">Read more</a> <span class="opacity-6 text-1">* Lorem ipsum dor met.</span>'])
                                    </div>
                                    <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">
                                        @include('app.includes.forms.text', ['label' => 'Facebook', 'required' => false, 'input' => 'facebook', 'value' => $settings['facebook']->value, 'placeholder' => Request::getHost(), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => 'Instagram', 'required' => false, 'input' => 'instagram', 'value' => $settings['instagram']->value, 'placeholder' => Request::getHost(), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => 'Twitter', 'required' => false, 'input' => 'twitter', 'value' => $settings['twitter']->value, 'placeholder' => Request::getHost(), 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.activate-shop'), 'input' => 'shop_active', 'checked' => $settings['shop_active']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.activate-payments'), 'input' => 'payment_active', 'checked' => $settings['payment_active']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.activate-blog'), 'input' => 'blog_active', 'checked' => $settings['blog_active']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.activate-portfolio'), 'input' => 'portfolio_active', 'checked' => $settings['portfolio_active']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => 'Mercadopago', 'required' => false, 'input' => 'mercadopago', 'value' => $settings['mercadopago']->value, 'placeholder' => 'true', 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => 'Open Pay', 'required' => false, 'input' => 'openpay', 'value' => $settings['openpay']->value, 'placeholder' => 'true', 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.top-bar-content'), 'required' => false, 'input' => 'content_top_bar', 'value' => $settings['content_top_bar']->value, 'placeholder' => '', 'paddingBottom' => false, 'help' => 'Lorem ipsum <strong>50%</strong> <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ms-2">Read more</a> <span class="opacity-6 text-1">* Lorem ipsum dor met.</span>'])
                                    </div>
                                    <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.activate-shipping'), 'input' => 'shipping_active', 'checked' => $settings['shipping_active']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.shipping-length-unity'), 'required' => false, 'input' => 'shipping_length_unity', 'value' => $settings['shipping_length_unity']->value, 'placeholder' => __('settings.shipping-length-unity'), 'paddingBottom' => true])
                                        @include('app.includes.forms.text', ['label' => __('settings.shipping-weight-unity'), 'required' => false, 'input' => 'shipping_weight_unity', 'value' => $settings['shipping_weight_unity']->value, 'placeholder' => __('settings.shipping-weight-unity'), 'paddingBottom' => false])
                                    </div>
                                    <div class="tab-pane fade" id="call-tracking" role="tabpanel" aria-labelledby="call-tracking-tab">
                                        @include('app.includes.forms.select', ['label' => __('settings.call-tracking-country'), 'required' => false, 'input' => 'call_tracking_country', 'paddingBottom' => true, 'options' => $countries, 'conditionSelected' => $settings['call_tracking_country']->value])
                                        @include('app.includes.forms.select2', ['label' => __('settings.call-tracking-timezone'), 'required' => false, 'input' => 'call_tracking_timezone', 'paddingBottom' => true, 'options' => $timezones, 'conditionSelected' => $settings['call_tracking_timezone']->value])
                                        @include('app.includes.forms.text', ['label' => __('settings.call-tracking-date-format'), 'required' => false, 'input' => 'call_tracking_date_format', 'value' => $settings['call_tracking_date_format']->value, 'placeholder' => __('settings.call-tracking-date-format'), 'paddingBottom' => true])
                                        @include('app.includes.forms.select2', ['label' => __('settings.call-tracking-locale'), 'required' => false, 'input' => 'call_tracking_locale', 'paddingBottom' => true, 'options' => $locales, 'conditionSelected' => $settings['call_tracking_locale']->value])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.call-tracking-record-calls'), 'input' => 'call_tracking_record_calls', 'checked' => $settings['call_tracking_record_calls']->value == 'on', 'paddingBottom' => true])
                                        @include('app.includes.forms.toggle-switch', ['label' => __('settings.call-tracking-sms-alerts'), 'input' => 'call_tracking_sms_alerts', 'checked' => $settings['call_tracking_sms_alerts']->value == 'on', 'paddingBottom' => false])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="card card-collapsed">
                    <header class="card-header">
                        <div class="card-actions">
                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        </div>
                        <h2 class="card-title">{{ __('settings.records') }}</h2>
                    </header>
                    <div class="card-body">
                        <table class="table table-responsive-md mb-0">
                            <thead>
                            <tr>
                                <th>{{ __('settings.name') }}</th>
                                <th>{{ __('settings.value') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settingsDB as $setting)
                                <tr>
                                    <td>{{ $setting->name }}</td>
                                    <td>{{ $setting->value }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> {{ __('forms.save') }}
                </button>
            </div>
            <div class="col-12 col-md-auto">
                <a href="#modalForm" class="modal-with-form">
                    <button type="button" class="btn btn-success btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-plus text-4 me-2"></i> {{ __('forms.new') }}
                    </button>
                </a>
            </div>
        </div>
    </form>
    <!-- Modal Form -->
    <div id="modalForm" class="modal-block modal-block-primary mfp-hide">
        <form action="{{ route('create-setting') }}" method="post">
            @csrf
            <section class="card">
                <header class="card-header">
                    <h2 class="card-title">{{ __('settings.new-record') }}</h2>
                </header>
                <div class="card-body">
                    @include('app.includes.forms.text', ['label' => __('words.name'), 'required' => false, 'input' => 'key', 'value' => null, 'placeholder' => __('words.name'), 'paddingBottom' => true])
                    @include('app.includes.forms.text', ['label' => __('words.value'), 'required' => false, 'input' => 'value', 'value' => null, 'placeholder' => __('words.value'), 'paddingBottom' => true])
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary modal-confirm">{{ __('forms.save') }}</button>
                            <button type="button" class="btn btn-default modal-dismiss">{{ __('forms.cancel') }}</button>
                        </div>
                    </div>
                </footer>
            </section>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/bootstrapv5-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('app/vendor/ios7-switch/ios7-switch.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('.modal-with-form').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#name',
                modal: true,

                // When elemened is focused, some mobile browsers in some cases zoom in
                // It looks not nice, so we disable it:
                callbacks: {
                    beforeOpen: function() {
                        if($(window).width() < 700) {
                            this.st.focus = false;
                        } else {
                            this.st.focus = '#name';
                        }
                    }
                }
            });

            /*
            Modal Dismiss
            */
            $(document).on('click', '.modal-dismiss', function (e) {
                e.preventDefault();
                $.magnificPopup.close();
            });

        }(jQuery));
    </script>
@endsection
