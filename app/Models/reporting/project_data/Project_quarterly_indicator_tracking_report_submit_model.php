<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\project_data;

class Project_quarterly_indicator_tracking_report_submit_model extends \CodeIgniter\Model
{
    protected $table = "project_quarterly_indicator_tracking_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["submitted_by", "submitted_date", "submitted_to", "report_status"];
}

?>