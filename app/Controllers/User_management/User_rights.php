<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\user_management;

class user_rights extends \App\Controllers\BaseController
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
        if ($this->session->get("user_type") == "admin") {
            check_permision("user_rights", "1", 1);
        } else {
            check_permision("user_rights", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Manage User Rights";
        $data["main_title"] = "  User Management  ";
        $User_roles_Model = new \App\Models\user_management\User_roles_Model();
        $data["data"] = $User_roles_Model->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/user_management/user_rights/js_file";
        $data["main_content"] = "office/user_management/user_rights/list";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("user_rights", "4", 1);
        } else {
            check_permision("user_rights", "4", 0);
        }
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Update User Roles";
        $data["main_title"] = "  User Management  ";
        $model = new \App\Models\user_management\User_roles_Model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["id_data"] = $id;
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["field_action" => "required"]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $query_con = $this->db->query("delete FROM ctbl_sub_viewlevel  WHERE group_id=\"" . $id . "\" ");
                $model = $this->request->getVar("field_action");
                foreach ($model as $key => $value) {
                    $data_post = ["title" => $key, "group_id" => $id, "rules" => implode(", ", $model[$key])];
                    $this->db->table("ctbl_sub_viewlevel")->insert($data_post);
                }
                $previous_values = get_by_id("group_id", $id, "ctbl_sub_viewlevel");
                trail(1, "update", "User Right", $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Permission created successfully.");
                return $this->response->redirect(site_url("user_management/user_rights"));
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/user_management/user_rights/add_file";
        $data["main_content"] = "office/user_management/user_rights/edit";
        echo view("template/index", $data);
    }
}

?>