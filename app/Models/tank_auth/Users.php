<?php  
namespace App\Models;

use \CodeIgniter\Database\ConnectionInterface;
/**
 * Users
 *
 * This model represents user authentication data. It operates the following tables:
 * - user account data,
 * - user profiles
 *
 
 
 */
class Users  
{
	private $table_name			= 'ctbl_users';			// user accounts
	private $profile_table_name	= 'ctbl_users_profiles';	// user profiles
	private $user_permission_level	= 'ctbl_viewlevels';	// user ctbl_viewlevels
	private $user_group_table	= 'ctbl_usergroups';	// user ctbl_viewlevels
	private $user_permission_sub_level	= 'ctbl_sub_viewlevel';	// user ctbl_viewlevels


	function __construct()
	{
		//parent::__construct();

		$this->ci = config('Tank_auth');
		helper(['cookie', 'date']);
		$this->session = session();
		
		$this->db      = \Config\Database::connect();

		// initialize the database
		if (empty($this->config->databaseGroupName))
		{
			// By default, use CI's db that should be already loaded
			$this->db = \Config\Database::connect();
		}
		else
		{
			// For specific group name, open a new specific connection
			$this->db = \Config\Database::connect($this->config->databaseGroupName);
		}
      
		$this->table_name			= $this->ci->db_table_prefix.$this->table_name;
		$this->profile_table_name	= $this->ci->db_table_prefix.$this->profile_table_name;
		$this->user_permission_level	= $this->ci->db_table_prefix.$this->user_permission_level;
		$this->user_permission_sub_level	= $this->ci->db_table_prefix.$this->user_permission_sub_level;
		$this->user_group_table	= $this->ci->db_table_prefix.$this->user_group_table;

	}

	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_by_id($user_id, $activated)
	{
	
          $builder = $this->db->table($this->table_name);
 		$builder->where('id', $user_id);
		$builder->where('flag', '0');
		$builder->where('activated', $activated ? 1 : 0);
       $query = $builder->get();
		 $results = $query->getResult();
 		if (count($results) == 1) return $query->getRow();
		return NULL;
	}


/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_admin($user_id)
	{
	$db="SELECT  * FROM ctbl_users where ctbl_users.id='$user_id' and flag=0";
	$query = $this->db->query($db);
	$results = $query->getResult();
  	if ( count($results) == 1) 
		return $query->getRow('name');
 	}
	
	
	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_email($user_id)
	{
	$db="SELECT  * FROM ctbl_users where ctbl_users.id='$user_id' and flag=0";
	$query = $this->db->query($db);
	$results = $query->getResult();
  	if (count($results) == 1) 
		return $query->getRow('email');
 	}
	
