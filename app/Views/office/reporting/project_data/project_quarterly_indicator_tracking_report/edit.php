<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  \t  ";
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
$insert_url = "reporting/project_data/project_quarterly_indicator_tracking_report/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t ";
if ($stdata["report_status"] == "3") {
    echo "\r\n                 <table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Activity Reporting</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
    $plan = get_by_id("id", $stdata["project"], "project");
    echo $plan_name = $plan["name"];
    echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
    echo $stdata["project"];
    echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Reporting Period</strong></td>\r\n                            <td>";
    echo $stdata["year"];
    echo "-";
    echo $stdata["quarter"];
    echo "</td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td>";
    echo $stdata["report_name"];
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
    $query_his = $db->query("select * from activity_reporting_comments_history where workflow_id = '" . $stdata["id"] . "' and report_type ='Quarterly Indicator Tracking Report' order by id desc");
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
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select  Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               <option value=\"";
    echo $row["id"];
    echo "\" ";
    if ($stdata["project"] == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid project. </div>\r\n                  </div>\r\n\t\t\t\t\r\n                 <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                      <option value=\"\">Select Year</option>\r\n                       ";
$query = $db->query("SELECT  * FROM project where id=\"" . $stdata["project"] . "\"");
$row = $query->getRowArray();
$startdate = date("Y", strtotime($row["start_date"]));
$enddate = date("Y", strtotime($row["end_date"]));
$diff = $enddate - $startdate + 1;
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "\t\t\t\t\t\t\t\t   <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["year"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n\t\t\t\t\t ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Year. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"quarter\">Quarter <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"quarter\" id=\"quarter\" required=\"\">\r\n                      <option value=\"\">Select Quarter</option>\r\n                      <option value=\"Q1\" ";
if ($stdata["quarter"] == "Q1") {
    echo "selected=\"selected\"";
}
echo " >Q1</option>\r\n                      <option value=\"Q2\" ";
if ($stdata["quarter"] == "Q2") {
    echo "selected=\"selected\"";
}
echo " >Q2</option>\r\n                      <option value=\"Q3\" ";
if ($stdata["quarter"] == "Q3") {
    echo "selected=\"selected\"";
}
echo " >Q3</option>\r\n                      <option value=\"Q4\" ";
if ($stdata["quarter"] == "Q4") {
    echo "selected=\"selected\"";
}
echo " >Q4</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a Quarter </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                 <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"location\">Report Name <span class=\"text-danger\">*</span></label>\r\n                    <input name=\"report_name\" type=\"text\" class=\"form-control\" id=\"report_name\" value=\"";
echo $stdata["report_name"];
echo "\" placeholder=\"Please enter a Report Name\" required>\r\n                    <div class=\"invalid-feedback\">Please enter a Report Name.</div>\r\n                  </div>\r\n\r\n                  \r\n                \r\n\t\t\t\t<div class=\"col-12 mb-3\">\r\n                   \r\n                    <table class=\"table table-bordered\">\r\n                     \r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Indicator</th>\r\n                           <th>Target</th>\r\n                           <th>Quarter Achievement</th>\r\n                           <th>Comments</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n<!--------------------------------------------------Component Indicator---------------------------------------------------------------->                        \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Component Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_goal_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                            \r\n                            <input type=\"hidden\" name=\"category[]\" value=\"Component Indicator\">\r\n                            <input type=\"hidden\" name=\"unit[]\" value=\"";
    echo $row_mon_progress_report["unit"] ?: 0;
    echo "\">\r\n                            <input type=\"hidden\" name=\"target[]\" value=\"";
    echo $row_mon_progress_report["target"];
    echo "\">\r\n                            <input type=\"hidden\" name=\"map_year[]\" value=\"";
    echo $stdata["year"];
    echo "\">\r\n                           </td>\r\n                           \r\n                           <td><input type=\"text\" name=\"achievement[]\" id=\"achievement\" class=\"form-control\"  value=\"";
    echo $row_mon_progress_report["achievement"];
    echo "\"></td>\r\n                           <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\">";
    echo $row_mon_progress_report["comments"];
    echo "</textarea></td>\r\n                          </tr>\r\n                       \t\t\r\n                     \t ";
}
echo "\r\n                       \r\n<!--------------------------------------------------Outcome Indicator---------------------------------------------------------------->                        \r\n                       \r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Outcome Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_outcome_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                            \r\n                            <input type=\"hidden\" name=\"category[]\" value=\"Outcome Indicator\">\r\n                            <input type=\"hidden\" name=\"unit[]\" value=\"";
    echo $row_mon_progress_report["unit"] ?: 0;
    echo "\">\r\n                            <input type=\"hidden\" name=\"target[]\" value=\"";
    echo $row_mon_progress_report["target"];
    echo "\">\r\n                            <input type=\"hidden\" name=\"map_year[]\" value=\"";
    echo $stdata["year"];
    echo "\">\r\n                           </td>\r\n                           \r\n                           <td><input type=\"text\" name=\"achievement[]\" id=\"achievement\" class=\"form-control\"  value=\"";
    echo $row_mon_progress_report["achievement"];
    echo "\"></td>\r\n                            <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\">";
    echo $row_mon_progress_report["comments"];
    echo "</textarea></td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                         \r\n<!--------------------------------------------------Output Indicator---------------------------------------------------------------->                        \r\n                       \r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Output Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_output_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                            \r\n                            <input type=\"hidden\" name=\"category[]\" value=\"Output Indicator\">\r\n                            <input type=\"hidden\" name=\"unit[]\" value=\"";
    echo $row_mon_progress_report["unit"] ?: 0;
    echo "\">\r\n                            <input type=\"hidden\" name=\"target[]\" value=\"";
    echo $row_mon_progress_report["target"];
    echo "\">\r\n                            <input type=\"hidden\" name=\"map_year[]\" value=\"";
    echo $stdata["year"];
    echo "\">\r\n                           </td>\r\n                           \r\n                           <td><input type=\"text\" name=\"achievement[]\" id=\"achievement\" class=\"form-control\"  value=\"";
    echo $row_mon_progress_report["achievement"];
    echo "\"></td>\r\n                            <td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\">";
    echo $row_mon_progress_report["comments"];
    echo "</textarea></td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                          \r\n                          \r\n                      </tbody>\r\n                      \r\n                      \r\n                      \r\n                    </table>\r\n                  </div>                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"submit_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                \r\n                  <button class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-save mr-1\"></span> Save as Draft</button>\r\n\r\n\r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/project_quarterly_indicator_tracking_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>