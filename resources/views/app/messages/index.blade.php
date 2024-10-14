@extends('app.layouts.inbox')

@section('inbox-content')
    <div class="inner-body mailbox-folder">
        <header class="mailbox-header">
            <h1 class="mailbox-title font-weight-semibold text-dark text-8 m-0">
                <a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line line-angle1"></span>
                    <span class="line line-angle2"></span>
                </a>
                {{ __($title) }}
            </h1>
        </header>
        @php
            if(Route::currentRouteName() == 'trash'){
                $actions = ['restore' => 'messages.restore'];
            } else{
                $actions = ['read' => 'messages.mark-read', 'unread' => 'messages.mark-unread', 'delete' => 'datatables.delete'];
            }
        @endphp
        @include('app.includes.datatable', [
            'tableID' => 'messages-list',
            'columns' => ['messages.name','messages.email','messages.subject','messages.content', 'messages.datetime','messages.type'],
            'columnSize' => [10,15,10,35,10,5], // Total must be 85
            'filterBy' => ['messages.name','messages.email','messages.content'],
            'records' => $messages,
            'properties' => [
                [
                    'type' => 'property',
                    'property' => 'name',
                ],
                [
                    'type' => 'property',
                    'property' => 'email',
                ],
                [
                    'type' => 'property',
                    'property' => 'subject',
                ],
                [
                    'type' => 'function',
                    'function' => 'substr',
                    'params' => [0, 150],
                    'variable' => 'content',
                ],
                [
                    'type' => 'datetime',
                    'property' => 'created_at',
                    'format' => $settings['call_tracking_date_format']->value.' H:i:s'
                ],
                [
                    'type' => 'switch',
                    'property' => 'type',
                    'conditions' => [
                        1 => '<span class="mail-label ball green"></span>',
                        2 => '<span class="mail-label ball pink"></span>',
                        3 => '<span class="mail-label ball blue"></span>',
                        4 => '<span class="mail-label ball gray"></span>',
                    ],
                ],
            ],
            'rowLink' => [
                'href' => 'view-message',
                'class' => [
                    'property' => 'status_read',
                    'equals' => false,
                    'result' => 'unread'
                ]
            ],
            'modelTranslation' => 'messages.model',
            'routeActions' => 'actions-message',
            'actions' => $actions
        ])
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';
            @include('app.includes.scripts.pnotify')

            @include('app.includes.scripts.datatable', [
                'tableID' => 'messages-list',
                'order' => ['column' => 5, 'type' => 'desc'],
                'modelTranslation' => 'messages.model',
                'routeActions' => 'actions-message'
            ])
        }(jQuery));
    </script>
@endsection
