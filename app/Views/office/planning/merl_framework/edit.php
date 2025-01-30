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
echo "</i></span> </h2>\r\n          <div class=\"panel-toolbar\"> \r\n          \t<!--<a href=\"";
echo base_url() . "/planning/merl_framework/logframe/" . $fydp;
echo "\" class=\"btn btn-primary btn-sm waves-effect waves-themed\"><i class=\"fal fa-plus\"></i> Go to Strategic Plan</a> -->\r\n          </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Hi!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n            \r\n             ";
$insert_url = "planning/merl_framework/edit/" . $fydp;
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "            \r\n              <div class=\"panel-content\">\r\n               \r\n\t\t\t   \r\n\t\t\t   <p><h3>";
$this->session = Config\Services::session();
if ($this->session->get("user_type") == "User") {
    $base_id = $this->session->get("office");
    $min = get_by_id("id", $base_id, "mas_structure");
    echo "Institution Name: " . $min["name"];
}
echo "</h3></p>\r\n                    <table class=\"table table-bordered\">\r\n                      <tbody>\r\n                        <tr>\r\n                          <th class=\"bg-highlight\">Strategic Plan Name</th>\r\n                          <td colspan=\"3\">";
echo $stdata["plan_name"];
echo "</td>\r\n                        </tr>\r\n                        \r\n                        <tr>\r\n                          <th class=\"bg-highlight\">Start Year</th>\r\n                          <td>";
echo $stdata["startyear"];
echo "</td>\r\n                          <th class=\"bg-highlight\">End Year</th>\r\n                          <td>";
echo $stdata["endyear"];
echo "</td>\r\n                        </tr> \r\n                        \r\n                      </tbody>\r\n                    </table>\r\n                \r\n                <div style=\"overflow-x:scroll;\">\r\n                 \r\n                  <table class=\"table table-bordered table-striped w-100\">\r\n                    \r\n                    <thead class=\"bg-highlight\">\r\n                         <tr style=\"background:#969696;color:#fff;\">\r\n                            <td rowspan=\"2\">&nbsp;</td>\r\n                            <td rowspan=\"2\"><strong>Indicators</strong></td>\r\n                            <td rowspan=\"2\"><strong>Unit</strong></td>\r\n                            <td rowspan=\"2\"><strong>Baseline</strong></td>\r\n                            <td colspan=\"5\" align=\"center\"><strong>Annual Target</strong></td>\r\n                            <td rowspan=\"2\"><strong>Action</strong></td>\r\n                          </tr>\r\n                          \r\n                         <tr style=\"background:#969696;color:#fff;\">\r\n                            \r\n\t\t\t\t\t\t\t";
$startyear = $stdata["startyear"];
$endyear = $stdata["endyear"];
$diff = $endyear - $startyear + 1;
for ($i = $startyear; $i <= $endyear; $i++) {
    echo "                            <td><strong>";
    echo $i;
    echo "</strong></td>\r\n                            ";
}
echo "                          </tr>\r\n\r\n                    </thead>  \r\n                      \r\n                    <tbody class=\"bg-highlight\">  \r\n\t\t\t\t\t";
$query_sissue = $db->query("select * from  org_thematic_area where mda_plan_id = \"" . $fydp . "\" and flag=0  order by id ");
$g = 1;
$results_issue = $query_sissue->getResultArray();
foreach ($results_issue as $row_issue) {
    echo "                    \r\n                      <tr bgcolor=\"#fff2e4\">\r\n                        <td><strong>Thematic Area</strong> : ";
    echo $row_issue["name"];
    echo "</td>\r\n                        <td colspan=\"9\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                  \r\n\t\t\t\t\t";
    $i = 3;
    $query_obj = $db->query("SELECT * from org_objective  where  th_area_id = '" . $row_issue["id"] . "' and  base_id='" . $base_id . "'  order by id ");
    $results_obj = $query_obj->getResultArray();
    foreach ($results_obj as $row_obj) {
        echo "                      <tr bgcolor=\"#e2ffa7\">\r\n                        <td><strong>Objectives </strong>  : ";
        echo $row_obj["strategic_objective"];
        echo "</td>\r\n                        <td colspan=\"9\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
        $i = 3;
        $query_obj_ind = $db->query("select * from org_objective_indicator  where  objective_id = '" . $row_obj["id"] . "' and base_id='" . $base_id . "'  order by id ");
        $results_obj_ind = $query_obj_ind->getResultArray();
        foreach ($results_obj_ind as $row_obj_ind) {
            echo "                    \r\n                      <tr style=\"background:#ffffff;\">\r\n                        <td>&nbsp;</td>\r\n                        <td>";
            echo $row_obj_ind["indicator"];
            echo "</td>\r\n                        \r\n                        <td>\r\n\t\t\t\t\t\t\t";
            $unit_data = get_by_id("id", $row_obj_ind["unit"], "mas_unit");
            echo $unit_name = $unit_data["name"];
            echo "                        </td>\r\n                        \r\n                        <td>";
            echo $row_obj_ind["baseline"];
            echo "</td>\r\n                        \r\n                        \r\n\t\t\t\t\t\t";
            $k = 1;
            for ($i = $startyear; $i <= $endyear; $i++) {
                if ($row_obj_ind["id"] != "") {
                    $query_m_n_e = $db->query("SELECT \r\n                        \r\n                        IFNULL( SUM( IF( objective_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                        \r\n                        from objective_indicator_target  where  objective_indicator_target.indicator_id=" . $row_obj_ind["id"] . "  ");
                    $line_m_n_e = $query_m_n_e->getRowArray();
                    echo "                        <td>\r\n\t\t\t\t\t\t";
                    echo $line_m_n_e["target_" . $k];
                    echo "                        ";
                    if ($unit_name == "Percentage") {
                        echo "%";
                    } else {
                        if ($unit_name == "Number") {
                            echo "";
                        } else {
                            echo $unit_name;
                        }
                    }
                    echo "                        </td>\r\n                        ";
                } else {
                    echo "<td>&nbsp;</td>";
                }
                $k++;
            }
            echo "\r\n\r\n                        \r\n                        <td>\r\n                        <a href=\"";
            echo base_url() . "/planning/merl_framework/edit_objective_indicator/" . $fydp . "/?id=" . $row_obj_ind["id"];
            echo "\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"Edit\"><i class=\"fal fa-edit\"></i>\r\n                        </a>\r\n                        </td>\r\n                      </tr>\r\n                      \r\n                      ";
        }
        echo "                      \r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
        $i = 3;
        $query_strat_inter = $db->query("select * from org_strategic_intervention  where  objective_id = '" . $row_obj["id"] . "' and base_id='" . $base_id . "'  order by id ");
        $results_strat_inter = $query_strat_inter->getResultArray();
        foreach ($results_strat_inter as $row_strat_inter) {
            echo "                    \r\n                      <tr bgcolor=\"#bccee4\">\r\n                        <td><strong>Strategic Intervention </strong>  :  ";
            echo $row_strat_inter["strat_interven_name"];
            echo "</td>\r\n                        <td colspan=\"9\">&nbsp;</td>\r\n                      </tr>\r\n                      \r\n                      \r\n                      \r\n\t\t\t\t\t";
            $i = 3;
            $query_int_ind = $db->query("select * from org_intervention_indicator  where intervention_id = '" . $row_strat_inter["id"] . "' and base_id='" . $base_id . "' order by id");
            $results_int_ind = $query_int_ind->getResultArray();
            foreach ($results_int_ind as $row_int_ind) {
                echo "                    \r\n                      <tr style=\"background:#ffffff;\">\r\n                        <td>&nbsp;</td>\r\n                        <td>";
                echo $row_int_ind["indicator"];
                echo "</td>\r\n                        \r\n                        <td>\r\n\t\t\t\t\t\t\t";
                $unit_data = get_by_id("id", $row_int_ind["unit"], "mas_unit");
                echo $unit_name = $unit_data["name"];
                echo "                        </td>\r\n                        <td>";
                echo $row_int_ind["baseline"];
                echo "</td>\r\n                        \r\n\t\t\t\t\t\t";
                $k = 1;
                for ($i = $startyear; $i <= $endyear; $i++) {
                    if ($row_int_ind["id"] != "") {
                        $query_m_n_e = $db->query("SELECT \r\n                        \r\n                        IFNULL( SUM( IF( org_intervention_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                        \r\n                        from org_intervention_indicator_target  where  org_intervention_indicator_target.indicator_id=" . $row_int_ind["id"] . "  ");
                        $line_m_n_e = $query_m_n_e->getRowArray();
                        echo "                        <td>\r\n\t\t\t\t\t\t";
                        echo $line_m_n_e["target_" . $k];
                        echo "                        ";
                        if ($unit_name == "Percentage") {
                            echo "%";
                        } else {
                            if ($unit_name == "Number") {
                                echo "";
                            } else {
                                echo $unit_name;
                            }
                        }
                        echo "                        </td>\r\n                        ";
                    } else {
                        echo "<td>&nbsp;</td>";
                    }
                    $k++;
                }
                echo "                       \r\n                       \r\n                        \r\n                        <td>\r\n                        <a href=\"";
                echo base_url() . "/planning/merl_framework/edit_indicator/" . $fydp . "/?id=" . $row_int_ind["id"];
                echo "\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"Edit\"><i class=\"fal fa-edit\"></i>\r\n                        </a>\r\n                        </td>\r\n                      </tr>\r\n                      \r\n                      ";
            }
            echo "                      \r\n                      \r\n                      \r\n                      ";
        }
        echo "                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                      ";
    }
    echo "                      ";
}
echo "                    </tbody>\r\n                  </table>\r\n                </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                \r\n                  <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/planning/merl_framework";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              </form>\r\n            \r\n            \r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>