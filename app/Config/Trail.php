<?php  
 namespace Config;

use CodeIgniter\Config\BaseConfig;

class Trail extends \CodeIgniter\Config\BaseConfig
{



/*
|--------------------------------------------------------------------------
| Enable Audit Trail
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to use of audit trail
|
*/
   public $audit_enable = TRUE;

/*
|--------------------------------------------------------------------------
| Not Allowed table for auditing
|--------------------------------------------------------------------------
|
| The following setting contains a list of the not allowed database tables for auditing.
| You may add those tables that you don't want to perform audit.
|
*/
 

  public $not_allowed_tables = [
    'ci_sessions',
    'user_audit_trails',
];

/*
|--------------------------------------------------------------------------
| Enable Insert Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track insert event.
|
*/
  public $track_insert = TRUE;

/*
|--------------------------------------------------------------------------
| Enable Update Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track update event
|
*/
 public $track_update = TRUE;
/*
|--------------------------------------------------------------------------
| Enable Delete Event Track
|--------------------------------------------------------------------------
|
| Set [TRUE/FALSE] to track delete event
|
*/
public $track_delete = TRUE;


 

/* End of file tank_auth.php */
/* Location: ./application/config/tank_auth.php */

}