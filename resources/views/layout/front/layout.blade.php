<!DOCTYPE html>
<html lang="en">
<!----Head--->

@include('shared.front.head')
<!----Head Bitiş--->

<body class="{{request()->segment(1)=='ar'?'ar':''}}">

    @include('shared.front.include.preloader')

    <div class="{{ request()->segment(1) == '' ? 'mainBody' : 'subMainBody' }}">
        <!----Header--->
        @include('shared.front.header')
        <!----Header Bitiş--->
        @if (Route::currentRouteName() != '/')

            @include('shared.front.include.sub-banner')

            <div class="centerContent">

                @hasSection('fluidContent')
                    <div class="{{ request()->segment(1) != 'iletisim' ? 'contentPages col-xxl-12 mx-auto' : '' }}">
                        @yield('fluidContent')
                        
                    </div> 
                @else
                    <div class="contentPages col-xxl-10 mx-auto">
                        <div class="row mx-0 align-items-start">

                            @include('shared.front.include.left-menu')

                            @yield('content')

                        </div>
                    </div>
                @endif
            </div>
        @else
            @yield('content')
        @endif
        <!----Footer-->

        @include('shared.front.footer')

        <!---Footer Bitiş-->
    </div>
    @if ($data['setting']['whatsapp'])
        
  
    <a href="https://wa.me/{{ $data['setting']['facebook'] }}" id="whatsapLink" target="_blank"><img
            src="{{ asset('assets/images/static/logos/whatsapp-logo.svg') }}" alt=""></a>
  @endif
    @include('shared.front.include.modal')



    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    @vite(['resources/assets/front/js/app.js'])
@yield('script')
    @if (Route::currentRouteName() == '/')
        <script type="text/javascript">
            document.querySelector('.scroll_down').addEventListener('click', function() {
                window.scroll({
                    top: window.innerHeight - 140,
                    left: 0,
                    behavior: 'smooth' // Bu, kaydırma işlemini yumuşak bir şekilde yapar.
                });
            });
            $('.slider-nav').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                asNavFor: '.slider-for',
                vertical: true,
                dots: false,
            });
            $('.slider-for').slick({
                dots: false,
                infinite: true,
                asNavFor: '.slider-nav',
                speed: 300,
                slidesToShow: 3,
                centerMode: true,
                arrows: false,
                vertical: true,
                verticalSwiping: true,
                focusOnSelect: true,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            vertical: false,
                            slidesToShow: 5,
                            centerMode: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            vertical: false,
                            slidesToShow: 3,
                            centerMode: true,
                        }
                    }
                ]
            });
        </script>
    @endif
    <script type="text/javascript">
        AOS.init();
    </script>
</body>

</html>
