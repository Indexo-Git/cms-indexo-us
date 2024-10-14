@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ $address->exists ? route('update-address') : route('create-address') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-home-circle"></i>
                                <h2 class="card-big-info-title">Dirección</h2>
                                <p class="card-big-info-desc">Agrega aquí tu dirección y elige el propósito de la misma.</p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('alias')])>
                                    <label for="alias" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Alias <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="alias" type="text" class="form-control form-control-modern" name="alias" value="{{ old('alias', $address->alias) }}" placeholder="Ej: Casa, Oficina..." minlength="2" maxlength="45" required autofocus>
                                        @if($errors->has('alias'))
                                            <label id="alias-error" class="error" for="alias">{{ $errors->first('alias') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('name')])>
                                    <label for="name" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Nombre de contacto <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="name" type="text" class="form-control form-control-modern" name="name" value="{{ old('name', $address->name) }}" placeholder="{{ Auth::user()->name }}" minlength="2" maxlength="200" required>
                                        @if($errors->has('name'))
                                            <label id="name-error" class="error" for="name">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('phone')])>
                                    <label for="phone" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Teléfono <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="phone" type="tel" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" class="form-control form-control-modern" name="phone" value="{{ old('phone', $address->phone) }}" placeholder="5512345678" minlength="10" maxlength="10" required>
                                        @if($errors->has('phone'))
                                            <label id="phone-error" class="error" for="phone">{{ $errors->first('phone') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('address')])>
                                    <label for="address" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Calle y número <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="address" type="text" class="form-control form-control-modern" name="address" value="{{ old('address', $address->address) }}" placeholder="Calle 1 #123" minlength="2" maxlength="500" required>
                                        @if($errors->has('address'))
                                            <label id="address-error" class="error" for="address">{{ $errors->first('address') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('suburb')])>
                                    <label for="suburb" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Colonia <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="suburb" type="text" class="form-control form-control-modern" name="suburb" value="{{ old('suburb', $address->suburb) }}" placeholder="Centro" minlength="2" maxlength="150" required>
                                        @if($errors->has('suburb'))
                                            <label id="suburb-error" class="error" for="suburb">{{ $errors->first('suburb') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('city')])>
                                    <label for="city" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Ciudad <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="city" type="text" class="form-control form-control-modern" name="city" value="{{ old('city', $address->city) }}" placeholder="Ciudad de México" minlength="2" maxlength="150" required>
                                        @if($errors->has('city'))
                                            <label id="city-error" class="error" for="city">{{ $errors->first('city') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('postal-code')])>
                                    <label for="postal-code" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Código postal <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="postal-code" type="text" class="form-control form-control-modern" name="postal-code" value="{{ old('postal-code', $address->postal_code) }}" placeholder="01010" minlength="5" maxlength="5" required>
                                        @if($errors->has('postal-code'))
                                            <label id="postal-code-error" class="error" for="postal-code">{{ $errors->first('postal-code') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('state')])>
                                    <label for="state" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Estado <span class="required">*</span></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <select id="state" class="form-control" name="state">
                                            @foreach($states as $state)
                                                <option value="{{ $state->id }}" @if(($address->exists && $address->state->id == $state->id) || old('state') == $state->id) selected @endif>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center pb-3">
                                    <label for="country" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">País</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="country" type="text" class="form-control form-control-modern" name="country" value="MX" disabled>
                                    </div>
                                </div>
                                <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('rfc')])>
                                    <label for="rfc" class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">RFC</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <input id="rfc" type="text" class="form-control form-control-modern" name="rfc" value="{{ old('rfc', $address->rfc) }}" placeholder="ABCD0123EF4" minlength="13" maxlength="13">
                                        @if($errors->has('rfc'))
                                            <label id="rfc-error" class="error" for="rfc">{{ $errors->first('rfc') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0"></label>
                                    <div class="col-lg-7 col-xl-6">
                                        <p>* Campos obligatorios</p>
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
                    <i class="bx bx-save text-4 me-2"></i> {{ $address->exists ? 'Actualizar' : 'Guardar' }} dirección
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('addresses') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancelar</a>
            </div>
            @if(Auth::user()->addresses->count() > 1)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $address->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> Borrar dirección
                    </button>
                </div>
            @endif
            @if($address->exists)
                <input name="id" type="hidden" value="{{ $address->id }}">
            @endif
        </div>
    </form>
@endsection
