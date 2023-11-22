@extends('layout.admin.layout')
@section('pageTitle')
Başlangıç
@endsection
@section('breadcrumbs')
    <x-admin.breadcrumb-item :parent="''">
        <x-slot:item>
            <x-admin.breadcrumb-item :icon="'true'" :fontSize="'fs-6'" :link="route('backoffice.index')" :iconName="'ki-home'" />
        </x-slot:item>
    </x-admin.breadcrumb-item>
@endsection
@section('app')
    <x-admin.custom-grid :rowClass="'g-5 g-xl-8 mx-auto px-8'" :rowCols="'12'">
        <x-slot:gridRow>
            {{--  <x-admin.custom-grid :colXl="'9'">
                <x-slot:gridCol>
                    <x-admin.card :class="'card-xl-strech border-0'" :cardHeaderClass="'border-0 pt-5'" :rightTool="''">
                        <x:slot:cardHeader>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Ziyaretçiler</span>
                            </h3>
                        </x:slot:cardHeader>
                        <x-slot:cardToolbar>
                            <x-admin.button :id="'kt_daterangepicker_4'" :class="'d-flex align-items-center px-4'" :color="'light'" :small="''">
                                <x-slot:buttonContain>
                                    <div class="text-gray-600 fw-bold dateText">11 Ocak 2023</div>
                                    <i class="ki-duotone ki-calendar fs-1 ms-2 me-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span class="path6"></span></i>
                                </x-slot:buttonContain>
                            </x-admin.button>
                        </x-slot:cardToolbar>
                        <x-slot:cardBody>
                            <x-admin.custom-grid :rowClass="'mb-5'">
                                <x-slot:gridRow>
                                    <x-admin.custom-grid :colClass="''" :col="'3'">
                                        <x-slot:gridCol>
                                            <div>
                                                <div class="d-flex mb-2">
                                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">12,706</span>
                                                </div>
                                                <span class="fs-6 fw-semibold text-gray-400">Bu Ay</span>
                                            </div>
                                        </x-slot:gridCol>
                                    </x-admin.custom-grid>
                                    <x-admin.custom-grid :colClass="'border-end-dashed border-end border-start-dashed border-start border-gray-300 d-flex flex-column align-items-center text-left'" :col="'3'">
                                        <x-slot:gridCol>
                                            <div>
                                                <div class="d-flex mb-2">
                                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">8,035</span>
                                                </div>
                                                <span class="fs-6 fw-semibold text-gray-400">Bu Hafta</span>
                                            </div>
                                        </x-slot:gridCol>
                                    </x-admin.custom-grid>
                                    <x-admin.custom-grid :colClass="'d-flex flex-column align-items-center text-left'" :col="'3'">
                                        <x-slot:gridCol>
                                            <div>
                                                <div class="d-flex mb-2">
                                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1 ls-n2">1,253</span>
                                                </div>
                                                <span class="fs-6 fw-semibold text-gray-400">Bugün</span>
                                            </div>
                                        </x-slot:gridCol>
                                    </x-admin.custom-grid>
                                </x-slot:gridRow>
                            </x-admin.custom-grid>
                            <!--Chart-->
                            <div id="kt_charts_custom"></div>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>  --}}
            {{--  <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-success bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$page" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam İçerik'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-primary bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$news" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam Haber'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-warning bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$blog" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam Blog'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-danger bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$project" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam Proje'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-dark bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$user" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam Kullanıcı'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-danger bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="$project" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-semibold fs-6'" :title="'Toplam Proje'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :link="'/backoffice/menus'" :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :class="'border-0 bg-info bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="'Menüler'" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-info fw-semibold fs-6'" :title="'Menüler'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            <x-admin.custom-grid :colClass="'d-flex flex-column flex-stack'" :colXl="'3'">
                <x-slot:gridCol>
                    <x-admin.card :rootLink="'home/edit'" :class="'border-0 bg-success bg-opacity-70 rounded-2 px-6 py-5 w-100'" :noPadding="''">
                        <x-slot:cardBody>
                            <x-admin.tags-wrapper :symbol="''" :class="'symbol-30px mb-4 mb-8'" :noneBg="''" :symbolLabel="''" :iconClass="'ki-duotone ki-profile-user fs-1 text-white'">
                                <x-slot:iconPart>
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </x-slot:iconPart>
                            </x-admin.tags-wrapper>
                            <x-admin.tags-wrapper :class="'m-0'">
                                <x-slot:tagsWrapper>
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-white fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1'" :title="'Site Ayarları'" />
                                    <x-admin.tags-wrapper :tagsWrapper="''" :tags="'span'" :class="'text-success fw-semibold fs-6'" :title="'Site Ayarları'" />
                                </x-slot:tagsWrapper>
                            </x-admin.tags-wrapper>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>  --}}
            <x-admin.custom-grid :colXl="'12'">
                <x-slot:gridCol>
                    <x-admin.card :class="'card-xl-stretch mb-xl-8 border-0'" :cardHeaderClass="'align-items-center border-0 mt-4'" :cardBodyClass="'pt-5'">
                        <x-slot:cardHeader>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bold mb-2 text-dark">Aktiviteler - Bugün</span>
                            </h3>
                            <x-admin.button :class="'btn-light btn-color-gray-400 btn-active-color-primary justify-content-end'" :iconTag="'i'" :iconClass="'ki-outline ki-chart-line fs-2'" :title="'Tümü'" :buttonRouteLink="'activities'" />
                        </x-slot:cardHeader>
                        <x-slot:cardBody>
                            <x-admin.timeline-item :parentClass="''">
                                <x-slot:item>

                                    @foreach ($activity as $item)
                                        @if ($item->event == 'created')
                                            <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="\Carbon\Carbon::parse($item->created_at)->format('H:i')" :color="'success'" :text="$item->description" :textBold="'fw-bold text-gray-800'" />
                                        @elseif($item->event == 'deleted')
                                            <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="\Carbon\Carbon::parse($item->created_at)->format('H:i')" :color="'danger'" :textBold="'fw-bold text-gray-800'">
                                                <x-slot:text>
                                                    {{$item->created_at}}
                                                </x-slot:text>
                                            </x-admin.timeline-item>
                                        @elseif($item->event == 'deleted')
                                            <x-admin.timeline-item :labelClass="'fw-bold text-gray-800 fs-6'" :time="$item->description" :color="'primary'" :text="$item->description" />
                                        @endif

                                        {{-- <x-admin.timeline-item
                                            :labelClass="'fw-bold text-gray-800 fs-6'"
                                            :time="'08:42'"
                                            :color="'warning'"
                                            :text="'Outlines keep you honest. And keep structure'"
                                        /> --}}
                                    @endforeach
                                </x-slot:item>
                            </x-admin.timeline-item>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>
            {{--  <x-admin.custom-grid :colXl="'6'">
                <x-slot:gridCol>
                    <x-admin.card :class="'card-xl-stretch mb-xl-8 border-0'" :cardHeaderClass="'align-items-center border-0 mt-4'" :cardBodyClass="'pt-5'">
                        <x-slot:cardHeader>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bold mb-2 text-dark">Yeni Destek Talebi</span>
                            </h3>
                        </x-slot:cardHeader>
                        <x-slot:cardBody>
                            <x-admin.form :class="'form w-100'" :novalidate="'novalidate'" :id="'kt_sign_in_form'" :action="'#'" :dataKtRoute="[
                                'redirect-url' => 'home',
                            ]">
                                <x-slot:form>
                                    <x-admin.custom-grid>
                                        <x-slot:gridRow>
                                            <x-admin.form-input :inputParentClass="'fv-row mb-6 col-6'" :labelTag="'label'" :labelClass="'fs-6 fw-semibold form-label mt-3'" :labelText="'Başlık'" :class="'form-control form-control-solid'" />
                                            <x-admin.form-select :id="'kt_ecommerce_add_product_status_select'" :inputParentClass="'fv-row mb-6 col-6'" :class="'form-select form-select-solid select2-hidden-accessible'" :labelTag="'label'" :labelText="'Konu'"
                                                :labelClass="'fs-6 fw-semibold form-label mt-3'" :options="[
                                                    '-1' => 'Seçiniz',
                                                    '1' => 'Option1',
                                                    '2' => 'Option2',
                                                ]" :data="[
                                                    'hide-search' => 'true',
                                                    'control' => 'select2',
                                                    'placeholder' => 'Select an option',
                                                ]" :attr="[
                                                    'deneme' => 'test',
                                                ]">
                                            </x-admin.form-select>

                                            <x-admin.form-textarea :inputParentClass="'fv-row mb-6 col-12'" :class="'form-control-solid'" :labelTag="'label'" :labelText="'Açıklama'" :labelClass="'fs-6 fw-semibold form-label mt-3'"
                                                :rows="'7'" />

                                            <x-admin.button :buttonParentClass="'col'" :class="'btn w-auto'" :id="'kt_sign_in_submit'" :color="'primary'" :type="'submit'"
                                                :title="'Gönder'" />
                                        </x-slot:gridRow>
                                    </x-admin.custom-grid>

                                </x-slot:form>
                            </x-admin.form>
                        </x-slot:cardBody>
                    </x-admin.card>
                </x-slot:gridCol>
            </x-admin.custom-grid>  --}}
        </x-slot:gridRow>
    </x-admin.custom-grid>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $("#kt_ecommerce_report_views_table").dataTable();
        })
        moment.locale('tr');
        var start = moment().subtract(29, "days");
        var end = moment();

        function cb(start, end) {
            $("#kt_daterangepicker_4 .dateText").html(end.format("MMMM, YYYY"));
        }
        $("#kt_daterangepicker_4").daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                "Bugün": [moment(), moment()],
                "Dün": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Son 7 Gün": [moment().subtract(6, "days"), moment()],
                "Son 30 Gün": [moment().subtract(29, "days"), moment()],
                "Bu Ay": [moment().startOf("month"), moment().endOf("month")],
                "Geçen Ay": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            },
            "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "Uygula",
                "cancelLabel": "Vazgeç",
                "fromLabel": "Dan",
                "toLabel": "a",
                "customRangeLabel": "Seç",
                "daysOfWeek": [
                    "Pt",
                    "Sl",
                    "Çr",
                    "Pr",
                    "Cm",
                    "Ct",
                    "Pz"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
                "firstDay": 1
            }
        }, cb);

        cb(start, end);

        //chart
        (function() {
            var e = document.getElementById("kt_charts_custom");
            if (e) {
                var t = {
                        self: null,
                        rendered: !1
                    },
                    a = function() {
                        parseInt(KTUtil.css(e, "height"));
                        var a = KTUtil.getCssVariableValue("--bs-gray-500"),
                            o = KTUtil.getCssVariableValue("--bs-gray-200"),
                            r = KTUtil.getCssVariableValue("--bs-success"),
                            s = {
                                series: [{
                                    name: "Net Profit",
                                    data: [30, 40, 40, 90, 90, 70, 70]
                                }],
                                chart: {
                                    fontFamily: "inherit",
                                    type: "area",
                                    height: 235,
                                    toolbar: {
                                        show: !1
                                    }
                                },
                                plotOptions: {},
                                legend: {
                                    show: !1
                                },
                                dataLabels: {
                                    enabled: !1
                                },
                                fill: {
                                    type: "solid",
                                    opacity: 1
                                },
                                stroke: {
                                    curve: "smooth",
                                    show: !0,
                                    width: 3,
                                    colors: [r]
                                },
                                xaxis: {
                                    categories: ["Ock", "Şub", "Mar", "Nis", "May", "Haz", "Tem"],
                                    axisBorder: {
                                        show: !1
                                    },
                                    axisTicks: {
                                        show: !1
                                    },
                                    labels: {
                                        style: {
                                            colors: a,
                                            fontSize: "12px"
                                        }
                                    },
                                    crosshairs: {
                                        position: "front",
                                        stroke: {
                                            color: r,
                                            width: 1,
                                            dashArray: 3
                                        }
                                    },
                                    tooltip: {
                                        enabled: !0,
                                        formatter: void 0,
                                        offsetY: 0,
                                        style: {
                                            fontSize: "12px"
                                        }
                                    },
                                },
                                yaxis: {
                                    labels: {
                                        style: {
                                            colors: a,
                                            fontSize: "12px"
                                        }
                                    }
                                },
                                states: {
                                    normal: {
                                        filter: {
                                            type: "none",
                                            value: 0
                                        }
                                    },
                                    hover: {
                                        filter: {
                                            type: "none",
                                            value: 0
                                        }
                                    },
                                    active: {
                                        allowMultipleDataPointsSelection: !1,
                                        filter: {
                                            type: "none",
                                            value: 0
                                        }
                                    }
                                },
                                tooltip: {
                                    style: {
                                        fontSize: "12px"
                                    },
                                    y: {
                                        formatter: function(e) {
                                            return "$" + e + " thousands";
                                        },
                                    },
                                },
                                colors: [KTUtil.getCssVariableValue("--bs-success-light")],
                                grid: {
                                    borderColor: o,
                                    strokeDashArray: 4,
                                    yaxis: {
                                        lines: {
                                            show: !0
                                        }
                                    }
                                },
                                markers: {
                                    strokeColor: r,
                                    strokeWidth: 3
                                },
                            };
                        (t.self = new ApexCharts(e, s)), t.self.render(), (t.rendered = !0);
                    };
                a(),
                    KTThemeMode.on("kt.thememode.change", function() {
                        t.rendered && t.self.destroy(), a();
                    });
            }
        })();
    </script>
@endsection
