<div class="card card-flush bg-gray-300 bg-opacity-20 border-0">
    @if (isset($search) || isset($export))
        <div class="card-header align-items-center gap-2 gap-md-5 border-0 pt-6 @if (isset($searchNone) && isset($exportNone)) d-none : '' @endif">
            <div class="card-title">
                <!--begin::Search-->
                @isset($search)
                    <div
                        class="d-flex align-items-center position-relative my-1 @if (isset($searchNone)) d-none : '' @endif">
                        <span class="svg-icon fs-1 position-absolute ms-4">...</span>
                        <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search Report" />
                    </div>
                @endisset
                <!--end::Search-->
                <!--begin::Export buttons-->
                @isset($export)
                    <div id="kt_datatable_example_1_export" class="d-none"></div>
                @endisset
                <!--end::Export buttons-->
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <!--begin::Export dropdown-->
                @isset($export)
                    <button type="button"
                        class="btn btn-light-primary @if (isset($searchExport)) d-none : '' @endif"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                        Export Report
                    </button>
                    <!--begin::Menu-->
                    <div id="kt_datatable_example_export_menu"
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="copy">
                                Copy to clipboard
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="excel">
                                Export as Excel
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="csv">
                                Export as CSV
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                Export as PDF
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Export dropdown-->
                    <!--begin::Hide default export buttons-->
                    <div id="kt_datatable_example_buttons" class="d-none"></div>
                    <!--end::Hide default export buttons-->
                @endisset
            </div>
        </div>
    @endif
    <div class="card-body pt-5">
        <table class="table align-middle rounded table-row-dashed fs-6 gy-5" id="kt_datatable_example">
            <thead>
                <!--begin Table row-->
                <tr class="text-start text-gray-400 fw-bold fs-6 text-uppercase gs-0 {{ $theadRowClass ?? ''}}">
                    {!! $columns !!}
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600 {{ $tbodyClass ?? '' }}">
                {!! $rows !!}
             </tbody>
        </table>
    </div>
</div>



@section('script')

    {{-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
    <script type="text/javascript">
        "use strict";

        // Class definition
        var KTDatatablesExample = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                        .format(); // select date from 4th column in table
                    dateRow[3].setAttribute('data-order', realDate);
                });

                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                    'lengthChange':false
                });
            }

            // Hook export buttons
            var exportButtons = () => {
                const documentTitle = 'Customer Orders Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle
                        }
                    ]
                }).container().appendTo($('#kt_datatable_example_buttons'));

                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll(
                    '#kt_datatable_example_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();

                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' +
                            exportValue);

                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#kt_datatable_example');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    exportButtons();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesExample.init();
        });

        // var table = $('.data-table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     searching: true,
        //     ordering: true,
        //     select: false,
        //     lengthChange: false,
        //     "oLanguage": {
        //         "sUrl": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Turkish.json"
        //     },
        //     ajax: "{{ route('admin.news.index') }}",
        //     columns: [{
        //             data: 'name',
        //             name: 'name'
        //         },

        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         },
        //     ]
        // });
    </script>

@endsection
