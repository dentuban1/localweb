<?php defined('BASEPATH') || exit('Access Denied.');

class Domain_generator extends AdminController {
    public function __construct() {
        parent::__construct();
        $this->load->model('Modules/TldsModel');
    }

    public function index() {
        $alert = null;

        if(!DEMO_MODE && $this->input->post('submit')) {
            $tld = $this->input->post('tld');
            if($this->TldsModel->getByExtension($tld)) {
                $this->TldsModel->add_generator_tld($tld);

                $alert = [
                    'type' => 'success',
                    'message' => 'TLD Added successfully.'
                ];
            }
        }

        $this->load->admin_page( 'tlds/generator', [
            'title' => 'Domain Generator TLDs',

            'tlds' => $this->TldsModel->getActive(),
            'tlds_generate' => $this->TldsModel->get_generator_tlds(),
            'alert' => $alert,

            'page_scripts_bottom' => [
                admin_dir_url('assets/js/sortables.min.js'),
                admin_dir_url('assets/js/generator.js')
            ]
        ]);
	}

    public function default_status($id = null) {
        if(!DEMO_MODE && $id && $row = $this->TldsModel->get_generator_tld($id)) {
            $this->TldsModel->update_generator_status($id, $row['default'] ? FALSE : TRUE);
            echo 'success';
            return true;
        }
        echo 'error';
    }

    public function order() {
        $response = [
            'success' => false
        ];

        $order = $this->input->post('order');
        $ref   = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && is_array($order = json_decode($order, TRUE))) {
            $this->TldsModel->set_generator_order($order);

            $response['success'] = true;
        }

        echo json_encode($response);
    }
}