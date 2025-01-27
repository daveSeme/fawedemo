<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\api;

class ImportActivitiesDimensionModel extends \CodeIgniter\Model
{
    protected $table = "import_activities";
    protected $primaryKey = "id";
    protected $allowedFields = ["activity_code", "activity_name", "dimension_value_type", "totaling", "blocked", "main_project", "main_activity", "deffered_income_account", "\tgrant_payable_accounts", "leave_activity", "status", "createdtime", "updatedtime"];
}

?>