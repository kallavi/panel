@extends('layout.admin.layout')
@section('pageTitle')
    Kullanıcılar
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Kullanıcılar'"  :link="route('admin.users.index')" :class="'text-gray-600 fw-bold lh-1'" />
 
            
        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            {{-- <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'" :inputParentClass="'d-flex align-items-center position-relative my-4'" /> --}}
            <x-admin.button :link="route('admin.users.create')" :title="'Kullanıcı Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :iconTag="'i'" :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'add-files'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.data-table :search="''" :export="''" :searchNone="''" :exportNone="''">
                <x-slot:columns>
                    <th class="fw-bolder text-gray-600 w-125px">Ad</th>
           
                    <th class="fw-bolder text-gray-600">OLUŞTURMA</th>
                    <th class="fw-bolder text-gray-600">SON GÜNCELLEME</th>
                     <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach ($users as $item)
                        <tr>
                            
                            <td>
                                {{ $item->name }}
                            </td>
                             
                            <td class="text-gray-600 fw-medium">
                                {{ $item->created_at }}
                            </td>
                            <td class="text-gray-600 fw-medium">
                                {{ $item->updated_at }}
                            </td>
                           
                            <td class="text-end">
                                {{-- <x-admin.button :link="'/proje/' . $item->slug" :target="'_blank'" :class="'btn-icon'" :small="''"
                                    :light="''" :color="'success'" :iconTag="'i'" :iconClass="'fs-1'"
                                    :iconType="'outline'" :iconName="'eye'" :data="[
                                        'kt-menu-trigger' => 'click',
                                        'kt-menu-placement' => 'bottom-end',
                                        'kt-menu-overflow' => 'true',
                                    ]" /> --}}
                                <x-admin.button :link="route('admin.users.edit', $item->id)" :class="'btn-icon '" :small="''" :light="''"
                                    :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                    :iconName="'message-edit'" :data="[
                                        'kt-menu-trigger' => 'click',
                                        'kt-menu-placement' => 'bottom-end',
                                        'kt-menu-overflow' => 'true',
                                    ]" />
                                <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'" :action="route('admin.users.destroy', $item->id)" :method="'POST'">
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
{{-- @section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            select: false,
            lengthChange: false,
            "oLanguage": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Turkish.json"
            },
            ajax: "{{ route('admin.users.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>
@endsection --}}
