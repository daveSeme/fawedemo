<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class checkLogin implements FilterInterface
{
  

    /**
     * Check loggedIn to redirect page
     */
    public function before(RequestInterface $request, $arguments = null)
    {
	// $db = \Config\Database::connect();
	//  $this->tank_auth    = new \App\Libraries\Tank_auth();
 	//    $this->session = \Config\Services::session();
	//   $result_token = $db->query("select token  FROM user_token where username='".$this->session->get('username')."'");
    //   $row_token   = $result_token->getRowArray();
	  
	//    $token = $row_token['token']; 
	//    if($this->session->get('token') != $token){
    //      $this->no_cache();
    //     $this->tank_auth->logout();
	
    //     $this->_show_message(lang('tank_auth.auth_message_logged_out'));
	// 	// return redirect()->to('/auth/login/');
    
	//     //return redirect()->to(site_url().'/auth/logout'); 
	//    }
        
    //    //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //      if (!$this->tank_auth->is_logged_in()) {
 	// 	    return redirect()->to(base_url().'/auth/login/'); 
    //       }
		  
 			
// 				    $_url = "https://mandemobile.com/manage_projects/index.php?project_name=Pimes_Somali";

// 			$result = file_get_contents($_url);
// // Will dump a beauty json :3
//     $details = json_decode($result, true);
//     echo($details);
//   if($details[0] == "no") {
//  		   // return redirect()->to(base_url().'/auth/login/'); 
// 		   	header("Location:".base_url().'/auth/logout/');
// 		    exit();
//             }  
			
			
 
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
	
	  protected function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }
	
	    function _show_message($message) {
        $this->session->setFlashdata('message', $message);
        //redirect('/auth/');
		//echo "mukesh";
 	    //return   redirect()->to(.'/auth/');
		header("Location:".base_url().'/auth/login/');
		exit();
 
    }
}
?>