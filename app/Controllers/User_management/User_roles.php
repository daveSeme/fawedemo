<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\user_management;

class user_roles extends \App\Controllers\BaseController
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
            check_permision("user_roles", "1", 1);
        } else {
            check_permision("user_roles", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Manage User Roles";
        $data["main_title"] = "  User Management  ";
        $User_roles_Model = new \App\Models\user_management\User_roles_Model();
        $data["data"] = $User_roles_Model->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/user_management/user_roles/js_file";
        $data["main_content"] = "office/user_management/user_roles/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add User Roles";
        $data["main_title"] = "User Management";
        if ($this->session->get("user_type") == "admin") {
            check_permision("user_roles", "2", 1);
        } else {
            check_permision("user_roles", "2", 0);
        }
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["user_type" => ["label" => "User Type", "rules" => "required|trim"], "name" => ["label" => "Group Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["user_type" => $this->request->getVar("user_type"), "title" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $User_roles_Model = new \App\Models\user_management\User_roles_Model();
                $status = $User_roles_Model->insert($data_post);
                trail($status, "insert", $data["title"], $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("user_management/user_roles/add"));
                }
                return $this->response->redirect(site_url("user_management/user_roles"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/user_management/user_roles/js_file";
        $data["main_content"] = "office/user_management/user_roles/add";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("user_roles", "3", 1);
        } else {
            check_permision("user_roles", "3", 0);
        }
        $User_roles_Model = new \App\Models\user_management\User_roles_Model();
        $where = $id;
        $previous_values = get_by_id("id", $id, "ctbl_usergroups");
        $status = $User_roles_Model->where("id", $id)->delete($id);
        trail($status, "delete", "User Roles", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("user_management/user_roles"));
    }
    public function edit($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("user_roles", "4", 1);
        } else {
            check_permision("user_roles", "4", 0);
        }
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Update User Roles";
        $data["main_title"] = "  User Management  ";
        $model = new \App\Models\user_management\User_roles_Model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["user_type" => ["label" => "User Type", "rules" => "required|trim"], "name" => ["label" => "Group Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $data_post = ["user_type" => $this->request->getVar("user_type"), "title" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "ctbl_usergroups");
                $User_roles_Model = new \App\Models\user_management\User_roles_Model();
                $User_roles_Model->update($id, $data_post);
                trail(1, "update", "User Roles", $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("user_management/user_roles"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/user_management/user_roles/add_file";
        $data["main_content"] = "office/user_management/user_roles/edit";
        echo view("template/index", $data);
    }
}

?>