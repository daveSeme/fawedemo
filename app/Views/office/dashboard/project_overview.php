<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
echo "<style>\r\n/*everything below this line is custom */\r\n       \r\n\r\n#MapLocation {\r\n\theight: 80px;\r\n\twidth: 766px\r\n}\r\n#map {\r\n\theight: 500px;\r\n}\r\n#map.fullscreen {\r\n\ttop: 0 !important;\r\n\tleft: 0 !important;\r\n\tposition: fixed !important;\r\n\twidth: 100% !important;\r\n\theight: 100% !important;\r\n\tz-index: 1000;\r\n}\r\n#map_tuts {\r\n\twidth: 100%;\r\n\theight: 100%;\r\n}\r\n#map_wrapper_div {\r\n\theight: 400px;\r\n}\r\n</style>\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">";
echo $main_title;
echo "</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<div id=\"panel-5\" class=\"panel\">\r\n\r\n<ul class=\"nav nav-tabs \" role=\"tablist\">\r\n  ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard");
echo "\" ><i class=\"fal fa-chart-bar mr-1\"></i> Overall Performance</a> </li>\r\n ";  
echo "<li class=\"nav-item\"> <a class=\"nav-link active\" href=\"#tab_borders_icons-3\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Projects</a> </li>\r\n  ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/county_performance");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> County</a> </li>\r\n  ";
echo "<li class=\"nav-item\"> <a class=\"nav-link \" href=\"";
echo site_url("dashboard/components_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Components</a> </li>\r\n    ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/thematic_area_performance");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Thematic Area</a> </li>\r\n ";
echo" <li class=\"nav-item\"> <a class=\"nav-link  \" href=\"";
echo site_url("dashboard/ip_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i> Implementing Partner</a> </li>\r\n  ";
// echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/cases_performance");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Cases Database</a></li>\r\n  \r\n    <li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
// echo site_url("dashboard/beneficiaries");
// echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Beneficiaries</a></li>\r\n    ";
echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"";
echo site_url("dashboard/budget_performance");
echo "\" role=\"tab\"><i class=\"fal fa-chart-bar mr-1\"></i>Budget Performance</a></li>\r\n  \r\n</ul>\r\n\r\n\r\n<div class=\"tab-content border border-top-0 p-3\">\r\n  <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n    <div class=\"row\"> \r\n      \r\n      <!-------Start Row ---->\r\n      <div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n        \r\n          <div class=\"row\" style=\"padding-bottom:30px;\">\r\n          \r\n          \r\n            <div class=\"col-sm-3\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6>\r\n                  <center>No. of Projects Pipeline</center>\r\n                </h6>\r\n                <div id=\"number-box1\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("SELECT count(*) as total FROM project WHERE project_status=\"Pipeline\"");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                    </div>\r\n              </div>\r\n            </div>\r\n\r\n\r\n\r\n            <div class=\"col-sm-3\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6><center>No. of Projects On-going</center></h6>\r\n                <div id=\"number-box2\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("SELECT count(*) as total FROM project WHERE project_status=\"Ongoing\"");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                   </div>\r\n              </div>\r\n            </div>\r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            \r\n            <div class=\"col-sm-3\">\r\n              <div class=\"col-sm-12 well\"> <br>\r\n                <h6><center>No. of Projects Completed</center></h6>\r\n                <div id=\"number-box3\" class=\"dc-chart\"><span class=\"number-display\">\r\n                  ";
$query = $db->query("SELECT count(*) as total FROM project WHERE project_status=\"Completed\"");
$row = $query->getRowArray();
echo $row["total"];
echo "                  </span>\r\n                     </div>\r\n              </div>\r\n            </div>\r\n            \r\n         \r\n            \r\n          </div>\r\n          <!-------Row Ends here ----> \r\n          \r\n          \r\n        </div>\r\n      </div>\r\n      \r\n      \r\n      \r\n    </div>\r\n  </div>\r\n<!-------box 1  Ends here ----> \r\n\r\n  <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n    <div class=\"row\"> \r\n\r\n\r\n      <div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n\r\n      <!-------col 2 starts ----> \r\n        <div class=\"col-sm-12\">\r\n            <h4><center>County Geographic</center></h4>\r\n            <div id=\"map\" style=\"width: 100%; height:580px;\"></div>\r\n        </div>\r\n\r\n     <!-------col 2 starts ---->  \r\n\r\n    </div>\r\n    </div>\r\n    \r\n    </div>\r\n  </div>\r\n\r\n<!--KPI Achieved Targer-->\r\n  <div class=\"tab-pane fade show active\" id=\"tab_borders_icons-1\" role=\"tabpanel\">\r\n    <div class=\"row\"> \r\n      \r\n      <!-------Start Row ---->\r\n      <div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n          <div class=\"panel-hdr\">\r\n            <h2> Summary of Project by Budget</h2>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-lg-6\">\r\n              <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                <thead>\r\n                  <tr>\r\n                    <th bgcolor=\"#ed7d31\">Project</th>\r\n                    <th bgcolor=\"#ed7d31\">Budget</th>\r\n                  </tr>\r\n                </thead>\r\n                <tbody>\r\n                  ";
$query = $db->query("SELECT name, project_budget FROM project");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                  <tr>\r\n                    <td>";
    echo $row["name"];
    echo "</td>\r\n                    <td data-graph-name=\"";
    echo $row["project_budget"];
    echo "\">";
    echo $row["project_budget"];
    echo "</td>\r\n                  </tr>\r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n              <div class=\"highchart-kpi-achieved\"></div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n      <!-------Start Row ---->\r\n      \r\n      <div class=\"col-lg-12\">\r\n        <div id=\"panel-1\" class=\"panel\" data-panel-fullscreen=\"false\">\r\n          <div class=\"panel-hdr\">\r\n            <h2> Summary of Project by Thematic Area</h2>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-lg-6\">\r\n              <table class=\"highchart table table-bordered\" data-graph-container=\".. .. .highchart-kpi-achieved\"  data-graph-type=\"column\"  data-graph-datalabels-enabled=\"1\">\r\n                <thead>\r\n                  <tr>\r\n                    <th bgcolor=\"#ed7d31\">Thematic Areas</th>\r\n                    <th bgcolor=\"#ed7d31\">Number of Projects</th>\r\n                  </tr>\r\n                </thead>\r\n                <tbody>\r\n                  ";
