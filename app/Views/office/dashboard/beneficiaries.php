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
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div id=\"panel-5\" class=\"panel\">\r\n<ul class=\"nav nav-tabs \" role=\"tablist\">\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard");
echo "\" ><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/project_overview");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/county_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> County</a> </li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/thematic_area_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/cases_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n\r\n    <li class=\"nav-item\"> <a class=\"nav-link active\" href=\"#\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/budget_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n</ul>\r\n    \r\n    \r\n    \r\n     \r\n\r\n<div class=\"tab-content border border-top-0 p-3\">\r\n      <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n      <!-----------------------------------------------------------------------Start Row 6--------------------------------------------------> \r\n       \r\n    \r\n<div class=\"row\">\r\n  <div class=\"col-lg-12\">\r\n    <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n      <div class=\"panel-hdr\"><h2> Summary of Beneficiaries</h2></div>\r\n      \r\n      \r\n      <div class=\"row\">\r\n        <div class=\"col-lg-6\">\r\n        \r\n          <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-container2\" data-graph-type=\"area\">\r\n            <thead>\r\n              <tr>\r\n                <th bgcolor=\"#4189dd\">Beneficiaries Type</th>\r\n                <th bgcolor=\"#4189dd\">Total</th>\r\n              </tr>\r\n            </thead>\r\n            <tbody>\r\n            \r\n              <tr>\r\n                <td>Direct Beneficiaries</td>\r\n                <td>\r\n\t\t\t\t";
$query = $db->query("select sum(pwds_male + pwds_female + lgbtq_male + lgbtq_female +age_0_to_17_male+age_0_to_17_female+age_18_to_24_male+age_18_to_24_female+age_25_to_49_male+age_25_to_49_female+age_50_plus_male+age_50_plus_female) as total_dir_benef from project_beneficiaries_report  WHERE type_beneficiaries= \"Direct Beneficiaries\" ");
$row = $query->getRowArray();
echo $row["total_dir_benef"];
echo "                </td>\r\n              </tr>\r\n              \r\n              <tr>\r\n                <td>Indirect Beneficiaries</td>\r\n                <td>\r\n\t\t\t\t";
$query = $db->query("select sum(indirect_beneficiaries) as total_ind_benef from project_beneficiaries_report  WHERE type_beneficiaries= \"Indirect Beneficiaries\" ");
$row = $query->getRowArray();
echo $row["total_ind_benef"];
echo "                </td>\r\n              </tr>\r\n              \r\n            </tbody>\r\n          </table>\r\n          \r\n        </div>\r\n        <div class=\"col-lg-6\">\r\n          <div class=\"highchart-container2\"></div>\r\n        </div>\r\n      </div>\r\n      <!-----------------row2-------------------->\r\n      \r\n      \r\n      <div class=\"row\">\r\n        <div class=\"col-lg-6\">\r\n        \r\n          <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-container2\" data-graph-type=\"bar\">\r\n            <thead>\r\n              <tr>\r\n                <th bgcolor=\"#4189dd\">Beneficiaries Type</th>\r\n                <th bgcolor=\"#4189dd\">Male</th>\r\n                <th bgcolor=\"#4189dd\">Female</th>\r\n              </tr>\r\n            </thead>\r\n            <tbody>\r\n            \r\n              <tr>\r\n                <td>Direct Beneficiaries</td>\r\n                <td>\r\n\t\t\t\t";
$query = $db->query("select sum(pwds_male + lgbtq_male +age_0_to_17_male+age_18_to_24_male+age_25_to_49_male+age_50_plus_male) as total_dir_benef from project_beneficiaries_report  WHERE type_beneficiaries= \"Direct Beneficiaries\" ");
$row = $query->getRowArray();
echo $row["total_dir_benef"];
echo "                </td>\r\n                \r\n                \r\n                <td>\r\n\t\t\t\t";
$query = $db->query("select sum(pwds_female + lgbtq_female + age_0_to_17_female + age_18_to_24_female + age_25_to_49_female + age_50_plus_female) as total_dir_benef from project_beneficiaries_report  WHERE type_beneficiaries= \"Direct Beneficiaries\" ");
$row = $query->getRowArray();
echo $row["total_dir_benef"];
echo "                </td>\r\n              </tr>\r\n              \r\n             \r\n              \r\n            </tbody>\r\n          </table>\r\n          \r\n        </div>\r\n        <div class=\"col-lg-6\">\r\n          <div class=\"highchart-container2\"></div>\r\n        </div>\r\n      </div>\r\n      \r\n      <!-----------------row3-------------------->\r\n      \r\n<div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-caseOrigin\" data-graph-type=\"column\">\r\n\r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">County</th>\r\n                                  <th bgcolor=\"#4189dd\">Male</th>\r\n                                  <th bgcolor=\"#4189dd\">Female</th>\r\n                                </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>\r\n                              \r\n                                <tr>   \r\n                  ";
$query = $db->query("select name, \r\n\t\t\t\t\tsum(pwds_male + lgbtq_male +age_0_to_17_male+age_18_to_24_male+age_25_to_49_male+age_50_plus_male) as tot_male, \r\n\t\t\t\t\tsum(pwds_female + lgbtq_female + age_0_to_17_female + age_18_to_24_female + age_25_to_49_female + age_50_plus_female) as tot_female \r\n\t\t\t\t\t\r\n\t\t\t\t\tfrom project_beneficiaries_report left join mas_county on mas_county.id = project_beneficiaries_report.county group by county");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                  <tr>\r\n                    <td>";
    echo $row["name"];
    echo "</td>\r\n                   <td>";
    echo $row["tot_male"];
    echo "</td>\r\n                   <td>";
    echo $row["tot_female"];
    echo "</td>\r\n                  </tr>\r\n                  ";
}
echo "                                   \r\n                                   \r\n                                </tr>\r\n\r\n                            \r\n\r\n\r\n                              \r\n                                \r\n                                \r\n\r\n                              </tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-caseOrigin\"></div>\r\n                </div>\r\n              </div>      \r\n      \r\n      \r\n      <!-----------------row3-------------------->\r\n      \r\n      \r\n      \r\n    </div>\r\n  </div>\r\n</div>\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n      <!-----------------------------------------------------------------------Start Row ---------------------------------------------------> \r\n      </div>\r\n    </div>    \r\n    \r\n    \r\n    \r\n\r\n\r\n<!--END-->\r\n  </div>\r\n</main>\r\n";

?>