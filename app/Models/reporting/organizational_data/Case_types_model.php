<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\reporting\organizational_data;

class Case_types_model extends \CodeIgniter\Model
{
    protected $table = "case_types";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "code", "createdby", "createdtime", "updatedby", "updatedtime"];
}

?>