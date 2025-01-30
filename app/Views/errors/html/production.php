<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!doctype html>\n<html>\n<head>\n\t<meta charset=\"UTF-8\">\n\t<meta name=\"robots\" content=\"noindex\">\n\n\t<title>Whoops!</title>\n\n\t<style type=\"text/css\">\n\t\t";
echo preg_replace("#[\\r\\n\\t ]+#", " ", file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . "debug.css"));
echo "\t</style>\n</head>\n<body>\n\n\t<div class=\"container text-center\">\n\n\t\t<h1 class=\"headline\">Whoops!</h1>\n\n\t\t<p class=\"lead\">We seem to have hit a snag. Please try again later...</p>\n\n\t</div>\n\n</body>\n\n</html>\n";

?>