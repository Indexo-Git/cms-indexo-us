<div class="invoice">
    <header class="clearfix">
        <div class="row">
            <div class="col-sm-6 mt-3">
                <h2 class="h2 mt-0 mb-1 text-dark font-weight-bold">Website Quote</h2>
                <h4 class="h4 m-0 text-dark font-weight-bold">#{{ $quote->id }}</h4>
            </div>
            <div class="col-sm-6 text-end mt-3 mb-3">
                <address class="ib me-5">
                    indexo
                    <br/>
                    Teléfono: +(800) 774-6682
                    <br/>
                    info@indexo.us
                </address>
                <div class="ib">
                    @include('app.includes.logo', ['width' => '250'])
                </div>
            </div>
        </div>
    </header>
    <div class="bill-info">
        <div class="row">
            <div class="col-md-6">
                <div class="bill-to">
                    <p class="h5 mb-1 text-dark font-weight-semibold">Client E-mail:</p>
                    <address>
                        {{ $quote->email }}
                    </address>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bill-data text-end">
                    <p class="mb-0">
                        <span class="text-dark">Created at:</span>
                        <span class="value">{{ $quote->created_at->format('d/m/Y') }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-responsive-md invoice-items">
        <thead>
        <tr class="text-dark">
            <th id="cell-item"   class="font-weight-semibold">Element</th>
            <th id="cell-desc"   class="font-weight-semibold">Description</th>
            <th id="cell-qty"    class="text-center font-weight-semibold">Quantity</th>
            <th id="cell-total"  class="text-center font-weight-semibold">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="font-weight-semibold text-dark">Number of Pages</td>
            <td>Pages Number of content pages in addition to the "Home" section.</td>
            <td class="text-center">{{ ($quote->pages - 1100) / 150 }}</td>
            <td class="text-center">${{ number_format($quote->pages) }}</td>
        </tr>
        @if($quote->content != 0)
            <tr>
                <td class="font-weight-semibold text-dark">Content management</td>
                <td>Index team responsible for writing and structuring the content of the website.</td>
                <td class="text-center">n/a</td>
                <td class="text-center">${{ number_format($quote->content) }}</td>
            </tr>
        @endif
        @if($quote->forms != 0)
            <tr>
                <td class="font-weight-semibold text-dark">Contact Forms</td>
                <td>Number of contact forms available in the website.</td>
                <td class="text-center">{{ $quote->forms / 50 }}</td>
                <td class="text-center">${{ number_format($quote->forms) }}</td>
            </tr>
        @endif
        @if($quote->seo != 0)
            <tr>
                <td class="font-weight-semibold text-dark">SEO</td>
                <td>The website has basic search engine optimization.</td>
                <td class="text-center">n/a</td>
                <td class="text-center">${{ number_format($quote->seo) }}</td>
            </tr>
        @endif
        @if($quote->e_commerce)
            <tr>
                <td class="font-weight-semibold text-dark">E-commerce</td>
                <td>E-commerce section (online store) available on the website. Administration panel and payment gateway.</td>
                <td class="text-center">n/a</td>
                <td class="text-center">$3,500</td>
            </tr>
        @endif
        </tbody>
    </table>

    <div class="invoice-summary">
        <div class="row justify-content-end">
            <div class="col-sm-4">
                <table class="table h6 text-dark">
                    <tbody>
                        <tr class="h4">
                            <td colspan="2">Total</td>
                            <td class="text-left">${{ number_format($quote->total) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
