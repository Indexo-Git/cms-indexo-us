@extends('layouts.app')

@section('content')
    @if(Auth::user()->orders->count())
        <div class="row">
            <div class="col-lg-9">
                <h3 class="mt-0">{{ Auth::user()->orders->count() > 1 ? Auth::user()->orders->count().' pedidos realizados' : Auth::user()->orders->count(). ' pedido realizado' }}</h3>
                @foreach(Auth::user()->orders as $order)
                    <section class="card card-border mb-4">
                        <header class="card-header">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h5 class="mt-0 mb-1 text-uppercase">Pedido realizado</h5>
                                            <h5 class="mt-0 mb-0">{{ $order->created_at->format('d/m/Y') }}</h5>
                                        </div>
                                        <div class="col-lg-3">
                                            <h5 class="mt-0 mb-1 text-uppercase">Total</h5>
                                            <h5 class="mt-0 mb-0">${{ $order->total }} MXN</h5>
                                        </div>
                                        <div class="col-lg-3">
                                            <h5 class="mt-0 mb-1 text-uppercase">Enviar a</h5>
                                            <h5 class="mt-0 mb-0">{{ $order->billing->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h5 class="mt-0 mb-1 text-uppercase">Pedido <b class="text-primary">{{ $order->hash }}</b></h5>
                                    <h5 class="mt-0 mb-0">
                                        <a href="{{ route('details-order', $order->hash) }}">Ver detalles del pedido</a>
                                    </h5>
                                </div>
                            </div>
                        </header>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <h3 class="card-title mt-2 mb-4">Recibido el {{ $order->created_at->format('d/m/Y') }}</h3>
                                    @foreach($order->details as $detail)
                                        <div class="row pb-2">
                                            <div class="col-2">
                                                <img src="{{ asset('storage/products/carousel/'. $detail->product->id.'-1.webp') }}" class="w-50" alt="{{ $detail->product->name }}">
                                            </div>
                                            <div class="col-8">
                                                <b class="mr-3">{{ $detail->product->name }}</b> :
                                                @foreach($detail->attributes as $relation)
                                                    @foreach($relation as $attribute => $characteristic)
                                                        <span class="mr-1">{{ $characteristics->find($characteristic)->name }}</span>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-4">
                                    <button type="button" class="mb-3 mt-2 me-1 btn btn-default btn-sm w-100">Rastrear paquete</button>
                                    <button type="button" class="mb-1 mt-1 me-1 btn btn-default btn-sm w-100">Escribir una opinión sobre el producto</button>
                                    <button type="button" class="mb-1 mt-1 me-1 btn btn-default btn-sm w-100">Comprar nuevamente</button>
                                    <button type="button" class="mb-1 mt-1 me-1 btn btn-default btn-sm w-100">Cancelar pedido</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <h5>Archivar pedido</h5>
                        </div>
                    </section>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-info nomargin fade show mt-3" role="alert">
            <h4>Aun no tienes órdenes</h4>
            <p>Aquí aparecerán tus órdenes en cuanto las generes</p>
        </div>
    @endif
@endsection
