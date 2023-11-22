@extends('layout.admin.layout')
@section('pageTitle')
    Blog
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Blog'"  :link="route('admin.blogs.index')" :class="'text-gray-600 fw-bold lh-1'" />
          
            
        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6'" :placeholder="'Arama Yap'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :link="route('admin.blogs.create')" :title="'Blog Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'add-files'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    {{--  <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.card :cardHeaderClass="'border-0 pt-6'" :cardBodyClass="'pt-5'" :class="'bg-gray-300 bg-opacity-20 border-0'">
                <x-slot:cardBody>
                    <x-admin.table :id="'newTable'" :class="'align-middle table-row-dashed fs-6 gy-5 data-table'" ::theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'" :tbodyClass="'fw-semibold text-gray-600'">
                        <x-slot:columns>
                            <th class="fw-bolder text-gray-600 w-125px">AD</th>
                            <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                        </x-slot:columns>
                        <x-slot:rows>

                        </x-slot:rows>
                    </x-admin.table>
                </x-slot:cardBody>
            </x-admin.card>
        </x-slot:content>
    </x-admin.wrapper-container>  --}}
    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.data-table :search="''" :export="''" :searchNone="''" :exportNone="''">
                <x-slot:columns>
                    <th class="fw-bolder text-gray-600 w-125px">GÖRSEL</th>
                    <th class="fw-bolder text-gray-600">BAŞLIK</th>
                    <th class="fw-bolder text-gray-600">KATEGORİ</th>
                    <th class="fw-bolder text-gray-600">OLUŞTURMA</th>
                    <th class="fw-bolder text-gray-600">SON GÜNCELLEME</th>
                    <th class="fw-bolder text-gray-600">DURUMU</th>
                    <th class="text-end pe-6 fw-bolder text-gray-600">İŞLEMLER</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>
                                <x-admin.img-wrapper :imgPath="'/' . $blog->image" />
                            <td>
                                {{ $blog->name }}
                            </td>
                            <td>
                                {{ $blog->category }}
                            </td>
                            <td class="text-gray-600 fw-medium">
                                {{ $blog->created_at }}
                            </td>
                            <td class="text-gray-600 fw-medium">
                                {{ $blog->updated_at }}
                            </td>
                            <td>
                                @if ($blog->status == 'published')
                                    <div class="btn btn-light-success">Yayında</div>
                                @else
                                    <div class="btn btn-light-danger">Pasif</div>
                                @endif
                            </td>
                            <td class="text-end">
                                <x-admin.button :link="'/blog/'.$blog->categoryR->slug.'/'  . $blog->slug" :target="'_blank'" :class="'btn-icon'"
                                    :small="''" :light="''" :color="'success'" :iconTag="'i'"
                                    :iconClass="'fs-1'" :iconType="'outline'" :iconName="'eye'" :data="[
                                        'kt-menu-trigger' => 'click',
                                        'kt-menu-placement' => 'bottom-end',
                                        'kt-menu-overflow' => 'true',
                                    ]" />
                                    <x-admin.button :link="route('admin.blogs.edit', $blog->id)" :class="'btn-icon '" :small="''"
                                        :light="''" :color="'primary'" :iconTag="'i'"
                                        :iconClass="'fs-1'" :iconType="'outline'" :iconName="'message-edit'"
                                        :data="[
                                            'kt-menu-trigger' => 'click',
                                            'kt-menu-placement' => 'bottom-end',
                                            'kt-menu-overflow' => 'true',
                                        ]" />
                                <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'" :action="route('admin.blogs.destroy', $blog->id)" :method="'POST'">
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
@section('script')
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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
            ajax: "{{ route('admin.news.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
    </script>  --}}
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
