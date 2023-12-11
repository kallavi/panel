@extends('layout.admin.layout')
@section('pageTitle')
    Portfolyo Kategorileri
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Portfolyolar'"  :link="route('admin.portfolio.index')" :class="'text-gray-600 fw-bold lh-1'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Portfolyo Kategorileri'" :class="'text-gray-600 fw-bold lh-1'" />

        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :title="'Kategori Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#newsCategories',
            ]" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'add-files'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.card :cardHeaderClass="' border-0 pt-6'" :cardBodyClass="'pt-0'" :class="'bg-gray-300 bg-opacity-20 border-0'">
                <x-slot:cardBody>
                    <x-admin.table :id="'kt_customers_table'" :class="'align-middle table-row-dashed fs-6 gy-5'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'" :tbodyClass="'fw-semibold text-gray-600'">
                        <x-slot:columns>
                            <th class="fw-bolder text-gray-600 w-125px">GÖRSEL</th>
                            <th class="fw-bolder text-gray-600 col-8">KATEGORİ ADI</th>
                            <th class="fw-bolder text-center text-gray-600">İÇERİK SAYISI</th>
                            <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                        </x-slot:columns>
                        <x-slot:rows>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <x-admin.img-wrapper :imgPath="$category->image" />
                                    <td>
                                        <a href="{{ route('backoffice.index') }}"
                                            class="text-gray-900 fw-medium mb-1">{{ $category->{'name:tr'} }}</a>
                                    </td>
                                    <td class="text-center">
                                        33
                                    </td>
                                    <td class="text-end">
                                        <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                            :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                            :iconName="'message-edit'" :data="[
                                                'kt-menu-trigger' => 'click',
                                                'kt-menu-placement' => 'bottom-end',
                                                'kt-menu-overflow' => 'true',
                                                'bs-toggle' => 'modal',
                                                'bs-target' => '#category'.$category->id
                                            ]" />
                                            <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline ms-3'" :action="route('admin.portfoliocategory.destroy', $category->id)" :method="'POST'" >
                                                <x-slot:form>
                                                    @method('DELETE')
                                                    <x-admin.button :class="'btn-icon'" :type="'submit'" :small="''" :light="''"
                                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                                        :iconName="'trash'" :data="[
                                                            'kt-menu-trigger' => 'click',
                                                            'kt-menu-placement' => 'bottom-end',
                                                            'kt-menu-overflow' => 'true',
                                                        ]" />
                                                </x-slot:form>
                                            </x-admin.form>
                                    </td>
                                </tr>


                                <!---News Kategori Güncelle Modal--->
                                <x-admin.modal :id="'category'.$category->id" :modalTitle="'Kategori Güncelle'" :headerNotBorder="''" :titleCenter="''"
                                    :footerClass="'justify-content-center'" :footerNotBorder="''">

                                    <x-slot:modalBody>
                                        <x-admin.form :id="'kt_ecommerce_add_product_form'" :action="route('admin.portfoliocategory.update', $category->id)" :method="'POST'"
                                            :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework news_create_form'" :dataKt="[
                                                'redirect' =>
                                                    '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                                            ]">
                                            <x-slot:form>
                                                @method('PUT')
                                                <x-admin.custom-grid>
                                                    <x-slot:gridRow>
                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :type="'hidden'" :name="'id'"
                                                            :placeholder="'Kategori adı giriniz'" :class="'form-control'" :value="$category->id" />

                                                        <x-admin.image-input :changeAvatar="''" :name="'image'"
                                                            :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'"
                                                            :textMuted="'Sadece *.png, *.jpg and *.jpeg uzantılı görsel yükleyebilirsiniz.'"
                                                            :imgUrl="'/'.$category->image" />

                                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:tr'"
                                                            :labelTag="'label'" :labelText="'Türkçe Kategori Adı'" :labelClass="'form-label required'"
                                                            :placeholder="'Kategori adı giriniz'" :class="'form-control'" :value="$category->{'name:tr'}" />

                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:en'"
                                                                :labelTag="'label'" :labelText="'İngilizce Kategori Adı'" :labelClass="'form-label required'"
                                                                :placeholder="'Kategori adı giriniz'" :class="'form-control'" :value="$category->{'name:en'}" />

                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:ar'"
                                                                    :labelTag="'label'" :labelText="'Arapça Kategori Adı'" :labelClass="'form-label required'"
                                                                    :placeholder="'Kategori adı giriniz'" :class="'form-control text-end'" :value="$category->{'name:ar'}" />
                                                        <x-admin.button :buttonParentClass="'fv-row'" :title="'Kaydet'"
                                                            :color="'primary'" />
                                                    </x-slot:gridRow>
                                                </x-admin.custom-grid>
                                            </x-slot:form>
                                        </x-admin.form>
                                    </x-slot:modalBody>

                                </x-admin.modal>
                            @endforeach
                        </x-slot:rows>
                    </x-admin.table>
                </x-slot:cardBody>
            </x-admin.card>
        </x-slot:content>
    </x-admin.wrapper-container>

    <!---News Kategori Ekle Modal--->
    <x-admin.modal :id="'newsCategories'" :modalTitle="'Kategori Ekle'" :headerNotBorder="''" :titleCenter="''" :footerClass="'justify-content-center'"
        :footerNotBorder="''">

        <x-slot:modalBody>
            <x-admin.form :id="'kt_ecommerce_add_product_form'" :action="route('admin.portfoliocategory.store')" :method="'POST'" :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework news_create_form'"
                :dataKt="[
                    'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                ]">
                <x-slot:form>
                    <x-admin.custom-grid>
                        <x-slot:gridRow>
                            <x-admin.image-input :changeAvatar="''" :name="'image'" :size="'w-150px h-150px'"
                                :parentClass="'my-3 text-center'" :class="'mb-3'" :textMuted="'Sadece *.png, *.jpg and *.jpeg uzantılı görsel yükleyebilirsiniz.'" />

                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:tr'" :labelTag="'label'" :labelText="'Türkçe Kategori Adı'"
                                    :labelClass="'form-label required'" :placeholder="'Kategori adı giriniz'" :class="'form-control'" />

                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:en'" :labelTag="'label'" :labelText="'İngilizce Kategori Adı'"
                                        :labelClass="'form-label required'" :placeholder="'Kategori adı giriniz'" :class="'form-control'" />

                                        <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :name="'name:ar'" :labelTag="'label'" :labelText="'Arapça Kategori Adı'"
                                            :labelClass="'form-label required'" :placeholder="'Kategori adı giriniz'" :class="'form-control text-end'" />
                            <x-admin.button :buttonParentClass="'fv-row'" :title="'Kaydet'" :color="'primary'" />
                        </x-slot:gridRow>
                    </x-admin.custom-grid>
                </x-slot:form>
            </x-admin.form>
        </x-slot:modalBody>

    </x-admin.modal>
@endsection
@section('script')
@if($status = Session::get('status'))
    @if($message = Session::get('message'))
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
@endsection
