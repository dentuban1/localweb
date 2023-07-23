<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Domain_generator extends FrontController {
	public function __construct() {
        parent::__construct();
		if (!$this->options->get('generator-status')) {
            if($this->options->get('search-status'))
            return redirect(base_url());
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
        $this->lang->load('tools', 'main');
		$this->theme->view('pages/generator', [
			'title'       => $this->options->get('seo-generator-title'),
			'description' => $this->options->get('seo-generator-description'),
			'keywords' => $this->options->get('seo-generator-keywords'),
			'canonical' => base_url('domain-generator'),
			'tlds' 		  => $this->TldsModel->get_generator_tlds(),
			'js_errors' => [
                'invalid_domain' => lang('errors_invalid_domain'),
                'invalid_url_unknown' => lang('errors_invalid_url_unknown'),
            ],

			'scripts' => [$this->theme->url('assets/js/jquery.min.js'), $this->theme->url('assets/js/components/generator.js')]
		]);
	}

	public function query($suggestedLimit = 100) {
        $this->lang->load('tools', 'main');
		
		$response = array(
            "type" => "error",
            "message" => lang('errors_invalid_url_unknown')
        );

		$keyword = $this->TldsModel->split_url(trim(truncate(trim($this->input->post('keyword')), 28)))['host'];

		if(!$tlds = $this->input->post('selections')) {
			$tlds = $this->TldsModel->getMainTld()['tld'];
		}
		$cache_var = 'domainer_suggestions_' . tld_to_class($keyword) . '_' . $tlds;

		$this->load->driver('cache', [ 'adapter' => 'file' ]);

		if( !$suggestions = $this->cache->get($cache_var) ) {
			$requestUri = "https://sugapi.verisign-grs.com/ns-api/2.0/suggest?include-registered=false&tlds=" . $tlds . "&include-suggestion-type=true&sensitive-content-filter=true&use-numbers=true&max-length=32&lang=eng&max-results=" . $suggestedLimit . "&name=" . $keyword . "&use-idns=false";
	
			$result = json_decode( strtolower( get_remote_contents( $requestUri ) ), true );

			$suggestions = [];

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
				if(count($suggestions)%2!==0 && count($suggestions)>2)
					array_pop($suggestions);
				$this->cache->save($cache_var, $suggestions, 60 * 15);
			}
		}

		$response = array(
			'type' => 'success',
			'message' => $suggestions
		);

		echo json_encode($response);
	}
}
