<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Addtables extends CI_Migration {
    public function domain_generator() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'tld' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'default' => [
                'type' => 'BIT',
                'default' => TRUE,
                'null' => TRUE
            ],
            'order' => [
                'type' => 'INT',
                'null' => TRUE
            ]
        ));
        
        $this->dbforge->create_table('domain_generator', TRUE);
    }

    public function domain_whois() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'tld' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'order' => [
                'type' => 'INT',
                'null' => TRUE
            ]
        ));
        
        $this->dbforge->create_table('domain_whois', TRUE);
    }

    public function up() {
        $this->domain_generator();
        $this->domain_whois();
    }

    public function down() {
        $this->dbforge->drop_table('domain_generator');
        $this->dbforge->drop_table('domain_whois');
    }
}