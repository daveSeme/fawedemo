<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Controllers;

class Sendmail extends \CodeIgniter\Controller
{
    public function index()
    {
        $email = \Config\Services::email();
        $email->setTo("nicemukesh.online@gmail.com");
        $email->setFrom("nicemukesh.online@gmail.com", "Confirm Registration");
        $email->setSubject("Testing");
        $email->setMessage("Hello Testing");
        if ($email->send()) {
            echo "Email successfully sent";
        } else {
            $data = $email->printDebugger(["headers"]);
            print_r($data);
        }
    }
    public function sendMail()
    {
        $to = $this->request->getVar("mailTo");
        $subject = $this->request->getVar("subject");
        $message = $this->request->getVar("message");
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom("johndoe@gmail.com", "Confirm Registration");
        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) {
            echo "Email successfully sent";
        } else {
            $data = $email->printDebugger(["headers"]);
            print_r($data);
        }
    }
}

?>