<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\user_management;

class Users extends \App\Controllers\BaseController
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
        $this->configTankAuth = config("Tank_auth");
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        if ($this->session->get("user_type") == "admin") {
            check_permision("users", "1", 1);
        } else {
            check_permision("users", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Manage Users";
        $data["main_title"] = "User Management";
        $User_Model = new \App\Models\user_management\User_Model();
        $data["data"] = $User_Model->where("usertype!=\"deprecated\"")->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/user_management/users/js_file";
        $data["main_content"] = "office/user_management/users/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add New Manage Users";
        $data["main_title"] = "User Management";
        if ($this->session->get("user_type") == "admin") {
            check_permision("users", "2", 1);
        } else {
            check_permision("users", "2", 0);
        }
        $User_roles_Model = new \App\Models\user_management\User_roles_Model();
        $data["usergroup"] = $User_roles_Model->orderBy("title", "asc")->findAll();
        $StructureModel = new \App\Models\master\Implementing_partner_Model();
        $data["ministry"] = $StructureModel->orderBy("name", "asc")->findAll();
        if ($this->request->getMethod() === "post") {
            if ($this->request->getVar("user_type") == "Viewer" || $this->request->getVar("user_type") == "CREAW User") {
                $this->validate->setRules(["name" => ["label" => "Name [Given Name + Surname]", "rules" => "required|trim"], "username" => ["label" => "User ID", "rules" => "required|trim|is_unique[ctbl_users.username]"], "password" => ["label" => "Password", "rules" => "required|trim|min_length[" . $this->configTankAuth->password_min_length . "]|max_length[" . $this->configTankAuth->password_max_length . "]|alpha_dash"], "password2" => ["label" => "Confirm Password", "rules" => "required|trim|matches[password]"], "email" => ["label" => "Email Address", "rules" => "required|trim|valid_email|is_unique[ctbl_users.email]"], "contact_number" => ["label" => "Contact Number", "rules" => "trim"], "user_type" => ["label" => "User Type", "rules" => "required|trim"], "user_group_id" => ["label" => "User Group", "rules" => "required|trim"]]);
            } else {
                $this->validate->setRules(["name" => ["label" => "Name [Given Name + Surname]", "rules" => "required|trim"], "username" => ["label" => "User ID", "rules" => "required|trim|is_unique[ctbl_users.username]"], "password" => ["label" => "Password", "rules" => "required|trim|min_length[" . $this->configTankAuth->password_min_length . "]|max_length[" . $this->configTankAuth->password_max_length . "]|alpha_dash"], "password2" => ["label" => "Confirm Password", "rules" => "required|trim|matches[password]"], "email" => ["label" => "Email Address", "rules" => "required|trim|valid_email|is_unique[ctbl_users.email]"], "contact_number" => ["label" => "Contact Number", "rules" => "trim"], "user_type" => ["label" => "User Type", "rules" => "required|trim"], "base_id" => ["label" => "Implementing Partner ", "rules" => "required|trim"], "user_group_id" => ["label" => "User Group", "rules" => "required|trim"]]);
            }
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $hashed_password = password_hash($this->request->getVar("password"), PASSWORD_BCRYPT);
                $data_post = ["base_id" => $this->request->getVar("base_id"), "name" => $this->request->getVar("name"), "username" => $this->request->getVar("username"), "password" => $hashed_password, "email" => $this->request->getVar("email"), "contact_number" => $this->request->getVar("contact_number"), "user_type" => $this->request->getVar("user_type"), "user_group_id" => $this->request->getVar("user_group_id"), "banned" => 0, "activated" => 1, "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $User_Model = new \App\Models\user_management\User_Model();
                $status = $User_Model->insert($data_post);
                trail($status, "insert", $data["title"], $data_post);
                $data["site_name"] = $this->configTankAuth->website_name;
                $data["subject"] = "User Registration";
                $data["email"] = $this->request->getVar("email");
                $data["user_id"] = $this->request->getVar("username");
                $data["password"] = $this->request->getVar("password");
                $data["user_type"] = $this->request->getVar("user_type");
                $user_group_id = get_by_id("id", $this->request->getVar("user_group_id"), "ctbl_usergroups");
                $data["rules"] = $user_group_id["title"];
                $email = $this->request->getVar("email");
                $this->_send_email("welcome", $email, $data, $data["subject"]);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("user_management/users/add"));
                }
                return $this->response->redirect(site_url("user_management/users"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/user_management/users/js_file";
        $data["main_content"] = "office/user_management/users/add";
        echo view("template/index", $data);
    }
    public function edit($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit-Manage Users";
        $data["main_title"] = "  User Management  ";
        if ($this->session->get("user_type") == "admin") {
            check_permision("users", "4", 1);
        } else {
            check_permision("users", "4", 0);
        }
        $model = new \App\Models\user_management\User_Model();
        $data["stdata"] = $model->where("id", $id)->first();
        $data["id"] = $id;
        $User_roles_Model = new \App\Models\user_management\User_roles_Model();
        $data["usergroup"] = $User_roles_Model->orderBy("title", "asc")->findAll();
        $StructureModel = new \App\Models\master\Implementing_partner_Model();
        $data["ministry"] = $StructureModel->orderBy("name", "asc")->findAll();
        if ($this->request->getMethod() === "post") {
            if ($this->request->getVar("user_type") == "Viewer" || $this->request->getVar("user_type") == "CREAW User") {
                $this->validate->setRules(["name" => ["label" => "Name [Given Name + Surname]", "rules" => "required|trim"], "email" => ["label" => "Email Address", "rules" => "required|trim|valid_email|is_unique[ctbl_users.email,id," . $id . "]"], "contact_number" => ["label" => "Contact Number", "rules" => "trim"], "user_type" => ["label" => "User Type", "rules" => "required|trim"], "user_group_id" => ["label" => "User Group", "rules" => "required|trim"]]);
            } else {
                $this->validate->setRules(["name" => ["label" => "Name [Given Name + Surname]", "rules" => "required|trim"], "email" => ["label" => "Email Address", "rules" => "required|trim|valid_email|is_unique[ctbl_users.email,id," . $id . "]"], "contact_number" => ["label" => "Contact Number", "rules" => "trim"], "user_type" => ["label" => "User Type", "rules" => "required|trim"], "base_id" => ["label" => "Implementing Partner ", "rules" => "required|trim"], "user_group_id" => ["label" => "User Group", "rules" => "required|trim"]]);
            }
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $data_post = ["base_id" => $this->request->getVar("base_id"), "name" => $this->request->getVar("name"), "email" => $this->request->getVar("email"), "contact_number" => $this->request->getVar("contact_number"), "user_type" => $this->request->getVar("user_type"), "user_group_id" => $this->request->getVar("user_group_id"), "updateby" => $data["user_id"], "updatetime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "ctbl_users");
                $User_Model = new \App\Models\user_management\User_Model();
                $User_Model->update($id, $data_post);
                trail(1, "update", "User", $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("user_management/users"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/user_management/users/js_file";
        $data["main_content"] = "office/user_management/users/edit";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("users", "3", 1);
        } else {
            check_permision("users", "3", 0);
        }
        $User_Model = new \App\Models\user_management\User_Model();
        $where = $id;
        $previous_values = get_by_id("id", $id, "ctbl_users");
        $status = $User_Model->where("id", $id)->delete($id);
        trail($status, "delete", "User", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("user_management/users"));
    }
    public function get_dropdown($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("user_type")) {
            $user_type = $this->request->getVar("user_type");
            if ($user_type == "Implementing Partner") {
                echo "<option value=\"\">Select Implementing Partner </option>";
                $query = $db->query("select * from implementing_partner   ");
                $results = $query->getResultArray();
                foreach ($results as $row) {
                    echo "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
                }
            } else {
                if ($user_type != "District") {
                    if ($user_type == "Region") {
                    }
                }
            }
        }
    }
    public function get_user_group($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("user_type")) {
            $user_type = $this->request->getVar("user_type");
            echo "<option value=\"\">Select User Group </option>";
            $query = $db->query("select * from ctbl_usergroups Where user_type=\"" . $user_type . "\"  ");
            $results = $query->getResultArray();
            foreach ($results as $row) {
                echo "<option value=\"" . $row["id"] . "\">" . $row["title"] . "</option>";
            }
        }
    }
    public function get_year($id = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("strategic_plan_id")) {
            echo $strategic_plan_id = $this->request->getVar("strategic_plan_id");
            echo "<option value=\"\">Select Year </option>";
            $query = $db->query("select * from district_strategic_plan_workflow WHERE id=\"" . $strategic_plan_id . "\"");
            $results = $query->getResultArray();
            foreach ($results as $row) {
                $startdate = date("Y", strtotime($row["startdate"]));
                $enddate = date("Y", strtotime($row["enddate"]));
                $diff = $enddate - $startdate + 1;
            }
            for ($i = $startdate; $i <= $enddate; $i++) {
                echo "<option value=\"" . $i . "\">" . $i . "</option>";
            }
        }
    }
    public function _send_email($type, $email, &$data)
    {
        $this->email = \Config\Services::email();
        $this->email->setFrom($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setReplyTo($this->configTankAuth->webmaster_email, $this->configTankAuth->website_name);
        $this->email->setTo($email);
        $this->email->setSubject(sprintf(lang("tank_auth.auth_subject_" . $type), $this->configTankAuth->website_name));
        $this->email->setMessage(view("email/" . $type . "-html", $data));
        $this->email->setAltMessage(view("email/" . $type . "-txt", $data));
        $this->email->send();
    }
}

?>