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
            <h2>{{ trans('front_trans.company_jobs') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about line-3-search line-4-images">
        </div>
    </div>
    <!--end lines-->




    <?php
        $annoncements = \App\Models\Company_Job::where('type', 'Annoncement')->get();
        $job_titles   = \App\Models\Company_Job::where('type', 'Job Title')->get();
        $job_emails   = \App\Models\Company_Job::where('type', 'Job E-Mail')->get();
    ?>




    <!-- start jops section -->
    <div class="jops-section py-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 make_right_ar">
                    <h1>{{ trans('front_trans.jobs') }}</h1>

                        @foreach ($annoncements as $annoncement )
                            @if ($annoncement->status =='0')
                                <div class="line line-4"></div>
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($annoncement->title_en !='')
                                            <th>{{ \Str::limit($annoncement->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($annoncement->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($annoncement->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach



                    <h1 class="py-4">{{ trans('front_trans.available_jobs') }}</h1>
                        <div class="line line-4"></div>
                         @foreach ($job_titles as $job_title )
                            @if ($job_title->status =='0')
                                
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($job_title->title_en !='')
                                            <th>{{ \Str::limit($job_title->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($job_title->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($job_title->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach






                    <h1 class="py-4">{{ trans('front_trans.job_email') }}</h1>
                        <div class="line line-4"></div>
                        @foreach ($job_emails as $job_email )
                            @if ($job_email->status =='0')
                                
                                <p>
                                    @if (App::getLocale() == 'en')
                                        @if ($job_email->title_en !='')
                                            <th>{{ \Str::limit($job_email->title_en,100)}}</th>
                                        @else
                                            <th>{{ \Str::limit($job_email->title_ar,100)}}</th>
                                        @endif
                                    @else
                                        <th>{{ \Str::limit($job_email->title_ar,100)}}</th>
                                    @endif
                                </p>
                            @endif
                        @endforeach

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1 class="make_right_ar">{{ trans('front_trans.join') }}</h1>
                    <div class="line line-4"></div>

                        {!! Form::open(['route' => 'jobs/send_cv', 'method' => 'post', 'files'=>true ]) !!}
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
                                {!! Form::text('job_title', old('job_title'), ['placeholder' => trans('contactus_trans.subject')]) !!}
                                @error('job_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="contact-form-text">
                                {!! Form::file('file',['placeholder' => trans('contactus_trans.message')]) !!}
                                @error('file')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            {{-- <div class="contact-form-text contact-form-text">
                                {!! Form::textarea('message', old('message'), ['placeholder' => trans('contactus_trans.message')]) !!}
                                @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                            </div> --}}
                            <div class="text-center">
                                {!! Form::button(trans('contactus_trans.send_message'), ['type' => 'submit']) !!}
                            </div>
                        {!! Form::close() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end jops section -->








    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
