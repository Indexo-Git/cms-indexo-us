<div id="{{ $id }}" class="animate__animated section-title mt-md-4 py-3 py-md-5 pt-sm-40 pb-sm-100 d-none">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-lg-5 pb-lg-5">
                <div class="section-title">
                    <small>{{ $number }}</small><h5 class="text-muted ml-2">{{ $title }}</h5>
                    <h3>{{ $question }}</h3>
                </div>
                <div class="row text-center pt-3 pt-md-4">
                    <div class="col-6 col-md-3 mb-3 mb-md-0">
                        <button type="button" class="landing-button indexo-shadow py-3" data-toggle="collapse" data-target="#answer{{ $number }}01" aria-expanded="false" aria-controls="answer{{ $number }}01" data-value="{{ $number }}-01">
                            <img src="{{ asset('web/svg/landing-buttons/'.$image1file.'.svg') }}" class="p-3" alt="{{ $image1name }}">
                            <b>{{ $image1name }}</b>
                        </button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="landing-button indexo-shadow py-3" data-toggle="collapse" data-target="#answer{{ $number }}02" aria-expanded="false" aria-controls="answer{{ $number }}02" data-value="{{ $number }}-02">
                            <img src="{{ asset('web/svg/landing-buttons/'.$image2file.'.svg') }}" class="p-3" alt="{{ $image2name }}">
                            <b>{{ $image2name }}</b>
                        </button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="landing-button indexo-shadow py-3" data-toggle="collapse" data-target="#answer{{ $number }}03" aria-expanded="false" aria-controls="answer{{ $number }}03" data-value="{{ $number }}-03">
                            <img src="{{ asset('web/svg/landing-buttons/'.$image3file.'.svg') }}" class="p-3" alt="{{ $image3name }}">
                            <b>{{ $image3name }}</b>
                        </button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="landing-button indexo-shadow py-3" data-toggle="collapse" data-target="#answer{{ $number }}04" aria-expanded="false" aria-controls="answer{{ $number }}04" data-value="{{ $number }}-04">
                            <img src="{{ asset('web/svg/landing-buttons/'.$image4file.'.svg') }}" class="p-3" alt="{{ $image4name }}">
                            <b>{{ $image4name }}</b>
                        </button>
                    </div>
                </div>
                <div class="row mt-md-3">
                    <div class="collapse col-12" id="answer{{ $number }}01">
                        <div class="answer-collapse">
                            <p>{{ $answer1 }}</p>
                        </div>
                    </div>
                    <div class="collapse col-12" id="answer{{ $number }}02">
                        <div class="answer-collapse">
                            <p>{{ $answer2 }}</p>
                        </div>
                    </div>
                    <div class="collapse col-12" id="answer{{ $number }}03">
                        <div class="answer-collapse">
                            <p>{{ $answer3 }}</p>
                        </div>
                    </div>
                    <div class="collapse col-12" id="answer{{ $number }}04">
                        <div class="answer-collapse">
                            <p>{{ $answer4 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
