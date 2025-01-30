<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$request = Config\Services::request();
echo " \r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n          ";
$insert_url = "planning/strategic_plans/add_objective_indicator/" . $fydp . "/?objective_id=" . $request->getVar("objective_id");
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n               <div class=\"panel-content\">\r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Strategic Plan Name</th>\r\n                      <td colspan=\"3\">";
echo $stdata["plan_name"];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Start Date</th>\r\n                      <td>";
echo $stdata["startyear"];
echo "</td>\r\n                      <th class=\"bg-highlight\">End Date</th>\r\n                      <td>";
echo $stdata["endyear"];
echo "</td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n\t\t\t\t\r\n\t\t\t\t\r\n\t\t  ";
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
echo "              \r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3 mt-5\">\r\n                    <label class=\"form-label\" for=\"name\">Objective Indicator <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"indicator\" class=\"form-control\" id=\"indicator\" placeholder=\"Please enter Objective Indicator\" value=\"";
echo set_value("indicator");
echo "\" required> <div class=\"invalid-feedback\"> Please enter Objective Indicator</div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                        <label class=\"form-label\" for=\"name\">Means of Verification </label>\r\n                        <input type=\"text\" name=\"mov\" id=\"mov\" class=\"form-control\" placeholder=\"Please enter Means of Verification\" value=\"";
echo set_value("target");
echo "\">\r\n                        <div class=\"invalid-feedback\"> Please enter Means of Verification. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                        <label class=\"form-label\" for=\"name\">Risks & Assumptions </label>\r\n                        <input type=\"text\" name=\"risks_assumptions\" id=\"risks_assumptions\" class=\"form-control\" placeholder=\"Please enter Risks & Assumptions\" value=\"";
echo set_value("risks_assumptions");
echo "\">\r\n                        <div class=\"invalid-feedback\"> Please enter Risks & Assumptions. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  \r\n               \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n               <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" action type=\"submit\"  name=\"action\" value=\"save\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                                  <a href=\"";
echo base_url() . "/planning/strategic_plans/logframe/" . $fydp;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>