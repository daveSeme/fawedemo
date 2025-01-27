<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <div class=\"subheader\"></div>\r\n  <div class=\"h-alt-hf d-flex flex-column align-items-center justify-content-center text-center\">\r\n    <div class=\"alert pt-4 pr-5 pb-3 pl-5\" id=\"demo-alert\">\r\n      \r\n       <img src=\"";
echo base_url();
echo "/public/img/logo-big.png\" alt=\"CREAW Kenya Logo\">\r\n       <h1 class=\"fs-xxl fw-700 color-fusion-500 d-flex align-items-center justify-content-center mt-4\"> \r\n       <span class=\"color-black-700\">Welcome to CREAW Kenya Web Based Monitoring & Evaluation Management Information System (M&E MIS)</span> \r\n      </h1>\r\n\t<p><h3>";
$this->session = Config\Services::session();
if ($this->session->get("user_type") == "MDA") {
    $base_id = $this->session->get("office");
    $min = get_by_id("id", $base_id, "mas_structure");
    echo "Institution Name: " . $min["name"];
} else {
    if ($this->session->get("user_type") == "District") {
        $base_id = $this->session->get("office");
        $dis = get_by_id("id", $base_id, "mas_district");
        echo "District Name: " . $dis["name"];
    } else {
        if ($this->session->get("user_type") == "Region") {
            $base_id = $this->session->get("office");
            $reg = get_by_id("id", $base_id, "mas_region");
            echo "Region Name: " . $reg["region"];
        }
    }
}
echo "</h3></p>\r\n      ";
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
echo "\r\n    </div>\r\n  </div>\r\n</main>\r\n";

?>