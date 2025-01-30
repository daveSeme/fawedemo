<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n<html>\n<head><title>Create a new password on ";
echo $site_name;
echo "</title></head>\n<body>\n<div style=\"max-width: 800px; margin: 0; padding: 30px 0;\">\n<table width=\"80%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\n<tr>\n<td width=\"5%\"></td>\n<td align=\"left\" width=\"95%\" style=\"font: 13px/18px Arial, Helvetica, sans-serif;\">\n<h2 style=\"font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;\">Create a new password</h2>\nForgot your password, huh? No big deal.<br />\nTo create a new password, just follow this link:<br />\n<br />\n<big style=\"font: 16px/18px Arial, Helvetica, sans-serif;\"><b><a href=\"";
echo site_url("/auth/reset_password/" . $user_id . "/" . $new_pass_key);
echo "\" style=\"color: #3366cc;\">Create a new password</a></b></big><br />\n<br />\nLink doesn't work? Copy the following link to your browser address bar:<br />\n<nobr><a href=\"";
echo site_url("/auth/reset_password/" . $user_id . "/" . $new_pass_key);
echo "\" style=\"color: #3366cc;\">";
echo site_url("/auth/reset_password/" . $user_id . "/" . $new_pass_key);
echo "</a></nobr><br />\n<br />\n<br />\nYou received this email, because it was requested by a <a href=\"";
echo site_url("");
echo "\" style=\"color: #3366cc;\">";
echo $site_name;
echo "</a> user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.<br />\n<br />\n<br />\nThank you,<br />\nThe ";
echo $site_name;
echo " Team\n</td>\n</tr>\n</table>\n</div>\n</body>\n</html>";

?>