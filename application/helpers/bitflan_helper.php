<?php defined('BASEPATH') || exit('Access Denied.');

function echo_if( $text, $condition ) {
    if($condition)
        echo $text;
}

function get_mode() {
    $ci = &get_instance();
    $ci->load->helper('cookie');
    if($data = $ci->input->cookie('color_mode',true)) {
        return $data;
    } else {
        $cookie= array(
            'name'   => 'color_mode',
            'value'  => 'light',
            'expire' => '2592000',
        );
        $ci->input->set_cookie($cookie);
        return 'light';
    }
}

function set_mode($mode = 'light') {
    $ci = &get_instance();
    $ci->load->helper('cookie');
        $cookie= array(
            'name'   => 'color_mode',
            'value'  => $mode,
            'expire' => '2592000',
        );
        $ci->input->set_cookie($cookie);
        return $mode;
}



function public_url( $path = '' ) {
    return base_url( PUBLIC_RESOURCE_PATH . '/' . $path );
}

function permalink_generator($string) {
	$permalink = strtolower(trim(trim($string),"-"));
	return url_title($permalink, '-', true);
}

function printArray($array = false, $exit = false){
    if(is_array($array)) {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        if($exit)
        exit;
    }
}

function is_serialized( $data, $strict = true ) {
    // If it isn't a string, it isn't serialized.
    if ( ! is_string( $data ) ) {
        return false;
    }
    $data = trim( $data );
    if ( 'N;' === $data ) {
        return true;
    }
    if ( strlen( $data ) < 4 ) {
        return false;
    }
    if ( ':' !== $data[1] ) {
        return false;
    }
    if ( $strict ) {
        $lastc = substr( $data, -1 );
        if ( ';' !== $lastc && '}' !== $lastc ) {
            return false;
        }
    } else {
        $semicolon = strpos( $data, ';' );
        $brace     = strpos( $data, '}' );
        // Either ; or } must exist.
        if ( false === $semicolon && false === $brace ) {
            return false;
        }
        // But neither must be in the first X characters.
        if ( false !== $semicolon && $semicolon < 3 ) {
            return false;
        }
        if ( false !== $brace && $brace < 4 ) {
            return false;
        }
    }
    $token = $data[0];
    switch ( $token ) {
        case 's':
            if ( $strict ) {
                if ( '"' !== substr( $data, -2, 1 ) ) {
                    return false;
                }
            } elseif ( false === strpos( $data, '"' ) ) {
                return false;
            }
            // Or else fall through.
        case 'a':
        case 'O':
            return (bool) preg_match( "/^{$token}:[0-9]+:/s", $data );
        case 'b':
        case 'i':
        case 'd':
            $end = $strict ? '$' : '';
            return (bool) preg_match( "/^{$token}:[0-9.E+-]+;$end/", $data );
    }
    return false;
}

function count_multi_array($mainarray) {
	$count = 0;
	foreach($mainarray as $subarray)
	   $count += count($subarray);
	   
	return $count;
}

function is_valid_url($url){
    if ($ret = parse_url($url)) {
        if (!isset($ret["scheme"])) {
            $url = "http://" . $url;
        }
    }

    return filter_var($url, FILTER_VALIDATE_URL);
}

function addHttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function filter_url($input) {
    // Remove the http://, www., and slash(/) from the URL 

    // If URI is like, eg. www.way2tutorial.com/
    $input = trim($input, '/');

    // If not have http:// or https:// then prepend it
    if (!preg_match('#^http(s)?://#', $input)) {
        $input = 'http://' . $input;
    }

    $urlParts = parse_url($input);

    // Remove www.
    $domain_name = @preg_replace('/^www\./', '', $urlParts['host']);

    // Output way2tutorial.com
    return $domain_name;
}

function strip_nonchars($url) {
    $url = preg_replace('~[^\\pL0-9.]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9.]+~', '', $url);
    return $url;
 }

 function remove_subdomain($url) {
    preg_match('#[^\.]+[\.]{1}[^\.]+$#', $url , $matches);
    $url = $matches[0];
    return $url;
 }

 function trim_dashes($url) {
    $url = ltrim($url, '-');
    $url = rtrim($url, '-');
    return $url;
 }

function clean_url($url) {
    $url = filter_url($url);
    $url = addHttp($url);
    $url_data = parse_url($url);
    if(isset($url_data['host'])) {
        $url_data['host'] = strip_nonchars($url_data['host']);
        $url_data['host'] = trim_dashes($url_data['host']);
        return $url_data['host'];
    }
    return false;
}

function web_protocol() {
	return ((isset($_SERVER["HTTPS"]) && ($_SERVER["HTTPS"] == "on")) || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "https") ? "https" : "http") . "://";
}

function get_domain($url) {
	if(preg_match("#https?://#", $url) === 0) {
		$url = web_protocol() . $url;
	}
    $exp = explode('.', $url);
    if(count($exp) == 2) {
        return strtolower(parse_url($url, PHP_URL_HOST));
    } else {
        if(strpos($exp[0], 'www.') !== false) {
            $exp[0] = str_ireplace('www.', '', $exp[0]);
        }
        return strtolower(parse_url(join('.', $exp), PHP_URL_HOST));
    }
}

