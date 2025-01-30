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
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n             \r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Project Name</th>\r\n                      <td>\r\n\t\t\t\t\t  ";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
$startdate = date("Y", strtotime($project_details["start_date"]));
$enddate = date("Y", strtotime($project_details["end_date"]));
$diff = $enddate - $startdate + 1;
echo "                      </td>\r\n                    </tr>\r\n                   \r\n                  </tbody>\r\n                </table>\r\n\t\t\t\t\r\n\t\t\t\t";
$insert_url = "planning/project_me_plan/add_output_indicator/" . $workflow_id . "/?output_id=" . $request->getVar("output_id");
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t  ";
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
echo "                <div class=\"form-row\">\r\n\r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"name\">Output</label>\r\n                    <div class=\"form-control\">";
echo $output_data["name"];
echo "</div>\r\n                  </div>\r\n                \r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"indicator\">Indicator Name <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"indicator\" class=\"form-control\" id=\"name\" placeholder=\"Please enter indicator\"  value=\"";
echo set_value("indicator");
echo "\"required>\r\n                    <div class=\"invalid-feedback\"> Please enter indicator. </div>\r\n                  </div>\r\n                  \r\n                    <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"indicator_category\"> Indicator Category <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"indicator_category\" id=\"indicator_category\" class=\"custom-select  \" required>\r\n                        <option value=\"Quantitative\" >Quantitative Indicator</option>\r\n                        <option value=\"Qualitative\">Qualitative Indicator</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select the  Indicator Category. </div>\r\n                    </div>\r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"indicator\"> Unit Type <span class=\"text-danger\">*</span></label>\r\n                   <select name=\"unit\" id=\"unit\" class=\"custom-select  \"  required>\r\n\t\t\t\t\t<option value=\"\" >Select Unit</option>\r\n\t\t\t\t\t  ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM mas_unit  ");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               <option value=\"";
    echo $row["id"];
    echo "\" ";
    if (set_value("name") == $row["name"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n ";
}
echo "\t\t\t\t\t</select>\r\n                    <div class=\"invalid-feedback\"> Please select the  Unit Type. </div>\r\n                  </div> \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"assumption\">Indicator Definition </label>\r\n                    <textarea name=\"definition\" class=\"form-control\" id=\"definition\" placeholder=\"Please enter indicator definition\" >";
echo set_value("definition");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter indicator definition. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"means_of_verification\">Means of Verification (Mov) </label>\r\n                    <textarea name=\"means_of_verification\" class=\"form-control\" id=\"means_of_verification\" placeholder=\"Please enter Means of Verification\" >";
echo set_value("means_of_verification");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter Means of Verification. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"baseline\">Baseline <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"baseline\" class=\"form-control\" id=\"baseline\" placeholder=\"Please enter baseline\" value=\"";
echo set_value("baseline");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter baseline. </div>\r\n                  </div>\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"baseline\">Overall Target <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"target\" class=\"form-control\" id=\"target\" placeholder=\"Please enter target\" value=\"";
echo set_value("target");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter target. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\">Target Planning <span class=\"text-danger\">*</span></label>\r\n                   \r\n                     \r\n                    <table class=\"table table-bordered\">\r\n                      <thead class=\"bg-highlight\">\r\n                        <tr>\r\n                          <th>Year </th>\r\n                          <th>Annual Target </th>\r\n                        </tr>\r\n                      </thead>\r\n                      <tbody>\r\n                        ";
$k = 1;
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td><input type=\"number\" name=\"annul_target[";
    echo $i;
    echo "]\" class=\"form-control\" id=\"annul_target[";
    echo $i;
    echo "]\" value=\"";
    echo set_value("annul_target");
    echo "\" required=\"required\" /></td>\r\n                        </tr>\r\n                        ";
    $k++;
}
echo "                      </tbody>\r\n                    </table>\r\n                  </div>\r\n\r\n\r\n                  \r\n                \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"save\" ><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                   <a href=\"";
echo base_url() . "/planning/project_me_plan/logframe/" . $workflow_id;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>