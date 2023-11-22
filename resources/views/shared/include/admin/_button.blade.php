<x-admin.tags-wrapper :class="'mt-5 py-5 d-flex align-items-center flex-wrap'">
    <x-slot:tagsWrapper>
        <x-admin.button 
        :title="'Export'" 
        :class="'ms-3'" 
        :light="''" 
        :color="'primary'" 
        :type="'button'" 
        :iconTag="'i'" 
        :iconClass="'ki-outline ki-exit-up fs-2'"
        :data="[
            'bs-toggle' => 'modal',
            'bs-target' => '#kt_customers_export_modal'
        ]"
    />
    <x-admin.button 
        :title="'Sign in with Google'" 
        :class="'btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100'" 
        :buttonParentClass="'parentbutton'"
        :buttonRouteLink="'home'"
        :iconTag="'img'" 
        :iconClass="'h-15px me-3'"
        :alt="'Logo'"
        :src="'assets/media/svg/brand-logos/google-icon.svg'"
    />


    <x-admin.button 
        :class="'btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end'" 
        :iconTag="'i'" 
        :iconClass="'ki-outline ki-dots-square fs-1 text-gray-400 me-n1'"
        :data="[
            'kt-menu-trigger' => 'click',
            'kt-menu-placement' => 'bottom-end',
            'kt-menu-overflow' => 'true'
        ]"
    />

    </x-slot:tagsWrapper>
</x-admin.tags-wrapper>