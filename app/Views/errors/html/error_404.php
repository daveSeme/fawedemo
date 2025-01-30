<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n\t<meta charset=\"utf-8\">\n\t<title>404 Page Not Found</title>\n\n\t<style>\n\tdiv.logo {\n\t\theight: 200px;\n\t\twidth: 155px;\n\t\tdisplay: inline-block;\n\t\topacity: 0.08;\n\t\tposition: absolute;\n\t\ttop: 2rem;\n\t\tleft: 50%;\n\t\tmargin-left: -73px;\n\t}\n\tbody {\n\t\theight: 100%;\n\t\tbackground: #fafafa;\n\t\tfont-family: \"Helvetica Neue\", Helvetica, Arial, sans-serif;\n\t\tcolor: #777;\n\t\tfont-weight: 300;\n\t}\n\th1 {\n\t\tfont-weight: lighter;\n\t\tletter-spacing: 0.8;\n\t\tfont-size: 3rem;\n\t\tmargin-top: 0;\n\t\tmargin-bottom: 0;\n\t\tcolor: #222;\n\t}\n\t.wrap {\n\t\tmax-width: 1024px;\n\t\tmargin: 5rem auto;\n\t\tpadding: 2rem;\n\t\tbackground: #fff;\n\t\ttext-align: center;\n\t\tborder: 1px solid #efefef;\n\t\tborder-radius: 0.5rem;\n\t\tposition: relative;\n\t}\n\tpre {\n\t\twhite-space: normal;\n\t\tmargin-top: 1.5rem;\n\t}\n\tcode {\n\t\tbackground: #fafafa;\n\t\tborder: 1px solid #efefef;\n\t\tpadding: 0.5rem 1rem;\n\t\tborder-radius: 5px;\n\t\tdisplay: block;\n\t}\n\tp {\n\t\tmargin-top: 1.5rem;\n\t}\n\t.footer {\n\t\tmargin-top: 2rem;\n\t\tborder-top: 1px solid #efefef;\n\t\tpadding: 1em 2em 0 2em;\n\t\tfont-size: 85%;\n\t\tcolor: #999;\n\t}\n\ta:active,\n\ta:link,\n\ta:visited {\n\t\tcolor: #dd4814;\n\t}\n</style>\n</head>\n<body>\n\t<div class=\"wrap\">\n\t\t<h1>404 - File Not Found</h1>\n\n\t\t<p>\n\t\t\t";
if (!empty($message) && $message !== "(null)") {
    echo "\t\t\t\t";
    echo esc($message);
    echo "\t\t\t";
} else {
    echo "\t\t\t\tSorry! Cannot seem to find the page you were looking for.\n\t\t\t";
}
echo "\t\t</p>\n\t</div>\n</body>\n</html>\n";

?>