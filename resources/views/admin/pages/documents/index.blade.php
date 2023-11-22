@extends('layout.admin.layout')
@section('pageTitle')
    Dökümanlar
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12 me-6 bg-white border border-gray-300'" :placeholder="'Arama Yap'" 
                :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'" :iconType="'outline'" :iconName="'magnifier'" :iconClass="'fs-3 ms-4'" :iconFixed="''"
                :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.button :title="'Dosya Ekle'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#dokumanlarModal',
            ]" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :iconType="'outline'" :iconName="'file-up'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
<x-admin.wrapper-container>
    <x-slot:content>
    <x-admin.table :id="'documentTable'" :class="'table-row-dashed table-row-gray-300 gy-7 bg-gray-300 bg-opacity-20 px-9 py-8 rounded'" :theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'"
    :tbodyClass="'fw-semibold text-gray-600'">
        <x-slot:columns>
            <th class="fw-bolder text-gray-600 col-6">DOSYA ADI</th>
            <th class="fw-bolder text-gray-600" >BOYUT</th>
            <th class="fw-bolder text-gray-600">SON GÜNCELLEME</th>
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
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :linkClass="'px-3'" :title="'Güncelle'"  :data="['bs-toggle'=>'modal','bs-target'=>'#dokumanlarModal']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>

            
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :linkClass="'px-3'" :title="'Güncelle'"  :data="['bs-toggle'=>'modal','bs-target'=>'#dokumanlarModal']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>

            
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>
            <tr>
                <td class="text-gray-600 fw-medium">
                    katalog.pdf
                </td>
                <td class="text-gray-600 fw-medium">
                    320kb
                </td>
                <td class="text-gray-600 fw-medium">
                    12/05/2023
                </td>
                <td class="text-end">
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-success text-hover-success'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'eye'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-danger text-hover-danger'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'fasten'"
                    />
                    <x-admin.button 
                        :class="'btn-icon bg-opacity-20 bg-hover-light-primary text-hover-primary'" 
                        :small="''"
                        :iconTag="'i'" 
                        :iconClass="'fs-1'"
                        :iconType="'outline'"
                        :iconName="'dots-square'"
                        :data="[
                            'kt-menu-trigger'=>'click',
                            'kt-menu-placement'=>'bottom-end'
                        ]"
                    />
                    <x-admin.menu-item :menuSub="''">
                        <x-slot:subMenuWrapper>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Güncelle'" />
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Yenidan Adlandır'" :dataKt="['filemanager-table'=>'rename']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3'" :title="'Dosyayı İndir'" :dataKt="['filemanager-table-filter'=>'move_row']" :data="['bs-toggle'=>'modal','bs-target'=>'#kt_modal_move_to_folder']"/>
                            <x-admin.menu-item :menuSub="''" :class="'px-3'" :link="'#'" :linkClass="'px-3 text-danger'" :title="'Sil'" :dataKt="['filemanager-table-filter'=>'delete_row']"/>
                        </x-slot:subMenuWrapper>
                    </x-admin.menu-item>
                </td>
            </tr>

        </x-slot:rows>
    </x-admin.table>
    </x-slot:content>
</x-admin.wrapper-container>
@endsection