<?php
namespace App\Libraries;
use CodeIgniter\HTTP\RequestInterface;
 //require_once('phpass-0.1/PasswordHash.php');
 
 use App\Libraries\phpass\PasswordHash;

define('STATUS_ACTIVATED', '1');
define('STATUS_NOT_ACTIVATED', '0');

/**
 * Tank_auth
 *

 */
class Tank_auth {

    private $error = array();
	
	protected $ci;
	protected $users;
	protected $session;
    protected $request;
    protected $configTankAuth;
    protected $passwordhash;
	
   public function __construct()
    {
	 $this->configTankAuth  = new \Config\Tank_auth();
 		//$this->configTankAuth = config('tank_auth');
	$this->email = \Config\Services::email();
		helper('cookie');

		//$this->session = session();
        $this->session       = \Config\Services::session();
		//$this->tank_auth = new \App\Models\tank_auth\users();
         $this->users = model('App\Models\tank_auth\Users');
		//$emailConfig = $this->ci->emailConfig;
        ///
		// call password hash
		$this->passwordhash = new PasswordHash();
		
		$this->request = \Config\Services::request();
		
        // Try to autologin
        $this->autologin();
    }

    /**
     * Login user on the site. Return TRUE if login is successful
     * (user exists and activated, password is correct), otherwise FALSE.
     *
     * @param	string	(username or email or both depending on settings in config file)
     * @param	string
     * @param	bool
     * @return	bool
     */
    function login($login, $password, $remember, $login_by_username, $login_by_email) {

        print_r($login.' password '. $password.' remember '. $remember.' login_by_username '. $login_by_username.' login_by_email '. $login_by_email);
	  
        if ((strlen($login) > 0) AND ( strlen($password) > 0)) {

            // Which function to use to login (based on config)
            if ($login_by_username AND $login_by_email) {
                $get_user_func = 'get_user_by_login';
            } else if ($login_by_username) {
                $get_user_func = 'get_user_by_username';
            } else {
                $get_user_func = 'get_user_by_email';
            }

            if (!is_null($userdata = $this->users->$get_user_func($login))) { // login ok
                print_r('userdata => '.serialize($userdata));
                // Does password match hash in database?

				
		  $hasher = new PasswordHash(
                        $this->configTankAuth->phpass_hash_strength, $this->configTankAuth->phpass_hash_portable);
                if ($hasher->CheckPassword($password, $userdata->password)) {  // password ok

          
                    if ($userdata->banned == 1) {         // fail - banned 
					
                        $this->error = array('banned' => $userdata->ban_reason);
                    } else {
					
				
                             $token = getToken(10);
					 
                         $this->session->set(array(
                            'user_id' => $userdata->id,
                            'username' => $userdata->username,
                             'office' => $userdata->base_id,
                             'token' => $token,
                           // 'department' => $user->department_id,
                            'user_type' => $userdata->user_type,
                            'user_group_id' => $userdata->user_group_id,
                            'user_level' => $this->users->get_user_groupname($userdata->user_group_id),
                            'logged' => true,
                            'status' => ($userdata->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                        ));

                        // start audit trail audit login error 
					 
				
									
						 
						$db = \Config\Database::connect();
							// Update user token 
							$result_token = $db->query("select count(*) as allcount from user_token where username='".$userdata->username."' ");
                            $row_token   = $result_token->getRowArray();
							 
							if($row_token['allcount'] > 0){
							    
							   $query = $db->query("update user_token set token='".$token."' where username='".$userdata->username."'");
							}else{
							   
							    $query = $db->query("insert into user_token(username,token) values('".$userdata->username."','".$token."')");
							}

                        $data_1 = array(
                           // 'session_id' =>  $this->session->session_id,
                            'user_id' => $userdata->username,
                            'ip_address' => $this->request->getIPAddress(),
                            'date' => date('Y-m-d'),
                            'time' => date('H:i:s'),
                        );
                        // insert in database
                      //  $this->users->store_audit($data_1, 'ctbl_audit_ssn');
                       // trail('Success','Login', "ctbl_users", "Logged");
					   
					    // audit trail
		                trail(1,'Login', 'Login Auth', $data_1);
			 
	  
                        // start permission for user permission sub group 
                        //user submodule permission like- list/edit/approvel 
                        $viewlevel_submodule = $this->users->get_user_permission_sub_level($userdata->user_group_id);

                        foreach ($viewlevel_submodule as $row) {
                            $sessiont_sub = array($row['title'] => $row['rules']);
                            $this->session->set($sessiont_sub);
							
							
                        }



                        if ($userdata->activated == 0) {       // fail - not activated
                            $this->error = array('not_activated' => '');
                        } else {            // success
                            if ($remember) {
                                $this->create_autologin($user->id);
                            }

                            $this->clear_login_attempts($login);

                            $this->users->update_login_info(
                                    $userdata->id, $this->configTankAuth->login_record_ip, $this->configTankAuth->login_record_time);
                            return TRUE;
                        }
                    }
                } else {              // fail - wrong password
                    $this->increase_login_attempt($login);
                    $this->error = array('password' => 'tank_auth.auth_incorrect_password');
                    // start audit trail audit login error 
                    $data = array(
                        'timestamp' => date('Y-m-d H:i:s'),
                        'ip_address' => $this->request->getIPAddress(),
                        'user_id' => $login,
                        'user_password' => $password
                    );
                    // insert in database
                    $this->users->store_audit($data, 'ctbl_audit_logon_errors');
                    //$this->db->insert('ctbl_audit_logon_errors', $data);
                }
            } else {               // fail - wrong login
                $this->increase_login_attempt($login);
                $this->error = array('login' => 'tank_auth.auth_incorrect_login');
                // start audit trail audit login error 
                $data = array(
                    'timestamp' => date('Y-m-d H:i:s'),
                    'ip_address' => $this->request->getIPAddress(),
                    'user_id' => $login,
                    'user_password' => $password,
                );
                // insert in database
                $this->users->store_audit($data, 'ctbl_audit_logon_errors');
                //$this->db->insert('ctbl_audit_logon_errors', $data);
            }
        }

 
        return FALSE;
    }

    function login1($login, $password, $remember, $login_by_username, $login_by_email) {

        print_r($login.' password '. $password.' remember '. $remember.' login_by_username '. $login_by_username.' login_by_email '. $login_by_email);
	  
        if ((strlen($login) > 0) AND ( strlen($password) > 0)) {

            // Which function to use to login (based on config)
            if ($login_by_username AND $login_by_email) {
                $get_user_func = 'get_user_by_login';
            } else if ($login_by_username) {
                $get_user_func = 'get_user_by_username';
            } else {
                $get_user_func = 'get_user_by_email';
            }

            if (!is_null($userdata = $this->users->$get_user_func($login))) { // login ok
                // Does password match hash in database?

				
		  $hasher = new PasswordHash(
                        $this->configTankAuth->phpass_hash_strength, $this->configTankAuth->phpass_hash_portable);
                if (true){//$hasher->CheckPassword($password, $userdata->password)) {  // password ok

          
                    if ($userdata->banned == 1) {         // fail - banned 
					
                        $this->error = array('banned' => $userdata->ban_reason);
                    } else {
					
				
                             $token = getToken(10);
					 
                         $this->session->set(array(
                            'user_id' => $userdata->id,
                            'username' => $userdata->username,
                             'office' => $userdata->base_id,
                             'token' => $token,
                           // 'department' => $user->department_id,
                            'user_type' => $userdata->user_type,
                            'user_group_id' => $userdata->user_group_id,
                            'user_level' => $this->users->get_user_groupname($userdata->user_group_id),
                            'logged' => true,
                            'status' => ($userdata->activated == 1) ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED,
                        ));

                        // start audit trail audit login error 
					 
				
									
						 
						$db = \Config\Database::connect();
							// Update user token 
							$result_token = $db->query("select count(*) as allcount from user_token where username='".$userdata->username."' ");
                            $row_token   = $result_token->getRowArray();
							 
							if($row_token['allcount'] > 0){
							    
							   $query = $db->query("update user_token set token='".$token."' where username='".$userdata->username."'");
							}else{
							   
							    $query = $db->query("insert into user_token(username,token) values('".$userdata->username."','".$token."')");
							}

                        $data_1 = array(
                           // 'session_id' =>  $this->session->session_id,
                            'user_id' => $userdata->username,
                            'ip_address' => $this->request->getIPAddress(),
                            'date' => date('Y-m-d'),
                            'time' => date('H:i:s'),
                        );
                        // insert in database
                      //  $this->users->store_audit($data_1, 'ctbl_audit_ssn');
                       // trail('Success','Login', "ctbl_users", "Logged");
					   
					    // audit trail
		                trail(1,'Login', 'Login Auth', $data_1);
			 
	  
                        // start permission for user permission sub group 
                        //user submodule permission like- list/edit/approvel 
                        $viewlevel_submodule = $this->users->get_user_permission_sub_level($userdata->user_group_id);

                        foreach ($viewlevel_submodule as $row) {
                            $sessiont_sub = array($row['title'] => $row['rules']);
                            $this->session->set($sessiont_sub);
							
							
                        }



                        if ($userdata->activated == 0) {       // fail - not activated
                            $this->error = array('not_activated' => '');
                        } else {            // success
                            if ($remember) {
                                $this->create_autologin($user->id);
                            }

                            $this->clear_login_attempts($login);

                            $this->users->update_login_info(
                                    $userdata->id, $this->configTankAuth->login_record_ip, $this->configTankAuth->login_record_time);
                            return TRUE;
                        }
                    }
                } else {              // fail - wrong password
                    $this->increase_login_attempt($login);
                    $this->error = array('password' => 'tank_auth.auth_incorrect_password');
                    // start audit trail audit login error 
                    $data = array(
                        'timestamp' => date('Y-m-d H:i:s'),
                        'ip_address' => $this->request->getIPAddress(),
                        'user_id' => $login,
                        'user_password' => $password
                    );
                    // insert in database
                    $this->users->store_audit($data, 'ctbl_audit_logon_errors');
                    //$this->db->insert('ctbl_audit_logon_errors', $data);
                }
            } else {               // fail - wrong login
                $this->increase_login_attempt($login);
                $this->error = array('login' => 'tank_auth.auth_incorrect_login');
                // start audit trail audit login error 
                $data = array(
                    'timestamp' => date('Y-m-d H:i:s'),
                    'ip_address' => $this->request->getIPAddress(),
                    'user_id' => $login,
                    'user_password' => $password,
                );
                // insert in database
                $this->users->store_audit($data, 'ctbl_audit_logon_errors');
                //$this->db->insert('ctbl_audit_logon_errors', $data);
            }
        }

 
        return FALSE;
    }

    /**
     * Logout user from the site
     *
     * @return	void
     */
    function logout() {
        $this->delete_autologin();

        $this->session->set(array('user_id' => '', 'username' => '', 'status' => ''));

        $this->session->destroy();
    }

    /**
     * Check if user logged in. Also test if user is activated or not.
     *
     * @param	bool
     * @return	bool
     */
    function is_logged_in($activated = TRUE) {
	
	
        return $this->session->get('status') === ($activated ? STATUS_ACTIVATED : STATUS_NOT_ACTIVATED);
		  //if($this->session->get('status')==STATUS_ACTIVATED)
		//{ 
		
		//return 1;
		//}else
		//{
		
		//return 0;
		
		
		//}
		
    }

    /**
     * Get user_id
     *
     * @return	string
     */
    function get_user_id() {
        return $this->session->get('user_id');
    }

    /**
     * Get username
     *
     * @return	string
     */
    function get_username() {
        return $this->session->get('username');
    }

    /**
     * Get get_user_level
     *
     * @return	string
     */
    function get_user_level() {
        return $this->session->get('user_level');
    }

    /**
     * Get get_user_level
     *
     * @return	string
     */
    function get_office() {
        return $this->session->get('office');
    }

/**
     * Get get_user_level
     *
     * @return	string
     */

    function get_logged() {
        return $this->session->get('logged');
    }

    /**
     * Create new user on the site and return some data about it:
     * user_id, username, password, email, new_email_key (if any).
     *
     * @param	string
     * @param	string
     * @param	string
     * @param	bool
     * @return	array
     */
    function create_user($username, $email, $password, $email_activation) {
        if ((strlen($username) > 0) AND ! $this->users->is_username_available($username)) {
            $this->error = array('username' => 'auth_username_in_use');
        } elseif (!$this->users->is_email_available($email)) {
            $this->error = array('email' => 'auth_email_in_use');
        } else {
            // Hash password using phpass
            $hasher = new PasswordHash(
                    $this->configTankAuth->phpass_hash_strength,$this->configTankAuth->phpass_hash_portable);
            $hashed_password = $hasher->HashPassword($password);

            $data = array(
                'username' => $username,
                'password' => $hashed_password,
                'email' => $email,
                'last_ip' => $this->request->getIPAddress(),
            );

            if ($email_activation) {
                $data['new_email_key'] = md5(rand() . microtime());
            }
            if (!is_null($res = $this->users->create_user($data, !$email_activation))) {
                $data['user_id'] = $res['user_id'];
                $data['password'] = $password;
                unset($data['last_ip']);
                return $data;
            }
        }
        return NULL;
    }

    /**
     * Check if username available for registering.
     * Can be called for instant form validation.
     *
     * @param	string
     * @return	bool
     */
    function is_username_available($username) {
        return ((strlen($username) > 0) AND $this->users->is_username_available($username));
    }

    /**
     * Check if email available for registering.
     * Can be called for instant form validation.
     *
     * @param	string
     * @return	bool
     */
    function is_email_available($email) {
        return ((strlen($email) > 0) AND $this->users->is_email_available($email));
    }

    /**
     * Change email for activation and return some data about user:
     * user_id, username, email, new_email_key.
     * Can be called for not activated users only.
     *
     * @param	string
     * @return	array
     */
    function change_email($email) {
        $user_id = $this->session->get('user_id');

        if (!is_null($user = $this->users->get_user_by_id($user_id, FALSE))) {

            $data = array(
                'user_id' => $user_id,
                'username' => $user->username,
                'email' => $email,
            );
            if (strtolower($user->email) == strtolower($email)) {  // leave activation key as is
                $data['new_email_key'] = $user->new_email_key;
                return $data;
            } elseif ($this->users->is_email_available($email)) {
                $data['new_email_key'] = md5(rand() . microtime());
                $this->users->set_new_email($user_id, $email, $data['new_email_key'], FALSE);
                return $data;
            } else {
                $this->error = array('email' => 'tank_auth.auth_email_in_use');
            }
        }
        return NULL;
    }

    /**
     * Activate user using given key
     *
     * @param	string
     * @param	string
     * @param	bool
     * @return	bool
     */
    function activate_user($user_id, $activation_key, $activate_by_email = TRUE) {
        $this->users->purge_na($this->configTankAuth->email_activation_expire);

        if ((strlen($user_id) > 0) AND ( strlen($activation_key) > 0)) {
            return $this->users->activate_user($user_id, $activation_key, $activate_by_email);
        }
        return FALSE;
    }

    /**
     * Set new password key for user and return some data about user:
     * user_id, username, email, new_pass_key.
     * The password key can be used to verify user when resetting his/her password.
     *
     * @param	string
     * @return	array
     */
    function forgot_password($login) {
        if (strlen($login) > 0) {
            if (!is_null($user = $this->users->get_user_by_login($login))) {

                $data = array(
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'new_pass_key' => md5(rand() . microtime()),
                );

                $this->users->set_password_key($user->id, $data['new_pass_key']);
                return $data;
            } else {
                $this->error = array('login' => 'tank_auth.auth_incorrect_email_or_username');
            }
        }
        return NULL;
    }

    /**
     * Check if given password key is valid and user is authenticated.
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    function can_reset_password($user_id, $new_pass_key) {
        if ((strlen($user_id) > 0) AND ( strlen($new_pass_key) > 0)) {
            return $this->users->can_reset_password(
                            $user_id, $new_pass_key, $this->configTankAuth->forgot_password_expire);
        }
        return FALSE;
    }

    /**
     * Replace user password (forgotten) with a new one (set by user)
     * and return some data about it: user_id, username, new_password, email.
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    function reset_password($user_id, $new_pass_key, $new_password) {
        if ((strlen($user_id) > 0) AND ( strlen($new_pass_key) > 0) AND ( strlen($new_password) > 0)) {

            if (!is_null($user = $this->users->get_user_by_id($user_id, TRUE))) {

                // Hash password using phpass
                $hasher = new PasswordHash(
                       $this->configTankAuth->phpass_hash_strength ,$this->configTankAuth->phpass_hash_portable);
                //$hashed_password = $hasher->HashPassword($new_password);
                   $hashed_password = password_hash($new_password,PASSWORD_BCRYPT);
                if ($this->users->reset_password(
                                $user_id, $hashed_password, $new_pass_key,$this->configTankAuth->forgot_password_expire)) { // success
                    // Clear all user's autologins
					
                    $user_autologin=model('App\Models\tank_auth\user_autologin');
					
                     //$user_autologin->clear($user_id);

                    return array(
                        'user_id' => $user_id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'new_password' => $new_password,
                    );
                }
            }
        }
        return NULL;
    }

    /**
     * Change user password (only when user is logged in)
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    function change_password($old_pass, $new_pass) {
        $user_id = $this->session->get('user_id');


      
        if (!is_null($user = $this->users->get_user_by_id($user_id, TRUE))) {
		
	

            // Check if old password correct
            $hasher = new PasswordHash(
                    $this->configTankAuth->phpass_hash_strength ,$this->configTankAuth->phpass_hash_portable);
            if (password_verify($old_pass, $user->password)) {   // success
			
			
                // Hash new password using phpass
                $hashed_password = password_hash($new_pass,PASSWORD_BCRYPT);

                // Replace old password with new one
                $this->users->change_password($user_id, $hashed_password);
                return TRUE;
            } else {               // fail
		 
                $this->error = array('old_password' => 'tank_auth.auth_incorrect_password');
				
			
            }
        }
        return FALSE;
    }

    /**
     * Change user email (only when user is logged in) and return some data about user:
     * user_id, username, new_email, new_email_key.
     * The new email cannot be used for login or notification before it is activated.
     *
     * @param	string
     * @param	string
     * @return	array
     */
    function set_new_email($new_email, $password) {
        $user_id = $this->session->get('user_id');

        if (!is_null($user = $this->users->get_user_by_id($user_id, TRUE))) {

            // Check if password correct
            $hasher = new PasswordHash(
                    $this->configTankAuth->phpass_hash_strength ,$this->configTankAuth->phpass_hash_portable);
            if ($hasher->CheckPassword($password, $user->password)) {   // success
                $data = array(
                    'user_id' => $user_id,
                    'username' => $user->username,
                    'new_email' => $new_email,
                );

                if ($user->email == $new_email) {
                    $this->error = array('email' => 'tank_auth.auth_current_email');
                } elseif ($user->new_email == $new_email) {  // leave email key as is
                    $data['new_email_key'] = $user->new_email_key;
                    return $data;
                } elseif ($this->users->is_email_available($new_email)) {
                    $data['new_email_key'] = md5(rand() . microtime());
                    $this->users->set_new_email($user_id, $new_email, $data['new_email_key'], TRUE);
                    return $data;
                } else {
                    $this->error = array('email' => 'tank_auth.auth_email_in_use');
                }
            } else {               // fail
                $this->error = array('password' => 'tank_auth.auth_incorrect_password');
            }
        }
        return NULL;
    }

    /**
     * Activate new email, if email activation key is valid.
     *
     * @param	string
     * @param	string
     * @return	bool
     */
    function activate_new_email($user_id, $new_email_key) {
        if ((strlen($user_id) > 0) AND ( strlen($new_email_key) > 0)) {
            return $this->users->activate_new_email(
                            $user_id, $new_email_key);
        }
        return FALSE;
    }

    /**
     * Delete user from the site (only when user is logged in)
     *
     * @param	string
     * @return	bool
     */
    function delete_user($password) {
        $user_id = $this->session->get('user_id');

        if (!is_null($user = $this->users->get_user_by_id($user_id, TRUE))) {

            // Check if password correct
            $hasher = new PasswordHash(
                    $this->configTankAuth->phpass_hash_strength ,$this->configTankAuth->phpass_hash_portable);
            if ($hasher->CheckPassword($password, $user->password)) {   // success
                $this->users->delete_user($user_id);
                $this->logout();
                return TRUE;
            } else {               // fail
                $this->error = array('password' => 'tank_auth.auth_incorrect_password');
            }
        }
        return FALSE;
    }

    /**
     * Get error message.
     * Can be invoked after any failed operation such as login or register.
     *
     * @return	string
     */
    function get_error_message() {
        return $this->error;
    }

    /**
     * Save data for user's autologin
     *
     * @param	int
     * @return	bool
     */
    private function create_autologin($user_id) {
       // $this->ci->load->helper('cookie');
        $key = substr(md5(uniqid(rand() . get_cookie($this->configTankAuth->sess_cookie_name))), 0, 16);

        //$this->ci->load->model('tank_auth/user_autologin');
		 $this->user_autologin = model('App\Models\tank_auth\user_autologin');

        $this->user_autologin->purge($user_id);

        if ($user_autologin->set($user_id, md5($key))) {
            set_cookie(array(
                'name' => $this->configTankAuth->autologin_cookie_name,
                'value' => serialize(array('user_id' => $user_id, 'key' => $key)),
                'expire' =>$this->configTankAuth->autologin_cookie_life ,
            ));
			
			
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Clear user's autologin data
     *
     * @return	void
     */
    private function delete_autologin() {
         helper('cookie');
        if ($cookie = get_cookie($this->configTankAuth->autologin_cookie_name, TRUE)) {

            $data = unserialize($this->configTankAuth->autologin_cookie_name);

            $user_autologin=model('App\Models\tank_auth\user_autologin');
            $user_autologin->delete($data['user_id'], md5($data['key']));

            delete_cookie($this->configTankAuth->autologin_cookie_name);
        }
    }

    /**
     * Login user automatically if he/she provides correct autologin verification
     *
     * @return	void
     */
    private function autologin() {
        if (!$this->is_logged_in() AND ! $this->is_logged_in(FALSE)) {   // not logged in (as any user)
          //  $this->ci->load->helper('cookie');
		  helper('cookie');
            if ($cookie = get_cookie('autlogin')) {

                $data = unserialize($cookie);

                if (isset($data['key']) AND isset($data['user_id'])) {

                   $user_autologin=model('App\Models\tank_auth\ser_autologin');
                    if (!is_null($user = $$user_autologin->get($data['user_id'], md5($data['key'])))) {

                        // Login user
                        $this->session->set(array(
                            'user_id' => $user->id,
                            'username' => $user->username,
                            'status' => STATUS_ACTIVATED,
                        ));

                        // Renew users cookie to prevent it from expiring
                        set_cookie(array(
                            'name' => $this->configTankAuth->$autologin_cookie_name,
                            'value' => $cookie,
                            'expire' =>$this->configTankAuth->$autologin_cookie_life,
                        ));

                        $this->users->update_login_info(
                                $user->id,$this->configTankAuth->$login_record_ip ,$this->configTankAuth->$login_record_time);
                        return TRUE;
                    }
                }
            }
        }
        return FALSE;
    }

    /**
     * Check if login attempts exceeded max login attempts (specified in config)
     *
     * @param	string
     * @return	bool
     */
    function is_max_login_attempts_exceeded($login) {
        
        
        if ($this->configTankAuth->login_count_attempts) {
           // $this->ci->load->model('tank_auth/login_attempts');
           
           $login_attempts = new \App\Models\tank_auth\Login_attempts();

		  //$login_attempts =   new   model('App\Models\tank_auth\Login_attempts');

            return $login_attempts->get_attempts_num($this->request->getIPAddress(), $login) >= $this->configTankAuth->login_max_attempts;
        }
        return FALSE;
    }

    /**
     * Increase number of attempts for given IP-address and login
     * (if attempts to login is being counted)
     *
     * @param	string
     * @return	void
     */
    private function increase_login_attempt($login) {
        if ($this->configTankAuth->login_count_attempts) {
            if (!$this->is_max_login_attempts_exceeded($login)) {
               $login_attempts= model('App\Models\tank_auth/Login_attempts');
                $login_attempts->increase_attempt($this->request->getIPAddress(), $login);
            }
        }
    }

    /**
     * Clear all attempt records for given IP-address and login
     * (if attempts to login is being counted)
     *
     * @param	string
     * @return	void
     */
    private function clear_login_attempts($login) {
        if ($this->configTankAuth->login_count_attempts) {
            $login_attempts= model('App\Models\tank_auth\Login_attempts');
            $login_attempts->clear_attempts(
                    $this->request->getIPAddress(), $login,$this->configTankAuth->login_attempt_expire);
        }
    }

// ====================================================================
//
// Avoid URL injection code. Easy to improve the security (phising, etc..) 
// of all your site when if are calling one .php to centralize all your 
// DB connections.
// 
    //
// ====================================================================

    public function injection() {
        $resto = '';
        $mi_url = '';

        $req = $_SERVER['REQUEST_URI'];
        $cadena = explode("?", $req);

        if (!empty($cadena[0])) {
            $mi_url = $cadena[0];
        }
        if (!empty($cadena[1])) {
            $resto = $cadena[1];
        }
// here you can put your suspicions chains at your will. Just be careful of
// possible coincidences with your URL's variables and parameters
        $inyecc = '/script|http|<|>|%3c|%3e|SELECT|UNION|UPDATE|AND|exe|exec|INSERT|tmp/i';

//  detecting
        if (preg_match($inyecc, $resto)) {


// Get user IP address
            if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
            }

            $ip = filter_var($ip, FILTER_VALIDATE_IP);
            $ip = ($ip === false) ? '0.0.0.0' : $ip;
            // make something, in example send an e-mail alert to administrator
            $remoteaddress = $_SERVER['REMOTE_ADDR'] ?: ($_SERVER['HTTP_X_FORWARDED_FOR'] ?: $_SERVER['HTTP_CLIENT_IP']);
            $message = "attack injection in $mi_url nnchain: $resto nn
   from: (ip-forw-RA):- $ip - " . $ip . " - ." . $ip . "
   --------- end --------------------";


            $data['subject'] = 'Attack injection on ROTA System';
            $email = 'dseme@lociafrica';

            // Send email reminder  to user 
            $this->_send_email('attack', $email, $data, $data['subject'], $message);

            // message and kill execution
            echo '<div><h1><strong><font color=red>We have noticed an attempt of unauthorized access from your machine.  We have recorded your IP address. We advise you to cease and desist any attempts to gain unauthorized access. Any further attempts may invoke Criminal and Legal prosecution.</font></strong></h1></div>';
            die();
        }
    }

    /**
     * Send email message of given type (activate, forgot_password, etc.)
     *
     * @param	string
     * @param	string
     * @param	array
     * @return	void
     */
    function _send_email($type, $email, &$data, $subject, $message) {
        $this->ci->load->library('email');
        $this->ci->email->from($this->configTankAuth->webmaster_email ,$this->configTankAuth->website_name );
        $this->ci->email->reply_to($this->configTankAuth->webmaster_email,$this->configTankAuth->website_name);
        $this->ci->email->to($email);
        $this->ci->email->subject($subject);
        $this->ci->email->message($message);
        //$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->ci->email->send();
    }

}

/* End of file Tank_auth.php */
/* Location: ./application/libraries/Tank_auth.php */