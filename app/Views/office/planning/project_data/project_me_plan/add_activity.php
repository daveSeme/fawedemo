<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$request = Config\Services::request();
echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Project Name</th>\r\n                      <td>\r\n\t\t\t\t\t  ";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
$startdate = date("Y", strtotime($project_details["start_date"]));
$enddate = date("Y", strtotime($project_details["end_date"]));
$diff = $enddate - $startdate + 1;
echo "                      </td>\r\n                      \r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n                ";
$insert_url = "planning/project_me_plan/add_activity/" . $workflow_id . "/?output_id=" . $request->getVar("output_id");
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t  ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "\t\t\t\t";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "                <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n                ";
    echo $validation->listErrors();
    echo "</div>";
}
echo "                <div class=\"form-row\">\r\n\r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"name\">Output</label>\r\n                    <div class=\"form-control\">";
echo $output_data["name"];
echo "</div>\r\n                  </div>\r\n                \r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                \r\n                \r\n                \r\n                    <div class=\"col-1 mb-3 mt-3\">\r\n                    <label class=\"form-label\" for=\"name\">Activity Type <span class=\"text-danger\">*</span></label>\r\n                    </div>\r\n                    <div class=\"col-6 mb-3 mt-3\">\r\n                    \t<input type=\"radio\" name=\"activity_type\" id=\"activity_type\" value=\"Non-Budget Activity\" required=\"required\"/>&nbsp;Non-Budget Activity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n                    \t<input type=\"radio\" name=\"activity_type\" id=\"activity_type\" value=\"Budget Activity\" required=\"required\"/>&nbsp;Budget Activity\r\n                    </div>\r\n                 \r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3 mt-3 DivNonbudgetActivity\" style=\"display:none;\">\r\n                    <label class=\"form-label\" for=\"indicator\">Activity Name <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"activity_name\" class=\"form-control\" id=\"activity_name\" placeholder=\"Please enter activity_name\" value=\"";
echo set_value("activity_name");
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter activity. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3 mt-3 DivbudgetActivity\" style=\"display:none;\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">Select Activity</span> </label>\r\n                    <select name=\"budget_activity_name\" id=\"budgetActivity\" class=\"custom-select select2\" onchange=\"get_activity(";
echo $project_details["id"];
echo ",this.value);\">\r\n                      <option value=\"\">Select Activity</option>\r\n\t\t\t\t\t";
$db = Config\Database::connect();
$session = Config\Services::session();
$query_project = $db->query("select * from  import_activities where main_project = \"" . $project_details["project_code"] . "\" order by activity_name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                      <option value=\"";
    echo $row_so["id"];
    echo "\">";
    echo $row_so["activity_name"];
    echo "</option>\r\n                     ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select Activity. </div>\r\n                  </div>\r\n\r\n                  \r\n                  <div class=\"col-12 mb-3 mt-3\">\r\n                    <label class=\"form-label\" for=\"indicator\">Activity Code </label>\r\n                    <input type=\"text\" name=\"activity_code\" class=\"form-control\" id=\"activity_code\" placeholder=\"Please enter activity code\" value=\"";
echo set_value("activity_code");
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter activity code. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"name\">Target Planning <span class=\"text-danger\">*</span></label>\r\n                   \r\n                  <div id=\"DivPlanning\">\r\n                      \r\n                    <table class=\"table table-bordered\">\r\n                      \r\n                      <thead class=\"bg-highlight\">\r\n                        <tr>\r\n                          <th>Year </th>\r\n                          <th style=\"text-align:center;\">Plan</th>\r\n                          <th>Budget </th>\r\n                        </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody>\r\n                        ";
$k = 1;
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                        \r\n                        <tr>\r\n                           <td>";
    echo $i;
    echo "<input type=\"hidden\" name=\"year[";
    echo $i;
    echo "]\" value=\"";
    echo $i;
    echo "\" /></td>\r\n                           <td ><input type=\"checkbox\" name=\"annual_plan[";
    echo $i;
    echo "]\" id=\"plan[]\" class=\"form-control\" value=\"1\"></td>\r\n                           <td><input type=\"number\" name=\"annul_budget[";
    echo $i;
    echo "]\" id=\"annul_budget[]\" class=\"form-control\" value=\"";
    echo set_value("annul_budget");
    echo "\"/>\r\n                           </td>\r\n                        </tr>\r\n                        \r\n                        \r\n                        ";
    $k++;
}
echo "                      </tbody>\r\n                    </table>\r\n                    \r\n                    </div>\r\n                  </div>\r\n                  \r\n\r\n\r\n                  \r\n                \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n            </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                   <a href=\"";
echo base_url() . "/planning/project_me_plan/logframe/" . $workflow_id;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>