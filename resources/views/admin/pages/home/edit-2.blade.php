@extends('layout.admin.layout')
@section('pageTitle')
    Anasayfa Düzenle
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Yeni Widget Ekle'" :class="'d-flex flex-center h-35px h-lg-40px'" :color="'warning'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Önizle'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :color="'success'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Kaydet'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :color="'primary'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
<x-admin.wrapper-container>
    <x-slot:content>
    <x-admin.form id="'kt_ecommerce_add_product_form'" :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework'" :dataKt="[
        'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
    ]">
        <x-slot:form>

            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <x-admin.card :class="'border-0 bg-gray-300 bg-opacity-20 px-8'" :borderDashed="''" :cardHeaderClass="'px-0 cursor-pointer'" :accordion="''" :bodyId="'cardAcc1'" :data="['bs-target' => '#cardAcc1']">
                    <x-slot:cardHeader>
                        <div class="card-title m-0">
                            <h2>Genel</h2>
                        </div>
                        <div class="card-toolbar rotate-180">
                            <i class="ki-duotone ki-down fs-1"></i>
                        </div>
                    </x-slot:cardHeader>
                    <x-slot:cardBody>
                        <x-admin.custom-grid>
                            <x-slot:gridRow>
                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                    :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'Hakkımızda'"
                                    :class="'form-control'" />
                           
                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                    :labelText="'Başlangıç Tarihi'" :labelClass="'form-label required'" :placeholder="'05/04/2023'"
                                    :class="'form-control'" />
                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                    :labelText="'Bitiş Tarihi'" :labelClass="'form-label required'" :placeholder="'05/04/2023'"
                                    :class="'form-control'" />

                                 <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'" :labelTag="'label'" :labelText="'Açıklama'"
                                 :labelClass="'form-label'" :rows="'9'"
                                 :resizeNone="''" />

                                 <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                 :labelText="'Bağlantı Linki'" :labelClass="'form-label required'" :placeholder="'https://'"
                                 :class="'form-control'" />
                               
                            </x-slot:gridRow>
                        </x-admin.custom-grid>
                    </x-slot:cardBody>
                </x-admin.card>
                <x-admin.card :class="'border-0 bg-gray-300 bg-opacity-20 px-8'" :borderDashed="''" :cardHeaderClass="'px-0 cursor-pointer'" :accordion="''" :bodyId="'cardAcc2'" :data="['bs-target' => '#cardAcc2']">
                    <x-slot:cardHeader>
                        <div class="card-title m-0">
                            <h2>Slider</h2>
                        </div>
                        <div class="card-toolbar rotate-180">
                            <i class="ki-duotone ki-down fs-1"></i>
                        </div>
                    </x-slot:cardHeader>
                    <x-slot:cardBody>
                       Slider içerik
                    </x-slot:cardBody>
                </x-admin.card>
            </div>
            <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                    <x-slot:cardHeader>
                        <div class="card-title">
                            <h2>SEO</h2>
                        </div>
                    </x-slot:cardHeader>
                    <x-slot:cardBody>
                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'" :labelText="'Etiketler'" :labelClass="'form-label'"
                            :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                        <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :labelText="'Sayfa Açıklaması'"
                            :labelClass="'form-label'" :placeholder="'Açıklama Girin'" :rows="'4'" />
                    </x-slot:cardBody>
                </x-admin.card>

                <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                    <x-slot:cardHeader>
                        <div class="card-title">
                            <h2>Yeni Widget Ekle</h2>
                        </div>
                    </x-slot:cardHeader>
                    <x-slot:cardBody>
                        <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Portfolyo'" :iconTag="'i'"
                        :iconClass="'fs-2 fw-bolder text-black'" :iconName="'plus'" :rightIcon="''" :CssColor="'#5E6278'" />

                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Görsel Alanı'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Video Alanı'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Fotoğraf Galeri'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Video Galeri'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Haber'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Referans'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Metin Alanı'" :CssColor="'#5E6278'" />
                    <x-admin.button :link="'#'" :class="'fs-3 fw-semibold ps-0 w-100 d-flex flex-stack'" :title="'Footer'" :CssColor="'#5E6278'" />
                    </x-slot:cardBody>
                </x-admin.card>
            </div>
        </x-slot:form>
    </x-admin.form>
    </x-slot:content>
</x-admin.wrapper-container>
@endsection
