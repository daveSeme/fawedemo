<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<style type=\"text/css\">\r\n    /*everything below this line is custom */\r\n       \r\n    #field-MapLocation{ height: 80px; width:766px}\r\n    #map{height:500px;}\r\n    #map.fullscreen{top:0 !important;left:0 !important;position: fixed !important;width: 100% !important;height: 100% !important;z-index: 1000;}\r\n</style>\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_types/download_excel/" . $pid;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_types/download_word/" . $pid;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_types/download_pdf/" . $pid;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_types/print_page/" . $pid;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        <div class=\"panel-container show\">\r\n         \r\n          <div class=\"panel-content p-0\">\r\n            \r\n            \r\n              <div class=\"panel-content\">\r\n                <div class=\"form-row\">\r\n\r\n\r\n\t\t\t\t<!-- Form Starts here  --> \r\n\t\t\t\t\r\n\t\t\t\t <table  class=\"table table-bordered m-0\">\r\n\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Date </td>\r\n\t\t\t\t\t\t<td >";
echo changeDateFormat("d/m/Y", $stdata["createdtime"]);
echo "</td>\r\n\t\t\t\t\t</tr>\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Code </td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["code"];
echo "</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t\r\n                    \r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td  class=\"form-label\">Case Name</td>\r\n\t\t\t\t\t\t<td >";
echo $stdata["name"];
echo "</td>\r\n\t\t\t\t   </tr>\r\n\r\n\t\t\t\t";
echo "<tr style='text-align:left; padding: 20px;'><td colspan='2'><h6 class=\"form-label\">Case Contexts</h6></td></tr>";
echo "<tr><table  class=\"table table-bordered m-0\">";
echo "<tr><th>Code</th><th>Name</th></tr>";
if($stcontexts != null && count($stcontexts) > 0) {
    foreach($stcontexts as $stcontext) {
        echo "<td>" . $stcontext["code"] . "</td><td>" . $stcontext["name"] . "</td>";
    }
}
echo "</table></tr>";
echo "</table>\r\n                 \r\n                    \r\n                   <!-- Form Ends here  --> \r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                 \r\n                  <a href=\"";
echo base_url() . "/reporting/organizational_data/cases_database";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n          \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>