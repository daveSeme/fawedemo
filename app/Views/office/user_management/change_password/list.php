<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$configTankAuth = config("Tank_auth");
$old_password = ["name" => "old_password", "id" => "old_password", "value" => set_value("old_password"), "size" => 30, "class" => "form-control", "placeholder" => "Current Password", "required" => true];
$new_password = ["name" => "new_password", "id" => "new_password", "maxlength" => $configTankAuth->password_max_length, "size" => 30, "class" => "form-control", "placeholder" => "New Password", "required" => true];
$confirm_new_password = ["name" => "confirm_new_password", "id" => "confirm_new_password", "maxlength" => $configTankAuth->password_max_length, "size" => 30, "class" => "form-control", "placeholder" => "Confirm New Password", "required" => true];
echo "\t\r\n\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n             ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "\t\t    ";
$validation = Config\Services::validation();
$errordata = $validation->listErrors();
echo "\t\t\t  ";
if ($validation->getErrors()) {
    echo "\t\t\t   \r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $validation->listErrors();
    echo "</div>";
}
echo "                                                ";
if (!empty($errors["old_password"])) {
    echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $errors["old_password"];
    echo "</div>";
}
echo "          </div>\r\n          <div class=\"panel-content p-0\">\r\n           ";
$insert_url = "user_management/change_password";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\">";
echo form_label("Current Password", $old_password["id"]);
echo "  <span class=\"text-danger\">*</span></label>\r\n                   ";
echo form_password($old_password);
echo "                    <div class=\"invalid-feedback\"> Please enter the current password. </div>\r\n\t\t\t\t\t";
echo $validation->getError("old_password");
echo "                  </div>\r\n                  \r\n                \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"type\">";
echo form_label("New Password", $new_password["id"]);
echo " <span class=\"text-danger\">*</span></label>\r\n                  ";
echo form_password($new_password);
echo "                    <div class=\"invalid-feedback\"> Please provide a New Password. </div>\r\n                  </div>\r\n                  \r\n                   <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"type\">";
echo form_label("Confirm New Password", $confirm_new_password["id"]);
echo "  <span class=\"text-danger\">*</span></label>\r\n                   \r\n                   ";
echo form_password($confirm_new_password);
echo "\t\t\t\t    <div class=\"invalid-feedback\"> Please provide a Confirm New Password. </div>\r\n                  </div>\r\n                   \r\n                    \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Change Password</button>\r\n                  \r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>