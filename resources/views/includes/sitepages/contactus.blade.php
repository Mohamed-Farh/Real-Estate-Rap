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
            <h2>{{ trans('contactus_trans.main_title') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about">
        </div>
    </div>
    <!--end lines-->

    <?php
    $customers = \App\Models\Social::where('type', 'Customers Service')->get();
    $inquiries = \App\Models\Social::where('type', 'Inquiries')->get();
    $accounts = \App\Models\Social::where('type', 'Accounts')->get();
    $recruitments = \App\Models\Social::where('type', 'Recruitment')->get();
    ?>

    <!--start contactus section-->
    <div class="contact-us-section1 py-4">
        <div class="container">
            <div class="row">
                {{-- @foreach ($socials as $social)
                @if ($social->contact == '1') --}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 make_right_ar">
                    <h1>{{ trans('front_trans.company_location') }}</h1>
                    <div class="line line-4"></div>
                    <a>
                        <p><i
                                class="fas fa-map-marker-alt text-9 text-color-light mb-3 mt-2"></i>{{ trans('contactus_trans.address') }}
                        </p>
                        <p class="mb-0" style="padding-left: 35px">
                            <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                {{ trans('front_trans.raptors_location') }}
                            </span>
                        </p>
                    </a>
                    <a>
                        <p><i
                                class="fas fa-phone-volume text-9 text-color-light mb-3 mt-2"></i>{{ trans('contactus_trans.customers_service') }}
                        </p>
                        <p class="mb-0" style="padding-left: 35px">
                            <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                @foreach ($customers as $customer)
                                    @if ($customer->status == '1')
                                        {{ $customer->name }}
                                    @endif
                                @endforeach
                            </span>
                        </p>
                    </a>
                    <a>
                        <p><i class="fas fa-info-circle text-9 text-color-light mb-3 mt-2"></i>
                            {{ trans('contactus_trans.inquiries') }}</p>
                        <p class="mb-0" style="padding-left: 35px">
                            @foreach ($inquiries as $inquirie)
                                @if ($inquirie->status == '1')
                                    <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                        {{ $inquirie->name }}
                                    </span>
                                @endif
                            @endforeach
                        </p>
                    </a>
                    <a>
                        <p><i class="fas fa-calculator text-9 text-color-light mb-3 mt-2"></i>
                            {{ trans('contactus_trans.accounts') }}</p>
                        <p class="mb-0" style="padding-left: 35px">
                            @foreach ($accounts as $account)
                                @if ($account->status == '1')
                                    <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                        {{ $account->name }}
                                    </span>
                                @endif
                            @endforeach
                        </p>
                    </a>
                    <a>
                        <p><i class="fas fa-user text-9 text-color-light mb-3 mt-2"></i>
                            {{ trans('contactus_trans.recruitment') }}</p>
                        <p class="mb-0" style="padding-left: 35px">
                            @foreach ($recruitments as $recruitment)
                                @if ($recruitment->status == '1')
                                    <span class="d-block text-2 p-relative bottom-3 Font_01 text-3 mt-2  Font_Clean">
                                        {{ $recruitment->name }}
                                    </span>
                                @endif
                            @endforeach
                        </p>
                    </a>
                </div>
                {{-- @endif
                @endforeach --}}


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 contactus make_right_ar">
                    <h1>{{ trans('contactus_trans.main_title') }}</h1>
                    <div class="line line-4"></div>

                    {!! Form::open(['route' => 'contactus/send_message', 'method' => 'post', 'id' => 'contact-form']) !!}
                    <div class="contact-form-text">
                        {!! Form::text('name', old('name'), ['placeholder' => trans('contactus_trans.Name')]) !!}

                        @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="contact-form-text">
                        {!! Form::email('email', old('email'), ['placeholder' => trans('contactus_trans.email')]) !!}
                        {!! Form::text('mobile', old('mobile'), ['placeholder' => trans('front_trans.mobile')]) !!}
                    </div>
                    <div class="contact-form-text">
                        @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="contact-form-text">
                        {!! Form::text('subject', old('subject'), ['placeholder' => trans('contactus_trans.subject')]) !!}
                        @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="contact-form-text">
                        {!! Form::textarea('message', old('message'), ['placeholder' => trans('contactus_trans.message')]) !!}
                        @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="text-center">
                        {!! Form::button(trans('contactus_trans.send_message'), ['type' => 'submit']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <!--start map section-->
            <div class="map-section " style="margin-top: 50px">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d27348.384310895814!2d31.38428015!3d31.038839499999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1623335886089!5m2!1sen!2seg"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
            <!--end map section-->

        </div>
    </div>

    <!--end contactus section-->


    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
