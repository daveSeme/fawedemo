<?php
namespace App\Models\knowledge_center;

class Questionnaires_model extends \CodeIgniter\Model
{
    protected $table = "mas_questionnaires";
    protected $primaryKey = "id";
    protected $allowedFields = ["description", "status", "createdby", "createdtime", "startdate", "enddate", "updatedby", "updatedtime"];
}

class Questions_model extends \CodeIgniter\Model
{
    protected $table = "mas_questions";
    protected $primaryKey = "id";
    protected $allowedFields = ["questionnaire_id", "type", "description", "createdby", "createdtime", "updatedby", "updatedtime"];
}

class Question_responses_model extends \CodeIgniter\Model
{
    protected $table = "mas_question_responses";
    protected $primaryKey = "id";
    protected $allowedFields = ["question_id", "text_response", "numeric_response", "createdby", "createdtime"];
}
?>