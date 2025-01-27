<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\project_data;

class Project_quarterly_workplan_progress_reports_model extends \CodeIgniter\Model
{
    protected $table = "project_quarterly_workplan_progress_reports";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project", "year", "quarter", "report_name", "createdby", "createtime", "updatedby", "updatedtime", "flag"];
}

?>