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
    echo "\r\n\r\n<table  class=\"table table-bordered m-0\">\r\n\r\n<thead>\r\n\r\n  <tr>\r\n    <td colspan=\"2\" rowspan=\"2\"   style=\"text-align:center; vertical-align:middle; font-size:17px;\">\r\n\t";
    $fo_data = get_by_id_only("id", $county, "mas_county");
    echo $fo_data = $fo_data["name"];
    echo "    </td>\r\n    <td colspan=\"15\" style=\"text-align:center;background:#cccccc;\">";
    echo $year;
    echo " - ";
    echo date("F", mktime(0, 0, 0, $month, 10));
    echo "</td>\r\n  </tr>\r\n  \r\n\r\n\r\n\r\n  <tr>\r\n    <td colspan=\"3\" style=\"text-align:center; background:#cccccc;\">WK1</td>\r\n    <td colspan=\"3\" style=\"text-align:center;background:#cccccc;\">WK2</td>\r\n    <td colspan=\"3\" style=\"text-align:center;background:#cccccc;\">WK3</td>\r\n    <td colspan=\"3\" style=\"text-align:center;background:#cccccc;\">WK4</td>\r\n    \r\n    <td colspan=\"3\" style=\"text-align:center;background:#cccccc;\">Total</td>\r\n  </tr>\r\n  \r\n  <tr>\r\n  \r\n    <td>&nbsp;</td>\r\n    <td>&nbsp;</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n    \r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n\r\n\r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n\r\n\r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n    \r\n    <td style=\"text-align:center; background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Total</td>\r\n    \r\n  </tr>\r\n\r\n</thead>\r\n\r\n\r\n<tbody>  \r\n\r\n\t<!---------------------------------------------------------------------------------Cases Type Data-------------------------------------------------------------------------->\r\n\t<!---------------------------------------------------------------------------------Cases Type Data-------------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by case_type order by case_type desc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td colspan=\"2\">";
        echo $row_data["case_type"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and case_type = '" . $row_data["case_type"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and case_type = '" . $row_data["case_type"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and case_type = '" . $row_data["case_type"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and case_type = '" . $row_data["case_type"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n   \r\n   \r\n\t<!----------------------------------------------------------------------------Age of Survivor Data-------------------------------------------------------------------->\r\n\t<!----------------------------------------------------------------------------Age of Survivor Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by age_survivor order by age_survivor asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Age of Survivor</td>\r\n    <td>";
        echo $row_data["age_survivor"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and age_survivor = '" . $row_data["age_survivor"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and age_survivor = '" . $row_data["age_survivor"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and age_survivor = '" . $row_data["age_survivor"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and age_survivor = '" . $row_data["age_survivor"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n   \r\n   \r\n\t<!----------------------------------------------------------------------------Place of Residence Data-------------------------------------------------------------------->\r\n\t<!----------------------------------------------------------------------------Place of Residence Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by place_residence order by place_residence asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Place of Residence</td>\r\n    <td>";
        echo $row_data["place_residence"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and place_residence = '" . $row_data["place_residence"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and place_residence = '" . $row_data["place_residence"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and place_residence = '" . $row_data["place_residence"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and place_residence = '" . $row_data["place_residence"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------------------Marital Status of Survivor Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Marital Status of Survivor Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database where Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by marital_status order by marital_status asc ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Marital Status of Survivor</td>\r\n    <td>";
        echo $row_data["marital_status"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and marital_status = '" . $row_data["marital_status"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and marital_status = '" . $row_data["marital_status"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and marital_status = '" . $row_data["marital_status"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and marital_status = '" . $row_data["marital_status"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t\r\n\r\n\r\n\t<!------------------------------------------------------------------Type of GBV reported Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Type of GBV reported Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_case_category  on cases_map_case_category.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by cases_map_case_category.case_category ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Type of GBV reported</td>\r\n    <td>";
        echo $row_data["case_category"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database left join cases_map_case_category  on cases_map_case_category.workflow_id = cases_database.id WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and case_category = '" . $row_data["case_category"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_category  on cases_map_case_category.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and case_category = '" . $row_data["case_category"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_category  on cases_map_case_category.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and case_category = '" . $row_data["case_category"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_category  on cases_map_case_category.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and case_category = '" . $row_data["case_category"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------------------Case Context Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------------------Case Context Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by cases_map_case_context.case_context ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Case Context</td>\r\n    <td>";
        echo $row_data["case_context"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and case_context = '" . $row_data["case_context"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and case_context = '" . $row_data["case_context"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and case_context = '" . $row_data["case_context"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_case_context  on cases_map_case_context.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and case_context = '" . $row_data["case_context"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------Incidents referred from other service providers Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------Incidents referred from other service providers Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by cases_map_incidents_referred.incidents_referred ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Incidents referred from other service providers</td>\r\n    <td>";
        echo $row_data["incidents_referred"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and incidents_referred = '" . $row_data["incidents_referred"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and incidents_referred = '" . $row_data["incidents_referred"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and incidents_referred = '" . $row_data["incidents_referred"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_incidents_referred  on cases_map_incidents_referred.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and incidents_referred = '" . $row_data["incidents_referred"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   \r\n   \r\n   <tr>\r\n    <td colspan=\"17\">&nbsp;</td>\r\n   </tr>\r\n\r\n\t<!------------------------------------------------------Services Provided Data-------------------------------------------------------------------->\r\n\t<!------------------------------------------------------Services Provided Data-------------------------------------------------------------------->\r\n\r\n\t";
    $query_data = $db->query("select * from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id\r\n\t\r\n\t\r\n\t\r\n\twhere Year(date) = '" . $year . "' and  Month(date) = '" . $month . "' and county = '" . $county . "' group by cases_map_services_provided.services_provided ");
    $results_data = $query_data->getResultArray();
    foreach ($results_data as $row_data) {
        echo "  \r\n  <tr>\r\n    <td>Services Provided for new cases this month</td>\r\n    <td>";
        echo $row_data["services_provided"];
        echo "</td>\r\n    \r\n    ";
        $query_week1 = $db->query("select sum(male) as male, sum(female) as female from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id WHERE date BETWEEN '" . $year . "-" . $month . "-01' AND '" . $year . "-" . $month . "-07' and services_provided = '" . $row_data["services_provided"] . "' ");
        $results_week1 = $query_week1->getResult();
        $row_week1 = $query_week1->getRow();
        echo "    <td>";
        if (isset($row_week1->male)) {
            echo $total_week1_male = $row_week1->male;
        } else {
            echo $total_week1_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week1->female)) {
            echo $total_week1_female = $row_week1->female;
        } else {
            echo $total_week1_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week1 = $total_week1_male + $total_week1_female;
        echo "</td>\r\n\r\n    \r\n    \r\n    \r\n    ";
        $query_week2 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-08' AND '" . $year . "-" . $month . "-14' and services_provided = '" . $row_data["services_provided"] . "' ");
        $results_week2 = $query_week2->getResult();
        $row_week2 = $query_week2->getRow();
        echo "    <td>";
        if (isset($row_week2->male)) {
            echo $total_week2_male = $row_week2->male;
        } else {
            echo $total_week2_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week2->female)) {
            echo $total_week2_female = $row_week2->female;
        } else {
            echo $total_week2_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week2 = $total_week2_male + $total_week2_female;
        echo "</td>\r\n\t\r\n\r\n\r\n    ";
        $query_week3 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-15' AND '" . $year . "-" . $month . "-22' and services_provided = '" . $row_data["services_provided"] . "' ");
        $results_week3 = $query_week3->getResult();
        $row_week3 = $query_week3->getRow();
        echo "    <td>";
        if (isset($row_week3->male)) {
            echo $total_week3_male = $row_week3->male;
        } else {
            echo $total_week3_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week3->female)) {
            echo $total_week3_female = $row_week3->female;
        } else {
            echo $total_week3_female = 0;
        }
        echo "    </td>\r\n    <td>";
        echo $total_week3 = $total_week3_male + $total_week3_female;
        echo "</td>\r\n\r\n\r\n    ";
        $query_week4 = $db->query("select sum(male) as male, sum(female) as female  from cases_database left join cases_map_services_provided  on cases_map_services_provided.workflow_id = cases_database.id  WHERE date BETWEEN '" . $year . "-" . $month . "-23' AND '" . $year . "-" . $month . "-31' and services_provided = '" . $row_data["services_provided"] . "' ");
        $results_week4 = $query_week4->getResult();
        $row_week4 = $query_week4->getRow();
        echo "    <td>";
        if (isset($row_week4->male)) {
            echo $total_week4_male = $row_week4->male;
        } else {
            echo $total_week4_male = 0;
        }
        echo "</td>\r\n    <td>";
        if (isset($row_week4->female)) {
            echo $total_week4_female = $row_week4->female;
        } else {
            echo $total_week4_female = 0;
        }
        echo "</td>\r\n    <td>";
        echo $total_week4 = $total_week4_male + $total_week4_female;
        echo "</td>\r\n\r\n\r\n    <td>";
        echo $total_week1_male + $total_week2_male + $total_week3_male + $total_week4_male;
        echo "</td>\r\n    <td>";
        echo $total_week1_female + $total_week2_female + $total_week3_female + $total_week4_female;
        echo "</td>\r\n    <td>";
        echo $total_week1 + $total_week2 + $total_week3 + $total_week4;
        echo "</td>\r\n    \r\n  </tr>\r\n   ";
    }
    echo "   \r\n   \r\n   \r\n   \r\n   \r\n\r\n  </tbody>\r\n</table>\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>