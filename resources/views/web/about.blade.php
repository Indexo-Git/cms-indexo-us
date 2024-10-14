@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col text-center my-5">
                    <img id="logo-letters" src="{{ asset('web/svg/cover-hands-correct.svg') }}" alt="indexo">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-1 py-md-100 pt-sm-0 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-45">
                        <h5 class="text-muted mb-0">Our journey</h5><br>
                        <h2>Roots and Vision.</h2>
                        <picture>
                            <source srcset="{{ asset('web/webp/about/about-00.webp') }}" type="image/webp">
                            <img class="mt-4 img-fluid rounded" src="{{ asset('web/images/about/about-00.jpg') }}" alt="Indexo Team">
                        </picture>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-md-5 py-md-5">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h4 class="mt-5">2016</h4>
                        <p class="mt-15">Jesús, working remotely for a French web development agency <i>Oh là là !</i>, noticed that many local businesses in his hometown were missing out on <b>high-quality digital services</b>.</p>
                        <p>Seeing this gap, he started offering tailored <b>web design solutions</b> to enhance professionalism and effectiveness.</p>
                    </div>
                </div>
                <div class="col-lg-6 py-4">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-01.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-01.jpg') }}" alt="Jesus in a French agency">
                    </picture>
                </div>
            </div>
            <div class="row py-md-5">
                <div class="col-lg-6 order-2 order-md-1">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-08.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-08.jpg') }}" alt="Jesus growing indexo team">
                    </picture>
                </div>
                <div class="col-lg-6 order-1 order-md-2">
                    <div class="section-title mb-45">
                        <h4 class="mt-5 mt-md-0">2017 ~ 2020</h4>
                        <p class="mt-15">Over the next few years, Jesús expanded his reach, working with <b>various professionals and agencies</b> on projects for businesses of different sizes and industries.</p>
                        <p>A common theme emerged: like community managers who flaunt social media likes, web professionals often showcased beautiful designs and user traffic. However, they overlooked the most crucial function—<b>a website must convert</b>. </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 py-5">
                    <div class="section-title text-center">
                        <h5 class="text-muted mb-0">This challenge sparked a question</h5><br>
                        <h4>How can we provide clients with tangible proof that their website is <span class="highlight">effectively converting</span>?</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h4 class="mt-5">2021</h4>
                        <p class="mt-15">The answer began to form when Jesús met Erika, a talented UX designer with a <b>keen eye for functional aesthetics</b>.</p>
                        <p>Together, they began tackling projects with <b>global clients</b> both in Mexico and the United States, merging top-notch design with functional utility.</p>
                    </div>
                </div>
                <div class="col-lg-6 py-4">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-06.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-06.jpg') }}" alt="Erika and Jesus tackling projects">
                    </picture>
                </div>
            </div>
            <div class="row py-md-5">
                <div class="col-lg-6 py-4 order-2 order-md-1">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-09.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-09.jpg') }}" alt="Jesus and Erika creating indexo in the US">
                    </picture>
                </div>
                <div class="col-lg-6 order-1 order-md-2">
                    <div class="section-title">
                        <h4 class="mt-5 mt-md-4">2023</h4>
                        <p class="mt-15">By 2023, Jesús was ready to fully commit to his vision. He left his 9 to 5 in order to focus solely on <b>building indexo</b>, which by then was a solid business growing steadily.</p>
                        <p>At indexo, we develop tools that help clients see the <b>real impact of their websites</b>, going beyond just having a digital presence to creating sites that actively drive business growth.</p>
                    </div>
                </div>
            </div>
            <div class="row py-md-5">
                <div class="col-lg-6">
                    <div class="section-title mb-45">
                        <h4 class="mt-5">2024</h4>
                        <p class="mt-15">Now based in <b>Wheat Ridge, Colorado</b>, indexo is poised for further expansion.</p>
                        <p>We don’t just build websites; we equip them with real-time statistics tracking—from phone calls and online forms to WhatsApp interactions—ensuring every component is <b>conversion-oriented</b>. </p>
                    </div>
                </div>
                <div class="col-lg-6 py-4">
                    <picture>
                        <source srcset="{{ asset('web/webp/about/about-05.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/images/about/about-05.jpg') }}" alt="Jesus and Erika in Colorado">
                    </picture>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 py-5">
                    <div class="section-title text-center">
                        <h6>If you want clear proof of where your business stood when you started working with us and where it stands now.</h6>
                        <h6 class="text-muted mb-0">Then, welcome to...</h6><br>
                        <img class="img-fluid mt-5 w-50" src="{{ asset('web/svg/logo-color.svg') }}" alt="indexo">
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('web.includes.cta')

@endsection


