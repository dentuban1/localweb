<?php defined('BASEPATH') || exit('Access Denied.');

class Blog extends AdminController {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Modules/BlogModel');
    }

    public function index() {
        $this->load->admin_page( 'blog/home', [
            'title' => 'Blog',
            'posts' => $this->BlogModel->getAll(),
            'page_scripts_bottom' => [
                'https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js',
                admin_dir_url('assets/js/blog.js')
            ]
        ]);
	}

    public function add() {
        $alert = null;

        if( !DEMO_MODE && $this->input->post('submit') ) {
			$title = html_escape($this->security->xss_clean($this->input->post('title')));
            $post_description = html_escape($this->security->xss_clean($this->input->post('post_description')));
            $post_keywords = $this->input->post('post_keywords') ? html_escape($this->security->xss_clean($this->input->post('post_keywords'))) : [];
            $permalink = html_escape($this->security->xss_clean($this->input->post('permalink')));
            $body = $this->security->xss_clean($this->input->post('body'));
            $status = $this->input->post('publish') ? 1 : 0;
            $this->form_validation->set_rules('title', 'Post Title', 'required');
            $this->form_validation->set_rules('post_description', 'SEO Post Description', 'required');
            if (empty($post_keywords)) {
                $this->form_validation->set_rules('post_keywords', 'SEO Post Tags', 'required');
            } else {
                $post_keywords = explode("," , $post_keywords);
                $keywords = "";
                foreach($post_keywords as $keyword) {
                    if(trim($keyword))
                    $keywords .= $keyword . ",";
                }
                $keywords = trim($keywords, ",");
            }
            $image_upload = false;
            if (empty($_FILES['post_thumb']['name'])) {
                $this->form_validation->set_rules('post_thumb', 'Thumbnail Image', 'required');
            } else {
                $upload_path = '/uploads/default/blog/';
                $filename = 'blog_' .  uniqid(rand(1,999999));
                $response = upload_blog_thumb('post_thumb', $filename, FCPATH . $upload_path);
                if(!empty($response)) {
                if(isset($response['error'])) {
                    $alert = [
                        'type' => 'danger',
                        'message' => $response['error']
                    ];
                } else {
                    $post_image = $filename . '_thumb' . $response['data']['file_ext'];
                    $image_upload = true;
                }
                }
            }
            $this->form_validation->set_rules('body', 'Body', 'required');
            if($permalink) {
				$permalink = permalink_generator($permalink);
            } else {
                $permalink = permalink_generator($title);
            }
            if($this->BlogModel->getBySlug($permalink)) {
                $i = 1;
                while($this->BlogModel->getBySlug($permalink . '-' . $i)) {
                    $i++;
                }
                $permalink .= '-' . $i;
            }
            if($image_upload) {
                if($this->form_validation->run()) {
                    $id = $this->BlogModel->add($title, $permalink, $post_image, $keywords, $post_description, $body, $status);
                    if($id) {
                        $this->session->set_flashdata('alert', [
                            'type' => 'success',
                            'message' => 'Post published successfully.'
                        ]);
                        redirect(admin_base_url('blog'));
                    }
                } else {
                    $alert = [
                        'type' => 'danger',
                        'message' => 'There were some errors in your form.'
                    ];
                }
            }
        }

        $this->load->admin_page( 'blog/add', [
            'title' => 'Add New Post',
            'alert' => $alert,
            'page_scripts_bottom' => [
                'https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js',
                admin_dir_url('assets/js/blog.js')
            ]
        ]);
    }

    public function edit($id = null) {
        $alert = null;
        $post = $this->BlogModel->getById($id);

        if( !DEMO_MODE && $this->input->post('submit') ) {
            $title = html_escape($this->security->xss_clean($this->input->post('title')));
            $post_description = html_escape($this->security->xss_clean($this->input->post('post_description')));
            $post_keywords = $this->input->post('post_keywords') ? html_escape($this->security->xss_clean($this->input->post('post_keywords'))) : [];
            printArray($post_keywords);
            $permalink = html_escape($this->security->xss_clean($this->input->post('permalink')));
            $body = $this->security->xss_clean($this->input->post('body'));
            $status = $this->input->post('publish') ? 1 : 0;
            $this->form_validation->set_rules('title', 'Post Title', 'required');
            $this->form_validation->set_rules('post_description', 'SEO Post Description', 'required');
            if (empty($post_keywords)) {
                $this->form_validation->set_rules('post_keywords', 'SEO Post Tags', 'required');
            } else {
                $post_keywords = explode("," , $post_keywords);
                $keywords = "";
                foreach($post_keywords as $keyword) {
                    if(trim($keyword))
                    $keywords .= $keyword . ",";
                }
                $keywords = trim($keywords, ",");
            }
            $image_upload = false;
            if (!empty($_FILES['post_thumb']['name'])) {
                $upload_path = '/uploads/default/blog/';
                $filename = 'blog_' .  uniqid(rand(1,999999));
                $response = upload_blog_thumb('post_thumb', $filename, FCPATH . $upload_path);
                if(!empty($response)) {
                if(!empty($response['error'])) {
                    $alert = [
                        'type' => 'danger',
                        'message' => $response['error']
                    ];
                } else {
                    $post_image = $filename . '_thumb' . $response['data']['file_ext'];
                    unlink(FCPATH . '/uploads/default/blog/' . $this->security->xss_clean($this->input->post('old_image')));
                    $image_upload = true;
                }
                }
            } else {
                $image_upload = true;
                $post_image = $this->security->xss_clean($this->input->post('old_image'));
            }
            $this->form_validation->set_rules('body', 'Body', 'required');
            if($permalink) {
				$permalink = permalink_generator($permalink);
            } else {
                $permalink = permalink_generator($title);
            }
            if($this->BlogModel->getBySlug($permalink, $id)) {
                $i = 1;
                while($this->BlogModel->getBySlug($permalink . '-' . $i, $id)) {
                    $i++;
                }
                $permalink .= '-' . $i;
            }
            if($image_upload) {
                if( $this->form_validation->run() ) {
                    if( $this->BlogModel->edit($post['id'], $title, $permalink, $post_image, $keywords, $post_description, $body, $status) ) {
                        $alert = [
                            'type' => 'success',
                            'message' => 'Post updated successfully.'
                        ];
                    } else {
                        $alert = [
                            'type' => 'danger',
                            'message' => 'There was an error updating your post.'
                        ];
                    }
                } else {
                    $alert = [
                        'type' => 'danger',
                        'message' => 'There were some errors in your form.'
                    ];
                }
            }
            $post['post_image'] = $post_image;
        }
        $this->load->admin_page( 'blog/edit', [
            'title' => 'Edit Post',
            'alert' => $alert,
            'post'  => $post,
            'page_scripts_bottom' => [
                'https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js',
                admin_dir_url('assets/js/blog.js')
            ]
        ]);
    }

    public function delete($id) {
        if(!DEMO_MODE && $id && $page = $this->BlogModel->getById($id)) {
            $this->BlogModel->delete($id);

            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'Post deleted successfully.'
            ]);
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'danger',
                'message' => 'Post not found.'
            ]);
        }

        redirect(admin_base_url('blog'));
    }
}