<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class Beneficiaries_report extends \App\Controllers\BaseController
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
        check_permision("beneficiaries_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Beneficiaries Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/beneficiaries_report/js_file";
        $data["main_content"] = "office/reporting/project_data/beneficiaries_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("beneficiaries_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Beneficiaries Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $query = $this->db->query("Select * FROM mas_county order by name");
        $data["counties"] = $query->getResultArray();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "reporting_period" => ["label" => "Reporting Period", "rules" => "required|trim"], "county" => ["label" => "county", "rules" => "required|trim"], "type_beneficiaries" => ["label" => "Type of Beneficiaries", "rules" => "required|trim"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM project_beneficiaries_report where base_id=\"" . $data["base_id"] . "\" and project=\"" . $this->request->getVar("project") . "\" and  year = \"" . $this->request->getVar("year") . "\" and  reporting_period = \"" . $this->request->getVar("reporting_period") . "\"   ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "reporting_period" => $this->request->getVar("reporting_period"), "county" => $this->request->getVar("county"), "type_beneficiaries" => $this->request->getVar("type_beneficiaries"), "indirect_beneficiaries" => $this->request->getVar("indirect_beneficiaries"), "ben1" => $this->request->getVar("ben1"), "ben2" => $this->request->getVar("ben2"), "ben3" => $this->request->getVar("ben3"), "ben4" => $this->request->getVar("ben4"), "ben5" => $this->request->getVar("ben5"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    $this->session->setFlashdata("feedback", "Record created successfully.");
                    if ($this->request->getVar("action") == "save") {
                        return $this->response->redirect(site_url("reporting/project_data/beneficiaries_report/add"));
                    }
                    return $this->response->redirect(site_url("reporting/project_data/beneficiaries_report/"));
                }
                $data["validator"] = $this->validator;
                echo "failed";
            } else {
                $this->session->setFlashdata("feedback", "Beneficiaries  Report already created for this plan year and period, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/project_data/beneficiaries_report/add_js";
        $data["main_content"] = "office/reporting/project_data/beneficiaries_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("beneficiaries_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Beneficiaries Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "reporting_period" => ["label" => "Reporting Period", "rules" => "required|trim"], "county" => ["label" => "county", "rules" => "required|trim"], "type_beneficiaries" => ["label" => "Type Beneficiaries", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "reporting_period" => $this->request->getVar("reporting_period"), "county" => $this->request->getVar("county"), "type_beneficiaries" => $this->request->getVar("type_beneficiaries"), "indirect_beneficiaries" => $this->request->getVar("indirect_beneficiaries"), "ben1" => $this->request->getVar("ben1"), "ben2" => $this->request->getVar("ben2"), "ben3" => $this->request->getVar("ben3"), "ben4" => $this->request->getVar("ben4"), "ben5" => $this->request->getVar("ben5"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/project_data/beneficiaries_report"));
            }
            $data["validator"] = $this->validator;
            echo "failed";
        }
        $data["js_file"] = "office/reporting/project_data/beneficiaries_report/add_js";
        $data["main_content"] = "office/reporting/project_data/beneficiaries_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("beneficiaries_report", "3", 0);
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Narrative Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Beneficiaries Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/beneficiaries_report/js_file";
        $data["main_content"] = "office/reporting/project_data/beneficiaries_report/view";
        echo view("template/index", $data);
    }
    public function get_plan($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("project")) {
            $project = $this->request->getVar("project");
            echo " <option value=\"\">Select Year</option>";
            $query = $db->query("SELECT  * FROM project where id=\"" . $project . "\"");
            $row = $query->getRowArray();
            $startdate = date("Y", strtotime($row["start_date"]));
            $enddate = date("Y", strtotime($row["end_date"]));
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
        $data["title"] = "Project Beneficiaries Report";
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/beneficiaries_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Beneficiaries Report";
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/beneficiaries_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Beneficiaries Report";
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/beneficiaries_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Beneficiaries Report";
        $model = new \App\Models\reporting\project_data\Beneficiaries_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/beneficiaries_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>