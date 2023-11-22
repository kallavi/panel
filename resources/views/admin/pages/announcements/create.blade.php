@extends('layout.admin.layout')
@section('pageTitle')
    Duyuru Ekle
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
                                                            :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'Hakkımızda'"
                                                            :class="'form-control'" />
                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                            :labelText="'URL'" :labelClass="'form-label'" :placeholder="'hakkimizda-2345'"
                                                            :class="'form-control'" />
                                                        <x-admin.form-select :inputParentClass="'col-6'" :id="'ustmenu'"
                                                            :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                            :labelText="'Üst Menü Seçiniz'" :labelClass="'form-label'" :options="[
                                                                '-1' => 'Kurumsal',
                                                                '1' => 'Kurumsal',
                                                            ]"
                                                            :data="[
                                                                'hide-search' => 'true',
                                                                'control' => 'select2',
                                                                'placeholder' => 'Select an option',
                                                            ]" :attr="[
                                                                'deneme' => 'test',
                                                            ]" />
                                                        <x-admin.form-select :inputParentClass="'col-6'" :id="'sirano'"
                                                            :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                            :labelText="'Sıra'" :labelClass="'form-label'" :options="[
                                                                '-1' => '1',
                                                                '1' => '2',
                                                            ]" />

                                                        <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'" :labelTag="'label'"
                                                            :labelText="'Açıklama'" :labelClass="'form-label'" :rows="'9'"
                                                            :resizeNone="''" />

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
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                    </x-slot:tagsWrapper>
                                                </x-admin.tags-wrapper>
                                                <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                            </x-slot:cardBody>
                                        </x-admin.card>

                                        <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'" :cardBodyClass="'d-flex flex-stack col'">
                                            <x-slot:cardHeader>
                                                <div class="card-title m-0">
                                                    <h2>Video</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.tags-wrapper :class="'col-6'">
                                                    <x-slot:tagsWrapper>
                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row w-100'" :labelTag="'label'"
                                                            :labelText="'Video Adı'" :labelClass="'form-label required'" :placeholder="'Youtube Linki Giriniz'"
                                                            :class="'form-control'" />

                                                        <!--Dropzone -->
                                                        <x-admin.form-dropzone :parentClass="'fv-row mb-2 mt-5'" :messageClass="'align-items-center'"
                                                            :fontClass="'text-gray-800 fw-medium fs-4'" :notSumTitle="''" :labelTag="'label'"
                                                            :labelText="'Video Cover Görseli'" :labelClass="'form-label required'" :id="'testDropzone2'" />

                                                    </x-slot:tagsWrapper>
                                                </x-admin.tags-wrapper>
                                                <x-admin.image-input :removaAvatar="''" :size="'w-325px h-175px'"
                                                    :placeholderImg="''" :parentClass="'my-3'" />
                                            </x-slot:cardBody>
                                        </x-admin.card>
                                        <x-admin.form-input :type="'file'" :id="'file'" :accept="'video/'"
                                            onchange="checkFileType(this)" />

                                        <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                            <x-slot:cardHeader>
                                                <div class="card-title m-0">
                                                    <h2>Dökümanlar</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                                <x-admin.table :id="'kt_customers_table'" :class="'align-middle table-row-dashed fs-6 gy-5 mt-5'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'"
                                                    :tbodyClass="'fw-semibold text-gray-600'">
                                                    <x-slot:columns>
                                                        <th class="fw-bolder text-gray-600 col-4">DOSYA ADI</th>
                                                        <th class="fw-bolder text-gray-600" colspan="2">BOYUT</th>
                                                    </x-slot:columns>
                                                    <x-slot:rows>
                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>


                                                    </x-slot:rows>
                                                </x-admin.table>

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
                                    <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'"
                                        :class="'mb-3'" :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                <x-slot:cardHeader>
                                    <div class="card-title">
                                        <h2>Durum</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-primary w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>

                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.form-select :defaultValue="'published'" :options="[
                                        'published' => 'Yayınlanmış',
                                        'draft' => 'Draft',
                                        'scheduled' => 'Scheduled',
                                        'inactive' => 'Inactive',
                                    ]" />
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid mt-8'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                        :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Öne Çıkar'" />
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                <x-slot:cardHeader>
                                    <div class="card-title">
                                        <h2>SEO</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'" :labelText="'Etiketler'"
                                        :labelClass="'form-label'" :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :labelText="'Sayfa Açıklaması'"
                                        :labelClass="'form-label'" :placeholder="'Açıklama Girin'" :rows="'4'" />
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
                                                            :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'Hakkımızda'"
                                                            :class="'form-control'" />
                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                            :labelText="'URL'" :labelClass="'form-label'" :placeholder="'hakkimizda-2345'"
                                                            :class="'form-control'" />
                                                        <x-admin.form-select :inputParentClass="'col-6'" :id="'ustmenu'"
                                                            :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                            :labelText="'Üst Menü Seçiniz'" :labelClass="'form-label'" :options="[
                                                                '-1' => 'Kurumsal',
                                                                '1' => 'Kurumsal',
                                                            ]"
                                                            :data="[
                                                                'hide-search' => 'true',
                                                                'control' => 'select2',
                                                                'placeholder' => 'Select an option',
                                                            ]" :attr="[
                                                                'deneme' => 'test',
                                                            ]" />
                                                        <x-admin.form-select :inputParentClass="'col-6'" :id="'sirano'"
                                                            :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                            :labelText="'Sıra'" :labelClass="'form-label'" :options="[
                                                                '-1' => '1',
                                                                '1' => '2',
                                                            ]" />

                                                        <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'" :labelTag="'label'"
                                                            :labelText="'Açıklama'" :labelClass="'form-label'" :rows="'9'"
                                                            :resizeNone="''" />

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
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" />
                                                    </x-slot:tagsWrapper>
                                                </x-admin.tags-wrapper>
                                                <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                            </x-slot:cardBody>
                                        </x-admin.card>

                                        <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'" :cardBodyClass="'d-flex flex-stack col'">
                                            <x-slot:cardHeader>
                                                <div class="card-title m-0">
                                                    <h2>Video</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.tags-wrapper :class="'col-6'">
                                                    <x-slot:tagsWrapper>
                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row w-100'" :labelTag="'label'"
                                                            :labelText="'Video Adı'" :labelClass="'form-label required'" :placeholder="'Youtube Linki Giriniz'"
                                                            :class="'form-control'" />

                                                        <!--Dropzone -->
                                                        <x-admin.form-dropzone :parentClass="'fv-row mb-2 mt-5'" :messageClass="'align-items-center'"
                                                            :fontClass="'text-gray-800 fw-medium fs-4'" :notSumTitle="''" :labelTag="'label'"
                                                            :labelText="'Video Cover Görseli'" :labelClass="'form-label required'" :id="'testDropzone2'" />

                                                    </x-slot:tagsWrapper>
                                                </x-admin.tags-wrapper>
                                                <x-admin.image-input :removaAvatar="''" :size="'w-325px h-175px'"
                                                    :placeholderImg="''" :parentClass="'my-3'" />
                                            </x-slot:cardBody>
                                        </x-admin.card>
                                        <x-admin.form-input :type="'file'" :id="'file'" :accept="'video/'"
                                            onchange="checkFileType(this)" />

                                        <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                            <x-slot:cardHeader>
                                                <div class="card-title m-0">
                                                    <h2>Dökümanlar</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                                <x-admin.table :id="'kt_customers_table'" :class="'align-middle table-row-dashed fs-6 gy-5 mt-5'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'"
                                                    :tbodyClass="'fw-semibold text-gray-600'">
                                                    <x-slot:columns>
                                                        <th class="fw-bolder text-gray-600 col-4">DOSYA ADI</th>
                                                        <th class="fw-bolder text-gray-600" colspan="2">BOYUT</th>
                                                    </x-slot:columns>
                                                    <x-slot:rows>
                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="text-gray-600 fw-medium">
                                                                katalog.pdf
                                                            </td>
                                                            <td class="text-gray-600 fw-medium">
                                                                320kb
                                                            </td>
                                                            <td class="text-end">
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'eye'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'fasten'" />
                                                                <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :small="''"
                                                                    :iconTag="'i'" :iconClass="'fs-1'"
                                                                    :iconType="'outline'" :iconName="'dots-square'" />
                                                            </td>
                                                        </tr>


                                                    </x-slot:rows>
                                                </x-admin.table>

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
                                    <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'"
                                        :class="'mb-3'" :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                <x-slot:cardHeader>
                                    <div class="card-title">
                                        <h2>Durum</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <div class="rounded-circle bg-primary w-15px h-15px"
                                            id="kt_ecommerce_add_product_status"></div>
                                    </div>

                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.form-select :defaultValue="'published'" :options="[
                                        'published' => 'Yayınlanmış',
                                        'draft' => 'Draft',
                                        'scheduled' => 'Scheduled',
                                        'inactive' => 'Inactive',
                                    ]" />
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid mt-8'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                        :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Öne Çıkar'" />
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                <x-slot:cardHeader>
                                    <div class="card-title">
                                        <h2>SEO</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'" :labelText="'Etiketler'"
                                        :labelClass="'form-label'" :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :labelText="'Sayfa Açıklaması'"
                                        :labelClass="'form-label'" :placeholder="'Açıklama Girin'" :rows="'4'" />
                                </x-slot:cardBody>
                            </x-admin.card>
                        </div>
                    </div>
                </x-slot:tabContent>
            </x-admin.tab>
        </x-slot:tabsContent>
    </x-admin.tab>

    <!--end::Content-->

    <!--begin::Sidebar-->

    <!--end::Sidebar-->

    </x-slot:content>
</x-admin.wrapper-container>
@endsection
