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
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t \r\n            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t <table  class=\"table table-bordered m-0\">\r\n\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t  <td  class=\"form-label\">Category </td>\r\n\t\t\t\t\t  <td class=\"form-label\">";
echo $stdata["project_category"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Type</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $stdata["type"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Sector</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query_reg = $db->query("SELECT sector FROM mas_sector where id=\"" . $stdata["sector"] . "\" ");
$sector_listar = $query_reg->getResultArray();
foreach ($sector_listar as $row) {
    echo $row["sector"];
    echo "<br>";
}
echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t <tr ";
if ($stdata["type"] == "Program" || $stdata["type"] == "Project") {
    echo " style=\"display:none;\" ";
} else {
    if ($stdata["type"] == "Sub-Project") {
        echo " style=\"display:table-row;\" ";
    }
}
echo " >\r\n\t\t\t\t\t\t<td  class=\"form-label\">Project Name</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">\r\n\t\t\t\t\t\t  ";
$project = get_by_id("id", $stdata["project"], "project");
echo $project["name"];
echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr ";
if ($stdata["type"] == "Program" || $stdata["type"] == "Sub-Project") {
    echo " style=\"display:none;\" ";
} else {
    if ($stdata["type"] == "Project") {
        echo " style=\"display:table-row;\" ";
    }
}
echo ">\r\n\t\t\t\t\t\t<td class=\"form-label\">Program Name</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">\r\n\t\t\t\t\t\t  ";
$program = get_by_id("id", $stdata["program"], "project");
echo $program["name"];
echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\"> ";
if ($stdata["type"] == "Program") {
    echo " Program Name ";
} else {
    if ($stdata["type"] == "Project") {
        echo " Project Name ";
    } else {
        if ($stdata["type"] == "Sub-Project") {
            echo " Sub Project Name ";
        }
    }
}
echo " </td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $stdata["name"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Start Date</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $StartDate = date("d/m/Y", strtotime($stdata["start_date"]));
echo " </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">End Date</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $Ensdate = date("d/m/Y", strtotime($stdata["end_date"]));
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t \r\n\t\t\t\t\t \r\n\t\t\t\t   \r\n\t\t\t\t   <tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">Region</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
$db = Config\Database::connect();
$query_reg = $db->query("SELECT region FROM project_map_region left join mas_region on project_map_region.region_id=mas_region.id where project_id=\"" . $pid . "\" ");
$region_listar = $query_reg->getResultArray();
foreach ($region_listar as $row) {
    echo $row["region"];
    echo ",<br>";
}
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">District</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
$db = Config\Database::connect();
$query_reg = $db->query("SELECT name FROM project_map_district left join mas_district on project_map_district.district_id=mas_district.id where project_id=\"" . $pid . "\" ");
$region_listar = $query_reg->getResultArray();
foreach ($region_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">Budget</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $stdata["budget"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">Lead MDA</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">\r\n\t\t\t\t\t\t    ";
$db = Config\Database::connect();
$query = $db->query("SELECT name FROM mas_structure WHERE id = '" . $stdata["lead_mda"] . "'");
$row = $query->getRow();
echo $row->name;
echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t\t<td class=\"form-label\">Coordinator</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">\r\n\t\t\t\t\t\t       ";
$db = Config\Database::connect();
$query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $stdata["coordinator"] . "'");
$row = $query->getRow();
echo $row->name;
echo "\t\t\t\t\t\t</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Project Status</td>\r\n\t\t\t\t\t\t<td class=\"form-label\">";
echo $stdata["project_status"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</table>\r\n                 \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <a href=\"";
echo base_url() . "/master/implementing_partner";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>