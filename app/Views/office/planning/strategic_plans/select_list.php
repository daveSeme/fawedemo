<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/select2/select2.bundle.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n<!-- BEGIN Page Wrapper -->\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-6\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span></h2>\r\n      </div>\r\n      <div class=\"panel-container show\">\r\n        <div class=\"panel-content\">\r\n          ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "          <div class=\"form-group\">\r\n            <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n              <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n              <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n            </div>\r\n          </div>\r\n          ";
}
echo "          ";
if ($errors) {
    echo "          <div class=\"form-group\">\r\n            <div class=\"alert alert-danger\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n              <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n              <p> ";
    echo $errors;
    echo " </p>\r\n            </div>\r\n          </div>\r\n          ";
}
echo "          ";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "          <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n            ";
    echo $validation->listErrors();
    echo "</div>\r\n          ";
}
echo "          <form id=\"ubs\" class=\"needs-validation\" method=\"post\" action=\"";
echo base_url() . "/planning/strategic_plans/select_list";
echo "\">\r\n           \r\n           \r\n            <div class=\"panel-content\">\r\n            <input type=\"hidden\" name=\"base_id\"   id=\"base_id\"   value=\"";
echo $base_id;
echo "\" required>\r\n           \r\n            <div class=\"form-group\">\r\n              <label class=\"form-label\" for=\"single-default\"> Strategic Plan Name <span class=\"text-danger\">*</span></label>\r\n              <input type=\"text\" name=\"name\" class=\"form-control\" id=\"name\" placeholder=\"Please enter name\" value=\"";
echo set_value("name");
echo "\">\r\n            </div>\r\n            \r\n            \r\n            \r\n            <div class=\"form-group\">\r\n              <label class=\"form-label\" for=\"single-default\"> Start Year <span class=\"text-danger\">*</span></label>\r\n              <select name=\"start-year\" id=\"start_year\" class=\"custom-select\">\r\n               <option value=\"\" >Select Start Year</option>\r\n
<option value=\"2010\">2010</option>\r\n
<option value=\"2011\">2011</option>\r\n
<option value=\"2012\">2012</option>\r\n
<option value=\"2013\">2013</option>\r\n
<option value=\"2014\">2014</option>\r\n
<option value=\"2015\">2015</option>\r\n
<option value=\"2016\">2016</option>\r\n
<option value=\"2017\">2017</option>\r\n
<option value=\"2018\">2018</option>\r\n
<option value=\"2019\">2019</option>\r\n
<option value=\"2020\">2020</option>\r\n
<option value=\"2021\">2021</option>\r\n
<option value=\"2022\">2022</option>\r\n
<option value=\"2023\">2023</option>\r\n
<option value=\"2024\">2024</option>\r\n
<option value=\"2025\">2025</option>\r\n
</select>\r\n
</div>\r\n
\r\n
\r\n
\r\n
<div class=\"form-group\">\r\n
  <label class=\"form-label\" for=\"single-default\"> End Year <span class=\"text-danger\">*</span></label>\r\n
  <select name=\"end-year\" id=\"end_year\" class=\"custom-select\">\r\n
    <option value=\"\" >Select End Year</option>\r\n
    <option value=\"2024\">2024</option>\r\n
    <option value=\"2025\">2025</option>\r\n
    <option value=\"2026\">2026</option>\r\n
    <option value=\"2027\">2027</option>\r\n
    <option value=\"2028\">2028</option>\r\n
    <option value=\"2029\">2029</option>\r\n
    <option value=\"2030\">2030</option>\r\n
  </select>\r\n
</div>\r\n
\r\n
\r\n
\r\n
<div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n
  <div class=\"col-lg-offset-5 col-lg-7\">\r\n
    <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Continue</button>\r\n
    <a href=\"";

echo base_url() . "/planning/strategic_plans";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n            </div>\r\n            \r\n            \r\n            \r\n          </form>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</main>\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script> \r\n<script language=\"javascript\">\r\n \tdocument.getElementById(\"start-year\").value=\"";
echo set_value("start-year");
echo "\";";
echo "document.getElementById(\"end-year\").value=\"";
echo set_value("end-year");
echo "\";";
echo "</script> \r\n<script>\r\n    \$('body').delegate('#end_year', 'change', function () {\r\n\t\t\r\n        if (\$(this).val() != '') {}";
echo "});\r\n</script>";

?>