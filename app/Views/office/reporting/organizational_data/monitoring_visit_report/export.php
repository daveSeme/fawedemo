<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/jquery.min.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/pdf/jspdf.min.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/pdf/html2canvas.js\"></script>\r\n<script>\r\nfunction getPDF(){\r\n\r\n\t\tvar HTML_Width = \$(\".canvas_div_pdf\").width();\r\n\t\tvar HTML_Height = \$(\".canvas_div_pdf\").height();\r\n\t\tvar top_left_margin = 15;\r\n\t\tvar PDF_Width = HTML_Width+(top_left_margin*2);\r\n\t\tvar PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);\r\n\t\tvar canvas_image_width = HTML_Width;\r\n\t\tvar canvas_image_height = HTML_Height;\r\n\t\t\r\n\t\tvar totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;\r\n\t\t\r\n\r\n\t\thtml2canvas(\$(\".canvas_div_pdf\")[0],{allowTaint:true}).then(function(canvas) {\r\n\t\t\tcanvas.getContext('2d');\r\n\t\t\t\r\n\t\t\tconsole.log(canvas.height+\"  \"+canvas.width);\r\n\t\t\t\r\n\t\t\t\r\n\t\t\tvar imgData = canvas.toDataURL(\"image/jpeg\", 1.0);\r\n\t\t\tvar pdf = new jsPDF('p', 'pt',  [PDF_Width, PDF_Height]);\r\n\t\t    pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin,canvas_image_width,canvas_image_height);\r\n\t\t\t\r\n\t\t\t\r\n\t\t\tfor (var i = 1; i <= totalPDFPages; i++) { \r\n\t\t\t\tpdf.addPage(PDF_Width, PDF_Height);\r\n\t\t\t\tpdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);\r\n\t\t\t}\r\n\t\t\t\r\n\t\t    pdf.save(\"";
echo $filename;
echo "\");\r\n        });\r\n\t};\r\n</script>\r\n\r\n<div class=\"canvas_div_pdf\">\r\n    \r\n<h2>";
echo $title;
echo "</h2>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Program </td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$program_data = get_by_id("id", $stdata["program"], "org_thematic_area");
echo $program_name = $program_data["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Project</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$project_data = get_by_id("id", $stdata["project_id"], "project");
echo $project_name = $project_data["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\" bgcolor=\"#F0F0F0\">Completed by</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
echo $stdata["completed_by"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Dates </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["visit_date"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t \r\n\t\t\t\t   \r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Location </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["location"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n                       \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t  <td class=\"form-label\" bgcolor=\"#F0F0F0\">Objectives</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["objectives"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n                   \r\n                    \r\n                    \r\n\t\t\t\t <tr>\r\n                  <td colspan=\"2\">\r\n                  \r\n                  <div class=\"col-md-12\"><h3>Agenda</h3></div>\r\n                  <p>The following activities were completed as part of the monitoring visit :</p>\r\n\r\n                  \r\n                  \r\n\t\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                      <thead>\r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Date </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Venue </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" rowspan=\"2\" rowspan=\"2\"><h6 align=\"left\"><strong> Activity </strong></h6></th>\r\n                         \r\n                          <th bgcolor=\"#F0F0F0\" colspan=\"4\" ><h6 align=\"center\"><strong> Participants </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> Category/Designation </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> M </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> F </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\" ><h6 align=\"left\"><strong> Total </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query_agenda_map = $db->query("select * from monitoring_visit_report_agenda_map where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_agenda_map = $query_agenda_map->getResultArray();
foreach ($results_agenda_map as $row_agenda_map) {
    echo "                        <tr>\r\n                          <td>";
    echo $row_agenda_map["agenda_date"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_venue"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_activity"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_category"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_male"];
    echo "</td>\r\n                          <td>";
    echo $row_agenda_map["agenda_female"];
    echo "</td>\r\n                          \r\n                          <td>\r\n\t\t\t\t\t\t  ";
    echo $toal = $row_agenda_map["agenda_male"] + $row_agenda_map["agenda_female"];
    echo "                          </td>\r\n                          \r\n                        </tr>\r\n                        ";
}
echo "                        \r\n                  </tbody>\r\n                </table>                  \r\n                  </td>\r\n                 </tr>\r\n                  \r\n                    \r\n                    \r\n\t\t\t\t\r\n                \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td colspan=\"2\">\r\n                  <div class=\"col-md-12\"><h3>General Observations</h3></div>\r\n                  <p>Provide a description of the activity including the objectives, issues addressed, the people met, and provide pictorial evidence, anecdotal statements demonstrating learning/quotes of success etc.</p>\r\n                  \r\n                  <p>&nbsp;</p>\r\n                  <div class=\"col-md-12\"><h3>Specific Issues & Actions</h3></div>\r\n                  <p>What issues were noted from the field that require attention, this could be programmatic, grants related or risks to the project and propose alternative solutions.</p>\r\n                        \r\n\t\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                      <thead>\r\n                      \r\n                        <tr>\r\n                          <th bgcolor=\"#F0F0F0\" width=\"35%\"><h6 align=\"left\"><strong> Issue identified </strong></h6></th>\r\n                          <th bgcolor=\"#F0F0F0\"><h6 align=\"left\"><strong> Actions </strong></h6></th>\r\n                        </tr>\r\n                        \r\n                        \r\n                      </thead>\r\n                      <tbody>\r\n\t\t\t\t\t\t";
$query_agenda_map = $db->query("select * from monitoring_visit_report_issue_action_map where workflow_id = '" . $stdata["id"] . "' order by id ");
$results_agenda_map = $query_agenda_map->getResultArray();
foreach ($results_agenda_map as $row_agenda_map) {
    echo "                            <tr>\r\n                              <td>";
    echo $row_agenda_map["issue_identified"];
    echo "</td>\r\n                              <td>";
    echo $row_agenda_map["actions"];
    echo "</td>\r\n                            </tr>\r\n                            ";
}
echo "                            \r\n                  </tbody>\r\n                </table>                        \r\n                        \r\n                        </td>\r\n\t\t\t\t   </tr>\r\n                \r\n                \r\n                \r\n                \r\n                 <tr>\r\n                  <td colspan=\"2\">\r\n                  \r\n                  <div class=\"col-md-12\"><h3>Next Visit</h3></div>\r\n                  <p>The details of the next monitoring visit are:</p>\r\n                  \r\n                  \r\n                  </td>\r\n                 </tr>\r\n                \r\n                \r\n\t\t\t\t\t<tr>\r\n                    \r\n                    \r\n\t\t\t\t\t\t<td  class=\"form-label\"  bgcolor=\"#F0F0F0\">To be completed by </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_completed_by"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\" bgcolor=\"#F0F0F0\">Location</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
echo $stdata["location"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Dates </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_date"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t \r\n\t\t\t\t   \r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\" bgcolor=\"#F0F0F0\">Objectives </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["next_visit_objectives"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n                       \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t  <td class=\"form-label\" bgcolor=\"#F0F0F0\">Photos</td>\r\n\t\t\t\t\t\t<td>&nbsp;</td>\r\n\t\t\t\t   </tr>\r\n                \r\n                \r\n                \r\n                \r\n                \r\n                    \r\n\t\t\t\t</table>\r\n</div>";

?>