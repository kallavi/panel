@extends('layout.front.layout')
@section('title')
MaviBlog
@endsection
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item static-item px-1 px-lg-0">
            <a href="{{ route('/') }}">Mavi Ofset</a>
        </li>
        <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">MaviBlog</li>
    </ol>
</nav>
@endsection
@section('fluidContent')
    <div class="detailsContentWrapper minusTop">
       
        <div class="px-xl-5 px-lg-4">
            <div class="detailsImage position-relative">
                <div class="imageWrapper h-100">
                    <img src="{{ asset($blog->image) }}" alt="">
                </div>
            </div>
        </div>
        <div class="px-xl-5 px-lg-4 px-4">
            <div class="detailsContent col-lg-10 col-12 mx-auto px-0 mt-5">
                <div class="mb-0 mb-lg-4 pb-2 pb-lg-3 px-xxl-3">
                    <h3 class="text-gray-800 fw-bold text-center">{{$blog->name}}</h3>
                    <div class="row pt-4 justify-content-lg-normal justify-content-center">
                        <div class="paragraph">
                             {!! $blog->description !!}
                        </div>

                        {{-- <h6 class="pt-4 mb-0"> 1. Taş Baskı ve Ahşap Baskı (M.Ö. 200'ler) </h6>
                        <div class="paragraph">
                            <p>Matbaacılığın kökenleri taş baskı ve ahşap baskıyla başlar. M.Ö. 200'lerde, Çin'de
                                ahşap kalıpların kullanıldığı ilk baskı teknikleri geliştirildi. Ardından, taş baskı
                                yöntemiyle metinler taş üzerine oyularak üretildi. Bu yöntemler manuel işçilik
                                gerektiriyordu ve yavaş bir üretim sürecini ifade ediyordu.
                            </p>
                        </div>

                        <h6 class="pt-4 mb-0">2. Gutenberg ve Hareketli Metal Harf Baskısı (15. Yüzyıl)</h6>
                        <div class="paragraph">
                            <p>Matbaacılığın devrimi, Johannes Gutenberg'in 15. yüzyılda hareketli metal harf
                                baskısı geliştirmesiyle başladı. Gutenberg, metinleri kurşun harflerle basarak hızlı
                                ve maliyet etkili bir üretim süreci yarattı. Bu, kitapların daha hızlı ve
                                erişilebilir hale gelmesini sağladı ve Rönesans döneminde bilginin yayılmasına büyük
                                katkı sağladı.
                            </p>
                        </div>

                        <h6 class="pt-4 mb-0">3. Matbaa Makineleri ve Sanayi Devrimi (18. Yüzyıl)</h6>
                        <div class="paragraph">
                            <p>1. yüzyılda, matbaa teknolojisi hızla gelişmeye devam etti. Matbaa makineleri,
                                üretkenliği artırdı ve daha büyük tirajlar üretmeyi mümkün kıldı. Sanayi Devrimi
                                sırasında, buharlı matbaa makineleri kullanılmaya başlandı ve matbaacılık
                                endüstrisinin büyümesine katkıda bulundu.
                            </p>
                        </div>

                        <h6 class="pt-4 mb-0">4. Dijital Matbaacılığın Yükselişi (20. Yüzyıl)</h6>
                        <div class="paragraph">
                            <p>1. yüzyılın sonlarına doğru, dijital teknolojilerin gelişmesiyle birlikte matbaacılık
                                bir kez daha dönüştü. Bilgisayarlar ve dijital baskı makineleri sayesinde, baskı
                                işleri daha hızlı ve daha özelleştirilebilir hale geldi. Renk doğruluğu ve baskı
                                kalitesi büyük ölçüde arttı.
                            </p>
                        </div>

                        <h6 class="pt-4 mb-0">5. Online ve Çevrimiçi Matbaacılık (21. Yüzyıl)</h6>
                        <div class="paragraph">
                            <p>Bugün, internetin yaygın kullanımıyla birlikte online matbaacılık hızla popülerlik
                                kazandı. Müşteriler, çevrimiçi platformlar aracılığıyla özelleştirilmiş baskı işleri
                                sipariş edebilirler. Bu, baskı hizmetlerinin daha erişilebilir ve müşteri odaklı
                                hale gelmesine katkı sağladı.
                            </p>
                            <p>Matbaacılığın tarihçesi, insanların bilgiyi paylaşma ve iletişim kurma şeklini kökten
                                değiştiren önemli bir evrimi yansıtmaktadır. Teknolojinin ilerlemesiyle birlikte,
                                matbaacılık sürekli olarak gelişmeye devam etmektedir ve bu, bilginin daha geniş
                                kitlelere daha hızlı bir şekilde ulaşmasını sağlamaktadır.</p>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-10 col-12 mx-auto px-xxl-3">
                <div class="slider-page-buttons d-flex align-items-center justify-content-center positon-relative px-xxl-3">

@if ($prev)
    

                    <a class="me-auto w-50" href="{{ route('blog.detail', ['slug'=>$prev->slug]) }}">
                        <div class="button-news prev-news d-flex d-flex align-items-center">
                            <div class="arrow-button">
                                <img src="{{ asset('assets/images/static/icon/svg/big-left-arrow.svg') }}" alt="">
                            </div>
                            <div class="news-name text-start d-none d-lg-block ps-3">
                                <span>{{$prev->name}}</span>
                            </div>
                        </div>
                    </a>
@endif

    

                    <div class="home-button position-absolute start-0 end-0 mx-auto" style="width:32px">
                        <a href="{{ route('/') }}">
                            <img src="{{ asset('assets/images/static/icon/svg/apps.svg') }}" alt=""></a>
                    </div>
                    @if ($next)
                    <a class="ms-auto w-50" href="{{ route('blog.detail', ['slug'=>$next->slug]) }}">
                        <div class="button-news next-news d-flex align-items-center justify-content-end">
                            <div class="news-name text-end d-none d-lg-block pe-3">
                                <span>{{$next->name}}</span>
                            </div>
                            <div class="arrow-button">
                                <img src="{{ asset('assets/images/static/icon/svg/big-right-arrow.svg') }}" alt="">
                            </div>
                        </div>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
