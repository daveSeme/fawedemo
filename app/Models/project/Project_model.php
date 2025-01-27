<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

namespace App\Models\project;

class Project_model extends \CodeIgniter\Model
{
    protected $table = "project";
    protected $primaryKey = "id";
    protected $allowedFields = ["base_id", "project_code", "name", "start_date", "end_date", "duration", "funding_partner", "project_budget", "budget_currency", "reporting_schedule", "rs_monthly_jan", "rs_monthly_jan_date", "rs_monthly_feb", "rs_monthly_feb_date", "rs_monthly_mar", "rs_monthly_mar_date", "rs_monthly_apr", "rs_monthly_apr_date", "rs_monthly_may", "rs_monthly_may_date", "rs_monthly_june", "rs_monthly_june_date", "rs_monthly_july", "rs_monthly_july_date", "rs_monthly_aug", "rs_monthly_aug_date", "rs_monthly_sep", "rs_monthly_sep_date", "rs_monthly_oct", "rs_monthly_oct_date", "rs_monthly_nov", "rs_monthly_nov_date", "rs_monthly_dec", "rs_monthly_dec_date", "rs_quarterly_q1_month", "rs_quarterly_q1_month_date", "rs_quarterly_q2_month", "rs_quarterly_q2_month_date", "rs_quarterly_q3_month", "rs_quarterly_q3_month_date", "rs_quarterly_q4_month", "rs_quarterly_q4_month_date", "rs_biannual1_month", "rs_biannual1_month_date", "rs_biannual2_month", "rs_biannual2_month_date", "rs_annual_month", "rs_annual_month_date", "person_responsible", "implementing_partner", "project_status", "report_submission_date", "createdby", "updatedby", "createdtime", "updatedtime", "flag"];
}

?>