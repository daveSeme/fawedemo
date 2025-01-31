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
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                  <tr>\r\n                    <th class=\"bg-highlight\">Project Name</th>\r\n                    <td>";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
$startdate = date("Y", strtotime($project_details["start_date"]));
$enddate = date("Y", strtotime($project_details["end_date"]));
$diff = $enddate - $startdate + 1;
echo "                    </td>\r\n                  </tr>\r\n              </table>\r\n                 \r\n\r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n               \r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#969696;\" >\r\n                    <th rowspan=\"2\">Result</th>\r\n                    <th rowspan=\"2\">Indicator</th>\r\n                    <th rowspan=\"2\">Baseline</th>\r\n                    <th rowspan=\"2\">Overall Target</th>\r\n                    ";
$diff = $enddate - $startdate + 1;
echo "                    <th colspan=\"";
echo $diff;
echo "\" style=\"text-align:center;\">Target</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#969696;\" >\r\n                    ";
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                    <th>";
    echo $i;
    echo "</th>\r\n                    ";
}
echo "                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where workflow_id= \"" . $id . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                 <tr style=\"background:#ffc000;\">\r\n                    <td  colspan=\"9\">Goal : ";
    echo $row_goal["name"];
    echo " </td>\r\n                  </tr>                  \r\n                  \r\n                  \r\n\t\t\t\t";
    $query_goal_indicator = $db->query("select * from project_goal_indicator  Where goal_id='" . $row_goal["id"] . "' order by id ");
    $results_goal_indicator = $query_goal_indicator->getResultArray();
    foreach ($results_goal_indicator as $row_goal_indicator) {
        $unit_data = get_by_id("id", $row_goal_indicator["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "                 <tr style=\"background:#ffc000;\">\r\n                    <td >Goal Indicator</td>\r\n                    <td >";
        echo $row_goal_indicator["indicator"];
        echo "</td>\r\n                    <td >";
        echo $row_goal_indicator["baseline"];
        echo "</td>\r\n                    <td >";
        echo $row_goal_indicator["target"];
        echo "</td>\r\n\t\t\t\t\t";
        $k = 1;
        for ($i = $startdate; $i <= $enddate; $i++) {
            $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_goal_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_goal_indicator_target  where  indicator_id=" . $row_goal_indicator["id"] . "  ");
            $line_m_n_e = $query_m_n_e->getRowArray();
            echo "                    <td >";
            echo $line_m_n_e["target_" . $k];
            echo "  ";
            if ($unit_name == "Percentage") {
                echo "%";
            } else {
                if ($unit_name == "Number") {
                    echo "";
                } else {
                    echo $unit_name;
                }
            }
            echo "</td>\r\n                    ";
            $k++;
        }
        echo "                  </tr>\r\n                  ";
    }
    echo "                  \r\n                  \r\n                  \r\n                  ";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                    \r\n                    \r\n                     <tr style=\"background:#339933;\">\r\n                        <td  colspan=\"9\">Outcome : ";
        echo $row_outcome["name"];
        echo " </td>\r\n                      </tr>   \r\n                      \r\n                      \r\n\t\t\t\t";
        $query_outcome_indicator = $db->query("select * from project_outcome_indicator  Where outcome_id='" . $row_outcome["id"] . "' order by id ");
        $results_outcome_indicator = $query_outcome_indicator->getResultArray();
        foreach ($results_outcome_indicator as $row_outcome_indicator) {
            $unit_data = get_by_id("id", $row_outcome_indicator["unit"], "mas_unit");
            $unit_name = $unit_data["name"];
            echo "                 <tr style=\"background:#339933;\">\r\n                    <td >Outcome Indicator</td>\r\n                    <td >";
            echo $row_outcome_indicator["indicator"];
            echo "</td>\r\n                    <td >";
            echo $row_outcome_indicator["baseline"];
            echo "</td>\r\n                    <td >";
            echo $row_outcome_indicator["target"];
            echo "</td>\r\n\t\t\t\t\t";
            $k = 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_outcome_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_outcome_indicator_target  where  indicator_id=" . $row_outcome_indicator["id"] . "  ");
                $line_m_n_e = $query_m_n_e->getRowArray();
                echo "                    <td >";
                echo $line_m_n_e["target_" . $k];
                echo "  ";
                if ($unit_name == "Percentage") {
                    echo "%";
                } else {
                    if ($unit_name == "Number") {
                        echo "";
                    } else {
                        echo $unit_name;
                    }
                }
                echo "</td>\r\n                    ";
                $k++;
            }
            echo "                  </tr>\r\n                  ";
        }
        echo "                      \r\n                    \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#e6c5d4;\">\r\n                    <td  colspan=\"9\">Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                  </tr>                  \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_output_indicator = $db->query("select * from project_output_indicator  Where output_id='" . $row_output["id"] . "' order by id ");
            $results_output_indicator = $query_output_indicator->getResultArray();
            foreach ($results_output_indicator as $row_output_indicator) {
                $unit_data = get_by_id("id", $row_output_indicator["unit"], "mas_unit");
                $unit_name = $unit_data["name"];
                echo "                 <tr style=\"background:#e6c5d4;\">\r\n                    <td >Output Indicator</td>\r\n                    <td >";
                echo $row_output_indicator["indicator"];
                echo "</td>\r\n                    <td >";
                echo $row_output_indicator["baseline"];
                echo "</td>\r\n                    <td >";
                echo $row_output_indicator["target"];
                echo "</td>\r\n\t\t\t\t\t";
                $k = 1;
                for ($i = $startdate; $i <= $enddate; $i++) {
                    $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_output_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_output_indicator_target  where  indicator_id=" . $row_output_indicator["id"] . "  ");
                    $line_m_n_e = $query_m_n_e->getRowArray();
                    echo "                    <td >";
                    echo $line_m_n_e["target_" . $k];
                    echo "  ";
                    if ($unit_name == "Percentage") {
                        echo "%";
                    } else {
                        if ($unit_name == "Number") {
                            echo "";
                        } else {
                            echo $unit_name;
                        }
                    }
                    echo "</td>\r\n                    ";
                    $k++;
                }
                echo "                  </tr>\r\n                  ";
            }
            echo "                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr style=\"background:#00b0f0;\">\r\n                    <td  colspan=\"9\">Activity : \r\n                    \r\n\t\t\t\t\t  ";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo "                    \r\n                     </td>\r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n              \r\n              <h2>Annual WorkPlan & Budget</h2>\r\n              \r\n              \r\n\t\t<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    <th rowspan=\"2\">Result</th>\r\n                    <th rowspan=\"2\">Activities</th>\r\n                    ";
$diff = $enddate - $startdate + 1;
echo "                    <th colspan=\"";
echo $diff + 4;
echo "\" style=\"text-align:center;\">Workplan</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    ";
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                    \t<th colspan=\"2\" style=\"text-align:center;\">";
    echo $i;
    echo "</th>\r\n                    ";
}
echo "                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where workflow_id= \"" . $id . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                  \r\n\t\t\t\r\n                  \r\n                  \r\n                  \r\n                  \r\n                  ";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                    \r\n                    \r\n                     <tr style=\"background:#ffe699;\">\r\n                        <td  colspan=\"9\">Outcome : ";
        echo $row_outcome["name"];
        echo " </td>\r\n                      </tr>   \r\n                      \r\n                      \r\n\t\t\t\t\r\n                      \r\n                    \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#92d050;\">\r\n                    <td  colspan=\"9\">Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                  </tr>                  \r\n                    \r\n                    \r\n               \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr>\r\n                    <td>&nbsp;</td>\r\n                    <td>\t\t\t\t\t  \r\n\t\t\t\t\t";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo " \t\t\t\t\t</td>\r\n                    \r\n                    \r\n                    \r\n                    ";
                for ($i = $startdate; $i <= $enddate; $i++) {
                    echo "                    \r\n                    ";
                    $query_workplan = $db->query("select * from project_activity_annual_budget_map where activity_id = \"" . $row_activity["id"] . "\" and year=\"" . $i . "\"   ");
                    $results_workplan = $query_workplan->getResultArray();
                    foreach ($results_workplan as $row_workplan) {
                        $year[] = $row_workplan["year"];
                        $annual_plan[$row_workplan["year"]] = $row_workplan["annual_plan"];
                        $annul_budget[$row_workplan["year"]] = $row_workplan["annul_budget"];
                    }
                    echo "\r\n                    <td ";
                    if (isset($annual_plan[$i]) && $annual_plan[$i] == 1) {
                        echo "bgcolor=\"#a8d08d\"";
                    }
                    echo " width=\"3%\"></td>\r\n                    <td>";
                    echo isset($annul_budget[$i]) ? $annul_budget[$i] : "";
                    echo "</td>\r\n\r\n                    \r\n                    \r\n                    \r\n                    ";
                }
                echo " \r\n                    \r\n                    \r\n                    \r\n                    \r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>        \r\n        \r\n                </div>\r\n</div>";

?>