<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$query_plan = $db->query("select * from project_annual_narrative_report where project = '" . $project . "' and year = '" . $year . "' ");
$results_plan = $query_plan->getResult();
$row_plan = $query_plan->getRow();
echo "\r\n\r\n\r\n<table  class=\"table table-bordered m-0\">\r\n                <tr>\r\n                <td>Project</td>\r\n                <td>\r\n                ";
$plan = get_by_id("id", $row_plan->project, "project");
echo $plan_name = $plan["name"];
echo "                </td>                            \r\n                </tr>\r\n                \r\n                <tr>\r\n                  <td>Year</td>\r\n                  <td>";
echo $row_plan->year;
echo "</td>\r\n                </tr>\r\n                \r\n              \r\n                \r\n                <tr>\r\n                  <td>Key highlights on your activities and interventions during this reporting period</td>\r\n                  <td>";
echo $row_plan->key_highlights;
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                <tr>\r\n                  <td>Challenges experienced and Mitigating measure</td>\r\n                  <td>";
echo $row_plan->challenges_experienced;
echo "</td>\r\n                </tr>\r\n\r\n\r\n                <tr>\r\n                  <td>Success Stories/Best Practice/Lessons Learned</td>\r\n                  <td>";
echo $row_plan->success_stories;
echo "</td>\r\n                </tr>\r\n\r\n\r\n                <tr>\r\n                  <td>Activities Anticipated for Next Reporting Period</td>\r\n                  <td>";
echo $row_plan->activities_anticipated;
echo "</td>\r\n                </tr>\r\n                \r\n                \r\n                \r\n                \r\n                  <td>Created by</td>\r\n                  <td>\r\n\t\t\t\t  ";
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
echo "                 </td>\r\n                </tr>\r\n                <tr>\r\n                  <td>Report Date </td>\r\n                  <td>";
echo $newDate = date("d/m/Y", strtotime($row_plan->createtime));
echo "</td>\r\n                </tr>\r\n</table>";

?>