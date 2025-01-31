<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class Project_annual_narrative_report extends \App\Controllers\BaseController
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
        check_permision("project_annual_narrative_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/project_annual_narrative_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_annual_narrative_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("project_annual_narrative_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "key_highlights" => ["label" => "key highlights Section", "rules" => "required|trim"], "challenges_experienced" => ["label" => "Challenges experienced and Mitigating measure", "rules" => "required|trim"], "success_stories" => ["label" => "Success Stories", "rules" => "required|trim"], "activities_anticipated" => ["label" => "Activities Anticipated for Next Reporting Period", "rules" => "required|trim"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM project_annual_narrative_report where base_id=\"" . $data["base_id"] . "\" and project=\"" . $this->request->getVar("project") . "\" and  year = \"" . $this->request->getVar("year") . "\"    ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"),"gender_action_plan" => $this->request->getVar("gender_action_plan"), "environmental_social_safeguards" => $this->request->getVar("environmental_social_safeguards"), "key_highlights" => $this->request->getVar("key_highlights"), "challenges_experienced" => $this->request->getVar("challenges_experienced"), "success_stories" => $this->request->getVar("success_stories"), "activities_anticipated" => $this->request->getVar("activities_anticipated"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    if ($workflow_id != "" && ($imagefile = $this->request->getFiles())) {
                        foreach ($imagefile["file"] as $img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = $img->getRandomName();
                                $title = $img->getName();
                                $img->move(ROOTPATH . "public/uploads/project_annual_narrative_report", $newName);
                                $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "type" => "Annual Report", "title" => $title, "documents" => $newName];
                                $this->db->table("project_narrative_report_documents")->insert($data_to_store_other);
                            }
                        }
                    }
                    $this->session->setFlashdata("feedback", "Record created successfully.");
                    if ($this->request->getVar("action") == "save") {
                        return $this->response->redirect(site_url("reporting/project_data/project_annual_narrative_report/add"));
                    }
                    return $this->response->redirect(site_url("reporting/project_data/project_annual_narrative_report/"));
                } else {
                    $data["validator"] = $this->validator;
                    echo "failed";
                }
            } else {
                $this->session->setFlashdata("feedback", "Narrative Report already created for this plan and year, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_annual_narrative_report/add_js";
        $data["main_content"] = "office/reporting/project_data/project_annual_narrative_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("project_annual_narrative_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "key_highlights" => ["label" => "key highlights Section", "rules" => "required|trim"], "challenges_experienced" => ["label" => "Challenges experienced and Mitigating measure", "rules" => "required|trim"], "success_stories" => ["label" => "Success Stories", "rules" => "required|trim"], "activities_anticipated" => ["label" => "Activities Anticipated for Next Reporting Period", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "gender_action_plan" => $this->request->getVar("gender_action_plan"), "environmental_social_safeguards" => $this->request->getVar("environmental_social_safeguards"), "key_highlights" => $this->request->getVar("key_highlights"), "challenges_experienced" => $this->request->getVar("challenges_experienced"), "success_stories" => $this->request->getVar("success_stories"), "activities_anticipated" => $this->request->getVar("activities_anticipated"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                if ($imagefile = $this->request->getFiles()) {
                    foreach ($imagefile["file"] as $img) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = $img->getRandomName();
                            $title = $img->getName();
                            $img->move(ROOTPATH . "public/uploads/project_annual_narrative_report", $newName);
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "type" => "Annual Report", "title" => $title, "documents" => $newName];
                            $this->db->table("project_narrative_report_documents")->insert($data_to_store_other);
                        }
                    }
                }
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("reporting/project_data/project_annual_narrative_report"));
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_annual_narrative_report/add_js";
        $data["main_content"] = "office/reporting/project_data/project_annual_narrative_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("project_annual_narrative_report", "3", 0);
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Narrative Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_annual_narrative_report"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/project_annual_narrative_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_annual_narrative_report/view";
        echo view("template/index", $data);
    }
    public function get_plan($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("project")) {
            $project = $this->request->getVar("project");
            $year = " <option value=\"\">Select Year</option>";
            $query = $db->query("select * from project where id=\"" . $project . "\"");
            $row = $query->getRowArray();
            $startdate = date("Y", strtotime($row["start_date"]));
            $enddate = date("Y", strtotime($row["end_date"]));
            $diff = $enddate - $startdate + 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                 $year .= "<option value=\"" . $i . "\">" . $i . "</option>";
            }

            // Add Components
            $components = " <option value=\"\">Select Component</option>";
            $query1 = $db->query("select  * FROM project_goal where project_id=\"" . $project . "\"");
            $results = $query1->getResultArray();
            if(count($results) > 0) {
                foreach($results as $result) {
                    $components .= "<option value=\"" . $result['id'] . "\">" . $result['name'] . "</option>"; 
                }
            }

            echo json_encode(["years" => $year, "components" => $components]);
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Annual Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/project_annual_narrative_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Annual Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/project_annual_narrative_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Annual Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/project_annual_narrative_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Annual Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_annual_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/project_annual_narrative_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function delete_docs($id = NULL)
    {
        $workflow_id = $this->request->uri->getSegment(6);
        $this->db->table("project_narrative_report_documents")->delete(["id" => $id]);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_annual_narrative_report/edit/" . $workflow_id));
    }
}

?>