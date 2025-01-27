<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from org_annual_indicator_tracking_report where strategic_plan = '" . $strategic_plan . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n<table  class=\"table table-bordered m-0\">\r\n \r\n \r\n  <tr>\r\n    <td width=\"50%\">Strategic Plan</td>\r\n    <td>\r\n\t";
    $plan = get_by_id("id", $strategic_plan, "org_data_strategic_plans_workflow");
    echo $plan_name = $plan["plan_name"];
    echo "    </td>\r\n  </tr>\r\n  \r\n  \r\n  <tr>\r\n    <td>Year</td>\r\n    <td>";
    echo $year;
    echo "</td>\r\n  </tr>\r\n  \r\n  \r\n  <tr>\r\n    <td>Report Name</td>\r\n    <td>";
    echo $row_plan->report_name;
    echo "</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n  \t<td>Created by</td>\r\n    <td>\r\n\t";
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
    echo "    </td>\r\n  </tr>\r\n  \r\n  \r\n  \r\n  <tr>\r\n    <td>Report Date </td>\r\n    <td>";
    echo $newDate = date("d/m/Y", strtotime($row_plan->createtime));
    echo "</td>\r\n  </tr>\r\n</table>\r\n\r\n\r\n\r\n<table class=\"table table-bordered\">\r\n  <thead class=\"bg-highlight\">\r\n    <tr>\r\n      <th >Indicator</th>\r\n      <th>Annual Target</th>\r\n      <th>Annual Achievement</th>\r\n      <th>Variance</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody id=\"project_div\">\r\n\t";
    $query_mon_progress_report = $db->query("select * from org_annual_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Objective Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "    <tr>\r\n      <td width=\"50%\">\r\n\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_objective_indicator");
        echo $project_details["indicator"];
        echo "        </td>\r\n        <td>\r\n\t\t ";
        echo $row_mon_progress_report["target"];
        echo "         ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "        </td>\r\n       <td>\r\n\t    ";
        echo $row_mon_progress_report["achievement"];
        echo "        ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "       </td>\r\n       <td>\r\n\t    ";
        echo $row_mon_progress_report["achievement"] - $row_mon_progress_report["target"];
        echo "        ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "       </td>\r\n       \r\n       \r\n    </tr>\r\n    ";
    }
    echo "    \r\n    \r\n    \r\n    \r\n    \r\n\t";
    $query_mon_progress_report = $db->query("select * from org_annual_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Intervention Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "    \r\n    <!--intervention Indicator-->\r\n    <tr>\r\n      <td width=\"50%\">\r\n\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "org_intervention_indicator");
        echo $project_details["indicator"];
        echo "      </td>\r\n        <td>\r\n        ";
        echo $row_mon_progress_report["target"];
        echo "        ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "        </td>\r\n       \r\n       <td>\r\n\t   ";
        echo $row_mon_progress_report["achievement"];
        echo "        ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "       </td>\r\n       \r\n        <td>\r\n\t\t ";
        echo $row_mon_progress_report["achievement"] - $row_mon_progress_report["target"];
        echo "         ";
        if ($unit_name == "Percentage") {
            echo "%";
        } else {
            if ($unit_name == "Number") {
                echo "";
            } else {
                echo $unit_name;
            }
        }
        echo "        </td>\r\n      \r\n    </tr>\r\n    ";
    }
    echo "  </tbody>\r\n</table>\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>