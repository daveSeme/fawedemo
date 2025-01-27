<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Planning;

class Strategic_plans extends \App\Controllers\BaseController
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
        check_permision("strategic_plans", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Organization Strategic Plans";
        $data["main_title"] = "Organization Plans";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["data"] = $model->where("base_id ", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/planning/strategic_plans/list_js";
        $data["main_content"] = "office/planning/strategic_plans/list";
        echo view("template/index", $data);
    }
    public function select_list()
    {
        check_permision("strategic_plans", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $data["errors"] = "";
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Strategic Plan Name", "rules" => "required|trim"], "start-year" => ["label" => "Start Year", "rules" => "required|trim"], "end-year" => ["label" => "End Year", "rules" => "required|trim"]]);
            if ($this->validate->withRequest($this->request)->run()) {
                $plan_name = $this->request->getVar("name");
                $startyear = $this->request->getVar("start-year");
                $endyear = $this->request->getVar("end-year");
                $years = $endyear - $startyear + 1;
                if ($years == 5) {
                    $query = $this->db->query("SELECT * FROM org_data_strategic_plans_workflow where  base_id=\"" . $data["base_id"] . "\" and plan_name  = \"" . $plan_name . "\" ");
                    $results = $query->getResult();
                    if (count($results) <= 0) {
                        $data_list = ["base_id" => $data["base_id"], "plan_name" => $plan_name, "startyear" => $this->request->getVar("start-year"), "endyear" => $this->request->getVar("end-year"), "status" => 1, "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                        $model = new \App\Models\planning\Strategic_plansModel();
                        $fydp_id = $model->insert($data_list);
                        trail(1, "insert", $data["title"], $data_list);
                        return redirect()->to("add/" . $fydp_id);
                    }
                    $data["errors"] = "This plan already created , Please enter the new one ";
                } else {
                    $data["errors"] = "Strategic Plan not allowed to create plan less than and greater than 5 Year, Please reset the start date and end date";
                }
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/select_list";
        echo view("template/index", $data);
    }
    public function get_end_year()
    {
        $data["start_year"] = $this->request->getVar("start_year");
        $end_year = $data["start_year"] + 4;
        echo "<input type=\"text\" name=\"end-year\" class=\"form-control\" readonly=\"\" value=\"" . $end_year . "\">";
    }
    public function add($id = NULL)
    {
        check_permision("strategic_plans", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "add"];
        $this->session->set($newdata);
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->session->setFlashdata("feedback", "Organization Streatgy plan created successfully.");
            return $this->response->redirect(site_url("planning/strategic_plans"));
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add";
        echo view("template/index", $data);
    }
    public function edit_select($id = NULL)
    {
        check_permision("strategic_plans", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $data["errors"] = "";
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $data_post = ["plan_name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
            $previous_values = get_by_id("id", $id, "org_data_strategic_plans_workflow");
            $model = new \App\Models\planning\Strategic_plansModel();
            $model->update($id, $data_post);
            trail(1, "update", $data["title"], $data_post, $previous_values);
            $this->session->setFlashdata("feedback", "Strategic Plan updated successfully.");
            return $this->response->redirect(site_url("planning/strategic_plans/edit/" . $id));
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_select";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("strategic_plans", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $data_post = ["updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
            $previous_values = get_by_id("id", $id, "org_data_strategic_plans_workflow");
            $model = new \App\Models\planning\Strategic_plansModel();
            $model->update($id, $data_post);
            trail(1, "update", $data["title"], $data_post, $previous_values);
            $this->session->setFlashdata("feedback", "Strategic Plan updated successfully.");
            return $this->response->redirect(site_url("planning/strategic_plans"));
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit";
        echo view("template/index", $data);
    }
    public function logframe($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["js_file"] = "office/planning/strategic_plans/log_js";
        $data["main_content"] = "office/planning/strategic_plans/logframe";
        echo view("template/index", $data);
    }
    public function add_themetic_area($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Organization Themetic Area";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Strategic Issue", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["base_id" => $data["base_id"], "mda_plan_id " => $data["fydp"], "name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("org_thematic_area")->insert($data_post);
                $activity_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/strategic_plans/add_themetic_area/" . $data["fydp"]));
                }
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add_themetic_area";
        echo view("template/index", $data);
    }
    public function edit_themetic_area($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Organization Themetic Area";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_thematic_area");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Strategic Issue", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_thematic_area");
                $this->db->table("org_thematic_area")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_themetic_area";
        echo view("template/index", $data);
    }
    public function delete_themetic_area($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "org_thematic_area");
        $this->db->table("org_thematic_area")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", " Organization Strategic Issue", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $fydp));
    }
    public function add_objective($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Organization Strategic Objective";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strategic_objective" => ["label" => "Strategic Objective", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["base_id" => $data["base_id"], "th_area_id" => $this->request->getVar("th_area_id"), "strategic_objective" => $this->request->getVar("strategic_objective"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("org_objective")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/strategic_plans/add_objective/" . $data["fydp"] . "/?so_issue=" . $this->request->getVar("so_issue")));
                }
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add_objective";
        echo view("template/index", $data);
    }
    public function edit_objective($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Organization Strategic Objective";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_objective");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strategic_objective" => ["label" => "Strategic Objective", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["strategic_objective" => $this->request->getVar("strategic_objective"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_objective");
                $this->db->table("org_objective")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_objective";
        echo view("template/index", $data);
    }
    public function delete_objective($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "org_objective");
        $this->db->table("org_objective")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", " Organization Objective", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $fydp));
    }
    public function add_objective_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Organization Objective Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["base_id" => $data["base_id"], "objective_id" => $this->request->getVar("objective_id"), "indicator" => $this->request->getVar("indicator"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("org_objective_indicator")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/strategic_plans/add_objective_indicator/" . $data["fydp"] . "/?actvity_id=" . $this->request->getVar("actvity_id")));
                }
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add_objective_indicator";
        echo view("template/index", $data);
    }
    public function edit_objective_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Organization Objective Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_objective_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_objective_indicator");
                $this->db->table("org_objective_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_objective_indicator";
        echo view("template/index", $data);
    }
    public function delete_objective_indicator($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "org_objective_indicator");
        $this->db->table("org_objective_indicator")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", " Organization Strategic Plans Indicator", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $fydp));
    }
    public function add_strategic_intervention($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Organization Strategic Intervention";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strat_interven_name" => ["label" => "Strategic Intervention", "rules" => "required|trim"], "strat_interven_category" => ["label" => "Strategic Intervention Category", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["base_id" => $data["base_id"], "objective_id" => $this->request->getVar("objective_id"), "strat_interven_name" => $this->request->getVar("strat_interven_name"), "strat_interven_category" => $this->request->getVar("strat_interven_category"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("org_strategic_intervention")->insert($data_post);
                $activity_id = $this->db->insertID();
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/strategic_plans/add_strategic_intervention/" . $data["fydp"] . "/?st_id=" . $this->request->getVar("st_id")));
                }
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add_strategic_intervention";
        echo view("template/index", $data);
    }
    public function edit_strategic_intervention($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Strategic Intervention";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_strategic_intervention");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strat_interven_name" => ["label" => "Strategic Intervention", "rules" => "required|trim"], "strat_interven_category" => ["label" => "Strategic Intervention Category", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["strat_interven_name" => $this->request->getVar("strat_interven_name"), "strat_interven_category" => $this->request->getVar("strat_interven_category"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_strategic_intervention");
                $this->db->table("org_strategic_intervention")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_strategic_intervention";
        echo view("template/index", $data);
    }
    public function delete_strategic_intervention($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "org_strategic_intervention");
        $this->db->table("org_strategic_intervention")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", " Organization Strategic Intervention", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $fydp));
    }
    public function add_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Intervention Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["base_id" => $data["base_id"], "intervention_id" => $this->request->getVar("intervention_id"), "indicator" => $this->request->getVar("indicator"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $this->db->table("org_intervention_indicator")->insert($data_post);
                trail(1, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/strategic_plans/add_indicator/" . $data["fydp"] . "/?intervention_id =" . $this->request->getVar("intervention_id")));
                }
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/add_indicator";
        echo view("template/index", $data);
    }
    public function edit_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Intervention Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_intervention_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_intervention_indicator");
                $this->db->table("org_intervention_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/edit_indicator";
        echo view("template/index", $data);
    }
    public function delete_indicator($fydp = NULL)
    {
        $idata = $this->request->getVar("id");
        $previous_values = get_by_id("id", $idata, "org_intervention_indicator");
        $this->db->table("org_intervention_indicator")->delete(["id" => $idata]);
        $where = $idata;
        trail(1, "delete", " Organization Intervention Indicator", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans/logframe/" . $fydp));
    }
    public function read($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/read";
        echo view("template/index", $data);
    }
    public function tree_view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Organization Strategic Plans";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["js_file"] = "office/planning/strategic_plans/js_file";
        $data["main_content"] = "office/planning/strategic_plans/tree_view";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("strategic_plans", "3", 0);
        $model = new \App\Models\planning\Strategic_plansModel();
        $db = \Config\Database::connect();
        $previous_values = get_by_id("id", $id, "org_data_strategic_plans_workflow");
        $builder = $db->table("org_data_strategic_plans_workflow");
        $builder->delete(["id" => $id]);
        $data["user"] = $model->where("id", $id)->delete($id);
        $where = $id;
        trail(1, "delete", "Organization Strategic Plans", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Organization Strategic Plan deleted successfully.");
        return $this->response->redirect(site_url("planning/strategic_plans"));
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Organization Strategic Plans";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/planning/strategic_plans/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Organization Strategic Plans";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/planning/strategic_plans/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Organization Strategic Plans";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/planning/strategic_plans/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Organization Strategic Plans";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/planning/strategic_plans/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>