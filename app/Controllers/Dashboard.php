<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $tank_auth = NULL;
    protected $validate = NULL;
    protected $configTankAuth = NULL;
    protected $session = NULL;
    protected $request = NULL;
    public function __construct()
    {
        $this->tank_auth = new \App\Libraries\Tank_auth();
        $this->validate = \Config\Services::validation();
        helper(["form", "url"]);
        helper("security");
        helper("url");
        $this->configTankAuth = config("tank_auth");
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Overall Performance ";//"Overall Performance ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/js_file";
        $data["main_content"] = "office/dashboard/list"; // list
        echo view("template/index", $data);
    }
    public function project_overview()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project Dashboard ";
        $data["main_title"] = "Dashboard";
        $db = \Config\Database::connect();
        $markers = [];
        $infowindow = [];
        $query = $db->query("SELECT mas_district.id as id, mas_district.name as location_name, mas_district.latitude as latitude, mas_district.longitude as longitude,total_project FROM  mas_district left join (select district_id, count(*)as total_project from `project` left join project_map_district on project_map_district.project_id=project.id group by district_id  ) as project on project.district_id=mas_district.id\r\n");
        $results = $query->getResult();
        foreach ($results as $value) {
            $markers[] = [$value->location_name, $value->latitude, $value->longitude];
            if ($value->total_project != "") {
                $project = $value->total_project . " Projects";
                $listURL = "<a href='" . base_url("/dashboard/project_listing/" . $value->id) . "' > <strong>View List</strong></a>";
            } else {
                $listURL = "";
                $project = "No Projects";
            }
            $infowindow[] = ["<div class=info_content><h3>" . $value->location_name . "</h3><p>" . $project . "</br></br>" . $listURL . " </p></div>"];
        }
        $data["markers"] = json_encode($markers);
        $data["infowindow"] = json_encode($infowindow);
        $data["js_file"] = "office/dashboard/project_overview_js";
        $data["main_content"] = "office/dashboard/project_overview";
        echo view("template/index", $data);
    }
    public function project_listing($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Project by District ";
        $data["main_title"] = "Dashboard";
        $data["district_id"] = $id;
        $data["js_file"] = "office/dashboard/project_list_js";
        $data["main_content"] = "office/dashboard/project_list";
        echo view("template/index", $data);
    }
    public function county_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "County Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/county_performance_js";
        $data["main_content"] = "office/dashboard/county_performance";
        echo view("template/index", $data);
    }
    public function components_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Components Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/components_performance_js";
        $data["main_content"] = "office/dashboard/components_performance";
        echo view("template/index", $data);
    }
    public function thematic_area_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Thematic Area Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/thematic_area_performance_js";
        $data["main_content"] = "office/dashboard/thematic_area_performance";
        echo view("template/index", $data);
    }
    public function ip_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Implementing Partner Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/ip_performance_js";
        $data["main_content"] = "office/dashboard/ip_performance";
        echo view("template/index", $data);
    }
    public function cases_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Cases Database Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/cases_performance_js";
        $data["main_content"] = "office/dashboard/cases_performance";
        echo view("template/index", $data);
    }
    public function beneficiaries()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Beneficiaries Dashboard ";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/beneficiaries_js";
        $data["main_content"] = "office/dashboard/beneficiaries";
        echo view("template/index", $data);
    }
    public function budget_performance()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Budget Performance Dashboard";
        $data["main_title"] = "Dashboard";
        $data["js_file"] = "office/dashboard/budget_performance_js";
        $data["main_content"] = "office/dashboard/budget_performance";
        echo view("template/index", $data);
    }
}

?>