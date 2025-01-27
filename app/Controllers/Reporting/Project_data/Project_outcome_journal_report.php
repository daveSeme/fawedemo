<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class Project_outcome_journal_report extends \App\Controllers\BaseController
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
        check_permision("project_outcome_journal_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Outcome Journal Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/project_outcome_journal_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_outcome_journal_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("project_outcome_journal_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Outcome Journal Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project Name", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required|trim"], "report_file" => ["label" => "Report File", "rules" => "ext_in[report_file,png,jpg,gif,pdf,xlsx,docx]"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $file = $this->request->getFile("report_file");
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . "public/uploads/project_outcome_journal_report", $newName);
                $postdata = ["project_name" => $this->request->getVar("project"), "base_id" => $this->session->get("office"), "report_name" => $this->request->getVar("report_name"), "report_file" => $newName, "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
                $model->insert($postdata);
                trail(1, "insert", $data["title"], $postdata);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("reporting/project_data/project_outcome_journal_report/add"));
                }
                return $this->response->redirect(site_url("reporting/project_data/project_outcome_journal_report/"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/reporting/project_data/project_outcome_journal_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_outcome_journal_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("project_outcome_journal_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Project Outcome Journal Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project Name", "rules" => "required|trim"], "report_name" => ["label" => "Report Name", "rules" => "required|trim"], "report_file" => ["label" => "Report File", "rules" => "ext_in[report_file,png,jpg,gif,pdf,xlsx,docx]"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $file = $this->request->getFile("report_file");
                $newName = $file->getRandomName();
                $file->move(ROOTPATH . "public/uploads/project_outcome_journal_report", $newName);
                $postdata = ["project_name" => $this->request->getVar("project"), "base_id" => $this->session->get("office"), "report_name" => $this->request->getVar("report_name"), "report_file" => $newName, "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/project_data/project_outcome_journal_report/"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/reporting/project_data/project_outcome_journal_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_outcome_journal_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("project_outcome_journal_report", "3", 0);
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Project Final Evaluation Report Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_outcome_journal_report/"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Project Outcome Journal Report";
        $data["main_title"] = "Programs/Project";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/project_outcome_journal_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_outcome_journal_report/view";
        echo view("template/index", $data);
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Outcome Journal Report";
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/project_outcome_journal_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Outcome Journal Report";
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/project_outcome_journal_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Outcome Journal Report";
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/project_outcome_journal_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Workplan Progress Report";
        $model = new \App\Models\reporting\project_data\Project_outcome_journal_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/project_outcome_journal_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
}

?>