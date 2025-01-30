<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<style type=\"text/css\">\r\n    /*everything below this line is custom */\r\n       \r\n    #field-MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style>\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n         \r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t <table  class=\"table table-bordered m-0\">\r\n\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Date </td>\r\n\t\t\t\t\t\t<td >";
echo changeDateFormat("d/m/Y", $stdata["date"]);
echo "</td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Type </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_type"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Number</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_number"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">File Number</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["file_number"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">Field Office</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$ip = get_by_id("id", $stdata["field_office"], "field_office");
echo $ip["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                   \r\n                   \r\n\t\t\t\t\t<tr>\r\n                        <td class=\"form-label\">County</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query = $db->query("select name FROM mas_county WHERE id = '" . $stdata["county"] . "'");
$results = $query->getResult();
$row = $query->getRow();
echo $row->name;
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                       \r\n\t\t\t\t\t<tr>\r\n                        <td class=\"form-label\">Case Category reported</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select case_category FROM cases_map_case_category where workflow_id=\"" . $pid . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["case_category"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Case Context</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select case_context FROM cases_map_case_context where workflow_id=\"" . $pid . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["case_context"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\r\n\r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Incidents referred from other service providers</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select incidents_referred FROM cases_map_incidents_referred where workflow_id=\"" . $pid . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["incidents_referred"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\r\n\r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Services Provided</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select services_provided FROM cases_map_services_provided where workflow_id=\"" . $pid . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["services_provided"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                  \r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">More information on the services provided</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["more_details_on_services_provided"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n                  \r\n                    \r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Case Status</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_status"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\t\t\t\t\r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Additional Comments</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["comments"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\r\n\t\t\t\t</table>\r\n                 \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>