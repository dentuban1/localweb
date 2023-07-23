<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Populatetables extends CI_Migration {
    public function up() {
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
                'tld' => '.info',
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
            ]
        ]);

        $this->db->insert_batch('domain_whois', [
            [
                'tld' => '.com',
                'order' => 0
            ],
            [
                'tld' => '.net',
                'order' => 1
            ],
            [
                'tld' => '.org',
                'order' => 2
            ],
            [
                'tld' => '.info',
                'order' => 3
            ],
			[
                'tld' => '.app',
                'order' => 4
            ],
			[
                'tld' => '.us',
                'order' => 5
            ],
			[
                'tld' => '.uk',
                'order' => 6
            ],
			[
                'tld' => '.io',
                'order' => 7
            ],
			[
                'tld' => '.biz',
                'order' => 8
            ]
        ]);
    }

    public function down() {
        
    }
}