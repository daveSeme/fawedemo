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
echo " </h2>\r\n          <div class=\"panel-toolbar\"> \r\n          \r\n          \t<a href=\"";
echo base_url() . "/reporting/project_data/project_quarterly_indicator_tracking_report/add";
echo "\" class=\"btn btn-primary btn-sm waves-effect waves-themed\"><i class=\"fal fa-plus\"></i> Add</a> &nbsp;&nbsp;\r\n           \r\n          </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\"> \r\n           ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo " \r\n            <!-- datatable start -->\r\n            <table id=\"dt-basic-example\" class=\"table table-bordered table-striped w-100\">\r\n              <thead class=\"bg-primary-600\">\r\n              \r\n                <tr>\r\n                 \r\n                  <th>Project </th>\r\n                  <th>Reporting Period </th>\r\n                  <th>Report Name</th>\r\n                  \r\n                   <th>Report Status </th>\r\n                  \r\n                   <th>Created By </th>\r\n                   <th>Created Date </th>\r\n                   \r\n                   <th>Submitted By </th>\r\n                   <th>Submission Date </th>\r\n\r\n\t\t\t\t   <th>Action</th>\r\n                </tr>\r\n                \r\n              </thead>\r\n              \r\n              <tbody>\r\n\t\t\t  ";
if ($data) {
    echo "          ";
    foreach ($data as $record) {
        echo "                <tr>\r\n                  \r\n                    <td>\r\n                    ";
        $plan = get_by_id("id", $record["project"], "project");
        echo $plan_name = $plan["name"];
        echo "                    </td>                            \r\n                    \r\n                    <td>";
        echo $record["year"];
        echo " - ";
        echo $record["quarter"];
        echo "</td>\r\n                    <td>";
        echo $record["report_name"];
        echo "</td>\r\n                    \r\n                    <td>\r\n                    <span class=\"badge badge-pill badge-primary\">\r\n\t\t\t\t\t";
        if ($record["report_status"] == "1") {
            echo "Draft Report";
        }
        if ($record["report_status"] == "2") {
            echo "Under Review";
        }
        if ($record["report_status"] == "3") {
            echo "Returned with Suggested Edits";
        }
        if ($record["report_status"] == "0") {
            echo "Approved";
        }
        echo " \r\n                    </span>\r\n                    </td>\r\n                   \r\n            \r\n                    <td>\r\n\t\t\t\t\t";
        $users_data = get_by_id("id", $record["createdby"], "ctbl_users");
        echo $users_data["name"];
        echo "                    </td>\r\n                    <td>";
        echo $newDate = date("d/m/Y", strtotime($record["createtime"]));
        echo " </td>\r\n                    \r\n                    \r\n                    <td>\r\n\t\t\t\t\t";
        $users_data = get_by_id("id", $record["submitted_by"], "ctbl_users");
        echo $users_data["name"];
        echo "                    </td>\r\n                    <td>";
        if ($record["submitted_date"] != "") {
            echo $newDate = date("d/m/Y", strtotime($record["submitted_date"]));
        }
        echo " </td>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<td>\r\n                   <div class=\"d-flex demo\"> \r\n                 \r\n\t\t\t\t   \r\n                   ";
        if ($record["report_status"] == "1") {
            echo "\t\t\t\t    <a href=\"#\"  onClick=\"javascript:del_rec_1('";
            echo base_url("reporting/project_data/project_quarterly_indicator_tracking_report/delete/" . $record["id"]);
            echo "')\" class=\"btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1\" title=\"Delete Record\"><i class=\"fal fa-times\"></i></a> \r\n                    \r\n                    ";
        }
        echo "                 \r\n                 \r\n\t\t\t\t    ";
        if ($record["report_status"] == "1" || $record["report_status"] == "3") {
            echo "                    <a  href=\"#\" onClick=\"javascript:edit1('";
            echo base_url("reporting/project_data/project_quarterly_indicator_tracking_report/edit/" . $record["id"]);
            echo "')\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"Edit\"><i class=\"fal fa-edit\"></i></a>\t\r\n                     ";
        }
        echo "                     \r\n                   <a href=\"";
        echo base_url() . "/reporting/project_data/project_quarterly_indicator_tracking_report/view/" . $record["id"];
        echo "\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"View Details\"><i class=\"fal fa-search-plus\"></i></a>\r\n                   \r\n                   </div>\r\n                   </td>\r\n                </tr>\r\n                \r\n                  ";
    }
    echo "         ";
}
echo "                \r\n              </tbody>\r\n            </table>\r\n            <!-- datatable end --> \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</main>\r\n";

?>