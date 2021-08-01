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

    <?php
        $sliders = \App\Models\Gallery::where('type', 1)->get();
    ?>

    <!--start title-->
    <div class="title-nav py-4 make_right_ar">
        <div class="container">
            <h2>{{ trans('front_trans.aboutus') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about">
        </div>
    </div>
    <!--end lines-->


    @foreach ($about_us as $aboutus)

    <!--start about us section-->
    <div class="about-us-section py-4">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 make_right_ar">
                    <h2>{{ trans('main_trans.Main_title') }}</h2>
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
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 py-3">
                    <div class="card prevs-cards about-cards " style="width:100%;">
                        <div class="slider-about">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        {{-- <img class="d-block w-100" src="..." alt="First slide"> --}}
                                        <img src="{{ asset('app-assets/images/Artboard – 2.png') }}" data-aos="zoom-in" class="d-block w-100" style="width: 100%; height:195px;">
                                    </div>
                                    @foreach ($sliders as $slider)
                                        @if ($slider->type == '1')
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{ Url($slider->path) }}" alt="Second slide" style="width: 100%; height:195px;">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end about us section-->

    <!--start counter section-->
    <div class="counter-sec py-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <i class="fas fa-clock text-9 text-color-light mb-3 mt-2"></i>
                    <div>
                        <span class="counter">{{ $aboutus->experience_year }}</span>
                    </div>
                    <div>
                        <p>{{ trans('front_trans.experience_year') }}</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <i class="fas fa-home text-9 text-color-light mb-3 mt-2"></i>
                    <div>
                        <span class="counter">{{ $aboutus->previous_project }} </span>
                    </div>
                    <div>
                        <p>{{ trans('front_trans.previous_project') }}</p>

                    </div>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <i class="fas fas fa-hourglass-half text-9 text-color-light mb-3 mt-2"></i>
                    <div>
                        <span class="counter">{{ $aboutus->under_construction }} </span>
                    </div>
                    <div>
                        <p>{{ trans('front_trans.under_construction') }}</p>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                    <i class="fas fa-users text-9 text-color-light mb-3 mt-2"></i>
                    <div>
                        <span class="counter">{{ $aboutus->client }} </span>
                    </div>
                    <div>
                        <p>{{ trans('front_trans.client') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end counter section-->


    <!--start last section-->
    <div class="last-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card prevs-cards text-center last-card-1" style="width:100%;">

                        <div class="card-body  ">
                            <h5 class="card-title ">{{ trans('front_trans.whyus') }}</h5>
                            <p class="card-text " style="text-align: justify;">
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->whyus_en != '')
                                        <td>{{  \Str::limit($aboutus->whyus_en, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->whyus_ar, 95) }}</td>
                                    @endif
                                @else
                                    @if ($aboutus->whyus_ar != '')
                                        <td>{{  \Str::limit($aboutus->whyus_ar, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->whyus_en, 95) }}</td>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card prevs-cards text-center last-card-1" style="width:100%;">

                        <div class="card-body  ">
                            <h5 class="card-title ">{{ trans('front_trans.vision') }}</h5>
                            <p class="card-text " style="text-align: justify;">
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->vision_en != '')
                                        <td>{{  \Str::limit($aboutus->vision_en, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->vision_ar, 95) }}</td>
                                    @endif
                                @else
                                    @if ($aboutus->vision_ar != '')
                                        <td>{{  \Str::limit($aboutus->vision_ar, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->vision_en, 95) }}</td>
                                    @endif
                                @endif
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card prevs-cards text-center last-card-1" style="width:100%;">

                        <div class="card-body  ">
                            <h5 class="card-title ">{{ trans('front_trans.message') }}</h5>
                            <p class="card-text " style="text-align: justify;">
                                @if (App::getLocale() == 'en')
                                    @if ($aboutus->message_en != '')
                                        <td>{{  \Str::limit($aboutus->message_en, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->message_ar, 95) }}</td>
                                    @endif
                                @else
                                    @if ($aboutus->message_ar != '')
                                        <td>{{  \Str::limit($aboutus->message_ar, 95) }}</td>
                                    @else
                                        <td>{{  \Str::limit($aboutus->message_en, 95) }}</td>
                                    @endif
                                @endif
                            </p>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!--end last section-->
    @endforeach


    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
