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
echo "</h2>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n \r\n<tr>\r\n    <td  class=\"form-label\">Project Code </td>\r\n    <td >";
echo $stdata["project_code"];
echo "</td>\r\n</tr>\r\n\r\n  <tr>\r\n    <td  class=\"form-label\">Project/Phase Title </td>\r\n    <td >";
echo $stdata["name"];
echo "</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td  class=\"form-label\">Start Date</td>\r\n    <td style=\"text-align:left;\">";
echo $StartDate = date("d/m/Y", strtotime($stdata["start_date"]));
echo "</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td class=\"form-label\">End Date</td>\r\n    <td style=\"text-align:left;\">";
echo $Ensdate = date("d/m/Y", strtotime($stdata["end_date"]));
echo "</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td  class=\"form-label\">Duration </td>\r\n    <td >";
echo $stdata["duration"];
echo "</td>\r\n  </tr>\r\n  \r\n  \r\n    <tr>\r\n        <td  class=\"form-label\">Funding Partner </td>\r\n        <td >\r\n       ";
$cdata = get_by_id("id", $stdata["funding_partner"], "funding_partner");
echo $cdata["name"];
echo "        </td>\r\n    </tr>\r\n    \r\n  <tr>\r\n    <td  class=\"form-label\">Project Budget </td>\r\n    <td >";
echo $stdata["project_budget"];
echo "      ";
$cdata = get_by_id("id", $stdata["budget_currency"], "mas_currency");
echo $cdata["name"];
echo "</td>\r\n  </tr>\r\n  <tr>\r\n    <td  class=\"form-label\">Reporting Schedule </td>\r\n    <td >";
echo $stdata["reporting_schedule"];
echo "</td>\r\n  </tr>\r\n  <tr>\r\n    <td  class=\"form-label\">Reporting Timelines </td>\r\n    <td ><div class=\"col-md-9\">\r\n        <div class=\"DivMonthly\"  ";
if ($stdata["reporting_schedule"] == "Monthly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_jan"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_jan_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_feb"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_feb_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_mar"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_mar_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_apr"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_apr_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_may"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_may_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_june"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_june_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_july"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_july_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_aug"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_aug_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_sep"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_sep_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_oct"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_oct_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_nov"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_nov_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_dec"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_monthly_dec_date"];
echo " </div>\r\n          </div>\r\n        </div>\r\n        \r\n        <!--------------------------------------------------Monthly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Monthly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Monthly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Monthly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->\r\n        <div class=\"DivQuarterly\"  ";
if ($stdata["reporting_schedule"] == "Quarterly") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q1_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q1_month_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q2_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q2_month_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q3_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q3_month_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q4_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_quarterly_q4_month_date"];
echo " </div>\r\n          </div>\r\n        </div>\r\n        \r\n        <!--------------------------------------------------Quarterly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Quarterly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Quarterly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Quarterly Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->\r\n        <div class=\"DivBiannual\"   ";
if ($stdata["reporting_schedule"] == "Bi-Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_biannual1_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_biannual1_month_date"];
echo " </div>\r\n          </div>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_biannual2_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_biannual2_month_date"];
echo " </div>\r\n          </div>\r\n        </div>\r\n        \r\n        <!--------------------------------------------------Biannual Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Biannual Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Biannual Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Biannual Repoting Timeline has Ended--------------------------------------------> \r\n        <!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->\r\n        <div class=\"DivAnnual\" ";
if ($stdata["reporting_schedule"] == "Annual") {
    echo "style=\"display:block;\"";
} else {
    echo "style=\"display:none;\"";
}
echo ">\r\n          <div class=\"row\">\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_annual_month"];
echo " </div>\r\n            <div class=\"col-md-3\"> ";
echo $stdata["rs_annual_month_date"];
echo " </div>\r\n          </div>\r\n        </div>\r\n      </div></td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"form-label\">countries</td>\r\n    <td >";
$db = Config\Database::connect();
$query_reg = $db->query("select name FROM project_map_county left join mas_county on project_map_county.county_id=mas_county.id where project_id=\"" . $id . "\" ");
$county_listar = $query_reg->getResultArray();
foreach ($county_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "</td>\r\n  </tr>\r\n  <tr >\r\n    <td class=\"form-label\">Person Responsible</td>\r\n    <td >";
$pr = get_by_id("id", $stdata["person_responsible"], "ctbl_users");
echo $pr["name"];
echo "</td>\r\n  </tr>\r\n  <tr >\r\n    <td class=\"form-label\">Implementing Partner</td>\r\n    <td >";
$ip = get_by_id("id", $stdata["implementing_partner"], "implementing_partner");
echo $ip["name"];
echo "</td>\r\n  </tr>\r\n  <tr>\r\n    <td class=\"form-label\">Thematic Area</td>\r\n    <td >";
$db = Config\Database::connect();
$query_reg = $db->query("select name from project_map_thematic_area left join org_thematic_area on project_map_thematic_area.thematic_area_id=org_thematic_area.id where project_id=\"" . $id . "\" ");
$thematic_area_listar = $query_reg->getResultArray();
foreach ($thematic_area_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "</td>\r\n  \t\t\t\t\t </tr>\r\n                     \r\n                      <tr>\r\n                        <td  class=\"form-label\">Project Status</td>\r\n                        <td >";
echo $stdata["project_status"];
echo "</td>\r\n                      </tr>\r\n                      \r\n  \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Report Submission Date</td>\r\n\t\t\t\t\t\t<td >";
echo $StartDate = date("d/m/Y", strtotime($stdata["report_submission_date"]));
echo " </td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t   <tr>\r\n                        <td class=\"form-label\">Report Notification Recepient</td>\r\n                        <td >\r\n                        ";
$db = Config\Database::connect();
$query_reg = $db->query("select name from project_notification_recepient_map left join ctbl_users on project_notification_recepient_map.\trecepient_id=ctbl_users.id where project_id=\"" . $id . "\" ");
$thematic_area_listar = $query_reg->getResultArray();
foreach ($thematic_area_listar as $row) {
    echo $row["name"];
    echo ",<br>";
}
echo "                        </td>\r\n\t\t\t\t\t</tr>\r\n  \r\n  \r\n</table>\r\n</div>";

?>