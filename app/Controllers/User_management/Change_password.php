<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\user_management;

class change_password extends \App\Controllers\BaseController
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
        $data["title"] = "Change your password";
        $data["main_title"] = "  User Management  ";
        $data["errors"] = [];
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["old_password" => ["label" => "Old Password", "rules" => "required"], "new_password" => ["label" => "New Password", "rules" => "required|min_length[" . $this->configTankAuth->password_min_length . "]|max_length[" . $this->configTankAuth->password_max_length . "]|alpha_dash"], "confirm_new_password" => ["label" => "Confirm new Password", "rules" => "required|matches[new_password]"]]);
            if ($this->validate->withRequest($this->request)->run()) {
                $previous_values = $this->request->getVar("old_password");
                if ($passwordss = $this->tank_auth->change_password($this->request->getVar("old_password"), $this->request->getVar("new_password"))) {
                    $data_post = ["New Password" => $passwordss];
                    trail(1, "update", "Change Password", $data_post, $previous_values);
                    $this->session->setFlashdata("flashSuccess", lang("tank_auth.auth_message_new_password_sent"));
                    header("Location:" . base_url() . "/auth/logout");
                    exit;
                }
                $errors = $this->tank_auth->get_error_message();
                foreach ($errors as $k => $v) {
                    $data["errors"][$k] = lang($v);
                }
                $data["validator"] = $this->validator;
            } else {
                $data["validator"] = $this->validator;
            }
        }
        $data["js_file"] = "office/user_management/change_password/js_file";
        $data["main_content"] = "office/user_management/change_password/list";
        echo view("template/index", $data);
    }
}

?>