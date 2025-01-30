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
echo "</i></span></h2>\r\n        <!--<div class=\"panel-toolbar\">\r\n          <button class=\"btn btn-panel\" data-action=\"panel-collapse\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Collapse\"></button>\r\n          <button class=\"btn btn-panel\" data-action=\"panel-fullscreen\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Fullscreen\"></button>\r\n          <button class=\"btn btn-panel\" data-action=\"panel-close\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Close\"></button>\r\n        </div>-->\r\n      </div>\r\n      \r\n      <div class=\"panel-container show\">\r\n       \r\n        \r\n        <div class=\"panel-content p-0\">\r\n          <div class=\"panel-content\">\r\n          <table class=\"table table-bordered\">\r\n            <tbody>\r\n              <tr>\r\n                <th class=\"bg-highlight\">Strategic Plan Name</th>\r\n                <td colspan=\"3\">";
echo $stdata["plan_name"];
echo "</td>\r\n              </tr>\r\n              \r\n              <tr>\r\n                <th class=\"bg-highlight\">Start Date</th>\r\n                <td>";
echo $stdata["startyear"];
echo "</td>\r\n                <th class=\"bg-highlight\">End Date</th>\r\n                <td>";
echo $stdata["endyear"];
echo "</td>\r\n              </tr>\r\n              \r\n            </tbody>\r\n          </table>\r\n\t\t  \r\n        \r\n            <div class=\"tree well\">\r\n              <ul role=\"tree\">\r\n                <li><strong>::Thematic Area::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
echo base_url() . "/planning/strategic_plans/add_themetic_area/" . $fydp;
echo "\"><strong><font color=\"white\"> Add Thematic Area</font> </strong> </a>\r\n                </li>\r\n                \r\n\t\t\t\t";
$query_thematic_area = $db->query("SELECT * FROM  org_thematic_area where mda_plan_id=\"" . $fydp . "\" and  base_id=\"" . $base_id . "\"  and  flag=0  order by id ");
$g = 1;
$results_thematic_area = $query_thematic_area->getResultArray();
foreach ($results_thematic_area as $row_thematic_area) {
    echo "                 <li> <span><i class=\"fal fa-folder-open\"></i>  : ";
    echo $row_thematic_area["name"];
    echo "  &nbsp;&nbsp;\r\n                 \r\n                 <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Edit\"  onclick=\"javascript:edit1('";
    echo base_url() . "/planning/strategic_plans/edit_themetic_area/" . $fydp . "/?id=" . $row_thematic_area["id"];
    echo "');\"><i class=\"fal fa-edit\"></i></a> \r\n                 \r\n                 <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Remove\"  onclick=\"javascript:del_rec_1('";
    echo base_url() . "/planning/strategic_plans/delete_themetic_area/" . $fydp . "/?id=" . $row_thematic_area["id"];
    echo "');\"><i class=\"fal fa-times\"></i> </a>\r\n                   </span>  \r\n                  \r\n                  <ul role=\"group\">\r\n                    <li><strong>:: Objective  ::</strong><a class=\"btn btn-primary btn-xs\" href=\"";
    echo base_url() . "/planning/strategic_plans/add_objective/" . $fydp . "/?th_area_id=" . $row_thematic_area["id"];
    echo "\"><strong><font color=\"white\"> Add Objective</font> </strong> </a>\r\n                    </li>\r\n                  \r\n\t\t\t\t\t";
    $i = 3;
    $query_obj = $db->query("SELECT  *    from org_objective  where  th_area_id = '" . $row_thematic_area["id"] . "' and  base_id='" . $base_id . "'  order by id ");
    $results_obj = $query_obj->getResultArray();
    foreach ($results_obj as $row_obj) {
        echo "\r\n\r\n                  <li> <span>";
        echo $row_obj["strategic_objective"];
        echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                  \r\n                  <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
        echo base_url() . "/planning/strategic_plans/edit_objective/" . $fydp . "/?id=" . $row_obj["id"];
        echo "&th_area_id=";
        echo $row_thematic_area["id"];
        echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                  \r\n                  <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
        echo base_url() . "/planning/strategic_plans/delete_objective/" . $fydp . "/?id=" . $row_obj["id"];
        echo "&th_area_id=";
        echo $row_thematic_area["id"];
        echo "')\"><i class=\"fal fa-times\"></i></a>  \r\n                  </span>\r\n                 \r\n                  \r\n                  \r\n                  \r\n                  \r\n                  \r\n                  <ul role=\"group\">\r\n                    <li><strong>:: Objective Indicator ::</strong><a class=\"btn btn-primary btn-xs\" href=\"";
        echo base_url() . "/planning/strategic_plans/add_objective_indicator/" . $fydp . "/?objective_id=" . $row_obj["id"];
        echo "\"><strong><font color=\"white\"> Add Objective Indicator</font> </strong> </a>\r\n                    </li>\r\n                    \r\n\t\t\t\t\t";
        $i = 3;
        $query_obj_ind = $db->query("select * from org_objective_indicator where objective_id = '" . $row_obj["id"] . "' and base_id='" . $base_id . "' order by id");
        $results_obj_ind = $query_obj_ind->getResultArray();
        foreach ($results_obj_ind as $row_obj_ind) {
            echo "                    <li> <span>   ";
            echo $row_obj_ind["indicator"];
            echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                    \r\n                    <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
            echo base_url() . "/planning/strategic_plans/edit_objective_indicator/" . $fydp . "/?id=" . $row_obj_ind["id"];
            echo "&objective_id=";
            echo $row_obj["id"];
            echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                    \r\n                    <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
            echo base_url() . "/planning/strategic_plans/delete_objective_indicator/" . $fydp . "/?id=" . $row_obj_ind["id"];
            echo "&objective_id=";
            echo $row_obj["id"];
            echo "')\"><i class=\"fal fa-times\"></i></a>  </span>\r\n                    \r\n                    </li> \r\n                    ";
        }
        echo "\t\t\t\t\t\r\n\t\t\t\t\t\r\n                        <li><strong>::Strategic Intervention::</strong> <a class=\"btn btn-primary btn-xs\" href=\"";
        echo base_url() . "/planning/strategic_plans/add_strategic_intervention/" . $fydp . "/?objective_id=" . $row_obj["id"];
        echo "\"><strong><font color=\"white\"> Add Strategic Intervention</font> </strong> </a>\r\n                        </li>\r\n                        \r\n                    ";
        $query_so = $db->query("SELECT * FROM  org_strategic_intervention where objective_id=\"" . $row_obj["id"] . "\" and  base_id=\"" . $base_id . "\" and flag=0  order by id ");
        $g = 1;
        $results = $query_so->getResultArray();
        foreach ($results as $row_so) {
            echo "                         <li> <span><i class=\"fal fa-folder-open\"></i>  : ";
            echo $row_so["strat_interven_name"];
            echo "  &nbsp;&nbsp;\r\n                         \r\n                         <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Edit\"  onclick=\"javascript:edit1('";
            echo base_url() . "/planning/strategic_plans/edit_strategic_intervention/" . $fydp . "/?id=" . $row_so["id"];
            echo "&objective_id=";
            echo $row_obj["id"];
            echo "');\"><i class=\"fal fa-edit\"></i></a> \r\n                         \r\n                         <a class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:blue\" href=\"#\"  title=\"Remove\"  onclick=\"javascript:del_rec_1('";
            echo base_url() . "/planning/strategic_plans/delete_strategic_intervention/" . $fydp . "/?id=" . $row_so["id"];
            echo "&objective_id=";
            echo $row_obj["id"];
            echo "');\"><i class=\"fal fa-times\"></i> </a>\r\n                           </span>  \r\n                          \r\n                          \r\n                          \r\n                          \r\n                          <ul role=\"group\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<li><strong>::Intervention Indicator ::</strong><a class=\"btn btn-primary btn-xs\" href=\"";
            echo base_url() . "/planning/strategic_plans/add_indicator/" . $fydp . "/?intervention_id=" . $row_so["id"];
            echo "\"><strong><font color=\"white\"> Add Intervention Indicator</font> </strong> </a>\r\n                            </li>\r\n                            ";
            $i = 3;
            $query_str = $db->query("select * from org_intervention_indicator  Where intervention_id = '" . $row_so["id"] . "' and base_id='" . $base_id . "'  order by id");
            $results_sp = $query_str->getResultArray();
            foreach ($results_sp as $row_sp) {
                echo "                            <li> <span>   ";
                echo $row_sp["indicator"];
                echo " &nbsp;&nbsp;&nbsp;&nbsp;  \r\n                            \r\n                            <a href=\"#\" class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Edit\" onClick=\"javascript:edit1('";
                echo base_url() . "/planning/strategic_plans/edit_indicator/" . $fydp . "/?id=" . $row_sp["id"];
                echo "&intervention_id=";
                echo $row_so["id"];
                echo "')\"> <i class=\"fal fa-edit\"></i> </a> \r\n                            \r\n                            <a href=\"#\"   class=\"btn btn-sm btn-outline-primary btn-icon btn-inline-block mr-1\" style=\"color:black\" title=\"Delete\" onClick=\"javascript:del_rec_1('";
                echo base_url() . "/planning/strategic_plans/delete_indicator/" . $fydp . "/?id=" . $row_sp["id"];
                echo "&intervention_id=";
                echo $row_so["id"];
                echo "')\"><i class=\"fal fa-times\"></i></a>  </span></li> ";
            }
            echo "                          </ul>\r\n                        </li>\r\n                        \r\n                        ";
        }
        echo "                      </ul>                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                   \r\n                  \r\n                   </li>\r\n                  </ul> <!----Objective UL--->\r\n                   ";
    }
    echo "                  \r\n                  \r\n                </li>\r\n ";
}
echo "              </ul>\r\n            </div>\r\n            \r\n            </div>\r\n           \r\n            \r\n            <div class=\"panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center\">\r\n              <div class=\"col-lg-offset-5 col-lg-7\">   <a href=\"";
echo base_url() . "/planning/strategic_plans/" . $session->get("mode") . "/" . $fydp;
echo "\" data-toggle=\"tooltip\" data-offset=\"0,10\" data-original-title=\"Cancel/Back to Main Page\"  class=\"btn btn-primary btn-sm waves-effect waves-themed\"><span class=\"fal fa-exclamation-triangle mr-1\"></span>Cancel/Back </a>  </div>\r\n            </div>\r\n           \r\n        </div>\r\n      </div>\r\n    </div>\r\n  </div>\r\n</div>\r\n\r\n<!-- Form code Ends here  -->\r\n</main>\r\n\r\n<!-- End Page --> \r\n\r\n";

?>