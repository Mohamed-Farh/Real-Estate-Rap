        <!--start firstbar-->
        <div class="firstbar  text-center ">
            <div class="container">
                <div class="row py-2">
                    <!--<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 fbar">-->
                    <!--    <p><i class="fas fa-map-marker-alt"></i>{{ trans('front_trans.raptors_location') }}</p>-->
                    <!--</div>-->
                    
                     <?php   $locations   = \App\Models\Company_Location::all();   ?>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 fbar">
                        @if (App::getLocale() == 'en')
                            @foreach ($locations as $location )
                                <p><i class="fas fa-map-marker-alt"></i>{{ $location->country_en }}-{{ $location->city_en }}-{{ $location->address_en }}</p>
                            @endforeach
                        @else
                            @foreach ($locations as $location )
                                <p><i class="fas fa-map-marker-alt"></i>{{ $location->country_ar }}-{{ $location->city_ar }}-{{ $location->address_ar }}</p>
                            @endforeach
                        @endif

                    </div>



                    <?php $whatsapps = \App\Models\Social::where('type', 'What\'s App')->get(); ?>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 fbar">
                        <div class="row my-2 my-md-0">
                            @foreach ($whatsapps as $whatsapp)
                            @if ($whatsapp->status == '1')
                                <div class="col-6 col-md-12">
                                    <a href="https://api.whatsapp.com/send?phone={{ $whatsapp->name }}"
                                    class="btn-floating btn-large fixed_mainbut"><i class="fab fa-whatsapp"></i>
                                    {{ $whatsapp->name }}</a> <br>
                                </div>
                            @endif
                        @endforeach
                        <div class="col-6 col-md-12">
                                <?php $customers = \App\Models\Social::where('type', 'Customers Service')->get();
                                ?>
                                @foreach ($customers as $customer)
                                    @if ($customer->status == '1')
                                        <p><i class="fas fa-phone"></i>{{ $customer->name }}</p>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-2 py-4 fbar">
                                    <p><i class="fab fa-whatsapp"></i>0122589554</p>
                                </div> --}}

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 fbar" style="display: grid; align-items: center">
                        <div class="row">
                            <div class="col">
                                <a href="/job_seeker">{{ trans('front_trans.jobs') }}</a>
                            </div>
                            <div class="col-6">
                                <a href='#' data-toggle="modal" data-target="#sign_in" style="color: #FFD700">
                                <p>{{ trans('front_trans.Sign In') }}</p>
                            </a>
                            </div>
                        </div>
                    </div>

                    @guest
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 fbar" style="display: grid; align-items: center">
                            <div class="col">
                                <a class="nav-link link-pages dropdown-toggle link-page" href="#" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="padding-top: 0px;">
                                    @if (App::getLocale() == 'ar')
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                                    @else
                                        {{ LaravelLocalization::getCurrentLocaleName() }}
                                        <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                                    @endif
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            style="color:black !important; ">
                                            {{ $properties['native'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endguest
                    @auth
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a href='#'>
                                            <p>{{ trans('front_trans.logout') }}</p>
                                        </a>
                                    </form> --}}
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="text-danger ti-unlock"></i>{{ trans('front_trans.logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!--end firstbar-->



        <!--start navbar-->
        <div class="header">

            <div class="header-bar">
                <nav class="navbar navbar-expand-lg navbar-light bg-light make_right_ar">
                    <a class="navbar-brand" href="/home"><img src="{{ asset('app-assets/images/logo.png') }}" style="height: 50px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse headernav" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link link-pages  current-page-active link-page"
                                    href="/home">{{ trans('front_trans.home') }}
                                    <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('front/aboutus') }}">{{ trans('front_trans.aboutus') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('all_properties') }}">{{ trans('front_trans.all_properties') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('available_projects') }}">{{ trans('front_trans.Available projects') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('news') }}">{{ trans('front_trans.last_news') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="/home/gallery">{{ trans('front_trans.media') }}</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('previous_projects') }}">{{ trans('front_trans.previous_projects') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-pages link-page"
                                    href="{{ route('front/contactus') }}">{{ trans('front_trans.contactus') }}</a>
                            </li>
                            <li class="nav-item searchicon">
                                <a class="nav-link link-pages iconsearch "
                                    href="/search_page">{{ trans('front_trans.property_search') }}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        @guest
            <a href="#" class="portf-btn fixed_action_btn_3" data-toggle="modal" data-target="#exampleModal">
                <p>{{ trans('front_trans.Register Now') }}</p>
            </a>
        @endguest



        <?php   $whatsapps   = \App\Models\Social::where('type', 'What\'s App')->get();   ?>
        @foreach ($whatsapps as $whatsapp )
            <a href="https://api.whatsapp.com/send?phone={{ $whatsapp->name }}" class="btn-floating btn-large fixed_mainbut"><i class="fab fa-whatsapp whats "></i></a>
        @endforeach
        <!--end navbar-->



        <!-- User Registeration -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('sign_in') }}" method="POST">
                            @csrf
                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title  make_right_ar" id="exampleModalLabel" >
                                {{trans('front_trans.Register Now')}}
                            </h5>
                            <div class="row">
                                <div class="col-md-12 make-space">
                                    <input id="name" type="text" name="name" class="form-control" style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ trans('admins_trans.name') }}">
                                </div>

                                <div class="col-md-12 make-space">
                                    <input id="name_ar" type="text" name="name_ar" class="form-control" style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;"
                                        value="{{ old('name') }}" autocomplete="name" autofocus placeholder="{{ trans('admins_trans.name_ar') }}">
                                </div>

                                <div class="col-md-12 make-space">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"  style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;"
                                        required autocomplete="email"  placeholder="{{ trans('admins_trans.email') }}">
                                </div>

                                <div class="col-md-12 make-space">
                                    <input type="password" class="form-control" name="password" required style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;"
                                        autocomplete="new-password"  placeholder="{{ trans('admins_trans.password') }}">
                                </div>

                                <div class="col-md-12 make-space">
                                    <input type="password" name="password_confirmation" id="input-password-confirmation"  style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;"
                                        class="form-control" required  placeholder="{{ trans('admins_trans.confirm_password') }}">
                                </div>
                                <br><br>
                            </div>
                                <button type="submit" class="text-center" style="margin-left: 170px;padding: 10px 40px;margin-top: 33px;color: white;background-color: orange;border-style: none;">
                                    {{ trans('front_trans.Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- User Sign In -->
        <div class="modal fade" id="sign_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h5 style="font-family: 'Cairo', sans-serif; margin-top=50px" class="modal-title make_right_ar" id="exampleModalLabel" >
                                {{trans('front_trans.Sign In')}}
                            </h5>
                            <div class="col-md-12 make-space">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ trans('contactus_trans.email') }}"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12 make-space">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('contactus_trans.password') }}"
                                    required autocomplete="current-password" style=" height: calc(1.5em + 1.75rem + 2px); margin-top: 25px;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="text-center" style="margin-left: 170px;padding: 10px 40px;margin-top: 33px;color: white;background-color: orange;border-style: none;">
                                {{ trans('front_trans.Sign In') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

