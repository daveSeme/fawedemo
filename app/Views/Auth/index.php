<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$login = ["name" => "login", "id" => "login", "class" => "login", "id" => "login", "value" => set_value("login"), "maxlength" => 80, "size" => 30];
if ($login_by_username && $login_by_email) {
    $login_label = "Email or Username";
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
echo "/public/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;\">\r\n        <div class=\"container py-4 py-lg-5 my-lg-5 px-4 px-sm-0\">\r\n          <div class=\"row\">\r\n            <div class=\"col col-md-6 col-lg-7 hidden-sm-down\">\r\n            <img src=\"";
echo base_url();
echo "/public/img/logo-big.png\" alt=\"M&E Online\" aria-roledescription=\"logo\" style=\" height:160px;\"> \r\n              <h2 class=\"fw-500 mt-4 text-white\"> Monitoring & Evaluation Management Information System  \r\n              <small class=\"h3 fw-300 mt-3 text-white opacity-60\"> Established in 1999, the Centre for Rights Education and Awareness (CREAW) is a national, feminist women’s rights Non-Governmental Organization (NGO) operating in Kenya. CREAW envisions a just society where women and girls enjoy full rights and live in dignity. The mission of CREAW is to champion, expand and actualise women and girls’ rights and social justice. </small>\r\n\r\n\t\t\t<small class=\"h3 fw-300 mt-3 text-white opacity-60\">We are a national feminist women’s right Non-Governmental Organization whose vision is a just society where women and girls enjoy full rights and live in dignity and mission is to champion, expand and actualise women’s and girls’ rights and social justice.</small>\r\n \r\n              </h2>\r\n              \r\n            </div>\r\n            <div class=\"col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto\">\r\n              <h1 class=\"text-white fw-300 mb-3 d-sm-block d-md-none\"> Secure login </h1>\r\n              <div class=\"card p-4 rounded-plus bg-faded\">\r\n                <form method=\"post\" id=\"js-login\" novalidate action=\"";
echo site_url("auth/login");
echo "\">\r\n                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-info\" style=\"padding:1rem 10px;\"> <strong>Note:</strong> For Registered Users and Administrators! </div>\r\n                  </div>\r\n                  ";
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
if ($session->getFlashdata("flashSuccess")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("flashSuccess");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "                  <div class=\"form-group\">\r\n                    <label class=\"form-label\" for=\"login\">";
echo $login_label;
echo "</label>\r\n                    <input   type=\"";
echo $field_type;
echo "\" id=\"login\" name=\"login\" class=\"form-control form-control-lg\" placeholder=\"";
echo $login_label;
echo "\" value=\"\" required>\r\n                    <div class=\"invalid-feedback\">This field is required</div>\r\n                  </div>\r\n                  <div class=\"form-group\">\r\n                   
 <label class=\"form-label\" for=\"password\">Password</label>\r\n                    
 <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control form-control-lg\" placeholder=\"Password\" value=\"\" >\r\n                    <div class=\"invalid-feedback\">Sorry, This field is required.</div>\r\n                    <div class=\"row\">\r\n                      <div class=\"col-lg-12 text-right\"> ";
echo anchor("/auth/forgot_password/", "Forgot password ?");
echo " </div>\r\n                    </div>\r\n                  </div>\r\n                  <div class=\"form-group text-left\">\r\n                    
<div class=\"custom-control custom-checkbox\">\r\n                      
<input type=\"checkbox\" class=\"custom-control-input\" id=\"remember\">\r\n                    
  <label class=\"custom-control-label\" for=\"remember\"> Remember me for the next 30 days</label>\r\n     
                 </div>\r\n                  </div>\r\n                  <div class=\"row no-gutters\">\r\n         
                            <div class=\"col-lg-6 pl-lg-1 my-2\">\r\n                      
<button id=\"js-login-btn\" type=\"submit\" class=\"btn btn-primary btn-block btn-lg\">Sign in</button>\r\n       

<a href=\"http://localhost:8888/creaw/Auth/microsoft_login?oauth_init=1\">Sign in with Microsoft</a>\r\n
   


</div>\r\n                  </div>\r\n                </form>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          ";
include "login-footer-top.php";
echo "        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<!-- BEGIN Color profile --> \r\n<!-- this area is hidden and will not be seen on screens or screen readers --> \r\n<!-- we use this only for CSS color refernce for JS stuff -->\r\n<!--<p id=\"js-color-profile\" class=\"d-none\"> <span class=\"color-primary-50\"></span> <span class=\"color-primary-100\"></span> <span class=\"color-primary-200\"></span> <span class=\"color-primary-300\"></span> <span class=\"color-primary-400\"></span> <span class=\"color-primary-500\"></span> <span class=\"color-primary-600\"></span> <span class=\"color-primary-700\"></span> <span class=\"color-primary-800\"></span> <span class=\"color-primary-900\"></span> <span class=\"color-info-50\"></span> <span class=\"color-info-100\"></span> <span class=\"color-info-200\"></span> <span class=\"color-info-300\"></span> <span class=\"color-info-400\"></span> <span class=\"color-info-500\"></span> <span class=\"color-info-600\"></span> <span class=\"color-info-700\"></span> <span class=\"color-info-800\"></span> <span class=\"color-info-900\"></span> <span class=\"color-danger-50\"></span> <span class=\"color-danger-100\"></span> <span class=\"color-danger-200\"></span> <span class=\"color-danger-300\"></span> <span class=\"color-danger-400\"></span> <span class=\"color-danger-500\"></span> <span class=\"color-danger-600\"></span> <span class=\"color-danger-700\"></span> <span class=\"color-danger-800\"></span> <span class=\"color-danger-900\"></span> <span class=\"color-warning-50\"></span> <span class=\"color-warning-100\"></span> <span class=\"color-warning-200\"></span> <span class=\"color-warning-300\"></span> <span class=\"color-warning-400\"></span> <span class=\"color-warning-500\"></span> <span class=\"color-warning-600\"></span> <span class=\"color-warning-700\"></span> <span class=\"color-warning-800\"></span> <span class=\"color-warning-900\"></span> <span class=\"color-success-50\"></span> <span class=\"color-success-100\"></span> <span class=\"color-success-200\"></span> <span class=\"color-success-300\"></span> <span class=\"color-success-400\"></span> <span class=\"color-success-500\"></span> <span class=\"color-success-600\"></span> <span class=\"color-success-700\"></span> <span class=\"color-success-800\"></span> <span class=\"color-success-900\"></span> <span class=\"color-fusion-50\"></span> <span class=\"color-fusion-100\"></span> <span class=\"color-fusion-200\"></span> <span class=\"color-fusion-300\"></span> <span class=\"color-fusion-400\"></span> <span class=\"color-fusion-500\"></span> <span class=\"color-fusion-600\"></span> <span class=\"color-fusion-700\"></span> <span class=\"color-fusion-800\"></span> <span class=\"color-fusion-900\"></span> </p>\r\n-->";
include "login-footer.php";

?>