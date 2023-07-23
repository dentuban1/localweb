<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends FrontController {

	public function __construct() {
        parent::__construct();
    }

	public function index() {
		$this->output->set_status_header('404');
		$this->theme->view('pages/error_404', [
			'title'       => '404 Error',
			'description' => 'Page Not Found.',
			'canonical' => base_url('404'),
		]);
	}
}