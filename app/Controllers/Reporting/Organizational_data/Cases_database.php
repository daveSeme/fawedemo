<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Organizational_data;

class Cases_database extends \App\Controllers\BaseController
{
    protected $tank_auth = NULL;
    protected $validate = NULL;
    protected $configTankAuth = NULL;
    protected $session = NULL;
    protected $request = NULL;
    public function __construct()
    {
        $this->tank_auth = new \App\Libraries\Tank_auth();
        $this->validate = \Config\Services::validation();
        helper(["form", "url"]);
        helper("security");
        helper("url");
        $this->configTankAuth = config("tank_auth");
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        check_permision("cases_database", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Cases Database";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "desc")->findAll();
        $data["js_file"] = "office/reporting/organizational_data/cases_database/js_file";
        $data["main_content"] = "office/reporting/organizational_data/cases_database/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("cases_database", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Cases Details";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["date" => ["label" => "Date", "rules" => "required|trim"], "case_type" => ["label" => "Case Type", "rules" => "required|trim"], "case_number" => ["label" => "Case Number", "rules" => "required|trim"], "field_office" => ["label" => "Field Office", "rules" => "required|trim"], "case_status" => ["label" => "case Status", "rules" => "trim"], "comments" => ["label" => "Additional Comments", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $postdata = ["base_id" => $this->session->get("office"), "date" => changeDateFormat("Y-m-d", $this->request->getVar("date")), "case_type" => $this->request->getVar("case_type"), "case_number" => $this->request->getVar("case_number"), "file_number" => $this->request->getVar("file_number"), "field_office" => $this->request->getVar("field_office"), "county" => $this->request->getVar("county"), "marital_status" => $this->request->getVar("marital_status"), "more_details_on_services_provided" => $this->request->getVar("more_details_on_services_provided"), "case_status" => $this->request->getVar("case_status"), "comments" => $this->request->getVar("comments"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\organizational_data\Cases_database_model();
                $inserted_id = $model->insert($postdata);
                trail($inserted_id, "insert", $data["title"], $postdata);
                if (is_array($this->request->getVar("case_category"))) {
                    foreach ($this->request->getVar("case_category") as $value) {
                        $post_map_Data = ["workflow_id" => $inserted_id, "case_category" => $value];
                        $this->db->table("cases_map_case_category")->insert($post_map_Data);
                    }
                }
                if (is_array($this->request->getVar("case_context"))) {
                    foreach ($this->request->getVar("case_context") as $value) {
                        $post_map_Data = ["workflow_id" => $inserted_id, "case_context" => $value];
                        $this->db->table("cases_map_case_context")->insert($post_map_Data);
                    }
                }
                if (is_array($this->request->getVar("incidents_referred"))) {
                    foreach ($this->request->getVar("incidents_referred") as $value) {
                        $post_map_Data = ["workflow_id" => $inserted_id, "incidents_referred" => $value];
                        $this->db->table("cases_map_incidents_referred")->insert($post_map_Data);
                    }
                }
                if (is_array($this->request->getVar("services_provided"))) {
                    foreach ($this->request->getVar("services_provided") as $value) {
                        $post_map_Data = ["workflow_id" => $inserted_id, "services_provided" => $value];
                        $this->db->table("cases_map_services_provided")->insert($post_map_Data);
                    }
                }
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("reporting/organizational_data/cases_database/add"));
                }
                return $this->response->redirect(site_url("reporting/organizational_data/cases_database"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/cases_database/add_js";
        $data["main_content"] = "office/reporting/organizational_data/cases_database/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("cases_database", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Cases Details";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["date" => ["label" => "Date", "rules" => "required|trim"], "case_type" => ["label" => "Case Type", "rules" => "required|trim"], "case_number" => ["label" => "Case Number", "rules" => "required|trim"], "field_office" => ["label" => "Field Office", "rules" => "required|trim"], "age_survivor" => ["label" => "Age of Survivor", "rules" => "required|trim"], "gender" => ["label" => "Gender", "rules" => "required|trim"], "diversity" => ["label" => "Diversity", "rules" => "required|trim"], "diversity_male" => ["label" => "Diversity Male", "rules" => "required|trim"], "diversity_female" => ["label" => "Diversity Female", "rules" => "required|trim"], "place_residence" => ["label" => "Place of Residence", "rules" => "required|trim"], "marital_status" => ["label" => "marital status", "rules" => "required|trim"], "case_status" => ["label" => "case Status", "rules" => "trim"], "comments" => ["label" => "Additional Comments", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["base_id" => $this->session->get("office"), "date" => changeDateFormat("Y-m-d", $this->request->getVar("date")), "case_type" => $this->request->getVar("case_type"), "case_number" => $this->request->getVar("case_number"), "file_number" => $this->request->getVar("file_number"), "field_office" => $this->request->getVar("field_office"), "age_survivor" => $this->request->getVar("age_survivor"), "gender" => $this->request->getVar("gender"), "male" => $this->request->getVar("male"), "female" => $this->request->getVar("female"), "diversity" => $this->request->getVar("diversity"), "diversity_male" => $this->request->getVar("diversity_male"), "diversity_female" => $this->request->getVar("diversity_female"), "economic_status" => $this->request->getVar("economic_status"), "place_residence" => $this->request->getVar("place_residence"), "county" => $this->request->getVar("county"), "marital_status" => $this->request->getVar("marital_status"), "more_details_on_services_provided" => $this->request->getVar("more_details_on_services_provided"), "case_status" => $this->request->getVar("case_status"), "comments" => $this->request->getVar("comments"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "project");
                trail(1, "update", $data["title"], $postdata, $previous_values);
                $Model = new \App\Models\reporting\organizational_data\Cases_database_model();
                $Model->update($id, $postdata);
                $this->db->table("cases_map_case_category")->delete(["workflow_id" => $id]);
                if (is_array($this->request->getVar("case_category"))) {
                    foreach ($this->request->getVar("case_category") as $value) {
                        $post_map_Data = ["workflow_id" => $id, "case_category" => $value];
                        $this->db->table("cases_map_case_category")->insert($post_map_Data);
                    }
                }
                $this->db->table("cases_map_case_context")->delete(["workflow_id" => $id]);
                if (is_array($this->request->getVar("case_context"))) {
                    foreach ($this->request->getVar("case_context") as $value) {
                        $post_map_Data = ["workflow_id" => $id, "case_context" => $value];
                        $this->db->table("cases_map_case_context")->insert($post_map_Data);
                    }
                }
                $this->db->table("cases_map_incidents_referred")->delete(["workflow_id" => $id]);
                if (is_array($this->request->getVar("incidents_referred"))) {
                    foreach ($this->request->getVar("incidents_referred") as $value) {
                        $post_map_Data = ["workflow_id" => $id, "incidents_referred" => $value];
                        $this->db->table("cases_map_incidents_referred")->insert($post_map_Data);
                    }
                }
                $this->db->table("cases_map_services_provided")->delete(["workflow_id" => $id]);
                if (is_array($this->request->getVar("services_provided"))) {
                    foreach ($this->request->getVar("services_provided") as $value) {
                        $post_map_Data = ["workflow_id" => $id, "services_provided" => $value];
                        $this->db->table("cases_map_services_provided")->insert($post_map_Data);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/organizational_data/cases_database"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/cases_database/add_js";
        $data["main_content"] = "office/reporting/organizational_data/cases_database/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("cases_database", "3", 0);
        $previous_values = get_by_id("id", $id, "project");
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $status = $model->where("id", $id)->delete($id);
        $where = $id;
        $this->db->table("cases_map_case_category")->delete(["workflow_id" => $id]);
        $this->db->table("cases_map_case_context")->delete(["workflow_id" => $id]);
        $this->db->table("cases_map_incidents_referred")->delete(["workflow_id" => $id]);
        $this->db->table("cases_map_services_provided")->delete(["workflow_id" => $id]);
        trail($status, "delete", "cases_database", $where, $previous_values);
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/organizational_data/cases_database"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Cases Details";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/organizational_data/cases_database/js_file";
        $data["main_content"] = "office/reporting/organizational_data/cases_database/view";
        echo view("template/index", $data);
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Cases Database";
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/organizational_data/cases_database/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Cases Database";
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/organizational_data/cases_database/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Cases Database";
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/organizational_data/cases_database/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Cases Database";
        $model = new \App\Models\reporting\organizational_data\Cases_database_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/organizational_data/cases_database/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>