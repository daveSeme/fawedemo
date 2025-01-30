<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<script src=\"";
echo base_url();
echo "/public/js/menu/division_project.js\"></script>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/notifications/sweetalert2/sweetalert2.bundle.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n                <ol class=\"breadcrumb page-breadcrumb\">\r\n                    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n                     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n                    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n                </ol>\r\n\r\n                <div class=\"row\">\r\n                    <div class=\"col-xl-12\">\r\n                        <div id=\"panel-1\" class=\"panel\">\r\n                            <div class=\"panel-hdr\">\r\n                                <h2>\r\n                                   ";
echo $title;
echo "                                </h2>\r\n                                <div class=\"panel-toolbar\">\r\n                                   \r\n\r\n                                </div>\r\n                            </div>\r\n                            <div class=\"panel-container show\">\r\n                                <div class=\"panel-content\">\r\n \r\n                                    <!-- datatable start -->\r\n\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t<strong><center>District Name :  \t";
$dist = get_by_id("id", $district_id, "mas_district");
echo $dist["name"];
echo "</center></strong></br>\r\n\t\t\t\t\t\t\t\t\t\r\n                                    <table id=\"dt-basic-example\" class=\"table table-bordered table-striped w-100\">\r\n                                      <thead class=\"bg-primary-600\">\r\n                                        <tr>\r\n                                          <th>Program/Project </th>\r\n                                          <th>Category</th>\r\n                                          <th>Type</th>\r\n                                          <th>Sector</th>\r\n                                          <th>Lead MDA </th>\r\n                                          <th>Implementing Partner</th>\r\n                                          <th>Project Status </th>\r\n                                        </tr>\r\n                                      </thead>\r\n                                      <tbody>\r\n\t\t\t\t\t\t\t\t\t  ";
$db = Config\Database::connect();
$query = $db->query("SELECT * from `project` left join project_map_district on project_map_district.project_id=project.id where district_id=\"" . $district_id . "\"");
$results = $query->getResultArray();
echo "                                        \r\n                                        ";
foreach ($results as $record) {
    echo "                                        <tr>\r\n                                          <td>";
    echo $record["name"];
    echo "</td>\r\n                                          <td>";
    echo $record["project_category"];
    echo "</td>\r\n                                          <td>";
    echo $record["type"];
    echo "</td>\r\n                                          <td>";
    $sector = get_by_id("id", $record["sector"], "mas_sector");
    echo $sector["sector"];
    echo "</td>\r\n                                          <td>";
    $lead_mda = get_by_id("id", $record["lead_mda"], "mas_structure");
    echo $lead_mda["name"];
    echo "</td>\r\n                                          <td>";
    $ip = get_by_id("id", $record["implementing_partner"], "implementing_partner");
    echo $ip["name"];
    echo "</td>\r\n                                          <td>";
    echo $record["project_status"];
    echo "</td>\r\n                                        </tr>\r\n                                        ";
}
echo "                                      </tbody>\r\n                                    </table>\r\n                                    <!-- datatable end -->\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </main>";

?>