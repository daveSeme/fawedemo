<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/select2/select2.min.js\" defer></script>\r\n\r\n<link href=\"";
echo base_url();
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#counties').select2({placeholder: \"Select Counties\"});\r\n\t\$('#thematic_area').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n    \$('#person_responsible').select2();\r\n    \$('#implementing_partner').select2();\r\n    \$('#notification_recepient').select2();\r\n\t\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n             \r\n\t\t  ";
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
echo "          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "planning/project/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                 \r\n                  ";
// echo " <div class=\"col-12 mb-3\">\r\n  <label class=\"form-label\" for=\"name\"><span id=\"title\">Project Code</span> </label>\r\n                    <input type=\"text\" name=\"project_code\" class=\"form-control\" id=\"project_code\" value=\"";
// echo set_value("project_code");
// echo "\"  placeholder=\"Please enter Project Code\">\r\n                    <div class=\"invalid-feedback\"> Please enter project code. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n                  \r\n                  \r\n      ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">Project/Phase Title</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" value=\"";
echo set_value("name");
echo "\"  placeholder=\"Please enter name\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter name. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n                  \r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"start_date\"><span id=\"title\">Start Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"start_date\" class=\"form-control\" readonly=\"\"  id=\"start_date\" data-date-format=\"dd-mm-yyyy\" value=\"";
echo set_value("start_date");
echo "\" placeholder=\"Please select start date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Start Date. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"end_date\">End Date</label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"end_date\" class=\"form-control\" readonly=\"\" value=\"";
echo set_value("end_date");
echo "\" data-date-format=\"dd-mm-yyyy\" id=\"end_date\" placeholder=\"Please select end date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter End Date. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"duration\"><span id=\"title\">Duration</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"duration\" class=\"form-control\" id=\"duration\" value=\"";
echo set_value("duration");
echo "\" readonly=\"readonly\"  required=\"\">\r\n                    <div class=\"invalid-feedback\"> Please enter duration. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"budget_currency\">Funding Partner <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                            <select name=\"funding_partner\" id=\"funding_partner\" class=\"custom-select select2\" required=\"\">\r\n                                <option value=\"\">Select Funding Partner</option>\r\n\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$session = Config\Services::session();
$query_project = $db->query("select * from  funding_partner where flag=0 order by name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                                <option value=\"";
    echo $row_so["id"];
    echo "\">";
    echo $row_so["name"];
    echo "</option>\r\n                                ";
}
echo "                            </select>   \r\n                            <div class=\"invalid-feedback\"> Please select a valid Currency. </div>\r\n                    </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"project_budget\"><span id=\"title\">Project Budget </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"project_budget\" class=\"form-control\" id=\"project_budget\" value=\"";
echo set_value("project_budget");
echo "\" placeholder=\"Please Enter Project Budget\" required=\"\">\r\n                     \r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Project Budget. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"budget_currency\">Budget Currency <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                            <select name=\"budget_currency\" id=\"budget_currency\" class=\"custom-select select2\" required=\"\">\r\n                                <option value=\"\">Select Currency</option>\r\n\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$session = Config\Services::session();
$query_project = $db->query("select * from  mas_currency where flag=0 order by name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                                <option value=\"";
    echo $row_so["id"];
    echo "\">";
    echo $row_so["name"];
    echo "</option>\r\n                                ";
}
echo "                            </select>   \r\n                            <div class=\"invalid-feedback\"> Please select a valid Currency. </div>\r\n                    </div>\r\n                  </div>\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"reporting_schedule\">Reporting Schedule <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"reporting_schedule\" id=\"reporting_schedule\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Reporting Schedule</option>\r\n                      <option value=\"Monthly\">Monthly</option>\r\n                      <option value=\"Quarterly\">Quarterly</option>\r\n                      <option value=\"Bi-Annual\">Bi-Annual</option>\r\n                      <option value=\"Annual\">Annual</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Reporting Schedule. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                \r\n                   \r\n                    \r\n                  \r\n                     <div class=\"col-md-3\"> <label class=\"form-label\" for=\"reporting_schedule\">Reporting Timelines <span class=\"text-danger\">*</span></label></div>\r\n                      \r\n                     <div class=\"col-md-9\">\r\n                       \r\n                       <div class=\"DivMonthly\" style=\"display:none;\">\r\n                       \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_jan\" id=\"rs_monthly_jan\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\" selected=\"selected\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_jan_date\" id=\"rs_monthly_jan_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                            \r\n\t\t\t\t    \r\n                    \r\n                       <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_feb\" id=\"rs_monthly_feb\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\" selected=\"selected\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_feb_date\" id=\"rs_monthly_feb_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_mar\" id=\"rs_monthly_mar\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\" selected=\"selected\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_mar_date\" id=\"rs_monthly_mar_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>\r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_apr\" id=\"rs_monthly_apr\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\" selected=\"selected\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_apr_date\" id=\"rs_monthly_apr_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_may\" id=\"rs_monthly_may\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\" selected=\"selected\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_may_date\" id=\"rs_monthly_may_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_june\" id=\"rs_monthly_june\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\" selected=\"selected\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_june_date\" id=\"rs_monthly_june_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_july\" id=\"rs_monthly_july\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\" selected=\"selected\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_july_date\" id=\"rs_monthly_july_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_aug\" id=\"rs_monthly_aug\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\" selected=\"selected\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_aug_date\" id=\"rs_monthly_aug_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_sep\" id=\"rs_monthly_sep\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\" selected=\"selected\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_sep_date\" id=\"rs_monthly_sep_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_oct\" id=\"rs_monthly_oct\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\" selected=\"selected\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_oct_date\" id=\"rs_monthly_oct_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_nov\" id=\"rs_monthly_nov\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\" selected=\"selected\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_nov_date\" id=\"rs_monthly_nov_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_dec\" id=\"rs_monthly_dec\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\" selected=\"selected\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_monthly_dec_date\" id=\"rs_monthly_dec_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n                       </div>\r\n                                       \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t\t<div class=\"DivQuarterly\"  style=\"display:none;\">\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q1_month\" id=\"rs_quarterly_q1_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q1_month_date\" id=\"rs_quarterly_q1_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q2_month\" id=\"rs_quarterly_q2_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q2_month_date\" id=\"rs_quarterly_q2_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q3_month\" id=\"rs_quarterly_q3_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q3_month_date\" id=\"rs_quarterly_q3_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q4_month\" id=\"rs_quarterly_q4_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_quarterly_q4_month_date\" id=\"rs_quarterly_q4_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n                                         \r\n\t\t\t\t\t\t\r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t<div class=\"DivBiannual\"  style=\"display:none;\">\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual1_month\" id=\"rs_biannual1_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual1_month_date\" id=\"rs_biannual1_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual2_month\" id=\"rs_biannual2_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_biannual2_month_date\" id=\"rs_biannual2_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n\r\n                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n                        <div class=\"DivAnnual\" style=\"display:none;\">\r\n                        \r\n                        \r\n                        \r\n                        \r\n                        \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            <select name=\"rs_annual_month\" id=\"rs_annual_month\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Month</option>\r\n                              <option value=\"January\">January</option>\r\n                              <option value=\"February\">February</option>\r\n                              <option value=\"March\">March</option>\r\n                              <option value=\"April\">April</option>\r\n                              <option value=\"May\">May</option>\r\n                              <option value=\"June\">June</option>\r\n                              <option value=\"July\">July</option>\r\n                              <option value=\"August\">August</option>\r\n                              <option value=\"September\">September</option>\r\n                              <option value=\"October\">October</option>\r\n                              <option value=\"November\">November</option>\r\n                              <option value=\"December\">December</option>\r\n                            </select> \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            <select name=\"rs_annual_month_date\" id=\"rs_annual_month_date\" class=\"custom-select select2\">\r\n                              <option value=\"\">Select Date</option>\r\n                              ";
for ($i = 1; $i <= 31; $i++) {
    echo "                                <option value=\"";
    echo $i;
    echo "\">";
    echo $i;
    echo "</option>\r\n                              ";
}
echo "                            </select>   \r\n                            </div>\r\n                          </div>  \r\n                        \r\n                        </div>\r\n                        \r\n                        \r\n                        \r\n                        \r\n                        </div>\r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n\r\n\r\n\r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"counties\">Counties <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"counties[]\" id=\"counties\" class=\"custom-select counties\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Counties</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("SELECT name, id FROM mas_county ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("counties") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid County. </div>\r\n                  </div>\r\n\r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"person_responsible\">Person Responsible <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"person_responsible\" id=\"person_responsible\" class=\"custom-select\">\r\n                                <option value=\"\">Select Person Responsible</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from ctbl_users where user_type !=\"admin\" ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                             <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("person_responsible") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Person Responsible. </div>\r\n                  </div>\r\n                  \r\n                  \r\n\t\t\t\t    \t<div class=\"col-12 mb-3\" >\r\n                   \t\t\t <label class=\"form-label\" for=\"sector\">Implementing Partner <span class=\"text-danger\">*</span></label>\r\n                             <select name=\"implementing_partner\" id=\"implementing_partner\" class=\"custom-select\">\r\n                                <option value=\"\">Select Implementing Partner</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from implementing_partner order by name ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                \r\n                             <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("implementing_partner") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                   \t\t\t <div class=\"invalid-feedback\"> Please select a valid Implementing Partner. </div>\r\n                  \t\t</div>\r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"counties\">Thematic Area  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"thematic_area[]\" id=\"thematic_area\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Thematic Area</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("SELECT name, id FROM org_thematic_area ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("thematic_area") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Thematic Area. </div>\r\n                  </div>\r\n\r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"project_status\">Project Status<span class=\"text-danger\">*</span></label>\r\n                    <select name=\"project_status\" id=\"project_status\" class=\"custom-select\" required=\"\">\r\n                      <option value=\"\">Select Status</option>\r\n                      <option value=\"Pipeline\" ";
if (set_value("project_status") == "Pipeline") {
    echo "selected=\"selected\"";
}
echo ">Pipeline</option>\r\n                      <option value=\"Ongoing\" ";
if (set_value("project_status") == "Ongoing") {
    echo "selected=\"selected\"";
}
echo ">Ongoing</option>\r\n                      <option value=\"Completed\" ";
if (set_value("Completed") == "Ongoing") {
    echo "selected=\"selected\"";
}
echo ">Completed</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project Status. </div>\r\n                  </div>\r\n                    \r\n\t\t\t\t\t\r\n                  <div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_submission_date\"><span id=\"title\">Report Submission Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"report_submission_date\" class=\"form-control\" readonly=\"\"  id=\"report_submission_date\" data-date-format=\"dd-mm-yyyy\" value=\"";
echo set_value("start_date");
echo "\" placeholder=\"Please select Report Submission Date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Report Submission Date. </div>\r\n                  </div>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"person_responsible\">Report Notification Recepient<span class=\"text-danger\">*</span></label>\r\n                            <select name=\"notification_recepient[]\" id=\"notification_recepient\" class=\"custom-select\" multiple=\"multiple\">\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from ctbl_users where user_type !=\"admin\" ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                             \t<option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("notification_recepient") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Report Notification Recepient. </div>\r\n                  </div>\r\n";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"project_logo\">Attach Project Logo (.png, .jpg, .jpeg) <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"project_logo\" id=\"project_logo\">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Example valid custom file feedback</div>\r\n                    </div>\r\n                  </div>\r\n";
echo "                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/planning/project";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n\r\n<script>\r\n\r\n    \$('body').delegate('#reporting_schedule', 'change', function () {\r\n\t\t\r\n       if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t//alert(\$(this).val());\r\n\t\t\t if (\$(this).val() == 'Monthly') {\r\n\t\t\t\t \r\n\t\t\t\t//alert(\$(this).val());\r\n\t\t\t\t\r\n\t\t\t\t\$(\".DivMonthly\").fadeIn();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t  \r\n\t\t\t\t \r\n\t\t\t }\r\n\t\t\t \r\n\t\t\t if (\$(this).val() == 'Quarterly') {\r\n\t\t\t\t \r\n\t\t\t\t //alert(\$(this).val());\r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivQuarterly\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t }\r\n\r\n\r\n\t\t\t  if (\$(this).val() == 'Bi-Annual') {\r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivBiannual\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivAnnual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t }\r\n\r\n\t\t\t if (\$(this).val() == 'Annual') {\r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t\t\$(\".DivAnnual\").fadeIn();\r\n\t\t\t\t\$(\".DivMonthly\").fadeOut();\r\n\t\t\t\t\$(\".DivQuarterly\").fadeOut();\r\n\t\t\t\t\$(\".DivBiannual\").fadeOut();\r\n\t\t\t\t \r\n\t\t\t }\r\n\t\t\t \r\n\t\t\t \r\n\t\t\t \r\n\t\t\t\t \r\n\t\t\t\t \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t}\r\n   });\r\n</script>";

?>