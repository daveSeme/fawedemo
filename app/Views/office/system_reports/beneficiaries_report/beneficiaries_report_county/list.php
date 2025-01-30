<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
$session = Config\Services::session();
echo "\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n                <ol class=\"breadcrumb page-breadcrumb\">\r\n                    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n                     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n                    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n                </ol>\r\n\t\t";
if ($year == "") {
    echo "\t\r\n\t\t\t\t\r\n\t\t\t\t<div class=\"row\">\r\n  <div class=\"col-xl-6\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
    echo $title;
    echo "</i></span></h2>\r\n\t\t\r\n      </div>\r\n      <div class=\"panel-container show\">\r\n        <div class=\"panel-content\">\r\n           \t\t";
    $session = Config\Services::session();
    if ($session->getFlashdata("feedback")) {
        echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
        echo $session->getFlashdata("feedback");
        echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
    }
    echo "\t\t    ";
    $validation = Config\Services::validation();
    if ($validation->getErrors()) {
        echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
        echo $validation->listErrors();
        echo "</div>";
    }
    echo "              ";
    if (!empty($errors)) {
        echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
        echo $errors;
        echo "</div>";
    }
    echo "               <form class=\"needs-validation\" method=\"post\" action=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county";
    echo "\" validate>\r\n                <div class=\"panel-content\">\r\n                \r\n                       \r\n                       \r\n                        <div class=\"form-group\">\r\n                          <label class=\"form-label \" for=\"single-default\">Project</label>\r\n                            <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                              <option value=\"\">Select Project</option>\r\n                               ";
    $db = Config\Database::connect();
    $query = $db->query("select  * from project where base_id = \"" . $base_id . "\" order by name");
    $results = $query->getResultArray();
    foreach ($results as $row) {
        echo "                                    <option value=\"";
        echo $row["id"];
        echo "\" ";
        if (set_value("project") == $row["id"]) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo $row["name"];
        echo "</option>\r\n                                    ";
    }
    echo "                            </select>\r\n                        </div>\r\n\t\t\t\t\t\t\r\n                        \r\n                       <div class=\"form-group\">\r\n                            <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                            <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                              <option value=\"\">Select Year</option>\r\n                                \r\n                            </select>\r\n                          </div>\r\n                       \r\n                          \r\n                          \r\n                        <div class=\"form-group\">\r\n                          <label class=\"form-label \" for=\"single-default\">County</label>\r\n                            <select class=\"custom-select cls_type\" name=\"county\" id=\"county\" required=\"\">\r\n                              <option value=\"\">Select County</option>\r\n                               ";
    $db = Config\Database::connect();
    $query = $db->query("select  * from mas_county order by name");
    $results = $query->getResultArray();
    foreach ($results as $row) {
        echo "                                    <option value=\"";
        echo $row["id"];
        echo "\">";
        echo $row["name"];
        echo "</option>\r\n                                    ";
    }
    echo "                            </select>\r\n                        </div>\r\n\r\n\r\n\t\t\t\t\t\r\n                <div class=\"panel-content border-faded border-0\">\r\n                  <div class=\"col-lg-offset-5 col-lg-7\">\r\n                    <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Generate</button>\r\n                     </div>\r\n                </div>\r\n              </form>\r\n\r\n        </div>\r\n        \r\n        \r\n        \r\n        \r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n               \r\n                   \r\n\t\r\n\t\t\t\t\t\t\r\n\t\t\r\n\t\t";
}
if ($year != "") {
    echo "                   <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
    echo $title;
    echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county/download_excel/" . $project . "/" . $year . "/" . $county;
    echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county/download_word/" . $project . "/" . $year . "/" . $county;
    echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county/download_pdf/" . $project . "/" . $year . "/" . $county;
    echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county/print_page/" . $project . "/" . $year . "/" . $county;
    echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t \r\n            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                \r\n \r\n\t\t\t\t  <!-- datatable start -->\r\n\t\t\t\t  ";
    include "report.php";
    echo "                                    \r\n                                    <!-- datatable end -->\r\n                \r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n           \r\n\t\t\t\t   <a href=\"";
    echo base_url() . "/system_reports/beneficiaries_report_county";
    echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a>\r\n\t\t\t\r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t  </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  ";
}
echo "            </main>";

?>