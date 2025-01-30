<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$db = Config\Database::connect();
$session = Config\Services::session();
echo "\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/select2/select2.bundle.css\">\r\n<!-- BEGIN Page Wrapper -->\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-6\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span></h2>\r\n      </div>\r\n      <div class=\"panel-container show\">\r\n        <div class=\"panel-content\">\r\n           \t\t";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "                  <div class=\"form-group\">\r\n                    <div class=\"alert alert-block alert-success\"> <a class=\"close\" data-dismiss=\"alert\" href=\"#\">X</a>\r\n                      <h4 class=\"alert-heading\"><i class=\"fa fa-check-square-o\"></i> Alert </h4>\r\n                      <p> ";
    echo $session->getFlashdata("feedback");
    echo " </p>\r\n                    </div>\r\n                  </div>\r\n                  ";
}
echo "\t\t    ";
$validation = Config\Services::validation();
if ($validation->getErrors()) {
    echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $validation->listErrors();
    echo "</div>";
}
echo "               ";
if (!empty($errors)) {
    echo "            <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">\r\n              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"> <span aria-hidden=\"true\"><i class=\"fal fa-times-square\"></i></span> </button>\r\n              ";
    echo $errors;
    echo "</div>";
}
echo "              <form class=\"needs-validation\" method=\"post\" action=\"";
echo base_url() . "/planning/project_annual_plan/select_list";
echo "\" validate>\r\n                <div class=\"panel-content\">\r\n               \r\n                \r\n                        <div class=\"form-group\">\r\n                          <label class=\"form-label \" for=\"single-default\"> Project </label>\r\n                            <select name=\"project\" id=\"project\" onchange=\"getyear();\" class=\"custom-select\" required>\r\n                              <option value=\"\">Select Project</option>\r\n                                ";
$query_project = $db->query("select * from  project where  base_id = \"" . $base_id . "\" and  flag=0 order by name");
$results = $query_project->getResultArray();
foreach ($results as $row_so) {
    echo "                                <option value=\"";
    echo $row_so["id"];
    echo "\">";
    echo $row_so["name"];
    echo "</option>\r\n                                ";
    $startdate = date("Y", strtotime($row_so["start_date"]));
    $enddate = date("Y", strtotime($row_so["end_date"]));
    $diff = $enddate - $startdate + 1;
}
echo "                            </select>\r\n                        </div>\r\n                        \r\n                        \r\n\t\t\t\t\t\t<div class=\"form-group\">\r\n                          <label class=\"form-label \" for=\"single-default\"> Year </label>\r\n                            <select name=\"year\" id=\"year\" class=\"custom-select\" required>\r\n                              <option value=\"\">Select Year</option>\r\n                              \r\n                            </select>\r\n                        </div>\r\n                \r\n\r\n                \r\n                <div class=\"panel-content border-faded border-0\">\r\n                  <div class=\"col-lg-offset-5 col-lg-7\">\r\n                    <button class=\"btn btn-primary ml-auto waves-effect waves-themed\" type=\"submit\"><span class=\"fal fa-check mr-1\"></span> Continue</button>\r\n                    <a href=\"";
echo base_url() . "/planning/project_annual_plan";
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel</a> </div>\r\n                </div>\r\n              </form>\r\n\r\n        </div>\r\n        \r\n        \r\n        \r\n        \r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</div>\r\n</main>\r\n";

?>