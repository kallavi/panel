@extends('layout.admin.layout')
@section('pageTitle')
    Sayfa Güncelle
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Sayfalar'" :link="route('admin.page.index')" :class="'text-gray-600 fw-bold lh-1'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Sayfa Güncelle'" :class="'text-gray-600 fw-bold lh-1'" />

        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Değişiklikleri Geri Al'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-reset'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-back'" :color="'danger'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Güncelle'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-create'" :color="'success'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <!--begin:::Tabs-->

    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'" :tabNavs="'true'" :tabItem="[
                'kt_customer_view_overview_tab' => 'Türkçe',
                'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
                'kt_customer_view_overview_events_and_logs_tab2' => 'Arapça',
            ]" />
            <x-admin.form id="'kt_ecommerce_add_product_form'" :action="route('pages.update', $page->id)" :method="'POST'" :class="'create_form'"
                :dataKt="[
                    'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                ]">
                <x-slot:form>
                    @method('PUT')
                    <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                        <x-slot:tabsContent>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_tab'" :tabPaneClass="'show active'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
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
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="'Sayfa Başlık'"
                                                                    :class="'form-control name-tr'" :name="'name:tr'"
                                                                    :value="$page->{'name:tr'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Url'" :labelClass="'form-label'" :placeholder="'Sayfa Url'"
                                                                    :class="'form-control url-tr'" :name="'slug:tr'"
                                                                    :value="$page->{'slug:tr'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>İçerik</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-textarea :labelTag="'label'" :labelText="'İçerik'"
                                                            :labelClass="'form-label'" :placeholder="'İçerik'" :rows="'9'"
                                                            :resizeNone="''" :id="'description-tr'" :name="'description:tr'" :textareaContent="$page->{'description:tr'}" />
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
                                                                @foreach ($gallery->gallery as $galleryImage)
                                                                    <x-admin.image-input :removaAvatar="''"
                                                                        :size="'w-150px h-150px'" :placeholderImg="''"
                                                                        :parentClass="'px-3 my-3'" :imgUrl="'/' . $galleryImage->slug" />
                                                                @endforeach
                                                            </x-slot:tagsWrapper>
                                                        </x-admin.tags-wrapper>
                                                        <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'"
                                                            :name="'photos[]'" />

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
                                                                    :labelText="'Video Linki'" :labelClass="'form-label required'" :placeholder="'Youtube Linki Giriniz'"
                                                                    :class="'form-control'" :name="'video'" :value="$page->video" />

                                                                <!--Dropzone -->
                                                                {{--  <x-admin.form-dropzone :parentClass="'fv-row mb-2 mt-5'" :messageClass="'align-items-center'"
                                                                        :fontClass="'text-gray-800 fw-medium fs-4'" :notSumTitle="''" :labelTag="'label'"
                                                                        :labelText="'Video Cover Görseli'" :labelClass="'form-label required'" :id="'testDropzone2'" />  --}}

                                                            </x-slot:tagsWrapper>
                                                        </x-admin.tags-wrapper>
                                                        <x-admin.image-input :changeAvatar="''" :name="'cover'"
                                                            :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'"
                                                            :textMuted="'Sadece *.png, *.jpg veya *.jpeg uzantılı görsel yükleyebilirsiniz'" :imgUrl="'/'.$page->cover" />
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                {{--  <x-admin.form-input :type="'file'" :id="'file'" :accept="'video/'"
                                                        onchange="checkFileType(this)" />  --}}
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Dökümanlar</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :name="'documents[]'" :id="'kt_ecommerce_add_product_media'" />

                                                        <x-admin.table :id="'kt_customers_table'" :class="'table align-middle table-row-dashed fs-6 gy-5 mt-5'"
                                                            ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'" :tbodyClass="'fw-semibold text-gray-600'">
                                                            <x-slot:columns>
                                                                <th class="fw-bolder text-gray-600 col-4">DOSYA ADI</th>
                                                                <th class="fw-bolder text-gray-600">BOYUT</th>
                                                                <th class="fw-bolder text-gray-600"></th>
                                                            </x-slot:columns>
                                                            <x-slot:rows>
                                                                @foreach ($documents->documents as $document)
                                                                    <tr>
                                                                        <td class="text-gray-600 fw-medium">
                                                                            {{ $document->slug }}
                                                                        </td>
                                                                        <td class="text-gray-600 fw-medium">
                                                                            {{ $document->size }}b
                                                                        </td>
                                                                        <td class="text-end">
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'"
                                                                                :iconTag="'i'" :iconClass="'fs-1'"
                                                                                :iconType="'outline'" :small="''"
                                                                                :iconName="'eye'" />
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'"
                                                                                :iconTag="'i'" :iconClass="'fs-1'"
                                                                                :iconType="'outline'" :small="''"
                                                                                :iconName="'fasten'" />
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'"
                                                                                :iconTag="'i'" :iconClass="'fs-1'"
                                                                                :small="''" :iconType="'outline'"
                                                                                :iconName="'dots-square'" />
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </x-slot:rows>
                                                        </x-admin.table>

                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Görsel</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :changeAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :textMuted="'Sadece *.png, *.jpg veya *.jpeg uzantılı görsel yükleyebilirsiniz'"
                                                        :name="'image'" :imgUrl="'/' . $page->image" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Status</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-success w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-select :defaultValue="$page->status" :options="[
                                                        'published' => 'Yayınlanmış',
                                                        'draft' => 'Pasif',
                                                    ]"
                                                        :name="'status'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control'" :id="'seo_keywords_tr'" :name="'seo_keywords:tr'"
                                                        :value="$page->{'seo_keywords:tr'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'" :placeholder="'Açıklama Girin'"
                                                        :rows="'4'" :name="'seo_description:tr'" :textareaContent="$page->{'seo_description:tr'}" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            {{--  <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                            <x-slot:cardHeader>
                                                <div class="card-title">
                                                    <h2>Yeni Widget Ekle</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Portfolyo'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Görsel Alanı'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Video Alanı'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Fotoğraf Galeri'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Video Galeri'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Haber'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Referans'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Metin Alanı'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />
                                                <x-admin.button :class="'mb-4 ps-5 fs-3 fw-semibold ps-0 w-100 d-flex flex-stack border bg-white text-gray-600 btn-active-light-dark'" :title="'Footer'" :iconTag="'i'" :iconClass="'fs-2 fw-bolder text-gray-600'"
                                                    :iconName="'plus'" :rightIcon="''" :cssColor="'#5E6278'" />

                                            </x-slot:cardBody>
                                        </x-admin.card>  --}}
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
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
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'"
                                                                    :placeholder="'Sayfa Başlık'" :class="'form-control name-en'"
                                                                    :name="'name:en'" :value="$page->{'name:en'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Url'" :labelClass="'form-label'"
                                                                    :placeholder="'Sayfa Url'" :class="'form-control url-en'"
                                                                    :name="'slug:en'" :value="$page->{'slug:en'}" />
                                                                {{--  <x-admin.form-select :inputParentClass="'col-6'" :id="'ustmenu'"
                                                                        :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                                        :labelText="'Üst Menü Seçiniz'" :labelClass="'form-label'"
                                                                        :data="[
                                                                            'hide-search' => 'true',
                                                                            'control' => 'select2',
                                                                            'placeholder' => 'Select an option',
                                                                        ]" :name="'menu'" >
                                                                        <x-slot:customOptions>
                                                                            @for ($i = 1; $i <= 20; $i++)
                                                                                <option value="{{ $i }}">
                                                                                    {{ $i }}
                                                                                </option>
                                                                            @endfor
                                                                        </x-slot:customOptions>
                                                                    </x-admin.form-select>  --}}
                                                                {{--  <x-admin.form-select :inputParentClass="'col-6'" :id="'sirano'"
                                                                        :class="'mb-2'" :disabled="'disabled'" :labelTag="'label'"
                                                                        :labelText="'Sıra'" :labelClass="'form-label'" :name="'sort'" >
                                                                        <x-slot:customOptions>
                                                                            @for ($i = 1; $i <= 20; $i++)
                                                                                <option value="{{ $i }}">
                                                                                    {{ $i }}
                                                                                </option>
                                                                            @endfor
                                                                        </x-slot:customOptions>
                                                                    </x-admin.form-select>  --}}
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>İçerik</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-textarea :labelTag="'label'" :labelText="'İçerik'"
                                                            :labelClass="'form-label'" :placeholder="'İçerik'" :rows="'9'"
                                                            :resizeNone="''" :id="'description-en'" :name="'description:en'" :textareaContent="$page->{'description:en'}" />
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                {{--  <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                        <x-slot:cardHeader>
                                                            <div class="card-title m-0">
                                                                <h2>Medya Galeri</h2>
                                                            </div>
                                                        </x-slot:cardHeader>
                                                        <x-slot:cardBody>
                                                            <x-admin.tags-wrapper :class="'mx-n3 d-flex flex-wrap'">
                                                                <x-slot:tagsWrapper>
                                                                    @foreach ($gallery->gallery as $galleryImage)
                                                                        <x-admin.image-input :removaAvatar="''" :size="'w-150px h-150px'"
                                                                            :placeholderImg="''" :parentClass="'px-3 my-3'" :imgUrl="'/'.$galleryImage->slug"/>
                                                                    @endforeach
                                                                </x-slot:tagsWrapper>
                                                            </x-admin.tags-wrapper>
                                                            <x-admin.form-dropzone :name="'photos[]'" :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                                        </x-slot:cardBody>
                                                    </x-admin.card>  --}}
                                                {{--  <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'" :cardBodyClass="'d-flex flex-stack col'">
                                                        <x-slot:cardHeader>
                                                            <div class="card-title m-0">
                                                                <h2>Video</h2>
                                                            </div>
                                                        </x-slot:cardHeader>
                                                        <x-slot:cardBody>
                                                            <x-admin.tags-wrapper :class="'col-6'">
                                                                <x-slot:tagsWrapper>
                                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row w-100'" :labelTag="'label'"
                                                                        :labelText="'Video Linki'" :labelClass="'form-label required'" :placeholder="'Youtube Linki Giriniz'"
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
                                                    </x-admin.card>  --}}
                                                {{--  <x-admin.form-input :type="'file'" :id="'file'" :accept="'video/'"
                                                        onchange="checkFileType(this)" />  --}}
                                                {{--  <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                        <x-slot:cardHeader>
                                                            <div class="card-title m-0">
                                                                <h2>Dökümanlar</h2>
                                                            </div>
                                                        </x-slot:cardHeader>
                                                        <x-slot:cardBody>
                                                            <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :id="'kt_ecommerce_add_product_media'" />

                                                            <x-admin.table :id="'kt_customers_table'" :class="'table align-middle table-row-dashed fs-6 gy-5 mt-5'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'"
                                                                :tbodyClass="'fw-semibold text-gray-600'">
                                                                <x-slot:columns>
                                                                    <th class="fw-bolder text-gray-600 col-4">DOSYA ADI</th>
                                                                    <th class="fw-bolder text-gray-600">BOYUT</th>
                                                                    <th class="fw-bolder text-gray-600"></th>
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
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" :iconTag="'i'"
                                                                                :iconClass="'fs-1'" :iconType="'outline'"
                                                                                :small="''" :iconName="'eye'" />
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" :iconTag="'i'"
                                                                                :iconClass="'fs-1'" :iconType="'outline'"
                                                                                :small="''" :iconName="'fasten'" />
                                                                            <x-admin.button :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" :iconTag="'i'"
                                                                                :iconClass="'fs-1'" :small="''"
                                                                                :iconType="'outline'" :iconName="'dots-square'" />
                                                                        </td>
                                                                    </tr>

                                                                </x-slot:rows>
                                                            </x-admin.table>

                                                        </x-slot:cardBody>
                                                    </x-admin.card>  --}}
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            {{--  <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                            <x-slot:cardHeader>
                                                <div class="card-title">
                                                    <h2>Görsel</h2>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.image-input :changeAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'"
                                                    :textMuted="'Sadece *.png, *.jpg veya *.jpeg uzantılı görsel yükleyebilirsiniz'" :name="'image'" :imgUrl="'/'.$page->image" />
                                            </x-slot:cardBody>
                                        </x-admin.card>  --}}
                                            {{--  <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                            <x-slot:cardHeader>
                                                <div class="card-title">
                                                    <h2>Status</h2>
                                                </div>
                                                <div class="card-toolbar">
                                                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                                                </div>
                                            </x-slot:cardHeader>
                                            <x-slot:cardBody>
                                                <x-admin.form-select :defaultValue="$page->status" :options="[
                                                    'published' => 'Yayınlanmış',
                                                    'draft' => 'Pasif',
                                                ]" :name="'status'" />
                                            </x-slot:cardBody>
                                        </x-admin.card>  --}}
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control'" :id="'seo_keywords_en'" :name="'seo_keywords:en'"
                                                        :value="$page->{'seo_keywords:en'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'" :placeholder="'Açıklama Girin'"
                                                        :rows="'4'" :name="'seo_description:en'" :textareaContent="$page->{'seo_description:en'}" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab2'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
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
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'"
                                                                    :placeholder="'Sayfa Başlık'" :class="'form-control text-end name-ar'"
                                                                    :name="'name:ar'" :value="$page->{'name:ar'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Url'" :labelClass="'form-label'"
                                                                    :placeholder="'Sayfa Url'" :class="'form-control text-end url-ar'"
                                                                    :name="'slug:ar'" :value="$page->{'slug:ar'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>İçerik</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-textarea :labelTag="'label'" :labelText="'İçerik'"
                                                            :labelClass="'form-label'" :placeholder="'İçerik'" :rows="'9'" :class="'text-end'"
                                                            :resizeNone="''" :id="'description-ar'" :name="'description:ar'" :textareaContent="$page->{'description:ar'}" />
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control text-end'" :id="'seo_keywords_ar'" :name="'seo_keywords:ar'"
                                                        :value="$page->{'seo_keywords:ar'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :class="'text-end justify-content-end'"
                                                        :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'" :placeholder="'Açıklama Girin'"
                                                        :rows="'4'" :name="'seo_description:ar'" :textareaContent="$page->{'seo_description:ar'}" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                        </x-slot:tabsContent>
                    </x-admin.tab>
                </x-slot:form>
            </x-admin.form>
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection

