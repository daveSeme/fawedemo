<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "Welcome to ";
echo $site_name;
echo ",\r\n\r\nThanks for joining ";
echo $site_name;
echo ". We listed your sign in details below. Make sure you keep them safe.\r\nFollow this link to login on the site:\r\n\r\n";
echo site_url("/auth/login/");
echo "\r\n";
if (0 < strlen($username)) {
    echo "\r\nYour User ID: ";
    echo $user_id;
}
echo "\r\nYour email address: ";
echo $email;
echo "<br /><br />\r\nPassword: ";
echo $password;
echo "<br /><br />\r\n\r\n\r\nUser Type: ";
echo $user_type;
echo "<br />\r\nUser Level: ";
echo $rules;
echo "<br /><br />\r\n\r\n\r\nThank you,<br />\r\nThe ";
echo $site_name;
echo " Team";

?>