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
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div id=\"panel-5\" class=\"panel\">\r\n<ul class=\"nav nav-tabs \" role=\"tablist\">\r\n  ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard");
// echo "\" ><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/project_overview");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/county_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> County</a> </li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/thematic_area_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link active\" href=\"#\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n    \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/beneficiaries");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/budget_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n</ul>\r\n    \r\n    \r\n    \r\n     \r\n<div class=\"tab-content border border-top-0 p-3\">\r\n  <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n    <div class=\"row\"> \r\n      \r\n      <!-------Start Row ---->\r\n      <div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n        \r\n          <div class=\"row\" style=\"padding-bottom:50px;\">\r\n          \r\n          \r\n             <div class=\"col-sm-2\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6><center>No. of Cases<br> New</center></h6>\r\n                <div id=\"number-box5\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("select count(*) as total FROM cases_database WHERE case_status=\"New\" ");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                     </div>\r\n              </div>\r\n            </div>\r\n\r\n\r\n            <div class=\"col-sm-2\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6>\r\n                  <center>No. of Cases <br> Ongoing</center>\r\n                </h6>\r\n                <div id=\"number-box2\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("select count(*) as total FROM cases_database WHERE case_status=\"Ongoing\" ");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                    </div>\r\n              </div>\r\n            </div>\r\n\r\n\r\n\r\n            <div class=\"col-sm-2\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6><center>No. of Cases <br> Stood Over Generally</center></h6>\r\n                <div id=\"number-box1\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("select count(*) as total FROM cases_database WHERE case_status=\"Stood Over Generally\" ");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                     </div>\r\n              </div>\r\n            </div>\r\n            \r\n            \r\n            \r\n            \r\n            <div class=\"col-sm-2\" style=\"padding-left:0\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6><center>No. of Cases<br> Closed</center></h6>\r\n                <center>\r\n                  <div id=\"number-box3\" class=\"dc-chart\"><span class=\"number-display\">\r\n                    ";
$query = $db->query("select count(*) as total FROM cases_database WHERE case_status=\"Closed\"");
$row = $query->getRowArray();
echo $row["total"];
echo "                    </span>\r\n                    </div>\r\n                </center>\r\n              </div>\r\n            </div>\r\n            \r\n            \r\n            \r\n           \t<br>\r\n            \r\n          </div>\r\n          <!-------Row Ends here ----> \r\n          \r\n          \r\n<div class=\"row\"> \r\n          \r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary Case Categories</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-caseOrigin\" data-graph-type=\"pie\">\r\n\t\t\t\t\t\t\t \r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">Case Category</th>\r\n                                  <th bgcolor=\"#4189dd\">No. of Cases</th>\r\n                                </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>\r\n                              \r\n";
$query = $db->query("select count(*) as total, cases_map_case_category.case_category from cases_database left join cases_map_case_category on cases_map_case_category.workflow_id = cases_database.id Group By cases_map_case_category.case_category");
$rows = $query->getResultArray();
for($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];
    $total = $row["total"];
    $label = $row["case_category"];

    if($label == "C001") {
        $label = "Waste Management";
    }
    if($label == "C002") {
        $label = "Water Pollution";
    }
    if($label == "C003") {
        $label = "Air Pollution";
    }
    if($label == "C004") {
        $label = "Noise Pollution";
    }
    if($label == "C005") {
        $label = "Soil Degradation";
    }

    echo "<tr><td>". $label ."</td><td> ". $total ."</td></tr>";
}

