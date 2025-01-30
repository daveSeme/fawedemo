<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <div class=\"subheader\"></div>\r\n  <div class=\"h-alt-hf d-flex flex-column align-items-center justify-content-center text-center\">\r\n    <di    \r\n\t<p><h3>";
$this->session = Config\Services::session();
echo "</h3></p>\r\n     \r\n\r\n\r\n<div class=\"alert alert-danger bg-white pt-4 pr-5 pb-3 pl-5\" id=\"demo-alert\">\r\n                                <h1 class=\"fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center m-0\">\r\n                                    <img class=\"profile-image-sm rounded-circle bg-danger-700 mr-1 p-1\" src=\"";
echo base_url();
echo "/public/img/logo-big.png\" alt=\"FAWEM&E System\">\r\n                                    <span class=\"color-danger-700\">Access Denied.</span>\r\n                                </h1>\r\n                                <h3 class=\"fw-500 mb-0 mt-3\">\r\n                                    You are not authorized to access this page.\r\n                                </h3>\r\n                                <p class=\"container container-sm mb-0 mt-1\">\r\n\t\t\t\t\t\t\t\t Access Denied <br />\r\n\t\t\t\t\t\t\t\t \r\n                                 You need permission to access this module. \r\n\t\t\t\t\t\t\t\t \r\n                                </p>\r\n                                <div class=\"mt-4\">\r\n                                      ";
if ($this->session->get("user_type") == "District") {
    echo "      <div class=\"mt-4\"> <a href=\"";
    echo base_url() . "/dashboard/district";
    echo "\" class=\"btn btn-primary\"> <span class=\"fw-700\">Go to Dashboard</span> </a> </div>\r\n\t  ";
} else {
    if ($this->session->get("user_type") == "Region") {
        echo "\t  \r\n\t        <div class=\"mt-4\"> <a href=\"";
        echo base_url() . "/dashboard/region";
        echo "\" class=\"btn btn-primary\"> <span class=\"fw-700\">Go to Dashboard</span> </a> </div>\r\n  ";
    } else {
        echo " \t        <div class=\"mt-4\"> <a href=\"";
        echo base_url() . "/dashboard";
        echo "\" class=\"btn btn-primary\"> <span class=\"fw-700\">Go to Dashboard</span> </a> </div>\r\n \r\n    ";
    }
}
echo "\r\n                                </div>\r\n                            </div>\r\n    </div>\r\n  </div>\r\n</main>\r\n";

?>