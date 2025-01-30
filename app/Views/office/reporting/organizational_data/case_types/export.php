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
echo "</h2>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Date </td>\r\n\t\t\t\t\t\t<td >";
echo changeDateFormat("d/m/Y", $stdata["date"]);
echo "</td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Type </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_type"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Number</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_number"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">File Number</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["file_number"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td class=\"form-label\">Field Office</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$ip = get_by_id("id", $stdata["field_office"], "field_office");
echo $ip["name"];
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n                        <td class=\"form-label\">County</td>\r\n\t\t\t\t\t\t<td>\r\n\t\t\t\t\t\t";
$db = Config\Database::connect();
$query = $db->query("select name FROM mas_county WHERE id = '" . $stdata["county"] . "'");
$results = $query->getResult();
$row = $query->getRow();
echo $row->name;
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n                       \r\n\t\t\t\t\t<tr>\r\n                        <td class=\"form-label\">Case Category reported</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select case_category FROM cases_map_case_category where workflow_id=\"" . $id . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["case_category"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Case Context</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select case_context FROM cases_map_case_context where workflow_id=\"" . $id . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["case_context"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\r\n\r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Incidents referred from other service providers</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select incidents_referred FROM cases_map_incidents_referred where workflow_id=\"" . $id . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["incidents_referred"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n\r\n\r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Services Provided</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select services_provided FROM cases_map_services_provided where workflow_id=\"" . $id . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["services_provided"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n                  \r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">More information on the services provided</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["more_details_on_services_provided"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Case Status</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["case_status"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\t\t\t\t\r\n\t\t\t\t\t<tr >\r\n\t\t\t\t\t  <td class=\"form-label\">Additional Comments</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["comments"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\r\n\t\t\t\t</table>\r\n</div>";

?>