<!DOCTYPE html>
<html lang="en">
@section('title')
{{trans('main_trans.Main_title')}}
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<?php
        $user_count    =\App\User::where('admin', 0)->count();
        $category_count =\App\Models\Category::all()->count();
        $property_count =\App\Models\Property::all()->count();
        $gallery_count  =\App\Models\Gallery::where('type', 0)->count();
?>

<?php
    $users      =App\User::orderBy('id', 'desc')->limit(5)->get();
    $properties =App\Models\Property::orderBy('id', 'desc')->limit(5)->get();
    $categories =App\Models\Category::orderBy('id', 'desc')->limit(5)->get();
?>

<body style="font-family: 'Cairo', sans-serif">

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

 <div id="pre-loader">
     <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
 </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">{{trans('main_trans.Dashboard_page')}}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            <!-- widgets -->
            <div class="row" >
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-danger">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.Users') }}</p>
                                    <h4>{{$user_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>{{$user_count}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fa fa-building highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.Property') }}</p>
                                    <h4>{{$property_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i>{{$property_count}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fad fa-hospitals highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.category') }}</p>
                                    <h4>{{$category_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> {{$category_count}} </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fad fa-images highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark">{{ trans('main_trans.gallery') }}</p>
                                    <h4>{{$gallery_count}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fa fa-bookmark-o mr-1" aria-hidden="true"></i> {{$gallery_count}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt--7">
                <div class="row">

                    <!------------- Users In Dashboard -------------------->
                    <div class="col-xl-6 mb-5 mb-xl-0">
                        <div class="card bg-gradient-default dashboard_track">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0"  style="font-size: x-large;">{{  trans('main_trans.latest-user') }}</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{  trans('main_trans.see-all') }}</a>
                                    </div>
                                </div>
                            </div>
                            @if(count($users))
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ trans('contactus_trans.Name') }}</th></th>
                                                <th scope="col">{{ trans('contactus_trans.email') }}</th>
                                                <th scope="col">{{ trans('users_trans.created_at') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($users as $user)
                                                <tr>
                                                    @if (App::getLocale() == 'en')
                                                        @if ($user->name !='')
                                                            <td>{{ $user->name }}</td>
                                                        @else
                                                            <td>{{ $user->name_ar }}</td>
                                                        @endif
                                                    @else
                                                        @if ($user->name_ar !='')
                                                            <td>{{ $user->name_ar }}</td>
                                                        @else
                                                            <td>{{ $user->name }}</td>
                                                        @endif
                                                    @endif

                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                    <p class="lead text-center"> No Users Was Found </p>
                                @endif
                            </div>
                        </div>



                    <!------------- Category In Dashboard -------------------->
                    <div class="col-xl-6 mb-5 mb-xl-0">
                        <div class="card bg-gradient-default dashboard_track">
                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0" style="font-size: x-large;">{{  trans('main_trans.latest-category') }}</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">{{  trans('main_trans.see-all') }}</a>
                                    </div>
                                </div>
                            </div>
                            @if(count($categories))
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ trans('users_trans.Name') }}</th></th>
                                                <th scope="col">{{ trans('main_trans.Property') }}</th>
                                                <th scope="col">{{ trans('users_trans.created_at') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($categories as $category)
                                                <tr>
                                                    @if (App::getLocale() == 'en')
                                                        <td>{{ $category->name_en }}</td>
                                                    @else
                                                        <td>{{ $category->name_ar }}</td>
                                                    @endif

                                                    <td>( {{ count($category->properties) }}  ) {{ trans('main_trans.property') }}</td>
                                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            @else
                                <p class="lead text-center"> No Category Was Found </p>
                            @endif
                        </div>
                    </div>



                    <!------------- Courses In Dashboard -------------------->
                    <div class="col-xl-12" style="margin-top: 70px;">
                        <div class="card bg-gradient-default dashboard_course">

                            <div class="card-header border-0">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="mb-0"  style="font-size: x-large;">{{  trans('main_trans.latest-property') }}</h3>
                                    </div>
                                    <div class="col text-right">
                                        <a href="{{ route('properties.index') }}" class="btn btn-sm btn-primary">{{  trans('main_trans.see-all') }}</a>
                                    </div>
                                </div>
                            </div>

                            @if(count($properties))
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>{{ trans('property_trans.photo') }}</th>
                                                <th>{{ trans('property_trans.title') }}</th>
                                                <th>{{ trans('property_trans.category_id') }}</th>
                                                <th>{{ trans('property_trans.price') }}</th>
                                                <th>{{ trans('property_trans.purpose') }}</th>
                                                <th>{{ trans('property_trans.status') }}</th>
                                                <th>{{ trans('property_trans.city') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($properties as $property)
                                                <tr>

                                                    @if($property->photo)
                                                        <td><img class="img-responsive thumbnail" src="{{url('image/photo/'.$property->photo)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                                    @else
                                                        <td><img class="img-responsive thumbnail" src="{{url('image/photo/default.jpg')}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                                    @endif

                                                    @if (App::getLocale() == 'en')
                                                        @if ($property->title_en !='')
                                                            <td>{{ $property->title_en }}</td>
                                                        @else
                                                            <td>{{ $property->title_ar }}</td>
                                                        @endif
                                                    @else
                                                        <td>{{ $property->title_ar }}</td>
                                                    @endif

                                                    @if ($property->category)
                                                        @if (App::getLocale() == 'en')
                                                            @if ($property->category->name_en !='')
                                                                <td>{{ \Str::limit($property->category->name_en,25)}}</td>
                                                            @else
                                                                <td>{{ \Str::limit($property->category->name_ar,25)}}</td>
                                                            @endif
                                                        @else
                                                            <td>{{ \Str::limit($property->category->name_ar,25)}}</td>
                                                        @endif
                                                    @else
                                                        <td> - </td>
                                                    @endif


                                                    <td>{{ $property->price }}</td>
                                                    <td>{{$property->purpose == 'rent' ? trans('property_trans.rent') : trans('property_trans.sale') }}</td>
                                                    <td>{{$property->status == 'sold' ? trans('property_trans.sold') : trans('property_trans.for_sale') }}</td>

                                                    @if (App::getLocale() == 'en')
                                                        @if ($property->city_en !='')
                                                            <td>{{ $property->city_en }}</td>
                                                        @else
                                                            <td>{{ $property->city_ar }}</td>
                                                        @endif
                                                    @else
                                                        <td>{{ $property->city_ar }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </table>
                                </div>

                            @else
                                <p class="lead text-center"> No Properties Was Found </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <!--=================================
             wrapper -->

            <!--=================================
             footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
