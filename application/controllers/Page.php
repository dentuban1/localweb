<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends FrontController {
	public function index($slug = "") {
		$page = $this->PagesModel->getBySlug(strtolower($slug));
		if(trim($slug)!=="" && $page['status']) {
			$this->theme->view('pages/page', [
				'title' => $page['title'],
				'canonical' => base_url('page/' . $page['permalink']),
				'page' => $page
			]);
		} else {
			$this->output->set_status_header('404');
			return redirect(base_url('404'));
		}
	}
}
