<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\planning;

class District_strategic_plan_Model extends \CodeIgniter\Model
{
    protected $table = "district_strategic_plan_workflow";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "district", "plan_name", "startdate", "enddate", "status", "createdby", "updatedby", "createdtime", "updatedtime"];
}

?>