<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Review_approve;

class Review_activity_reporting extends \App\Controllers\BaseController
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
        check_permision("review_activity_reporting", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Review Activity Reporting";
        $data["main_title"] = "Review/Approve";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/review_approve/review_activity_reporting/js_file";
        $data["main_content"] = "office/review_approve/review_activity_reporting/list";
        echo view("template/index", $data);
    }
    public function review($id = NULL)
    {
        check_permision("review_activity_reporting", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Review Activity Reporting";
        $data["main_title"] = "Review/Approve";
        $data["base_id"] = $this->session->get("office");
        $newName = "";
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["report_status" => ["label" => "Action", "rules" => "required|trim"], "reviwer_comments" => ["label" => "Remarks/Comments", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                if ($this->request->getFile("report_file") != "") {
                    $file = $this->request->getFile("report_file");
                    $newName = $file->getRandomName();
                    $file->move(ROOTPATH . "public/uploads/review_approve", $newName);
                }
                $postdata = ["report_status" => $this->request->getVar("report_status"), "reviwer_id" => $data["user_id"], "review_date" => date("Y-m-d h:m:s"), "report_file" => $newName, "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $model = new \App\Models\review_approve\Approve_activity_reporting_model();
                $model->update($id, $postdata);
                $post_comments_data = ["workflow_id" => $id, "base_id" => $data["base_id"], "report_type" => "Activity Reporting", "user_type" => $this->session->get("user_type"), "reviwer_id" => $data["user_id"], "reviwer_comments" => $this->request->getVar("reviwer_comments"), "review_date" => date("Y-m-d h:m:s"), "report_status" => $this->request->getVar("report_status"), "createdby" => $data["user_id"], "createdtime" => date("Y-m-d h:m:s")];
                $model = new \App\Models\review_approve\Approve_comments_history_reporting_model();
                $model->insert($post_comments_data);
                if ($this->request->getVar("report_status") == 0) {
                    $submitted_by = $data["stdata"]["submitted_by"];
                    $data["site_name"] = $this->configTankAuth->website_name;
                    $data["subject"] = "Activity Reporting Approval Notification";
                    $data["record_id"] = $id;
                    $users_data = get_by_id("id", $submitted_by, "ctbl_users");
                    $data["email"] = $users_data["email"];
                    $this->_send_email("activity_reporting_tool_approve", $data["email"], $data);
                    $this->session->setFlashdata("feedback", "Report Approved successfully.");
                    return $this->response->redirect(site_url("review_approve/review_activity_reporting"));
                }
                if ($this->request->getVar("report_status") == 3) {
                    $submitted_by = $data["stdata"]["submitted_by"];
                    $data["site_name"] = $this->configTankAuth->website_name;
                    $data["subject"] = "Activity Reporting Rejection Notification";
                    $data["record_id"] = $id;
                    $users_data = get_by_id("id", $submitted_by, "ctbl_users");
                    $data["email"] = $users_data["email"];
                    $this->_send_email("activity_reporting_tool_reject", $data["email"], $data);
                    $this->session->setFlashdata("feedback", "Report Returned with Suggested Edits.");
                    return $this->response->redirect(site_url("review_approve/review_activity_reporting"));
                }
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/review_approve/review_activity_reporting/js_file";
        $data["main_content"] = "office/review_approve/review_activity_reporting/review";
        echo view("template/index", $data);
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Activity Reporting";
        $data["main_title"] = "Review/Approve";
        $data["pid"] = $id;
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/review_approve/review_activity_reporting/js_file";
        $data["main_content"] = "office/review_approve/review_activity_reporting/view";
        echo view("template/index", $data);
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Activity Reporting";
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/review_approve/review_activity_reporting/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Activity Reporting";
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/review_approve/review_activity_reporting/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Activity Reporting";
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/review_approve/review_activity_reporting/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(4);
        $data["title"] = "Activity Reporting";
        $model = new \App\Models\review_approve\Review_activity_reporting_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/review_approve/review_activity_reporting/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function _send_email($type, $email, &$data)
    {
        $this->email = \Config\Services::email();
        $this->email->setFrom($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setReplyTo($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setTo($email);
        $this->email->setSubject(sprintf(lang("tank_auth.auth_subject_" . $type), $this->configTankAuth->website_name));
        $this->email->setMessage(view("email/" . $type . "-html", $data));
        $this->email->setAltMessage(view("email/" . $type . "-txt", $data));
        $this->email->send();
    }
}

?>