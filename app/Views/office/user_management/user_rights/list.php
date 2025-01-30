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
echo "                                </h2>\r\n                                <div class=\"panel-toolbar\">\r\n                                     \r\n                                     \r\n\r\n                                </div>\r\n                            </div>\r\n                            <div class=\"panel-container show\">\r\n                                <div class=\"panel-content\">\r\n \r\n                                    <!-- datatable start -->\r\n                                    <table id=\"dt-basic-example\" class=\"table table-bordered table-hover table-striped w-100\">\r\n                                        <thead class=\"bg-primary-600\">\r\n                                            <tr>\r\n                                              <th >Group Title </th>\r\n                                              <th>User Type </th>\r\n                                              <th >Action</th>\r\n                                          </tr>\r\n                                        </thead>\r\n                                        <tbody>\r\n\t\t\t\t\t\t\t\t\t\t";
if ($data) {
    echo "          ";
    foreach ($data as $record) {
        echo "                                            <tr>\r\n                                              <td>";
        echo $record["title"];
        echo "</td>\r\n                                              <td>";
        echo $record["user_type"];
        echo "</td>\r\n                                              <td>\r\n                                                  <div class=\"d-flex demo\"> \r\n                                                       \r\n                                                        \r\n\r\n                                           \r\n                                                  <a  href=\"#\" onClick=\"javascript:edit1('";
        echo base_url("user_management/user_rights/edit/" . $record["id"]);
        echo "')\" class=\"btn   btn-outline-primary \" title=\"Edit\"><i class=\"fal fa-edit\"></i>Assign User Permission</a>                                                    </div>                                                </td>\r\n                                            </tr>\r\n\t\t\t\t\t\t\t\t\t\t\t ";
    }
    echo "         ";
}
echo "                                        </tbody>\r\n                                  </table>\r\n                                    <!-- datatable end -->\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </main>";

?>