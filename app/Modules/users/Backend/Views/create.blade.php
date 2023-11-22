@extends('layout.admin.layout')
@section('pageTitle')
    Kullanıcı Ekle
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Kullanıcılar'"  :link="route('admin.users.index')" :class="'text-gray-600 fw-bold lh-1'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Kullanıcı Ekle'" :class="'text-gray-600 fw-bold lh-1'" />

        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />

            <x-admin.button :title="'Kaydet'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-create'" :color="'primary'" :data="[
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
            {{-- <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'"  :tabNavs="'true'" :tabItem="[
            'kt_customer_view_overview_tab' => 'Türkçe',
            'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
        ]"/> --}}
            <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                <x-slot:tabsContent>
                    <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_tab'" :tabPaneClass="'show active'">
                        <x-slot:tabContent>
                            <div class="d-flex flex-column flex-xl-row">
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                    <x-admin.form :action="route('admin.users.store')" :method="'POST'" id="'kt_ecommerce_add_product_form'" :class="'project_create_form form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework'">
                                        <x-slot:form>
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Kullanıcı Bilgileri</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'" :labelText="'İsim'" :name="'name'" :labelClass="'form-label required'"
                                                                    :placeholder="'İsim'" :class="'form-control'" :required="''" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'" :labelText="'E-Mail'" :labelClass="'form-label'" :name="'email'"
                                                                    :placeholder="'E-mail'" :class="'form-control'" :required="''" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'" :labelText="'Şifre'" :labelClass="'form-label'" :name="'password'"
                                                                    :class="'form-control'" :required="''" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'" :labelText="'Şifre Tekrar'" :labelClass="'form-label'" :name="'password2'"
                                                                    :class="'form-control required'" :required="''" />
                                                                {{-- <x-admin.form-select :inputParentClass="'col-6'" :id="'ustmenu'" :class="'mb-2'"   :labelTag="'label'"
                                                                    :labelText="'Rol Seçin'" :labelClass="'form-label'" :options="[
                                                                        'admin' => 'admin',
                                                                    ]" :data="[
                                                                        'hide-search' => 'true',
                                                                        'control' => 'select2',
                                                                        'placeholder' => 'Select an option',
                                                                    ]" :attr="[
                                                                        'name' => 'role',
                                                                    ]" /> --}}
                                                                <button class="create_user_button" style="display: none"></button>
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>

                                            </div>

                                        </x-slot:form>


                                    </x-admin.form>
                                </div>

                            </div>
                        </x-slot:tabContent>
                    </x-admin.tab>

                </x-slot:tabsContent>
            </x-admin.tab>
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection




@section('script')

 <script>
       $('.btn-create').click(function () {
        $('.create_user_button').trigger('click');
    });

    $('.btn-reset').click(function () {
        $('.project_create_form').trigger('reset');
    });
 </script>
@endsection
