<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends FrontController {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modules/BlogModel');
		if(!$this->options->get('blog-status')) {
			$this->output->set_status_header('404');
			redirect(base_url('404'));
		}
    }

	public function index($page = 1) {
		if(is_numeric($page) && $page > 0) {
			$posts = $this->BlogModel->get($page);
		}
		if(count($posts['posts'])) {
			$this->theme->view('pages/blog', [
				'title'       => $this->options->get('blog-title'),
				'description' => $this->options->get('blog-description'),
				'keywords' => $this->options->get('seo-blog-keywords'),
				'canonical' => base_url('blog' . ($page > 1 ? '/' . $page : '')),
				'posts' => $posts['posts'],
				'next' => $posts['next'],
				'previous' => $posts['previous'],
				'page' => $page
			]);
		} else {
			$this->output->set_status_header('404');
			redirect(base_url('404'));
		}
	}

	public function post($slug = null) {
		if($post = $this->BlogModel->getBySlug($slug)) {
			$this->theme->view('pages/blog_single', [
				'title' => $post['title'],
				'description' => $post['post_description'],
				'canonical' => base_url('blog/post/' . $post['permalink']),
				'keywords' => $post['post_keywords'],
				'post' => $post
			]);
		} else {
			$this->output->set_status_header('404');
			redirect(base_url('404'));
		}
	}
}
