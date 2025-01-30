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
$insert_url = "review_approve/review_narrative_reports/review/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                \r\n                <div class=\"col-lg-12\" style=\"text-align:center; margin:-5px 0 10px 0;\">\r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                  \r\n                  <a href=\"";
echo base_url() . "/review_approve/review_narrative_reports";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> \r\n              </div>\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t \r\n                 <table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Quarterly Narrative Report</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
$plan = get_by_id("id", $stdata["project"], "project");
echo $plan_name = $plan["name"];
echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
echo $stdata["project"];
echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Reporting Period</strong></td>\r\n                            <td>";
echo $stdata["year"];
echo "-";
echo $stdata["quarter"];
echo "</td>                            \r\n                          </tr>\r\n                          \r\n                         \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Submitted by</strong></td>\r\n                            <td>\r\n\t\t\t\t\t\t\t\t";
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
echo "                                  \r\n                                </tbody>\r\n                              </table>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Action <span class=\"required\">*</span></strong></td>\r\n                          <td>\r\n                            <input type=\"radio\" name=\"report_status\" value=\"3\" class=\"required\">\r\n                            <strong>&nbsp;Return with Suggested Edits</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n                            <input type=\"radio\" name=\"report_status\" value=\"0\" class=\"required\">\r\n                            <strong>&nbsp;Approved</strong></td>\r\n                        </tr>\r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Remarks/Comments <span class=\"required\">*</span></strong></td>\r\n                          <td><textarea name=\"reviwer_comments\" style=\"width:100%; height:70px;\" class=\"required\"></textarea></td>\r\n                        </tr>\r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Attachment (if any)</strong></td>\r\n                          <td><input type=\"file\" name=\"report_file\"></td>\r\n                        </tr>\r\n                          \r\n                          \r\n                   </tbody>\r\n                 </table>         \r\n<!--##########################################################################################################################################################-->\r\n<h2>Report Details</h2> \r\n              \r\n              <table  class=\"table table-bordered m-0\">\r\n                \r\n                \r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
$plan = get_by_id("id", $stdata["project"], "project");
echo $plan_name = $plan["name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Year</td>\r\n                  <td>";
echo $stdata["year"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Quarter</td>\r\n                  <td>";
echo $stdata["quarter"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Key highlights on your activities and interventions during this reporting period</td>\r\n                  <td>";
echo $stdata["key_highlights"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Challenges experienced and Mitigating measure</td>\r\n                  <td>";
echo $stdata["challenges_experienced"];
echo "</td>\r\n                </tr>\r\n\r\n\r\n                <tr>\r\n                  <td>Success Stories/Best Practice/Lessons Learned</td>\r\n                  <td>";
echo $stdata["success_stories"];
echo "</td>\r\n                </tr>\r\n\r\n\r\n                <tr>\r\n                  <td>Activities Anticipated for Next Reporting Period</td>\r\n                  <td>";
echo $stdata["activities_anticipated"];
echo "</td>\r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Attached File</td>\r\n                  <td>\r\n                  \r\n               \t <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Documents </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query_files = $db->query("select * from project_narrative_report_documents where workflow_id = '" . $stdata["id"] . "' and type = 'Quarterly Report' order by id ");
$results_file = $query_files->getResultArray();
$i = 1;
foreach ($results_file as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td>\r\n\t\t\t\t\t\t\t<a href=\"";
    echo base_url() . "/public/uploads/project_quarterly_narrative_report/" . $row_file["documents"];
    echo "\"><span class=\"fal fa-check mr-1\"></span>";
    echo $row_file["documents"];
    echo "</a>                          \r\n                          </td>\r\n                          \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                  \r\n                  \r\n                  \r\n                  </td>\r\n                </tr>\r\n                \r\n                \r\n                 \r\n                \r\n                \r\n              </table>\r\n              \r\n              \r\n           \r\n                    \r\n              \r\n              \r\n              \r\n                 \r\n<!--##########################################################################################################################################################-->                          \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                  \r\n                  <a href=\"";
echo base_url() . "/review_approve/review_narrative_reports";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>