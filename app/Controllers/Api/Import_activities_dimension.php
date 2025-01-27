<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\api;

class Import_activities_dimension extends \CodeIgniter\RESTful\ResourceController
{
    protected $format = "json";
    public function index()
    {
        if ($this->request->getVar("activity_code") != "") {
            $this->db = \Config\Database::connect();
            $query = $this->db->query("select * from import_activities where activity_code = \"" . trim($this->request->getVar("activity_code")) . "\" ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                $data_post = ["activity_code" => trim($this->request->getVar("activity_code")), "activity_name" => trim($this->request->getVar("activity_name")), "dimension_value_type" => $this->request->getVar("dimension_value_type"), "totaling" => $this->request->getVar("totaling"), "blocked" => $this->request->getVar("blocked"), "main_project" => $this->request->getVar("main_project"), "main_activity" => $this->request->getVar("main_activity"), "deffered_income_account" => $this->request->getVar("deffered_income_account"), "grant_payable_accounts" => $this->request->getVar("grant_payable_accounts"), "leave_activity" => $this->request->getVar("leave_activity"), "status" => "0", "createdtime" => date("Y-m-d H:i:s")];
                $Model = new \App\Models\api\ImportActivitiesDimensionModel();
                $inserted_id = $Model->insert($data_post);
                if ($inserted_id) {
                    $response = ["status" => 201, "error" => NULL, "messages" => ["success" => "Data Inserted Successfully"]];
                    return $this->respondCreated($response);
                }
                return $this->failNotFound("No Data Pushed...");
            }
            return $this->failNotFound("Data for This Activity Code. Already Pushed, Please use with different Activity Code. ");
        }
        return $this->failNotFound("No Data Pushed...");
    }
}

?>