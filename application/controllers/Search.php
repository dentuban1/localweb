<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends FrontController {

	public function __construct() {
        parent::__construct();
		if (!$this->options->get('search-status')) {
			if($this->options->get('generator-status'))
			return redirect(base_url('domain-generator'));
			else if($this->options->get('whois-status'))
			return redirect(base_url('whois'));
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
    }

	public function index() {
		if(get_current_page_url()!==base_url()) {
			$this->output->set_status_header('301');
			return redirect(base_url());
		}
        $this->lang->load('tools', 'main');
		$tlds = $this->TldsModel->getActive();
		$this->theme->view('pages/search', [
		 	'title'       => $this->options->get('seo-search-title'),
		 	'description' => $this->options->get('seo-search-description'),
			'keywords' => $this->options->get('seo-search-keywords'),
			'canonical' => base_url(),
			'tlds' => $tlds,
			'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],
			'scripts' => [$this->theme->url('assets/js/jquery.min.js'), $this->theme->url('assets/js/components/search.js')]
		]);
	}

	public function set_mode() {
		if(get_mode() == 'light')
		set_mode('dark');
		else
		set_mode('light');
		!empty($this->input->get('redirect_url')) ? redirect($this->input->get('redirect_url')) : redirect(base_url());
		exit();
	}

	public function query() {
		$this->lang->load('tools', 'main');
		$response = array(
			"type" => "error",
			"message" => lang('errors_invalid_url_unknown')
		);
		$url_array = array();
		$selections = trim($this->input->post('selections')) ? trim($this->input->post('selections')) : false;
		$url_array = $this->TldsModel->split_url(trim($this->input->post('url')));
		$selection_array = array();
		if($selections) {
			$maintld = ltrim($this->TldsModel->getMainTld()['tld'],'.');
			$selection_array = explode("," , $selections);
			if(!in_array($maintld, $selection_array)) {
				$url_array = $this->TldsModel->split_url(trim($url_array['host'] . '.' . $selection_array[0]));
			}
		}
		$host = $url_array['host'];
		$tld  = $url_array['tld'];
		$tld_data  = $url_array['tld_data'];
		$domain = $url_array['domain'];
		$data = $this->_query_whois($tld_data['whois_server'], $domain);
		if(!$this->_check_pattern($tld_data['pattern'], $data)) {
			$response['type'] = 'not-available';
			$response['link'] = base_url('whois/' . $domain);
		} else {
			$response['type'] = 'available';
			$response['link']   = base_url('search/register/' . urlencode($domain));
			$response['price']  = convert_price($tld_data['price'] );
		}
		$allTlds = $this->TldsModel->getActive();
		$response['other_tlds'] = [];
		if($selections) {
			$selection_array = explode("," , $selections);
			foreach($allTlds as $entry) {
				if(in_array(ltrim($entry['tld'],'.'), $selection_array) && $entry['status'])
				$response['other_tlds'][] = $host . $entry['tld'];
			}
		}
		$response['domain'] = $domain;
		$response['suggestions'] = $this->get_suggestions($host, $this->TldsModel->get_suggested_tld_string(), count($response['other_tlds']) );

        echo json_encode($response);
	}

	public function single_query() {
		$response = array(
            "status" => "blank",
            "link" => "#",
			"price" => null
        );
        $url_array = $this->TldsModel->split_url(trim($this->input->post('url')));
		$domain = $url_array['domain'];
		$tld_data  = $url_array['tld_data'];
		$data = $this->_query_whois($tld_data['whois_server'], $domain);
		if(!$this->_check_pattern($tld_data['pattern'], $data)) {
			$response['status'] = 'not-available';
			$response['link'] = base_url('whois/' . $domain);
		} else {
			$response['status'] = 'available';
			$response['link']   = base_url('search/register/' . urlencode($domain));
			$response['price']  = convert_price($tld_data['price']);
		}
		echo json_encode($response);
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

	public function get_suggestions($keyword, $tlds, $limit = 100) {
		$url_array = $this->TldsModel->split_url(truncate(trim($keyword), 28));
		$suggestions = [];
			$requestUri = "https://sugapi.verisign-grs.com/ns-api/2.0/suggest?include-registered=false&tlds=" . $tlds . "&include-suggestion-type=true&sensitive-content-filter=true&use-numbers=true&max-length=32&lang=eng&max-results=" . $limit . "&name=" . $url_array['host'] . "&use-idns=false";
			$result = json_decode( strtolower( get_remote_contents($requestUri)), true);
			if(isset($result['results']) && count($result['results'])) {
					foreach($result['results'] as $result) {
						if($result['availability']=='available') {
						$tld = explode('.', $result['name'])[1];
						$tld =  $this->TldsModel->getByExtension($tld);
						$suggestions[] = [
							'name' => $result['name'],
							'affiliate' => base_url('search/register/' . urlencode($result['name'])),
							'price' => convert_price($tld['price'])
						];
						}
					}
			}
		return $suggestions;
	}

	public function register($domain = false, $opt = null) {
		$domain = isset($opt) ? $opt : $domain;
		if($domain) {
			$url_array = $this->TldsModel->split_url(trim($domain));
			redirect(str_replace('{{domain_name}}', $url_array['domain'], $url_array['tld_data']['affiliate_link']));
			redirect(base_url());
		} {
			$this->output->set_status_header('404');
			return redirect(base_url('404'));
		}
	}
}