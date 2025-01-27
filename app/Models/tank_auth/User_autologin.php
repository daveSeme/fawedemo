<?php  
/**
 * User_Autologin
 *
 * This model represents user autologin data. It can be used
 * for user verification when user claims his autologin passport.
 *
 
 
 */
 namespace App\Models;

use \CodeIgniter\Database\ConnectionInterface;

class User_Autologin  
{
	private $table_name			= 'ctbl_users_autologin';
	private $users_table_name	= 'ctbl_users';

	function __construct()
	{
		 $this->ci = config('Tank_auth');
		helper(['cookie', 'date']);
		$this->session = session();
		
		$this->db      = \Config\Database::connect();
		$this->table_name		= $this->ci->db_table_prefix.$this->table_name;
		$this->users_table_name	= $this->ci->db_table_prefix.$this->users_table_name;
	}

	/**
	 * Get user data for auto-logged in user.
	 * Return NULL if given key or user ID is invalid.
	 *
	 * @param	int
	 * @param	string
	 * @return	object
	 */
	function get($user_id, $key)
	{
		$this->db->select($this->users_table_name.'.id');
		$this->db->select($this->users_table_name.'.username');
		$this->db->from($this->users_table_name);
		$this->db->join($this->table_name, $this->table_name.'.user_id = '.$this->users_table_name.'.id');
		$this->db->where($this->table_name.'.user_id', $user_id);
		$this->db->where($this->table_name.'.key_id', $key);
		$query = $this->db->get();
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Save data for user's autologin
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set($user_id, $key)
	{
	
	 $builder = $this->db->table($this->table_name);
	      
	 $data = [
        'user_id' =>  $user_id,
    'key_id'  => $key,
    'user_agent'  => substr($this->input->user_agent(), 0, 149),
    'last_ip'  =>$this->input->ip_address(),
             
        ];
return $builder->insert($data);

		 
	}

	/**
	 * Delete user's autologin data
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function delete($user_id, $key)
	{
	
			  $builder = $this->db->table($this->table_name);

		$builder->where('user_id', $user_id);
		$builder->where('key_id', $key);
		$builder->delete();
		 
	}

	/**
	 * Delete all autologin data for given user
	 *
	 * @param	int
	 * @return	void
	 */
	function clear($user_id)
	{
	 $builder = $this->db->table($this->table_name);
 		$builder->where('user_id', $user_id);
		$builder->delete();
	}

	/**
	 * Purge autologin data for given user and login conditions
	 *
	 * @param	int
	 * @return	void
	 */
	function purge($user_id)
	{
		 $builder = $this->db->table($this->table_name);

		$builder->where('user_id', $user_id);
		$builder->where('user_agent', substr($this->input->user_agent(), 0, 149));
		$builder->where('last_ip', $this->input->ip_address());
		$builder->delete();
	}
}

/* End of file user_autologin.php */
/* Location: ./application/models/auth/user_autologin.php */