@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    <div class="banner-area py-140 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-7">
                    <h1>Website Cost Calculator</h1>
                    <p class="mt-15">Have you ever wondered how much it would cost to turn your vision into a functional and attractive website? With our <strong>website cost calculator</strong>, you can get an accurate estimate in minutes.</p>
                    <p>Customize your project, select the features you need, and get a tailored budget to make your website a reality.</p>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/quotes/web-design.svg') }}" alt="Website Cost Calculator">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="quote-container" class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title mb-40">
                        <h2>Budget Your Website</h2>
                        <p class="mt-15">The price of a website is influenced by various factors. Our website cost calculator will provide you with a brief explanation of these elements, so you understand how the cost is calculated.</p>
                        <p>We hope this tool is useful for obtaining an initial <strong>web budget</strong>. Do not hesitate to contact us if you need more information or clarifications.</p>
                    </div>
                </div>
            </div>
            @if(session('message'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success mb-3">
                            {{ session('message') }}
                        </div>
                    </div>
                </div>
            @endif
            @if(session('error'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger mb-3">
                            {{ session('error') }}
                        </div>
                    </div>
                </div>
            @endif
            @if ($errors->has('g-token'))
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning mb-3">
                            <h4><i class="fa fa-warning"></i> Atención</h4>
                            <p>Para prevenir el spam, utilizamos el servicio de verificación de Google reCaptcha. Puedes confirmar su presencia observando el ícono en la esquina inferior derecha de tu pantalla. Si no puedes verlo, es posible que encuentres dificultades al enviar el formulario. En caso de que esto suceda, te recomendamos recargar la página, esperar unos minutos o intentarlo en una ventana de navegación privada.</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <div id="accordion" class="mt-30">
                        <div class="jobs-list">
                            <div class="card single-job">
                                <div class="card-header" id="headingOne">
                                    <h5>
                                        <a href="#collapseOne" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                            Number of pages
                                            <span class="job-type">$<span id="pages-label">0</span></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card-body-inner">
                                            <p><small>In addition to the Home page, how many additional pages do you need for your website? For example, pages like "About Us", "Gallery", or "Services".</small> </p>
                                            <span>Number of pages</span>
                                            <div class="cart-quantity-changer mt-3">
                                                <a class="value-decrease pages-button qtybutton">-</a>
                                                <label for="pages" class="sr-only"></label>
                                                <input id="pages" type="text" value="0">
                                                <a class="value-increase pages-button qtybutton">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-job">
                                <div class="card-header" id="headingTwo">
                                    <h5>
                                        <a href="#collapseTwo" data-toggle="collapse" aria-expanded="true" aria-controls="collapseTwo">
                                            Content Management
                                            <span class="job-type">$<span id="content-label">0</span></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card-body-inner">
                                            <p><small>At indexo, we ensure that your website has a coherent and well-structured message that effectively reflects your services. To achieve this, we offer content writing and organization services. However, if you prefer to provide your own content, you are free to do so.</small></p>
                                            <p><small>In this case, please be aware that indexo will not be responsible for issues of clarity, organization, or coherence in the structure of the site. Additionally, if you decide to provide your own content, you will need to include images in the necessary formats and dimensions for the correct functioning of the site.</small></p>
                                            <div class="row mt-5">
                                                <div class="col-md-6">
                                                    <label for="content-yes">
                                                        <input type="radio" id="content-yes" name="content-option" class="content-option" value="1" checked>
                                                        Yes, I want indexo to handle the content management of my website.
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="content-no">
                                                        <input type="radio" id="content-no" name="content-option" class="content-option" value="0">
                                                        No, I will provide the elements in the way I see fit.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-job">
                                <div class="card-header" id="headingThree">
                                    <h5>
                                        <a href="#collapseThree" data-toggle="collapse" aria-expanded="true" aria-controls="collapseThree">
                                            Contact Forms
                                            <span class="job-type">$<span id="contact-label">0</span></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card-body-inner">
                                            <p><small>Do you need contact forms for different purposes, such as general inquiries or scheduled appointments? Indicate how many forms you would like to include on your website.</small></p>
                                            <span>Contact Forms</span>
                                            <div class="cart-quantity-changer mt-3">
                                                <a class="value-decrease contact-button qtybutton">-</a>
                                                <label for="contact-forms" class="sr-only"></label>
                                                <input id="contact-forms" type="text" value="1">
                                                <a class="value-increase contact-button qtybutton">+</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-job">
                                <div class="card-header" id="headingFour">
                                    <h5>
                                        <a href="#collapseFour" data-toggle="collapse" aria-expanded="true" aria-controls="collapseFour">
                                            SEO
                                            <span class="job-type">$<span id="seo-label">0</span></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card-body-inner">
                                            <p><small>All our quotes include basic SEO service. This means we will ensure that search engines are informed about your website and have relevant information about your services or location.</small></p>
                                            <p><small>If you choose not to include this service, your website will NOT be visible in search engines.</small></p>
                                            <div class="row mt-5">
                                                <div class="col-md-6">
                                                    <label for="seo-yes">
                                                        <input type="radio" id="seo-yes" name="seo-option" class="seo-option" checked>
                                                        Yes, I want to include an <strong>SEO</strong> service on my website.
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="seo-no">
                                                        <input type="radio" id="seo-no" name="seo-option" class="seo-option">
                                                        No, I do not want my site to appear in search engines.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card single-job">
                                <div class="card-header" id="headingFive">
                                    <h5>
                                        <a href="#collapseFive" data-toggle="collapse" aria-expanded="true" aria-controls="collapseFive">
                                            E-commerce
                                            <span class="job-type">$<span id="e-commerce-label">0</span></span>
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="card-body-inner">
                                            <p><small>Do you want an <strong>e-commerce</strong>? At indexo, we offer a complete solution developed by our team. An online store optimized for search engines and designed following the best development practices, specially adapted for mobile devices.</small></p>
                                            <p><small>This tool includes an administration panel, user management, categories, products, blog, and a payment gateway through multiple available payment options.</small></p>
                                            <div class="row mt-5">
                                                <div class="col-md-6">
                                                    <label for="e-commerce-yes">
                                                        <input type="radio" id="e-commerce-yes" name="e-commerce-option" class="e-commerce-option">
                                                        Yes, I want to add E-commerce to my website.
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="e-commerce-no">
                                                        <input type="radio" id="e-commerce-no" name="e-commerce-option" class="e-commerce-option" checked>
                                                        No, I do not need it.
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="section-title mt-sm-60">
                        <h3>Quote</h3>
                    </div>
                    <div class="cart-total order-place mt-sm-50">
                        <table class="table">
                            <tr>
                                <td><h5>Features</h5></td>
                                <td class="text-right"><h5>Total</h5></td>
                            </tr>
                            <tr>
                                <td><strong>Number of pages</strong></td>
                                <td class="text-right"><span>$<span id="pages-total">0</span>.00</span></td>
                            </tr>
                            <tr id="tr-content">
                                <td><strong>Content Management</strong></td>
                                <td class="text-right"><span>$<span id="content-total">0</span>.00</span></td>
                            </tr>
                            <tr id="tr-contact">
                                <td><strong>Contact Forms</strong></td>
                                <td class="text-right"><span>$<span id="contact-total">0</span>.00</span></td>
                            </tr>
                            <tr id="tr-seo">
                                <td><strong>SEO</strong></td>
                                <td class="text-right"><span>$<span id="seo-total">0</span>.00</span></td>
                            </tr>
                            <tr id="tr-e-commerce">
                                <td><strong>E-commerce</strong></td>
                                <td class="text-right"><span>$<span id="e-commerce-total">0</span>.00</span></td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><span>$<span id="quote-total">0</span>.00</span></td>
                            </tr>
                        </table>
                        <form id="webDesignQuote" method="POST" action="{{ route('website-cost-send') }}">
                            <div class="proceed-checkout mt-20">
                                <div class="form-group">
                                    <label for="email" class="sr-only">E-mail</label>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email*" value="{{ old('email') }}" required autocomplete="off">
                                    @error('email')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{ csrf_field() }}
                                <button id="send-quote" type="submit" class="btn-common">Send quote</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('includes.google-recaptcha', ['form' => 'webDesignQuote'])
    <script>
        // General vars
        let numberPages = 0;

        // Pages vars
        let pageBase = 1500;
        let pagePrice = 180;
        let pages = $('#pages');
        let pagesLabel = $('#pages-label');
        let pagesTotal = $('#pages-total');
        let pagesQuote = pageBase;
        pagesLabel.text(numberWithCommas(pageBase));
        pagesTotal.text(numberWithCommas(pageBase));

        // Content vars
        let contentBase = 200;
        let contentPrice = 60;
        let contentYes = $('#content-yes')
        let contentLabel = $('#content-label');
        let contentTotal = $('#content-total');
        let contentQuote = contentBase;
        let contentTR = $('#tr-content');
        contentLabel.text(numberWithCommas(contentBase));
        contentTotal.text(numberWithCommas(contentBase));

        //Contact var
        let contactFormsPrice = 60;
        let contactForms = $('#contact-forms');
        let contactFormsLabel = $('#contact-label');
        let contactFormsTotal = $('#contact-total');
        let contactQuote = contactFormsPrice;
        let contactTR = $('#tr-contact');
        contactFormsLabel.text(numberWithCommas(contactFormsPrice));
        contactFormsTotal.text(numberWithCommas(contactFormsPrice));

        // SEO vars
        let seoBase = 1000;
        let seoPrice = 60;
        let seoYes = $('#seo-yes');
        let seoLabel = $('#seo-label');
        let seoTotal = $('#seo-total');
        let seoQuote = seoBase;
        let seoTR = $('#tr-seo');
        seoLabel.text(numberWithCommas(seoBase));
        seoTotal.text(numberWithCommas(seoBase));

        // E-commerce vars
        let eCommerceBase = 0;
        let eCommercePrice = 6000;
        let eCommerceYes = $('#e-commerce-yes');
        let eCommerceLabel = $('#e-commerce-label');
        let eCommerceTotal = $('#e-commerce-total');
        let eCommerceQuote = eCommerceBase;
        let eCommerceTR = $('#tr-e-commerce');
        eCommerceLabel.text(numberWithCommas(eCommerceQuote));
        eCommerceTotal.text(numberWithCommas(eCommerceQuote));

        // Total vars
        let tax = 0;
        let invoice = $('#invoice');
        let quoteTax = $('#quote-tax');
        let quoteSubtotal = $('#quote-subtotal');
        let quoteTotal = $('#quote-total');
        let totalQuote = 0;
        getSubtotal();
        geTotal();

        // Pages function
        $('.value-decrease.pages-button, .value-increase.pages-button').click(function (e){
            numberPages = pages.val();
            let total = pageBase+(pagePrice*pages.val());
            pagesQuote = total;
            let text =  numberWithCommas(total);
            pagesLabel.text(text);
            pagesTotal.text(text)
            getContentPrice();
            getSEOPrice();
            getSubtotal();
            geTotal();
        });

        // Content functions
        $('.content-option').click(function (e){
            getContentPrice();
            getSubtotal();
            geTotal();
        });

        function getContentPrice(){
            let total = 0;
            if(contentYes[0].checked){
                total = contentBase+(numberPages*contentPrice);
            }
            contentQuote = total;
            let text = numberWithCommas(total);
            contentLabel.text(text);
            contentTotal.text(text);
        }

        // Forms function

        $('.value-decrease.contact-button, .value-increase.contact-button').click(function (e){
            let total = contactFormsPrice*contactForms.val();
            contactQuote = total;
            let text =  numberWithCommas(total);
            contactFormsLabel.text(text);
            contactFormsTotal.text(text)
            getSubtotal();
            geTotal();
        });

        // Seo functions
        $('.seo-option').click(function (e){
            getSEOPrice();
            getSubtotal();
            geTotal();
        });

        // E-commerce functions
        $('.e-commerce-option').click(function (e){
            if(eCommerceYes[0].checked){
                eCommerceQuote = eCommercePrice;
            } else{
                eCommerceQuote = 0;
            }
            eCommerceLabel.text(numberWithCommas(eCommerceQuote));
            eCommerceTotal.text(numberWithCommas(eCommerceQuote));
            getSubtotal();
            geTotal();
        });

        function getSEOPrice(){
            let total = 0;
            if(seoYes[0].checked){
                total = seoBase+(numberPages*seoPrice);
            }
            seoQuote = total;
            let text = numberWithCommas(total);
            seoLabel.text(text);
            seoTotal.text(text);
        }


        // Total functions

        function getSubtotal(){
            quoteSubtotal.text(numberWithCommas(pagesQuote + contentQuote + contactQuote + seoQuote + eCommerceQuote));
        }

        function getTax(){
            let subtotal = pagesQuote + contentQuote + contactQuote + seoQuote + eCommerceQuote;
            if(invoice.is(':checked')){
                tax = subtotal * .16
            } else{
                tax = 0;
            }
            quoteTax.text(tax);
        }

        function geTotal(){
            getTax();
            /*
            contentQuote == 0 ? contentTR.hide() : contentTR.show();
            contactQuote == 0 ? contactTR.hide() : contactTR.show();
            seoQuote == 0 ? seoTR.hide() : seoTR.show();
            eCommerceQuote == 0 ? eCommerceTR.hide() : eCommerceTR.show();
             */
            totalQuote = pagesQuote + contentQuote + contactQuote + seoQuote + eCommerceQuote + tax;
            quoteTotal.text(numberWithCommas(totalQuote));
        }

        invoice.change(function (e){
            geTotal();
        });

        // Format  function

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('#webDesignQuote').one('submit', function (e){
            e.preventDefault();
            $(this).append('<input type="hidden" name="pages" value="'+pagesQuote+'">');
            $(this).append('<input type="hidden" name="content" value="'+contentQuote+'">');
            $(this).append('<input type="hidden" name="forms" value="'+contactQuote+'">');
            $(this).append('<input type="hidden" name="seo" value="'+seoQuote+'">');
            if(eCommerceYes[0].checked){
                $(this).append('<input type="hidden" name="e-commerce" value="'+eCommercePrice+'">');
            }
            if(invoice.is(':checked')) {
                $(this).append('<input type="hidden" name="invoice" value="1">');
            }
            $(this).append('<input type="hidden" name="total" value="'+totalQuote+'">');
            $(this).submit();
        });
    </script>
@endsection
