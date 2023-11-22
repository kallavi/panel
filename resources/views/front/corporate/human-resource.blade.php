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
        <li class="breadcrumb-item static-item px-1 px-lg-0" >
            <a href="{{ route('kurumsal/insan-kaynaklari') }}">{{__("Kurumsal")}}</a>
        </li>
        <li class="breadcrumb-item active px-1 px-lg-0" aria-current="page">{{__("İnsan Kaynakları")}}</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="rightContent ps-lg-5 pt-lg-5 pt-4 mt-lg-3 px-lg-0">
    <div class="mx-0 align-items-start px-xl-5 px-lg-4 px-4">
    <div class="ps-lg-3">
        <h3 class="text-center text-lg-start">{{__("İnsan Kaynakları")}}</h3>
        <div class="row">
            <div class="col">
                <div class="paragraph">
                    <p>{{("Firmamızın insan kaynakları süreçlerini daha etkin bir şekilde yönetmek ve adaylarımızı daha iyi tanımak amacıyla oluşturduğumuz bu İnsan Kaynakları Formu'nu doldurmanızı rica ediyoruz. Bu form, firmamıza başvurunuzun ilk adımıdır ve bize sizin hakkınızda daha fazla bilgi edinme fırsatı sunar.")}}</p>
                </div>
                <div class="formContent blueForm col d-flex flex-column flex-lg-row justify-content-center align-items-center align-items-lg-start mt-lg-5 position-relative overflow-hidden">
                    <div class="form-caption col-lg-5 col-12">
                        <h3 class="text-white">{{__("İnsan Kaynakları Formu")}}</h3>
                    </div>
                    <div class="form-bg-img">
                        <img src="../assets/images/blue-circle.svg" alt="" class="d-block d-lg-none">
                        <img src="../assets/images/blue-crcle-1.svg" alt="" class="d-none d-lg-block">
                    </div>
                    <form class="needs-validation col d-flex flex-column align-items-lg-start align-items-center px-lg-0 ps-lg-5 ms-0 ms-lg-2 justify-content-start justify-content-lg-center"
                        novalidate>
                        <div class="row mb-3 mb-lg-2 d-flex justify-content-start">
                            <div class="col-sm-12">
                                <input type="text" class="form-control"
                                    placeholder="Adınız Soyadınız" aria-label="First name" required>
                                <div class="invalid-tooltip">
                                    {{__("Lütfen Adınızı Soyadınızı Giriniz")}}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mb-lg-2 d-flex justify-content-start">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Telefon" required
                                    aria-label="First name">
                                    <div class="invalid-tooltip">
                                        {{__("Lütfen Telefon Numarası Giriniz")}}
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-3 mb-lg-2 d-flex justify-content-start">
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="inputEmail3" required
                                    placeholder="E-Posta">
                                    <div class="invalid-tooltip">
                                        {{__("Lütfen E-Posta Giriniz")}}
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-3 mb-lg-2 d-flex justify-content-start">
                            <div class="col-sm-12 position-relative">
                                <i class="icon-chevron-left customIcon"></i>

                                <select class="form-select" id="autoSizingSelect" required>
                                    <option selected>Pozisyon Seçiniz</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="invalid-tooltip">
                                    {{__("Lütfen Seçim Yapınız")}}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 mb-lg-2d-flex justify-content-start">
                            <div class="col-sm-12 position-relative fileInputWrapper">
                                <i class="icon-upload customIcon"></i>
                                <label for="review-image" class="form-control"
                                    id="review-image-label" role="button">{{__("Dosya Seç")}}</label>
                                <span>{{__("YÜKLENEBİLİR FORMATLAR")}} (PDF, DOCX)</span>
                                <input class="form-control d-none" type="file" id="review-image" required
                                    placeholder="Dosya Dükleyiniz" accept=".pdf, .docx" onchange="validateFile()">
                                    <div class="invalid-tooltip">
                                        {{__("Lütfen Dosya Yükleyiniz")}}
                                    </div>
                                    <div class="invalid-tooltip error2">
                                        {{__("Lütfen 10 MB'den Küçük Dosya Yükleyiniz")}}
                                    </div>
                            </div>
                        </div>
                        <input type="hidden" class="reCaptchaAnswer" name="reCaptchaAnswer" id="reCaptchaAnswer">
                        <button type="submit" data-sitekey="{{$data['setting']['recaptcha_key']}}" data-callback='onSubmit'
                        data-action='submit' class="g-recaptcha btn btn-primary-dark rounded-5 mt-lg-2 mt-1">{{__("Formu Gönder")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection


@section('script')
<script>
    function validateFile() {
        var fileInput = document.getElementById('review-image');
        var allowedExtensions = /(\.pdf|\.docx)$/i;
        var maxFileSizeInBytes = 10485760; // 10 MB
        // var maxFileSizeInBytes = 50; // 10 MB

        if (!allowedExtensions.exec(fileInput.value)) {
            alert('Lütfen sadece PDF ve DOCX formatlarını yükleyin.');
            fileInput.value = '';
            return false;
        }

        if (fileInput.files[0].size > maxFileSizeInBytes) {
            alert('Dosya boyutu 10 MB\'dan büyük olamaz.');
            fileInput.value = '';
            return false;
        }

        return true;
    }
</script>

<script src="https://www.google.com/recaptcha/api.js?render={{$data['setting']['recaptcha_key']}}"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{$data['setting']['recaptcha_key']}}', {
            action: 'submit'
        }).then(function(token) {
            let reCaptchaAnswer = document.getElementById('reCaptchaAnswer');
            reCaptchaAnswer.value = token;
        });
    });
</script>
@endsection
