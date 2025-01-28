<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "﻿";
$this->session = Config\Services::session();
echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n<ol class=\"breadcrumb page-breadcrumb\">\r\n  <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n  <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n  <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n</ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span> </h2>\r\n      </div>\r\n      <div class=\"panel-container show\">\r\n        <div class=\"panel-content\">\r\n          ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "          <div class=\"form-group\">\r\n            <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n              <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n              <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n            </div>\r\n          </div>\r\n          ";
}
echo "          ";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "          <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n            ";
    echo $validation->listErrors();
    echo "</div>\r\n          ";
}
echo "        </div>\r\n        <div class=\"panel-content p-0\">\r\n\t\t";
$insert_url = "user_management/user_rights/edit/" . $id_data;
echo form_open($insert_url, "method=\"post\" id=\"Form\"  enctype=\"multipart/form-data\" class=\"needs-validation\" validate");
echo "        \r\n        \r\n          <div class=\"panel-content p-0\">\r\n            <div class=\"col-lg-offset-5 col-lg-7\">\r\n              <button class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n              <a href=\"";
echo base_url() . "/user_management/user_rights";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> \r\n              </div>\r\n          </div>\r\n\r\n\r\n          <div class=\"panel-content \">\r\n            <div class=\"form-row\"> \r\n              <!-- Form Starts here  --> \r\n              \r\n                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"table table-bordered checkAll\">\r\n                  <tbody>\r\n\t\t\t\t  \r\n\t\t\t\t    ";
$db = Config\Database::connect();
$field_action = [];
$query_group = $db->query("SELECT   group_name,permission from ctbl_user_access_model group by group_name  order by order_id");
$i = 1;
$results1 = $query_group->getResultArray();
foreach ($results1 as $row_group) {
    $permission = explode(",", $row_group["permission"]);
    if ($this->session->get("user_type") == "admin") {
        $type = 1;
    } else {
        $type = 2;
    }
    if (in_array($type, $permission)) {
        echo "\t\t\t\t  \r\n                  \r\n                    <tr>\r\n                      <td colspan=\"9\" bgcolor=\"#feffff\"><h3><span class=\"style1\">";
        echo $row_group["group_name"];
        echo "</span>\r\n                          <input name=\"checkbox\" type=\"checkbox\" id=\"cbgroup1_";
        echo $i;
        echo "\" onchange=\"togglecheckboxes(this,'group_";
        echo $i;
        echo "')\">\r\n                          <span class=\"style1\">Check All</span></h3></td>\r\n                    </tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t   ";
        $query_model = $db->query("SELECT * from ctbl_user_access_model left join (select title,rules,group_id from ctbl_sub_viewlevel where group_id=\"" . $id_data . "\")as rules on ctbl_user_access_model.model_var=title where group_name=\"" . $row_group["group_name"] . "\" order by order_id");
        $results = $query_model->getResultArray();
        foreach ($results as $row_model) {
            $rules = explode(",", $row_model["rules"]);
            $permission = explode(",", $row_model["permission"]);
            if ($this->session->get("user_type") == "admin") {
                $type = 1;
            } else {
                $type = 2;
            }
            if (in_array($type, $permission)) {
                echo "                    \r\n                    <tr>\r\n                      <td width=\"40%\" align=\"left\" bgcolor=\"#F3F3F3\">";
                echo $row_model["modelname"];
                echo "</td>\r\n                      <td width=\"10%\"><input name=\"field_action[";
                echo $row_model["model_var"];
                echo "][1]\" type=\"checkbox\" id=\"field_action_";
                echo $row_model["id"];
                echo "_1\" value=\"1\" ";
                if (in_array(1, $rules)) {
                    echo "checked";
                }
                echo " class=\"group_";
                echo $i;
                echo "\" />\r\n                        View</td>\r\n                      <td width=\"10%\"><input name=\"field_action[";
                echo $row_model["model_var"];
                echo "][2]\" type=\"checkbox\" id=\"field_action_";
                echo $row_model["id"];
                echo "_2\" value=\"2\" ";
                if (in_array(2, $rules)) {
                    echo "checked";
                }
                echo " class=\"group_";
                echo $i;
                echo "\" />\r\n                        Add New </td>\r\n                      <td width=\"10%\"><input name=\"field_action[";
                echo $row_model["model_var"];
                echo "][3]\" type=\"checkbox\" id=\"field_action_";
                echo $row_model["id"];
                echo "_3\" value=\"3\" ";
                if (in_array(3, $rules)) {
                    echo "checked";
                }
                echo " class=\"group_";
                echo $i;
                echo "\" />\r\n                        Delete</td>\r\n                      <td width=\"10%\"><input name=\"field_action[";
                echo $row_model["model_var"];
                echo "][4]\" type=\"checkbox\" id=\"field_action_";
                echo $row_model["id"];
                echo "_4\" value=\"4\" ";
                if (in_array(4, $rules)) {
                    echo "checked";
                }
                echo " class=\"group_";
                echo $i;
                echo "\" />\r\n                        Edit</td>\r\n                      <td width=\"10%\">&nbsp;</td>\r\n                    </tr>\r\n\t\t\t\t\t\r\n\t\t\t\t\t";
            }
        }
    }
    $i++;
}
echo "                  </tbody>\r\n                </table>\r\n              \r\n              <!-- Form Ends here  --> \r\n            </div>\r\n          </div>\r\n          \r\n          \r\n          <div class=\"panel-content \">\r\n            <div class=\"col-lg-offset-5 col-lg-7 p-0\">\r\n              <button class=\"btn btn-success\" type=\"submit\" name=\"action\" value=\"saveandback\"><span class=\"fal fa-undo mr-1\"></span> Save &amp; Go back to list</button>\r\n              <a href=\"";
echo base_url() . "/user_management/user_rights";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n          </div>\r\n          </form>\r\n          \r\n          \r\n          \r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n</main>\r\n<!-- this overlay is activated only when mobile menu is triggered -->\r\n<div class=\"page-content-overlay\" data-action=\"toggle\" data-class=\"mobile-nav-on\"></div>\r\n<!-- END Page Content --> \r\ns";

?>