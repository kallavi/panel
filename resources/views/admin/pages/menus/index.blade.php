@extends('layout.admin.layout')
@section('pageTitle')
    Menüler
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Menüler'" :class="'text-gray-600 fw-bold lh-1'" />


        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <div class="d-flex flex-column flex-xl-row">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-325px min-w-lg-325px mb-7 me-lg-10">
                    <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                        <x-slot:cardHeader>
                            <div class="card-title m-0">
                                <h2>Menüler</h2>
                            </div>
                        </x-slot:cardHeader>
                        <x-slot:cardBody>
                            <x-admin.menu-column :id="'#kt_app_sidebar_menu'" :class="'menu-sub-indention menu-active-bg'" :data-kt-menu="'true'" :data-kt-menu-expand="'false'">
                                <x-slot:menuColumn>
                                    @for ($i = 1; $i <= 7; $i++)
                                        @if ($i == 1)
                                            @php
                                                $menu_title = 'Header Menü';
                                                $show = ' show';
                                            @endphp
                                        @elseif ($i > 1)
                                            @php
                                                $menu_title = 'Footer Menü '.$i-1;
                                                $show = '';
                                            @endphp
                                        @endif
                                        <x-admin.menu-item :subMenuClass="'ms-0'" :notIcon="''" :class="'menu-accordion $show'"
                                            :linkClass="'border-bottom-dashed border-gray-300 ps-0 fs-4 fw-bolder text-gray-600'" :title="$menu_title" :data-kt-menu-trigger="'click'">
                                            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
                                            <x-slot:subMenu>
                                                @foreach ($menus as $menu)
                                                    @php
                                                        $isClick = false;
                                                    @endphp
                                                    @foreach ($menus->where('child', $menu->id) as $sub)
                                                        @php
                                                            $isClick = true;
                                                        @endphp
                                                    @endforeach
                                                    @if ($menu->parent && $menu->parent == $i && $menu->child == '' && $isClick)
                                                        <x-admin.menu-item :notIcon="''" :class="'ms-0 border-bottom-dashed border-gray-300 ps-0 fs-5 text-gray-500 fw-medium menu-title'"
                                                            :linkClass="'px-0 fs-5 text-gray-500 fw-regular'" :data-kt-menu-trigger="'click'" :menuItemRoot="'home'"
                                                            :title="$menu->name">
                                                            <x-slot:subMenu>
                                                                @foreach ($menus->where('child', $menu->id) as $sub_menu)
                                                                    <x-admin.menu-item :notIcon="''" :linkClass="'px-0 fs-5 text-gray-500 fw-regular'"
                                                                        :title="$sub_menu->name" :menuItemRoot="'home'">
                                                                        <x-slot:menuButton>
                                                                            <x-admin.button :class="'btn-icon me-1'"
                                                                                :small="''" :light="''"
                                                                                :color="'dark'" :iconTag="'i'"
                                                                                :iconClass="'fs-4'" :iconType="'outline'"
                                                                                :iconName="'arrow-up-down'" :data="[
                                                                                    'kt-menu-trigger' => 'click',
                                                                                    'kt-menu-placement' => 'bottom-end',
                                                                                    'kt-menu-overflow' => 'true',
                                                                                ]" />
                                                                            <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'"
                                                                                :action="route(
                                                                                    'menus.destroy',
                                                                                    $sub_menu->id,
                                                                                )" :method="'POST'">
                                                                                <x-slot:form>
                                                                                    @method('DELETE')
                                                                                    <x-admin.button :type="'submit'"
                                                                                        :class="'btn-icon me-1'" :small="''"
                                                                                        :light="''" :color="'danger'"
                                                                                        :iconTag="'i'" :iconClass="'fs-1'"
                                                                                        :iconType="'outline'" :iconName="'trash'" />
                                                                                </x-slot:form>
                                                                            </x-admin.form>
                                                                            <x-admin.button :class="'btn-icon '"
                                                                                :small="''" :light="''"
                                                                                :color="'primary'" :iconTag="'i'"
                                                                                :iconClass="'fs-1'" :iconType="'outline'"
                                                                                :iconName="'message-edit'" :data="[
                                                                                    'kt-menu-trigger' => 'click',
                                                                                    'kt-menu-placement' => 'bottom-end',
                                                                                    'kt-menu-overflow' => 'true',
                                                                                    'bs-toggle' => 'modal',
                                                                                    'bs-target' => '#menu' . $sub_menu->id,
                                                                                ]" />
                                                                            <!---Menü Güncelle Modal--->
                                                                            <x-admin.modal :xl="''" :id="'menu' . $sub_menu->id"
                                                                                :modalTitle="'Menü Güncelle'" :headerNotBorder="''"
                                                                                :titleCenter="''" :footerClass="'justify-content-center'"
                                                                                :footerNotBorder="''">
                                                                                <x-slot:modalBody>
                                                                                    <x-admin.form :id="'kt_ecommerce_add_product_form'"
                                                                                        :action="route(
                                                                                            'menus.update',
                                                                                            $sub_menu->id,
                                                                                        )" :method="'POST'">
                                                                                        <x-slot:form>
                                                                                            @method('PUT')
                                                                                            @if ($sub_menu->type == 'content')
                                                                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'"
                                                                                                    :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                                    <x-slot:cardHeader>
                                                                                                        <div
                                                                                                            class="card-title m-0">
                                                                                                            <h2>İçerik Menü</h2>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="card-toolbar">
                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                                :tabNavs="'true'"
                                                                                                                :tabItem="[
                                                                                                                    'kt_tab_pane_tr_' .
                                                                                                                    $sub_menu->id => 'Türkçe',
                                                                                                                    'kt_tab_pane_en_' .
                                                                                                                    $sub_menu->id => 'İngilizce',
                                                                                                                    'kt_tab_pane_ar_' .
                                                                                                                    $sub_menu->id => 'Arapça',
                                                                                                                ]">
                                                                                                            </x-admin.tab>
                                                                                                        </div>
                                                                                                    </x-slot:cardHeader>
                                                                                                    <x-slot:cardBody>
                                                                                                        <x-admin.form
                                                                                                            :action="route(
                                                                                                                'menus.update',
                                                                                                                $sub_menu->id,
                                                                                                            )"
                                                                                                            :method="'POST'">
                                                                                                            <x-slot:form>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsContentId="'myTabContent'"
                                                                                                                    :tabsType1="'true'">
                                                                                                                    <x-slot:tabsContent>
                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_tr_' .
                                                                                                                                $sub_menu->id"
                                                                                                                            :tabPaneClass="'show active'">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :type="'hidden'"
                                                                                                                                            :name="'type'"
                                                                                                                                            :value="'content'" />
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:tr'"
                                                                                                                                            :value="$sub_menu->{'name:tr'}" />
                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'il'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'İçerik Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'İçerik Seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'content:tr'">
                                                                                                                                            <x-slot:customOptions>
                                                                                                                                                <option
                                                                                                                                                    value="">
                                                                                                                                                </option>
                                                                                                                                                @foreach ($pages as $page)
                                                                                                                                                    <option
                                                                                                                                                        @if ($page->id == $sub_menu->{'content:tr'}) selected @endif
                                                                                                                                                        value="{{ $page->id }}">
                                                                                                                                                        {{ $page->name }}
                                                                                                                                                    </option>
                                                                                                                                                @endforeach
                                                                                                                                            </x-slot:customOptions>
                                                                                                                                        </x-admin.form-select>
                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'ilce'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Üst Menü Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :defaultValue="$sub_menu->parent"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'Üst Menü Seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'parent'"
                                                                                                                                            :options="[
                                                                                                                                                '1' =>
                                                                                                                                                    'Header Menü',
                                                                                                                                                '2' =>
                                                                                                                                                    'Footer Menü 1',
                                                                                                                                                '3' =>
                                                                                                                                                    'Footer Menü 2',
                                                                                                                                                '4' =>
                                                                                                                                                    'Footer Menü 3',
                                                                                                                                                '5' =>
                                                                                                                                                    'Footer Menü 4',
                                                                                                                                                '6' =>
                                                                                                                                                    'Footer Menü 5',
                                                                                                                                                '7' =>
                                                                                                                                                    'Footer Menü 6',
                                                                                                                                            ]" />
                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'ilce'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Alt Menü Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'Alt Menü Seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'child'">
                                                                                                                                            <x-slot:customOptions>
                                                                                                                                                <option
                                                                                                                                                    value="">
                                                                                                                                                </option>
                                                                                                                                                @foreach ($menus as $menu_)
                                                                                                                                                    <option
                                                                                                                                                        @if ($menu_->id == $sub_menu->child) selected @endif
                                                                                                                                                        value="{{ $menu_->id }}">
                                                                                                                                                        {{ $menu_->{'name:tr'} }}
                                                                                                                                                    </option>
                                                                                                                                                @endforeach
                                                                                                                                            </x-slot:customOptions>
                                                                                                                                        </x-admin.form-select>
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>

                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_en_' .
                                                                                                                                $sub_menu->id">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:en'"
                                                                                                                                            :value="$sub_menu->{'name:en'}" />

                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'il'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'İçerik Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'İçerik seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'content:en'">
                                                                                                                                            <x-slot:customOptions>
                                                                                                                                                <option
                                                                                                                                                    value="">
                                                                                                                                                </option>
                                                                                                                                                @foreach ($pages as $page)
                                                                                                                                                    <option
                                                                                                                                                        @if ($page->id == $sub_menu->{'content:en'}) selected @endif
                                                                                                                                                        value="{{ $page->id }}">
                                                                                                                                                        {{ $page->name }}
                                                                                                                                                    </option>
                                                                                                                                                @endforeach
                                                                                                                                            </x-slot:customOptions>
                                                                                                                                        </x-admin.form-select>
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>

                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_ar_' .
                                                                                                                                $sub_menu->id">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:en'"
                                                                                                                                            :value="$sub_menu->{'name:ar'}" />

                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'il'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'İçerik Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'İçerik seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'content:ar'">
                                                                                                                                            <x-slot:customOptions>
                                                                                                                                                <option
                                                                                                                                                    value="">
                                                                                                                                                </option>
                                                                                                                                                @foreach ($pages as $page)
                                                                                                                                                    <option
                                                                                                                                                        @if ($page->id == $sub_menu->{'content:ar'}) selected @endif
                                                                                                                                                        value="{{ $page->id }}">
                                                                                                                                                        {{ $page->name }}
                                                                                                                                                    </option>
                                                                                                                                                @endforeach
                                                                                                                                            </x-slot:customOptions>
                                                                                                                                        </x-admin.form-select>
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>
                                                                                                                    </x-slot:tabsContent>
                                                                                                                </x-admin.tab>

                                                                                                                <x-admin.button
                                                                                                                    :type="'submit'"
                                                                                                                    :buttonParentClass="'col-6 mt-2'"
                                                                                                                    :title="'Güncelle'"
                                                                                                                    :class="''"
                                                                                                                    :color="'primary'"
                                                                                                                    :iconTag="'i'"
                                                                                                                    :iconClass="'fs-1'"
                                                                                                                    :iconType="'outline'"
                                                                                                                    :iconName="'abstract-45'" />
                                                                                                            </x-slot:form>
                                                                                                        </x-admin.form>
                                                                                                    </x-slot:cardBody>
                                                                                                </x-admin.card>
                                                                                            @else
                                                                                                <x-admin.card
                                                                                                    :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'"
                                                                                                    :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                                    <x-slot:cardHeader>
                                                                                                        <div
                                                                                                            class="card-title m-0">
                                                                                                            <h2>Bağlantı Menü
                                                                                                            </h2>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="card-toolbar">
                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                                :tabNavs="'true'"
                                                                                                                :tabItem="[
                                                                                                                    'kt_tab_pane_tr_'.$sub_menu->id =>
                                                                                                                        'Türkçe',
                                                                                                                    'kt_tab_pane_en_'.$sub_menu->id =>
                                                                                                                        'İngilizce',
                                                                                                                    'kt_tab_pane_ar_'.$sub_menu->id =>
                                                                                                                        'Arapça',
                                                                                                                ]">
                                                                                                            </x-admin.tab>
                                                                                                        </div>
                                                                                                    </x-slot:cardHeader>
                                                                                                    <x-slot:cardBody>
                                                                                                        <x-admin.form
                                                                                                            :action="route(
                                                                                                                'menus.update', $sub_menu->id
                                                                                                            )"
                                                                                                            :method="'POST'">
                                                                                                            <x-slot:form>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsContentId="'myTabContent'"
                                                                                                                    :tabsType1="'true'">
                                                                                                                    <x-slot:tabsContent>
                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_tr_'.$sub_menu->id"
                                                                                                                            :tabPaneClass="'show active'">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :type="'hidden'"
                                                                                                                                    :name="'type'"
                                                                                                                                    :value="'url'" />
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:tr'"
                                                                                                                                            :value="$sub_menu->{'name:tr'}" />

                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Link URL'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Url'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'content'"
                                                                                                                                            :value="$sub_menu->{'content:tr'}" />

                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'ilce'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Üst Menü Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :defaultValue="$sub_menu->parent"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'Üst Menü Seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'parent'"
                                                                                                                                            :options="[
                                                                                                                                                '1' =>
                                                                                                                                                    'Header Menü',
                                                                                                                                                '2' =>
                                                                                                                                                    'Footer Menü 1',
                                                                                                                                                '3' =>
                                                                                                                                                    'Footer Menü 2',
                                                                                                                                                '4' =>
                                                                                                                                                    'Footer Menü 3',
                                                                                                                                                '5' =>
                                                                                                                                                    'Footer Menü 4',
                                                                                                                                                '6' =>
                                                                                                                                                    'Footer Menü 5',
                                                                                                                                                '7' =>
                                                                                                                                                    'Footer Menü 6',
                                                                                                                                            ]" />
                                                                                                                                        <x-admin.form-select
                                                                                                                                            :inputParentClass="'col-6'"
                                                                                                                                            :id="'ilce'"
                                                                                                                                            :class="'mb-2'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Alt Menü Seçiniz'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :data="[
                                                                                                                                                'hide-search' =>
                                                                                                                                                    'true',
                                                                                                                                                'control' =>
                                                                                                                                                    'select2',
                                                                                                                                                'placeholder' =>
                                                                                                                                                    'Alt Menü Seçiniz',
                                                                                                                                            ]"
                                                                                                                                            :name="'child'" >

                                                                                                                                            <x-slot:customOptions>
                                                                                                                                                <option
                                                                                                                                                    value="">
                                                                                                                                                </option>
                                                                                                                                                @foreach ($menus as $menu_)
                                                                                                                                                    <option
                                                                                                                                                    @if ($menu_->id == $sub_menu->child) selected @endif
                                                                                                                                                        value="{{ $menu_->id }}">
                                                                                                                                                        {{ $menu_->{'name:tr'} }}
                                                                                                                                                    </option>
                                                                                                                                                @endforeach
                                                                                                                                            </x-slot:customOptions>
                                                                                                                                        </x-admin.form-select>
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>
                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_en_'.$sub_menu->id">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:en'"
                                                                                                                                            :value="$sub_menu->{'name:en'}" />

                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Link URL'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Url'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'content:en'"
                                                                                                                                            :value="$sub_menu->{'content:en'}" />
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>
                                                                                                                        <x-admin.tab
                                                                                                                            :tabsType1="'true'"
                                                                                                                            :tabId="'kt_tab_pane_ar_'.$sub_menu->id">
                                                                                                                            <x-slot:tabContent>
                                                                                                                                <x-admin.custom-grid>
                                                                                                                                    <x-slot:gridRow>
                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Menü Adı'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Menü Adı'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'name:en'"
                                                                                                                                            :value="$sub_menu->{'name:ar'}" />

                                                                                                                                        <x-admin.form-input
                                                                                                                                            :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                            :labelTag="'label'"
                                                                                                                                            :labelText="'Link URL'"
                                                                                                                                            :labelClass="'form-label'"
                                                                                                                                            :placeholder="'Url'"
                                                                                                                                            :class="'form-control'"
                                                                                                                                            :name="'content:ar'"
                                                                                                                                            :value="$sub_menu->{'content:ar'}" />
                                                                                                                                    </x-slot:gridRow>
                                                                                                                                </x-admin.custom-grid>
                                                                                                                            </x-slot:tabContent>
                                                                                                                        </x-admin.tab>
                                                                                                                    </x-slot:tabsContent>
                                                                                                                </x-admin.tab>

                                                                                                                <x-admin.button
                                                                                                                    :buttonParentClass="'col-6 mt-2'"
                                                                                                                    :title="'Güncelle'"
                                                                                                                    :class="''"
                                                                                                                    :color="'primary'"
                                                                                                                    :iconTag="'i'"
                                                                                                                    :iconClass="'fs-1'"
                                                                                                                    :iconType="'outline'"
                                                                                                                    :iconName="'abstract-45'" />
                                                                                                            </x-slot:form>
                                                                                                        </x-admin.form>
                                                                                                    </x-slot:cardBody>
                                                                                                </x-admin.card>
                                                                                            @endif
                                                                                        </x-slot:form>
                                                                                    </x-admin.form>
                                                                                </x-slot:modalBody>
                                                                            </x-admin.modal>
                                                                        </x-slot:menuButton>
                                                                    </x-admin.menu-item>
                                                                @endforeach
                                                            </x-slot:subMenu>
                                                            <x-slot:arrow></x-slot:arrow>
                                                        </x-admin.menu-item>
                                                    @elseif($menu->parent && $menu->parent == $i && $menu->child == '' && $isClick == false)
                                                        <x-admin.menu-item :notIcon="''" :class="'ms-0 border-bottom-dashed border-gray-300 ps-0 fs-5 text-gray-500 fw-medium'"
                                                            :linkClass="'px-0 fs-5 text-gray-500 fw-regular'" :menuItemRoot="'home'" :title="$menu->name">
                                                            <x-slot:menuButton>
                                                                <x-admin.button :class="'btn-icon me-1'" :small="''"
                                                                    :light="''" :color="'dark'" :iconTag="'i'"
                                                                    :iconClass="'fs-4'" :iconType="'outline'" :iconName="'arrow-up-down'"
                                                                    :data="[
                                                                        'kt-menu-trigger' => 'click',
                                                                        'kt-menu-placement' => 'bottom-end',
                                                                        'kt-menu-overflow' => 'true',
                                                                    ]" />
                                                                <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'"
                                                                    :action="route('menus.destroy', $menu->id)" :method="'POST'">
                                                                    <x-slot:form>
                                                                        @method('DELETE')
                                                                        <x-admin.button :type="'submit'" :class="'btn-icon me-1'"
                                                                            :small="''" :light="''"
                                                                            :color="'danger'" :iconTag="'i'"
                                                                            :iconClass="'fs-1'" :iconType="'outline'"
                                                                            :iconName="'trash'" />
                                                                    </x-slot:form>
                                                                </x-admin.form>
                                                                <x-admin.button :class="'btn-icon '" :small="''"
                                                                    :light="''" :color="'primary'" :iconTag="'i'"
                                                                    :iconClass="'fs-1'" :iconType="'outline'" :iconName="'message-edit'"
                                                                    :data="[
                                                                        'kt-menu-trigger' => 'click',
                                                                        'kt-menu-placement' => 'bottom-end',
                                                                        'kt-menu-overflow' => 'true',
                                                                        'bs-toggle' => 'modal',
                                                                        'bs-target' => '#menu' . $menu->id,
                                                                    ]" />

                                                                    <!---Menü Güncelle Modal--->
                                                                    <x-admin.modal :xl="''" :id="'menu' . $menu->id"
                                                                        :modalTitle="'Menü Güncelle'" :headerNotBorder="''"
                                                                        :titleCenter="''" :footerClass="'justify-content-center'"
                                                                        :footerNotBorder="''">
                                                                        <x-slot:modalBody>
                                                                            <x-admin.form :id="'kt_ecommerce_add_product_form'"
                                                                                :action="route(
                                                                                    'menus.update',
                                                                                    $menu->id,
                                                                                )" :method="'POST'">
                                                                                <x-slot:form>
                                                                                    @method('PUT')
                                                                                    @if ($menu->type == 'content')
                                                                                        <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'"
                                                                                            :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                            <x-slot:cardHeader>
                                                                                                <div
                                                                                                    class="card-title m-0">
                                                                                                    <h2>İçerik Menü</h2>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="card-toolbar">
                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                        :tabNavs="'true'"
                                                                                                        :tabItem="[
                                                                                                            'kt_tab_pane_tr_' .
                                                                                                            $menu->id => 'Türkçe',
                                                                                                            'kt_tab_pane_en_' .
                                                                                                            $menu->id => 'İngilizce',
                                                                                                            'kt_tab_pane_en_' .
                                                                                                            $menu->id => 'Arapça',
                                                                                                        ]">
                                                                                                    </x-admin.tab>
                                                                                                </div>
                                                                                            </x-slot:cardHeader>
                                                                                            <x-slot:cardBody>
                                                                                                <x-admin.form
                                                                                                    :action="route(
                                                                                                        'menus.update',
                                                                                                        $menu->id,
                                                                                                    )"
                                                                                                    :method="'POST'">
                                                                                                    <x-slot:form>
                                                                                                        <x-admin.tab
                                                                                                            :tabsContentId="'myTabContent'"
                                                                                                            :tabsType1="'true'">
                                                                                                            <x-slot:tabsContent>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_tr_' .
                                                                                                                        $menu->id"
                                                                                                                    :tabPaneClass="'show active'">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :type="'hidden'"
                                                                                                                                    :name="'type'"
                                                                                                                                    :value="'content'" />
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:tr'"
                                                                                                                                    :value="$menu->{'name:tr'}" />
                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'il'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'İçerik Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'İçerik Seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'content:tr'">
                                                                                                                                    <x-slot:customOptions>
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                        </option>
                                                                                                                                        @foreach ($pages as $page)
                                                                                                                                            <option
                                                                                                                                                @if ($page->id == $menu->{'content:tr'}) selected @endif
                                                                                                                                                value="{{ $page->id }}">
                                                                                                                                                {{ $page->name }}
                                                                                                                                            </option>
                                                                                                                                        @endforeach
                                                                                                                                    </x-slot:customOptions>
                                                                                                                                </x-admin.form-select>
                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'ilce'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Üst Menü Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :defaultValue="$menu->parent"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'Üst Menü Seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'parent'"
                                                                                                                                    :options="[
                                                                                                                                        '1' =>
                                                                                                                                            'Header Menü',
                                                                                                                                        '2' =>
                                                                                                                                            'Footer Menü 1',
                                                                                                                                        '3' =>
                                                                                                                                            'Footer Menü 2',
                                                                                                                                        '4' =>
                                                                                                                                            'Footer Menü 3',
                                                                                                                                        '5' =>
                                                                                                                                            'Footer Menü 4',
                                                                                                                                        '6' =>
                                                                                                                                            'Footer Menü 5',
                                                                                                                                        '7' =>
                                                                                                                                            'Footer Menü 6',
                                                                                                                                    ]" />
                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'ilce'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Alt Menü Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'Alt Menü Seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'child'">
                                                                                                                                    <x-slot:customOptions>
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                        </option>
                                                                                                                                        @foreach ($menus as $menu_)
                                                                                                                                            <option
                                                                                                                                                @if ($menu_->id == $menu->child) selected @endif
                                                                                                                                                value="{{ $menu_->id }}">
                                                                                                                                                {{ $menu_->{'name:tr'} }}
                                                                                                                                            </option>
                                                                                                                                        @endforeach
                                                                                                                                    </x-slot:customOptions>
                                                                                                                                </x-admin.form-select>
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>

                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_en_' .
                                                                                                                        $menu->id">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:en'"
                                                                                                                                    :value="$menu->{'name:en'}" />

                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'il'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'İçerik Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'İçerik seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'content:en'">
                                                                                                                                    <x-slot:customOptions>
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                        </option>
                                                                                                                                        @foreach ($pages as $page)
                                                                                                                                            <option
                                                                                                                                                @if ($page->id == $menu->{'content:en'}) selected @endif
                                                                                                                                                value="{{ $page->id }}">
                                                                                                                                                {{ $page->name }}
                                                                                                                                            </option>
                                                                                                                                        @endforeach
                                                                                                                                    </x-slot:customOptions>
                                                                                                                                </x-admin.form-select>
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>

                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_ar_' .
                                                                                                                        $menu->id">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:ar'"
                                                                                                                                    :value="$menu->{'name:ar'}" />

                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'il'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'İçerik Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'İçerik seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'content:ar'">
                                                                                                                                    <x-slot:customOptions>
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                        </option>
                                                                                                                                        @foreach ($pages as $page)
                                                                                                                                            <option
                                                                                                                                                @if ($page->id == $menu->{'content:ar'}) selected @endif
                                                                                                                                                value="{{ $page->id }}">
                                                                                                                                                {{ $page->name }}
                                                                                                                                            </option>
                                                                                                                                        @endforeach
                                                                                                                                    </x-slot:customOptions>
                                                                                                                                </x-admin.form-select>
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>
                                                                                                            </x-slot:tabsContent>
                                                                                                        </x-admin.tab>

                                                                                                        <x-admin.button
                                                                                                            :type="'submit'"
                                                                                                            :buttonParentClass="'col-6 mt-2'"
                                                                                                            :title="'Güncelle'"
                                                                                                            :class="''"
                                                                                                            :color="'primary'"
                                                                                                            :iconTag="'i'"
                                                                                                            :iconClass="'fs-1'"
                                                                                                            :iconType="'outline'"
                                                                                                            :iconName="'abstract-45'" />
                                                                                                    </x-slot:form>
                                                                                                </x-admin.form>
                                                                                            </x-slot:cardBody>
                                                                                        </x-admin.card>
                                                                                    @else
                                                                                        <x-admin.card
                                                                                            :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'"
                                                                                            :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                            <x-slot:cardHeader>
                                                                                                <div
                                                                                                    class="card-title m-0">
                                                                                                    <h2>Bağlantı Menü
                                                                                                    </h2>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="card-toolbar">
                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                        :tabNavs="'true'"
                                                                                                        :tabItem="[
                                                                                                            'kt_tab_pane_tr_'.$menu->id =>
                                                                                                                'Türkçe',
                                                                                                            'kt_tab_pane_en_'.$menu->id =>
                                                                                                                'İngilizce',
                                                                                                            'kt_tab_pane_ar_'.$menu->id =>
                                                                                                                'Arapça',
                                                                                                        ]">
                                                                                                    </x-admin.tab>
                                                                                                </div>
                                                                                            </x-slot:cardHeader>
                                                                                            <x-slot:cardBody>
                                                                                                <x-admin.form
                                                                                                    :action="route(
                                                                                                        'menus.update', $menu->id
                                                                                                    )"
                                                                                                    :method="'POST'">
                                                                                                    <x-slot:form>
                                                                                                        <x-admin.tab
                                                                                                            :tabsContentId="'myTabContent'"
                                                                                                            :tabsType1="'true'">
                                                                                                            <x-slot:tabsContent>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_tr_'.$menu->id"
                                                                                                                    :tabPaneClass="'show active'">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.form-input
                                                                                                                            :type="'hidden'"
                                                                                                                            :name="'type'"
                                                                                                                            :value="'url'" />
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:tr'"
                                                                                                                                    :value="$menu->{'name:tr'}" />

                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Link URL'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Url'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'content:tr'"
                                                                                                                                    :value="$menu->{'content:tr'}" />

                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'ilce'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Üst Menü Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :defaultValue="$menu->parent"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'Üst Menü Seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'parent'"
                                                                                                                                    :options="[
                                                                                                                                        '1' =>
                                                                                                                                            'Header Menü',
                                                                                                                                        '2' =>
                                                                                                                                            'Footer Menü 1',
                                                                                                                                        '3' =>
                                                                                                                                            'Footer Menü 2',
                                                                                                                                        '4' =>
                                                                                                                                            'Footer Menü 3',
                                                                                                                                        '5' =>
                                                                                                                                            'Footer Menü 4',
                                                                                                                                        '6' =>
                                                                                                                                            'Footer Menü 5',
                                                                                                                                        '7' =>
                                                                                                                                            'Footer Menü 6',
                                                                                                                                    ]" />
                                                                                                                                <x-admin.form-select
                                                                                                                                    :inputParentClass="'col-6'"
                                                                                                                                    :id="'ilce'"
                                                                                                                                    :class="'mb-2'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Alt Menü Seçiniz'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :data="[
                                                                                                                                        'hide-search' =>
                                                                                                                                            'true',
                                                                                                                                        'control' =>
                                                                                                                                            'select2',
                                                                                                                                        'placeholder' =>
                                                                                                                                            'Alt Menü Seçiniz',
                                                                                                                                    ]"
                                                                                                                                    :name="'child'" >

                                                                                                                                    <x-slot:customOptions>
                                                                                                                                        <option
                                                                                                                                            value="">
                                                                                                                                        </option>
                                                                                                                                        @foreach ($menus as $menu_)
                                                                                                                                            <option
                                                                                                                                            @if ($menu_->id == $menu->child) selected @endif
                                                                                                                                                value="{{ $menu_->id }}">
                                                                                                                                                {{ $menu_->{'name:tr'} }}
                                                                                                                                            </option>
                                                                                                                                        @endforeach
                                                                                                                                    </x-slot:customOptions>
                                                                                                                                </x-admin.form-select>
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_en_'.$menu->id">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:en'"
                                                                                                                                    :value="$menu->{'name:en'}" />

                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Link URL'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Url'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'content:en'"
                                                                                                                                    :value="$menu->{'content:en'}" />
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>
                                                                                                                <x-admin.tab
                                                                                                                    :tabsType1="'true'"
                                                                                                                    :tabId="'kt_tab_pane_ar_'.$menu->id">
                                                                                                                    <x-slot:tabContent>
                                                                                                                        <x-admin.custom-grid>
                                                                                                                            <x-slot:gridRow>
                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Menü Adı'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Menü Adı'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'name:ar'"
                                                                                                                                    :value="$menu->{'name:ar'}" />

                                                                                                                                <x-admin.form-input
                                                                                                                                    :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                    :labelTag="'label'"
                                                                                                                                    :labelText="'Link URL'"
                                                                                                                                    :labelClass="'form-label'"
                                                                                                                                    :placeholder="'Url'"
                                                                                                                                    :class="'form-control'"
                                                                                                                                    :name="'content:ar'"
                                                                                                                                    :value="$menu->{'content:ar'}" />
                                                                                                                            </x-slot:gridRow>
                                                                                                                        </x-admin.custom-grid>
                                                                                                                    </x-slot:tabContent>
                                                                                                                </x-admin.tab>
                                                                                                            </x-slot:tabsContent>
                                                                                                        </x-admin.tab>

                                                                                                        <x-admin.button
                                                                                                            :buttonParentClass="'col-6 mt-2'"
                                                                                                            :title="'Güncelle'"
                                                                                                            :class="''"
                                                                                                            :color="'primary'"
                                                                                                            :iconTag="'i'"
                                                                                                            :iconClass="'fs-1'"
                                                                                                            :iconType="'outline'"
                                                                                                            :iconName="'abstract-45'" />
                                                                                                    </x-slot:form>
                                                                                                </x-admin.form>
                                                                                            </x-slot:cardBody>
                                                                                        </x-admin.card>
                                                                                    @endif
                                                                                </x-slot:form>
                                                                            </x-admin.form>
                                                                        </x-slot:modalBody>
                                                                    </x-admin.modal>
                                                            </x-slot:menuButton>
                                                        </x-admin.menu-item>
                                                    @endif
                                                @endforeach
                                            </x-slot:subMenu>
                                        </x-admin.menu-item>
                                    @endfor
                                    @foreach ($menus as $menu)
                                        @php
                                            $isClick = false;
                                        @endphp
                                        @foreach ($menus->where('child', $menu->id) as $sub)
                                            @php
                                                $isClick = true;
                                            @endphp
                                        @endforeach
                                        @if ($menu->parent == NULL && $menu->child == '' && $isClick)
                                            <x-admin.menu-item :notIcon="''" :class="'ms-0 border-bottom-dashed border-gray-300 ps-0 fs-5 text-gray-500 fw-medium menu-title'"
                                                :linkClass="'px-0 fs-5 text-gray-500 fw-regular'" :data-kt-menu-trigger="'click'" :menuItemRoot="'home'"
                                                :title="$menu->name">
                                                <x-slot:subMenu>
                                                    @foreach ($menus->where('child', $menu->id) as $sub_menu)
                                                        <x-admin.menu-item :notIcon="''" :linkClass="'px-0 fs-5 text-gray-500 fw-regular'"
                                                            :title="$sub_menu->name" :menuItemRoot="'home'">
                                                            <x-slot:menuButton>
                                                                <x-admin.button :class="'btn-icon me-1'"
                                                                    :small="''" :light="''"
                                                                    :color="'dark'" :iconTag="'i'"
                                                                    :iconClass="'fs-4'" :iconType="'outline'"
                                                                    :iconName="'arrow-up-down'" :data="[
                                                                        'kt-menu-trigger' => 'click',
                                                                        'kt-menu-placement' => 'bottom-end',
                                                                        'kt-menu-overflow' => 'true',
                                                                    ]" />
                                                                <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'"
                                                                    :action="route(
                                                                        'menus.destroy',
                                                                        $sub_menu->id,
                                                                    )" :method="'POST'">
                                                                    <x-slot:form>
                                                                        @method('DELETE')
                                                                        <x-admin.button :type="'submit'"
                                                                            :class="'btn-icon me-1'" :small="''"
                                                                            :light="''" :color="'danger'"
                                                                            :iconTag="'i'" :iconClass="'fs-1'"
                                                                            :iconType="'outline'" :iconName="'trash'" />
                                                                    </x-slot:form>
                                                                </x-admin.form>
                                                                <x-admin.button :class="'btn-icon '"
                                                                    :small="''" :light="''"
                                                                    :color="'primary'" :iconTag="'i'"
                                                                    :iconClass="'fs-1'" :iconType="'outline'"
                                                                    :iconName="'message-edit'" :data="[
                                                                        'kt-menu-trigger' => 'click',
                                                                        'kt-menu-placement' => 'bottom-end',
                                                                        'kt-menu-overflow' => 'true',
                                                                        'bs-toggle' => 'modal',
                                                                        'bs-target' => '#menu' . $sub_menu->id,
                                                                    ]" />
                                                                <!---Menü Güncelle Modal--->
                                                                <x-admin.modal :xl="''" :id="'menu' . $sub_menu->id"
                                                                    :modalTitle="'Menü Güncelle'" :headerNotBorder="''"
                                                                    :titleCenter="''" :footerClass="'justify-content-center'"
                                                                    :footerNotBorder="''">
                                                                    <x-slot:modalBody>
                                                                        <x-admin.form :id="'kt_ecommerce_add_product_form'"
                                                                            :action="route(
                                                                                'menus.update',
                                                                                $sub_menu->id,
                                                                            )" :method="'POST'">
                                                                            <x-slot:form>
                                                                                @method('PUT')
                                                                                @if ($sub_menu->type == 'content')
                                                                                    <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'"
                                                                                        :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                        <x-slot:cardHeader>
                                                                                            <div
                                                                                                class="card-title m-0">
                                                                                                <h2>İçerik Menü</h2>
                                                                                            </div>
                                                                                            <div
                                                                                                class="card-toolbar">
                                                                                                <x-admin.tab
                                                                                                    :tabsType1="'true'"
                                                                                                    :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                    :tabNavs="'true'"
                                                                                                    :tabItem="[
                                                                                                        'kt_tab_pane_tr_' .
                                                                                                        $sub_menu->id => 'Türkçe',
                                                                                                        'kt_tab_pane_en_' .
                                                                                                        $sub_menu->id => 'İngilizce',
                                                                                                    ]">
                                                                                                </x-admin.tab>
                                                                                            </div>
                                                                                        </x-slot:cardHeader>
                                                                                        <x-slot:cardBody>
                                                                                            <x-admin.form
                                                                                                :action="route(
                                                                                                    'menus.update',
                                                                                                    $sub_menu->id,
                                                                                                )"
                                                                                                :method="'POST'">
                                                                                                <x-slot:form>
                                                                                                    <x-admin.tab
                                                                                                        :tabsContentId="'myTabContent'"
                                                                                                        :tabsType1="'true'">
                                                                                                        <x-slot:tabsContent>
                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :tabId="'kt_tab_pane_tr_' .
                                                                                                                    $sub_menu->id"
                                                                                                                :tabPaneClass="'show active'">
                                                                                                                <x-slot:tabContent>
                                                                                                                    <x-admin.custom-grid>
                                                                                                                        <x-slot:gridRow>
                                                                                                                            <x-admin.form-input
                                                                                                                                :type="'hidden'"
                                                                                                                                :name="'type'"
                                                                                                                                :value="'content'" />
                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Menü Adı'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Menü Adı'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'name:tr'"
                                                                                                                                :value="$sub_menu->{'name:tr'}" />
                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'il'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'İçerik Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'İçerik Seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'content:tr'">
                                                                                                                                <x-slot:customOptions>
                                                                                                                                    <option
                                                                                                                                        value="">
                                                                                                                                    </option>
                                                                                                                                    @foreach ($pages as $page)
                                                                                                                                        <option
                                                                                                                                            @if ($page->id == $sub_menu->{'content:tr'}) selected @endif
                                                                                                                                            value="{{ $page->id }}">
                                                                                                                                            {{ $page->name }}
                                                                                                                                        </option>
                                                                                                                                    @endforeach
                                                                                                                                </x-slot:customOptions>
                                                                                                                            </x-admin.form-select>
                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'ilce'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Üst Menü Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :defaultValue="$sub_menu->parent"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'Üst Menü Seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'parent'"
                                                                                                                                :options="[
                                                                                                                                    '1' =>
                                                                                                                                        'Header Menü',
                                                                                                                                    '2' =>
                                                                                                                                        'Footer Menü 1',
                                                                                                                                    '3' =>
                                                                                                                                        'Footer Menü 2',
                                                                                                                                    '4' =>
                                                                                                                                        'Footer Menü 3',
                                                                                                                                    '5' =>
                                                                                                                                        'Footer Menü 4',
                                                                                                                                    '6' =>
                                                                                                                                        'Footer Menü 5',
                                                                                                                                    '7' =>
                                                                                                                                        'Footer Menü 6',
                                                                                                                                ]" />
                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'ilce'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Alt Menü Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'Alt Menü Seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'child'">
                                                                                                                                <x-slot:customOptions>
                                                                                                                                    <option
                                                                                                                                        value="">
                                                                                                                                    </option>
                                                                                                                                    @foreach ($menus as $menu_)
                                                                                                                                        <option
                                                                                                                                            @if ($menu_->id == $sub_menu->child) selected @endif
                                                                                                                                            value="{{ $menu_->id }}">
                                                                                                                                            {{ $menu_->{'name:tr'} }}
                                                                                                                                        </option>
                                                                                                                                    @endforeach
                                                                                                                                </x-slot:customOptions>
                                                                                                                            </x-admin.form-select>
                                                                                                                        </x-slot:gridRow>
                                                                                                                    </x-admin.custom-grid>
                                                                                                                </x-slot:tabContent>
                                                                                                            </x-admin.tab>

                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :tabId="'kt_tab_pane_en_' .
                                                                                                                    $sub_menu->id">
                                                                                                                <x-slot:tabContent>
                                                                                                                    <x-admin.custom-grid>
                                                                                                                        <x-slot:gridRow>
                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Menü Adı'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Menü Adı'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'name:en'"
                                                                                                                                :value="$sub_menu->{'name:en'}" />

                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'il'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'İçerik Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'İçerik seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'content:en'">
                                                                                                                                <x-slot:customOptions>
                                                                                                                                    <option
                                                                                                                                        value="">
                                                                                                                                    </option>
                                                                                                                                    @foreach ($pages as $page)
                                                                                                                                        <option
                                                                                                                                            @if ($page->id == $sub_menu->{'content:en'}) selected @endif
                                                                                                                                            value="{{ $page->id }}">
                                                                                                                                            {{ $page->name }}
                                                                                                                                        </option>
                                                                                                                                    @endforeach
                                                                                                                                </x-slot:customOptions>
                                                                                                                            </x-admin.form-select>
                                                                                                                        </x-slot:gridRow>
                                                                                                                    </x-admin.custom-grid>
                                                                                                                </x-slot:tabContent>
                                                                                                            </x-admin.tab>
                                                                                                        </x-slot:tabsContent>
                                                                                                    </x-admin.tab>

                                                                                                    <x-admin.button
                                                                                                        :type="'submit'"
                                                                                                        :buttonParentClass="'col-6 mt-2'"
                                                                                                        :title="'Ekle'"
                                                                                                        :class="''"
                                                                                                        :color="'primary'"
                                                                                                        :iconTag="'i'"
                                                                                                        :iconClass="'fs-1'"
                                                                                                        :iconType="'outline'"
                                                                                                        :iconName="'abstract-45'" />
                                                                                                </x-slot:form>
                                                                                            </x-admin.form>
                                                                                        </x-slot:cardBody>
                                                                                    </x-admin.card>
                                                                                @else
                                                                                    <x-admin.card
                                                                                        :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'"
                                                                                        :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                        <x-slot:cardHeader>
                                                                                            <div
                                                                                                class="card-title m-0">
                                                                                                <h2>Bağlantı Menü
                                                                                                </h2>
                                                                                            </div>
                                                                                            <div
                                                                                                class="card-toolbar">
                                                                                                <x-admin.tab
                                                                                                    :tabsType1="'true'"
                                                                                                    :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                                    :tabNavs="'true'"
                                                                                                    :tabItem="[
                                                                                                        'kt_tab_pane_tr_'.$sub_menu->id =>
                                                                                                            'Türkçe',
                                                                                                        'kt_tab_pane_en_'.$sub_menu->id =>
                                                                                                            'İngilizce',
                                                                                                    ]">
                                                                                                </x-admin.tab>
                                                                                            </div>
                                                                                        </x-slot:cardHeader>
                                                                                        <x-slot:cardBody>
                                                                                            <x-admin.form
                                                                                                :action="route(
                                                                                                    'menus.update', $sub_menu->id
                                                                                                )"
                                                                                                :method="'POST'">
                                                                                                <x-slot:form>
                                                                                                    <x-admin.tab
                                                                                                        :tabsContentId="'myTabContent'"
                                                                                                        :tabsType1="'true'">
                                                                                                        <x-slot:tabsContent>
                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :tabId="'kt_tab_pane_tr_'.$sub_menu->id"
                                                                                                                :tabPaneClass="'show active'">
                                                                                                                <x-slot:tabContent>
                                                                                                                    <x-admin.form-input
                                                                                                                        :type="'hidden'"
                                                                                                                        :name="'type'"
                                                                                                                        :value="'url'" />
                                                                                                                    <x-admin.custom-grid>
                                                                                                                        <x-slot:gridRow>
                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Menü Adı'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Menü Adı'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'name:tr'"
                                                                                                                                :value="$sub_menu->{'name:tr'}" />

                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Link URL'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Url'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'content'"
                                                                                                                                :value="$sub_menu->{'content:tr'}" />

                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'ilce'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Üst Menü Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :defaultValue="$sub_menu->parent"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'Üst Menü Seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'parent'"
                                                                                                                                :options="[
                                                                                                                                    '1' =>
                                                                                                                                        'Header Menü',
                                                                                                                                    '2' =>
                                                                                                                                        'Footer Menü 1',
                                                                                                                                    '3' =>
                                                                                                                                        'Footer Menü 2',
                                                                                                                                    '4' =>
                                                                                                                                        'Footer Menü 3',
                                                                                                                                    '5' =>
                                                                                                                                        'Footer Menü 4',
                                                                                                                                    '6' =>
                                                                                                                                        'Footer Menü 5',
                                                                                                                                    '7' =>
                                                                                                                                        'Footer Menü 6',
                                                                                                                                ]" />
                                                                                                                            <x-admin.form-select
                                                                                                                                :inputParentClass="'col-6'"
                                                                                                                                :id="'ilce'"
                                                                                                                                :class="'mb-2'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Alt Menü Seçiniz'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :data="[
                                                                                                                                    'hide-search' =>
                                                                                                                                        'true',
                                                                                                                                    'control' =>
                                                                                                                                        'select2',
                                                                                                                                    'placeholder' =>
                                                                                                                                        'Alt Menü Seçiniz',
                                                                                                                                ]"
                                                                                                                                :name="'child'" >

                                                                                                                                <x-slot:customOptions>
                                                                                                                                    <option
                                                                                                                                        value="">
                                                                                                                                    </option>
                                                                                                                                    @foreach ($menus as $menu_)
                                                                                                                                        <option
                                                                                                                                        @if ($menu_->id == $sub_menu->child) selected @endif
                                                                                                                                            value="{{ $menu_->id }}">
                                                                                                                                            {{ $menu_->{'name:tr'} }}
                                                                                                                                        </option>
                                                                                                                                    @endforeach
                                                                                                                                </x-slot:customOptions>
                                                                                                                            </x-admin.form-select>
                                                                                                                        </x-slot:gridRow>
                                                                                                                    </x-admin.custom-grid>
                                                                                                                </x-slot:tabContent>
                                                                                                            </x-admin.tab>
                                                                                                            <x-admin.tab
                                                                                                                :tabsType1="'true'"
                                                                                                                :tabId="'kt_tab_pane_en_'.$sub_menu->id">
                                                                                                                <x-slot:tabContent>
                                                                                                                    <x-admin.custom-grid>
                                                                                                                        <x-slot:gridRow>
                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Menü Adı'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Menü Adı'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'name:en'"
                                                                                                                                :value="$sub_menu->{'name:en'}" />

                                                                                                                            <x-admin.form-input
                                                                                                                                :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                                :labelTag="'label'"
                                                                                                                                :labelText="'Link URL'"
                                                                                                                                :labelClass="'form-label'"
                                                                                                                                :placeholder="'Url'"
                                                                                                                                :class="'form-control'"
                                                                                                                                :name="'content:en'"
                                                                                                                                :value="$sub_menu->{'content:en'}" />
                                                                                                                        </x-slot:gridRow>
                                                                                                                    </x-admin.custom-grid>
                                                                                                                </x-slot:tabContent>
                                                                                                            </x-admin.tab>
                                                                                                        </x-slot:tabsContent>
                                                                                                    </x-admin.tab>

                                                                                                    <x-admin.button
                                                                                                        :buttonParentClass="'col-6 mt-2'"
                                                                                                        :title="'Ekle'"
                                                                                                        :class="''"
                                                                                                        :color="'primary'"
                                                                                                        :iconTag="'i'"
                                                                                                        :iconClass="'fs-1'"
                                                                                                        :iconType="'outline'"
                                                                                                        :iconName="'abstract-45'" />
                                                                                                </x-slot:form>
                                                                                            </x-admin.form>
                                                                                        </x-slot:cardBody>
                                                                                    </x-admin.card>
                                                                                @endif
                                                                            </x-slot:form>
                                                                        </x-admin.form>
                                                                    </x-slot:modalBody>
                                                                </x-admin.modal>
                                                            </x-slot:menuButton>
                                                        </x-admin.menu-item>
                                                    @endforeach
                                                </x-slot:subMenu>
                                                <x-slot:arrow></x-slot:arrow>
                                            </x-admin.menu-item>
                                        @elseif($menu->parent == NULL && $menu->child == '' && $isClick == false)
                                            <x-admin.menu-item :notIcon="''" :class="'ms-0 border-bottom-dashed border-gray-300 ps-0 fs-5 text-gray-500 fw-medium'"
                                                :linkClass="'px-0 fs-5 text-gray-500 fw-regular'" :menuItemRoot="'home'" :title="$menu->name">
                                                <x-slot:menuButton>
                                                    <x-admin.button :class="'btn-icon me-1'" :small="''"
                                                        :light="''" :color="'dark'" :iconTag="'i'"
                                                        :iconClass="'fs-4'" :iconType="'outline'" :iconName="'arrow-up-down'"
                                                        :data="[
                                                            'kt-menu-trigger' => 'click',
                                                            'kt-menu-placement' => 'bottom-end',
                                                            'kt-menu-overflow' => 'true',
                                                        ]" />
                                                    <x-admin.form :id="'kt_ecommerce_add_product_form'" :class="'d-inline'"
                                                        :action="route('menus.destroy', $menu->id)" :method="'POST'">
                                                        <x-slot:form>
                                                            @method('DELETE')
                                                            <x-admin.button :type="'submit'" :class="'btn-icon me-1'"
                                                                :small="''" :light="''"
                                                                :color="'danger'" :iconTag="'i'"
                                                                :iconClass="'fs-1'" :iconType="'outline'"
                                                                :iconName="'trash'" />
                                                        </x-slot:form>
                                                    </x-admin.form>
                                                    <x-admin.button :class="'btn-icon '" :small="''"
                                                        :light="''" :color="'primary'" :iconTag="'i'"
                                                        :iconClass="'fs-1'" :iconType="'outline'" :iconName="'message-edit'"
                                                        :data="[
                                                            'kt-menu-trigger' => 'click',
                                                            'kt-menu-placement' => 'bottom-end',
                                                            'kt-menu-overflow' => 'true',
                                                            'bs-toggle' => 'modal',
                                                            'bs-target' => '#menu' . $menu->id,
                                                        ]" />

                                                        <!---Menü Güncelle Modal--->
                                                        <x-admin.modal :xl="''" :id="'menu' . $menu->id"
                                                            :modalTitle="'Menü Güncelle'" :headerNotBorder="''"
                                                            :titleCenter="''" :footerClass="'justify-content-center'"
                                                            :footerNotBorder="''">
                                                            <x-slot:modalBody>
                                                                <x-admin.form :id="'kt_ecommerce_add_product_form'"
                                                                    :action="route(
                                                                        'menus.update',
                                                                        $menu->id,
                                                                    )" :method="'POST'">
                                                                    <x-slot:form>
                                                                        @method('PUT')
                                                                        @if ($menu->type == 'content')
                                                                            <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'"
                                                                                :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                <x-slot:cardHeader>
                                                                                    <div
                                                                                        class="card-title m-0">
                                                                                        <h2>İçerik Menü</h2>
                                                                                    </div>
                                                                                    <div
                                                                                        class="card-toolbar">
                                                                                        <x-admin.tab
                                                                                            :tabsType1="'true'"
                                                                                            :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                            :tabNavs="'true'"
                                                                                            :tabItem="[
                                                                                                'kt_tab_pane_tr_' .
                                                                                                $menu->id => 'Türkçe',
                                                                                                'kt_tab_pane_en_' .
                                                                                                $menu->id => 'İngilizce',
                                                                                            ]">
                                                                                        </x-admin.tab>
                                                                                    </div>
                                                                                </x-slot:cardHeader>
                                                                                <x-slot:cardBody>
                                                                                    <x-admin.form
                                                                                        :action="route(
                                                                                            'menus.update',
                                                                                            $menu->id,
                                                                                        )"
                                                                                        :method="'POST'">
                                                                                        <x-slot:form>
                                                                                            <x-admin.tab
                                                                                                :tabsContentId="'myTabContent'"
                                                                                                :tabsType1="'true'">
                                                                                                <x-slot:tabsContent>
                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :tabId="'kt_tab_pane_tr_' .
                                                                                                            $menu->id"
                                                                                                        :tabPaneClass="'show active'">
                                                                                                        <x-slot:tabContent>
                                                                                                            <x-admin.custom-grid>
                                                                                                                <x-slot:gridRow>
                                                                                                                    <x-admin.form-input
                                                                                                                        :type="'hidden'"
                                                                                                                        :name="'type'"
                                                                                                                        :value="'content'" />
                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Menü Adı'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Menü Adı'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'name:tr'"
                                                                                                                        :value="$menu->{'name:tr'}" />
                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'il'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'İçerik Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'İçerik Seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'content:tr'">
                                                                                                                        <x-slot:customOptions>
                                                                                                                            <option
                                                                                                                                value="">
                                                                                                                            </option>
                                                                                                                            @foreach ($pages as $page)
                                                                                                                                <option
                                                                                                                                    @if ($page->id == $menu->{'content:tr'}) selected @endif
                                                                                                                                    value="{{ $page->id }}">
                                                                                                                                    {{ $page->name }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </x-slot:customOptions>
                                                                                                                    </x-admin.form-select>
                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'ilce'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Üst Menü Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :defaultValue="$menu->parent"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'Üst Menü Seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'parent'"
                                                                                                                        :options="[
                                                                                                                            '1' =>
                                                                                                                                'Header Menü',
                                                                                                                            '2' =>
                                                                                                                                'Footer Menü 1',
                                                                                                                            '3' =>
                                                                                                                                'Footer Menü 2',
                                                                                                                            '4' =>
                                                                                                                                'Footer Menü 3',
                                                                                                                            '5' =>
                                                                                                                                'Footer Menü 4',
                                                                                                                            '6' =>
                                                                                                                                'Footer Menü 5',
                                                                                                                            '7' =>
                                                                                                                                'Footer Menü 6',
                                                                                                                        ]" />
                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'ilce'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Alt Menü Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'Alt Menü Seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'child'">
                                                                                                                        <x-slot:customOptions>
                                                                                                                            <option
                                                                                                                                value="">
                                                                                                                            </option>
                                                                                                                            @foreach ($menus as $menu_)
                                                                                                                                <option
                                                                                                                                    @if ($menu_->id == $menu->child) selected @endif
                                                                                                                                    value="{{ $menu_->id }}">
                                                                                                                                    {{ $menu_->{'name:tr'} }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </x-slot:customOptions>
                                                                                                                    </x-admin.form-select>
                                                                                                                </x-slot:gridRow>
                                                                                                            </x-admin.custom-grid>
                                                                                                        </x-slot:tabContent>
                                                                                                    </x-admin.tab>

                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :tabId="'kt_tab_pane_en_' .
                                                                                                            $menu->id">
                                                                                                        <x-slot:tabContent>
                                                                                                            <x-admin.custom-grid>
                                                                                                                <x-slot:gridRow>
                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Menü Adı'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Menü Adı'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'name:en'"
                                                                                                                        :value="$menu->{'name:en'}" />

                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'il'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'İçerik Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'İçerik seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'content:en'">
                                                                                                                        <x-slot:customOptions>
                                                                                                                            <option
                                                                                                                                value="">
                                                                                                                            </option>
                                                                                                                            @foreach ($pages as $page)
                                                                                                                                <option
                                                                                                                                    @if ($page->id == $menu->{'content:en'}) selected @endif
                                                                                                                                    value="{{ $page->id }}">
                                                                                                                                    {{ $page->name }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </x-slot:customOptions>
                                                                                                                    </x-admin.form-select>
                                                                                                                </x-slot:gridRow>
                                                                                                            </x-admin.custom-grid>
                                                                                                        </x-slot:tabContent>
                                                                                                    </x-admin.tab>
                                                                                                </x-slot:tabsContent>
                                                                                            </x-admin.tab>

                                                                                            <x-admin.button
                                                                                                :type="'submit'"
                                                                                                :buttonParentClass="'col-6 mt-2'"
                                                                                                :title="'Ekle'"
                                                                                                :class="''"
                                                                                                :color="'primary'"
                                                                                                :iconTag="'i'"
                                                                                                :iconClass="'fs-1'"
                                                                                                :iconType="'outline'"
                                                                                                :iconName="'abstract-45'" />
                                                                                        </x-slot:form>
                                                                                    </x-admin.form>
                                                                                </x-slot:cardBody>
                                                                            </x-admin.card>
                                                                        @else
                                                                            <x-admin.card
                                                                                :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'"
                                                                                :cardHeaderClass="'card-header-stretch min-h-25px'">
                                                                                <x-slot:cardHeader>
                                                                                    <div
                                                                                        class="card-title m-0">
                                                                                        <h2>Bağlantı Menü
                                                                                        </h2>
                                                                                    </div>
                                                                                    <div
                                                                                        class="card-toolbar">
                                                                                        <x-admin.tab
                                                                                            :tabsType1="'true'"
                                                                                            :class="'nav-line-tabs  nav-stretch fs-6 border-0'"
                                                                                            :tabNavs="'true'"
                                                                                            :tabItem="[
                                                                                                'kt_tab_pane_tr_'.$menu->id =>
                                                                                                    'Türkçe',
                                                                                                'kt_tab_pane_en_'.$menu->id =>
                                                                                                    'İngilizce',
                                                                                            ]">
                                                                                        </x-admin.tab>
                                                                                    </div>
                                                                                </x-slot:cardHeader>
                                                                                <x-slot:cardBody>
                                                                                    <x-admin.form
                                                                                        :action="route(
                                                                                            'menus.update', $menu->id
                                                                                        )"
                                                                                        :method="'POST'">
                                                                                        <x-slot:form>
                                                                                            <x-admin.tab
                                                                                                :tabsContentId="'myTabContent'"
                                                                                                :tabsType1="'true'">
                                                                                                <x-slot:tabsContent>
                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :tabId="'kt_tab_pane_tr_'.$menu->id"
                                                                                                        :tabPaneClass="'show active'">
                                                                                                        <x-slot:tabContent>
                                                                                                            <x-admin.form-input
                                                                                                                :type="'hidden'"
                                                                                                                :name="'type'"
                                                                                                                :value="'url'" />
                                                                                                            <x-admin.custom-grid>
                                                                                                                <x-slot:gridRow>
                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Menü Adı'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Menü Adı'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'name:tr'"
                                                                                                                        :value="$menu->{'name:tr'}" />

                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Link URL'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Url'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'content'"
                                                                                                                        :value="$menu->{'content:tr'}" />

                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'ilce'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Üst Menü Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :defaultValue="$menu->parent"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'Üst Menü Seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'parent'"
                                                                                                                        :options="[
                                                                                                                            '1' =>
                                                                                                                                'Header Menü',
                                                                                                                            '2' =>
                                                                                                                                'Footer Menü 1',
                                                                                                                            '3' =>
                                                                                                                                'Footer Menü 2',
                                                                                                                            '4' =>
                                                                                                                                'Footer Menü 3',
                                                                                                                            '5' =>
                                                                                                                                'Footer Menü 4',
                                                                                                                            '6' =>
                                                                                                                                'Footer Menü 5',
                                                                                                                            '7' =>
                                                                                                                                'Footer Menü 6',
                                                                                                                        ]" />
                                                                                                                    <x-admin.form-select
                                                                                                                        :inputParentClass="'col-6'"
                                                                                                                        :id="'ilce'"
                                                                                                                        :class="'mb-2'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Alt Menü Seçiniz'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :data="[
                                                                                                                            'hide-search' =>
                                                                                                                                'true',
                                                                                                                            'control' =>
                                                                                                                                'select2',
                                                                                                                            'placeholder' =>
                                                                                                                                'Alt Menü Seçiniz',
                                                                                                                        ]"
                                                                                                                        :name="'child'" >

                                                                                                                        <x-slot:customOptions>
                                                                                                                            <option
                                                                                                                                value="">
                                                                                                                            </option>
                                                                                                                            @foreach ($menus as $menu_)
                                                                                                                                <option
                                                                                                                                @if ($menu_->id == $menu->child) selected @endif
                                                                                                                                    value="{{ $menu_->id }}">
                                                                                                                                    {{ $menu_->{'name:tr'} }}
                                                                                                                                </option>
                                                                                                                            @endforeach
                                                                                                                        </x-slot:customOptions>
                                                                                                                    </x-admin.form-select>
                                                                                                                </x-slot:gridRow>
                                                                                                            </x-admin.custom-grid>
                                                                                                        </x-slot:tabContent>
                                                                                                    </x-admin.tab>
                                                                                                    <x-admin.tab
                                                                                                        :tabsType1="'true'"
                                                                                                        :tabId="'kt_tab_pane_en_'.$menu->id">
                                                                                                        <x-slot:tabContent>
                                                                                                            <x-admin.custom-grid>
                                                                                                                <x-slot:gridRow>
                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Menü Adı'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Menü Adı'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'name:en'"
                                                                                                                        :value="$menu->{'name:en'}" />

                                                                                                                    <x-admin.form-input
                                                                                                                        :inputParentClass="'input-group-lg mb-6 fv-row col-6'"
                                                                                                                        :labelTag="'label'"
                                                                                                                        :labelText="'Link URL'"
                                                                                                                        :labelClass="'form-label'"
                                                                                                                        :placeholder="'Url'"
                                                                                                                        :class="'form-control'"
                                                                                                                        :name="'content:en'"
                                                                                                                        :value="$menu->{'content:en'}" />
                                                                                                                </x-slot:gridRow>
                                                                                                            </x-admin.custom-grid>
                                                                                                        </x-slot:tabContent>
                                                                                                    </x-admin.tab>
                                                                                                </x-slot:tabsContent>
                                                                                            </x-admin.tab>

                                                                                            <x-admin.button
                                                                                                :buttonParentClass="'col-6 mt-2'"
                                                                                                :title="'Ekle'"
                                                                                                :class="''"
                                                                                                :color="'primary'"
                                                                                                :iconTag="'i'"
                                                                                                :iconClass="'fs-1'"
                                                                                                :iconType="'outline'"
                                                                                                :iconName="'abstract-45'" />
                                                                                        </x-slot:form>
                                                                                    </x-admin.form>
                                                                                </x-slot:cardBody>
                                                                            </x-admin.card>
                                                                        @endif
                                                                    </x-slot:form>
                                                                </x-admin.form>
                                                            </x-slot:modalBody>
                                                        </x-admin.modal>
                                                </x-slot:menuButton>
                                            </x-admin.menu-item>
                                        @endif
                                    @endforeach
                                </x-slot:menuColumn>
                            </x-admin.menu-column>
                        </x-slot:cardBody>
                    </x-admin.card>
                </div>
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                    <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'card-header-stretch min-h-25px'">
                        <x-slot:cardHeader>
                            <div class="card-title m-0">
                                <h2>İçerik Menü</h2>
                            </div>
                            <div class="card-toolbar">
                                <x-admin.tab :tabsType1="'true'" :class="'nav-line-tabs  nav-stretch fs-6 border-0'" :tabNavs="'true'"
                                    :tabItem="[
                                        'kt_tab_pane_7' => 'Türkçe',
                                        'kt_tab_pane_8' => 'İngilizce',
                                        'kt_tab_pane_11' => 'Arapça',
                                    ]">
                                </x-admin.tab>
                            </div>
                        </x-slot:cardHeader>
                        <x-slot:cardBody>
                            <x-admin.form :action="route('menus.store')" :method="'POST'">
                                <x-slot:form>
                                    <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                                        <x-slot:tabsContent>
                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_7'" :tabPaneClass="'show active'">
                                                <x-slot:tabContent>
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :type="'hidden'" :name="'type'"
                                                                :value="'content'" />

                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control'" :name="'name:tr'" />

                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'il'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'İçerik Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'İçerik Seçiniz',
                                                                ]" :name="'content:tr'">
                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    @foreach ($pages as $page)
                                                                        <option value="{{ $page->id }}">
                                                                            {{ $page->{'name'} }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>

                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'ilce'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'Üst Menü Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'Üst Menü Seçiniz',
                                                                ]" :name="'parent'">

                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    <option value="1">Header Menü</option>
                                                                    <option value="2">Footer Menü 1</option>
                                                                    <option value="3">Footer Menü 2</option>
                                                                    <option value="4">Footer Menü 3</option>
                                                                    <option value="5">Footer Menü 4</option>
                                                                    <option value="6">Footer Menü 5</option>
                                                                    <option value="7">Footer Menü 6</option>
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'ilce'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'Alt Menü Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'Alt Menü Seçiniz',
                                                                ]" :name="'child'">

                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->{'name:tr'} }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>

                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_8'">
                                                <x-slot:tabContent>
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control'" :name="'name:en'" />

                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'il'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'İçerik Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'İçerik seçiniz',
                                                                ]" :name="'content:en'">
                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    @foreach ($pages as $page)
                                                                        <option value="{{ $page->id }}">
                                                                            {{ $page->{'name'} }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>

                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_11'">
                                                <x-slot:tabContent>
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control text-end'" :name="'name:ar'" />

                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'il'"
                                                                :class="'mb-2 text-end'" :labelTag="'label'" :labelText="'İçerik Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'İçerik seçiniz',
                                                                ]" :name="'content:ar'">
                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    @foreach ($pages as $page)
                                                                        <option value="{{ $page->id }}">
                                                                            {{ $page->{'name'} }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>
                                        </x-slot:tabsContent>
                                    </x-admin.tab>

                                    <x-admin.button :type="'submit'" :buttonParentClass="'col-6 mt-2'" :title="'Ekle'"
                                        :class="''" :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'"
                                        :iconType="'outline'" :iconName="'abstract-45'" />
                                </x-slot:form>
                            </x-admin.form>
                        </x-slot:cardBody>
                    </x-admin.card>
                    <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'card-header-stretch min-h-25px'">
                        <x-slot:cardHeader>
                            <div class="card-title m-0">
                                <h2>Bağlantı Menü</h2>
                            </div>
                            <div class="card-toolbar">
                                <x-admin.tab :tabsType1="'true'" :class="'nav-line-tabs  nav-stretch fs-6 border-0'" :tabNavs="'true'"
                                    :tabItem="[
                                        'kt_tab_pane_9' => 'Türkçe',
                                        'kt_tab_pane_10' => 'İngilizce',
                                        'kt_tab_pane_12' => 'Arapça',
                                    ]">
                                </x-admin.tab>
                            </div>
                        </x-slot:cardHeader>
                        <x-slot:cardBody>

                            <x-admin.form :action="route('menus.store')" :method="'POST'">
                                <x-slot:form>
                                    <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                                        <x-slot:tabsContent>
                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_9'" :tabPaneClass="'show active'">
                                                <x-slot:tabContent>
                                                    <x-admin.form-input :type="'hidden'" :name="'type'"
                                                        :value="'url'" />
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control'" :name="'name:tr'" />

                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Link URL'" :labelClass="'form-label'" :placeholder="'Url'"
                                                                :class="'form-control'" :name="'content:tr'" />

                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'ilce'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'Üst Menü Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'Üst Menü Seçiniz',
                                                                ]" :name="'parent'">

                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    <option value="1">Header Menü</option>
                                                                    <option value="2">Footer Menü 1</option>
                                                                    <option value="3">Footer Menü 2</option>
                                                                    <option value="4">Footer Menü 3</option>
                                                                    <option value="5">Footer Menü 4</option>
                                                                    <option value="6">Footer Menü 5</option>
                                                                    <option value="7">Footer Menü 6</option>
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                            <x-admin.form-select :inputParentClass="'col-6'" :id="'ilce'"
                                                                :class="'mb-2'" :labelTag="'label'" :labelText="'Alt Menü Seçiniz'"
                                                                :labelClass="'form-label'" :data="[
                                                                    'hide-search' => 'true',
                                                                    'control' => 'select2',
                                                                    'placeholder' => 'Alt Menü Seçiniz',
                                                                ]" :name="'child'">

                                                                <x-slot:customOptions>
                                                                    <option value=""></option>
                                                                    @foreach ($menus as $menu)
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->{'name:tr'} }}
                                                                        </option>
                                                                    @endforeach
                                                                </x-slot:customOptions>
                                                            </x-admin.form-select>
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>
                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_10'">
                                                <x-slot:tabContent>
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control'" :name="'name:en'" />

                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Link URL'" :labelClass="'form-label'" :placeholder="'Url'"
                                                                :class="'form-control'" :name="'content:en'" />
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>
                                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_tab_pane_12'" lang="ar">
                                                <x-slot:tabContent>
                                                    <x-admin.custom-grid>
                                                        <x-slot:gridRow>
                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Menü Adı'" :labelClass="'form-label'" :placeholder="'Menü Adı'"
                                                                :class="'form-control text-end'" :name="'name:ar'" />

                                                            <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                :labelText="'Link URL'" :labelClass="'form-label'" :placeholder="'Url'"
                                                                :class="'form-control text-end'" :name="'content:ar'" />
                                                        </x-slot:gridRow>
                                                    </x-admin.custom-grid>
                                                </x-slot:tabContent>
                                            </x-admin.tab>
                                        </x-slot:tabsContent>
                                    </x-admin.tab>

                                    <x-admin.button :buttonParentClass="'col-6 mt-2'" :title="'Ekle'" :class="''"
                                        :color="'primary'" :iconTag="'i'" :iconClass="'fs-1'" :iconType="'outline'"
                                        :iconName="'abstract-45'" />
                                </x-slot:form>
                            </x-admin.form>
                        </x-slot:cardBody>
                    </x-admin.card>
                </div>
            </div>
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
@endsection
