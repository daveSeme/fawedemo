<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Planning;

class Project_annual_plan extends \App\Controllers\BaseController
{
    protected $tank_auth = NULL;
    protected $validate = NULL;
    protected $configTankAuth = NULL;
    protected $session = NULL;
    protected $request = NULL;
    protected $db = NULL;
    public function __construct()
    {
        $this->tank_auth = new \App\Libraries\Tank_auth();
        $this->validate = \Config\Services::validation();
        helper(["form", "url"]);
        helper("security");
        helper("url");
        $this->db = \Config\Database::connect();
        $this->configTankAuth = config("tank_auth");
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        check_permision("project_annual_plan", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Annual Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_annual_planModel();
        $data["data"] = $model->where("base_id ", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/planning/project_data/project_annual_plan/list_js";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/list";
        echo view("template/index", $data);
    }
    public function select_list()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Annual Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["errors"] = [];
        $data["base_id"] = $this->session->get("office");
        check_permision("project_annual_plan", "2", 0);
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project Name", "rules" => "required|trim"]]);
            if ($this->validate->withRequest($this->request)->run()) {
                $project = $this->request->getVar("project");
                $year = $this->request->getVar("year");
                $query = $this->db->query("select * FROM project_annual_plan_workflow where base_id = \"" . $data["base_id"] . "\" and project = \"" . $project . "\" and year = \"" . $year . "\" ");
                $results = $query->getResult();
                if (count($results) <= 0) {
                    $data_list = ["base_id" => $data["base_id"], "project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "status" => 1, "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\project\Project_annual_planModel();
                    $workflow_id = $model->insert($data_list);
                    trail($workflow_id, "insert", $data["title"], $data_list);
                    return redirect()->to("add/" . $workflow_id);
                }
                $data["errors"] = "Project Annual Plan already created. ";
            }
        }
        $data["js_file"] = "office/planning/project_data/project_annual_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/select_list";
        echo view("template/index", $data);
    }
    public function add($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Annual Plan";
        $data["main_title"] = "Project Data / Planning";
        check_permision("project_annual_plan", "2", 0);
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "add"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["project_id"] = $data["frameworkdata"]["project"];
        $data["workflow_id"] = $workflow_id;
        if ($this->request->getMethod() === "post") {
            $this->session->setFlashdata("feedback", "Project Annual Plan created successfully.");
            return $this->response->redirect(site_url("planning/project_annual_plan"));
        }
        $data["js_file"] = "office/planning/project_data/project_annual_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/add";
        echo view("template/index", $data);
    }
    public function edit($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project Annual Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        check_permision("project_annual_plan", "3", 0);
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["project_id"] = $data["frameworkdata"]["project"];
        $data["workflow_id"] = $workflow_id;
        if ($this->request->getMethod() === "post") {
            $data_post = ["updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
            $previous_values = get_by_id("id", $workflow_id, "project_annual_plan_workflow");
            $model = new \App\Models\project\Project_annual_planModel();
            $model->update($workflow_id, $data_post);
            trail(1, "update", $data["title"], $data_post, $previous_values);
            $this->session->setFlashdata("feedback", "Project Project Annual Plan Updated successfully.");
            return $this->response->redirect(site_url("planning/project_annual_plan"));
        }
        $data["js_file"] = "office/planning/project_data/project_annual_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/edit";
        echo view("template/index", $data);
    }
    public function read($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Project Annual Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["project_id"] = $data["frameworkdata"]["project"];
        $data["workflow_id"] = $workflow_id;
        $data["js_file"] = "office/planning/project_data/project_annual_plan/js_read";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/read";
        echo view("template/index", $data);
    }
    public function delete($workflow_id = NULL)
    {
        check_permision("project_annual_plan", "4", 0);
        $model = new \App\Models\project\Project_annual_planModel();
        $previous_values = get_by_id("id", $workflow_id, "project_annual_plan_workflow");
        $data["user"] = $model->where("id", $workflow_id)->delete($workflow_id);
        $where = $workflow_id;
        trail($data["user"], "delete", " Project Annual Plan", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Project Annual Plan deleted successfully.");
        return $this->response->redirect(site_url("planning/project_annual_plan"));
    }
    public function update_plan($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Activity";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $output_id = $this->request->getVar("output_id");
        $data["output_data"] = get_by_id("id", $output_id, "project_output");
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_activity");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["activity_name" => ["label" => "Activity Name", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $output_id = $this->request->getVar("output_id");
                $idata = $this->request->getVar("id");
                $data_post = ["updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_annual_plan_workflow");
                $this->db->table("project_annual_plan_workflow")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $quarter = $this->request->getVar("quarter");
                $month = $this->request->getVar("month");
                $plan = $this->request->getVar("plan");
                $budget = $this->request->getVar("budget");
                $db = \Config\Database::connect();
                $query = $db->query("delete from project_activity_annual_plan where activity_id = '" . $idata . "' and year = '" . $data["frameworkdata"]["year"] . "'  ");
                if (is_array($plan)) {
                    foreach ($plan as $q => $q_values) {
                        foreach ($q_values as $key => $values) {
                            $data_post_annual = ["activity_id" => $idata, "year" => $data["frameworkdata"]["year"], "quarter" => $q, "month" => $month[$q][$key], "plan" => $values, "budget" => $budget[$q][$key]];
                            $this->db->table("project_activity_annual_plan")->insert($data_post_annual);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_annual_plan/" . $this->session->get("mode") . "/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_annual_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_annual_plan/update_plan";
        echo view("template/index", $data);
    }
    public function get_year($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("project_id")) {
            $project_id = $this->request->getVar("project_id");
            echo "<option value=\"\">Select Year </option>";
            $query = $db->query("select * from project WHERE id=\"" . $project_id . "\"");
            $results = $query->getResultArray();
            foreach ($results as $row) {
                $startdate = date("Y", strtotime($row["start_date"]));
                $enddate = date("Y", strtotime($row["end_date"]));
                $diff = $enddate - $startdate + 1;
            }
            for ($i = $startdate; $i <= $enddate; $i++) {
                echo "<option value=\"" . $i . "\">" . $i . "</option>";
            }
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Annual Plan";
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/planning/project_data/project_annual_plan/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Annual Plan";
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/planning/project_data/project_annual_plan/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Annual Plan";
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/planning/project_data/project_annual_plan/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Annual Plan";
        $model = new \App\Models\project\Project_annual_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/planning/project_data/project_annual_plan/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>