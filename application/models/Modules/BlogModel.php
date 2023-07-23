<?php defined('BASEPATH') || exit('Access Denied.');

class BlogModel extends CI_Model {
    public function get($page = 1, $limit = 9) {
        $offset = ($page-1) * (int)$limit;
        $this->load->database();
        $blog = [];
        $blog['posts'] = $this->db->select()->where('status', 1)->order_by('id', 'desc')->limit($limit)->offset($offset)->get('blog')->result_array();
        $blog['next'] = (count($blog['posts']) && $offset) > $offset+1 ? $page+1 : 0;
        $blog['previous'] = $blog['next'] > 1 ? $blog['next']-1 : 0;
        return $blog;
    }

    public function getAll() {
        $this->load->database();
        $blog = $this->db->select()->get('blog')->result_array();
        return $blog;
    }

    public function getAllActive() {
        $this->load->database();
        $blog = $this->db->select()->where('status', 1)->get('blog')->result_array();
        return $blog;
    }

    public function getById($id) {
        $this->load->database();
        $blog = $this->db->where('id', $id)->get('blog')->row_array();
        return $blog;
    }

    public function getBySlug($slug, $id = false) {
        $this->load->database();
        $posts = $this->getAll();
        if($id) {
            foreach($posts as $post) {
                if($post['permalink'] == $slug && $id !== $post['id']) {
                    $post_info = $this->getByid($post['id']);
                }
            }
        } else {
            foreach($posts as $post) {
                if($post['permalink'] == $slug) {
                    $post_info = $this->getByid($post['id']);
                }
            }
        }
        if(empty($post_info))
        return false;
        return $post_info;
    }

    public function add($title, $permalink, $post_image, $post_keywords, $post_description, $body, $status) {
        $this->load->database();
        $this->db->insert('blog', [
            'title' => $title,
            'permalink' => $permalink,
            'post_image' => $post_image,
            'post_keywords' => $post_keywords,
            'post_description' => $post_description,
            'body' => $body,
            'status' => $status,
            'date_published' => currentDateTime()
        ]);
        return $this->db->insert_id();
    }

    public function edit($id, $title, $permalink, $post_image, $post_keywords, $post_description, $body, $status) {
        $this->load->database();
        $this->db->where('id', $id)->set([
            'title' => $title,
            'permalink' => $permalink,
            'post_image' => $post_image,
            'post_keywords' => $post_keywords,
            'post_description' => $post_description,
            'body' => $body,
            'status' => $status
        ])->update('blog');
        return true;
    }

    public function delete($id) {
        $this->load->database();
        $this->db->where('id', $id)->delete('blog');
        return true;
    }
}