@extends('layouts.auth')

@section('content')
    <div class="panel card-sign">
        @include('includes.errors.g-token')
        <div class="card-title-sign mt-3 text-end">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> {{ __('auth.sign-in') }}</h2>
        </div>
        <div class="card-body">
            <form id="login" class="form-validation" method="post" action="{{ route('login') }}">
                @csrf
                @include('auth.includes.forms.email', ['autofocus' => true])
                @include('auth.includes.forms.password')
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="checkbox-custom checkbox-default">
                            <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember">{{ __('auth.remember') }}</label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <button type="submit" class="btn btn-primary mt-2">{{ __('auth.login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'login'])
@endsection
