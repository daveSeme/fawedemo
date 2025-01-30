<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from org_quarterly_indicator_tracking_report where strategic_plan = '" . $strategic_plan . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n<table  class=\"table table-bordered m-0\">\r\n\t\t\t \r\n\t\t\t\r\n                <tr>\r\n                <td width=\"50%\">Strategic Plan</td>\r\n                <td>\r\n                ";
    $plan = get_by_id("id", $strategic_plan, "org_data_strategic_plans_workflow");
    echo $plan_name = $plan["plan_name"];
    echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Year</td>\r\n                  <td>";
    echo $year;
    echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Quarter</td>\r\n                  <td>";
    echo $row_plan->quarter;
    echo "</td>\r\n                </tr>\r\n\t\t\t\r\n                <tr>\r\n                <td>Report Name</td>\r\n                <td>";
    echo $row_plan->report_name;
    echo "</td>\r\n                </tr>\r\n            \r\n            \r\n                        <td>Created by</td>\r\n                        <td>\r\n                         ";
    $db = Config\Database::connect();
    if ($row_plan->createdby != "0") {
        $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $row_plan->createdby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    } else {
        $query = $db->query("SELECT name FROM ctbl_users WHERE id = '" . $row_plan->updatedby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    }
    echo " \r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n            \r\n            \r\n            \r\n\t\t\t<tr>\r\n\t\t\t<td>Report Date </td>\r\n\t\t\t<td>\r\n\t\t\t  ";
    echo $newDate = date("d/m/Y", strtotime($row_plan->createtime));
    echo "\t\t\t\r\n\t\t\t</td>\r\n\t\t\t</tr>\r\n\t\t\r\n\t\t\t</table>\r\n\r\n\r\n\r\n<table class=\"table table-bordered\">\r\n                     \r\n                     <thead class=\"bg-highlight\">\r\n                          <tr>\r\n                           <th>Indicator</th>\r\n                           <th>Target</th>\r\n                           <th>Quarter Achievement</th>\r\n                           <th>Variance</th>\r\n                          </tr>\r\n                      </thead>\r\n                      \r\n                      <tbody id=\"project_div\">\r\n                          \r\n                      ";
    $query_mon_progress_report = $db->query("select * from org_quarterly_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Objective Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "                       \r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_objective_indicator");
        echo $project_details["indicator"];
        echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
        echo $row_mon_progress_report["indicator_id"];
        echo "\" />\r\n                           </td>\r\n                           \r\n                            <td>\r\n                             ";
        echo $row_mon_progress_report["target"];
        echo "                             ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "                            </td>\r\n                           <td>\r\n                            ";
        echo $row_mon_progress_report["achievement"];
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
        echo "                           </td>\r\n                           <td>\r\n                            ";
        echo $row_mon_progress_report["achievement"] - $row_mon_progress_report["target"];
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
        echo "                           </td>\r\n                          </tr>\r\n                       \t\t\r\n                     \t ";
    }
    echo "\r\n                       \r\n                       \r\n                       \r\n                          \r\n                      ";
    $query_mon_progress_report = $db->query("select * from org_quarterly_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Intervention Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "                       \r\n                       \r\n                           <!--intervention Indicator-->\r\n                          <tr>\r\n                           <td width=\"50%\">\r\n\t\t\t\t\t\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_intervention_indicator");
        echo $project_details["indicator"];
        echo "                            <input type=\"hidden\" name=\"indicator_id[]\" value=\"";
        echo $row_mon_progress_report["indicator_id"];
        echo "\" />\r\n                           </td>\r\n                           \r\n                            <td>\r\n                             ";
        echo $row_mon_progress_report["target"];
        echo "                             ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "                            </td>\r\n                           <td>\r\n                            ";
        echo $row_mon_progress_report["achievement"];
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
        echo "                           </td>\r\n                           <td>\r\n                            ";
        echo $row_mon_progress_report["achievement"] - $row_mon_progress_report["target"];
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
        echo "                           </td>\r\n                          </tr>\r\n                          \r\n                         ";
    }
    echo "                         \r\n                         \r\n                          \r\n                          \r\n                      </tbody>\r\n                      \r\n                      \r\n                      \r\n                    </table>\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>