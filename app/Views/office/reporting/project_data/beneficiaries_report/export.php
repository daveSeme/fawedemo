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
echo "</h2>\r\n<div style=\"overflow-x:scroll;\">\r\n\t\t\r\n        <table cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n                \r\n                \r\n\t\t\t \r\n\t\t\t\r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
$project = get_by_id("id", $stdata["project"], "project");
echo $project["name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Reporting Period</td>\r\n                  <td>";
echo $stdata["year"];
echo "</td>\r\n                </tr>\r\n                \r\n               \r\n\t\t\t\r\n                <tr>\r\n                <td>Report Name</td>\r\n                <td>";
echo $stdata["reporting_period"];
echo "</td>\r\n                </tr>\r\n            \r\n            \r\n                        ";
echo "<tr>\r\n                <td>County</td>\r\n                <td>";
$query = $db->query("SELECT name from mas_county WHERE id = '" . $stdata["county"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
echo "</td>\r\n                </tr>\r\n";
echo "<td>Created by</td>\r\n                        <td>\r\n                         ";
$db = Config\Database::connect();
if ($stdata["createdby"] != "0") {
    $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $stdata["createdby"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
} else {
    $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $stdata["updatedby"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
}
echo " \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n ";
echo "<tr>\r\n                <td>Type of Beneficiary</td>\r\n                <td>";
echo $stdata["type_beneficiaries"];
echo "</td>\r\n                </tr>\r\n";
if($stdata["type_beneficiaries"] == "Indirect Beneficiaries") {
    echo "<tr>\r\n                <td>Indirect Beneficiaries</td>\r\n                <td>";
    echo $stdata["indirect_beneficiaries"];
    echo "</td>\r\n                </tr>\r\n";
}
echo "\r\n\t\t\r\n\t\t\t</table>  \r\n\t\t\t\r\n            \r\n            \r\n       ";
if($stdata["type_beneficiaries"] == "Direct Beneficiaries") {
    echo "<div class=\"col-12 mb-3\">\r\n\t\t\t\t  <table class=\"table table-bordered\">\r\n                    \r\n                    <thead class=\"bg-highlight\">\r\n                      <tr>\r\n                        <th>Beneficiaries</th>\r\n                        <th>Total</th>\r\n        </tr>\r\n                    </thead>\r\n                    \r\n                    <tbody>\r\n                      ";
    echo "<tr><td width=\"50%\">Government Agencies</td><td>" . $stdata["ben1"] ."</td></tr>";
    echo "<tr><td width=\"50%\">Local Communities</td><td>" . $stdata["ben2"] ."</td></tr>";
    echo "<tr><td width=\"50%\">Businesses and Industries</td><td>" . $stdata["ben3"] ."</td></tr>";
    echo "<tr><td width=\"50%\">Non-Governmental Organizations</td><td>" . $stdata["ben4"] ."</td></tr>";
    echo "<tr><td width=\"50%\">Educational Institutions</td><td>" . $stdata["ben5"] ."</td></tr>";
    echo "</tbody>\r\n                    \r\n                  </table>\r\n\t\t\t\t</div>";
    echo "<!-- Form Ends here  --> \r\n                </div>\r\n ";
}
echo "</div>\r\n</div>";

?>