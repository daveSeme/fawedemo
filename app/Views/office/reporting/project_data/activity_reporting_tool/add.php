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
echo "/public/js/formplugins/ckeditor/ckeditor.js\"></script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/select2/select2.min.js\" defer></script>\r\n\r\n<link href=\"";
echo base_url();
echo "/public/js/select2/select2.min.css\" rel=\"stylesheet\" />\r\n\r\n<script>\r\n\r\n\$(document).ready(function() {\r\n\t\r\n\t\$('#county').select2({placeholder: \"Select County\"});\r\n\t\r\n\t\r\n \t\$(\"#Form\").validate({\r\n\r\n \t\tignore: null,\r\n\r\n    \t \r\n\r\n \t\trules: { },\r\n\r\n \t\tmessages: { }\r\n\r\n \t});\r\n\t\r\n\t\r\n\t\r\n});\r\n</script>\r\n\r\n\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n         <div class=\"\">\r\n\t\t  \t  ";
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
$insert_url = "reporting/project_data/activity_reporting_tool/add";
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where base_id = \"" . $base_id . "\" order by  name");
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
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Activity <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"activity_title\" id=\"activity_title\" placeholder=\"Please enter Activity\" value=\"";
echo set_value("activity_title");
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Activity .</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-md-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"start_date\"><span id=\"title\">Activity Date </span> <span class=\"text-danger\">*</span></label>\r\n                    <div class=\"input-group\">\r\n                      <input type=\"text\" name=\"activity_date\" class=\"form-control\" readonly=\"\"  id=\"activity_date\" data-date-format=\"dd-mm-yyyy\" value=\"";
echo set_value("activity_date");
echo "\" placeholder=\"Please select Activity date\" required>\r\n                      <div class=\"input-group-append\"> <span class=\"input-group-text fs-xl\"> <i class=\"fal fa-calendar-alt\"></i> </span> </div>\r\n                    </div>\r\n                    <div class=\"invalid-feedback\"> Please enter Activity Date. </div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Reported by <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"reported_by\" id=\"reported_by\" placeholder=\"Please enter Reported by\" value=\"";
echo set_value("reported_by");
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Reported by.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  <div class=\"col-6 mb-3\">\r\n                    <label class=\"form-label\" for=\"venue\">Venue <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"venue\" id=\"venue\" placeholder=\"Please enter Venue\" value=\"";
echo set_value("venue");
echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter Venue.</div>\r\n                  </div>\r\n\r\n\r\n      ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"indirect_beneficiaries\">Particiapnts Reached  <span class=\"text-danger\">*</span></label>\r\n                    <input class=\"form-control\" type=\"text\" name=\"particiapnts_reached\" id=\"particiapnts_reached\" placeholder=\"Please enter Total Particiapnts Reached\" value=\"";
// echo set_value("particiapnts_reached");
// echo "\">\r\n                    <div class=\"invalid-feedback\">Please enter No. of Particiapnts Reached .</div>\r\n                  </div>\r\n\r\n\r\n       ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Summary of the Activities<span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"summary_events\" id=\"summary_events\"  class=\"form-control\" placeholder=\"Please enter Summary of the Events\" required>";
echo set_value("summary_events");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Summary of the Activities.</div>\r\n                  </div>\r\n\r\n                    \r\n                    \r\n        ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Objective of the Activity <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"objective_activity\" id=\"objective_activity\"  class=\"ckeditor form-control\" placeholder=\"Please enter Objective of the Activity\" required>";
echo set_value("objective_activity");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter objective of the Activity.</div>\r\n                  </div>\r\n\r\n\r\n\r\n     ";
// echo "<div class=\"col-12 mb-3\" id=\"DIV-direct-Benf\">\r\n                    <table class=\"table table-bordered\">\r\n                    \r\n                         <thead>\r\n                            <tr>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Output No.</th>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Activity</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">0-12</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">13-18</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">19-25</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">26-35</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">36-49</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">50+</th>\r\n                             </tr> \r\n                             \r\n                            <tr>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                             </tr> \r\n                             \r\n                         </thead>\r\n                     \r\n                     <tbody id=\"ActivityData_div\">\r\n                     \r\n                      <tr>\r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n                           \r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n                           \r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n\r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n                           \r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n\r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n\r\n                           <td>&nbsp;</td>\r\n                           <td>&nbsp;</td>\r\n                     </tr>\r\n                      \r\n                     </tbody>\r\n                     \r\n                    </table>\r\n                  </div>\r\n       ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Challenges from the Activity</label>\r\n                    <textarea name=\"emerging_issues_activity\" id=\"emerging_issues_activity\"  class=\"form-control\" placeholder=\"Please enter Challenges from the Activity\">";
// echo set_value("emerging_issues_activity");
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Challenges from the Activity.</div>\r\n                  </div>\r\n                    \r\n                    \r\n       ";

