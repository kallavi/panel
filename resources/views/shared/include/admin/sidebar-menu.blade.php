<x-admin.menu-column>
    <x-slot:menuColumn>
    <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-element-11 fs-2'" :link="''" :menuItemRoot="'backoffice.index'" :title="'Başlangıç'">
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
            :title="'Sayfalar'" :data-kt-menu-trigger="'click'" :class="'menu-accordion'" :segment1Acc="'backoffice'" :segment2Acc="'pages'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Sayfalar'" :link="''" :menuItemRoot="'pages.index'" :segment1="'backoffice'" :segment2="'pages'" :segment3="''"/>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Yeni Ekle'" :link="''" :menuItemRoot="'pages.create'" :segment1="'backoffice'" :segment2="'pages'" :segment3="'create'"/>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Haberler'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'" :segment2Acc="'news'" >
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.news.index'" :title="'Haberler'" :segment1="'backoffice'" :segment2="'news'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'news.create'" :title="'Yeni Haber'" :segment1="'backoffice'" :segment2="'news'" :segment3="'create'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'newscategories.index'" :title="'Haber Kategorileri'" :segment1="'backoffice'" :segment2="'news'" :segment3="'categories'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-some-files fs-2'"
            :title="'Hizmetler'" :data-kt-menu-trigger="'click'" :class="'menu-accordion'" :segment1Acc="'backoffice'" :segment2Acc="'services'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Hizmetler'" :link="''" :menuItemRoot="'services.index'" :segment1="'backoffice'" :segment2="'services'" :segment3="''"/>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'Yeni Ekle'" :link="''" :menuItemRoot="'services.create'" :segment1="'backoffice'" :segment2="'services'" :segment3="'create'"/>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Projeler'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'"  :segment2Acc="'projects'" >
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'projects.index'" :title="'Projeler'" :segment1="'backoffice'" :segment2="'projects'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'projects.create'" :title="'Yeni Proje'" :segment1="'backoffice'" :segment2="'projects'" :segment3="'create'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'projectcategories.index'" :title="'Proje Kategorileri'" :segment1="'backoffice'" :segment2="'projects'" :segment3="'categories'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Bloglar'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'"  :segment2Acc="'blogs'" >
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.blogs.index'" :title="'Bloglar'" :segment1="'backoffice'" :segment2="'blogs'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.blogs.create'" :title="'Yeni Blog'" :segment1="'backoffice'" :segment2="'blogs'" :segment3="'create'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.blogcategories.index'" :title="'Blog Kategorileri'" :segment1="'backoffice'" :segment2="'blogs'" :segment3="'categories'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-pin fs-2'" :class="'menu-accordion'"
            :title="'Portfolyolar'" :data-kt-menu-trigger="'click'" :segment1Acc="'portfolio'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.portfolio.index'" :title="'Portfolyolar'" :segment1="'portfolio'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.portfolio.create'" :title="'Yeni Ekle'" :segment1="'portfolio'" :segment2="'create'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.portfoliocategory.index'" :title="'Portfolyo Kategorileri'" :segment1="'portfolio'" :segment2="'categories'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        {{--
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-notification-status fs-2'" :class="'menu-accordion'"
            :title="'Duyurular'" :data-kt-menu-trigger="'click'" :segment1Acc="'announcements'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'announcements'" :title="'Duyurular'" :segment1="'announcements'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'announcements/create'" :title="'Yeni Ekle'" :segment1="'announcements'" :segment2="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-notification-favorite fs-2'" :class="'menu-accordion'"
            :title="'Popup Yönetimi'" :data-kt-menu-trigger="'click'" :segment1Acc="'popup'" >
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'popup'" :title="'Popup Liste'" :segment1="'popup'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'popup/create'" :title="'Yeni Ekle'" :segment1="'popup'" :segment2="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>  --}}
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-slider-horizontal-2 fs-2'" :class="'menu-accordion'"
            :title="'Slider'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'" :segment2Acc="'sliders'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'sliders.index'" :title="'Slider Liste'" :segment1="'backoffice'"  :segment2="'sliders'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'sliders.create'" :title="'Yeni Ekle'" :segment1="'backoffice'" :segment2="'sliders'" :segment3="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-slider-horizontal-2 fs-2'" :class="'menu-accordion'"
            :title="'Partner'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'" :segment2Acc="'partners'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.partner.index'" :title="'Partner Liste'" :segment1="'backoffice'"  :segment2="'partners'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.partner.create'" :title="'Yeni Ekle'" :segment1="'backoffice'" :segment2="'partners'" :segment3="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-slider-horizontal-2 fs-2'" :class="'menu-accordion'"
            :title="'Fotoğraf Galerileri'" :data-kt-menu-trigger="'click'" :segment1Acc="'backoffice'" :segment2Acc="'photo'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.photo.index'" :title="'Galeri Liste'" :segment1="'backoffice'"  :segment2="'photo'" :segment3="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.photo.create'" :title="'Yeni Ekle'" :segment1="'backoffice'" :segment2="'photo'" :segment3="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        {{--  <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-picture fs-2'" :class="'menu-accordion'"
            :title="'Fotoğraf Galerileri'" :data-kt-menu-trigger="'click'" :segment1Acc="'photo-gallery'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'photo-gallery'" :title="'Galeri Liste'" :segment1="'photo-gallery'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'photo-gallery/create'" :title="'Yeni Ekle'" :segment1="'photo-gallery'" :segment2="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-youtube fs-2'" :class="'menu-accordion'"
            :title="'Video Galerileri'" :data-kt-menu-trigger="'click'" :segment1Acc="'video-gallery'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'video-gallery'" :title="'Video Liste'" :segment1="'video-gallery'" :segment2="''"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'video-gallery/create'" :title="'Yeni Ekle'" :segment1="'video-gallery'" :segment2="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>  --}}
        <x-admin.menu-item :menuHeading="'AYARLAR'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-burger-menu-3 fs-2'" :link="''" :menuItemRoot="'menus.index'" :title="'Menüler'" :segment1="'backoffice'" :segment2="'menus'"  />
        {{--  <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-element-12 fs-2'" :class="'menu-accordion'"
            :title="'Formlar'" :data-kt-menu-trigger="'click'" :segment1Acc="'forms'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :title="'İletişim'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'forms'" :title="'İstek, Öneri ve Şikayet Formu'" :segment1="'forms'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>  --}}
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-setting-3 fs-2'" :link="'/backoffice/setting/1/edit'" :title="'Site Ayarları'" :segment1="'backoffice'" :segment2="'setting'"/>



        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-element-12 fs-2'" :class="'menu-accordion'"
            :title="'Kullanıcılar'" :data-kt-menu-trigger="'click'" :segment1Acc="'forms'">
            <x-slot:arrow></x-slot:arrow><!--Accordion menu ok-->
            <x-slot:subMenu>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.users.index'" :title="'Kullanıcı Listesi'" :segment1="'create'"></x-admin.menu-item>
                <x-admin.menu-item :linkClass="'ps-0'" :link="''" :menuItemRoot="'admin.users.create'" :title="'Kullanıcı Ekle'" :segment1="'create'"></x-admin.menu-item>
            </x-slot:subMenu>
        </x-admin.menu-item>





        {{--  <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-rescue fs-2'" :link="''" :menuItemRoot="'support-request'" :title="'Destek Talebi'" :segment1="'support-request'" />
        <x-admin.menu-item :iconTag="'i'" :iconClass="'ki-outline ki-folder-down fs-2'" :link="''" :menuItemRoot="'documents'" :title="'Dökümanlar'" :segment1="'documents'" />  --}}

    </x-slot:menuColumn>
</x-admin.menu-column>
