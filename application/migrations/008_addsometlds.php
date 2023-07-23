<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Addsometlds extends CI_Migration {
    public function up() {
        $this->load->database();
        $this->load->model('Modules/TldsModel');
        $data =[
			[
              'tld' => '.ua',
              'whois_server' => 'whois.ua',
              'pattern' => 'No entries found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '13.99',
              'sale_price' => '11.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 0
            ],[
              'tld' => '.ru',
              'whois_server' => 'whois.tcinet.ru',
              'pattern' => 'No entries found',
              'is_main' => 0,
              'is_suggested' => 0,
              'price' => '13.99',
              'sale_price' => '11.99',
              'affiliate_link' => 'https://www.namesilo.com/domain/search-domains?rid=bb0a442er&query={{domain_name}}&x=21&y=12',
              'status' => 0
            ]
        ];
        foreach($data as $tld) {
            $this->TldsModel->add($tld['tld'], $tld['whois_server'], $tld['pattern'], $tld['is_main'],  $tld['is_suggested'], $tld['price'], $tld['sale_price'], $tld['affiliate_link'], $tld['status']);
        }
		
    }

    public function down() {
        
    }
}