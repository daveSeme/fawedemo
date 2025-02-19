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
$insert_url = "user_management/users/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t\r\n\t\t\t\t\r\n\t\t\t\t\r\n\t\t\t\t<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\">Name [Given Name + Surname]<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Please enter the name\" value=\"";
echo set_value("name");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the name </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"username\">USER ID<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"text\" name=\"username\" class=\"form-control\" id=\"username\" placeholder=\"Please enter the User ID\" value=\"";
echo set_value("username");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the User ID </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t   <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"password\">Password<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"password\" name=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Please enter the Password\" value=\"";
echo set_value("password");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Password </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"password2\">Confirm Password<span class=\"text-danger\">*</span></label>\r\n                   <input type=\"password\" name=\"password2\" class=\"form-control\" id=\"password2\" placeholder=\"Please enter the Confirm Password\" value=\"";
echo set_value("password2");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Confirm Password </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t   <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"email\">Email Address <span class=\"text-danger\">*</span></label>\r\n                   <input type=\"email\" name=\"email\" class=\"form-control\" id=\"email\" placeholder=\"Please enter the Email Address\" value=\"";
echo set_value("email");
echo "\" required>\r\n                    <div class=\"invalid-feedback\"> Please enter the Email Address </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"contact_number\">Contact Number <span class=\"text-danger\">*</span></label>\r\n                   <input type=\"number\" name=\"contact_number\" class=\"form-control\" id=\"contact_number\" placeholder=\"Please enter the Contact Number \" value=\"";
echo set_value("contact_number");
echo "\"  >\r\n                    <div class=\"invalid-feedback\"> Please enter the Contact Number </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t   <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"base_id\">User Type <span class=\"text-danger\">*</span></label>\r\n                   <select name=\"user_type\" id=\"user_type\" class=\"custom-select\" onchange=\"get_inst();\" required>\r\n                      <option value=\"\">Select User Type</option>\r\n                      <option value=\"FAWE User\" ";
if (set_value("user_type") == "FAWE User") {
    echo " selected=\"selected\" ";
}
echo "> FAWE User</option>\r\n                      <option value=\"Implementing Partner\" ";
if (set_value("user_type") == "Implementing Partner") {
    echo " selected=\"selected\" ";
}
echo "> Implementing Partner</option>\r\n                       <option value=\"Viewer\" ";
if (set_value("user_type") == "Viewer") {
    echo " selected=\"selected\" ";
}
echo "> Viewer</option>\r\n \t\t\t\t\t \r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select the User Type </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t   <div class=\"col-12 mb-3\" id=\"inst\">\r\n                    <label class=\"form-label\" for=\"base_id\">Implementing Partner <span class=\"text-danger\">*</span></label>\r\n                   <select name=\"base_id\" id=\"base_id\" class=\"custom-select\" required>\r\n                      <option value=\"\">Select Institution</option>\r\n\t\t\t\t\t  ";
if ($ministry) {
    echo "          ";
    foreach ($ministry as $record) {
        echo "                      <option value=\"";
        echo $record["id"];
        echo "\">";
        echo $record["name"];
        echo "</option>\r\n \t\t\t\t\t  ";
    }
    echo "         ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select the Implementing Partner </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n\t\t\t\t    <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"user_group_id\">Assign User Group <span class=\"text-danger\">*</span></label>\r\n                   <select name=\"user_group_id\" id=\"user_group_id\" class=\"custom-select\" required>\r\n                      <option value=\"\">Select User Group</option>\r\n                       \r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select the User Group </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t  \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"save\" ><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/user_management/users";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>