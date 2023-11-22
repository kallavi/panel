@extends('layout.admin.layout')
@section('pageTitle')
   Yeni Galeri Ekle
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Güncelle'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :color="'success'" :data="[
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
        <!--begin:::Tabs-->
    <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'" :tabNavs="'true'" :tabItem="[
        'kt_customer_view_overview_tab' => 'Türkçe',
        'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
    ]">
    </x-admin.tab>
       
            <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                <x-slot:tabsContent>
                    <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_tab'" :tabPaneClass="'show active'">
                        <x-slot:tabContent>
                            <div class="d-flex flex-column flex-xl-row">
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                    <x-admin.form id="'kt_ecommerce_add_product_form'" :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework'" :dataKt="[
                                        'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                                    ]">
                                        <x-slot:form>
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'İstanbul Gezisi'"
                                                                    :class="'form-control'" />
                                                        
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'" :placeholder="'istanbbul-gezisi'" 
                                                                    :class="'form-control'" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Medya Galeri</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.tags-wrapper :class="'mx-n3 d-flex flex-wrap'">
                                                            <x-slot:tagsWrapper>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                            </x-slot:tagsWrapper>
                                                        </x-admin.tags-wrapper>
                                                        <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'"/>

                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </x-slot:form>
                                    </x-admin.form>
                                </div>
                                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                    <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>Görsel</h2>
                                            </div>
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'" :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'"/>
                                        </x-slot:cardBody>
                                    </x-admin.card>
                        
                                    <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>Durum</h2>
                                            </div>
                                            <div class="card-toolbar">
                                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                            </div>
                            
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                            <x-admin.form-select
                                                :defaultValue="'published'"
                                                :options="[
                                                    'published' => 'Yayınlanmış',
                                                    'draft' => 'Draft',
                                                    'scheduled' => 'Scheduled',
                                                    'inactive' => 'Inactive'
                                                ]"
                                            />
                                        </x-slot:cardBody>
                                    </x-admin.card>
                                    <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>SEO</h2>
                                            </div>
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'" :labelText="'Etiketler'" :labelClass="'form-label'"
                                                :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                                            <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'"
                                                :placeholder="'Açıklama Girin'" :rows="'4'" />
                                        </x-slot:cardBody>
                                    </x-admin.card>
                                </div>
                            </div>
                        </x-slot:tabContent>
                    </x-admin.tab>
                    <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab'">
                        <x-slot:tabContent>
                            <div class="d-flex flex-column flex-xl-row">
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                    <x-admin.form id="'kt_ecommerce_add_product_form'" :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework'" :dataKt="[
                                        'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                                    ]">
                                        <x-slot:form>
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'İstanbul Gezisi'"
                                                                    :class="'form-control'" />
                                                        
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'" :placeholder="'istanbbul-gezisi'" 
                                                                    :class="'form-control'" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Medya Galeri</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.tags-wrapper :class="'mx-n3 d-flex flex-wrap'">
                                                            <x-slot:tagsWrapper>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                                <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :placeholderImg="''" :parentClass="'px-3 my-3'"/>
                                                            </x-slot:tagsWrapper>
                                                        </x-admin.tags-wrapper>
                                                        <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'"/>

                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </x-slot:form>
                                    </x-admin.form>
                                </div>
                                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                    <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>Görsel</h2>
                                            </div>
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'" :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'"/>
                                        </x-slot:cardBody>
                                    </x-admin.card>
                        
                                    <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>Durum</h2>
                                            </div>
                                            <div class="card-toolbar">
                                                <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                            </div>
                            
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                            <x-admin.form-select
                                                :defaultValue="'published'"
                                                :options="[
                                                    'published' => 'Yayınlanmış',
                                                    'draft' => 'Draft',
                                                    'scheduled' => 'Scheduled',
                                                    'inactive' => 'Inactive'
                                                ]"
                                            />
                                        </x-slot:cardBody>
                                    </x-admin.card>
                                    <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                        <x-slot:cardHeader>
                                            <div class="card-title">
                                                <h2>SEO</h2>
                                            </div>
                                        </x-slot:cardHeader>
                                        <x-slot:cardBody>
                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'" :labelText="'Etiketler'" :labelClass="'form-label'"
                                                :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                                            <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'"
                                                :placeholder="'Açıklama Girin'" :rows="'4'" />
                                        </x-slot:cardBody>
                                    </x-admin.card>
                                </div>
                            </div>
                        </x-slot:tabContent>
                    </x-admin.tab>
                </x-slot:tabsContent>
            </x-admin.tab>
        </div>
        <!--end::Content-->


    </x-slot:content>
</x-admin.wrapper-container>
@endsection
