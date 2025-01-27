<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\review_approve;

class Approve_comments_history_reporting_model extends \CodeIgniter\Model
{
    protected $table = "activity_reporting_comments_history";
    protected $primaryKey = "id";
    protected $allowedFields = ["workflow_id", "base_id", "report_type", "user_type", "reviwer_id", "reviwer_comments", "review_date", "report_status", "createdby", "createdtime"];
}

?>