<x-admin.menu-column>
    <x-slot:menuColumn>
    <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-element-11 fs-2'" :link="''" :menuItemRoot="'home'" :title="'Başlangıç'">
        <x-slot:linkClass>
            {{ request()->segment(1)=='' ? 'active':'' }}
        </x-slot:linkClass>
    </x-admin.menu-item>
    <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-chart-line fs-2'" :link="''" :menuItemRoot="'activities'" :title="'Aktiviteler'" :badge="'24'" >
        <x-slot:linkClass>
            {{ request()->segment(1)=='activities' ? 'active':'' }}
        </x-slot:linkClass>
    </x-admin.menu-item>
</x-slot:menuColumn>
</x-admin.menu-column>


<x-admin.menu-column :id="'#kt_app_sidebar_menu'" :class="'menu-sub-indention menu-active-bg'" :data-kt-menu="'true'" :data-kt-menu-expand="'false'" >
    <x-slot:menuColumn>
        <x-admin.menu-item :menuHeading="'İÇERİK YÖNETİMİ'" />
        <!--Accordion menu icin  data-kt-menu-trigger="'click'" ozellıgı eklenmesı gerekıyor-->
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-some-files fs-2'"
            :title="'Sayfalar'" :data-kt-menu-trigger="'click'" >
            <x-slot:class>
                menu-accordion
                {{ request()->segment(1)=='page' ? 'show':'' }}
            </x-slot:class>
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Sayfalar'" :link="''" :menuItemRoot="'page'">
                    <x-slot:linkClass>
                        {{ request()->segment(1)=='page' &&  request()->segment(2)==null  ? 'active':'' }}
                    </x-slot:linkClass>
                </x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Yeni Ekle'" :link="''" :menuItemRoot="'page/new-page'">
                    <x-slot:linkClass>
                        {{ request()->segment(1)=='page' &&  request()->segment(2)=='new-page'  ? 'active':'' }}
                    </x-slot:linkClass>
                </x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Haberler'" :data-kt-menu-trigger="'click'" :segment1Acc="'haberler'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'haberler'" :title="'Haberler'" :segment1="'haberler'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''"  :menuItemRoot="'haberler/new-page'" :title="'Yeni Haber'" :segment1="'haberler'" :segment2="'new-page'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''"  :menuItemRoot="'haberler/categories'" :title="'Haber Kategorileri'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Portfolyolar'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'portfolyo'" :title="'Portfolyolar'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'portfolyo/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'portfolyo/categories'" :title="'Portfolyo Kategorileri'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-notification-status fs-2'" :class="'menu-accordion'"
            :title="'Duyurular'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'duyurular'" :title="'Duyurular'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'duyurular/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-notification-favorite fs-2'" :class="'menu-accordion'"
            :title="'Popup Yönetimi'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'popup'" :title="'Popup Liste'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'popup/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-slider-horizontal-2 fs-2'" :class="'menu-accordion'"
            :title="'Slider'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'slider'" :title="'Slider Liste'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'slider/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-picture fs-2'" :class="'menu-accordion'"
            :title="'Fotoğraf Galerileri'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'fotograf-galeri'" :title="'Galeri Liste'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'fotograf-galeri/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-youtube fs-2'" :class="'menu-accordion'"
            :title="'Video Galerileri'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'video-galeri'" :title="'Video Liste'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'video-galeri/new-page'" :title="'Yeni Ekle'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :menuHeading="'AYARLAR'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-setting-3 fs-2'" :link="''" :menuItemRoot="'ayarlar'" :title="'Site Ayarları'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-setting-3 fs-2'" :link="''" :menuItemRoot="'home/edit'" :title="'Sayfa Ayarları'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-burger-menu-3 fs-2'" :link="''" :menuItemRoot="'menuler'" :title="'Menüler'"  />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-element-12 fs-2'" :class="'menu-accordion'"
            :title="'Formlar'" :data-kt-menu-trigger="'click'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :title="'İletişim'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'formlar/istek-oneri'" :title="'İstek, Öneri ve Şikayet Formu'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-rescue fs-2'" :link="''" :menuItemRoot="'destek-talebi'" :title="'Destek Talebi'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-folder-down fs-2'" :link="''" :menuItemRoot="'dokumanlar'" :title="'Dökümanlar'" />

    </x-slot:menuColumn>
</x-admin.menu-column>