<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Planning;

class Merl_framework extends \App\Controllers\BaseController
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
        check_permision("merl_framework", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Organization MERL Framework";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["data"] = $model->where("base_id ", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/planning/merl_framework/list_js";
        $data["main_content"] = "office/planning/merl_framework/list";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("merl_framework", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit MERL Framework";
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
        $data["js_file"] = "office/planning/merl_framework/js_file";
        $data["main_content"] = "office/planning/merl_framework/edit";
        echo view("template/index", $data);
    }
    public function edit_objective_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit MERL Framework Objective Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_objective_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"], "unit" => ["label" => "Unit Type", "rules" => "required|trim"], "baseline" => ["label" => "Baseline", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "unit" => $this->request->getVar("unit"), "baseline" => $this->request->getVar("baseline"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_objective_indicator");
                $this->db->table("org_objective_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("objective_indicator_target")->delete(["indicator_id" => $idata]);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $idata, "year" => $key, "target" => $n];
                        $this->db->table("objective_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/merl_framework/edit/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/merl_framework/js_file";
        $data["main_content"] = "office/planning/merl_framework/edit_objective_indicator";
        echo view("template/index", $data);
    }
    public function edit_indicator($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit MERL Framework Intervention Indicator";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["form_data"] = get_by_id("id", $this->request->getVar("id"), "org_intervention_indicator");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["indicator" => ["label" => "Performance Indicator", "rules" => "required|trim"], "indicator_category" => ["label" => "Indicator Category", "rules" => "required|trim"], "mov" => ["label" => "Means of Verification", "rules" => "trim"], "risks_assumptions" => ["label" => "Risks & Assumptions", "rules" => "trim"], "unit" => ["label" => "Unit Type", "rules" => "required|trim"], "baseline" => ["label" => "Baseline", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $idata = $this->request->getVar("id");
                $data_post = ["indicator" => $this->request->getVar("indicator"), "indicator_category" => $this->request->getVar("indicator_category"), "mov" => $this->request->getVar("mov"), "risks_assumptions" => $this->request->getVar("risks_assumptions"), "unit" => $this->request->getVar("unit"), "baseline" => $this->request->getVar("baseline"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $idata, "org_intervention_indicator");
                $this->db->table("org_intervention_indicator")->update($data_post, ["id" => $idata]);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->db->table("org_intervention_indicator_target")->delete(["indicator_id" => $idata]);
                $annul_target = $this->request->getVar("annul_target");
                if (is_array($annul_target)) {
                    foreach ($annul_target as $key => $n) {
                        $data_post_annual = ["indicator_id" => $idata, "year" => $key, "target" => $n];
                        $this->db->table("org_intervention_indicator_target")->insert($data_post_annual);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/merl_framework/edit/" . $data["fydp"]));
            }
        }
        $data["js_file"] = "office/planning/merl_framework/js_file";
        $data["main_content"] = "office/planning/merl_framework/edit_indicator";
        echo view("template/index", $data);
    }
    public function read($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View MERL Framework";
        $data["main_title"] = "Planning";
        $data["base_id"] = $this->session->get("office");
        $array_items = ["mode" => ""];
        $this->session->remove($array_items);
        $newdata = ["mode" => "edit"];
        $this->session->set($newdata);
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["fydp"] = $id;
        $data["js_file"] = "office/planning/merl_framework/js_file";
        $data["main_content"] = "office/planning/merl_framework/read";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("merl_framework", "3", 0);
        $model = new \App\Models\planning\Strategic_plansModel();
        $db = \Config\Database::connect();
        $previous_values = get_by_id("id", $id, "org_data_strategic_plans_workflow");
        $builder = $db->table("mda_activity");
        $builder->delete(["mda_plan_id" => $id]);
        $data["user"] = $model->where("id", $id)->delete($id);
        $where = $id;
        trail(1, "delete", "Organization Strategic Plans", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Organization MERL Framework deleted successfully.");
        return $this->response->redirect(site_url("planning/merl_framework"));
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "MERL Framework";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/planning/merl_framework/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "MERL Framework";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/planning/merl_framework/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "MERL Framework";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/planning/merl_framework/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "MERL Framework";
        $model = new \App\Models\planning\Strategic_plansModel();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/planning/merl_framework/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>