<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<!--begin::Head-->
@include('shared.admin.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_app_body" @yield('bodyAttr') data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            {{-- @php
                request()->segment(1) != '/' ?  @include('shared.include.admin.header') : ''
            @endphp --}}

            @if (Route::currentRouteName() != 'home')
                
            @include('shared.include.admin.header')
            

            @endif
            <!--begin::Theme mode setup on page load-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('shared.include.admin.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid @if (Route::currentRouteName() == 'home') bg-gray-300 bg-opacity-20 @endif">
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @yield('app')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Scrolltop-->
            <!--begin::Modals-->
            @include('admin.modals.modal')
            <!--end::Modals-->
            <!--begin::Javascript-->
            @include('shared.admin.footer')
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
</body>
<!--end::Body-->

</html>
