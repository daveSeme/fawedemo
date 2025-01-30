<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$db = Config\Database::connect();
$session = Config\Services::session();
echo "<script>\t\r\n  function get_users(val)\r\n{\r\n \t\r\n         \r\n\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/user_management/audit_trails";
echo "/get_users\",\r\n        \tdata:'user_type='+val,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#reports\").html(data);\r\n\t\t\t\tconsole.log(data);\r\n        \t}\r\n\t});\r\n \r\n }\r\n </script>\r\n\r\n <link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/select2/select2.bundle.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\"><ol class=\"breadcrumb page-breadcrumb\">\r\n                    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n                     <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n                    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n                </ol>\r\n \r\n\t\t<div class=\"row\">\r\n          <div class=\"col-xl-12\">\r\n            <div id=\"div\" class=\"panel\">\r\n              <div class=\"panel-hdr\">\r\n                <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n              </div>\r\n              <div class=\"panel-container show\">\r\n                <div class=\"panel-content\"> </div>\r\n                <div class=\"panel-content p-0\">\r\n                  <p align=\"center\"><strong> ";
echo $title;
echo " </strong></p>\r\n                  <p align=\"center\"> <strong> </strong><strong></strong></p>\r\n                  <p>&nbsp; </p>\r\n                  <div class=\"panel-content\">\r\n                   <table id=\"dt-basic-example\" class=\"table table-bordered table-hover table-striped w-100\">\r\n                      <thead  class=\"bg-primary-600\">\r\n                        <tr >\r\n                          <th>User Name</th>\r\n                          <th>Activity</th>\r\n                          <th>Module Name </th>\r\n                          <th>OLD Value</th>\r\n                          <th>New Value</th>\r\n                          <th>URL</th>\r\n                          <th>IP Address</th>\r\n                          <th>User Agent </th>\r\n                          <th>CreatedTime</th>\r\n                        </tr>\r\n                      </thead>\r\n                      <tbody>\r\n                        ";
$ind_query = $db->query("SELECT * FROM user_audit_trails     order by id desc   ");
$ind_query = $ind_query->getResultArray();
foreach ($ind_query as $record) {
    echo "                        <tr>\r\n                          <td>";
    $user = get_by_id("id", $record["user_id"], "ctbl_users");
    echo $user["username"];
    echo "</td>\r\n                          <td>";
    echo $record["event"];
    echo "</td>\r\n                          <td>";
    echo $record["table_name"];
    echo "</td>\r\n                          <td>";
    echo $record["old_values"];
    echo "</td>\r\n                          <td>";
    echo $record["new_values"];
    echo " </td>\r\n                          <td>";
    echo $record["url"];
    echo "</td>\r\n                          <td>";
    echo $record["ip_address"];
    echo "</td>\r\n                          <td>";
    echo $record["user_agent"];
    echo "</td>\r\n                          <td>";
    echo $record["created_at"];
    echo "</td>\r\n                        </tr>\r\n                        ";
}
echo "                      </tbody>\r\n                    </table>\r\n                    <!-- Form Ends here  -->\r\n                  </div>\r\n                  <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n                    <div class=\"col-lg-offset-5 col-lg-7\"> <a href=\"";
echo base_url() . "/user_management/audit_trails/";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n                  </div>\r\n                </div>\r\n              </div>\r\n            </div>\r\n          </div>\r\n</div>\r\n\t\t \r\n            </main>";

?>