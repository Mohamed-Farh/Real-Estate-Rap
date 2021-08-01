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
    <div class="title-nav py-4  make_right_ar">
        <div class="container">
            <h2>{{ trans('front_trans.look_for_property') }}</h2>
        </div>
    </div>
    <!--end title-->

    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about line-3-search">
        </div>
    </div>
    <!--end lines-->

    <!--start paragraph section-->
    <div class="paragraph-search py-4 text-right">
        <div class="container">
        </div>
    </div>
    <!--end paragraph section-->



    <!--start search info-->
    <div class="search-info py-4">
        <div class="container">
            <div class="row">
                <div class="colxs-12 col-sm-12 col-md-6 col-lg-6">
                    <img src="{{asset('app-assets/images/home-inspection.jpg')}}" />
                </div>

                {{-- <div class="colxs-12 col-sm-12 col-md-6 col-lg-6">
                    <form class="search-form">
                        <input class="contact-form-text" type="text" placeholder="برجاء اختيار المنطقة">
                        <input class="contact-form-text" type="text" placeholder="برجاء اختيار الحي">
                        <input class="contact-form-text" type="text" placeholder="برجاء تحديد المساحة">
                        <input class="contact-form-text" type="text" placeholder="برجاء تحديد الحد الادنى للمساحة">
                        <input class="contact-form-text" type="text" placeholder="برجاء تحديد الحدالاقصى للمساحة">
                        <input class="contact-form-text" type="text" placeholder="برجاء تحديد الحد الادنى للسعر">
                        <input class="contact-form-text" type="text" placeholder="برجاء تحديد الحد الاقصى للسعر">

                        <button class="text-center">ابحث عن وحدتك</button>
                    </form> --}}



                <div class="colxs-12 col-sm-12 col-md-6 col-lg-6">
                    {!! Form::open(['route' => '/home/search', 'method' => 'get'], ['class' => 'search-form'] ) !!}

                        <div class="form-group">
                            {!! Form::text('keyword', old('keyword', request()->input('keyword')), ['class' => 'contact-form-text', 'placeholder' => trans('front_trans.type_word')]) !!}
                        </div>

                        <?php
                            $category_ar = \App\Models\Category::orderBy('id', 'desc')->pluck('name_ar', 'id');
                            $category_en = \App\Models\Category::orderBy('id', 'desc')->pluck('name_en', 'id');
                        ?>

                        <div class="form-group">
                            @if (App::getLocale() == 'en')
                                {!! Form::text('city_en', old('city_en', request()->input('city_en')), ['class' => 'contact-form-text', 'placeholder' => 'Search City Here']) !!}
                            @else
                                {!! Form::text('city_ar', old('city_ar', request()->input('city_ar')), ['class' => 'contact-form-text', 'placeholder' => 'بحث بالمدينة']) !!}
                            @endif
                        </div>

                        <div class="form-group">
                            @if (App::getLocale() == 'en')
                                {!! Form::text('address_en', old('address_en', request()->input('address_en')), ['class' => 'contact-form-text', 'placeholder' => 'Search Address Here']) !!}
                            @else
                                {!! Form::text('address_ar', old('address_ar', request()->input('address_ar')), ['class' => 'contact-form-text', 'placeholder' => 'بحث بالحي']) !!}
                            @endif
                        </div><br>


                        <div class="form-group">
                            {!! Form::hidden('price', trans('front_trans.price'))  !!}
                            {!! Form::text('min_price', old('min_price'), ['class' => 'contact-form-text', 'placeholder' => trans('front_trans.min_price')]) !!}
                            {!! Form::text('max_price', old('max_price'), ['class' => 'contact-form-text', 'placeholder' => trans('front_trans.max_price')]) !!}
                        </div><br>

                        <div class="form-group">
                            {!! Form::hidden('size', trans('front_trans.size'))  !!}
                            {!! Form::text('min_size', old('min_size'), ['class' => 'contact-form-text', 'placeholder' => trans('front_trans.min_size')]) !!}
                            {!! Form::text('max_size', old('max_size'), ['class' => 'contact-form-text', 'placeholder' => trans('front_trans.max_size')]) !!}
                        </div>

                        {{-- <div class="form-group" style="padding-top: 7px">
                            {!! Form::select('price', ['' => '---', 'less_expensive' =>trans('front_trans.less_expensive'), 'more_expensive' =>trans('front_trans.more_expensive')], old('price', request()->input('price')), ['class' => 'contact-form-text  custom-select custom-select-lg mb-3']) !!}
                        </div>

                        <div class="form-group" style="padding-top: 7px">
                            {!! Form::select('size', ['' => '---', 'less_size' =>trans('front_trans.less_size'), 'more_size' =>trans('front_trans.more_size')], old('price', request()->input('price')), ['class' => 'contact-form-text custom-select custom-select-lg mb-3']) !!}
                        </div>



                        <div class="form-group">
                            @if (App::getLocale() == 'en')
                                @if ($category_en !='')
                                    {!! Form::select('category_id', ['' => '---'] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'contact-form-text  custom-select custom-select-lg mb-3']) !!}
                                @else
                                {!! Form::select('category_id', ['' => '---'] + $category_ar->toArray(), old('category_id', request()->input('category_id')), ['class' => 'contact-form-text  custom-select custom-select-lg mb-3']) !!}
                                @endif
                            @else
                                @if ($category_ar !='')
                                {!! Form::select('category_id', ['' => '---'] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'contact-form-text custom-select custom-select-lg mb-3']) !!}
                                @else
                                {!! Form::select('category_id', ['' => '---'] + $category_en->toArray(), old('category_id', request()->input('category_id')), ['class' => 'contact-form-text custom-select custom-select-lg mb-3']) !!}
                                @endif
                            @endif
                        </div> --}}

                        <div class="form-group">
                            {!! Form::button(trans('front_trans.search_here'), ['class' => 'text-center', 'type' => 'submit']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>



            </div>
            <div class="emails-section py-4  make_right_ar">
                <?php $Facebooks = \App\Models\Social::where('type', 'Facebook')->get(); ?>
                <h1 class="py-4">{{ trans('contactus_trans.email') }}</h1>
                <div class="line line-4"></div>
                <p>sales@raptorsegypt.com</p>
                <p>hr@raptorsegypt.com</p>
                <p>info@raptorsegypt.com</p>

                {{-- @foreach ($Facebooks as $Facebook)
                        @if ($Facebook->status == '1')
                            <a href="{{ $Facebook->name }}"><i class="fab fa-facebook"></i></a>
                        @endif
                    @endforeach --}}
            </div>
        </div>
    </div>
    <!--end search info-->









    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
