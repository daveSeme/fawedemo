<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<script src=\"";
echo base_url();
echo "/public/js/formplugins/ckeditor/ckeditor.js\"></script>\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div>\r\n\t\t  \t  \t";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "\t\t    ";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $validation->listErrors();
    echo "</div>";
}
echo "           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "reporting/project_data/activity_reporting_tool/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t ";
if ($stdata["report_status"] == "3") {
    echo "\r\n                 <table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Activity Reporting</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
    $plan = get_by_id("id", $stdata["project"], "project");
    echo $plan_name = $plan["name"];
    echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
    echo $stdata["project"];
    echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Activity</strong></td>\r\n                            <td>";
    echo $stdata["activity_title"];
    echo "</td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Activity Date</strong></td>\r\n                            <td>";
    echo $newDate = date("d/m/Y", strtotime($stdata["activity_date"]));
    echo " </td>                           \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Submitted by</strong></td>\r\n                            <td>\r\n\t\t\t\t\t\t\t\t";
    $users_data = get_by_id("id", $stdata["submitted_by"], "ctbl_users");
    echo $users_data["name"];
    echo "                            </td>                           \r\n                          </tr>\r\n                          \r\n                          \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Status</strong></td>\r\n                            <td>\r\n                            <span class=\"badge badge-pill badge-primary\">\r\n                            ";
    if ($stdata["report_status"] == "1") {
        echo "Draft Report";
    }
    if ($stdata["report_status"] == "2") {
        echo "Under Review";
    }
    if ($stdata["report_status"] == "3") {
        echo "Returned with Suggested Edits";
    }
    if ($stdata["report_status"] == "0") {
        echo "Approved";
    }
    echo " \r\n                            </span>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Previous Remarks/Comments</strong></td>\r\n                            <td>\r\n                            <style> .htr {font-size:14px !important;color:red;list-style:none;}</style>\r\n                              <table border=\"1\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\" style=\"border-collapse:collapse;\">\r\n                                <tbody>\r\n                                  <tr bgcolor=\"#dddddd\">\r\n                                    <td><strong>User (type)</strong></td>\r\n                                    <td><strong>Review Date</strong></td>\r\n                                    <td><strong><i class=\"fa fa-commenting-o fa-2x\">&nbsp;&nbsp;&nbsp;</i>Remarks/Comments</strong></td>\r\n                                  </tr>\r\n\t\t\t\t\t\t\t\t\t";
    $db = Config\Database::connect();
    $query_his = $db->query("select * from activity_reporting_comments_history where workflow_id = '" . $stdata["id"] . "' order by id desc");
    $results_his = $query_his->getResultArray();
    if (0 < count($results_his)) {
        foreach ($results_his as $row_his) {
            $user_details = get_by_id("id", $row_his["reviwer_id"], "ctbl_users");
            echo "                                  <tr>\r\n                                    <td>";
            echo $user_details["name"];
            echo " (";
            echo $row_his["user_type"];
            echo ")</td>\r\n                                    <td>";
            echo $row_his["review_date"];
            echo "</td>\r\n                                    <td>";
            echo $row_his["reviwer_comments"];
            echo "</td>\r\n                                  </tr>\r\n                                  \r\n                                  ";
        }
        echo "                                  \r\n                                  ";
    } else {
        echo "                                  \r\n                                  <tr>\r\n                                    <td colspan=\"3\"><p class=\"htr\"> No remarks/comments found in database...</p></td>\r\n                                  </tr>\r\n                                  \r\n                                  ";
    }
    echo "                                  \r\n                                </tbody>\r\n                              </table>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Remarks/Comments <span class=\"required\">*</span></strong></td>\r\n                          <td><textarea name=\"reviwer_comments\" style=\"width:100%; height:70px;\" class=\"required\"></textarea></td>\r\n                        </tr>\r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Attachment </strong></td>\r\n                          <td>\r\n                          ";
    if ($stdata["report_file"] != "") {
        echo "                           <a href=\"";
        echo base_url() . "/public/uploads/review_approve/" . $stdata["report_file"];
        echo "\"><span class=\"fal fa-download mr-1\"></span> Download File</a>\r\n                           ";
    }
    echo "                          </td>\r\n                        </tr>\r\n                          \r\n                          \r\n                   </tbody>\r\n                 </table>         \r\n\r\n\r\n\r\n\t\t\t ";
}
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select  Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where base_id = \"" . $base_id . "\" order by  name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               \t\t\t   <option value=\"";
    echo $row["id"];
    echo "\" ";
    if ($stdata["project"] == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n\t\t\t\t\t ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n\t\t\t\t\r\n                 \r\n                \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Activity <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"activity_title\" id=\"activity_title\" placeholder=\"Please enter Activity\" value=\"";
echo $stdata["activity_title"];
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Activity .</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"start_date\"><span id=\"title\">Activity Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"activity_date\" class=\"form-control\" readonly=\"\"  id=\"activity_date\" data-date-format=\"dd-mm-yyyy\" value=\"";
echo changeDateFormat("d-m-Y", $stdata["activity_date"]);
echo "\" placeholder=\"Please select Activity date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Activity Date. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Reported by <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"reported_by\" id=\"reported_by\" placeholder=\"Please enter Reported by\" value=\"";
echo $stdata["reported_by"];
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Reported by.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"venue\">Venue <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"venue\" id=\"venue\" placeholder=\"Please enter Venue\" value=\"";
echo $stdata["venue"];
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Venue.</div>\r\n                  </div>\r\n\r\n\r\n                  ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Particiapnts Reached  <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"particiapnts_reached\" id=\"particiapnts_reached\" placeholder=\"Please enter Total Particiapnts Reached\" value=\"";
// echo $stdata["particiapnts_reached"];
// echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter No. of Particiapnts Reached .</div>\r\n                  </div>\r\n\r\n\r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Objective of the Activity <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"objective_activity\" id=\"objective_activity\"  class=\"ckeditor form-control\" placeholder=\"Please enter Objective of the Activity\" required>";
echo $stdata["objective_activity"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter objective of the Activity.</div>\r\n                  </div>\r\n                \r\n              \r\n                               \r\n\t\t\t\t";
// echo "<div class=\"col-12 mb-3\" id=\"DIV-direct-Benf\">\r\n                    <table class=\"table table-bordered\">\r\n                    \r\n                         <thead>\r\n                            <tr>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Output No.</th>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Activity</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">0-12</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">13-18</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">19-25</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">26-35</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">36-49</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">50+</th>\r\n                             </tr> \r\n                             \r\n                            <tr>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                             </tr> \r\n                             \r\n                         </thead>\r\n                     \r\n                     <tbody id=\"ActivityData_div\">\r\n                     \r\n                     \r\n\t\t\t\t\t";
// $db = Config\Database::connect();
// $query_mon_progress_report = $db->query("select * from activity_reporting_tool_map where  workflow_id = '" . $stdata["id"] . "' order by id ");
// $results_mon_progress_report = $query_mon_progress_report->getResultArray();
// foreach ($results_mon_progress_report as $row_mon_progress_report) {
//     $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
//     echo "                    <tr>\r\n                    \r\n                    <td>\r\n\t\t\t\t\t";
//     $output_id = $project_details["output_id"];
//     $output_details = get_by_id("id", $output_id, "project_output");
//     echo $output_details["name"];
//     echo "                    <input type=\"hidden\" name=\"project_id[]\" value=\"";
//     echo $row_mon_progress_report["project_id"];
//     echo "\" />\r\n                    <input type=\"hidden\" name=\"output_id[]\" value=\"";
//     echo $output_id;
//     echo "\" />\r\n                    </td>\r\n                    \r\n                    \r\n                    <td>\r\n\t\t\t\t\t";
//     echo $project_details["activity_name"];
//     echo "                    <input type=\"hidden\" name=\"activity_id[]\" value=\"";
//     echo $row_mon_progress_report["activity_id"];
//     echo "\" />\r\n                    </td>\r\n                    \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_0_12_female[]\" value=\"";
//     echo $row_mon_progress_report["part_0_12_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_0_12_male[]\" value=\"";
//     echo $row_mon_progress_report["part_0_12_male"];
//     echo "\" /></td>\r\n                   \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_13_18_female[]\" value=\"";
//     echo $row_mon_progress_report["part_13_18_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_13_18_male[]\" value=\"";
//     echo $row_mon_progress_report["part_13_18_male"];
//     echo "\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_19_25_female[]\" value=\"";
//     echo $row_mon_progress_report["part_19_25_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_19_25_male[]\" value=\"";
//     echo $row_mon_progress_report["part_19_25_male"];
//     echo "\" /></td>\r\n                   \r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_26_35_female[]\" value=\"";
//     echo $row_mon_progress_report["part_26_35_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_26_35_male[]\" value=\"";
//     echo $row_mon_progress_report["part_26_35_male"];
//     echo "\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_36_49_female[]\" value=\"";
//     echo $row_mon_progress_report["part_36_49_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_36_49_male[]\" value=\"";
//     echo $row_mon_progress_report["part_36_49_male"];
//     echo "\" /></td>\r\n\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_50_plus_female[]\" value=\"";
//     echo $row_mon_progress_report["part_50_plus_female"];
//     echo "\" /></td>\r\n                   <td><input class=\"form-control\" type=\"text\" name=\"part_50_plus_male[]\" value=\"";
//     echo $row_mon_progress_report["part_50_plus_male"];
//     echo "\" /></td>\r\n                    \r\n                    \r\n                    \r\n                    </tr>\t\r\n                    \r\n\t\t\t\t";
// }
// echo "                \r\n                                      \r\n                     </tbody>\r\n                     \r\n                    </table>\r\n                  </div>             \r\n                  \r\n                  \r\n                                    \r\n                  ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Summary of the Events <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"summary_events\" id=\"summary_events\"  class=\"form-control\" placeholder=\"Please enter Summary of the Events\" required>";
// echo $stdata["summary_events"];
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Summary of the Events.</div>\r\n                  </div>\r\n\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n         <label class=\"form-label\" for=\"targets\">Targets & Achievements</label>\r\n";
echo "<table class=\"table table-bordered\">\r\n                    \r\n                         ";
echo "<thead>\r\n<tr>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Target.</th>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Achievement</th>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Action</th></thead>\r\n";
echo "<tbody id=\"Targets_Div\">";
$db = Config\Database::connect();
$query = $db->query("select * from activity_reporting_targets where  project_id = '" . $stdata["project"] . "' and workflow_id = '" . $stdata["id"] . "'");
$results = $query->getResultArray();
foreach ($results as $result) {
    echo "<tr>\r\n <td><input class=\"form-control\" type=\"number\" name=\"target[]\" value=\"";
    echo $result["target"];
    echo "\"/></td>\r\n";
    echo "<td><input class=\"form-control\" type=\"number\" name=\"achievement[]\" value=\"";
    echo $result["achievement"];
    echo "\"\/></td>\r\n<td><a class=\"btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1 remove_target_row\" title=\"Remove Row\"><i class=\"fal fa-times\"></i></a></td></tr>\r\n  ";
}
echo "</tbody>\r\n  </table>\r\n    ";         
echo "<div class=\"col-1 mb-1 float-right\"><a id=\"add_target_row\" class=\"btn btn-sm btn-outline-info btn-icon btn-inline-block mr-1 float-right\" title=\"Add Row\"><i class=\"fal fa-plus\"></i></a></div>";
echo "</div>\r\n       ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Emerging Issues from the Activity</label>\r\n                    <textarea name=\"emerging_issues_activity\" id=\"emerging_issues_activity\"  class=\"form-control\" placeholder=\"Please enter Emerging Issues from the Activity\">";
echo $stdata["emerging_issues_activity"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Emerging Issues from the Activity.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Way Forward </label>\r\n                    <textarea name=\"way_forward\" id=\"way_forward\"  class=\"form-control\" placeholder=\"Please enter Way Forward\" required>";
// echo $stdata["way_forward"];
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter a Way Forward .</div>\r\n                  </div>\r\n                    \r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"lesson_learnt\">Lesson Learnt </label>\r\n                    <textarea name=\"lesson_learnt\" id=\"lesson_learnt\"  class=\"form-control ckeditor\" placeholder=\"Please enter lessons learnt\" required>";
echo $stdata["lesson_learnt"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Lesson Learnt.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"recommendations\">Recommendations</label>\r\n                    <textarea name=\"recommendations\" id=\"recommendations\"  class=\"form-control ckeditor\" placeholder=\"Please enter Recommendations\" required>";
echo $stdata["recommendations"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Recommendations.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Conclusions </label>\r\n                    <textarea name=\"conclusions\" id=\"conclusions\"  class=\"form-control ckeditor\" placeholder=\"Please enter Conclusions\" required>";
echo $stdata["conclusions"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Conclusions.</div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_file\">Attach File (to attach multiple file use ctrl button and select the files)  </label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"file[]\" id=\"file\" multiple=\"multiple\">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Example valid custom file feedback</div>\r\n                    </div>\r\n                  </div>\r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n\t\t\t\t   \r\n               \t <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Documents </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Action </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_files = $db->query("select * from activity_reporting_tool_documents where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_file = $query_files->getResultArray();
$i = 1;
foreach ($results_file as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td>\r\n\t\t\t\t\t\t\t<a href=\"";
    echo base_url() . "/public/uploads/activity_reporting_tool/" . $row_file["documents"];
    echo "\"><span class=\"fal fa-check mr-1\"></span>";
    echo $row_file["documents"];
    echo "</a>                          \r\n                          </td>\r\n                          <td>\r\n                           <a href=\"";
    echo base_url("reporting/project_data/activity_reporting_tool/delete_docs/" . $row_file["id"] . "/" . $stdata["id"]);
    echo "\"  onclick=\"return confirm('Are you sure you want to delete this item')\" class=\"btn btn-sm btn-danger btn-icon btn-inline-block mr-1\" title=\"Delete Record\"><i class=\"fal fa-trash\"></i></a> \r\n                          </td>\r\n                          \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                   \r\n                  </div>\r\n                  \r\n                         \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"submit_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                \r\n                  <button class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-save mr-1\"></span> Save as Draft</button>\r\n                  \r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/activity_reporting_tool";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> \r\n                  \r\n                  </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>