@extends('layout.admin.layout')
@section('pageTitle')
    Sliderlar
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Slider'"    :class="'text-gray-600 fw-bold lh-1'" />
          
            
        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :link="route('sliders.create')" :title="'Slider Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'add-files'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.data-table :search="''" :export="''" :searchNone="''" :exportNone="''">
                <x-slot:columns>
                    <th class="fw-bolder text-gray-600 w-125px">GÖRSEL</th>
                    <th class="fw-bolder text-gray-600 col-5">BAŞLIK</th>
                    <th class="fw-bolder text-gray-600">OLUŞTURMA</th>
                    <th class="fw-bolder text-gray-600">SON GÜNCELLEME</th>
                    <th class="fw-bolder text-gray-600">DURUMU</th>
                    <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>
                                <x-admin.img-wrapper :imgPath="$slider->image" />
                            </td>
                            <td>
                                {{ $slider->name }}
                            </td>
                            <td class="text-gray-600 fw-medium">
                                {{ $slider->created_at }}
                            </td>
                            <td class="text-gray-600 fw-medium">
                                {{ $slider->updated_at }}
                            </td>
                            <td>
                                @if ($slider->status == 'published')
                                    <div class="btn btn-light-success">Yayında</div>
                                @else
                                    <div class="btn btn-light-danger">Pasif</div>
                                @endif
                            </td>
                            <td class="text-end">
                                <x-admin.button :class="'btn-icon '" :small="''" :light="''" :color="'primary'"
                                    :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'" :iconName="'message-edit'"
                                    :data="[
                                        'kt-menu-trigger' => 'click',
                                        'kt-menu-placement' => 'bottom-end',
                                        'kt-menu-overflow' => 'true',
                                    ]" :link="route('sliders.edit', $slider->id)" />

                                <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'" :action="route('sliders.destroy', $slider->id)" :method="'POST'">
                                    <x-slot:form>
                                        @method('DELETE')
                                        <x-admin.button :class="'btn-icon'" :small="''" :light="''"
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
                    @endforeach
                </x-slot:rows>
            </x-admin.data-table>
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection
