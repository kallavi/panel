@extends('layout.admin.layout')
@section('pageTitle')
    Destek Talebi
@endsection
@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Yeni Destek Talebi'" :class="'d-flex flex-center h-48px h-lg-48px'" :color="'primary'" :data="[
                'bs-target' => '#destekTalebi',
            ]" :iconTag="'i'"
                :iconClass="'fs-2x me-2'" :modalButton="''" :iconType="'outline'" :iconName="'rescue'" />

        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
<x-admin.wrapper-container>
    <x-slot:content>
    <x-admin.tags-wrapper>
        <x-slot:tagsWrapper>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :warning="''" :badge="'Yanıt Bekliyor'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :warning="''" :badge="'Yanıt Bekliyor'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :success="''" :badge="'Cevaplandı'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :warning="''" :badge="'Yanıt Bekliyor'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
        <x-admin.message :warning="''" :badge="'Yanıt Bekliyor'" :link="'../../demo27/dist/apps/support-center/tickets/view.html'" :message="'How to use Netronic with Django Framework?'" :answer="'Bilgisayarımın son güncellemesinden sonra internet bağlantım kesiliyor. Sorunun çözümü için yardımınıza ihtiyacım var. Lütfen bu konuyu en kısa sürede ele alabilir misiniz?'"/>
    </x-slot:tagsWrapper>   
    </x-admin.tags-wrapper>
      
   <x-admin.pagination :type2="''"></x-admin.pagination>
    </x-slot:content>
</x-admin.wrapper-container>
@endsection
