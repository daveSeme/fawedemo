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
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n         <div class=\"panel-content\">\r\n                ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                      <p> ";
    echo $session->getFlashdata("error");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "                  \r\n                  \r\n\t\t    ";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $validation->listErrors();
    echo "</div>";
}
echo "           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "reporting/project_data/beneficiaries_report/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * from project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               \t\t\t\t<option value=\"";
    echo $row["id"];
    echo "\" ";
    if (set_value("project") == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n\t\t\t\t\t\t \t";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n                \r\n                \r\n                ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                      <option value=\"\">Select Year</option>\r\n                        \r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Year. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"reporting_period\">Reporting Period <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select\" name=\"reporting_period\" id=\"reporting_period\" required=\"\">\r\n                      <option value=\"\">Select Reporting Period</option>\r\n                        \r\n                    ";
$reporting_periods = ["Jan-Mar", "Apr-Jun", "Jul-Sep", "Oct-Dec"];
foreach($reporting_periods as $period) {
    echo "\t\t\t\t\t\t\t\t   <option value=\"";
    echo $period;
    echo "\" ";
    if ($stdata["reporting_period"] == $period) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $period;
    echo "</option>\r\n\t\t\t\t\t ";
}
echo "</select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Reporting date. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"county\">Chapter<span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select\" name=\"Chapter\" id=\"county\" required=\"\">\r\n                      <option value=\"\">select Chapter</option>\r\n                        \r\n                    ";
foreach ($counties as $row) {
    echo "               \t\t\t\t<option value=\"";
    echo $row["id"];
    echo "\" ";
    if (set_value("id") == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n\t\t\t\t\t\t \t";
}
echo "</select>\r\n                    <div class=\"invalid-feedback\"> Please Chapter. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"type_beneficiaries\">Type of Beneficiaries <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select\" name=\"type_beneficiaries\" id=\"type_beneficiaries\" required=\"\">\r\n                      ";
echo "<option value=\"\">Select Type of Beneficiary</option>";
echo "<option value=\"Direct Beneficiaries\">Direct Beneficiaries</option>";
echo "<option value=\"Indirect Beneficiaries\">Indirect Beneficiaries</option>";
echo "</select>\r\n                    <div class=\"invalid-feedback\"> Please select a Beneficiary. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                \r\n                  ";
echo "<div class=\"col-12 mb-3\" id=\"DIV-Indirect-Benf\" style=\"display:none;\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Indirect Beneficiaries <span class=\"text-danger\">*</span></label>\r\n                    <input name=\"indirect_beneficiaries\" type=\"number\" class=\"form-control\" value=\"";
echo set_value("indirect_beneficiaries");
echo "\" id=\"indirect_beneficiaries\" placeholder=\"Please enter Total Indirect Beneficiaries\">\r\n                    <div class=\"invalid-feedback\">Please enter Total Indirect Beneficiaries.</div>\r\n                  </div>\r\n\r\n                  \r\n                \r\n\t\t\t\t";
echo "<div class=\"col-12 mb-3\" id=\"DIV-direct-Benf\"  style=\"display:none;\">\r\n\t\t\t\t  <table class=\"table table-bordered\">\r\n                    \r\n                    <thead class=\"bg-highlight\">\r\n                      <tr>\r\n                        <th>Beneficiaries</th>\r\n                        <th>Total</th>\r\n        </tr>\r\n                    </thead>\r\n                    \r\n                    <tbody>\r\n                      ";
echo "<tr><td width=\"50%\">Government Agencies</td><td><input type=\"number\" name=\"ben1\" class=\"form-control\"></td></tr>";
echo "<tr><td width=\"50%\">Local Communities</td><td><input type=\"number\" name=\"ben2\" class=\"form-control\"></td></tr>";
echo "<tr><td width=\"50%\">Businesses and Industries</td><td><input type=\"number\" name=\"ben3\" class=\"form-control\"></td></tr>";
echo "<tr><td width=\"50%\">Non-Governmental Organizations</td><td><input type=\"number\" name=\"ben4\" class=\"form-control\"></td></tr>";
echo "<tr><td width=\"50%\">Educational Institutions</td><td><input type=\"number\" name=\"ben5\" class=\"form-control\"></td></tr>";
echo "</tbody>\r\n                    \r\n                  </table>\r\n\t\t\t\t</div>                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/beneficiaries_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>