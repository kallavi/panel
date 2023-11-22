@extends('layout.admin.layout')
@section('pageTitle')
    Site Ayarları
@endsection

@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Site Ayarları'" :link="route('admin.setting.edit', 1)" :class="'text-gray-600 fw-bold lh-1'" />
        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection

@section('rightContent')
    <x-admin.tags-wrapper :class="'d-flex align-items-center'">
        <x-slot:tagsWrapper>
            <x-admin.button :title="'Değişiklikleri Geri Al'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-reset'" :light="''" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Vazgeç'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-back'" :color="'danger'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
            <x-admin.button :title="'Güncelle'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-create'" :color="'success'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'" :tabNavs="'true'" :tabItem="[
                'kt_customer_view_overview_tab' => 'Türkçe',
                'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
                'kt_customer_view_overview_events_and_logs_tab2' => 'Arapça',
            ]">
            </x-admin.tab>

            <x-admin.form id="'kt_ecommerce_add_product_form'" :action="route('admin.setting.update', $setting->id)" :method="'POST'" :class="'create_form'">
                <x-slot:form>
                    @method('PUT')
                    <x-admin.tab :tabsContentId="'myTabContent'" :tabsType1="'true'">
                        <x-slot:tabsContent>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_tab'" :tabPaneClass="'show active'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :type="'hidden'" :name="'id'"
                                                                    :value="$setting->id" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :placeholder="''"
                                                                    :class="'form-control'" :name="'name:tr'"
                                                                    :value="$setting->{'name:tr'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'" :placeholder="''"
                                                                    :class="'form-control'" :name="'slug:tr'"
                                                                    :value="$setting->{'slug:tr'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Site Açıklaması'" :labelClass="'form-label'" :placeholder="''"
                                                                    :class="'form-control'" :name="'description:tr'"
                                                                    :value="$setting->{'description:tr'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-4'" :labelTag="'label'"
                                                                    :labelText="'Telefon Numarası'" :labelClass="'form-label'" :placeholder="''"
                                                                    :class="'form-control'" :name="'phone'"
                                                                    :value="$setting->phone" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-4'" :labelTag="'label'"
                                                                    :labelText="'Fax Numarası'" :labelClass="'form-label'" :placeholder="''"
                                                                    :class="'form-control'" :name="'fax'"
                                                                    :value="$setting->fax" />
                                                                <x-admin.form-input :type="'email'" :inputParentClass="'input-group-lg mb-6 fv-row col-4'"
                                                                    :labelTag="'label'" :labelText="'E-Posta'" :labelClass="'form-label'"
                                                                    :placeholder="''" :class="'form-control'" :name="'e_mail'"
                                                                    :value="$setting->e_mail" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Adres'" :labelClass="'form-label'" :placeholder="''"
                                                                    :class="'form-control'" :name="'address:tr'"
                                                                    :value="$setting->{'address:tr'}" />
                                                                <x-admin.form-select :inputParentClass="'col-6'" :id="'il'"
                                                                    :class="'mb-2'" :labelTag="'label'"
                                                                    :labelText="'İl'" :defaultValue="$setting->province"
                                                                    :labelClass="'form-label'" :options="[
                                                                        '1' => 'ADANA',
                                                                        '2' => 'ADIYAMAN',
                                                                        '3' => 'AFYONKARAHİSAR',
                                                                        '4' => 'AĞRI',
                                                                        '5' => 'AKSARAY',
                                                                        '6' => 'AMASYA',
                                                                        '7' => 'ANKARA',
                                                                        '8' => 'ANTALYA',
                                                                        '9' => 'ARDAHAN',
                                                                        '10' => 'ARTVİN',
                                                                        '11' => 'AYDIN',
                                                                        '12' => 'BALIKESİR',
                                                                        '13' => 'BARTIN',
                                                                        '14' => 'BATMAN',
                                                                        '15' => 'BAYBURT',
                                                                        '16' => 'BİLECİK',
                                                                        '17' => 'BİNGÖL',
                                                                        '18' => 'BİTLİS',
                                                                        '19' => 'BOLU',
                                                                        '20' => 'BURDUR',
                                                                        '21' => 'BURSA',
                                                                        '22' => 'ÇANAKKALE',
                                                                        '23' => 'ÇANKIRI',
                                                                        '24' => 'ÇORUM',
                                                                        '25' => 'DENİZLİ',
                                                                        '26' => 'DİYARBAKIR',
                                                                        '27' => 'DÜZCE',
                                                                        '28' => 'EDİRNE',
                                                                        '29' => 'ELAZIĞ',
                                                                        '30' => 'ERZİNCAN',
                                                                        '31' => 'ERZURUM',
                                                                        '32' => 'ESKİŞEHİR',
                                                                        '33' => 'GAZİANTEP',
                                                                        '34' => 'GİRESUN',
                                                                        '35' => 'GÜMÜŞHANE',
                                                                        '36' => 'HAKKARİ',
                                                                        '37' => 'HATAY',
                                                                        '38' => 'IĞDIR',
                                                                        '39' => 'ISPARTA',
                                                                        '40' => 'İSTANBUL',
                                                                        '41' => 'İZMİR',
                                                                        '42' => 'KAHRAMANMARAŞ',
                                                                        '43' => 'KARABÜK',
                                                                        '44' => 'KARAMAN',
                                                                        '45' => 'KARS',
                                                                        '46' => 'KASTAMONU',
                                                                        '47' => 'KAYSERİ',
                                                                        '48' => 'KIRIKKALE',
                                                                        '49' => 'KIRKLARELİ',
                                                                        '50' => 'KIRŞEHİR',
                                                                        '51' => 'KİLİS',
                                                                        '52' => 'KOCAELİ',
                                                                        '53' => 'KONYA',
                                                                        '54' => 'KÜTAHYA',
                                                                        '55' => 'MALATYA',
                                                                        '56' => 'MANİSA',
                                                                        '57' => 'MARDİN',
                                                                        '58' => 'MERSİN',
                                                                        '59' => 'MUĞLA',
                                                                        '60' => 'MUŞ',
                                                                        '61' => 'NEVŞEHİR',
                                                                        '62' => 'NİĞDE',
                                                                        '63' => 'ORDU',
                                                                        '64' => 'OSMANİYE',
                                                                        '65' => 'RİZE',
                                                                        '66' => 'SAKARYA',
                                                                        '67' => 'SAMSUN',
                                                                        '68' => 'SİİRT',
                                                                        '69' => 'SİNOP',
                                                                        '70' => 'SİVAS',
                                                                        '71' => 'ŞANLIURFA',
                                                                        '72' => 'ŞIRNAK',
                                                                        '73' => 'TEKİRDAĞ',
                                                                        '74' => 'TOKAT',
                                                                        '75' => 'TRABZON',
                                                                        '76' => 'TUNCELİ',
                                                                        '77' => 'UŞAK',
                                                                        '78' => 'VAN',
                                                                        '79' => 'YALOVA',
                                                                        '80' => 'YOZGAT',
                                                                        '81' => 'ZONGULDAK',
                                                                    ]"
                                                                    :data="[
                                                                        'hide-search' => 'true',
                                                                        'control' => 'select2',
                                                                        'placeholder' => 'Select an option',
                                                                    ]" :name="'province'" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'İlçe'" :labelClass="'form-label'"
                                                                    :placeholder="'İlçe'" :class="'form-control'"
                                                                    :name="'district'" :value="$setting->district" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Sosyal Medya Ayarları</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'Whatsap Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'+905418611191'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'whatsapp'" :iconFix="''"
                                                                    :iconFixed="''" :name="'whatsapp'"
                                                                    :value="$setting->whatsapp" />

                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'İnstagram Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'#instagram'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'instagram'" :iconFix="''"
                                                                    :iconFixed="''" :name="'instagram'"
                                                                    :value="$setting->instagram" />

                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'Facebook Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'#facebook'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'facebook'" :iconFix="''"
                                                                    :iconFixed="''" :name="'facebook'"
                                                                    :value="$setting->facebook" />

                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'Twitter Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'twitter'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'twitter'" :iconFix="''"
                                                                    :iconFixed="''" :name="'twitter'"
                                                                    :value="$setting->twitter" />

                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'Youtube Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'youtube'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'youtube'" :iconFix="''"
                                                                    :iconFixed="''" :name="'youtube'"
                                                                    :value="$setting->youtube" />

                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row col-6'" :inputRowClass="'input-group-lg'"
                                                                    :labelTag="'label'" :labelText="'Linkedin Kullanıcı Adı'"
                                                                    :labelClass="'form-label'" :placeholder="'#linkedin'"
                                                                    :class="'form-control'" :inputRow="''"
                                                                    :iconTag="'i'" :iconType="'outline'"
                                                                    :iconName="'behance'" :iconFix="''"
                                                                    :iconFixed="''" :name="'behance'"
                                                                    :value="$setting->behance" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Google Ayarları</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'Google Analytics View ID'" :labelClass="'form-label'"
                                                                    :placeholder="'239073384'" :class="'form-control'"
                                                                    :name="'analytics'" :value="$setting->analytics" />
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'Google Recaptcha Key'" :labelClass="'form-label'"
                                                                    :placeholder="'6LdC2a4iAAAAADybiAgpGEM6d09phHFSM4kkBVEN'" :class="'form-control'"
                                                                    :name="'recaptcha_key'" :value="$setting->recaptcha_key" />
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'Google Recaptcha Secret Key'" :labelClass="'form-label'"
                                                                    :placeholder="'6LdC2a4iAAAAAEyAuVbbTSvjouzmcekWYASCwgfR'" :class="'form-control'"
                                                                    :name="'recaptcha_secret_key'" :value="$setting->recaptcha_secret_key" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Form Adresler</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'İletişim Adresi'" :labelClass="'form-label'"
                                                                    :placeholder="'iletisim@kallavi.net'" :class="'form-control'"
                                                                    :name="'contact_mail'" :value="$setting->contact_mail" />
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'E-Bülten'" :labelClass="'form-label'"
                                                                    :placeholder="'e-bulten@kallavi.net'" :class="'form-control'"
                                                                    :name="'bulletin_mail'" :value="$setting->bulletin_mail" />
                                                                <x-admin.form-input :inputParentClass="'mb-6 fv-row'" :inputRow="''"
                                                                    :inputRowClass="'col-6 input-group-lg'" :labelTag="'label'"
                                                                    :labelText="'İstek Şikayet'" :labelClass="'form-label'"
                                                                    :placeholder="'sikayet@kallavi.net'" :class="'form-control'"
                                                                    :name="'request_mail'" :value="$setting->request_mail" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :imgUrl="'/' . $setting->{'logo:tr'}" :removaAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :name="'logo:tr'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo - Koyu Tema</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'"
                                                        :imgUrl="'/' . $setting->{'dark_logo:tr'}" :class="'mb-3'" :name="'dark_logo:tr'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Favicon(Simge)</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :removaAvatar="''" :size="'w-150px h-150px'" :parentClass="'my-3 text-center'"
                                                        :imgUrl="'/' . $setting->favicon" :class="'mb-3'" :name="'favicon'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-success w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control'" :name="'seo_keywords:tr'" :value="$setting->{'seo_keywords:tr'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'" :placeholder="'Açıklama Girin'"
                                                        :rows="'4'" :name="'seo_description:tr'" :value="$setting->{'seo_description:tr'}" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'"
                                                                    :placeholder="'Başlık'" :class="'form-control'"
                                                                    :name="'name:en'" :value="$setting->{'name:en'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'"
                                                                    :placeholder="'Url'" :class="'form-control'"
                                                                    :name="'slug:en'" :value="$setting->{'slug:en'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Site Açıklaması'" :labelClass="'form-label'"
                                                                    :placeholder="''" :class="'form-control'"
                                                                    :name="'description:en'" :value="$setting->{'description:en'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Adres'" :labelClass="'form-label'"
                                                                    :placeholder="'Akşemsettin Mh. Şair Fuzuli Sk. No: 22'" :class="'form-control'"
                                                                    :name="'address:en'" :value="$setting->{'address:en'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :imgUrl="'/' . $setting->{'logo:en'}" :removaAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :name="'logo:en'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo - Koyu Tema</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :imgUrl="'/' . $setting->{'dark_logo:en'}" :removaAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :name="'dark_logo:en'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-success w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control'" :name="'seo_keywords:en'" :value="$setting->{'seo_keywords:en'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :name="'seo_description:en'" :labelClass="'form-label'"
                                                        :placeholder="'Açıklama Girin'" :value="$setting->{'seo_description:en'}" :rows="'4'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                            <x-admin.tab :tabsType1="'true'" :tabId="'kt_customer_view_overview_events_and_logs_tab2'">
                                <x-slot:tabContent>
                                    <div class="d-flex flex-column flex-xl-row">
                                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 ">
                                            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 mb-6 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Genel</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.custom-grid>
                                                            <x-slot:gridRow>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'"
                                                                    :placeholder="'Başlık'" :class="'form-control text-end'"
                                                                    :name="'name:ar'" :value="$setting->{'name:ar'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'"
                                                                    :placeholder="'Url'" :class="'form-control text-end'"
                                                                    :name="'slug:ar'" :value="$setting->{'slug:ar'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Site Açıklaması'" :labelClass="'form-label'"
                                                                    :placeholder="''" :class="'form-control text-end'"
                                                                    :name="'description:ar'" :value="$setting->{'description:ar'}" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'Adres'" :labelClass="'form-label'"
                                                                    :placeholder="'Akşemsettin Mh. Şair Fuzuli Sk. No: 22'" :class="'form-control text-end'"
                                                                    :name="'address:ar'" :value="$setting->{'address:ar'}" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>

                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :imgUrl="'/' . $setting->{'logo:ar'}" :removaAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :name="'logo:ar'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Site Logo - Koyu Tema</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :positionCB="''" :changeAvatar="''"
                                                        :imgUrl="'/' . $setting->{'dark_logo:ar'}" :removaAvatar="''" :size="'w-150px h-150px'"
                                                        :parentClass="'my-3 text-center'" :class="'mb-3'" :name="'dark_logo:ar'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-success w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :placeholder="'Anahtar Kelime'"
                                                        :class="'form-control text-end'" :name="'seo_keywords:ar'" :value="$setting->{'seo_keywords:ar'}" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'" :class="'text-end'"
                                                        :labelText="'Sayfa Açıklaması'" :name="'seo_description:ar'" :labelClass="'form-label'"
                                                        :placeholder="'Açıklama Girin'" :value="$setting->{'seo_description:ar'}" :rows="'4'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                        </div>
                                    </div>
                                </x-slot:tabContent>
                            </x-admin.tab>
                        </x-slot:tabsContent>
                    </x-admin.tab>
                </x-slot:form>
            </x-admin.form>
        </x-slot:content>
    </x-admin.wrapper-container>
@endsection

@section('script')
    @if ($status = Session::get('status'))
        @if ($message = Session::get('message'))
            <script>
                $('body').append(`
        <div class="toast align-items-center show bg-{{ $status }} position-absolute py-3 px-3" role="alert" aria-live="assertive" aria-atomic="true" style="right: 10px; bottom: 10px;">
            <div class="d-flex">
                <img class="me-3" src="../../assets/images/{{ $status }}.svg" alt="">
            <div class="toast-body text-white fw-medium fs-6">
                {{ $message }}
            </div>
                <button type="button" style="filter:invert(1)" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        `);
            </script>
        @endif
    @endif
    <script>
        //Tagify
        var seo_tr = document.querySelector("#seo_keywords_tr");
        var seo_en = document.querySelector("#seo_keywords_en");
        new Tagify(seo_tr);
        new Tagify(seo_en);

        $('.btn-create').click(function() {
            $('.create_form').trigger('submit');
        });

        $('.btn-reset').click(function() {
            $('.create_form').trigger('reset');
        });

        $('.btn-back').click(function() {
            window.history.back();
        });
    </script>
@endsection
