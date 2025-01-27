<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\user_management;

class User_Model extends \CodeIgniter\Model
{
    protected $table = "ctbl_users";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "name", "user_group_id", "user_type", "account_type", "banned", "activated", "username", "password", "user_type", "email", "contact_number", "createdby", "createtime", "updateby", "updatetime"];
}

?>