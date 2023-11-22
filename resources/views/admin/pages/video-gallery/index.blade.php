@extends('layout.admin.layout')
@section('pageTitle')
    Video Galeri
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :title="'Video Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
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
                            <th class="fw-bolder text-gray-600 col-4">BAŞLIK</th>
                            <th class="fw-bolder text-gray-600 col-2">İÇERİK</th>
                            <th class="fw-bolder text-gray-600">OLUŞTURMA</th>
                            <th class="fw-bolder text-gray-600">SON GÜNCELLEME</th>
                            <th class="fw-bolder text-gray-600">DURUMU</th>
                            <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                        </x-slot:columns>
                        <x-slot:rows>
                            <tr>
                                <td>
                                    <x-admin.img-wrapper :imgPath="'assets/images/haber2.png'" />
                                </td>
                                <td>
                                    <a href="{{ route('backoffice.index') }}" class="text-gray-900 fw-medium mb-1">Kurbban Bağışları
                                        Başladı</a>
                                </td>

                                <td>İçerik</td>
                                <td class="text-gray-600 fw-medium">
                                    01/03/2023
                                </td>
                                <td class="text-gray-600 fw-medium">
                                    12/05/2023
                                </td>
                                <td>
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" />
                                </td>
                                <td class="text-end">

                                    <x-admin.button :class="'btn-icon'" :small="''" :light="''"
                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'trash'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                    <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'message-edit'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-admin.img-wrapper :imgPath="'assets/images/haber2.png'" />
                                </td>
                                <td>
                                    <a href="{{ route('backoffice.index') }}" class="text-gray-900 fw-medium mb-1">Kurbban Bağışları
                                        Başladı</a>
                                </td>
                                <td>İçerik</td>
                                <td class="text-gray-600 fw-medium">
                                    01/03/2023
                                </td>
                                <td class="text-gray-600 fw-medium">
                                    12/05/2023
                                </td>
                                <td>
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" />
                                </td>
                                <td class="text-end">

                                    <x-admin.button :class="'btn-icon'" :small="''" :light="''"
                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'trash'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                    <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'message-edit'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-admin.img-wrapper :imgPath="'assets/images/haber2.png'" />
                                </td>
                                <td>
                                    <a href="{{ route('backoffice.index') }}" class="text-gray-900 fw-medium mb-1">Kurbban Bağışları
                                        Başladı</a>
                                </td>
                                <td>İçerik</td>
                                <td class="text-gray-600 fw-medium">
                                    01/03/2023
                                </td>
                                <td class="text-gray-600 fw-medium">
                                    12/05/2023
                                </td>
                                <td>
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" />
                                </td>
                                <td class="text-end">

                                    <x-admin.button :class="'btn-icon'" :small="''" :light="''"
                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'trash'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                    <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'message-edit'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-admin.img-wrapper :imgPath="'assets/images/haber2.png'" />
                                </td>
                                <td>
                                    <a href="{{ route('backoffice.index') }}" class="text-gray-900 fw-medium mb-1">Kurbban Bağışları
                                        Başladı</a>
                                </td>
                                <td>İçerik</td>
                                <td class="text-gray-600 fw-medium">
                                    01/03/2023
                                </td>
                                <td class="text-gray-600 fw-medium">
                                    12/05/2023
                                </td>
                                <td>
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" />
                                </td>
                                <td class="text-end">

                                    <x-admin.button :class="'btn-icon'" :small="''" :light="''"
                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'trash'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                    <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'message-edit'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <x-admin.img-wrapper :imgPath="'assets/images/haber2.png'" />
                                </td>
                                <td>
                                    <a href="{{ route('backoffice.index') }}" class="text-gray-900 fw-medium mb-1">Kurbban Bağışları
                                        Başladı</a>
                                </td>
                                <td>İçerik</td>
                                <td class="text-gray-600 fw-medium">
                                    01/03/2023
                                </td>
                                <td class="text-gray-600 fw-medium">
                                    12/05/2023
                                </td>
                                <td>
                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                                        :name="'status'" :checked="'checked'" :class="'form-check-input'" />
                                </td>
                                <td class="text-end">

                                    <x-admin.button :class="'btn-icon'" :small="''" :light="''"
                                        :color="'danger'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'trash'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                    <x-admin.button :class="'btn-icon '" :small="''" :light="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'message-edit'" :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                </td>
                            </tr>

                        </x-slot:rows>
                    </x-admin.table>
                </x-slot:cardBody>
            </x-admin.card>
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection
