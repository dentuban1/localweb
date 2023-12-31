<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['post_controller_constructor'] = function() {
    if((strpos(base_url(), 'www.') !== false) && (strpos($_SERVER['HTTP_HOST'], 'www.') === false)) {
        redirect(base_url());
    }
	if((strpos(base_url(), 'https') !== false) && (strpos(get_current_page_url(), 'https') === false)) {
        redirect(base_url());
    }
	if(APPPATH . 'sessions') {
	$expire = strtotime('-7 DAYS');
	$files = glob(APPPATH . 'sessions/dt_session_*');
	foreach ($files as $file) {
		if (!is_file($file)) {
			continue;
		}
		if (filemtime($file) > $expire) {
			continue;
		}
		if (str_contains($file, 'hire'))
		unlink($file);
	}
	}
};