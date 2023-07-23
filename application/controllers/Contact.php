<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends FrontController {
    public function index() {
		$this->lang->load('contact', 'main');

        $error   = null;
		$scripts = [];

		if($this->options->get('recaptcha-status'))
			$scripts[] = ['https://www.google.com/recaptcha/api.js', 'async defer'];

		if( $this->options->get('contact-page-status') ) {
			if( $this->input->post('submit') == 'true' ) {
				$recaptcha = false;

				if($this->options->get('recaptcha-status')) {
					$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $this->options->get('recaptcha-secret-key') . "&response=" . $this->input->post('g-recaptcha-response') . "&remoteip=".$_SERVER['REMOTE_ADDR']), true);
				
					if($response['success'])
						$recaptcha = true;
				} else $recaptcha = true;

				if($recaptcha) {
					$this->load->library('form_validation');

					$this->form_validation->set_rules('name', 'Name', 'required', [
						'required' => lang('contact_errors_required')
					]);
					$this->form_validation->set_rules('email', 'E-Mail', 'required|valid_email', [
						'required' => lang('contact_errors_required'),
						'valid_email' => lang('contact_errors_email')
					]);
					$this->form_validation->set_rules('message', 'Message', 'required', [
						'required' => lang('contact_errors_required'),
					]);
					$this->form_validation->set_error_delimiters('<small class="text-danger mt-2">', '</small>');
	
					if( $this->form_validation->run() ) {
						$name    = $this->input->post('name');
						$email   = $this->input->post('email');
						$message = $this->input->post('message'); 
	
						if(send_mail($this->options->get('contact-email'), $this->options->get('website-title') . ' Contact', $this->options->get('contact-email'), 'Contact Message from ' . $name . ' <' . $email . '>', $message)) {
							$this->session->set_flashdata('success', lang('contact_success'));
							redirect(base_url('contact'));
						} else {
							$error = lang('contact_errors_unknown');
						}
					} else $error = lang('contact_errors_unknown');
				} else $error = lang('contact_errors_captcha');
			}

			$this->theme->view('pages/contact', [
				'title' => 'Contact Us',
				'canonical' => base_url('contact'),
				'error' => $error,
				'scripts' => $scripts
			]);
		} else {
			$this->output->set_status_header('404');
			redirect(base_url('404'));
		}
    }
}