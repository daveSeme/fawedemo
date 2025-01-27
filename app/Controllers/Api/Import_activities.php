<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\api;

class Import_activities extends \CodeIgniter\RESTful\ResourceController
{
    protected $format = "json";
    public function index()
    {
        $this->db = \Config\Database::connect();
        $query = $this->db->query("select * from import_activities_data where entry_no = \"" . $this->request->getVar("entry_no") . "\" ");
        $results = $query->getResult();
        if (count($results) <= 0) {
            $data_post = ["budget_name" => $this->request->getVar("budget_name"), "date" => $this->request->getVar("date"), "account_no" => $this->request->getVar("account_no"), "description" => $this->request->getVar("description"), "donor_code" => $this->request->getVar("donor_code"), "project_code" => $this->request->getVar("project_code"), "activity_code" => $this->request->getVar("activity_code"), "county_code" => $this->request->getVar("county_code"), "amount" => $this->request->getVar("amount"), "entry_no" => $this->request->getVar("entry_no"), "status" => "0", "createdtime" => date("Y-m-d H:i:s")];
            $Model = new \App\Models\api\ImportActivitiesModel();
            $inserted_id = $Model->insert($data_post);
            if ($inserted_id) {
                $response = ["status" => 201, "error" => NULL, "messages" => ["success" => "Data Inserted Successfully"]];
                return $this->respondCreated($response);
            }
            return $this->failNotFound("No Data Pushed");
        }
        return $this->failNotFound("Data for This Entry No. Already Pushed, Please use with different Entry No. ");
    }
}

?>