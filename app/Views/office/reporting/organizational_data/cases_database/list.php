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
echo "/public/css/notifications/sweetalert2/sweetalert2.bundle.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-1\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2> ";
echo $title;
echo " </h2>\r\n          <div class=\"panel-toolbar\"> <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database/add";
echo "\" class=\"btn btn-primary btn-sm waves-effect waves-themed\"><i class=\"fal fa-plus\"></i> Add</a> &nbsp;&nbsp;\r\n            </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\"> \r\n        \r\n            <!-- datatable start -->\r\n            <table id=\"dt-basic-example\" class=\"table table-bordered table-striped w-100\">\r\n              <thead class=\"bg-primary-600\">\r\n              \r\n                <tr>\r\n                  <th>Date of Case Reg. </th>\r\n                  <th>Case Type </th>\r\n                  <th>Case Number</th>\r\n                  <th>Field Office</th>\r\n                  <th>Age of Survivor</th>\r\n                  <th>Case Status </th>\r\n\t\t\t\t  <th>Action</th>\r\n                </tr>\r\n              </thead>\r\n              \r\n              <tbody>\r\n\t\t\t  ";
if ($data) {
    echo "          ";
    foreach ($data as $record) {
        echo "                <tr>\r\n                 \r\n\t\t\t\t\t<td>";
        echo $newDate = date("d/m/Y", strtotime($record["date"]));
        echo " </td>\r\n                    <td>";
        echo $record["case_type"];
        echo "</td>\r\n                    <td>";
        echo $record["case_number"];
        echo "</td>\r\n                    <td>\r\n\t\t\t\t\t";
        $ip = get_by_id("id", $record["field_office"], "field_office");
        echo $ip["name"];
        echo "                    </td>\r\n                    <td>";
        echo $record["age_survivor"];
        echo "</td>\r\n                    <td>";
        echo $record["case_status"];
        echo "</td>\r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t\t\r\n                  \r\n                  \r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t   <td>\r\n                   <div class=\"d-flex demo\"> \r\n \t\t\t\t    <a href=\"#\"  onClick=\"javascript:del_rec_1('";
        echo base_url("reporting/organizational_data/cases_database/delete/" . $record["id"]);
        echo "')\" class=\"btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1\" title=\"Delete Record\"><i class=\"fal fa-times\"></i></a> \r\n                                                        <a  href=\"#\" onClick=\"javascript:edit1('";
        echo base_url("reporting/organizational_data/cases_database/edit/" . $record["id"]);
        echo "')\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"Edit\"><i class=\"fal fa-edit\"></i></a>\t\r\n\t\t\t\t   \r\n                   <a href=\"";
        echo base_url() . "/reporting/organizational_data/cases_database/view/" . $record["id"];
        echo "\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"View Details\"><i class=\"fal fa-search-plus\"></i></a>                   </div>                   </td>\r\n                </tr>\r\n                \r\n              \r\n                \r\n                \r\n                \r\n                 ";
    }
    echo "         ";
}
echo "              </tbody>\r\n            </table>\r\n            <!-- datatable end --> \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</main>\r\n";

?>