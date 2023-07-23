<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Whoisoverhaul extends CI_Migration {
    public function whois_searches() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'domain' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'time' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ));
        
        $this->dbforge->create_table('whois_searches', TRUE);
    }

    public function up() {
        $this->whois_searches();
    }

    public function down() {
        $this->dbforge->drop_table('whois_searches');
    }
}