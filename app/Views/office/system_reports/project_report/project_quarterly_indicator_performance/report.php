<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from project_quarterly_indicator_tracking_report where project = '" . $project . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n<table  class=\"table table-bordered m-0\">\r\n  <tr>\r\n    <td>Project</td>\r\n    <td width=\"50%\">\r\n\t";
    $plan = get_by_id("id", $row_plan->project, "project");
    echo $plan_name = $plan["name"];
    echo "    </td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td>Year</td>\r\n    <td>";
    echo $row_plan->year;
    echo "</td>\r\n  </tr>\r\n  \r\n  \r\n    <tr>\r\n      <td>Quarter</td>\r\n      <td>";
    echo $row_plan->quarter;
    echo "</td>\r\n    </tr>\r\n  \r\n  \r\n  <tr>\r\n    <td>Report Name</td>\r\n    <td>";
    echo $row_plan->report_name;
    echo "</td>\r\n  </tr>\r\n  \r\n  \r\n  <td>Created by</td>\r\n    <td>\r\n\t";
    $db = Config\Database::connect();
    if ($row_plan->createdby != "0") {
        $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $row_plan->createdby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    } else {
        $query = $db->query("SELECT name from ctbl_users WHERE id = '" . $row_plan->updatedby . "'");
        $results = $query->getResult();
        $row = $query->getRow();
        echo $row->name;
    }
    echo "\t </td>\r\n  </tr>\r\n  \r\n  <tr>\r\n    <td>Report Date </td>\r\n    <td>";
    echo $newDate = date("d/m/Y", strtotime($row_plan->createtime));
    echo "</td>\r\n  </tr>\r\n  \r\n</table>\r\n\r\n<table class=\"table table-bordered\">\r\n  <thead class=\"bg-highlight\">\r\n    <tr>\r\n      <th>Indicator</th>\r\n      <th>Target</th>\r\n      <th>Achievement</th>\r\n      <th>Variance</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody id=\"project_div\">\r\n\t";
    $query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Goal Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "    <tr>\r\n      <td width=\"50%\">\r\n\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_goal_indicator");
        echo $project_details["indicator"];
        echo "       </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n     \r\n    </tr>\r\n    \r\n    ";
    }
    echo "    \r\n    \r\n    ";
    $query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Outcome Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "    \r\n    <!--intervention Indicator-->\r\n    <tr>\r\n      <td width=\"50%\">\r\n\t  ";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_outcome_indicator");
        echo $project_details["indicator"];
        echo "      </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n    </tr>\r\n    \r\n    ";
    }
    echo "    \r\n    \r\n    ";
    $query_mon_progress_report = $db->query("select * from project_quarterly_indicator_tracking_report_map where workflow_id = '" . $row_plan->id . "' and category = 'Output Indicator' order by indicator_id");
    $results_mon_progress_report = $query_mon_progress_report->getResultArray();
    foreach ($results_mon_progress_report as $row_mon_progress_report) {
        $unit_data = get_by_id("id", $row_mon_progress_report["unit"], "mas_unit");
        $unit_name = $unit_data["name"];
        echo "    \r\n    <!--intervention Indicator-->\r\n    <tr>\r\n      <td width=\"50%\">\r\n\t\t";
        $project_details = get_by_id("id", $row_mon_progress_report["indicator_id"], "project_output_indicator");
        echo $project_details["indicator"];
        echo "       </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n\r\n      <td>\r\n\t  ";
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
        echo "     </td>\r\n    </tr>\r\n    ";
    }
    echo "  </tbody>\r\n</table>\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>