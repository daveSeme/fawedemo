<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\master;

class Currency extends \App\Controllers\BaseController
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
            check_permision("currency", "1", 1);
        } else {
            check_permision("currency", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Currency";
        $data["main_title"] = "System Configuration ";
        $Model = new \App\Models\master\Currency_Model();
        $data["data"] = $Model->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/master/currency/js_file";
        $data["main_content"] = "office/master/currency/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Currency";
        $data["main_title"] = "System Configuration";
        if ($this->session->get("user_type") == "admin") {
            check_permision("currency", "2", 1);
        } else {
            check_permision("currency", "2", 0);
        }
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Unit Name", "rules" => "required|trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["name" => $this->request->getVar("name"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $Model = new \App\Models\master\Currency_Model();
                $status = $Model->insert($data_post);
                trail($status, "insert", "Unit", $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("master/currency/add"));
                }
                return $this->response->redirect(site_url("master/currency"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/master/currency/add_file";
        $data["main_content"] = "office/master/currency/add";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("currency", "3", 1);
        } else {
            check_permision("currency", "3", 0);
        }
        $Model = new \App\Models\master\Currency_Model();
        $where = $id;
        $previous_values = get_by_id("id", $id, "mas_currency");
        $status = $Model->where("id", $id)->delete($id);
        trail($status, "delete", "Unit", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("master/currency"));
    }
    public function edit($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Currency";
        $data["main_title"] = "System Configuration";
        if ($this->session->get("user_type") == "admin") {
            check_permision("currency", "4", 1);
        } else {
            check_permision("currency", "4", 0);
        }
        $model = new \App\Models\master\Currency_Model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => "required|trim"]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "mas_currency");
                $Model = new \App\Models\master\Currency_Model();
                $Model->update($id, $data_post);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("master/currency"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/master/currency/add_file";
        $data["main_content"] = "office/master/currency/edit";
        echo view("template/index", $data);
    }
}

?>