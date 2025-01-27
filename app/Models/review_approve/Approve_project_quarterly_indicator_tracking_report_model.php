<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\review_approve;

class Approve_project_quarterly_indicator_tracking_report_model extends \CodeIgniter\Model
{
    protected $table = "project_quarterly_indicator_tracking_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["report_status", "reviwer_id", "review_date", "report_file", "updatedby", "updatedtime", "flag"];
}

?>