$query = $db->query("select org_thematic_area.name,total_project from org_thematic_area left join  project_map_thematic_area  on  project_map_thematic_area.thematic_area_id = org_thematic_area.id \r\n\r\nleft join\r\n\r\n(select count(*) as total_project,id from project ) as tbl_project on tbl_project.id = project_map_thematic_area.project_id");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "                  <tr>\r\n                    <td>";
    echo $row["name"];
    echo "</td>\r\n                    <td data-graph-name=\"";
    echo $row["total_project"];
    echo "\">";
    echo $row["total_project"];
    echo "</td>\r\n                  </tr>\r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n              <div class=\"highchart-kpi-achieved\"></div>\r\n            </div>\r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n    \r\n    \r\n    \r\n\r\n\r\n";
$query = $db->query("\r\n\tselect\r\n\tmas_county.name as county_name,\r\n\tproject.project_budget as tot_project_budget\r\n\r\n\tfrom mas_county left join project_map_county on mas_county.id = project_map_county.county_id \r\n\t\r\n\tleft join  project on project.id = project_map_county.project_id \r\n\t\r\n\t\r\n\t group by county_name; ");
$results = $query->getResult();
$county_data = [];
foreach ($results as $row_fis_fin3) {
    $county_data[$row_fis_fin3->county_name] = $row_fis_fin3->tot_project_budget;
}
$green_color_code = ["#6B8E23", "#556B2F", "#808000", "#2E8B57", "#20B2AA", "#3CB371", "#8FBC8F", "#98FB98", "#90EE90", "#00FA9A", "#00FF7F", "#9ACD32", "#ADFF2F", "#006400", "#008000", "#228B22", "#00FF00", "#32CD32", "#7FFF00", "#7CFC00"];
echo "      \r\n  <!--Map code starts-->          \r\n<script async defer\r\n        src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAtzs8v7u5EzSTY0x10MwGRx9weXfkJ0hs&callback=initMap\">\r\n</script>\r\n\r\n<script type=\"text/javascript\">\r\n    var map;\r\n    function initMap() {\r\n\r\n        // MAP1 START\r\n    map = new google.maps.Map(document.getElementById('map'), {\r\n\t\t\r\n    zoom: 6,\r\n\t//mapTypeId: 'satellite',\r\n\t\r\n\tcenter: {lat:  1.286389, lng: 36.817223}\r\n\t\r\n    });\r\n    // NOTE: This uses cross-domain XHR, and may not work on older browsers.\r\n    map.data.loadGeoJson(\r\n            //Replace with url of GeoJSON on your server\r\n            '";
echo base_url();
echo "/public/kenyan-counties.json');\r\n    map.data.setStyle(function(feature) {\r\n    var SD_NAME = feature.getProperty('COUNTY');\r\n    var color = \"\";\r\n\r\n\r\n";
$color = "0";
foreach ($county_data as $c_name => $county_d) {
    echo "        if (SD_NAME == \"";
    echo $c_name;
    echo "\") {\r\n        color = \"";
    echo $green_color_code[$color];
    echo "\";\r\n        } else {\r\n\r\n        }\r\n\r\n    ";
    if ($color < 19) {
        $color++;
    }
}
echo "\r\n        return {\r\n    fillColor: color,\r\n            strokeOpacity: 1,\r\n            strokeWeight: 2,\r\n            fillOpacity: 1\r\n    }\r\n    });\r\n    /*   map.data.setStyle({\r\n\r\n     fillColor: 'red',\r\n     strokeWeight: 1\r\n     }); */\r\n    var infowindow = new google.maps.InfoWindow();\r\n    var county_data = new Array();\r\n";
$color = "0";
foreach ($county_data as $c_name => $county_d) {
    echo "        county_data[\"";
    echo $c_name;
    echo "\"] = \"";
    echo $county_d;
    echo "\";\r\n";
}
echo "    // console.log(county_data);\r\n    map.data.addListener('click', function(event) {\r\n    let state = event.feature.getProperty(\"COUNTY\");\r\n    // if (typeof county_data[state] === \"undefined\") {\r\n    //     let html = state +\" : \"+ \"0\";\r\n    // } else {\r\n    let html = \"<div>County : \" + state + \" </div> \"\r\n            //  console.log(state);\r\n            //  if(county_data[state])\r\n            if (typeof county_data[state] !== 'undefined') {\r\n    nfObject = new Intl.NumberFormat('en-US');\r\n    output = nfObject.format(county_data[state]);\r\n    html += \"Budget(\$) : \" + output;\r\n    } else {\r\n    html += \"Budget(\$) : 0\";\r\n    }\r\n    // }\r\n    infowindow.setContent(html); // show the html variable in the infowindow\r\n    infowindow.setPosition(event.latLng); // anchor the infowindow at the marker\r\n    infowindow.setOptions({pixelOffset: new google.maps.Size(0, - 30)}); // move the infowindow up slightly to the top of the marker icon\r\n    infowindow.open(map);\r\n    });\r\n\r\n// MAP1 END MAP2 START\r\n\r\n    \r\n// MAP2 END MAP3 START\r\n\r\n\r\n  \r\n    // console.log(county_data);\r\n\r\n    }\r\n\r\n</script>            \r\n            \r\n            \r\n <!--Map Code Ends-->       \r\n    \r\n    \r\n    \r\n    \r\n  </div>\r\n  \r\n  <!--KPI ON Track--> \r\n  \r\n  <!--KPI Under Performing--> \r\n  \r\n  <!--END--> \r\n</div>\r\n</main>\r\n";

?>