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
            <h2>
                @if (App::getLocale() == 'en')
                    @if ($property->title_en != '')
                        <th>{{ $property->title_en}}</th>
                    @else
                        <th>{{ $property->title_ar}}</th>
                    @endif
                @else
                    <th>{{ $property->title_ar }}</th>
                @endif
            </h2>
        </div>
    </div>
    <!--end title-->


    <!-- start slider-->
    <div class="building-slider py-4 ">
        <div class="container">
            {{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('image/photo/' . $property->photo) }}" alt="first slide">
                        @foreach ( $images as $image)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('image/' . $image) }}" alt="Second slide">
                        </div>
                    @endforeach

                    </div>

                    <div class="carousel-item">
                        @foreach (explode('|', $property->images) as $image)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ url('image/' . $image) }}" alt="Second slide">
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div> --}}
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ url('image/photo/' . $property->photo) }}" alt="first slide" style="width: 690px; height:600px;">
                    </div>
                    @foreach (explode('|', $property->images) as $image)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('image/' . $image) }}" alt="Second slide" style="width: 690px; height:600px;">
                        </div>
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
        </div>
    </div>
    <!-- end slider -->


    <!-- start description -->
    <div class="building-des py-4 text-center">
        <div class="container">
            <p>
                @if (App::getLocale() == 'en')
                    @if ($property->description_en != '')
                        <th>{{ $property->description_en }}</th>
                    @else
                        <th>{{ $property->description_ar }}</th>
                    @endif
                @else
                    <th>{{ $property->description_ar }}</th>
                @endif
            </p>

        </div>

    </div>
    <!-- end description -->





    <div class="Property-section py-4">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 make_left_en make_right_ar">
                    <table  style="padding-top: 20px; width:100%">
                        <tbody>
                            <tr>
                                <th style="color: #f5a226;">{{ trans('property_trans.price') }}</th>
                                <th>{{ $property->price }}</th>

                                <th style="color: #f5a226;">{{ trans('property_trans.size') }}</th>
                                <th>{{ $property->size }}</th>
                            </tr>
                            <tr>
                                <th style="color: #f5a226;">{{ trans('property_trans.discount') }}</th>
                                <th>{{ $property->discount }}</th>

                                <th style="color: #f5a226;">{{ trans('property_trans.new_price') }}</th>
                                <th>{{ $property->new_price }}</th>
                            </tr>

                            <tr style="padding-top: 20px !important">
                                <th style="color: orange;">{{ trans('property_trans.Used') }}</th>
                                <th>{{ $property->used == 'used' ? trans('property_trans.used') : trans('property_trans.new') }}</th>

                                <th style="color: orange;">{{ trans('property_trans.purpose') }}</th>
                                <th>{{ $property->used == 'rent' ? trans('property_trans.rent') : trans('property_trans.sale') }}</th>
                            </tr>
                            <tr>
                                <th style="color: orange;">{{ trans('property_trans.floornumber') }}</th>
                                <th>{{ $property->floornumber }}</th>

                                <th style="color: orange;">{{ trans('property_trans.no_of_floor') }}</th>
                                <th>{{ $property->no_of_floor }}</th>
                            </tr>
                            <tr>
                                <th style="color: orange;">{{ trans('property_trans.bedroom') }}</th>
                                <th>{{ $property->bedroom }}</th>

                                <th style="color: orange;">{{ trans('property_trans.bathroom') }}</th>
                                <th>{{ $property->bathroom }}</th>
                            </tr>

                            <tr>
                                <th style="color: orange;">{{ trans('property_trans.city') }}</th>
                                    @if (App::getLocale() == 'en')
                                        @if ($property->city_en != '')
                                            <th>{{ $property->city_en }}</th>
                                        @else
                                            <th>{{ $property->city_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{ $property->city_ar }}</th>
                                    @endif

                                    <th style="color: orange;">{{ trans('property_trans.address') }}</th>
                                    @if (App::getLocale() == 'en')
                                        @if ($property->address_en != '')
                                            <th>{{ $property->address_en }}</th>
                                        @else
                                            <th>{{ $property->address_ar }}</th>
                                        @endif
                                    @else
                                        <th>{{ $property->address_ar }}</th>
                                    @endif
                            </tr>
                            <tr>
                                <th style="color: orange;">{{ trans('property_trans.category_id') }}</th>
                                @if (App::getLocale() == 'en')
                                    @if ($property->category->name_en !='')
                                        <th>{{ \Str::limit($property->category->name_en,25)}}</th>
                                    @else
                                        <th>{{ \Str::limit($property->category->name_ar,25)}}</th>
                                    @endif
                                @else
                                    <th>{{ \Str::limit($property->category->name_ar,25)}}</th>
                                @endif

                                <th style="color: orange;">{{ trans('property_trans.status') }}</th>
                                <th>{{ $property->used == 'sold' ? trans('property_trans.sold') : trans('property_trans.for_sale') }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12 make_left_en make_right_ar">
                    <table style="padding-top: 20px; width:100%">
                        <tbody>
                            <tr>
                                <tr>
                                    <th style="color: orange;">{{ trans('property_trans.nearby') }}</th>
                                    @if (App::getLocale() == 'en')
                                        @if ($property->nearby_en != '')
                                            <th  style="padding:10px 5px">{{ $property->nearby_en }}</th>
                                        @else
                                            <th style="padding:10px 5px">{{ $property->nearby_ar }}</th>
                                        @endif
                                    @else
                                        <th style="padding:10px 5px">{{ $property->nearby_ar }}</th>
                                    @endif
                                    <th></th>
                                </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div>
                @if ($property->video)
                    <div class="col" style="text-align: center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary video-btn primary-btn text-uppercase" data-toggle="modal" data-src="{{ $property->video }}" data-target="#myModal">
                            <i class="fab fa-youtube"></i> Watch Video Of Property
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>



    <!--start services Features-->
    <div class="services py-4 text-center">
        <div class="container">
            <h1>{{ trans('front_trans.services') }}</h1>
            <div class="line-5">
            </div>
            <div class="row justify-content-center text-center py-_x pt-5 pb-5">
                @foreach ( $property->features as  $feature)
                <div class="colxs-6 col-sm-6 col-md-2 col-lg-2">
                    <p class="mb-0">
                        <strong>
                            @if (App::getLocale() == 'en')
                                @if ($feature->name_en != '')
                                    <th>{{ $feature->name_en}}</th>
                                @else
                                    <th>{{ $feature->name_ar}}</th>
                                @endif
                            @else
                                <th>{{ $feature->name_ar }}</th>
                            @endif
                        </strong>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--end services-->



    <!-- start map -->
    <div class="building-map py-4">
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13674.194668823182!2d{{ $property->location_longitude }}!3d{{ $property->location_latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1624956128867!5m2!1sen!2seg"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>
    <!-- end map -->





    <div class="container video">
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 800px; margin: 30px auto;">
                <div class="modal-content">
                    <div class="modal-body" style="position:relative; padding:0px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;
                        right:-30px; top:0;z-index:999; font-size:2rem; font-weight: normal;color:#fff;opacity:1;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $property->video }}" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
