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
echo "</i></span> </h2>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  \t  ";
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
echo "           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n\t\t\t\t";
$insert_url = "reporting/project_data/project_quarterly_narrative_report/edit/" . $stdata["id"];
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t ";
if ($stdata["report_status"] == "3") {
    echo "\r\n                 <table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Quarterly Narrative Report</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
    $plan = get_by_id("id", $stdata["project"], "project");
    echo $plan_name = $plan["name"];
    echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
    echo $stdata["project"];
    echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Reporting Period</strong></td>\r\n                            <td>";
    echo $stdata["year"];
    echo " - ";
    echo $stdata["quarter"];
    echo "</td>                            \r\n                          </tr>\r\n                          \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Submitted by</strong></td>\r\n                            <td>\r\n\t\t\t\t\t\t\t\t";
    $users_data = get_by_id("id", $stdata["submitted_by"], "ctbl_users");
    echo $users_data["name"];
    echo "                            </td>                           \r\n                          </tr>\r\n                          \r\n                          \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Status</strong></td>\r\n                            <td>\r\n                            <span class=\"badge badge-pill badge-primary\">\r\n                            ";
    if ($stdata["report_status"] == "1") {
        echo "Draft Report";
    }
    if ($stdata["report_status"] == "2") {
        echo "Under Review";
    }
    if ($stdata["report_status"] == "3") {
        echo "Returned with Suggested Edits";
    }
    if ($stdata["report_status"] == "0") {
        echo "Approved";
    }
    echo " \r\n                            </span>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Previous Remarks/Comments</strong></td>\r\n                            <td>\r\n                            <style> .htr {font-size:14px !important;color:red;list-style:none;}</style>\r\n                              <table border=\"1\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\" style=\"border-collapse:collapse;\">\r\n                                <tbody>\r\n                                  <tr bgcolor=\"#dddddd\">\r\n                                    <td><strong>User (type)</strong></td>\r\n                                    <td><strong>Review Date</strong></td>\r\n                                    <td><strong><i class=\"fa fa-commenting-o fa-2x\">&nbsp;&nbsp;&nbsp;</i>Remarks/Comments</strong></td>\r\n                                  </tr>\r\n\t\t\t\t\t\t\t\t\t";
    $db = Config\Database::connect();
    $query_his = $db->query("select * from activity_reporting_comments_history where workflow_id = '" . $stdata["id"] . "' order by id desc");
    $results_his = $query_his->getResultArray();
    if (0 < count($results_his)) {
        foreach ($results_his as $row_his) {
            $user_details = get_by_id("id", $row_his["reviwer_id"], "ctbl_users");
            echo "                                  <tr>\r\n                                    <td>";
            echo $user_details["name"];
            echo " (";
            echo $row_his["user_type"];
            echo ")</td>\r\n                                    <td>";
            echo $row_his["review_date"];
            echo "</td>\r\n                                    <td>";
            echo $row_his["reviwer_comments"];
            echo "</td>\r\n                                  </tr>\r\n                                  \r\n                                  ";
        }
        echo "                                  \r\n                                  ";
    } else {
        echo "                                  \r\n                                  <tr>\r\n                                    <td colspan=\"3\"><p class=\"htr\"> No remarks/comments found in database...</p></td>\r\n                                  </tr>\r\n                                  \r\n                                  ";
    }
    echo "                                  \r\n                                </tbody>\r\n                              </table>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Remarks/Comments <span class=\"required\">*</span></strong></td>\r\n                          <td><textarea name=\"reviwer_comments\" style=\"width:100%; height:70px;\" class=\"required\"></textarea></td>\r\n                        </tr>\r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Attachment </strong></td>\r\n                          <td>\r\n                          ";
    if ($stdata["report_file"] != "") {
        echo "                           <a href=\"";
        echo base_url() . "/public/uploads/review_approve/" . $stdata["report_file"];
        echo "\"><span class=\"fal fa-download mr-1\"></span> Download File</a>\r\n                           ";
    }
    echo "                          </td>\r\n                        </tr>\r\n                          \r\n                          \r\n                   </tbody>\r\n                 </table>         \r\n\r\n\r\n\r\n\t\t\t ";
}
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<input type=\"hidden\" name=\"id\" class=\"form-control\" id=\"id\" value=\"";
echo $stdata["id"];
echo "\">\r\n\t\t\t\t <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"strategic_plan\">Project <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"project\" id=\"project\" required=\"\">\r\n                      <option value=\"\">Select  Project</option>\r\n                       ";
$db = Config\Database::connect();
$query = $db->query("SELECT  * FROM project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "               <option value=\"";
    echo $row["id"];
    echo "\" ";
    if ($stdata["project"] == $row["id"]) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $row["name"];
    echo "</option>\r\n ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Project. </div>\r\n                  </div>\r\n\t\t\t\t\r\n                 <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"year\">Year <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"year\" id=\"year\" required=\"\">\r\n                      <option value=\"\">Select Year</option>\r\n                       ";
$query = $db->query("SELECT  * FROM project where id=\"" . $stdata["project"] . "\"");
$row = $query->getRowArray();
$startdate = date("Y", strtotime($row["start_date"]));
$enddate = date("Y", strtotime($row["end_date"]));
$diff = $enddate - $startdate + 1;
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "\t\t\t\t\t\t\t\t   <option value=\"";
    echo $i;
    echo "\" ";
    if ($stdata["year"] == $i) {
        echo "selected=\"selected\"";
    }
    echo ">";
    echo $i;
    echo "</option>\r\n\t\t\t\t\t ";
}
echo "                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a valid Year. </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"quarter\">Quarter <span class=\"text-danger\">*</span></label>\r\n                    <select class=\"custom-select cls_type\" name=\"quarter\" id=\"quarter\" required=\"\">\r\n                      <option value=\"\">Select Quarter</option>\r\n                      <option value=\"Q1\" ";
if ($stdata["quarter"] == "Q1") {
    echo "selected=\"selected\"";
}
echo " >Q1</option>\r\n                      <option value=\"Q2\" ";
if ($stdata["quarter"] == "Q2") {
    echo "selected=\"selected\"";
}
echo " >Q2</option>\r\n                      <option value=\"Q3\" ";
if ($stdata["quarter"] == "Q3") {
    echo "selected=\"selected\"";
}
echo " >Q3</option>\r\n                      <option value=\"Q4\" ";
if ($stdata["quarter"] == "Q4") {
    echo "selected=\"selected\"";
}
echo " >Q4</option>\r\n                    </select>\r\n                    <div class=\"invalid-feedback\"> Please select a Quarter </div>\r\n                  </div>\r\n                \r\n                \r\n                \r\n                \r\n                \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"key_highlights\">Key highlights on your activities and interventions during this reporting period <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"key_highlights\" id=\"key_highlights\"  class=\"ckeditor form-control\" placeholder=\"Please enter Key highlights\" required>";
echo $stdata["key_highlights"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter a Key highlights.</div>\r\n                  </div>\r\n\r\n                  \r\n                  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"challenges_experienced\">Challenges experienced and Mitigating measure <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"challenges_experienced\" id=\"challenges_experienced\"  class=\"ckeditor form-control\" placeholder=\"Please enter Challenges experienced\" required>";
echo $stdata["challenges_experienced"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Challenges experienced.</div>\r\n                  </div>\r\n                  \r\n                    \r\n               \r\n\r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"success_stories\">Success Stories/Best Practice/Lessons Learned <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"success_stories\" id=\"success_stories\"  class=\"ckeditor form-control\" placeholder=\"Please enter Success Stories/Best Practice/Lessons Learned\" required>";
echo $stdata["success_stories"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Success Stories/Best Practice/Lessons Learned .</div>\r\n                  </div>\r\n                                        \r\n                \r\n                    \r\n\t\t\t\t";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"gender_action_plan\">Gender Action Plan <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"gender_action_plan\" id=\"gender_action_plan\"  class=\"ckeditor form-control\" placeholder=\"Please enter the Gender Action Plan\" required>";
echo $stdata["gender_action_plan"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter the Gender Action Plan.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"environmental_social_safeguards\">Environmental and Social Safeguards <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"environmental_social_safeguards\" id=\"environmental_social_safeguards\"  class=\"ckeditor form-control\" placeholder=\"Please enter the Environmental Social Safeguards\" required>";
echo $stdata["environmental_social_safeguards"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter the Environmental Social Safeguards.</div>\r\n                  </div>\r\n                    \r\n                    \r\n                  ";
echo "<div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"activities_anticipated\">Activities Anticipated for Next Reporting Period <span class=\"text-danger\">*</span></label>\r\n                    <textarea name=\"activities_anticipated\" id=\"activities_anticipated\"  class=\"ckeditor form-control\" placeholder=\"Please enter Activities Anticipated\" required>";
echo $stdata["activities_anticipated"];
echo "</textarea>\r\n                    <div class=\"invalid-feedback\">Please enter Activities Anticipated.</div>\r\n                  </div>                  \r\n                    \r\n                    \r\n               \r\n\t\t\t\t  \r\n\t\t\t\t  \r\n                  <div class=\"col-12 mb-3\">\r\n                    <label class=\"form-label\" for=\"report_file\">Attach File (to attach multiple file use ctrl button and select the files)  </label>\r\n                    <div class=\"custom-file\">\r\n                        <input type=\"file\" class=\"custom-file-input is-valid\" name=\"file[]\" id=\"file\" multiple=\"multiple\">\r\n                        <label class=\"custom-file-label\" for=\"customControlValidationSuccess7\">Choose file...</label>\r\n                        <div class=\"invalid-feedback\">Example valid custom file feedback</div>\r\n                    </div>\r\n                  </div>\r\n                  \r\n\t\t\t\t  \r\n\t\t\t\t  <div class=\"col-12 mb-3\">\r\n\t\t\t\t   \r\n               \t <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Documents </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Action </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_files = $db->query("select * from project_narrative_report_documents where workflow_id = '" . $stdata["id"] . "' and type = 'Quarterly Report' order by id ");
$results_file = $query_files->getResultArray();
$i = 1;
foreach ($results_file as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td>\r\n\t\t\t\t\t\t\t<a href=\"";
    echo base_url() . "/public/uploads/project_quarterly_narrative_report/" . $row_file["documents"];
    echo "\"><span class=\"fal fa-check mr-1\"></span>";
    echo $row_file["documents"];
    echo "</a>                          \r\n                          </td>\r\n                          <td>\r\n                           <a href=\"";
    echo base_url("reporting/project_data/project_quarterly_narrative_report/delete_docs/" . $row_file["id"] . "/" . $stdata["id"]);
    echo "\"  onclick=\"return confirm('Are you sure you want to delete this item')\" class=\"btn btn-sm btn-danger btn-icon btn-inline-block mr-1\" title=\"Delete Record\"><i class=\"fal fa-trash\"></i></a> \r\n                          </td>\r\n                          \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                   \r\n                  </div>\r\n                  \r\n                  \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <button onclick=\"return confirm('Are you sure you want to submit this report ?')\"\r\n class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"submit_report\"><span class=\"fal fa-paper-plane mr-1\"></span> Submit</button>\r\n                \r\n                  <button class=\"btn btn-primary\" type=\"submit\" name=\"action\" value=\"save_report\"><span class=\"fal fa-save mr-1\"></span> Save as Draft</button>\r\n                  \r\n                  \r\n                  \r\n                  \r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/project_quarterly_narrative_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>