echo " </tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <h3 align=\"center\"> Summary Cases Categories</h3>\r\n                  <div class=\"highchart-caseOrigin\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>          \r\n          \r\n          \r\n          \r\n          \r\n        </div>\r\n      </div>\r\n      \r\n      \r\n      \r\n    </div>\r\n  </div>\r\n</div>    \r\n<!--KPI Achieved Targer-->    \r\n<div class=\"tab-content border border-top-0 p-3\">\r\n      <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n      \r\n      \r\n          <!-------Start Row 2----> \r\n          \r\n        <div class=\"row\"> \r\n          \r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of Cases Reported</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-container2\" data-graph-type=\"line\">\r\n\r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">Case Type</th>\r\n                                  <th bgcolor=\"#4189dd\">Total</th>\r\n                                </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>\r\n";
$query = $db->query("select count(*) as total, case_type from cases_database Group By case_type");
$rows = $query->getResultArray();
foreach ($rows as $row) {
    echo "<tr>\r\n<td>". $row["case_type"] ."</td>\r\n<td>". $row["total"] ."</td></tr>";
}
echo "</tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-container2\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>\r\n";
echo "<!-------Start Row 4----> \r\n\t\t   \r\n        <div class=\"row\"> \r\n          \r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of Case Context</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-container4\" data-graph-type=\"column\">\r\n\r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">Case Context</th>\r\n                                  <th bgcolor=\"#4189dd\">Total</th>                             </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>";
$query = $db->query("select count(*) as total, cases_map_case_context.case_context from cases_database left join cases_map_case_context on cases_map_case_context.workflow_id = cases_database.id group by cases_map_case_context.case_context");
$rows = $query->getResultArray();
for($i = 0; $i < count($rows); $i++) {
    $row = $rows[$i];
    $total = $row["total"];
    $label = $row["case_context"];

    if($label == "CT001") {
        $label = "Improper disposal of diapers";
    }
    if($label == "CT002") {
        $label = "Littering in public spaces";
    }
    if($label == "CT003") {
        $label = "Discharging untreated sewage into rivers";
    }
    if($label == "CT004") {
        $label = "Dumping plastics in lakes";
    }
    if($label == "CT005") {
        $label = "Burning of waste in open spaces";
    }
    if($label == "CT006") {
        $label = "Excessive vehicle emissions";
    }
    if($label == "CT007") {
        $label = "Loud music from nightclubs in residential areas";
    }
    if($label == "CT008") {
        $label = "Construction noise during prohibited hours";
    }
    if($label == "CT009") {
        $label = "Sand harvesting";
    }
    if($label == "CT010") {
        $label = "Illegal mining activities";
    }
    if($label == "CT011") {
        $label = "Deforestation";
    }

    echo "<tr><td>". $label ."</td><td> ". $total ."</td></tr>";
}
echo "</tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-container4\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>\r\n        \r\n        \r\n\r\n        \r\n          <!-------Start Row 4----> \r\n\t\t   \r\n        <div class=\"row\"> \r\n          \r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of Case Origin</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-caseOrigin\" data-graph-type=\"column\">\r\n\r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">County</th>\r\n              <th bgcolor=\"#4189dd\">Total</th>\r\n                                </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>";
$query = $db->query("select count(*) as total, mas_county.name as county_name from cases_database left join mas_county on mas_county.id = cases_database.county group by county");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "<tr><td>". $row["county_name"] ."</td><td>". $row["total"] ."</td></tr>";
}
echo "</tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                  <div class=\"highchart-caseOrigin\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>\r\n        \r\n        \r\n          <!-------Start Row 6----> \r\n\t\t   \r\n        \r\n<div class=\"row\"> \r\n          \r\n          <div class=\"col-lg-12\">\r\n            <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n              \r\n              <div class=\"panel-hdr\">\r\n                <h2> Summary of Services Provide</h2>\r\n              </div>\r\n              \r\n               <div class=\"row\"> \r\n                <div class=\"col-lg-6\">\r\n                  <table class=\"highchart table table-hover table-bordered\" data-graph-container=\".. .. .highchart-sp\" data-graph-type=\"pie\">\r\n\t\t\t\t\t\t\t \r\n                              <thead>\r\n                                <tr>\r\n                                  <th bgcolor=\"#4189dd\">Services Provide</th>\r\n                                  <th bgcolor=\"#4189dd\">No. of Cases</th>\r\n                                </tr>\r\n                              </thead>\r\n\r\n                              \r\n                              <tbody>";
$query = $db->query("select count(*) as total, cases_map_services_provided.services_provided from cases_database left join cases_map_services_provided on cases_map_services_provided.workflow_id = cases_database.id group by cases_map_services_provided.services_provided");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "<tr><td>". $row["services_provided"] ."</td><td>". $row["total"] ."</td></tr>";
}
echo "</tbody>\r\n                            </table>\r\n                </div>\r\n                \r\n                \r\n                <div class=\"col-lg-6\">\r\n                   <h3 align=\"center\"> Summary of Services Provide</h3>\r\n                  <div class=\"highchart-sp\"></div>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n            </div>\r\n          </div>\r\n          \r\n        </div>        \r\n        \r\n          <!-------Start Row ----> \r\n\r\n\r\n\r\n      </div>\r\n    </div>    \r\n    \r\n<!--KPI ON Track-->   \r\n\r\n    \r\n    \r\n\r\n\r\n<!--KPI Under Performing-->\r\n\r\n    \r\n    \r\n\r\n\r\n<!--END-->\r\n  </div>\r\n</main>\r\n";

?>