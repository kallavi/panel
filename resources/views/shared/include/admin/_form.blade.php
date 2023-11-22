<form id="kt_project_settings_form" class="form">
    <x-admin.card :class="'mb-5 mb-xl-10'" :cardBodyClass="'mb-9'" :footerClass="'d-flex justify-content-end py-6 px-9'">
        <x-slot:cardBody>
            <x-admin.form-dropzone />

            <x-admin.form-dropzone :class="'fv-row mb-2 mt-5'">
                <x-slot:uploadContainer>
                    <x-admin.tags-wrapper :class="'dropzone upload-container'" :id="'kt_ecommerce_add_product_media'">
                        <x-slot:tagsWrapper>
                            <x-admin.tags-wrapper :class="'dz-message needsclick'">
                                <x-slot:tagsWrapper>
                                    <x-admin.form-label :title="''" :titleTag="'i'" :class="'ki-outline ki-file-up text-primary fs-3x'" />

                                    <x-admin.tags-wrapper :class="'ms-4'">
                                        <x-slot:tagsWrapper>
                                            <x-admin.form-label :titleTag="'h3'" :class="'fs-5 fw-bold text-gray-900 mb-1'"
                                                :title="'Drop files here or click to upload.'" />
                                            <x-admin.form-label :titleTag="'span'" :class="'fs-7 fw-semibold text-gray-400'"
                                                :title="'Upload up to 10 files'" />
                                        </x-slot:tagsWrapper>
                                    </x-admin.tags-wrapper>
                                    <x-admin.form-input :type="'file'" :name="'photos[]'" :id="'file_upload'"
                                        :class="'fileUploadInput'" multiple />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:tagsWrapper>
                    </x-admin.tags-wrapper>
                    <x-admin.form-label :titleTag="'div'" :class="'text-muted fs-7'" :title="'Set the product media gallery.'" />
                </x-slot:uploadContainer>
            </x-admin.form-dropzone>
            <x-admin.form-dropzone :id="'testdropzona'"/>

            <x-admin.tags-wrapper>
                <x-slot:tagsWrapper>
                    <x-admin.form-input :id="'kt_ecommerce_add_category_meta_keywords'" :name="'kt_ecommerce_add_category_meta_keywords'" :class="'form-control mb-2'" :labelTag="'label'"
                        :labelClass="'form-label'" :labelText="'Meta Tag Keywords'" />
                    <x-admin.form-label :class="'text-muted fs-7'" :titleTag="'div'" :title="'Set a list of keywords that the category is related to. Separate the keywords by adding a comma
                                                                                                                                            <code>,</code>between each keyword.'" />
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.form-input :class="'form-control form-control-solid w-250px ps-12'" :placeholder="'Search Order'" :data-kt-ecommerce-order-filter="'search'" :iconTag="'i'"
                :iconClass="'ki-outline ki-magnifier fs-3 position-absolute ms-4'" :inputParentClass="'d-flex align-items-center position-relative my-4'" />
            <x-admin.tags-wrapper :class="'row mb-5'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Project Logo'" :titleParent="'col-xl-3'" :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.tags-wrapper :class="'col-lg-8'">
                        <x-slot:tagsWrapper>
                            <x-admin.image-input>
                                <x-slot:imageFileInput>
                                    <x-admin.form-label :titleTag="'label'" :title="'Change avatar'" :class="'btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow'"
                                        :data-kt-image-input-action="'change'" :data-bs-toggle="'tooltip'">
                                        <x-slot:title>
                                            <x-admin.form-input :type="'file'" :name="'avatar'" :accept="'.png, .jpg, .jpeg'"
                                                :iconTag="'i'" :iconClass="'ki-outline ki-pencil fs-7'" />
                                            <x-admin.form-input :type="'hidden'" :name="'avatar_remove'" />
                                        </x-slot:title>
                                    </x-admin.form-label>
                                    <x-admin.form-label :titleTag="'span'" :class="'deneme btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow'" :data-kt-image-input-action="'cancel'"
                                        :data-bs-toggle="'tooltip'" :title="'Cancel avatar'" :aria-label="'Cancel avatar'" :data-kt-initialized="'1'">
                                        <x-slot:title>
                                            {{-- <x-admin.form-label :titleTag="'i'" :class="'ki-outline ki-cross fs-2'" /> --}}
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </x-slot:title>
                                    </x-admin.form-label>
                                    <x-admin.form-label :titleTag="'span'" :class="'deneme btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow'" :data-kt-image-input-action="'remove'"
                                        :data-bs-toggle="'tooltip'" :title="'Remove avatar'" :aria-label="'Remove avatar'" :data-kt-initialized="'1'">
                                        <x-slot:title>
                                            {{-- <x-admin.form-label :titleTag="'i'" :class="'ki-outline ki-cross fs-2'" /> --}}
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </x-slot:title>
                                    </x-admin.form-label>
                                </x-slot:imageFileInput>
                            </x-admin.image-input>
                            <x-admin.form-label :class="'form-text'" :title="'Allowed file types: png, jpg, jpeg.'" />
                        </x-slot:tagsWrapper>
                    </x-admin.tags-wrapper>
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row mb-8'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Project Name'" :titleParent="'col-xl-3'" :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.form-input :type="'text'" :inputWrapperClass="'col-xl-9 fv-row'" :class="'form-control form-control-solid'"  :value="'Component İnput Error'"
                    :error="'true'"
                         />
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row mb-8'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Project Type'" :titleParent="'col-xl-3'" :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.form-input :inputWrapperClass="'col-xl-9 fv-row'" :class="'form-control form-control-solid'" :value="'component input disabled'" 
                        :isDisabled="'true'"
                    />
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row mb-8'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Project Description'" :titleParent="'col-xl-3'" :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.form-textarea :textareaWrapperClass="'col-xl-9 fv-row'" :class="'form-control-solid h-100px'" :name="'description'"
                        :textareaContent="'Organize your thoughts with an outline.'" />
                    <!---Asagıdakı gibi acık slot halı ıle de ıcerık gırısı yapılabılır yazılabılır.-->
                    {{-- <x-admin.form-textarea :textareaWrapper="'true'" :textareaWrapperClass="'col-xl-9 fv-row'" :class="'form-control-solid h-100px'" :name="'description'" >
                        <x-slot:textareaContent>
                        Organize your thoughts with an outline
                        </x-slot:textareaContent>
                    </x-admin.form-textarea> --}}
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row mb-8'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Due Date'" :titleParent="'col-xl-3'"
                        :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <!--end::Col-->
                    <!--begin::Col-->
                    {{-- <div class="position-relative d-flex align-items-center">
                        <i class="ki-outline ki-calendar-8 position-absolute ms-4 mb-1 fs-2"></i>
                        <input class="form-control form-control-solid ps-12" name="date" placeholder="Pick a date" id="kt_datepicker_1" />
                    </div> --}}
                    <!--Yukarıda comment satırındaki div gibi yazılıp dısına bır kapsayıcı daha alır-->
                    <x-admin.form-input :inputParentClass="'position-relative d-flex align-items-center'" :inputWrapperClass="'col-xl-9 fv-row'" :id="'kt_datepicker_1'" :name="'date'"
                        :placeholder="'Pick a date'" :class="'form-control form-control-solid ps-12'" :iconTag="'i'" :iconClass="'ki-outline ki-calendar-8 position-absolute ms-4 mb-1 fs-2'" />
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row mb-8'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Notifications'" :titleParent="'col-xl-3'"
                        :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.tags-wrapper :class="'col-xl-9'">
                        <x-slot:tagsWrapper>
                            <x-admin.tags-wrapper :class="'d-flex fw-semibold h-100'">
                                <x-slot:tagsWrapper>
                                    <x-admin.form-input :inputParentClass="'form-check form-check-custom form-check-solid me-9'" {{-- :inputWrapperClass="'d-flex fw-semibold h-100'"  --}} :id="'email'"
                                        :type="'checkbox'" :class="'form-check-input'" :labelRight="'true'" :labelTag="'label'"
                                        :labelClass="'form-check-label ms-3'" :labelFor="'email'" :labelText="'Email'" />
                                    <x-admin.form-input :inputParentClass="'form-check form-check-custom form-check-solid'" :id="'phone'" :type="'checkbox'"
                                        :checked="'checked'" :class="'form-check-input'" :labelRight="'true'" :labelTag="'label'"
                                        :labelClass="'form-check-label ms-3'" :labelFor="'phone'" :labelText="'Phone'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:tagsWrapper>
                    </x-admin.tags-wrapper>
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper :class="'row'">
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'div'" :title="'Status'" :titleParent="'col-xl-3'"
                        :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.form-input :inputWrapperClass="'col-xl-9'" :inputParentClass="'form-check form-switch form-check-custom form-check-solid'" :id="'status'" :type="'checkbox'"
                        :name="'status'" :checked="'checked'" :class="'form-check-input'" :labelRight="'true'"
                        :error="''" :labelTag="'label'" :labelClass="'form-check-label fw-semibold text-gray-400 ms-3'" :labelFor="'status'"
                        :labelText="'Active'" />
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
            <x-admin.tags-wrapper>
                <x-slot:tagsWrapper>
                    <x-admin.form-label :titleTag="'label'" :title="'Select'" :titleParent="'col-xl-3'"
                        :class="'fs-6 fw-semibold mt-2 mb-3'" />
                    <x-admin.form-select :id="'kt_ecommerce_add_product_status_select'" :class="'mb-2'" :defaultValue="'edddd'" :options="[
                            '-1' => 'Option0',
                            '1' => 'Option1',
                            '2' => 'Option2',
                            'edddd' => 'Option3',
                            '4' => 'Option4',
                        ]"
                        :data="[
                            'hide-search' => 'true',
                            'control' => 'select2',
                            'placeholder' => 'Select an option',
                        ]" :attr="[
                            'deneme' => 'test',
                        ]">
                    </x-admin.form-select>


                    <div class="input-group w-250px">
                        <input class="form-control form-control-solid rounded rounded-end-0" placeholder="Pick date range"
                            id="kt_datepicker_3" />
                        <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                            <i class="ki-outline ki-cross fs-2"></i>
                        </button>
                    </div>
                </x-slot:tagsWrapper>
            </x-admin.tags-wrapper>
        </x-slot:cardBody>

        <x-slot:cardFooter>
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
        </x-slot:cardFooter>
    </x-admin.card>
</form>

@section('script')
    <script type="text/javascript">
        //Tagify
        var input1 = document.querySelector("#kt_ecommerce_add_category_meta_keywords");
        new Tagify(input1);

        var t;
        $("#kt_datepicker_1").flatpickr({
            onReady: function () {
                this.jumpToDate("2025-01")
            },
            disable: ["2025-01-10", "22025-01-11", "2025-01-12", "2025-01-13", "2025-01-14", "2025-01-15", "2025-01-16", "2025-01-17"],
            dateFormat: "Y-m-d",
                });

        $("#kt_datepicker_3").flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    </script>
@endsection
