<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t    \r\n\t\t   ";
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
echo "           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            ";
$insert_url = "reporting/project_data/project_final_report/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t\r\n\t\t\t\t <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select  Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               <option value=\"";
    echo $row["id"];
    echo "\" ";
    if ($stdata["project_name"] == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Report Name <span class=\"text-danger\">*</span></label>\r\n                    <input name=\"report_name\" type=\"text\" class=\"form-control\" id=\"report_name\" value=\"";
echo $stdata["report_name"];
echo "\" placeholder=\"Please enter a Report Name\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter a Report Name. </div>\r\n                  </div>\r\n\r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_file   \">Attach File <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"report_file\" id=\"report_file\" ";
echo $stdata["report_file"] != '' ? "" : "required";
echo ">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Please select a valid file</div>\r\n                    </div>\r\n                  </div>\r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t  ";
if($stdata["report_file"] != '') {
    echo "<div class=\"col-12 mb-3\">\r\n\t\t\t\t   <div class=\"col-6 mb-0\">\r\n                    <label class=\"form-label\" for=\"budget\">Attached File <span class=\"\"></span></label>\r\n\t\t\t\t\t</div>\r\n\t\t\t\t\t<div class=\"col-6 mb-3\">\r\n                    <div class=\"custom-file\">\r\n                        <a href=\"";
    echo base_url() . "/public/uploads/project_final_report/" . $stdata["report_file"];
    echo "\" class=\"btn btn-primary ml-auto waves-effect waves-themed\" ><span class=\"fal fa-check mr-1\"></span> Download</a>\r\n                        </div>\r\n                    </div>\r\n                  </div>\r\n";
}
echo "\r\n                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>