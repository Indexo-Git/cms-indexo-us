@extends('layouts.auth')

@section('content')
    <div class="panel card-sign">
        @if(session('status'))
            <div class="alert alert-success">{{ __('auth.success-recover-link-sent') }}</div>
        @endif
        @include('includes.errors.g-token')
        <div class="card-title-sign mt-3 text-end">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle mr-1 text-6 position-relative top-5"></i> {{ __('auth.recover-password') }}</h2>
        </div>
        <div class="card-body">
            <p>{{ __('auth.did-you-forget-password') }}</p>
            <form id="forgot" method="post" action="{{ route('password.email') }}">
                @csrf
                @include('auth.includes.forms.email', ['autofocus' => true])
                <div class="row mb-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary mt-2">{{ __('auth.send-password-recovery-link') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'forgot'])
@endsection
