<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\Reporting\Project_data;

class Activity_reporting_tool extends \App\Controllers\BaseController
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
        check_permision("activity_reporting_tool", "1", 0);
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Activity Reporting Tool";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["data"] = $model->where("base_id", $data["base_id"])->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/reporting/project_data/activity_reporting_tool/js_file";
        $data["main_content"] = "office/reporting/project_data/activity_reporting_tool/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        check_permision("activity_reporting_tool", "2", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Activity Reporting Tool";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"]]);
            $data["errors"] = [];
            $query = $this->db->query("SELECT * FROM activity_reporting_tool where base_id=\"" . $data["base_id"] . "\" and project=\"" . $this->request->getVar("project") . "\"  ");
            $results = $query->getResult();
            if (count($results) <= 0) {
                if ($this->validate->withRequest($this->request)->run()) {
                    $postdata = ["base_id" => $this->session->get("office"), "project" => $this->request->getVar("project"), "activity_title" => $this->request->getVar("activity_title"), "activity_date" => changeDateFormat("Y-m-d", $this->request->getVar("activity_date")), "reported_by" => $this->request->getVar("reported_by"), "venue" => $this->request->getVar("venue"), "objective_activity" => $this->request->getVar("objective_activity"), "summary_events" => $this->request->getVar("summary_events"), "emerging_issues_activity" => $this->request->getVar("emerging_issues_activity"), "lesson_learnt" => $this->request->getVar("lesson_learnt"), "recommendations" => $this->request->getVar("recommendations"), "conclusions" => $this->request->getVar("conclusions"), "report_status" => "1", "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                    $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
                    $workflow_id = $model->insert($postdata);
                    trail(1, "insert", $data["title"], $postdata);
                    if ($workflow_id != "") {
                        $project_id = $this->request->getVar("project_id");
                        $output_id = $this->request->getVar("output_id");
                        $activity_id = $this->request->getVar("activity_id");
                        $part_0_12_female = $this->request->getVar("part_0_12_female");
                        $part_0_12_male = $this->request->getVar("part_0_12_male");
                        $part_13_18_female = $this->request->getVar("part_13_18_female");
                        $part_13_18_male = $this->request->getVar("part_13_18_male");
                        $part_19_25_female = $this->request->getVar("part_19_25_female");
                        $part_19_25_male = $this->request->getVar("part_19_25_male");
                        $part_26_35_female = $this->request->getVar("part_26_35_female");
                        $part_26_35_male = $this->request->getVar("part_26_35_male");
                        $part_36_49_female = $this->request->getVar("part_36_49_female");
                        $part_36_49_male = $this->request->getVar("part_36_49_male");
                        $part_50_plus_female = $this->request->getVar("part_50_plus_female");
                        $part_50_plus_male = $this->request->getVar("part_50_plus_male");
                        if (is_array($project_id)) {
                            foreach ($project_id as $key => $n) {
                                if ($project_id != "") {
                                    $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "project_id" => $n, "output_id" => $output_id[$key], "activity_id" => $activity_id[$key], "part_0_12_female" => $part_0_12_female[$key], "part_0_12_male" => $part_0_12_male[$key], "part_13_18_female" => $part_13_18_female[$key], "part_13_18_male" => $part_13_18_male[$key], "part_19_25_female" => $part_19_25_female[$key], "part_19_25_male" => $part_19_25_male[$key], "part_26_35_female" => $part_26_35_female[$key], "part_26_35_male" => $part_26_35_male[$key], "part_36_49_female" => $part_36_49_female[$key], "part_36_49_male" => $part_36_49_male[$key], "part_50_plus_female" => $part_50_plus_female[$key], "part_50_plus_male" => $part_50_plus_male[$key]];
                                    $this->db->table("activity_reporting_tool_map")->insert($data_to_store_other);
                                }
                            }
                        }
                        if ($imagefile = $this->request->getFiles()) {
                            foreach ($imagefile["file"] as $img) {
                                if ($img->isValid() && !$img->hasMoved()) {
                                    $newName = $img->getRandomName();
                                    $title = $img->getName();
                                    $img->move(ROOTPATH . "public/uploads/activity_reporting_tool", $newName);
                                    $data_to_store_other = ["workflow_id" => $workflow_id, "base_id" => $this->session->get("office"), "title" => $title, "documents" => $newName];
                                    $this->db->table("activity_reporting_tool_documents")->insert($data_to_store_other);
                                }
                            }
                        }
                    }
                    $target = $this->request->getVar("target");
                    $achievement = $this->request->getVar("achievement");
                    if(is_array($target)) {
                        foreach ($target as $key => $v) {
                            $post_target_data = ["workflow_id" => $workflow_id,"project_id" => $this->request->getVar("project"), "target" => $v, "achievement" => $achievement[$key]];
                            $this->db->table("activity_reporting_targets")->insert($post_target_data);
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
                        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_report_submit_model();
                        $model->update($workflow_id, $post_report_data);
                        $data["site_name"] = $this->configTankAuth->website_name;
                        $data["subject"] = "Activity Reporting Submitted for Review/Approve";
                        $data["record_id"] = $workflow_id;
                        $email_to = explode(",", $submitted_to);
                        if (is_array($email_to)) {
                            foreach ($email_to as $to_value) {
                                $users_data = get_by_id("id", $to_value, "ctbl_users");
                                $data["email"] = $users_data["email"];
                                $this->_send_email("activity_reporting_tool_submit", $data["email"], $data, $data["subject"]);
                            }
                        }
                        $this->session->setFlashdata("feedback", "Report Submitted successfully.");
                        return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool"));
                    } else {
                        $this->session->setFlashdata("feedback", "Record created successfully.");
                        return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool"));
                    }
                } else {
                    $data["validator"] = $this->validator;
                    echo "failed";
                }
            } else {
                $this->session->setFlashdata("feedback", "Activities Report already created for this project, Please enter new one.");
            }
        }
        $data["js_file"] = "office/reporting/project_data/activity_reporting_tool/add_js";
        $data["main_content"] = "office/reporting/project_data/activity_reporting_tool/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        check_permision("activity_reporting_tool", "4", 0);
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Activity Reporting Tool";
        $data["main_title"] = "Project Data // Reporting";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["project" => ["label" => "Project", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $postdata = ["project" => $this->request->getVar("project"), "activity_title" => $this->request->getVar("activity_title"), "activity_date" => changeDateFormat("Y-m-d", $this->request->getVar("activity_date")), "reported_by" => $this->request->getVar("reported_by"), "venue" => $this->request->getVar("venue"), "particiapnts_reached" => $this->request->getVar("particiapnts_reached"), "objective_activity" => $this->request->getVar("objective_activity"), "summary_events" => $this->request->getVar("summary_events"), "emerging_issues_activity" => $this->request->getVar("emerging_issues_activity"), "way_forward" => $this->request->getVar("way_forward"), "lesson_learnt" => $this->request->getVar("lesson_learnt"), "recommendations" => $this->request->getVar("recommendations"), "conclusions" => $this->request->getVar("conclusions"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s"), "report_status" => "1"];
                $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
                $model->update($id, $postdata);
                trail(1, "update", $data["title"], $postdata, $data["stdata"]);
                // $query_delete = $this->db->query("delete from activity_reporting_tool_map  where  workflow_id =\"" . $id . "\"");
                $project_id = $this->request->getVar("project_id");
                // $output_id = $this->request->getVar("output_id");
                // $activity_id = $this->request->getVar("activity_id");
                // $part_0_12_female = $this->request->getVar("part_0_12_female");
                // $part_0_12_male = $this->request->getVar("part_0_12_male");
                // $part_13_18_female = $this->request->getVar("part_13_18_female");
                // $part_13_18_male = $this->request->getVar("part_13_18_male");
                // $part_19_25_female = $this->request->getVar("part_19_25_female");
                // $part_19_25_male = $this->request->getVar("part_19_25_male");
                // $part_26_35_female = $this->request->getVar("part_26_35_female");
                // $part_26_35_male = $this->request->getVar("part_26_35_male");
                // $part_36_49_female = $this->request->getVar("part_36_49_female");
                // $part_36_49_male = $this->request->getVar("part_36_49_male");
                // $part_50_plus_female = $this->request->getVar("part_50_plus_female");
                // $part_50_plus_male = $this->request->getVar("part_50_plus_male");
                if (is_array($project_id)) {
                    foreach ($project_id as $key => $n) {
                        if ($project_id != "") {
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "project_id" => $n, "output_id" => $output_id[$key], "activity_id" => $activity_id[$key], "part_0_12_female" => $part_0_12_female[$key], "part_0_12_male" => $part_0_12_male[$key], "part_13_18_female" => $part_13_18_female[$key], "part_13_18_male" => $part_13_18_male[$key], "part_19_25_female" => $part_19_25_female[$key], "part_19_25_male" => $part_19_25_male[$key], "part_26_35_female" => $part_26_35_female[$key], "part_26_35_male" => $part_26_35_male[$key], "part_36_49_female" => $part_36_49_female[$key], "part_36_49_male" => $part_36_49_male[$key], "part_50_plus_female" => $part_50_plus_female[$key], "part_50_plus_male" => $part_50_plus_male[$key]];
                            $this->db->table("activity_reporting_tool_map")->insert($data_to_store_other);
                        }
                    }
                }
                if ($imagefile = $this->request->getFiles()) {
                    foreach ($imagefile["file"] as $img) {
                        if ($img->isValid() && !$img->hasMoved()) {
                            $newName = $img->getRandomName();
                            $title = $img->getName();
                            $img->move(ROOTPATH . "public/uploads/activity_reporting_tool", $newName);
                            $data_to_store_other = ["workflow_id" => $id, "base_id" => $this->session->get("office"), "title" => $title, "documents" => $newName];
                            $this->db->table("activity_reporting_tool_documents")->insert($data_to_store_other);
                        }
                    }
                }
                $target = $this->request->getVar("target");
                $achievement = $this->request->getVar("achievement");
                if(is_array($target)) {
                    // Delete the existing targets
                    $this->db->table("activity_reporting_targets")->delete(["workflow_id" => $id,"project_id" => $this->request->getVar("project")]);
                    foreach ($target as $key => $v) {
                        $post_target_data = ["workflow_id" => $id,"project_id" => $this->request->getVar("project"), "target" => $v, "achievement" => $achievement[$key]];
                        $this->db->table("activity_reporting_targets")->insert($post_target_data);
                    }
                }
                if ($this->request->getVar("action") == "submit_report") {
                    if ($data["stdata"]["report_status"] == "3") {
                        $post_comments_data = ["workflow_id" => $id, "base_id" => $data["base_id"], "report_type" => "Activity Reporting", "user_type" => $this->session->get("user_type"), "reviwer_id" => $data["user_id"], "reviwer_comments" => $this->request->getVar("reviwer_comments"), "review_date" => date("Y-m-d h:m:s"), "report_status" => $data["stdata"]["report_status"], "createdby" => $data["user_id"], "createdtime" => date("Y-m-d h:m:s")];
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
                    $model = new \App\Models\reporting\project_data\Activity_reporting_tool_report_submit_model();
                    $model->update($id, $post_report_data);
                    $data["site_name"] = $this->configTankAuth->website_name;
                    $data["subject"] = "Activity Reporting Submitted for Review/Approve";
                    $data["record_id"] = $id;
                    $email_to = explode(",", $submitted_to);
                    if (is_array($email_to)) {
                        foreach ($email_to as $to_value) {
                            $users_data = get_by_id("id", $to_value, "ctbl_users");
                            $data["email"] = $users_data["email"];
                            $this->_send_email("activity_reporting_tool_submit", $data["email"], $data, $data["subject"]);
                        }
                    }
                    $this->session->setFlashdata("feedback", "Report Submitted successfully.");
                    return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool"));
                } else {
                    $this->session->setFlashdata("feedback", "Record updated successfully.");
                    return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool"));
                }
            } else {
                $data["validator"] = $this->validator;
                echo "failed";
            }
        }
        $data["js_file"] = "office/reporting/project_data/activity_reporting_tool/add_js";
        $data["main_content"] = "office/reporting/project_data/activity_reporting_tool/edit";
        echo view("template/index", $data);
    }
    public function get_target_row() {
        echo "<tr>\r\n <td><input class=\"form-control\" type=\"number\" name=\"target[]\" /></td>\r\n";
        echo "<td><input class=\"form-control\" type=\"number\" name=\"achievement[]\" /></td>\r\n";
        echo "<td><a class=\"btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1 remove_target_row\" title=\"Remove Row\"><i class=\"fal fa-times\"></i></a></td></tr>\r\n";
    }
    public function delete($id = NULL)
    {
        check_permision("activity_reporting_tool", "3", 0);
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $previous_values = $model->where("id", $id)->first();
        $where = $id;
        trail(1, "delete", "Narrative Report", $where, $previous_values);
        $data["user"] = $model->where("id", $id)->delete($id);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool"));
    }
    public function view($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View Activity Reporting Tool";
        $data["main_title"] = "Project Data // Reporting";
        $data["pid"] = $id;
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["js_file"] = "office/reporting/project_data/activity_reporting_tool/js_file";
        $data["main_content"] = "office/reporting/project_data/activity_reporting_tool/view";
        echo view("template/index", $data);
    }
    public function get_activity_by_project()
    {
        $data["base_id"] = $this->session->get("office");
        $project_id = $this->request->getVar("project");
        echo "        \r\n        \r\n        \r\n\t\t\t\t\t";
        $query_mon_progress_report = $this->db->query("select project_activity.id as activity_id FROM project_activity  left join  project_annual_me_plan_workflow  on project_activity.workflow_id=project_annual_me_plan_workflow.id \r\n                                        \r\n            where  project_annual_me_plan_workflow.project='" . $project_id . "' and project_annual_me_plan_workflow.base_id='" . $data["base_id"] . "' order by project_activity.id ");
        $results_mon_progress_report = $query_mon_progress_report->getResultArray();
        foreach ($results_mon_progress_report as $row_mon_progress_report) {
            $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
            echo "                    <tr>\r\n                    \r\n                    <td>\r\n\t\t\t\t\t";
            $output_id = $project_details["output_id"];
            $output_details = get_by_id("id", $output_id, "project_output");
            echo $output_details["name"];
            echo "                    <input type=\"hidden\" name=\"project_id[]\" value=\"";
            echo $project_id;
            echo "\" />\r\n                    <input type=\"hidden\" name=\"output_id[]\" value=\"";
            echo $output_id;
            echo "\" />\r\n                    </td>\r\n                    \r\n                    \r\n                    <td>";
            echo $project_details["activity_name"];
            echo "                    <input type=\"hidden\" name=\"activity_id[]\" value=\"";
            echo $row_mon_progress_report["activity_id"];
            echo "\" />\r\n                    </td>\r\n                    \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_0_12_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_0_12_male[]\" /></td>\r\n                   \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_13_18_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_13_18_male[]\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_19_25_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_19_25_male[]\" /></td>\r\n                   \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_26_35_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_26_35_male[]\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_36_49_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_36_49_male[]\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_50_plus_female[]\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_50_plus_male[]\" /></td>\r\n                    \r\n                    \r\n                    \r\n                    </tr>\t\r\n\r\n\t\t\t\t";
        }
    }
    public function download_excel()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Activity Reporting Tool";
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".xls";
        ob_start();
        echo view("office/reporting/project_data/activity_reporting_tool/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_word()
    {
        $response = service("response");
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Activity Reporting Tool";
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".doc";
        ob_start();
        echo view("office/reporting/project_data/activity_reporting_tool/export", $data);
        $table = ob_get_clean();
        return $response->download($data["filename"], $table);
    }
    public function download_pdf()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Activity Reporting Tool";
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='getPDF()'>";
        ob_start();
        echo view("office/reporting/project_data/activity_reporting_tool/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function print_page()
    {
        $data["base_id"] = $this->session->get("office");
        $data["id"] = $this->request->uri->getSegment(5);
        $data["title"] = "Project Activity Reporting Tool";
        $model = new \App\Models\reporting\project_data\Activity_reporting_tool_model();
        $data["stdata"] = $model->where("id", $data["id"])->first();
        $data["filename"] = $data["title"] . "_" . date("d_m_Y_h_i_a") . ".pdf";
        echo "<html><head><title>" . $data["title"] . "</title></head><body onload='print()'>";
        ob_start();
        echo view("office/reporting/project_data/activity_reporting_tool/export", $data);
        $table = ob_get_clean();
        echo $table;
        echo "</body></html>";
    }
    public function delete_docs($id = NULL)
    {
        $workflow_id = $this->request->uri->getSegment(6);
        $this->db->table("activity_reporting_tool_documents")->delete(["id" => $id]);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("reporting/project_data/activity_reporting_tool/edit/" . $workflow_id));
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