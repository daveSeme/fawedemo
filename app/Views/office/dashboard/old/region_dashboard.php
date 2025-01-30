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
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div id=\"panel-5\" class=\"panel\">\r\n    <ul class=\"nav nav-tabs \" role=\"tablist\">\r\n        < \r\n\t\t<li class=\"nav-item\"> <a class=\"nav-link  active\" href=\"#\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>";
$dis = get_by_id("id", $base_id, "mas_region");
echo " <strong>  " . $dis["region"] . "</strong> ";
echo " Dashboard</a> </li>\r\n\t\t \r\n\t\t  \r\n\t\r\n    </ul>\r\n    \r\n    \r\n    \r\n     \r\n    \r\n    \r\n<!--KPI Achieved Targer-->    \r\n<div class=\"tab-content border border-top-0 p-3\">\r\n      <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n\t  \r\n\t  <div class=\"row\"> \r\n          \r\n          <!-------Start Row ---->\r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Project Status by Region</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-12\">\r\n                    <div  id=\"container\"></div>\r\n                </div>\r\n                \r\n                \r\n                \r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          <!-------Start Row ----> \r\n\t\t  \r\n\t\t  \r\n\t\t  <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2>No of Project by Region</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                    \r\n                    <thead>\r\n                      <tr>\r\n                        <th bgcolor=\"#4189dd\">Region</th>\r\n                        <th bgcolor=\"#4189dd\">Number of Projects</th>\r\n                      </tr>\r\n                    </thead>\r\n                    <tbody>\r\n\t\t\t\t\t\r\n                      ";
$query = $db->query("SELECT region, total FROM mas_region left join (SELECT count(*) as total,region_id FROM project  left join project_map_region on project_map_region.project_id =project.id      group by region_id) as ongoing on ongoing.region_id=mas_region.id where mas_region.id=\"" . $base_id . "\" ");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                      <tr>\r\n                        <td>";
    echo $row["region"];
    echo "</td>\r\n                        <td data-graph-name=\"";
    echo $row["total"];
    echo "\">";
    echo $row["total"];
    echo "</td>\r\n                      </tr>\r\n\t\t\t\t\t  ";
}
echo "\r\n                    </tbody>\r\n                  </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-kpi-achieved\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>\r\n\t  \r\n        <div class=\"row\"> \r\n          \r\n          <!-------Start Row ---->\r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of Region by Budget</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                    \r\n                    <thead>\r\n                      <tr>\r\n                        <th bgcolor=\"#4189dd\">Region</th>\r\n                        <th bgcolor=\"#4189dd\">Budget</th>\r\n                      </tr>\r\n                    </thead>\r\n                    <tbody>\r\n\t\t\t\t\t\r\n                     ";
$query = $db->query("SELECT region, budget FROM mas_region left join (SELECT sum(budget) as budget,region_id FROM project  left join project_map_region on project_map_region.project_id =project.id      group by region_id) as ongoing on ongoing.region_id=mas_region.id where mas_region.id=\"" . $base_id . "\" ");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                      <tr>\r\n                        <td>";
    echo $row["region"];
    echo "</td>\r\n                        <td data-graph-name=\"";
    echo $row["budget"];
    echo "\">";
    echo $row["budget"];
    echo "</td>\r\n                      </tr>\r\n\t\t\t\t\t  ";
}
echo "\r\n                    </tbody>\r\n                  </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-kpi-achieved\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          <!-------Start Row ----> \r\n\t\t  \r\n\t\t  \r\n\t\t   \r\n          \r\n        </div>\r\n\t\t\r\n\t\t \r\n      </div>\r\n    </div>    \r\n    \r\n<!--KPI ON Track-->   \r\n\r\n    \r\n    \r\n\r\n\r\n<!--KPI Under Performing-->\r\n\r\n    \r\n    \r\n\r\n\r\n<!--END-->\r\n  </div>\r\n</main>\r\n";

?>