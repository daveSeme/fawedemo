<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\master;

class StructureModel extends \CodeIgniter\Model
{
    protected $table = "mas_structure";
    protected $primaryKey = "id";
    protected $allowedFields = ["code", "name", "createdby", "createdtime", "updatedby", "updatedtime"];
}

?>