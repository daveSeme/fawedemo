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
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div id=\"panel-5\" class=\"panel\">\r\n<ul class=\"nav nav-tabs \" role=\"tablist\">\r\n ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard");
// echo "\" ><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n  ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/project_overview");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/county_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> County</a> </li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/thematic_area_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/cases_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n\r\n\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/beneficiaries");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n\r\n    <li class=\"nav-item\"> <a class=\"nav-link active\" href=\"#\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n    \r\n</ul>\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n     \r\n<div class=\"tab-content border border-top-0 p-3\">\r\n      <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n<!-----------------------------------------------------------------------Start Row 6--------------------------------------------------> \r\n       \r\n    \r\n<div class=\"row\">\r\n  <div class=\"col-lg-12\">\r\n    <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n      <div class=\"panel-hdr\"><h2> Summary of Budget</h2></div>\r\n      \r\n      \r\n      <div class=\"row\">\r\n        <div class=\"col-lg-12\">\r\n        \r\n          <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-container2\" data-graph-type=\"line\">\r\n            \r\n            <thead>\r\n              <tr>\r\n                <th bgcolor=\"#4189dd\">Activity</th>\r\n                <th bgcolor=\"#4189dd\">Budget</th>\r\n                <th bgcolor=\"#4189dd\">Expenses</th>\r\n                <th bgcolor=\"#4189dd\">Variance</th>\r\n                <th bgcolor=\"#4189dd\">% of Variance</th>\r\n                <th bgcolor=\"#4189dd\">Status</th>\r\n              </tr>\r\n            </thead>\r\n            \r\n            \r\n            <tbody>\r\n            \r\n            \r\n      \r\n\t\t";
$query_mon_progress_report = $db->query("select * from project_annual_workplan_progress_report_mapping order by activity_id ");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    echo "              <tr>\r\n                <td width=\"50%\">\r\n                ";
    $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
    echo $project_details["activity_name"];
    echo "                </td>\r\n                <td>\r\n                ";
    echo $row_mon_progress_report["budget"];
    echo "                </td>\r\n                <td>";
    echo $row_mon_progress_report["expenses"];
    echo "</td>\r\n                <td>";
    echo $row_mon_progress_report["budget"] - $row_mon_progress_report["expenses"];
    echo "</td>\r\n                \r\n                <td>";
    echo $percent_variance = number_format($row_mon_progress_report["expenses"] / $row_mon_progress_report["budget"] * 100, 2);
    echo "</td>\r\n                <td \r\n\t\t\t\t";
    if (100 < $percent_variance) {
        echo "style='background:red'";
    } else {
        if (0 < $percent_variance && $percent_variance < 31) {
            echo "style='background:yellow'";
        } else {
            if (29 < $percent_variance && $percent_variance < 51) {
                echo "style='background:orange'";
            } else {
                if (49 < $percent_variance && $percent_variance < 101) {
                    echo "style='background:green'";
                }
            }
        }
    }
    echo "                \r\n                \r\n                >\r\n                \r\n                &nbsp;</td>\r\n              </tr>\r\n              \r\n             ";
}
echo "              \r\n              \r\n              \r\n            </tbody>\r\n            \r\n            \r\n            \r\n          </table>\r\n          \r\n        </div>\r\n       \r\n      </div>\r\n      \r\n      \r\n      \r\n      \r\n    </div>\r\n  </div>\r\n</div>\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n      <!-----------------------------------------------------------------------Start Row ---------------------------------------------------> \r\n      </div>\r\n    </div>    \r\n    \r\n    \r\n    \r\n\r\n\r\n<!--END-->\r\n  </div>\r\n</main>\r\n";

?>