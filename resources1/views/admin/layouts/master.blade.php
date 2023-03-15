<!DOCTYPE html>
<?php
$setting = \App\Models\Setting::pluck('value','name')->toArray();
$logo = isset($setting['logo']) ? 'uploads/'.$setting['logo'] : 'assets/media/logos/logo-light.png';
$favicon = isset($setting['favicon']) ? 'uploads/'.$setting['favicon'] : 'assets/media/logos/favicon.ico';
$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.financialdashboard.com';
?>

<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

<!--begin::Head-->
<head>
	@include('admin.partials._head')
</head>

<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

@include('admin.partials._page-loader')
@include('admin.layouts.layout')
@include('admin.partials._extras.offcanvas.quick-user')
@include('admin.partials._extras.scrolltop')
@include('admin.partials._extras.toolbar')
@include('admin.partials._extras.offcanvas.demo-panel')

<!--[html-partial:include:{"file":"partials/_page-loader.html"}]/-->

<!--[html-partial:include:{"file":"layout.html"}]/-->

<!--[html-partial:include:{"file":"partials/_extras/offcanvas/quick-user.html"}]/-->

<!--[html-partial:include:{"file":"partials/_extras/scrolltop.html"}]/-->

<!--[html-partial:include:{"file":"partials/_extras/toolbar.html"}]/-->

<!--[html-partial:include:{"file":"partials/_extras/offcanvas/demo-panel.html"}]/-->
<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>

@include('admin.partials._scripts')
</body>

<!--end::Body-->
</html>
