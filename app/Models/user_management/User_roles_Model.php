<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\user_management;

class User_roles_Model extends \CodeIgniter\Model
{
    protected $table = "ctbl_usergroups";
    protected $primaryKey = "id";
    protected $allowedFields = ["title", "user_type", "createdby", "createdtime", "updatedby", "updatedtime"];
}

?>