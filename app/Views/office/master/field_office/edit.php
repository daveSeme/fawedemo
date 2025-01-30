<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n<style>\r\n    /*everything below this line is custom */\r\n       \r\n    #field-MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style>\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  ";
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
echo "            \r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n             ";
$insert_url = "master/field_office/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t \r\n                  <input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t   \r\n               \r\n                  \r\n                \r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t    <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\">Field Office Name <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Please enter the Field Office name\" required value=\"";
echo $stdata["name"];
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter the Field Office name. </div>\r\n                  </div>\r\n                  \r\n                  \r\n             \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"contact_person\"><span id=\"title\">Contact Person</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"contact_person\" class=\"form-control\" id=\"contact_person\" value=\"";
echo $stdata["contact_person"];
echo "\"  placeholder=\"Please enter the Contact Person\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Contact Person.</div>\r\n                  </div>\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"contact_email\"><span id=\"title\">Contact Email</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"email\" name=\"contact_email\" class=\"form-control\" id=\"contact_email\" value=\"";
echo $stdata["contact_email"];
echo "\"  placeholder=\"Please enter the Contact Email\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Contact Email. </div>\r\n                  </div>\r\n                  \r\n                    \r\n                    \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"phone\"><span id=\"title\">Phone No.</label>\r\n                    <input type=\"text\" name=\"phone\" class=\"form-control\" id=\"phone\" value=\"";
echo $stdata["phone"];
echo "\"  placeholder=\"Please enter the Phone No.\">\r\n                    <div class=\"invalid-feedback\"> Please enter the Phone No. </div>\r\n                  </div>\r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n              \r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/master/field_office";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n \r\n";

?>