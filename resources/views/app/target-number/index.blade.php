@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <form id="create-target-number" class="form-validation" method="post" action="{{ route('create-target-number') }}" method="post">
                @csrf
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-target-lock"></i>
                                <h2 class="card-big-info-title">{{ __('target-numbers.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('target-numbers.information-description') }}</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('target-numbers.phone'), 'required' => false, 'input' => 'phone', 'value' => null, 'placeholder' => '+11231231234', 'paddingBottom' => false, 'help' => __('target-numbers.help-phone'), 'helpClass' => 'alert-warning p-2'])
                                @include('app.includes.forms.select2', ['label' => __('target-numbers.country'), 'required' => false, 'input' => 'country', 'paddingBottom' => true, 'options' => $countries])
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
    @if($targetNumbers->count())
        <div class="row">
            <div class="col">
                <form id="update-target-number" class="form-validation" method="post" action="{{ route('update-target-number') }}" method="post">
                    @csrf
                    <section class="card card-modern card-big-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2-5 col-xl-1-5">
                                    <h2 class="card-big-info-title">{{ __('target-numbers.choice') }}</h2>
                                    <p class="card-big-info-desc">{{ __('target-numbers.choice-description') }}</p>
                                </div>
                                <div class="col-lg-3-5 col-xl-4-5">
                                    <div class="form-group row align-items-center pb-3">
                                        <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('target-numbers.main-target-number') }}</label>
                                        <div class="col-lg-7 col-xl-6">
                                            @foreach($targetNumbers as $targetNumber)
                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" id="target-number-{{ $targetNumber->id }}" name="targetNumber" value="{{ $targetNumber->id }}" {{ $targetNumber->status ? 'checked' : '' }}>
                                                    <label for="target-number-{{ $targetNumber->id }}">{{ $targetNumber->number }}</label>
                                                    @if($targetNumbers->count() > 1)
                                                        <span><i id="{{ $targetNumber->id }}" class="bx bx-x text-danger delete cur-pointer"></i></span>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
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
    @endif
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('#country').change(function() {
                $('#phone').val($(this).val());
            });

            $('.delete').on( 'click', function () {
                @include('app.includes.scripts.sweet-delete', [
                 'modelTranslation' => 'target-numbers.model',
                 'deleteQuestion' => 'target-numbers.delete-question'
                ])
            });
        }(jQuery));
    </script>
@endsection
