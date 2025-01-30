<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo view("template/header.php");
echo "<!-- BEGIN Page Wrapper -->\r\n<div class=\"page-wrapper\">\r\n    <div class=\"page-inner\">\r\n        <!-- BEGIN Left Aside -->\r\n        ";
echo view("template/leftpanel.php");
echo "        <!-- END Left Aside -->\r\n        <div class=\"page-content-wrapper\">\r\n            <!-- BEGIN Page Header -->\r\n            ";
echo view("template/top-right-header.php");
echo "            <!-- END Page Header -->\r\n            <!-- BEGIN Page Content -->\r\n            <!-- the #js-page-content id is needed for some plugins to initialize -->\r\n          ";
echo view($main_content);
echo "            <!-- this overlay is activated only when mobile menu is triggered -->\r\n            <div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div> <!-- END Page Content -->\r\n            <!-- BEGIN Page Footer -->\r\n            ";
echo view("template/footer.php");

?>