<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<style type=\"text/css\">\r\n    /*everything below this line is custom */\r\n       \r\n    #field-MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style>\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/planning/project/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        \r\n        \r\n        \r\n        \r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t \r\n            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t <table  class=\"table table-bordered m-0\">\r\n\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Project Code </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["project_code"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Project/Phase Title </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["name"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Start Date</td>\r\n\t\t\t\t\t\t<td >";
echo $StartDate = date("d/m/Y", strtotime($stdata["start_date"]));
echo " </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">End Date</td>\r\n\t\t\t\t\t\t<td >";
echo $Ensdate = date("d/m/Y", strtotime($stdata["end_date"]));
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Duration </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["duration"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Funding Partner </td>\r\n\t\t\t\t\t\t<td >\r\n                       ";
$cdata = get_by_id("id", $stdata["funding_partner"], "funding_partner");
echo $cdata["name"];
echo "\r\n                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Budget </td>\r\n\t\t\t\t\t\t<td >\r\n\t\t\t\t\t\t";
echo $stdata["project_budget"];
echo "                       ";
$cdata = get_by_id("id", $stdata["budget_currency"], "mas_currency");
echo $cdata["name"];
echo "\r\n                        </td>\r\n\t\t\t\t\t</tr>\r\n                   \r\n                   \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Reporting Schedule </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["reporting_schedule"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Reporting Timelines </td>\r\n\t\t\t\t\t\t<td >\r\n                        \r\n<div class=\"col-md-9\">\r\n                       \r\n                       <div class=\"DivMonthly\"  ";
if ($stdata["reporting_schedule"] == "Monthly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n                       \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                            ";
echo $stdata["rs_monthly_jan"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            ";
echo $stdata["rs_monthly_jan_date"];
echo "                            </div>\r\n                          </div>  \r\n                            \r\n\t\t\t\t    \r\n                    \r\n                       <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_monthly_feb"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                            \t";
echo $stdata["rs_monthly_feb_date"];
echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_mar"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n\t\t\t\t\t\t\t\t";
echo $stdata["rs_monthly_mar_date"];
echo "                            </div>\r\n                          </div>\r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_apr"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_monthly_apr_date"];
echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_may"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_may_date"];
echo "                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_june"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_june_date"];
echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_july"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_july_date"];
echo "                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t\r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_aug"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_aug_date"];
echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_sep"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_sep_date"];
echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_oct"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_oct_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_nov"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_nov_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_dec"];
echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_monthly_dec_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n                       </div>\r\n                                       \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t\t<div class=\"DivQuarterly\"  ";
if ($stdata["reporting_schedule"] == "Quarterly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_quarterly_q1_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_quarterly_q1_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_quarterly_q2_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_quarterly_q2_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_quarterly_q3_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_quarterly_q3_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_quarterly_q4_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_quarterly_q4_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n                                         \r\n\t\t\t\t\t\t\r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t<div class=\"DivBiannual\"   ";
if ($stdata["reporting_schedule"] == "Bi-Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_biannual1_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_biannual1_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t";
echo $stdata["rs_biannual2_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_biannual2_month_date"];
echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n                        </div>\r\n\r\n                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n                        <div class=\"DivAnnual\" ";
if ($stdata["reporting_schedule"] == "Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n                        \r\n                        \r\n                        \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_annual_month"];
echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-3\"> \r\n                          \t\t";
echo $stdata["rs_annual_month_date"];
echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        </div>\r\n                        \r\n                        \r\n                        \r\n                        \r\n                        </div>                        \r\n                        \r\n                        \r\n                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Counties</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select name FROM project_map_county left join mas_county on project_map_county.county_id=mas_county.id where project_id=\"" . $pid . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n                  \r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Person Responsible</td>\r\n\t\t\t\t\t  <td >\r\n\t\t\t\t\t\t";
$pr = get_by_id("id", $stdata["person_responsible"], "ctbl_users");
echo $pr["name"];
echo "                    </td>\r\n\t\t\t\t   </tr>\r\n                   \r\n                   \r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Implementing Partner</td>\r\n\t\t\t\t\t  <td >\r\n\t\t\t\t\t\t";
$ip = get_by_id("id", $stdata["implementing_partner"], "implementing_partner");
echo $ip["name"];
echo "                    </td>\r\n\t\t\t\t   </tr>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Thematic Area</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select name from project_map_thematic_area left join org_thematic_area on project_map_thematic_area.thematic_area_id=org_thematic_area.id where project_id=\"" . $pid . "\" ");
$thematic_area_listar = $query_reg->getResultArray();
foreach ($thematic_area_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                    \r\n                    <tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Project Status</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["project_status"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Report Submission Date</td>\r\n\t\t\t\t\t\t<td >";
echo $StartDate = date("d/m/Y", strtotime($stdata["report_submission_date"]));
echo " </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Report Notification Recepient</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select name from project_notification_recepient_map left join ctbl_users on project_notification_recepient_map.\trecepient_id=ctbl_users.id where project_id=\"" . $pid . "\" ");
$thematic_area_listar = $query_reg->getResultArray();
foreach ($thematic_area_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                    \r\n\t\t\t\t</table>\r\n                 \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <a href=\"";
echo base_url() . "/planning/project";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>