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
if ($project == "All") {
    $query_plan = $db->query("select * from project  ");
} else {
    $query_plan = $db->query("select * from project where id = '" . $project . "' ");
}
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n\r\n\r\n\r\n<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"1\" style=\"width:100%;border-collapse:collapse;\">\r\n <thead class=\"bg-highlight\">\r\n      <tr>\r\n       <th>Phase Title</th>\r\n       <th>Start Date</th>\r\n       <th>End Date</th>\r\n       <th>Duration</th>\r\n       <th>Reporting Schedule</th>\r\n       <th>Reporting Timelines</th>\r\n       <th>countries</th>\r\n       <th>Person Responsible</th>\r\n       <th>Funding Partner</th>\r\n       <th>Budget</th>\r\n       <th>Implementing partners</th>\r\n      </tr>\r\n  </thead>\r\n  \r\n  <tbody id=\"project_div\">\r\n      \r\n  ";
    if ($project == "All") {
        $query_mon_progress_report = $db->query("select * from project  ");
    } else {
        $query_mon_progress_report = $db->query("select * from project where id = '" . $project . "' ");
    }
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        echo "      <tr>\r\n        <td>";
        echo $row_mon_progress_report["name"];
        echo "</td>\r\n        \r\n       <td>";
        echo $newDate = date("d-M-Y", strtotime($row_mon_progress_report["start_date"]));
        echo "</td>\r\n       <td>";
        echo $newDate = date("d-M-Y", strtotime($row_mon_progress_report["end_date"]));
        echo "</td>\r\n        \r\n        <td>";
        echo $row_mon_progress_report["duration"];
        echo "</td>\r\n        <td>";
        echo $row_mon_progress_report["reporting_schedule"];
        echo "</td>\r\n        <td >\r\n                        \r\n<div class=\"col-md-12\">\r\n                       \r\n                       <div class=\"DivMonthly\"  ";
        if ($row_mon_progress_report["reporting_schedule"] == "Monthly") {
            echo "style=\"display:block;\"";
        } else {
            echo "style=\"display:none;\"";
        }
        echo ">\r\n                       \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                            ";
        echo $row_mon_progress_report["rs_monthly_jan"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                            ";
        echo $row_mon_progress_report["rs_monthly_jan_date"];
        echo "                            </div>\r\n                          </div>  \r\n                            \r\n\t\t\t\t    \r\n                    \r\n                       <div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_monthly_feb"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                            \t";
        echo $row_mon_progress_report["rs_monthly_feb_date"];
        echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_mar"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n\t\t\t\t\t\t\t\t";
        echo $row_mon_progress_report["rs_monthly_mar_date"];
        echo "                            </div>\r\n                          </div>\r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_apr"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_monthly_apr_date"];
        echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_may"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_may_date"];
        echo "                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_june"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_june_date"];
        echo "                            </div>\r\n                          </div>  \r\n                          \r\n                          \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_july"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_july_date"];
        echo "                            </div>\r\n                          </div>  \r\n                          \r\n\t\t\t\t\t\t\r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_aug"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_aug_date"];
        echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_sep"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_sep_date"];
        echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        \r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_oct"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_oct_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_nov"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_nov_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_dec"];
        echo "                           \r\n                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_monthly_dec_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n                       </div>\r\n                                       \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Monthly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t\t<div class=\"DivQuarterly\"  ";
        if ($row_mon_progress_report["reporting_schedule"] == "Quarterly") {
            echo "style=\"display:block;\"";
        } else {
            echo "style=\"display:none;\"";
        }
        echo ">\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_quarterly_q1_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_quarterly_q1_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_quarterly_q2_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_quarterly_q2_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_quarterly_q3_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_quarterly_q3_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_quarterly_q4_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_quarterly_q4_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n\r\n                        </div>\r\n                                         \r\n\t\t\t\t\t\t\r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Quarterly Repoting Timeline has Ended-------------------------------------------->                   \r\n\t\t\t<div class=\"DivBiannual\"   ";
        if ($row_mon_progress_report["reporting_schedule"] == "Bi-Annual") {
            echo "style=\"display:block;\"";
        } else {
            echo "style=\"display:none;\"";
        }
        echo ">\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_biannual1_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_biannual1_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\t\t\t\t\t\t\r\n\t\t\t\t\t\t<div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t";
        echo $row_mon_progress_report["rs_biannual2_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_biannual2_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n\r\n\r\n\r\n                        </div>\r\n\r\n                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n<!--------------------------------------------------Biannual Repoting Timeline has Ended-------------------------------------------->                   \r\n                        <div class=\"DivAnnual\" ";
        if ($row_mon_progress_report["reporting_schedule"] == "Annual") {
            echo "style=\"display:block;\"";
        } else {
            echo "style=\"display:none;\"";
        }
        echo ">\r\n                        \r\n                        \r\n                        \r\n                        <div class=\"row\">\r\n                          <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_annual_month"];
        echo "                           </div>   \r\n                            \r\n                            <div class=\"col-md-6\"> \r\n                          \t\t";
        echo $row_mon_progress_report["rs_annual_month_date"];
        echo "                            </div>\r\n                          </div>  \r\n                        \r\n                        </div>\r\n                        \r\n                        \r\n                        \r\n                        \r\n                        </div>                        \r\n                        \r\n                        \r\n                        </td>\r\n        <td>\r\n        ";
        $db = Config\Database::connect();
        $query_reg = $db->query("select name from project_map_county left join mas_county on project_map_county.county_id=mas_county.id where project_id=\"" . $row_mon_progress_report["id"] . "\" ");
        $county_listar = $query_reg->getResultArray();
        foreach ($county_listar as $row) {
            echo $row["name"];
            echo ",<br>";
        }
        echo "        </td>\r\n          <td >\r\n            ";
        $pr = get_by_id("id", $row_mon_progress_report["person_responsible"], "ctbl_users");
        echo $pr["name"];
        echo "        </td>\r\n        \r\n        \r\n        <td >\r\n       ";
        $cdata = get_by_id("id", $row_mon_progress_report["funding_partner"], "funding_partner");
        echo $cdata["name"];
        echo "        </td>\r\n\r\n        <td >\r\n        ";
        echo number_format($row_mon_progress_report["project_budget"]);
        echo "       ";
        $cdata = get_by_id("id", $row_mon_progress_report["budget_currency"], "mas_currency");
        echo $cdata["name"];
        echo "\r\n        </td>\r\n         \r\n        \r\n          <td>\r\n            ";
        $ip = get_by_id("id", $row_mon_progress_report["implementing_partner"], "implementing_partner");
        echo $ip["name"];
        echo "        </td>\r\n\r\n      </tr>\r\n      \r\n     ";
    }
    echo "      \r\n      \r\n      \r\n  </tbody>\r\n</table>\r\n\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>