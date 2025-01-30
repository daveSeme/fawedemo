<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n      <div class=\"panel-container show\">\r\n        <div class=\"panel-content\"> \r\n          \r\n          <!--  <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>--> \r\n        </div>\r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n            <div class=\"form-row\"> \r\n              \r\n              <!-- Form Starts here  -->\r\n              \r\n              <table  class=\"table table-bordered m-0\">\r\n                <tr>\r\n                  <td width=\"50%\">Project</td>\r\n                  <td>\r\n\t\t\t\t  ";
$db = Config\Database::connect();
$query_p = $db->query("SELECT name, id FROM project WHERE  id = " . $stdata["project"] . " ");
$results_p = $query_p->getResult();
$row_p = $query_p->getRow();
echo $row_p->name;
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n\t\t\t\t<tr>\r\n                  <td>Year</td>\r\n                  <td>";
echo $stdata["year"];
echo "</td>\r\n                </tr>\r\n\r\n\r\n\r\n                <tr>\r\n                  <td>Report Name</td>\r\n                  <td>";
echo $stdata["report_name"];
echo "</td>\r\n                </tr>\r\n                \r\n                  <td>Submitter</td>\r\n                  <td>";
$db = Config\Database::connect();
if ($stdata["createdby"] != "0") {
    $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $stdata["createdby"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
} else {
    $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $stdata["updatedby"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
}
echo "</td>\r\n                </tr>\r\n              \r\n              </table>\r\n              \r\n              \r\n              \r\n              <div class=\"col-12 mb-3\" >\r\n                   \r\n                    <table class=\"table table-bordered\">\r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Activity</th>\r\n                           <th>Done/Not Done</th>\r\n                           <th> Budget</th>\r\n                           <th> Expenses</th>\r\n                           <th> Comments</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from project_annual_workplan_progress_report_mapping where  workflow_id = '" . $stdata["id"] . "' order by activity_id ");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    echo "                          <tr>\r\n                            <td width=\"50%\">\r\n                            ";
    $project_details = get_by_id("id", $row_mon_progress_report["activity_id"], "project_activity");
    echo $project_details["activity_name"];
    echo "                            </td>\r\n                            <td>";
    if ($row_mon_progress_report["status"] == "1") {
        echo "Done";
    }
    echo "</td>\r\n                            <td>\r\n                            ";
    echo $row_mon_progress_report["budget"];
    echo "                            </td>\r\n                            <td>";
    echo $row_mon_progress_report["expenses"];
    echo "</td>\r\n                            <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                          \r\n                          \r\n                          \r\n                      </tbody>\r\n                    </table>\r\n                    \r\n                  </div>\r\n              \r\n              <!-- Form Ends here  --> \r\n            </div>\r\n          </div>\r\n          <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n            <div class=\"col-lg-offset-5 col-lg-7\"> <a href=\"";
echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n          </div>\r\n          </form>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>