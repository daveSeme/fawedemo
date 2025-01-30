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
echo base_url() . "/reporting/organizational_data/monitoring_visit_report/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/monitoring_visit_report/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/monitoring_visit_report/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/monitoring_visit_report/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t \r\n            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t <table  class=\"table table-bordered m-0\">\r\n\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Program </td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$program_data = get_by_id("id", $stdata["program"], "org_thematic_area");
echo $program_name = $program_data["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Project</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$project_data = get_by_id("id", $stdata["project_id"], "project");
echo $project_name = $project_data["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\" bgcolor=\"#F0F0F0\">Completed by</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
echo $stdata["completed_by"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Dates </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["visit_date"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t \r\n\t\t\t\t   \r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Location </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["location"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n                       \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t  <td class=\"form-label\" bgcolor=\"#F0F0F0\">Objectives</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["objectives"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n                   \r\n                    \r\n                    \r\n\t\t\t\t <tr>\r\n                  <td colspan=\"2\">\r\n                  \r\n                  <div class=\"col-md-12\"><h3>Agenda</h3></div>\r\n                  <p>The following activities were completed as part of the monitoring visit :</p>\r\n\r\n                  \r\n                  \r\n\t\t\t\t<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"dataTable_donor\" class=\"table table-bordered\">\r\n                      <thead>\r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Date </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Venue </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Activity </strong></h6></th>\r\n                         \r\n                          <th bgcolor=\"#F0F0F0\" colspan=\"4\" ><h6 align=\"center\"><strong> Participants </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> Category/Designation </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> M </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> F </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> Total </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query_agenda_map = $db->query("select * from monitoring_visit_report_agenda_map where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_agenda_map = $query_agenda_map->getResultArray();
foreach ($results_agenda_map as $row_agenda_map) {
    echo "                        <tr>\r\n                          <td>";
    echo $row_agenda_map["agenda_date"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_venue"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_activity"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_category"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_male"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_female"];
    echo "</td>\r\n                          \r\n                          <td>\r\n\t\t\t\t\t\t  ";
    echo $toal = $row_agenda_map["agenda_male"] + $row_agenda_map["agenda_female"];
    echo "                          </td>\r\n                          \r\n                        </tr>\r\n                        ";
}
echo "                        \r\n                  </tbody>\r\n                </table>                  \r\n                  </td>\r\n                 </tr>\r\n                  \r\n                    \r\n                    \r\n\t\t\t\t\r\n                \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td colspan=\"2\">\r\n                  <div class=\"col-md-12\"><h3>General Observations</h3></div>\r\n                  <p>Provide a description of the activity including the objectives, issues addressed, the people met, and provide pictorial evidence, anecdotal statements demonstrating learning/quotes of success etc.</p>\r\n                  \r\n                  <p>&nbsp;</p>\r\n                  <div class=\"col-md-12\"><h3>Specific Issues & Actions</h3></div>\r\n                  <p>What issues were noted from the field that require attention, this could be programmatic, grants related or risks to the project and propose alternative solutions.</p>\r\n                        \r\n\t\t\t\t<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" id=\"dataTable_SIA\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" width=\"35%\"><h6 align=\"left\"><strong> Issue identified </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\"><h6 align=\"left\"><strong> Actions </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_agenda_map = $db->query("select * from monitoring_visit_report_issue_action_map where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_agenda_map = $query_agenda_map->getResultArray();
foreach ($results_agenda_map as $row_agenda_map) {
    echo "                            <tr>\r\n                              <td>";
    echo $row_agenda_map["issue_identified"];
    echo "</td>\r\n                              <td>";
    echo $row_agenda_map["actions"];
    echo "</td>\r\n                            </tr>\r\n                            ";
}
echo "                            \r\n                  </tbody>\r\n                </table>                        \r\n                        \r\n                        </td>\r\n\t\t\t\t   </tr>\r\n                \r\n                \r\n                \r\n                \r\n                 <tr>\r\n                  <td colspan=\"2\">\r\n                  \r\n                  <div class=\"col-md-12\"><h3>Next Visit</h3></div>\r\n                  <p>The details of the next monitoring visit are:</p>\r\n                  \r\n                  \r\n                  </td>\r\n                 </tr>\r\n                \r\n                \r\n\t\t\t\t\t<tr>\r\n                    \r\n                    \r\n\t\t\t\t\t\t<td  class=\"form-label\"  bgcolor=\"#F0F0F0\">To be completed by </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_completed_by"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\" bgcolor=\"#F0F0F0\">Location</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
echo $stdata["location"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Dates </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_date"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t \r\n\t\t\t\t   \r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Objectives </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_objectives"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n                       \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t  <td class=\"form-label\" bgcolor=\"#F0F0F0\">Photos</td>\r\n\t\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t   </tr>\r\n                \r\n                \r\n                \r\n                \r\n                \r\n                    \r\n\t\t\t\t</table>\r\n                 \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/monitoring_visit_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>