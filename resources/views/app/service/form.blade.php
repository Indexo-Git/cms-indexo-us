@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
@endsection

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ $service->exists ? route('update-service') : route('create-service') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-service"></i>
                                <h2 class="card-big-info-title">{{ __('services.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('services.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('services.name'), 'required' => true, 'input' => 'name',  'value' => $service->name, 'placeholder' => __('services.name'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="50" autocomplete="off" autofocus'])
                                @if($service->exists)
                                    @include('app.includes.forms.text', ['label' => __('forms.url'), 'required' => false, 'input' => 'url',  'value' => $service->url, 'placeholder' => __('forms.url'), 'paddingBottom' => true])
                                    <div @class(['form-group row align-items-center pb-3'])>
                                        <label for="preview-url" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('forms.preview-url') }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <a href="{{ url($service->url) }}"><i class="fa fa-external-link"></i>{{ url($service->url) }}</a>
                                        </div>
                                    </div>
                                @endif
                                @include('app.includes.forms.textarea', ['label' =>  __('forms.description'), 'required' => true, 'input' => 'description',  'value' => $service->description, 'placeholder' => __('forms.description'), 'paddingBottom' => true])
                                @include('app.includes.forms.text', ['label' => __('services.view'), 'required' => false, 'input' => 'view',  'value' => $service->view, 'placeholder' => __('services.view'), 'paddingBottom' => true])
                                @include('app.includes.forms.image', [
                                            'label' => __('forms.main-image'),
                                            'required' => !Storage::disk('public')->exists('/services/meta/'.$service->id. '.jpg'),
                                            'input' => 'image',
                                            'paddingBottom' => false,
                                            'previewFile' => true,
                                            'previewPath' => '/services/meta/'.$service->id,
                                            'showDelete' => false,
                                            'help' => __('forms.help-image')
                                ])
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('app.includes.seo', ['item' => $service])
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> {{ __('forms.save') }}
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('services') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
            @if($service->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $service->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> {{ __('forms.delete') }}
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $service->id }}">
            @endif
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

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

            @if($service->exists)
                $('.delete-button').on( 'click', function () {
                    @include('app.includes.scripts.sweet-delete', [
                        'modelTranslation' => 'services.model',
                        'deleteQuestion' => 'services.delete-question'
                    ])
                });
            @endif
        }(jQuery));
    </script>
@endsection