	/**
	 * Get user record by Id
	 *
	 * @param	int
	 * @param	bool
	 * @return	object
	 */
	function get_user_email_all()
	{
	$db="SELECT  * FROM ctbl_users where ctbl_users.activated=1";
	$query = $this->db->query($db);
   
	 return $query->getRowArray();
 	}
	/**
	 * Get user group 
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_groupname($user_group_id)
	{
	
		$db      = \Config\Database::connect();
         $builder = $db->table($this->user_group_table);
        //$query   = $builder->get();  // Produces: SELECT * FROM mytable
		 
 		$builder->where(' id="'.$user_group_id.'" ');
        $query = $builder->get();
 		 	//echo var_dump($query->getRow());
	//die();
		 if ($builder->countAllResults()== 1)return $query->getRow('title');
 		return  NULL;
		
 
	}
	
	/**
	 * Get user_permission_level
	 *
 	 * @return	object
	 */
	function get_user_permission_level()
	{
		 
  	  $query = $this->db->get($this->user_permission_level);
 
		return $query->result_array();
	}
	
/**
	 * Get user_permission_level
	 *
 	 * @return	object
	 */
	function get_user_permission_sub_level($group_id)
	{
	
			$db      = \Config\Database::connect();
         $builder = $db->table($this->user_permission_sub_level);
        //$query   = $builder->get();  // Produces: SELECT * FROM mytable
  		$builder->where('group_id', $group_id);
           $query = $builder->get();
 		return $query->getResultArray();
	}	
	
	
	/**
	 * Get user record by login (username or email)
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_login($login)
	{
          $builder = $this->db->table($this->table_name);
        //$query   = $builder->get();  // Produces: SELECT * FROM mytable
		 
 		$builder->where('flag=0 and (LOWER(username)="'.strtolower($login).'" or LOWER(email)="'.strtolower($login).'") ');
           $query = $builder->get();
	 
		$results = $query->getResult();
 		if (count($results) == 1) return $query->getRow();
		return NULL;
	}
	
	
	
	

	/**
	 * Get user record by username
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_username($username)
	{
		$this->db->where('LOWER(username)=', strtolower($username));
         $this->db->where('flag', 0);

		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Get user record by email
	 *
	 * @param	string
	 * @return	object
	 */
	function get_user_by_email($email)
	{
		$this->db->where('LOWER(email)=', strtolower($email));
         $this->db->where('flag', 0);
 		$query = $this->db->get($this->table_name);
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Check if username available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_username_available($username)
	{
		$this->db->select('1', FALSE);
		$this->db->where('LOWER(username)=', strtolower($username));
         $this->db->where('flag', 0);

		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Check if email available for registering
	 *
	 * @param	string
	 * @return	bool
	 */
	function is_email_available($email)
	{
		$this->db->select('1', FALSE);
	 
	 $this->db->where('flag=0 and (LOWER(email)="'.strtolower($email).'" or LOWER(new_email)="'.strtolower($email).'") ');


		$query = $this->db->get($this->table_name);
		return $query->num_rows() == 0;
	}

	/**
	 * Create new user record
	 *
	 * @param	array
	 * @param	bool
	 * @return	array
	 */
	function create_user($data, $activated = TRUE)
	{
		$data['created'] = date('Y-m-d H:i:s');
		$data['activated'] = $activated ? 1 : 0;

		if ($this->db->insert($this->table_name, $data)) {
			$user_id = $this->db->insert_id();
			if ($activated)	$this->create_profile($user_id);
			return array('user_id' => $user_id);
		}
		return NULL;
	}

	/**
	 * Activate user if activation key is valid.
	 * Can be called for not activated users only.
	 *
	 * @param	int
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->db->select('1', FALSE);
		$this->db->where('id', $user_id);
		if ($activate_by_email) {
			$this->db->where('new_email_key', $activation_key);
		} else {
			$this->db->where('new_password_key', $activation_key);
		}
		$this->db->where('activated', 0);
		$query = $this->db->get($this->table_name);

		if ($query->num_rows() == 1) {

			$this->db->set('activated', 1);
			$this->db->set('new_email_key', NULL);
			$this->db->where('id', $user_id);
			         $this->db->where('flag', 0);

			$this->db->update($this->table_name);

			$this->create_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Purge table of non-activated users
	 *
	 * @param	int
	 * @return	void
	 */
	function purge_na($expire_period = 172800)
	{
		$this->db->where('activated', 0);
		$this->db->where('UNIX_TIMESTAMP(created) <', time() - $expire_period);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete user record
	 *
	 * @param	int
	 * @return	bool
	 */
	function delete_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->delete($this->table_name);
		if ($this->db->affected_rows() > 0) {
			$this->delete_profile($user_id);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Set new password key for user.
	 * This key can be used for authentication when resetting user's password.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set_password_key($user_id, $new_pass_key)
	{
	
					 
         $builder = $this->db->table($this->table_name);
		 $builder->set('new_password_key', $new_pass_key);
		 $builder->set('new_password_requested',  date('Y-m-d H:i:s'));
   		$builder->where('id', $user_id);
        $builder->update();
 		return $this->db->affectedRows() > 0;
	}

	/**
	 * Check if given password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
	
	       
         $builder = $this->db->table($this->table_name);
		 $builder->select('1', FALSE);
		$builder->where('id', $user_id);
		$builder->where('new_password_key', $new_pass_key);
		$builder->where('UNIX_TIMESTAMP(new_password_requested) >', time() - $expire_period);
 		$query = $builder->get();
 		 $row   = $query->getRowArray();
		 
		 return $row['1'] == 1;
	}

	/**
	 * Change user password if password key is valid and user is authenticated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	bool
	 */
	function reset_password($user_id, $new_pass, $new_pass_key, $expire_period = 900)
	{
	
	   $builder = $this->db->table($this->table_name);
		 $builder->set('password', $new_pass);
		 $builder->set('new_password_key', NULL);
		 $builder->set('new_password_requested', NULL);
		 $builder->where('id', $user_id);
		 $builder->where('new_password_key', $new_pass_key);
		 $builder->where('UNIX_TIMESTAMP(new_password_requested) >=', time() - $expire_period);

		 $builder->update();
		return $this->db->affectedRows() > 0;
 
	}

	/**
	 * Change user password
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function change_password($user_id, $new_pass)
	{
 
		
		$builder = $this->db->table($this->table_name);
		$builder->set('password', $new_pass);
		$builder->set('check_password_update ', 1);
		$builder->where('id', $user_id);
        $builder->where('flag', 0);

		$builder->update();
		return $this->db->affectedRows() > 0;
	}

	/**
	 * Set new email for user (may be activated or not).
	 * The new email cannot be used for login or notification before it is activated.
	 *
	 * @param	int
	 * @param	string
	 * @param	string
	 * @param	bool
	 * @return	bool
	 */
	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->db->set($activated ? 'new_email' : 'email', $new_email);
		$this->db->set('new_email_key', $new_email_key);
		$this->db->where('id', $user_id);
		$this->db->where('activated', $activated ? 1 : 0);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Activate new email (replace old email with new one) if activation key is valid.
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function activate_new_email($user_id, $new_email_key)
	{
		$this->db->set('email', 'new_email', FALSE);
		$this->db->set('new_email', NULL);
		$this->db->set('new_email_key', NULL);
		$this->db->where('id', $user_id);
		$this->db->where('new_email_key', $new_email_key);

		$this->db->update($this->table_name);
		return $this->db->affected_rows() > 0;
	}

	/**
	 * Update user login info, such as IP-address or login time, and
	 * clear previously generated (but not activated) passwords.
	 *
	 * @param	int
	 * @param	bool
	 * @param	bool
	 * @return	void
	 */
	function update_login_info($user_id, $record_ip, $record_time)
	{
	
	$db      = \Config\Database::connect();
       $builder = $db->table($this->table_name);
		$builder->set('new_password_key', NULL);
		$builder->set('new_password_requested', NULL);


		if ($record_ip)		$builder->set('last_ip', $this->ci->login_record_ip);
		if ($record_time)	$builder->set('last_login', date('Y-m-d H:i:s'));

		$builder->where('id', $user_id);
		$builder->update();
	}

	/**
	 * Ban user
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function ban_user($user_id, $reason = NULL)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 1,
			'ban_reason'	=> $reason,
		));
	}

	/**
	 * Unban user
	 *
	 * @param	int
	 * @return	void
	 */
	function unban_user($user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->update($this->table_name, array(
			'banned'		=> 0,
			'ban_reason'	=> NULL,
		));
	}

	/**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 * @return	bool
	 */
	private function create_profile($user_id)
	{
		$this->db->set('user_id', $user_id);
		return $this->db->insert($this->profile_table_name);
	}

	/**
	 * Delete user profile
	 *
	 * @param	int
	 * @return	void
	 */
	private function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->profile_table_name);
	}
	
	  public function store_audit($data,$table)
    {
	
	$db      = \Config\Database::connect();
	  $builder = $db->table($table);
	$insert =   $builder->insert($data);
		 
	    return $insert;
	}
}
// udpate login error in audit trail
 

 

/* End of file users.php */
/* Location: ./application/models/auth/users.php */