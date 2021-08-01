<script src="{{asset('app-assets/js/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap.js')}}"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<script src="{{asset('app-assets/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('app-assets/js/cycle.min.js')}}"></script>
<script>
    var chooseimg1 = new Cycle('.chooseimg1');
    var chooseimg2 = new Cycle('.chooseimg2');
    var chooseimg3 = new Cycle('.chooseimg3');
    var chooseimg4 = new Cycle('.chooseimg4');
</script>
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
