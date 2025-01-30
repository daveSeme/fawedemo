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
echo "\");\r\n        });\r\n\t};\r\n</script>\r\n\r\n<div class=\"canvas_div_pdf\">\r\n    \r\n<h2>";
echo $title;
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                \r\n<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t ";
if ($stdata["report_status"] != "1") {
    echo "\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                        <tbody>\r\n                        \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td><strong>Activity Reporting</strong></td>\r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Project</strong></td>\r\n                            <td>\r\n                            ";
    $plan = get_by_id("id", $stdata["project"], "project");
    echo $plan_name = $plan["name"];
    echo "                             <input type=\"hidden\" name=\"project_id\" class=\"form-control\" id=\"project_id\" value=\"";
    echo $stdata["project"];
    echo "\">\r\n                            </td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Reporting Period</strong></td>\r\n                            <td>";
    echo $stdata["year"];
    echo "-";
    echo $stdata["quarter"];
    echo "</td>                            \r\n                          </tr>\r\n                          \r\n                          <tr>\r\n                            <td bgcolor=\"#dddddd\"><strong>Report Name</strong></td>\r\n                            <td>";
    echo $stdata["report_name"];
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
    $query_his = $db->query("select * from activity_reporting_comments_history where workflow_id = '" . $stdata["id"] . "' and report_type ='Quarterly Indicator Tracking Report' order by id desc");
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
echo "<!--###################################################Reviewer Comments Section##################################################################-->\r\n\t\t\t\r\n            \r\n            \r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                     \r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Indicator</th>\r\n                           <th>Target</th>\r\n                           <th>Quarter Achievement</th>\r\n                           <th>Comments</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Component Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_goal_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                            \r\n                           </td>\r\n                           \r\n                           <td>";
    echo $row_mon_progress_report["achievement"];
    echo "</td>\r\n                           <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                       \t\t\r\n                     \t ";
}
echo "\r\n                       \r\n                       \r\n                       \r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Outcome Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_outcome_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                           </td>\r\n                           \r\n                           <td>";
    echo $row_mon_progress_report["achievement"];
    echo "</td>\r\n                           <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                         \r\n                         \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Output Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_output_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                           </td>\r\n                           \r\n                           <td>";
    echo $row_mon_progress_report["achievement"];
    echo "</td>.\r\n                           <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                          \r\n                      </tbody>\r\n                      \r\n                      \r\n                      \r\n                    </table>   \r\n                </div>\r\n</div>";

?>