<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

$db = Config\Database::connect();
$session = Config\Services::session();
echo "<script src=\"";
echo base_url();
echo "/public/js/menu/division_project.js\"></script>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/tree.css\">\r\n<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/notifications/sweetalert2/sweetalert2.bundle.css\">\r\n\r\n \r\n<!-- BEGIN Page  -->\r\n\r\n<main id=\"js-page-content\" role=\"main\" class=\"page-content\">\r\n  <ol class=\"breadcrumb page-breadcrumb\">\r\n    <li class=\"breadcrumb-item\"><a href=\"";
echo base_url() . "/home";
echo "\">Home</a></li>\r\n    <li class=\"breadcrumb-item active\">";
echo $main_title;
echo "</li>\r\n    <li class=\"position-absolute pos-top pos-right d-none d-sm-block\"><span class=\"js-get-date\"></span></li>\r\n  </ol>\r\n<!-- Form code starts here  -->\r\n\r\n<div class=\"row\">\r\n  <div class=\"col-xl-12\">\r\n    <div id=\"panel-2\" class=\"panel\">\r\n      <div class=\"panel-hdr\">\r\n        <h2><span class=\"fw-300\"><i>";
echo $title;
echo "</i></span></h2>\r\n         <div class=\"panel-toolbar\">\r\n          \r\n\t\t    <a href=\"";
echo base_url() . "/planning/project_me_plan/" . $session->get("mode") . "/" . $workflow_id;
echo "\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Cancel/Back to Main Page\"  class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back </a> \r\n        </div> \r\n      </div>\r\n      \r\n      <div class=\"panel-container show\">\r\n       \r\n        \r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n    \r\n                <table class=\"table table-bordered\">\r\n                  <tbody>\r\n                    <tr>\r\n                      <th class=\"bg-highlight\">Project Name</th>\r\n                      <td>\r\n\t\t\t\t\t  ";
$project_details = get_by_id("id", $frameworkdata["project"], "project");
echo $project_details["name"];
echo "                      </td>\r\n                    </tr>\r\n                  </tbody>\r\n                </table>\r\n                \r\n                \r\n \r\n         \r\n                <div class=\"tree well\">\r\n                <ul role=\"group\">\r\n                    <li>\r\n                    <div align=\"left\">\r\n                    <strong>:: Goals::</strong><a class=\"btn btn-primary btn-xs\" href=\"";
echo base_url() . "/planning/project_me_plan/add_goal/" . $workflow_id;
echo "\"><strong> Add Goal </strong> </a> \r\n                    </li>\r\n                  \r\n                  \r\n                ";
$query_goal = $db->query("select * from  project_goal where workflow_id=\"" . $workflow_id . "\" and flag=0  order by id ");
$g = 1;
$results_goal = $query_goal->getResultArray();
foreach ($results_goal as $row_goal) {
    echo "                <li> <span><i class=\"fal fa-folder-open\"></i>  : ";
    echo $row_goal["name"];
    echo "  &nbsp;&nbsp;\r\n                \r\n                <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Edit\"  onclick=\"javascript:edit1('";
    echo base_url() . "/planning/project_me_plan/edit_goal/" . $workflow_id . "/?id=" . $row_goal["id"];
    echo "');\"><i class=\"fal fa-edit\"></i></a> \r\n                \r\n                <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Remove\"  onclick=\"javascript:del_rec_1('";
    echo base_url() . "/planning/project_me_plan/delete_goal/" . $workflow_id . "/?id=" . $row_goal["id"];
    echo "');\"><i class=\"fal fa-times\"></i> </a>\r\n                </span>   \r\n               \r\n               \r\n                <ul>\r\n                \r\n                <li><strong>::Goal Indicator ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
    echo base_url() . "/planning/project_me_plan/add_goal_indicator/" . $workflow_id . "/?goal_id=" . $row_goal["id"];
    echo "\"><strong><font color=\"white\"> Add Goal Indicator</font> </strong> </a></li>\r\n                \r\n                \r\n                ";
    $i = 3;
    $query_goal_ind = $db->query("select * from project_goal_indicator where goal_id='" . $row_goal["id"] . "'  order by id ");
    $results_goal_ind = $query_goal_ind->getResultArray();
    foreach ($results_goal_ind as $row_goal_ind) {
        echo "                <li> <span>  ";
        echo $row_goal_ind["indicator"];
        echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n               \r\n                <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
        echo base_url() . "/planning/project_me_plan/edit_goal_indicator/" . $workflow_id . "/?id=" . $row_goal_ind["id"];
        echo "&goal_id=";
        echo $row_goal["id"];
        echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n             \r\n                <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
        echo base_url() . "/planning/project_me_plan/delete_goal_indicator/" . $workflow_id . "/?id=" . $row_goal_ind["id"];
        echo "&goal_id=";
        echo $row_goal["id"];
        echo "')\"><i class=\"fal fa-times\"></i></a>  \t\t\t\t</span>\r\n\t\t\t\t";
    }
    echo "\r\n                \r\n                <li><strong>::Outcomes ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
    echo base_url() . "/planning/project_me_plan/add_outcome/" . $workflow_id . "/?goal_id=" . $row_goal["id"];
    echo "\"><strong><font color=\"white\"> Add Outcome</font> </strong> </a></li>\r\n                \r\n                \r\n                ";
    $i = 3;
    $query_outcomes = $db->query("select * from project_outcome where project_outcome.goal_id='" . $row_goal["id"] . "'  order by id ");
    $results_outcomes = $query_outcomes->getResultArray();
    foreach ($results_outcomes as $row_outcome) {
        echo "                <li> <span><i class=\"fal fa-lg fa-minus-circle\"></i>  ";
        echo $row_outcome["name"];
        echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                \r\n                <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
        echo base_url() . "/planning/project_me_plan/edit_outcome/" . $workflow_id . "/?id=" . $row_outcome["id"];
        echo "&goal_id=";
        echo $row_goal["id"];
        echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n               \r\n                <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
        echo base_url() . "/planning/project_me_plan/delete_outcome/" . $workflow_id . "/?id=" . $row_outcome["id"];
        echo "&goal_id=";
        echo $row_goal["id"];
        echo "')\"><i class=\"fal fa-times\"></i></a>  \t\t\t\t</span>\r\n                \r\n                  <ul>\r\n                    <li><strong>::Outcome Indicators ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
        echo base_url() . "/planning/project_me_plan/add_outcome_indicator/" . $workflow_id . "/?outcome_id=" . $row_outcome["id"];
        echo "\"  ><strong><font color=\"white\"> Add Outcome Indicator</font> </strong> </a></li>\r\n                    ";
        $query_outcome_indicator = $db->query("SELECT  *  from project_outcome_indicator where outcome_id='" . $row_outcome["id"] . "'   order by id ");
        $results_outcome_indicator = $query_outcome_indicator->getResultArray();
        foreach ($results_outcome_indicator as $row_outcome_indicator) {
            echo "                    <li> <span>\r\n                      <label>";
            echo $row_outcome_indicator["indicator"];
            echo "</label>\r\n                       \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
            echo base_url() . "/planning/project_me_plan/edit_outcome_indicator/" . $workflow_id . "/?id=" . $row_outcome_indicator["id"];
            echo "&outcome_id=";
            echo $row_outcome["id"];
            echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
            echo base_url() . "/planning/project_me_plan/delete_outcome_indicator/" . $workflow_id . "/?id=" . $row_outcome_indicator["id"];
            echo "&outcome_id=";
            echo $row_outcome["id"];
            echo "')\"><i class=\"fal fa-times\"></i></a></span>\r\n                       \r\n                    </li>\r\n                    ";
        }
        echo "                  \r\n                    <li><strong>::Output ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
        echo base_url() . "/planning/project_me_plan/add_output/" . $workflow_id . "/?outcome_id=" . $row_outcome["id"];
        echo "\"  ><strong><font color=\"white\"> Add Output</font> </strong> </a></li>\r\n                    ";
        $query_output = $db->query("SELECT  *  from project_output  where outcome_id='" . $row_outcome["id"] . "'   order by id ");
        $results_output = $query_output->getResultArray();
        foreach ($results_output as $row_output) {
            echo "                    <li> <span>\r\n                      <label><i class=\"fal fa-lg fa-minus-circle\"></i>  ";
            echo $row_output["name"];
            echo "</label>\r\n                       \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
            echo base_url() . "/planning/project_me_plan/edit_output/" . $workflow_id . "/?id=" . $row_output["id"];
            echo "&outcome_id=";
            echo $row_outcome["id"];
            echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
            echo base_url() . "/planning/project_me_plan/delete_output/" . $workflow_id . "/?id=" . $row_output["id"];
            echo "&outcome_id=";
            echo $row_outcome["id"];
            echo "')\"><i class=\"fal fa-times\"></i></a></span>\r\n                       \r\n                       \r\n                  <ul>\r\n                    <li><strong>::Output Indicators ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
            echo base_url() . "/planning/project_me_plan/add_output_indicator/" . $workflow_id . "/?output_id=" . $row_output["id"];
            echo "\"  ><strong><font color=\"white\"> Add Output Indicator</font> </strong> </a></li>\r\n                    ";
            $query_output_indicator = $db->query("select  *  from project_output_indicator  where output_id = '" . $row_output["id"] . "'   order by id ");
            $results_output_indicator = $query_output_indicator->getResultArray();
            foreach ($results_output_indicator as $row_output_indicator) {
                echo "                    <li> <span>\r\n                      <label>";
                echo $row_output_indicator["indicator"];
                echo "</label>\r\n                       \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
                echo base_url() . "/planning/project_me_plan/edit_output_indicator/" . $workflow_id . "/?id=" . $row_output_indicator["id"];
                echo "&output_id=";
                echo $row_output["id"];
                echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
                echo base_url() . "/planning/project_me_plan/delete_output_indicator/" . $workflow_id . "/?id=" . $row_output_indicator["id"];
                echo "&output_id=";
                echo $row_output["id"];
                echo "')\"><i class=\"fal fa-times\"></i></a></span>\r\n                       \r\n                    </li>\r\n                    ";
            }
            echo "\t\t\t\t\t\r\n                    \r\n                    <li><strong>::Activity ::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
            echo base_url() . "/planning/project_me_plan/add_activity/" . $workflow_id . "/?output_id=" . $row_output["id"];
            echo "\"><strong><font color=\"white\"> Add Activity</font> </strong> </a></li>\r\n                    ";
            $query_activity = $db->query("select  *  from project_activity  where output_id = '" . $row_output["id"] . "'   order by id ");
            $results_activity = $query_activity->getResultArray();
            foreach ($results_activity as $row_activity) {
                echo "                    <li> <span>\r\n                      <label>\r\n\t\t\t\t\t  ";
                if ($row_activity["activity_type"] == "Non-Budget Activity") {
                    echo $row_activity["activity_name"];
                } else {
                    $query_act = $db->query("select * from import_activities where id = '" . $row_activity["activity_name"] . "' ");
                    $row_act = $query_act->getResult();
                    $row_act = $query_act->getRow();
                    echo $row_act->activity_name;
                }
                echo "                      </label>\r\n                       \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
                echo base_url() . "/planning/project_me_plan/edit_activity/" . $workflow_id . "/?id=" . $row_activity["id"];
                echo "&output_id=";
                echo $row_output["id"];
                echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                      \r\n                       <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1 \" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
                echo base_url() . "/planning/project_me_plan/delete_activity/" . $workflow_id . "/?id=" . $row_activity["id"];
                echo "&output_id=";
                echo $row_output["id"];
                echo "')\"><i class=\"fal fa-times\"></i></a></span>\r\n                       \r\n                    </li>\r\n                    ";
            }
            echo "\t\t\t\t\t</ul>  <!------output Indicator--->                     \r\n                       \r\n                       \r\n                    </li>\r\n                    ";
        }
        echo "                  </ul> <!------output--->\r\n                    \r\n                  \r\n                  \r\n                  \r\n                  \r\n                        </li>\r\n                        \r\n                      \r\n                    \r\n                                      \r\n                </li>\r\n                        \r\n                 \r\n                 \r\n                      \r\n                        ";
    }
    echo "                      </ul> <!--Goal Ind Ends-->\r\n\r\n\r\n                    </li>\r\n                    ";
}
echo "                  </ul>\r\n                 \r\n            </div>\r\n            \r\n             \r\n           \r\n            \r\n            <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n              <div class=\"col-lg-offset-5 col-lg-7\"> <a href=\"";
echo base_url() . "/planning/project_me_plan/" . $session->get("mode") . "/" . $workflow_id;
echo "\" class=\"btn btn-outline-default waves-themed waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back</a> </div>\r\n            </div>\r\n          </form>\r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</main>\r\n\r\n<!-- End Page --> \r\n ";

?>