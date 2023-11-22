<x-admin.accordion>
    <x-slot:accContentTitle>
        <h2 class="text-gray-800 fw-bold mb-4">Buying Product</h2>
    </x-slot:accContentTitle>
    <x-slot:accContent>
        <x-admin.accordion-item 
            :accordionItemClass="'mb-0'"
            :accHeader="'true'" 
            {{-- :accTitleTag="'div'" //title tag ı değiştirilebilir --}}
            :accTitle="'How does it work?'"
            :accTitleClass="'text-gray-700 fw-bold cursor-pointer mb-0'"
            :iconLeft="'true'"
            :accTitleIcon="''"
            {{-- :acctitleIconClass="'ki-outline ki-minus-square toggle-on text-primary fs-1'" --}}
            :accTitleIconParent="'true'"
            :icons="[
                '1' => 'ki-outline ki-minus-square toggle-on text-primary fs-1',
                '2' => 'ki-outline ki-plus-square toggle-off fs-1',
            ]"
            :data="[
                'bs-toggle' => 'collapse',
                'bs-target' => '#kt_job_4_1'
            ]"
            :accordionItemClass="'test'"
            :accBody="'First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.'"
            :accBodyClass="'fs-6 ms-1'"
            :idBody="'kt_job_4_1'"
            :seperator="'true'"
            >
        </x-admin.accordion-item>
        <x-admin.accordion-item 
            :accordionItemClass="'mb-0'"
            :accHeader="'true'" 
            :accTitle="'Do I need a designer to use Admin Theme ?'"
            :accTitleClass="'text-gray-700 fw-bold cursor-pointer mb-0'"
            :iconLeft="'true'"
            :accTitleIcon="''"
            {{-- :acctitleIconClass="'ki-outline ki-minus-square toggle-on text-primary fs-1'" --}}
            :accTitleIconParent="'true'"
            :icons="[
                '1' => 'ki-outline ki-minus-square toggle-on text-primary fs-1',
                '2' => 'ki-outline ki-plus-square toggle-off fs-1',
            ]"
            :data="[
                'bs-toggle' => 'collapse',
                'bs-target' => '#kt_job_4_2'
            ]"
            :accordionItemClass="'test'"
            :accBody="'First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.'"
            :accBodyClass="'fs-6 ms-1 show'"
            :idBody="'kt_job_4_2'"
            :seperator="'true'"
            >
        </x-admin.accordion-item>
    </x-slot:accContent>
</x-admin.accordion>




<x-admin.accordion :id="'test-accordion-1'">
    <x-slot:accContentTitle>
        <h2 class="text-gray-800 fw-bold mb-4">Buying Product</h2>
    </x-slot:accContentTitle>
    <x-slot:accContent>
        <x-admin.accordion-item 
            :accordionItemClass="'mb-0'"
            :accHeader="'true'" 
            {{-- :accTitleTag="'div'" //title tag ı değiştirilebilir --}}
            :accTitle="'How does it work?'"
            :accTitleClass="'text-gray-700 fw-bold cursor-pointer mb-0'"
            :accTitleIcon="''"
            {{-- :acctitleIconClass="'ki-outline ki-minus-square toggle-on text-primary fs-1'" --}}
            :accTitleIconParent="'true'"
            :icons="[
                '1' => 'ki-outline ki-minus-square toggle-on text-primary fs-1',
                '2' => 'ki-outline ki-plus-square toggle-off fs-1',
            ]"
            :data="[
                'bs-toggle' => 'collapse',
                'bs-target' => '#kt_job_4_3'
            ]"
            :accordionItemClass="'test'"
            :accBody="'First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.'"
            :accBodyClass="'fs-6 ms-1'"
            :idBody="'kt_job_4_3'"
            :seperator="'true'"
            :bodyData="[
                'bs-parent' =>'#test-accordion-1'
            ]"
            >
        </x-admin.accordion-item>
        <x-admin.accordion-item 
            :accordionItemClass="'mb-0'"
            :accHeader="'true'" 
            :accTitle="'Do I need a designer to use Admin Theme ?'"
            :accTitleClass="'text-gray-700 fw-bold cursor-pointer mb-0'"
            :accTitleIcon="''"
            {{-- :acctitleIconClass="'ki-outline ki-minus-square toggle-on text-primary fs-1'" --}}
            :accTitleIconParent="'true'"
            :icons="[
                '1' => 'ki-outline ki-minus-square toggle-on text-primary fs-1',
                '2' => 'ki-outline ki-plus-square toggle-off fs-1',
            ]"
            :data="[
                'bs-toggle' => 'collapse',
                'bs-target' => '#kt_job_4_4'
            ]"
            :accordionItemClass="'test'"
            :accBody="'First, a disclaimer – the entire process of writing a blog post often takes more than a couple of hours, even if you can type eighty words as per minute and your writing skills are sharp.'"
            :accBodyClass="'fs-6 ms-1'"
            :idBody="'kt_job_4_4'"
            :seperator="'true'"
            :bodyData="[
                'bs-parent' =>'#test-accordion-1'
            ]"
            >
        </x-admin.accordion-item>
    </x-slot:accContent>
</x-admin.accordion>
