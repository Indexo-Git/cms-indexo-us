@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed form-validation" method="post" action="{{ $zone->exists ? route('update-zone') : route('create-zone') }}" >
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-map-pin"></i>
                                <h2 class="card-big-info-title">Información</h2>
                                <p class="card-big-info-desc">Agrega el nombre de la zona</p>
                                <p class="card-big-info-desc"><small>* Campos obligatorios</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('name')])>
                                    <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Nombre de la zona <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="name" name="name" type="text" class="form-control form-control-modern" value="{{ old('name', $zone->name) }}" placeholder="Nombre de la zona" required minlength="2" maxlength="50" autocomplete="off" autofocus>
                                        @if($errors->has('name'))
                                            <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('price')])>
                                    <label for="price" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Precio ($) <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="price" name="price" type="number" class="form-control form-control-modern" value="{{ old('price', $zone->price) }}" required placeholder="0">
                                        <span class="help-block">Puede incluir hasta 2 decimales</span>
                                        @if($errors->has('price'))
                                            <label id="price-error" class="error" for="price">{{ $errors->first('price') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($zone->exists)
                            <input name="id" type="hidden" value="{{ $zone->id }}">
                        @endif
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
                                <i class="card-big-info-icon bx bx-map"></i>
                                <h2 class="card-big-info-title">Estados</h2>
                                <p class="card-big-info-desc">Agrega los estados que pertenecen a esta zona</p>
                                <p class="card-big-info-desc"><small>* Campos obligatorios</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="form-group row align-items-center pb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 border-end">Estados</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <div class="row">
                                            @foreach($states as $state)
                                                <div class="col-auto mx-3 checkbox-custom checkbox-default">
                                                    <input id="checkbox-state-{{ $state->id }}" name="states[]" type="checkbox" value="{{ $state->id }}" @if(old('states.'.$state->id) || $zone->states->contains('id', $state->id)) checked @endif>
                                                    <label for="checkbox-state-{{ $state->id }}" class="my-2">
                                                        {{ $state->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> Guardar zona
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('zones') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancelar</a>
            </div>
            @if($zone->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $zone->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> Borrar zona
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $zone->id }}">
            @endif
        </div>
    </form>
@endsection
