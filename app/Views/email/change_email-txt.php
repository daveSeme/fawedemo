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
echo ",\n\nYou have changed your email address for ";
echo $site_name;
echo ".\nFollow this link to confirm your new email address:\n\n";
echo site_url("/auth/reset_email/" . $user_id . "/" . $new_email_key);
echo "\n\nYour new email: ";
echo $new_email;
echo "\n\nYou received this email, because it was requested by a ";
echo $site_name;
echo " user. If you have received this by mistake, please DO NOT click the confirmation link, and simply delete this email. After a short time, the request will be removed from the system.\n\n\nThank you,\nThe ";
echo $site_name;
echo " Team";

?>