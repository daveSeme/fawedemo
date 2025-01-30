<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n<style>\r\n    /*everything below this line is custom */\r\n       \r\n    #field-MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/select2/select2.min.js\" defer></script>\r\n\r\n<link href=\"";
echo base_url();
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#countries').select2({placeholder: \"Select countries\"});\r\n\t\$('#thematic_area').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n    \$('#person_responsible').select2();\r\n    \$('#implementing_partner').select2();\r\n    \$('#notification_recepient').select2();\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  ";
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
echo "            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n             ";
$insert_url = "planning/project/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t \r\n                  <input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t  \r\n                 \r\n\t\t\t\t  \r\n\t\t\t\t\r\n\t\t\t\t  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">Project Code</span> </label>\r\n                    <input type=\"text\" name=\"project_code\" class=\"form-control\" id=\"project_code\" value=\"";
echo $stdata["project_code"];
echo "\"  placeholder=\"Please enter Project Code\">\r\n                    <div class=\"invalid-feedback\"> Please enter project code. </div>\r\n                  </div>\r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t  \r\n               \r\n                  \r\n                \r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t    <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\">Name <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Please enter name\" required value=\"";
echo $stdata["name"];
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter name. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\">Start Date</label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"start_date\" class=\"form-control\" readonly=\"\" value=\"";
echo changeDateFormat("d-m-Y", $stdata["start_date"]);
echo "\" id=\"start_date\" placeholder=\"Please select start date\">\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Start Date. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\">End Date</label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"end_date\" class=\"form-control\" readonly=\"\" value=\"";
echo changeDateFormat("d-m-Y", $stdata["end_date"]);
echo "\" id=\"end_date\" placeholder=\"Please select end date\">\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter End Date. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"duration\"><span id=\"title\">Duration</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"duration\" class=\"form-control\" id=\"duration\" value=\"";
echo $stdata["duration"];
echo "\" readonly=\"readonly\"  required=\"\">\r\n                    <div class=\"invalid-feedback\"> Please enter duration. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"funding_partner\">Funding Partner <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                            <select name=\"funding_partner\" id=\"funding_partner\" class=\"custom-select select2\" required=\"\">\r\n                                <option value=\"\">Select Funding Partner</option>\r\n\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$session = Config\Services::session();
$query_project = $db->query("select * from  funding_partner where flag=0 order by name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                                <option value=\"";
    echo $row_so["id"];
    echo "\" ";
    if ($stdata["funding_partner"] == $row_so["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row_so["name"];
    echo "</option>\r\n                                ";
}
echo "                            </select>   \r\n                            <div class=\"invalid-feedback\"> Please select a valid Currency. </div>\r\n                    </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"project_budget\"><span id=\"title\">Project Budget </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"project_budget\" class=\"form-control\" id=\"project_budget\" value=\"";
echo $stdata["project_budget"];
echo "\" placeholder=\"Please Enter Project Budget\" required=\"\">\r\n                     \r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Project Budget. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"budget_currency\">Budget Currency <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                            <select name=\"budget_currency\" id=\"budget_currency\" class=\"custom-select select2\" required=\"\">\r\n                                <option value=\"\">Select Currency</option>\r\n\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$session = Config\Services::session();
$query_project = $db->query("select * from  mas_currency where flag=0 order by name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                                <option value=\"";
    echo $row_so["id"];
    echo "\" ";
    if ($stdata["budget_currency"] == $row_so["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row_so["name"];
    echo "</option>\r\n                                ";
}
echo "                            </select>   \r\n                            <div class=\"invalid-feedback\"> Please select a valid Currency. </div>\r\n                    </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"reporting_schedule\">Reporting Schedule <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"reporting_schedule\" id=\"reporting_schedule\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Reporting Schedule</option>\r\n                      <option value=\"Monthly\" ";
if ($stdata["reporting_schedule"] == "Monthly") {
    echo "selected=\"selected\"";
}
echo ">Monthly</option>\r\n                      <option value=\"Quarterly\" ";
if ($stdata["reporting_schedule"] == "Quarterly") {
    echo "selected=\"selected\"";
}
echo ">Quarterly</option>\r\n                      <option value=\"Bi-Annual\" ";
if ($stdata["reporting_schedule"] == "Bi-Annua") {
    echo "selected=\"selected\"";
}
echo ">Bi-Annual</option>\r\n                      <option value=\"Annual\" ";
if ($stdata["reporting_schedule"] == "Annual") {
    echo "selected=\"selected\"";
}
echo ">Annual</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Reporting Schedule. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                \r\n                  \r\n                  <div class=\"col-md-3\"> <label class=\"form-label\" for=\"reporting_schedule\">Reporting Timelines <span class=\"text-danger\">*</span></label></div>\r\n\t\t\t\r\n            \r\n            <div class=\"col-md-9\">\r\n                       \r\n                       <div class=\"DivMonthly\"  ";
if ($stdata["reporting_schedule"] == "Monthly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n                       \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_jan\" id=\"rs_monthly_jan\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_jan"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_jan"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_jan"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_jan"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_jan"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_jan"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_jan"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_jan"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_jan"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_jan"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_jan"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_jan"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_jan_date\" id=\"rs_monthly_jan_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_jan_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                            \r\n\t\t\t\t    \r\n                    \r\n                       <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_feb\" id=\"rs_monthly_feb\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_feb"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_feb"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_feb"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_feb"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_feb"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_feb"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_feb"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_feb"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_feb"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_feb"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_feb"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_feb"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_feb_date\" id=\"rs_monthly_feb_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_feb_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_mar\" id=\"rs_monthly_mar\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_mar"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_mar"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_mar"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_mar"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_mar"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_mar"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_mar"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_mar"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_mar"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_mar"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_mar"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_mar"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_mar_date\" id=\"rs_monthly_mar_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_mar_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>\r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_apr\" id=\"rs_monthly_apr\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_apr"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_apr"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_apr"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_apr"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_apr"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_apr"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_apr"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_apr"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_apr"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_apr"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_apr"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_apr"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_apr_date\" id=\"rs_monthly_apr_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_apr_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_may\" id=\"rs_monthly_may\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_may"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_may"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_may"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_may"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_may"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_may"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_may"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_may"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_may"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_may"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_may"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_may"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_may_date\" id=\"rs_monthly_may_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_may_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_june\" id=\"rs_monthly_june\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_june"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_june"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_june"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_june"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_june"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_june"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_june"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_june"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_june"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_june"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_june"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_june"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_june_date\" id=\"rs_monthly_june_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_june_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_july\" id=\"rs_monthly_july\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_july"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_july"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_july"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_july"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_july"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_july"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_july"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_july"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_july"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_july"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_july"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_july"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_july_date\" id=\"rs_monthly_july_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_july_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_aug\" id=\"rs_monthly_aug\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_aug"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_aug"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_aug"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_aug"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_aug"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_aug"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_aug"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_aug"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_aug"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_aug"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_aug"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_aug"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_aug_date\" id=\"rs_monthly_aug_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_aug_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_sep\" id=\"rs_monthly_sep\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_sep"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_sep"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_sep"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_sep"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_sep"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_sep"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_sep"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_sep"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_sep"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_sep"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_sep"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_sep"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_sep_date\" id=\"rs_monthly_sep_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_sep_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_oct\" id=\"rs_monthly_oct\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_oct"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_oct"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_oct"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_oct"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_oct"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_oct"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_oct"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_oct"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_oct"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_oct"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_oct"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_oct"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_oct_date\" id=\"rs_monthly_oct_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_oct_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_nov\" id=\"rs_monthly_nov\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_nov"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_nov"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_nov"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_nov"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_nov"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_nov"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_nov"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_nov"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_nov"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_nov"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_nov"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_nov"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_nov_date\" id=\"rs_monthly_nov_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_nov_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_dec\" id=\"rs_monthly_dec\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_monthly_dec"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_monthly_dec"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_monthly_dec"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_monthly_dec"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_monthly_dec"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_monthly_dec"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_monthly_dec"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_monthly_dec"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_monthly_dec"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_monthly_dec"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_monthly_dec"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_monthly_dec"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_dec_date\" id=\"rs_monthly_dec_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_monthly_dec_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n                       </div>\r\n                                       \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t\t<div class=\"DivQuarterly\"  ";
if ($stdata["reporting_schedule"] == "Quarterly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q1_month\" id=\"rs_quarterly_q1_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_quarterly_q1_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_quarterly_q1_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_quarterly_q1_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_quarterly_q1_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_quarterly_q1_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_quarterly_q1_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_quarterly_q1_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_quarterly_q1_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_quarterly_q1_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_quarterly_q1_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_quarterly_q1_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_quarterly_q1_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q1_month_date\" id=\"rs_quarterly_q1_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_quarterly_q1_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q2_month\" id=\"rs_quarterly_q2_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_quarterly_q2_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_quarterly_q2_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_quarterly_q2_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_quarterly_q2_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_quarterly_q2_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_quarterly_q2_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_quarterly_q2_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_quarterly_q2_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_quarterly_q2_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_quarterly_q2_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_quarterly_q2_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_quarterly_q2_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q2_month_date\" id=\"rs_quarterly_q2_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_quarterly_q2_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q3_month\" id=\"rs_quarterly_q3_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_quarterly_q3_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_quarterly_q3_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_quarterly_q3_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_quarterly_q3_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_quarterly_q3_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_quarterly_q3_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_quarterly_q3_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_quarterly_q3_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_quarterly_q3_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_quarterly_q3_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_quarterly_q3_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_quarterly_q3_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q3_month_date\" id=\"rs_quarterly_q3_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_quarterly_q3_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q4_month\" id=\"rs_quarterly_q4_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_quarterly_q4_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_quarterly_q4_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_quarterly_q4_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_quarterly_q4_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_quarterly_q4_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_quarterly_q4_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_quarterly_q4_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_quarterly_q4_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_quarterly_q4_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_quarterly_q4_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_quarterly_q4_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_quarterly_q4_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q4_month_date\" id=\"rs_quarterly_q4_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_quarterly_q4_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n                                         \r\n\t\t\t\t\t\t\r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t<div class=\"DivBiannual\"   ";
if ($stdata["reporting_schedule"] == "Bi-Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual1_month\" id=\"rs_biannual1_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_biannual1_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_biannual1_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_biannual1_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_biannual1_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_biannual1_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_biannual1_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_biannual1_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_biannual1_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_biannual1_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_biannual1_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_biannual1_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_biannual1_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual1_month_date\" id=\"rs_biannual1_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_biannual1_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual2_month\" id=\"rs_biannual2_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_biannual2_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_biannual2_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_biannual2_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_biannual2_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_biannual2_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_biannual2_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_biannual2_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_biannual2_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_biannual2_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_biannual2_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_biannual2_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_biannual2_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual2_month_date\" id=\"rs_biannual2_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_biannual2_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n\r\n                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n                        <div class=\"DivAnnual\" ";
if ($stdata["reporting_schedule"] == "Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n                        \r\n                        \r\n                        \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_annual_month\" id=\"rs_annual_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" ";
if ($stdata["rs_annual_month"] == "January") {
    echo "selected=\"selected\"";
}
echo ">January</option>\r\n                              <option value=\"Februrary\" ";
if ($stdata["rs_annual_month"] == "Februrary") {
    echo "selected=\"selected\"";
}
echo ">Februrary</option>\r\n                              <option value=\"March\" ";
if ($stdata["rs_annual_month"] == "March") {
    echo "selected=\"selected\"";
}
echo ">March</option>\r\n                              <option value=\"April\" ";
if ($stdata["rs_annual_month"] == "April") {
    echo "selected=\"selected\"";
}
echo ">April</option>\r\n                              <option value=\"May\" ";
if ($stdata["rs_annual_month"] == "May") {
    echo "selected=\"selected\"";
}
echo ">May</option>\r\n                              <option value=\"June\" ";
if ($stdata["rs_annual_month"] == "June") {
    echo "selected=\"selected\"";
}
echo ">June</option>\r\n                              <option value=\"July\" ";
if ($stdata["rs_annual_month"] == "July") {
    echo "selected=\"selected\"";
}
echo ">July</option>\r\n                              <option value=\"August\" ";
if ($stdata["rs_annual_month"] == "August") {
    echo "selected=\"selected\"";
}
echo ">August</option>\r\n                              <option value=\"September\" ";
if ($stdata["rs_annual_month"] == "September") {
    echo "selected=\"selected\"";
}
echo ">September</option>\r\n                              <option value=\"October\" ";
if ($stdata["rs_annual_month"] == "October") {
    echo "selected=\"selected\"";
}
echo ">October</option>\r\n                              <option value=\"November\" ";
if ($stdata["rs_annual_month"] == "November") {
    echo "selected=\"selected\"";
}
echo ">November</option>\r\n                              <option value=\"December\" ";
if ($stdata["rs_annual_month"] == "December") {
    echo "selected=\"selected\"";
}
echo ">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_annual_month_date\" id=\"rs_annual_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["rs_annual_month_date"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                        \r\n                        </div>\r\n                        \r\n                        \r\n                        \r\n                        \r\n                        </div>                      \r\n                  \r\n\t\t\t\t\r\n\r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"countries\">countries <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"countries[]\" id=\"countries\" class=\"custom-select countries\" multiple=\"multiple\">\r\n                                <option value=\"\">Select countries</option>\r\n                                ";
$db = Config\Database::connect();
$county_list = [];
$query_county = $db->query("SELECT * FROM project_map_county where project_id=\"" . $pid . "\" ");
$county_listar = $query_county->getResultArray();
foreach ($county_listar as $row) {
    array_push($county_list, $row["county_id"]);
}
$query = $db->query("SELECT name, id FROM mas_county ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (in_array($row->id, $county_list)) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                                <div class=\"invalid-feedback\"> Please select a valid County. </div>\r\n                              </div>\r\n\r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"person_responsible\">Person Responsible <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"person_responsible\" id=\"person_responsible\" class=\"custom-select\">\r\n                                <option value=\"\">Select Person Responsible</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from ctbl_users where user_type !=\"admin\" ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                             <option value=\"";
    echo $row->id;
    echo "\" ";
    if ($stdata["person_responsible"] == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Person Responsible. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"implementing_partner\">Implementing Partner<span class=\"text-danger\">*</span></label>\r\n                    <select name=\"implementing_partner\" id=\"implementing_partner\" class=\"custom-select\" required=\"\">\r\n                      <option value=\"\">Select Implementing Partner</option>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query = $db->query("SELECT name, id FROM implementing_partner ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                        <option value=\"";
    echo $row->id;
    echo "\" ";
    if ($stdata["implementing_partner"] == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                        ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Implementing Partner. </div>\r\n                  </div>\r\n                    \r\n\r\n\r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"countries\">Thematic Area  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"thematic_area[]\" id=\"thematic_area\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Thematic Area</option>\r\n                                ";
$db = Config\Database::connect();
$thematic_area_list = [];
$query_th_area = $db->query("SELECT * FROM project_map_thematic_area where project_id=\"" . $pid . "\" ");
$th_area_listar = $query_th_area->getResultArray();
foreach ($th_area_listar as $row) {
    array_push($thematic_area_list, $row["thematic_area_id"]);
}
$query = $db->query("SELECT name, id FROM org_thematic_area ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (in_array($row->id, $thematic_area_list)) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                                \r\n                    \t\t\t<div class=\"invalid-feedback\"> Please select a valid Thematic Area. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"project_status\">Project Status <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select project_status\" name=\"project_status\" id=\"project_status\" required=\"\">\r\n\t\t\t\t\t   <option value=\"\">Select Project Status</option>\r\n                       <option value=\"Pipeline\" ";
if ($stdata["project_status"] == "Pipeline") {
    echo "selected=\"selected\"";
}
echo ">Pipeline</option>\r\n                       <option value=\"Ongoing\" ";
if ($stdata["project_status"] == "Ongoing") {
    echo "selected=\"selected\"";
}
echo ">Ongoing</option>\r\n                      <option value=\"Completed\" ";
if ($stdata["project_status"] == "Completed") {
    echo "selected=\"selected\"";
}
echo ">Completed</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please provide a valid Status. </div>\r\n                  </div>\r\n                  \r\n                    \r\n                    \r\n                  <div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_submission_date\"><span id=\"title\">Report Submission Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"report_submission_date\" class=\"form-control\" readonly=\"\"  id=\"report_submission_date\" data-date-format=\"dd-mm-yyyy\" value=\"";
echo changeDateFormat("d-m-Y", $stdata["report_submission_date"]);
echo "\" placeholder=\"Please select Report Submission Date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Report Submission Date. </div>\r\n                  </div>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"notification_recepient\">Report Notification Recepient<span class=\"text-danger\">*</span></label>\r\n                            <select name=\"notification_recepient[]\" id=\"notification_recepient\" class=\"custom-select\" multiple=\"multiple\">\r\n                                ";
$db = Config\Database::connect();
$recepient_list = [];
$query_th_area = $db->query("SELECT * FROM project_notification_recepient_map where project_id=\"" . $pid . "\" ");
$th_area_listar = $query_th_area->getResultArray();
foreach ($th_area_listar as $row) {
    array_push($recepient_list, $row["recepient_id"]);
}
$query = $db->query("select * from ctbl_users where user_type !=\"admin\" ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (in_array($row->id, $recepient_list)) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Report Notification Recepient. </div>\r\n                  </div>\r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n              \r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/planning/project";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n<script>\r\n\r\n    \$('body').delegate('#reporting_schedule', 'change', function () {\r\n\t\t\r\n       if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t//alert(\$(this).val());\r\n\t\t\t if (\$(this).val() == 'Monthly') {\r\n\t\t\t\t \r\n\t\t\t\t//alert(\$(this).val());\r\n\t\t\t\t\r\n\t\t\t\t\$(\".DivMonthly\").fadeIn();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t  \r\n\t\t\t\t \r\n\t\t\t }\r\n\t\t\t \r\n\t\t\t if (\$(this).val() == 'Quarterly') {\r\n\t\t\t\t \r\n\t\t\t\t //alert(\$(this).val());\r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivQuarterly\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t }\r\n\r\n\r\n\t\t\t  if (\$(this).val() == 'Bi-Annual') {\r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivBiannual\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t }\r\n\r\n\t\t\t if (\$(this).val() == 'Annual') {\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivAnnual\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t }\r\n\t\t\t \r\n\t\t\t \r\n\t\t\t \r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t}\r\n   });\r\n</script>";

?>