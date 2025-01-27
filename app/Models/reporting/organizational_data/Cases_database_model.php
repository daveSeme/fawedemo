<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\organizational_data;

class Cases_database_model extends \CodeIgniter\Model
{
    protected $table = "cases_database";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "date", "case_type", "case_number", "file_number", "field_office", "age_survivor", "gender", "male", "female", "diversity", "diversity_male", "diversity_female", "economic_status", "place_residence", "county", "marital_status", "more_details_on_services_provided", "case_status", "comments", "createdby", "updatedby", "createdtime", "updatedtime", "flag"];
}

?>