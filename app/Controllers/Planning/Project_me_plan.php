<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Planning;

class Project_me_plan extends \App\Controllers\BaseController
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
        check_permision("project_me_plan", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_me_planModel();
        $data["data"] = $model->where("base_id ", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/planning/project_data/project_me_plan/list_js";
        $data["main_content"] = "office/planning/project_data/project_me_plan/list";
        echo view("template/index", $data);
    }
    public function select_list()
    {
        check_permision("project_me_plan", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["errors"] = [];
        $data["errors"] = "";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project Name", "rules" => "required|trim"]]);
            if ($this->validate->withRequest($this->request)->run()) {
                $project = $this->request->getVar("project");
                $query = $this->db->query("SELECT * FROM project_me_plan_workflow where  base_id = \"" . $data["base_id"] . "\" and project = \"" . $project . "\" ");
                $results = $query->getResult();
                if (count($results) <= 0) {
                    $data_list = ["base_id" => $data["base_id"], "project" => $this->request->getVar("project"), "status" => 1, "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\project\Project_me_planModel();
                    $workflow_id = $model->insert($data_list);
                    trail($workflow_id, "insert", $data["title"], $data_list);
                    return redirect()->to("add/" . $workflow_id);
                }
                $data["errors"] = "Project M&E Plan already created.";
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/select_list";
        echo view("template/index", $data);
    }
    public function add($workflow_id = NULL)
    {
        check_permision("project_me_plan", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "add"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        if ($this->request->getMethod() === "post") {
            $this->session->setFlashdata("feedback", "Project M&E Plan created successfully.");
            return $this->response->redirect(site_url("planning/project_me_plan"));
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add";
        echo view("template/index", $data);
    }
    public function edit($workflow_id = NULL)
    {
        check_permision("project_me_plan", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        if ($this->request->getMethod() === "post") {
            $data_post = ["updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
            $previous_values = get_by_id("id", $workflow_id, "project_me_plan_workflow");
            $model = new \App\Models\project\Project_me_planModel();
            $model->update($workflow_id, $data_post);
            trail(1, "update", $data["title"], $data_post, $previous_values);
            $this->session->setFlashdata("feedback", "Project M&E Plan Updated successfully.");
            return $this->response->redirect(site_url("planning/project_me_plan"));
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit";
        echo view("template/index", $data);
    }
    public function read($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_read";
        $data["main_content"] = "office/planning/project_data/project_me_plan/read";
        echo view("template/index", $data);
    }
    public function delete($workflow_id = NULL)
    {
        check_permision("project_me_plan", "4", 0);
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $model = new \App\Models\project\Project_me_planModel();
        $previous_values = get_by_id("id", $workflow_id, "project_me_plan_workflow");
        $data["user"] = $model->where("id", $workflow_id)->delete($workflow_id);
        $where = $workflow_id;
        trail(1, "delete", "Project M&E Plan", $where, $previous_values);
        $query = $db->query("SET FOREIGN_KEY_CHECKS=1");
        $this->session->setFlashdata("feedback", "Project M&E Plan deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan"));
    }
    public function logframe($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project M&E Plan";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $data["js_file"] = "office/planning/project_data/project_me_plan/log_js";
        $data["main_content"] = "office/planning/project_data/project_me_plan/logframe";
        echo view("template/index", $data);
    }
    public function add_goal($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project M&E Plan Goal";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $project_id = $data["frameworkdata"]["project"];
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Goal Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["workflow_id" => $data["workflow_id"], "project_id" => $project_id, "name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_goal")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_goal/" . $data["workflow_id"]));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_goal";
        echo view("template/index", $data);
    }
    public function edit_goal($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project M&E Plan Goal";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $project_id = $data["frameworkdata"]["project"];
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_goal");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Goal Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["project_id" => $project_id, "name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_goal");
                $this->db->table("project_goal")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_goal";
        echo view("template/index", $data);
    }
    public function delete_goal($workflow_id = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_goal");
        $this->db->table("project_goal")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Goal", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $workflow_id));
    }
    public function add_goal_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Goal Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $goal_id = $this->request->getVar("goal_id");
        $data["goal_data"] = get_by_id("id", $goal_id, "project_goal");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $goal_id = $this->request->getVar("goal_id");
                $data_post = ["goal_id" => $goal_id, "indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_goal_indicator")->insert($data_post);
                $indicator_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $indicator_id, "year" => $key, "target" => $n];
                        $this->db->table("project_goal_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Indicator created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_goal_indicator/" . $data["workflow_id"] . "/?goal_id=" . $this->request->getVar("goal_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_goal_indicator";
        echo view("template/index", $data);
    }
    public function edit_goal_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project Goal Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $goal_id = $this->request->getVar("goal_id");
        $data["goal_data"] = get_by_id("id", $goal_id, "project_goal");
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_goal_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $goal_id = $this->request->getVar("goal_id");
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_goal_indicator");
                $this->db->table("project_goal_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("project_goal_indicator_target")->delete(["indicator_id" => $idata]);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $idata, "year" => $key, "target" => $n];
                        $this->db->table("project_goal_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_goal_indicator";
        echo view("template/index", $data);
    }
    public function delete_goal_indicator($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_goal_indicator");
        $this->db->table("project_goal_indicator_target")->delete(["indicator_id" => $idata]);
        $this->db->table("project_goal_indicator")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Indicator", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $fydp));
    }
    public function add_outcome($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project M&E Plan Outcome";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $goal_id = $this->request->getVar("goal_id");
        $data["goal_data"] = get_by_id("id", $goal_id, "project_goal");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Outcome Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["goal_id" => $goal_id, "name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_outcome")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_outcome/" . $data["workflow_id"] . "/?goal_id=" . $this->request->getVar("goal_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_outcome";
        echo view("template/index", $data);
    }
    public function edit_outcome($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project M&E Plan Outcome";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_outcome");
        $goal_id = $this->request->getVar("goal_id");
        $data["goal_data"] = get_by_id("id", $goal_id, "project_goal");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Outcome Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $goal_id = $this->request->getVar("goal_id");
                $idata = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_outcome");
                $this->db->table("project_outcome")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_outcome";
        echo view("template/index", $data);
    }
    public function delete_outcome($fydp = NULL)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_outcome");
        $this->db->table("project_outcome")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Outcome", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $fydp));
    }
    public function add_outcome_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Outcome Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $outcome_id = $this->request->getVar("outcome_id");
        $data["outcome_data"] = get_by_id("id", $outcome_id, "project_outcome");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $goal_id = $this->request->getVar("goal_id");
                $data_post = ["outcome_id" => $outcome_id, "indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_outcome_indicator")->insert($data_post);
                $indicator_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $indicator_id, "year" => $key, "target" => $n];
                        $this->db->table("project_outcome_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Indicator created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_goal_indicator/" . $data["workflow_id"] . "/?goal_id=" . $this->request->getVar("goal_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_outcome_indicator";
        echo view("template/index", $data);
    }
    public function edit_outcome_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project Outcome Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $outcome_id = $this->request->getVar("outcome_id");
        $data["outcome_data"] = get_by_id("id", $outcome_id, "project_outcome");
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_outcome_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $outcome_id = $this->request->getVar("outcome_id");
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_goal_indicator");
                $this->db->table("project_outcome_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("project_outcome_indicator_target")->delete(["indicator_id" => $idata]);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $idata, "year" => $key, "target" => $n];
                        $this->db->table("project_outcome_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_outcome_indicator";
        echo view("template/index", $data);
    }
    public function delete_outcome_indicator($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_outcome_indicator");
        $this->db->table("project_outcome_indicator_target")->delete(["indicator_id" => $idata]);
        $this->db->table("project_outcome_indicator")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Outcome Indicator", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $fydp));
    }
    public function add_output($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project M&E Plan Output";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $outcome_id = $this->request->getVar("outcome_id");
        $data["outcome_data"] = get_by_id("id", $outcome_id, "project_outcome");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Output Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["outcome_id" => $outcome_id, "name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_output")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_outcome/" . $data["workflow_id"] . "/?outcome_id=" . $this->request->getVar("outcome_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_output";
        echo view("template/index", $data);
    }
    public function edit_output($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project M&E Plan Output";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_output");
        $outcome_id = $this->request->getVar("outcome_id");
        $data["outcome_data"] = get_by_id("id", $outcome_id, "project_outcome");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Output Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $goal_id = $this->request->getVar("goal_id");
                $idata = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_output");
                $this->db->table("project_output")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_output";
        echo view("template/index", $data);
    }
    public function delete_output($fydp = NULL)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_output");
        $this->db->table("project_output")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Output", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $fydp));
    }
    public function add_output_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project M&E Plan Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $output_id = $this->request->getVar("output_id");
        $data["output_data"] = get_by_id("id", $output_id, "project_output");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $output_id = $this->request->getVar("output_id");
                $data_post = ["output_id" => $output_id, "indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_output_indicator")->insert($data_post);
                $indicator_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $indicator_id, "year" => $key, "target" => $n];
                        $this->db->table("project_output_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Indicator created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_output_indicator/" . $data["workflow_id"] . "/?outcome_id=" . $this->request->getVar("outcome_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_output_indicator";
        echo view("template/index", $data);
    }
    public function edit_output_indicator($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project M&E Plan Indicator";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $output_id = $this->request->getVar("output_id");
        $data["output_data"] = get_by_id("id", $output_id, "project_output");
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_output_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Indicator Name", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "unit" => ["label" => "Unit", "rules" => "required|trim"], "definition" => ["label" => "Definition ", "rules" => "trim"], "baseline" => ["label" => "Baseline ", "rules" => "required|trim"], "target" => ["label" => "Target ", "rules" => "required|trim"], "annul_target" => ["label" => "Target Planning ", "rules" => "required"], "means_of_verification" => ["label" => "Means of Verification (Mov) ", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $output_id = $this->request->getVar("output_id");
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "unit" => $this->request->getVar("unit"), "definition" => $this->request->getVar("definition"), "means_of_verification" => $this->request->getVar("means_of_verification"), "baseline" => $this->request->getVar("baseline"), "target" => $this->request->getVar("target"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_output_indicator");
                $this->db->table("project_output_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("project_output_indicator_target")->delete(["indicator_id" => $idata]);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $idata, "year" => $key, "target" => $n];
                        $this->db->table("project_output_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/js_file";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_output_indicator";
        echo view("template/index", $data);
    }
    public function delete_output_indicator($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "project_output_indicator");
        $this->db->table("project_output_indicator_target")->delete(["indicator_id" => $idata]);
        $this->db->table("project_output_indicator")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Project M&E Plan Output Indicator", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $fydp));
    }
    public function add_activity($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Activity";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $output_id = $this->request->getVar("output_id");
        $data["output_data"] = get_by_id("id", $output_id, "project_output");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["activity_type" => ["label" => "Activity Type", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->request->getVar("activity_type") == "Non-Budget Activity") {
                $activity_name = $this->request->getVar("activity_name");
            } else {
                $activity_name = $this->request->getVar("budget_activity_name");
            }
            if ($this->validate->withRequest($this->request)->run()) {
                $output_id = $this->request->getVar("output_id");
                $data_post = ["workflow_id" => $workflow_id, "output_id" => $output_id, "activity_type" => $this->request->getVar("activity_type"), "activity_name" => $activity_name, "activity_code" => $this->request->getVar("activity_code"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("project_activity")->insert($data_post);
                $activity_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $year = $this->request->getVar("year");
                $annual_plan = $this->request->getVar("annual_plan");
                $annul_budget = $this->request->getVar("annul_budget");
                if (is_array($annual_plan)) {
                    foreach ($annual_plan as $key => $n) {
                        $data_post_annual = ["activity_id" => $activity_id, "year" => $year[$key], "annual_plan" => $n, "annul_budget" => $annul_budget[$key]];
                        $this->db->table("project_activity_annual_budget_map")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project_me_plan/add_activity/" . $data["workflow_id"] . "/?output_id=" . $this->request->getVar("output_id")));
                }
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/activity_js";
        $data["main_content"] = "office/planning/project_data/project_me_plan/add_activity";
        echo view("template/index", $data);
    }
    public function edit_activity($workflow_id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Activity";
        $data["main_title"] = "Project Data / Planning";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $workflow_id)->first();
        $data["workflow_id"] = $workflow_id;
        $output_id = $this->request->getVar("output_id");
        $data["output_data"] = get_by_id("id", $output_id, "project_output");
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "project_activity");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["activity_type" => ["label" => "Activity Type", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $output_id = $this->request->getVar("output_id");
                $idata = $this->request->getVar("id");
                if ($this->request->getVar("activity_type") == "Non-Budget Activity") {
                    $activity_name = $this->request->getVar("activity_name");
                } else {
                    $activity_name = $this->request->getVar("budget_activity_name");
                }
                $data_post = ["activity_type" => $this->request->getVar("activity_type"), "activity_name" => $activity_name, "activity_code" => $this->request->getVar("activity_code"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "project_activity");
                $this->db->table("project_activity")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("project_activity_annual_budget_map")->delete(["activity_id" => $idata]);
                $year = $this->request->getVar("year");
                $annual_plan = $this->request->getVar("annual_plan");
                $annul_budget = $this->request->getVar("annul_budget");
                if (is_array($annual_plan)) {
                    foreach ($annual_plan as $key => $n) {
                        $data_post_annual = ["activity_id" => $idata, "year" => $year[$key], "annual_plan" => $n, "annul_budget" => $annul_budget[$key]];
                        $this->db->table("project_activity_annual_budget_map")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $data["workflow_id"]));
            }
        }
        $data["js_file"] = "office/planning/project_data/project_me_plan/activity_js";
        $data["main_content"] = "office/planning/project_data/project_me_plan/edit_activity";
        echo view("template/index", $data);
    }
    public function delete_activity($workflow_id = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "ctbl_usergroups");
        $this->db->table("project_activity")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", "Edit Activity - Project M&E Plan Activity", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project_me_plan/logframe/" . $workflow_id));
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project M&E Plan";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/planning/project_data/project_me_plan/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project M&E Plan";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/planning/project_data/project_me_plan/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project M&E Plan";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/planning/project_data/project_me_plan/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project M&E Plan";
        $model = new \App\Models\project\Project_me_planModel();
        $data["frameworkdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/planning/project_data/project_me_plan/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function get_budget_activity($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("activity_id")) {
            $activity_id = $this->request->getVar("activity_id");
            $project_id = $this->request->getVar("project_id");
            $query = $db->query("select * from import_activities where id=\"" . $activity_id . "\"");
            $row = $query->getRowArray();
            echo $row["activity_code"];
        }
    }
    public function get_budget_activity2($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("activity_id")) {
            $activity_id = $this->request->getVar("activity_id");
            $project_id = $this->request->getVar("project_id");
            $project_details = get_by_id("id", $project_id, "project");
            $startdate = date("Y", strtotime($project_details["start_date"]));
            $enddate = date("Y", strtotime($project_details["end_date"]));
            $project_code = $project_details["project_code"];
            echo "    \t\r\n    \r\n                    <table class=\"table table-bordered\">\r\n                      <thead class=\"bg-highlight\">\r\n                        <tr>\r\n                          <th>Year </th>\r\n                          <th style=\"text-align:center;\">Plan</th>\r\n                          <th>Budget </th>\r\n                        </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody>\r\n                        ";
            $k = 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                $query_budget = $db->query("select * from import_activities_data where project_code= \"" . $project_code . "\" and  Year(date) = \"" . $i . "\"  ");
                $row_budget = $query_budget->getRowArray();
                echo "                        <tr>\r\n                           <td>";
                echo $i;
                echo "<input type=\"hidden\" name=\"year[";
                echo $i;
                echo "]\" value=\"";
                echo $i;
                echo "\" /></td>\r\n                           <td ><input type=\"checkbox\" name=\"annual_plan[";
                echo $i;
                echo "]\" id=\"plan[]\" class=\"form-control\" value=\"1\"  ";
                if ($row_budget["amount"] != "") {
                    echo "checked=\"checked\"";
                }
                echo " ></td>\r\n                           <td><input type=\"number\" name=\"annul_budget[";
                echo $i;
                echo "]\" id=\"annul_budget[]\" class=\"form-control\" value=\"";
                echo $row_budget["amount"];
                echo "\"/>\r\n                           </td>\r\n                        </tr>\r\n                        ";
                $k++;
            }
            echo "                        \r\n                      </tbody>\r\n                    </table>\r\n                    \r\n    \r\n     \r\n    \r\n    ";
        }
    }
}

?>