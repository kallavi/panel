@extends('layout.front.layout')
@section('title')
    {{__("Kurumsal")}}
@endsection
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-2">
            <li class="breadcrumb-item static-item px-1 px-lg-0">
                <a href="{{ route('/') }}">Mavi Ofset</a>
            </li>
            <li class="breadcrumb-item static-item px-1 px-lg-0">
                <a href="{{ route('kurumsal/tanitim-filmi') }}">{{__("Kurumsal")}}</a>
            </li>

            <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{__("Tanıtım Filmi")}}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <div class="px-0 pt-lg-5 mt-lg-4 d-block d-lg-none">
        <h3 class="py-4 text-center text-lg-start d-block d-lg-none">{{__("Tanıtım Filmi")}}</h3>
        <div class="videoCover">
            <div class="imageWrapper rounded-0">
                <img src="{{ asset('assets/images/media/man-working.jpg') }}" alt="">
                <a href="javascript:;" class="playButton" data-bs-toggle="modal" data-bs-target="#videoModal">
                    <img src="{{ asset('assets/images/static/icon/svg/play.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="rightContent ps-lg-5 pt-lg-5 pt-2 mt-lg-3 px-lg-0">
        <div class="mx-0 align-items-start px-xl-5 px-lg-4 px-4">
            <div class="ps-lg-3">
                <h3 class="text-center text-lg-start d-none d-lg-block">{{__("Tanıtım Filmi")}}</h3>
                <div class="row">
                    <div class="col d-flex flex-column-reverse d-lg-block">
                        <div class="paragraph">
                            <p>{{__("1997 yılında kurulan Mavi Ofset, matbaa sektöründe öncü bir firma olarak yoluna devam ediyor. Sektöründeki son yenilikleri yakından takip etme ve sürekli olarak kendini geliştirme ilkesini benimseyen Mavi Ofset, 1997'den bu yana müşterilerine yüksek kaliteli, hızlı ve esnek hizmet sunmanın gururunu yaşamaktadır.")}}</p>
                            <p>

                                {{__("2000 metrekarelik geniş bir alanda faaliyet gösteren Mavi Ofset, 50 kişilik deneyimli kadrosu ile kağıdın işlenmesi, baskı ve ciltleme gibi her türlü teknik konuda uzmanlaşmıştır. Bu sayede müşterilerine geniş bir yelpazede hizmet sunma yeteneğine sahip olmuştur.")}}
                            </p>
                        </div>
                        <div class="col pt-lg-5 mt-lg-4 d-none d-lg-block">
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
            </div>
        </div>
    </div>
@endsection
