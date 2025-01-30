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
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                      <tbody>\r\n                        <tr>\r\n                          <th style=\"background:#ed7d31;\">Strategic Plan Name</th>\r\n                          <td colspan=\"3\">";
echo $stdata["plan_name"];
echo "</td>\r\n                        </tr>\r\n                        <tr>\r\n                          <th style=\"background:#ed7d31;\">Start Date</th>\r\n                          <td>";
echo $stdata["startyear"];
echo "</td>\r\n                          <th style=\"background:#ed7d31;\">End Date</th>\r\n                          <td>";
echo $stdata["endyear"];
echo "</td>\r\n                        </tr> \r\n                      </tbody>\r\n                    </table>\r\n\r\n\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                    \r\n                    <thead class=\"bg-highlight\">\r\n                         <tr style=\"background:#ffc000;color:#000000;\">\r\n                            <td><strong>Intervention Logic</strong></td>\r\n                            <td><strong>Objectively Verifiable Indicators (Ovis)</strong></td>\r\n                            <td><strong>Means of Verification</strong></td>\r\n                            <td><strong>Risks & Assumptions</strong></td>\r\n                          </tr>\r\n                    </thead>  \r\n                      \r\n                    <tbody class=\"bg-highlight\">  \r\n\t\t\t\t\t";
$query_sissue = $db->query("select * from  org_thematic_area where mda_plan_id = \"" . $id . "\" and flag=0  order by id ");
$g = 1;
$results_issue = $query_sissue->getResultArray();
foreach ($results_issue as $row_issue) {
    echo "                    \r\n                      <tr style=\"background:#ffd966;color:#000000;\">\r\n                        <td colspan=\"4\"><strong>Thematic Area</strong> : ";
    echo $row_issue["name"];
    echo "</td>\r\n                      </tr>\r\n                      \r\n                  \r\n\t\t\t\t\t";
    $i = 3;
    $query_obj = $db->query("SELECT * from org_objective  where  th_area_id = '" . $row_issue["id"] . "' and  base_id='" . $base_id . "'  order by id ");
    $results_obj = $query_obj->getResultArray();
    foreach ($results_obj as $row_obj) {
        echo "                     \r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
        $i = 3;
        $query_obj_ind = $db->query("select * from org_objective_indicator  where  objective_id = '" . $row_obj["id"] . "' and base_id='" . $base_id . "'  order by id ");
        $results_obj_ind = $query_obj_ind->getResultArray();
        foreach ($results_obj_ind as $row_obj_ind) {
            echo "                    \r\n                      <tr style=\"background:#ffffff;\">\r\n                        <td><strong>Strategic Objectives </strong>  : ";
            echo $row_obj["strategic_objective"];
            echo "</td>\r\n                        <td>";
            echo $row_obj_ind["indicator"];
            echo "</td>\r\n                        <td>";
            echo $row_obj_ind["mov"];
            echo "</td>\r\n                        <td>";
            echo $row_obj_ind["risks_assumptions"];
            echo "</td>\r\n                      </tr>\r\n                      \r\n                      ";
        }
        echo "                      \r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
        $i = 3;
        $query_strat_inter = $db->query("select * from org_strategic_intervention  where  objective_id = '" . $row_obj["id"] . "' and base_id='" . $base_id . "'  order by id ");
        $results_strat_inter = $query_strat_inter->getResultArray();
        foreach ($results_strat_inter as $row_strat_inter) {
            echo "                    \r\n                      <tr bgcolor=\"#fde9d9\">\r\n                        <td><strong>Strategic Intervention </strong> </td>\r\n                        <td colspan=\"3\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
            $i = 3;
            $query_int_ind = $db->query("select * from org_intervention_indicator  where intervention_id = '" . $row_strat_inter["id"] . "' and base_id='" . $base_id . "' order by id");
            $results_int_ind = $query_int_ind->getResultArray();
            foreach ($results_int_ind as $row_int_ind) {
                echo "                    \r\n                      <tr style=\"background:#ffffff;\">\r\n                        <td>\r\n                        <p style=\"Color:#00b055; font-weight:bold;\">";
                echo $row_strat_inter["strat_interven_category"];
                echo "</p>\r\n                        \r\n                        ";
                echo $row_strat_inter["strat_interven_name"];
                echo "                        </td>\r\n                        <td>";
                echo $row_int_ind["indicator"];
                echo "</td>\r\n                        <td>";
                echo $row_int_ind["mov"];
                echo "</td>\r\n                        <td>";
                echo $row_int_ind["risks_assumptions"];
                echo "</td>\r\n                      </tr>\r\n                      \r\n                      ";
            }
            echo "                      \r\n                      \r\n                      \r\n                      ";
        }
        echo "                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                      ";
    }
    echo "                      ";
}
echo "                    </tbody>\r\n                  </table>\r\n                                  </div>\r\n</div>";

?>