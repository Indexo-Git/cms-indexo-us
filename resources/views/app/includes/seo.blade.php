<div class="row">
    <div class="col">
        <section class="card card-modern card-big-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2-5 col-xl-1-5">
                        <i class="card-big-info-icon bx bx-search"></i>
                        <h2 class="card-big-info-title">{{ __('seo.search-engine-optimization') }}</h2>
                        <p class="card-big-info-desc">{{ __('seo.meta-data') }}</p>
                        <p class="card-big-info-desc"><small>* {{ __('forms.required-fields') }}</small></p>
                        <h5 class="font-weight-semibold text-dark text-uppercase mt-5">{{ __('words.example') }}</h5>
                        <a class="image-popup-no-margins" href="{{ asset('app/img/en/meta-data.jpg') }}">
                            <picture>
                                <source srcset="{{ asset('app/img/en/meta-data.webp') }}" type="image/webp">
                                <img class="img-fluid" src="{{ asset('app/img/en/meta-data.jpg') }}" alt="Meta Data">
                            </picture>
                        </a>
                    </div>
                    <div class="col-lg-3-5 col-xl-4-5">
                        @include('app.includes.forms.text', [
                            'label' => __('seo.meta-title'),
                            'required' => true,
                            'input' => 'meta-title',
                            'value' => $item->meta_title,
                            'placeholder' => __('seo.meta-title'),
                            'paddingBottom' => true,
                            'help' => __('seo.meta-title-help',['min' => $settings['meta_title_min_length']->value, 'max' => $settings['meta_title_max_length']->value]),
                            'extraHelp' => '<span id="meta-title-state" class="">'.__('words.characters').': <span id="meta-title-help"></span></span>',
                            'data' => 'autocomplete="off" onkeyup="metaTitleKeyUp()"'
                        ])
                        @include('app.includes.forms.textarea', [
                            'label' =>  __('seo.meta-description'),
                            'required' => true,
                            'input' => 'meta-description',
                            'value' => $item->meta_description,
                            'placeholder' => __('seo.meta-description'),
                            'paddingBottom' => true,
                            'help' => __('seo.meta-description-help',['min' => $settings['meta_description_min_length']->value, 'max' => $settings['meta_description_max_length']->value]),
                            'extraHelp' => '<span id="meta-description-state" class="">'.__('words.characters').': <span id="meta-description-help"></span></span>',
                            'data' => 'onkeyup="metaDescriptionKeyUp()"'
                        ])
                        @include('app.includes.forms.textarea', ['label' =>  __('seo.keywords'), 'required' => true, 'input' => 'keywords',  'value' => $item->keywords, 'placeholder' => __('seo.keywords'), 'paddingBottom' => false, 'help' => __('seo.keywords-help')])
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        let metaTitle =  document.getElementById('meta-title');
        let metaTitleHelp = document.getElementById('meta-title-help');
        let metaTitleState = document.getElementById('meta-title-state');

        let metaDescription = document.getElementById('meta-description');
        let metaDescriptionHelp = document.getElementById('meta-description-help');
        let metaDescriptionState = document.getElementById('meta-description-state');

        metaTitleHelp.innerHTML = metaTitle.value.length;
        metaTitleState.classList.add((metaTitle.value.length >= {{ $settings['meta_title_min_length']->value }}) ? 'text-success' : 'text-danger');
        metaDescriptionHelp.innerHTML = metaDescription.value.length;
        metaDescriptionState.classList.add((metaDescription.value.length >= {{ $settings['meta_description_min_length']->value }}) ? 'text-success' : 'text-danger');

        function metaTitleKeyUp() {
            metaTitleHelp.innerHTML = metaTitle.value.length;
            if (metaTitle.value.length >= {{ $settings['meta_title_min_length']->value }}) {
                if (metaTitle.value.length < {{ $settings['meta_title_max_length']->value }}) {
                    metaTitleState.classList.add('text-success');
                    metaTitleState.classList.remove('text-danger');
                }
            } else {
                metaTitleState.classList.add('text-danger');
                metaTitleState.classList.remove('text-success');
            }
        }

        function metaDescriptionKeyUp() {
            metaDescriptionHelp.innerHTML = metaDescription.value.length;
            if (metaDescription.value.length >= {{ $settings['meta_description_min_length']->value }}) {
                if (metaDescription.value.length >= {{ $settings['meta_description_max_length']->value }}) {
                    metaDescriptionState.classList.add('text-success');
                    metaDescriptionState.classList.remove('text-danger');
                }
            } else {
                metaDescriptionState.classList.add('text-danger');
                metaDescriptionState.classList.remove('text-success');
            }
        }
    </script>
</div>
