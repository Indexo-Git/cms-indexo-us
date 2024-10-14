@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
    <link rel="stylesheet" href="{{ asset('web/css/venobox.css') }}">
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-7">
                    <h1>SEO Agency.<br><small class="text-muted">Be the #1 in Colorado</small></h1>
                    <h4 class="mb-3">Secure your brand's visibility in Colorado with our tailored SEO services:</h4>
                    <ul class="list-none list-sign mb-3">
                        <li>SEO audit</li>
                        <li>Keyword Research</li>
                        <li>On-site optimization</li>
                        <li>SEO Content</li>
                        <li>Link Building</li>
                    </ul>
                    <a href="{{ route('contact') }}" class="btn-common btn-common-2 radius-50">
                        Contact us
                    </a>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/services/seo.svg') }}" alt="Search Engine Optimization SEO">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="services-area pt-100 pt-sm-80 pb-77 pb-sm-57">
        <div class="container z-index">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4">
                    <div class="section-title">
                        <h2>SEO Services.</h2>
                    </div>
                    <div class="service-single style-3 style-5 mt-85 mt-sm-45">
                        <img src="{{ asset('web/svg/services/seo/seo-check.svg') }}" class="img-fluid mb-3" alt="SEO Audit Vector">
                        <div class="service-single-brief">
                            <h4>SEO audit</h4>
                            <p>Any SEO campaign should start by analyzing your website, identifying areas to focus our SEO actions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="service-single style-3 style-5 mt-50 mt-sm-0">
                        <img src="{{ asset('web/svg/services/seo/seo-keyword-search.svg') }}" class="img-fluid mb-3" alt="SEO Keyword Search Vector">
                        <div class="service-single-brief">
                            <h4>Keyword Research</h4>
                            <p>Analyzing search engine result pages (SERP), identifying keywords to design an effective SEO strategy.</p>
                        </div>
                    </div>
                    <div class="service-single style-3 style-5 mt-30">
                        <img src="{{ asset('web/svg/services/seo/seo-onsite.svg') }}" class="img-fluid mb-3" alt="SEO Onsite Optimization Vector">
                        <div class="service-single-brief">
                            <h4>On-site optimization</h4>
                            <p>Optimize your website's code structure, metadata, and content for better search engine visibility.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="service-single style-3 style-5">
                                <img src="{{ asset('web/svg/services/seo/seo-content.svg') }}" class="img-fluid mb-3" alt="SEO Content Vector">
                                <div class="service-single-brief">
                                    <h4>SEO Content</h4>
                                    <p>Optimized content for search engines and user engagement, increasing your conversion rates.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="service-single style-3 style-5 mt-30">
                                <img src="{{ asset('web/svg/services/seo/seo-link.svg') }}" class="img-fluid mb-3" alt="SEO Link Building Vector">
                                <div class="service-single-brief">
                                    <h4>Link Building</h4>
                                    <p>Faster SEO results can be obtained with high-quality backlinks, increasing your credibility.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-40 text-center">
                        <h2>Do I Need <span class="highlight">SEO</span>?</h2>
                        <p class="mt-15">If you have searched for your services on search engines like <i>Google</i> and you are not in the results, while your competition stands out, then it is crucial to take steps to improve your online presence.</p>
                        <p>The solution to this is <strong>Search Engine Optimization</strong>, which will help you stand out in search results and attract more visitors to your website.</p>
                        <picture>
                            <source srcset="{{ asset('web/gifs/lookthatup.webp') }}" type="image/webp">
                            <img class="my-5 rounded" src="{{ asset('web/gifs/lookthatup.png') }}" alt="SEO in Colorado gif">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-area bg-primary overlay">
        <div class="container">
            <div class="row height-520 align-items-center">
                <div class="col-lg-12">
                    <div class="video-text text-center">
                        <a class="venobox play-btn" data-gall="gall-video" data-autoplay="true" data-vbtype="video" href="https://www.youtube.com/watch?v=3KtWfp0UopM">
                            <i class="fa fa-play-circle-o fa-lg" style="font-size: 5em"></i>
                        </a>
                        <div class="wow fadeInUp" data-wow-delay=".4s">
                            <h2>Is your brand visible?</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay=".5s">
                            <p>SEO continues to boom and is expected to reach $129.6 billion by 2030.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center mb-5">
                        <h2>The Process for Good <span class="highlight">SEO</span>.</h2>
                        <p class="mt-15">To achieve effective SEO optimization, it is essential to follow a series of key steps. The results can vary depending on the depth with which these steps are carried out.</p>
                        <p>That's why we offer three different approaches depending on your goals and the stage you are at.</p>
                    </div>
                    <div class="the-history">
                        <ul>
                            <li>
                                <div class="history-start pr-45 text-right">
                                    <h4>Show Your Human Side</h4>
                                </div>
                                <div class="history-year">
                                    <h2>1</h2>
                                </div>
                                <div class="history-brief pl-45">
                                    <h3>Content Strategy</h3>
                                    <p>Valuable content is paramount for SEO success. We will provide you with a tailored list of content recommendations aligned with your business objectives.</p>
                                </div>
                            </li>
                            <li>
                                <div class="history-brief  pr-50 text-right">
                                    <h3>Optimization</h3>
                                    <p>Enhancing your website's performance is crucial. This involves optimizing every section, focusing on navigation and speed. By doing so, your website visitors will easily and quickly find what they need.</p>
                                </div>
                                <div class="history-year">
                                    <h2>2</h2>
                                </div>
                                <div class="history-start pl-50">
                                    <h4>Improve Your Website Performance</h4>
                                </div>
                            </li>
                            <li>
                                <div class="history-start pr-50 text-right">
                                    <h4>Site Launch</h4>
                                </div>
                                <div class="history-year">
                                    <h2>3</h2>
                                </div>
                                <div class="history-brief pl-50">
                                    <h3>Request Indexing</h3>
                                    <p>To appear in search results, your website must be recognized by search engines through indexing. This step requires proper requests and is not based on magic but on effective strategies.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="typography-area py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blockquotes pb-3">
                        <div class="blockquote style-1 mt-30">
                            <p>The best place to hide a dead body is on page 2 of Google.</p>
                            <p class="font-weight-light"><small>- <i>Albert Einstein</i> (or someone)</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3><span class="highlight seo-hl">SEO</span> FAQ's</h3>
                    </div>
                </div>
            </div>
            <div class="row mt-70">
                <div class="col-lg-12">
                    <div id="accordionTwo" class="mb-5">
                        <div class="card single-faq">
                            <div class="card-header faq-heading style-2" id="headingSix">
                                <h5>
                                    <a href="#collapseSix" class="btn btn-link" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <span>What is SEO and How Does it Work?</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionTwo">
                                <div class="card-body">
                                    <p>SEO, which stands for <strong>'Search Engine Optimization'</strong>, is a strategy that aims to improve the visibility of a website in search engines like Google, Bing, or Yahoo, <strong>organically</strong>, that is, without the need to pay to appear in the results.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card single-faq">
                            <div class="card-header faq-heading style-2" id="headingNine">
                                <h5>
                                    <a href="#collapseNine" class="btn btn-link" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <span>How Long Does SEO Take?</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionTwo">
                                <div class="card-body">
                                    <p>When we make a request to index your site, it is practically immediate, but the position obtained at that moment will not be relevant. That is, initially, the website may appear on the first page of results or on the ninth, to give an example. From there, it is the agency's job to improve the site's position.</p>
                                    <p>The time to rank depends on various factors such as the strength of the search, the number of competitors within the same, the speed of the site, its adaptability to mobile devices, etc. After having analyzed and confirmed the content, relevance, and quality of your website, Google decides if you can be in the top places.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card single-faq">
                            <div class="card-header faq-heading style-2" id="headingEight">
                                <h5>
                                    <a href="#collapseEight" class="btn btn-link" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        <span>Is SEO the Same as Google Adwords?</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionTwo">
                                <div class="card-body">
                                    <p>No. Both are Digital Marketing techniques, but SEO makes you appear in search results naturally, that is, through a strategy and without having to pay anything to the search engine.</p>
                                    <p>Adwords campaigns are known as PPC, or 'Pay Per Click'. In this strategy, the website owner pays Google, and this allows appearing at the top of the search results, alongside a legend that indicates it is an advertisement. Each user click on the ad will deduct money from the budget dedicated to the campaign. As such, the ad and the page disappear from the top search results once the budget runs out.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card single-faq">
                            <div class="card-header faq-heading style-2" id="headingTen">
                                <h5>
                                    <a href="#collapseTen" class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        <span>What Advantage Does SEO Have Over Google Adwords?</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionTwo">
                                <div class="card-body">
                                    <p>Even though these strategies are not comparable, the main difference is that once an agency positions a website with SEO, the website will not quickly lose its achieved position. With Google AdWords, you immediately disappear once the budget assigned to the campaign is finished.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card single-faq">
                            <div class="card-header faq-heading style-2" id="headingSeven">
                                <h5>
                                    <a href="#collapseSeven" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSeven">
                                        <span>Why Focus on Google?</span>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionTwo">
                                <div class="card-body">
                                    <p>Google covers between 86% and 91% of all web searches generated worldwide for more than 10 years. This makes it the best search engine on which to develop an SEO campaign.<sup>1</sup></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-5">Sources</h4>
                    <p><a href="https://www.statista.com/statistics/216573/worldwide-market-share-of-search-engines/">1. Worldwide desktop market share of leading search engines from January 2010 to January 2020 <i class="fa fa-external-link"></i></a></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('web/js/venobox.min.js') }}"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $('.venobox').venobox();
            });
        })(jQuery);
    </script>
@endsection

