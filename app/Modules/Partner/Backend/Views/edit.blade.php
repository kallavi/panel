@extends('layout.admin.layout')
@section('pageTitle')
    Partner Güncelle
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Partner'" :link="route('admin.partner.index')" :class="'text-gray-600 fw-bold lh-1'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Partner Güncelle'" :class="'text-gray-600 fw-bold lh-1'" />

        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Değişiklikleri Geri Al'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-reset'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-back'" :color="'danger'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Güncelle'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-create'" :color="'success'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <!--begin:::Tabs-->
            <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'" :tabNavs="'true'" :tabItem="[
                'kt_customer_view_overview_tab' => 'Türkçe',
                'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
                'kt_customer_view_overview_events_and_logs_tab2' => 'Arapça',
            ]">
            </x-admin.tab>

            <x-admin.form :id="'kt_ecommerce_add_product_form'" :action="route('admin.partner.update', $partner->id)" :method="'POST'" :class="'blog_create_form'" :dataKt="[
                'redirect' => '/metronic8/demo27/../demo27/apps/ecommerce/catalog/products.html',
            ]">
                <x-slot:form>
                    @method('PUT')
                    <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                        <x-slot:tabsContent>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_tab'" :tabPaneClass="'show active'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :name="'name:tr'"
                                                                    :placeholder="'Partner Başlık'" :class="'form-control name-tr'"
                                                                    :value="$partner->{'name:tr'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'" :name="'slug:tr'"
                                                                    :placeholder="'Partner Url'" :class="'form-control name-en'"
                                                                    :value="$partner->{'slug:tr'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Görsel</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :changeAvatar="''" :name="'image'"
                                                        :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" :imgUrl="'/' . $partner->image" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Durum</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-primary w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>

                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-select :defaultValue="$partner->status" :name="'status'"
                                                        :options="[
                                                            'published' => 'Yayınlanmış',
                                                            'draft' => 'Pasif',
                                                        ]" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :name="'name:en'"
                                                                    :labelClass="'form-label required'" :placeholder="'Partner Başlık'"
                                                                    :class="'form-control name-en'" :value="$partner->{'name:en'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :name="'slug:en'"
                                                                    :labelClass="'form-label'" :placeholder="'Partner Url'"
                                                                    :class="'form-control url-en'" :value="$partner->{'slug:en'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab2'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :name="'name:ar'"
                                                                    :labelClass="'form-label required'" :placeholder="'Partner Başlık'"
                                                                    :class="'form-control text-end name-ar'" :value="$partner->{'name:ar'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :name="'slug:ar'"
                                                                    :labelClass="'form-label'" :placeholder="'Partner Url'"
                                                                    :class="'form-control text-end url-ar'" :value="$partner->{'slug:ar'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                        </x-slot:tabsContent>
                    </x-admin.tab>
                </x-slot:form>
            </x-admin.form>
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
    <script>
        $('.btn-create').click(function() {
            $('.blog_create_form').trigger('submit');
        });

        $('.btn-reset').click(function() {
            $('.blog_create_form').trigger('reset');
        });

        $('.btn-back').click(function() {
            window.history.back();
        });
    </script>
@endsection
