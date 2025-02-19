<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

// Start the session to store the selected language
session_start();

// Handle language selection
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang']; // Save the selected language in the session
}

// Set the default language to English if not selected
$currentLang = $_SESSION['lang'] ?? 'en';

// Define translation arrays for English and French
$translations = [
    'en' => [
        'login_label' => 'Email or Username',
        'password_label' => 'Password',
        'remember_me' => 'Remember me for the next 30 days',
        'login_button' => 'Sign in',
        'forgot_password' => 'Forgot password?',
        'note' => 'For Registered Users and Administrators!',
        'fawe_info' => 'Monitoring & Evaluation Management Information System For FAWE
        <h3>The Forum for African Women Educationalists (FAWE) is a pan-African Non-Governmental Organisation founded in 1992 by five women ministers of education to promote girls’ and women’s education in sub-Saharan Africa in line with Education for All. FAWE is a non-political, voluntary, charitable, non-sectarian, not-for-profit organisation and does not discriminate on the basis of race, ideology, colour, nationality or religious persuasion. The mission of FAWE is to promote gender-responsive policies, practices, and attitudes in education to enhance equal opportunities for African girls and women.',
    ],
    'fr' => [
        'login_label' => 'Email ou Nom d\'utilisateur',
        'password_label' => 'Mot de passe',
        'remember_me' => 'Se souvenir de moi pendant 30 jours',
        'login_button' => 'Se connecter',
        'forgot_password' => 'Mot de passe oublié?',
        'note' => 'Pour les utilisateurs enregistrés et les administrateurs!',
        'fawe_info' => 'Système de gestion de l\'information de suivi et d\'évaluation pour FAWE
       <h3> Le Forum des éducatrices africaines pour l\'éducation des filles (FAWE) est une organisation non gouvernementale panafricaine fondée en 1992 par cinq ministres africaines de l\'éducation pour promouvoir l\'éducation des filles et des femmes en Afrique subsaharienne conformément à l\'Éducation pour tous. FAWE est une organisation non politique, volontaire, caritative, non sectaire, à but non lucratif et ne discrimine pas sur la base de la race, de l\'idéologie, de la couleur, de la nationalité ou de la religion. La mission de FAWE est de promouvoir des politiques, des pratiques et des attitudes sensibles au genre dans l\'éducation afin de renforcer l\'égalité des chances pour les filles et les femmes africaines.',
    ],
];

// Select the correct translations based on the current language
$login_label = $translations[$currentLang]['login_label'];
$password_label = $translations[$currentLang]['password_label'];
$remember_me = $translations[$currentLang]['remember_me'];
$login_button = $translations[$currentLang]['login_button'];
$forgot_password = $translations[$currentLang]['forgot_password'];
$note = $translations[$currentLang]['note'];
$fawe_info = $translations[$currentLang]['fawe_info'];  // FAWE information text

// Login form settings
$login = ["name" => "login", "id" => "login", "class" => "login", "id" => "login", "value" => set_value("login"), "maxlength" => 80, "size" => 30];
if ($login_by_username && $login_by_email) {
    $login_label = $translations[$currentLang]['login_label'];
    $field_type = "text";
} else {
    if ($login_by_username) {
        $login_label = $translations[$currentLang]['login_label'];
        $field_type = "text";
    } else {
        $login_label = $translations[$currentLang]['login_label'];
        $field_type = "email";
    }
}

