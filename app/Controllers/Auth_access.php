<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers;

class Auth_access extends BaseController
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
        $query_users = $this->db->query("select user_type, 0 as Office_id from ctbl_users where id=" . $data["user_id"]);
        $row_a1 = $query_users->getRowArray();
        $data["base_id"] = $row_a1["Office_id"];
        $data["title"] = "FAWE M&E SYSTEM";
        $data["main_title"] = "Home";
        $data["js_file"] = "office/auth_access/js_file";
        $data["main_content"] = "office/auth_access/view";
        echo view("template/index", $data);
    }
}

?>