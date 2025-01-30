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
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#case_category').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#incidents_referred').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#case_context').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n\t\$('#services_provided').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n    \$('#person_responsible').select2();\r\n    \$('#implementing_partner').select2();\r\n\t\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"\">\r\n             \r\n\t\t  ";
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
echo "\">\r\n\t\t\t\t  \r\n\t\t\t\t<div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"date\"><span id=\"title\">Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"date\" class=\"form-control\" id=\"date\" value=\"";
echo changeDateFormat("d-m-Y", $stdata["date"]);
echo "\" placeholder=\"Please Enter Date of Case Registration\" required=\"\" readonly=\"readonly\">\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Date of Case Registration. </div>\r\n                  </div>\t\t\t\t  \r\n\r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"case_type\">Case type <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"case_type\" id=\"case_type\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Case type</option>\r\n                      <option value=\"New\" ";
if ($stdata["case_type"] == "New") {
    echo "selected=\"selected\"";
}
echo ">New</option>\r\n                      <option value=\"Follow Up\" ";
if ($stdata["case_type"] == "Follow Up") {
    echo "selected=\"selected\"";
}
echo ">Follow Up</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case type. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n                  \r\n                  <div class=\"col-6 mb-3\">\r\n\t\t\t\t   \r\n                    <label class=\"form-label\" for=\"case_number\"><span id=\"title\">Case Number</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"case_number\" class=\"form-control\" id=\"case_number\" value=\"";
echo $stdata["case_number"];
echo "\" readonly=\"readonly\"  required=\"\">\r\n                    <div class=\"invalid-feedback\"> Please enter Case Number. </div>\r\n                  </div>\r\n                  \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"file_number\"><span id=\"title\">File Number</span> </label>\r\n                    <input type=\"text\" name=\"file_number\" class=\"form-control\" id=\"file_number\" value=\"";
echo $stdata["file_number"];
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter File Number. </div>\r\n                  </div>\r\n                  \r\n                  \r\n               \r\n\t\t\t\t    \t<div class=\"col-12 mb-3\" >\r\n                   \t\t\t <label class=\"form-label\" for=\"sector\">Field Office <span class=\"text-danger\">*</span></label>\r\n                             <select name=\"field_office\" id=\"field_office\" class=\"custom-select\">\r\n                                <option value=\"\">Select Field Office</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from field_office order by name ");
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
echo "                                </select>\r\n                   \t\t\t <div class=\"invalid-feedback\"> Please select a valid Field Office. </div>\r\n                  \t\t</div>\r\n\r\n\r\n                   <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"counties\">County <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"county\" id=\"county\" class=\"custom-select\" >\r\n                                <option value=\"\">Select county</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("SELECT name, id FROM mas_county ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if ($stdata["county"] == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid County. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"counties\">Case Category reported  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"case_category[]\" id=\"case_category\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                  <option value=\"\">Select Case Category reported</option>\r\n                               \r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$case_category_list = [];
$query_cc = $db->query("SELECT * FROM cases_map_case_category where workflow_id = \"" . $pid . "\" ");
$cc_listar = $query_cc->getResultArray();
foreach ($cc_listar as $row) {
    array_push($case_category_list, $row["case_category"]);
}
echo "                                  \r\n                                  <option value=\"C001\" ";
if (in_array("C001", $case_category_list)) {
    echo "selected=\"selected\"";
}
echo ">Waste Management</option>\r\n                                  <option value=\"C002\" ";
if (in_array("C002", $case_category_list)) {
    echo "selected=\"selected\"";
}
echo ">Water Pollution</option>\r\n                                   <option value=\"C003\" ";
if (in_array("C003", $case_category_list)) {
    echo "selected=\"selected\"";
}
echo ">Air Pollution</option>\r\n                                   <option value=\"C004\" ";
if (in_array("C004", $case_category_list)) {
    echo "selected=\"selected\"";
}
echo ">Noise Pollution</option>\r\n                                   <option value=\"C005\" ";
if (in_array("C005", $case_category_list)) {
    echo "selected=\"selected\"";
}
echo ">Soil Degradation</option>\r\n                                </select>\r\n                    \t<div class=\"invalid-feedback\"> Please select a valid Case Category reported . </div>\r\n                  </div>\r\n\r\n\t\t\t\t  \r\n                  \r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"case_context\">Case Context <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"case_context[]\" id=\"case_context\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Case Context</option>\r\n\t\t\t\t\t\t\t\t\t";
$db = Config\Database::connect();
$case_context_list = [];
$query_case_context = $db->query("SELECT * FROM cases_map_case_context where workflow_id = \"" . $pid . "\" ");
$case_context_listar = $query_case_context->getResultArray();
foreach ($case_context_listar as $row) {
    array_push($case_context_list, $row["case_context"]);
}
echo "                                \r\n                                \r\n                                  <option value=\"CT001\" ";
if (in_array("CT001", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Improper disposal of diapers</option>\r\n                                  <option value=\"CT002\" ";
if (in_array("CT002", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Littering in public spaces</option>\r\n                                  \r\n                                  <option value=\"CT003\" ";
if (in_array("CT003", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Discharging untreated sewage into rivers</option>\r\n                                  \r\n                                  <option value=\"CT004\" ";
if (in_array("CT004", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Dumping plastics in lakes</option>\r\n                                 \r\n                                  <option value=\"CT005\" ";
if (in_array("CT005", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Burning of waste in open spaces</option>\r\n                                \r\n                                  <option value=\"CT006\" ";
if (in_array("CT006", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Excessive vehicle emissions</option>\r\n                                \r\n                                  <option value=\"CT007\" ";
if (in_array("CT007", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Loud music from nightclubs in residential areas</option>\r\n                                \r\n                                  <option value=\"CT008\" ";
if (in_array("CT008", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Construction noise during prohibited hours</option>\r\n                                \r\n                                  <option value=\"CT009\" ";
if (in_array("CT009", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Sand harvesting</option>\r\n                                \r\n                                  <option value=\"CT010\" ";
if (in_array("CT010", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Illegal mining activities</option>\r\n                                \r\n                                  <option value=\"CT011\" ";
if (in_array("CT011", $case_context_list)) {
    echo "selected=\"selected\"";
}
echo ">Deforestation</option>\r\n                                 \r\n                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case Context. </div>\r\n                  </div>\r\n                  \r\n                  \r\n\t\t\t\t   \r\n                    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"incidents_referred\">Incidents referred from other service providers <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"incidents_referred[]\" id=\"incidents_referred\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n\t\t\t\t\t\t\t\t\t";
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
echo ">Medical Service</option>\r\n                                 \r\n                                  <option value=\"Police\" ";
if (in_array("Police", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Police</option>\r\n                              \r\n                                  <option value=\"Other Security Actor\" ";
if (in_array("Other Security Actor", $incidents_referred_list)) {
    echo "selected=\"selected\"";
}
echo ">Other Security Actor</option>\r\n                                  \r\n                                  <option value=\"Project Activities\" ";
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
echo ">Community Leader</option>\r\n                                 \r\n                                  <option value=\"Safehouse\" ";
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
echo ">Court Process</option>\r\n                             \r\n                                </select>\r\n                    \t\t\t<div class=\"invalid-feedback\"> Please select a valid Services Provided . </div>\r\n                  </div>\r\n                    \r\n\t\t\t\t\t\r\n                    \r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">More information on the services provided </span> </label>\r\n                    <textarea  name=\"more_details_on_services_provided\" class=\"form-control\" id=\"more_details_on_services_provided\" placeholder=\"Please enter more details on Services Provided if any\">";
echo $stdata["more_details_on_services_provided"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter more information on the services provided. </div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"case_status\">Case Status <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"case_status\" id=\"case_status\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Case Status</option>\r\n                      <option value=\"New\" ";
if ($stdata["case_status"] == "New") {
    echo "selected=\"selected\"";
}
echo ">New</option>\r\n                      <option value=\"Ongoing\" ";
if ($stdata["case_status"] == "Ongoing") {
    echo "selected=\"selected\"";
}
echo ">Ongoing</option>\r\n                      <option value=\"Stood over Generally\" ";
if ($stdata["case_status"] == "Stood over Generally") {
    echo "selected=\"selected\"";
}
echo ">Stood over Generally(SOG)</option>\r\n                      <option value=\"Out of Court Settlement\" ";
if ($stdata["case_status"] == "Out of Court Settlement") {
    echo "selected=\"selected\"";
}
echo ">Out of Court Settlement</option>\r\n                      <option value=\"Closed\" ";
if ($stdata["case_status"] == "Closed") {
    echo "selected=\"selected\"";
}
echo ">Closed</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case Status of Survivor. </div>\r\n                  </div>\r\n\t\t\t\t\t\r\n                    \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">Additional Comments</span> </label>\r\n                    <textarea  name=\"comments\" class=\"form-control\" id=\"comments\" placeholder=\"Please enter Additional Comments if any\">";
echo $stdata["comments"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter Additional Comments. </div>\r\n                  </div>\r\n                    \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>