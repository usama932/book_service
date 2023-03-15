<?php
	$setting = \App\Models\Setting::pluck('value','name')->toArray();
	$logo = isset($setting['logo']) ? 'uploads/'.$setting['logo'] : 'assets/media/logos/logo-light.png';
	$favicon = isset($setting['favicon']) ? 'uploads/'.$setting['favicon'] : 'assets/media/logos/favicon.ico';
	$copy_right = isset($setting['copy_right']) ? $setting['copy_right'] : 'wwww.webexert.com';
	$site_title = isset($setting['site_title']) ? $setting['site_title'] : 'wwww.webexert.com';
	$auth_page_heading = isset($setting['auth_page_heading']) ? $setting['auth_page_heading'] : 'wwww.webexert.com';
	$auth_image = isset($setting['auth_image']) ? 'uploads/'.$setting['auth_image'] : 'assets/media/svg/illustrations/login-visual-1.svg';
?>