function get_tld($domain) {
	$domain = "https://".$domain;
	$ext = pathinfo($domain, PATHINFO_EXTENSION);
	return "." . $ext;
}

function truncate($string,$length)  {
	$string = trim(strip_tags($string));
	if (strlen($string) > $length) {
		$string = substr($string,0,$length);
	}
	return $string;
}

function filter_keyword($keyword) {
	$keyword = strtolower($keyword);
	$keyword = str_replace('www.','',$keyword); 
	$keyword = preg_replace("/[^A-Za-z0-9.-]/", "", $keyword);
	$keyword = preg_replace("~-{2,}~", "-", $keyword);
	$keyword = preg_replace("/\.{2,}/", ".", $keyword);
	$keyword = trim($keyword,".-");
    return $keyword;
}

function currentDateTime() {
    return date('Y-m-d H:i:s');
}

function format_date($registration_date) {
    $date = date_create($registration_date);
    return date_format($date,"d M, Y");
}

function get_current_page_url() {
    if (isset($_SERVER['HTTP_CF_VISITOR'])) {
        $cf_visitor = json_decode($_SERVER['HTTP_CF_VISITOR']);
        if (isset($cf_visitor->scheme) && $cf_visitor->scheme == 'https') {
            $protocol = "https://";
            return "{$protocol}{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        }
      } else {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] === 443 ? "https://" : "http://";
        return "{$protocol}{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
      }
}

function get_remote_contents($url) {
	$result = false;
	$USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_USERAGENT, $USER_AGENT);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	unset($ch);
	return $result;
}

function tld_to_class($tld) {
    $class = str_replace(".","_",$tld);
    return trim($class); 
}

function class_to_tld($class) {
    $tld = str_replace("_",".",$class);
    return trim($tld); 
}

function convert_price( $value ) {
    $ci = &get_instance();

    return $ci->options->get('tld-price-status') ? $ci->CurrencyModel->convert( $value ) : null;
}

function install_path() {
	return stripslashes(web_protocol() . $_SERVER["HTTP_HOST"] . preg_replace('{/$}', '', dirname($_SERVER['SCRIPT_NAME'])) . "/");
}

function alpinify($data) {
    return str_replace(
        ["'", '"'], ["\'", "'"],
        json_encode($data)
    );
}

function send_mail($from_email, $from_name, $to, $subject, $message) {
    $ci = &get_instance();

    $mail_type = $ci->options->get('email-type');

    if($mail_type == 'sendgrid') {
        $url = 'https://api.sendgrid.com/';
        $pass = $ci->options->get('sendgrid-api-key');

        $params = array(
            'from' => $from_email,
            'fromname' => $from_name,
            'subject' => $subject,
            'html' => $message
        );
            
        if(is_array($to)) {
            foreach($to as $i => $eml) {
                $params['to[' . $i . ']'] = $eml;
            }
        } else {
            $params['to'] = $to;
        }
        
        $request = $url.'api/mail.send.json';
        
        $session = curl_init($request);
        curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $pass));
        curl_setopt ($session, CURLOPT_POST, true);
        curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
        curl_setopt($session, CURLOPT_HEADER, false);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($session);
        $code = curl_getinfo($session, CURLINFO_HTTP_CODE);
        curl_close($session);
        
        return $code == 200;
    } else {
        $ci->load->library('email');
	
        $config = [
            'mailtype' => 'html'
        ];
    
        if($mail_type == 'smtp') {
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => trim($ci->options->get('smtp-host')),
                'smtp_port' => trim($ci->options->get('smtp-port')),
                'smtp_user' => trim($ci->options->get('smtp-username')),
                'smtp_pass' => trim($ci->options->get('smtp-password')),
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html'
            );
        }
    
        $ci->email->initialize($config);
    
        $ci->email->from($from_email, $from_name);
        $ci->email->to($to);
    
        $ci->email->subject($subject);
        $ci->email->message($message);
    
        return $ci->email->send();
    }
}

function upload_blog_thumb($param, $filename, $upload_path, $allowed_types='jpg|png|jpeg', $min_width = '698', $min_height='465') {
    $CI = & get_instance();
    $response = array();
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = $allowed_types;
    $config['min_height'] = $min_height;
    $config['min_width'] = $min_width;
    $config['file_name'] = $filename;
    $CI->load->library('upload', $config);
    if(!$CI->upload->do_upload($param)) {
        $response['error'] = strip_tags($CI->upload->display_errors());
    } else {
        $response['data']= $CI->upload->data();
        if(!resizeImage($response['data']['full_path']))
        return $response['error'] = "Error Uploading Image Please Try Again";
    }
    return $response;
}

function resizeImage($source_path) {
    $CI = & get_instance();
    $config_manip = array(
        'source_image' => $source_path,
        'new_image' => $source_path,
        'maintain_ratio' => TRUE,
        'create_thumb' => TRUE,
        'thumb_marker' => '_thumb',
        'width' => 698,
        'height' => 465
    );

    $CI->load->library('image_lib', $config_manip);
    if (!$CI->image_lib->resize()) {
        return false;
    } else {
        unlink($source_path);
    }
    
    $CI->image_lib->clear();
    return true;
}