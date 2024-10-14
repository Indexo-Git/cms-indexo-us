@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('app/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}">
@endsection

@section('content')
    <form class="action-buttons-fixed" action="{{ $portfolio->exists ? route('update-portfolio') : route('create-portfolio') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="row">
                <div class=col">
                    <div class="alert alert-danger">
                        <h5>{{ __('words.errors') }}</h5>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-briefcase "></i>
                                <h2 class="card-big-info-title">{{ __('portfolios.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('portfolios.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('portfolios.title-portfolio'), 'required' => true, 'input' => 'title', 'value' => $portfolio->title, 'placeholder' => __('portfolios.title-portfolio'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off" autofocus'])
                                @include('app.includes.forms.text', ['label' => __('portfolios.client'), 'required' => true, 'input' => 'client', 'value' => $portfolio->client, 'placeholder' => __('portfolios.client'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off"'])
                                @include('app.includes.forms.text', ['label' => __('portfolios.skills'), 'required' => true, 'input' => 'skills', 'value' => $portfolio->skills, 'placeholder' => __('portfolios.skills'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off"'])
                                @include('app.includes.forms.text', ['label' => __('portfolios.location'), 'required' => true, 'input' => 'location', 'value' => $portfolio->location, 'placeholder' => __('portfolios.location'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="255" autocomplete="off"'])
                                @include('app.includes.forms.datepicker', ['label' => __('forms.date'), 'required' => true, 'input' => 'date', 'value' => $portfolio->location, 'paddingBottom' => true])
                                <div @class(['form-group row align-items-center', 'has-error' => $errors->has('image')])>
                                    <label for="image" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('portfolios.images') }}</label>
                                    <div class="col-lg-7 col-xl-6">
                                        @for($x = 1; $x <= 5; $x++)
                                            @include('app.includes.image-input', ['model' => 'portfolio', 'folder' => 'portfolios', 'name' => 'image-'.$x, 'number' => $x])
                                        @endfor
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
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-text"></i>
                                <h2 class="card-big-info-title">{{ __('forms.description') }}</h2>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <textarea id="description" class="form-control form-control-modern" name="description">{{ old('description', $portfolio->description) }}</textarea>
                                @if($errors->has('description'))
                                    <label id="description-error" class="error" for="description">{{ $errors->first('description') }}</label>
                                @endif
                            </div>
                        </div>
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
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('portfolios') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">{{ __('words.cancel') }}</a>
            </div>
            @if($portfolio->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $portfolio->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> {{ __('forms.delete') }}
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $portfolio->id }}">
            @endif
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('app/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
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
                    duration: 300 // don't forget to change the duration also in CSS
                }
            });

            @if($portfolio->exists)
                $('.delete-button').on( 'click', function () {
                    @include('app.includes.scripts.sweet-delete', [
                          'modelTranslation' => 'portfolios.model',
                          'deleteQuestion' => 'portfolios.delete-question'
                      ])
                });
            @endif

            tinymce.init({
                selector: 'textarea#description',
                menu: {
                    happy: { title: 'View', items: 'code' }
                },
                plugins: 'code',
                menubar: 'happy',
                height: 650
            });

            $('#date').datepicker();

        }(jQuery));
    </script>
@endsection
