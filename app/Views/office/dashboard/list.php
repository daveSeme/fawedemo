<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/custom.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">";
echo $main_title;
echo "</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<div id=\"panel-5\" class=\"panel\">\r\n  <ul class=\"nav nav-tabs \" role=\"tablist\">\r\n    <li class=\"nav-item\"> <a class=\"nav-link active\" data-toggle=\"tab\" href=\"#tab_borders_icons-1\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/project_overview");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n    ";
 echo "<li class=\"nav-item\"> <a class=\"nav-link \" href=\"";
 echo site_url("dashboard/county_performance");
 echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Chapters</a> </li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link \" href=\"";
echo site_url("dashboard/components_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Components</a> </li>\r\n    ";
 echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
 echo site_url("dashboard/thematic_area_performance");
 echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a></li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n    ";
 echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
 echo site_url("dashboard/cases_performance");
 echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
 echo site_url("dashboard/beneficiaries");
 echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/budget_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n  </ul>\r\n  \r\n  \r\n  <div class=\"tab-content border border-top-0 p-3\">\r\n    <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n      ";

// Project Duration
echo "<div class=\"row\"> \r\n";
echo "<div class=\"col-lg-6\">";
echo "<div class=\"panel-hdr\">\r\n                <h2> Project Timeline</h2>\r\n              </div>\r\n";
echo "<div class=\"panel-content\">\r\n                <div id=\"container2\"></div>\r\n              </div>";
echo "</div>";
echo "<div class=\"col-lg-6\">";
echo "<div class=\"panel-hdr\">\r\n                <h2> Project Targets/Achievements</h2>\r\n              </div>\r\n";
echo "<div class=\"panel-content\">\r\n                <div id=\"container3\"></div>\r\n              </div>";
echo "</div>";
echo "</div>";
echo "<div class=\"panel-hdr\">\r\n                <h2> Project Output Indicator</h2>\r\n              </div>\r\n              \r\n              ";
echo "<div class=\"row\"> \r\n                <div class=\"col-lg-12\">\r\n                    <div id=\"container1\"></div>\r\n                </div>\r\n                \r\n                \r\n                \r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div> \r\n              \r\n";

// echo "<div class=\"row\"> \r\n        \r\n        <!---------Row 2 Starts --->\r\n        <div class=\"col-lg-6\">\r\n        \r\n          <div id=\"panel-2\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n            <div class=\"panel-hdr\">\r\n              <h2> Annual Indicator Performace </h2>\r\n            </div>\r\n            <div class=\"panel-container show\">\r\n              <div class=\"panel-content\">\r\n                <div id=\"container\"></div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          \r\n          \r\n          <div id=\"panel-3\" class=\"panel\">\r\n            <div class=\"panel-hdr\">\r\n              <h2>Indicator Performace to Date</h2>\r\n            </div>\r\n            <div class=\"panel-container show\">\r\n              <div class=\"panel-content\">\r\n                <div id=\"container_2\"></div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          \r\n          \r\n        </div>\r\n        <!---------Row 2 Ends --->\r\n        \r\n        <div class=\"col-lg-6\">\r\n        \r\n        \r\n          <div id=\"panel-4\" class=\"panel\">\r\n            <div class=\"panel-hdr\">\r\n              <h2>Annual Output Indicator Performace</h2>\r\n            </div>\r\n            <div class=\"panel-container show\">\r\n             \r\n              <table class=\"highchart\"   data-graph-container-before=\"1\"  data-graph-type=\"bar\"  style=\"display:none\">\r\n                <caption></caption>\r\n                \r\n                <thead>\r\n                  <tr>\r\n                    <th>Output Performance to Completion</th>\r\n                    <th>Number of Output Targets</th>\r\n                  </tr>\r\n                </thead>\r\n                \r\n                <tbody>\r\n                \r\n                  <tr>\r\n                    <td>Total Number of Output Indicator Targets to Date </td>\r\n                    <td data-graph-item-color=\"blue\">\r\n\t\t\t\t\t";
// $query = $db->query("select count(*) as total from project_output_indicator");
// $row = $query->getRowArray();
// echo $row["total"];
// echo "                     </td>\r\n                  </tr>\r\n                  \r\n                  \r\n                  <tr>\r\n                    <td> Total Targets Met  </td>\r\n                    <td data-graph-item-color=\"green\">\r\n\t\t\t\t\t\t";
// $query_1 = $db->query("SELECT  SUM(CASE WHEN total_actual >= total_target THEN 1 ELSE 0 END ) as tot_achived from project_output_indicator left join (select sum(achievement) as total_actual,indicator_id from project_annual_indicator_tracking_report_map  group by indicator_id ) as tracking on tracking.indicator_id=project_output_indicator.id\r\n                        \r\n                        left join (select sum(target) as total_target,indicator_id from project_output_indicator_target   group by indicator_id ) as target on target.indicator_id=project_output_indicator.id\r\n                        ");
// $line = $query_1->getRowArray();
// echo $line["tot_achived"];
// echo "                       </td>\r\n                  </tr>\r\n                  \r\n                  \r\n                  <tr>\r\n                    <td>Due but Not Met </td>\r\n                    <td data-graph-item-color=\"red\" >\r\n\t\t\t\t\t";
// echo $row["total"] - $line["tot_achived"];
// if ($row["total"] != 0) {
//     $per_overall = 34;//number_format(3 / $row["total"] * 100, 2);
// } else {
//     $per_overall = 10;
// }
// echo "                     </td>\r\n                  </tr>\r\n                  \r\n                  \r\n                  \r\n                </tbody>\r\n              </table>\r\n              \r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n          \r\n          \r\n          <div id=\"panel-5\" class=\"panel\">\r\n            <div class=\"panel-hdr\">\r\n              <h2>Annual Output Indicator Performance to Date</h2>\r\n            </div>\r\n            <div class=\"panel-container show\">\r\n              <div class=\"panel-content\">\r\n                <table class=\"highchart\"   data-graph-container-before=\"1\"  data-graph-type=\"bar\"  style=\"display:block\"    >\r\n                  <caption>\r\n                  </caption>\r\n                  <thead>\r\n                    <tr>\r\n                      <th >Output Performance to Completion</th>\r\n                      <th>Number of Output Targets</th>\r\n                    </tr>\r\n                  </thead>\r\n                  <tbody>\r\n                    <tr>\r\n                      <td>Total Number of Output Indicator Targets to Date</td>\r\n                      <td    data-graph-item-color=\"blue\" >";
// $query = $db->query("SELECT count(*) as total FROM project_output_indicator  ");
// $row = $query->getRowArray();
// echo $row["total"];
// echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td  > Total Targets Met </td>\r\n                      <td   data-graph-item-color=\"green\" >";
// $query_1 = $db->query("SELECT  SUM(CASE WHEN total_actual >= total_target THEN 1 ELSE 0 END ) as tot_achived FROM project_output_indicator left join (select sum(achievement) as total_actual,indicator_id from project_annual_indicator_tracking_report_map\r\n\t\t\t\t\t   where year <=" . date("Y") . " group by indicator_id ) as tracking on tracking.indicator_id=project_output_indicator.id\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\tleft join (select sum(target) as total_target,indicator_id from project_output_indicator_target where year <=" . date("Y") . " group by indicator_id ) as target on target.indicator_id=project_output_indicator.id\r\n\t\t\t\t\t\t  ");
// $line = $query_1->getRowArray();
// echo $line["tot_achived"];
// echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <td>Due but Not Met</td>\r\n                      <td data-graph-item-color=\"red\" >";
// echo $row["total"] - $line["tot_achived"];
// if ($row["total"] != 0) {
//     $per_to_date = 15;//number_format(3 / $row["total"] * 100, 2);
// } else {
//     $per_to_date = 10;
// }
// echo "</td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          \r\n          \r\n          \r\n        </div>\r\n        \r\n        <!-------Start Row ----> \r\n        \r\n        <!-------Start Row ----> \r\n        \r\n      </div>\r\n    </div>\r\n  ";
echo "</div>\r\n</div>\r\n</main>\r\n";

?>