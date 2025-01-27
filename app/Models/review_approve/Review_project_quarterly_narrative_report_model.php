<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\review_approve;

class Review_project_quarterly_narrative_report_model extends \CodeIgniter\Model
{
    protected $table = "project_quarterly_narrative_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project", "activity_title", "activity_date", "reported_by", "venue", "particiapnts_reached", "objective_activity", "summary_events", "emerging_issues_activity", "way_forward", "lesson_learnt", "recommendations", "conclusions", "createdby", "updatedby", "createtime", "updatedtime", "flag"];
}

?>