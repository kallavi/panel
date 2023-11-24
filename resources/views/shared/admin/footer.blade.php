<script>
    var hostUrl = "{{ asset('assets/') }}";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}

<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/ecommerce/sales/listing.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/type.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/details.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/finance.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/complete.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/offer-a-deal/main.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>

@yield('script')

<script type="text/javascript">
        $('.phoneMask').mask('(000) 000 00 00');
        $('.tcNo').mask('00000000000');
        $('.birthDay').mask('0000');
        $('.textMask').mask('A', {
            translation: {
                'A': {
                    pattern: /[A-Za-zÇçĞğİıÖöŞşÜü ]/,
                    recursive: true
                }
            }
        });
        $('.emailInput').on('input', function() {
            var emailValue = $(this).val();
            var isValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailValue);

            if (!isValid) {
                $(this).addClass('error'); // Hatalı girişleri belirginleştirmek için bir class ekleyebilirsiniz
            } else {
                $(this).removeClass('error');
            }
        });
        $('.allNumber').mask('0', {
            translation: {
                '0': {
                    pattern: /[0-9]/,
                    recursive: true
                }
            }
        });
        //status change
        $(".durumSecim").change(function() {
            var selectedOptionValue = $(this).val();
            console.log("Seçili Option: " + $(".durumSecim").val());
            if(selectedOptionValue == 1){
                $(".statusChange").removeClass("bg-danger");
                $(".statusChange").addClass("bg-primary")
            }
            else{
                $(".statusChange").addClass("bg-danger");
                $(".statusChange").removeClass("bg-primary")
            }
        });

        //sayfa ıcerısınde ilk tabların active gelmesı ıcın
        $(function(){
            $(".nav-tabs .nav-item:first-child .nav-link").addClass("active");
        })
    document.addEventListener("DOMContentLoaded", function() {
        // İlk "nav-tabs" elementini seçin
        const navTabs = document.querySelector(".nav-tabs");

         // İlk "nav-item" elementini seçin ve içindeki "nav-link" elementini bulun
        const firstNavItem = navTabs.querySelector(".nav-item");
        const firstNavLink = firstNavItem.querySelector(".nav-link");

         // İlk "nav-link" elementine "active" sınıfını ekleyin
        firstNavLink.classList.add("active");
    });


    function checkFileType(input) {
        const allowedTypes = ['video/mp4', 'video/webm', 'video/ogg']; // İzin verilen video türleri

        const file = input.files[0];
        if (file) {
            if (allowedTypes.includes(file.type)) {
                // İzin verilen türde dosya, işlemleri burada devam ettirebilirsiniz.
                document.getElementById('file-name').innerText = file.name;
            } else {
                // İzin verilmeyen bir dosya türü yüklendiğinde uyarı ver.
                alert('Lütfen sadece video dosyası yükleyin!');
                // Dosyayı temizle (istediğiniz başka bir işlemi de yapabilirsiniz).
                input.value = '';
                document.getElementById('file-name').innerText = '';
            }
        }
    }
</script>
