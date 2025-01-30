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
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Project Name</th>\r\n                      <td>";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
echo "                      </td>\r\n                      <td class=\"bg-highlight\"> Year </td>\r\n                      <td >";
echo $frameworkdata["year"];
echo "                      </td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n\r\n                 \r\n\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n               \r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    <th rowspan=\"3\">Code</th>\r\n                    <th rowspan=\"3\">Activity</th>\r\n                    <th style=\"text-align:center;\" colspan=\"24\">";
echo $frameworkdata["year"];
echo "</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#00b0f0;\">\r\n                    <th colspan=\"6\">Q1</th>\r\n\r\n                    <th colspan=\"6\">Q2</th>\r\n\r\n                    <th colspan=\"6\">Q3</th>\r\n\r\n\r\n                    <th colspan=\"6\">Q4</th>\r\n                  </tr>\r\n                  \r\n                  \r\n                  <tr style=\"background:#00b0f0;\">\r\n                    <th colspan=\"2\">Oct</th>\r\n                    <th colspan=\"2\">Nov</th>\r\n                    <th colspan=\"2\">Dec</th>\r\n\r\n                    <th colspan=\"2\">Jan</th>\r\n                    <th colspan=\"2\">Feb</th>\r\n                    <th colspan=\"2\">Mar</th>\r\n\r\n                    <th colspan=\"2\">Apr</th>\r\n                    <th colspan=\"2\">May</th>\r\n                    <th colspan=\"2\">June</th>\r\n\r\n\r\n                    <th colspan=\"2\">July</th>\r\n                    <th colspan=\"2\">Aug</th>\r\n                    <th colspan=\"2\">Sep</th>\r\n                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where project_id= \"" . $frameworkdata["project"] . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                \r\n\t\t\t\t";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                \r\n                <tr style=\"background:#ffe699;\">\r\n                    <td>";
        echo $row_outcome["name"];
        echo " </td>\r\n                    <td colspan=\"24\">&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                </tr>   \r\n                      \r\n                 \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#92d050;\">\r\n                    <td>Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                    <td colspan=\"24\">&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                  </tr>                  \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr>\r\n                    <td>&nbsp;</td>\r\n                    \r\n                    <td>\t\t\t\t\t  \r\n\t\t\t\t\t";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo " \t\t\t\t\t</td>\r\n                    \r\n                    \r\n                    ";
                $query = $db->query("select * from project_activity_annual_plan Where activity_id=\"" . $row_activity["id"] . "\" and year=\"" . $frameworkdata["year"] . "\" ");
                $results = $query->getResultArray();
                $budget = [];
                $plan = [];
                foreach ($results as $row) {
                    $plan[$row["quarter"]][$row["month"]] = $row["plan"];
                    $budget[$row["quarter"]][$row["month"]] = $row["budget"];
                }
                echo "                    \r\n                    <td ";
                if (isset($plan["Q1"]["Oct"]) && $plan["Q1"]["Oct"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Oct"]) ? $budget["Q1"]["Oct"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q1"]["Nov"]) && $plan["Q1"]["Nov"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Nov"]) ? $budget["Q1"]["Nov"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q1"]["Dec"]) && $plan["Q1"]["Dec"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Dec"]) ? $budget["Q1"]["Dec"] : "";
                echo "</td>\r\n\r\n                  \r\n                  \r\n                  \r\n                    <td ";
                if (isset($plan["Q2"]["Jan"]) && $plan["Q2"]["Jan"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Jan"]) ? $budget["Q2"]["Jan"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q2"]["Feb"]) && $plan["Q2"]["Feb"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Feb"]) ? $budget["Q2"]["Feb"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q2"]["Mar"]) && $plan["Q2"]["Mar"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Mar"]) ? $budget["Q2"]["Mar"] : "";
                echo "</td>\r\n                    \r\n                    \r\n                    \r\n                    \r\n                    <td ";
                if (isset($plan["Q3"]["Apr"]) && $plan["Q3"]["Apr"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["Apr"]) ? $budget["Q3"]["Apr"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q3"]["May"]) && $plan["Q3"]["May"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["May"]) ? $budget["Q3"]["May"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q3"]["June"]) && $plan["Q3"]["June"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["June"]) ? $budget["Q3"]["June"] : "";
                echo "</td>\r\n\r\n\r\n\r\n                    <td ";
                if (isset($plan["Q4"]["July"]) && $plan["Q4"]["July"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["July"]) ? $budget["Q4"]["July"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q4"]["Aug"]) && $plan["Q4"]["Aug"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["Aug"]) ? $budget["Q4"]["Aug"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q4"]["Sep"]) && $plan["Q4"]["Sep"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["Sep"]) ? $budget["Q4"]["Sep"] : "";
                echo "</td>\r\n                    \r\n                    \r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n                </div>\r\n</div>";

?>