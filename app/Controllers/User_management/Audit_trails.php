<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\user_management;

class audit_trails extends \App\Controllers\BaseController
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
            check_permision("audit_trail", "1", 1);
        } else {
            check_permision("audit_trail", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "View System Audit Trail";
        $data["main_title"] = "Access System Reports";
        $data["user_type"] = "";
        $data["user_type"] = "";
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["user_type" => ["label" => "User Type", "rules" => "required|trim"], "user" => ["label" => "User", "rules" => "required|trim"], "month" => ["label" => "Month", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data["user_type"] = $this->request->getVar("user_type");
                $data["user_id"] = $this->request->getVar("user");
                $data["month"] = $this->request->getVar("month");
            }
        }
        $data["js_file"] = "office/user_management/audit_trails/js_file";
        $data["main_content"] = "office/user_management/audit_trails/list";
        echo view("template/index", $data);
    }
    public function get_users($user_type = NULL)
    {
        $db = \Config\Database::connect();
        if ($this->request->getVar("user_type")) {
            $user_type = $this->request->getVar("user_type");
            echo "<label class=\"form-label \" for=\"single-default\">" . $user_type . " Users</label>";
            echo "<select name=\"user\" id=\"user\" class=\"custom-select\" required><option value=\"\">Select User </option>";
            $query = $db->query("select * from ctbl_users where user_type=\"" . $user_type . "\"");
            $results = $query->getResultArray();
            foreach ($results as $row) {
                echo "<option value=\"" . $row["id"] . "\">" . $row["name"] . "</option>";
            }
        }
        echo "Error";
    }
}

?>