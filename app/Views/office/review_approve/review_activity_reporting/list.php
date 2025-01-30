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
echo " </h2>\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\"> \r\n           ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo " \r\n            <!-- datatable start -->\r\n            <table id=\"dt-basic-example\" class=\"table table-bordered table-striped w-100\">\r\n              <thead class=\"bg-primary-600\">\r\n              \r\n                <tr>\r\n                  <th>Project</th>\r\n                  <th>Activity Title </th>\r\n                  <th>Activity Date </th>\r\n                  \r\n                  \r\n                   <th>Report Status </th>\r\n                  \r\n                   <th>Submitted By </th>\r\n                   <th>Submission Date </th>\r\n                   \r\n\t\t\t\t   <th>Action</th>\r\n                </tr>\r\n                \r\n              </thead>\r\n              \r\n              <tbody>\r\n\t\t\t  ";
if ($data) {
    echo "          ";
    foreach ($data as $record) {
        echo "                <tr>\r\n                  \r\n                    <td>\r\n                    ";
        $plan = get_by_id("id", $record["project"], "project");
        echo $plan_name = $plan["name"];
        echo "                    </td>                            \r\n                    <td>";
        echo $record["activity_title"];
        echo " </td>\r\n                    <td>";
        echo $newDate = date("d/m/Y", strtotime($record["activity_date"]));
        echo " </td>\r\n                   \r\n                   \r\n                    <td>\r\n                    <span class=\"badge badge-pill badge-primary\">\r\n\t\t\t\t\t";
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
        echo " \r\n                    </span>\r\n                    </td>\r\n                   \r\n            \r\n                   \r\n                    \r\n                    <td>\r\n\t\t\t\t\t";
        $users_data = get_by_id("id", $record["submitted_by"], "ctbl_users");
        echo $users_data["name"];
        echo "                    </td>\r\n                    <td>";
        echo $newDate = date("d/m/Y", strtotime($record["submitted_date"]));
        echo " </td>\r\n                    \r\n                            \r\n\t\t\t\t\t<td style=\"width:20%;\">\r\n                    <div class=\"d-flex demo\"> \r\n                   \r\n\t\t\t\t\t\t";
        if ($record["report_status"] == "2") {
            echo "                        \r\n                       <a href=\"";
            echo base_url() . "/review_approve/review_activity_reporting/review/" . $record["id"];
            echo "\" class=\"btn btn-primary\" title=\"Review Report\"><i class=\"fal fa-eye\"></i> Review</a>\r\n\r\n                       ";
        }
        echo "                       \r\n                            \r\n                       <a href=\"";
        echo base_url() . "/review_approve/review_activity_reporting/view/" . $record["id"];
        echo "\" class=\"btn btn-success\" title=\"View Details\"><i class=\"fal fa-search-plus\"></i> View</a>\r\n                   \r\n                   </div>\r\n                   </td>\r\n                </tr>\r\n                \r\n                  ";
    }
    echo "         ";
}
echo "                \r\n              </tbody>\r\n            </table>\r\n            <!-- datatable end --> \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</main>\r\n";

?>