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
            <h2>{{ trans('front_trans.previous_projects') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2">
        </div>
    </div>
    <!--end lines-->

    <!--start our projects section-->
    <!--start card section-->
    <div class="cards-section py-2">
        <div class="cards-section latest-news-cards py-4">
            <div class="container">
                <div class="row text-center py-4">

                @foreach ($previous_projects as $previous_project)
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="width: ">
                        <div class="card news-cards cards-right-side">
                            <div class="ui-card latest-ui-card">
                                <img src="{{ url('/image/photo/'.$previous_project->photo) }}">
                                <div class="description text-center">
                                    {{-- <div class="description text-center">
                                        <a href="/show_properties/{{ $previous_project->title_en }}"><i class="fas fa-link"></i></a>
                                     </div> --}}
                                     <a href="/show_properties/{{ $previous_project->title_en }}"><i class="fas fa-link"></i></a>

                                </div>
                            </div>
                            <div class="card-body card-text1">
                                <p class="calendar"><i class="fas fa-calendar-week"></i> {{ $previous_project->created_at->diffForHumans() }}</p>
                                <h5 class="card-title">
                                    @if (App::getLocale() == 'en')
                                        @if ($previous_project->title_en !='')
                                            <td>{{ \Str::limit($previous_project->title_en, 25) }}</td>
                                        @else
                                            <td>{{ \Str::limit($previous_project->title_ar, 25) }}</td>
                                        @endif
                                    @else
                                        @if ($previous_project->title_ar !='')
                                            <td>{{ \Str::limit($previous_project->title_ar, 25) }}</td>
                                        @else
                                            <td>{{ \Str::limit($previous_project->title_en, 25) }}</td>
                                        @endif
                                    @endif
                                </h5>
                                <p class="card-text">
                                    @if (App::getLocale() == 'en')
                                        @if ($previous_project->description_en !='')
                                            <td>{{ \Str::limit($previous_project->description_en, 270) }}</td>
                                        @else
                                            <td>{{ \Str::limit($previous_project->description_ar, 270) }}</td>
                                        @endif
                                    @else
                                        @if ($previous_project->description_ar !='')
                                            <td>{{ \Str::limit($previous_project->description_ar, 270) }}</td>
                                        @else
                                            <td>{{ \Str::limit($previous_project->description_en, 270) }}</td>
                                        @endif
                                    @endif
                                </p>
                                <a href="/show_properties/{{ $previous_project->title_en }}" class="btn btn-primary">{{ trans('front_trans.show_details') }}</a>
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
    <!--end card section-->
    <!--end our projects section-->








    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
