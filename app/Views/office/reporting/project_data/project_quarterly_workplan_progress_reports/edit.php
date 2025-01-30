<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
$session = Config\Services::session();
echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t    ";
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
echo "          <!--  <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "reporting/project_data/project_quarterly_workplan_progress_reports/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t\r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"project\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("select  * from project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               \t\t\t\t<option value=\"";
    echo $row["id"];
    echo "\" ";
    if ($stdata["project"] == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n\t\t\t\t\t\t \t";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n\r\n\r\n                \r\n                ";
$project_details = get_by_id("id", $stdata["project"], "project");
$startdate = date("Y", strtotime($project_details["start_date"]));
$enddate = date("Y", strtotime($project_details["end_date"]));
$diff = $enddate - $startdate + 1;
echo "                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                      <option value=\"\">Select Year</option>\r\n\t\t\t\t\t\t ";
for ($i = $startdate; $i <= $enddate; $i++) {
    echo " \r\n\t                \t\t<option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["year"] == $i) {
        echo "selected=\"selected\"";
    }
    echo "> ";
    echo $i;
    echo "</option>                        \r\n\t\t\t\t\t   ";
}
echo "\t\t\t\t\t   </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Year. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"quarter\">Quarter <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"quarter\" id=\"quarter\" required=\"\">\r\n                      <option value=\"\">Select Quarter</option>\r\n                      <option value=\"Q1\" ";
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
echo " >Q4</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a Quarter </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Report Name <span class=\"text-danger\">*</span></label>\r\n                    <input name=\"report_name\" type=\"text\" class=\"form-control\" id=\"report_name\" value=\"";
echo $stdata["report_name"];
echo "\" placeholder=\"Please enter a Report Name\" required>\r\n                    <div class=\"invalid-feedback\">Please enter a Report Name.</div>\r\n                  </div>\r\n\r\n                  \r\n                \r\n\t\t\t\t<div class=\"col-12 mb-3\" >\r\n                   \r\n                    <table class=\"table table-bordered\">\r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Activity</th>\r\n                           <th>Done/Not Done</th>\r\n                           <th>Quarterly Budget</th>\r\n                           <th>Quarterly Expenses</th>\r\n                           <th>Comments</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_workplan_progress_reports_mapping where  workflow_id = '" . $stdata["id"] . "' order by activity_id ");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    echo "                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
    echo $project_details["activity_name"];
    echo "                            <input type=\"hidden\" name=\"activity_id[]\" value=\"";
    echo $row_mon_progress_report["activity_id"];
    echo "\" />\r\n                           </td>\r\n                            <td><input type=\"checkbox\" name=\"status[]\" id=\"status\" class=\"form-control\" value=\"1\" ";
    if ($row_mon_progress_report["status"] == "1") {
        echo "checked=\"checked\"";
    }
    echo "></td>\r\n                           <td>\r\n                           ";
    echo $row_mon_progress_report["budget"];
    echo "                           \r\n                             <input type=\"hidden\" name=\"budget[]\" value=\"";
    echo $row_mon_progress_report["budget"];
    echo "\">\r\n                             <input type=\"hidden\" name=\"map_year[]\" value=\"";
    echo $row_mon_progress_report["year"];
    echo "\">\r\n                             <input type=\"hidden\" name=\"map_quarter[]\" value=\"";
    echo $row_mon_progress_report["quarter"];
    echo "\">\r\n                           </td>\r\n                           \r\n                           <td><input type=\"text\" name=\"expenses[]\" id=\"expenses\" class=\"form-control\"  value=\"";
    echo $row_mon_progress_report["expenses"];
    echo "\"></td>\r\n\t\t\t\t\t\t\t<td><textarea type=\"text\" name=\"comments[]\" id=\"comments\" class=\"form-control\">";
    echo $row_mon_progress_report["comments"];
    echo "</textarea></td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                          \r\n                          \r\n                          \r\n                      </tbody>\r\n                    </table>\r\n                    \r\n                  </div>                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/project_quarterly_workplan_progress_reports";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>