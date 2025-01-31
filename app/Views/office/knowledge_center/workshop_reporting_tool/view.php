<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/knowledge_center/workshop_reporting_tool/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/knowledge_center/workshop_reporting_tool/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/knowledge_center/workshop_reporting_tool/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/knowledge_center/workshop_reporting_tool/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n      <div class=\"panel-container show\">\r\n        <div> \r\n          \r\n          <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>--> \r\n        </div>\r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n            <div class=\"form-row\"> \r\n              \r\n<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t ";
if ($stdata["report_status"] != "1") {
    echo "\r\n                 <table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" class=\"table table-bordered\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Workshop Reporting</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
    $plan = get_by_id("id", $stdata["project"], "project");
    echo $plan_name = $plan["name"];
    echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
    echo $stdata["project"];
    echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Activity</strong></td>\r\n                            <td>";
    echo $stdata["activity_title"];
    echo "</td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Activity Date</strong></td>\r\n                            <td>";
    echo $newDate = date("d/m/Y", strtotime($stdata["activity_date"]));
    echo " </td>                           \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Submitted by</strong></td>\r\n                            <td>\r\n\t\t\t\t\t\t\t\t";
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
    $query_his = $db->query("select * from workshop_reporting_comments_history where workflow_id = '" . $stdata["id"] . "' order by id desc");
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
    echo "                                  \r\n                                </tbody>\r\n                              </table>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Attachment </strong></td>\r\n                          <td>\r\n                          ";
    if ($stdata["report_file"] != "") {
        echo "                           <a href=\"";
        echo base_url() . "/public/uploads/review_approve/" . $stdata["report_file"];
        echo "\"><span class=\"fal fa-download mr-1\"></span> Download File</a>\r\n                           ";
    }
    echo "                          </td>\r\n                        </tr>\r\n                          \r\n                          \r\n                   </tbody>\r\n                 </table>         \r\n\r\n\r\n\r\n\t\t\t ";
}
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n              \r\n              \r\n              \r\n              \r\n              \r\n              <!-- Form Starts here  -->\r\n              \r\n              <table  class=\"table table-bordered m-0\">\r\n                \r\n                \r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
$plan = get_by_id("id", $stdata["project"], "project");
echo $plan_name = $plan["name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Activity</td>\r\n                  <td>";
echo $stdata["activity_title"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Activity Date</td>\r\n                  <td>";
echo $stdata["activity_date"];
echo "</td>\r\n                </tr>\r\n                \r\n             \r\n\r\n\r\n                <tr>\r\n                  <td>Reported by</td>\r\n                  <td>";
echo $stdata["reported_by"];
echo "</td>\r\n                </tr>\r\n                \r\n               \r\n                <tr>\r\n                  <td>Venue </td>\r\n                  <td>";
echo $stdata["venue"];
echo "</td>\r\n                </tr>\r\n                \r\n               ";
// echo " <tr>\r\n                  <td>Particiapnts Reached </td>\r\n                  <td>";
// echo $stdata["particiapnts_reached"];
// echo "</td>\r\n                </tr>\r\n\r\n\r\n         ";
echo "<tr>\r\n                  <td>Objective of the Activity </td>\r\n                  <td>";
echo $stdata["objective_activity"];
echo "</td>\r\n                </tr>\r\n               \r\n                \r\n        ";
// echo "<tr>\r\n                 <td colspan=\"2\">\r\n                 \r\n\t\t\t\t\t<table class=\"table table-bordered\">\r\n                         <thead>\r\n                            <tr>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Output No.</th>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Activity</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">0-12</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">13-18</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">19-25</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">26-35</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">36-49</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">50+</th>\r\n                             </tr> \r\n                             \r\n                            <tr>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                             </tr> \r\n                             \r\n                         </thead>\r\n                     \r\n                     <tbody id=\"ActivityData_div\">\r\n                     \r\n                     \r\n\t\t\t\t\t";
// $db = Config\Database::connect();
// $query_mon_progress_report = $db->query("select * from activity_reporting_tool_map where  workflow_id = '" . $stdata["id"] . "' order by id ");
// $results_mon_progress_report = $query_mon_progress_report->getResultArray();
// foreach ($results_mon_progress_report as $row_mon_progress_report) {
//     $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
//     echo "                    <tr>\r\n                        <td>\r\n                        ";
//     $output_id = $project_details["output_id"];
//     $output_details = get_by_id("id", $output_id, "project_output");
//     echo $output_details["name"];
//     echo "                        </td>\r\n                        \r\n                       <td>";
//     echo $project_details["activity_name"];
//     echo "</td>\r\n                        \r\n                       <td>";
//     echo $row_mon_progress_report["part_0_12_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_0_12_male"];
//     echo "</td>\r\n                       \r\n                       <td>";
//     echo $row_mon_progress_report["part_13_18_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_13_18_male"];
//     echo "</td>\r\n    \r\n                       <td>";
//     echo $row_mon_progress_report["part_19_25_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_19_25_male"];
//     echo "</td>\r\n                       \r\n                       <td>";
//     echo $row_mon_progress_report["part_26_35_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_26_35_male"];
//     echo "</td>\r\n    \r\n                       <td>";
//     echo $row_mon_progress_report["part_36_49_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_36_49_male"];
//     echo "</td>\r\n    \r\n                       <td>";
//     echo $row_mon_progress_report["part_50_plus_female"];
//     echo "</td>\r\n                       <td>";
//     echo $row_mon_progress_report["part_50_plus_male"];
//     echo "</td>\r\n                    </tr>\t\r\n                    \r\n\t\t\t\t";
// }
// echo "                \r\n                                      \r\n                     </tbody>\r\n                     \r\n                    </table>                 \r\n                 \r\n                 \r\n                 </td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n                ";
echo "<tr>\r\n                  <td>Summary of the Activities </td>\r\n                  <td>";
echo $stdata["summary_events"];
echo "</td>\r\n                </tr>\r\n\r\n                <tr>\r\n                  <td>Challenges from the Activity</td>\r\n                  <td>";
echo $stdata["emerging_issues_activity"];
echo "</td>\r\n                </tr>\r\n                \r\n     ";
// echo "<tr>\r\n                  <td>Way Forward</td>\r\n                  <td>";
// echo $stdata["way_forward"];
// echo "</td>\r\n                </tr>\r\n                \r\n                ";
echo "<tr>\r\n                  <td>Lesson Learnt</td>\r\n                  <td>";
echo $stdata["lesson_learnt"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                ";
echo "<tr>\r\n                  <td>Recommendations</td>\r\n                  <td>";
echo $stdata["recommendations"];
echo "</td>\r\n                </tr>\r\n\r\n                <tr>\r\n                  <td>Conclusions</td>\r\n                  <td>";
echo $stdata["conclusions"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                ";
echo "<tr>\r\n                  <td colspan=\"2\">\r\n               \t <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Target </strong></h6></th>\r\n       <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Achievement </strong></h6></th>\r\n                 </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_targets = $db->query("select * from workshop_reporting_targets where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_targets = $query_targets->getResultArray();
$i = 1;
foreach ($results_targets as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          ";
    echo "<td>";
    echo $row_file["target"];
    echo "</td>";
    echo "<td>";
    echo $row_file["achievement"];
    echo "</td>";
    echo "\r\n                         \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                  \r\n                  \r\n                  \r\n                  </td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n              ";
echo "<tr>\r\n                  <td colspan=\"2\">\r\n               \t <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Documents </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_files = $db->query("select * from workshop_reporting_tool_documents where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_file = $query_files->getResultArray();
$i = 1;
foreach ($results_file as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td>\r\n\t\t\t\t\t\t\t<a href=\"";
    echo base_url() . "/public/uploads/workshop_reporting_tool/" . $row_file["documents"];
    echo "\"><span class=\"fal fa-check mr-1\"></span>";
    echo $row_file["documents"];
    echo "</a>                          \r\n                          </td>\r\n                         \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                  \r\n                  \r\n                  \r\n                  </td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n              ";
echo "</table>\r\n            </div>\r\n            \r\n            <!-- Form Ends here  --> \r\n          </div>\r\n        </div>\r\n        <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n          <div class=\"col-lg-offset-5 col-lg-7\"> <a href=\"";
echo base_url() . "/knowledge_center/workshop_reporting_tool";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n        </div>\r\n        </form>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n</div>\r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>