<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dns_lookup extends FrontController
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->options->get('dns-status')){
            if($this->options->get('search-status'))
            return redirect(base_url());
            else if($this->options->get('generator-status'))
            return redirect(base_url());
            else if($this->options->get('whois-status'))
            return redirect(base_url('whois'));
            else if($this->options->get('ip-status'))
            return redirect(base_url('ip-lookup'));
            else if($this->options->get('location-status'))
            return redirect(base_url('location'));
            else {
                $this->output->set_status_header('404');
                return redirect(base_url('404'));
            }
        }
            
		$this->load->model('Modules/TldsModel');
    }

    public function index()
    {
        $this->lang->load('tools', 'main');

        $this->theme->view('pages/dns_lookup', [
            'title'       => $this->options->get('seo-dns-title'),
            'description' => $this->options->get('seo-dns-description'),
			'description' => $this->options->get('seo-dns-keywords'),
            'canonical' => base_url('dns-lookup'),
            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/dns_lookup.js')]
        ]);
    }

    public function query() {
        $this->lang->load('tools', 'main');

        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

        $error = true;
		
		$url = filter_url(trim($this->input->post('url')));

        if ($url && is_valid_url($url)) {
            $data = array();
			$value = $url;
            // Parse url to extract host
            $posted_domain = $value;
            $parsed_url = parse_url($posted_domain);

            if (array_key_exists('host', $parsed_url)) {
                $domain = $parsed_url['host'];
            } else {
                $domain = $posted_domain;
            }

            // get records
            $dns_a = dns_get_record($domain, DNS_A);
			if(!empty($dns_a)) {
				$dns_a_ttl = $dns_a[0]['ttl'];
				$dns_a_class = $dns_a[0]['class'];
				$data['a'] = [
                    'data' => $dns_a,
                    'ttl'  => $dns_a_ttl,
                    'class' => $dns_a_class
                ];
                $error = false;
			}
            $dns_ns = dns_get_record($domain, DNS_NS);
			if(!empty($dns_ns)) {
				$dns_ns_ttl = $dns_ns[0]['ttl'];
				$dns_ns_class = $dns_ns[0]['class'];
				$data['ns'] = [
                    'data' => $dns_ns,
                    'ttl'  => $dns_ns_ttl,
                    'class' => $dns_ns_class
                ];
                $error = false;
			}
            $dns_mx = dns_get_record($domain, DNS_MX);
			if(!empty($dns_mx)) {
				$dns_mx_ttl = $dns_mx[0]['ttl'];
				$dns_mx_class = $dns_mx[0]['class'];
				$data['mx'] = [
                    'data' => $dns_mx,
                    'ttl'  => $dns_mx_ttl,
                    'class' => $dns_mx_class
                ];
                $error = false;
			}
            $dns_soa = dns_get_record($domain, DNS_SOA);
			if(!empty($dns_soa)) {
				$dns_soa_ttl = $dns_soa[0]['ttl'];
				$dns_soa_class = $dns_soa[0]['class'];
				$dns_soa_email = explode(".", $dns_soa[0]['rname']);
				$dns_soa_email = $dns_soa_email[0] . '@' . $dns_soa_email[1] . '.' . $dns_soa_email[2];
				$dns_soa_serial = $dns_soa[0]['serial'];
				$dns_soa_refresh = $dns_soa[0]['refresh'];
				$dns_soa_retry = $dns_soa[0]['retry'];
				$dns_soa_expire = $dns_soa[0]['expire'];
				$dns_soa_minimum_ttl = $dns_soa[0]['minimum-ttl'];
				$data['soa'] = [
                    'data' => [
                        'email' => $dns_soa_email,
                        'serial' => $dns_soa_serial,
                        'refresh' => $dns_soa_refresh,
                        'retry' => $dns_soa_retry,
                        'expire' => $dns_soa_expire,
                        'minimum_ttl' => $dns_soa_minimum_ttl
                    ],
                    'ttl'  => $dns_soa_ttl,
                    'class' => $dns_soa_class
                ];
                $error = false;
			}

            $dns_txt = dns_get_record($domain, DNS_TXT);
			if(!empty($dns_txt)) {
				$dns_txt_ttl = $dns_txt[0]['ttl'];
				$dns_txt_class = $dns_txt[0]['class'];
				$data['txt'] = [
                    'data' => $dns_txt,
                    'ttl'  => $dns_txt_ttl,
                    'class' => $dns_txt_class
                ];
                $error = false;
			}

            $dns_aaaa = dns_get_record($domain, DNS_AAAA);
			if(!empty($dns_aaaa)) {
				$dns_aaaa_ttl = $dns_aaaa[0]['ttl'];
				$dns_aaaa_class = $dns_aaaa[0]['class'];
				$data['aaaa'] = [
                    'data' => $dns_aaaa,
                    'ttl'  => $dns_aaaa_ttl,
                    'class' => $dns_aaaa_class
                ];
                $error = false;
			}

            if(!$error) {
                $response = [
                    'type'    => 'success',
                    'message' => $data
                ];
            }

			
        }
		
		 echo json_encode($response);
       
    }
}
