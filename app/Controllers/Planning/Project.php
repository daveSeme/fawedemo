<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Planning;

class Project extends \App\Controllers\BaseController
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
        check_permision("project", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Background";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\project\Project_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/planning/project_data/project/js_file";
        $data["main_content"] = "office/planning/project_data/project/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("project", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Background";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project_code" => ["label" => "Project Code", "rules" => "trim"], "name" => ["label" => "Name", "rules" => "required|trim"], "start_date" => ["label" => "Start Date", "rules" => "required|trim"], "end_date" => ["label" => "End Date", "rules" => "required|trim"], "duration" => ["label" => "Duration", "rules" => "required|trim"], "funding_partner" => ["label" => "Funding Partner", "rules" => "required|trim"], "project_budget" => ["label" => "project budget", "rules" => "required|trim"], "budget_currency" => ["label" => "budget currency", "rules" => "required|trim"], "reporting_schedule" => ["label" => "Reporting Schedule", "rules" => "required"], "person_responsible" => ["label" => "Person Responsible", "rules" => "required|trim"], "implementing_partner" => ["label" => "Implementing Partner", "rules" => "required|trim"], "project_status" => ["label" => "Project Status", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $postdata = ["base_id" => $this->session->get("office"), "project_code" => $this->request->getVar("project_code"), "name" => $this->request->getVar("name"), "start_date" => changeDateFormat("Y-m-d", $this->request->getVar("start_date")), "end_date" => changeDateFormat("Y-m-d", $this->request->getVar("end_date")), "duration" => $this->request->getVar("duration"), "funding_partner" => $this->request->getVar("funding_partner"), "project_budget" => $this->request->getVar("project_budget"), "budget_currency" => $this->request->getVar("budget_currency"), "reporting_schedule" => $this->request->getVar("reporting_schedule"), "rs_monthly_jan" => $this->request->getVar("rs_monthly_jan"), "rs_monthly_jan_date" => $this->request->getVar("rs_monthly_jan_date"), "rs_monthly_feb" => $this->request->getVar("rs_monthly_feb"), "rs_monthly_feb_date" => $this->request->getVar("rs_monthly_feb_date"), "rs_monthly_mar" => $this->request->getVar("rs_monthly_mar"), "rs_monthly_mar_date" => $this->request->getVar("rs_monthly_mar_date"), "rs_monthly_apr" => $this->request->getVar("rs_monthly_apr"), "rs_monthly_apr_date" => $this->request->getVar("rs_monthly_apr_date"), "rs_monthly_may" => $this->request->getVar("rs_monthly_may"), "rs_monthly_may_date" => $this->request->getVar("rs_monthly_may_date"), "rs_monthly_june" => $this->request->getVar("rs_monthly_june"), "rs_monthly_june_date" => $this->request->getVar("rs_monthly_june_date"), "rs_monthly_july" => $this->request->getVar("rs_monthly_july"), "rs_monthly_july_date" => $this->request->getVar("rs_monthly_july_date"), "rs_monthly_aug" => $this->request->getVar("rs_monthly_aug"), "rs_monthly_aug_date" => $this->request->getVar("rs_monthly_aug_date"), "rs_monthly_sep" => $this->request->getVar("rs_monthly_sep"), "rs_monthly_sep_date" => $this->request->getVar("rs_monthly_sep_date"), "rs_monthly_oct" => $this->request->getVar("rs_monthly_oct"), "rs_monthly_oct_date" => $this->request->getVar("rs_monthly_oct_date"), "rs_monthly_nov" => $this->request->getVar("rs_monthly_nov"), "rs_monthly_nov_date" => $this->request->getVar("rs_monthly_nov_date"), "rs_monthly_dec" => $this->request->getVar("rs_monthly_dec"), "rs_monthly_dec_date" => $this->request->getVar("rs_monthly_dec_date"), "rs_quarterly_q1_month" => $this->request->getVar("rs_quarterly_q1_month"), "rs_quarterly_q1_month_date" => $this->request->getVar("rs_quarterly_q1_month_date"), "rs_quarterly_q2_month" => $this->request->getVar("rs_quarterly_q2_month"), "rs_quarterly_q2_month_date" => $this->request->getVar("rs_quarterly_q2_month_date"), "rs_quarterly_q3_month" => $this->request->getVar("rs_quarterly_q3_month"), "rs_quarterly_q3_month_date" => $this->request->getVar("rs_quarterly_q3_month_date"), "rs_quarterly_q4_month" => $this->request->getVar("rs_quarterly_q4_month"), "rs_quarterly_q4_month_date" => $this->request->getVar("rs_quarterly_q4_month_date"), "rs_biannual1_month" => $this->request->getVar("rs_biannual1_month"), "rs_biannual1_month_date" => $this->request->getVar("rs_biannual1_month_date"), "rs_biannual2_month" => $this->request->getVar("rs_biannual2_month"), "rs_biannual2_month_date" => $this->request->getVar("rs_biannual2_month_date"), "rs_annual_month" => $this->request->getVar("rs_annual_month"), "rs_annual_month_date" => $this->request->getVar("rs_annual_month_date"), "person_responsible" => $this->request->getVar("person_responsible"), "implementing_partner" => $this->request->getVar("implementing_partner"), "project_status" => $this->request->getVar("project_status"), "report_submission_date" => changeDateFormat("Y-m-d", $this->request->getVar("report_submission_date")), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\project\Project_model();
                $p_id = $model->insert($postdata);
                trail($p_id, "insert", $data["title"], $postdata);
                if (is_array($this->request->getVar("countries"))) {
                    foreach ($this->request->getVar("countries") as $value) {
                        $post_district = ["project_id" => $p_id, "county_id" => $value];
                        $this->db->table("project_map_county")->insert($post_district);
                    }
                }
                if (is_array($this->request->getVar("thematic_area"))) {
                    foreach ($this->request->getVar("thematic_area") as $value) {
                        $post_region = ["project_id" => $p_id, "thematic_area_id" => $value];
                        $this->db->table("project_map_thematic_area")->insert($post_region);
                    }
                }
                if (is_array($this->request->getVar("notification_recepient"))) {
                    foreach ($this->request->getVar("notification_recepient") as $value) {
                        $post_region = ["project_id" => $p_id, "recepient_id" => $value];
                        $this->db->table("project_notification_recepient_map")->insert($post_region);
                    }
                }
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("planning/project/add"));
                }
                return $this->response->redirect(site_url("planning/project/"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/planning/project_data/project/add_js";
        $data["main_content"] = "office/planning/project_data/project/add";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("project", "3", 0);
        $previous_values = get_by_id("id", $id, "project");
        $model = new \App\Models\project\Project_model();
        $status = $model->where("id", $id)->delete($id);
        $where = $id;
        $this->db->table("project_map_county")->delete(["project_id" => $id]);
        $this->db->table("project_map_thematic_area")->delete(["project_id" => $id]);
        trail($status, "delete", "Project", $where, $previous_values);
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("planning/project/"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Project Background";
        $data["main_title"] = "Project Data / Planning";
        $data["pid"] = $id;
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/planning/project_data/project/add_js";
        $data["main_content"] = "office/planning/project_data/project/view";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("project", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Update Project Background";
        $data["main_title"] = "Project Data / Planning";
        $data["base_id"] = $this->session->get("office");
        $data["pid"] = $id;
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project_code" => ["label" => "Project Code", "rules" => "trim"], "name" => ["label" => "Name", "rules" => "required|trim"], "start_date" => ["label" => "Start Date", "rules" => "required|trim"], "end_date" => ["label" => "End Date", "rules" => "required|trim"], "funding_partner" => ["label" => "Funding Partner", "rules" => "required|trim"], "duration" => ["label" => "Duration", "rules" => "required|trim"], "reporting_schedule" => ["label" => "Reporting Schedule", "rules" => "required"], "person_responsible" => ["label" => "Person Responsible", "rules" => "required|trim"], "implementing_partner" => ["label" => "Implementing Partner", "rules" => "required|trim"], "project_status" => ["label" => "Project Status", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["project_code" => $this->request->getVar("project_code"), "name" => $this->request->getVar("name"), "start_date" => changeDateFormat("Y-m-d", $this->request->getVar("start_date")), "end_date" => changeDateFormat("Y-m-d", $this->request->getVar("end_date")), "duration" => $this->request->getVar("duration"), "funding_partner" => $this->request->getVar("funding_partner"), "project_budget" => $this->request->getVar("project_budget"), "budget_currency" => $this->request->getVar("budget_currency"), "reporting_schedule" => $this->request->getVar("reporting_schedule"), "rs_monthly_jan" => $this->request->getVar("rs_monthly_jan"), "rs_monthly_jan_date" => $this->request->getVar("rs_monthly_jan_date"), "rs_monthly_feb" => $this->request->getVar("rs_monthly_feb"), "rs_monthly_feb_date" => $this->request->getVar("rs_monthly_feb_date"), "rs_monthly_mar" => $this->request->getVar("rs_monthly_mar"), "rs_monthly_mar_date" => $this->request->getVar("rs_monthly_mar_date"), "rs_monthly_apr" => $this->request->getVar("rs_monthly_apr"), "rs_monthly_apr_date" => $this->request->getVar("rs_monthly_apr_date"), "rs_monthly_may" => $this->request->getVar("rs_monthly_may"), "rs_monthly_may_date" => $this->request->getVar("rs_monthly_may_date"), "rs_monthly_june" => $this->request->getVar("rs_monthly_june"), "rs_monthly_june_date" => $this->request->getVar("rs_monthly_june_date"), "rs_monthly_july" => $this->request->getVar("rs_monthly_july"), "rs_monthly_july_date" => $this->request->getVar("rs_monthly_july_date"), "rs_monthly_aug" => $this->request->getVar("rs_monthly_aug"), "rs_monthly_aug_date" => $this->request->getVar("rs_monthly_aug_date"), "rs_monthly_sep" => $this->request->getVar("rs_monthly_sep"), "rs_monthly_sep_date" => $this->request->getVar("rs_monthly_sep_date"), "rs_monthly_oct" => $this->request->getVar("rs_monthly_oct"), "rs_monthly_oct_date" => $this->request->getVar("rs_monthly_oct_date"), "rs_monthly_nov" => $this->request->getVar("rs_monthly_nov"), "rs_monthly_nov_date" => $this->request->getVar("rs_monthly_nov_date"), "rs_monthly_dec" => $this->request->getVar("rs_monthly_dec"), "rs_monthly_dec_date" => $this->request->getVar("rs_monthly_dec_date"), "rs_quarterly_q1_month" => $this->request->getVar("rs_quarterly_q1_month"), "rs_quarterly_q1_month_date" => $this->request->getVar("rs_quarterly_q1_month_date"), "rs_quarterly_q2_month" => $this->request->getVar("rs_quarterly_q2_month"), "rs_quarterly_q2_month_date" => $this->request->getVar("rs_quarterly_q2_month_date"), "rs_quarterly_q3_month" => $this->request->getVar("rs_quarterly_q3_month"), "rs_quarterly_q3_month_date" => $this->request->getVar("rs_quarterly_q3_month_date"), "rs_quarterly_q4_month" => $this->request->getVar("rs_quarterly_q4_month"), "rs_quarterly_q4_month_date" => $this->request->getVar("rs_quarterly_q4_month_date"), "rs_biannual1_month" => $this->request->getVar("rs_biannual1_month"), "rs_biannual1_month_date" => $this->request->getVar("rs_biannual1_month_date"), "rs_biannual2_month" => $this->request->getVar("rs_biannual2_month"), "rs_biannual2_month_date" => $this->request->getVar("rs_biannual2_month_date"), "rs_annual_month" => $this->request->getVar("rs_annual_month"), "rs_annual_month_date" => $this->request->getVar("rs_annual_month_date"), "person_responsible" => $this->request->getVar("person_responsible"), "implementing_partner" => $this->request->getVar("implementing_partner"), "project_status" => $this->request->getVar("project_status"), "report_submission_date" => changeDateFormat("Y-m-d", $this->request->getVar("report_submission_date")), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "project");
                trail(1, "update", $data["title"], $postdata, $previous_values);
                $Model = new \App\Models\project\Project_model();
                $Model->update($id, $postdata);
                $this->db->table("project_map_county")->delete(["project_id" => $id]);
                if (is_array($this->request->getVar("countries"))) {
                    foreach ($this->request->getVar("countries") as $value) {
                        $post_district = ["project_id" => $id, "county_id" => $value];
                        $this->db->table("project_map_county")->insert($post_district);
                    }
                }
                $this->db->table("project_map_thematic_area")->delete(["project_id" => $id]);
                if (is_array($this->request->getVar("thematic_area"))) {
                    foreach ($this->request->getVar("thematic_area") as $value) {
                        $post_region = ["project_id" => $id, "thematic_area_id" => $value];
                        $this->db->table("project_map_thematic_area")->insert($post_region);
                    }
                }
                $this->db->table("project_notification_recepient_map")->delete(["project_id" => $id]);
                if (is_array($this->request->getVar("notification_recepient"))) {
                    foreach ($this->request->getVar("notification_recepient") as $value) {
                        $post_region = ["project_id" => $id, "recepient_id" => $value];
                        $this->db->table("project_notification_recepient_map")->insert($post_region);
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("planning/project/"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/planning/project_data/project/add_js";
        $data["main_content"] = "office/planning/project_data/project/edit";
        echo view("template/index", $data);
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Background";
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/planning/project_data/project/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Background";
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/planning/project_data/project/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Background";
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/planning/project_data/project/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Project Background";
        $model = new \App\Models\project\Project_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/planning/project_data/project/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>