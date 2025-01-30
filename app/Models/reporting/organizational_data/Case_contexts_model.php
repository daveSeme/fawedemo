<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

 namespace App\Models\reporting\organizational_data;

class Case_contexts_model extends \CodeIgniter\Model
{
    protected $table = "case_contexts";
    protected $primaryKey = "id";
    protected $allowedFields = ["case_type_id", "code", "name", "createdby", "createdtime", "updatedby", "updatedtime"];
}

?>