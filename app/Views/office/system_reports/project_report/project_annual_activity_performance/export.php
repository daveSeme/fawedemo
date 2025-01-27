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
echo "</h2>\r\n                \r\n";
$query_plan = $db->query("select * from project_annual_workplan_progress_report where project = '" . $project . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n  <tr>\r\n    <td>Project</td>\r\n    <td width=\"50%\">\r\n\t";
    $plan = get_by_id("id", $row_plan->project, "project");
    echo $plan_name = $plan["name"];
    echo "    </td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td>Year</td>\r\n    <td>";
    echo $row_plan->year;
    echo "</td>\r\n  </tr>\r\n  \r\n  \r\n\r\n  \r\n  \r\n  <tr>\r\n    <td>Report Name</td>\r\n    <td>";
    echo $row_plan->report_name;
    echo "</td>\r\n  </tr>\r\n  \r\n  \r\n  <td>Created by</td>\r\n    <td>\r\n\t";
    $db = Config\Database::connect();
    if ($row_plan->createdby != "0") {
        $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $row_plan->createdby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    } else {
        $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $row_plan->updatedby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    }
    echo "\t </td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td>Report Date </td>\r\n    <td>";
    echo $newDate = date("d/m/Y", strtotime($row_plan->createtime));
    echo "</td>\r\n  </tr>\r\n  \r\n</table>\r\n\r\n\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n <thead class=\"bg-highlight\">\r\n      <tr>\r\n       <th>Activity</th>\r\n       <th>Status</th>\r\n       <th>Budget</th>\r\n       <th>Expenses</th>\r\n       <th>Variance</th>\r\n      </tr>\r\n  </thead>\r\n  \r\n  <tbody id=\"project_div\">\r\n      \r\n  ";
    $query_mon_progress_report = $db->query("select * from project_annual_workplan_progress_report_mapping where  workflow_id = '" . $row_plan->id . "' order by activity_id ");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        echo "      <tr>\r\n        <td width=\"50%\">\r\n        ";
        $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
        echo $project_details["activity_name"];
        echo "        </td>\r\n        <td>";
        if ($row_mon_progress_report["status"] == "1") {
            echo "Done";
        }
        echo "</td>\r\n        <td>\r\n        ";
        echo $row_mon_progress_report["budget"];
        echo "        </td>\r\n        <td>";
        echo $row_mon_progress_report["expenses"];
        echo "</td>\r\n        <td>";
        echo $row_mon_progress_report["expenses"] - $row_mon_progress_report["budget"];
        echo "</td>\r\n      </tr>\r\n      \r\n     ";
    }
    echo "      \r\n      \r\n      \r\n  </tbody>\r\n</table>\r\n\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}
echo "</div>";

?>