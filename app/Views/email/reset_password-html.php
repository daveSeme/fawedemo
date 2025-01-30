<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\r\n<html>\r\n<head><title>Your new password on ";
echo $site_name;
echo "</title></head>\r\n<body>\r\n<div style=\"max-width: 800px; margin: 0; padding: 30px 0;\">\r\n<table width=\"80%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n<tr>\r\n<td width=\"5%\"></td>\r\n<td align=\"left\" width=\"95%\" style=\"font: 13px/18px Arial, Helvetica, sans-serif;\">\r\n<h2 style=\"font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;\">Your new password on ";
echo $site_name;
echo "</h2>\r\nYou have changed your password.<br />\r\nPlease, keep it in your records so you don't forget it.<br />\r\n<br />\r\n";
if (0 < strlen($username)) {
    echo "Your username: ";
    echo $username;
    echo "<br />\r\nYour password: ";
    echo $password;
    echo "<br />";
}
echo "Your email address: ";
echo $email;
echo "<br />\r\n<br />\r\n<br />\r\nThank you,<br />\r\nThe ";
echo $site_name;
echo " Team\r\n</td>\r\n</tr>\r\n</table>\r\n</div>\r\n</body>\r\n</html>";

?>