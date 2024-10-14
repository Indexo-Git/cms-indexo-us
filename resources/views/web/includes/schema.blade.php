<script type="application/ld+json">
    {
        "@context": "http://schema.org",
        @switch($schema)
            @case(2)
                "@type": "CategoryCodeSet",
                "@id": "_{{ $category->id }}-{{ trim($category->name) }}",
                "name": "{{ $category->name }}",
                "hasCategoryCode": {
                    "@type": "CategoryCode",
                    "name": "{{ $category->name }}",
                    "description": "{{ $category->description }}",
                    "inCodeSet": "{{ $category->id }}"
                }
            @break;
            @case(3)
                "@type": "Product",
                "name": "{{ $product->name }}",
                "image": "{{ asset('storage/products/single/'.$product->id. '-1.jpg') }}",
                "description": "{{ $product->description }}",
                "offers": {
                    "@type": "Offer",
                    "url" : "{{ route('product', $product->url) }}",
                    "availability": "https://schema.org/InStock",
                    "price": "{{ $product->sale_price != 0 ? number_format($product->sale_price,2) : number_format($product->regular_price,2) }}",
                    "priceCurrency": "{{ $settings['priceCurrency']->value }}",
                    "itemCondition": "https://schema.org/NewCondition",
                    "priceValidUntil": "{{ date('31/12/Y') }}"
                },
                "url" : "{{ route('product', $product->url) }}"
                @if($product->sku)
                    ,"sku": "{{ $product->sku }}"
                @endif
                @if($product->categories->count())
                    ,"category" : "@foreach($product->categories as $category) {{ $category->name }} @endforeach"
                @endif
            @break
            @case(4)
                "@type": "Service",
                "serviceType": "{{ $title}}",
                "description": "{{ $description }}",
                "provider": {
                    "@type": "{{ $settings['schema_type']->value }}",
                    "name": "{{ $settings['website_name']->value }}",
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "{{ $settings['addressCountry']->value }}",
                        "addressLocality" : "{{ $settings['city']->value}}",
                        "addressRegion" : "{{ $settings['region']->value }}",
                        "postalCode" : "{{ $settings['postal_code']->value }}",
                        "streetAddress" : "{{ $settings['address']->value }}"
                    },
                    "telephone" : "{{ $settings['phone']->value }}",
                    "email": "{{ $settings['email']->value }}",
                    "url": "{{ route('index') }}",
                    "image" : "{{ $metaImage ?? asset('web/images/meta/meta-default.jpg') }}",
                    "priceRange": "{{ $settings['priceRange']->value }}"
                },
                "areaServed": {
                    "@type": "Country",
                    "name": "{{ $settings['addressCountry']->value }}"
                },
                "hasOfferCatalog": {
                    "@type": "OfferCatalog",
                    "name": "{{ $title}}"
                }
            @break
            @case(5)
                "@type": "BlogPosting",
                "@id": "{{ route('single', $post->url) }}",
                "mainEntityOfPage": "{{ route('single', $post->url) }}",
                "headline": "{{ $title }}",
                "name": "{{ $title }}",
                "description": "{{ $description }}",
                "datePublished": "{{ $post->created_at->format('d/m/Y') }}",
                "dateModified": "{{ $post->updated_at->format('d/m/Y') }}",
                "publisher": {
                    "@type": "{{ $settings['schema_type']->value }}",
                    "name": "{{ $settings['website_name']->value }}",
                    "url": "{{ route('index') }}",
                    "telephone" : "{{ $settings['phone']->value }}",
                    "address": {
                        "@type": "PostalAddress",
                        "addressCountry": "{{ $settings['addressCountry']->value }}",
                        "addressLocality" : "{{ $settings['city']->value}}",
                        "addressRegion" : "{{ $settings['region']->value }}",
                        "postalCode" : "{{ $settings['postal_code']->value }}",
                        "streetAddress" : "{{ $settings['address']->value }}"
                    }
                },
                "image": {
                    "@type": "ImageObject",
                    "@id": "{{ asset('storage/posts/'.$post->id.'.jpg') }}",
                    "url": "{{ asset('storage/posts/'.$post->id.'.jpg') }}"
                },
                "url": "{{ route('single', $post->url) }}",
                "isPartOf": {
                    "@type" : "Blog",
                    "@id": "{{ route('blog') }}",
                    "name": "Blog {{ $settings['website_name']->value }}",
                    "publisher": {
                        "@type": "Organization",
                        "@id": "{{ route('index') }}",
                        "name": "{{ $settings['website_name']->value }}"
                    }
                },
                "wordCount": "{{ str_word_count($post->content) }}",
                "keywords": {!! json_encode(array_map('trim', explode(',', $keywords)), JSON_UNESCAPED_UNICODE | JSON_HEX_APOS) !!}
            @break
            @default
                "@type": "{{ $settings['schema_type']->value }}",
                "name": "{{ $settings['website_name']->value }}",
                "address": {
                    "@type": "PostalAddress",
                    "addressCountry": "{{ $settings['addressCountry']->value }}",
                    "addressLocality" : "{{ $settings['city']->value}}",
                    "addressRegion" : "{{ $settings['region']->value }}",
                    "postalCode" : "{{ $settings['postal_code']->value }}",
                    "streetAddress" : "{{ $settings['address']->value }}"
                },
                "areaServed": {
                    "@type": "PostalAddress",
                    "addressCountry": "{{ $settings['addressCountry']->value }}"
                },
                "telephone" : "{{ $settings['phone']->value }}",
                "email": "{{ $settings['email']->value }}",
                "url": "{{ route('index') }}",
                "image" : "{{ $metaImage ?? asset('web/images/meta/meta-default.jpg') }}",
                "description" : "{{ $description ?: $settings['schema_type']->value }}",
                "currenciesAccepted": "{{ $settings['priceCurrency']->value }}",
                "priceRange": "{{ $settings['priceRange']->value }}",
                "openingHours": "{{ $settings['openingHours']->value }}",
                "aggregateRating": {
                    "@type": "AggregateRating",
                    "ratingValue": "4.8",
                    "reviewCount": "6"
                },
                @if($settings['payment_active']->value)
                    "paymentAccepted": [
                        "Credit/debit card",
                        "Check",
                        "Money order"
                    ]
                @endif
        @endswitch
    }
</script>
