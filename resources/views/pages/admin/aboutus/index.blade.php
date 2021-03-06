@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    {{ trans('front_trans.aboutus') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('front_trans.aboutus') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

<div class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <?php
            $about_us = \App\Models\Front\Aboutus::all();
            $aboutus_count = \App\Models\Front\Aboutus::all()->count();
            ?>


            @if ($aboutus_count == '0')
                <button type="button" class="button x-small">
                    <a href="{{ route('aboutus.create') }}">{{ trans('front_trans.add') }}</a>
                </button>
                <br><br>
            @endif

            <!--start about us section-->
            @foreach ($about_us as $aboutus)
                @if ($aboutus_count != '0')
                    <button type="button" class="button x-small">
                        <a href="{{ route('aboutus.edit', $aboutus->id) }}">{{ trans('front_trans.Edit') }}</a>
                    </button>
                @endif


                <br><br>
                <div class="row ">
                    <div class="col-12">
                        <h2 data-aos="fade-left" class="about-head">{{ trans('front_trans.aboutus') }}</h2>
                        <p data-aos="fade-left" class="about-parag">
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
                </div>

                <!--end about us section-->
                <!--start counter section-->
                <div class="counter-sec py-4 text-center">
                    <div class="container">
                        <div class="row about-counting">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                <i class="fas fa-clock text-9 text-color-light mb-3 mt-2"></i>
                                <div>
                                    <span class="counter">{{ $aboutus->experience_year }}</span>
                                </div>
                                <div>
                                    <p>{{ trans('front_trans.experience_year') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                <i class="fas fa-home text-9 text-color-light mb-3 mt-2"></i>
                                <div>
                                    <span class="counter">{{ $aboutus->previous_project }}</span>
                                </div>
                                <div>
                                    <p>{{ trans('front_trans.previous_project') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                <i class="fas fas fa-hourglass-half text-9 text-color-light mb-3 mt-2"></i>
                                <div>
                                    <span class="counter">{{ $aboutus->under_construction }}</span>
                                </div>
                                <div>
                                    <p>{{ trans('front_trans.under_construction') }}</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                <i class="fas fa-users text-9 text-color-light mb-3 mt-2"></i>
                                <div>
                                    <span class="counter">{{ $aboutus->client }}</span>
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
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card prevs-cards text-center last-card-1">
                            <div class="card-body  ">
                                <h5 class="card-title about-head">{{ trans('front_trans.whyus') }}</h5>
                                <p class="card-text about-parag1">
                                    @if (App::getLocale() == 'en')
                                        @if ($aboutus->whyus_en != '')
                                            <td>{{ $aboutus->whyus_en }}</td>
                                        @else
                                            <td>{{ $aboutus->whyus_ar }}</td>
                                        @endif
                                    @else
                                        @if ($aboutus->whyus_ar != '')
                                            <td>{{ $aboutus->whyus_ar }}</td>
                                        @else
                                            <td>{{ $aboutus->whyus_en }}</td>
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card prevs-cards text-center last-card-1">
                            <div class="card-body  ">
                                <h5 class="card-title about-head">{{ trans('front_trans.vision') }}</h5>
                                <p class="card-text about-parag1">
                                    @if (App::getLocale() == 'en')
                                        @if ($aboutus->vision_en != '')
                                            <td>{{ $aboutus->vision_en }}</td>
                                        @else
                                            <td>{{ $aboutus->vision_ar }}</td>
                                        @endif
                                    @else
                                        @if ($aboutus->vision_ar != '')
                                            <td>{{ $aboutus->vision_ar }}</td>
                                        @else
                                            <td>{{ $aboutus->vision_en }}</td>
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="card prevs-cards text-center last-card-1">

                            <div class="card-body  ">
                                <h6 class="card-title about-head2">{{ trans('front_trans.message') }}</h6>
                                <p class="card-text about-parag1">
                                    @if (App::getLocale() == 'en')
                                        @if ($aboutus->message_en != '')
                                            <td>{{ $aboutus->message_en }}</td>
                                        @else
                                            <td>{{ $aboutus->message_ar }}</td>
                                        @endif
                                    @else
                                        @if ($aboutus->message_ar != '')
                                            <td>{{ $aboutus->message_ar }}</td>
                                        @else
                                            <td>{{ $aboutus->message_en }}</td>
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--end last section-->
        </div>
    </div>
</div>


<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            tabSize: 2,
            height: 100,
        });
        $("#summernote").code()
            .replace(/<\/p>/gi, "\n")
            .replace(/<br\/?>/gi, "\n")
            .replace(/<\/?[^>]+(>|$)/g, "");
    });
</script>
@endsection
