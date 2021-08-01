<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    @include('layouts.partials.head')
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet"href='{{ asset('app-assets/fontawesome/css/all.min.css')}}'>
        {{-- <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.css')}}"> --}}
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
        <link rel="stylesheet" href="{{ asset('app-assets/css/swiper-bundle.min.css')}}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
</head>
        <style type="text/css">
            .item{
                transition: .5s ease-in-out;
            }
            .item:hover{
                filter: brightness(60%);
            }

            </style>

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

<?php
    $galleries = \App\Models\Gallery::where('type', 0)->paginate(12);
?>
    <!--start image gallery-->
    <div class="container-fluid">
        <div class="row mt-4">

            @foreach($galleries as $gallery)
                @if ($gallery->type == '0' && $gallery->status == '0')
                    <div class="item col-sm-6 col-md-4 mb-3">
                        <a href="{{ Url($gallery->path) }}" class="fancybox" data-fancybox="gallery1">
                            <img src="{{ Url($gallery->path) }}" width="100%" height="100%"/>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="m-t-30 m-b-60 center" style="margin-right: 50%;">
            {{ $galleries->links() }}
        </div>
    </div>
    <!--end image gallery-->















    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

    <script src="{{ asset('app-assets/js/popper.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/bootstrap.js')}}"></script>
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="{{ asset('app-assets/js/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/cycle.min.js')}}"></script>
    <script>
        var swiper = new Swiper(".choose-swiper", {
            // pagination: {
            //     el: ".swiper-pagination",
            //   dynamicBullets: true,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            // autoplay: {
            //     delay: 5000,
            // },
        });
    </script>
    <script>
        AOS.init({
      easing: 'ease-in-quad',
    });
    </script>

</body>

</html>
