<div class="subBanner bg-primary-dark d-flex align-items-center {{ request()->segment(1) == 'blog' && request()->segment(2) != '' ? 'type2' : '' }}">
    <div class="subBannerContainer">
        <span class="backTitle"> @yield('title')</span>
        <div class="col-xxl-10 col-12 mx-auto pb-lg-3 pb-lg-0 pt-lg-2 px-lg-4"> 
            <div class="d-lg-flex align-items-center px-4 text-center text-lg-start">
                <div class="title text-center text-lg-start">
                    <h1>@yield('title')</h1>
                </div>
                @yield('breadcrumbs')
            </div> 
        </div>
    </div>
</div>
