<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Organizational_data;

class org_quarterly_indicator_tracking_report extends \App\Controllers\BaseController
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
        check_permision("org_quarterly_indicator_tracking_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Indicator Tracking Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/js_file";
        $data["main_content"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("org_quarterly_indicator_tracking_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Indicator Tracking Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strategic_plan" => ["label" => "Strategic Plan", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "quarter " => ["label" => "Quarter", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM org_quarterly_indicator_tracking_report where base_id=\"" . $data["base_id"] . "\" and strategic_plan=\"" . $this->request->getVar("strategic_plan") . "\" and  year = \"" . $this->request->getVar("year") . "\" and  quarter = \"" . $this->request->getVar("quarter") . "\"   ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["strategic_plan" => $this->request->getVar("strategic_plan"), "year" => $this->request->getVar("year"), "quarter" => $this->request->getVar("quarter"), "base_id" => $this->session->get("office"), "report_name" => $this->request->getVar("report_name"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    if ($workflow_id != "") {
                        $category = $this->request->getVar("category");
                        $indicator_id = $this->request->getVar("indicator_id");
                        $unit = $this->request->getVar("unit");
                        $target = $this->request->getVar("target");
                        $achievement = $this->request->getVar("achievement");
                        $map_year = $this->request->getVar("map_year");
                        $comments = $this->request->getVar("comments");
                        if (is_array($indicator_id)) {
                            foreach ($indicator_id as $key => $n) {
                                if ($indicator_id != "") {
                                    $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "year" => $map_year[$key], "indicator_id" => $n, "unit" => $unit[$key], "target" => $target[$key], "category" => $category[$key], "achievement" => $achievement[$key], "comments" => $comments[$key]];
                                    $this->db->table("org_quarterly_indicator_tracking_report_map")->insert($data_to_store_other);
                                }
                            }
                        }
                    }
                    $this->session->setFlashdata("feedback", "Record created successfully.");
                    if ($this->request->getVar("action") == "save") {
                        return $this->response->redirect(site_url("reporting/organizational_data/org_quarterly_indicator_tracking_report/add"));
                    }
                    return $this->response->redirect(site_url("reporting/organizational_data/org_quarterly_indicator_tracking_report"));
                } else {
                    $data["validator"] = $this->validator;
                    echo "failed";
                }
            } else {
                $this->session->setFlashdata("feedback", "Indicator Tracking Report already created for this plan year and quarter, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/add_js";
        $data["main_content"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("org_quarterly_indicator_tracking_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Indicator Tracking Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["strategic_plan" => ["label" => "Strategic Plan", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "quarter " => ["label" => "Quarter", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["strategic_plan" => $this->request->getVar("strategic_plan"), "year" => $this->request->getVar("year"), "quarter" => $this->request->getVar("quarter"), "base_id" => $this->session->get("office"), "report_name" => $this->request->getVar("report_name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                $query_delete = $this->db->query("delete from org_quarterly_indicator_tracking_report_map  where  workflow_id =\"" . $id . "\"");
                $category = $this->request->getVar("category");
                $indicator_id = $this->request->getVar("indicator_id");
                $unit = $this->request->getVar("unit");
                $target = $this->request->getVar("target");
                $achievement = $this->request->getVar("achievement");
                $map_year = $this->request->getVar("map_year");
                $comments = $this->request->getVar("comments");
                if (is_array($indicator_id)) {
                    foreach ($indicator_id as $key => $n) {
                        if ($indicator_id != "") {
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "year" => $map_year[$key], "indicator_id" => $n, "unit" => $unit[$key], "target" => $target[$key], "category" => $category[$key], "achievement" => $achievement[$key], "comments" => $comments[$key]];
                            $this->db->table("org_quarterly_indicator_tracking_report_map")->insert($data_to_store_other);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/organizational_data/org_quarterly_indicator_tracking_report"));
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/add_js";
        $data["main_content"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("org_quarterly_indicator_tracking_report", "3", 0);
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Indicator Tracking Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/organizational_data/org_quarterly_indicator_tracking_report"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Indicator Tracking Report";
        $data["main_title"] = "Organizational Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/js_file";
        $data["main_content"] = "office/reporting/organizational_data/org_quarterly_indicator_tracking_report/view";
        echo view("template/index", $data);
    }
    public function get_indicator_by_year()
    {
        $data["base_id"] = $this->session->get("office");
        $data["fydp_plan"] = $this->request->uri->getSegment(6);
        $data["year"] = $this->request->uri->getSegment(5);
        echo "\t\t\t\t\t\t\r\n                        \r\n  <!----------------------------------------------Objective Indicator ---------------------------------------------------------------->                      \r\n                        \r\n\t\t\t\t\t\t\t";
        $query_mon_progress_report = $this->db->query("\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t select * from org_objective_indicator \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_strategic_intervention \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_strategic_intervention.id = org_objective_indicator.objective_id \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_objective \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_objective.id = org_strategic_intervention.objective_id \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_thematic_area \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_thematic_area.id = org_objective.th_area_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_data_strategic_plans_workflow\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_data_strategic_plans_workflow.id = org_thematic_area.mda_plan_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join objective_indicator_target \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_objective_indicator.id=objective_indicator_target.indicator_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t  \r\n\t\t\t\t\t\r\nwhere org_data_strategic_plans_workflow.id='" . $data["fydp_plan"] . "' and objective_indicator_target.year='" . $data["year"] . "' order by org_objective_indicator.id ");
        $results_mon_progress_report = $query_mon_progress_report->getResultArray();
        foreach ($results_mon_progress_report as $row_mon_progress_report) {
            $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
            $unit_name = $unit_data["name"];
            echo "                    <tr>\r\n                    <td width=\"50%\">\r\n                    ";
            echo $row_mon_progress_report["indicator"];
            echo "                    </td>\r\n                    \r\n                     <td>\r\n\t\t\t\t\t";
            $q_target = "";
            echo $q_target = $row_mon_progress_report["target"] . "&nbsp;&nbsp;";
            if ($unit_name == "Percentage") {
                echo "%";
            } else {
                if ($unit_name == "Number") {
                    echo "";
                } else {
                    echo $unit_name;
                }
            }
            echo "                    <input type=\"hidden\" name=\"category[]\" value=\"Objective Indicator\">\r\n                    <input type=\"hidden\" name=\"unit[]\" value=\"";
            echo $row_mon_progress_report["unit"] ?: 0;
            echo "\">\r\n                    <input type=\"hidden\" name=\"target[]\" value=\"";
            echo $row_mon_progress_report["target"];
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_year[]\" value=\"";
            echo $data["year"];
            echo "\">\r\n                     <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
            echo $row_mon_progress_report["indicator_id"];
            echo "\">\r\n                    </td>\r\n                    \r\n                    <td><input type=\"number\" name=\"achievement[]\" id=\"achievement\" class=\"number form-control\"></td>\r\n                    <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\"></textarea></td>\r\n                    </tr>\t\r\n\r\n\t\t\t\t";
        }
        echo "<!--------------------------------------------------Intervention Indicator---------------------------------------------------------------->                        \r\n                        \r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t";
        $query_mon_progress_report = $this->db->query("\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t select * from org_intervention_indicator \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_strategic_intervention \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_strategic_intervention.id = org_intervention_indicator.intervention_id \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_objective \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_objective.id = org_strategic_intervention.objective_id \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_thematic_area \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_thematic_area.id = org_objective.th_area_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_data_strategic_plans_workflow\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_data_strategic_plans_workflow.id = org_thematic_area.mda_plan_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t left join org_intervention_indicator_target \r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t on org_intervention_indicator.id=org_intervention_indicator_target.indicator_id\r\n\t\t\t\t\t\t\t \r\n\t\t\t\t\t\t\t  \r\n\t\t\t\t\t\r\nwhere org_data_strategic_plans_workflow.id='" . $data["fydp_plan"] . "' and org_intervention_indicator_target.year='" . $data["year"] . "' order by org_intervention_indicator.id ");
        $results_mon_progress_report = $query_mon_progress_report->getResultArray();
        foreach ($results_mon_progress_report as $row_mon_progress_report) {
            $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
            $unit_name = $unit_data["name"];
            echo "                    <tr>\r\n                    <td width=\"50%\">\r\n                    ";
            echo $row_mon_progress_report["indicator"];
            echo "                    </td>\r\n                    \r\n                     <td>\r\n\t\t\t\t\t";
            $q_target = "";
            echo $q_target = $row_mon_progress_report["target"] . "&nbsp;&nbsp;";
            if ($unit_name == "Percentage") {
                echo "%";
            } else {
                if ($unit_name == "Number") {
                    echo "";
                } else {
                    echo $unit_name;
                }
            }
            echo "                    <input type=\"hidden\" name=\"category[]\" value=\"Intervention Indicator\">\r\n                    <input type=\"hidden\" name=\"unit[]\" value=\"";
            echo $row_mon_progress_report["unit"] ?: 0;
            echo "\">\r\n                    <input type=\"hidden\" name=\"target[]\" value=\"";
            echo $row_mon_progress_report["target"];
            echo "\">\r\n                    <input type=\"hidden\" name=\"map_year[]\" value=\"";
            echo $data["year"];
            echo "\">\r\n                     <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
            echo $row_mon_progress_report["indicator_id"];
            echo "\">\r\n                    </td>\r\n                    \r\n                    <td><input type=\"number\" name=\"achievement[]\" id=\"achievement\" class=\"form-control\"></td>\r\n                    <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\"></textarea></td>\r\n                    </tr>\t\r\n\r\n\t\t\t\t";
        }
        echo "\t\t\r\n\t\t\r\n\t\t\r\n\t\t\r\n\t\t";
    }
    public function get_plan($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("strategic_plan")) {
            echo $strategic_plan = $this->request->getVar("strategic_plan");
            echo " <option value=\"\">Select Year</option>";
            $query = $db->query("select  * FROM org_data_strategic_plans_workflow where id=\"" . $strategic_plan . "\"");
            $row = $query->getRowArray();
            $startdate = $row["startyear"];
            $enddate = $row["endyear"];
            $diff = $enddate - $startdate + 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                echo "<option value=\"" . $i . "\">" . $i . "</option>";
            }
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Org Quarterly Indicator Tracking Report";
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/organizational_data/org_quarterly_indicator_tracking_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Org Quarterly Indicator Tracking Report";
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/organizational_data/org_quarterly_indicator_tracking_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Org Quarterly Indicator Tracking Report";
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/organizational_data/org_quarterly_indicator_tracking_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Org Quarterly Indicator Tracking Report";
        $model = new \App\Models\reporting\organizational_data\Org_quarterly_indicator_tracking_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/organizational_data/org_quarterly_indicator_tracking_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>