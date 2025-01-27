<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

require "PasswordHash.php";
header("Content-type: text/plain");
$ok = 0;
$t_hasher = new PasswordHash(8, false);
$correct = "test12345";
$hash = $t_hasher->HashPassword($correct);
echo "Hash: " . $hash . "\n";
$check = $t_hasher->CheckPassword($correct, $hash);
if ($check) {
    $ok++;
}
echo "Check correct: '" . $check . "' (should be '1')\n";
$wrong = "test12346";
$check = $t_hasher->CheckPassword($wrong, $hash);
if (!$check) {
    $ok++;
}
echo "Check wrong: '" . $check . "' (should be '0' or '')\n";
unset($t_hasher);
$t_hasher = new PasswordHash(8, true);
$hash = $t_hasher->HashPassword($correct);
echo "Hash: " . $hash . "\n";
$check = $t_hasher->CheckPassword($correct, $hash);
if ($check) {
    $ok++;
}
echo "Check correct: '" . $check . "' (should be '1')\n";
$check = $t_hasher->CheckPassword($wrong, $hash);
if (!$check) {
    $ok++;
}
echo "Check wrong: '" . $check . "' (should be '0' or '')\n";
$hash = "\$P\$9IQRaTwmfeRo7ud9Fh4E2PdI0S3r.L0";
echo "Hash: " . $hash . "\n";
$check = $t_hasher->CheckPassword($correct, $hash);
if ($check) {
    $ok++;
}
echo "Check correct: '" . $check . "' (should be '1')\n";
$check = $t_hasher->CheckPassword($wrong, $hash);
if (!$check) {
    $ok++;
}
echo "Check wrong: '" . $check . "' (should be '0' or '')\n";
if ($ok == 6) {
    echo "All tests have PASSED\n";
} else {
    echo "Some tests have FAILED\n";
}

?>