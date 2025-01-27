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
echo "</h2>\r\n\r\n";
$query_plan = $db->query("select * from project_beneficiaries_report where project = '" . $project . "' and  year = '" . $year . "' and  county = '" . $county . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n\r\n<thead>\r\n\r\n  <tr>\r\n    <td rowspan=\"2\"   style=\"text-align:center; vertical-align:middle; font-size:17px;\">\r\n\t";
    $fo_data = get_by_id_only("id", $county, "mas_county");
    echo $fo_data = $fo_data["name"];
    echo "    </td>\r\n    <td colspan=\"4\" style=\"text-align:center;background:#cccccc;\">\r\n\t";
    $p_data = get_by_id_only("id", $project, "project");
    echo $project_name = $p_data["name"];
    echo " -\r\n\t";
    echo $year;
    echo " \r\n    </td>\r\n  </tr>\r\n  \r\n\r\n\r\n\r\n  <tr>\r\n    <td style=\"text-align:center; background:#cccccc;\">Beneficiaries</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Total</td>\r\n  </tr>\r\n  \r\n  \r\n  \r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>PWDs</td>\r\n  \t<td>";
    echo $row_plan->pwds_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->pwds_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->pwds_male + $row_plan->pwds_female;
    echo "</td>\r\n  </tr>\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>LGBTQ</td>\r\n  \t<td>";
    echo $row_plan->lgbtq_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->lgbtq_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->lgbtq_male + $row_plan->lgbtq_female;
    echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td colspan=\"5\" bgcolor=\"#cccccc\">By Age</td>\r\n  </tr>\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>0-17</td>\r\n  \t<td>";
    echo $row_plan->age_0_to_17_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_0_to_17_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_0_to_17_male + $row_plan->age_0_to_17_female;
    echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>18-24</td>\r\n  \t<td>";
    echo $row_plan->age_18_to_24_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_18_to_24_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_18_to_24_male + $row_plan->age_18_to_24_female;
    echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>25-49</td>\r\n  \t<td>";
    echo $row_plan->age_25_to_49_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_25_to_49_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_25_to_49_male + $row_plan->age_25_to_49_female;
    echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>50+</td>\r\n  \t<td>";
    echo $row_plan->age_50_plus_male;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_50_plus_female;
    echo "</td>\r\n  \t<td>";
    echo $row_plan->age_50_plus_male + $row_plan->age_50_plus_female;
    echo "</td>\r\n  </tr>\r\n\r\n\r\n    <tr>\r\n        <td colspan=\"2\" bgcolor=\"#cccccc\">Total</td>\r\n        \r\n        <td>";
    echo $row_plan->pwds_male + $row_plan->lgbtq_male + $row_plan->age_0_to_17_male + $row_plan->age_18_to_24_male + $row_plan->age_25_to_49_male + $row_plan->age_50_plus_male;
    echo "</td>\r\n        <td>";
    echo $row_plan->pwds_female + $row_plan->lgbtq_female + $row_plan->age_0_to_17_female + $row_plan->age_18_to_24_female + $row_plan->age_25_to_49_female + $row_plan->age_50_plus_female;
    echo "</td>\r\n        \r\n        \r\n        <td>\r\n\t\t";
    echo $row_plan->pwds_male + $row_plan->lgbtq_male + $row_plan->age_0_to_17_male + $row_plan->age_18_to_24_male + $row_plan->age_25_to_49_male + $row_plan->age_50_plus_male + $row_plan->pwds_female + $row_plan->lgbtq_female + $row_plan->age_0_to_17_female + $row_plan->age_18_to_24_female + $row_plan->age_25_to_49_female + $row_plan->age_50_plus_female;
    echo "        </td>\r\n    </tr>\r\n\r\n\r\n</thead>\r\n\r\n\r\n\r\n\r\n\r\n<tbody>  \r\n</table>\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}
echo "</div>";

?>