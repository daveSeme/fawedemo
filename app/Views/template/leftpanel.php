<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "\r\n<aside class=\"page-sidebar list-filter-active\">\r\n  <div class=\"page-logo align-items-center justify-content-center text-center\"> \r\n    <!--<a href=\"#\" class=\"page-logo-link press-scale-down d-flex align-items-center position-relative\" data-toggle=\"modal\" data-target=\"#modal-shortcut\">--> \r\n    <img src=\"";
echo base_url();
echo "/public/img/logo.png\" alt=\"M&E FAWE\" aria-roledescription=\"logo\"> \r\n    <!--<span class=\"page-logo-text mr-1\">M&E PMIS</span>\r\n                <span class=\"position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2\"></span>\r\n                <i class=\"fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300\"></i>\r\n               </a>--> \r\n  </div>\r\n  <!-- BEGIN PRIMARY NAVIGATION -->\r\n  <nav id=\"js-primary-nav\" class=\"primary-nav\" role=\"navigation\">\r\n    <div class=\"nav-filter\">\r\n      <div class=\"position-relative\">\r\n        <input type=\"text\" id=\"nav_filter_input\" placeholder=\"Filter menu\" class=\"form-control\" tabindex=\"0\">\r\n        <!--<a href=\"#\" onclick=\"return false;\" class=\"btn-primary btn-search-close js-waves-off\" data-action=\"toggle\" data-class=\"list-filter-active\" data-target=\".page-sidebar\">\r\n                            <i class=\"fal fa-chevron-up\"></i>--> \r\n        </a> </div>\r\n    </div>\r\n    <ul id=\"js-nav-menu\" class=\"nav-menu\">\r\n      <li  class=\"";
if (getSegment(1) == "home") {
    echo "active open'";
}
echo "\"> <a href=\"";
echo base_url() . "/home";
echo "\" title=\"Home\" data-filter-tags=\"home\"> <i class=\"fal fa-home\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.home\">Home </span></a> </li>\r\n      ";
$this->session = Config\Services::session();
if ($this->session->get("user_type") == "admin") {
    echo "      ";
    $counties = explode(",", $this->session->get("counties"));
    $unit = explode(",", $this->session->get("unit"));
    $dimensions = explode(",", $this->session->get("dimensions"));
    $implementing_partner = explode(",", $this->session->get("implementing_partner"));
    $subexecuting_partner = explode(",", $this->session->get("subexecuting_partner"));
    $funding_partner = explode(",", $this->session->get("funding_partner"));
    $field_office = explode(",", $this->session->get("field_office"));
    $currency = explode(",", $this->session->get("currency"));
    if (in_array("1", $counties) || in_array("1", $unit) || in_array("1", $dimensions) || in_array("1", $implementing_partner) || in_array("1", $subexecuting_partner) || in_array("1", $funding_partner) || in_array("1", $field_office) || in_array("1", $currency) || $this->session->get("user_type") == "admin") {
        echo "                                \r\n                                \r\n      <li class=\"";
        if (getSegment(1) == "master") {
            echo "active open'";
        }
        echo "\"> \r\n      \t\t<a href=\"#\" title=\"System Configuration\" data-filter-tags=\"config\"> <i class=\"fal fa-tasks\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.planning\">System Configuration </span> </a>\r\n        \r\n        <ul>\r\n        \r\n          ";
        if (in_array("1", $counties) || $this->session->get("user_type") == "admin") {
            echo "          <li  class=\"";
            if (getSegment(2) == "counties") {
                echo "active open'";
            }
            echo "\"> <a href=\"";
            echo base_url() . "/master/counties";
            echo "\" title=\"Counties\" data-filter-tags=\"config counties\"> <span class=\"nav-link-text\" data-i18n=\"nav.config_counties\">Counties </span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          ";
        if (in_array("1", $unit) || $this->session->get("user_type") == "admin") {
            echo "          <li  class=\"";
            if (getSegment(2) == "indicator_unit") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"";
            echo base_url() . "/master/indicator_unit";
            echo "\" title=\"Units\" data-filter-tags=\"units\"> <span class=\"nav-link-text\" data-i18n=\"nav.units\">Units</span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          ";
        if (in_array("1", $dimensions) || $this->session->get("user_type") == "admin") {
            echo "          <li  class=\"";
            if (getSegment(2) == "dimensions") {
                echo "active open'";
            }
            echo "\"> \r\n          \t<a href=\"";
            echo base_url() . "/master/dimensions";
            echo "\" title=\"Dimensions\" data-filter-tags=\"dimensions\"> <span class=\"nav-link-text\" data-i18n=\"nav.dimensions\">Dimensions</span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          ";
        if (in_array("1", $funding_partner) || $this->session->get("user_type") == "admin") {
            echo "          <li class=\"";
            if (getSegment(2) == "funding_partner") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"";
            echo base_url() . "/master/funding_partner";
            echo "\" title=\"Funding Partner\" data-filter-tags=\"funding partner\"> <span class=\"nav-link-text\" data-i18n=\"nav.funding_partner\">Funding Partner</span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          ";
        if (in_array("1", $implementing_partner) || $this->session->get("user_type") == "admin") {
            echo "          <li class=\"";
            if (getSegment(2) == "implementing_partner") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"";
            echo base_url() . "/master/implementing_partner";
            echo "\" title=\"Implementing Partner\" data-filter-tags=\"implementing partner\"> <span class=\"nav-link-text\" data-i18n=\"nav.implementing_partner\">Implementing Partner</span> </a>\r\n           </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          ";
        if (in_array("1", $subexecuting_partner) || $this->session->get("user_type") == "admin") {
            echo "          <li class=\"";
            if (getSegment(2) == "subexecuting_partner") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"";
            echo base_url() . "/master/subexecuting_partner";
            echo "\" title=\"SubExecuting Partner\" data-filter-tags=\"subexecuting partner\"> <span class=\"nav-link-text\" data-i18n=\"nav.subexecuting_partner\">SubExecuting Partner</span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          ";
        if (in_array("1", $field_office) || $this->session->get("user_type") == "admin") {
            echo "          <li class=\"";
            if (getSegment(2) == "field_office") {
                echo "active open'";
            }
            echo "\"> <a href=\"";
            echo base_url() . "/master/field_office";
            echo "\" title=\"Field Office\" data-filter-tags=\"field office\"> <span class=\"nav-link-text\" data-i18n=\"nav.field_office\">Field Office</span> </a> </li>\r\n          ";
        }
        echo "          \r\n         \r\n          ";
        if (in_array("1", $currency) || $this->session->get("user_type") == "admin") {
            echo "          <li class=\"";
            if (getSegment(2) == "currency") {
                echo "active open'";
            }
            echo "\"> \r\n          \t<a href=\"";
            echo base_url() . "/master/currency";
            echo "\" title=\"Currency\" data-filter-tags=\"currency\"> <span class=\"nav-link-text\" data-i18n=\"nav.currency\">Currency</span> </a> </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n        </ul>\r\n      </li>\r\n      ";
    }
    echo "      \r\n      \r\n      ";
}
if ($this->session->get("user_type") == "FAWE User" || $this->session->get("user_type") == "Implementing Partner") {
    echo "      <li  class=\"";
    if (getSegment(1) == "dashboard") {
        echo "active open'";
    }
    echo "\"> <a href=\"";
    echo base_url() . "/dashboard";
    echo "\" title=\"Dashboard\" data-filter-tags=\"dashboard\"> <i class=\"fal fa-tachometer\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.dashboard\">Dashboard</span> </a> </li>\r\n      ";
    $strategic_plans = explode(",", $this->session->get("strategic_plans"));
    $merl_framework = explode(",", $this->session->get("merl_framework"));
    $org_quarterly_narrative_report = explode(",", $this->session->get("org_quarterly_narrative_report"));
    $org_quarterly_indicator_tracking_report = explode(",", $this->session->get("org_quarterly_indicator_tracking_report"));
    $org_annual_narrative_report = explode(",", $this->session->get("org_annual_narrative_report"));
    $org_annual_indicator_tracking_report = explode(",", $this->session->get("org_annual_indicator_tracking_report"));
    $monitoring_visit_report = explode(",", $this->session->get("monitoring_visit_report"));
    $cases_database = explode(",", $this->session->get("cases_database"));
    $case_types = explode(",", $this->session->get("case_types"));
    if (in_array("1", $strategic_plans) || in_array("1", $merl_framework) || in_array("1", $org_quarterly_narrative_report) || in_array("1", $org_quarterly_indicator_tracking_report) || in_array("1", $org_annual_narrative_report) || in_array("1", $org_annual_indicator_tracking_report) || in_array("1", $monitoring_visit_report) || in_array("1", $cases_database)) {
        echo "                                    \r\n                                    \r\n      <li class=\"";
        if (getSegment(1) == "planning" && getSegment(2) != "project" && getSegment(2) != "project_me_plan" && getSegment(2) != "project_annual_plan" || getSegment(3) == "org_quarterly_narrative_report" || getSegment(3) == "org_quarterly_indicator_tracking_report" || getSegment(3) == "org_annual_narrative_report" || getSegment(3) == "org_annual_indicator_tracking_report" || getSegment(3) == "cases_database" || getSegment(3) == "monitoring_visit_report") {
            echo "active open'";
        }
        echo "\"> \r\n      \r\n       <a href=\"#\" title=\"Planning\" data-filter-tags=\"planning\"> <i class=\"fal fa-tasks\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.planning\">Organizational Data</span> </a>\r\n       \r\n      \r\n        <ul>\r\n          ";
        if (in_array("1", $strategic_plans) || in_array("1", $merl_framework)) {
            echo "          \r\n          <li  class=\"";
            if (getSegment(2) == "strategic_plans" || getSegment(2) == "merl_framework") {
                echo "active open'";
            }
            echo "\"> <a href=\"#\" title=\"Strategic Plans\" data-filter-tags=\"planning Strategic Plans\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_strategic_plans\">Planning</span> </a>\r\n            <ul>\r\n             \r\n              ";
            if (in_array("1", $strategic_plans)) {
                echo "              <li class=\"";
                if (getSegment(2) == "strategic_plans") {
                    echo "active open'";
                }
                echo "\"> <a href=\"";
                echo base_url() . "/planning/strategic_plans";
                echo "\" title=\"Strategic Plans\" data-filter-tags=\"planning strategic plans\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_strategic_plans\">Strategic Plans </span> </a> </li>\r\n              ";
            }
            echo "              \r\n              ";
            if (in_array("1", $strategic_plans)) {
                echo "              <li  class=\"";
                if (getSegment(2) == "merl_framework") {
                    echo "active open'";
                }
                echo "\"> <a href=\"";
                echo base_url() . "/planning/merl_framework";
                echo "\" title=\"Organizational MERL Framework\" data-filter-tags=\"planning merl framework\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_merl_framework\">MERL Framework </span> </a> </li>\r\n               ";
            }
            echo "            </ul>\r\n          </li>\r\n          \r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          ";
        if (in_array("1", $org_quarterly_narrative_report) || in_array("1", $org_quarterly_indicator_tracking_report) || in_array("1", $org_annual_narrative_report) || in_array("1", $org_annual_indicator_tracking_report) || in_array("1", $monitoring_visit_report)) {
            echo "          <li  class=\"";
            if (getSegment(3) == "org_quarterly_narrative_report" || getSegment(3) == "org_quarterly_indicator_tracking_report" || getSegment(3) == "org_annual_narrative_report" || getSegment(3) == "org_annual_indicator_tracking_report" || getSegment(3) == "monitoring_visit_report") {
                echo "active open'";
            }
            echo "\"> \r\n            <a href=\"#\" title=\"Reporting\" data-filter-tags=\"reporting\"> <span class=\"nav-link-text\" data-i18n=\"nav.reporting\">Reporting</span> </a>\r\n            \r\n            <ul>\r\n            \r\n             ";
            if (in_array("1", $org_quarterly_narrative_report) || in_array("1", $org_quarterly_indicator_tracking_report)) {
                echo "              \r\n              <li  class=\"";
                if (getSegment(3) == "org_quarterly_narrative_report" || getSegment(2) == "org_quarterly_indicator_tracking_report" || getSegment(2) == "org_quarterly_workplan_progress_report" || getSegment(3) == "org_quarterly_indicator_tracking_report") {
                    echo "active open'";
                }
                echo "\"> \r\n            \r\n            <a href=\"#\" title=\"Quarterly Report\" data-filter-tags=\"Quarterly Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_quarterly_report\">Quarterly Report</span> </a>\r\n               \r\n                <ul>\r\n                \r\n                ";
                if (in_array("1", $org_quarterly_narrative_report)) {
                    echo "                     \r\n                  <li class=\"";
                    if (getSegment(3) == "org_quarterly_narrative_report") {
                        echo "active open'";
                    }
                    echo "\" > <a href=\"";
                    echo base_url() . "/reporting/organizational_data/org_quarterly_narrative_report";
                    echo "\" title=\"Quarterly Narrative Report\" data-filter-tags=\"quarterly narrative report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_quarterly_narrative_report\">Narrative Report</span> </a> </li>\r\n                 \r\n                 ";
                }
                echo "                    \r\n                  ";
                if (in_array("1", $org_quarterly_indicator_tracking_report)) {
                    echo "                  <li class=\"";
                    if (getSegment(3) == "org_quarterly_indicator_tracking_report") {
                        echo "active open'";
                    }
                    echo "\" > <a href=\"";
                    echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report";
                    echo "\" title=\"Quarterly Indicator Tracking Report\" data-filter-tags=\"quarterly indicator tracking report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_quarterly_indicator_tracking_report\">Indicator Tracking Report</span> </a> </li>\r\n                  ";
                }
                echo "                  \r\n                </ul>\r\n              </li>\r\n             \r\n              \r\n              \r\n              ";
            }
            if (in_array("1", $org_annual_narrative_report) || in_array("1", $org_annual_indicator_tracking_report)) {
                echo "              \r\n              <li  class=\"";
                if (getSegment(2) == "org_annual_narrative_report" || getSegment(2) == "org_annual_indicator_tracking_report" || getSegment(2) == "org_annual_workplan_progress_report" || getSegment(3) == "org_annual_narrative_report" || getSegment(3) == "org_annual_indicator_tracking_report") {
                    echo "active open'";
                }
                echo "\"> \r\n                    <a href=\"#\" title=\"Annual Report\" data-filter-tags=\"Annual Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_annual_report\">Annual Report</span> </a>\r\n                    \r\n               \r\n                <ul>\r\n                  \r\n                   ";
                if (in_array("1", $org_annual_narrative_report)) {
                    echo "                  <li class=\"";
                    if (getSegment(3) == "org_annual_narrative_report") {
                        echo "active open'";
                    }
                    echo "\" > \r\n                  <a href=\"";
                    echo base_url() . "/reporting/organizational_data/org_annual_narrative_report";
                    echo "\" title=\"Annual Narrative Report\" data-filter-tags=\"annual narrative report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_annual_narrative_report\">Narrative Report</span> </a> </li>\r\n                   ";
                }
                echo "                \r\n                \r\n                   ";
                if (in_array("1", $org_annual_indicator_tracking_report)) {
                    echo "\t\r\n                  <li class=\"";
                    if (getSegment(3) == "org_annual_indicator_tracking_report") {
                        echo "active open'";
                    }
                    echo "\" > \r\n                  <a href=\"";
                    echo base_url() . "/reporting/organizational_data/org_annual_indicator_tracking_report";
                    echo "\" title=\"Annual Indicator Tracking Report\" data-filter-tags=\"annual indicator tracking report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_annual_indicator_tracking_report\">Indicator Tracking Report</span> </a> </li>\r\n                   ";
                }
                echo "                  \r\n                </ul>\r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $monitoring_visit_report)) {
                echo "              <li class=\"";
                if (getSegment(3) == "monitoring_visit_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/reporting/organizational_data/monitoring_visit_report";
                echo "\" title=\"Monitoring Visit Report\" data-filter-tags=\"monitoring visit report\"> <span class=\"nav-link-text\" data-i18n=\"nav.monitoring_visit_report\">Monitoring Visit Report</span> </a> </li>\r\n              \t ";
            }
            echo "                 \r\n               \r\n                 \r\n                \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n\t\t";
        if (in_array("1", $cases_database) || in_array("1", $case_types)) {
            echo "          \r\n          <li  class=\"";
            if (getSegment(3) == "case_types" || getSegment(3) == "cases_database") {
                echo "active open'";
            }
            echo "\"> <a href=\"#\" title=\"Cases\" data-filter-tags=\"cases\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases\">Cases</span> </a>\r\n            <ul>\r\n             \r\n              ";
            if (in_array("1", $case_types)) {
                echo "              <li class=\"";
                if (getSegment(3) == "case_types") {
                    echo "active open'";
                }
                echo "\"> <a href=\"";
                echo base_url() . "/reporting/organizational_data/case_types";
                echo "\" title=\"Case Types\" data-filter-tags=\"cases case types\"> <span class=\"nav-link-text\" data-i18n=\"nav.case_types\">Case Types</span> </a> </li>\r\n              ";
            }
            echo "              \r\n              ";
            if (in_array("1", $cases_database)) {
                echo "              <li  class=\"";
                if (getSegment(3) == "cases_database") {
                    echo "active open'";
                }
                echo "\"> <a href=\"";
                echo base_url() . "/reporting/organizational_data/cases_database";
                echo "\" title=\"Cases Database\" data-filter-tags=\"cases cases database\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_database\">Cases Database</span> </a> </li>\r\n               ";
            }
            echo "            </ul>\r\n          </li>\r\n          \r\n          ";
        }
        // if (in_array("1", $cases_database)) {
        //     echo " \r\n        <li class=\"";
        //     if (getSegment(3) == "cases_database") {
        //         echo "active open'";
        //     }
        //     echo "\">\r\n        <a href=\"";
        //     echo base_url() . "/reporting/organizational_data/cases_database";
        //     echo "\" title=\"Cases Database Reports\" data-filter-tags=\"cases database\">  <span class=\"nav-link-text\" data-i18n=\"nav.cases_database\">Cases Database</span> </a> \r\n        </li>\r\n        ";
        // }
        echo "          \r\n        </ul>\r\n        \r\n               \r\n                \r\n\r\n      </li>\r\n      ";
    }
    echo "      ";
    $project = explode(",", $this->session->get("project"));
    $project_me_plan = explode(",", $this->session->get("project_me_plan"));
    $project_annual_plan = explode(",", $this->session->get("project_annual_plan"));
    $project_quarterly_narrative_report = explode(",", $this->session->get("project_quarterly_narrative_report"));
    $project_quarterly_indicator_tracking_report = explode(",", $this->session->get("project_quarterly_indicator_tracking_report"));
    $project_quarterly_workplan_progress_reports = explode(",", $this->session->get("project_quarterly_workplan_progress_reports"));
    $project_semi_annual_narrative_report = explode(",", $this->session->get("project_semi_annual_narrative_report"));
    $project_semi_annual_indicator_tracking_report = explode(",", $this->session->get("project_semi_annual_indicator_tracking_report"));
    $project_semi_annual_workplan_progress_report = explode(",", $this->session->get("project_semi_annual_workplan_progress_report"));
    $project_annual_narrative_report = explode(",", $this->session->get("project_annual_narrative_report"));
    $project_annual_indicator_tracking_report = explode(",", $this->session->get("project_annual_indicator_tracking_report"));
    $project_annual_workplan_progress_report = explode(",", $this->session->get("project_annual_workplan_progress_report"));
    $project_final_report = explode(",", $this->session->get("project_final_report"));
    $project_outcome_journal_report = explode(",", $this->session->get("project_outcome_journal_report"));
    $beneficiaries_report = explode(",", $this->session->get("beneficiaries_report"));
    $activity_reporting_tool = explode(",", $this->session->get("activity_reporting_tool"));
    if (in_array("1", $project) || in_array("1", $project_me_plan) || in_array("1", $project_annual_plan) || in_array("1", $project_quarterly_narrative_report) || in_array("1", $project_quarterly_indicator_tracking_report) || in_array("1", $project_quarterly_workplan_progress_reports) || in_array("1", $project_semi_annual_narrative_report) || in_array("1", $project_semi_annual_indicator_tracking_report) || in_array("1", $project_semi_annual_workplan_progress_report) || in_array("1", $project_annual_narrative_report) || in_array("1", $project_annual_indicator_tracking_report) || in_array("1", $project_annual_workplan_progress_report) || in_array("1", $project_final_report) || in_array("1", $project_outcome_journal_report) || in_array("1", $beneficiaries_report) || in_array("1", $activity_reporting_tool)) {
        echo "                            \r\n                            \r\n      <li class=\"";
        if (getSegment(2) == "project" || getSegment(2) == "project_me_plan" || getSegment(2) == "project_annual_plan" || getSegment(3) == "project_quarterly_narrative_report" || getSegment(3) == "project_quarterly_indicator_tracking_report" || getSegment(3) == "project_quarterly_workplan_progress_reports" || getSegment(3) == "project_semi_annual_narrative_report" || getSegment(3) == "project_semi_annual_indicator_tracking_report" || getSegment(3) == "project_semi_annual_workplan_progress_report" || getSegment(3) == "project_annual_workplan_progress_report" || getSegment(3) == "project_annual_narrative_report" || getSegment(3) == "project_annual_indicator_tracking_report" || getSegment(3) == "project_final_report" || getSegment(3) == "project_outcome_journal_report" || getSegment(3) == "beneficiaries_report" || getSegment(3) == "activity_reporting_tool") {
            echo "active open'";
        }
        echo "\"> \r\n        <a href=\"#\" title=\"Report Submission\" data-filter-tags=\"Report\"> <i class=\"fal fa-edit\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.report\">Project Data</span> </a>\r\n                            \r\n        <ul>\r\n          ";
        if (in_array("1", $project) || in_array("1", $project_me_plan) || in_array("1", $project_annual_plan)) {
            echo "        \r\n          <li class=\"";
            if (getSegment(2) == "project" || getSegment(2) == "project_me_plan" || getSegment(2) == "project_annual_plan") {
                echo "active open'";
            }
            echo "\"> \r\n                <a href=\"#\" title=\"Projects\" data-filter-tags=\"planning Projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_projects\">Planning</span> </a>\r\n           \r\n            <ul>\r\n            \r\n              ";
            if (in_array("1", $project)) {
                echo " \r\n              <li class=\"";
                if (getSegment(2) == "project") {
                    echo "active open'";
                }
                echo "\"> \r\n                 \r\n                 <a href=\"";
                echo base_url() . "/planning/project";
                echo "\" title=\"Project Background\" data-filter-tags=\"planning project\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_project\">Project Background</span> </a> \r\n                 </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_me_plan)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_me_plan") {
                    echo "active open'";
                }
                echo "\"> \r\n                    <a href=\"";
                echo base_url() . "/planning/project_me_plan";
                echo "\" title=\"Project M&E Plan\" data-filter-tags=\"project m&e plan\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_me_plan\">Project M&E Plan</span> </a> \r\n                </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_annual_plan)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_plan") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\t<a href=\"";
                echo base_url() . "/planning/project_annual_plan";
                echo "\" title=\"Project Annual Plan\" data-filter-tags=\"projects annual plan\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_programs_projects_annual_me_plan\">Project Annual Plan</span> </a> \r\n               </li>\r\n              ";
            }
            echo "\r\n\r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          \r\n";
        if (in_array("1", $project_quarterly_narrative_report) || in_array("1", $project_quarterly_indicator_tracking_report) || in_array("1", $project_quarterly_workplan_progress_reports) || in_array("1", $project_semi_annual_narrative_report) || in_array("1", $project_semi_annual_indicator_tracking_report) || in_array("1", $project_semi_annual_workplan_progress_report) || in_array("1", $project_annual_narrative_report) || in_array("1", $project_annual_indicator_tracking_report) || in_array("1", $project_annual_workplan_progress_report) || in_array("1", $project_final_report) || in_array("1", $project_outcome_journal_report) || in_array("1", $beneficiaries_report) || in_array("1", $activity_reporting_tool)) {
            echo "                                        \r\n                                        \r\n                                        \r\n          <li class=\"";
            if (getSegment(3) == "project_quarterly_narrative_report" || getSegment(3) == "project_quarterly_indicator_tracking_report" || getSegment(3) == "project_quarterly_workplan_progress_reports" || getSegment(3) == "project_semi_annual_narrative_report" || getSegment(3) == "project_semi_annual_indicator_tracking_report" || getSegment(3) == "project_semi_annual_workplan_progress_report" || getSegment(3) == "project_annual_narrative_report" || getSegment(3) == "project_annual_indicator_tracking_report" || getSegment(3) == "project_annual_workplan_progress_report" || getSegment(3) == "project_final_report" || getSegment(3) == "project_outcome_journal_report" || getSegment(3) == "beneficiaries_report" || getSegment(3) == "activity_reporting_tool") {
                echo "active open'";
            }
            echo "\"> \r\n\r\n\r\n\t\t\t<a href=\"#\" title=\"Program/Project Reports\" data-filter-tags=\"application intel marketing dashboard\"> <span class=\"nav-link-text\" data-i18n=\"nav.application_intel_marketing_dashboard\">Reporting</span> </a>\r\n            \r\n            \r\n            <ul>\r\n              ";
            if (in_array("1", $project_quarterly_narrative_report) || in_array("1", $project_quarterly_indicator_tracking_report) || in_array("1", $project_quarterly_workplan_progress_reports)) {
                echo "              \r\n              <li  class=\"";
                if (getSegment(3) == "project_quarterly_narrative_report" || getSegment(3) == "project_quarterly_indicator_tracking_report" || getSegment(3) == "project_quarterly_workplan_progress_reports") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\t<a href=\"#\" title=\"Quarterly Report\" data-filter-tags=\"Quarterly Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_quarterly_report\">Quarterly Report</span> </a>\r\n                \r\n                <ul>\r\n                  \r\n                  ";
                if (in_array("1", $project_quarterly_narrative_report)) {
                    echo "                  <li class=\"";
                    if (getSegment(3) == "project_quarterly_narrative_report") {
                        echo "active open'";
                    }
                    echo "\" > \r\n                    <a href=\"";
                    echo base_url() . "/reporting/project_data/project_quarterly_narrative_report";
                    echo "\" title=\"Quarterly Narrative Report\" data-filter-tags=\"Quarterly Narrative Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_quarterly_narrative_report\">Narrative Report</span> </a> \r\n                  </li>\r\n                   ";
                }
                echo "                    \r\n                    \r\n                  ";
                if (in_array("1", $project_quarterly_indicator_tracking_report)) {
                    echo "  \r\n                  <li class=\"";
                    if (getSegment(3) == "project_quarterly_indicator_tracking_report") {
                        echo "active open'";
                    }
                    echo "\" > \r\n                  \t<a href=\"";
                    echo base_url() . "/reporting/project_data/project_quarterly_indicator_tracking_report";
                    echo "\" title=\"Quarterly Indicator Tracking Report\" data-filter-tags=\"Quarterly Indicator Tracking Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.org_quarterly_indicator_tracking_report\">Indicator Tracking Report</span> </a> \r\n                  </li>\r\n                   ";
                }
                echo "                   \r\n                  \r\n                ";
                if (in_array("1", $project_quarterly_workplan_progress_reports)) {
                    echo "                  <li class=\"";
                    if (getSegment(3) == "project_quarterly_workplan_progress_reports") {
                        echo "active open'";
                    }
                    echo "\" > \r\n                  \t<a href=\"";
                    echo base_url() . "/reporting/project_data/project_quarterly_workplan_progress_reports";
                    echo "\" title=\"Workplan Progress Report\" data-filter-tags=\"Workplan Progress Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_quarterly_workplan_progress_reports\">Workplan Progress Report</span> </a> \r\n                  </li>\r\n                   ";
                }
                echo "                  \r\n                </ul>\r\n              </li>\r\n              \r\n              ";
            }
            echo "              \r\n              \r\n            \r\n             ";
            if (in_array("1", $project_semi_annual_narrative_report) || in_array("1", $project_semi_annual_indicator_tracking_report) || in_array("1", $project_semi_annual_workplan_progress_report)) {
                echo "             \r\n              <li  class=\"";
                if (getSegment(3) == "project_semi_annual_narrative_report" || getSegment(2) == "project_semi_annual_indicator_tracking_report" || getSegment(2) == "org_quarterly_workplan_progress_report" || getSegment(3) == "org_quarterly_indicator_tracking_report" || getSegment(3) == "project_semi_annual_indicator_tracking_report" || getSegment(3) == "project_semi_annual_workplan_progress_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\t<a href=\"#\" title=\"Semi-Annual Report\" data-filter-tags=\"semi-annual report\"> <span class=\"nav-link-text\" data-i18n=\"\">Semi-Annual Reports</span> </a>\r\n                <ul>\r\n                 \r\n                 \r\n                  <li class=\"";
                if (getSegment(3) == "project_semi_annual_narrative_report") {
                    echo "active open'";
                }
                echo "\" > \r\n                  \t<a href=\"";
                echo base_url() . "/reporting/project_data/project_semi_annual_narrative_report";
                echo "\" title=\"Semi-Annual Narrative Report\" data-filter-tags=\"semi-annual narrative report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_semi_annual_narrative_report\">Narrative Report</span> </a> \r\n                  </li>\r\n                \r\n                \r\n                  <li class=\"";
                if (getSegment(3) == "project_semi_annual_indicator_tracking_report") {
                    echo "active open'";
                }
                echo "\" > \r\n                  \t\r\n                    <a href=\"";
                echo base_url() . "/reporting/project_data/project_semi_annual_indicator_tracking_report";
                echo "\" title=\"Semi-Annual Indicator Tracking Report\" data-filter-tags=\"indicator tracking report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_semi_annual_indicator_tracking_report\">Indicator Tracking Report</span> </a> \r\n                 </li>\r\n                 \r\n                 \r\n                  <li class=\"";
                if (getSegment(3) == "project_semi_annual_workplan_progress_report") {
                    echo "active open'";
                }
                echo "\" > \r\n                  \t<a href=\"";
                echo base_url() . "/reporting/project_data/project_semi_annual_workplan_progress_report";
                echo "\" title=\"Semi-Annual Workplan Progress Report\" data-filter-tags=\"semi-annual workplan progress report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_semi_annual_workplan_progress_report\">Workplan Progress Report</span> </a> \t\t\t\t\t\t                 </li>\r\n                    \r\n                </ul>\r\n              </li>\r\n        ";
            }
            echo "        \r\n        \r\n        \r\n        ";
            if (in_array("1", $project_annual_narrative_report) || in_array("1", $project_annual_indicator_tracking_report) || in_array("1", $project_annual_workplan_progress_report)) {
                echo "        \r\n              <li  class=\"";
                if (getSegment(3) == "project_annual_narrative_report" || getSegment(3) == "project_annual_indicator_tracking_report" || getSegment(3) == "project_annual_workplan_progress_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\r\n              <a href=\"#\" title=\"Annual Report\" data-filter-tags=\"annual report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_report\">Annual Reports</span> </a>\r\n              \r\n                <ul>\r\n                 \r\n                  <li class=\"";
                if (getSegment(3) == "project_annual_narrative_report") {
                    echo "active open'";
                }
                echo "\"> \r\n                    <a href=\"";
                echo base_url() . "/reporting/project_data/project_annual_narrative_report";
                echo "\" title=\"Annual Narrative Report\" data-filter-tags=\"annual narrative report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_narrative_report\">Narrative Report</span> </a> \r\n                 </li>\r\n                  \r\n                  \r\n                  <li class=\"";
                if (getSegment(3) == "project_annual_indicator_tracking_report") {
                    echo "active open'";
                }
                echo "\" > \r\n                  \t<a href=\"";
                echo base_url() . "/reporting/project_data/project_annual_indicator_tracking_report";
                echo "\" title=\"Annual Indicator Tracking Report\" data-filter-tags=\"annual indicator tracking report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_indicator_tracking_report\">Indicator Tracking Report</span> </a> \r\n                 </li>\r\n                 \r\n                 \r\n                  <li class=\"";
                if (getSegment(3) == "project_annual_workplan_progress_report") {
                    echo "active open'";
                }
                echo "\" > \r\n                  \t<a href=\"";
                echo base_url() . "/reporting/project_data/project_annual_workplan_progress_report";
                echo "\" title=\"Workplan Progress Report\" data-filter-tags=\"project annual workplan progress report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_workplan_progress_report\">Workplan Progress Report</span> </a> \r\n                  </li>\r\n                    \r\n                    \r\n                </ul>\r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n              ";
            if (in_array("1", $project_final_report)) {
                echo "              <li class=\"";
                if (getSegment(3) == "project_final_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/reporting/project_data/project_final_report";
                echo "\" title=\"Final Report\" data-filter-tags=\"final report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_final_report\">Final Report</span> </a> \r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_outcome_journal_report)) {
                echo "              <li  class=\"";
                if (getSegment(3) == "project_outcome_journal_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t  <a href=\"";
                echo base_url() . "/reporting/project_data/project_outcome_journal_report";
                echo "\" title=\"Outcome Journal Report\" data-filter-tags=\"outcome journal report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_outcome_journal_report\">Outcome Journal Report</span> </a>\r\n               </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $activity_reporting_tool)) {
                echo "              <li  class=\"";
                if (getSegment(3) == "activity_reporting_tool") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t  <a href=\"";
                echo base_url() . "/reporting/project_data/activity_reporting_tool";
                echo "\" title=\"Activity Reporting Tool\" data-filter-tags=\"activity reporting tool\"> <span class=\"nav-link-text\" data-i18n=\"nav.activity_reporting_tool\">Activity Reporting Tool </span> </a>\r\n               </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $beneficiaries_report)) {
                echo "              <li  class=\"";
                if (getSegment(3) == "beneficiaries_report") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t  <a href=\"";
                echo base_url() . "/reporting/project_data/beneficiaries_report";
                echo "\" title=\"Beneficiaries Report\" data-filter-tags=\"Beneficiaries Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.beneficiaries_report\">Beneficiaries Report</span> </a>\r\n               </li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "        </ul>\r\n      </li>\r\n      ";
    }
    echo "      \r\n      \r\n      \r\n\t\t";
    $review_activity_reporting = explode(",", $this->session->get("review_activity_reporting"));
    $review_narrative_reports = explode(",", $this->session->get("review_narrative_reports"));
    $review_indicator_tracking_reports = explode(",", $this->session->get("review_indicator_tracking_reports"));
    if (in_array("1", $review_activity_reporting) || in_array("1", $review_narrative_reports) || in_array("1", $review_indicator_tracking_reports)) {
        echo "      \r\n      \r\n      <li  class=\"";
        if (getSegment(1) == "review_approve") {
            echo "active open'";
        }
        echo "\"> \r\n      \t<a href=\"#\" title=\"Settings\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-check-square\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.system_management\">Review/Approve</span> </a>\r\n        <ul>\r\n        \r\n          ";
        if (in_array("1", $review_activity_reporting)) {
            echo "          <li  class=\"";
            if (getSegment(2) == "review_activity_reporting") {
                echo "active open'";
            }
            echo "\"> \r\n          \t<a href=\"";
            echo base_url() . "/review_approve/review_activity_reporting";
            echo "\" title=\"Review Activity Reporting\" data-filter-tags=\"review activity reporting\"> <span class=\"nav-link-text\" data-i18n=\"nav.review_activity_reporting\">Review Activity Reporting</span> </a>\r\n         </li>\r\n          ";
        }
        echo "  \r\n          \r\n          \r\n            \r\n         ";
        if (in_array("1", $review_narrative_reports)) {
            echo " \r\n          <li  class=\"";
            if (getSegment(2) == "review_narrative_reports") {
                echo "active open'";
            }
            echo "\"> \r\n          \t<a href=\"";
            echo base_url() . "/review_approve/review_narrative_reports";
            echo "\" title=\"Review Narrative Report\" data-filter-tags=\"review narrative report\"> <span class=\"nav-link-text\" data-i18n=\"nav.review_narrative_reports\">Review Narrative Report</span> </a>\r\n         </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n\t\t";
        if (in_array("1", $review_indicator_tracking_reports)) {
            echo "          <li  class=\"";
            if (getSegment(2) == "review_indicator_tracking_reports") {
                echo "active open'";
            }
            echo "\"> \r\n          \t<a href=\"";
            echo base_url() . "/review_approve/review_indicator_tracking_reports";
            echo "\" title=\"Review Indicator Tracking Report\" data-filter-tags=\"review indicator tracking report\"> <span class=\"nav-link-text\" data-i18n=\"nav.review_indicator_tracking_reports\">Review Indicator Tracking Report</span> </a>\r\n         </li>\r\n         ";
        }
        echo "         \r\n\r\n        </ul>\r\n      </li>\r\n      \r\n      ";
    }
    echo "      \r\n      \r\n      \r\n      \r\n      \r\n      ";
    $stratergic_annual_indicator_performance = explode(",", $this->session->get("stratergic_annual_indicator_performance"));
    $stratergic_quarterly_indicator_performance = explode(",", $this->session->get("stratergic_quarterly_indicator_performance"));
    $project_annual_indicator_performance = explode(",", $this->session->get("project_annual_indicator_performance"));
    $project_quarterly_indicator_performance = explode(",", $this->session->get("project_quarterly_indicator_performance"));
    $project_annual_activity_performance = explode(",", $this->session->get("project_annual_activity_performance"));
    $project_quarterly_activity_performance = explode(",", $this->session->get("project_quarterly_activity_performance"));
    $project_schedule = explode(",", $this->session->get("project_schedule"));
    $cases_field_office = explode(",", $this->session->get("cases_field_office"));
    $cases_overall = explode(",", $this->session->get("cases_overall"));
    $beneficiaries_report_county = explode(",", $this->session->get("beneficiaries_report_county"));
    $beneficiaries_report_national = explode(",", $this->session->get("beneficiaries_report_national"));
    if (in_array("1", $stratergic_annual_indicator_performance) || in_array("1", $stratergic_quarterly_indicator_performance) || in_array("1", $project_annual_indicator_performance) || in_array("1", $project_quarterly_indicator_performance) || in_array("1", $project_annual_activity_performance) || in_array("1", $project_quarterly_activity_performance) || in_array("1", $project_schedule) || in_array("1", $cases_field_office) || in_array("1", $cases_overall) || in_array("1", $beneficiaries_report_county) || in_array("1", $beneficiaries_report_national)) {
        echo "                            \r\n      \t\t\t\t\t\t<li class=\"";
        if (getSegment(1) == "system_reports") {
            echo "active open'";
        }
        echo "\"> \r\n      \t\t\t\t\t\t\t<a href=\"#\" title=\"Access System Reports\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-chart-bar\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.form_stuff\">Access System Reports</span> </a>\r\n                                   \r\n                                  \r\n                                    <ul>\r\n                                      ";
        if (in_array("1", $stratergic_annual_indicator_performance) || in_array("1", $stratergic_quarterly_indicator_performance)) {
            echo "         \t\t\t\t\t\t\t\t\r\n                                        \r\n                                      <li class=\"";
            if (getSegment(2) == "stratergic_annual_indicator_performance" || getSegment(2) == "stratergic_quarterly_indicator_performance") {
                echo "active open'";
            }
            echo "\"> \r\n                                        \t\r\n                                         <a href=\"#\" title=\"Programs/Projects\" data-filter-tags=\"planning Projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Strategic Report</span> \r\n                                        </a>\r\n                                        \r\n                                        <ul>\r\n                                          ";
            if (in_array("1", $stratergic_annual_indicator_performance)) {
                echo "                                          <li class=\"";
                if (getSegment(2) == "stratergic_annual_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                                           <a href=\"";
                echo base_url() . "/system_reports/stratergic_annual_indicator_performance";
                echo "\" title=\"Strategic Annual Indicator Performance\" data-filter-tags=\"Strategic Annual Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.stratergic_annual_indicator_performance\">Annual Ind Performance </span> </a> </li>\r\n                                          ";
            }
            echo "                                          \r\n                                          \r\n                                          ";
            if (in_array("1", $stratergic_quarterly_indicator_performance)) {
                echo "                                          <li class=\"";
                if (getSegment(2) == "stratergic_quarterly_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                                            <a href=\"";
                echo base_url() . "/system_reports/stratergic_quarterly_indicator_performance";
                echo "\" title=\"Quarterly Indicator Performance\" data-filter-tags=\"Quarterly Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.stratergic_quarterly_indicator_performance&_radio\">Quarter Ind Performance </span> \r\n                                            </a> \r\n                                           </li>\r\n                                          ";
            }
            echo "                                        </ul>\r\n                                        \r\n                                  </li>\r\n                                  ";
        }
        echo "          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n          <!-----Project Ind Performance------>\r\n          \r\n          ";
        if (in_array("1", $project_annual_indicator_performance) || in_array("1", $project_quarterly_indicator_performance) || in_array("1", $project_annual_activity_performance) || in_array("1", $project_quarterly_activity_performance) || in_array("1", $project_schedule)) {
            echo "          \t\t\t\r\n                   \r\n                    <li class=\"";
            if (getSegment(2) == "project_annual_indicator_performance" || getSegment(2) == "project_quarterly_indicator_performance" || getSegment(2) == "project_annual_activity_performance" || getSegment(2) == "project_quarterly_activity_performance" || getSegment(2) == "project_quarterly_narrative" || getSegment(2) == "project_annual_narrative" || getSegment(2) == "project_schedule") {
                echo "active open'";
            }
            echo "\"> \r\n                            <a href=\"#\" title=\"Projects\" data-filter-tags=\"planning projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Project Report</span> </a>\r\n            \r\n            <ul>\r\n            \r\n              ";
            if (in_array("1", $project_annual_indicator_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_annual_indicator_performance";
                echo "\" title=\"Annual Indicator Performance\" data-filter-tags=\"Annual Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_indicator_performance\">Annual Ind Performance </span> </a>\r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_indicator_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                 \r\n                 <a href=\"";
                echo base_url() . "/system_reports/project_quarterly_indicator_performance";
                echo "\" title=\"Quarterly Indicator Performance\" data-filter-tags=\"Quarterly Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_quarterly_indicator_performance\">Quarter Ind Performance </span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_annual_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_activity_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                        <a href=\"";
                echo base_url() . "/system_reports/project_annual_activity_performance";
                echo "\" title=\"Annual Activity Performance\" data-filter-tags=\"Annual Activity Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_activity_performance\">Annual Activity Performance</span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_activity_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\t<a href=\"";
                echo base_url() . "/system_reports/project_quarterly_activity_performance";
                echo "\" title=\"Activity Performance\" data-filter-tags=\"form stuff checkbox & radio\"> <span class=\"nav-link-text\" data-i18n=\"nav.form_stuff_checkbox_&_radio\">Quarter Activity Performance</span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_narrative") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_annual_narrative";
                echo "\" title=\"Project Annual Narrative Report\" data-filter-tags=\"project annual narrative Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_narrative\">Project Annual Narrative Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_narrative") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_quarterly_narrative";
                echo "\" title=\"Project Quarterly Narrative Report\" data-filter-tags=\"project Quarterly Narrative Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_schedule\">Project Quarterly Narrative Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_schedule)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_schedule") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_schedule";
                echo "\" title=\"Project Schedule\" data-filter-tags=\"project schedule\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_schedule\">Project Schedule Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n              \r\n              \r\n            </ul>\r\n          </li>\r\n          \r\n          ";
        }
        echo "          \r\n          <!-----Case Database Report------>\r\n         \r\n         \r\n          ";
        if (in_array("1", $cases_field_office) || in_array("1", $cases_overall)) {
            echo "          \r\n          <li class=\"";
            if (getSegment(2) == "cases_field_office" || getSegment(2) == "cases_overall") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"#\" title=\"Cases Database Report\" data-filter-tags=\"planning Program Projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Cases Database Report </span> </a>\r\n           \r\n            <ul>\r\n              ";
            if (in_array("1", $cases_field_office)) {
                echo "             \r\n              <li class=\"";
                if (getSegment(2) == "cases_field_office") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/cases_field_office";
                echo "\" title=\"Cases Database Report County\" data-filter-tags=\"cases database field office\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_field_office\">by Chapter </span> </a> \r\n             </li>\r\n              ";
            }
            echo "            \r\n              ";
            if (in_array("1", $cases_overall)) {
                echo "              \r\n              <li class=\"";
                if (getSegment(2) == "cases_overall") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/cases_overall";
                echo "\" title=\"Cases Database Report National\" data-filter-tags=\"cases database national\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_overall\">by National</span> </a> \r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n          \r\n          ";
        if (in_array("1", $beneficiaries_report_county) || in_array("1", $beneficiaries_report_national)) {
            echo "          \r\n          <li class=\"";
            if (getSegment(2) == "beneficiaries_report_county" || getSegment(2) == "beneficiaries_report_national") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"#\" title=\"Beneficiaries Report\" data-filter-tags=\"beneficiaries report\"> <span class=\"nav-link-text\" data-i18n=\"nav.beneficiaries_report_county\">Beneficiaries Report </span> </a>\r\n           \r\n            <ul>\r\n              ";
            if (in_array("1", $beneficiaries_report_county)) {
                echo "             \r\n              <li class=\"";
                if (getSegment(2) == "beneficiaries_report_county") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/beneficiaries_report_county";
                echo "\" title=\"Beneficiaries Report County\" data-filter-tags=\"beneficiaries report county\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_field_office\">by Chapter </span> </a> \r\n             </li>\r\n              ";
            }
            echo "            \r\n              ";
            if (in_array("1", $beneficiaries_report_national)) {
                echo "              \r\n              <li class=\"";
                if (getSegment(2) == "beneficiaries_report_national") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/beneficiaries_report_national";
                echo "\" title=\"Beneficiaries Report National\" data-filter-tags=\"beneficiaries report national\"> <span class=\"nav-link-text\" data-i18n=\"nav.beneficiaries_report_national\">by National</span> </a> \r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          <!-----Strategic Ind Performance------>\r\n          \r\n        </ul>\r\n      </li>\r\n      ";
    }

    $workplan_resources = explode(",", $this->session->get("resources"));
    $workplan_workshop_reporting_tool = explode(",", $this->session->get("workshop_reporting_tool"));
    $workplan_questionnaires = explode(",", $this->session->get("questionnaires")); // Added Questionnaires
    
    if (in_array("1", $workplan_resources) || in_array("1", $workplan_workshop_reporting_tool)) {
        echo "              \r\n              <li class=\"";
        if (getSegment(2) == "resources") {
            echo "active open'";
        }
        echo "\"> \r\n          
        <a href=\"#\" title=\"Knowledge Center\" data-filter-tags=\"form stuff\"> 
            <i class=\"fal fa-toolbox\"></i> 
            <span class=\"nav-link-text\" data-i18n=\"nav.knowledge_center\">Knowledge Center</span> 
        </a>\r\n        
        <ul>\r\n         
        
        <li>";
        echo "\t<a href=\"";
        echo base_url() . "/knowledge_center/resources";
        echo "\" title=\"Resources\" data-filter-tags=\"resources\"> 
            <span class=\"nav-link-text\" data-i18n=\"nav.resources\">Resources</span> 
        </a> 
        </li>\r\n";
    
        echo "              \r\n              <li class=\"";
        if (getSegment(2) == "workshop_reporting_tool" || getSegment(2) == "questionnaires") { 
            // Keep the "active open" for both Workshop Reporting Tool and Questionnaires
            echo "active open'";
        }
        echo "\"> \r\n              
            <a href=\"#\" title=\"Workshop Reporting Tool\" data-filter-tags=\"workshop reporting tool\"> 
                <span class=\"nav-link-text\" data-i18n=\"nav.workshop_reporting_tool\">Workshop Reporting Tool</span> 
            </a>\r\n        
            <ul>\r\n"; 
    
        echo "<li>";
        echo "\t<a href=\"";
        echo base_url() . "/knowledge_center/workshop_reporting_tool";
        echo "\" title=\"Workshop Reporting Tool\" data-filter-tags=\"workshop reporting tool\"> 
            <span class=\"nav-link-text\" data-i18n=\"nav.workshop_reporting_tool\">Workshop Reporting Tool</span> 
        </a> 
        </li>\r\n";
    
        // Adding Questionnaire under Workshop Reporting Tool
        if (in_array("1", $workplan_questionnaires)) { 
            echo "<li class=\"";
            if (getSegment(2) == "questionnaires") {
                echo "active open'";
            }
            echo "\"> \r\n              
                <a href=\"";
            echo base_url() . "/knowledge_center/questionnaires";
            echo "\" title=\"Questionnaires\" data-filter-tags=\"questionnaires\"> 
                <span class=\"nav-link-text\" data-i18n=\"nav.questionnaires\">Questionnaires</span> 
            </a> 
            </li>\r\n";
        }
    
        echo "</ul>\r\n"; // Close Workshop Reporting Tool submenu
        echo "</li>\r\n"; // Close Workshop Reporting Tool list item
        echo "</ul>\r\n"; // Close Knowledge Center menu
        echo "</li>\r\n"; // Close Knowledge Center list item
    }
    

    echo "      <li  class=\"";
    if (getSegment(1) == "user_management") {
        echo "active open'";
    }
    echo "\"> <a href=\"#\" title=\"Settings\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-cog\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.system_management\">Settings</span> </a>\r\n        <ul>\r\n         \r\n          <li  class=\"";
    if (getSegment(2) == "change_password") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/change_password";
    echo "\" title=\"Change Password\" data-filter-tags=\"system management change password\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_change_password\">Change Password</span> </a> \r\n           </li>\r\n        \r\n          <li class=\"";
    if (getSegment(2) == "access_user_manaul") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/public/uploads/user_manual/crew_user_manual.pdf";
    echo "\" title=\"Access User Manual\" data-filter-tags=\"system management access user mannual\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_access_user_mannual\">Access User Manual </span> </a> \r\n          </li>\r\n          \r\n        </ul>\r\n      </li>\r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      \r\n      ";
}
echo "      \r\n      <!----------------------------------------------------------------Viewer--------------------------------------------------------------------------------------------------> \r\n      <!----------------------------------------------------------------Viewer-------------------------------------------------------------------------------------------------->\r\n      \r\n      \r\n";
if ($this->session->get("user_type") == "Viewer") {
    echo "      \r\n      <li  class=\"";
    if (getSegment(1) == "dashboard") {
        echo "active open'";
    }
    echo "\"> \r\n      \t\t<a href=\"";
    echo base_url() . "/dashboard";
    echo "\" title=\"Dashboard\" data-filter-tags=\"dashboard\"> <i class=\"fal fa-tachometer\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.dashboard\">Dashboard</span> </a>\r\n      </li>\r\n     \r\n      \r\n      \r\n      ";
    $stratergic_annual_indicator_performance = explode(",", $this->session->get("stratergic_annual_indicator_performance"));
    $stratergic_quarterly_indicator_performance = explode(",", $this->session->get("stratergic_quarterly_indicator_performance"));
    $project_annual_indicator_performance = explode(",", $this->session->get("project_annual_indicator_performance"));
    $project_quarterly_indicator_performance = explode(",", $this->session->get("project_quarterly_indicator_performance"));
    $project_annual_activity_performance = explode(",", $this->session->get("project_annual_activity_performance"));
    $project_quarterly_activity_performance = explode(",", $this->session->get("project_quarterly_activity_performance"));
    $project_schedule = explode(",", $this->session->get("project_schedule"));
    $cases_field_office = explode(",", $this->session->get("cases_field_office"));
    $cases_overall = explode(",", $this->session->get("cases_overall"));
    $beneficiaries_report_county = explode(",", $this->session->get("beneficiaries_report_county"));
    $beneficiaries_report_national = explode(",", $this->session->get("beneficiaries_report_national"));
    if (in_array("1", $stratergic_annual_indicator_performance) || in_array("1", $stratergic_quarterly_indicator_performance) || in_array("1", $project_annual_indicator_performance) || in_array("1", $project_quarterly_indicator_performance) || in_array("1", $project_annual_activity_performance) || in_array("1", $project_quarterly_activity_performance) || in_array("1", $project_schedule) || in_array("1", $cases_field_office) || in_array("1", $cases_overall) || in_array("1", $beneficiaries_report_county) || in_array("1", $beneficiaries_report_national)) {
        echo "                            \r\n      \t\t\t\t\t\t<li class=\"";
        if (getSegment(1) == "system_reports") {
            echo "active open'";
        }
        echo "\"> \r\n      \t\t\t\t\t\t\t<a href=\"#\" title=\"Access System Reports\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-chart-bar\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.form_stuff\">Access System Reports</span> </a>\r\n                                   \r\n                                  \r\n                                    <ul>\r\n                                      ";
        if (in_array("1", $stratergic_annual_indicator_performance) || in_array("1", $stratergic_quarterly_indicator_performance)) {
            echo "         \t\t\t\t\t\t\t\t\r\n                                        \r\n                                      <li class=\"";
            if (getSegment(2) == "stratergic_annual_indicator_performance" || getSegment(2) == "stratergic_quarterly_indicator_performance") {
                echo "active open'";
            }
            echo "\"> \r\n                                        \t\r\n                                         <a href=\"#\" title=\"Programs/Projects\" data-filter-tags=\"planning Projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Strategic Report</span> \r\n                                        </a>\r\n                                        \r\n                                        <ul>\r\n                                          ";
            if (in_array("1", $stratergic_annual_indicator_performance)) {
                echo "                                          <li class=\"";
                if (getSegment(2) == "stratergic_annual_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                                           <a href=\"";
                echo base_url() . "/system_reports/stratergic_annual_indicator_performance";
                echo "\" title=\"Strategic Annual Indicator Performance\" data-filter-tags=\"Strategic Annual Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.stratergic_annual_indicator_performance\">Annual Ind Performance </span> </a> </li>\r\n                                          ";
            }
            echo "                                          \r\n                                          \r\n                                          ";
            if (in_array("1", $stratergic_quarterly_indicator_performance)) {
                echo "                                          <li class=\"";
                if (getSegment(2) == "stratergic_quarterly_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                                            <a href=\"";
                echo base_url() . "/system_reports/stratergic_quarterly_indicator_performance";
                echo "\" title=\"Quarterly Indicator Performance\" data-filter-tags=\"Quarterly Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.stratergic_quarterly_indicator_performance&_radio\">Quarter Ind Performance </span> \r\n                                            </a> \r\n                                           </li>\r\n                                          ";
            }
            echo "                                        </ul>\r\n                                        \r\n                                  </li>\r\n                                  ";
        }
        echo "          \r\n          \r\n          \r\n          \r\n          \r\n          \r\n          <!-----Project Ind Performance------>\r\n          \r\n          ";
        if (in_array("1", $project_annual_indicator_performance) || in_array("1", $project_quarterly_indicator_performance) || in_array("1", $project_annual_activity_performance) || in_array("1", $project_quarterly_activity_performance) || in_array("1", $project_schedule)) {
            echo "          \t\t\t\r\n                   \r\n                    <li class=\"";
            if (getSegment(2) == "project_annual_indicator_performance" || getSegment(2) == "project_quarterly_indicator_performance" || getSegment(2) == "project_annual_activity_performance" || getSegment(2) == "project_quarterly_activity_performance" || getSegment(2) == "project_quarterly_narrative" || getSegment(2) == "project_annual_narrative" || getSegment(2) == "project_schedule") {
                echo "active open'";
            }
            echo "\"> \r\n                            <a href=\"#\" title=\"Projects\" data-filter-tags=\"planning projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Project Report</span> </a>\r\n            \r\n            <ul>\r\n            \r\n              ";
            if (in_array("1", $project_annual_indicator_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_annual_indicator_performance";
                echo "\" title=\"Annual Indicator Performance\" data-filter-tags=\"Annual Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_indicator_performance\">Annual Ind Performance </span> </a>\r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_indicator_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_indicator_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                 \r\n                 <a href=\"";
                echo base_url() . "/system_reports/project_quarterly_indicator_performance";
                echo "\" title=\"Quarterly Indicator Performance\" data-filter-tags=\"Quarterly Indicator Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_quarterly_indicator_performance\">Quarter Ind Performance </span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_annual_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_activity_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n                        <a href=\"";
                echo base_url() . "/system_reports/project_annual_activity_performance";
                echo "\" title=\"Annual Activity Performance\" data-filter-tags=\"Annual Activity Performance\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_activity_performance\">Annual Activity Performance</span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_activity_performance") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t\t<a href=\"";
                echo base_url() . "/system_reports/project_quarterly_activity_performance";
                echo "\" title=\"Activity Performance\" data-filter-tags=\"form stuff checkbox & radio\"> <span class=\"nav-link-text\" data-i18n=\"nav.form_stuff_checkbox_&_radio\">Quarter Activity Performance</span> </a> </li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_annual_narrative") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_annual_narrative";
                echo "\" title=\"Project Annual Narrative Report\" data-filter-tags=\"project annual narrative Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_annual_narrative\">Project Annual Narrative Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_quarterly_activity_performance)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_quarterly_narrative") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_quarterly_narrative";
                echo "\" title=\"Project Quarterly Narrative Report\" data-filter-tags=\"project Quarterly Narrative Report\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_schedule\">Project Quarterly Narrative Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              ";
            if (in_array("1", $project_schedule)) {
                echo "              <li class=\"";
                if (getSegment(2) == "project_schedule") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/project_schedule";
                echo "\" title=\"Project Schedule\" data-filter-tags=\"project schedule\"> <span class=\"nav-link-text\" data-i18n=\"nav.project_schedule\">Project Schedule Report </span> \r\n                </a> \r\n                \t</li>\r\n              ";
            }
            echo "              \r\n              \r\n              \r\n              \r\n              \r\n            </ul>\r\n          </li>\r\n          \r\n          ";
        }
        echo "          \r\n          <!-----Case Database Report------>\r\n         \r\n         \r\n          ";
        if (in_array("1", $cases_field_office) || in_array("1", $cases_overall)) {
            echo "          \r\n          <li class=\"";
            if (getSegment(2) == "cases_field_office" || getSegment(2) == "cases_overall") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"#\" title=\"Cases Database Report\" data-filter-tags=\"planning Program Projects\"> <span class=\"nav-link-text\" data-i18n=\"nav.planning_program_projects\">Cases Database Report </span> </a>\r\n           \r\n            <ul>\r\n              ";
            if (in_array("1", $cases_field_office)) {
                echo "             \r\n              <li class=\"";
                if (getSegment(2) == "cases_field_office") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/cases_field_office";
                echo "\" title=\"Cases Database Report County\" data-filter-tags=\"cases database field office\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_field_office\">by Chapter </span> </a> \r\n             </li>\r\n              ";
            }
            echo "            \r\n              ";
            if (in_array("1", $cases_overall)) {
                echo "              \r\n              <li class=\"";
                if (getSegment(2) == "cases_overall") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/cases_overall";
                echo "\" title=\"Cases Database Report National\" data-filter-tags=\"cases database national\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_overall\">by National</span> </a> \r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n          \r\n          ";
        if (in_array("1", $beneficiaries_report_county) || in_array("1", $beneficiaries_report_national)) {
            echo "          \r\n          <li class=\"";
            if (getSegment(2) == "beneficiaries_report_county" || getSegment(2) == "beneficiaries_report_national") {
                echo "active open'";
            }
            echo "\"> \r\n          \t\t<a href=\"#\" title=\"Beneficiaries Report\" data-filter-tags=\"beneficiaries report\"> <span class=\"nav-link-text\" data-i18n=\"nav.beneficiaries_report_county\">Beneficiaries Report </span> </a>\r\n           \r\n            <ul>\r\n              ";
            if (in_array("1", $beneficiaries_report_county)) {
                echo "             \r\n              <li class=\"";
                if (getSegment(2) == "beneficiaries_report_county") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/beneficiaries_report_county";
                echo "\" title=\"Beneficiaries Report County\" data-filter-tags=\"beneficiaries report county\"> <span class=\"nav-link-text\" data-i18n=\"nav.cases_field_office\">by Chapter </span> </a> \r\n             </li>\r\n              ";
            }
            echo "            \r\n              ";
            if (in_array("1", $beneficiaries_report_national)) {
                echo "              \r\n              <li class=\"";
                if (getSegment(2) == "beneficiaries_report_national") {
                    echo "active open'";
                }
                echo "\"> \r\n              \t<a href=\"";
                echo base_url() . "/system_reports/beneficiaries_report_national";
                echo "\" title=\"Beneficiaries Report National\" data-filter-tags=\"beneficiaries report national\"> <span class=\"nav-link-text\" data-i18n=\"nav.beneficiaries_report_national\">by National</span> </a> \r\n              </li>\r\n              ";
            }
            echo "              \r\n              \r\n            </ul>\r\n          </li>\r\n          ";
        }
        echo "          \r\n          \r\n          \r\n          <!-----Strategic Ind Performance------>\r\n          \r\n        </ul>\r\n      </li>\r\n      ";
    }
    echo "<li  class=\"";
    if (getSegment(1) == "user_management") {
        echo "active open'";
    }
    echo "\"> \r\n      \t<a href=\"#\" title=\"Settings\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-users\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.system_management\">Settings</span> </a>\r\n        <ul>\r\n        \r\n          <li  class=\"";
    if (getSegment(2) == "change_password") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/change_password";
    echo "\" title=\"Change Password\" data-filter-tags=\"system management change password\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_change_password\">Change Password</span> </a>\r\n           </li>\r\n            \r\n            \r\n          <li class=\"";
    if (getSegment(2) == "access_user_manaul") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/public/uploads/user_manual/crew_user_manual.pdf";
    echo "\" title=\"Access User Manual\" data-filter-tags=\"system management access user mannual\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_access_user_mannual\">Access User Manual </span> </a> \r\n          </li>\r\n          \r\n          \r\n        </ul>\r\n      </li>\r\n      \r\n      \r\n";
}
echo "      \r\n      \r\n\r\n  <!----------------------------------------------------------------Viewer--------------------------------------------------------------------------------------------------> \r\n  <!----------------------------------------------------------------Viewer-------------------------------------------------------------------------------------------------->\r\n\r\n\r\n\r\n\r\n      \r\n      ";
if ($this->session->get("user_type") == "admin") {
    echo "      \r\n       <li  class=\"";
    if (getSegment(1) == "user_management") {
        echo "active open'";
    }
    echo "\"> \r\n      \t<a href=\"#\" title=\"System Management\" data-filter-tags=\"form stuff\"> <i class=\"fal fa-users\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.system_management\">User Management</span> </a>\r\n        \r\n        <ul>\r\n          <li  class=\"";
    if (getSegment(2) == "change_password") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/change_password";
    echo "\" title=\"Change Password\" data-filter-tags=\"system management change password\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_change_password\">Change Password</span> </a> \r\n           </li>\r\n           \r\n          <li class=\"";
    if (getSegment(2) == "user_roles") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/user_roles";
    echo "\" title=\"Manage User Roles\" data-filter-tags=\"system management user roles\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_user_roels\">Manage User Roles</span> </a> \r\n          </li>\r\n          \r\n          <li class=\"";
    if (getSegment(2) == "user_rights") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/user_rights";
    echo "\" title=\"Manage User Rights\" data-filter-tags=\"system management users\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_users\">Manage User Rights</span> </a> \r\n           </li>\r\n           \r\n           \r\n          <li class=\"";
    if (getSegment(2) == "users") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/users";
    echo "\" title=\"Manage Users\" data-filter-tags=\"system management users\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_users\">Manage Users</span> </a> \r\n          </li>\r\n          \r\n          \r\n          <li class=\"";
    if (getSegment(2) == "audit_trails") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/user_management/audit_trails";
    echo "\" title=\"View System Audit Trail\" data-filter-tags=\"form stuff checkbox & radio\"> <span class=\"nav-link-text\" data-i18n=\"nav.form_stuff_checkbox_&_radio\">View System Audit Trail</span> </a> \r\n          </li>\r\n          \r\n          \r\n          <li class=\"";
    if (getSegment(2) == "access_user_manaul") {
        echo "active open'";
    }
    echo "\"> \r\n          \t<a href=\"";
    echo base_url() . "/public/uploads/user_manual/admin_manual.pdf";
    echo "\" title=\"Access User Manual\" data-filter-tags=\"system management access user mannual\"> <span class=\"nav-link-text\" data-i18n=\"nav.system_management_access_user_mannual\">Access User Manual </span> </a> \r\n          </li>\r\n        </ul>\r\n      </li>\r\n      ";
}
echo "      \r\n      \r\n      <li > <a href=\"";
echo site_url("auth") . "/logout";
echo "\" title=\"Logout\" data-filter-tags=\"application logout\"> <i class=\"fal fa-sign-out\"></i> <span class=\"nav-link-text\" data-i18n=\"nav.application_logout\">Logout</span> </a> </li>\r\n      \r\n    </ul>\r\n    <div class=\"filter-message js-filter-message bg-success-600\"></div>\r\n  </nav>\r\n  <!-- END PRIMARY NAVIGATION --> \r\n  \r\n</aside>\r\n";

?>