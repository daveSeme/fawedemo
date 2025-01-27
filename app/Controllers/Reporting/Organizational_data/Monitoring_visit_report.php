<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Organizational_data;

class Monitoring_visit_report extends \App\Controllers\BaseController
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
        check_permision("monitoring_visit_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Monitoring Visit Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/organizational_data/monitoring_visit_report/js_file";
        $data["main_content"] = "office/reporting/organizational_data/monitoring_visit_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("monitoring_visit_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Monitoring Visit Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["program" => ["label" => "Program", "rules" => "required|trim"], "project_id" => ["label" => "Project", "rules" => "required|trim"], "completed_by" => ["label" => "Completed by", "rules" => "required|trim"], "visit_date" => ["label" => "Visit Date", "rules" => "required|trim"], "location" => ["label" => "Location", "rules" => "required|trim"], "objectives" => ["label" => "Objectives", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $file = $this->request->getFile("report_file");
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . "public/uploads/monitoring_visit_report", $newName);
                $postdata = ["base_id" => $this->session->get("office"), "program" => $this->request->getVar("program"), "project_id" => $this->request->getVar("project_id"), "completed_by" => $this->request->getVar("completed_by"), "visit_date" => changeDateFormat("Y-m-d", $this->request->getVar("visit_date")), "location" => $this->request->getVar("location"), "objectives" => $this->request->getVar("objectives"), "next_visit_completed_by" => $this->request->getVar("next_visit_completed_by"), "next_visit_location" => $this->request->getVar("next_visit_location"), "next_visit_date" => changeDateFormat("Y-m-d", $this->request->getVar("next_visit_date")), "next_visit_objectives" => $this->request->getVar("next_visit_objectives"), "photos" => $newName, "status" => "1", "createdby" => $data["user_id"], "createdtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
                $inserted_id = $model->insert($postdata);
                trail($inserted_id, "insert", $data["title"], $postdata);
                $agenda_date = $this->request->getVar("agenda_date");
                $agenda_venue = $this->request->getVar("agenda_venue");
                $agenda_activity = $this->request->getVar("agenda_activity");
                $agenda_category = $this->request->getVar("agenda_category");
                $agenda_male = $this->request->getVar("agenda_male");
                $agenda_female = $this->request->getVar("agenda_female");
                if (is_array($agenda_date)) {
                    foreach ($agenda_date as $key => $value) {
                        if ($agenda_date != "") {
                            $post_map_Data = ["workflow_id" => $inserted_id, "agenda_date" => $value, "agenda_venue" => $agenda_venue[$key], "agenda_activity" => $agenda_activity[$key], "agenda_category" => $agenda_category[$key], "agenda_male" => $agenda_male[$key], "agenda_female" => $agenda_female[$key]];
                            $this->db->table("monitoring_visit_report_agenda_map")->insert($post_map_Data);
                        }
                    }
                }
                $issue_identified = $this->request->getVar("issue_identified");
                $actions = $this->request->getVar("actions");
                if (is_array($issue_identified)) {
                    foreach ($issue_identified as $key => $value) {
                        if ($issue_identified != "") {
                            $post_map_Data = ["workflow_id" => $inserted_id, "issue_identified" => $value, "actions" => $actions[$key]];
                            $this->db->table("monitoring_visit_report_issue_action_map")->insert($post_map_Data);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("reporting/organizational_data/monitoring_visit_report/add"));
                }
                return $this->response->redirect(site_url("reporting/organizational_data/monitoring_visit_report"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/monitoring_visit_report/add_js";
        $data["main_content"] = "office/reporting/organizational_data/monitoring_visit_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("monitoring_visit_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Monitoring Visit Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["program" => ["label" => "Program", "rules" => "required|trim"], "project_id" => ["label" => "Project", "rules" => "required|trim"], "completed_by" => ["label" => "Completed by", "rules" => "required|trim"], "visit_date" => ["label" => "Visit Date", "rules" => "required|trim"], "location" => ["label" => "Location", "rules" => "required|trim"], "objectives" => ["label" => "Objectives", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $file = $this->request->getFile("report_file");
                if ($file == "") {
                    $newName = $this->request->getFile("old_report_file");
                } else {
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . "public/uploads/monitoring_visit_report", $newName);
                }
                $postdata = ["base_id" => $this->session->get("office"), "program" => $this->request->getVar("program"), "project_id" => $this->request->getVar("project_id"), "completed_by" => $this->request->getVar("completed_by"), "visit_date" => changeDateFormat("Y-m-d", $this->request->getVar("visit_date")), "location" => $this->request->getVar("location"), "objectives" => $this->request->getVar("objectives"), "next_visit_completed_by" => $this->request->getVar("next_visit_completed_by"), "next_visit_location" => $this->request->getVar("next_visit_location"), "next_visit_date" => changeDateFormat("Y-m-d", $this->request->getVar("next_visit_date")), "next_visit_objectives" => $this->request->getVar("next_visit_objectives"), "photos" => $newName, "status" => "1", "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "monitoring_visit_report");
                trail(1, "update", $data["title"], $postdata, $previous_values);
                $Model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
                $Model->update($id, $postdata);
                $this->db->table("monitoring_visit_report_agenda_map")->delete(["workflow_id" => $id]);
                $agenda_date = $this->request->getVar("agenda_date");
                $agenda_venue = $this->request->getVar("agenda_venue");
                $agenda_activity = $this->request->getVar("agenda_activity");
                $agenda_category = $this->request->getVar("agenda_category");
                $agenda_male = $this->request->getVar("agenda_male");
                $agenda_female = $this->request->getVar("agenda_female");
                if (is_array($agenda_date)) {
                    foreach ($agenda_date as $key => $value) {
                        if ($agenda_date != "") {
                            $post_map_Data = ["workflow_id" => $id, "agenda_date" => changeDateFormat("Y-m-d", $value), "agenda_venue" => $agenda_venue[$key], "agenda_activity" => $agenda_activity[$key], "agenda_category" => $agenda_category[$key], "agenda_male" => $agenda_male[$key], "agenda_female" => $agenda_female[$key]];
                            $this->db->table("monitoring_visit_report_agenda_map")->insert($post_map_Data);
                        }
                    }
                }
                $this->db->table("monitoring_visit_report_issue_action_map")->delete(["workflow_id" => $id]);
                $issue_identified = $this->request->getVar("issue_identified");
                $actions = $this->request->getVar("actions");
                if (is_array($issue_identified)) {
                    foreach ($issue_identified as $key => $value) {
                        if ($issue_identified != "") {
                            $post_map_Data = ["workflow_id" => $id, "issue_identified" => $value, "actions" => $actions[$key]];
                            $this->db->table("monitoring_visit_report_issue_action_map")->insert($post_map_Data);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/organizational_data/monitoring_visit_report"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/monitoring_visit_report/add_js";
        $data["main_content"] = "office/reporting/organizational_data/monitoring_visit_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("monitoring_visit_report", "3", 0);
        $previous_values = get_by_id("id", $id, "monitoring_visit_report");
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $status = $model->where("id", $id)->delete($id);
        $where = $id;
        $this->db->table("monitoring_visit_report_agenda_map")->delete(["workflow_id" => $id]);
        $this->db->table("monitoring_visit_report_issue_action_map")->delete(["workflow_id" => $id]);
        trail($status, "delete", "cases_database", $where, $previous_values);
        $db = \Config\Database::connect();
        $query = $db->query("SET FOREIGN_KEY_CHECKS=0");
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/organizational_data/monitoring_visit_report"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Monitoring Visit Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/organizational_data/monitoring_visit_report/add_js";
        $data["main_content"] = "office/reporting/organizational_data/monitoring_visit_report/view";
        echo view("template/index", $data);
    }
    public function get_project()
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("program_id")) {
            $data["program_id"] = $this->request->getVar("program_id");
            echo "                 \r\n        <select name=\"project_id\" id=\"project_id\" class=\"custom-select select2\">\r\n          <option value=\"\">Select Project</option>\r\n            ";
            $query_mon_progress_report = $this->db->query("select * from project_map_thematic_area where thematic_area_id = '" . $data["program_id"] . "' order by id ");
            $results_mon_progress_report = $query_mon_progress_report->getResultArray();
            foreach ($results_mon_progress_report as $row_mon_progress_report) {
                $project_data = get_by_id("id", $row_mon_progress_report["project_id"], "project");
                $project_name = $project_data["name"];
                echo "           <option value=\"";
                echo $row_mon_progress_report["project_id"];
                echo "\">";
                echo $project_name;
                echo "</option>\r\n          ";
            }
            echo "        </select>\r\n                    \r\n                    \r\n                   \r\n\r\n\t";
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Monitoring Visit Report";
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/organizational_data/monitoring_visit_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Monitoring Visit Report";
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/organizational_data/monitoring_visit_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Monitoring Visit Report";
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/organizational_data/monitoring_visit_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Monitoring Visit Report";
        $model = new \App\Models\reporting\organizational_data\Monitoring_visit_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/organizational_data/monitoring_visit_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>