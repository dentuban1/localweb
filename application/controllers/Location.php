<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends FrontController {
    public function __construct() {
        parent::__construct();
        $this->load->model('Modules/TldsModel');

        if (!$this->options->get('location-status')) {
            if($this->options->get('search-status'))
            return redirect(base_url());
            else if($this->options->get('generator-status'))
            return redirect(base_url());
            else if($this->options->get('whois-status'))
            return redirect(base_url('whois'));
            else if($this->options->get('ip-status'))
            return redirect(base_url('ip-lookup'));
            else if($this->options->get('dns-status'))
            return redirect(base_url('dns-lookup'));
            else {
                $this->output->set_status_header('404');
                return redirect(base_url('404'));
            }
        }
    }

	public function index() {
        $this->lang->load('tools', 'main');

        $status  = $this->options->get('ip-resolver-status');
        
        $api_url = base64_encode('https://ipwhois.app/json/{{domain}}');
        $mode    = 'uri';
        $param   = null;

        if($status) {
            $api_url  = base64_encode($this->options->get('ip-resolver-url'));
            $mode     = $this->options->get('ip-resolver-mode');
            $param    = $this->options->get('ip-resolver-param');
        }

		$this->theme->view('pages/location', [
            'title'       => $this->options->get('seo-location-title'),
            'description' => $this->options->get('seo-location-description'),
			'keywords' => $this->options->get('seo-location-keywords'),
            'canonical' => base_url('location'),
            'resolver' => [
                'api_url' => $api_url, 
                'mode'    => $mode,
                'param'   => $param
            ],
            'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

            'scripts' => [$this->theme->url('assets/js/components/location.js')]
		]);
	}

    public function parse_data() {
        
        $this->output->set_content_type('application/json');

        $response = [
            'message' => 'error'
        ];

        if( $this->input->post('data') ) {
            $status  = $this->options->get('ip-resolver-status');

            if( $status ) {
                $ip_field = $this->options->get('ip-resolver-field');
                $success  = $this->options->get('ip-resolver-success-pattern');
                $ignore   = $this->options->get('ip-resolver-ignore');
                $response = $this->input->post('data');
                $success_status = strpos($response, html_entity_decode($success)) !== false;
                $data = json_decode($response, true);
                if($success_status)
                    $data = array('hostname' => ucfirst(filter_url($this->input->post('hostname')))) + $data;
    
                if($ignore) {
                    $fields = explode(',', $ignore);
                    foreach($fields as $field) {
                        if(isset($data[$field]))
                            unset($data[$field]);
                    }
                }
    
                $data = [
                    'success' => $success_status,
                    'fields' => $data
                ];
                
                return $this->output->set_output(json_encode($data));
            } else {
                $data = json_decode($this->input->post('data'), true);
                if($data['success']) {
                    $data = array('hostname' => ucfirst(filter_url($this->input->post('hostname')))) + $data;
                    unset($data['completed_requests']);
                }
    
                $data = [
                    'success' => $data['success'],
                    'fields'  => $data,
                ];
    
                return $this->output->set_output(json_encode($data));
            }
        }

        return $this->output->set_body(json_encode($response));
    }

    public function query() {
        $this->lang->load('tools', 'main');
        $success = false;
        $response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

        $url = filter_url(trim($this->input->post('url')));

        $ip = gethostbyname($url);

        if($ip != $url && filter_var($ip, FILTER_VALIDATE_IP))
            $success = true;

        if($success) {
            $response = array(
                "type"    => "success", 
                "message" => $ip
            );
        }

        echo json_encode($response);
    }
}
