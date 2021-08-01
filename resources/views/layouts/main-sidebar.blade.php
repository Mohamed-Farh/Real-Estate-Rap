<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ url('/dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Programname')}} </li>

                     <!-- Admins-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins-icon">
                            <div class="pull-left"><i class="fas fa-user"></i><span class="right-nav-text">{{trans('main_trans.Admin')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admins.index')}}">{{trans('admins_trans.List_user')}}</a></li>
                        </ul>
                    </li>

                     <!-- Users-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">{{trans('main_trans.Users')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('users.index')}}">{{trans('users_trans.List_user')}}</a></li>
                        </ul>
                    </li>

                    <!-- Grades-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{trans('main_trans.Grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Grades.index')}}">{{trans('main_trans.Grades_list')}}</a></li>

                        </ul>
                    </li> --}}
                    <!-- classes-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Classrooms.index')}}">{{trans('main_trans.List_classes')}}</a></li>
                        </ul>
                    </li> --}}


                    <!-- Property-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#property-menu">
                            <div class="pull-left"><i class="fas fa-building"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Property')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="property-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('properties.index')}}">{{trans('main_trans.property_list')}}</a></li>
                        </ul>
                    </li>


                    <!-- Category-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Category-menu">
                            <div class="pull-left"><i class="fad fa-hospitals"></i><span
                                    class="right-nav-text">{{trans('main_trans.category')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Category-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('categories.index')}}">{{trans('category_trans.List_category')}}</a></li>
                        </ul>
                    </li>


                    <!-- feature-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#feature-menu">
                            <div class="pull-left"><i class="fad fa-swimmer"></i><span
                                    class="right-nav-text">{{trans('main_trans.feature')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="feature-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('features.index')}}">{{trans('feature_trans.List_feature')}}</a></li>
                        </ul>
                    </li>

                    <!-- gallery-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#gallery-menu">
                            <div class="pull-left"><i class="fad fa-images"></i><span
                                    class="right-nav-text">{{trans('main_trans.gallery')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="gallery-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('galleries.index')}}">{{trans('gallery_trans.List_gallery')}}</a></li>
                            <li><a href="{{route('sliders.index')}}">{{trans('slider_trans.List_slider')}}</a></li>
                        </ul>
                    </li>

                     <!-- contact Us-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#contact-menu">
                            <div class="pull-left"><i class="fad fa-phone-volume"></i><span
                                    class="right-nav-text">{{trans('main_trans.contact')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="contact-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('socials.index')}}">{{trans('main_trans.social')}}</a></li>
                            <li><a href="{{route('contactus_index')}}">{{trans('main_trans.contactus')}}</a></li>
                        </ul>
                    </li>

                    <!-- About Us-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#aboutus-menu">
                            <div class="pull-left"><i class="fad fa-address-book"></i><span
                                    class="right-nav-text">{{trans('front_trans.aboutus')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="aboutus-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('aboutus.index')}}">{{trans('front_trans.aboutus')}}</a></li>
                        </ul>
                    </li>

                    <!-- News-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#news-menu">
                            <div class="pull-left"><i class="fad fa-newspaper"></i><span
                                    class="right-nav-text">{{trans('front_trans.news')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="news-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('news.index')}}">{{trans('front_trans.last_news')}}</a></li>
                        </ul>
                    </li>

                    <!-- Jobs-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Jobs-menu">
                            <div class="pull-left"><i class="fad fa-address-card"></i><span
                                    class="right-nav-text">{{trans('front_trans.jobs')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Jobs-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('company_jobs.index')}}">{{trans('front_trans.company_jobs')}}</a></li>
                            <li><a href="{{route('job_messages')}}">{{trans('front_trans.job_request_list')}}</a></li>
                        </ul>
                    </li>

                    <!-- Location-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#location-menu">
                            <div class="pull-left"><i class="fad fa-address-card"></i><span
                                    class="right-nav-text">{{trans('front_trans.company_location')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="location-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('company_location.index')}}">{{trans('front_trans.company_location')}}</a></li>                        </ul>
                    </li>

                    <!-- Location-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#time-menu">
                            <div class="pull-left"><i class="fad fa-address-card"></i><span
                                    class="right-nav-text">{{trans('front_trans.work_time')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="time-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('work_time.index')}}">{{trans('front_trans.work_time')}}</a></li>                        </ul>
                    </li>


               </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
