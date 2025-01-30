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
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  \r\n\t\t  ";
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
echo "          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n         \r\n                                                ";
$insert_url = "master/implementing_partner/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "              <div class=\"panel-content\">\r\n                <div class=\"form-row\">";
echo "<!-- Form Starts here  --> \r\n                <input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\"><div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"sector\">Partner Name<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Please enter the partner name\" value=\"";
echo $stdata["name"];
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Partner Name  </div>\r\n                  </div>";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"sector\">Organization Name<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"organization_name\" class=\"form-control\" id=\"organization_name\" placeholder=\"Please enter the organization name\" value=\"";
echo $stdata["organization_name"];
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Organization Name  </div>\r\n                  </div>";      
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"sector\">Contact Person<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"contact_person\" class=\"form-control\" id=\"contact_person\" placeholder=\"Please enter the contact person\" value=\"";
echo $stdata["contact_person"];
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Contact Person  </div>\r\n                  </div>"; 
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"sector\">Contact Email<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"contact_email\" class=\"form-control\" id=\"contact_email\" placeholder=\"Please enter the contact email\" value=\"";
echo $stdata["contact_email"];
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Contact Email  </div>\r\n                  </div>";              
echo "<!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                   <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/master/implementing_partner";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\ns";

?>