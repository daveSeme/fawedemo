<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\system_reports;

class Project_quarterly_indicator_performance extends \App\Controllers\BaseController
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
        check_permision("project_quarterly_indicator_performance", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Quarterly Indicator Performance Report";
        $data["main_title"] = "Access System Reports / Project Reports";
        $data["base_id"] = $this->session->get("office");
        $data["project"] = "";
        if ($this->request->getMethod() === "post") {
            $data["project"] = $this->request->getVar("project");
            $data["year"] = $this->request->getVar("year");
            $data["quarter"] = $this->request->getVar("quarter");
        }
        $data["js_file"] = "office/system_reports/project_report/project_quarterly_indicator_performance/js_file";
        $data["main_content"] = "office/system_reports/project_report/project_quarterly_indicator_performance/list";
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
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Indicator Performance Report";
        $data["project"] = $this->request->uri->getSegment(4);
        $data["year"] = $this->request->uri->getSegment(5);
        $data["quarter"] = $this->request->uri->getSegment(6);
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/system_reports/project_report/project_quarterly_indicator_performance/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Indicator Performance Report";
        $data["project"] = $this->request->uri->getSegment(4);
        $data["year"] = $this->request->uri->getSegment(5);
        $data["quarter"] = $this->request->uri->getSegment(6);
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/system_reports/project_report/project_quarterly_indicator_performance/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Indicator Performance Report";
        $data["project"] = $this->request->uri->getSegment(4);
        $data["year"] = $this->request->uri->getSegment(5);
        $data["quarter"] = $this->request->uri->getSegment(6);
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/system_reports/project_report/project_quarterly_indicator_performance/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Indicator Performance Report";
        $data["project"] = $this->request->uri->getSegment(4);
        $data["year"] = $this->request->uri->getSegment(5);
        $data["quarter"] = $this->request->uri->getSegment(6);
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/system_reports/project_report/project_quarterly_indicator_performance/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>