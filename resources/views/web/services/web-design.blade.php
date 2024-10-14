@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-7">
                    <h1>Web Design.<br><small class="text-muted">New Agency in Colorado</small></h1>
                    <h4 class="mb-3">Crafting stunning web designs across Colorado.</h4>
                    <ul class="list-none list-sign">
                        <li>5 Content Sections.</li>
                        <li>1 Contact form.</li>
                        <li>Indexing on Google.</li>
                        <li>Optimized loading time</li>
                    </ul>
                    <br>
                    <a id="download-quote-web-design" href="{{ asset('web/quotes/Web_Design_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Quote
                    </a>
                </div>
                <div class="col-lg-5 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/services/web-design.svg') }}" alt="Web Design">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cta-area my-5 mt-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner bg-fb5c71 br-radius-10">
                        <div class="row height-180 align-items-center">
                            <div class="col-lg-9">
                                <div class="cta-text">
                                    <h3>Exclusive Neighborhood Offer!</h3>
                                    <p>Are you a Colorado-based business owner aiming to establish a robust online presence?</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="cta-btn text-right">
                                    <a href="{{ route('neighborhood-offer') }}" class="btn-common mt-sm-25">Check offer!</a>
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
                <div class="col-lg-7">
                    <div class="section-title mb-40">
                        <h2>Now in Colorado!</h2>
                        <p class="mt-15">We're thrilled to announce that we've recently established our base in <strong>Wheat Ridge</strong>, Colorado! Having honed our expertise over many years, we bring a wealth of experience in <strong>web design</strong> and digital strategy to the local market.</p>
                        <p>Our move represents a commitment to not only grow our business but to also empower local Colorado businesses with <strong>digital solutions</strong>.</p>
                    </div>
                </div>
                <div class="col-lg-5 mt-md-5 mt-sm-50">
                    <img src="{{ asset('web/gifs/colorado.gif') }}" alt="Web design in Colorado gif" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Portfolio</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-45 justify-content-center">
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://utahinjury.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-16.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-16.jpg') }}" alt="Young & Young Law">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://utahinjury.com/">Young & Young Law</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://utahinjury.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://measuretwicecorp.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-17.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-17.jpg') }}" alt="Measure Twice">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://measuretwicecorp.com/">Measure Twice</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://measuretwicecorp.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://mgroupbrokers.ch/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-09.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-09.jpg') }}" alt="M Group Brokers">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://mgroupbrokers.ch/">M Group Brokers</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://mgroupbrokers.ch/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://hernandezcortes.github.io/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-11.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-11.jpg') }}" alt="Danae Hernandez">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://hernandezcortes.github.io/">Danae Hernandez</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://hernandezcortes.github.io/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <span class="special-action-blank" data-target="https://sandraaguilargomez.com/">
                                <picture>
                                    <source srcset="{{ asset('web/webp/web-design/web-design-20.webp') }}" type="image/webp">
                                    <img src="{{ asset('web/images/web-design/web-design-20.jpg') }}" alt="Sandra Aguilar-Gomez">
                                </picture>
                            </span>
                        </div>
                        <div class="blog-desc">
                            <h3><span class="special-action-blank" data-target="https://sandraaguilargomez.com/">Sandra Aguilar-Gomez</span></h3>
                        </div>
                        <span class="special-action-blank enter-arrow" data-target="https://sandraaguilargomez.com/">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/webp/web-design/web-design-21.webp') }}" type="image/webp">
                                <img src="{{ asset('web/images/web-design/web-design-21.jpg') }}" alt="Website in construction">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Website in construction</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/webp/web-design/web-design-22.webp') }}" type="image/webp">
                                <img src="{{ asset('web/images/web-design/web-design-22.jpg') }}" alt="Website in construction">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Website in construction</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="blog-single style-2 text-center">
                        <div class="blog-thumb">
                            <picture>
                                <source srcset="{{ asset('web/gifs/website.webp') }}" type="image/webp">
                                <img class="rounded" src="{{ asset('web/gifs/website.png') }}" alt="Your future website gif" height="224">
                            </picture>
                        </div>
                        <div class="blog-desc">
                            <h3>Your Future Website</h3>
                        </div>
                        <span class="special-action enter-arrow" data-target="{{ route('neighborhood-offer') }}">
                            <i class="ti-arrow-right"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3>indexo <span class="highlight web-hl">Web Design</span> FAQ's</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-55 mt-40">
                        <div class="col-lg-12">
                            <div id="webDesignFAQ">
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingOne">
                                        <h5>
                                            <a href="#collapseOne" class="btn btn-link" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                                <span>1. Which industries does indexo prefer to collaborate with for web design?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>We enjoy working with new businesses, especially those that understand the importance of digital marketing and online presence. We particularly value clients who have a clear vision for their project's growth. Just as your business goals evolve, your website must also expand and adapt.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingTwo">
                                        <h5>
                                            <a href="#collapseTwo" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                                <span>2. What size companies in Colorado are ideal for indexo's web design services?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>The size of the company matters to us, but more crucial is our ability to communicate directly with decision-makers involved with their custom website. Time is precious, and we aim to use it efficiently without unnecessary delays.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingThree">
                                        <h5>
                                            <a href="#collapseThree" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                                <span>3. Which geographic areas does indexo primarily serve?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>Based in Wheat Ridge, Colorado, prioritizing local clients is essential for us. </p>
                                            <p>We're open to working with clients from any cultural background, and we particularly encourage Latino entrepreneurs to engage with us—también hablamos español!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingFour">
                                        <h5>
                                            <a href="#collapseFour" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                                <span>4. Why is indexo a superior choice for web design services in Colorado?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>We aim to be among the top web design agencies in Colorado by delivering high quality consistently. Rather than just delivering a product, we provide a powerful, beautiful, and scalable tool tailored to your needs.</p>
                                            <p>Our objective isn't to redesign your site every few years; instead, we seek a lasting partnership, continually aligning with your goals to deliver top-notch digital and marketing strategies.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingFive">
                                        <h5>
                                            <a href="#collapseFive" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFive">
                                                <span>5. What unique advantages does indexo offer to Colorado's web design market?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>Quality web development might seem expensive, but it doesn’t have to be. Unlike some agencies that may rush and produce ineffective websites, we offer competitively priced, high-quality solutions. We’re not just developers; we bring the magic of coding at a price comparable to any standard agency.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingSix">
                                        <h5>
                                            <a href="#collapseSix" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSix">
                                                <span>6. What is indexo's strongest web design value proposition?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>At indexo, we recognize that every business has unique needs and styles. We offer <strong>custom solutions</strong> tailored to your specific operational methods, ensuring your website adapts to your business, not the other way around.</p>
                                            <p>So, forget about <i>Wordpress</i> and other CMS platforms initially designed for purposes not aligned with modern business needs.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingSeven">
                                        <h5>
                                            <a href="#collapseSeven" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSeven">
                                                <span>7. What primary problem does indexo's web design service solve for Colorado businesses?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>Like social media managers who focus on likes, many web agencies only highlight aesthetics and traffic, neglecting that a website's primary function is to convert visitors into customers.</p>
                                            <p>We don’t just create custom websites; we equip them with real-time statistics tracking, call tracking, and interaction monitoring, ensuring every component of your site is designed to drive conversions.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingEight">
                                        <h5>
                                            <a href="#collapseEight" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseEight">
                                                <span>8. What does the price of the web design service depend on?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>We like to compare the creation of a website to the building of a house. In this sense, the sections or pages of the website are similar to the rooms or sections of a house. Therefore, the number and complexity of these directly influence the final price.</p>
                                            <p>The sections on a standard website are equivalent to what you would see in the menu or navigation bar: the home page, about us, services, gallery, contact, among others. Just like in a house, these sections can vary in size and features, such as having different types of content, interaction options, or specific details.</p>
                                            <p>The number of sections, features, and details on your website is generally directly related to the amount of information you plan to include. And no one knows better than you exactly how much information you need for your website. We invite you to use our quote calculator to get an accurate estimate of the tool you have in mind.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingTen">
                                        <h5>
                                            <a href="#collapseTen" class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                <span>9. How long does the development of a website take?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#webDesignFAQ">
                                        <div class="card-body">
                                            <p>If you are interested in our "standard" website quotation, the development time is 1 month, once the client provides the necessary information such as corporate identity, logos, texts, etc., a strategic development of quality content is initiated in four steps: visual design, construction, optimization, and launch.</p>
                                            <p>If you are requesting a customized website, the development is different and involves an undefined structure and development time.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="cta-area my-5 mt-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cta-inner bg-fb5c71 br-radius-10">
                        <div class="row height-180 align-items-center">
                            <div class="col-lg-9">
                                <div class="cta-text">
                                    <h3>Website Price</h3>
                                    <p>We invite you to use our <strong class="text-white">Calculator</strong> and start your website for your Colorado based business today.</p>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="cta-btn text-right">
                                    <a href="{{ route('website-cost-calculator') }}" class="btn-common mt-sm-25">Website Cost</a>
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
                <div class="col-lg-7">
                    <div class="section-title mb-40">
                        <h2>Mobile-First Web Design.</h2>
                        <p class="mt-15">We adhere to <a href="https://developers.google.com/search/docs/crawling-indexing/mobile/mobile-sites-mobile-first-indexing" target="_blank">Google’s <i class="fa fa-external-link"></i></a> best practices for mobile-first indexing and site optimization. Our web designs ensure seamless experiences across all devices, enhancing engagement and accessibility for <strong>mobile users</strong>.</p>
                        <p>Optimized for every screen, our websites adapt to mobile behaviors and preferences, ensuring your site looks great and functions perfectly, no matter where your customers are.</p>
                    </div>
                </div>
                <div class="col-lg-5 mt-sm-50 text-center">
                    <picture>
                        <source srcset="{{ asset('web/gifs/responsive.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/gifs/responsive.png') }}" alt="Responsive Web design in Colorado gif">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <div class="work-process-area bg-1 pt-65 pt-sm-45 pb-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2>Web Design Process.</h2>
                    </div>
                </div>
            </div>
            <div class="row work-process-inner mt-45">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-light-bulb"></i>
                        <h4>Design</h4>
                        <span>01</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-ruler-pencil"></i>
                        <h4>Construction</h4>
                        <span>02</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-bolt"></i>
                        <h4>Optimization</h4>
                        <span>03</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="process-single">
                        <i class="ti-rocket"></i>
                        <h4>Launch</h4>
                        <span>04</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mt-sm-40">
                    <h3>Visual Design.</h3>
                    <p>In this stage, we work on organizing text, graphics, and other multimedia objects provided by the client. It is important that before building the web page, there is a client-agency agreement on a sketch or pre-design.</p>
                    <h3>Construction.</h3>
                    <p>During construction, the basic elements of <strong>graphic design</strong> must work together with technical fundamentals, meaning alignment, color, and typography are as important as functionality, compatibility, and interactivity. This ensures that both the visual impact and user experience are an invitation for the user to contact the business or company in question.</p>
                </div>
                <div class="col-lg-5 pt-4 mt-sm-40">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/extras/design.svg') }}" alt="Web Design">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Optimization</h3>
                    <p>Statistics in 2005 told us that the number of websites was around 8 billion, with 4,400 new sites added daily. To achieve success in our organization, it is necessary to stand out in this sea of information, and <strong>optimization</strong> is a key factor in achieving this.</p>
                    <p>Among the main optimizations are responsive web design, which aims to adapt the same webpage to different screen sizes and orientations.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="banner-image dots-h">
                        <img class="img-fluid" src="{{ asset('web/svg/extras/launch.svg') }}" alt="Web Design">
                    </div>
                </div>
                <div class="col-md-7">
                    <p>Load speed, or <strong>web performance optimization</strong> (WPO), refers to the speed at which a website is downloaded and displayed to the user. This is achieved through various techniques resulting in greater user satisfaction, especially for those with slow internet connections and <strong>mobile device visitors</strong>.</p>
                    <p>And finally, <strong>search engine optimization</strong> or SEO: consists of optimizing content structure to improve the page's position in web search engines for one or more keywords.</p>
                    <h3>Launch</h3>
                    <p>Once the previous stages are completed, your site will be ready to promote on your social networks or to start an <strong>offsite SEO</strong> campaign.</p>
                    <p>To better understand the difference between onsite SEO and offsite SEO, consult our <a href="{{ url('search-engine-optimization-colorado') }}" title="Search Engine Optimization in Colorado">SEO services in Colorado</a> section.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="results-area bg-1 py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title text-white">
                        <h2>Key Facts and Stats.</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-45">
                <div class="col-lg-4">
                    <div class="result-single">
                        <i class="ti-thumb-up"></i>
                        <h2>94<sup>%</sup></h2>
                        <h4>of customers</h4>
                        <p>judge a company's credibility based on their experience on its website.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="result-single mt-sm-30">
                        <i class="ti-timer"></i>
                        <h2>3<sup>sec</sup></h2>
                        <h4>the loading speed</h4>
                        <p>of websites with much lower abandonment rates than their competition.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="result-single mt-sm-30">
                        <i class="ti-face-smile"></i>
                        <h2>75<sup>%</sup></h2>
                        <h4>of users</h4>
                        <p>claim to return to a website that has provided a positive experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cta-area my-5 mt-sm-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h4>References</h4>
                        <p><span class="special-action-blank" data-target="https://en.wikipedia.org/wiki/Web_design">1. Web Design <i class="fa fa-external-link"></i></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
