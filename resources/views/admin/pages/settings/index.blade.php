@extends('layout.admin.layout')
@section('pageTitle')
    Site Ayarları
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
        <div class="d-flex flex-column flex-xl-row">
            <div class="d-flex flex-column col-9 gap-7 gap-lg-10 ">
                <x-admin.form id="'kt_ecommerce_add_product_form'" :class="'form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework'" :dataKt="[
                    'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
                ]">
                    <x-slot:form>
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                <x-slot:cardHeader>
                                    <div class="card-title m-0">
                                        <h2>Sabit Sayfa</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-4'" :id="'status'" :type="'checkbox'"
                                                :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                                :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Sayfa Görseli'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                <x-slot:cardHeader>
                                    <div class="card-title m-0">
                                        <h2>Haber</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-4'" :id="'status'" :type="'checkbox'"
                                                :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                                :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Sayfa Görseli'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                <x-slot:cardHeader>
                                    <div class="card-title m-0">
                                        <h2>Sabit Sayfa</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-4'" :id="'status'" :type="'checkbox'"
                                                :name="'status'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'"
                                                :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Sayfa Görseli'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                <x-slot:cardHeader>
                                    <div class="card-title m-0">
                                        <h2>Sabit Sayfa</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-4'" :id="'status'" :type="'checkbox'"
                                                :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                                :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Sayfa Görseli'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>
                                </x-slot:cardBody>
                            </x-admin.card>
                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                <x-slot:cardHeader>
                                    <div class="card-title m-0">
                                        <h2>Sabit Sayfa</h2>
                                    </div>
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-4'" :id="'status'" :type="'checkbox'"
                                                :name="'status'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'"
                                                :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Sayfa Görseli'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>
                                </x-slot:cardBody>
                            </x-admin.card>

                        </div>
                    </x-slot:form>
                </x-admin.form>
            </div>
        </div>  
    </x-slot:content>
</x-admin.wrapper-container>
@endsection
