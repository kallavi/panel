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
                <!--begin::Accordion-->
                <x-admin.accordion :id="'homeEdit'">
                    <x-slot:accContent>
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-1'" :accTitle="'Slider'" :idBody="'body-1'"
                            :data="[
                                'bs-target' => '#body-1',
                            ]" :aria="[
                                'controls' => 'body-1',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-1',
                            ]"
                            :accContent="'accordion Item #1Accordion Item #1Accordion Item #1Accordion Item #1Accordion Item #1Accordion Item #1'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-2'" :accTitle="'Fotoğraf + Text Blok'" :idBody="'body-2'"
                            :bodyClass="'show'" :data="[
                                'bs-target' => '#body-2',
                            ]" :aria="[
                                'controls' => 'body-2',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-2',
                            ]">
                            <x-slot:accContent>
                                <x-admin.tags-wrapper :class="'d-flex align-items-center'">
                                    <x-slot:tagsWrapper>
                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'pe-14'" />
                                        <x-admin.tags-wrapper :class="'col'">
                                            <x-slot:tagsWrapper>
                                                <x-admin.form-input :inputParentClass="'mb-6 input-group-lg'" :placeholder="'Başlık Giriniz'"
                                                    :class="'form-control'" />
                                                <x-admin.form-textarea :inputParentClass="''" :placeholder="'Açıklama Giriniz'"
                                                    :rows="'6'" />
                                            </x-slot:tagsWrapper>
                                        </x-admin.tags-wrapper>

                                    </x-slot:tagsWrapper>
                                </x-admin.tags-wrapper>
                                <x-admin.button :buttonParentClass="'d-flex'" :class="'ms-auto mt-7'" :title="'Kaydet'"
                                    :color="'primary'" />
                            </x-slot:accContent>
                        </x-admin.accordion-item>
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-3'" :accTitle="'Portfolyo'" :idBody="'body-3'"
                            :data="[
                                'bs-target' => '#body-3',
                            ]" :aria="[
                                'controls' => 'body-3',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-3',
                            ]"
                            :accContent="'Portfolyo'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-4'" :accTitle="'Görsel Alanı'" :idBody="'body-4'"
                            :data="[
                                'bs-target' => '#body-4',
                            ]" :aria="[
                                'controls' => 'body-4',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-4',
                            ]"
                            :accContent="'Görsel Alanı'" />


                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-5'" :accTitle="'Video Alanı'" :idBody="'body-5'"
                            :data="[
                                'bs-target' => '#body-5',
                            ]" :aria="[
                                'controls' => 'body-5',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-5',
                            ]"
                            :accContent="'Video Alanı'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-6'" :accTitle="'Fotoğraf Galeri'" :idBody="'body-6'"
                            :data="[
                                'bs-target' => '#body-6',
                            ]" :aria="[
                                'controls' => 'body-6',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-6',
                            ]"
                            :accContent="'Fotoğraf Galeri'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-7'" :accTitle="'Video Galeri'" :idBody="'body-7'"
                            :data="[
                                'bs-target' => '#body-7',
                            ]" :aria="[
                                'controls' => 'body-7',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]" :ariaBody="[
                                'labelledby' => 'header-7',
                            ]"
                            :accContent="'Video Galeri'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-8'" :accTitle="'Haber'"
                            :idBody="'body-8'" :data="[
                                'bs-target' => '#body-8',
                            ]" :aria="[
                                'controls' => 'body-8',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]"
                            :ariaBody="[
                                'labelledby' => 'header-8',
                            ]" :accContent="'Haber'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-9'" :accTitle="'Referans'"
                            :idBody="'body-9'" :data="[
                                'bs-target' => '#body-9',
                            ]" :aria="[
                                'controls' => 'body-9',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]"
                            :ariaBody="[
                                'labelledby' => 'header-9',
                            ]" :accContent="'Referans'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-10'" :accTitle="'Metin Alanı'"
                            :idBody="'body-10'" :data="[
                                'bs-target' => '#body-10',
                            ]" :aria="[
                                'controls' => 'body-10',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]"
                            :ariaBody="[
                                'labelledby' => 'header-10',
                            ]" :accContent="'Metin Alanı'" />
                        <x-admin.accordion-item :accordionItemClass="'mb-6'" :idHeader="'header-11'" :accTitle="'Footer'"
                            :idBody="'body-11'" :data="[
                                'bs-target' => '#body-11',
                            ]" :aria="[
                                'controls' => 'body-11',
                            ]" :dataBody="[
                                'parent' => '#homeEdit',
                            ]"
                            :ariaBody="[
                                'labelledby' => 'header-11',
                            ]" :accContent="'Footer'" />
                    </x-slot:accContent>
                </x-admin.accordion>
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
