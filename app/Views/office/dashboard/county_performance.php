<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
echo "<style>\r\n    /*everything below this line is custom */\r\n       \r\n    #MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style><main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">";
echo $main_title;
echo "</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div id=\"panel-5\" class=\"panel\">\r\n    <ul class=\"nav nav-tabs \" role=\"tablist\">\r\n  ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard");
echo "\" ><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n  ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\"  href=\"";
echo site_url("dashboard/project_overview");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link active\"  href=\"#tab_borders_icons-3\"  role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> County</a> </li>\r\n    \r\n    ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/thematic_area_performance");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a> </li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n    ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/cases_performance");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n   \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/beneficiaries");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/budget_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n    </ul>\r\n    \r\n    \r\n    \r\n     \r\n    \r\n    \r\n<!--KPI Achieved Targer-->    \r\n<div class=\"tab-content border border-top-0 p-3\">\r\n      <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n\t  \r\n\t  <div class=\"row\"> \r\n          \r\n          <!-------Start Row ---->\r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Project Status by County</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-12\">\r\n                    <div id=\"container\"></div>\r\n                </div>\r\n                \r\n                \r\n                \r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          <!-------Start Row ----> \r\n          \r\n          \r\n          \r\n          \r\n          \r\n<div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n          <div class=\"panel-hdr\">\r\n            <h2> Summary of Thematic Area by County</h2>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-lg-6\">\r\n              <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                <thead>\r\n                  <tr>\r\n                    <th bgcolor=\"#4189dd\">County</th>\r\n                    <th bgcolor=\"#4189dd\">Thematic Areas</th>\r\n                  </tr>\r\n                </thead>\r\n                <tbody>\r\n\t\t\t\t\t\r\n                      ";
$query = $db->query("SELECT id,name,project_id, total FROM mas_county left join (SELECT count(*) as total,county_id,project_id FROM project  left join project_map_county on project_map_county.project_id =project.id group by county_id) as tbl_ongoing on tbl_ongoing.county_id = mas_county.id");
$results = $query->getResultArray();
foreach ($results as $row) {
    $query_th_area = $db->query("select count(*) as tot_th_area from project_map_thematic_area where project_id= \"" . $row["project_id"] . "\" ");
    $row_th_aera = $query_th_area->getRowArray();
    echo "                      <tr>\r\n                        <td>";
    echo $row["name"];
    echo "</td>\r\n                        <td data-graph-name=\"";
    echo $row_th_aera["tot_th_area"] ?: "";
    echo "\">";
    echo $row_th_aera["tot_th_area"] ?: "";
    echo "</td>\r\n                      </tr>\r\n\t\t\t\t\t  ";
}
echo "                </tbody>\r\n              </table>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n              <div class=\"highchart-kpi-achieved\"></div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n\t\t  \r\n\t\t  \r\n\t\t  <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2>No of Project by County</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                    \r\n                    <thead>\r\n                      <tr>\r\n                        <th bgcolor=\"#4189dd\">County</th>\r\n                        <th bgcolor=\"#4189dd\">Number of Projects</th>\r\n                      </tr>\r\n                    </thead>\r\n                    <tbody>\r\n\t\t\t\t\t\r\n                      ";
$query = $db->query("SELECT name, total FROM mas_county left join (SELECT count(*) as total,county_id FROM project  left join project_map_county on project_map_county.project_id =project.id group by county_id) as tbl_ongoing on tbl_ongoing.county_id = mas_county.id");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                      <tr>\r\n                        <td>";
    echo $row["name"];
    echo "</td>\r\n                        <td data-graph-name=\"";
    echo $row["total"];
    echo "\">";
    echo $row["total"];
    echo "</td>\r\n                      </tr>\r\n\t\t\t\t\t  ";
}
echo "\r\n                    </tbody>\r\n                  </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-kpi-achieved\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>\r\n\t  \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n        <div class=\"row\"> \r\n          \r\n          <!-------Start Row ---->\r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of County by Budget</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                    \r\n                    <thead>\r\n                      <tr>\r\n                        <th bgcolor=\"#4189dd\">County</th>\r\n                        <th bgcolor=\"#4189dd\">Budget</th>\r\n                      </tr>\r\n                    </thead>\r\n                    <tbody>\r\n\t\t\t\t\t\r\n                     ";
$query = $db->query("SELECT name, project_budget FROM mas_county left join (SELECT sum(project_budget) as project_budget,county_id from project left join project_map_county on project_map_county.project_id =project.id group by county_id) as tbl_ongoing on tbl_ongoing.county_id = mas_county.id");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                      <tr>\r\n                        <td>";
    echo $row["name"];
    echo "</td>\r\n                        <td data-graph-name=\"";
    echo $row["project_budget"];
    echo "\">";
    echo $row["project_budget"];
    echo "</td>\r\n                      </tr>\r\n\t\t\t\t\t  ";
}
echo "\r\n                    </tbody>\r\n                  </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-kpi-achieved\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          <!-------Start Row ----> \r\n\t\t  \r\n\t\t  \r\n\t\t   \r\n          \r\n        </div>\r\n\t\t\r\n\t\t \r\n      </div>\r\n    </div>    \r\n    \r\n<!--KPI ON Track-->   \r\n\r\n    \r\n    \r\n\r\n\r\n<!--KPI Under Performing-->\r\n\r\n    \r\n    \r\n\r\n\r\n<!--END-->\r\n  </div>\r\n</main>\r\n";

?>