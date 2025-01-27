<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\project_data;

class Project_outcome_journal_report_model extends \CodeIgniter\Model
{
    protected $table = "project_outcome_journal_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project_name", "report_name", "report_file", "createdby", "updatedby", "createtime", "updatedtime", "flag"];
}

?>