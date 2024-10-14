@extends('layouts.app')

@section('content')
    <form class="action-buttons-fixed form-validation" action="{{ $product->exists ? route('update-product') : route('create-product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row mt-2">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-package"></i>
                                <h2 class="card-big-info-title">{{ __('products.information') }}</h2>
                                <p class="card-big-info-desc">{{ __('products.information-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.text', ['label' => __('products.name'), 'required' => true, 'input' => 'name',  'value' => $product->name, 'placeholder' => __('products.name'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="50" autocomplete="off" autofocus'])
                                @include('app.includes.forms.textarea', ['label' =>  __('forms.description'), 'required' => true, 'input' => 'description',  'value' => $product->description, 'placeholder' => __('forms.description'), 'paddingBottom' => false, 'rows' => 3])
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <i class="card-big-info-icon bx bx-camera"></i>
                                <h2 class="card-big-info-title">{{ __('products.images') }}</h2>
                                <p class="card-big-info-desc">{{ __('products.images-description') }}</p>
                                <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                @include('app.includes.forms.image', [
                                            'label' => __('forms.main-image'),
                                            'required' => !($product->exists && Storage::disk('public')->exists('/products/carousel/'.$product->id. '-1.jpg')),
                                            'input' => 'image',
                                            'paddingBottom' => false,
                                            'previewFile' => true,
                                            'previewPath' => '/products/single/'.$product->id,
                                            'showDelete' => false,
                                            'help' => __('forms.help-image')
                                ])
                                <div class="form-group row align-items-center pb-3">
                                    <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('products.extra-images') }}</label>
                                    <div class="col-lg-7 col-xl-6">
                                        <div class="toggle toggle-extra-images" data-plugin-toggle>
                                            <section @class(['toggle', 'active' => $product->exists && $hasExtraImages])>
                                                <label>{{ __('products.upload-more') }}</label>
                                                <div class="toggle-content">
                                                    @for($x = 2; $x <= 5; $x++)
                                                        @include('app.includes.image-input', ['model' => 'product', 'folder' => 'products', 'name' => 'image-'.$x, 'number' => $x])
                                                    @endfor
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <section class="card card-modern card-big-info">
                    <div class="card-body">
                        <div id="tabs-product" class="tabs-modern row">
                            <div class="col-lg-2-5 col-xl-1-5">
                                <div class="nav flex-column tabs" id="tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link @if($errors->has('regular-price') || $errors->has('sale-price')) active bg-danger text-white @endif @if(old('_token') === null) active @endif" id="price-tab" data-bs-toggle="pill" data-bs-target="#price" role="tab" aria-controls="price" aria-selected="true">{{ __('products.price') }}</a>
                                    <a class="nav-link @if($errors->has('categories')) active bg-danger text-white @endif" id="categories-tab" data-bs-toggle="pill" data-bs-target="#categories" role="tab" aria-controls="categories" aria-selected="false">{{ __('products.categories') }}</a>
                                    <a class="nav-link @if($errors->has('sku') || $errors->has('characteristics')) active bg-danger text-white @endif" id="attributes-tab" data-bs-toggle="pill" data-bs-target="#attributes" role="tab" aria-controls="attributes">{{ __('products.attributes-stock') }}</a>
                                    <a class="nav-link @if($errors->has('width') || $errors->has('height') || $errors->has('length') || $errors->has('weight')) active bg-danger text-white @endif" id="shipping-tab" data-bs-toggle="pill" data-bs-target="#shipping" role="tab" aria-controls="shipping">{{ __('products.shipping') }}</a>
                                    <a class="nav-link @if($errors->has('extra')) active bg-danger text-white @endif" id="other-options-tab" data-bs-toggle="pill" data-bs-target="#options" role="tab" aria-controls="options">{{ __('products.other-options') }}</a>
                                </div>
                                <p class="card-big-info-desc m-4"><small>* {{ __('forms.required-fields') }}</small></p>
                            </div>
                            <div class="col-lg-3-5 col-xl-4-5">
                                <div class="tab-content" id="tabContent">
                                    <div id="price" @class(['tab-pane fade', 'show active' => old('_token') === null || $errors->has('regular-price') || $errors->has('sale-price')]) role="tabpanel" aria-labelledby="price-tab">
                                        @include('app.includes.forms.number', ['label' => __('products.regular-price'), 'required' => true, 'input' => 'regular-price',  'value' => $product->regular_price, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                        @include('app.includes.forms.number', ['label' => __('products.sale-price'), 'required' => true, 'input' => 'sale-price',  'value' => $product->sale_price, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                    </div>
                                    <div id="categories" @class(['tab-pane fade', 'show active' => $errors->has('categories')]) role="tabpanel" aria-labelledby="categories-tab">
                                        <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('categories')])>
                                            <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">{{ __('products.categories') }}</label>
                                            <div class="col-lg-7 col-xl-6">
                                                @foreach($categories as $category)
                                                    @include('app.includes.forms.inputs.checkbox', ['label' => __('users.block-user'), 'input' => 'checkbox-cat-'. $category->id, 'name' => 'categories[]', 'value' => $category->id,  'paddingBottom' => true, 'danger' => false, 'labelTwo' => $category->name, 'checked' => old('categories.'.$category->id) || $product->categories->contains('id', $category->id)])
                                                @endforeach
                                                @if($errors->has('categories'))
                                                    <label id="categories-error" class="error" for="categories">{{ $errors->first('categories') }}</label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div id="attributes" @class(['tab-pane fade', 'show active' => $errors->has('characteristics')]) role="tabpanel" aria-labelledby="attributes-tab">
                                        @include('app.includes.forms.text', ['label' => __('products.sku'), 'required' => false, 'input' => 'sku',  'value' => $product->sku, 'placeholder' => __('products.sku'), 'paddingBottom' => true, 'data' => 'minlength="2" maxlength="50"'])
                                        @foreach($attributes as $attribute)
                                            <div @class(['form-group row align-items-center pb-3', 'has-error' => $errors->has('characteristics')])>
                                                <label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0 border-end">{{ $attribute->name }}</label>
                                                <div class="col-lg-7 col-xl-6">
                                                    <div class="row">
                                                        @foreach($attribute->characteristics as $characteristic)
                                                            <div class="col-auto mx-3 checkbox-custom checkbox-default">
                                                                <input id="checkbox-char-{{ $characteristic->id }}" name="characteristics[]" type="checkbox" value="{{ $characteristic->id }}" @if(old('characteristics.'.$characteristic->id) || $product->characteristics->contains('id', $characteristic->id)) checked @endif>
                                                                <label for="checkbox-char-{{ $characteristic->id }}" class="my-2">
                                                                    {{ $characteristic->name }}
                                                                </label>
                                                                <input id="stock-char-{{ $characteristic->id }}" name="stocks[]" type="number" class="form-control form-control-modern" @if($product->characteristics->contains('id', $characteristic->id)) value="{{ $product->characteristics->find($characteristic->id)->pivot->stock }}" @elseif(old('stocks.'.$characteristic->id)) value="{{ old('stocks.'.$characteristic->id) }}" @endif  placeholder="0">
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if($errors->has('characteristics'))
                                            <label id="characteristics-error" class="error" for="characteristics">{{ $errors->first('characteristics') }}</label>
                                        @endif
                                        @include('app.includes.forms.checkbox', ['label' => __('products.hide-stock'), 'input' => 'blocked', 'paddingBottom' => true, 'danger' => true, 'labelTwo' => __('products.stock-management'), 'checked' => old('stock-management', $product->stock_management)])
                                    </div>
                                    <div id="shipping" @class(['tab-pane fade', 'show active' => $errors->has('width') || $errors->has('height') || $errors->has('length') || $errors->has('weight')]) role="tabpanel" aria-labelledby="shipping-tab">
                                        @include('app.includes.forms.number', ['label' => __('products.width'). ' ('.$settings['shipping_length_unity']->value.')', 'required' => false, 'input' => 'width',  'value' => $product->width, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                        @include('app.includes.forms.number', ['label' => __('products.height'). ' ('.$settings['shipping_length_unity']->value.')', 'required' => false, 'input' => 'height',  'value' => $product->height, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                        @include('app.includes.forms.number', ['label' => __('products.length'). ' ('.$settings['shipping_length_unity']->value.')', 'required' => false, 'input' => 'length',  'value' => $product->length, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                        @include('app.includes.forms.number', ['label' => __('products.weight'). ' ('.$settings['shipping_weight_unity']->value.')', 'required' => false, 'input' => 'weight',  'value' => $product->length, 'placeholder' => 0, 'paddingBottom' => true, 'help' => __('products.help-price')])
                                    </div>
                                    <div id="options" @class(['tab-pane fade', 'show active' => $errors->has('extra')]) role="tabpanel" aria-labelledby="other-options-tab">
                                        @include('app.includes.forms.checkbox', ['label' => __('products.new'), 'input' => 'new', 'paddingBottom' => true, 'danger' => false, 'labelTwo' => __('products.new-label'), 'checked' => old('new', $product->new)])
                                        @include('app.includes.forms.checkbox', ['label' => __('products.featured'), 'input' => 'featured', 'paddingBottom' => true, 'danger' => false, 'labelTwo' => __('products.featured-label'), 'checked' => old('featured', $product->featured)])
                                        @include('app.includes.forms.checkbox', ['label' => __('products.virtual'), 'input' => 'virtual', 'paddingBottom' => true, 'danger' => false, 'labelTwo' => __('products.virtual-label'), 'checked' => old('virtual', $product->virtual)])
                                        @include('app.includes.forms.checkbox', ['label' => __('products.hidden'), 'input' => 'hidden', 'paddingBottom' => true, 'danger' => false, 'labelTwo' => __('products.hidden-label'), 'checked' => old('hidden', $product->hidden)])
                                        @include('app.includes.forms.textarea', ['label' =>  __('products.extra'), 'required' => false, 'input' => 'extra',  'value' => $product->extra, 'placeholder' => __('products.extra'), 'paddingBottom' => false, 'rows' => 6])
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('app.includes.seo', ['item' => $product])
        <div class="row action-buttons">
            <div class="col-12 col-md-auto">
                <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                    <i class="bx bx-save text-4 me-2"></i> Guardar producto
                </button>
            </div>
            <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                <a href="{{ route('products') }}" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Cancelar</a>
            </div>
            @if($product->exists)
                <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                    <button id="{{ $product->id }}" type="button" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                        <i class="bx bx-trash text-4 me-2"></i> Borrar producto
                    </button>
                </div>
                <input name="id" type="hidden" value="{{ $product->id }}">
            @endif
        </div>
    </form>
@endsection

@section('js')
    <script src="{{ asset('app/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        (function($) {
            'use strict';

            @include('app.includes.scripts.pnotify')

            $('.image-popup-no-margins').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                    verticalFit: true
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't forget to change the duration also in CSS
                }
            });

            @if($product->exists)
                $('.delete-button').on( 'click', function () {
                    let url = '{{ route("delete-product", ":id") }}';
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "Una vez borrado, no podrás recuperar este producto.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, eliminar.',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = url.replace(':id', $(this).attr('id'));
                        } else {
                            Swal.fire('El producto está a salvo.')
                        }
                    });
                });
            @endif

            tinymce.init({
                selector: 'textarea#description',
                menu: {
                    happy: { title: 'View', items: 'code' }
                },
                toolbar: 'undo redo | blocks  bold italic | bullist numlist link | alignleft aligncenter alignright alignjustify  | removeformat ',
                plugins: [
                    'code', 'checklist', 'visualblocks',  'lists','link','preview','fullscreen', 'wordcount'
                ],
                menubar: 'happy',
                height: 400
            });

        }(jQuery));
    </script>
@endsection
