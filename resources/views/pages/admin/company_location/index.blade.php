@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    {{ trans('front_trans.company_location') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
{{ trans('front_trans.company_location') }}
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
                $company_locations = \App\Models\Company_Location::all();
            ?>


            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('front_trans.add') }}
            </button>
            <br><br>

            <!--start about us section-->
            <div class="table-responsive">
                <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                    style="text-align: center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('front_trans.country') }}</th>
                            <th>{{ trans('front_trans.city') }}</th>
                            <th>{{ trans('front_trans.address') }}</th>
                            <th>{{ trans('front_trans.location_latitude') }}</th>
                            <th>{{ trans('front_trans.location_longitude') }}</th>
                            <th>{{ trans('feature_trans.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                            <tr>
                            @foreach ($company_locations as $location)
                                <?php $i++; ?>
                                    <td>{{ $i }}</td>

                                    @if (App::getLocale() == 'en')
                                        @if ($location->country_en !='')
                                            <td>{{ $location->country_en }}</td>
                                        @else
                                            <td>{{ $location->country_ar }}</td>
                                        @endif
                                    @else
                                        @if ($location->country_ar !='')
                                            <td>{{ $location->country_ar }}</td>
                                        @else
                                            <td>{{ $location->country_en }}</td>
                                        @endif
                                    @endif

                                    @if (App::getLocale() == 'en')
                                        @if ($location->city_en !='')
                                            <td>{{ $location->city_en }}</td>
                                        @else
                                            <td>{{ $location->city_ar }}</td>
                                        @endif
                                    @else
                                        @if ($location->city_ar !='')
                                            <td>{{ $location->city_ar }}</td>
                                        @else
                                            <td>{{ $location->city_en }}</td>
                                        @endif
                                    @endif

                                    @if (App::getLocale() == 'en')
                                        @if ($location->address_en !='')
                                            <td>{{ $location->address_en }}</td>
                                        @else
                                            <td>{{ $location->address_ar }}</td>
                                        @endif
                                    @else
                                        @if ($location->address_ar !='')
                                            <td>{{ $location->address_ar }}</td>
                                        @else
                                            <td>{{ $location->address_en }}</td>
                                        @endif
                                    @endif


                                    <td>{{ $location->location_latitude }}</td>
                                    <td>{{ $location->location_longitude }}</td>

                                    <td>

                                        <button type="button" class="btn btn-success btn-sm">
                                            <a href="https://www.google.com/maps/search/?api=1&query={{ $location->location_latitude }},{{ $location->location_longitude }}" target="_blank">
                                            <i class="fa fa-eye"></i></a></button>

                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $location->id }}"
                                            title="{{ trans('feature_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $location->id }}"
                                            title="{{ trans('feature_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                            </tr>

                            <!-- edit_modal_feature -->
                            <div class="modal fade" id="edit{{ $location->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content"  style="width: 120% !important; ">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.edit') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('company_location.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $location->id }}">
                                                <div class="row"  style="padding: 25px 0px 5px 0px;">
                                                    <div class="col">
                                                        <label for="country_ar" class="mr-sm-2">{{ trans('front_trans.country_ar') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="country_ar" value="{{ $location->country_ar }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="country_en" class="mr-sm-2">{{ trans('front_trans.country_en') }}
                                                            :</label>
                                                        <input type="text" name="country_en" class="form-control" value="{{ $location->country_en }}">
                                                    </div>
                                                </div>

                                                <div class="row"  style="padding: 25px 0px 5px 0px;">
                                                    <div class="col">
                                                        <label for="city_ar" class="mr-sm-2">{{ trans('front_trans.city_ar') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="city_ar" value="{{ $location->city_ar }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="city_en" class="mr-sm-2">{{ trans('front_trans.city_en') }}
                                                            :</label>
                                                        <input type="text" name="city_en" class="form-control" value="{{ $location->city_en }}">
                                                    </div>
                                                </div>

                                                <div class="row"  style="padding: 25px 0px 5px 0px;">
                                                    <div class="col">
                                                        <label for="address_ar" class="mr-sm-2">{{ trans('front_trans.address_ar') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="address_ar" value="{{ $location->address_ar }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="address_en" class="mr-sm-2">{{ trans('front_trans.address_en') }}
                                                            :</label>
                                                        <input type="text" name="address_en" class="form-control" value="{{ $location->address_en }}">
                                                    </div>
                                                </div>

                                                <div class="row"  style="padding: 25px 0px 5px 0px;">
                                                    <div class="col">
                                                        <label for="location_latitude" class="mr-sm-2">{{ trans('front_trans.location_latitude') }}
                                                            :</label>
                                                        <input type="number" step="any" class="form-control" name="location_latitude" value="{{ $location->location_latitude }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="location_longitude" class="mr-sm-2">{{ trans('front_trans.location_longitude') }}
                                                            :</label>
                                                        <input type="number" step="any" name="location_longitude" class="form-control" value="{{ $location->location_longitude }}">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('feature_trans.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_feature -->
                            <div class="modal fade" id="delete{{ $location->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('front_trans.Delete') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('company_location.destroy', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('social_trans.Warning_social') }}
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                    value="{{ $location->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('front_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('front_trans.Delete') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_feature -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 120% !important; ">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('front_trans.add') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('company_location.store') }}" method="POST">
                    @csrf

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="country_ar" class="mr-sm-2">{{ trans('front_trans.country_ar') }}
                                :</label>
                            <input type="text" class="form-control" name="country_ar">
                        </div>
                        <div class="col">
                            <label for="country_en" class="mr-sm-2">{{ trans('front_trans.country_en') }}
                                :</label>
                            <input type="text" name="country_en" class="form-control">
                        </div>
                    </div>

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="city_ar" class="mr-sm-2">{{ trans('front_trans.city_ar') }}
                                :</label>
                            <input type="text" class="form-control" name="city_ar">
                        </div>
                        <div class="col">
                            <label for="city_en" class="mr-sm-2">{{ trans('front_trans.city_en') }}
                                :</label>
                            <input type="text" name="city_en" class="form-control">
                        </div>
                    </div>

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="address_ar" class="mr-sm-2">{{ trans('front_trans.address_ar') }}
                                :</label>
                            <input type="text" class="form-control" name="address_ar">
                        </div>
                        <div class="col">
                            <label for="address_en" class="mr-sm-2">{{ trans('front_trans.address_en') }}
                                :</label>
                            <input type="text" name="address_en" class="form-control">
                        </div>
                    </div>

                    <div class="row"  style="padding: 25px 0px 5px 0px;">
                        <div class="col">
                            <label for="location_latitude" class="mr-sm-2">{{ trans('front_trans.location_latitude') }}
                                :</label>
                            <input type="number" step="any" class="form-control" name="location_latitude">
                        </div>
                        <div class="col">
                            <label for="location_longitude" class="mr-sm-2">{{ trans('front_trans.location_longitude') }}
                                :</label>
                            <input type="number" step="any" name="location_longitude" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('feature_trans.Close') }}</button>
                        <button type="submit"
                            class="btn btn-success">{{ trans('feature_trans.submit') }}</button>
                    </div>
                </form>

            </div>
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
