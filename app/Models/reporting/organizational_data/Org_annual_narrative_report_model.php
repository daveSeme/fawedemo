<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\organizational_data;

class org_annual_narrative_report_model extends \CodeIgniter\Model
{
    protected $table = "org_annual_narrative_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "strategic_plan", "year", "key_highlights", "challenges_experienced", "success_stories", "activities_anticipated", "file", "createdby", "updatedby", "createtime", "updatedtime", "flag"];
}

?>