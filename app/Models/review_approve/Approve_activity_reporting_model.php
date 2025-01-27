<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\review_approve;

class Approve_activity_reporting_model extends \CodeIgniter\Model
{
    protected $table = "activity_reporting_tool";
    protected $primaryKey = "id";
    protected $allowedFields = ["report_status", "reviwer_id", "review_date", "report_file", "updatedby", "updatedtime", "flag"];
}

?>