<?php  

namespace App\Models\tank_auth;
use \CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
/**
 * Login_attempts
 *
 * This model serves to watch on all attempts to login on the site
 * (to protect the site from brute-force attack to user database)
 *
 
 
 */
class Login_attempts  extends Model
{
	private $table_name = 'ctbl_users_login_attempts';
	/**
	 * Database object
	 *
	 * @var \CodeIgniter\Database\BaseConnection
	 */
	protected $db;
	function __construct()
	{
		 

 		$this->ci = config('Tank_auth');
		helper(['cookie', 'date']);
		$this->session = session();

		 
	  $this->table_name = $this->ci->db_table_prefix.$this->table_name;


	}

	/**
	 * Get number of attempts to login occured from given IP-address or login
	 *
	 * @param	string
	 * @param	string
	 * @return	int
	 */
	function get_attempts_num($ip_address, $login)
	{
	
	    $db      = \Config\Database::connect();
         $builder = $db->table($this->table_name);
        //$query   = $builder->get();  // Produces: SELECT * FROM mytable
		$builder->select('1', FALSE);
 		$builder->where('ip_address', $ip_address);
       if (strlen($login) > 0) $builder->orWhere('login', $login);
  
        $query = $builder->get();
 		return  $builder->countAll();
	}

	/**
	 * Increase number of attempts for given IP-address and login
	 *
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	function increase_attempt($ip_address, $login)
	{
	 $db      = \Config\Database::connect();
	  $builder = $db->table($this->table_name);
	  $builder->insert(array('ip_address' => $ip_address, 'login' => $login));
		//$this->db->insert($this->table_name, array('ip_address' => $ip_address, 'login' => $login));
	}

	/**
	 * Clear all attempt records for given IP-address and login.
	 * Also purge obsolete login attempts (to keep DB clear).
	 *
	 * @param	string
	 * @param	string
	 * @param	int
	 * @return	void
	 */
	function clear_attempts($ip_address, $login, $expire_period = 86400)
	{
	
		 $db      = \Config\Database::connect();
	   $builder = $db->table($this->table_name);
 
		$builder->where(array('ip_address' => $ip_address, 'login' => $login));

		// Purge obsolete login attempts
		$builder->orWhere('UNIX_TIMESTAMP(time) <', time() - $expire_period);

		$builder->delete();
	}
}

/* End of file login_attempts.php */
/* Location: ./application/models/auth/login_attempts.php */