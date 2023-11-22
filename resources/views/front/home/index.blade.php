@extends('layout.front.layout')

@section('content')
    <!----Carousel section-->
    <section id="homeSection" class="bg-primary-dark w-100 vh-100">
        <div class="carouselSlider swiper">
            <div class="homeSwiper swiper-wrapper">



                @foreach ($slider as $item)
                    <div class="swiper-slide">
                        <div class="swiper-item coverImg bg-primary-dark">
                            <div class="imageWrapper">
                                <img class="d-none d-lg-block" src="{{ asset($item->image) }}" alt="">
                                <img class="d-lg-none" src="{{ asset($item->mobil_image) }}" alt="">
                            </div>
                            <div class="desc px-xl-4 px-3">
                                <div class="col-xl-10 mx-auto px-lg-3 px-4 pt-5 pt-lg-0">
                                    <div class="slideCaption preLine">{{ $item->name }}</div>
                                    <span class="text">{{ $item->sub_title }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach





            </div>
            <div class="col-xl-10 col-12 px-lg-3 px-4 swiperPaginationWrapper position-absolute end-0 mx-auto start-0">
                <div class="swiper-pagination type2 p-xl-4 px-3"></div>
            </div>
        </div>
        <a href="javascript:;" id="buttonScroll" class="scroll_down">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </a>
    </section>
    <!----Carousel Section bitiş-->
    <section id="aboutSection" class="bg-white">
        <div class="contentContainer text-center px-xl-4 px-lg-3 px-3">
            <div class="col-xxl-10 col-12 mx-auto px-lg-3 px-4 d-flex justify-content-center flex-lg-row flex-column align-items-center">
                <div class="col-12 col-lg-6 imgContent">
                    <div class="imageWrapper ps-2">
                        <img src="{{ asset('assets/images/media/'.__('about.png')) }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 textContent">
                    <div class="caption">
                        <span>{{__('Yüksek Kalite, Kusursuz Hizmet')}}</span>
                    </div>
                    <div class="paragraph text-start pt-2 pe-2">
                        <p>{{__('1997’de kurulan Mavi Ofset, sektöründe ki yeniliklerin takipçisi olmayı ve kendisini sürekli geliştirmeyi ilke edinerek o tarihten bugüne ulaştı. Kağıdın işlenmesiyle ilgili her türlü baskı ve cilt tekniğini kendi bünyesinde bulunduran Mavi Ofset yaklaşık 2000 m² alan üzerinde 50 kişilik kadrosu ile müşterilerine yüksek kalite, hız ve esneklik ile hizmet vermektedir.')}}</p>
                        <p>{{__('Mavi Ofset kalitesinin altındaki güç; yenilikçi yaklaşım, empati ve müşteri odaklılıktır. Daima en iyisi olmayı hedefleyen matbaamız, ofset baskı teknikleri konusunda yatırımlarını sürdürmektedir.')}}
                            </p>
                    </div>
                    <div class="text-start">
                        <a href="/sayfa/kurumsal/hakkimizda" class="btn btn-primary-dark rounded-5 mt-5">{{__('Devamı')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="tanitimSection" class="bg-white">
        <div class="contentContainer text-center">
            <div class="col-12 col-xxl-10 mx-auto row justify-content-between px-lg-5 pt-4 flex-lg-row flex-column-reverse align-items-center">
                <div class="col-12 col-lg-5  d-flex flex-column align-items-start justify-content-evenly px-0 pe-lg-4 rightContent">
                    <div class="mx-auto paragraph type2 textContent text-start pt-lg-3">
                        <span class="bigTitle">{{trans('Tanıtım Filmi')}}</span>
                        <p>{{__('1997’de kurulan Mavi Ofset, sektöründe ki yeniliklerin takipçisi olmayı ve kendisini sürekli geliştirmeyi ilke edinerek o tarihten bugüne ulaştı.')}} </p>
                    </div>
                </div>
                <div class="col-12 col-lg-7 videoContent d-flex justify-content-center p-0 pt-3">
                    <div class="videoCover">
                        <div class="imageWrapper">
                            <img src="{{ asset('assets/images/media/man-working.jpg') }}" alt="">
                            <a href="javascript:;" class="playButton" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <img src="{{ asset('assets/images/static/icon/svg/play.svg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!---Hizmetler Section-->
    <section id="hizmetlerSection" class="bg-white px-xl-4 px-lg-3 pb-lg-5 pb-4">
        <div class="contentContainer h-100 col-xxl-10 col-12 mx-auto px-lg-3 px-0">
            <div class="sectionHead d-flex align-items-center pe-2 ps-4 ms-3 ps-lg-0 ms-lg-0">
                <div class="caption ms-n1">
                    <span class="bigTitle">{{trans('Hizmetler')}}</span>
                    <span class="title">{{trans('Hizmetler')}}</span>
                </div>
                <a href="{{ route('service.index') }}" class="btn btn-primary-dark rounded-5 ms-auto d-lg-block d-none">{{trans('Tümü')}}</a>
            </div>
            <div class="hizmetlerSlider">
                <div class="slider-for">

                    @foreach ($service as $item)
                        <div>
                            <h3>{{ $item->name }}</h3>
                        </div>
                    @endforeach
                </div>

                <div class="slider-nav">

                    @foreach ($service as $item)
                        <div>
                            <div class="imageWrapper">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                            <div class="desc">
                                <h3>
                                    {{ $item->name }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section id="maviBlogSection" class="bg-white d-flex flex-column justify-content-evenly">

        <div class="d-flex align-items-center col-12 col-xxl-10 px-5 mx-auto sectionHead">
            <div class="caption">
                <span class="bigTitle">{{trans('MaviBlog')}}</span>
                <span class="title">Mavi Blog</span>
            </div>
            <div class="d-flex ms-auto hstack">
                <div class="position-relative d-inline-flex slider-mobile-btn">
                    <div class="proje-button-prev sliderNavButton swiper-prev noHover rounded-circle btn btn-primary-dark">
                        <i class="icon-left-arrow customIcon"></i><i class="icon-left-arrow customIcon hoverArrow"></i>
                    </div>
                    <div class="proje-button-next sliderNavButton swiper-next noHover rounded-circle btn btn-primary-dark ms-lg-3 ms-2">
                        <i class="icon-right-arrow customIcon"></i><i class="icon-right-arrow customIcon hoverArrow"></i>
                    </div>
                </div>
                <a href="{{ route('blog.index') }}" class="btn btn-primary-dark d-none d-lg-flex rounded-5 btn-lg min-w-auto ms-3 mb-1 mb-lg-0">{{trans('Tümü')}}</a>
            </div>
        </div>
        <div class="maviBlogSlider swiper" data-aos="fade-left" data-aos-delay="700">
            <div class="cards noBorder swiper-wrapper type2 pb-5 pb-lg-0">


                @foreach ($blog as $item)
                    <div class="card swiper-slide">
                        <a href="{{ route('blog.detail', ['slug' => $item->slug]) }}">
                            <div class="card-image">
                                <div class="imageWrapper">
                                    <img src="{{ asset($item->image) }}" alt="">
                                </div>
                            </div>
                            <div class="card-img-overlay d-flex flex-column justify-content-end align-items-start">
                                <p class="card-text">
                                    {{ $item->name }}
                                </p>
                                <span>
                                    MATBAA
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach



            </div>
        </div>
        <a href="{{ route('blog.index') }}" class="btn btn-primary-dark d-flex d-lg-none rounded-5 btn-lg min-w-auto ms-lg-3 mx-auto mb-1 mb-lg-0">{{trans('Tümü')}}</a>
    </section>
    <section id="partnerlerSection" class="bg-white  d-flex flex-column justify-content-center pb-3">

        <div class="d-flex align-items-center col-12 col-xxl-10 px-5 mx-auto pb-3 sectionHead">
            <div class="caption col-sm-10">
                <span class="bigTitle">{{trans('Partnerler')}}</span>
                <span class="title">{{trans('Partnerler')}}</span>
            </div>
        </div>
        <div class="logos col-9 mx-auto pt-lg-5 pt-3">
            <div class="row justify-content-center py-lg-5 py-3">
                <!-- İlk satır logosu, mobilde 3, tablet ve yukarısı için 5 sütun -->
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <!-- Webde görünecek ek logo sütunları -->
                <div class="d-none d-md-block col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="d-none d-md-block col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center py-lg-5 py-3">
                <!-- İkinci satır logosu, aynı sınıflar tekrarlanır -->
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-4 col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <!-- Webde görünecek ek logo sütunları -->
                <div class="d-none d-md-block col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
                <div class="d-none d-md-block col-md-2 logo-item">
                    <div class="imageWrapper">
                        <img src="{{ asset('assets/images/static/logos/turkish-airlines.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
