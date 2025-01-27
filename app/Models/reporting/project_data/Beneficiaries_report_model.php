<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\project_data;

class beneficiaries_report_model extends \CodeIgniter\Model
{
    protected $table = "project_beneficiaries_report";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project", "year", "reporting_period", "county", "type_beneficiaries", "indirect_beneficiaries", "pwds_male", "pwds_female", "lgbtq_male", "lgbtq_female", "age_0_to_17_male", "age_0_to_17_female", "age_18_to_24_male", "age_18_to_24_female", "age_25_to_49_male", "age_25_to_49_female", "age_50_plus_male", "age_50_plus_female", "createdby", "updatedby", "createtime", "updatedtime", "flag"];
}

?>