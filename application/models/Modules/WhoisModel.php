<?php defined('BASEPATH') || exit('Access Denied.');

class WhoisModel extends CI_Model {
    public function add($domain) {
        $domain = trim(strtolower($domain));

        $this->load->database();

        $row = $this->db->order_by('id', 'DESC')->limit(1)->get('whois_searches')->row_array();

        if(!isset($row['domain']) || $row['domain'] != $domain) {
            $this->db->insert('whois_searches', [
                'domain' => $domain,
                'time'   => date('Y-m-d H:i:s')
            ]);
        }
    }

    public function get_recent() {
        $this->load->database();

        return $this->db->order_by('id', 'DESC')->limit(15)->get('whois_searches')->result_array();
    }

    public function get_recent_paginated($page = 1) {
        $limit = 32;

        $this->load->database();

        $result = $this->db->order_by('id', 'DESC')->limit(24)->offset(($page - 1) * $limit)->get('whois_searches')->result_array();
        $count  = $this->db->from('whois_searches')->count_all_results();

        return [
            'recent' => $result,
            'pages'  => ceil($count / $limit)
        ];
    }
}