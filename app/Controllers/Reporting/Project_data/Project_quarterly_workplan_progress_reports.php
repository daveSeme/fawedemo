<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class Project_quarterly_workplan_progress_reports extends \App\Controllers\BaseController
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
        check_permision("project_quarterly_workplan_progress_reports", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $data["main_title"] = "Project Data / Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/list_js";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("project_quarterly_workplan_progress_reports", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Quarterly Workplan Progress Report";
        $data["main_title"] = "Project Data / Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "project Name", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "quarter" => ["label" => "Quarter", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM project_quarterly_workplan_progress_reports where base_id=\"" . $data["base_id"] . "\" and project=\"" . $this->request->getVar("project") . "\" and  year = \"" . $this->request->getVar("year") . "\" and  quarter = \"" . $this->request->getVar("quarter") . "\"   ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["year" => $this->request->getVar("year"), "base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "quarter" => $this->request->getVar("quarter"), "report_name" => $this->request->getVar("report_name"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    if ($workflow_id != "") {
                        $activity_id = $this->request->getVar("activity_id");
                        $status = $this->request->getVar("status");
                        $budget = $this->request->getVar("budget");
                        $budget = $this->request->getVar("budget");
                        $expenses = $this->request->getVar("expenses");
                        $map_year = $this->request->getVar("map_year");
                        $map_quarter = $this->request->getVar("map_quarter");
                        $comments = $this->request->getVar("comments");
                        if (is_array($activity_id)) {
                            foreach ($activity_id as $key => $n) {
                                if ($activity_id != "") {
                                    $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "year" => $map_year[$key], "quarter" => $map_quarter[$key], "activity_id" => $n, "status" => isset($status[$key]) ?: 0, "budget" => $budget[$key], "expenses" => $expenses[$key], "comments" => $comments[$key]];
                                    $this->db->table("project_quarterly_workplan_progress_reports_mapping")->insert($data_to_store_other);
                                }
                            }
                        }
                    }
                    $this->session->setFlashdata("feedback", "Record created successfully.");
                    if ($this->request->getVar("action") == "save") {
                        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_workplan_progress_reports/add"));
                    }
                    return $this->response->redirect(site_url("reporting/project_data/project_quarterly_workplan_progress_reports/"));
                } else {
                    $data["validator"] = $this->validator;
                    echo "failed";
                }
            } else {
                $this->session->setFlashdata("feedback", "Quarterly Workplan Progress Report already created for this Project year and quarter, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/js_file";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("project_quarterly_workplan_progress_reports", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Project / Program Monthly Progress Report";
        $data["main_title"] = "Program/Project Reports";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["year" => ["label" => "Year", "rules" => "required|trim"], "quarter" => ["label" => "Quarter", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required|trim"], "project" => ["label" => "project Name", "rules" => "required"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "quarter" => $this->request->getVar("quarter"), "report_name" => $this->request->getVar("report_name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                $query_delete = $this->db->query("DELETE FROM project_quarterly_workplan_progress_reports_mapping  where  workflow_id =\"" . $id . "\"");
                $activity_id = $this->request->getVar("activity_id");
                $status = $this->request->getVar("status");
                $budget = $this->request->getVar("budget");
                $budget = $this->request->getVar("budget");
                $expenses = $this->request->getVar("expenses");
                $map_year = $this->request->getVar("map_year");
                $map_quarter = $this->request->getVar("map_quarter");
                $comments = $this->request->getVar("comments");
                if (is_array($activity_id)) {
                    foreach ($activity_id as $key => $n) {
                        if ($activity_id != "") {
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "year" => $map_year[$key], "quarter" => $map_quarter[$key], "activity_id" => $n, "status" => isset($status[$key]) ?: 0, "budget" => $budget[$key], "expenses" => $expenses[$key], "comments" => $comments[$key]];
                            $this->db->table("project_quarterly_workplan_progress_reports_mapping")->insert($data_to_store_other);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/project_data/project_quarterly_workplan_progress_reports"));
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/list_js";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("project_quarterly_workplan_progress_reports", "3", 0);
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Project Quarterly Workplan Progress Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_workplan_progress_reports"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Project Quarterly Workplan Progress Report";
        $data["main_title"] = "Project Data / Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/list_js";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_workplan_progress_reports/view";
        echo view("template/index", $data);
    }
    public function get_year($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("project")) {
            echo $project = $this->request->getVar("project");
            echo " <option value=\"\">Select Year</option>";
            $query = $db->query("select  * FROM project where id=\"" . $project . "\"");
            $row = $query->getRowArray();
            $startdate = date("Y", strtotime($row["start_date"]));
            $enddate = date("Y", strtotime($row["end_date"]));
            $diff = $enddate - $startdate + 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                echo "<option value=\"" . $i . "\">" . $i . "</option>";
            }
        }
    }
    public function get_activity_by_year()
    {
        $data["base_id"] = $this->session->get("office");
        $year = $this->request->uri->getSegment(5);
        $data["project_id"] = $this->request->uri->getSegment(6);
        $quarter = $this->request->uri->getSegment(7);
        if ($year != "") {
            $data["year"] = $year;
        }
        if ($quarter != "") {
            $data["quarter"] = $quarter;
        }
        echo "        \r\n        \r\n        \r\n";
        $query_mon_progress_report = $this->db->query("select project_activity.id as activity_id FROM project_activity  left join  project_me_plan_workflow  on project_activity.workflow_id=project_me_plan_workflow.id \r\n\t\t\t\t\t\r\nwhere  project_me_plan_workflow.project='" . $data["project_id"] . "' and project_me_plan_workflow.base_id='" . $data["base_id"] . "' order by project_activity.id ");
        $results_mon_progress_report = $query_mon_progress_report->getResultArray();
        foreach ($results_mon_progress_report as $row_mon_progress_report) {
            $query = $this->db->query("SELECT sum(budget) as q_budget FROM project_activity_annual_plan Where activity_id=\"" . $row_mon_progress_report["activity_id"] . "\" and year=\"" . $data["year"] . "\" and quarter=\"" . $data["quarter"] . "\" ");
            $row = $query->getRowArray();
            echo "                    <tr>\r\n                    <td width=\"50%\">\r\n                    ";
            $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
            echo $project_details["activity_name"];
            echo "                    <input type=\"hidden\" name=\"activity_id[]\" value=\"";
            echo $row_mon_progress_report["activity_id"];
            echo "\" />\r\n                    </td>\r\n                    <td><input type=\"checkbox\" name=\"status[]\" id=\"status\" class=\"form-control\" value=\"1\"></td>\r\n                    <td>\r\n                    ";
            if ($quarter != "0") {
                echo $q_budget = $row["q_budget"];
            }
            echo "                    <input type=\"hidden\" name=\"budget[]\" value=\"";
            if ($quarter != "0") {
                echo $q_budget;
            }
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_year[]\" value=\"";
            echo $data["year"];
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_quarter[]\" value=\"";
            echo $data["quarter"];
            echo "\">\r\n                    </td>\r\n                    \r\n                    <td><input type=\"text\" name=\"expenses[]\" id=\"expenses\" class=\"form-control\"></td>\r\n                    <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\"></textarea></td>\r\n                    </tr>\t\r\n\r\n\t\t\t\t";
        }
    }
    public function get_activity_by_quarter()
    {
        $data["base_id"] = $this->session->get("office");
        $quarter = $this->request->uri->getSegment(5);
        $data["project_id"] = $this->request->uri->getSegment(6);
        $year = $this->request->uri->getSegment(7);
        if ($year != "") {
            $data["year"] = $year;
        }
        if ($quarter != "") {
            $data["quarter"] = $quarter;
        }
        echo "        \r\n        \r\n        \r\n";
        $query_mon_progress_report = $this->db->query("select project_activity.id as activity_id FROM project_activity  left join  project_me_plan_workflow  on project_activity.workflow_id=project_me_plan_workflow.id \r\n\t\t\t\t\t\r\nwhere  project_me_plan_workflow.project='" . $data["project_id"] . "' and project_me_plan_workflow.base_id='" . $data["base_id"] . "' order by project_activity.id ");
        $results_mon_progress_report = $query_mon_progress_report->getResultArray();
        foreach ($results_mon_progress_report as $row_mon_progress_report) {
            $query = $this->db->query("SELECT sum(budget) as q_budget FROM project_activity_annual_plan Where activity_id=\"" . $row_mon_progress_report["activity_id"] . "\" and year=\"" . $data["year"] . "\" and quarter=\"" . $data["quarter"] . "\" ");
            $row = $query->getRowArray();
            echo "                    <tr>\r\n                    <td width=\"50%\">\r\n                    ";
            $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
            echo $project_details["activity_name"];
            echo "                    <input type=\"hidden\" name=\"activity_id[]\" value=\"";
            echo $row_mon_progress_report["activity_id"];
            echo "\" />\r\n                    </td>\r\n                    <td><input type=\"checkbox\" name=\"status[]\" id=\"status\" class=\"form-control\" value=\"1\"></td>\r\n                    <td>\r\n                    ";
            if ($quarter != "0") {
                echo $q_budget = $row["q_budget"];
            }
            echo "                    <input type=\"hidden\" name=\"budget[]\" value=\"";
            if ($quarter != "0") {
                echo $q_budget;
            }
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_year[]\" value=\"";
            echo $data["year"];
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_quarter[]\" value=\"";
            echo $data["quarter"];
            echo "\">\r\n                    </td>\r\n                    \r\n                    <td><input type=\"text\" name=\"expenses[]\" id=\"expenses\" class=\"form-control\"></td>\r\n                    <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\"></textarea></td>\r\n                    </tr>\t\r\n\r\n\t\t\t\t";
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_workplan_progress_reports/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_workplan_progress_reports/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_workplan_progress_reports/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_workplan_progress_reports_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_workplan_progress_reports/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>