echo "<!DOCTYPE html>\r\n<html lang=\"$currentLang\">\r\n<head>\r\n<meta charset=\"utf-8\">\r\n<title>Login - M&E System</title>\r\n<meta name=\"description\" content=\"Login\">\r\n";
include "login-top.php";
echo "<div class=\"page-wrapper auth\">\r\n  <div class=\"page-inner bg-brand-gradient\">\r\n    <div class=\"page-content-wrapper bg-transparent m-0\">\r\n      <!-- Language Switcher Dropdown -->\r\n      <div style=\"position: absolute; top: 10px; right: 10px;\">\r\n        <form method=\"GET\" action=\"\">\r\n          <select name=\"lang\" onchange=\"this.form.submit()\">\r\n            <option value=\"en\" " . ($currentLang == 'en' ? 'selected' : '') . ">English</option>\r\n            <option value=\"fr\" " . ($currentLang == 'fr' ? 'selected' : '') . ">Français</option>\r\n          </select>\r\n        </form>\r\n      </div>\r\n      ";
include "login-header.php";
echo "      <div class=\"flex-1\" style=\"background: url(";
echo base_url();
echo "/public/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;\">\r\n        <div class=\"container py-4 py-lg-5 my-lg-5 px-4 px-sm-0\">\r\n          <div class=\"row\">\r\n            <div class=\"col col-md-6 col-lg-7 hidden-sm-down\">\r\n            <img src=\"";
echo base_url();
echo "/public/img/logo-big.png\" alt=\"M&E Online\" aria-roledescription=\"logo\" style=\" height:165px;width:auto;\"> \r\n              <h2 class=\"fw-500 mt-4 text-Blue4\"> ";
echo $fawe_info;  // Displaying the FAWE information based on language
echo " \r\n              </h2>\r\n              \r\n            </div>\r\n            <div class=\"col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto\">\r\n              <h1 class=\"text-white fw-300 mb-3 d-sm-block d-md-none\"> Secure login </h1>\r\n              <div class=\"card p-4 rounded-plus bg-faded\">\r\n                <form method=\"post\" id=\"js-login\" novalidate action=\"";
echo site_url("auth/login");
echo "\">\r\n                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-info\" style=\"padding:1rem 10px;\"> <strong>Note:</strong> ";
echo $note;
echo " </div>\r\n                  </div>\r\n                  ";
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
<label class=\"form-label\" for=\"password\">";
echo $password_label;
echo "</label>\r\n                    <input type=\"password\" id=\"password\" name=\"password\" class=\"form-control form-control-lg\" placeholder=\"";
echo $password_label;
echo "\" value=\"\" >\r\n                    <div class=\"invalid-feedback\">Sorry, This field is required.</div>\r\n                    <div class=\"row\">\r\n                      <div class=\"col-lg-12 text-right\"> ";
echo anchor("/auth/forgot_password/", $forgot_password);
echo " </div>\r\n                    </div>\r\n                  </div>\r\n                  <div class=\"form-group text-left\">\r\n                    
<div class=\"custom-control custom-checkbox\">\r\n                      
<input type=\"checkbox\" class=\"custom-control-input\" id=\"remember\">\r\n                    
  <label class=\"custom-control-label\" for=\"remember\">";
echo $remember_me;
echo "</label>\r\n     
                 </div>\r\n                  </div>\r\n                  <div class=\"row no-gutters\">\r\n         
                            <div class=\"col-lg-6 pl-lg-1 my-2\">\r\n                      
<button id=\"js-login-btn\" type=\"submit\" class=\"btn btn-primary btn-block btn-lg\">";
echo $login_button;
echo "</button>\r\n       


   


</div>\r\n                  </div>\r\n                </form>\r\n              </div>\r\n            </div>\r\n          </div>\r\n          ";
include "login-footer-top.php";
echo "        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n<!-- BEGIN Color profile --> \r\n<!-- this area is hidden and will not be seen on screens or screen readers --> \r\n<!-- we use this only for CSS color refernce for JS stuff -->\r\n<!--<p id=\"js-color-profile\" class=\"d-none\"> <span class=\"color-primary-50\"></span> <span class=\"color-primary-100\"></span> <span class=\"color-primary-200\"></span> <span class=\"color-primary-300\"></span> <span class=\"color-primary-400\"></span> <span class=\"color-primary-500\"></span> <span class=\"color-primary-600\"></span> <span class=\"color-primary-700\"></span> <span class=\"color-primary-800\"></span> <span class=\"color-primary-900\"></span> <span class=\"color-info-50\"></span> <span class=\"color-info-100\"></span> <span class=\"color-info-200\"></span> <span class=\"color-info-300\"></span> <span class=\"color-info-400\"></span> <span class=\"color-info-500\"></span> <span class=\"color-info-600\"></span> <span class=\"color-info-700\"></span> <span class=\"color-info-800\"></span> <span class=\"color-info-900\"></span> <span class=\"color-danger-50\"></span> <span class=\"color-danger-100\"></span> <span class=\"color-danger-200\"></span> <span class=\"color-danger-300\"></span> <span class=\"color-danger-400\"></span> <span class=\"color-danger-500\"></span> <span class=\"color-danger-600\"></span> <span class=\"color-danger-700\"></span> <span class=\"color-danger-800\"></span> <span class=\"color-danger-900\"></span> <span class=\"color-warning-50\"></span> <span class=\"color-warning-100\"></span> <span class=\"color-warning-200\"></span> <span class=\"color-warning-300\"></span> <span class=\"color-warning-400\"></span> <span class=\"color-warning-500\"></span> <span class=\"color-warning-600\"></span> <span class=\"color-warning-700\"></span> <span class=\"color-warning-800\"></span> <span class=\"color-warning-900\"></span> </p>-->  </body>";
?>
