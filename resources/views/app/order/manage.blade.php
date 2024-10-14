@extends('layouts.app')

@section('content')
    <form class="order-details action-buttons-fixed" method="post" action="{{ route('status-order') }}">
        @csrf
        <div class="row">
            <div class="col-xl-4 mb-4 mb-xl-0">
                <div class="card card-modern">
                    <div class="card-header">
                        <h2 class="card-title">Actualizar estado del pedido</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col mb-3">
                                <label for="status">Estado</label>
                                <select id="status" class="form-control form-control-modern" name="status" required>
                                    <option value="1" {{ $order->status == 1 ? 'selected': null }}>Pagado</option>
                                    <option value="2" {{ $order->status == 2 ? 'selected': null }}>Procesando</option>
                                    <option value="3" {{ $order->status == 3 ? 'selected': null }}>Enviado</option>
                                    <option value="4" {{ $order->status == 4 ? 'selected': null }}>Completo</option>
                                    <option value="5" {{ $order->status == 5 ? 'selected': null }}>Cancelado</option>
                                    <option value="6" {{ $order->status == 6 ? 'selected': null }}>Reembolso</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card card-modern">
                    <div class="card-header">
                        <h2 class="card-title">Direcciones</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-auto me-xl-5 pe-xl-5 mb-4 mb-xl-0">
                                <h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">Envío</h3>
                                <ul class="list list-unstyled list-item-bottom-space-0">
                                    <li>{{ $order->shipping->name }}</li>
                                    <li>{{ $order->shipping->address }}, {{ $order->shipping->suburb }}</li>
                                    <li>{{ $order->shipping->city }}, {{ $order->shipping->state->name }}</li>
                                    <li>{{ $order->shipping->postal_code }}</li>
                                    <li>México</li>
                                </ul>
                                <strong class="d-block text-color-dark">Dirección de correo:</strong>
                                <a href="mailto:$order->user->email">{{ $order->user->email }}</a>
                                <strong class="d-block text-color-dark mt-3">Teléfono:</strong>
                                <a href="tel:+52{{ $order->shipping->phone }}" class="text-color-dark">{{ $order->shipping->phone }}</a>
                            </div>
                            <div class="col-xl-auto ps-xl-5">
                                <h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">Facturación</h3>
                                <ul class="list list-unstyled list-item-bottom-space-0">
                                    <li>{{ $order->billing->name }}</li>
                                    <li>{{ $order->billing->address }}, {{ $order->billing->suburb }}</li>
                                    <li>{{ $order->billing->city }}, {{ $order->billing->state->name }}</li>
                                    <li>{{ $order->billing->postal_code }}</li>
                                    <li>México</li>
                                </ul>
                                <strong class="d-block text-color-dark">Dirección de correo:</strong>
                                <a href="mailto:$order->user->email">{{ $order->user->email }}</a>
                                <strong class="d-block text-color-dark mt-3">Teléfono:</strong>
                                <a href="tel:+52{{ $order->billing->phone }}" class="text-color-dark">{{ $order->billing->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-modern">
                    <div class="card-header">
                        <h2 class="card-title">Productos</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-ecommerce-simple table-ecommerce-simple-border-bottom table-borderless table-striped mb-0" style="min-width: 380px;">
                                <thead>
                                <tr>
                                    <th width="18%" class="ps-4">Imagen</th>
                                    <th width="55%">Producto</th>
                                    <th width="5%" class="text-end">Precio</th>
                                    <th width="7%" class="text-end">Cantidad</th>
                                    <th width="5%" class="text-end">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->details as $detail)
                                        <tr>
                                            <td class="ps-4">
                                                <a href="{{ route('product', $detail->product->url) }}" title="{{ $detail->product->name }}" target="_blank">
                                                    <img src="{{ asset('storage/products/carousel/'. $detail->product->id.'-1.webp') }}" class="img-fluid" alt="{{ $detail->product->name }}">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('product', $detail->product->url) }}" title="{{ $detail->product->name }}" target="_blank">
                                                    <b class="mr-3">{{ $detail->product->name }}</b>
                                                </a>
                                                @foreach($detail->attributes as $relation)
                                                    @foreach($relation as $attribute => $characteristic)
                                                        <span class="mr-1">{{ $characteristics->find($characteristic)->name }}</span>
                                                    @endforeach
                                                @endforeach
                                            </td>
                                            <td class="text-end">${{ $detail->price }} MXN</td>
                                            <td class="text-end">{{ $detail->quantity }}</td>
                                            <td class="text-end">${{ $detail->price * $detail->quantity  }} MXN</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row justify-content-end flex-column flex-lg-row my-3">
                            <div class="col-auto me-5">
                                <h3 class="font-weight-bold text-color-dark text-4 mb-3">Subtotal</h3>
                                <span class="d-flex align-items-center">
                                    {{ $order->details->sum('quantity') }} {{ $order->details->sum('quantity') > 1 ? 'productos' : 'producto' }}
                                    <i class="fas fa-chevron-right text-color-primary px-3"></i>
                                    <b class="text-color-dark text-xxs">${{ $order->subtotal }} MXN</b>
                                </span>
                            </div>
                            <div class="col-auto me-5">
                                <h3 class="font-weight-bold text-color-dark text-4 mb-3">Envío</h3>
                                <span class="d-flex align-items-center">
                                    Flat Rate
                                    <i class="fas fa-chevron-right text-color-primary px-3"></i>
                                    <b class="text-color-dark text-xxs">${{ $order->shipping->state->zones[0]->price }} MXN</b>
                                </span>
                            </div>
                            <div class="col-auto">
                                <h3 class="font-weight-bold text-color-dark text-4 mb-3">Total</h3>
                                <span class="d-flex align-items-center justify-content-lg-end">
                                    <strong class="text-color-dark text-5">${{ $order->total }} MXN</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> Guardar pedido
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('dashboard') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancelar</a>
            </div>
            <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                <button id="{{ $order->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-trash text-4 me-2"></i> Borrar pedido
                </button>
            </div>
        </div>
        <input type="hidden" value="{{ $order->id }}" name="order">
    </form>
    <div class="row mb-5">
        <div class="col mb-5">
            <div class="card card-modern">
                <div class="card-header">
                    <h2 class="card-title">Notas del pedido</h2>
                </div>
                <div class="card-body">
                    @foreach($order->notes as $note)
                        <div class="ecommerce-timeline mb-3">
                            <div class="ecommerce-timeline-items-wrapper">
                                <div class="ecommerce-timeline-item">
                                    <small>Agregada el {{ $note->created_at->format('d/m/Y') }} por {{ $note->user->name }} @if($note->user->id == Auth::id()) <a href="{{ route('delete-note', $note->id) }}" class="text-color-danger">Borrar nota</a> @endif </small>
                                    <p>{{ $note->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <form method="post" action="{{ route('create-note') }}">
                        @csrf
                        <div class="form-row">
                            <div @class(['form-group col pb-1 mb-3', 'has-error' => $errors->has('content')])>
                                <label for="content">Agregar nota</label>
                                <textarea id="content" class="form-control form-control-modern" name="content" rows="6" required>{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <label id="content-error" class="error" for="content">{{ $errors->first('content') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <button type="submit" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Agregar nota</button>
                            </div>
                        </div>
                        <input type="hidden" name="order" value="{{ $order->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')


            $('.delete-button').on( 'click', function () {
                let url = '{{ route("delete-order", ":id") }}';
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Una vez borrado, no podrás recuperar este pedido.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, eliminar.',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = url.replace(':id', $(this).attr('id'));
                    } else {
                        Swal.fire('El pedido está a salvo.')
                    }
                });
            });
        }(jQuery));
    </script>
@endsection
