@extends('app.layouts.inbox')

@section('inbox-content')
    <div class="inner-body mailbox-email">
        <div class="mailbox-email-header mb-3">
            <h3 class="mailbox-email-subject m-0 font-weight-light">
                {{ $message->subject }}
            </h3>
            <p class="mt-2 mb-0 text-5">{{ __('messages.from') }}: {{ $message->name }}. {{ __('messages.email') }}: {{ $message->email }}</p>
        </div>
        <div class="mailbox-email-container">
            <div class="mailbox-email-screen pt-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <p class="card-title">{{ $message->name }} <i class="fas fa-angle-right fa-fw"></i> {{ $settings['website_name']->value }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ $message->content }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <p class="m-0">
                                    <small>{{ $message->created_at->format('m/d/Y') }}</small>
                                </p>
                            </div>
                            <div class="col text-end">
                                <a href="#" class="btn btn-danger btn-sm text-end">
                                    <i class="fas fa-trash me-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
