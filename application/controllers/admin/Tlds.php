<?php defined('BASEPATH') || exit('Access Denied.');

class Tlds extends AdminController {
    public function __construct() {
        parent::__construct();
        $this->load->model('Modules/TldsModel');
    }

    public function index() {
        redirect(admin_base_url('tlds/page/1'));
	}
	
	public function page($page_no=1, $query="", $type="") {
        $qs = "";
        $tlds = array();
        $query = trim($query);
        $type = trim($type);
        if($query && $type) {
            $tlds = $this->TldsModel->get($page_no, 50, $query, $type);
            $qs = "/$query/$type";
        } else if($this->input->post('query')!==null && $this->input->post('type')!==null) {
            $query = trim($this->input->post('query'));
            $type = trim($this->input->post('type'));
            $tlds = $this->TldsModel->get($page_no, 50, $query, $type);
            $qs = "/$query/$type";
        } else {
            $tlds = $this->TldsModel->get($page_no, 50);
        }
        $this->load->admin_page( 'tlds/home', [
            'title' => 'TLDs List',
            'tlds' => $tlds['tlds'],
			'total_rows' => $tlds['total_rows'],
			'offset' => $tlds['offset'],
            'total_pages' => $tlds['total_pages'],
            'page' =>   $tlds['page'],
            'qs' => $qs,
            'query' => $query,
            'type' => $type,
            'page_scripts_bottom' => [
                admin_dir_url('assets/js/sortables.min.js'),
                admin_dir_url('assets/js/tlds.js')
            ]
        ]);
	}
	
	public function tlds_order() {
        $type = false;
        $query = false;
        $tlds = array();
        $tlds = $this->TldsModel->getActive();
        $this->load->admin_page( 'tlds/tld_order', [
            'title' => 'TLDs Order',
            'tlds' => $tlds,
            'page_scripts_bottom' => [
                admin_dir_url('assets/js/sortables.min.js'),
                admin_dir_url('assets/js/tlds.js')
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
            $this->TldsModel->set_order($order);

            $response['success'] = true;
        }

        echo json_encode($response);
    }

    public function status() { 
        $response = [
            'success' => false
        ];

        $id = $this->input->post('id');
        $ref = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && $tld = $this->TldsModel->getById($id)) {
            $this->TldsModel->update_status($id, $tld['status'] ? false : true);

            $response['success'] = true;
        }

        echo json_encode($response);
    }

    public function suggested() { 
        $response = [
            'success' => false
        ];

        $id = $this->input->post('id');
        $ref = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && $tld = $this->TldsModel->getById($id)) {
            $this->TldsModel->update_suggested($id, $tld['is_suggested'] ? false : true);

            $response['success'] = true;
        }

        echo json_encode($response);
    }

    public function main_status() { 
        $response = [
            'success' => false
        ];

        $id = $this->input->post('id');
        $ref = $this->input->post('ref');

        if(!DEMO_MODE && $ref == 'admin-panel' && $tld = $this->TldsModel->getById($id)) {
            $this->TldsModel->set_main_tld($id);

            $response['success'] = true;
        }

        echo json_encode($response);
    }

    public function add() {
        $alert = null;

        if( !DEMO_MODE && $this->input->post('submit') ) {
            $tld     = $this->input->post('tld');
            $server  = $this->input->post('server');
            $pattern = $this->input->post('pattern');
            $price   = $this->input->post('price');
            $link    = $this->input->post('affiliate_link');
            $main    = $this->input->post('is_main') ? true : false;
            $status  = $this->input->post('status') ? true : false;
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('tld', 'TLD', 'required');
            $this->form_validation->set_rules('server', 'Whois Server', 'required');
            $this->form_validation->set_rules('pattern', 'Pattern', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('affiliate_link', 'Affiliate Link', 'required|valid_url');
        
            if( $this->form_validation->run() ) {
                $id = $this->TldsModel->add($tld, $server, $pattern, $main, 0, $price, $price, $link, $status);

                if($id) {
                    $this->session->set_flashdata('alert', [
                        'type' => 'success',
                        'message' => 'TLD created successfully.'
                    ]);
                    redirect(admin_base_url('tlds/edit/' . $id));
                }
            } else {
                $alert = [
                    'type' => 'danger',
                    'message' => 'There were some errors in your form.'
                ];
            }
        }

        $this->load->admin_page( 'tlds/add', [
            'title' => 'Add TLD',
            'alert' => $alert
        ]);
    }

    public function edit($id = null) {
        $alert = null;
        $tld = $this->TldsModel->getById($id);

        if( !DEMO_MODE && $this->input->post('submit') ) {
            $tld_ext = $this->input->post('tld');
            $server  = $this->input->post('server');
            $pattern = $this->input->post('pattern');
            $price   = $this->input->post('price');
            $link    = $this->input->post('affiliate_link');
            $main    = $this->input->post('is_main') ? true : false;
            $status  = $this->input->post('status') ? true : false;
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('tld', 'TLD', 'required');
            $this->form_validation->set_rules('server', 'Whois Server', 'required');
            $this->form_validation->set_rules('pattern', 'Pattern', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than[0]');
            $this->form_validation->set_rules('affiliate_link', 'Affiliate Link', 'required|valid_url');
        
            if( $this->form_validation->run() ) {
                if($main) {
                    $tld['is_main'] = true;
                }

                if( $this->TldsModel->edit($tld['id'], $tld_ext, $server, $pattern, $main, true, $price, $price, $link, $status) ) {
                    $alert = [
                        'type' => 'success',
                        'message' => 'Tld updated successfully.'
                    ];
                } else {
                    $alert = [
                        'type' => 'danger',
                        'message' => 'There was an error updating this Tld.'
                    ];
                }
            } else {
                $alert = [
                    'type' => 'danger',
                    'message' => 'There were some errors in your form.'
                ];
            }
        }

        $this->load->admin_page( 'tlds/edit', [
            'title' => 'Edit Tld',
            'alert' => $alert,
            'tld'   => $tld
        ]);
    }

    public function delete($id) {
        if(!DEMO_MODE && $id && $this->TldsModel->getById($id)) {
            $this->TldsModel->delete($id);

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

        redirect(admin_base_url('tlds'));
    }
}