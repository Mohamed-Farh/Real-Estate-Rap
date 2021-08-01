<div class="card-body">
    {!! Form::open(['route' => 'property/search', 'method' => 'get']) !!}
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::text('keyword', old('keyword', request()->input('keyword')), ['class' => 'form-control', 'placeholder' => trans('front_trans.type_word')]) !!}
            </div>
        </div>

        <?php
            $category_ar = \App\Models\Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
            $category_en = \App\Models\Category::orderBy('id', 'desc')->pluck('name_en', 'id');
        ?>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                @if (App::getLocale() == 'en')
                    @if ($category_en !='')
                        {!! Form::select('category_id', ['' => trans('front_trans.-')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'form-control choose_filter']) !!}
                    @else
                    {!! Form::select('category_id', ['' => trans('front_trans.-')] + $category_ar->toArray(), old('category_id', request()->input('category_id')), ['class' => 'form-control choose_filter']) !!}
                    @endif
                @else
                    @if ($category_ar !='')
                    {!! Form::select('category_id', ['' => trans('front_trans.-')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'form-control choose_filter']) !!}
                    @else
                    {!! Form::select('category_id', ['' => trans('front_trans.-')] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'form-control choose_filter']) !!}
                    @endif
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                @if (App::getLocale() == 'en')
                    {!! Form::text('city_en', old('city_en', request()->input('city_en')), ['class' => 'form-control', 'placeholder' => 'Search City Here']) !!}
                @else
                    {!! Form::text('city_ar', old('city_ar', request()->input('city_ar')), ['class' => 'form-control', 'placeholder' => 'بحث بالمدينة']) !!}
                @endif
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                @if (App::getLocale() == 'en')
                    {!! Form::text('address_en', old('address_en', request()->input('address_en')), ['class' => 'form-control', 'placeholder' => 'Search Address Here']) !!}
                @else
                    {!! Form::text('address_ar', old('address_ar', request()->input('address_ar')), ['class' => 'form-control', 'placeholder' => 'بحث بالحي']) !!}
                @endif
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group" style="padding-top: 7px">
                {!! Form::select('price', ['' => trans('front_trans.-'), 'less_expensive' =>trans('front_trans.less_expensive'), 'more_expensive' =>trans('front_trans.more_expensive')], old('price', request()->input('price')), ['class' => 'form-control choose_filter filter_edit']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group" style="padding-top: 7px">
                {!! Form::select('size', ['' => trans('front_trans.-'), 'less_size' =>trans('front_trans.less_size'), 'more_size' =>trans('front_trans.more_size')], old('price', request()->input('price')), ['class' => 'form-control choose_filter filter_edit']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('price', trans('front_trans.price'))  !!}
                {!! Form::text('min_price', old('min_price'), ['class' => 'form-control', 'placeholder' => trans('front_trans.min_price')]) !!} <br>
                {!! Form::text('max_price', old('max_price'), ['class' => 'form-control', 'placeholder' => trans('front_trans.max_price')]) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('size', trans('front_trans.size'))  !!}
                {!! Form::text('min_size', old('min_size'), ['class' => 'form-control', 'placeholder' => trans('front_trans.min_size')]) !!} <br>
                {!! Form::text('max_size', old('max_size'), ['class' => 'form-control', 'placeholder' => trans('front_trans.max_size')]) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="    margin-top: 28px;">
            <div class="form-group">
                {!! Form::button(trans('front_trans.search_here'), ['class' => 'btn btn-info property_search', 'type' => 'submit']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

