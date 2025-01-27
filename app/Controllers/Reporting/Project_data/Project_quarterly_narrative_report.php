<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class project_quarterly_narrative_report extends \App\Controllers\BaseController
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
        $this->configTankAuth = config("Tank_auth");
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        check_permision("project_quarterly_narrative_report", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/project_quarterly_narrative_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_narrative_report/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("project_quarterly_narrative_report", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "quarter" => ["label" => "Quarter", "rules" => "required|trim"], "key_highlights" => ["label" => "key highlights Section", "rules" => "required|trim"], "challenges_experienced" => ["label" => "Challenges experienced and Mitigating measure", "rules" => "required|trim"], "success_stories" => ["label" => "Success Stories", "rules" => "required|trim"], "activities_anticipated" => ["label" => "Activities Anticipated for Next Reporting Period", "rules" => "required|trim"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM project_quarterly_narrative_report where base_id=\"" . $data["base_id"] . "\" and project=\"" . $this->request->getVar("project") . "\" and  year = \"" . $this->request->getVar("year") . "\" and  quarter = \"" . $this->request->getVar("quarter") . "\"   ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "quarter" => $this->request->getVar("quarter"), "key_highlights" => $this->request->getVar("key_highlights"), "challenges_experienced" => $this->request->getVar("challenges_experienced"), "success_stories" => $this->request->getVar("success_stories"), "activities_anticipated" => $this->request->getVar("activities_anticipated"), "report_status" => "1", "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    if ($workflow_id != "" && ($imagefile = $this->request->getFiles())) {
                        foreach ($imagefile["file"] as $img) {
                            if ($img->isValid() && !$img->hasMoved()) {
                                $newName = $img->getRandomName();
                                $title = $img->getName();
                                $img->move(ROOTPATH . "public/uploads/project_quarterly_narrative_report", $newName);
                                $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "type" => "Quarterly Report", "title" => $title, "documents" => $newName];
                                $this->db->table("project_narrative_report_documents")->insert($data_to_store_other);
                            }
                        }
                    }
                    if ($this->request->getVar("action") == "submit_report") {
                        $project_id = $this->request->getVar("project");
                        $db = \Config\Database::connect();
                        $query_reg = $db->query("select recepient_id from project_notification_recepient_map where project_id=\"" . $project_id . "\" ");
                        $thematic_area_listar = $query_reg->getResultArray();
                        $rec_ids = "";
                        foreach ($thematic_area_listar as $row) {
                            $rec_ids .= $row["recepient_id"] . ",";
                        }
                        $submitted_to = rtrim($rec_ids, ",");
                        $post_report_data = ["submitted_by" => $data["user_id"], "submitted_date" => date("Y-m-d H:i:s"), "submitted_to" => $submitted_to, "report_status" => "2"];
                        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_submit_model();
                        $model->update($workflow_id, $post_report_data);
                        $data["site_name"] = $this->configTankAuth->website_name;
                        $data["subject"] = "Quarterly Narrative Report Submitted for Review/Approve";
                        $data["record_id"] = $workflow_id;
                        $email_to = explode(",", $submitted_to);
                        if (is_array($email_to)) {
                            foreach ($email_to as $to_value) {
                                $users_data = get_by_id("id", $to_value, "ctbl_users");
                                $data["email"] = $users_data["email"];
                                $this->_send_email("project_quarterly_narrative_report_submit", $data["email"], $data, $data["subject"]);
                            }
                        }
                        $this->session->setFlashdata("feedback", "Report Submitted successfully.");
                        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report"));
                    } else {
                        $this->session->setFlashdata("feedback", "Record created successfully.");
                        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report"));
                    }
                } else {
                    $data["validator"] = $this->validator;
                    echo "failed";
                }
            } else {
                $this->session->setFlashdata("feedback", "Narrative Report already created for this plan year and quarter, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_quarterly_narrative_report/add_js";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_narrative_report/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("project_quarterly_narrative_report", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"], "year" => ["label" => "Year", "rules" => "required|trim"], "quarter" => ["label" => "Quarter", "rules" => "required|trim"], "key_highlights" => ["label" => "key highlights Section", "rules" => "required|trim"], "challenges_experienced" => ["label" => "Challenges experienced and Mitigating measure", "rules" => "required|trim"], "success_stories" => ["label" => "Success Stories", "rules" => "required|trim"], "activities_anticipated" => ["label" => "Activities Anticipated for Next Reporting Period", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                if ($this->request->getFile("file") != "") {
                    $file = $this->request->getFile("file");
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . "public/uploads/project_quarterly_narrative_report", $newName);
                } else {
                    $newName = $this->request->getVar("old_file");
                }
                $postdata = ["project" => $this->request->getVar("project"), "year" => $this->request->getVar("year"), "quarter" => $this->request->getVar("quarter"), "key_highlights" => $this->request->getVar("key_highlights"), "challenges_experienced" => $this->request->getVar("challenges_experienced"), "success_stories" => $this->request->getVar("success_stories"), "activities_anticipated" => $this->request->getVar("activities_anticipated"), "file" => $newName, "report_status" => "1", "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                if ($imagefile = $this->request->getFiles()) {
                    foreach ($imagefile["file"] as $img) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = $img->getRandomName();
                            $title = $img->getName();
                            $img->move(ROOTPATH . "public/uploads/project_quarterly_narrative_report", $newName);
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "type" => "Quarterly Report", "title" => $title, "documents" => $newName];
                            $this->db->table("project_narrative_report_documents")->insert($data_to_store_other);
                        }
                    }
                }
                if ($this->request->getVar("action") == "submit_report") {
                    if ($data["stdata"]["report_status"] == "3") {
                        $post_comments_data = ["workflow_id" => $id, "base_id" => $data["base_id"], "report_type" => "Quarterly Narrative Report", "user_type" => $this->session->get("user_type"), "reviwer_id" => $data["user_id"], "reviwer_comments" => $this->request->getVar("reviwer_comments"), "review_date" => date("Y-m-d h:m:s"), "report_status" => $data["stdata"]["report_status"], "createdby" => $data["user_id"], "createdtime" => date("Y-m-d h:m:s")];
                        $model = new \App\Models\review_approve\Approve_comments_history_reporting_model();
                        $model->insert($post_comments_data);
                    }
                    $project_id = $this->request->getVar("project");
                    $db = \Config\Database::connect();
                    $query_reg = $db->query("select recepient_id from project_notification_recepient_map where project_id=\"" . $project_id . "\" ");
                    $thematic_area_listar = $query_reg->getResultArray();
                    $rec_ids = "";
                    foreach ($thematic_area_listar as $row) {
                        $rec_ids .= $row["recepient_id"] . ",";
                    }
                    $submitted_to = rtrim($rec_ids, ",");
                    $post_report_data = ["submitted_by" => $data["user_id"], "submitted_date" => date("Y-m-d H:i:s"), "submitted_to" => $submitted_to, "report_status" => "2"];
                    $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_submit_model();
                    $model->update($id, $post_report_data);
                    $data["site_name"] = $this->configTankAuth->website_name;
                    $data["subject"] = "Quarterly Narrative Report Submitted for Review/Approve";
                    $data["record_id"] = $id;
                    $email_to = explode(",", $submitted_to);
                    if (is_array($email_to)) {
                        foreach ($email_to as $to_value) {
                            $users_data = get_by_id("id", $to_value, "ctbl_users");
                            $data["email"] = $users_data["email"];
                            $this->_send_email("project_quarterly_narrative_report_submit", $data["email"], $data, $data["subject"]);
                        }
                    }
                    $this->session->setFlashdata("feedback", "Report Submitted successfully.");
                    return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report"));
                } else {
                    $this->session->setFlashdata("feedback", "Record updated successfully.");
                    return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report"));
                }
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/reporting/project_data/project_quarterly_narrative_report/add_js";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_narrative_report/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        check_permision("project_quarterly_narrative_report", "3", 0);
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
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
        $data["title"] = "View Narrative Report";
        $data["main_title"] = "Project Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/project_quarterly_narrative_report/js_file";
        $data["main_content"] = "office/reporting/project_data/project_quarterly_narrative_report/view";
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
        $data["title"] = "Project Quarterly Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_narrative_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_narrative_report/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_narrative_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Quarterly Narrative Report";
        $model = new \App\Models\reporting\project_data\Project_quarterly_narrative_report_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/project_quarterly_narrative_report/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function delete_docs($id = NULL)
    {
        $workflow_id = $this->request->uri->getSegment(6);
        $this->db->table("project_narrative_report_documents")->delete(["id" => $id]);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/project_quarterly_narrative_report/edit/" . $workflow_id));
    }
    public function _send_email($type, $email, &$data, $subject)
    {
        $this->email = \Config\Services::email();
        $this->email->setFrom($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setReplyTo($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setTo($email);
        $this->email->setSubject($subject);
        $this->email->setMessage(view("email/" . $type . "-html", $data));
        $this->email->setAltMessage(view("email/" . $type . "-txt", $data));
        $this->email->send();
    }
}

?>