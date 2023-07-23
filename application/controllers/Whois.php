<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Whois extends FrontController {
    public function __construct() {
        parent::__construct();
        if (!$this->options->get('whois-status')) {
            if($this->options->get('search-status'))
            return redirect(base_url());
            else if($this->options->get('generator-status'))
            return redirect(base_url());
            else if($this->options->get('ip-status'))
            return redirect(base_url('ip-lookup'));
            else if($this->options->get('location-status'))
            return redirect(base_url('location'));
            else if($this->options->get('dns-status'))
            return redirect(base_url('dns-lookup'));
            else {
                $this->output->set_status_header('404');
                return redirect(base_url('404'));
            }
        }
        $this->load->model('Modules/TldsModel');
        $this->load->model('Modules/WhoisModel');
    }

	public function index() {
        $this->lang->load('tools', 'main');
		$this->theme->view('pages/whois', [
            'title'       => $this->options->get('seo-whois-title'),
            'description' => $this->options->get('seo-whois-description'),
			'keywords' => $this->options->get('seo-whois-keywords'),
            'canonical' => base_url('whois'),
            'recent'      => $this->WhoisModel->get_recent(),

            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/whois.js')],
       ]);
	}

    public function search($domain = false, $opt = null) {
			$domain = isset($opt) ? $opt : $domain;
			if($domain) {
            $url_array = $this->TldsModel->split_url($domain);            
            $this->lang->load('tools', 'main');
            $data = $this->_get_whois_data($url_array);
            $custom_meta = array();
            if(!$this->options->get('recent-whois-index-status'))
            array_push($custom_meta, '<meta name="robots" content="noindex">');
            return $this->theme->view('pages/whois', [
                'title' => $data['type'] == 'available' ? ucfirst($url_array['domain']) . ' ' . $data['message'] : ucfirst($url_array['domain']) . ' Whois Information',
                'description' => $this->options->get('seo-whois-description'),
                'canonical' => base_url('whois/' . $url_array['domain']),
                'domain' => $url_array['domain'],
                'data'   => $data,
                'recent' => $this->WhoisModel->get_recent(),

                'js_errors' => [
                    'invalid_domain' => lang('errors_invalid_domain'),
                    'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
                ],

                'scripts' => [$this->theme->url('assets/js/components/whois.js')],
                'custom_meta' => $custom_meta
            ]);
			}
            $this->output->set_status_header('404');
            return redirect(base_url('404'));
    }

    public function recent() {
        $page_status = $this->options->get('recent-page-status');
        if(!($page_status && $this->options->get('recent-status'))) {
            $this->output->set_status_header('404');
			redirect(base_url('404'));
		}
        $page = $this->input->get('page');
        $custom_meta = array();
        if(!$this->options->get('recent-whois-index-status'))
        array_push($custom_meta, '<meta name="robots" content="noindex">');
        if(!$page || $page <= 0) {
            $page = 1;
        }
        $data = $this->WhoisModel->get_recent_paginated($page);
        if(!count($data['recent'])) {
            $this->output->set_status_header('404');
			redirect(base_url('404'));
        }
        $this->lang->load('tools', 'main');
		$this->theme->view('pages/recent_searches', [
            'title'       => $this->options->get('seo-recent-title') . ($page && $page > 1 ? ' « Page ' . $page : ''),
            'description' => $this->options->get('seo-recent-description'),
			'keywords' => $this->options->get('seo-recent-keywords'),
            'canonical' => base_url('whois/recent' . ($page > 1 ? '?page=' . $page : '')),
            'data'        => $this->WhoisModel->get_recent_paginated($page),
            'page'        => $page,
            'custom_meta' => $custom_meta
       ]);
    }

    public function bool() {
        $url_array = $this->TldsModel->split_url($this->input->post('domain'));
        $data = $this->_query_whois($url_array['tld_data']['whois_server'], $url_array['domain']);
        if($this->_check_pattern($url_array['tld_data']['pattern'], $data)) {
            echo 'available';
            return true;
        }
        echo 'unavailable';
    }

    public function _get_whois_data($url_array = null) {
        $this->lang->load('tools', 'main');
        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );
        $data = $this->_query_whois($url_array['tld_data']['whois_server'], $url_array['domain']);
        if(!$this->_check_pattern($url_array['tld_data']['pattern'], $data)) {
            $response['type'] = 'success';
            $response['message'] = $data;
            $this->WhoisModel->add($url_array['domain']);
        } else {
            $response['type'] = 'available';
            $response['message'] = 'Domain is Available for Registration.';
            $response['link']   = base_url('register/' . urlencode($url_array['domain']));
            $response['price']  = convert_price($url_array['tld_data']['price']);
        }
        $response['suggestions'] = $this->TldsModel->get_whois_tlds();
        return $response;
    }

    public function _query_whois($server, $domain) {
        $timeout = 5;
		$port    = 43;

		$afp = @fsockopen($server, $port, $errno, $errstr, $timeout);

		if(!$afp)
			return false;
		else {
			fputs($afp, $domain . "\r\n");
			$out = "";
			while(!feof($afp)){
				$out .= fgets($afp);
			}
			fclose($afp);
			return $out;
		}
    }

    public function _check_pattern($pattern, $output) {
        return (preg_match("/" . $pattern . "/i", $output) ? 1 : 0);
    }
}
