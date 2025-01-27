<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
$session = Config\Services::session();
echo "<style>\r\n.framework_cls{\r\n\tfont-size:18px;\r\n}\r\n</style>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n  <!-- Form code starts here  -->\r\n  \r\n  <div class=\"row\">\r\n    <div class=\"col-xl-12\">\r\n      <div id=\"panel-2\" class=\"panel\">\r\n        <div class=\"panel-hdr\">\r\n          <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n          <div class=\"panel-toolbar\"> \r\n          \t \r\n          </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Hi!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n            \r\n            ";
$insert_url = "planning/results_framework/edit/" . $fydp;
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t  \r\n            \r\n              <div class=\"panel-content\">\r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">FYDP Name</th>\r\n                      <td colspan=\"3\">";
echo $stdata["plan_name"];
echo "</td>\r\n                    </tr>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Start Date</th>\r\n                      <td>";
echo changeDateFormat("d-m-Y", $stdata["startdate"]);
echo "</td>\r\n                      <th class=\"bg-highlight\">End Date</th>\r\n                      <td>";
echo changeDateFormat("d-m-Y", $stdata["enddate"]);
echo "</td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n                <table  id=\"dt-basic-example\" class=\"table table-bordered table-striped w-100\">\r\n\t\t\t\t<thead class=\"bg-primary-600\">\r\n\t\t\t\t</thead>\r\n                      <tbody class=\"bg-highlight\">\r\n                                    ";
$query_so = $db->query("SELECT * FROM  fydp_sectors where    fydp_id=\"" . $fydp . "\" and flag=0  order by id ");
$g = 1;
$results = $query_so->getResultArray();
foreach ($results as $row_so) {
    echo "                        <tr style=\"background:#a8d08d;\">\r\n                          <td class=\"framework_cls\" colspan=\"11\">Sector : ";
    echo $row_so["name"];
    echo " </td>\r\n                        </tr>\r\n                       ";
    $i = 3;
    $query_str = $db->query("SELECT  *    from fydp_sector_priority  Where   fydp_sector_priority.sector_id='" . $row_so["id"] . "'  order by fydp_sector_priority.id ");
    $results_sp = $query_str->getResultArray();
    foreach ($results_sp as $row_sp) {
        echo "                        <tr style=\"background:#a8d08d;\">\r\n                          <td class=\"framework_cls\" colspan=\"11\">Sector Priority :  ";
        echo $row_sp["name"];
        echo "</td>\r\n                        </tr> ";
    }
    echo "                        \r\n                         <tr style=\"background:#9cc2e5;\" class=\"framework_cls\">\r\n                              <td width=\"15%\">&nbsp;</td>\r\n                              <td>Indicators</td>\r\n                              <td>Baseline</td>\r\n                              <td>Target</td>\r\n                              <td>MoV</td>\r\n                              <td>Assumption </td>\r\n                              <td>Y1</td>\r\n                              <td>Y2</td>\r\n                              <td>Y3</td>\r\n                              <td>Y4</td>\r\n                              <td>Y5</td>\r\n                        </tr>\r\n                        ";
    $i = 3;
    $query_ssector = $db->query("SELECT  *    from fydp_sub_sector  Where   fydp_sub_sector.sector_id='" . $row_so["id"] . "'  order by fydp_sub_sector.id ");
    $results_ss = $query_ssector->getResultArray();
    foreach ($results_ss as $row_ss) {
        echo "                         <tr style=\"background:#9cc2e5;\">\r\n                          <td class=\"framework_cls\" colspan=\"11\">Sub Sector : ";
        echo $row_ss["name"];
        echo "</td>\r\n                        </tr>\r\n                        ";
        $query_ssp = $db->query("SELECT * from fydp_sub_sector_priority  Where   fydp_sub_sector_priority.sector_priority_id='" . $row_ss["id"] . "'   order by fydp_sub_sector_priority.id ");
        $results_ssp = $query_ssp->getResultArray();
        foreach ($results_ssp as $row_ssp) {
            echo "                         <tr style=\"background:#9cc2e5;\">\r\n                          <td class=\"framework_cls\" colspan=\"11\">Sub Sector Priority : ";
            echo $row_ssp["name"];
            echo "</td>\r\n                        </tr>";
        }
        echo "                         ";
        $query_outcome = $db->query("SELECT  *    from fydp_outcome  Where   fydp_outcome.sspid='" . $row_ss["id"] . "'   order by fydp_outcome.id ");
        $results_outcome = $query_outcome->getResultArray();
        foreach ($results_outcome as $row_outcome) {
            echo "                         <tr style=\"background:#ffd966;\">\r\n                          <td class=\"framework_cls\" colspan=\"11\">Outcome : ";
            echo $row_outcome["name"];
            echo "</td>\r\n                        </tr>\r\n\r\n";
            $query_output = $db->query("SELECT  *    from fydp_output  Where   fydp_output.outcome_id='" . $row_outcome["id"] . "'   order by fydp_output.id ");
            $results_output = $query_output->getResultArray();
            foreach ($results_output as $row_output) {
                echo "\t\t\t\t\t\t\t\t\t\t    ";
                $query_indicator = $db->query("SELECT  *    from fydp_indicator  Where   fydp_indicator.output_id='" . $row_output["id"] . "'   order by fydp_indicator.id ");
                $results_indicator = $query_indicator->getResultArray();
                foreach ($results_indicator as $row_indicator) {
                    echo "                         <tr >\r\n                          <td class=\"framework_cls\" style=\"background:#ff9396;\">Output : ";
                    echo $row_output["name"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["indicator"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["baseline"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["target"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["means_of_verification"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["assumption"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["year1"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["year2"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["year3"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["year4"];
                    echo "</td>\r\n                          <td class=\"framework_cls\">";
                    echo $row_indicator["year5"];
                    echo "</td>\r\n                        </tr>";
                }
                echo "                        \r\n                         <tr style=\"background:#ffffff;\">\r\n                              <td width=\"15%\">&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                              <td>&nbsp;</td>\r\n                        </tr>\r\n\t\t\t\t\t\t ";
            }
            echo "                        ";
        }
        echo "                        ";
    }
    echo "                        ";
}
echo "                      </tbody>\r\n                </table>\r\n\t\t\t\t\r\n\t\t\t\t\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  \r\n                  <a href=\"";
echo base_url() . "/planning/results_framework";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            \r\n            </form>\r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>