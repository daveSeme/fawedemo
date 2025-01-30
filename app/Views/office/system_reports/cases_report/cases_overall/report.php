<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n<table  class=\"table table-bordered m-0\">\r\n\r\n<thead>\r\n\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td colspan=\"3\" style=\"text-align:center;background:#cccccc;\">";
    echo $year;
    echo " - ";
    echo date("F", mktime(0, 0, 0, $month, 10));
    echo "</td>\r\n  </tr>\r\n  \r\n\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n  </tr>\r\n\r\n</thead>\r\n\r\n\r\n\r\n\r\n<tbody>  \r\n\r\n\t<!---------------------------------------------------------------------------------Cases Type Data-------------------------------------------------------------------------->\r\n\t<!---------------------------------------------------------------------------------Cases Type Data-------------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by case_type order by case_type desc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td colspan=\"2\">";
        echo $row_data["case_type"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_case_type = $total_male + $total_female;
        echo "</td>\r\n\r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n\t<!----------------------------------------------------------------------------Age of Survivor Data-------------------------------------------------------------------->\r\n       <tr>\r\n        <td colspan=\"17\">&nbsp;</td>\r\n       </tr>\r\n    <!----------------------------------------------------------------------------Age of Survivor Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' group by age_survivor order by age_survivor asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Age of Survivor</td>\r\n    <td>";
        echo $row_data["age_survivor"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_age_survivor = $total_male + $total_female;
        echo "</td>\r\n\r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n   \r\n   \r\n\t<!----------------------------------------------------------------------------Place of Residence Data-------------------------------------------------------------------->\r\n\t<!----------------------------------------------------------------------------Place of Residence Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' group by place_residence order by place_residence asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Place of Residence</td>\r\n    <td>";
        echo $row_data["place_residence"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_place_residence = $total_male + $total_female;
        echo "</td>\r\n\r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n  \r\n   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------------------Marital Status of Survivor Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Marital Status of Survivor Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by marital_status order by marital_status asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Marital Status of Survivor</td>\r\n    <td>";
        echo $row_data["marital_status"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_marital_status = $total_male + $total_female;
        echo "</td>\r\n\r\n    \r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------------------Type of GBV reported Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Type of GBV reported Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_type_gbv  on cases_map_type_gbv.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by cases_map_type_gbv.type_gbv ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Type of GBV reported</td>\r\n    <td>";
        echo $row_data["type_gbv"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_type_gbv = $total_male + $total_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------------------Case Context Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Case Context Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by cases_map_case_context.case_context ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Case Context</td>\r\n    <td>";
        echo $row_data["case_context"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_case_context = $total_male + $total_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------Incidents referred from other service providers Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------Incidents referred from other service providers Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by cases_map_incidents_referred.incidents_referred ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Incidents referred from other service providers</td>\r\n    <td>";
        echo $row_data["incidents_referred"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_incidents_referred = $total_male + $total_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------Services Provided Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------Services Provided Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "'  group by cases_map_services_provided.services_provided ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Services Provided for new cases this month</td>\r\n    <td>";
        echo $row_data["services_provided"];
        echo "</td>\r\n    \r\n    <td>";
        if (isset($row_data["male"])) {
            echo $total_male = $row_data["male"];
        } else {
            echo $total_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_data["female"])) {
            echo $total_female = $row_data["female"];
        } else {
            echo $total_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_services_provided = $total_male + $total_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   \r\n\r\n  </tbody>\r\n</table>\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>