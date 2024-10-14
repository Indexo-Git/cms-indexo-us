<!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jesús Vergara Cortés | Contact info</title>
        <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/77cdbae675.js" crossorigin="anonymous"></script>
        <style>
            .title {
                font-size: calc(.525rem + 3.3vw);
            }
            @media (min-width: 1200px) {
                .title {
                    font-size: 1.5rem;
                }
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="container py-5">
            <div class="row">
                <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8 col-xxl-6 mx-sm-auto">
                    <div class="row g-0">
                        <div class="col-4 col-sm-3 offset-sm-0">
                            <picture>
                                <source srcset="{{ asset('web/cards/jesus/card.webp') }}" type="image/webp">
                                <img class="img-fluid img-thumbnail" src="{{ asset('web/cards/jesus/card.jpg') }}" alt="Jesús Vergara Cortés">
                            </picture>
                        </div>
                        <div class="col-8 col-sm-9">
                            <div class="p-3 py-lg-4 py-xl-3">
                                <h4 class="title"><strong>Jesús Vergara-Cortés</strong></h4>
                                <p class="">Web Developer - SEO</p>
                                <img src="{{ asset('web/cards/jesus/card-logo.svg') }}" alt="indexo logo svg" width="100" class="mb-1">
                                <h6>Integrated Digital Solutions.</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-11 col-md-10 col-lg-9 col-xl-8 col-xxl-6 mx-sm-auto">
                    <div class="list-group list-group-flush py-3 py-md-4">
                        <a href="tel:8016696977" class="list-group-item list-group-item-action">
                            <i class="fa-solid fa-phone me-2 text-info"></i> (801) 669-6977
                        </a>
                        <a href="mailto:jesus@indexo.us" class="list-group-item list-group-item-action">
                            <i class="fa-solid fa-envelope me-2 text-info"></i> jesus@indexo.us
                        </a>
                        <a href="https://www.google.com/maps/place/indexo/@39.7700285,-105.0786969,15z/data=!4m2!3m1!1s0x0:0x95299e0c59debbd9?sa=X&ved=1t:2428&ictx=111" target="blank" class="list-group-item list-group-item-action">
                            <i class="fa-solid fa-location-dot me-2 text-info"></i> Wheat Ridge, CO 80033
                        </a>
                    </div>
                    <div class="d-grid gap-2 my-3">
                        <a href="{{ asset('web/cards/jesus/contact.vcf') }}" class="btn btn-primary align-bottom" download><i class="fa-regular fa-floppy-disk me-2"></i>Save Contact</a>
                    </div>
                    <hr class="mt-3">
                    <div class="text-center">
                        <p class="text-muted"><small><span id="year"></span></small></p>
                    </div>
                </div>
            </div>
        </div>
        <script>document.getElementById('year').innerHTML = new Date().getFullYear()</script>
    </body>
</html>
