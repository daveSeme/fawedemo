<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/select2/select2.min.js\" defer></script>\r\n\r\n<link href=\"";
echo base_url();
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#type_gbv').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#incidents_referred').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#case_context').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n\t\$('#services_provided').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n    \$('#person_responsible').select2();\r\n    \$('#implementing_partner').select2();\r\n\t\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n             \r\n\t\t  ";
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
echo "          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "reporting/organizational_data/cases_database/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                 \r\n\t\t\t\t  <input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"case_type\">Case type <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"case_type\" id=\"case_type\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Case type</option>\r\n                      <option value=\"New\" ";
if ($stdata["case_type"] == "New") {
    echo "selected=\"selected\"";
}
echo ">New</option>\r\n                      <option value=\"Follow Up\" ";
if ($stdata["case_type"] == "Follow Up") {
    echo "selected=\"selected\"";
}
echo ">Follow Up</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case type. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n\t\t\t\t   \r\n                    <label class=\"form-label\" for=\"case_number\"><span id=\"title\">Case Number</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"case_number\" class=\"form-control\" id=\"case_number\" value=\"";
echo $stdata["case_number"];
echo "\" readonly=\"readonly\"  required=\"\">\r\n                    <div class=\"invalid-feedback\"> Please enter Case Number. </div>\r\n                  </div>\r\n                  \r\n               \r\n\t\t\t\t    \t<div class=\"col-12 mb-3\" >\r\n                   \t\t\t <label class=\"form-label\" for=\"sector\">Field Office <span class=\"text-danger\">*</span></label>\r\n                             <select name=\"field_office\" id=\"field_office\" class=\"custom-select\">\r\n                                <option value=\"\">Select Field Office</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from implementing_partner order by name ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                \r\n                             <option value=\"";
    echo $row->id;
    echo "\" ";
    if ($stdata["field_office"] == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                   \t\t\t <div class=\"invalid-feedback\"> Please select a valid Implementing Partner. </div>\r\n                  \t\t</div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"age_survivor\">Age of Survivor <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"age_survivor\" id=\"age_survivor\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Age of Survivor</option>\r\n                      <option value=\"18 yrs and Younger\" ";
if ($stdata["age_survivor"] == "18 yrs and Younger") {
    echo "selected=\"selected\"";
}
echo ">18 yrs and Younger</option>\r\n                      <option value=\"19-26 yrs\" ";
if ($stdata["age_survivor"] == "19-26 yrs") {
    echo "selected=\"selected\"";
}
echo ">19-26 yrs</option>\r\n                      <option value=\"27-49 yrs\" ";
if ($stdata["age_survivor"] == "27-49 yrs") {
    echo "selected=\"selected\"";
}
echo ">27-49 yrs</option>\r\n                      <option value=\"50 yrs and older\" ";
if ($stdata["age_survivor"] == "50 yrs and older") {
    echo "selected=\"selected\"";
}
echo ">50 yrs and older</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Age of Survivor. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"place_residence\"><span id=\"title\">Place of Residence </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"place_residence\" class=\"form-control\" id=\"place_residence\" value=\"";
echo $stdata["place_residence"];
echo "\" placeholder=\"Please Enter Place of Residence\" required=\"\">\r\n                     \r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Place of Residence. </div>\r\n                  </div>\r\n\r\n\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"marital_status\">Marital Status of Survivor <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"marital_status\" id=\"marital_status\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Marital Status</option>\r\n                      <option value=\"Single\" ";
if ($stdata["marital_status"] == "Single") {
    echo "selected=\"selected\"";
}
echo ">Single</option>\r\n                      <option value=\"Married\" ";
if ($stdata["marital_status"] == "Married") {
    echo "selected=\"selected\"";
}
echo ">Married</option>\r\n                      <option value=\"Cohabiting\" ";
if ($stdata["marital_status"] == "Cohabiting") {
    echo "selected=\"selected\"";
}
echo ">Cohabiting</option>\r\n                      <option value=\"Divorced\" ";
if ($stdata["marital_status"] == "Divorced") {
    echo "selected=\"selected\"";
}
echo ">Divorced</option>\r\n                      <option value=\"Separated\" ";
if ($stdata["marital_status"] == "Separated") {
    echo "selected=\"selected\"";
}
echo ">Separated</option>\r\n                      <option value=\"Widowed\" ";
if ($stdata["marital_status"] == "Widowed") {
    echo "selected=\"selected\"";
}
echo ">Widowed</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Marital Status of Survivor. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                     \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n\r\n\r\n\r\n\r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"countries\">Type of GBV reported  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"type_gbv[]\" id=\"type_gbv\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                  <option value=\"\">Select Type of GBV reported</option>\r\n                               \r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$type_gbv_list = [];
$query_gbv = $db->query("SELECT * FROM cases_map_type_gbv where workflow_id = \"" . $pid . "\" ");
$gbv_listar = $query_gbv->getResultArray();
foreach ($gbv_listar as $row) {
    array_push($type_gbv_list, $row["type_gbv"]);
}
echo "                                  \r\n                                  <option value=\"Rape\" ";
if (in_array("Rape", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Rape</option>\r\n                                  <option value=\"Defilement\" ";
if (in_array("Defilement", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Defilement</option>\r\n                                  <option value=\"Sexual Assault\" ";
if (in_array("Sexual Assault", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Sexual Assault</option>\r\n                                  <option value=\"Physical Assault\" ";
if (in_array("Physical Assault", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Physical Assault</option>\r\n                                  <option value=\"Sodomy\" ";
if (in_array("Sodomy", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Sodomy</option>\r\n                                  <option value=\"Incest\" ";
if (in_array("Incest", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Incest</option>\r\n                                  <option value=\"Forced Marriage\" ";
if (in_array("Forced Marriage", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Forced Marriage</option>\r\n                                  <option value=\"Denial of Resources\" ";
if (in_array("Denial of Resources", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Denial of Resources</option>\r\n                                  <option value=\"Psych\" ";
if (in_array("Psych", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Psych</option>\r\n                                  <option value=\"Emotional Abuse\" ";
if (in_array("Emotional Abuse", $type_gbv_list)) {
    echo "selected=\"selected\"";
}
echo ">Emotional Abuse</option>\r\n                                </select>\r\n                    \t<div class=\"invalid-feedback\"> Please select a valid Type of GBV reported . </div>\r\n                  </div>\r\n\r\n\t\t\t\t  \r\n                  \r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"case_context\">Case Context <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"case_context[]\" id=\"case_context\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Case Context</option>\r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$case_context_list = [];
$query_case_context = $db->query("SELECT * FROM cases_map_case_context where workflow_id = \"" . $pid . "\" ");
$case_context_listar = $query_case_context->getResultArray();
foreach ($case_context_listar as $row) {
    array_push($case_context_list, $row["case_context"]);
}
echo "                                \r\n                                \r\n                                  <option value=\"Intimate Partner Violence\" ";
if (in_array("Intimate Partner Violence", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Intimate Partner Violence</option>\r\n                                  <option value=\"Domestic Violence\" ";
if (in_array("Domestic Violence", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Domestic Violence</option>\r\n                                  \r\n                                  <option value=\"Child Abuse\" ";
if (in_array("Child Abuse", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Child Abuse</option>\r\n                                  \r\n                                  <option value=\"Early Mariage\" ";
if (in_array("Early Mariage", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Early Mariage</option>\r\n                                 \r\n                                  <option value=\"Possible Sexual Exploitation\" ";
if (in_array("Possible Sexual Exploitation", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Possible Sexual Exploitation</option>\r\n                                \r\n                                  <option value=\"Harmful Traditional Practices\" ";
if (in_array("Harmful Traditional Practices", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Harmful Traditional Practices</option>\r\n                                 \r\n                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case Context. </div>\r\n                  </div>\r\n                  \r\n                  \r\n\t\t\t\t   \r\n                    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"incidents_referred\">Incidents referred from other service providers <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"incidents_referred[]\" id=\"incidents_referred\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$incidents_referred_list = [];
$query_incidents_referred = $db->query("select * FROM cases_map_incidents_referred where workflow_id = \"" . $pid . "\" ");
$incidents_referred_listar = $query_incidents_referred->getResultArray();
foreach ($incidents_referred_listar as $row) {
    array_push($incidents_referred_list, $row["incidents_referred"]);
}
echo "                               \r\n                               \r\n                               \r\n                                <option value=\"\">Select Incidents referred</option>\r\n                                  <option value=\"Health\" ";
if (in_array("Health", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Health</option>\r\n                                \r\n                                  <option value=\"Medical Service\" ";
if (in_array("Medical Service", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Medical Service</option>\r\n                                 \r\n                                  <option value=\"Psychosocial\" ";
if (in_array("Psychosocial", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Psychosocial</option>\r\n                                 \r\n                                  <option value=\"Counseling Service\" ";
if (in_array("Counseling Service", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Counseling Service</option>\r\n                                  <option value=\"Police\" ";
if (in_array("Police", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Police</option>\r\n                              \r\n                                  <option value=\"Other Security Actor\" ";
if (in_array("Other Security Actor", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Other Security Actor</option>\r\n                                  \r\n                                  <option value=\"Legal Assistance Service\" ";
if (in_array("Legal Assistance Service", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Legal Assistance Service</option>\r\n                                  <option value=\"Project Activities\" ";
if (in_array("Project Activities", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Project Activities</option>\r\n                                  <option value=\"Dialogues\" ";
if (in_array("Dialogues", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Dialogues</option>\r\n                                 \r\n                                  <option value=\"Teacher\" ";
if (in_array("Teacher", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Teacher</option>\r\n                               \r\n                                  <option value=\"School Official\" ";
if (in_array("School Official", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">School Official</option>\r\n                                  \r\n                                  <option value=\"Community Leader\" ";
if (in_array("Community Leader", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Community Leader</option>\r\n                                 \r\n                                  <option value=\"Children Department\" ";
if (in_array("Children Department", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Children Department</option>\r\n                                  <option value=\"Safehouse\" ";
if (in_array("Safehouse", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Safehouse</option>\r\n                                  <option value=\"Shelter\" ";
if (in_array("Shelter", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Shelter</option>\r\n                                  <option value=\"Chief\" ";
if (in_array("Chief", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Chief</option>\r\n                                  <option value=\"Other\" ";
if (in_array("Other", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Other</option>\r\n                                \r\n                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Incidents referred. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"services_provided\">Services Provided  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"services_provided[]\" id=\"services_provided\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                            \r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$services_provided_list = [];
$query_services_provided = $db->query("select * FROM cases_map_services_provided where workflow_id = \"" . $pid . "\" ");
$services_provided_listar = $query_services_provided->getResultArray();
foreach ($services_provided_listar as $row) {
    array_push($services_provided_list, $row["services_provided"]);
}
echo "                            \r\n                            \r\n                                <option value=\"\">Select Services Provided</option>\r\n                                  <option value=\"Ref Safe House\" ";
if (in_array("Ref Safe House", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Ref Safe House</option>\r\n                                  <option value=\"Shelter Services Ref\" ";
if (in_array("Shelter Services Ref", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Shelter Services Ref</option>\r\n                                \r\n                                  <option value=\"Health Services\" ";
if (in_array("Health Services", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Health Services</option>\r\n                                  <option value=\"Medical Services\" ";
if (in_array("Medical Services", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Medical Services</option>\r\n                                \r\n                                  <option value=\"Psychosocial Services\" ";
if (in_array("Psychosocial Services", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Psychosocial Services</option>\r\n                                  <option value=\"Counselling Services\" ";
if (in_array("Counselling Services", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Counselling Services</option>\r\n                             \r\n                                  <option value=\"Mediation Services\" ";
if (in_array("Mediation Services", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Mediation Services</option>\r\n                                  <option value=\"Court Process\" ";
if (in_array("Court Process", $services_provided_list)) {
    echo "selected=\"selected\"";
}
echo ">Court Process</option>\r\n                             \r\n                                </select>\r\n                    \t\t\t<div class=\"invalid-feedback\"> Please select a valid Services Provided . </div>\r\n                  </div>\r\n                    \r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>