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
            <div class="row text-center py-4">

                @foreach ($all_properties as $all_property )
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="width: ">
                        <div class="card news-cards cards-right-side">
                            <div class="ui-card latest-ui-card">
                                    @if($all_property->photo)
                                        <img src="{{url('image/photo/'.$all_property->photo)}}">
                                        <div class="description text-center" style="    bottom: 45%;">
                                            <a href="/show_properties/{{ $all_property->title_en }}"><i class="fas fa-link"></i></a>
                                         </div>
                                         {{-- <a href="/show_properties/{{ $all_property->title_en }}"><i class="fas fa-link" style="bottom: 50%;
                                            position: absolute;"></i></a> --}}
                                    @else
                                        <img src="{{url('image/photo/default.jpg')}}" style="width: 100%;height: 310px !important;">
                                        <div class="description text-center">
                                            <a href="/show_properties/{{ $all_property->title_en }}"><i class="fas fa-link"></i></a>
                                         </div>
                                         <a href="/show_properties/{{ $all_property->title_en }}"><i class="fas fa-link"></i></a>
                                    @endif
                            </div>
                            <div class="card-body card-text1">
                                <p class="calendar"><i class="fas fa-calendar-week"></i> {{ $all_property->created_at->diffForHumans() }}</p>
                                <h5 class="card-title">
                                    @if (App::getLocale() == 'en')
                                        @if ($all_property->title_en !='')
                                            {{ \Str::limit($all_property->title_en, 25) }}
                                        @else
                                            {{ \Str::limit($all_property->title_ar, 25) }}
                                        @endif
                                    @else
                                        {{ \Str::limit($all_property->title_ar, 25) }}
                                    @endif
                                </h5>
                                <p class="card-text">
                                    @if (App::getLocale() == 'en')
                                        @if ($all_property->description_en !='')
                                            <td>{{ \Str::limit($all_property->description_en, 280) }}</td>
                                        @else
                                            <td>{{ \Str::limit($all_property->description_ar, 280) }}</td>
                                        @endif
                                    @else
                                        @if ($all_property->description_ar !='')
                                            <td>{{ \Str::limit($all_property->description_ar, 280) }}</td>
                                        @else
                                            <td>{{ \Str::limit($all_property->description_en, 280) }}</td>
                                        @endif
                                    @endif
                                </p>
                                <a href="/show_properties/{{ $all_property->title_en }}" class="btn btn-primary">{{ trans('front_trans.show_details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="m-t-30 m-b-60 center" style="margin-right: 50%;">
            {{ $all_properties->links() }}
        </div>

    </div>
    <!--end card section-->









    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
