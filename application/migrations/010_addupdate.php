<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Addupdate extends CI_Migration {
	
    public function insert_table_data() {
        $this->load->database();
        $this->db->insert_batch('domain_generator', [
            [
                'tld' => '.com',
                'default' => TRUE,
                'order' => 0
            ],
            [
                'tld' => '.net',
                'default' => TRUE,
                'order' => 1
            ],
            [
                'tld' => '.org',
                'default' => TRUE,
                'order' => 2
            ],
            [
                'tld' => '.gov',
                'default' => TRUE,
                'order' => 3
            ],
            [
                'tld' => '.biz',
                'default' => TRUE,
                'order' => 4
            ],
            [
                'tld' => '.xyz',
                'default' => TRUE,
                'order' => 5
            ],
            [
                'tld' => '.info',
                'default' => TRUE,
                'order' => 6
            ],
            [
                'tld' => '.name',
                'default' => TRUE,
                'order' => 7
            ],
            [
                'tld' => '.live',
                'default' => TRUE,
                'order' => 8
            ],
            [
                'tld' => '.site',
                'default' => TRUE,
                'order' => 9
            ],
            [
                'tld' => '.cc',
                'default' => TRUE,
                'order' => 10
            ],
            [
                'tld' => '.cc',
                'default' => TRUE,
                'order' => 11
            ],
            [
                'tld' => '.fr',
                'default' => TRUE,
                'order' => 12
            ],
            [
                'tld' => '.blog',
                'default' => TRUE,
                'order' => 13
            ],
            [
                'tld' => '.online',
                'default' => TRUE,
                'order' => 14
            ]
        ]);
    }

    public function add_tlds() {
        $this->load->database();
		$row = $this->db->order_by('tld_order','DESC')->limit(1)->get('tlds')->row_array();
		if(!$row) {
			$order = 15;
		} else {
			$order = $row['tld_order'];
		}
		$data = [
			[
              'tld' => '.pk',
              'whois_server' => 'whois.pknic.net.pk',
              'pattern' => 'Not Registered',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '13.99',
              'sale_price' => '11.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 0,
              'tld_order' => $order+1
            ],
            [
                'tld' => '.ai',
                'whois_server' => 'whois.nic.ai',
                'pattern' => 'No Object Found',
                'is_main' => 0,
                'is_suggested' => 0,
                'price' => '13.99',
                'sale_price' => '11.99',
                'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
                'status' => 0,
                'tld_order' => $order+2
            ]
        ];
        if(count($this->db->get('tlds')->result_array())) {
            $this->db->insert_batch('tlds', $data);
		}

    }

    public function up() {
        $this->db->empty_table('domain_generator'); 
        $this->insert_table_data();
        $this->add_tlds();
    }

    public function down() {
        $this->dbforge->drop_column('tlds', 'tld_type');
    }
}