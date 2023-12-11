@extends('layout.admin.layout')
@section('pageTitle')
    Portfolyo Ekle
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Portfolyolar'" :link="route('admin.portfolio.index')" :class="'text-gray-600 fw-bold lh-1'" />
            <x-admin.breadcrumb-item :icon="'true'" />
            <x-admin.breadcrumb-item :title="'Portfolyo Ekle'" :class="'text-gray-600 fw-bold lh-1'" />

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
            <x-admin.button :title="'Kaydet'" :class="'d-flex flex-center h-35px h-lg-40px ms-5 btn-create'" :color="'primary'" :data="[
                'bs-toggle' => 'modal',
                'bs-target' => '#kt_modal_create_campaign',
            ]" />
        </x-slot:tagsWrapper>
    </x-admin.tags-wrapper>
@endsection
@section('app')
    <x-admin.wrapper-container>
        <x-slot:content>
            <!--begin:::Tabs-->
            <x-admin.tab :tabsType1="'true'" :class="'nav-custom nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8'" :tabNavs="'true'" :tabItem="[
                'kt_customer_view_overview_tab' => 'Türkçe',
                'kt_customer_view_overview_events_and_logs_tab' => 'İngilizce',
                'kt_customer_view_overview_events_and_logs_tab2' => 'Arapça',
            ]">
            </x-admin.tab>

            <x-admin.form :id="'kt_ecommerce_add_product_form'" :action="route('admin.portfolio.store')" :method="'POST'" :class="'news_create_form'">
                <x-slot:form>
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
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Başlık'" :labelClass="'form-label required'" :name="'name:tr'"
                                                                    :placeholder="'Başlık'" :class="'form-control name-tr'" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :labelClass="'form-label'" :name="'slug:tr'"
                                                                    :placeholder="'Url'" :class="'form-control url-tr'" />

                                                                <x-admin.form-select :inputParentClass="'col-6'" :id="'ustmenu'"
                                                                    :class="'mb-2'" :labelTag="'label'" :labelText="'Kategori Seçiniz'"
                                                                    :labelClass="'form-label'" :data="[
                                                                        'hide-search' => 'true',
                                                                        'control' => 'select2',
                                                                        'placeholder' => 'Kategori seçiniz',
                                                                    ]" :attr="[]"
                                                                    :name="'category'">
                                                                    <x-slot:customOptions>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->{'name:tr'} }}</option>
                                                                        @endforeach
                                                                    </x-slot:customOptions>
                                                                </x-admin.form-select>
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'Tarih'" :labelClass="'form-label'" :placeholder="'15/04/2023'"
                                                                    :class="'form-control'" :name="'date'" />
                                                                <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'" :labelTag="'label'"
                                                                    :labelText="'İçerik'" :id="'description-tr'" :name="'description:tr'"
                                                                    :labelClass="'form-label'" :rows="'9'"
                                                                    :resizeNone="''" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Medya Galeri</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-dropzone :name="'photos[]'" :class="'fv-row mb-2 mt-5'"
                                                            :id="'kt_ecommerce_add_product_media'" />
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                                <x-admin.card :class="'card-flush border-0 bg-gray-300 bg-opacity-20 pt-12'" :cardHeaderClass="'min-h-25px'">
                                                    <x-slot:cardHeader>
                                                        <div class="card-title m-0">
                                                            <h2>Dokümanlar</h2>
                                                        </div>
                                                    </x-slot:cardHeader>
                                                    <x-slot:cardBody>
                                                        <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'" :name="'documents[]'" :id="'kt_ecommerce_add_product_media'" />
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Görsel</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.image-input :changeAvatar="''" :name="'image'"
                                                        :size="'w-150px h-150px'" :parentClass="'my-3 text-center'" :class="'mb-3'"
                                                        :textMuted="'Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'border-0 card-flush bg-gray-300 bg-opacity-20 py-4'" :cardBodyClass="'pt-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>Durum</h2>
                                                    </div>
                                                    <div class="card-toolbar">
                                                        <div class="rounded-circle bg-primary w-15px h-15px"
                                                            id="kt_ecommerce_add_product_status"></div>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-select :defaultValue="'published'" :name="'status'"
                                                        :options="[
                                                            'published' => 'Yayınlanmış',
                                                            'draft' => 'Pasif',
                                                        ]" />
                                                    <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid mt-8'" :id="'featured'"
                                                        :type="'checkbox'" :name="'featured'" :value="'checked'"
                                                        :checked="'checked'" :class="'form-check-input'" :labelTag="'label'"
                                                        :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-700 fs-4 fw-medium'" :labelText="'Öne Çıkar'" />
                                                </x-slot:cardBody>
                                            </x-admin.card>
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :name="'seo_keywords:tr'"
                                                        :labelTag="'label'" :labelText="'Etiketler'" :labelClass="'form-label'"
                                                        :placeholder="'Anahtar Kelime'" :class="'form-control'" :id="'seo_keywords_tr'" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :name="'seo_description:tr'"
                                                        :labelTag="'label'" :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'"
                                                        :placeholder="'Açıklama Girin'" :rows="'4'" />
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
                                                                    :labelText="'Başlık'" :name="'name:en'"
                                                                    :labelClass="'form-label required'" :placeholder="'Başlık'"
                                                                    :class="'form-control name-en'" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :name="'slug:en'"
                                                                    :labelClass="'form-label'" :placeholder="'Url'"
                                                                    :class="'form-control url-en'" />
                                                                <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'"
                                                                    :labelTag="'label'" :labelText="'İçerik'"
                                                                    :id="'description-en'" :name="'description:en'"
                                                                    :labelClass="'form-label'" :rows="'9'"
                                                                    :resizeNone="''" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :name="'seo_keywords:en'"
                                                        :id="'seo_keywords_en'" :placeholder="'Anahtar Kelime'" :class="'form-control'" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :labelClass="'form-label'" :name="'seo_description:en'"
                                                        :placeholder="'Açıklama Girin'" :rows="'4'" />
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
                                                                    :labelText="'Başlık'" :name="'name:ar'"
                                                                    :labelClass="'form-label required'" :placeholder="'Başlık'"
                                                                    :class="'form-control text-end name-ar'" />
                                                                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row col-6'" :labelTag="'label'"
                                                                    :labelText="'URL'" :name="'slug:ar'"
                                                                    :labelClass="'form-label'" :placeholder="'Url'"
                                                                    :class="'form-control text-end url-ar'" />
                                                                <x-admin.form-textarea :inputParentClass="'mb-6 fv-row col-12'"
                                                                    :labelTag="'label'" :labelText="'İçerik'"
                                                                    :id="'description-ar'" :name="'description:ar'"
                                                                    :labelClass="'form-label'" :rows="'9'"
                                                                    :resizeNone="''" :class="'text-end'" />
                                                            </x-slot:gridRow>
                                                        </x-admin.custom-grid>
                                                    </x-slot:cardBody>
                                                </x-admin.card>
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px min-w-lg-300px mb-7 ms-lg-10">
                                            <x-admin.card :class="'card-flush py-4 bg-gray-300 bg-opacity-20 border-0'">
                                                <x-slot:cardHeader>
                                                    <div class="card-title">
                                                        <h2>SEO</h2>
                                                    </div>
                                                </x-slot:cardHeader>
                                                <x-slot:cardBody>
                                                    <x-admin.form-input :inputParentClass="'input-group-lg mb-6'" :labelTag="'label'"
                                                        :labelText="'Etiketler'" :labelClass="'form-label'" :name="'seo_keywords:ar'"
                                                        :id="'seo_keywords_ar'" :placeholder="'Anahtar Kelime'" :class="'form-control text-end'" />
                                                    <x-admin.form-textarea :inputParentClass="'mb-6'" :labelTag="'label'"
                                                        :labelText="'Sayfa Açıklaması'" :class="'text-end'" :labelClass="'form-label'"
                                                        :name="'seo_description:ar'" :placeholder="'Açıklama Girin'" :rows="'4'" />
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
    <script>
        //Tagify
        var seo_tr = document.querySelector("#seo_keywords_tr");
        var seo_en = document.querySelector("#seo_keywords_en");
        var seo_ar = document.querySelector("#seo_keywords_ar");
        new Tagify(seo_tr);
        new Tagify(seo_en);
        new Tagify(seo_ar);

        $('.btn-create').click(function() {
            $('.news_create_form').trigger('submit');
        });

        $('.btn-reset').click(function() {
            $('.news_create_form').trigger('reset');
        });

        $('.btn-back').click(function() {
            window.history.back();
        });

        $('.name-tr').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            console.log($(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-tr').val(result);
                },
            });
        });

        $('.name-en').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-en').val(result);
                },
            });
        });

        $('.name-ar').on('keyup', function() {
            var fd = new FormData;
            fd.append('name', $(this).val());
            fd.append('_token', '{{ @csrf_token() }}');
            $.ajax({
                url: "{{ route('slug.generate') }}",
                // datatype: "html",
                processData: false, // Important!
                contentType: false,
                type: "post",
                data: fd,
                success: function(result) {
                    $('.url-ar').val(result);
                },
            });
        });

        ClassicEditor.create(document.querySelector('#brief-tr'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#description-tr'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#brief-en'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#description-en'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#brief-ar'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create(document.querySelector('#description-ar'), {
                image: {
                    toolbar: ['imageStyle:full', 'imageStyle:side', '|', 'imageTextAlternative'],
                    upload: {
                        types: ['webp', 'tiff', 'jpeg', 'jpg', 'png', 'gif', 'bmp', 'svg+xml']
                    }
                }
            })
            .then(editor => {
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
