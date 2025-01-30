<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Organizational_data;

class Case_Types extends \App\Controllers\BaseController
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
    public function logframe($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Case Types";
        $data["main_title"] = "Case Types";
        $data["fydp"] = $id;
        $data["base_id"] = $this->session->get("office");
        $data["js_file"] = "office/reporting/organizational_data/case_types/log_js";
        $data["main_content"] = "office/reporting/organizational_data/case_types/logframe";
        echo view("template/index", $data);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Case Types";
        $data["main_title"] = "Case Types";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Case_types_model();
        $data["data"] = $model->orderBy("id", "desc")->findAll();
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/list";
        echo view("template/index", $data);
    }
    public function add_case_type()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Case Type";
        $data["main_title"] = "Case Types";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Case Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("case_types")->insert($data_post);
                 // Update the code
                 $insertedID = $this->db->insertID();
                 $this->db->table("case_types")
                     ->where("id", $insertedID)
                     ->update(["code" => "CT_" . $insertedID]);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("reporting/organizational_data/case_types/add_case_type"));
                }
                return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe"));
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/add_case_type";
        echo view("template/index", $data);
    }
    public function edit_case_type($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Case Type";
        $data["main_title"] = "Case Types";
        $data["base_id"] = $this->session->get("office");
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $id, "case_types");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Case Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "case_types");
                $this->db->table("case_types")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe/"));
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/edit_case_type";
        echo view("template/index", $data);
    }
    public function delete_case_type($id = NULL)
    {
        $previous_values = get_by_id("id", $id, "case_types");
        $previous_contexts = get_by_id("case_type_id", $id, "case_contexts");
        $this->db->table("case_types")->delete(["id" => $id]);
        $this->db->table("case_contexts")->delete(["case_type_id" => $id]);
        $where = $id;
        trail(1, "delete", "Case Type", $where, $previous_values);
        trail(1, "delete", "Case Contexts", $where, $previous_contexts);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        $toList = $this->request->getVar("toList");
        if($toList !== null && $toList == true) {
            return $this->response->redirect(site_url("reporting/organizational_data/case_types/"));
        }
        return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe/"));
    }
    public function add_case_context($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Case Context";
        $data["main_title"] = "Case Context";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Case_types_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Case Context Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["case_type_id" => $id, "name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("case_contexts")->insert($data_post);
                // Update the code
                $insertedID = $this->db->insertID();
                $this->db->table("case_contexts")
                    ->where("id", $insertedID)
                    ->update(["code" => "CCT_" . $insertedID]);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("reporting/organizational_data/case_types/add_case_context/" . $data["fydp"] . ""));
                }
                return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe/"));
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/add_case_context";
        echo view("template/index", $data);
    }
    public function edit_case_context($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Case Context";
        $data["main_title"] = "Case Context";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Case_types_model();
        $data["stdata"] = $model->where("id", $this->request->getVar("case_type_id"))->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $id, "case_contexts");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Case Context Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "case_contexts");
                $this->db->table("case_contexts")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe"));
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/edit_case_context";
        echo view("template/index", $data);
    }
    public function delete_case_context($id = NULL)
    {
        $previous_values = get_by_id("id", $id, "case_contexts");
        $this->db->table("case_contexts")->delete(["id" => $id]);
        $where = $id;
        trail(1, "delete", "Case Context", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/organizational_data/case_types/logframe/"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Case Types";
        $data["main_title"] = "Case Types";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Case_types_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $model1 = new \App\Models\reporting\organizational_data\Case_contexts_model();
        $data["stcontexts"] = $model1->where("case_type_id", $id)->findAll();
        $data["js_file"] = "office/reporting/organizational_data/case_types/js_file";
        $data["main_content"] = "office/reporting/organizational_data/case_types/view";
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