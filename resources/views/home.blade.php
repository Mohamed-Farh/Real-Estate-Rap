@extends('layouts.mainlayout')

@section('content')

    <?php $sliders = \App\Models\Gallery::where('type', 1)->get(); ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('image/gallery/slider/slider.jpg') }}" data-aos="zoom-in" class="d-block w-100"
                    style="width: 100%; height:100%;">
            </div>
            @foreach ($sliders as $slider)
                @if ($slider->type == '1' && $slider->status == '0')
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ Url($slider->path) }}" alt="Second slide"
                            style="width: 100%; height:100%">
                    </div>
                @endif
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--end background-->




    <!--start about us-->
    <div class="about-us py-4">
        <div class="container">
            <h2 class="make_right_ar make_left_en">{{ trans('front_trans.aboutus') }}</h2>
            <?php $bout_us = \App\Models\Front\Aboutus::all(); ?>
            @foreach ($bout_us as $aboutus)
                <div class="row">
                    <div class="col-sx-12 col-sm-12 col-md-6 col-md-6 text-right">
                        <h1 data-aos="fade-up" class=" make_left_en" style="color:black !important;" >{{ trans('main_trans.Main_title') }}</h1>
                        <p data-aos="fade-up" class=" make_left_en"
                            style="color:black !important; font-size: 18px !important; padding-top: 16px;">
                            @if (App::getLocale() == 'en')
                                @if ($aboutus->aboutus_en != '')
                                    <td>{{ $aboutus->aboutus_en }}</td>
                                @else
                                    <td>{{ $aboutus->aboutus_ar }}</td>
                                @endif
                            @else
                                @if ($aboutus->aboutus_ar != '')
                                    <td>{{ $aboutus->aboutus_ar }}</td>
                                @else
                                    <td>{{ $aboutus->aboutus_en }}</td>
                                @endif
                            @endif
                        </p>
                        <button class="button-about"><a
                                href="{{ route('front/aboutus') }}">{{ trans('front_trans.show_more') }}</a></button>
                    </div>

                    <div class="col-sx-12 col-sm-12 col-md-6 col-md-6 dania " data-aos="fade-up">
                        <div class="col-12">
                            <div class="row">
                                <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-4  order-1 img-about" data-aos="flip-left"
                                    data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                    <img src="{{ asset('image/about2.jpg') }}"
                                        class="img-fluid appear-animation animated fadeInLeftShorter appear-animation-visible"
                                        data-apper-animation="fadeInLeftShorter" data-apper-animation-delay="3000" alt
                                        style="animation-delay: 3000ms; width:100%; margin-bottom: 10px;">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 order-3 order-xl-2" style=" margin-bottom:10px">
                                    <div
                                        class="h-100 d-flex align-items-center position-relative px-4 py-4 py-xl-0 mt-4 mt-xl-0">
                                        <svg class="custom-square-1 custom-square-top-right z-index-0" width="80"
                                            height="80">
                                            <rect
                                                class="lineProgressFrom appear-animation animated lineProgressTo appear-animation-visible"
                                                data-apper-animation="lineProgressTo" data-apper-animation-duration="3s"
                                                width="80" height="80" fill="none" stroke-width="13" stroke="#000"
                                                style="animation-duration: 3s; animation-delay: 100ms;">

                                            </rect>

                                        </svg>
                                        <svg class="custom-square-1 custom-square-1-no-pos z-index-0" width="100%"
                                            height="100%" margin-bottom:10px>
                                            <rect
                                                class="lineProgressAndFillFrom appear-animation animated lineProgressAndFillTo appear-animation-visible"
                                                data-apper-animation="lineProgressAndFillTo"
                                                data-apper-animation-duration="3s" width="100%" height="100%" fill="none"
                                                stroke-width="13" stroke="#000"
                                                style="animation-duration: 3s; animation-delay: 100ms;">

                                            </rect>
                                        </svg>
                                        <p
                                            class="Font_01 text-color-light line-height-9 text-center text-4  custom-responsive-text-size-1 mb-0 px-2 para-square">
                                            {{ $aboutus->experience_year }} {{ trans('front_trans.about1') }}
                                            {{ $aboutus->previous_project }} {{ trans('front_trans.about2') }}
                                            {{ $aboutus->client }} {{ trans('front_trans.clients') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 order-2 order-xl-3 img-about"
                                    data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                                    <img src="{{ asset('image/about2.jpg') }}"
                                        class="img-fluid appear-animation animated fadeInRightShorter appear-animation-visible"
                                        data-apper-animation="fadeInRightShorter" data-apper-animation-delay="3000" alt
                                        style="animation-delay: 3000ms;  width:100%; margin-bottom: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!--end about us-->


    <!--start our progects-->
    <div class="ourprojects text-center">
        <div class="container py-4">
            <h3 data-aos="fade-up">{{ trans('front_trans.our projects') }}</h3>
            <p data-aos="fade-up">{{ trans('front_trans.Available projects') }}</p>
            <div class="row mt-3 mb-5">

                <?php $latest_properties = App\Models\Property::where('status', 'for_sale')
                ->orderBy('id', 'desc')
                ->limit(3)
                ->get(); ?>

                @foreach ($latest_properties as $latest_property)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <a>
                            <div class="ui-card">
                                <img src="{{ url('/image/photo/' . $latest_property->photo) }}"
                                    style="width: 100%; height:215.45px;">
                                <span class="thumb-info-title">
                                    <span class="Font_01 Font_Clean thumb-info-inner pb-3">
                                        @if (App::getLocale() == 'en')
                                            @if ($latest_property->title_en != '')
                                                <td>{{ \Str::limit($latest_property->title_en, 25) }}</td>
                                            @else
                                                <td>{{ \Str::limit($latest_property->title_ar, 25) }}</td>
                                            @endif
                                        @else
                                            @if ($latest_property->title_ar != '')
                                                <td>{{ \Str::limit($latest_property->title_ar, 25) }}</td>
                                            @else
                                                <td>{{ \Str::limit($latest_property->title_en, 25) }}</td>
                                            @endif
                                        @endif
                                    </span>
                                </span>
                                <div class="description text-center">
                                    <a href="/show_properties/{{ $latest_property->title_en }}"><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <button class="button-about"><a
                    href="{{ route('available_projects') }}">{{ trans('front_trans.show_more') }}</a></button>
        </div>
    </div>
    <!--end our projects-->


    <!--start prev projects-->
    <div class="prev-project py-4 text-center">
        <h4 data-aos="fade-down">{{ trans('front_trans.previous_projects') }}</h4>
        <h1 data-aos="fade-down"  style="color:black !important;">{{ trans('front_trans.Our previous work') }}</h1>

        <div class="prev-card  py-4">
            <div class="container py-4">
                <div class="row">
                    <?php $previous_projects = \App\Models\Property::where('status', 'sold')
                    ->orderBy('id', 'desc')
                    ->paginate(3); ?>
                    @foreach ($previous_projects as $previous_project)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                            <div class="ui-card text-center">
                                <img src="{{ url('/image/photo/' . $previous_project->photo) }}"
                                    style="width: 100%; height:330px; ">
                                <div class="description text-center">
                                    <a href="/show_properties/{{ $previous_project->title_en }}" class="text-center">
                                        <h3 style="text-align: center">
                                            @if (App::getLocale() == 'en')
                                                @if ($previous_project->title_en != '')
                                                    <td>{{ \Str::limit($previous_project->title_en, 28) }}</td>
                                                @else
                                                    <td>{{ \Str::limit($previous_project->title_ar, 28) }}</td>
                                                @endif
                                            @else
                                                @if ($previous_project->title_ar != '')
                                                    <td>{{ \Str::limit($previous_project->title_ar, 28) }}</td>
                                                @else
                                                    <td>{{ \Str::limit($previous_project->title_en, 25) }}</td>
                                                @endif
                                            @endif
                                        </h3>
                                    </a>
                                    <p class="text-center">
                                        @if (App::getLocale() == 'en')
                                            @if ($previous_project->description_en != '')
                                                <td>{{ \Str::limit($previous_project->description_en, 280) }}</td>
                                            @else
                                                <td>{{ \Str::limit($previous_project->description_ar, 280) }}</td>
                                            @endif
                                        @else
                                            @if ($previous_project->description_ar != '')
                                                <td>{{ \Str::limit($previous_project->description_ar, 280) }}</td>
                                            @else
                                                <td>{{ \Str::limit($previous_project->description_en, 280) }}</td>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="m-t-30 m-b-60 center" style="margin-right: 50%;">
                    {{ $previous_projects->links() }}
                </div>
            </div>
        </div>
        <button class="text-center"><a href="{{ route('previous_projects') }}"
                style="color: #D19200 !important; text-decoration: none;">{{ trans('front_trans.show_more') }}</a></button>
    </div>
    <!--end prev projects-->



    <!-- start   why choose us-->
    <div class="choose-us py-4 text-center">
        <?php $about_us = \App\Models\Front\Aboutus::all(); ?>
        @foreach ($about_us as $aboutus)
            <div class="container py-4">
                <h3 data-aos="fade-up">{{ trans('front_trans.what distinguishes us') }}</h3>
                <h1 data-aos="fade-up">{{ trans('front_trans.whyus') }}</h1>
                <p>
                    @if (App::getLocale() == 'en')
                        @if ($aboutus->aboutus_en != '')
                            <td>{{ $aboutus->aboutus_en }}</td>
                        @else
                            <td>{{ $aboutus->aboutus_ar }}</td>
                        @endif
                    @else
                        @if ($aboutus->aboutus_ar != '')
                            <td>{{ $aboutus->aboutus_ar }}</td>
                        @else
                            <td>{{ $aboutus->aboutus_en }}</td>
                        @endif
                    @endif
                </p>
            </div>
            <div class="choose-us-content">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="  col-sm-6 col-sm-6 col-lg-3 col-xl-2 order-2 order-xl-1 mb-4 mb-lg-0">
                            <div class="choose-us-box">
                                <ul class="chooseimg1" data-target="li" data-interval="2500" data-speed="1000">
                                    @foreach ($sliders as $slider)
                                        @if ($slider->type == '1')
                                            <li class="active">
                                                <div class="choose-pic"
                                                    style="background-image: url('{{ Url($slider->path) }}');">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="   col-sm-6 col-lg-3 col-xl-2 order-3 order-xl-2 mb-4 mb-lg-0">
                            <div class="choose-us-box">
                                <ul class="chooseimg2" data-target="li" data-interval="2500" data-speed="1000">
                                    @foreach ($sliders as $slider)
                                        @if ($slider->type == '1')
                                            <li class="active">
                                                <div class="choose-pic"
                                                    style="background-image: url('{{ Url($slider->path) }}');">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="  col-lg-8 col-xl-4 order-1 order-xl-3 mx-lg-5 mx-xl-0 mb-5">
                            <div class="choose-us-box choose-center">
                                <div class="swiper-container choose-swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="contents text-center">
                                                <h4 class="text-center">{{ $aboutus->experience_year }}</h4>
                                                <h5>{{ trans('front_trans.experience_year') }}</h5>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <h4 class="text-center">{{ $aboutus->previous_project }}</h4>
                                            <h5>{{ trans('front_trans.previous_project') }}</h5>
                                        </div>
                                        <div class="swiper-slide">
                                            <h4 class="text-center">{{ $aboutus->under_construction }}</h4>
                                            <h5>{{ trans('front_trans.under_construction') }}</h5>
                                        </div>
                                        <div class="swiper-slide">
                                            <h4 class="text-center">{{ $aboutus->client }}</h4>
                                            <h5>{{ trans('front_trans.client') }}</h5>
                                        </div>
                                    </div>
                                    <button><a href="{{ route('front/aboutus') }}"
                                            style="color: black; text-decoration: none;">{{ trans('front_trans.show_more') }}</a></button>
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 col-xl-2 order-4 order-xl-4 mb-4 mb-sm-0">
                            <div class="choose-us-box">
                                <ul class="chooseimg3" data-target="li" data-interval="2500" data-speed="1000">
                                    @foreach ($sliders as $slider)
                                        @if ($slider->type == '1')
                                            <li class="active">
                                                <div class="choose-pic"
                                                    style="background-image: url('{{ Url($slider->path) }}');">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="   col-sm-6 col-lg-3 col-xl-2 order-5 order-xl-5 mb-4 mb-sm-0">
                            <div class="choose-us-box">
                                <ul class="chooseimg4" data-target="li" data-interval="2500" data-speed="1000">
                                    @foreach ($sliders as $slider)
                                        @if ($slider->type == '1')
                                            <li class="active">
                                                <div class="choose-pic"
                                                    style="background-image: url('{{ Url($slider->path) }}');">
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- end  why choose us-->


    <?php $news = \App\Models\News::paginate(3); ?>
    <!--start latest news-->
    <div class="latest-news py-4 text-center">
        <h3 class=" text-center" data-aos="fade-up">{{ trans('front_trans.company_news') }}</h3>
        {{-- <p class=" text-center" data-aos="fade-up"></p> --}}
        <div class="container py-4">
            <div class="row py-4 text-right">
                @foreach ($news as $new)
                    <div class="col-md-4 py-4 make_left_en">
                        <div class="card-body card" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <h4>
                                <a href="/show_news/{{ $new->head_en }}" style="color: #FFD700">
                                    @if (App::getLocale() == 'en')
                                        @if ($new->head_en != '')
                                            <th>{{ \Str::limit($new->head_en, 100) }}</th>
                                        @else
                                            <th>{{ \Str::limit($new->head_ar, 100) }}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($new->head_ar, 100) }}</th>
                                    @endif
                                </a>
                            </h4>
                            <p>
                                @if (App::getLocale() == 'en')
                                    @if ($new->body_en != '')
                                        <th>{{ \Str::limit($new->body_en, 200) }}</th>
                                    @else
                                        <th>{{ \Str::limit($new->body_ar, 200) }}</th>
                                    @endif
                                @else
                                    <th>{{ \Str::limit($new->body_ar, 200) }}</th>
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="col-md-4 py-4">
                    <div class="card-body card" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="2000">
                        <h4>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                        </h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق....</p>

                    </div>

                </div>
                <div class="col-md-4 py-4">
                    <div class="card-body card" data-aos="flip-left" data-aos-easing="ease-out-cubic"
                        data-aos-duration="2000">
                        <h4>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى
                        </h4>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                            حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها
                            التطبيق.</p>
                    </div>

                </div> --}}
            </div>
        </div>
        <button class="text-center"><a href="{{ route('news') }}"
                style="color: #D19200; text-decoration: none;">{{ trans('front_trans.show_more') }}</a></button>
    </div>
    <!--end latest news-->

@endsection
