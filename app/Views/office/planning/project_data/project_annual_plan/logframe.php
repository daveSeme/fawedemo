<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$db = Config\Database::connect();
$session = Config\Services::session();
echo "<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/tree.css\">\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n<script src=\"";
echo base_url();
echo "/public/js/menu/division_project.js\"></script>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/notifications/sweetalert2/sweetalert2.bundle.css\">\r\n\r\n<!-- BEGIN Page  -->\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span></h2>\r\n         <div class=\"panel-toolbar\">\r\n          \r\n\t\t    <a href=\"";
echo base_url() . "/planning/project_annual_plan/" . $session->get("mode") . "/" . $workflow_id;
echo "\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Cancel/Back to Main Page\"  class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back </a> \r\n        </div> \r\n      </div>\r\n      \r\n      <div class=\"panel-container show\">\r\n       \r\n        \r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n            <table class=\"table table-bordered\">\r\n              <tbody>\r\n                <tr>\r\n                  <th class=\"bg-highlight\">Project Name</th>\r\n                  <td>";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
echo "                  </td>\r\n                  <td class=\"bg-highlight\"> Year </td>\r\n                  <td >";
echo $frameworkdata["year"];
echo "                  </td>\r\n                </tr>\r\n              </tbody>\r\n            </table>\r\n            <div class=\"tree well\">\r\n                <ul>\r\n                    <li>\r\n                    <div align=\"left\">\r\n                    <strong>:: Outcomes ::</strong>\r\n                    </li>\r\n                \r\n                  \r\n\t\t\t\t\t";
$project_details = get_by_id("id", $workflow_id, "project_annual_plan_workflow");
$project_id = $project_details["project"];
$query_goal = $db->query("select * from  project_goal where workflow_id=\"" . $workflow_id . "\" and flag=0  order by id ");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    $query_outcome = $db->query("select * from  project_outcome where goal_id=\"" . $row_goal["id"] . "\" and flag=0  order by id ");
    $g = 1;
    $results_outcome = $query_outcome->getResultArray();
    foreach ($results_outcome as $row_outcome) {
        echo "\r\n                <li> <span><i class=\"fal fa-folder-open\"></i>  : ";
        echo $row_outcome["name"];
        echo "  &nbsp;&nbsp;\r\n                \r\n                </span>   \r\n                <ul>\r\n                \r\n                \r\n                \r\n                <li><strong>::Outputs ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
        echo base_url() . "/planning/project_annual_plan/add_output/" . $workflow_id . "/?outcome_id=" . $row_outcome["id"];
        echo "\"><strong><font color=\"white\"> Add Output</font> </strong> </a></li>\r\n                \r\n                \r\n                ";
        $i = 3;
        $query_output = $db->query("select * from project_output where outcome_id = '" . $row_outcome["id"] . "'  order by project_output.id ");
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "                <li> <span><i class=\"fal fa-lg fa-minus-circle\"></i>  ";
            echo $row_output["name"];
            echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
            echo base_url() . "/planning/project_annual_plan/edit_output/" . $workflow_id . "/?id=" . $row_output["id"];
            echo "&outcome_id=";
            echo $row_output["outcome_id"];
            echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
            echo base_url() . "/planning/project_annual_plan/delete_output/" . $workflow_id . "/?id=" . $row_output["id"];
            echo "&outcome_id=";
            echo $row_output["outcome_id"];
            echo "')\"><i class=\"fal fa-times\"></i></a>  \t\t\t\t</span>\r\n                \r\n                  <ul>\r\n                    <li><strong>::Activity ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
            echo base_url() . "/planning/project_annual_plan/add_activity/" . $workflow_id . "/?output_id=" . $row_output["id"];
            echo "\"  ><strong><font color=\"white\"> Add Activity</font> </strong> </a></li>\r\n                    ";
            $query_activity = $db->query("SELECT  *  from project_activity  where output_id='" . $row_output["id"] . "' order by project_activity.id ");
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "                    <li> <span>\r\n                      <label>";
                echo $row_activity["activity_name"];
                echo "</label>\r\n                       \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
                echo base_url() . "/planning/project_annual_plan/edit_activity/" . $workflow_id . "/?id=" . $row_activity["id"];
                echo "&output_id=";
                echo $row_activity["output_id"];
                echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
                echo base_url() . "/planning/project_annual_plan/delete_activity/" . $workflow_id . "/?id=" . $row_activity["id"];
                echo "&output_id=";
                echo $row_activity["output_id"];
                echo "')\"><i class=\"fal fa-times\"></i></a></span>\r\n                       \r\n                    </li>\r\n                    ";
            }
            echo "                  </ul>\r\n                  </ul>\r\n                              \r\n                              \r\n                  </li>\r\n              </ul>\r\n                          \r\n                          \r\n                        </li>\r\n                        \r\n                      \r\n                    \r\n                                      \r\n                </li>\r\n                        ";
        }
        echo "                      </ul>\r\n                    </li>\r\n                    ";
    }
    echo "                    \r\n                    ";
}
echo "                    \r\n                    \r\n                  </ul>\r\n                 \r\n                </li>\r\n              </ul>\r\n            </div>\r\n            \r\n            <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n              <div class=\"col-lg-offset-5 col-lg-7\"> <a href=\"";
echo base_url() . "/planning/project_annual_plan/" . $session->get("mode") . "/" . $workflow_id;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back</a> </div>\r\n            </div>\r\n           \r\n          </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</main>\r\n\r\n<!-- End Page --> \r\n ";

?>