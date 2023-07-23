<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Addblog extends CI_Migration {
	
    public function create_blog_table() {
        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => TRUE
            ],
            'permalink' => [
                'type' => 'VARCHAR',
				'constraint' => '255',
                'null' => TRUE
            ],
			'post_image' => [
                'type' => 'VARCHAR',
				'constraint' => '255',
                'null' => TRUE
            ],
            'post_keywords' => [
                'type' => 'VARCHAR',
				'constraint' => '255',
                'null' => TRUE
            ],
			'post_description' => [
                'type' => 'VARCHAR',
				'constraint' => '255',
                'null' => TRUE
            ],
			'body' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'status' => [
                'type' => 'TINYINT',
                'null' => TRUE
            ],
            'date_published' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ));
        
        $this->dbforge->create_table('blog', TRUE);
    }

    public function up() {
        $this->create_blog_table();
    }

    public function down() {
		$this->dbforge->drop_table('blog');
    }
}