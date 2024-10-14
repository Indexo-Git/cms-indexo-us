@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">
@endsection

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ $category->exists ? route('update-category') : route('create-category') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-category"></i>
                                <h2 class="card-big-info-title">{{ __('categories.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('categories.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('categories.name'), 'required' => true, 'input' => 'name',  'value' => $category->name, 'placeholder' => __('categories.name'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="50" autocomplete="off" autofocus'])
                                @if($category->exists)
                                    @include('app.includes.forms.text', ['label' => __('forms.url'), 'required' => false, 'input' => 'url',  'value' => $category->url, 'placeholder' => __('forms.url'), 'paddingBottom' => true])
                                    <div @class(['form-group row align-items-center pb-3'])>
                                        <label for="preview-url" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('forms.preview-url') }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <a href="{{ url($category->url) }}"><i class="fa fa-external-link"></i>{{ url($category->url) }}</a>
                                        </div>
                                    </div>
                                @endif
                                @include('app.includes.forms.textarea', ['label' =>  __('forms.description'), 'required' => true, 'input' => 'description',  'value' => $category->description, 'placeholder' => __('forms.description'), 'paddingBottom' => true])
                                @include('app.includes.forms.text', ['label' => __('categories.view'), 'required' => false, 'input' => 'view',  'value' => $category->view, 'placeholder' => __('categories.view'), 'paddingBottom' => true])
                                @include('app.includes.forms.image', [
                                            'label' => __('forms.main-image'),
                                            'required' => !Storage::disk('public')->exists('/categories/meta/'.$category->id. '.jpg'),
                                            'input' => 'image',
                                            'paddingBottom' => false,
                                            'previewFile' => true,
                                            'previewPath' => '/categories/meta/'.$category->id,
                                            'showDelete' => false,
                                            'help' => __('forms.help-image')
                                ])
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('app.includes.seo', ['item' => $category])
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> {{ __('forms.save') }}
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('categories') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
            @if($category->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $category->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> {{ __('forms.delete') }}
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $category->id }}">
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

            @if($category->exists)
                $('.delete-button').on( 'click', function () {
                    @include('app.includes.scripts.sweet-delete', [
                        'modelTranslation' => 'categories.model',
                        'deleteQuestion' => 'categories.delete-question'
                    ])
                });
            @endif
        }(jQuery));
    </script>
@endsection
