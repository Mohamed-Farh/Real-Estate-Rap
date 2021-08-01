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
    <div class="title-nav py-4 text-right">
        <div class="container">
            <h2>{{ trans('main_trans.Main_title') }}</h2>
        </div>
    </div>
    <!--end title-->
    <!--start lines-->
    <div class="line">
        <div class="line2 line-2-about line-3-search line-4-images">
        </div>
    </div>
    <!--end lines-->




    <!--start image section-->
    <div class="image-latest-news py-4 text-center">
        <div class="container">
            @if($single_new->photo)
                <img src="{{url('image/news/'.$single_new->photo)}}" style="width: 100%;"  />
            @else
                <img src="{{url('image/news/default.jpg')}}" style="width: 100%;"  />
            @endif
        </div>
    </div>
    <!--end image section-->
    <!--start deatails section-->
    <div class="newslatest-3 py-3 text-center">
        <div class="container">
            <h1 data-aos="fade-down">{{ trans('front_trans.last_news') }}</h1>
            <div class="line-6 ">
            </div>
            <h5 data-aos="fade-down" style="margin-top: 20px;">
                @if (App::getLocale() == 'en')
                    @if ($single_new->head_en !='')
                        <th>{{ \Str::limit($single_new->head_en,100)}}</th>
                    @else
                        <th>{{ \Str::limit($single_new->head_ar,100)}}</th>
                    @endif
                @else
                    <th>{{ \Str::limit($single_new->head_ar,100)}}</th>
                @endif
            </h5>
            <p data-aos="fade-down" style="margin-top: 20px;">
                @if (App::getLocale() == 'en')
                    @if ($single_new->body_en !='')
                        <th>{{ \Str::limit($single_new->body_en,180)}}</th>
                    @else
                        <th>{{ \Str::limit($single_new->body_ar,180)}}</th>
                    @endif
                @else
                    <th>{{ \Str::limit($single_new->body_ar,180)}}</th>
                @endif
            </p>
        </div>
    </div>
    <!--end deatails section-->
    <!--start share links-->
    <div class="share-links text-center py-4">
        <div class="container">
            <h1 data-aos="fade-up">شارك رابط</h1>
            <div class="line-6">
            </div>
            <div class="row py-4 container-fluid">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 py-3">
                    <button><a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fparse.com" target="_blank">Facebook<i class="fab fa-facebook-f"></i></a></button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 py-3">
                    <button><a href="https://twitter.com/intent/tweet?url=URL_HERE&via=getboldify&text=yourtext" target="_blank">Twitter<i class="fab fa-twitter"></i></a></button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 py-3">
                    <button><a href="https://www.instagram.com/?url=https://www.drdrop.co/" target="_blank">Instagram<i class="fab fa-instagram"></i></a></button>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 py-3">
                    <button><a href="https://wa.me/?text=urlencodedtext" target="_blank"> Whatsapp<i class="fab fa-whatsapp"></i></a></button>
                </div>
            </div>
        </div>
    </div>
    <!--end share links-->








    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
