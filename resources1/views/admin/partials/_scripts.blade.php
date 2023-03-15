<!--end::Global Config-->

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>

<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<!--end::Page Vendors-->

<!--begin::Page Scripts(used by this page)-->
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
<script>
    var btn = KTUtil.getById("kt_btn");

    KTUtil.addEvent(btn, "click", function() {
        KTUtil.btnWait(btn, "spinner spinner-right spinner-white pr-15", "Please wait");

        setTimeout(function() {
            KTUtil.btnRelease(btn);
        }, 1000);
    });
</script>
@yield('scripts')


<!--end::Page Scripts-->