@section('script')
    @if ($status = Session::get('status'))
        @if ($message = Session::get('message'))
            <script>
                $('body').append(`
        <div class="toast align-items-center show bg-{{ $status }} position-absolute py-3 px-3" role="alert" aria-live="assertive" aria-atomic="true" style="right: 10px; bottom: 10px;">
            <div class="d-flex">
                <img class="me-3" src="../../assets/images/{{ $status }}.svg" alt="">
            <div class="toast-body text-white fw-medium fs-6">
                {{ $message }}
            </div>
                <button type="button" style="filter:invert(1)" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        `);
            </script>
        @endif
    @endif
    <script>
        //Tagify
        var seo_tr = document.querySelector("#seo_keywords_tr");
        new Tagify(seo_tr);
        var seo_en = document.querySelector("#seo_keywords_en");
        new Tagify(seo_en);
        var seo_ar = document.querySelector("#seo_keywords_ar");
        new Tagify(seo_ar);

        $('.btn-create').click(function() {
            $('.create_form').trigger('submit');
        });

        $('.btn-reset').click(function() {
            $('.create_form').trigger('reset');
        });

        $('.btn-back').click(function() {
            window.history.back();
        });

        $('.remove-gallery').click(function() {
            var slug = $(this).parent().children('.image-input-wrapper').attr('style');
            slug = slug.replace("background-image: url('/", "").replace("')", "").replace('uploads/news/', '');
            var token = $('input[name=_token]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: "/news-gallery-delete/" + slug,
                type: 'POST',
                data: {
                    slug: slug,
                    "_token": token
                },
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(result) {
                    alert(result);
                },
            });
        });

        $('.name-tr').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-tr').val(result);
                },
            });
        });

        $('.name-en').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-en').val(result);
                },
            });
        });

        $('.name-ar').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-ar').val(result);
                },
            });
        });

        ClassicEditor.create(document.querySelector('#description-tr'), {
            image: {
                toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ],
                upload: {
                    types: [ 'webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml' ]
                }
            }
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

            ClassicEditor.create(document.querySelector('#description-en'), {
                image: {
                    toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ],
                    upload: {
                        types: [ 'webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml' ]
                    }
                }
            })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });

        ClassicEditor.create(document.querySelector('#description-ar'), {
            image: {
                toolbar: [ 'imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative' ],
                upload: {
                    types: [ 'webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml' ]
                }
            }
        })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
