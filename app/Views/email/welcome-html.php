<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\r\n<html>\r\n<head><title>Welcome to ";
echo $site_name;
echo "!</title></head>\r\n<body>\r\n<div style=\"max-width: 800px; margin: 0; padding: 30px 0;\">\r\n<table width=\"80%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n<td width=\"5%\"></td>\r\n<td align=\"left\" width=\"95%\" style=\"font: 13px/18px Arial, Helvetica, sans-serif;\">\r\n<h2 style=\"font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;\">Welcome to ";
echo $site_name;
echo "!</h2>\r\nThanks for joining ";
echo $site_name;
echo ". We listed your sign in details below, make sure you keep them safe.<br />\r\nTo open your ";
echo $site_name;
echo " homepage, please follow this link:<br />\r\n<br />\r\n<big style=\"font: 16px/18px Arial, Helvetica, sans-serif;\"><b><a href=\"";
echo site_url("/auth/login/");
echo "\" style=\"color: #3366cc;\">Go to ";
echo $site_name;
echo " now!</a></b></big><br />\r\n<br />\r\nLink doesn't work? Copy the following link to your browser address bar:<br />\r\n<nobr><a href=\"";
echo site_url("/auth/login/");
echo "\" style=\"color: #3366cc;\">";
echo site_url("/auth/login/");
echo "</a></nobr><br />\r\n<br />\r\n<br />\r\n";
if (0 < strlen($username)) {
    echo "Your User ID: ";
    echo $user_id;
    echo "<br />";
}
echo "\r\nYour email address: ";
echo $email;
echo "<br /><br />\r\n\r\nPassword: ";
echo $password;
echo "<br /><br />\r\n\r\nUser Type: ";
echo $user_type;
echo "<br />\r\nUser Level: ";
echo $rules;
echo "<br />\r\n<br />\r\nThank you,<br />\r\nThe ";
echo $site_name;
echo " Team\r\n</td>\r\n</tr>\r\n</table>\r\n</div>\r\n</body>\r\n</html>";

?>