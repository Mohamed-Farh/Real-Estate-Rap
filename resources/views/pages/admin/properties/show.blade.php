@extends('layouts.master')
@section('css')
    @toastr_css

    <style type="text/css">

        /*body {margin:2rem;}*/
        .modal-dialog {
              max-width: 800px;
              margin: 30px auto;
          }
        .modal-body {
          position:relative;
          padding:0px;
        }
        .close {
          position:absolute;
          right:-30px;
          top:0;
          z-index:999;
          font-size:2rem;
          font-weight: normal;
          color:#fff;
          opacity:1;
        }
    </style>
@section('title')
    {{ trans('property_trans.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Property') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
@if ($errors->any())
    <div class="error">{{ $errors->first('Name') }}</div>
@endif

<style type="text/css">

    /*body {margin:2rem;}*/
    .modal-dialog {
          max-width: 800px;
          margin: 30px auto;
      }
    .modal-body {
      position:relative;
      padding:0px;
    }
    .close {
      position:absolute;
      right:-30px;
      top:0;
      z-index:999;
      font-size:2rem;
      font-weight: normal;
      color:#fff;
      opacity:1;
    }
</style>

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


            <div class="title_design">
                @if (App::getLocale() == 'en')
                    @if ($property->title_en != '')
                        <h2 class="h2-space" style="color: white">{{ \Str::limit($property->title_en, 100) }}</h2>
                    @else
                        <h2 class="h2-space" style="color: white">{{ \Str::limit($property->title_ar, 100) }}</h2>
                    @endif
                @else
                    <h2 class="h2-space" style="color: white">{{ \Str::limit($property->title_ar, 100) }}</h2>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                    <img class="single_photo" src="{{ url('image/' . $image) }}" alt="Property Photo" style="width: 100%; height:540px;">
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <table class="table table-striped" style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.price') }}</th>
                                <th>{{ $property->price }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.size') }}</th>
                                <th>{{ $property->size }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.discount') }}</th>
                                <th>{{ $property->discount }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.new_price') }}</th>
                                <th>{{ $property->new_price }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-striped" style="padding-top: 20px;">
                        <tbody>
                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.Used') }}</th>
                                <th>{{ $property->used == 'used' ? trans('property_trans.used') : trans('property_trans.new') }}
                                </th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.purpose') }}</th>
                                <th>{{ $property->used == 'rent' ? trans('property_trans.rent') : trans('property_trans.sale') }}
                                </th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.floornumber') }}</th>
                                <th>{{ $property->floornumber }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.bedroom') }}</th>
                                <th>{{ $property->bedroom }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.bathroom') }}</th>
                                <th>{{ $property->bathroom }}</th>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <th>{{ trans('property_trans.no_of_floor') }}</th>
                                <th>{{ $property->no_of_floor }}</th>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-striped" style="padding-top: 20px;">
                        <tbody>

                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.category_id') }}</th>
                                @if (App::getLocale() == 'en')
                                    @if ($property->category->name_en !='')
                                        <th>{{ \Str::limit($property->category->name_en,25)}}</th>
                                    @else
                                        <th>{{ \Str::limit($property->category->name_ar,25)}}</th>
                                    @endif
                                @else
                                    <th>{{ \Str::limit($property->category->name_ar,25)}}</th>
                                @endif

                            <tr>

                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.city') }}</th>
                                @if (App::getLocale() == 'en')
                                    @if ($property->city_en != '')
                                        <th>{{ $property->city_en }}</th>
                                    @else
                                        <th>{{ $property->city_ar }}</th>
                                    @endif
                                @else
                                    <th>{{ $property->city_ar }}</th>
                                @endif
                            </tr>
                            <tr>
                                <th></th>
                                <th>{{ trans('property_trans.address') }}</th>
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
                        </tbody>
                    </table>

                    @if ($property->video)
                        <div class="col" style="text-align: center">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary video-btn primary-btn text-uppercase" data-toggle="modal" data-src="{{ $property->video }}" data-target="#myModal">
                                <i class="fa fa-youtube"></i> Watch Video Of Property
                            </button>
                        </div>
                    @endif

            </div>



            <table class="table align-items-center table-flush small_space">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ trans('property_trans.description') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (App::getLocale() == 'en')
                        @if ($property->description_en != '')
                            <th>{{ $property->description_en }}</th>
                        @else
                            <th>{{ $property->description_ar }}</th>
                        @endif
                    @else
                        <th>{{ $property->description_ar }}</th>
                    @endif
                </tbody>
            </table>

            <table class="table align-items-center table-flush space">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ trans('property_trans.nearby') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (App::getLocale() == 'en')
                        @if ($property->nearby_en != '')
                            <th>{{ $property->nearby_en }}</th>
                        @else
                            <th>{{ $property->nearby_ar }}</th>
                        @endif
                    @else
                        <th>{{ $property->nearby_ar }}</th>
                    @endif
                </tbody>
            </table>



            <div class="container space">
                {{-- <h1>{{$vendor->title}}</h1> --}}

                <div id="map-canvas" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
            </div>



            <div class="container video">
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
        </div>

        <!-- start map -->
        <div class="building-map py-4">
            <div class="container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13674.194668823182!2d{{ $property->location_longitude }}!3d{{ $property->location_latitude }}!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1624956128867!5m2!1sen!2seg"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>
        <!-- end map -->


    </div>
</div>
<!-- row closed -->
@endsection





