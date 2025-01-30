<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "New Report For Review/Approve ";
echo $site_name;
echo ",\r\n\r\n";
$workflow_details = get_by_id("id", $record_id, "activity_reporting_tool");
$project_id = $workflow_details["project"];
$project_details = get_by_id("id", $project_id, "project");
$project_name = $project_details["name"];
$users_data = get_by_id("id", $workflow_details["submitted_by"], "ctbl_users");
$submitter_name = $users_data["name"];
$the_message = "";
$the_message = $the_message . "Report Details are" . "<br>";
$the_message = $the_message . $site_name . "&nbsp;   " . $subject . "\n<br>";
$the_message = $the_message . "===========================================================================" . "<br>";
$the_message = $the_message . "Project Name \t: \t" . "\n" . $project_name . "\n<br>";
$the_message = $the_message . "Activity Title \t: \t" . "\n" . $workflow_details["activity_title"] . "\n<br>";
$the_message = $the_message . "Activity Date \t: \t" . "\n" . date("d/m/Y", strtotime($workflow_details["activity_date"])) . "\n<br>";
$the_message = $the_message . "Report Date \t: \t" . "\n" . date("d/m/Y", strtotime($workflow_details["createtime"])) . "\n<br>";
$the_message = $the_message . "Submitted By   \t\t: \t" . "\n" . $submitter_name . "\n<br>";
$the_message = $the_message . "Submission Date   \t\t: \t" . "\n" . date("d/m/Y", strtotime($workflow_details["submitted_date"])) . "\n<br>";
$the_message = $the_message . "Kindly Login for further details  <a href=\"" . site_url("/auth/login/") . "\" style=\"color: #3366cc;\">Go to" . $site_name . "now!</a>\t  <br>";
$the_message = $the_message . "Link doesn't work? Copy the following link to your browser address bar:<br />";
$the_message = $the_message . "<nobr> <a href=\"" . site_url("/auth/login/") . "\"\tstyle=\"color: #3366cc;\">" . site_url("/auth/login/") . " </a></nobr><br />";
$the_message = $the_message . " <br />";
$the_message = $the_message . "Thank you,  <br>";
$the_message = $the_message . $site_name;
$the_message = $the_message . "===========================================================================" . "\n<br>";
$the_message = $the_message . "THIS IS AN AUTOMATED RESPONSE ***DO NOT RESPOND TO THIS EMAIL****" . "\n<br>";
$the_message = $the_message . "===========================================================================" . "\n<br>";
echo $the_message;
echo "\r\n\r\n\r\n\r\n\r\n\r\nThank you,<br />\r\nThe ";
echo $site_name;
echo " Team";

?>