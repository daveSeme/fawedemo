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
echo "</i></span> </h2>\r\n          \r\n          <!---------Export/Print div--->\r\n          <div class=\"panel-toolbar\">\r\n           \r\n          <div class=\"dt-buttons ex-pr-div\">\r\n                <a href=\"";
echo base_url() . "/planning/project_me_plan/download_excel/" . $workflow_id;
echo "\" class=\"btn buttons-excel buttons-html5 btn-outline-success btn-sm mr-1\" title=\"Generate Excel\">\t     <span>Excel</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project_me_plan/download_word/" . $workflow_id;
echo "\" class=\"btn buttons-word buttons-html5 btn-outline-primary btn-sm mr-1\" title=\"Generate Word\">\r\n                <span>Word</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project_me_plan/download_pdf/" . $workflow_id;
echo "\"  class=\"btn buttons-pdf buttons-html5 btn-outline-danger btn-sm mr-1\" title=\"Generate PDF\">\r\n                <span>PDF</span>\r\n                </a>\r\n                <a href=\"";
echo base_url() . "/planning/project_me_plan/print_page/" . $workflow_id;
echo "\" class=\"btn buttons-print btn-outline-secondary btn-sm \"  title=\"Print\"><span>Print</span></a>\r\n          </div>\r\n           \r\n           \r\n          </div>\r\n          <!---------Export/Print div--->\r\n          \r\n        </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Hi!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n            \r\n\t\t\t";
$insert_url = "planning/project_result_framework/add/" . $workflow_id;
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t  \r\n            \r\n            <div class=\"panel-content\">\r\n              <table class=\"table table-bordered\">\r\n                <tbody>\r\n                  <tr>\r\n                    <th class=\"bg-highlight\">Project Name</th>\r\n                    <td>";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
$startdate = date("Y", strtotime($project_details["start_date"]));
$enddate = date("Y", strtotime($project_details["end_date"]));
$diff = $enddate - $startdate + 1;
echo "                    </td>\r\n                  </tr>\r\n                </tbody>\r\n              </table>\r\n              \r\n              \r\n  <ul class=\"nav nav-tabs\" role=\"tablist\">\r\n    <li class=\"nav-item\"><a class=\"nav-link active\" data-toggle=\"tab\" href=\"#tab_borders_icons-1\" role=\"tab\" aria-selected=\"true\"><i class=\"fal fa-list mr-1\"></i> M&E Plan</a> </li>\r\n    <li class=\"nav-item\"><a class=\"nav-link\" data-toggle=\"tab\" href=\"#tab_borders_icons-2\" role=\"tab\" aria-selected=\"false\"><i class=\"fal fa-list mr-1\"></i> Annual WorkPlan & Budget</a> </li>\r\n  </ul>\r\n  \r\n  \r\n  <div class=\"tab-content border border-top-0 p-3\">\r\n  \r\n  \r\n    <div class=\"tab-pane fade active show\" id=\"tab_borders_icons-1\" role=\"tabpanel\"> \r\n    \r\n<table class=\"table table-bordered table-striped w-100\">\r\n               \r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#969696;\" >\r\n                    <th rowspan=\"2\">Result</th>\r\n                    <th rowspan=\"2\">Indicator</th>\r\n                    <th rowspan=\"2\">Baseline</th>\r\n                    <th rowspan=\"2\">Overall Target</th>\r\n                    ";
$diff = $enddate - $startdate + 1;
echo "                    <th colspan=\"";
echo $diff;
echo "\" style=\"text-align:center;\">Target</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#969696;\" >\r\n                    ";
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                    <th>";
    echo $i;
    echo "</th>\r\n                    ";
}
echo "                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where workflow_id= \"" . $workflow_id . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                 <tr style=\"background:#ffc000;\">\r\n                    <td  colspan=\"9\">Component : ";
    echo $row_goal["name"];
    echo " </td>\r\n                  </tr>                  \r\n                  \r\n                  \r\n\t\t\t\t";
    $query_goal_indicator = $db->query("select * from project_goal_indicator  Where goal_id='" . $row_goal["id"] . "' order by id ");
    $results_goal_indicator = $query_goal_indicator->getResultArray();
    foreach ($results_goal_indicator as $row_goal_indicator) {
        $unit_data = get_by_id("id", $row_goal_indicator["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "                 <tr style=\"background:#ffc000;\">\r\n                    <td >Component Indicator</td>\r\n                    <td >";
        echo $row_goal_indicator["indicator"];
        echo "</td>\r\n                    <td >";
        echo $row_goal_indicator["baseline"];
        echo "</td>\r\n                    <td >";
        echo $row_goal_indicator["target"];
        echo "</td>\r\n\t\t\t\t\t";
        $k = 1;
        for ($i = $startdate; $i <= $enddate; $i++) {
            $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_goal_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_goal_indicator_target  where  indicator_id=" . $row_goal_indicator["id"] . "  ");
            $line_m_n_e = $query_m_n_e->getRowArray();
            echo "                    <td >";
            echo $line_m_n_e["target_" . $k];
            echo "  ";
            if ($unit_name == "Percentage") {
                echo "%";
            } else {
                if ($unit_name == "Number") {
                    echo "";
                } else {
                    echo $unit_name;
                }
            }
            echo "</td>\r\n                    ";
            $k++;
        }
        echo "                  </tr>\r\n                  ";
    }
    echo "                  \r\n                  \r\n                  \r\n                  ";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                    \r\n                    \r\n                     <tr style=\"background:#339933;\">\r\n                        <td  colspan=\"9\">Outcome : ";
        echo $row_outcome["name"];
        echo " </td>\r\n                      </tr>   \r\n                      \r\n                      \r\n\t\t\t\t";
        $query_outcome_indicator = $db->query("select * from project_outcome_indicator  Where outcome_id='" . $row_outcome["id"] . "' order by id ");
        $results_outcome_indicator = $query_outcome_indicator->getResultArray();
        foreach ($results_outcome_indicator as $row_outcome_indicator) {
            $unit_data = get_by_id("id", $row_outcome_indicator["unit"], "mas_unit");
            $unit_name = $unit_data["name"];
            echo "                 <tr style=\"background:#339933;\">\r\n                    <td >Outcome Indicator</td>\r\n                    <td >";
            echo $row_outcome_indicator["indicator"];
            echo "</td>\r\n                    <td >";
            echo $row_outcome_indicator["baseline"];
            echo "</td>\r\n                    <td >";
            echo $row_outcome_indicator["target"];
            echo "</td>\r\n\t\t\t\t\t";
            $k = 1;
            for ($i = $startdate; $i <= $enddate; $i++) {
                $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_outcome_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_outcome_indicator_target  where  indicator_id=" . $row_outcome_indicator["id"] . "  ");
                $line_m_n_e = $query_m_n_e->getRowArray();
                echo "                    <td >";
                echo $line_m_n_e["target_" . $k];
                echo "  ";
                if ($unit_name == "Percentage") {
                    echo "%";
                } else {
                    if ($unit_name == "Number") {
                        echo "";
                    } else {
                        echo $unit_name;
                    }
                }
                echo "</td>\r\n                    ";
                $k++;
            }
            echo "                  </tr>\r\n                  ";
        }
        echo "                      \r\n                    \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#e6c5d4;\">\r\n                    <td  colspan=\"9\">Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                  </tr>                  \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_output_indicator = $db->query("select * from project_output_indicator  Where output_id='" . $row_output["id"] . "' order by id ");
            $results_output_indicator = $query_output_indicator->getResultArray();
            foreach ($results_output_indicator as $row_output_indicator) {
                $unit_data = get_by_id("id", $row_output_indicator["unit"], "mas_unit");
                $unit_name = $unit_data["name"];
                echo "                 <tr style=\"background:#e6c5d4;\">\r\n                    <td >Output Indicator</td>\r\n                    <td >";
                echo $row_output_indicator["indicator"];
                echo "</td>\r\n                    <td >";
                echo $row_output_indicator["baseline"];
                echo "</td>\r\n                    <td >";
                echo $row_output_indicator["target"];
                echo "</td>\r\n\t\t\t\t\t";
                $k = 1;
                for ($i = $startdate; $i <= $enddate; $i++) {
                    $query_m_n_e = $db->query("SELECT \r\n                    \r\n                    IFNULL( SUM( IF( project_output_indicator_target.year =  '" . $i . "', target, NULL ) ) , 0 ) as target_" . $k . " \r\n                    \r\n                    from project_output_indicator_target  where  indicator_id=" . $row_output_indicator["id"] . "  ");
                    $line_m_n_e = $query_m_n_e->getRowArray();
                    echo "                    <td >";
                    echo $line_m_n_e["target_" . $k];
                    echo "  ";
                    if ($unit_name == "Percentage") {
                        echo "%";
                    } else {
                        if ($unit_name == "Number") {
                            echo "";
                        } else {
                            echo $unit_name;
                        }
                    }
                    echo "</td>\r\n                    ";
                    $k++;
                }
                echo "                  </tr>\r\n                  ";
            }
            echo "                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr style=\"background:#00b0f0;\">\r\n                    <td  colspan=\"9\">Activity : \r\n\t\t\t\t\t\t\t\t\t\t  ";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo " \r\n                    </td>\r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>    \r\n    \r\n     </div>\r\n    \r\n<!--###########################################################Annual PLan############################################################################################-->    \r\n    \r\n    <div class=\"tab-pane fade\" id=\"tab_borders_icons-2\" role=\"tabpanel\"> \r\n\r\n\t\t<table class=\"table table-bordered table-striped w-100\">\r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    <th rowspan=\"2\">Result</th>\r\n                    <th rowspan=\"2\">Activities</th>\r\n                    ";
$diff = $enddate - $startdate + 1;
echo "                    <th colspan=\"";
echo $diff + 4;
echo "\" style=\"text-align:center;\">Workplan</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    ";
for ($i = $startdate; $i <= $enddate; $i++) {
    echo "                    \t<th colspan=\"2\" style=\"text-align:center;\">";
    echo $i;
    echo "</th>\r\n                    ";
}
echo "                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where workflow_id= \"" . $workflow_id . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                  \r\n\t\t\t\r\n                  \r\n                  \r\n                  \r\n                  \r\n                  ";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                    \r\n                    \r\n                     <tr style=\"background:#ffe699;\">\r\n                        <td  colspan=\"9\">Outcome : ";
        echo $row_outcome["name"];
        echo " </td>\r\n                      </tr>   \r\n                      \r\n                      \r\n\t\t\t\t\r\n                      \r\n                    \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#92d050;\">\r\n                    <td  colspan=\"9\">Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                  </tr>                  \r\n                    \r\n                    \r\n               \r\n                    \r\n                    \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr>\r\n                    <td>&nbsp;</td>\r\n                    <td>\t\t\t\t\t  \r\n\t\t\t\t\t";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo " \t\t\t\t\t</td>\r\n                    \r\n                    \r\n                    \r\n                    ";
                for ($i = $startdate; $i <= $enddate; $i++) {
                    echo "                    \r\n                    ";
                    $query_workplan = $db->query("select * from project_activity_annual_budget_map where activity_id = \"" . $row_activity["id"] . "\" and year=\"" . $i . "\"   ");
                    $results_workplan = $query_workplan->getResultArray();
                    foreach ($results_workplan as $row_workplan) {
                        $year[] = $row_workplan["year"];
                        $annual_plan[$row_workplan["year"]] = $row_workplan["annual_plan"];
                        $annul_budget[$row_workplan["year"]] = $row_workplan["annul_budget"];
                    }
                    echo "\r\n                    <td ";
                    if (isset($annual_plan[$i]) && $annual_plan[$i] == 1) {
                        echo "bgcolor=\"#a8d08d\"";
                    }
                    echo "></td>\r\n                    <td>";
                    echo isset($annul_budget[$i]) ? $annul_budget[$i] : "";
                    echo "</td>\r\n\r\n                    \r\n                    \r\n                    \r\n                    ";
                }
                echo " \r\n                    \r\n                    \r\n                    \r\n                    \r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n\r\n\r\n\r\n\t\t\t\r\n    </div>\r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n    \r\n  </div>\r\n              \r\n            </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                  <a href=\"";
echo base_url() . "/planning/project_me_plan";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back</a> </div>\r\n              </div>\r\n              \r\n              \r\n            \r\n            </form>\r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>