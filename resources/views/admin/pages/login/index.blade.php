@extends('layout.admin.single-layout')

@section('app')
    <style>
        body {
            background-image: url('assets/images/bg.png');
        }

        [data-bs-theme="dark"] body {
            background-image: url('assets/images/bg-dark.png');
        }
    </style>
    <div class="d-flex flex-column flex-column-fluid flex-lg-row align-items-center">
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <div class="d-flex flex-center flex-lg-start flex-column">
                <a href="{{ route('backoffice.index') }}" class="mb-7">
                    {{-- @php
                    dd($data['setting']['dark_logo']);
                @endphp --}}
                    <img alt="Logo" src="{{ asset($data['setting']['dark_logo']) }}" />
                </a>
            </div>
        </div>
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
            <!--begin::Card-->
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-475px p-20">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 py-15 py-lg-20">
                    <!--begin::Form-->
                    {{-- <div class="d-flex flex-center flex-lg-start flex-column mb-11">
                    <img alt="Logo" src="{{asset('front/assets/images/static/logos/logo.svg')}}" />
                </div> --}}

                    <x-admin.form :class="'form w-100'" :novalidate="'novalidate'" :id="'kt_sign_in_form'" :action="'/authAdmin'" :method="'POST'">

                        {{-- <x-slot:dataKtUrl>
                        {{route('home')}}
                    </x-slot:dataKtUrl> --}}
                        <x-slot:form>
                            <x-admin.tags-wrapper :class="'text-center mb-11'">
                                <x-slot:tagsWrapper>
                                    <x-admin.form-label :title="'Giriş Yap'" :titleTag="'h1'" :class="'text-dark fw-bolder mb-3'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                            <x-admin.form-input :inputParentClass="'fv-row mb-6'" :placeholder="'Email'" :name="'email'" :class="'form-control bg-transparent'" :autocomplete="'off'" :required="''" />
                            <x-admin.form-input :inputParentClass="'fv-row mb-6'" :type="'password'" :placeholder="'Password'" :name="'password'" :class="'form-control bg-transparent'" :autocomplete="'off'"
                                :required="''" />

                            <button class="btn text-white btn-danger w-100">Giriş Yap</button>

                            {{-- <x-admin.button
                            :buttonParentClass="'d-grid'"
                            :class="'btn text-white btn-active-danger'"
                            :id="'kt_sign_in_submit'"
                            :color="'indigo'"
                            :type="'submit'"
                        >
                            <x-slot:title>
                                <x-admin.form-label
                                    :title="'Giriş Yap'"
                                    :titleTag="'span'"
                                    :class="'indicator-label'"
                                />
                            </x-slot:title>
                            <x-slot:buttonContain>
                                <x-admin.tags-wrapper :tags="'span'" :class="'indicator-progress'" :title="'Lütfen bekleyiniz...'">
                                    <x-slot:tagsWrapper>
                                        <x-admin.form-label
                                        :title="''"
                                        :titleTag="'span'"
                                        :class="'spinner-border spinner-border-sm align-middle ms-2'" />
                                    </x-slot:tagsWrapper>
                                </x-admin.tags-wrapper>
                            </x-slot:buttonContain>
                        </x-admin.button> --}}
                        </x-slot:form>

                        @csrf
                    </x-admin.form>

                    <!--end::Form-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
@endsection


@section('script')
    @if ($errors->all() != null)
        <script>
             
            Swal.fire({
                title: "Hatalı Giriş!",
                text: "Girilen e-mail veya şifre hatalıdır. Lütfen tekrar deneyiniz.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Kapat",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });

          
        </script>
    @endif
@endsection
