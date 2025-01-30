<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$db = Config\Database::connect();
$session = Config\Services::session();
echo " \r\n<script src=\"";
echo base_url();
echo "/public/js/menu/division_project.js\"></script>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/notifications/sweetalert2/sweetalert2.bundle.css\">\r\n\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/tree.css\">\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n\r\n\r\n<!-- BEGIN Page  -->\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span></h2>\r\n        <!--<div class=\"panel-toolbar\">\r\n          <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>\r\n          <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>\r\n          <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>\r\n        </div>-->\r\n      </div>\r\n      \r\n      <div class=\"panel-container show\">\r\n       \r\n        \r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n     ";
echo "<div class=\"tree well\">\r\n              <ul role=\"tree\">\r\n                <li><strong>::Case Type::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
echo base_url() . "/reporting/organizational_data/case_types/add_case_type/";
echo "\"><strong><font color=\"white\"> Add Case Type</font> </strong> </a>\r\n                </li>\r\n                \r\n\t\t\t\t";
$where = $fydp == null ? "" : " and id = ". $fydp ."";
$query_case_type = $db->query("select * FROM  case_types Where 1=1 " . $where . " order by id");
$g = 1;
$results_case_types = $query_case_type->getResultArray();
foreach ($results_case_types as $row_case_type) {
    echo "                 <li> <span><i class=\"fal fa-folder-open\"></i>  : ";
    echo $row_case_type["name"];
    echo "  &nbsp;&nbsp;\r\n                 \r\n                 <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Edit\"  onclick=\"javascript:edit1('";
    echo base_url() . "/reporting/organizational_data/case_types/edit_case_type/" . $row_case_type["id"];
    echo "');\"><i class=\"fal fa-edit\"></i></a> \r\n                 \r\n                 <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Remove\"  onclick=\"javascript:del_rec_1('";
    echo base_url() . "/reporting/organizational_data/case_types/delete_case_type/" . $row_case_type["id"];
    echo "');\"><i class=\"fal fa-times\"></i> </a>\r\n                   </span>  \r\n                  \r\n                  <ul role=\"group\">\r\n                    <li><strong>:: Case Context  ::</strong><a class=\"btn btn-primary btn-xs\" href=\"";
    echo base_url() . "/reporting/organizational_data/case_types/add_case_context/" . $row_case_type["id"];
    echo "\"><strong><font color=\"white\"> Add Case Context</font> </strong> </a>\r\n                    </li>\r\n                  \r\n\t\t\t\t\t";
    $i = 3;
    $query_case_context = $db->query("select * from case_contexts  where  case_type_id = " . $row_case_type["id"] . " order by id ");
    $results_case_contexts = $query_case_context->getResultArray();
    foreach ($results_case_contexts as $row_case_context) {
        echo "\r\n\r\n                  <li> <span>";
        echo $row_case_context["name"];
        echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                  \r\n                  <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
        echo base_url() . "/reporting/organizational_data/case_types/edit_case_context/" . $row_case_context["id"];
        echo "/?case_type_id=";
        echo $row_case_type["id"];
        echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                  \r\n                  <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
        echo base_url() . "/reporting/organizational_data/case_types/delete_case_context/" . $row_case_context["id"];
        echo "/?case_type_id=";
        echo $row_case_type["id"];
        echo "')\"><i class=\"fal fa-times\"></i></a>  \r\n                  </span>\r\n";
    }
    echo "                  \r\n                  \r\n                </li>\r\n ";
}
echo "              </ul>\r\n            </div>\r\n            \r\n            </div>\r\n           \r\n            \r\n            <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n              <div class=\"col-lg-offset-5 col-lg-7\">   <a href=\"";
echo base_url() . "/reporting/organizational_data/case_types";
echo "\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Cancel/Back to Main Page\"  class=\"btn btn-primary btn-sm waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back </a>  </div>\r\n            </div>\r\n           \r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</main>\r\n\r\n<!-- End Page --> \r\n\r\n";

?>