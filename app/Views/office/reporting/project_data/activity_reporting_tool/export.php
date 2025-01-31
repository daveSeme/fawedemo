<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$db = Config\Database::connect();
$session = Config\Services::session();
echo "\r\n<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/pdf/jspdf.min.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/pdf/html2canvas.js\"></script>\r\n<script>\r\nfunction getPDF(){\r\n\r\n\t\tvar HTML_Width = \$(\".canvas_div_pdf\").width();\r\n\t\tvar HTML_Height = \$(\".canvas_div_pdf\").height();\r\n\t\tvar top_left_margin = 15;\r\n\t\tvar PDF_Width = HTML_Width+(top_left_margin*2);\r\n\t\tvar PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);\r\n\t\tvar canvas_image_width = HTML_Width;\r\n\t\tvar canvas_image_height = HTML_Height;\r\n\t\t\r\n\t\tvar totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;\r\n\t\t\r\n\r\n\t\thtml2canvas(\$(\".canvas_div_pdf\")[0],{allowTaint:true}).then(function(canvas) {\r\n\t\t\tcanvas.getContext('2d');\r\n\t\t\t\r\n\t\t\tconsole.log(canvas.height+\"  \"+canvas.width);\r\n\t\t\t\r\n\t\t\t\r\n\t\t\tvar imgData = canvas.toDataURL(\"image/jpeg\", 1.0);\r\n\t\t\tvar pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);\r\n\t\t    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);\r\n\t\t\t\r\n\t\t\t\r\n\t\t\tfor (var i = 1; i <= totalPDFPages; i++) { \r\n\t\t\t\tpdf.addPage(PDF_Width, PDF_Height);\r\n\t\t\t\tpdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);\r\n\t\t\t}\r\n\t\t\t\r\n\t\t    pdf.save(\"";
echo $filename;
echo "\");\r\n        });\r\n\t};\r\n</script>\r\n\r\n<div class=\"canvas_div_pdf\">\r\n    ";
echo "<table style='width: 100%; text-align: center;'>";
echo "<tr>";
echo "<td style='width: 33%; text-align: center;'><img src='" . base_url() . "/public/img/IUCN_logo.png' alt='Img1' height='50' width='50'></td>";
echo "<td style='width: 33%; text-align: center;'><img src='" . base_url() . "/public/img/logo.png' alt='Img2' height='50' width='50'></td>";
echo "<td style='width: 33%; text-align: center;'><img src='" . base_url() . "/public/img/GEF_logo.png' alt='Img3' height='50' width='70'></td>";
echo "</tr>";
echo "</table>";
echo "\r\n<h2>";
echo $title;
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\r\n\t\t\t ";
if ($stdata["report_status"] != "1") {
    echo "\r\n                     <table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                        <tbody>\r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Activity Reporting</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
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
    echo "                                  \r\n                                </tbody>\r\n                              </table>\r\n                            </td>\r\n                          </tr>\r\n                          \r\n                          \r\n                        <tr>\r\n                          <td bgcolor=\"#dddddd\"><strong>Attachment </strong></td>\r\n                          <td>\r\n                          ";
    if ($stdata["report_file"] != "") {
        echo "                           <a href=\"";
        echo base_url() . "/public/uploads/review_approve/" . $stdata["report_file"];
        echo "\"><span class=\"fal fa-download mr-1\"></span> Download File</a>\r\n                           ";
    }
    echo "                          </td>\r\n                        </tr>\r\n                          \r\n                          \r\n                   </tbody>\r\n                 </table>         \r\n\r\n\r\n\r\n\t\t\t ";
}
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n    <p>&nbsp;</p>\r\n    \r\n    <table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
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
echo "</td>\r\n                </tr>\r\n                \r\n       ";
// echo "<tr>\r\n                  <td>Particiapnts Reached </td>\r\n                  <td>";
// echo $stdata["particiapnts_reached"];
// echo "</td>\r\n                </tr>\r\n\r\n\r\n          ";
echo "<tr>\r\n                  <td>Objective of the Activity </td>\r\n                  <td>";
echo $stdata["objective_activity"];
echo "</td>\r\n                </tr>\r\n               \r\n                \r\n           ";
// echo "<tr>\r\n                 <td colspan=\"2\">\r\n                 \r\n    <table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                         <thead>\r\n                            <tr>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Output No.</th>\r\n                              <th bgcolor=\"#cccccc\" rowspan=\"2\">Activity</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">0-12</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">13-18</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">19-25</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">26-35</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">36-49</th>\r\n                              <th bgcolor=\"#cccccc\" colspan=\"2\">50+</th>\r\n                             </tr> \r\n                             \r\n                            <tr>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                              \r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n\r\n                              <th bgcolor=\"#cccccc\">F</th>\r\n                              <th bgcolor=\"#cccccc\">M</th>\r\n                             </tr> \r\n                             \r\n                         </thead>\r\n                     \r\n                     <tbody id=\"ActivityData_div\">\r\n                     \r\n                     \r\n\t\t\t\t\t";
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
// echo "                \r\n                                      \r\n                     </tbody>\r\n                     \r\n                    </table>                 \r\n                 \r\n                 \r\n                 </td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n          ";
echo "<tr>\r\n                  <td>Summary of the Activities </td>\r\n                  <td>";
echo $stdata["summary_events"];
echo "</td>\r\n                </tr>\r\n\r\n                <tr>\r\n                  <td>Challenges from the Activity</td>\r\n                  <td>";
echo $stdata["emerging_issues_activity"];
echo "</td>\r\n                </tr>\r\n                \r\n        ";
// echo "<tr>\r\n                  <td>Way Forward</td>\r\n                  <td>";
// echo $stdata["way_forward"];
// echo "</td>\r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Lesson Learnt</td>\r\n                  <td>";
// echo $stdata["lesson_learnt"];
// echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                ";
echo "<tr>\r\n                  <td>Recommendations</td>\r\n                  <td>";
echo $stdata["recommendations"];
echo "</td>\r\n                </tr>\r\n\r\n                <tr>\r\n                  <td>Conclusions</td>\r\n                  <td>";
echo $stdata["conclusions"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td colspan=\"2\">\r\n               \t <table width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" class=\"table table-bordered\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th width=\"5%\" bgcolor=\"#F0F0F0\" rowspan=\"2\" >#</th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" ><h6 align=\"left\"><strong> Documents </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_files = $db->query("select * from activity_reporting_tool_documents where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_file = $query_files->getResultArray();
$i = 1;
foreach ($results_file as $row_file) {
    echo "                        <tr>\r\n                          <td>";
    echo $i;
    echo "</td>\r\n                          <td>\r\n\t\t\t\t\t\t\t<a href=\"";
    echo base_url() . "/public/uploads/activity_reporting_tool/" . $row_file["documents"];
    echo "\"><span class=\"fal fa-check mr-1\"></span>";
    echo $row_file["documents"];
    echo "</a>                          \r\n                          </td>\r\n                         \r\n                          \r\n                        </tr>\r\n                        ";
    $i++;
}
echo "                        \r\n                        \r\n                  </tbody>\r\n                </table>\r\n                  \r\n                  \r\n                  \r\n                  </td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n              </table>\r\n                                            </div>\r\n</div>";

?>