<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\knowledge_center;

class Resources_model extends \CodeIgniter\Model
{
    protected $table = "resources";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project", "activity_title", "activity_date", "reported_by", "venue", "particiapnts_reached", "objective_activity", "summary_events", "emerging_issues_activity", "way_forward", "lesson_learnt", "recommendations", "conclusions", "report_status", "createdby", "updatedby", "createtime", "updatedtime", "flag"];
}

?>