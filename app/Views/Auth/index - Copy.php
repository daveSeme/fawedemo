<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$login = ["name" => "login", "id" => "login", "class" => "login", "id" => "login", "value" => set_value("login"), "maxlength" => 80, "size" => 30];
if ($login_by_username && $login_by_email) {
    $login_label = "Email or Login";
    $field_type = "text";
} else {
    if ($login_by_username) {
        $login_label = "Login";
        $field_type = "text";
    } else {
        $login_label = "Email";
        $field_type = "email";
    }
}
echo "<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n<meta charset=\"utf-8\">\r\n<title>Login - M&E System</title>\r\n<meta name=\"description\" content=\"Login\">\r\n";
include "login-top.php";
echo "<div class=\"page-wrapper auth\">\r\n  <div class=\"page-inner bg-brand-gradient\">\r\n    <div class=\"page-content-wrapper bg-transparent m-0\">\r\n      ";
include "login-header.php";
echo "      <div class=\"flex-1\" style=\"background: url(";
echo base_url();
echo "/public/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;\">\r\n        <div class=\"container py-4 py-lg-5 my-lg-5 px-4 px-sm-0\">\r\n          <div class=\"row\">\r\n            <div class=\"col col-md-6 col-lg-7 hidden-sm-down\">\r\n              <h2 class=\"fs-xxl fw-500 mt-4 text-white\"> Monitoring and Evaluation System <small class=\"h3 fw-300 mt-3 mb-5 text-white opacity-60\"> </small> <small class=\"h3 fw-300 mt-3 mb-5 text-white opacity-60\"> M&E Online is web-based Monitoring & Evaluation Software for M&E Reports, Project Management, Logframe and Dashboard to streamline and optimize M&E processes with easy to use interfaces and mobile platform. It is a comprehensive Management Information System that helps in data collection, aggregation, analysis and dissemination with help of interactive web forms and dynamic reports. </small> \r\n              </h2>\r\n            </div>\r\n            <div class=\"col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto\">\r\n              <h1 class=\"text-white fw-300 mb-3 d-sm-block d-md-none\"> Secure login </h1>\r\n              <div class=\"card p-4 rounded-plus bg-faded\">\r\n                <form method=\"post\" id=\"js-login\" novalidate action=\"";
echo site_url("auth/login");
echo "\">\r\n                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-info\"> <strong>Note:</strong> For Registered Users and Administrators! </div>\r\n                  </div>\r\n                  ";
if (!empty($errors)) {
    echo "                  <div class=\"alert alert-danger\" role=\"alert\">\r\n                    <ul>\r\n                      ";
    foreach ($errors as $error) {
        echo "                      <li>\r\n                        ";
        echo esc($error);
        echo "                      </li>\r\n                      ";
    }
    echo "                    </ul>\r\n                  </div>\r\n                  ";
}
echo "                  ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->flashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "                  <div class=\"form-group\">\r\n                    <label class=\"form-label\" for=\"login\">";
echo $login_label;
echo "</label>\r\n                    <input   type=\"";
echo $field_type;
echo "\" id=\"login\" name=\"login\" class=\"form-control form-control-lg\" placeholder=\"";
echo $login_label;
echo "\" value=\"\" required>\r\n                    <div class=\"invalid-feedback\">No, you missed this one.</div>\r\n                  </div>\r\n                  <div class=\"form-group\">\r\n                    <label class=\"form-label\" for=\"password\">Password</label>\r\n                    <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control form-control-lg\" placeholder=\"Password\" value=\"\" required>\r\n                    <div class=\"invalid-feedback\">Sorry, you missed this one.</div>\r\n                    <div class=\"row\">\r\n                      <div class=\"col-lg-12 text-right\"> ";
echo anchor("/auth/forgot_password/", "Forgot password ?");
echo " </div>\r\n                    </div>\r\n                  </div>\r\n                  <div class=\"form-group text-left\">\r\n                    <div class=\"custom-control custom-checkbox\">\r\n                      <input type=\"checkbox\" class=\"custom-control-input\" id=\"remember\">\r\n                      <label class=\"custom-control-label\" for=\"remember\"> Remember me for the next 30 days</label>\r\n                    </div>\r\n                  </div>\r\n                  <div class=\"row no-gutters\">\r\n                    <div class=\"col-lg-6 pl-lg-1 my-2\">\r\n                      <button id=\"js-login-btn\" type=\"submit\" class=\"btn btn-danger btn-block btn-lg\">Sign in</button>\r\n                    </div>\r\n                  </div>\r\n                </form>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          ";
include "login-footer-top.php";
echo "        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<!-- BEGIN Color profile --> \r\n<!-- this area is hidden and will not be seen on screens or screen readers --> \r\n<!-- we use this only for CSS color refernce for JS stuff -->\r\n<!--<p id=\"js-color-profile\" class=\"d-none\"> <span class=\"color-primary-50\"></span> <span class=\"color-primary-100\"></span> <span class=\"color-primary-200\"></span> <span class=\"color-primary-300\"></span> <span class=\"color-primary-400\"></span> <span class=\"color-primary-500\"></span> <span class=\"color-primary-600\"></span> <span class=\"color-primary-700\"></span> <span class=\"color-primary-800\"></span> <span class=\"color-primary-900\"></span> <span class=\"color-info-50\"></span> <span class=\"color-info-100\"></span> <span class=\"color-info-200\"></span> <span class=\"color-info-300\"></span> <span class=\"color-info-400\"></span> <span class=\"color-info-500\"></span> <span class=\"color-info-600\"></span> <span class=\"color-info-700\"></span> <span class=\"color-info-800\"></span> <span class=\"color-info-900\"></span> <span class=\"color-danger-50\"></span> <span class=\"color-danger-100\"></span> <span class=\"color-danger-200\"></span> <span class=\"color-danger-300\"></span> <span class=\"color-danger-400\"></span> <span class=\"color-danger-500\"></span> <span class=\"color-danger-600\"></span> <span class=\"color-danger-700\"></span> <span class=\"color-danger-800\"></span> <span class=\"color-danger-900\"></span> <span class=\"color-warning-50\"></span> <span class=\"color-warning-100\"></span> <span class=\"color-warning-200\"></span> <span class=\"color-warning-300\"></span> <span class=\"color-warning-400\"></span> <span class=\"color-warning-500\"></span> <span class=\"color-warning-600\"></span> <span class=\"color-warning-700\"></span> <span class=\"color-warning-800\"></span> <span class=\"color-warning-900\"></span> <span class=\"color-success-50\"></span> <span class=\"color-success-100\"></span> <span class=\"color-success-200\"></span> <span class=\"color-success-300\"></span> <span class=\"color-success-400\"></span> <span class=\"color-success-500\"></span> <span class=\"color-success-600\"></span> <span class=\"color-success-700\"></span> <span class=\"color-success-800\"></span> <span class=\"color-success-900\"></span> <span class=\"color-fusion-50\"></span> <span class=\"color-fusion-100\"></span> <span class=\"color-fusion-200\"></span> <span class=\"color-fusion-300\"></span> <span class=\"color-fusion-400\"></span> <span class=\"color-fusion-500\"></span> <span class=\"color-fusion-600\"></span> <span class=\"color-fusion-700\"></span> <span class=\"color-fusion-800\"></span> <span class=\"color-fusion-900\"></span> </p>\r\n-->";
include "login-footer.php";

?>