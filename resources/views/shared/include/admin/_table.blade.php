<x-admin.card :cardBodyClass="'p-0'">
    <x-slot:cardHeader>
        <div class="card-title">
            <h3>Login Sessions</h3>
        </div>
        <div class="card-toolbar">
            <div class="my-1 me-4">
                <x-admin.form-select :class="'form-select-sm form-select-solid w-125px'" :defaultValue="'1'" :options="[
                    '1' => '1 Hours',
                    '2' => '6 Hours',
                    '3' => '12 Hours',
                    '4' => '24 Hours',
                ]" :data="[
                    'hide-search' => 'true',
                    'control' => 'select2',
                    'placeholder' => 'Select Hours',
                ]" />
            </div>
            <x-admin.button :title="'View All'" :class="'btn-primary my-1'" :small="'true'" :link="'javascript:;'" />
        </div>

    </x-slot:cardHeader>
    <x-slot:cardBody>
        <x-admin.table :class="'align-middle table-row-bordered table-row-solid gy-4 gs-9'" :theadClass="'border-gray-200 fs-5 fw-semibold bg-lighten'" :tbodyClass="'fw-6 fw-semibold text-gray-600'" :isResponsive="'true'">
            <x-slot:columns>
                <th class="min-w-250px">Location</th>
                <th class="min-w-100px">Status</th>
                <th class="min-w-150px">Device</th>
                <th class="min-w-150px">IP Address</th>
                <th class="min-w-150px">Time</th>
            </x-slot:columns>
            <x-slot:rows>
                <tr>
                    <td>
                        <a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
                    </td>
                    <td>
                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                    </td>
                    <td>Chrome - Windows</td>
                    <td>236.125.56.78</td>
                    <td>2 mins ago</td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="text-hover-primary text-gray-600">United Kingdom(10)</a>
                    </td>
                    <td>
                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                    </td>
                    <td>Safari - Mac OS</td>
                    <td>236.125.56.78</td>
                    <td>10 mins ago</td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
                    </td>
                    <td>
                        <span class="badge badge-light-danger fs-7 fw-bold">ERR</span>
                    </td>
                    <td>Firefox - Windows</td>
                    <td>236.125.56.10</td>
                    <td>20 mins ago</td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
                    </td>
                    <td>
                        <span class="badge badge-light-success fs-7 fw-bold">OK</span>
                    </td>
                    <td>iOS - iPhone Pro</td>
                    <td>236.125.56.54</td>
                    <td>30 mins ago</td>
                </tr>
                <tr>
                    <td>
                        <a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
                    </td>
                    <td>
                        <span class="badge badge-light-warning fs-7 fw-bold">WRN</span>
                    </td>
                    <td>Samsung Noted 5- Android</td>
                    <td>236.100.56.50</td>
                    <td>40 mins ago</td>
                </tr>
            </x-slot:rows>
        </x-admin.table>
    </x-slot:cardBody>
</x-admin.card>

<x-admin.card>
    <x-slot:cardBody>
        <x-admin.table :id="'kt_ecommerce_report_views_table'" :class="'align-middle table-row-dashed fs-6 gy-5'" :tbodyClass="'fw-semibold text-gray-600'" :isResponsive="'true'" :theadRowClass="'text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0'">
            <x-slot:columns>
                <th class="min-w-150px">Product</th>
                <th class="text-end min-w-100px">SKU</th>
                <th class="text-end min-w-100px">Rating</th>
                <th class="text-end min-w-100px">Price</th>
                <th class="text-end min-w-70px">Viewed</th>
                <th class="text-end min-w-100px">Percent</th>
            </x-slot:columns>
            <x-slot:rows>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <!--begin::Thumbnail-->
                            <a href="../../demo27/dist/apps/ecommerce/catalog/edit-product.html"
                                class="symbol symbol-50px">
                                <span class="symbol-label"
                                    style="background-image:url(assets/media//stock/ecommerce/23.png);"></span>
                            </a>
                            <!--end::Thumbnail-->
                            <div class="ms-5">
                                <!--begin::Title-->
                                <a href="../../demo27/dist/apps/ecommerce/catalog/edit-product.html"
                                    class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                    data-kt-ecommerce-product-filter="product_name">Product 23</a>
                                <!--end::Title-->
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0">
                        <span class="fw-bold">01835007</span>
                    </td>
                    <td class="text-end pe-0" data-order="rating-3" data-filter="rating-3">
                        <div class="rating justify-content-end">
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0">
                        <span>$104.00</span>
                    </td>
                    <td class="text-end pe-0">
                        <span>263100</span>
                    </td>
                    <td class="text-end pe-0">26.31%</td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <!--begin::Thumbnail-->
                            <a href="../../demo27/dist/apps/ecommerce/catalog/edit-product.html"
                                class="symbol symbol-50px">
                                <span class="symbol-label"
                                    style="background-image:url(assets/media//stock/ecommerce/2.png);"></span>
                            </a>
                            <!--end::Thumbnail-->
                            <div class="ms-5">
                                <!--begin::Title-->
                                <a href="../../demo27/dist/apps/ecommerce/catalog/edit-product.html"
                                    class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                    data-kt-ecommerce-product-filter="product_name">Product 2</a>
                                <!--end::Title-->
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0">
                        <span class="fw-bold">03531008</span>
                    </td>
                    <td class="text-end pe-0" data-order="rating-3" data-filter="rating-3">
                        <div class="rating justify-content-end">
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label checked">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                            <div class="rating-label">
                                <i class="ki-outline ki-star fs-6"></i>
                            </div>
                        </div>
                    </td>
                    <td class="text-end pe-0">
                        <span>$203.00</span>
                    </td>
                    <td class="text-end pe-0">
                        <span>164380</span>
                    </td>
                    <td class="text-end pe-0">16.438%</td>
                </tr>
            </x-slot:rows>
        </x-admin.table>
    </x-slot:cardBody>
</x-admin.card>
