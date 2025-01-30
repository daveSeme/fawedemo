<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\r\n<html>\r\n<head><title>New Report For Review/Approve ";
echo $site_name;
echo "</title>\r\n</head>\r\n\r\n<body>\r\n<div style=\"max-width: 800px; margin: 0; padding: 30px 0;\">\r\n\r\n<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n<td width=\"5%\"></td>\r\n<td align=\"left\" width=\"95%\" style=\"font: 13px/18px Arial, Helvetica, sans-serif;\">\r\n<h2 style=\"font: normal 20px/24px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;\">";
echo $site_name;
echo " - ";
echo $subject;
echo "</h2>\r\n\r\n";
$workflow_details = get_by_id("id", $record_id, "project_quarterly_narrative_report");
$project_id = $workflow_details["project"];
$project_details = get_by_id("id", $project_id, "project");
$project_name = $project_details["name"];
$users_data = get_by_id("id", $workflow_details["submitted_by"], "ctbl_users");
$submitter_name = $users_data["name"];
echo "\r\n<p><strong>Report Details are :</strong></p>\r\n\r\n<p><strong>Project Name </strong> : ";
echo $project_name;
echo " </p>\r\n<p><strong>Reporting Period </strong> : ";
echo $workflow_details["year"];
echo "-";
echo $workflow_details["quarter"];
echo " </p>\r\n<p><strong>Report Date  </strong> : ";
echo date("d/m/Y", strtotime($workflow_details["createtime"]));
echo "</p>\r\n<p><strong>Submitted By  </strong> : ";
echo $submitter_name;
echo "</p>\r\n<p><strong>Submission Date </strong> : ";
echo date("d/m/Y", strtotime($workflow_details["submitted_date"]));
echo "</p>\r\n\r\n\r\n\r\n\r\n\r\n<p><br />\r\n  <big style=\"font: 16px/18px Arial, Helvetica, sans-serif;\"><b><a href=\"";
echo site_url("/auth/login/");
echo "\" style=\"color: #3366cc;\">Go to ";
echo $site_name;
echo " now!</a></b></big><br />\r\n  <br />\r\n  Link doesn't work? Copy the following link to your browser address bar:<br />\r\n  <nobr><a href=\"";
echo site_url("/auth/login/");
echo "\" style=\"color: #3366cc;\">";
echo site_url("/auth/login/");
echo "</a></nobr><br />\r\n    <br />\r\n    <br />\r\n    <br />\r\n  Thank you,<br />\r\n  The ";
echo $site_name;
echo " Team </p></td>\r\n</tr>\r\n</table>\r\n</div>\r\n</body>\r\n</html>";

?>