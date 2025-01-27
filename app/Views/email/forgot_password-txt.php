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
echo ",\n\nForgot your password, huh? No big deal.\nTo create a new password, just follow this link:\n\n";
echo site_url("/auth/reset_password/" . $user_id . "/" . $new_pass_key);
echo "\n\nYou received this email, because it was requested by a ";
echo $site_name;
echo " user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same.\n\n\nThank you,\nThe ";
echo $site_name;
echo " Team";

?>