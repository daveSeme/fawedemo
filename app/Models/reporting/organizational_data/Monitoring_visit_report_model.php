<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\organizational_data;

class Monitoring_visit_report_model extends \CodeIgniter\Model
{
    protected $table = "monitoring_visit_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "program", "project_id", "completed_by", "visit_date", "location", "objectives", "next_visit_completed_by", "next_visit_location", "next_visit_date", "next_visit_objectives", "photos", "createdby", "updatedby", "createdtime", "updatedtime", "flag"];
}

?>