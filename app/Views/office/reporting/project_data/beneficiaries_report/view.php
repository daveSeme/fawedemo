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
echo base_url() . "/reporting/project_data/beneficiaries_report/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/beneficiaries_report/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/beneficiaries_report/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/project_data/beneficiaries_report/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <div class=\"panel-content\">\r\n\t\t  \t   \r\n           <!-- <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Holy guacamole!</strong> You should check in on some of those fields below. </div>-->\r\n          </div>\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n                \r\n\t\t\t\t \r\n\t\t\t\t\r\n\t\t\t\t\r\n                <table  class=\"table table-bordered m-0\">\r\n\t\t\t \r\n\t\t\t\r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
$db = Config\Database::connect();
$project = get_by_id("id", $stdata["project"], "project");
echo $project["name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Year</td>\r\n                  <td>";
echo $stdata["year"];
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n             \r\n                <tr>\r\n                <td>Reporting Period</td>\r\n                <td>";
echo $stdata["reporting_period"];
echo "</td>\r\n                </tr>\r\n   ";
echo "<tr>\r\n                <td>County</td>\r\n                <td>";
$query = $db->query("SELECT name from mas_county WHERE id = '" . $stdata["county"] . "'");
    $results = $query->getResult();
    $row = $query->getRow();
    echo $row->name;
echo "</td>\r\n                </tr>\r\n";
echo "         \r\n            \r\n                        <td>Created by</td>\r\n                        <td>\r\n                         ";
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
echo "</table>  \r\n\t\t\t\r\n <br/>";
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
echo "</div>                    \r\n                  \r\n                    \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  \r\n                  <a href=\"";
echo base_url() . "/reporting/project_data/beneficiaries_report";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            </form>\r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>