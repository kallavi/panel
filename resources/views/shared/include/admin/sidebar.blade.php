<div id="kt_app_sidebar" class="app-sidebar flex-column bg-indigo" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

    <!--Sidebar Header--->
    @include('shared.include.admin.sidebar-header')


    <div class="app-sidebar-navs flex-column-fluid mx-2 py-6" id="kt_app_sidebar_navs">
        <div id="kt_app_sidebar_navs_wrappers" style="padding-bottom: 7.81vh" class="hover-scroll-y my-2" data-kt-scroll="true"
            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_header, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="5px">

            <!--Sidebar Menü-->
            @include('shared.include.admin.sidebar-menu')


        </div>
    </div>
</div>
