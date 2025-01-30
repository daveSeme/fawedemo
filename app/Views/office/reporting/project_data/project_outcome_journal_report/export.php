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
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\t\r\n        <table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                \r\n\t\t\t<tr>\r\n\t\t\t<td>Project Name </td>\r\n\t\t\t<td>\r\n\t\t\t\r\n\t\t\t";
$db = Config\Database::connect();
$query = $db->query("SELECT name FROM project WHERE id = '" . $stdata["project_name"] . "'");
$row = $query->getRowArray();
echo $row["name"];
echo "\t\t\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</td>\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t<td>Report Name</td>\r\n\t\t\t<td>";
echo $stdata["report_name"];
echo "</td>\r\n\t\t\t</tr>\r\n\t\t\t<td>Submitter</td>\r\n\t\t\t<td>\r\n\t\t\t ";
$db = Config\Database::connect();
if ($stdata["createdby"] != "0") {
    $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $stdata["createdby"] . "'");
    $row = $query->getRowArray();
    echo $row["name"];
} else {
    $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $stdata["updatedby"] . "'");
    $row = $query->getRowArray();
    echo $row["name"];
}
echo " \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t<td>Report Date </td>\r\n\t\t\t<td>\r\n\t\t\t  ";
echo $newDate = date("d/m/Y", strtotime($stdata["createtime"]));
echo "\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t<td>Download Report</td>\r\n\t\t\t<td><a href=\"";
echo base_url() . "/public/uploads/project_outcome_journal_report/" . $stdata["report_file"];
echo "\" class=\"btn btn-primary ml-auto waves-effect waves-themed\" ><span class=\"fal fa-check mr-1\"></span> Download</a>\r\n\t\t\t</td>\r\n\t\t\t\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t</table>\r\n                </div>\r\n</div>";

?>