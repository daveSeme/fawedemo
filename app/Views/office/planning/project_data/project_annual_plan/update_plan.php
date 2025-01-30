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
echo "                      </td>\r\n                      <td class=\"bg-highlight\"> Year </td>\r\n                      <td>";
echo $frameworkdata["year"];
echo "</td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n                ";
$insert_url = "planning/project_annual_plan/update_plan/" . $workflow_id . "/?activity_id=" . $request->getVar("id") . "&output_id=" . $request->getVar("output_id");
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t\t\t";
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
echo "                <div class=\"form-row\">\r\n         <input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $form_data["id"];
echo "\">\r\n\r\n\r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"name\">Output</label>\r\n                    <div class=\"form-control\">";
echo $output_data["name"];
echo "</div>\r\n                  </div>\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"indicator\">Activity Name <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"activity_name\" class=\"form-control\" id=\"activity_name\" placeholder=\"Please enter activity\"  value=\"";
if ($form_data["activity_type"] == "Non-Budget Activity") {
    echo $form_data["activity_name"];
} else {
    $db = Config\Database::connect();
    $query_act = $db->query("select * from import_activities where id = '" . $form_data["activity_name"] . "' ");
    $row_act = $query_act->getResult();
    $row_act = $query_act->getRow();
    echo $row_act->activity_name;
}
echo "\" readonly=\"readonly\">\r\n                    <div class=\"invalid-feedback\"> Please enter activity. </div>\r\n                  </div>\r\n                  \r\n                  \r\n\r\n\t\t\t<div class=\"col-12 mb-3\">\r\n                  <label class=\"form-label\" for=\"name\">Budget Planning <span class=\"text-danger\">*</span></label>\r\n                  <table class=\"table table-bordered\">\r\n                    \r\n                    <thead class=\"bg-highlight\">\r\n                    \r\n                      <tr>\r\n                        <th>Month</th>\r\n                        <th>Quarter</th>\r\n                        <th style=\"text-align:center\">Plan</th>\r\n                        <th>Budget</th>\r\n                      </tr>\r\n                      \r\n                    </thead>\r\n                    \r\n                    ";
$db = Config\Database::connect();
$query = $db->query("select * from project_activity_annual_plan Where activity_id=\"" . $form_data["id"] . "\" and year=\"" . $frameworkdata["year"] . "\" ");
$results = $query->getResultArray();
$year = [];
$quarter = [];
$month = [];
$budget = [];
$plan = [];
foreach ($results as $row) {
    $year[] = $row["year"];
    $quarter[] = $row["quarter"];
    $month[] = $row["month"];
    $plan[$row["quarter"]][$row["month"]] = $row["plan"];
    $budget[$row["quarter"]][$row["month"]] = $row["budget"];
}
echo "                    \r\n                    \r\n                    <tbody>\r\n                    \r\n                      <tr>\r\n                        <td>Oct <input type=\"hidden\" name=\"month[Q1][Oct]\" id=\"month\"  class=\"form-control\" value=\"Oct\"></td>\r\n                        <td rowspan=\"3\">Q1 <input type=\"hidden\" name=\"quarter[Q1][Oct]\" id=\"quarter\"  class=\"form-control\" value=\"Q1\" ></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q1][Oct]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q1"]["Oct"]) && $plan["Q1"]["Oct"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q1][Oct]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q1"]["Oct"]) ? $budget["Q1"]["Oct"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      <tr>\r\n                        <td>Nov <input type=\"hidden\" name=\"month[Q1][Nov]\" id=\"month\"  class=\"form-control\" value=\"Nov\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q1][Nov]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q1"]["Nov"]) && $plan["Q1"]["Nov"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q1][Nov]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q1"]["Nov"]) ? $budget["Q1"]["Nov"] : "";
echo "\"></td>\r\n                      </tr>\r\n\r\n                      <tr>\r\n                        <td>Dec <input type=\"hidden\" name=\"month[Q1][Dec]\" id=\"month\"  class=\"form-control\" value=\"Dec\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q1][Dec]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q1"]["Dec"]) && $plan["Q1"]["Dec"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q1][Dec]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q1"]["Dec"]) ? $budget["Q1"]["Dec"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      <tr>\r\n                        <td>Jan <input type=\"hidden\" name=\"month[Q2][Jan]\" id=\"month\"  class=\"form-control\" value=\"Jan\"></td>\r\n                        <td rowspan=\"3\">Q2 <input type=\"hidden\" name=\"quarter[Q2][Jan]\" id=\"quarter\"  class=\"form-control\" value=\"Q2\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q2][Jan]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q2"]["Jan"]) && $plan["Q2"]["Jan"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q2][Jan]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q2"]["Jan"]) ? $budget["Q2"]["Jan"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      <tr>\r\n                        <td>Feb <input type=\"hidden\" name=\"month[Q2][Feb]\" id=\"month\"  class=\"form-control\" value=\"Feb\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q2][Feb]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q2"]["Feb"]) && $plan["Q2"]["Feb"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q2][Feb]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q2"]["Feb"]) ? $budget["Q2"]["Feb"] : "";
echo "\"></td>\r\n                      </tr>\r\n\r\n                      <tr>\r\n                        <td>Mar <input type=\"hidden\" name=\"month[Q2][Mar]\" id=\"month\"  class=\"form-control\" value=\"Mar\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q2][Mar]\" id=\"plan\"  class=\"form-control\" value=\"1\" ";
if (isset($plan["Q2"]["Mar"]) && $plan["Q2"]["Mar"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q2][Mar]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q2"]["Mar"]) ? $budget["Q2"]["Mar"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      \r\n                      <tr>\r\n                        <td>Apr <input type=\"hidden\" name=\"month[Q3][Apr]\" id=\"month\"  class=\"form-control\" value=\"Apr\"></td>\r\n                        <td rowspan=\"3\">Q3 <input type=\"hidden\" name=\"quarter[Q3][Apr]\" id=\"quarter\"  class=\"form-control\" value=\"Q3\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q3][Apr]\" id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q3"]["Apr"]) && $plan["Q3"]["Apr"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q3][Apr]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q3"]["Apr"]) ? $budget["Q3"]["Apr"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      <tr>\r\n                        <td>May <input type=\"hidden\" name=\"month[Q3][May]\" id=\"month\"  class=\"form-control\" value=\"May\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q3][May]\" id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q3"]["May"]) && $plan["Q3"]["May"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q3][May]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q3"]["May"]) ? $budget["Q3"]["May"] : "";
echo "\"></td>\r\n                      </tr>\r\n\r\n                      <tr>\r\n                        <td>June <input type=\"hidden\" name=\"month[Q3][June]\" id=\"month\"  class=\"form-control\" value=\"June\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q3][June]\" id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q3"]["June"]) && $plan["Q3"]["June"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q3][June]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q3"]["June"]) ? $budget["Q3"]["June"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      <tr>\r\n                        <td>July <input type=\"hidden\" name=\"month[Q4][July]\" id=\"month\"  class=\"form-control\" value=\"July\"></td>\r\n                        <td rowspan=\"3\">Q4 <input type=\"hidden\" name=\"quarter[Q4][July]\" id=\"quarter\"  class=\"form-control\" value=\"Q4\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q4][July]\"  id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q4"]["July"]) && $plan["Q4"]["July"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q4][July]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q4"]["July"]) ? $budget["Q4"]["July"] : "";
echo "\"></td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      <tr>\r\n                        <td>Aug <input type=\"hidden\" name=\"month[Q4][Aug]\" id=\"month\"  class=\"form-control\" value=\"Aug\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q4][Aug]\"  id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q4"]["Aug"]) && $plan["Q4"]["Aug"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q4][Aug]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q4"]["Aug"]) ? $budget["Q4"]["Aug"] : "";
echo "\"></td>\r\n                      </tr>\r\n\r\n                      <tr>\r\n                        <td>Sep <input type=\"hidden\" name=\"month[Q4][Sep]\" id=\"month\"  class=\"form-control\" value=\"Sep\"></td>\r\n                        <td><input type=\"checkbox\" name=\"plan[Q4][Sep]\"  id=\"plan\" class=\"form-control\" value=\"1\" ";
if (isset($plan["Q4"]["Sep"]) && $plan["Q4"]["Sep"] == 1) {
    echo "checked=\"checked\"";
}
echo "></td>\r\n                        <td><input type=\"number\" name=\"budget[Q4][Sep]\" id=\"budget\" class=\"form-control\" value=\"";
echo isset($budget["Q4"]["Sep"]) ? $budget["Q4"]["Sep"] : "";
echo "\"></td>\r\n                      </tr>\r\n\r\n                    \r\n                      \r\n                      \r\n                      \r\n                      \r\n                      \r\n                      \r\n                    </tbody>\r\n                    \r\n                  </table>\r\n                </div>                  \r\n\r\n\r\n                  \r\n                \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n            </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                   <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                   <a href=\"";
echo base_url() . "/planning/project_annual_plan/" . $this->session->get("mode") . "/" . $workflow_id;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>