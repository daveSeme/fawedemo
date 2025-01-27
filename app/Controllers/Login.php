<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers;

class Login extends BaseController
{
    protected $configTankAuth = NULL;
    protected $tank_auth = NULL;
    protected $session = NULL;
    protected $request = NULL;
    protected $db = NULL;
    public function __construct()
    {
        $this->tank_auth = new \App\Libraries\Tank_auth();
        $this->validation = \Config\Services::validation();
        helper(["form", "url"]);
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->request = \Config\Services::request();
    }
    public function index()
    {
        if (!$this->tank_auth->is_logged_in()) {
            if (isset($_SESSION["login_return_url"])) {
                header("location:" . $_SESSION["login_return_url"]);
                exit;
            }
            return redirect()->to(base_url() . "/auth/login/");
        }
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["office"] = $this->tank_auth->get_office();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $user_type = $this->session->get("user_type");
        $user_group_id = $this->session->get("user_group_id");
        $data["logged"] = $this->tank_auth->get_logged();
        $query = $this->db->query("SELECT check_password_update FROM ctbl_users where id=\"" . $data["user_id"] . "\"  ");
        $row = $query->getRowArray();
        if ($row["check_password_update"] != 1) {
            return redirect()->to("home");
        }
        return redirect()->to("home");
    }
}

?>