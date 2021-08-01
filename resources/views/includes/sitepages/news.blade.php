<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('layouts.partials.head')
</head>

<body>
    @include('layouts.partials.nav')
    <div class="row">
        <div class="col-12">
            @include('layouts.partials.flash')
        </div>
    </div>


    <!--start title-->
    <div class="title-nav py-4 make_right_ar">
        <div class="container">
            <h2>{{ trans('main_trans.Main_title') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about line-3-search line-4-images">
        </div>
    </div>
    <!--end lines-->




    <!--start card section-->
    <div class="cards-section latest-news-cards py-4">
        <div class="container">
            <h3 class="text-center" data-aos="fade-up">{{ trans('front_trans.company_news') }}</h3>
            <div class="row text-center py-4">

               @foreach ($news as $new )
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="card news-cards cards-right-side" style="width: 100%;">
                            <div class="ui-card latest-ui-card">
                                @if($new->photo)
                                    <img src="{{url('image/news/'.$new->photo)}}">
                                @else
                                    <img src="{{url('image/news/default.jpg')}}">
                                @endif
                                <div class="description text-center">
                                    <a href="/show_news/{{ $new->head_en }}"><i class="fas fa-link"></i></a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <p class="calendar make_left_en make_right_ar"><i class="fas fa-calendar-week"></i> {{ $new->created_at->diffForHumans() }}</p>
                                <h5 class="card-title">
                                    @if (App::getLocale() == 'en')
                                        @if ($new->head_en !='')
                                            <th>{{ \Str::limit($new->head_en,90)}}</th>
                                        @else
                                            <th>{{ \Str::limit($new->head_ar,90)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($new->head_ar,90)}}</th>
                                    @endif
                                </h5>
                                <p class="card-text">
                                    @if (App::getLocale() == 'en')
                                        @if ($new->body_en !='')
                                            <th>{{ \Str::limit($new->body_en,150)}}</th>
                                        @else
                                            <th>{{ \Str::limit($new->body_ar,150)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($new->body_ar,150)}}</th>
                                    @endif
                                </p>
                                <a href="/show_news/{{ $new->head_en }}" class="btn btn-primary">{{ trans('front_trans.show_details') }}</a>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
        <div class="m-t-30 m-b-60 center" style="margin-right: 50%;">
            {{ $news->links() }}
        </div>
    </div>
    <!--end card section-->








    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
