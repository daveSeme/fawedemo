<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t    \r\n\t\t   \r\n           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n           \r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t<table  class=\"table table-bordered m-0\">\r\n\t\t\t<tr>\r\n\t\t\t<td>Project Name / Program / Sub-Project</td>\r\n\t\t\t<td>\r\n\t\t\t\r\n\t\t\t";
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
echo base_url() . "/public/uploads/project_final_report/" . $stdata["report_file"];
echo "\" class=\"btn btn-primary ml-auto waves-effect waves-themed\" ><span class=\"fal fa-check mr-1\"></span> Download</a>\r\n\t\t\t</td>\r\n\t\t\t\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t</table>\r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                                    <a href=\"";
echo base_url() . "/reporting/project_data/project_final_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n       \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>