echo "<div class=\"col-12 mb-3\">\r\n         <label class=\"form-label\" for=\"targets\">Targets & Achievements</label>\r\n";
echo "<table class=\"table table-bordered\">\r\n                    \r\n                         ";
echo "<thead>\r\n<tr>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Target.</th>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Achievement</th>\r\n<th bgcolor=\"#cccccc\" rowspan=\"2\">Action</th></thead>\r\n";
echo "<tbody id=\"Targets_Div\"><tr>\r\n <td><input class=\"form-control\" type=\"number\" name=\"target[]\" /></td>\r\n<td><input class=\"form-control\" type=\"number\" name=\"achievement[]\" /></td>\r\n<td><a class=\"btn btn-sm btn-outline-danger btn-icon btn-inline-block mr-1 remove_target_row\" title=\"Remove Row\"><i class=\"fal fa-times\"></i></a></td></tr>\r\n  </tbody>\r\n  </table>\r\n    ";         
echo "<div class=\"col-1 mb-1 float-right\"><a id=\"add_target_row\" class=\"btn btn-sm btn-outline-info btn-icon btn-inline-block mr-1 float-right\" title=\"Add Row\"><i class=\"fal fa-plus\"></i></a></div>";
echo "</div>\r\n       ";

echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"emerging_issues_activity\">Challenges from the Activity </label>\r\n                    <textarea name=\"emerging_issues_activity\" id=\"emerging_issues_activity\"  class=\"form-control ckeditor\" placeholder=\"Please enter Challenges from the Activity\">";
echo set_value("emerging_issues_activity");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Challenges from the Activity.</div>\r\n                  </div>\r\n\r\n\r\n\r\n     ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"lesson_learnt\">Lesson Learnt </label>\r\n                    <textarea name=\"lesson_learnt\" id=\"lesson_learnt\"  class=\"form-control ckeditor\" placeholder=\"Please enter lesson learnt\" required>";
echo set_value("lesson_learnt");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Lesson Learnt.</div>\r\n                  </div>\r\n       ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"recommendations\">Recommendations </label>\r\n                    <textarea name=\"recommendations\" id=\"recommendations\"  class=\"ckeditor form-control\" placeholder=\"Please enter Recommendations\">";
echo set_value("recommendations");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Recommendations.</div>\r\n                  </div>\r\n\r\n\r\n\r\n     ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Way Forward </label>\r\n                    <textarea name=\"way_forward\" id=\"way_forward\"  class=\"form-control\" placeholder=\"Please enter Way Forward\" required>";
// echo set_value("way_forward");
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter a Way Forward .</div>\r\n                  </div>\r\n                    \r\n                    \r\n                    \r\n       ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"lesson_learnt\">Lesson Learnt </label>\r\n                    <textarea name=\"lesson_learnt\" id=\"lesson_learnt\"  class=\"form-control\" placeholder=\"Please enter Key highlights\" required>";
// echo set_value("lesson_learnt");
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Lesson Learnt.</div>\r\n                  </div>\r\n       ";
// echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"recommendations\">Recommendations</label>\r\n                    <textarea name=\"recommendations\" id=\"recommendations\"  class=\"form-control\" placeholder=\"Please enter Recommendations\" required>";
// echo set_value("recommendations");
// echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Recommendations.</div>\r\n                  </div>\r\n                    \r\n                    \r\n          ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_name\">Conclusions </label>\r\n                    <textarea name=\"conclusions\" id=\"conclusions\"  class=\"form-control ckeditor\" placeholder=\"Please enter Conclusions\" required>";
echo set_value("conclusions");
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Conclusions.</div>\r\n                  </div>\r\n\r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_file\">Attach File (to attach multiple file use ctrl button and select the files) </label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"file[]\" id=\"file\" multiple=\"multiple\">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Example valid custom file feedback</div>\r\n                    </div>\r\n                  </div>\r\n\r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                \r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"submit_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                \r\n                  <button class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-save mr-1\"></span> Save as Draft</button>\r\n                  \r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/activity_reporting_tool";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> \r\n                  \r\n                  </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>