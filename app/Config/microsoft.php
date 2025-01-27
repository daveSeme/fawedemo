<?php namespace Config;
//php defined('BASEPATH') OR exit('No direct script access allowed');


use CodeIgniter\Config\BaseConfig;
/*
| -------------------------------------------------------------------
|  Microsoft API Configuration
| -------------------------------------------------------------------
|
*/
$config['microsoft_application_id']       	  = '00000000481EED4D';
$config['microsoft_secret_id']    		  = 'AVzVHikMOnQqmCGn8htEhCb';
$config['microsoft_redirect_url']  		  = 'welcome/microsoft_login';
$config['microsoft_scope']         		  = 'wl.basic wl.emails wl.birthday';