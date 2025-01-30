<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from project_beneficiaries_report where project = '" . $project . "' and  year = '" . $year . "'  ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n";
if (!empty($results_plan)) {
    echo "\r\n\r\n<table  class=\"table table-bordered m-0\">\r\n\r\n<thead>\r\n\r\n  <tr>\r\n    <td colspan=\"5\" style=\"text-align:center;background:#cccccc;\">\r\n\t";
    $p_data = get_by_id_only("id", $project, "project");
    echo $project_name = $p_data["name"];
    echo " -\r\n\t";
    echo $year;
    echo " \r\n    </td>\r\n  </tr>\r\n  \r\n\r\n\r\n\r\n  <tr>\r\n    <td style=\"text-align:center; background:#cccccc;\">County</td>\r\n    <td style=\"text-align:center; background:#cccccc;\">Beneficiaries</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Male</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Female</td>\r\n    <td style=\"text-align:center;background:#cccccc;\">Total</td>\r\n  </tr>\r\n  \r\n  \r\n\t";
    $query_data = $db->query("select * from project_beneficiaries_report where project = '" . $project . "' and  year = '" . $year . "'  group by county  ");
    $results_data = $query_data->getResultArray();
    $sum_total_male = 0;
    $sum_total_female = 0;
    foreach ($results_data as $row_data) {
        echo "\r\n  <tr>\r\n    <td>\r\n    ";
        $fo_data = get_by_id_only("id", $row_data["county"], "mas_county");
        echo $fo_data = $fo_data["name"];
        echo "    </td>\r\n    \r\n  \t<td>PWDs</td>\r\n  \t<td>";
        echo $row_data["pwds_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["pwds_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["pwds_male"] + $row_data["pwds_female"];
        echo "</td>\r\n  </tr>\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>LGBTQ</td>\r\n  \t<td>";
        echo $row_data["lgbtq_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["lgbtq_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["lgbtq_male"] + $row_data["lgbtq_female"];
        echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td colspan=\"5\" bgcolor=\"#cccccc\">By Age</td>\r\n  </tr>\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>0-17</td>\r\n  \t<td>";
        echo $row_data["age_0_to_17_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_0_to_17_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_0_to_17_male"] + $row_data["age_0_to_17_female"];
        echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>18-24</td>\r\n  \t<td>";
        echo $row_data["age_18_to_24_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_18_to_24_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_18_to_24_male"] + $row_data["age_18_to_24_female"];
        echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>25-49</td>\r\n  \t<td>";
        echo $row_data["age_25_to_49_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_25_to_49_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_25_to_49_male"] + $row_data["age_25_to_49_female"];
        echo "</td>\r\n  </tr>\r\n\r\n\r\n  <tr>\r\n  \t<td>&nbsp;</td>\r\n    \r\n  \t<td>50+</td>\r\n  \t<td>";
        echo $row_data["age_50_plus_male"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_50_plus_female"];
        echo "</td>\r\n  \t<td>";
        echo $row_data["age_50_plus_male"] + $row_data["age_50_plus_female"];
        echo "</td>\r\n  </tr>\r\n\r\n\r\n<tr><td colspan=\"5\" style=\"background:#f2f2f2;\">&nbsp;</td></tr>\r\n\r\n\r\n\r\n";
        $total_male = $row_data["pwds_male"] + $row_data["lgbtq_male"] + $row_data["age_0_to_17_male"] + $row_data["age_18_to_24_male"] + $row_data["age_25_to_49_male"] + $row_data["age_50_plus_male"];
        $total_female = $row_data["pwds_female"] + $row_data["lgbtq_female"] + $row_data["age_0_to_17_female"] + $row_data["age_18_to_24_female"] + $row_data["age_25_to_49_female"] + $row_data["age_50_plus_female"];
        $sum_total_male += $total_male;
        $sum_total_female += $total_female;
    }
    echo "    <tr>\r\n        <td colspan=\"2\" bgcolor=\"#f2f2f2\">Total</td>\r\n        \r\n        <td>";
    echo $sum_total_male;
    echo "</td>\r\n        <td>";
    echo $sum_total_female;
    echo "</td>\r\n        \r\n        <td>";
    echo $sum_total_male + $sum_total_female;
    echo "</td>\r\n    \r\n    </tr>\r\n\r\n\r\n</thead>\r\n\r\n\r\n\r\n\r\n\r\n<tbody>  \r\n</table>\r\n\r\n\r\n\r\n";
} else {
    echo "\r\n<div class=\"form-group\">\r\n    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n      <p> No Data Found..... </p>\r\n    </div>\r\n</div>\r\n                  \r\n                  \r\n";
}

?>