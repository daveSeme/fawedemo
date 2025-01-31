<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers\master;

class Field_office extends \App\Controllers\BaseController
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
            check_permision("field_office", "1", 1);
        } else {
            check_permision("field_office", "1", 0);
        }
    }
    public function index()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Field Office";
        $data["main_title"] = "System Configuration";
        $data["base_id"] = $this->session->get("office");
        $Model = new \App\Models\master\Field_office_Model();
        $data["data"] = $Model->orderBy("id", "DESC")->findAll();
        $data["js_file"] = "office/master/field_office/js_file";
        $data["main_content"] = "office/master/field_office/list";
        echo view("template/index", $data);
    }
    public function add()
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Add Field Office";
        $data["main_title"] = "System Configuration";
        $data["base_id"] = $this->session->get("office");
        if ($this->session->get("user_type") == "admin") {
            check_permision("field_office", "1", 1);
        } else {
            check_permision("field_office", "1", 0);
        }
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Field Office Name", "rules" => "required|trim"], "contact_person" => ["label" => "Contact Person", "rules" => "trim"], "contact_email" => ["label" => "Contact Email", "rules" => "trim"], "phone" => ["label" => "Phone No.", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $data_post = ["name" => $this->request->getVar("name"), "contact_person" => $this->request->getVar("contact_person"), "contact_email" => $this->request->getVar("contact_email"), "phone" => $this->request->getVar("phone"), "createdby" => $data["user_id"], "createtime" => date("Y-m-d H:i:s")];
                $Model = new \App\Models\master\Field_office_Model();
                $status = $Model->insert($data_post);
                trail($status, "insert", "field_office", $data_post);
                $this->session->setFlashdata("feedback", "Record created successfully.");
                if ($this->request->getVar("action") == "save") {
                    return $this->response->redirect(site_url("master/field_office/add"));
                }
                return $this->response->redirect(site_url("master/field_office"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/master/field_office/add_js";
        $data["main_content"] = "office/master/field_office/add";
        echo view("template/index", $data);
    }
    public function delete($id = NULL)
    {
        if ($this->session->get("user_type") == "admin") {
            check_permision("field_office", "1", 1);
        } else {
            check_permision("field_office", "1", 0);
        }
        $Model = new \App\Models\master\Field_office_Model();
        $where = $id;
        $previous_values = get_by_id("id", $id, "field_office");
        $status = $Model->where("id", $id)->delete($id);
        trail($status, "delete", "field_office", $where, $previous_values);
        $this->session->setFlashdata("feedback", "Record deleted successfully.");
        return $this->response->redirect(site_url("master/field_office"));
    }
    public function edit($id = NULL)
    {
        $data["user_id"] = $this->tank_auth->get_user_id();
        $data["username"] = $this->tank_auth->get_username();
        $data["user_level"] = $this->tank_auth->get_user_level();
        $data["title"] = "Edit Field Office";
        $data["main_title"] = "System Configuration";
        $data["base_id"] = $this->session->get("office");
        $model = new \App\Models\master\Field_office_Model();
        $data["stdata"] = $model->where("id", $id)->first();
        if ($this->session->get("user_type") == "admin") {
            check_permision("field_office", "1", 1);
        } else {
            check_permision("field_office", "1", 0);
        }
        if ($this->request->getMethod() === "post") {
            $this->validate->setRules(["name" => ["label" => "Field Office Name", "rules" => "required|trim"], "contact_person" => ["label" => "Contact Person", "rules" => "trim"], "contact_email" => ["label" => "Contact Email", "rules" => "trim"], "phone" => ["label" => "Phone No.", "rules" => "trim"]]);
            $data["errors"] = [];
            if ($this->validate->withRequest($this->request)->run()) {
                $id = $this->request->getVar("id");
                $data_post = ["name" => $this->request->getVar("name"), "contact_person" => $this->request->getVar("contact_person"), "contact_email" => $this->request->getVar("contact_email"), "phone" => $this->request->getVar("phone"), "updatedby" => $data["user_id"], "updatedtime" => date("Y-m-d H:i:s")];
                $previous_values = get_by_id("id", $id, "field_office");
                $Model = new \App\Models\master\Field_office_Model();
                $Model->update($id, $data_post);
                trail(1, "update", $data["title"], $data_post, $previous_values);
                $this->session->setFlashdata("feedback", "Record updated successfully.");
                return $this->response->redirect(site_url("master/field_office"));
            }
            $data["validator"] = $this->validator;
        }
        $data["js_file"] = "office/master/field_office/add_js";
        $data["main_content"] = "office/master/field_office/edit";
        echo view("template/index", $data);
    }
}

?>