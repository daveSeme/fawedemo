<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\master;

class Unit_Model extends \CodeIgniter\Model
{
    protected $table = "mas_unit";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "createdby", "createdtime", "updatedby", "updatedtime"];
}

?>