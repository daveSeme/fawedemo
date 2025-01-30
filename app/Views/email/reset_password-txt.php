<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "Hi";
if (0 < strlen($username)) {
    echo " ";
    echo $username;
}
echo ",\r\n\r\nYou have changed your password.\r\nPlease, keep it in your records so you don't forget it.\r\n";
if (0 < strlen($username)) {
    echo "\r\nYour Username: ";
    echo $username;
    echo "\r\nYour Password: ";
    echo $password;
    echo "\r\n";
}
echo "\r\nYour email address: ";
echo $email;
echo "\r\n\r\nThank you,\r\nThe ";
echo $site_name;
echo " Team";

?>