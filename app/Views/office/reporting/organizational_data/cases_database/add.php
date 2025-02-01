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
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#type_gbv').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#incidents_referred').select2({placeholder: \"Select Thematic Area\"});\r\n\t\$('#case_context').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n\t\$('#services_provided').select2({placeholder: \"Select Thematic Area\"});\r\n\t\r\n    \$('#person_responsible').select2();\r\n    \$('#implementing_partner').select2();\r\n    \$('#county').select2();\r\n\t\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
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
$insert_url = "reporting/organizational_data/cases_database/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" novalidate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"date\"><span id=\"title\">Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"date\" class=\"form-control\" id=\"date\" value=\"";
echo set_value("date");
echo "\" placeholder=\"Please Enter Date of Case Registration\" required=\"\" readonly=\"readonly\">\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Date of Case Registration. </div>\r\n                  </div>\t\t\t\t  \r\n\t\t\t\t  \r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"case_type\">Case type <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"case_type\" id=\"case_type\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Case type</option>\r\n                      <option value=\"New\">New</option>\r\n                      <option value=\"Follow Up\">Follow Up</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case type. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n                  \r\n                  <div class=\"col-6 mb-3\">\r\n\t\t\t\t   ";
$case_number = substr(str_shuffle("0123456789"), 0, 5);
echo "                    <label class=\"form-label\" for=\"case_number\"><span id=\"title\">Case Number</span> <span class=\"text-danger\">*</span></label>\r\n                    <input type=\"text\" name=\"case_number\" class=\"form-control\" id=\"case_number\" value=\"";
echo $case_number;
echo "\" readonly=\"readonly\"  required=\"\">\r\n                    <div class=\"invalid-feedback\"> Please enter Case Number. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"file_number\"><span id=\"title\">File Number</span> </label>\r\n                    <input type=\"text\" name=\"file_number\" class=\"form-control\" id=\"file_number\" value=\"";
echo set_value("file_number");
echo "\">\r\n                    <div class=\"invalid-feedback\"> Please enter File Number. </div>\r\n                  </div>\r\n\r\n\r\n                  \r\n               \r\n\t\t\t\t    \t<div class=\"col-12 mb-3\" >\r\n                   \t\t\t <label class=\"form-label\" for=\"sector\">Field Office <span class=\"text-danger\">*</span></label>\r\n                             <select name=\"field_office\" id=\"field_office\" class=\"custom-select\">\r\n                                <option value=\"\">Select Field Office</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("select * from field_office order by name ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                \r\n                             <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("implementing_partner") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                   \t\t\t <div class=\"invalid-feedback\"> Please select a valid Field Office. </div>\r\n                  \t\t</div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"age_survivor\">Age of Survivor <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"age_survivor\" id=\"age_survivor\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Age of Survivor</option>\r\n                      <option value=\"18 yrs and Younger\">18 yrs and Younger</option>\r\n                      <option value=\"19-26 yrs\">19-26 yrs</option>\r\n                      <option value=\"27-49 yrs\">27-49 yrs</option>\r\n                      <option value=\"50 yrs and older\">50 yrs and older</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Age of Survivor. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"gender\"><span id=\"title\">Gender </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                    <select name=\"gender\" id=\"gender\" class=\"custom-select\">\r\n                      <option value=\"\">Select Gender</option>\r\n                      <option value=\"Male\">Male</option>\r\n                      <option value=\"Female\">Female</option>\r\n                      <option value=\"Others\">Others</option>\r\n                    </select>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please select Gender. </div>\r\n                  </div>\r\n                  \r\n                  \r\n<!--                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"male\"><span id=\"title\">Total Male </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n \t\t\t\t\t\t<input type=\"text\" name=\"male\" class=\"form-control\" id=\"male\" value=\"";
echo set_value("male");
echo "\" placeholder=\"Enter Total No. of Male\" required=\"\">\r\n                        </div>\r\n                    <div class=\"invalid-feedback\"> Please select Male. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"male\"><span id=\"title\">Total Female </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n \t\t\t\t\t\t<input type=\"text\" name=\"female\" class=\"form-control\" id=\"female\" value=\"";
echo set_value("female");
echo "\" placeholder=\"Enter Total No. of female\" required=\"\">\r\n                        </div>\r\n                    <div class=\"invalid-feedback\"> Please select Female. </div>\r\n                  </div>\r\n-->                  \r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"gender\"><span id=\"title\">Diversity  </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                    <select name=\"diversity\" id=\"diversity\" class=\"custom-select\">\r\n                      <option value=\"\">Select Diversity</option>\r\n                      <option value=\"PWD\">PWD</option>\r\n                      <option value=\"LGBTQ\">LGBTQ</option>\r\n                    </select>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please select Diversity. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"diversity_male\"><span id=\"title\">Total Male </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n \t\t\t\t\t\t<input type=\"text\" name=\"diversity_male\" class=\"form-control\" id=\"diversity_male\" value=\"";
echo set_value("diversity_male");
echo "\" placeholder=\"Enter Total No. of Male\" required=\"\">\r\n                        </div>\r\n                    <div class=\"invalid-feedback\"> Please select Male. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  <div class=\"col-md-4 mb-3\">\r\n                    <label class=\"form-label\" for=\"diversity_female\"><span id=\"title\">Total Female </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n \t\t\t\t\t\t<input type=\"text\" name=\"diversity_female\" class=\"form-control\" id=\"diversity_female\" value=\"";
echo set_value("diversity_female");
echo "\" placeholder=\"Enter Total No. of female\" required=\"\">\r\n                        </div>\r\n                    <div class=\"invalid-feedback\"> Please select Female. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"economic_status\"><span id=\"title\">Economic Status  </span> </label>\r\n                    <div class=\"input-group\">\r\n                    <select name=\"economic_status\" id=\"economic_status\" class=\"custom-select\">\r\n                      <option value=\"\">Select Economic Status</option>\r\n                      <option value=\"ES-1\">ES-1</option>\r\n                      <option value=\"ES-2\">ES-2</option>\r\n                      <option value=\"ES-3\">ES-3</option>\r\n                    </select>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please select Economic Status. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  \r\n                  <div class=\"col-md-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"place_residence\"><span id=\"title\">Place of Residence </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"place_residence\" class=\"form-control\" id=\"place_residence\" value=\"";
echo set_value("place_residence");
echo "\" placeholder=\"Please Enter Place of Residence\" required=\"\">\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Place of Residence. </div>\r\n                  </div>\r\n\r\n\r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"countries\">County <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"county\" id=\"county\" class=\"custom-select\" >\r\n                                <option value=\"\">select Chapter</option>\r\n                                ";
$db = Config\Database::connect();
$query = $db->query("SELECT name, id FROM mas_county ");
$results = $query->getResult();
foreach ($results as $row) {
    echo "                                <option value=\"";
    echo $row->id;
    echo "\" ";
    if (set_value("countries") == $row->id) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row->name;
    echo "</option>\r\n                                ";
}
echo "                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid County. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"marital_status\">Marital Status of Survivor <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"marital_status\" id=\"marital_status\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Marital Status</option>\r\n                      <option value=\"Single\" ";
if (set_value("marital_status") == "Single") {
    echo "selected=\"selected\"";
}
echo ">Single</option>\r\n                      <option value=\"Married\" ";
if (set_value("marital_status") == "Married") {
    echo "selected=\"selected\"";
}
echo ">Married</option>\r\n                      <option value=\"Cohabiting\" ";
if (set_value("marital_status") == "Cohabiting") {
    echo "selected=\"selected\"";
}
echo ">Cohabiting</option>\r\n                      <option value=\"Divorced\" ";
if (set_value("marital_status") == "Divorced") {
    echo "selected=\"selected\"";
}
echo ">Divorced</option>\r\n                      <option value=\"Separated\" ";
if (set_value("marital_status") == "Separated") {
    echo "selected=\"selected\"";
}
echo ">Separated</option>\r\n                      <option value=\"Widowed\" ";
if (set_value("marital_status") == "Widowed") {
    echo "selected=\"selected\"";
}
echo ">Widowed</option>\r\n                       <option value=\"N/A\" ";
if (set_value("marital_status") == "N/A") {
    echo "selected=\"selected\"";
}
echo ">N/A</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Marital Status of Survivor. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                     \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Annual Repoting Timeline has Ended-------------------------------------------->                   \r\n\r\n\r\n\r\n\r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"countries\">Type of GBV reported  <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"type_gbv[]\" id=\"type_gbv\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                  <option value=\"\">Select Type of GBV reported</option>\r\n                                  <option value=\"Rape\" ";
if (set_value("type_gbv") == "Rape") {
    echo "selected=\"selected\"";
}
echo ">Rape</option>\r\n                                  <option value=\"Defilement\" ";
if (set_value("type_gbv") == "Defilement") {
    echo "selected=\"selected\"";
}
echo ">Defilement</option>\r\n                                  <option value=\"Sexual Assault\" ";
if (set_value("type_gbv") == "Sexual Assault") {
    echo "selected=\"selected\"";
}
echo ">Sexual Assault</option>\r\n                                  <option value=\"Physical Assault\" ";
if (set_value("type_gbv") == "Physical Assault") {
    echo "selected=\"selected\"";
}
echo ">Physical Assault</option>\r\n                                  <option value=\"Sodomy\" ";
if (set_value("type_gbv") == "Sodomy") {
    echo "selected=\"selected\"";
}
echo ">Sodomy</option>\r\n                                  <option value=\"Incest\" ";
if (set_value("type_gbv") == "Incest") {
    echo "selected=\"selected\"";
}
echo ">Incest</option>\r\n                                  <option value=\"Forced Marriage\" ";
if (set_value("type_gbv") == "Forced Marriage") {
    echo "selected=\"selected\"";
}
echo ">Forced Marriage</option>\r\n                                  <option value=\"Denial of Resources\" ";
if (set_value("type_gbv") == "Denial of Resources") {
    echo "selected=\"selected\"";
}
echo ">Denial of Resources</option>\r\n                                  <option value=\"Psych\" ";
if (set_value("type_gbv") == "Psych") {
    echo "selected=\"selected\"";
}
echo ">Psych</option>\r\n                                  <option value=\"Emotional Abuse\" ";
if (set_value("type_gbv") == "Emotional Abuse") {
    echo "selected=\"selected\"";
}
echo ">Emotional Abuse</option>\r\n                                </select>\r\n                    \t<div class=\"invalid-feedback\"> Please select a valid Type of GBV reported . </div>\r\n                  </div>\r\n\r\n\t\t\t\t  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"case_context\">Case Context <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"case_context[]\" id=\"case_context\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Case Context</option>\r\n                                  <option value=\"Intimate Partner Violence\" ";
if (set_value("case_context") == "Intimate Partner Violence") {
    echo "selected=\"selected\"";
}
echo ">Intimate Partner Violence</option>\r\n                                  <option value=\"Domestic Violence\" ";
if (set_value("case_context") == "Domestic Violence") {
    echo "selected=\"selected\"";
}
echo ">Domestic Violence</option>\r\n                                  \r\n                                  <option value=\"Child Abuse\" ";
if (set_value("case_context") == "Child Abuse") {
    echo "selected=\"selected\"";
}
echo ">Child Abuse</option>\r\n                                  \r\n                                  <option value=\"Early Mariage\" ";
if (set_value("case_context") == "Early Mariage") {
    echo "selected=\"selected\"";
}
echo ">Early Mariage</option>\r\n                                 \r\n                                  <option value=\"Possible Sexual Exploitation\" ";
if (set_value("case_context") == "Possible Sexual Exploitation") {
    echo "selected=\"selected\"";
}
echo ">Possible Sexual Exploitation</option>\r\n                                \r\n                                  <option value=\"Harmful Traditional Practices\" ";
if (set_value("case_context") == "Harmful Traditional Practices") {
    echo "selected=\"selected\"";
}
echo ">Harmful Traditional Practices</option>\r\n                                 \r\n                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case Context. </div>\r\n                  </div>\r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n                    <label class=\"form-label\" for=\"incidents_referred\">Incidents referred from other service providers <span class=\"text-danger\">*</span></label>\r\n                            <select name=\"incidents_referred[]\" id=\"incidents_referred\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                                <option value=\"\">Select Incidents referred</option>\r\n                                  <option value=\"Health\" ";
if (set_value("incidents_referred") == "Health") {
    echo "selected=\"selected\"";
}
echo ">Health</option>\r\n                                \r\n                                  <option value=\"Medical Service\" ";
if (set_value("incidents_referred") == "Medical Service") {
    echo "selected=\"selected\"";
}
echo ">Medical Service</option>\r\n                                 \r\n                                  <option value=\"Psychosocial\" ";
if (set_value("incidents_referred") == "Psychosocial") {
    echo "selected=\"selected\"";
}
echo ">Psychosocial</option>\r\n                                 \r\n                                  <option value=\"Counseling Service\" ";
if (set_value("incidents_referred") == "Counseling Service") {
    echo "selected=\"selected\"";
}
echo ">Counseling Service</option>\r\n                                  <option value=\"Police\" ";
if (set_value("incidents_referred") == "Police") {
    echo "selected=\"selected\"";
}
echo ">Police</option>\r\n                              \r\n                                  <option value=\"Other Security Actor\" ";
if (set_value("incidents_referred") == "Other Security Actor") {
    echo "selected=\"selected\"";
}
echo ">Other Security Actor</option>\r\n                                  \r\n                                  <option value=\"Legal Assistance Service\" ";
if (set_value("incidents_referred") == "Legal Assistance Service") {
    echo "selected=\"selected\"";
}
echo ">Legal Assistance Service</option>\r\n                                  <option value=\"Project Activities\" ";
if (set_value("incidents_referred") == "Project Activities") {
    echo "selected=\"selected\"";
}
echo ">Project Activities</option>\r\n                                  <option value=\"Dialogues\" ";
if (set_value("incidents_referred") == "Dialogues") {
    echo "selected=\"selected\"";
}
echo ">Dialogues</option>\r\n                                 \r\n                                  <option value=\"Teacher\" ";
if (set_value("incidents_referred") == "Teacher") {
    echo "selected=\"selected\"";
}
echo ">Teacher</option>\r\n                               \r\n                                  <option value=\"School Official\" ";
if (set_value("incidents_referred") == "School Official") {
    echo "selected=\"selected\"";
}
echo ">School Official</option>\r\n                                  \r\n                                  <option value=\"Community Leader\" ";
if (set_value("incidents_referred") == "Community Leader") {
    echo "selected=\"selected\"";
}
echo ">Community Leader</option>\r\n                                 \r\n                                  <option value=\"Children Department\" ";
if (set_value("incidents_referred") == "Children Department") {
    echo "selected=\"selected\"";
}
echo ">Children Department</option>\r\n                                  <option value=\"Safehouse\" ";
if (set_value("incidents_referred") == "Safehouse") {
    echo "selected=\"selected\"";
}
echo ">Safehouse</option>\r\n                                  <option value=\"Shelter\" ";
if (set_value("incidents_referred") == "Shelter") {
    echo "selected=\"selected\"";
}
echo ">Shelter</option>\r\n                                  <option value=\"Chief\" ";
if (set_value("incidents_referred") == "Chief") {
    echo "selected=\"selected\"";
}
echo ">Chief</option>\r\n                                  <option value=\"Other\" ";
if (set_value("incidents_referred") == "Other") {
    echo "selected=\"selected\"";
}
echo ">Other</option>\r\n                                \r\n                                </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Incidents referred. </div>\r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                  \r\n\t\t\t\t    <div class=\"col-12 mb-3\" >\r\n        <label class=\"form-label\" for=\"services_provided\">Services Provided  <span class=\"text-danger\">*</span></label>\r\n                <select name=\"services_provided[]\" id=\"services_provided\" class=\"custom-select thematic_area\" multiple=\"multiple\">\r\n                    <option value=\"\">Select Services Provided</option>\r\n                      <option value=\"Ref Safe House\" ";
if (set_value("services_provided") == "Ref Safe House") {
    echo "selected=\"selected\"";
}
echo ">Ref Safe House</option>\r\n                      <option value=\"Shelter Services Ref\" ";
if (set_value("services_provided") == "Shelter Services Ref") {
    echo "selected=\"selected\"";
}
echo ">Shelter Services Ref</option>\r\n                      <option value=\"Health Services\" ";
if (set_value("services_provided") == "Health Services") {
    echo "selected=\"selected\"";
}
echo ">Health Services</option>\r\n                      <option value=\"Medical Services\" ";
if (set_value("services_provided") == "Medical Services") {
    echo "selected=\"selected\"";
}
echo ">Medical Services</option>\r\n                      <option value=\"Psychosocial Services\" ";
if (set_value("services_provided") == "Psychosocial Services") {
    echo "selected=\"selected\"";
}
echo ">Psychosocial Services</option>\r\n                      <option value=\"Counselling Services\" ";
if (set_value("services_provided") == "Counselling Services") {
    echo "selected=\"selected\"";
}
echo ">Counselling Services</option>\r\n                      <option value=\"Mediation Services\" ";
if (set_value("services_provided") == "Mediation Services") {
    echo "selected=\"selected\"";
}
echo ">Mediation Services</option>\r\n                      <option value=\"Court Process\" ";
if (set_value("services_provided") == "Court Process") {
    echo "selected=\"selected\"";
}
echo ">Court Process</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Services Provided . </div>\r\n                  </div>\r\n                    \r\n\t\t\t\t\t\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">More information on the services provided </span> </label>\r\n                    <textarea  name=\"more_details_on_services_provided\" class=\"form-control\" id=\"more_details_on_services_provided\" placeholder=\"Please enter more details on Services Provided if any\">";
echo set_value("more_details_on_services_provided");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter more information on the services provided. </div>\r\n                  </div>\r\n\t\t\t\t  \r\n\t\t\t\t\t\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"case_status\">Case Status <span class=\"text-danger\">*</span></label>\r\n                    <select name=\"case_status\" id=\"case_status\" class=\"custom-select select2\">\r\n                      <option value=\"\">Select Case Status</option>\r\n                      <option value=\"New\" ";
if (set_value("case_status") == "New") {
    echo "selected=\"selected\"";
}
echo ">New</option>\r\n                      <option value=\"Ongoing\" ";
if (set_value("case_status") == "Ongoing") {
    echo "selected=\"selected\"";
}
echo ">Ongoing</option>\r\n                      <option value=\"Stood over Generally\" ";
if (set_value("case_status") == "Stood over Generally") {
    echo "selected=\"selected\"";
}
echo ">Stood over Generally(SOG)</option>\r\n                      <option value=\"Out of Court Settlement\" ";
if (set_value("case_status") == "Out of Court Settlement") {
    echo "selected=\"selected\"";
}
echo ">Out of Court Settlement</option>\r\n                      <option value=\"Closed\" ";
if (set_value("case_status") == "Closed") {
    echo "selected=\"selected\"";
}
echo ">Closed</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Case Status of Survivor. </div>\r\n                  </div>\r\n\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"name\"><span id=\"title\">Additional Comments</span> </label>\r\n                    <textarea  name=\"comments\" class=\"form-control\" id=\"comments\" placeholder=\"Please enter Additional Comments if any\">";
echo set_value("comments");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\"> Please enter Additional Comments. </div>\r\n                  </div>\r\n\r\n\r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" name=\"action\" value=\"save\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Save</button>\r\n                  <button class=\"btn btn-success ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>