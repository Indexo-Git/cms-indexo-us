@extends('layouts.app')

@section('content')
    @if(!$characteristic->exists)
        <div class="row">
            <div class="col">
                <form class="form-validation" method="post" action="{{ $attribute->exists ? route('update-attribute') : route('create-attribute') }}" method="post">
                    @csrf
                    <section class="card card-modern card-big-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2-5 col-xl-1-5">
                                    <i class="card-big-info-icon bx bx-spreadsheet"></i>
                                    <h2 class="card-big-info-title">{{ __('attributes.information') }}</h2>
                                    <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                                </div>
                                <div class="col-lg-3-5 col-xl-4-5">
                                    <div @class(['form-group row align-items-center', 'has-error' => $errors->has('name')])>
                                        <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('attributes.name') }} <span class="required">*</span></label>
                                        <div class="col-lg-7 col-xl-6">
                                            <div class="input-group">
                                                <input id="name" name="name" type="text" class="form-control form-control-modern" value="{{ old('name', $attribute->name) }}" placeholder="Nombre del atributo" required minlength="2" maxlength="50" autocomplete="off" autofocus>
                                                <button class="btn btn-primary" type="submit">{{ __('forms.save') }}</button>
                                            </div>
                                            @if($errors->has('name'))
                                                <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($attribute->exists)
                                <input name="id" type="hidden" value="{{ $attribute->id }}">
                            @endif
                        </div>
                    </section>
                </form>
            </div>
        </div>
    @endif
    @if($attribute->exists)
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-slider"></i>
                                <h2 class="card-big-info-title">{{ __('characteristics.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('characteristics.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <form class="form-validation" method="post" action="{{ $characteristic->exists ? route('update-characteristic') : route('create-characteristic') }}" method="post">
                                    @csrf
                                    <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('char-name')])>
                                        <label for="char-name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('characteristics.name') }} <span class="required">*</span></label>
                                        <div class="col-lg-7 col-xl-6">
                                            <div class="input-group">
                                                <input id="char-name" name="char-name" type="text" class="form-control form-control-modern" value="{{ old('char-name', $characteristic->name) }}" placeholder="{{ __('characteristics.name') }}" required minlength="1" maxlength="50" autocomplete="off">
                                                <button class="btn btn-primary" type="submit">{{ __('forms.save') }}</button>
                                            </div>
                                            @if($errors->has('char-name'))
                                                <label id="char-name-error" class="error" for="char-name">{{ $errors->first('char-name') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                    <input name="attribute-id" type="hidden" value="{{ $attribute->id }}">
                                    @if($characteristic->exists)
                                        <input name="id" type="hidden" value="{{ $characteristic->id }}">
                                    @endif
                                </form>
                                @isset($characteristics)
                                    @include('app.includes.datatable', [
                                        'tableID' => 'characteristics-list',
                                        'newTranslation' => 'characteristics.add',
                                        'columns' => ['characteristics.name'],
                                        'columnSize' => [85], // Total must be 85
                                        'filterBy' => ['characteristics.name'],
                                        'records' => $characteristics,
                                        'properties' => [
                                            [
                                                'type' => 'property',
                                                'property' => 'name',
                                            ]
                                        ],
                                        'options' => [
                                            [
                                                'href' => 'edit-characteristic',
                                                'button' => 'btn-default mr-1',
                                                'icon' => 'bx-edit-alt'
                                            ],
                                            [
                                                'href' => '#',
                                                'class' => 'delete',
                                                'button' => 'btn-danger',
                                                'icon' => 'bx-trash-alt'
                                            ]
                                        ],
                                        'modelTranslation' => 'characteristics.model',
                                        'routeActions' => 'actions-characteristic',
                                        'actions' => ['delete' => 'datatables.delete']
                                    ])
                                @endisset
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

            @include('app.includes.scripts.datatable', [
              'tableID' => 'characteristics-list',
              'modelTranslation' => 'characteristics.model',
              'routeActions' => 'actions-characteristic',
              'deleteQuestion' => 'characteristics.delete-question'
            ])

            $('#characteristics-list tbody').on( 'click', '.delete', function () {
                @include('app.includes.scripts.sweet-delete', [
                    'modelTranslation' => 'characteristics.model',
                    'deleteQuestion' => 'characteristics.delete-question'
                ])
            });

        }(jQuery));
    </script>
@endsection
