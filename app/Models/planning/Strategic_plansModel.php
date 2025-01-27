<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\planning;

class Strategic_plansModel extends \CodeIgniter\Model
{
    protected $table = "org_data_strategic_plans_workflow";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "plan_name", "startyear", "endyear", "status", "createdby", "updatedby", "createdtime", "updatedtime"];
}

?>