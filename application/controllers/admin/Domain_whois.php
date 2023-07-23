<?php defined('BASEPATH') || exit('Access Denied.');

class Domain_whois extends AdminController {
    public function __construct() {
        parent::__construct();

        $this->load->model('Modules/TldsModel');
    }

    public function index() {
        $alert = null;

        if(!DEMO_MODE && $this->input->post('submit')) {
            $tld = $this->input->post('tld');

            if($this->TldsModel->getByExtension($tld)) {
                $this->TldsModel->add_whois_tld($tld);

                $alert = [
                    'type' => 'success',
                    'message' => 'TLD Added successfully.'
                ];
            }
        }

        $this->load->admin_page( 'tlds/whois', [
            'title' => 'WHOIS Information Suggestions',

            'tlds' => $this->TldsModel->getActive(),
            'tlds_whois' => $this->TldsModel->get_whois_tlds(),
            'alert' => $alert,

            'page_scripts_bottom' => [
                admin_dir_url('assets/js/sortables.min.js'),
                admin_dir_url('assets/js/whois.js')
            ]
        ]);
	}

    public function order() {
        $response = [
            'success' => false
        ];
        $order = $this->input->post('order');
        $ref   = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && is_array($order = json_decode($order, TRUE))) {
            $this->TldsModel->set_whois_order($order);

            $response['success'] = true;
        }
        echo json_encode($response);
    }

    public function delete($id) {
        if(!DEMO_MODE && $id && $this->TldsModel->get_whois_tld($id)) {
            $this->TldsModel->delete_whois_tld($id);

            $this->session->set_flashdata('alert', [
                'type' => 'success',
                'message' => 'TLD deleted successfully.'
            ]);
        } else {
            $this->session->set_flashdata('alert', [
                'type' => 'danger',
                'message' => 'Item not found.'
            ]);
        }

        redirect(admin_base_url('domain_whois'));
    }
}