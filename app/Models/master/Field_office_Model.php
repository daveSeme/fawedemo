<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\master;

class Field_office_Model extends \CodeIgniter\Model
{
    protected $table = "field_office";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "name", "contact_person", "contact_email", "phone", "createdby", "updatedby", "createdtime", "updatedtime", "flag"];
}

?>