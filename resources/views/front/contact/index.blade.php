@extends('layout.front.layout')
@section('title')
   {{trans('İletişim')}}
@endsection
@section('breadcrumbs')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb pt-2">
        <li class="breadcrumb-item static-item px-1 px-lg-0">
            <a href="{{ route('/') }}">Mavi Ofset</a>
        </li>
        <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{trans('İletişim')}}</li>
    </ol>
</nav>
@endsection

@section('fluidContent')
    <div class="contentPages">
        <div class="col-xxl-10 px-lg-5 mx-auto  align-items-center text-center flex-column flex-lg-row row justify-content-between mt-lg-4 mt-0 contact-page">
            <div class="wave-bg-img d-none d-lg-block">
                <img src="{{ asset('assets/images/static/wave-bg.svg') }}" alt="">
            </div>
            <div class="col-lg-5 col-xl-4 col-xxl-4 col-11 px-4 contact-info d-flex flex-column text-start">
                <h3 class="pb-lg-4 text-nowrap text-center text-lg-start d-none d-lg-block">{{trans('İletişim Bilgilerimiz')}}</h3>
                <ul class="adressInfo p-0">
                    <li>
                        <h5 class="text-primary-dark address-name m-auto mb-lg-0 mb-2">Mavi Ofset Basım Yayın Tic. San. Ltd.
                            Şti.</h5>

                    </li>
                    <li>
                        <a href="javascript:;">
                            <img class="locationImg" src="{{ asset('assets/images/static/icon/svg/location.svg') }}"
                                alt="">
                            <span>{{$data['setting']['address']}}</span>
                        </a>
                        <a href="mailto:info@maviofset.com">
                            <img src="{{ asset('assets/images/static/icon/svg/mail.svg') }}" alt="">
                            <span>{{$data['setting']['e_mail']}}</span>
                        </a>
                        <a href="callto:{{$data['setting']['phone']}}">
                            <img src="{{ asset('assets/images/static/icon/svg/call.svg') }}" alt="">
                            <span>{{$data['setting']['phone']}}</span>
                        </a>
                        <a href="javascript:;">
                            <img src="{{ asset('assets/images/static/icon/svg/fax.svg') }}" alt="">
                            <span>{{$data['setting']['fax']}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 col-xxl-6 col-12 px-0 ps-lg-4 contact-form">
                <div class="w-100 waveReverse position-relative contact-iframe d-block d-lg-none">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3007.627760970773!2d29.018281512624107!3d41.07712867122145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cab66ae4ec8b23%3A0x258daa89336cce44!2zTMOWU0VWIC0gTMO2c2VtaWxpIMOHb2N1a2xhciBTYcSfbMSxayB2ZSBFxJ9pdGltIFZha2bEsQ!5e0!3m2!1str!2str!4v1698631904917!5m2!1str!2str"
                        width="100%" height="650px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <form class="col-12 mt-0 pt-4 pt-lg-0 needs-validation type2" novalidate>
                    <div class="row col-10 col-lg-12 px-4 px-lg-0 mx-auto g-3">
                        <div class="col-sm-6 col-12 position-relative">
                            <input class="form-control" type="text" id="namesurname" placeholder="{{__('Adınız Soyadınız')}}"
                                required>
                            <div class="invalid-tooltip">
                                {{trans('Lütfen Adınızı Soyadınızı Giriniz')}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 position-relative">
                            <input class="form-control" type="text" id="phone" placeholder="{{__('Telefon Numaranız')}}"
                                required>
                            <div class="invalid-tooltip">
                                {{trans('Lütfen Telefon Numarası Giriniz')}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 position-relative">
                            <input class="form-control" type="e-mail" id="e-mail" placeholder="{{__('E-Posta')}}" required>
                            <div class="invalid-tooltip">
                                {{trans('Lütfen E-Posta Giriniz')}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-12 position-relative">
                            <input class="form-control" type="text" id="message" placeholder="{{__('Mesajınızın Konusu')}}"
                                required>
                            <div class="invalid-tooltip">
                                {{trans('Lütfen Mesajınızın Konusu Giriniz')}}
                            </div>
                        </div>

                        <div class="col-12 position-relative textArea">
                            <textarea class="form-control pt-2" id="validationTextarea" placeholder="{{__('Mesajınız')}}" required rows="9"></textarea>
                            <div class="invalid-tooltip">
                                {{trans('Lütfen Mesajınızı Giriniz')}}
                            </div>
                        </div>
                        <div class="col-12 text-end pe-5">
                            <input type="hidden" class="reCaptchaAnswer" name="reCaptchaAnswer" id="reCaptchaAnswer">
                            <button type="submit" data-sitekey="{{$data['setting']['recaptcha_key']}}" data-callback='onSubmit'
                            data-action='submit' class="g-recaptcha btn btn-primary-dark rounded-5 btn-lg mt-1 min-w-auto d-lg-inline-flex me-4">{{__('Formu Gönder')}}</button>
                            </div>
                    </div>
                </form>
                <div class="wave-bg-img-2 d-none d-lg-block">
                    <img src="{{ asset('assets/images/static/white-wave.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="w-100  waveReverse position-relative contact-iframe d-none d-lg-block">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3007.875471349963!2d28.789632376560128!3d41.071714615515496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDHCsDA0JzE4LjIiTiAyOMKwNDcnMzIuMCJF!5e0!3m2!1str!2str!4v1699541077724!5m2!1str!2str"
            width="100%" height="650px" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


@endsection
@section('script')
    <script src="https://www.google.com/recaptcha/api.js?render={{$data['setting']['recaptcha_key']}}"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute("{{$data['setting']['recaptcha_key']}}", {
                action: 'submit'
            }).then(function(token) {
                let reCaptchaAnswer = document.getElementById('reCaptchaAnswer');
                reCaptchaAnswer.value = token;
            });
        });
    </script>

@endsection