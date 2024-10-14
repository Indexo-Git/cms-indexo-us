<header class="clearfix">
    <div class="row">
        <div class="col-sm-6 mt-3">
            <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">Pedido</h2>
            <h4 class="h4 m-0 text-dark font-weight-bold">{{ $order->hash }}</h4>
        </div>
        <div class="col-sm-6 text-end mt-3 mb-3">
            <address class="ib me-5">
                indexo
                <br/>
                México
                <br/>
                Teléfono: +52 272 227914
                <br/>
                contacto@indexo.mx
            </address>
            <div class="ib">
                @include('app.includes.logo')
            </div>
        </div>
    </div>
</header>
<div class="bill-info">
    <div class="row">
        <div class="col-md-4">
            <div class="bill-to">
                <p class="h5 mb-1 text-dark font-weight-semibold">Dirección envío:</p>
                <address>
                    {{ $order->shipping->name }}
                    <br/>
                    {{ $order->shipping->address }}, {{ $order->shipping->suburb }}
                    <br/>
                    {{ $order->shipping->city }}, {{ $order->shipping->state->name }}, México. {{ $order->shipping->postal_code }}
                    <br/>
                    Teléfono: {{ $order->shipping->phone }}
                </address>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bill-to">
                <p class="h5 mb-1 text-dark font-weight-semibold">Dirección facturación:</p>
                <address>
                    {{ $order->billing->name }}
                    <br/>
                    {{ $order->billing->address }}, {{ $order->billing->suburb }}
                    <br/>
                    {{ $order->billing->city }}, {{ $order->billing->state->name }}, México. {{ $order->billing->postal_code }}
                    <br/>
                    Teléfono: {{ $order->billing->phone }}
                </address>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bill-data text-end">
                <p class="mb-0">
                    <span class="text-dark">Creado</span>
                    <span class="value">{{ $order->created_at->format('d/m/Y') }}</span>
                </p>
                <p class="mb-0">
                    <span class="text-dark">Actualizado</span>
                    <span class="value">{{ $order->updated_at->format('d/m/Y') }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<table class="table table-responsive-md invoice-items">
    <thead>
        <tr class="text-dark">
            <th id="cell-item"   class="font-weight-semibold">Producto</th>
            <th id="cell-price"  class="text-center font-weight-semibold">Precio</th>
            <th id="cell-qty"    class="text-center font-weight-semibold">Cantidad</th>
            <th id="cell-total"  class="text-center font-weight-semibold">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->details as $detail)
            <tr>
                <td class="font-weight-semibold text-dark">
                    <a href="{{ route('product', $detail->product->url) }}" title="{{ $detail->product->name }}" target="_blank">
                        {{ $detail->product->name }}
                    </a>
                    @foreach($detail->attributes as $relation)
                        @foreach($relation as $attribute => $characteristic)
                            <span class="text-1">{{ $characteristics->find($characteristic)->name }}</span>
                        @endforeach
                    @endforeach
                </td>
                <td class="text-center">${{ $detail->price }} MXN</td>
                <td class="text-center">{{ $detail->quantity }}</td>
                <td class="text-center">${{ $detail->price * $detail->quantity  }} MXN</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="invoice-summary">
    <div class="row justify-content-end">
        <div class="col-sm-4">
            <table class="table h6 text-dark">
                <tbody>
                <tr class="b-top-0">
                    <td colspan="2">Subtotal</td>
                    <td class="text-left">${{ $order->subtotal }} MXN</td>
                </tr>
                <tr>
                    <td colspan="2">Envío</td>
                    <td class="text-left">${{ $order->shipping->state->zones[0]->price }} MXN</td>
                </tr>
                <tr class="h4">
                    <td colspan="2">Total</td>
                    <td class="text-left">${{ $order->total }} MXN</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
