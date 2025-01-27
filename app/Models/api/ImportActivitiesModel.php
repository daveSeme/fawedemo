<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\api;

class ImportActivitiesModel extends \CodeIgniter\Model
{
    protected $table = "import_activities_data";
    protected $primaryKey = "id";
    protected $allowedFields = ["budget_name", "date", "account_no", "description", "donor_code", "project_code", "activity_code", "county_code", "amount", "entry_no", "status", "createdtime", "updatedtime"];
}

?>