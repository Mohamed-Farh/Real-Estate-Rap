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













    @include('layouts.partials.footer')
    @include('layouts.partials.footer-scripts')

</body>

</html>
