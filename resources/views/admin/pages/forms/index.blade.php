@extends('layout.admin.layout')
@section('pageTitle')
    İstek, Öneri ve Şikayet Formu
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :title="'İndir'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'file-down'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
<x-admin.wrapper-container>
    <x-slot:content>
    <x-admin.card :cardHeaderClass="' border-0 pt-6'" :cardBodyClass="'pt-0'" :class="'bg-gray-300 bg-opacity-20 border-0'">
        <x-slot:cardBody>
            <x-admin.table :id="'kt_customers_table'" :class="'align-middle table-row-dashed fs-6 gy-5'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'"
            :tbodyClass="'fw-semibold text-gray-600'">
                <x-slot:columns>
                    <th class="fw-bolder text-gray-600 col-7">MESAJ</th>
                    <th class="fw-bolder text-gray-600">E-POSTA</th>
                    <th class="fw-bolder text-gray-600">OLUŞTURMA</th>
                    <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                </x-slot:columns>
                <x-slot:rows>
                    <tr>
                        <td>
                            <a href="{{route('home')}}" class="text-gray-900 fw-medium mb-1">Kurban bağışları başladı</a>
                        </td>
                        <td>
                           deneme@gmail.com
                        </td>
                        <td class="text-gray-600 fw-medium">
                            12/05/2023
                        </td>
                        <td class="text-end">
                            <x-admin.button 
                                :class="'btn-icon me-auto'"
                                :small="''" 
                                :light="''"
                                :color="'success'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'eye'"
                                :modalButton="''"
                                :data="[
                                    'bs-target' => '#istekoneriform',
                                ]"
                            />
                            <x-admin.button 
                                :class="'btn-icon'" 
                                :small="''" 
                                :light="''"
                                :color="'danger'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'trash'"
                            />
     
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('home')}}" class="text-gray-900 fw-medium mb-1">Kurban bağışları başladı</a>
                        </td>
                        <td>
                           deneme@gmail.com
                        </td>
                        <td class="text-gray-600 fw-medium">
                            12/05/2023
                        </td>
                        <td class="text-end">
                            <x-admin.button 
                                :class="'btn-icon'"
                                :small="''" 
                                :light="''"
                                :color="'success'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'eye'"
                                :data="[
                                    'kt-menu-trigger' => 'click',
                                    'kt-menu-placement' => 'bottom-end',
                                    'kt-menu-overflow' => 'true'
                                ]"
                            />
                            <x-admin.button 
                                :class="'btn-icon'" 
                                :small="''" 
                                :light="''"
                                :color="'danger'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'trash'"
                                :data="[
                                    'kt-menu-trigger' => 'click',
                                    'kt-menu-placement' => 'bottom-end',
                                    'kt-menu-overflow' => 'true'
                                ]"
                            />
     
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('home')}}" class="text-gray-900 fw-medium mb-1">Kurban bağışları başladı</a>
                        </td>
                        <td>
                           deneme@gmail.com
                        </td>
                        <td class="text-gray-600 fw-medium">
                            12/05/2023
                        </td>
                        <td class="text-end">
                            <x-admin.button 
                                :class="'btn-icon'"
                                :small="''" 
                                :light="''"
                                :color="'success'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'eye'"
                                :data="[
                                    'kt-menu-trigger' => 'click',
                                    'kt-menu-placement' => 'bottom-end',
                                    'kt-menu-overflow' => 'true'
                                ]"
                            />
                            <x-admin.button 
                                :class="'btn-icon'" 
                                :small="''" 
                                :light="''"
                                :color="'danger'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'trash'"
                                :data="[
                                    'kt-menu-trigger' => 'click',
                                    'kt-menu-placement' => 'bottom-end',
                                    'kt-menu-overflow' => 'true'
                                ]"
                            />
     
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('home')}}" class="text-gray-900 fw-medium mb-1">Kurban bağışları başladı</a>
                        </td>
                        <td>
                           deneme@gmail.com
                        </td>
                        <td class="text-gray-600 fw-medium">
                            12/05/2023
                        </td>
                        <td class="text-end">
                            <x-admin.button 
                                :class="'btn-icon'"
                                :small="''" 
                                :light="''"
                                :color="'success'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'eye'"
                                :data="[
                                    'bbs-target' => '#istekoneriform',
                                ]"
                            />
                            <x-admin.button 
                                :class="'btn-icon'" 
                                :small="''" 
                                :light="''"
                                :color="'danger'"
                                :iconTag="'i'" 
                                :iconClass="'fs-1'"
                                :iconType="'outline'"
                                :iconName="'trash'"
                                :data="[
                                    'kt-menu-trigger' => 'click',
                                    'kt-menu-placement' => 'bottom-end',
                                    'kt-menu-overflow' => 'true'
                                ]"
                            />
     
                        </td>
                    </tr>
                </x-slot:rows>
            </x-admin.table>
        </x-slot:cardBody>
    </x-admin.card>
    </x-slot:content>
</x-admin.wrapper-container>
@endsection
