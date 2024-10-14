@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('new-address') }}">
                <section id="new-address" class="address card mb-4">
                    <div class="card-body d-flex">
                        <div class="align-self-center mx-auto text-center text-muted">
                            <i class='bx bx-plus'></i>
                            <h4>Agregar dirección.</h4>
                        </div>
                    </div>
                </section>
            </a>
        </div>
        @foreach(Auth::user()->addresses as $address)
            <div class="col-md-3">
                <section class="address card mb-4">
                    <div class="card-body">
                        @if($address->main)
                            <h4 class="text-primary mt-0">Predeterminada</h4>
                        @endif
                        <h3 class="mt-0">{{ $address->alias }}</h3>
                        <ul class="list-unstyled">
                            <li>{{ $address->name }}</li>
                            <li>{{ $address->phone }}</li>
                            <li>{{ $address->address.', '}} {{ $address->suburb ? $address->suburb.', ': '' }} {{$address->city.', '.$address->state->name.'. '.$address->postal_code.'. México' }}</li>
                            @if($address->rfc)
                                <li>{{ $address->rfc }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('edit-address', $address->id) }}">Editar</a>
                        @if(Auth::user()->addresses->count() > 1) <a id="{{ $address->id }}" href="#" class="address-footer delete">Descartar</a> @endif
                        @if(!$address->main) <a class="address-footer" href="{{ route('main-address', $address->id) }}">Predeterminada</a> @endif
                    </div>
                </section>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('.delete').on( 'click', function () {
                let url = '{{ route("delete-address", ":id") }}';
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez borrada, no podrás recuperar esta dirección.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar.',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = url.replace(':id', $(this).attr('id'));
                    } else {
                        Swal.fire('La dirección está a salvo.')
                    }
                });
            });

        }(jQuery));
    </script>
@endsection
