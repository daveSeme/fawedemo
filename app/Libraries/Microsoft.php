<?php 
namespace App\Libraries;
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Microsoft {
	
	
	public function loginURL() {

		$ci = get_instance(); 
        $ci->load->config('microsoft');

        $microsoft_redirect_url = $ci->config->item('microsoft_redirect_url');

        return $data['oauthURL'] = base_url().$microsoft_redirect_url.'?oauth_init=1';	
    }	
}
?>