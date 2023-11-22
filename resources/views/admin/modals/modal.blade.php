<!---Menü Modal--->
<x-admin.modal :id="'kt_modal_stacked_1'" :modalTitle="'Sayfa Modül İzinleri'" :headerNotBorder="''" :titleCenter="''">
    <x-slot:modalBody>
        <x-admin.custom-grid>
            <x-slot:gridRow>
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'Sayfa Görseli'" />
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'Foto Galeri Modülü'" />
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'Video Galeri Modülü'" />
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'Döküman Modülü'" />
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'Kısa Açıklama'" />
                <x-admin.form-input :inputParentClass="'form-check form-switch form-check-custom form-check-solid my-3 col-6'" :id="'status'" :type="'checkbox'" :name="'status'"
                    :checked="'checked'" :class="'form-check-input'" :labelTag="'label'" :labelRight="'true'" :labelClass="'form-check-label ms-3 text-gray-500 fs-5 fw-medium'"
                    :labelText="'İçerik Alanı 1'" />

                <x-admin.button :ubttonWrapper="'col-12'" :title="'Kaydet'" :class="'d-flex flex-center h-35px h-lg-40px w-auto mx-auto mt-10'" :color="'primary'" />
            </x-slot:gridRow>
        </x-admin.custom-grid>
    </x-slot:modalBody>
</x-admin.modal>

<!---Destek Talebi Olustur Modal--->
<x-admin.modal :id="'destekTalebi'" :modalTitle="'Create Ticktet'" :headerNotBorder="''" :titleCenter="''" :footerClass="'justify-content-center'"
    :footerNotBorder="''">
    <x-slot:textMuted>
        If you need more info, please check
        <a href="#" class="fw-bold link-primary">Bidding Guidelines</a>.
    </x-slot:textMuted>
    <x-slot:modalBody>
        <x-admin.custom-grid>
            <x-slot:gridRow>
                <x-admin.form-input :inputParentClass="'input-group-lg mb-6 fv-row'" :labelTag="'label'" :labelText="'Description'" :labelClass="'form-label required'"
                    :placeholder="'Enter your ticket subject'" :class="'form-control'" />
                <x-admin.form-textarea :inputParentClass="'input-group-lg mb-6 fv-row'" :labelTag="'label'" :labelText="'İçerik'" :labelClass="'form-label'"
                    :placeholder="'İçerik'" :rows="'9'" :resizeNone="''" />

                <x-admin.form-dropzone :class="'fv-row mb-2'" :labelTag="'label'" :labelText="'Attachments'" :labelClass="'form-label'"
                    :id="'kt_ecommerce_add_product_media'" />

                {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button> --}}

            </x-slot:gridRow>
        </x-admin.custom-grid>
    </x-slot:modalBody>
    <x-slot:modalFooter>
        <x-admin.button :title="'Close'" :type="'button'" :light="''" :color="'primary'"
            :data="['bs-dismiss' => 'modal']" />
        <x-admin.button :title="'Submit'" :color="'primary'" />
    </x-slot:modalFooter>
</x-admin.modal>


<!---Formlar Detay Modal--->
<x-admin.modal :id="'istekoneriform'" :lg="''" :footerClass="'me-auto px-18'" :headerClass="'px-18'" :modalTitle="'İstek Öneri ve Şikayet #324523'"
    :headerNotBorder="''" :footerNotBorder="''">
    <x-slot:modalBody>
        <x-admin.custom-grid>
            <x-slot:gridRow>
                <x-admin.custom-grid :colLg="'6'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'Adı'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'Fatih'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
                <x-admin.custom-grid :colLg="'6'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'Soyadı'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'Nişancı'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
                <x-admin.custom-grid :colLg="'6'" :colClass="'mt-10'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'E-Posta'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'fthnsnci@gmail.com'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
                <x-admin.custom-grid :colLg="'6'" :colClass="'mt-10'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'Telefon'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'+905418611191'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
                <x-admin.custom-grid :colLg="'12'" :colClass="'mt-10'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'Mesaj Konusu'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'İstek Öneri ve Şikayet'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
                <x-admin.custom-grid :colLg="'12'" :colClass="'mt-10'">
                    <x-slot:gridCol>
                        <x-admin.form-label :labelTag="'div'" :title="'Mesajı'" :class="'text-gray-300 fs-7 fw-medium'" />
                        <x-admin.form-label :labelTag="'div'" :title="'Çevremizdeki doğal güzelliklere ve çevreye duyduğumuz sevgiye rağmen, maalesef son zamanlarda çevre kirliliği artıyor. Özellikle çöp atıkları ve hava kirliliği, çevremizi olumsuz etkiliyor. Bu sorunlarla ilgilenmeye ve daha temiz bir çevre için çaba göstermeye devam etmeliyiz.'" :class="'text-indigo2 fs-6 fw-medium'" />
                    </x-slot:gridCol>
                </x-admin.custom-grid>
            </x-slot:gridRow>
        </x-admin.custom-grid>
    </x-slot:modalBody>
    <x-slot:modalFooter>
        <x-admin.button :title="'Kapat'" :type="'button'" :color="'danger'" :data="['bs-dismiss' => 'modal']" />
    </x-slot:modalFooter>
</x-admin.modal>



<!---Dökümanlar Modal--->
<x-admin.modal :id="'dokumanlarModal'" :lg="''">
    <x-slot:modalBody>
        <x-admin.form-dropzone :parentClass="'fv-row mb-2 mt-5'" :messageClass="'align-items-center'" :fontClass="'text-gray-800 fw-medium fs-4'" :notSumTitle="''"
            :id="'testDropzone2'" />

    </x-slot:modalBody>
</x-admin.modal>
