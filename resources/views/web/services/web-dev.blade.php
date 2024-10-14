@extends('layouts.web')

@section('schema')
    @include('web.includes.schema')
@endsection

@section('content')
    @include('web.services.includes.nav')
    <div class="banner-area py-100 pt-sm-100 pb-sm-80">
        <div class="container">
            <div class="row banner-caption align-items-center text-sm-center text-lg-left">
                <div class="col-lg-6">
                    <h1>Web Development<br><small class="text-muted">in Colorado.</small></h1>
                    <h4 class="mb-3">Developing robust web-apps and solutions for Colorado businesses.</h4>
                    <ul class="list-none list-sign">
                        <li>Complete Customization.</li>
                        <li>Cutting-edge technology.</li>
                        <li>Commitment to Delivery Times.</li>
                        <li>Support and maintenance.</li>
                    </ul>
                    <br>
                    <a id="download-quote-web-dev" href="{{ asset('web/pricing/Web_Dev_2024.pdf') }}" class="btn-common btn-common-2 radius-50" download>
                        <i class="fa fa-download mr-1"></i> Download Pricing
                    </a>
                </div>
                <div class="col-lg-6 mt-sm-40">
                    <div class="banner-image dots-h">
                        <picture>
                            <source srcset="{{ asset('web/svg/services/dev.svg') }}" type="image/webp">
                            <img class="img-fluid" src="{{ asset('web/svg/services/dev.png') }}" alt="Web Development Colroado gif">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-md-5 mt-sm-50">
                    <picture>
                        <source srcset="{{ asset('web/gifs/coding.webp') }}" type="image/webp">
                        <img class="img-fluid rounded" src="{{ asset('web/gifs/coding.png') }}" alt="Web development in Colorado gif">
                    </picture>
                </div>
                <div class="col-lg-8">
                    <div class="section-title mb-40">
                        <h2>New Web Developers in Colorado!</h2>
                        <p class="mt-15">At indexo, we've recently established our presence in Colorado, specializing in custom web development and design. Our team is dedicated to crafting user-friendly <strong>web applications</strong> and providing meticulous development services that pay close attention to every detail.</p>
                        <p>By partnering with indexo, you ensure your projects benefit from our expertise in creating <strong>high-quality</strong>, custom web solutions designed to enhance your business's growth and long-term success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-100 pt-sm-90 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <div class="section-title mb-40">
                        <h2>Technologies</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/react.svg') }}" alt="React">
                </div>
                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/openai.svg') }}" alt="Open AI">
                </div>
                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/javascript.svg') }}" alt="Javascript">
                </div>
                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/node.svg') }}" alt="Node JS">
                </div>
                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/laravel.svg') }}" alt="Laravel">
                </div>


                <div class="col-6 col-md-2 d-flex align-items-center justify-content-center">
                    <img width="110" src="{{ asset('web/svg/tech/angular.svg') }}" alt="Angular">
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
                                <h3>Our <span class="highlight web-hl">Web Development</span> Process</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-comments pt-3 mb-1"></i>
                                <span class="count1">1</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Understanding Your Needs</h4>
                            <p>At the start of our process, we dive into a detailed conversation with you. We listen to your goals, specific requirements, and vision for your web project.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-light-bulb pt-3 mb-1"></i>
                                <span class="count1">2</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Analysis and Planning</h4>
                            <p>We evaluate the necessary technology, information architecture, design, and development strategy. At this stage, we also define a detailed plan and establish the key milestones of the project.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-ruler-pencil pt-3 mb-1"></i>
                                <span class="count1">3</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Custom Design</h4>
                            <p>With the plan in place, we begin creating an attractive, functional custom design aligned with your business needs, reflecting your brand, and tailored to your objectives.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-dashboard pt-3 mb-1"></i>
                                <span class="count1">4</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Development and Programming</h4>
                            <p>Using best web development practices, we carry out the construction process, transforming the design into an interactive, functional web solution, and of course, adapted to mobile devices.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-hummer pt-3 mb-1"></i>
                                <span class="count1">5</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Testing and Optimization</h4>
                            <p>We conduct thorough testing to ensure the site operates smoothly and meets quality standards. We optimize load speed, security, and usability to offer the best user experience.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-rocket pt-3 mb-1"></i>
                                <span class="count1">6</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Launch and Implementation</h4>
                            <p>Once everything is ready, we launch your website to the public. We ensure all technical aspects are in place and that your site is fully functional.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-headphone-alt pt-3 mb-1"></i>
                                <span class="count1">7</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Ongoing Support</h4>
                            <p>Our commitment doesn't end with the launch. We offer continuous support, security updates, and maintenance to ensure your website remains in top condition over time.</p>
                        </div>
                    </div>
                    <div class="row mt-40">
                        <div class="col-lg-2">
                            <div class="counter-single pb-2">
                                <i class="ti-write pt-3 mb-1"></i>
                                <span class="count1">8</span>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <h4>Evaluation and Improvement</h4>
                            <p>We constantly evaluate your website's performance and look for opportunities for improvement. We are always ready to implement new features or functionalities as your needs evolve.</p>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h3><span class="highlight web-hl">Web Development</span> FAQ's</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-55 mt-40">
                        <div class="col-lg-12">
                            <div id="accordionTwo">
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingSeven">
                                        <h5>
                                            <a href="#collapseSeven" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseSeven">
                                                <span>What is web development and why is it important?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>Web development is the process of creating applications, websites, internal management systems, and other online digital solutions. It is important because it allows businesses and individuals to innovate, automate tasks, improve efficiency, and reach a global audience.</p>
                                            <p>Besides websites, web development includes the creation of interactive web applications, customized admin panels, content management systems, online stores, and much more, tailored to the specific needs of each project.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingTen">
                                        <h5>
                                            <a href="#collapseTen" class="btn btn-link" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                                <span>What is the difference between a standard web platform and customized web development?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>Standard platforms like WordPress and Shopify are popular choices for creating websites and online stores. Although they offer predefined templates and functionalities, they have limitations in terms of customization.</p>
                                            <p>In contrast, customized web development involves creating a digital solution from scratch, specifically tailored to your business needs. This means there are no restrictions in terms of design, features, or functionalities. You can have complete control over every aspect of your website or web application, allowing you to stand out and meet the unique requirements of your industry or audience.</p>
                                            <p>Additionally, customized web development allows for the integration of internal systems, precise automation, and unlimited scalability, which is essential for the long-term growth of your online business.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card single-faq">
                                    <div class="card-header faq-heading style-2" id="headingEight">
                                        <h5>
                                            <a href="#collapseEight" class="btn btn-link" data-toggle="collapse" aria-expanded="false" aria-controls="collapseEight">
                                                <span>How long does it take to develop a customized web application?</span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionTwo">
                                        <div class="card-body">
                                            <p>The development time varies depending on the complexity of the project. Simple websites can be completed in weeks, while larger and more complex projects may take several months. Design, programming, and revisions are factors that influence the development time.</p>
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
@endsection
