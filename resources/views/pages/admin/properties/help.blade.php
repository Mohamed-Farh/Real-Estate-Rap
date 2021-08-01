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

<?php
        $category_ar = App\Models\Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
        $category_en = App\Models\Category::orderBy('id', 'desc')->pluck('name_en', 'id');

        $feature_ar = App\Models\Feature::orderBy('id', 'desc')->pluck('name_ar', 'id');
        $feature_en = App\Models\Feature::orderBy('id', 'desc')->pluck('name_en', 'id');
?>
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

                <button type="button" class="button x-small back_property">
                    <a href="{{ route('properties.index') }}">{{ trans('property_trans.return') }}</a>
                </button>
                <br><br>

                <div class="card-body">
                    {!! Form::open(['route' => 'properties.store', 'method' => 'post', 'files' => true , 'nctype'=>'multipart/form-data'] ) !!}
                    {{-- {!! Form::open(['route' => 'properties.store', 'method' => 'post', 'files' => true]) !!} --}}
                    {{--------- Title -----------}}
                    <div class="row beauty_top">
                        <h2 class="help">{{ trans('property_trans.title') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('title_ar', trans('property_trans.title_ar') ) !!}
                                {!! Form::text('title_ar', old('title'), ['class' => 'form-control']) !!}
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('title_en', trans('property_trans.title_en')) !!}
                                {!! Form::text('title_en', old('title'), ['class' => 'form-control']) !!}
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="col-12 small_space">
                            {!! Form::label('photo', trans('property_trans.photo') )  !!}
                            {{ Form::file('photo') }}
                        </div>
                        </div>
                            @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    {{--------- Price -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{  trans('property_trans.Price') }}</h2>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('price', trans('property_trans.price') ) !!}
                                {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('size', trans('property_trans.size') ) !!}
                                {!! Form::number('size', old('size'), ['class' => 'form-control']) !!}
                                @error('size')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('discount', trans('property_trans.discount') ) !!}
                                {!! Form::number('discount', old('discount'), ['class' => 'form-control'], ['min'=>5,'max'=>90]) !!}
                                @error('discount')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('new_price', trans('property_trans.new_price') ) !!}
                                {!! Form::number('new_price', old('new_price'), ['class' => 'form-control']) !!}
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    {{--------- Bed Rooms Bath  -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{  trans('main_trans.Property')  }}</h2>
                            <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('floornumber', trans('property_trans.floornumber') ) !!}
                                {!! Form::number('floornumber', old('floornumber'), ['class' => 'form-control']) !!}
                                @error('floornumber')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('bedroom', trans('property_trans.bedroom') ) !!}
                                {!! Form::number('bedroom', old('bedroom'), ['class' => 'form-control']) !!}
                                @error('bedroom')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('bathroom', trans('property_trans.bathroom') ) !!}
                                {!! Form::number('bathroom', old('bathroom'), ['class' => 'form-control']) !!}
                                @error('bathroom')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('no_of_floor', trans('property_trans.no_of_floor') ) !!}
                                {!! Form::number('no_of_floor', old('no_of_floor'), ['class' => 'form-control']) !!}
                                @error('no_of_floor')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6 small_space">
                            {!! Form::label('purpose', trans('property_trans.purpose') ) !!}
                            {!! Form::select('purpose', ['' =>trans('property_trans.-- Please Select --'), 'sale' => trans('property_trans.sale'), 'rent' => trans('property_trans.rent')], old('purpose'), ['class' => 'form-control choose'])  !!}
                            @error('purpose')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 small_space">
                            {!! Form::label('used', trans('property_trans.used') ) !!}
                            {!! Form::select('used', ['' =>trans('property_trans.-- Please Select --'), 'new' => trans('property_trans.new'), 'used' => trans('property_trans.used')], old('purpose'), ['class' => 'form-control choose'])  !!}
                            @error('used')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 small_space">
                            {!! Form::label('category_id', trans('property_trans.category_id') ) !!}
                            @if (App::getLocale() == 'en')
                                @if ($category_en !='')
                                        {!! Form::select('category_id', ['' =>trans('property_trans.-- Please Select --')] + $category_en->toArray(), old('category_id'), ['class' => 'form-control choose']) !!}
                                @else
                                        {!! Form::select('category_id', ['' =>trans('property_trans.-- Please Select --')] + $category_ar->toArray(), old('category_id'), ['class' => 'form-control choose']) !!}
                                @endif
                            @else
                                @if ($category_ar !='')
                                    {!! Form::select('category_id', ['' =>trans('property_trans.-- Please Select --')] + $category_ar->toArray(), old('category_id'), ['class' => 'form-control choose']) !!}
                                @else
                                    {!! Form::select('category_id', ['' =>trans('property_trans.-- Please Select --')] + $category_en->toArray(), old('category_id'), ['class' => 'form-control choose']) !!}
                                @endif
                            @endif
                            @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 small_space">
                            {!! Form::label('status', trans('property_trans.status') ) !!}
                            {!! Form::select('status', ['' =>trans('property_trans.-- Please Select --'), 'for_sale' => trans('property_trans.for_sale'), 'sold' => trans('property_trans.sold')], old('status'), ['class' => 'form-control choose'])  !!}
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6 small_space">
                            {!! Form::label('feature_id', trans('feature_trans.feature_id') ) !!}
                            @if (App::getLocale() == 'en')
                                @if ($category_en !='')
                                        {!! Form::select('feature_id[]', ['' =>trans('property_trans.-- Please Select --')] + $feature_en->toArray(),null, ['class'=>'form-control choose', 'multiple' => true]) !!}
                                @else
                                        {!! Form::select('feature_id[]', ['' =>trans('property_trans.-- Please Select --')] + $feature_ar->toArray(), null , ['class'=>'form-control choose', 'multiple' => true]) !!}
                                @endif
                            @else
                                @if ($category_ar !='')
                                    {!! Form::select('feature_id[]', ['' =>trans('property_trans.-- Please Select --')] + $feature_ar->toArray(), null , ['class'=>'form-control choose', 'multiple']) !!}
                                @else
                                    {!! Form::select('feature_id[]', ['' =>trans('property_trans.-- Please Select --')] + $feature_en->toArray(), null , ['class'=>'form-control choose', 'multiple']) !!}
                                @endif
                            @endif
                            @error('feature_id')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>


                    {{--------- Location  -----------}}
                    <div class="row  beauty1">
                        <h2 class="help">{{  trans('property_trans.Location')  }}</h2>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('city_ar', trans('property_trans.city_ar') ) !!} *
                                {!! Form::text('city_ar', old('city_ar'), ['class' => 'form-control']) !!}
                                @error('city_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('city_en', trans('property_trans.city_en') ) !!} *
                                {!! Form::text('city_en', old('city_en'), ['class' => 'form-control']) !!}
                                @error('city_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('address_ar', trans('property_trans.address_ar') ) !!} *
                                {!! Form::text('address_ar', old('address_ar'), ['class' => 'form-control']) !!}
                                @error('address_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('address_en', trans('property_trans.address_en') ) !!} *
                                {!! Form::text('address_en', old('address_en'), ['class' => 'form-control']) !!}
                                @error('address_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row beauty1">
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('location_latitude', trans('property_trans.location_latitude') ) !!} *
                                {!! Form::text('location_latitude', old('location_latitude'), ['class' => 'form-control']) !!}
                                @error('location_latitude')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('location_longitude', trans('property_trans.location_longitude') ) !!} *
                                {!! Form::text('location_longitude', old('location_longitude'), ['class' => 'form-control']) !!}
                                @error('location_longitude')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row beauty">
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('nearby_en', trans('property_trans.nearby_ar') ) !!} *
                                {!! Form::textarea('nearby_en', old('nearby_en'), ['class' => 'form-control summernote']) !!}
                                @error('nearby_en')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('nearby_ar', trans('property_trans.nearby_en') ) !!} *
                                {!! Form::textarea('nearby_ar', old('nearby_ar'), ['class' => 'form-control summernote']) !!}
                                @error('nearby_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    <div class="row beauty">
                        <h2 class="help">{{ trans('property_trans.description') }}</h2>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('description_en', trans('property_trans.description_en') ) !!} *
                                {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control summernote']) !!}
                                @error('description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('description_ar', trans('property_trans.description_ar') ) !!} *
                                {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control summernote']) !!}
                                @error('description_ar')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    {{--------- Vedio -----------}}
                    <div class="row beauty">
                        <h2 class="help">{{  trans('property_trans.video')  }}</h2>
                        <div class="col">
                            <div class="form-group">
                                {!! Form::label('video', trans('property_trans.video') ) !!} *
                                {!! Form::text('video', old('video'), ['class' => 'form-control']) !!}
                                @error('video')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row pt-4">
                        <h2 class="help">{{ trans('property_trans.images') }}</h2>
                        <div class="col-12">
                            {!! Form::label('Sliders', trans('property_trans.images') ) !!} *
                            <br>
                            <div class="file-loading">
                                {!! Form::file('images[]', ['id' => 'post-images', 'class' => 'file-input-overview', 'multiple' => 'multiple'] ) !!}
                                <span class="form-text text-muted">Image width should be 800px x 500px</span>
                                @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div> --}}
                    <div class="row pt-4">
                            <div class="col-12">
                            {!! Form::label('images', trans('property_trans.images') ) !!}
                            <br>
                            <div>
                                {!! Form::file('images[]', ['name'=>'images[]', 'class' => 'file-input-overview', 'multiple' => 'multiple']) !!}
                                @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                            {!! Form::label('photo77', trans('property_trans.photo') )  !!}
                            {{ Form::file('photo77[]', ['class' => 'file-input-overview', 'multiple' => 'multiple']) }}


                    <div class="form-group pt-4">
                        {!! Form::submit( trans('property_trans.submit') , ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
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
                height: 200,
            });
        });
    </script>
@endsection


