@extends('layout.admin.layout')
@section('app')
    <!--begin::Header-->
    @include('shared.include.admin.header')
    <!--end::Header-->
    <!--begin::Wrapper-->
    <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
                <!--begin::Navs-->
                @include('shared.include.admin.navbar')
                <!--begin::Navs-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Sidebar-->
        @include('shared.include.admin.sidebar')
        <!--end::Sidebar-->
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Content-->
                <div id="kt_app_content" class="app-content flex-column-fluid">
                  
                    <x-admin.content-container 
                        :id="'kt_app_content_container'"
                    >   
                        <x-slot:contentContainer>
                            @include("shared.include.admin.table")

                            <x-admin.card>
                                <x-slot:cardHeader>
                                    <x-admin.form-label
                                        :class="'card-title fs-3 fw-bold'"
                                        :title="'Project Settings'"
                                    />
                                </x-slot:cardHeader>
                                <x-slot:cardBody>
                                    @include('shared.include.admin.form')
                                </x-slot:cardBody>
                            </x-admin.card>


                            @include('shared.include.admin.button')
                            <hr>
                            @include('shared.include.admin.accordion')
                            <hr>
                            @include('shared.include.admin.tab')
                        </x-slot:contentContainer>
                    </x-admin.content-container>
                </div>
            </div>
            <!--end::Content wrapper-->
            <!--begin::Footer-->
            <div id="kt_app_footer" class="app-footer">
                <!--begin::Footer container-->
                <div class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted fw-semibold me-1">2023&copy;</span>
                        <a href="https://keenthemes.com" target="_blank"
                            class="text-gray-800 text-hover-primary">Keenthemes</a>
                    </div>
                    <!--end::Copyright-->
                    <!--begin::Menu-->
                    <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                        <li class="menu-item">
                            <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a>
                        </li>
                        <li class="menu-item">
                            <a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
                        </li>
                    </ul>
                    <!--end::Menu-->
                </div>
                <!--end::Footer container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end:::Main-->
    </div>
    <!--end::Wrapper-->
 
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#kt_ecommerce_report_views_table").dataTable();
        })
    </script>
@endsection