<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
    <div class="app-container container-fluid d-flex flex-stack" id="kt_app_header_container">
        <div class="px-13 w-100">
        <!--begin::Sidebar toggle-->
            <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
                <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2" id="kt_app_sidebar_mobile_toggle">
                    <i class="ki-outline ki-abstract-14 fs-2"></i>
                </div>
                <!--begin::Logo image-->
                <a href="../../demo27/dist/index.html">
                    <img alt="Logo" src="{{asset('assets/media/logos/default-small.svg')}}" class="h-30px theme-light-show" />
                    <img alt="Logo" src="{{asset('assets/media/logos/default-small-dark.svg')}}" class="h-30px theme-dark-show" />
                </a>
                <!--end::Logo image-->
            </div>
            <!--end::Sidebar toggle-->
            <!--begin::Header wrapper-->
            <div class="d-flex flex-stack flex-lg-row-fluid" id="kt_app_header_wrapper">
                <div class="page-title gap-4 me-3 mb-5 mb-lg-0" data-kt-swapper="1" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}">
                @yield('breadcrumbs')
                    <h1 class="text-gray-900 fw-bolder m-0">@yield('pageTitle')</h1>
                </div>
                @yield('rightContent')
                
                {{-- <a href="#" class="btn btn-primary d-flex flex-center h-35px h-lg-40px" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Create
                <span class="d-none d-sm-inline ps-2">New</span></a> --}}
            </div>
        </div>
    </div>
</div>