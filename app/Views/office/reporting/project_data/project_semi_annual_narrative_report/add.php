<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<script src=\"";
echo base_url();
echo "/public/js/formplugins/ckeditor/ckeditor.js\"></script>\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n         <div class=\"panel-content\">\r\n\t\t  \t  ";
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
echo "           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n             ";
$insert_url = "reporting/project_data/project_semi_annual_narrative_report/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               \t\t\t\t<option value=\"";
    echo $row["id"];
    echo "\" ";
    if (set_value("project") == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n\t\t\t\t\t\t \t";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n                \r\n                \r\n                <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                      <option value=\"\">Select Year</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Year. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"quarter\">Quarter <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select\" name=\"quarter\" id=\"quarter\" required=\"\">\r\n                      <option value=\"\">Select Quarter</option>\r\n                      <option value=\"Q1+Q2\" ";
if (set_value("quarter") == "Q1") {
    echo "selected=\"selected\"";
}
echo " >Q1+Q2</option>\r\n                      <option value=\"Q3+Q4\" ";
if (set_value("quarter") == "Q3") {
    echo "selected=\"selected\"";
}
echo " >Q3+Q4</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a Quarter </div>\r\n                  </div>\r\n                \r\n\r\n                \r\n                \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"component\">Component <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_component\" name=\"component\" id=\"component\" required=\"\">\r\n                      <option value=\"\">Select Component</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Component. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"Outcome\">Outcome <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_outcome\" name=\"outcome\" id=\"outcome\" required=\"\">\r\n                      <option value=\"\">Select Outcome</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Outcome. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"Output\">Output <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_output\" name=\"output\" id=\"output\" required=\"\">\r\n                      <option value=\"\">Select Output</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Output. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"Activity\">Activity <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_activity\" name=\"activity\" id=\"activity\" required=\"\">\r\n                      <option value=\"\">Select Activity</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Activity. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Key highlights on your activities and interventions during this reporting period <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"key_highlights\" id=\"key_highlights\"  class=\"ckeditor form-control\" placeholder=\"Please enter Key highlights\" required>";
echo set_value("key_highlights");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter a Key highlights.</div>\r\n                  </div>\r\n\r\n                  \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"challenges_experienced\">Challenges experienced and Mitigating measure <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"challenges_experienced\" id=\"challenges_experienced\"  class=\"ckeditor form-control\" placeholder=\"Please enter Challenges experienced\" required>";
echo set_value("challenges_experienced");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Challenges experienced.</div>\r\n                  </div>\r\n                  \r\n                    \r\n                    \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"success_stories\">Success Stories/Best Practice/Lessons Learned <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"success_stories\" id=\"success_stories\"  class=\"ckeditor form-control\" placeholder=\"Please enter Success Stories/Best Practice/Lessons Learned \" required>";
echo set_value("success_stories");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Success Stories/Best Practice/Lessons Learned .</div>\r\n                  </div>\r\n                    \r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"gender_action_plan\">Gender Action Plan <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"gender_action_plan\" id=\"gender_action_plan\"  class=\"ckeditor form-control\" placeholder=\"Please enter the Gender Action Plan\" required>";
echo set_value("gender_action_plan");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter the Gender Action Plan.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"environmental_social_safeguards\">Environmental and Social Safeguards <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"environmental_social_safeguards\" id=\"environmental_social_safeguards\"  class=\"ckeditor form-control\" placeholder=\"Please enter the Environmental Social Safeguards\" required>";
echo set_value("environmental_social_safeguards");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter the Environmental Social Safeguards.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Activities Anticipated for Next Reporting Period <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"activities_anticipated\" id=\"activities_anticipated\"  class=\"ckeditor form-control\" placeholder=\"Please enter Activities Anticipated\" required>";
echo set_value("activities_anticipated");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Activities Anticipated.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_file\">Attach File (to attach multiple file use ctrl button and select the files) </label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"file[]\" id=\"file\" multiple=\"multiple\">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Example valid custom file feedback</div>\r\n                    </div>\r\n                  </div>\r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/project_semi_annual_narrative_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>