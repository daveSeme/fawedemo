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
echo "</i></span> </h2>\r\n          <div class=\"panel-toolbar\"> \r\n          \t\r\n          </div>\r\n        </div>\r\n        <div class=\"panel-container show\">\r\n          <!--<div class=\"panel-content\">\r\n            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              <strong>Hi!</strong> You should check in on some of those fields below. </div>\r\n          </div>-->\r\n          <div class=\"panel-content p-0\">\r\n            \r\n\t\t\t";
$insert_url = "planning/project_annual_plan/edit/" . $workflow_id;
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "\t\t\t\t \r\n\t\t  \r\n            \r\n              <div class=\"panel-content\">\r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Project Name</th>\r\n                      <td>";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
echo "                      </td>\r\n                      <td class=\"bg-highlight\"> Year </td>\r\n                      <td >";
echo $frameworkdata["year"];
echo "                      </td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n                \r\n                <div style=\"overflow:scroll;\">\r\n                <table class=\"table table-bordered\">\r\n               \r\n                <thead class=\"bg-highlight\">\r\n                \r\n                  <tr style=\"background:#00b0f0;\" >\r\n                    <th rowspan=\"3\">Code</th>\r\n                    <th rowspan=\"3\">Activity</th>\r\n                    <th style=\"text-align:center;\" colspan=\"24\">";
echo $frameworkdata["year"];
echo "</th>\r\n                    <th rowspan=\"3\">Action</th>\r\n                  </tr>\r\n                  \r\n                  <tr style=\"background:#00b0f0;\">\r\n                    <th colspan=\"6\">Q1</th>\r\n\r\n                    <th colspan=\"6\">Q2</th>\r\n\r\n                    <th colspan=\"6\">Q3</th>\r\n\r\n\r\n                    <th colspan=\"6\">Q4</th>\r\n                  </tr>\r\n                  \r\n                  \r\n                  <tr style=\"background:#00b0f0;\">\r\n                    <th colspan=\"2\">Oct</th>\r\n                    <th colspan=\"2\">Nov</th>\r\n                    <th colspan=\"2\">Dec</th>\r\n\r\n                    <th colspan=\"2\">Jan</th>\r\n                    <th colspan=\"2\">Feb</th>\r\n                    <th colspan=\"2\">Mar</th>\r\n\r\n                    <th colspan=\"2\">Apr</th>\r\n                    <th colspan=\"2\">May</th>\r\n                    <th colspan=\"2\">June</th>\r\n\r\n\r\n                    <th colspan=\"2\">July</th>\r\n                    <th colspan=\"2\">Aug</th>\r\n                    <th colspan=\"2\">Sep</th>\r\n                  </tr>\r\n\r\n                </thead>  \r\n                \r\n                \r\n                <tbody>\r\n                  \r\n\t\t\t\t\r\n\t\t\t\t";
$query_goal = $db->query("select * from project_goal where project_id= \"" . $project_id . "\" and flag=0 order by id");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "\r\n                \r\n\t\t\t\t";
    $query_outcome = $db->query("select * from project_outcome  where   project_outcome.goal_id='" . $row_goal["id"] . "' order by project_outcome.id ");
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "                \r\n                <tr style=\"background:#ffe699;\">\r\n                    <td>";
        echo $row_outcome["name"];
        echo " </td>\r\n                    <td colspan=\"25\">&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                </tr>   \r\n                      \r\n                 \r\n\t\t\t\t";
        $query_output = $db->query("select * from project_output where outcome_id='" . $row_outcome["id"] . "' and flag=0 order by id");
        $g = 1;
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "\r\n                 <tr style=\"background:#92d050;\">\r\n                    <td>Output : ";
            echo $row_output["name"];
            echo " </td>\r\n                    <td colspan=\"25\">&nbsp;</td>\r\n                    <td>&nbsp;</td>\r\n                  </tr>                  \r\n                    \r\n\t\t\t\t";
            $query_activity = $db->query("select * from project_activity where output_id='" . $row_output["id"] . "' and flag=0 order by id");
            $g = 1;
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "\r\n                 <tr>\r\n                    <td>&nbsp;</td>\r\n                    \r\n                    <td>\t\t\t\t\t  \r\n\t\t\t\t\t";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo " \t\t\t\t\t</td>\r\n                    \r\n                    \r\n                    ";
                $query = $db->query("select * from project_activity_annual_plan Where activity_id=\"" . $row_activity["id"] . "\" and year=\"" . $frameworkdata["year"] . "\" ");
                $results = $query->getResultArray();
                $budget = [];
                $plan = [];
                foreach ($results as $row) {
                    $plan[$row["quarter"]][$row["month"]] = $row["plan"];
                    $budget[$row["quarter"]][$row["month"]] = $row["budget"];
                }
                echo "                    \r\n                    <td ";
                if (isset($plan["Q1"]["Oct"]) && $plan["Q1"]["Oct"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Oct"]) ? $budget["Q1"]["Oct"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q1"]["Nov"]) && $plan["Q1"]["Nov"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Nov"]) ? $budget["Q1"]["Nov"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q1"]["Dec"]) && $plan["Q1"]["Dec"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q1"]["Dec"]) ? $budget["Q1"]["Dec"] : "";
                echo "</td>\r\n\r\n                  \r\n                  \r\n                  \r\n                    <td ";
                if (isset($plan["Q2"]["Jan"]) && $plan["Q2"]["Jan"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Jan"]) ? $budget["Q2"]["Jan"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q2"]["Feb"]) && $plan["Q2"]["Feb"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Feb"]) ? $budget["Q2"]["Feb"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q2"]["Mar"]) && $plan["Q2"]["Mar"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q2"]["Mar"]) ? $budget["Q2"]["Mar"] : "";
                echo "</td>\r\n                    \r\n                    \r\n                    \r\n                    \r\n                    <td ";
                if (isset($plan["Q3"]["Apr"]) && $plan["Q3"]["Apr"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["Apr"]) ? $budget["Q3"]["Apr"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q3"]["May"]) && $plan["Q3"]["May"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["May"]) ? $budget["Q3"]["May"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q3"]["June"]) && $plan["Q3"]["June"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q3"]["June"]) ? $budget["Q3"]["June"] : "";
                echo "</td>\r\n\r\n\r\n\r\n                    <td ";
                if (isset($plan["Q4"]["July"]) && $plan["Q4"]["July"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["July"]) ? $budget["Q4"]["July"] : "";
                echo "</td>\r\n                    \r\n                    <td ";
                if (isset($plan["Q4"]["Aug"]) && $plan["Q4"]["Aug"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["Aug"]) ? $budget["Q4"]["Aug"] : "";
                echo "</td>\r\n\r\n                    <td ";
                if (isset($plan["Q4"]["Sep"]) && $plan["Q4"]["Sep"] == 1) {
                    echo "bgcolor=\"#a8d08d\"";
                }
                echo ">&nbsp;</td>\r\n                    <td>";
                echo isset($budget["Q4"]["Sep"]) ? $budget["Q4"]["Sep"] : "";
                echo "</td>\r\n                    \r\n                    \r\n                    <td>\r\n                    <a href=\"";
                echo base_url() . "/planning/project_annual_plan/update_plan/" . $workflow_id . "/?id=" . $row_activity["id"] . "&output_id=" . $row_output["id"];
                echo "\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" title=\"Edit\"><i class=\"fal fa-edit\"></i>\r\n                    </a>\r\n                    </td>\r\n                  </tr>                  \r\n                    \r\n                  ";
            }
            echo "      \r\n                    \r\n                    \r\n                    \r\n                  ";
        }
        echo "   \r\n                    \r\n                  \r\n                   ";
    }
    echo "                  \r\n                  \r\n                  ";
}
echo "                </tbody>\r\n              </table>\r\n\t\t\t\t\r\n\t\t\t\t </div>\r\n              </div>\r\n              \r\n              \r\n              \r\n              <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                <div class=\"col-lg-offset-5 col-lg-7\">\r\n                   <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n                  <a href=\"";
echo base_url() . "/planning/project_annual_plan";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n              </div>\r\n              \r\n              \r\n            \r\n            </form>\r\n            \r\n          </div>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n  \r\n \r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\n";

?>