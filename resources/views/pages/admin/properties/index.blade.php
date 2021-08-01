@extends('layouts.master')
@section('css')
    @toastr_css
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

                <button type="button" class="button x-small">
                    <a href="{{ route('properties.create') }}">{{ trans('property_trans.add_property') }}</a>
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        @include('pages.admin.properties.filter')
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('property_trans.photo') }}</th>
                                <th>{{ trans('property_trans.title') }}</th>
                                <th>{{ trans('property_trans.category_id') }}</th>
                                <th>{{ trans('property_trans.price') }}</th>
                                <th>{{ trans('property_trans.purpose') }}</th>
                                <th>{{ trans('property_trans.status') }}</th>
                                <th>{{ trans('property_trans.city') }}</th>
                                <th>{{ trans('property_trans.address') }}</th>
                                <th>{{ trans('property_trans.Processes') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                @forelse ($properties as $property)
                                    <tr>
                                        <?php $i++; ?>
                                        {{-- <td><input type="checkbox"  value="{{ $property->id }}" class="box1" ></td> --}}
                                        <td>{{ $i }}</td>

                                        @if($property->photo)
                                            <td><img class="img-responsive thumbnail" src="{{url('image/photo/'.$property->photo)}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                        @else
                                            <td><img class="img-responsive thumbnail" src="{{url('image/photo/default.jpg')}}" style="width: 70px; border-radius: 20px;    height: 56.01px;"></td>
                                        @endif

                                        @if (App::getLocale() == 'en')
                                            @if ($property->title_en !='')
                                                <td>{{ \Str::limit($property->title_en,25 ) }}</td>
                                            @else
                                                <td>{{ \Str::limit($property->title_ar,25 ) }}</td>
                                            @endif
                                        @else
                                            <td>{{ \Str::limit($property->title_ar,25 ) }}</td>
                                        @endif

                                        @if ($property->category)
                                            @if (App::getLocale() == 'en')
                                                @if ($property->category->name_en !='')
                                                    <td>{{ \Str::limit($property->category->name_en,25 )}}</td>
                                                @else
                                                    <td>{{ \Str::limit($property->category->name_ar,25 )}}</td>
                                                @endif
                                            @else
                                                <td>{{ \Str::limit($property->category->name_ar,25 )}}</td>
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

                                        @if (App::getLocale() == 'en')
                                            @if ($property->address_en !='')
                                                <td>{{ $property->address_en }}</td>
                                            @else
                                                <td>{{ $property->address_ar }}</td>
                                            @endif
                                        @else
                                            <td>{{ $property->address_ar }}</td>
                                        @endif

                                        <td class="property-td">
                                            {{-- <button type="button" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></button> --}}
                                            <a href="{{ route('properties.show', $property) }}"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button></a>
                                            <a href="{{ route('properties.edit', $property) }}"><button type="button" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{ $property->id }}"
                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>



                                    <!-- delete_modal_Property -->
                                    <div class="modal fade" id="delete{{ $property->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('property_trans.delete_property') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('properties.destroy', 'test') }}" method="post">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        {{ trans('Grades_trans.Warning_Grade') }}
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $property->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                            <button type="submit"
                                                                class="btn btn-danger">{{ trans('front_trans.Delete') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No posts found</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection


