<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Minorupdate extends CI_Migration {
	
    public function edit_table_data() {
        $this->load->database();
        $this->db->query("delete p from domain_generator p join (select tld, min(id) as min_id from domain_generator p2 group by tld) p2 on p.tld = p2.tld and p.id > p2.min_id");
    }

    public function up() {
        $this->edit_table_data();
    }

    public function down() {

    }
}