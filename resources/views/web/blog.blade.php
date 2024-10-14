@extends('layouts.web')

@section('content')
    <div class="blog-area pt-100 pt-sm-80 pb-100 pb-sm-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="text-center mb-5">Blog</h1>
                    <hr class="mb-5">
                    <div id="post-wrapper" class="row">
                        <!-- Post paginate -->
                    </div>
                    <div class="row mt-50">
                        <div class="col-lg-12 text-center">
                            <span id="loading" class="text-blue">
                                <i class="fa fa-spinner fa-spin fa-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var element = $('#post-wrapper');
        var page = 1;
        infinteLoadMore(page);

        $(window).scroll(function () {
            if(($(window).scrollTop() + $(window).height()) >= ($('#post-wrapper').offset().top + $('#post-wrapper').height())){
                page++;
                infinteLoadMore(page);
            }
        });

        function infinteLoadMore(page) {
            $.ajax({
                url: "{{ route('get-posts') }}?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('#loading').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('#loading').html("<h4>You have reached the end of our articles. <i class=\"fa fa-frown-o text-info \"></i></h4>");
                    return;
                }
                $('#loading').hide();
                $("#post-wrapper").append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
        }
    </script>
@endsection
