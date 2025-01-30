<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$login = ["name" => "login", "id" => "login", "value" => set_value("login"), "maxlength" => 80, "size" => 30];
$user_type = ["name" => "user_type", "id" => "user_type", "value" => set_value("user_type"), "maxlength" => 80, "size" => 30];
$this->configTankAuth = config("Tank_auth");
if ($this->configTankAuth->use_username) {
    $login_label = "Email OR UserName";
} else {
    $login_label = "Email";
}
echo "<!DOCTYPE html>\r\n<html lang=\"en\">\r\n    <head>\r\n        <meta charset=\"utf-8\">\r\n        <title>Forgot Password - M&E System</title>\r\n        <meta name=\"description\" content=\"Login\">\r\n      ";
include "login-top.php";
echo "  <div class=\"page-wrapper auth\">\r\n        <div class=\"page-inner bg-brand-gradient\">\r\n            <div class=\"page-content-wrapper bg-transparent m-0\">     \r\n\t\t\t";
include "login-header.php";
echo " \r\n\t\t\t\r\n\t\t\t<div class=\"flex-1\" style=\"background: url(";
echo base_url();
echo "/public/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;\">\r\n                        <div class=\"container py-4 py-lg-5 my-lg-5 px-4 px-sm-0\">\r\n                            <div class=\"row\">\r\n                                <div class=\"col-xl-12\">\r\n                                    ";
echo "<div class=\"col col-md-12 col-lg-12 text-center mb-4\">\r\n            <img src=\"";
echo base_url();
echo "/public/img/logo-big.png\" alt=\"M&E Online\" aria-roledescription=\"logo\" style=\" height:160px;\"> ";
// echo "<h2 class=\"fw-500 mt-4 text-white\"> Monitoring & Evaluation System</h2>";
echo "\r\n </div>";
echo "<h2 class=\"fs-xxl fw-500 mt-4 text-white text-center\">\r\n <small class=\"h3 mt-3 mb-5 text-white  hidden-sm-down\">\r\n                                           Use the form below to reset your password!\r\n                                        </small>\r\n                                    </h2>\r\n                                </div>\r\n                                <div class=\"col-xl-6 ml-auto mr-auto\">\r\n                                    <div class=\"card p-4 rounded-plus bg-faded\">\r\n                                        \r\n\t\t\t\t\t\t\t\t\t\t ";
$attributes = ["id" => "js-login", "name" => "js-login", "class" => "smart-form client-form", "autocomplete" => "off"];
echo "\t\r\n                    ";
echo form_open(site_url("auth/forgot_password"), $attributes);
echo "\t\t\t\t\t";
if (isset($errors[$login["name"]])) {
    echo "\t\t\t\t\t<div class=\"form-group\">\r\n\t\t\t\t\t<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Error!</strong> ";
    echo isset($errors[$login["name"]]) ? $errors[$login["name"]] : "";
    echo "  </div>\r\n          </div></div>";
}
echo "\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t";
$session = Config\Services::session();
if ($session->getFlashdata("flashSuccess")) {
    echo " <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n\t<h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Message </h4>\r\n\t<p>\r\n\t\t";
    echo $session->getFlashdata("flashSuccess");
    echo " \r\n\t</p>\r\n</div>\r\n";
}
echo "\t\t\t\t\t\r\n                                            <div class=\"form-group\">\r\n                                                <label class=\"form-label\" for=\"lostaccount\">Your username or email</label>\r\n                                                \r\n                                                ";
echo form_input("login", $login["value"], "placeholder=\"" . $login_label . "\" id=\"emailaddress\" required class=\"form-control\"    autocomplete=\"off\"");
echo " <div class=\"invalid-feedback\">This field is required</div>\r\n                                                <div class=\"help-block\">We will email you the instructions</div>\r\n                                            </div>\r\n                                            <div class=\"row no-gutters\">\r\n                                                \r\n                                                <div class=\"col-md-6 ml-auto text-left\">\r\n                                                    ";
echo anchor("/auth/login/", "Back to Login");
echo "                                                </div>\r\n                                                \r\n                                                <div class=\"col-md-6 ml-auto text-right\">\r\n                                                    <button id=\"js-login-btn\" type=\"submit\" class=\"btn btn-danger\">Recover</button>\r\n                                                </div>\r\n                                            </div>\r\n                                        </form>\r\n                                    </div>\r\n                                </div>\r\n                            </div>\r\n                        </div>\r\n          ";
include "login-footer-top.php";
echo "        </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <!-- BEGIN Color profile -->\r\n        <!-- this area is hidden and will not be seen on screens or screen readers -->\r\n        <!-- we use this only for CSS color refernce for JS stuff -->\r\n        <p id=\"js-color-profile\" class=\"d-none\">\r\n            <span class=\"color-primary-50\"></span>\r\n            <span class=\"color-primary-100\"></span>\r\n            <span class=\"color-primary-200\"></span>\r\n            <span class=\"color-primary-300\"></span>\r\n            <span class=\"color-primary-400\"></span>\r\n            <span class=\"color-primary-500\"></span>\r\n            <span class=\"color-primary-600\"></span>\r\n            <span class=\"color-primary-700\"></span>\r\n            <span class=\"color-primary-800\"></span>\r\n            <span class=\"color-primary-900\"></span>\r\n            <span class=\"color-info-50\"></span>\r\n            <span class=\"color-info-100\"></span>\r\n            <span class=\"color-info-200\"></span>\r\n            <span class=\"color-info-300\"></span>\r\n            <span class=\"color-info-400\"></span>\r\n            <span class=\"color-info-500\"></span>\r\n            <span class=\"color-info-600\"></span>\r\n            <span class=\"color-info-700\"></span>\r\n            <span class=\"color-info-800\"></span>\r\n            <span class=\"color-info-900\"></span>\r\n            <span class=\"color-danger-50\"></span>\r\n            <span class=\"color-danger-100\"></span>\r\n            <span class=\"color-danger-200\"></span>\r\n            <span class=\"color-danger-300\"></span>\r\n            <span class=\"color-danger-400\"></span>\r\n            <span class=\"color-danger-500\"></span>\r\n            <span class=\"color-danger-600\"></span>\r\n            <span class=\"color-danger-700\"></span>\r\n            <span class=\"color-danger-800\"></span>\r\n            <span class=\"color-danger-900\"></span>\r\n            <span class=\"color-warning-50\"></span>\r\n            <span class=\"color-warning-100\"></span>\r\n            <span class=\"color-warning-200\"></span>\r\n            <span class=\"color-warning-300\"></span>\r\n            <span class=\"color-warning-400\"></span>\r\n            <span class=\"color-warning-500\"></span>\r\n            <span class=\"color-warning-600\"></span>\r\n            <span class=\"color-warning-700\"></span>\r\n            <span class=\"color-warning-800\"></span>\r\n            <span class=\"color-warning-900\"></span>\r\n            <span class=\"color-success-50\"></span>\r\n            <span class=\"color-success-100\"></span>\r\n            <span class=\"color-success-200\"></span>\r\n            <span class=\"color-success-300\"></span>\r\n            <span class=\"color-success-400\"></span>\r\n            <span class=\"color-success-500\"></span>\r\n            <span class=\"color-success-600\"></span>\r\n            <span class=\"color-success-700\"></span>\r\n            <span class=\"color-success-800\"></span>\r\n            <span class=\"color-success-900\"></span>\r\n            <span class=\"color-fusion-50\"></span>\r\n            <span class=\"color-fusion-100\"></span>\r\n            <span class=\"color-fusion-200\"></span>\r\n            <span class=\"color-fusion-300\"></span>\r\n            <span class=\"color-fusion-400\"></span>\r\n            <span class=\"color-fusion-500\"></span>\r\n            <span class=\"color-fusion-600\"></span>\r\n            <span class=\"color-fusion-700\"></span>\r\n            <span class=\"color-fusion-800\"></span>\r\n            <span class=\"color-fusion-900\"></span>\r\n        </p>\r\n       ";
include "login-footer.php";
echo " ";

?>