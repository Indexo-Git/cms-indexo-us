@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form class="form-validation" method="post" action="{{ route('create-call-tracking') }}">
                @csrf
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-dialpad-alt"></i>
                                <h2 class="card-big-info-title">{{ __('call-tracking.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('call-tracking.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @if(count($DIDs))
                                    @include('app.includes.forms.select', ['label' => __('call-tracking.available-numbers'), 'required' => false, 'input' => 'did', 'paddingBottom' => true, 'options' => $DIDs, 'conditionSelected' => old('did')])
                                @endif
                                @include('app.includes.forms.select', ['label' => __('call-tracking.area-code'), 'required' => false, 'input' => 'area-code', 'paddingBottom' => true, 'options' => $areaCodes, 'conditionSelected' => old('area-code')])
                                @include('app.includes.forms.text', ['label' => __('call-tracking.note'), 'required' => true, 'input' => 'note',  'value' => $voiceApp->note, 'placeholder' => __('call-tracking.note'), 'paddingBottom' => true])
                                <div class="form-group row align-items-center">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('forms.save') }} {{ __('target-numbers.model') }}</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <button type="submit" class="submit-button btn btn-primary d-flex align-items-center">{{ __('forms.save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
    @if($voiceApps->count())
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <h2 class="card-big-info-title">{{ __('call-tracking.used-numbers') }}</h2>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @foreach($voiceApps as $voiceApp)
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ $voiceApp->note }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            <b class="fs-6">{{ $voiceApp->intl_number }}</b>
                                            <span><i id="{{ $voiceApp->id }}" class="bx bx-x text-danger delete cur-pointer"></i></span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('.delete').on( 'click', function () {
                @include('app.includes.scripts.sweet-delete', [
                 'modelTranslation' => 'call-tracking.model',
                 'deleteQuestion' => 'call-tracking.delete-question'
                ])
            });

        }(jQuery));
    </script>
@endsection
