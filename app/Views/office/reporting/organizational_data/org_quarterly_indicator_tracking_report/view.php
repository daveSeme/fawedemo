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
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  \t   \r\n           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t \r\n\t\t\t\t\r\n\t\t\t\t\r\n                <table  class=\"table table-bordered m-0\">\r\n\t\t\t \r\n\t\t\t\r\n                <tr>\r\n                <td>Strategic Plan</td>\r\n                <td>\r\n                ";
$plan = get_by_id("id", $stdata["strategic_plan"], "org_data_strategic_plans_workflow");
echo $plan_name = $plan["plan_name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Year</td>\r\n                  <td>";
echo $stdata["year"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Quarter</td>\r\n                  <td>";
echo $stdata["quarter"];
echo "</td>\r\n                </tr>\r\n\t\t\t\r\n                <tr>\r\n                <td>Report Name</td>\r\n                <td>";
echo $stdata["report_name"];
echo "</td>\r\n                </tr>\r\n            \r\n            \r\n                        <td>Created by</td>\r\n                        <td>\r\n                         ";
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
echo " \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n            \r\n            \r\n            \r\n\t\t\t<tr>\r\n\t\t\t<td>Report Date </td>\r\n\t\t\t<td>\r\n\t\t\t  ";
echo $newDate = date("d/m/Y", strtotime($stdata["createtime"]));
echo "\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t\r\n\t\t\t</table>  \r\n\t\t\t\r\n            \r\n            \r\n\t\t\t <table class=\"table table-bordered\">\r\n                     \r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Indicator</th>\r\n                           <th>Target</th>\r\n                           <th>Quarter Achievement</th>\r\n                           <th>Comments</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from org_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Objective Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_objective_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                            \r\n                           </td>\r\n                           \r\n                           <td>";
    echo $row_mon_progress_report["achievement"];
    echo "</td>\r\n                           <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                       \t\t\r\n                     \t ";
}
echo "\r\n                       \r\n                       \r\n                       \r\n                          \r\n                      ";
$query_mon_progress_report = $db->query("select * from org_quarterly_indicator_tracking_report_map where workflow_id = '" . $stdata["id"] . "' and category = 'Intervention Indicator' order by indicator_id");
$results_mon_progress_report = $query_mon_progress_report->getResultArray();
foreach ($results_mon_progress_report as $row_mon_progress_report) {
    $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
    $unit_name = $unit_data["name"];
    echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
    $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_intervention_indicator");
    echo $project_details["indicator"];
    echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
    echo $row_mon_progress_report["indicator_id"];
    echo "\" />\r\n                           </td>\r\n                           \r\n                           <td>\r\n\t\t\t\t\t\t\t";
    echo $row_mon_progress_report["target"];
    echo "                            ";
    if ($unit_name == "Percentage") {
        echo "%";
    } else {
        if ($unit_name == "Number") {
            echo "";
        } else {
            echo $unit_name;
        }
    }
    echo "                           </td>\r\n                           \r\n                           <td>";
    echo $row_mon_progress_report["achievement"];
    echo "</td>\r\n                           <td>";
    echo $row_mon_progress_report["comments"];
    echo "</td>\r\n                          </tr>\r\n                          \r\n                         ";
}
echo "                         \r\n                         \r\n                          \r\n                          \r\n                      </tbody>\r\n                      \r\n                      \r\n                      \r\n                    </table>   \r\n                  </div>                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  \r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>