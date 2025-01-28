-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2021 at 11:30 AM
-- Server version: 10.2.36-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwmand_FAWE`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_reporting_comments_history`
--

CREATE TABLE `activity_reporting_comments_history` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `reviwer_id` int(11) NOT NULL,
  `reviwer_comments` text DEFAULT NULL,
  `review_date` datetime NOT NULL,
  `report_status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `activity_reporting_tool`
--

CREATE TABLE `activity_reporting_tool` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `activity_date` date DEFAULT NULL,
  `reported_by` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `particiapnts_reached` bigint(20) DEFAULT NULL,
  `objective_activity` text DEFAULT NULL,
  `summary_events` text DEFAULT NULL,
  `emerging_issues_activity` text DEFAULT NULL,
  `way_forward` text DEFAULT NULL,
  `lesson_learnt` text DEFAULT NULL,
  `recommendations` text DEFAULT NULL,
  `conclusions` text DEFAULT NULL,
  `report_status` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `submitted_to` varchar(255) DEFAULT NULL,
  `reviwer_id` int(11) NOT NULL,
  `review_date` datetime DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_reporting_tool_documents`
--

CREATE TABLE `activity_reporting_tool_documents` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `documents` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_reporting_tool_map`
--

CREATE TABLE `activity_reporting_tool_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `part_0_12_female` bigint(20) NOT NULL,
  `part_0_12_male` bigint(20) NOT NULL,
  `part_13_18_female` bigint(20) NOT NULL,
  `part_13_18_male` bigint(20) NOT NULL,
  `part_19_25_female` bigint(20) NOT NULL,
  `part_19_25_male` bigint(20) NOT NULL,
  `part_26_35_female` bigint(20) NOT NULL,
  `part_26_35_male` bigint(20) NOT NULL,
  `part_36_49_female` bigint(20) NOT NULL,
  `part_36_49_male` bigint(20) NOT NULL,
  `part_50_plus_female` bigint(20) NOT NULL,
  `part_50_plus_male` bigint(20) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_reports`
--

CREATE TABLE `activity_reports` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `check1` tinyint(1) NOT NULL,
  `check2` tinyint(1) NOT NULL,
  `indicator1` varchar(255) NOT NULL,
  `indicator2` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases_database`
--

CREATE TABLE `cases_database` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `case_type` varchar(255) NOT NULL,
  `case_number` bigint(50) DEFAULT NULL,
  `file_number` varchar(255) DEFAULT NULL,
  `field_office` varchar(255) DEFAULT NULL,
  `age_survivor` varchar(255) DEFAULT NULL,
  `gender` varchar(250) DEFAULT NULL,
  `male` int(11) NOT NULL,
  `female` int(11) NOT NULL,
  `diversity` varchar(255) DEFAULT NULL,
  `diversity_male` int(11) NOT NULL,
  `diversity_female` int(11) NOT NULL,
  `economic_status` varchar(255) DEFAULT NULL,
  `place_residence` varchar(500) DEFAULT NULL,
  `county` int(11) NOT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `more_details_on_services_provided` text DEFAULT NULL,
  `case_status` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases_map_case_context`
--

CREATE TABLE `cases_map_case_context` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `case_context` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases_map_incidents_referred`
--

CREATE TABLE `cases_map_incidents_referred` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `incidents_referred` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases_map_services_provided`
--

CREATE TABLE `cases_map_services_provided` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `services_provided` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cases_map_type_gbv`
--

CREATE TABLE `cases_map_type_gbv` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `type_gbv` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_audit_fld`
--

CREATE TABLE `ctbl_audit_fld` (
  `id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `tran_seq_no` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `table_seq_no` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `field_id` varchar(255) NOT NULL DEFAULT '',
  `old_value` text CHARACTER SET utf8 DEFAULT NULL,
  `new_value` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_audit_logon_errors`
--

CREATE TABLE `ctbl_audit_logon_errors` (
  `id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0.0.0.0',
  `user_id` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `user_password` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_audit_ssn`
--

CREATE TABLE `ctbl_audit_ssn` (
  `id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `user_id` varchar(16) CHARACTER SET utf8 NOT NULL DEFAULT 'UNKNOWN',
  `ip_address` varchar(200) NOT NULL,
  `date` date NOT NULL DEFAULT '2000-01-01',
  `time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_audit_tbl`
--

CREATE TABLE `ctbl_audit_tbl` (
  `id` int(11) UNSIGNED NOT NULL,
  `session_id` varchar(200) NOT NULL,
  `tran_seq_no` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `table_seq_no` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `base_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pkey` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_audit_trn`
--

CREATE TABLE `ctbl_audit_trn` (
  `id` int(11) NOT NULL,
  `session_id` varchar(200) NOT NULL DEFAULT '0',
  `tran_seq_no` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT '2000-01-01',
  `time` time NOT NULL DEFAULT '00:00:00',
  `task_id` varchar(40) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_logs_login`
--

CREATE TABLE `ctbl_logs_login` (
  `id` int(11) NOT NULL,
  `log` varchar(300) NOT NULL,
  `date_time` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `ip` varchar(300) NOT NULL,
  `client` text NOT NULL,
  `day` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_sub_viewlevel`
--

CREATE TABLE `ctbl_sub_viewlevel` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL DEFAULT 0,
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.',
  `flag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctbl_sub_viewlevel`
--

INSERT INTO `ctbl_sub_viewlevel` (`id`, `title`, `group_id`, `rules`, `flag`) VALUES
(0, 'cases_overall', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report_county', 16, '1, 2, 3, 4', 0),
(0, 'cases_field_office', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report_national', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'stratergic_annual_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_schedule', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_activity_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_activity_performance', 16, '1, 2, 3, 4', 0),
(0, 'review_narrative_reports', 16, '1, 2, 3, 4', 0),
(0, 'review_activity_reporting', 16, '1, 2, 3, 4', 0),
(0, 'review_indicator_tracking_reports', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_plan', 16, '1, 2, 3, 4', 0),
(0, 'project', 16, '1, 2, 3, 4', 0),
(0, 'project_me_plan', 16, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'activity_reporting_tool', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_implementation_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_annual_me_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_result_framework', 20, '1, 2, 3, 4', 0),
(0, 'project', 20, '1, 2, 3, 4', 0),
(0, 'district_annual_plan', 20, '1, 2, 3, 4', 0),
(0, 'annual_plan', 20, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 20, '1, 2, 3, 4', 0),
(0, 'planning_results_framework', 20, '1, 2, 3, 4', 0),
(0, 'district_strategic_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_baseline_report', 18, '1, 2, 3, 4', 0),
(0, 'project_monthly_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'project_quarterly_report', 18, '1, 2, 3, 4', 0),
(0, 'project_midterm_evaluation_report', 18, '1, 2, 3, 4', 0),
(0, 'project_final_evaluation_report', 18, '1, 2, 3, 4', 0),
(0, 'activity_reports', 18, '1, 2, 3, 4', 0),
(0, 'mda_monthly_monitoring_reports', 18, '1, 2, 3, 4', 0),
(0, 'district_semi_annual_prgress_report', 18, '1, 2, 3, 4', 0),
(0, 'district_annual_prgress_report', 18, '1, 2, 3, 4', 0),
(0, 'regional_semi_annual_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'regional_annual_progress_reports', 18, '1, 2, 3, 4', 0),
(0, 'swg_annula_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_quarterly_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_annual_performance_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_puntland_annual_development_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_final_evaluation_reports', 18, '1, 2, 3, 4', 0),
(0, 'project_annual_implementation_plan', 18, '1, 2, 3, 4', 0),
(0, 'project_annual_me_plan', 18, '1, 2, 3, 4', 0),
(0, 'project_result_framework', 18, '1, 2, 3, 4', 0),
(0, 'project', 18, '1, 2, 3, 4', 0),
(0, 'district_annual_plan', 18, '1, 2, 3, 4', 0),
(0, 'annual_plan', 18, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 18, '1, 2, 3, 4', 0),
(0, 'planning_results_framework', 18, '1, 2, 3, 4', 0),
(0, 'district_strategic_plan', 18, '1, 2, 3, 4', 0),
(0, 'change_password', 18, '1, 2, 3, 4', 0),
(0, 'user_roles', 18, '1, 2, 3, 4', 0),
(0, 'user_rights', 18, '1, 2, 3, 4', 0),
(0, 'users', 18, '1, 2, 3, 4', 0),
(0, 'audit_trail', 18, '1, 2, 3, 4', 0),
(0, 'project_reports', 18, '1, 2, 3, 4', 0),
(0, 'district_reports', 18, '1, 2, 3, 4', 0),
(0, 'mda_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_reports', 18, '1, 2, 3, 4', 0),
(0, 'regional_reports', 18, '1, 2, 3, 4', 0),
(0, 'svg_reports', 18, '1, 2, 3, 4', 0),
(0, 'indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'activity_performance', 18, '1, 2, 3, 4', 0),
(0, 'district_indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'mda_indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_workplan_progress_report', 16, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'merl_framework', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_workplan_progress_report', 16, '1, 2, 3, 4', 0),
(0, 'project_outcome_journal_report', 16, '1, 2, 3, 4', 0),
(0, 'project_final_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project', 25, '1, 2, 3, 4', 0),
(0, 'project_quarterly_workplan_progress_reports', 16, '1, 2, 3, 4', 0),
(0, 'org_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'org_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'cases_database', 16, '1, 2, 3, 4', 0),
(0, 'org_quarterly_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'org_quarterly_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 16, '1, 2, 3, 4', 0),
(0, 'monitoring_visit_report', 16, '1, 2, 3, 4', 0),
(0, 'stratergic_quarterly_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'change_password', 16, '1, 2, 3, 4', 0),
(0, 'cases_overall', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report_county', 16, '1, 2, 3, 4', 0),
(0, 'cases_field_office', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report_national', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'stratergic_annual_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_schedule', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_activity_performance', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_activity_performance', 16, '1, 2, 3, 4', 0),
(0, 'review_narrative_reports', 16, '1, 2, 3, 4', 0),
(0, 'review_activity_reporting', 16, '1, 2, 3, 4', 0),
(0, 'review_indicator_tracking_reports', 16, '1, 2, 3, 4', 0),
(0, 'beneficiaries_report', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_plan', 16, '1, 2, 3, 4', 0),
(0, 'project', 16, '1, 2, 3, 4', 0),
(0, 'project_me_plan', 16, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'activity_reporting_tool', 16, '1, 2, 3, 4', 0),
(0, 'project_quarterly_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_implementation_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_annual_me_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_result_framework', 20, '1, 2, 3, 4', 0),
(0, 'project', 20, '1, 2, 3, 4', 0),
(0, 'district_annual_plan', 20, '1, 2, 3, 4', 0),
(0, 'annual_plan', 20, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 20, '1, 2, 3, 4', 0),
(0, 'planning_results_framework', 20, '1, 2, 3, 4', 0),
(0, 'district_strategic_plan', 20, '1, 2, 3, 4', 0),
(0, 'project_baseline_report', 18, '1, 2, 3, 4', 0),
(0, 'project_monthly_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'project_quarterly_report', 18, '1, 2, 3, 4', 0),
(0, 'project_midterm_evaluation_report', 18, '1, 2, 3, 4', 0),
(0, 'project_final_evaluation_report', 18, '1, 2, 3, 4', 0),
(0, 'activity_reports', 18, '1, 2, 3, 4', 0),
(0, 'mda_monthly_monitoring_reports', 18, '1, 2, 3, 4', 0),
(0, 'district_semi_annual_prgress_report', 18, '1, 2, 3, 4', 0),
(0, 'district_annual_prgress_report', 18, '1, 2, 3, 4', 0),
(0, 'regional_semi_annual_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'regional_annual_progress_reports', 18, '1, 2, 3, 4', 0),
(0, 'swg_annula_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_quarterly_progress_report', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_annual_performance_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_puntland_annual_development_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_final_evaluation_reports', 18, '1, 2, 3, 4', 0),
(0, 'project_annual_implementation_plan', 18, '1, 2, 3, 4', 0),
(0, 'project_annual_me_plan', 18, '1, 2, 3, 4', 0),
(0, 'project_result_framework', 18, '1, 2, 3, 4', 0),
(0, 'project', 18, '1, 2, 3, 4', 0),
(0, 'district_annual_plan', 18, '1, 2, 3, 4', 0),
(0, 'annual_plan', 18, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 18, '1, 2, 3, 4', 0),
(0, 'planning_results_framework', 18, '1, 2, 3, 4', 0),
(0, 'district_strategic_plan', 18, '1, 2, 3, 4', 0),
(0, 'change_password', 18, '1, 2, 3, 4', 0),
(0, 'user_roles', 18, '1, 2, 3, 4', 0),
(0, 'user_rights', 18, '1, 2, 3, 4', 0),
(0, 'users', 18, '1, 2, 3, 4', 0),
(0, 'audit_trail', 18, '1, 2, 3, 4', 0),
(0, 'project_reports', 18, '1, 2, 3, 4', 0),
(0, 'district_reports', 18, '1, 2, 3, 4', 0),
(0, 'mda_reports', 18, '1, 2, 3, 4', 0),
(0, 'mopedic_reports', 18, '1, 2, 3, 4', 0),
(0, 'regional_reports', 18, '1, 2, 3, 4', 0),
(0, 'svg_reports', 18, '1, 2, 3, 4', 0),
(0, 'indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'activity_performance', 18, '1, 2, 3, 4', 0),
(0, 'district_indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'mda_indicator_performance', 18, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_workplan_progress_report', 16, '1, 2, 3, 4', 0),
(0, 'project_semi_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'merl_framework', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_workplan_progress_report', 16, '1, 2, 3, 4', 0),
(0, 'project_outcome_journal_report', 16, '1, 2, 3, 4', 0),
(0, 'project_final_report', 16, '1, 2, 3, 4', 0),
(0, 'project_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'project', 25, '1, 2, 3, 4', 0),
(0, 'project_quarterly_workplan_progress_reports', 16, '1, 2, 3, 4', 0),
(0, 'org_annual_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'org_annual_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'cases_database', 16, '1, 2, 3, 4', 0),
(0, 'org_quarterly_indicator_tracking_report', 16, '1, 2, 3, 4', 0),
(0, 'org_quarterly_narrative_report', 16, '1, 2, 3, 4', 0),
(0, 'strategic_plans', 16, '1, 2, 3, 4', 0),
(0, 'monitoring_visit_report', 16, '1, 2, 3, 4', 0),
(0, 'stratergic_quarterly_indicator_performance', 16, '1, 2, 3, 4', 0),
(0, 'change_password', 16, '1, 2, 3, 4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_usergroups`
--

CREATE TABLE `ctbl_usergroups` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `base_id` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Adjacency List Reference Id',
  `title` varchar(100) NOT NULL DEFAULT '',
  `user_type` varchar(200) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctbl_usergroups`
--

INSERT INTO `ctbl_usergroups` (`id`, `base_id`, `title`, `user_type`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `status`, `flag`) VALUES
(22, 0, 'Donors', 'Viewer', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(23, 0, 'Development Partners', 'Viewer', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(24, 0, 'Project Reporting User', 'FAWE User', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(25, 0, 'Data Entry User', 'Implementing Partner', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(16, 0, 'FAWE M&E Staff', 'FAWE User', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(17, 0, 'FAWE Program', 'FAWE User', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(18, 0, 'FAWE Managers', 'FAWE User', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(19, 0, 'Executive Director', 'Viewer', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(20, 0, 'Chief of Party', 'Viewer', 1, '0000-00-00 00:00:00', 1, '2021-07-23 03:17:13', 0, 0),
(21, 0, 'Managing Committee', 'Viewer', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(26, 0, 'Program Officers', 'FAWE User', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0),
(27, 0, 'FAWE Administrator', 'FAWE User', 1, '0000-00-00 00:00:00', 1, '2021-08-17 03:42:29', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_users`
--

CREATE TABLE `ctbl_users` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL COMMENT 'organization id ',
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `contact_number` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `account_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `block` tinyint(4) NOT NULL,
  `failed_logins` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `flag` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updateby` int(11) NOT NULL,
  `updatetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_password_update` tinyint(4) DEFAULT -1,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `signature_password` varchar(300) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctbl_users`
--

INSERT INTO `ctbl_users` (`id`, `base_id`, `name`, `username`, `password`, `user_type`, `email`, `contact_number`, `usertype`, `account_type`, `user_group_id`, `block`, `failed_logins`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `flag`, `createdby`, `createtime`, `updateby`, `updatetime`, `check_password_update`, `photo`, `signature_password`, `created`, `online`) VALUES
(1, 0, 'Super Administrator', 'admin@super', '$2y$10$VLEvR6RbzhCIkSiDxXs6jOzbzPKyREwZcVUz.9VCVd2jrQPkXDtai', 'admin', 'mukesh@ubsgroup.me', '', 'deprecated', '', 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-09-16 10:29:09', 0, 0, '0000-00-00 00:00:00', 0, '2021-09-16 07:29:09', 1, '', '', '', 0),
(13, 0, 'Vikas Jha', 'FAWE@user', '$2y$10$3JKp0Qi80ns5H1HxPCIape/FM759v447bhYULQd8L7ZWhW4B8JtR2', 'FAWE User', 'vikas@ubsgroup.me', '9811971192', '', '', 16, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-09-16 10:30:00', 0, 1, '2021-05-27 02:35:35', 1, '2021-09-16 07:30:00', -1, '', '', '', 0),
(14, 0, 'Joseph', 'viewer@user', '$2y$10$ZMfEe6wMtL.2GjiZfyU6Ru0BgLVqpaN2xNQKjHJfxPdygc9MGjnKK', 'Viewer', 'joseph@mailinator.com', '880259950', '', '', 22, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-02 03:19:12', 0, 1, '2021-05-27 02:37:37', 1, '2021-08-02 04:19:12', -1, '', '', '', 0),
(15, 1, 'Bob Marlo', 'implementing@user', '$2y$10$tiCvEieR9wlIeMdgROPsA.aB99DNlv9xJap/c1kw6gBU9QsQDlR36', 'Implementing Partner', 'bob@mailinator.com', '9811526685', '', '', 25, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-02 03:13:18', 0, 1, '2021-05-27 02:38:51', 1, '2021-08-02 04:13:18', -1, '', '', '', 0),
(16, 0, 'Daniel', 'daniel123', '$2y$10$Jq6.Q83hBFSGB/o6CQQm7e4oeI.cNykzleJ12VoufoeB2xpUAJN/.', 'FAWE User', 'daniel@gmail.com', '0745296321', '', '', 16, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-07-14 09:01:40', 1, '2021-07-22 17:37:01', -1, '', '', '', 0),
(18, 0, 'Dennis Hombe', 'dennis.hombe', '$2y$10$TWY2C9spP8DgiZ8PHn3nMOFIBzTY6c6fLW3k.93kTVcg45MVAk1D6', 'FAWE User', 'dennis.hombe@FAWEkenya.org', '0721452527', '', '', 27, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-23 06:08:50', 0, 1, '2021-08-17 01:39:07', 1, '2021-08-23 07:08:50', -1, '', '', '', 0),
(19, 0, 'Dickson Githinji', 'dickson.githinji', '$2y$10$iiLjosty4PHArnZAoZdkmuWBxJsBUjsKjkbbsdzekCISxPNJCpwmy', 'FAWE User', 'githinji@FAWEkenya.org', '0720666125', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 00:37:25', 0, 1, '2021-08-17 01:44:07', 0, '2021-08-20 01:37:25', -1, '', '', '', 0),
(20, 0, 'Joshua Ayuo', 'joshua.ayuo', '$2y$10$qMtD7w10QVjSoIl732YG8eul4kD6KnZ0sG/c2EyhylpmqX3A5QaMa', 'FAWE User', 'joshua.ayuo@FAWEkenya.org', '', '', '', 18, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-30 05:01:48', 0, 1, '2021-08-17 02:00:06', 0, '2021-08-30 06:01:48', -1, '', '', '', 0),
(21, 0, 'Anne Motanya', 'anne.motanya', '$2y$10$Wp4ZFbDF3ETdmqxt/ur4meNu5ySJ5sccmlxy03xpbg6nBMN2RNo9m', 'FAWE User', 'anne.motanya@FAWEkenya.org', '', '', '', 16, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-26 05:40:24', 0, 1, '2021-08-17 02:00:52', 1, '2021-08-26 06:40:24', -1, '', '', '', 0),
(22, 0, 'Leah Mutumbu', 'leah.mutumbu', '$2y$10$rGXAF/qwOOr83h8kSnwXTOMBiXDNqcpycplJcwBS1YP9Eu5c1Ga3S', 'FAWE User', 'leah.mutumbu@FAWEkenya.org', '', '', '', 16, 0, 0, 1, 0, NULL, '0b1b7cdcdda87a5a306e89a9cd2f4aca', '2021-08-19 00:45:57', NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-08-17 02:02:18', 0, '2021-08-19 01:45:57', -1, '', '', '', 0),
(23, 0, 'Duncan Kiwara', 'duncan.kiwara', '$2y$10$F7Al.OJCee9qhYcznqNXzeBQiPxctUY1eELNbhW6Aprs/RyMWead.', 'FAWE User', 'duncan.kiwara@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-19 00:27:43', 0, 1, '2021-08-17 02:04:11', 0, '2021-08-19 01:27:43', -1, '', '', '', 0),
(24, 0, 'Elsie Milimu', 'elsie.milimu', '$2y$10$hVu6t1fAlsIvjeeTUOFiWuIBLbys52slF.KnJOJ5AxtnY36Egyd1i', 'FAWE User', 'elsie.milimu@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-23 08:43:18', 0, 1, '2021-08-17 02:05:38', 0, '2021-08-23 09:43:18', -1, '', '', '', 0),
(25, 0, 'Joy Bigambo', 'joy.bigambo', '$2y$10$HNNr7mDAqJT/HCbks7iYE.EE9ypwXaodeUZ6sJXRcPAyvj7KPvqxG', 'FAWE User', 'joy.bigambo@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-08-17 02:06:58', 0, '2021-08-17 03:06:58', -1, '', '', '', 0),
(26, 0, 'Isabella Mwangi', 'isabella.mwangi', '$2y$10$ohisi9nhcTFhbAaW7QS6x.AxRMyjart3s1qMVJKl3bJXEMoKmTd9m', 'FAWE User', 'isabella.mwangi@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-08-17 02:07:51', 0, '2021-08-17 03:07:51', -1, '', '', '', 0),
(27, 0, 'Veronica Komutho', 'veronica.komutho', '$2y$10$AstiJLiSrvuprzC3p5PEY.PEutYgNFqXZ347.q6gQUzd85A3.vD2.', 'FAWE User', 'veronica@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-23 01:31:07', 0, 1, '2021-08-17 02:09:01', 0, '2021-08-23 02:31:07', -1, '', '', '', 0),
(28, 0, 'William Mbanyamlenge', 'william.mbanyamlenge', '$2y$10$7e6Qhgok2UC7Dk751E78gelSZYzeggFz9VEWE2L5cCjIYj0Delvn2', 'FAWE User', 'william@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:03:08', 0, 1, '2021-08-17 02:16:06', 0, '2021-08-20 02:03:08', -1, '', '', '', 0),
(29, 0, 'Jamila Gacheri', 'jamila.gacheri', '$2y$10$8j6Hc7fA18catSWPLZQCHO3RUVMlO1p4shgj7Ch9GsK7VaJC4fmEC', 'FAWE User', 'jamila.gacheri@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:11:59', 0, 1, '2021-08-17 02:17:13', 0, '2021-08-20 02:11:59', -1, '', '', '', 0),
(30, 0, 'Naima Abdikadir', 'naima.abdikadir', '$2y$10$ZCcAUd0VrSLFmv2B8RHzDu8kOJ44EoGjgRgJv9ycE/5GaDs1lI/MO', 'FAWE User', 'naima@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:31:56', 0, 1, '2021-08-17 02:18:17', 0, '2021-08-20 02:31:56', -1, '', '', '', 0),
(31, 0, 'Naima Ali', 'naima.ali', '$2y$10$4hjrPbp2Z9dhB55siuU8ZO63xBfrN0HD3zpm752yF26AOVwwSil1W', 'FAWE User', 'naima.ali@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-08-17 02:19:15', 0, '2021-08-17 03:19:15', -1, '', '', '', 0),
(32, 0, 'Jane Njoki', 'jane.njoki', '$2y$10$rX14nwszUhZaVGmvBqUIyu3h6XIrVWb9LP2lrxidIYPezfu7ZIAVa', 'FAWE User', 'jane@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', 0, 1, '2021-08-17 02:20:05', 0, '2021-08-17 03:20:05', -1, '', '', '', 0),
(33, 0, 'Stephen Kioko', 'stephen.kioko', '$2y$10$zT/9/6Ih6zmE6215uogx..Lnyxgt1VEjciIC0ilZ6obT90O2U5mIC', 'FAWE User', 'kioko.stephen@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:02:27', 0, 1, '2021-08-17 02:21:16', 0, '2021-08-20 02:02:27', -1, '', '', '', 0),
(34, 0, 'Moses Okello', 'moses.okello', '$2y$10$rodQJ2dv5GThJuxalLgS..qZSAyod9KF2NrsWrlFOZ.DMGfeqj1me', 'FAWE User', 'moses.okello@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:01:24', 0, 1, '2021-08-17 02:22:37', 0, '2021-08-20 02:01:24', -1, '', '', '', 0),
(35, 0, 'George Meme', 'george.meme', '$2y$10$e8jPQXCYfOkTrQmAgDYdnO5Ho4UwZIVTgfxomR.CQQfPlfiAJcGma', 'FAWE User', 'meme.george@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 00:11:08', 0, 1, '2021-08-17 02:24:04', 0, '2021-08-20 01:11:08', -1, '', '', '', 0),
(36, 0, 'Grace Katee', 'grace.katee', '$2y$10$a./ej4jyHf8bozuBgdPUleXgqGOnIM2Pp5tm1iNUaS6zgBx/zeZnO', 'FAWE User', 'grace.katee@FAWEkenya.org', '', '', '', 26, 0, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, '1', '2021-08-20 01:29:13', 0, 1, '2021-08-17 03:44:49', 0, '2021-08-20 02:29:13', -1, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_users_autologin`
--

CREATE TABLE `ctbl_users_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_users_cookies`
--

CREATE TABLE `ctbl_users_cookies` (
  `id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_users_login_attempts`
--

CREATE TABLE `ctbl_users_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_users_profiles`
--

CREATE TABLE `ctbl_users_profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_user_access_model`
--

CREATE TABLE `ctbl_user_access_model` (
  `id` int(11) NOT NULL,
  `modelname` text NOT NULL,
  `model_var` text NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ctbl_user_access_model`
--

INSERT INTO `ctbl_user_access_model` (`id`, `modelname`, `model_var`, `group_name`, `permission`, `order_id`, `flag`) VALUES
(1, 'Counties', 'counties', 'System Configuration', '1,2,3', 1, 0),
(46, 'Reporting->Quarterly Report->Narrative Report', 'project_quarterly_narrative_report', 'Project Data', '1,2,3', 3, 0),
(45, 'Reporting->Cases Database', 'cases_database', 'Organizational Data', '1,2,3', 2, 0),
(44, 'Reporting->Monitoring Visit Report', 'monitoring_visit_report', 'Organizational Data', '1,2,3', 2, 0),
(97, 'Reporting->Beneficiaries Report', 'beneficiaries_report', 'Project Data', '1,2,3', 3, 0),
(43, 'Reporting->Annual Report->Indicator Tracking Report', 'org_annual_indicator_tracking_report', 'Organizational Data', '1,2,3', 2, 0),
(42, 'Reporting->Annual Report->Narrative Report', 'org_annual_narrative_report', 'Organizational Data', '1,2,3', 2, 0),
(41, 'Reporting->quarterly->Indicator Tracking Report', 'org_quarterly_indicator_tracking_report', 'Organizational Data', '1,2,3', 2, 0),
(40, 'Reporting->quarterly->Narrative Report', 'org_quarterly_narrative_report', 'Organizational Data', '1,2,3', 2, 0),
(39, 'Planning->MERL Framework', 'merl_framework', 'Organizational Data', '1,2,3', 2, 0),
(38, 'Planning->Strategic Plans', 'strategic_plans', 'Organizational Data', '1,2,3', 2, 0),
(37, 'Units', 'unit', 'System Configuration', '1,2,3', 1, 0),
(36, 'Dimensions', 'dimensions', 'System Configuration', '1,2,3', 1, 0),
(35, 'Implementing Partner', 'implementing_partner', 'System Configuration', '1,2,3', 1, 0),
(47, 'Reporting->Quarterly Report->Indicator Tracking Report', 'project_quarterly_indicator_tracking_report', 'Project Data', '1,2,3', 3, 0),
(48, 'Reporting->Quarterly Report->Workplan Progress Report', 'project_quarterly_workplan_progress_reports', 'Project Data', '1,2,3', 3, 0),
(49, 'Reporting->Semi-Annual Report->Narrative Report', 'project_semi_annual_narrative_report', 'Project Data', '1,2,3', 3, 0),
(50, 'Reporting->Semi-Annual Report->Indicator Tracking Report', 'project_semi_annual_indicator_tracking_report', 'Project Data', '1,2,3', 3, 0),
(51, 'Reporting->Semi-Annual Report->Workplan Progress Report', 'project_semi_annual_workplan_progress_report', 'Project Data', '1,2,3', 3, 0),
(52, 'Reporting->Annual Report->Narrative Report', 'project_annual_narrative_report', 'Project Data', '1,2,3', 3, 0),
(53, 'Reporting->Annual Report->Indicator Tracking Report', 'project_annual_indicator_tracking_report', 'Project Data', '1,2,3', 3, 0),
(54, 'Reporting->Annual Report->Workplan Progress Report', 'project_annual_workplan_progress_report', 'Project Data', '1,2,3', 3, 0),
(55, 'Reporting->Final Report', 'project_final_report', 'Project Data', '1,2,3', 3, 0),
(62, 'Change password', 'change_password', 'User Management', '1,2,3', 10, 0),
(63, 'Manage User Roles', 'user_roles', 'User Management', '1,2,3', 10, 0),
(64, 'Manage User Rights', 'user_rights', 'User Management', '1,2,3', 10, 0),
(65, 'Manage Users', 'users', 'User Management', '1,2,3', 10, 0),
(66, 'Funding Partner', 'funding_partner', 'System Configuration', '1,2,3', 1, 0),
(67, 'Field Office', 'field_office', 'System Configuration', '1,2,3', 1, 0),
(69, 'Currency', 'currency', 'System Configuration', '1,2,3', 1, 0),
(70, 'Planning->Project Background', 'project', 'Project Data', '1,2,3', 3, 0),
(71, 'Stratergic Report->Annual Indicator Performance', 'stratergic_annual_indicator_performance', 'Access System Reports', '1,2,3', 5, 0),
(72, 'Stratergic Report->Quarterly Indicator Performance', 'stratergic_quarterly_indicator_performance', 'Access System Reports', '1,2,3', 5, 0),
(73, 'Project Report->Annual Indicator Performance', 'project_annual_indicator_performance', 'Access System Reports', '1,2,3', 5, 0),
(74, 'Project Report->Quarterly Indicator Performance', 'project_quarterly_indicator_performance', 'Access System Reports', '1,2,3', 5, 0),
(75, 'Project Report->Annual Activity Performance', 'project_annual_activity_performance', 'Access System Reports', '1,2,3', 5, 0),
(76, 'Project Report->Quarterly Activity Performance', 'project_quarterly_activity_performance', 'Access System Reports', '1,2,3', 5, 0),
(77, 'Project Report->Project Schedule Report\n', 'project_schedule', 'Access System Reports', '1,2,3', 5, 0),
(98, 'Beneficiaries Report – County', 'beneficiaries_report_county', 'Access System Reports', '1,2,3', 5, 0),
(79, 'Cases Database Report – County', 'cases_field_office', 'Access System Reports', '1,2,3', 5, 0),
(80, 'Cases Database Report – National', 'cases_overall', 'Access System Reports', '1,2,3', 5, 0),
(81, 'Audit Trail', 'audit_trail', 'User Management', '1,2,3', 10, 0),
(84, 'Planning->Project M&E\n Plan', 'project_me_plan', 'Project Data', '1,2,3', 3, 0),
(85, 'Planning->Project Annual Plan', 'project_annual_plan', 'Project Data', '1,2,3', 3, 0),
(96, 'Reporting->Outcome Journal Report', 'project_outcome_journal_report', 'Project Data', '1,2,3', 3, 0),
(99, 'Beneficiaries Report – National', 'beneficiaries_report_national', 'Access System Reports', '1,2,3', 5, 0),
(100, 'Reporting->Activity Reporting Tool', 'activity_reporting_tool', 'Project Data', '1,2,3', 3, 0),
(101, 'Review Activity Reporting', 'review_activity_reporting', 'Review/Approve', '1,2,3', 4, 0),
(102, 'Review Narrative Report', 'review_narrative_reports', 'Review/Approve', '1,2,3', 4, 0),
(103, 'Review Indicator Tracking Report', 'review_indicator_tracking_reports', 'Review/Approve', '1,2,3', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ctbl_viewlevels`
--

CREATE TABLE `ctbl_viewlevels` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key',
  `title` varchar(100) NOT NULL DEFAULT '',
  `ordering` int(11) NOT NULL DEFAULT 0,
  `rules` varchar(5120) NOT NULL COMMENT 'JSON encoded access control.'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `field_office`
--

CREATE TABLE `field_office` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field_office`
--

INSERT INTO `field_office` (`id`, `base_id`, `name`, `contact_person`, `contact_email`, `phone`, `createdby`, `updatedby`, `createdtime`, `updatedtime`, `flag`) VALUES
(2, 0, 'Kibera Office', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 0, 'Lindi Office', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 0, 'Mombasa Office', '', '', '', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `final_evaluation_report`
--

CREATE TABLE `final_evaluation_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `funding_partner`
--

CREATE TABLE `funding_partner` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funding_partner`
--

INSERT INTO `funding_partner` (`id`, `base_id`, `name`, `contact_person`, `contact_email`, `phone`, `createdby`, `updatedby`, `createdtime`, `updatedtime`, `flag`) VALUES
(1, 0, 'World Bank', 'Jacob', 'jacob@mailinator.com', '+4578596352', 1, 1, '0000-00-00 00:00:00', '2021-06-05 01:22:08', 0),
(2, 0, 'USAID', 'Rob', 'rob@gmail.com', '+65489563274', 1, 1, '0000-00-00 00:00:00', '2021-06-05 01:23:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `implementing_partner`
--

CREATE TABLE `implementing_partner` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization_name` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `implementing_partner`
--

INSERT INTO `implementing_partner` (`id`, `base_id`, `name`, `organization_name`, `contact_person`, `contact_email`, `createdby`, `updatedby`, `createdtime`, `updatedtime`, `flag`) VALUES
(1, 0, 'AU', NULL, NULL, NULL, 3, 1, '0000-00-00 00:00:00', '2021-05-11 04:44:23', 0),
(4, 0, 'UBS Group', 'United Business Solutions Ltd.', 'Vikas', 'vikas@ubsgroup.me', 1, 1, '0000-00-00 00:00:00', '2021-07-23 03:28:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `import_activities`
--

CREATE TABLE `import_activities` (
  `id` int(11) NOT NULL,
  `activity_code` varchar(255) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `dimension_value_type` varchar(255) DEFAULT NULL,
  `totaling` varchar(255) DEFAULT NULL,
  `blocked` varchar(100) DEFAULT NULL,
  `main_project` varchar(255) DEFAULT NULL,
  `main_activity` varchar(255) DEFAULT NULL,
  `deffered_income_account` varchar(255) DEFAULT NULL,
  `grant_payable_accounts` varchar(255) DEFAULT NULL,
  `leave_activity` varchar(255) DEFAULT NULL,
  `status` enum('0','1','','') DEFAULT NULL,
  `createdtime` datetime DEFAULT NULL,
  `updatedtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import_activities`
--

INSERT INTO `import_activities` (`id`, `activity_code`, `activity_name`, `dimension_value_type`, `totaling`, `blocked`, `main_project`, `main_activity`, `deffered_income_account`, `grant_payable_accounts`, `leave_activity`, `status`, `createdtime`, `updatedtime`) VALUES
(1, 'WVCFD', 'ADVANCES', 'Standard', '', 'No', 'WL.121', '', '', NULL, 'No', '0', '2021-08-12 00:17:10', NULL),
(2, 'ADMIN1', 'ADMINISTRATIVE', 'Begin-Total', '', 'No', 'ATJ.102', '', '', NULL, 'No', '0', '2021-08-12 00:20:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `import_activities_data`
--

CREATE TABLE `import_activities_data` (
  `id` int(11) NOT NULL,
  `budget_name` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `account_no` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `donor_code` varchar(255) DEFAULT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `activity_code` varchar(255) DEFAULT NULL,
  `county_code` varchar(255) DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `entry_no` int(11) NOT NULL,
  `status` enum('0','1','','') DEFAULT NULL,
  `createdtime` datetime DEFAULT NULL,
  `updatedtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `import_activities_data`
--

INSERT INTO `import_activities_data` (`id`, `budget_name`, `date`, `account_no`, `description`, `donor_code`, `project_code`, `activity_code`, `county_code`, `amount`, `entry_no`, `status`, `createdtime`, `updatedtime`) VALUES
(1, 'BUDGET', '2021-01-01', '100.04.058', 'Imported from Excel 13/04/21', '', 'WL.121', 'WVCFD', '', 37500000, 2584, '', '2021-07-26 07:17:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mas_county`
--

CREATE TABLE `mas_county` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mas_county`
--

INSERT INTO `mas_county` (`id`, `name`, `createdby`, `createdtime`, `updatedby`, `updatedtime`) VALUES
(1, 'Baringo', 42, '2020-01-23 04:01:52', 1, '2021-05-25 02:08:11'),
(2, 'Bomet', 42, '2020-01-23 04:01:52', 0, '0000-00-00 00:00:00'),
(3, 'Bungoma', 42, '2020-01-23 04:01:52', 0, '0000-00-00 00:00:00'),
(4, 'Busia', 42, '2020-01-23 04:01:52', 0, '0000-00-00 00:00:00'),
(5, 'Elgeyo Marakwet', 42, '2020-01-23 04:01:52', 0, '0000-00-00 00:00:00'),
(6, 'Embu', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(7, 'Garissa', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(8, 'Homa Bay', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(9, 'Isiolo', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(10, 'Kajiado', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(11, 'Kakamega', 42, '2020-01-30 09:01:15', 0, '0000-00-00 00:00:00'),
(12, 'Kericho', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(13, 'Kiambu', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(14, 'Kilifi', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(15, 'Kirinyaga', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(16, 'Kisii', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(17, 'Kisumu', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(18, 'Kitui', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(19, 'Kwale', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(20, 'Laikipia', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(21, 'Lamu', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(22, 'Machakos', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(23, 'Makueni', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(24, 'Mandera', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(25, 'Meru', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(26, 'Migori', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(27, 'Marsabit', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(28, 'Mombasa', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(29, 'Murang\'a', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(30, 'Nairobi', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(31, 'Nakuru', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(32, 'Nandi', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(33, 'Narok', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(34, 'Nyamira', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(35, 'Nyandarua', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(36, 'Nyeri', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(37, 'Samburu', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(38, 'Siaya', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(39, 'Taita Taveta', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(40, 'Tana River', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(41, 'Tharaka Nithi', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(42, 'Trans Nzoia', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(43, 'Turkana', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(44, 'Uasin Gishu', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(45, 'Vihiga', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(46, 'Wajir', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00'),
(47, 'West Pokot', 42, '2020-01-30 09:01:34', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mas_currency`
--

CREATE TABLE `mas_currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_currency`
--

INSERT INTO `mas_currency` (`id`, `name`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `flag`) VALUES
(1, 'USD', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'KSHS', 1, '0000-00-00 00:00:00', 1, '2021-07-19 10:29:36', 0),
(3, 'UGX', 1, '0000-00-00 00:00:00', 1, '2021-05-01 10:12:32', 0),
(4, 'TSHS', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_dimensions`
--

CREATE TABLE `mas_dimensions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_dimensions`
--

INSERT INTO `mas_dimensions` (`id`, `name`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `flag`) VALUES
(2, 'Width', 1, '0000-00-00 00:00:00', 1, '2021-05-25 02:46:23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_district`
--

CREATE TABLE `mas_district` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_district`
--

INSERT INTO `mas_district` (`id`, `code`, `name`, `region`, `latitude`, `longitude`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `flag`) VALUES
(38, '', 'Bosaso', 41, '10.627240', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(39, '', 'Ufayn', 41, '10.652270', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(40, '', 'Hafun', 41, '9.465530', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(41, '', 'Bali dhidin', 41, '11.365530', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '', 'Iskushuban', 41, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(43, '', 'Carmo', 41, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '', 'Qandala', 41, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(45, '', 'Las qoray', 42, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '', 'Badhan', 42, '50.391', '10.881', 1, '0000-00-00 00:00:00', 1, '2021-04-06 03:44:02', 0),
(47, '', 'Yube', 42, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(48, '', 'Gardo', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(49, '', 'Waciye', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(50, '', 'Bender bayla', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '', 'Xumbays', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '', 'Rako', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '', 'dhudhub', 44, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '', 'Dhahar', 46, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '', 'xingalool', 46, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(56, '', 'Buraan', 46, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(57, '', 'Garowe', 51, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(58, '', 'Eyl', 51, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(59, '', 'Dangorayo', 51, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(60, '', 'Burtinle', 51, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(61, '', 'Godob jiran', 51, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(62, '', 'Galkayo', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, '', 'Xarfo', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, '', 'Galdogob', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, '', 'Saaxo', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, '', 'Jariiban', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, '', 'Bur salah', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(68, '', 'Towfiiq', 52, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(69, '', 'Baargaal', 53, '51.077', '11.284', 1, '0000-00-00 00:00:00', 1, '2021-04-06 03:43:13', 0),
(70, '', 'Caluula', 53, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(71, '', 'murcanyo', 53, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(72, '', 'gumbax', 53, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(73, '', 'bareeda', 53, '51.0635', '11.8704', 1, '0000-00-00 00:00:00', 1, '2021-04-06 03:44:57', 0),
(74, '', 'Taleex ', 54, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(75, '', 'Xudun', 54, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(76, '', 'Boocame', 54, '47.934', '8.399', 1, '0000-00-00 00:00:00', 1, '2021-04-06 03:46:26', 0),
(77, '', 'Buuhoodle', 55, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(78, '', 'Widhwidh', 55, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(79, '', 'Horufadhi', 55, '0', '49.608700', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(81, '', 'Qardho', 44, '2', '2', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_region`
--

CREATE TABLE `mas_region` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `region` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_region`
--

INSERT INTO `mas_region` (`id`, `code`, `region`, `latitude`, `longitude`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `flag`) VALUES
(41, '', 'Bari', '', '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(42, '', 'Sanaag', '', '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(44, '', 'Karkaar', '', '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(46, '', 'Haylaan', '', '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(51, '', 'Nugaal', '', '', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(52, '', 'Mudug', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(53, '', 'Gardafuu', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(54, '', 'Sool', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(55, '', 'Cayn', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mas_unit`
--

CREATE TABLE `mas_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedby` int(11) NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mas_unit`
--

INSERT INTO `mas_unit` (`id`, `name`, `createdby`, `createdtime`, `updatedby`, `updatedtime`, `flag`) VALUES
(1, 'Percentage', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'KSHS', 1, '0000-00-00 00:00:00', 1, '2021-07-19 10:28:20', 0),
(3, 'USD', 1, '0000-00-00 00:00:00', 1, '2021-05-01 10:12:32', 0),
(4, 'Kgs', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 'Days', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 'Number', 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_visit_report`
--

CREATE TABLE `monitoring_visit_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `program` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `completed_by` varchar(255) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `objectives` text DEFAULT NULL,
  `next_visit_completed_by` varchar(255) DEFAULT NULL,
  `next_visit_location` varchar(255) DEFAULT NULL,
  `next_visit_date` date DEFAULT NULL,
  `next_visit_objectives` text DEFAULT NULL,
  `photos` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_visit_report_agenda_map`
--

CREATE TABLE `monitoring_visit_report_agenda_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `agenda_date` date DEFAULT NULL,
  `agenda_venue` text DEFAULT NULL,
  `agenda_activity` text DEFAULT NULL,
  `agenda_category` text DEFAULT NULL,
  `agenda_male` int(11) NOT NULL,
  `agenda_female` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_visit_report_issue_action_map`
--

CREATE TABLE `monitoring_visit_report_issue_action_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `issue_identified` text DEFAULT NULL,
  `actions` text DEFAULT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_monitoring_report`
--

CREATE TABLE `monthly_monitoring_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `strategic_plan_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `indicator1` varchar(255) NOT NULL,
  `indicator2` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_progress_report`
--

CREATE TABLE `monthly_progress_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `objective_indicator_target`
--

CREATE TABLE `objective_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_annual_indicator_tracking_report`
--

CREATE TABLE `org_annual_indicator_tracking_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `strategic_plan` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_annual_indicator_tracking_report_map`
--

CREATE TABLE `org_annual_indicator_tracking_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_annual_narrative_report`
--

CREATE TABLE `org_annual_narrative_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `strategic_plan` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `key_highlights` text DEFAULT NULL,
  `challenges_experienced` text DEFAULT NULL,
  `success_stories` text DEFAULT NULL,
  `activities_anticipated` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_data_strategic_plans_workflow`
--

CREATE TABLE `org_data_strategic_plans_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `plan_name` varchar(200) NOT NULL,
  `startyear` int(11) NOT NULL,
  `endyear` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_intervention_indicator`
--

CREATE TABLE `org_intervention_indicator` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `intervention_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `indicator_category` varchar(255) DEFAULT NULL,
  `mov` text DEFAULT NULL,
  `risks_assumptions` text DEFAULT NULL,
  `unit` int(11) NOT NULL DEFAULT 0,
  `baseline` int(11) NOT NULL DEFAULT 0,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_intervention_indicator_target`
--

CREATE TABLE `org_intervention_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_narrative_report_documents`
--

CREATE TABLE `org_narrative_report_documents` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `documents` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_objective`
--

CREATE TABLE `org_objective` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `th_area_id` int(11) NOT NULL,
  `strategic_objective` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_objective_indicator`
--

CREATE TABLE `org_objective_indicator` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `objective_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `indicator_category` varchar(255) DEFAULT NULL,
  `mov` text DEFAULT NULL,
  `risks_assumptions` text DEFAULT NULL,
  `unit` int(11) DEFAULT 0,
  `baseline` int(11) DEFAULT 0,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_quarterly_indicator_tracking_report`
--

CREATE TABLE `org_quarterly_indicator_tracking_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `strategic_plan` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_quarterly_indicator_tracking_report_map`
--

CREATE TABLE `org_quarterly_indicator_tracking_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_quarterly_narrative_report`
--

CREATE TABLE `org_quarterly_narrative_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `strategic_plan` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `quarter` varchar(200) DEFAULT NULL,
  `key_highlights` text DEFAULT NULL,
  `challenges_experienced` text DEFAULT NULL,
  `success_stories` text DEFAULT NULL,
  `activities_anticipated` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_strategic_intervention`
--

CREATE TABLE `org_strategic_intervention` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `objective_id` int(200) NOT NULL,
  `strat_interven_name` varchar(255) NOT NULL,
  `strat_interven_category` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `org_thematic_area`
--

CREATE TABLE `org_thematic_area` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `mda_plan_id` int(200) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `funding_partner` int(11) DEFAULT NULL,
  `project_budget` varchar(500) DEFAULT NULL,
  `budget_currency` int(11) NOT NULL,
  `reporting_schedule` varchar(255) DEFAULT NULL,
  `rs_monthly_jan` varchar(255) DEFAULT NULL,
  `rs_monthly_jan_date` int(11) DEFAULT NULL,
  `rs_monthly_feb` varchar(255) DEFAULT NULL,
  `rs_monthly_feb_date` int(11) DEFAULT NULL,
  `rs_monthly_mar` varchar(255) DEFAULT NULL,
  `rs_monthly_mar_date` int(11) DEFAULT NULL,
  `rs_monthly_apr` varchar(255) DEFAULT NULL,
  `rs_monthly_apr_date` int(11) DEFAULT NULL,
  `rs_monthly_may` varchar(255) DEFAULT NULL,
  `rs_monthly_may_date` int(11) DEFAULT NULL,
  `rs_monthly_june` varchar(255) DEFAULT NULL,
  `rs_monthly_june_date` int(11) DEFAULT NULL,
  `rs_monthly_july` varchar(255) DEFAULT NULL,
  `rs_monthly_july_date` int(11) DEFAULT NULL,
  `rs_monthly_aug` varchar(255) DEFAULT NULL,
  `rs_monthly_aug_date` int(11) DEFAULT NULL,
  `rs_monthly_sep` varchar(255) DEFAULT NULL,
  `rs_monthly_sep_date` int(11) DEFAULT NULL,
  `rs_monthly_oct` varchar(255) DEFAULT NULL,
  `rs_monthly_oct_date` int(11) DEFAULT NULL,
  `rs_monthly_nov` varchar(255) DEFAULT NULL,
  `rs_monthly_nov_date` int(11) DEFAULT NULL,
  `rs_monthly_dec` varchar(255) DEFAULT NULL,
  `rs_monthly_dec_date` int(11) DEFAULT NULL,
  `rs_quarterly_q1_month` varchar(255) DEFAULT NULL,
  `rs_quarterly_q1_month_date` int(11) DEFAULT NULL,
  `rs_quarterly_q2_month` varchar(255) DEFAULT NULL,
  `rs_quarterly_q2_month_date` int(11) DEFAULT NULL,
  `rs_quarterly_q3_month` varchar(255) DEFAULT NULL,
  `rs_quarterly_q3_month_date` int(11) DEFAULT NULL,
  `rs_quarterly_q4_month` varchar(255) DEFAULT NULL,
  `rs_quarterly_q4_month_date` int(11) DEFAULT NULL,
  `rs_biannual1_month` varchar(255) DEFAULT NULL,
  `rs_biannual1_month_date` int(11) DEFAULT NULL,
  `rs_biannual2_month` varchar(255) DEFAULT NULL,
  `rs_biannual2_month_date` int(11) DEFAULT NULL,
  `rs_annual_month` varchar(255) DEFAULT NULL,
  `rs_annual_month_date` int(11) DEFAULT NULL,
  `person_responsible` int(11) NOT NULL,
  `implementing_partner` int(11) NOT NULL,
  `project_status` varchar(255) NOT NULL,
  `report_submission_date` date DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `project_category` varchar(255) DEFAULT NULL,
  `sector` int(11) DEFAULT NULL,
  `program` int(11) DEFAULT NULL,
  `project` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `budget` decimal(25,2) DEFAULT NULL,
  `lead_mda` int(11) DEFAULT NULL,
  `coordinator` int(11) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity`
--

CREATE TABLE `project_activity` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_name` varchar(255) NOT NULL,
  `activity_code` varchar(255) DEFAULT NULL,
  `q1_plan` int(11) DEFAULT NULL,
  `q2_plan` int(11) DEFAULT NULL,
  `q3_plan` int(11) DEFAULT NULL,
  `q4_plan` int(11) DEFAULT NULL,
  `q1_budget` bigint(20) DEFAULT NULL,
  `q2_budget` bigint(20) DEFAULT NULL,
  `q3_budget` bigint(20) DEFAULT NULL,
  `q4_budget` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity_annual_budget_map`
--

CREATE TABLE `project_activity_annual_budget_map` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `annual_plan` int(11) NOT NULL,
  `annul_budget` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity_annual_implementation_plan`
--

CREATE TABLE `project_activity_annual_implementation_plan` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `q1_plan` int(11) DEFAULT NULL,
  `q2_plan` int(11) DEFAULT NULL,
  `q3_plan` int(11) DEFAULT NULL,
  `q4_plan` int(11) DEFAULT NULL,
  `q1_budget` bigint(20) DEFAULT NULL,
  `q2_budget` bigint(20) DEFAULT NULL,
  `q3_budget` bigint(20) DEFAULT NULL,
  `q4_budget` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity_annual_plan`
--

CREATE TABLE `project_activity_annual_plan` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `quarter` varchar(50) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `plan` int(11) NOT NULL,
  `budget` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity_reports`
--

CREATE TABLE `project_activity_reports` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_activity_reports_map`
--

CREATE TABLE `project_activity_reports_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `budget` varchar(250) DEFAULT NULL,
  `expenses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_indicator_tracking_report`
--

CREATE TABLE `project_annual_indicator_tracking_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_indicator_tracking_report_map`
--

CREATE TABLE `project_annual_indicator_tracking_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_me_plan`
--

CREATE TABLE `project_annual_me_plan` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `mande_plan_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `q1` decimal(25,2) NOT NULL,
  `q2` decimal(25,2) NOT NULL,
  `q3` decimal(25,2) NOT NULL,
  `q4` decimal(25,2) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_me_plan_workflow`
--

CREATE TABLE `project_annual_me_plan_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) DEFAULT NULL,
  `year` varchar(200) NOT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_narrative_report`
--

CREATE TABLE `project_annual_narrative_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `key_highlights` text DEFAULT NULL,
  `challenges_experienced` text DEFAULT NULL,
  `success_stories` text DEFAULT NULL,
  `activities_anticipated` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_annual_narrative_report`
--

INSERT INTO `project_annual_narrative_report` (`id`, `base_id`, `project`, `year`, `key_highlights`, `challenges_experienced`, `success_stories`, `activities_anticipated`, `file`, `createdby`, `updatedby`, `createtime`, `updatedtime`, `flag`) VALUES
(1, 0, 7, 2021, '<p>dsd</p>', '<p>sdfsdf</p>', '<p>sdfsdf</p>', '<p>sdfsdfsdf</p>', '1628496291_17d0968113eacbf1f87f.xlsx', 13, 13, '2021-07-18 04:08:52', '2021-08-09 03:04:51', 0),
(2, 0, 7, 2022, '<p>asasdasd</p>', '<p>asasasdasas</p>', '<p>asdasd</p>', '<p>asdasdds</p>', NULL, 13, 13, '2021-09-11 02:02:31', '2021-09-11 02:03:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_plan_workflow`
--

CREATE TABLE `project_annual_plan_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) DEFAULT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_workplan_progress_report`
--

CREATE TABLE `project_annual_workplan_progress_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_annual_workplan_progress_report_mapping`
--

CREATE TABLE `project_annual_workplan_progress_report_mapping` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `budget` varchar(255) NOT NULL,
  `expenses` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_baseline_report`
--

CREATE TABLE `project_baseline_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_beneficiaries_report`
--

CREATE TABLE `project_beneficiaries_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `reporting_period` varchar(255) DEFAULT NULL,
  `county` int(11) DEFAULT NULL,
  `type_beneficiaries` varchar(255) DEFAULT NULL,
  `indirect_beneficiaries` bigint(20) NOT NULL,
  `pwds_male` bigint(20) NOT NULL,
  `pwds_female` bigint(20) NOT NULL,
  `lgbtq_male` bigint(20) NOT NULL,
  `lgbtq_female` bigint(20) NOT NULL,
  `age_0_to_17_male` bigint(20) NOT NULL,
  `age_0_to_17_female` bigint(20) NOT NULL,
  `age_18_to_24_male` bigint(20) NOT NULL,
  `age_18_to_24_female` bigint(20) NOT NULL,
  `age_25_to_49_male` bigint(20) NOT NULL,
  `age_25_to_49_female` bigint(20) NOT NULL,
  `age_50_plus_male` bigint(20) NOT NULL,
  `age_50_plus_female` bigint(20) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_goal`
--

CREATE TABLE `project_goal` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_goal_indicator`
--

CREATE TABLE `project_goal_indicator` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `indicator_category` varchar(255) DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `means_of_verification` text NOT NULL,
  `baseline` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `year1` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `year3` varchar(255) NOT NULL,
  `year4` varchar(255) NOT NULL,
  `year5` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_goal_indicator_target`
--

CREATE TABLE `project_goal_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_implementation_plan_workflow`
--

CREATE TABLE `project_implementation_plan_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) DEFAULT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_indicator`
--

CREATE TABLE `project_indicator` (
  `id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `means_of_verification` text NOT NULL,
  `baseline` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `year1` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `year3` varchar(255) NOT NULL,
  `year4` varchar(255) NOT NULL,
  `year5` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_indicator_target`
--

CREATE TABLE `project_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_map_county`
--

CREATE TABLE `project_map_county` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `county_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_map_district`
--

CREATE TABLE `project_map_district` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_map_region`
--

CREATE TABLE `project_map_region` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_map_thematic_area`
--

CREATE TABLE `project_map_thematic_area` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `thematic_area_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_me_plan_workflow`
--

CREATE TABLE `project_me_plan_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) DEFAULT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_midterm_evaluation_report`
--

CREATE TABLE `project_midterm_evaluation_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_monthly_progress_report_map`
--

CREATE TABLE `project_monthly_progress_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `target` varchar(250) DEFAULT NULL,
  `achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_narrative_report_documents`
--

CREATE TABLE `project_narrative_report_documents` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `documents` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_notification_recepient_map`
--

CREATE TABLE `project_notification_recepient_map` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `recepient_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_outcome`
--

CREATE TABLE `project_outcome` (
  `id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_outcome_indicator`
--

CREATE TABLE `project_outcome_indicator` (
  `id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `indicator_category` varchar(255) DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `definition` text DEFAULT NULL,
  `means_of_verification` text DEFAULT NULL,
  `baseline` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `year1` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `year3` varchar(255) NOT NULL,
  `year4` varchar(255) NOT NULL,
  `year5` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_outcome_indicator_target`
--

CREATE TABLE `project_outcome_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_outcome_journal_report`
--

CREATE TABLE `project_outcome_journal_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project_name` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_output`
--

CREATE TABLE `project_output` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_output_indicator`
--

CREATE TABLE `project_output_indicator` (
  `id` int(11) NOT NULL,
  `output_id` int(11) NOT NULL,
  `indicator` varchar(255) NOT NULL,
  `indicator_category` varchar(255) DEFAULT NULL,
  `unit` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `means_of_verification` text NOT NULL,
  `baseline` varchar(255) NOT NULL,
  `target` varchar(255) DEFAULT NULL,
  `year1` varchar(255) NOT NULL,
  `year2` varchar(255) NOT NULL,
  `year3` varchar(255) NOT NULL,
  `year4` varchar(255) NOT NULL,
  `year5` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_output_indicator_target`
--

CREATE TABLE `project_output_indicator_target` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `target` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_indicator_tracking_report`
--

CREATE TABLE `project_quarterly_indicator_tracking_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_status` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `submitted_to` int(11) NOT NULL,
  `reviwer_id` int(11) NOT NULL,
  `review_date` datetime DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_indicator_tracking_report_map`
--

CREATE TABLE `project_quarterly_indicator_tracking_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_narrative_report`
--

CREATE TABLE `project_quarterly_narrative_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `quarter` varchar(200) DEFAULT NULL,
  `key_highlights` text DEFAULT NULL,
  `challenges_experienced` text DEFAULT NULL,
  `success_stories` text DEFAULT NULL,
  `activities_anticipated` text DEFAULT NULL,
  `report_status` int(11) NOT NULL,
  `submitted_by` int(11) NOT NULL,
  `submitted_date` datetime DEFAULT NULL,
  `submitted_to` int(11) NOT NULL,
  `reviwer_id` int(11) NOT NULL,
  `review_date` datetime DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_progress_report_map`
--

CREATE TABLE `project_quarterly_progress_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `target` varchar(250) DEFAULT NULL,
  `achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_workplan_progress_reports`
--

CREATE TABLE `project_quarterly_workplan_progress_reports` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_quarterly_workplan_progress_reports_mapping`
--

CREATE TABLE `project_quarterly_workplan_progress_reports_mapping` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `activity_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `budget` varchar(255) NOT NULL,
  `expenses` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_results_framework_workflow`
--

CREATE TABLE `project_results_framework_workflow` (
  `id` int(11) NOT NULL,
  `base_id` int(11) DEFAULT NULL,
  `project` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createdtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_semi_annual_indicator_tracking_report`
--

CREATE TABLE `project_semi_annual_indicator_tracking_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_semi_annual_indicator_tracking_report_map`
--

CREATE TABLE `project_semi_annual_indicator_tracking_report_map` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `year` varchar(255) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `achievement` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_semi_annual_narrative_report`
--

CREATE TABLE `project_semi_annual_narrative_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `quarter` varchar(200) DEFAULT NULL,
  `key_highlights` text DEFAULT NULL,
  `challenges_experienced` text DEFAULT NULL,
  `success_stories` text DEFAULT NULL,
  `activities_anticipated` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_semi_annual_workplan_progress_report`
--

CREATE TABLE `project_semi_annual_workplan_progress_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(20) DEFAULT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_semi_annual_workplan_progress_report_mapping`
--

CREATE TABLE `project_semi_annual_workplan_progress_report_mapping` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(255) DEFAULT NULL,
  `activity_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `budget` varchar(255) NOT NULL,
  `expenses` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quarterly_progress_report`
--

CREATE TABLE `quarterly_progress_report` (
  `id` int(11) NOT NULL,
  `base_id` int(11) NOT NULL,
  `project` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `quarter` varchar(255) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `createdby` int(11) NOT NULL,
  `updatedby` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatedtime` datetime NOT NULL,
  `flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_audit_trails`
--

CREATE TABLE `user_audit_trails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event` enum('insert','update','delete','Login','Logout') NOT NULL,
  `table_name` varchar(128) NOT NULL,
  `old_values` text DEFAULT NULL,
  `new_values` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_audit_trails`
--

INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(0, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"10:48:45\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 01:18:45'),
(1, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Q1\",\"report_name\":\"dssdfsd\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 05:55:17\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:25:17'),
(2, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Q1\",\"report_name\":\"Tesrdssdd\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 05:57:21\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:27:21'),
(3, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Q1\",\"report_name\":\"Report -1\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 05:59:28\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:29:28'),
(4, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-15 06:22:10\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:52:10'),
(5, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedtime\":\"2021-07-15 06:22:10\"}', '{\"updatedtime\":\"2021-07-15 06:23:46\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:53:46'),
(6, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedtime\":\"2021-07-15 06:23:46\"}', '{\"updatedtime\":\"2021-07-15 06:25:05\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 20:55:05'),
(7, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1+Q2\",\"key_highlights\":\"<p>Key highlights on your activities and interventions during this reporting period&nbsp;*<\\/p>\",\"challenges_experienced\":\"<p>hallenges experienced and Mitigating measure&nbsp;*<\\/p>\",\"success_stories\":\"<p>Success Stories\\/Best Practice\\/Lessons Learned&nbsp;*<\\/p>\",\"activities_anticipated\":\"<p>&nbsp;<\\/p><p>Activities Anticipated for Next Reporting Period&nbsp;*<\\/p><p><a href=\\\"javascript:void(\'Bold\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(86,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Italic\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(89,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Insert\\/Remove Numbered List\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(92,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Insert\\/Remove Bulleted List\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(95,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Decrease Indent\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(98,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Increase Indent\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(101,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Link\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(104,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Unlink\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(107,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'About CKEditor 4\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(110,this);return false;\\\">&nbsp;<\\/a><\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 07:12:38\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 21:42:38'),
(8, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-15 07:12:48\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 21:42:48'),
(9, 13, 'update', 'Edit Narrative Report', '{\"success_stories\":\"<p>Success Stories\\/Best Practice\\/Lessons Learned&nbsp;*<\\/p>\",\"activities_anticipated\":\"<p>&nbsp;<\\/p><p>Activities Anticipated for Next Reporting Period&nbsp;*<\\/p><p><a href=\\\"javascript:void(\'Bold\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(86,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Italic\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(89,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Insert\\/Remove Numbered List\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(92,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Insert\\/Remove Bulleted List\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(95,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Decrease Indent\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(98,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Increase Indent\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(101,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Link\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(104,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'Unlink\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(107,this);return false;\\\">&nbsp;<\\/a><a href=\\\"javascript:void(\'About CKEditor 4\')\\\" onclick=\\\"CKEDITOR.tools.callFunction(110,this);return false;\\\">&nbsp;<\\/a><\\/p>\",\"updatedtime\":\"2021-07-15 07:12:48\"}', '{\"success_stories\":\"<p>Success Stories\\/Best Practice\\/Lessons Learned&nbsp;<\\/p>\",\"activities_anticipated\":\"<p>&nbsp;<\\/p><p>Activities Anticipated for Next Reporting Period&nbsp;<\\/p>\",\"updatedtime\":\"2021-07-15 07:14:34\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 21:44:35'),
(10, 13, 'insert', 'Add Semi-Annual Indicator Tracking Report', NULL, '{\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1+Q2\",\"base_id\":\"0\",\"report_name\":\"semin-annual-1\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 07:47:35\"}', 'http://localhost/reporting/project_data/project_semi_annual_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 22:17:35'),
(11, 13, 'update', 'Edit Semi-Annual Indicator Tracking Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-15 07:48:30\"}', 'http://localhost/reporting/project_data/project_semi_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-14 22:18:30'),
(12, 13, 'delete', 'Project Quarterly Workplan Progress Report', '{\"id\":\"1\",\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1\",\"report_name\":\"Report -1\",\"createdby\":\"13\",\"updatedby\":\"13\",\"createtime\":\"2021-07-15 05:59:28\",\"updatedtime\":\"2021-07-15 06:25:05\",\"flag\":\"0\"}', '\"1\"', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/delete/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-15 00:46:03'),
(13, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Semi1\",\"report_name\":\"test\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 10:48:05\"}', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-15 01:18:05'),
(14, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-15 10:52:03\"}', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-15 01:22:03'),
(15, 13, 'insert', 'Add Project Semi-Annual Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Semi1\",\"report_name\":\"assad\",\"createdby\":\"13\",\"createtime\":\"2021-07-15 10:54:53\"}', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-15 01:24:53'),
(16, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-16\",\"time\":\"06:50:09\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-15 21:20:09'),
(17, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-18\",\"time\":\"02:32:11\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 17:02:12'),
(18, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Q1\",\"report_name\":\"Test 1\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 02:37:31\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 17:07:31'),
(19, 13, 'delete', 'Project Semi-Annual Workplan Progress Report', '{\"id\":\"1\",\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Semi1\",\"report_name\":\"test\",\"createdby\":\"13\",\"updatedby\":\"13\",\"createtime\":\"2021-07-15 10:48:05\",\"updatedtime\":\"2021-07-15 10:52:03\",\"flag\":\"0\"}', '\"1\"', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/delete/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 17:10:09'),
(20, 13, 'insert', 'Add Project Semi-Annual Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"quarter\":\"Semi1\",\"report_name\":\"Test Semi-1\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 02:40:40\"}', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 17:10:40'),
(21, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"key_highlights\":\"<p>Key highlights on your activities and interventions during this reporting period<\\/p>\",\"challenges_experienced\":\"<p>Challenges experienced and Mitigating measure<\\/p>\",\"success_stories\":\"<p>Success Stories\\/Best Practice\\/Lessons Learned<\\/p>\",\"activities_anticipated\":\"<p>Activities Anticipated for Next Reporting Period<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 04:08:01\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:38:01'),
(22, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"key_highlights\":\"<p>dsd<\\/p>\",\"challenges_experienced\":\"<p>sdfsdf<\\/p>\",\"success_stories\":\"<p>sdfsdf<\\/p>\",\"activities_anticipated\":\"<p>sdfsdfsdf<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 04:08:52\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:38:52'),
(23, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-18 04:10:28\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:40:28'),
(24, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-07-18 04:10:28\"}', '{\"updatedtime\":\"2021-07-18 04:11:22\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:41:22'),
(25, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"7\",\"year\":\"2021\",\"base_id\":\"0\",\"report_name\":\"test project -1\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 04:27:58\"}', 'http://localhost/reporting/project_data/project_annual_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:57:58'),
(26, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-18 04:29:48\"}', 'http://localhost/reporting/project_data/project_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 18:59:48'),
(27, 13, 'insert', 'Add Project Annual Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"7\",\"report_name\":\"mnnm\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:09:45\"}', 'http://localhost/reporting/project_data/project_annual_workplan_progress_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 19:39:45'),
(28, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-18 05:11:38\"}', 'http://localhost/reporting/project_data/project_annual_workplan_progress_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 19:41:38'),
(29, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedtime\":\"2021-07-18 05:11:38\"}', '{\"updatedtime\":\"2021-07-18 05:12:12\"}', 'http://localhost/reporting/project_data/project_annual_workplan_progress_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 19:42:13'),
(30, 13, 'insert', 'Add Program / Project Final Evaluation Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"tesdfsf\",\"report_file\":\"1626604917_a1c396b851b0fe1f396a.pdf\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:41:57\"}', 'http://localhost/reporting/project_data/project_final_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:11:57'),
(31, 13, 'insert', 'Add Program / Project Final Evaluation Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"tesdfsf\",\"report_file\":\"1626604981_f6ba5d6f28b9172b90f9.pdf\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:43:01\"}', 'http://localhost/reporting/project_data/project_final_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:13:01'),
(32, 13, 'delete', 'Project Final Evaluation Report Report', '{\"id\":\"2\",\"base_id\":\"0\",\"project_name\":\"7\",\"report_name\":\"tesdfsf\",\"report_file\":\"1626604917_a1c396b851b0fe1f396a.pdf\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-07-18 05:41:57\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"2\"', 'http://localhost/reporting/project_data/project_final_report/delete/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:19:17'),
(33, 13, 'delete', 'Project Final Evaluation Report Report', '{\"id\":\"3\",\"base_id\":\"0\",\"project_name\":\"7\",\"report_name\":\"tesdfsf\",\"report_file\":\"1626604981_f6ba5d6f28b9172b90f9.pdf\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-07-18 05:43:01\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"3\"', 'http://localhost/reporting/project_data/project_final_report/delete/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:19:22'),
(34, 13, 'insert', 'Add Program / Project Final Evaluation Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"zadas\",\"report_file\":\"1626605386_ed65b4442f8df3f98a0b.pdf\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:49:46\"}', 'http://localhost/reporting/project_data/project_final_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:19:46'),
(35, 13, 'delete', 'Project Final Evaluation Report Report', '{\"id\":\"4\",\"base_id\":\"0\",\"project_name\":\"7\",\"report_name\":\"zadas\",\"report_file\":\"1626605386_ed65b4442f8df3f98a0b.pdf\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-07-18 05:49:46\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"4\"', 'http://localhost/reporting/project_data/project_final_report/delete/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:20:40'),
(36, 13, 'insert', 'Add Program / Project Final Evaluation Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"test\",\"report_file\":\"1626605456_e33309a707f5b789512e.pdf\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:50:56\"}', 'http://localhost/reporting/project_data/project_final_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:20:56'),
(37, 13, 'insert', 'Add Program / Project Final Evaluation Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"sasas\",\"report_file\":\"1626605824_026333b5ea52096c248e.png\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 05:57:04\"}', 'http://localhost/reporting/project_data/project_outcome_journal_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:27:04'),
(38, 13, 'insert', 'Add Project Outcome Journal Report', NULL, '{\"project_name\":\"7\",\"base_id\":\"0\",\"report_name\":\"asasd\",\"report_file\":\"1626606032_a843086755775ed3bbca.png\",\"createdby\":\"13\",\"createtime\":\"2021-07-18 06:00:32\"}', 'http://localhost/reporting/project_data/project_outcome_journal_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:30:32'),
(39, 13, 'update', 'Add Project Outcome Journal Report', '{\"report_file\":\"1626606032_a843086755775ed3bbca.png\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"report_file\":\"1626606296_bf32980c306f82f95829.png\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-18 06:04:56\"}', 'http://localhost/reporting/project_data/project_outcome_journal_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:34:56'),
(40, 13, 'update', 'Add Project Outcome Journal Report', '{\"report_file\":\"1626606296_bf32980c306f82f95829.png\",\"updatedtime\":\"2021-07-18 06:04:56\"}', '{\"report_file\":\"1626606351_32ed8a14cfda696478c5.png\",\"updatedtime\":\"2021-07-18 06:05:51\"}', 'http://localhost/reporting/project_data/project_outcome_journal_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:35:51'),
(41, 13, 'update', 'Add Project Final Evaluation Report', '{\"report_file\":\"1626605824_026333b5ea52096c248e.png\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"report_file\":\"1626606492_dbccb5ee93f5e1100eb6.jpg\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-18 06:08:12\"}', 'http://localhost/reporting/project_data/project_final_report/edit/6', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-17 20:38:12'),
(42, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-19\",\"time\":\"00:14:39\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-18 14:44:39'),
(43, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-19\",\"time\":\"00:30:13\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-18 15:00:13'),
(44, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-19\",\"time\":\"05:11:50\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-18 19:41:50'),
(45, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-19\",\"time\":\"09:49:48\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:19:48'),
(46, 1, 'insert', 'field_office', NULL, '{\"name\":\"test\",\"contact_person\":\"\",\"contact_email\":\"\",\"phone\":\"\",\"createdby\":\"1\",\"createtime\":\"2021-07-19 10:07:12\"}', 'http://localhost/master/field_office/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:37:12'),
(47, 1, 'update', 'Edit Field Office', '{\"contact_person\":\"\",\"contact_email\":\"\",\"phone\":\"\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"contact_person\":\"Hooks\",\"contact_email\":\"abc@gmail.com\",\"phone\":\"+25774563241\",\"updatedby\":\"1\",\"updatedtime\":\"2021-07-19 10:08:05\"}', 'http://localhost/master/field_office/edit/1', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:38:05'),
(48, 1, 'delete', 'field_office', '{\"id\":\"1\",\"base_id\":\"0\",\"name\":\"test\",\"contact_person\":\"Hooks\",\"contact_email\":\"abc@gmail.com\",\"phone\":\"+25774563241\",\"createdby\":\"1\",\"updatedby\":\"1\",\"createdtime\":\"0000-00-00 00:00:00\",\"updatedtime\":\"2021-07-19 10:08:05\",\"flag\":\"0\"}', '\"1\"', 'http://localhost/master/field_office/delete/1', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:38:10'),
(49, 1, 'insert', 'field_office', NULL, '{\"name\":\"Kibera Office\",\"contact_person\":\"\",\"contact_email\":\"\",\"phone\":\"\",\"createdby\":\"1\",\"createtime\":\"2021-07-19 10:08:33\"}', 'http://localhost/master/field_office/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:38:33'),
(50, 1, 'insert', 'field_office', NULL, '{\"name\":\"Lindi Office\",\"contact_person\":\"\",\"contact_email\":\"\",\"phone\":\"\",\"createdby\":\"1\",\"createtime\":\"2021-07-19 10:09:09\"}', 'http://localhost/master/field_office/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:39:09'),
(51, 1, 'insert', 'field_office', NULL, '{\"name\":\"Mombasa Office\",\"contact_person\":\"\",\"contact_email\":\"\",\"phone\":\"\",\"createdby\":\"1\",\"createtime\":\"2021-07-19 10:09:32\"}', 'http://localhost/master/field_office/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:39:32'),
(52, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"place_residence\":\"Nakuru\",\"marital_status\":\"Single\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-19 10:12:33\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-19 00:42:33'),
(53, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"status\":\"1\",\"createdby\":\"13\",\"createdtime\":\"2021-07-19 10:14:34\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-19 00:44:34'),
(54, 1, 'update', 'Edit Unit', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"1\",\"updatedtime\":\"2021-07-19 10:27:37\"}', 'http://localhost/master/indicator_unit/edit/2', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:57:38'),
(55, 1, 'update', 'Edit Unit', '{\"name\":\"Number\",\"updatedtime\":\"2021-07-19 10:27:37\"}', '{\"name\":\"KSHS\",\"updatedtime\":\"2021-07-19 10:28:20\"}', 'http://localhost/master/indicator_unit/edit/2', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:58:20'),
(56, 1, 'update', 'Edit Currency', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"1\",\"updatedtime\":\"2021-07-19 10:29:36\"}', 'http://localhost/master/currency/edit/2', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:59:36'),
(57, 1, 'insert', 'Unit', NULL, '{\"name\":\"Test\",\"createdby\":\"1\",\"createtime\":\"2021-07-19 10:29:43\"}', 'http://localhost/master/currency/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:59:43'),
(58, 1, 'delete', 'Unit', '{\"id\":\"12\",\"name\":\"Test\",\"createdby\":\"1\",\"createdtime\":\"0000-00-00 00:00:00\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"12\"', 'http://localhost/master/currency/delete/12', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-19 00:59:51'),
(59, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-19\",\"time\":\"23:34:47\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-19 14:04:48'),
(60, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-20\",\"time\":\"05:37:16\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-19 20:07:16'),
(61, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-20\",\"time\":\"23:07:57\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 13:37:57'),
(62, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"01\\/07\\/2021\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:46:57\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:16:57'),
(63, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-10-01\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:48:47\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:18:47'),
(64, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-01-07\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:50:17\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:20:17'),
(65, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-01-07\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:52:31\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:22:31'),
(66, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:54:26\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:24:26'),
(67, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:55:36\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:25:36'),
(68, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:56:09\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:26:09'),
(69, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-10-02\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:56:46\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:26:46'),
(70, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-10-02\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:58:05\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:28:05'),
(71, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 00:58:45\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:28:45'),
(72, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 01:00:34\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:30:34'),
(73, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 01:02:05\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:32:05'),
(74, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"1969-12-31\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 01:05:42\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:35:42'),
(75, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 01:06:17\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:36:17'),
(76, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"place_residence\":\"Nakuru\",\"marital_status\":\"Single\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 01:07:08\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 15:37:08'),
(77, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-21\",\"time\":\"05:01:15\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 19:31:15'),
(78, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"gender\":\"Male\",\"male\":\"10\",\"female\":\"5\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 05:15:46\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 19:45:46'),
(79, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"place_residence\":\"Nakuru\",\"marital_status\":\"Single\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-21 05:16:09\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 19:46:09'),
(80, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"lindi\",\"marital_status\":\"Single\",\"status\":\"1\",\"createdby\":\"13\",\"createdtime\":\"2021-07-21 07:17:13\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', '2021-07-20 21:47:13'),
(81, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-04 06:54:29\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-22 10:49:36\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 01:19:36'),
(82, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-22\",\"time\":\"11:06:18\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 01:36:18'),
(83, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"23:25:40\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 13:55:40'),
(84, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-22\",\"time\":\"23:27:33\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 13:57:33'),
(85, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"23:27:40\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 13:57:40'),
(86, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-22\",\"time\":\"23:30:36\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:00:36'),
(87, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"23:30:44\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:00:44'),
(88, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-22\",\"time\":\"23:30:48\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:00:48'),
(89, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"23:30:56\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:00:56'),
(90, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-22\",\"time\":\"23:41:08\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:11:08'),
(91, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-22\",\"time\":\"23:41:19\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 14:11:19'),
(92, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"01:19:24\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 15:49:24'),
(93, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"01:19:33\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 15:49:33'),
(94, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"02:04:22\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 16:34:22'),
(95, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"02:31:05\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 17:01:05'),
(96, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"02:31:12\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 17:01:12');
INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(97, 1, 'update', 'User Roles', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"1\",\"updatedtime\":\"2021-07-23 02:49:11\"}', 'http://localhost/user_management/user_roles/edit', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:19:11'),
(98, 1, 'update', 'User', '{\"updateby\":\"0\",\"updatetime\":\"2021-07-14 19:31:40\"}', '{\"updateby\":\"1\",\"updatetime\":\"2021-07-23 02:54:57\"}', 'http://localhost/user_management/users/edit/16', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:24:57'),
(99, 1, 'insert', 'Add New Manage Users', NULL, '{\"base_id\":\"1\",\"name\":\"Test User\",\"username\":\"Testuser1111\",\"password\":\"$2y$10$mna0YOSgpT4sEXEPrPyZ4OPqoLho.7xMFnd5vjC0OgcQiv.nHlDiy\",\"email\":\"testuser@gmail.com\",\"contact_number\":\"8800000\",\"user_type\":\"FAWE User\",\"user_group_id\":\"16\",\"banned\":0,\"activated\":1,\"createdby\":\"1\",\"createtime\":\"2021-07-23 02:56:15\"}', 'http://localhost/user_management/users/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:26:15'),
(100, 1, 'delete', 'User', '{\"id\":\"17\",\"base_id\":\"1\",\"name\":\"Test User\",\"username\":\"Testuser1111\",\"password\":\"$2y$10$mna0YOSgpT4sEXEPrPyZ4OPqoLho.7xMFnd5vjC0OgcQiv.nHlDiy\",\"user_type\":\"FAWE User\",\"email\":\"testuser@gmail.com\",\"contact_number\":\"8800000\",\"usertype\":\"\",\"account_type\":\"\",\"user_group_id\":\"16\",\"block\":\"0\",\"failed_logins\":\"0\",\"activated\":\"1\",\"banned\":\"0\",\"ban_reason\":null,\"new_password_key\":null,\"new_password_requested\":null,\"new_email\":null,\"new_email_key\":null,\"last_ip\":\"\",\"last_login\":\"0000-00-00 00:00:00\",\"flag\":\"0\",\"createdby\":\"1\",\"createtime\":\"2021-07-23 02:56:15\",\"updateby\":\"0\",\"updatetime\":\"2021-07-23 13:26:15\",\"check_password_update\":\"-1\",\"photo\":\"\",\"signature_password\":\"\",\"created\":\"\",\"online\":\"0\"}', '\"17\"', 'http://localhost/user_management/users/delete/17', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:26:22'),
(101, 1, 'update', 'User Roles', '{\"updatedtime\":\"2021-07-23 02:49:11\"}', '{\"updatedtime\":\"2021-07-23 03:04:28\"}', 'http://localhost/user_management/user_roles/edit', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:34:28'),
(102, 1, 'update', 'User', '{\"updatetime\":\"2021-07-23 02:54:57\"}', '{\"updatetime\":\"2021-07-23 03:06:28\"}', 'http://localhost/user_management/users/edit/16', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:36:28'),
(103, 1, 'update', 'User', '{\"updatetime\":\"2021-05-27 03:18:33\"}', '{\"updatetime\":\"2021-07-23 03:06:54\"}', 'http://localhost/user_management/users/edit/15', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:36:54'),
(104, 1, 'update', 'User', '{\"updatetime\":\"2021-07-23 03:06:28\"}', '{\"updatetime\":\"2021-07-23 03:07:01\"}', 'http://localhost/user_management/users/edit/16', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:37:01'),
(105, 1, 'update', 'User Roles', '{\"updatedtime\":\"2021-07-23 03:04:28\"}', '{\"updatedtime\":\"2021-07-23 03:17:06\"}', 'http://localhost/user_management/user_roles/edit', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:47:06'),
(106, 1, 'update', 'User Roles', '{\"updatedtime\":\"2021-07-23 03:17:06\"}', '{\"updatedtime\":\"2021-07-23 03:17:13\"}', 'http://localhost/user_management/user_roles/edit', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:47:13'),
(107, 1, 'update', 'User Right', '{\"title\":\"project_annual_implementation_plan\"}', '{\"title\":\"mopedic_reports\"}', 'http://localhost/user_management/user_rights/edit/16', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:53:42'),
(108, 1, 'update', 'Edit Implementing Partner', '{\"name\":\"Test Partner\",\"organization_name\":\"UBS\",\"updatedtime\":\"2021-06-05 00:31:49\"}', '{\"name\":\"UBS Group\",\"organization_name\":\"United Business Solutions Ltd.\",\"updatedtime\":\"2021-07-23 03:28:54\"}', 'http://localhost/master/implementing_partner/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 17:58:54'),
(109, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"03:30:48\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 18:00:48'),
(110, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"03:31:01\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 18:01:01'),
(111, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"03:31:12\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 18:01:12'),
(112, 1, 'update', 'Change Password', '{\"New Password\":\"\"}', '{\"New Password\":true}', 'http://localhost/user_management/change_password', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 18:01:41'),
(113, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"03:31:41\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 18:01:41'),
(114, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"03:31:49\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 18:01:49'),
(115, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"05:39:59\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-22 20:09:59'),
(116, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"06:20:09\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 20:50:09'),
(117, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"06:20:18\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 20:50:18'),
(118, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"06:42:33\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:12:33'),
(119, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"06:42:44\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:12:44'),
(120, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"06:44:17\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:14:17'),
(121, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"06:44:25\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:14:25'),
(122, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"07:10:54\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:40:54'),
(123, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"07:11:01\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:41:01'),
(124, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"07:20:24\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:50:24'),
(125, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"07:20:32\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 21:50:32'),
(126, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"08:06:38\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 22:36:38'),
(127, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"08:06:46\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-22 22:36:46'),
(128, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"10:10:10\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 00:40:10'),
(129, 1, 'update', 'User Right', '{\"title\":\"project_annual_activity_performance\"}', '{\"title\":\"cases_overall\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 00:40:37'),
(130, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:10:46\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-23 00:40:46'),
(131, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-23\",\"time\":\"10:10:55\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-23 00:40:55'),
(132, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:50:09\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-23 01:20:09'),
(133, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:51:58\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:21:58'),
(134, 15, 'Login', 'Login Auth', NULL, '{\"user_id\":\"implementing@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"10:52:05\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:22:05'),
(135, 15, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:54:46\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:24:46'),
(136, 15, 'Login', 'Login Auth', NULL, '{\"user_id\":\"implementing@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"10:54:56\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:24:56'),
(137, 15, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:55:01\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:25:01'),
(138, 15, 'Login', 'Login Auth', NULL, '{\"user_id\":\"implementing@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"10:56:04\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:26:04'),
(139, 15, 'insert', 'Add Project Background', NULL, '{\"base_id\":\"1\",\"name\":\"Partenr Project -1\",\"start_date\":\"2021-07-01\",\"end_date\":\"2025-07-01\",\"duration\":\"3 year  11 month \",\"project_budget\":\"450000\",\"budget_currency\":\"1\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month\":\"January\",\"rs_annual_month_date\":\"10\",\"person_responsible\":\"13\",\"implementing_partner\":\"4\",\"project_status\":\"Pipeline\",\"createdby\":\"15\",\"createtime\":\"2021-07-23 10:58:57\"}', 'http://localhost/planning/project/add', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:28:58'),
(140, 15, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-23\",\"time\":\"10:59:21\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:29:21'),
(141, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-23\",\"time\":\"10:59:29\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-23 01:29:29'),
(142, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:48:05\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:18:05'),
(143, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"00:49:06\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:19:06'),
(144, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:49:14\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:19:14'),
(145, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"00:49:41\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:19:41'),
(146, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:49:48\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:19:48'),
(147, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"00:50:24\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:20:24'),
(148, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:50:31\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:20:31'),
(149, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"00:53:49\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:23:49'),
(150, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:53:56\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:23:56'),
(151, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-06 06:26:54\"}', '{\"updatedtime\":\"2021-07-26 00:54:36\"}', 'http://localhost/reporting/organizational_data/org_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:24:36'),
(152, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"00:56:07\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:26:07'),
(153, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"00:56:16\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:26:16'),
(154, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-06 08:41:29\"}', '{\"updatedtime\":\"2021-07-26 00:56:49\"}', 'http://localhost/reporting/organizational_data/org_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-25 15:26:49'),
(155, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"22:25:01\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 12:55:01'),
(156, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"22:48:35\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:18:35'),
(157, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"23:13:48\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:43:48'),
(158, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-26\",\"time\":\"23:13:50\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:43:50'),
(159, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-26\",\"time\":\"23:14:40\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:44:40'),
(160, 13, 'update', 'Edit Activity', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-26 23:26:13\"}', 'http://localhost/planning/project_me_plan/edit_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:56:13'),
(161, 13, 'update', 'Edit Project M&E Plan', '{\"updatedtime\":\"2021-07-15 01:28:40\"}', '{\"updatedtime\":\"2021-07-26 23:26:51\"}', 'http://localhost/planning/project_me_plan/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 13:56:51'),
(162, 13, 'update', 'Edit Project M&E Plan', '{\"updatedtime\":\"2021-07-26 23:26:51\"}', '{\"updatedtime\":\"2021-07-26 23:33:11\"}', 'http://localhost/planning/project_me_plan/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:03:11'),
(163, 13, 'update', 'Edit Activity', '{\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-26 23:35:29\"}', 'http://localhost/planning/project_annual_plan/update_plan/11/?activity_id=1&output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:05:29'),
(164, 13, 'update', 'Edit Project Annual Plan', '{\"updatedtime\":\"2021-07-15 02:44:01\"}', '{\"updatedtime\":\"2021-07-26 23:35:48\"}', 'http://localhost/planning/project_annual_plan/edit/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:05:48'),
(165, 13, 'update', 'Edit Activity', '{\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-26 23:37:03\"}', 'http://localhost/planning/project_annual_plan/update_plan/12/?activity_id=2&output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:07:03'),
(166, 13, 'update', 'Edit Project Annual Plan', '{\"updatedtime\":\"2021-07-15 02:47:01\"}', '{\"updatedtime\":\"2021-07-26 23:37:08\"}', 'http://localhost/planning/project_annual_plan/edit/12', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:07:08'),
(167, 13, 'update', 'Edit Narrative Report', '{\"quarter\":\"\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"quarter\":\"Q1\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-26 23:38:47\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:08:47'),
(168, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-11 11:04:22\"}', '{\"updatedtime\":\"2021-07-26 23:39:45\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:09:45'),
(169, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-26 23:40:30\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-26 14:10:30'),
(170, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-27\",\"time\":\"10:16:22\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 00:46:22'),
(171, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"Ngong Road\",\"marital_status\":\"Single\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:33:35\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:03:35'),
(172, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"Ngong Road\",\"marital_status\":\"Single\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:33:47\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:03:47'),
(173, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"place_residence\":\"Nakuru\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:37:58\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:07:58'),
(174, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"gender\":\"Male\",\"male\":\"10\",\"female\":\"5\",\"place_residence\":\"Lindi\",\"marital_status\":\"Divorced\",\"case_status\":\"Ongoing\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:38:25\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:08:25'),
(175, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"Ngong Road\",\"marital_status\":\"Single\",\"case_status\":\"Stood over Generally\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:38:36\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:08:36'),
(176, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:49:59\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:19:59'),
(177, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"Ngong Road\",\"county\":\"10\",\"marital_status\":\"Single\",\"case_status\":\"Stood over Generally\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:50:16\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:20:16'),
(178, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"gender\":\"Male\",\"male\":\"10\",\"female\":\"5\",\"place_residence\":\"Lindi\",\"county\":\"3\",\"marital_status\":\"Divorced\",\"case_status\":\"Ongoing\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:50:27\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:20:27'),
(179, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"comments\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:57:09\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:27:09'),
(180, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"place_residence\":\"Ngong Road\",\"county\":\"10\",\"marital_status\":\"Single\",\"case_status\":\"Stood over Generally\",\"comments\":\"\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:57:19\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:27:19'),
(181, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"gender\":\"Male\",\"male\":\"10\",\"female\":\"5\",\"place_residence\":\"Lindi\",\"county\":\"3\",\"marital_status\":\"Divorced\",\"case_status\":\"Ongoing\",\"comments\":\" Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-27 10:57:31\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 01:27:31'),
(182, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-27\",\"time\":\"23:34:47\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 14:04:47'),
(183, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-28\",\"time\":\"00:19:06\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.164 Safari/537.36', '2021-07-27 14:49:06'),
(184, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-29\",\"time\":\"05:21:41\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-28 19:51:41'),
(185, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-07-29\",\"time\":\"08:03:05\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-07-28 22:33:05'),
(186, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-29\",\"time\":\"23:18:28\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-29 13:48:28'),
(187, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-30\",\"time\":\"02:33:18\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-29 17:03:18'),
(188, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-07-30\",\"time\":\"02:33:27\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-29 17:03:27'),
(189, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-30\",\"time\":\"02:33:52\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-29 17:03:52'),
(190, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-30\",\"time\":\"02:34:04\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-29 17:04:04'),
(191, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"report_submission_date\":\"\",\"updatedtime\":\"2021-07-22 10:49:36\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"report_submission_date\":\"2021-07-30\",\"updatedtime\":\"2021-07-30 10:28:12\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 00:58:12'),
(192, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:28:12\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-30 10:28:25\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 00:58:25'),
(193, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:28:25\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-30 10:29:39\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 00:59:39'),
(194, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:29:39\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-30 10:30:30\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:00:30'),
(195, 13, 'update', 'Update Project Background', '{\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:30:30\"}', '{\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-30 10:31:08\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:01:08'),
(196, 13, 'insert', 'Add Project Background', NULL, '{\"base_id\":\"0\",\"name\":\"sdsdfsdf\",\"start_date\":\"2021-07-01\",\"end_date\":\"2025-07-01\",\"duration\":\"3 year  11 month \",\"project_budget\":\"85633222\",\"budget_currency\":\"1\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month\":\"April\",\"rs_annual_month_date\":\"5\",\"person_responsible\":\"14\",\"implementing_partner\":\"1\",\"project_status\":\"Pipeline\",\"report_submission_date\":\"2021-07-31\",\"createdby\":\"13\",\"createtime\":\"2021-07-30 10:32:37\"}', 'http://localhost/planning/project/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:02:37'),
(197, 13, 'insert', 'Add Project Background', NULL, '{\"base_id\":\"0\",\"name\":\"sdsdfsdf\",\"start_date\":\"2021-07-01\",\"end_date\":\"2025-07-01\",\"duration\":\"3 year  11 month \",\"project_budget\":\"85633222\",\"budget_currency\":\"1\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month\":\"April\",\"rs_annual_month_date\":\"5\",\"person_responsible\":\"14\",\"implementing_partner\":\"1\",\"project_status\":\"Pipeline\",\"report_submission_date\":\"2021-07-31\",\"createdby\":\"13\",\"createtime\":\"2021-07-30 10:33:34\"}', 'http://localhost/planning/project/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:03:34'),
(198, 13, 'delete', 'Project', '{\"id\":\"10\",\"base_id\":\"0\",\"name\":\"sdsdfsdf\",\"start_date\":\"2021-07-01\",\"end_date\":\"2025-07-01\",\"duration\":\"3 year  11 month \",\"project_budget\":\"85633222\",\"budget_currency\":\"1\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"0\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"0\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"0\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"0\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"0\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"0\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"0\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"0\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"0\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"0\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"0\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"0\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month\":\"April\",\"rs_annual_month_date\":\"5\",\"person_responsible\":\"14\",\"implementing_partner\":\"1\",\"project_status\":\"Pipeline\",\"report_submission_date\":\"2021-07-31\",\"type\":null,\"project_category\":null,\"sector\":null,\"program\":null,\"project\":null,\"location\":null,\"budget\":null,\"lead_mda\":null,\"coordinator\":null,\"createdby\":\"13\",\"updatedby\":\"0\",\"createdtime\":\"0000-00-00 00:00:00\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"10\"', 'http://localhost/planning/project/delete/10', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:11:09');
INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(199, 13, 'delete', 'Project', '{\"id\":\"11\",\"base_id\":\"0\",\"name\":\"sdsdfsdf\",\"start_date\":\"2021-07-01\",\"end_date\":\"2025-07-01\",\"duration\":\"3 year  11 month \",\"project_budget\":\"85633222\",\"budget_currency\":\"1\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"0\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"0\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"0\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"0\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"0\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"0\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"0\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"0\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"0\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"0\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"0\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"0\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month\":\"April\",\"rs_annual_month_date\":\"5\",\"person_responsible\":\"14\",\"implementing_partner\":\"1\",\"project_status\":\"Pipeline\",\"report_submission_date\":\"2021-07-31\",\"type\":null,\"project_category\":null,\"sector\":null,\"program\":null,\"project\":null,\"location\":null,\"budget\":null,\"lead_mda\":null,\"coordinator\":null,\"createdby\":\"13\",\"updatedby\":\"0\",\"createdtime\":\"0000-00-00 00:00:00\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"11\"', 'http://localhost/planning/project/delete/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:11:14'),
(200, 13, 'update', 'Update Project Background', '{\"funding_partner\":\"\",\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:31:08\"}', '{\"funding_partner\":\"2\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-07-30 10:57:16\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 01:27:16'),
(201, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-31\",\"time\":\"00:30:52\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 15:00:52'),
(202, 13, 'update', 'Edit Organization Strategic Plans', '{\"updatedtime\":\"2021-07-06 06:53:57\"}', '{\"updatedtime\":\"2021-07-31 00:40:58\"}', 'http://localhost/planning/strategic_plans/edit_select/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 15:10:58'),
(203, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-31\",\"time\":\"00:52:19\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 15:22:19'),
(204, 13, 'update', 'Edit MERL Framework Objective Indicator', '{\"indicator_category\":\"\",\"updatedtime\":\"2021-06-16 00:31:11\"}', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:06:20\"}', 'http://localhost/planning/merl_framework/edit_objective_indicator/3/?objective_id=', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:36:20'),
(205, 13, 'update', 'Edit MERL Framework Objective Indicator', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:06:20\"}', '{\"indicator_category\":\"Quantitative\",\"updatedtime\":\"2021-07-31 05:06:31\"}', 'http://localhost/planning/merl_framework/edit_objective_indicator/3/?objective_id=', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:36:31'),
(206, 13, 'update', 'Edit MERL Framework Intervention Indicator', '{\"indicator_category\":\"\",\"updatedtime\":\"2021-06-16 00:31:51\"}', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:06:43\"}', 'http://localhost/planning/merl_framework/edit_indicator/3/?intervention_id=', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:36:43'),
(207, 13, 'update', 'Edit MERL Framework Intervention Indicator', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:06:43\"}', '{\"indicator_category\":\"Quantitative\",\"updatedtime\":\"2021-07-31 05:06:53\"}', 'http://localhost/planning/merl_framework/edit_indicator/3/?intervention_id=', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:36:53'),
(208, 13, 'update', 'Edit Project Goal Indicator', '{\"indicator_category\":\"\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"indicator_category\":\"Qualitative\",\"updatedby\":\"13\",\"updatedtime\":\"2021-07-31 05:17:35\"}', 'http://localhost/planning/project_me_plan/edit_goal_indicator/2/?goal_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:47:36'),
(209, 13, 'update', 'Edit Project Goal Indicator', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:17:35\"}', '{\"indicator_category\":\"Quantitative\",\"updatedtime\":\"2021-07-31 05:17:45\"}', 'http://localhost/planning/project_me_plan/edit_goal_indicator/2/?goal_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:47:46'),
(210, 13, 'update', 'Edit Project Outcome Indicator', '{\"indicator\":\"Goal Ind -01\",\"indicator_category\":\"Quantitative\",\"unit\":\"1\",\"definition\":\"sdsd\",\"means_of_verification\":\"sdfsdfsdf\",\"baseline\":\"345\",\"target\":\"450\",\"updatedtime\":\"2021-07-31 05:17:45\"}', '{\"indicator\":\"Test Outcome Ind - 01\",\"indicator_category\":\"Qualitative\",\"unit\":\"2\",\"definition\":\"asasd\",\"means_of_verification\":\"saasd\",\"baseline\":\"0\",\"target\":\"980\",\"updatedtime\":\"2021-07-31 05:18:00\"}', 'http://localhost/planning/project_me_plan/edit_outcome_indicator/2/?outcome_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:48:00'),
(211, 13, 'update', 'Edit Project Outcome Indicator', '{\"indicator\":\"Goal Ind -01\",\"unit\":\"1\",\"definition\":\"sdsd\",\"means_of_verification\":\"sdfsdfsdf\",\"baseline\":\"345\",\"target\":\"450\",\"updatedtime\":\"2021-07-31 05:17:45\"}', '{\"indicator\":\"Test Outcome Ind - 01\",\"unit\":\"2\",\"definition\":\"asasd\",\"means_of_verification\":\"saasd\",\"baseline\":\"0\",\"target\":\"980\",\"updatedtime\":\"2021-07-31 05:18:10\"}', 'http://localhost/planning/project_me_plan/edit_outcome_indicator/2/?outcome_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:48:10'),
(212, 13, 'update', 'Edit Project M&E Plan Indicator', '{\"indicator_category\":\"\",\"updatedtime\":\"2021-06-18 06:27:06\"}', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:18:22\"}', 'http://localhost/planning/project_me_plan/edit_output_indicator/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:48:22'),
(213, 13, 'update', 'Edit Project M&E Plan Indicator', '{\"indicator_category\":\"Qualitative\",\"updatedtime\":\"2021-07-31 05:18:22\"}', '{\"indicator_category\":\"Quantitative\",\"updatedtime\":\"2021-07-31 05:18:34\"}', 'http://localhost/planning/project_me_plan/edit_output_indicator/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 19:48:34'),
(214, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-26 23:39:45\"}', '{\"updatedtime\":\"2021-07-31 05:35:33\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:05:33'),
(215, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-31 05:35:33\"}', '{\"updatedtime\":\"2021-07-31 05:37:25\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:07:25'),
(216, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedtime\":\"2021-07-26 23:40:30\"}', '{\"updatedtime\":\"2021-07-31 05:45:32\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:15:32'),
(217, 13, 'update', 'Edit Semi-Annual Indicator Tracking Report', '{\"updatedtime\":\"2021-07-15 07:48:30\"}', '{\"updatedtime\":\"2021-07-31 05:53:59\"}', 'http://localhost/reporting/project_data/project_semi_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:23:59'),
(218, 13, 'update', 'Edit Semi-Annual Workplan Progress Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-07-31 05:57:47\"}', 'http://localhost/reporting/project_data/project_semi_annual_workplan_progress_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:27:47'),
(219, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-18 04:29:48\"}', '{\"updatedtime\":\"2021-07-31 06:03:50\"}', 'http://localhost/reporting/project_data/project_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:33:50'),
(220, 13, 'update', 'Edit Project / Program Monthly Progress Report', '{\"updatedtime\":\"2021-07-18 05:12:12\"}', '{\"updatedtime\":\"2021-07-31 06:09:24\"}', 'http://localhost/reporting/project_data/project_annual_workplan_progress_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:39:24'),
(221, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-26 00:54:36\"}', '{\"updatedtime\":\"2021-07-31 06:24:26\"}', 'http://localhost/reporting/organizational_data/org_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 20:54:26'),
(222, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-31\",\"time\":\"06:39:03\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 21:09:03'),
(223, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-07-31\",\"time\":\"06:39:12\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 21:09:12'),
(224, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-07-31\",\"time\":\"06:39:43\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 21:09:43'),
(225, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-31\",\"time\":\"06:39:55\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 21:09:55'),
(226, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-07-26 00:56:49\"}', '{\"updatedtime\":\"2021-07-31 07:47:19\"}', 'http://localhost/reporting/organizational_data/org_annual_indicator_tracking_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-30 22:17:19'),
(227, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-07-31\",\"time\":\"23:33:37\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-07-31 14:03:37'),
(228, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-01\",\"time\":\"23:25:44\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 13:55:44'),
(229, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"00:11:15\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 14:41:15'),
(230, 14, 'Login', 'Login Auth', NULL, '{\"user_id\":\"viewer@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"00:11:25\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 14:41:25'),
(231, 14, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"00:11:33\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 14:41:33'),
(232, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"00:11:48\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 14:41:48'),
(233, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"01:00:28\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:30:28'),
(234, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"01:15:50\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:45:50'),
(235, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"01:20:13\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:50:13'),
(236, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"01:20:47\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:50:47'),
(237, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"01:21:11\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:51:11'),
(238, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"01:21:52\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:51:52'),
(239, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"01:21:56\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:51:56'),
(240, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"01:22:17\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 15:52:17'),
(241, 13, 'update', 'Edit Project Annual Plan', '{\"updatedtime\":\"2021-07-26 23:37:08\"}', '{\"updatedtime\":\"2021-08-02 01:52:07\"}', 'http://localhost/planning/project_annual_plan/edit/12', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 16:22:07'),
(242, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:03:02\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:33:02'),
(243, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"03:03:10\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:33:10'),
(244, 1, 'update', 'User', '{\"updatetime\":\"2021-07-23 21:26:05\"}', '{\"updatetime\":\"2021-08-02 03:03:34\"}', 'http://localhost/user_management/users/edit/15', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:33:34'),
(245, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:06:10\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:36:10'),
(246, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"03:06:32\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:36:32'),
(247, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:12:07\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:42:07'),
(248, 15, 'Login', 'Login Auth', NULL, '{\"user_id\":\"implementing@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"03:13:18\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:43:18'),
(249, 15, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:19:04\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:49:04'),
(250, 14, 'Login', 'Login Auth', NULL, '{\"user_id\":\"viewer@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"03:19:12\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:49:12'),
(251, 14, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:23:50\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:53:50'),
(252, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"03:23:57\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:53:57'),
(253, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"03:24:06\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 17:54:06'),
(254, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"07:02:39\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 21:32:39'),
(255, 13, 'update', 'Update Project Background', '{\"project_code\":\"\",\"rs_quarterly_q1_month_date\":\"0\",\"rs_quarterly_q2_month_date\":\"0\",\"rs_quarterly_q3_month_date\":\"0\",\"rs_quarterly_q4_month_date\":\"0\",\"rs_biannual1_month_date\":\"0\",\"rs_biannual2_month_date\":\"0\",\"rs_annual_month_date\":\"0\",\"updatedtime\":\"2021-07-30 10:57:16\"}', '{\"project_code\":\"WL.121\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month_date\":\"\",\"updatedtime\":\"2021-08-02 07:04:16\"}', 'http://localhost/planning/project/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 21:34:16'),
(256, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-02\",\"time\":\"07:43:24\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 22:13:24'),
(257, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-02\",\"time\":\"07:45:24\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-01 22:15:24'),
(258, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-04\",\"time\":\"00:33:59\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', '2021-08-03 15:03:59'),
(259, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-05\",\"time\":\"05:29:26\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-04 19:59:26'),
(260, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-06\",\"time\":\"06:13:51\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-05 20:43:51'),
(261, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-08-06\",\"time\":\"06:16:15\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-05 20:46:15'),
(262, 1, 'update', 'User Right', '{\"title\":\"cases_field_office\"}', '{\"title\":\"cases_overall\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-05 20:46:39'),
(263, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-06\",\"time\":\"06:16:48\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-05 20:46:48'),
(264, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-06\",\"time\":\"06:16:56\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-05 20:46:56'),
(265, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-06\",\"time\":\"23:54:31\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 14:24:31'),
(266, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"diversity\":\"PWD\",\"diversity_male\":\"100\",\"diversity_female\":\"20\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"comments\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:22:16\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 14:52:16'),
(267, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"diversity\":\"LGBTQ\",\"diversity_male\":\"100\",\"diversity_female\":\"20\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"comments\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:22:29\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 14:52:29'),
(268, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"diversity\":\"LGBTQ\",\"diversity_male\":\"100\",\"diversity_female\":\"20\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"comments\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:32:20\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 15:02:20'),
(269, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"economic_status\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-06-07\",\"case_type\":\"New\",\"case_number\":\"7438\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Female\",\"male\":\"150\",\"female\":\"50\",\"diversity\":\"LGBTQ\",\"diversity_male\":\"100\",\"diversity_female\":\"20\",\"economic_status\":\"ES-1\",\"place_residence\":\"Nakuru\",\"county\":\"2\",\"marital_status\":\"Single\",\"case_status\":\"New\",\"comments\":\"In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:33:44\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 15:03:44'),
(270, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"economic_status\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-08\",\"case_type\":\"Follow Up\",\"case_number\":\"59120\",\"field_office\":\"3\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"100\",\"female\":\"200\",\"diversity\":\"PWD\",\"diversity_male\":\"5\",\"diversity_female\":\"20\",\"economic_status\":\"ES-2\",\"place_residence\":\"Ngong Road\",\"county\":\"10\",\"marital_status\":\"Single\",\"case_status\":\"Stood over Generally\",\"comments\":\"\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:34:18\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 15:04:18'),
(271, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"male\":\"\",\"female\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"economic_status\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-07-21\",\"case_type\":\"New\",\"case_number\":\"18607\",\"field_office\":\"3\",\"age_survivor\":\"19-26 yrs\",\"gender\":\"Male\",\"male\":\"10\",\"female\":\"5\",\"diversity\":\"LGBTQ\",\"diversity_male\":\"40\",\"diversity_female\":\"55\",\"economic_status\":\"ES-3\",\"place_residence\":\"Lindi\",\"county\":\"3\",\"marital_status\":\"Divorced\",\"case_status\":\"Ongoing\",\"comments\":\" Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-07 00:34:41\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 15:04:41'),
(272, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"date\":\"2021-08-04\",\"case_type\":\"New\",\"case_number\":\"43297\",\"field_office\":\"4\",\"age_survivor\":\"27-49 yrs\",\"gender\":\"Male\",\"male\":\"4\",\"female\":\"5\",\"diversity\":\"PWD\",\"diversity_male\":\"5\",\"diversity_female\":\"4\",\"economic_status\":\"ES-1\",\"place_residence\":\"Nakuru\",\"county\":\"31\",\"marital_status\":\"Cohabiting\",\"case_status\":\"Stood over Generally\",\"comments\":\"\",\"createdby\":\"13\",\"createdtime\":\"2021-08-07 00:36:37\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 15:06:38'),
(273, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-08-07\",\"time\":\"05:15:00\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-06 19:45:01'),
(274, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-07\",\"time\":\"05:15:27\"}', 'http://localhost/auth/logout', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-06 19:45:27'),
(275, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-08-07\",\"time\":\"05:15:37\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-06 19:45:37'),
(276, 1, 'update', 'User Right', '{\"title\":\"project_annual_indicator_performance\"}', '{\"title\":\"cases_overall\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-06 19:46:13'),
(277, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-07\",\"time\":\"05:16:32\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 19:46:32'),
(278, 13, 'insert', 'Add Beneficiaries Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"reporting_period\":\"Jan-Mar\",\"county\":\"1\",\"type_beneficiaries\":\"Indirect Beneficiaries\",\"indirect_beneficiaries\":\"50000\",\"pwds_male\":\"\",\"pwds_female\":\"\",\"lgbtq_male\":\"\",\"lgbtq_female\":\"\",\"age_0_to_17_male\":\"\",\"age_0_to_17_female\":\"\",\"age_18_to_24_male\":\"\",\"age_18_to_24_female\":\"\",\"age_25_to_49_male\":\"\",\"age_25_to_49_female\":\"\",\"age_50_plus_male\":\"\",\"age_50_plus_female\":\"\",\"createdby\":\"13\",\"createtime\":\"2021-08-07 07:18:23\"}', 'http://localhost/reporting/project_data/beneficiaries_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 21:48:23'),
(279, 13, 'insert', 'Add Beneficiaries Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"reporting_period\":\"Apr-June\",\"county\":\"2\",\"type_beneficiaries\":\"Direct Beneficiaries\",\"indirect_beneficiaries\":\"\",\"pwds_male\":\"100\",\"pwds_female\":\"200\",\"lgbtq_male\":\"300\",\"lgbtq_female\":\"400\",\"age_0_to_17_male\":\"12\",\"age_0_to_17_female\":\"20\",\"age_18_to_24_male\":\"25\",\"age_18_to_24_female\":\"30\",\"age_25_to_49_male\":\"40\",\"age_25_to_49_female\":\"50\",\"age_50_plus_male\":\"60\",\"age_50_plus_female\":\"70\",\"createdby\":\"13\",\"createtime\":\"2021-08-07 07:29:42\"}', 'http://localhost/reporting/project_data/beneficiaries_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-06 21:59:42'),
(280, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-08\",\"time\":\"04:55:41\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 19:25:41'),
(281, 13, 'update', 'Edit Beneficiaries Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-08-08 05:10:37\"}', 'http://localhost/reporting/project_data/beneficiaries_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 19:40:37'),
(282, 13, 'update', 'Edit Beneficiaries Report', '{\"reporting_period\":\"Apr-June\",\"updatedtime\":\"2021-08-08 05:10:37\"}', '{\"reporting_period\":\"July-Sep\",\"updatedtime\":\"2021-08-08 05:10:49\"}', 'http://localhost/reporting/project_data/beneficiaries_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 19:40:50'),
(283, 13, 'update', 'Edit Beneficiaries Report', '{\"lgbtq_male\":\"300\",\"lgbtq_female\":\"400\",\"updatedtime\":\"2021-08-08 05:10:49\"}', '{\"lgbtq_male\":\"250\",\"lgbtq_female\":\"300\",\"updatedtime\":\"2021-08-08 05:11:18\"}', 'http://localhost/reporting/project_data/beneficiaries_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 19:41:18'),
(284, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-08-08\",\"time\":\"05:57:55\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-07 20:27:55'),
(285, 1, 'update', 'User Right', '{\"title\":\"project_annual_activity_performance\"}', '{\"title\":\"beneficiaries_report_national\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-07 20:38:07'),
(286, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-08\",\"time\":\"06:14:46\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 20:44:46'),
(287, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-08\",\"time\":\"06:14:56\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-07 20:44:56'),
(288, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-09\",\"time\":\"00:00:11\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 14:30:11'),
(289, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2020\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>sddsdsf<\\/p>\",\"challenges_experienced\":\"<p>sdfsdf<\\/p>\",\"success_stories\":\"<p>sdfsdfsdf<\\/p>\",\"activities_anticipated\":\"<p>sdfsdf<\\/p>\",\"file\":\"1628491626_62cbda2a314e918ba806.pdf\",\"createdby\":\"13\",\"createtime\":\"2021-08-09 01:47:06\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:17:07'),
(290, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"file\":\"1628491768_533e9997b47c64161494.pdf\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-09 01:49:28\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:19:28'),
(291, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2021\",\"key_highlights\":\"<p>assa<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>adsasd<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"file\":\"1628492242_f6930ebc002101c24563.xlsx\",\"createdby\":\"13\",\"createtime\":\"2021-08-09 01:57:22\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:27:23'),
(292, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-08-09 02:15:39\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:45:40'),
(293, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-08-09 02:15:39\"}', '{\"file\":\"1628493358_0a56418f21a6867ab992.docx\",\"updatedtime\":\"2021-08-09 02:15:58\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:45:58'),
(294, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-08-09 02:15:58\"}', '{\"updatedtime\":\"2021-08-09 02:16:07\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:46:07'),
(295, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-08-09 02:16:07\"}', '{\"file\":\"1628493388_f94fcc6a1fcbd0ddbe94.docx\",\"updatedtime\":\"2021-08-09 02:16:28\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:46:29'),
(296, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-08-09 02:16:28\"}', '{\"updatedtime\":\"2021-08-09 02:25:08\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:55:08'),
(297, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-08-09 02:25:08\"}', '{\"file\":\"1628493958_16d92357be7614418cd3.docx\",\"updatedtime\":\"2021-08-09 02:25:58\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:55:58'),
(298, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-08-09 02:25:58\"}', '{\"updatedtime\":\"2021-08-09 02:26:52\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 16:56:52'),
(299, 13, 'update', 'Edit Narrative Report', '{\"file\":\"1628491768_533e9997b47c64161494.pdf\",\"updatedtime\":\"2021-08-09 01:49:28\"}', '{\"file\":\"1628494220_81cff05a18f97707ba35.xlsx\",\"updatedtime\":\"2021-08-09 02:30:20\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:00:20'),
(300, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-08-09 02:30:20\"}', '{\"updatedtime\":\"2021-08-09 02:30:29\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/7', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:00:29'),
(301, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-07-26 23:38:47\"}', '{\"file\":\"1628495545_5de8c26d061d4f61d0ee.xlsx\",\"updatedtime\":\"2021-08-09 02:52:25\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:22:25'),
(302, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-08-09 02:52:25\"}', '{\"file\":\"1628495664_bbfa04bc770928194021.xlsx\",\"updatedtime\":\"2021-08-09 02:54:24\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:24:24'),
(303, 13, 'update', 'Edit Narrative Report', '{\"file\":\"1628495664_bbfa04bc770928194021.xlsx\",\"updatedtime\":\"2021-08-09 02:54:24\"}', '{\"file\":\"1628495719_973bb8044a5193bf375e.xlsx\",\"updatedtime\":\"2021-08-09 02:55:19\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:25:19'),
(304, 13, 'update', 'Edit Narrative Report', '{\"file\":\"1628495719_973bb8044a5193bf375e.xlsx\",\"updatedtime\":\"2021-08-09 02:55:19\"}', '{\"file\":\"1628495778_9752fe59143b4733890a.xlsx\",\"updatedtime\":\"2021-08-09 02:56:18\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:26:18'),
(305, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-07-15 07:14:34\"}', '{\"file\":\"1628496051_17d05730f88b80f9d8d1.docx\",\"updatedtime\":\"2021-08-09 03:00:51\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:30:51'),
(306, 13, 'update', 'Edit Narrative Report', '{\"file\":\"\",\"updatedtime\":\"2021-07-18 04:11:22\"}', '{\"file\":\"1628496291_17d0968113eacbf1f87f.xlsx\",\"updatedtime\":\"2021-08-09 03:04:51\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 17:34:51');
INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(307, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-08-09\",\"time\":\"05:02:18\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-08 19:32:18'),
(308, 1, 'update', 'User Right', '{\"title\":\"beneficiaries_report_county\"}', '{\"title\":\"beneficiaries_report_national\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:90.0) Gecko/20100101 Firefox/90.0', '2021-08-08 19:32:44'),
(309, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-09\",\"time\":\"05:05:07\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 19:35:07'),
(310, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-09\",\"time\":\"05:05:16\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 19:35:16'),
(311, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Testcxdsd\",\"activity_date\":\"2021-08-10\",\"reported_by\":\"verconics\",\"venue\":\"hall\",\"particiapnts_reached\":\"500\",\"objective_activity\":\"<p>sdsdfdsfsdfdsf<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"sdasdas\",\"way_forward\":\"dasdasdasd\",\"lesson_learnt\":\"dasdasdas\",\"recommendations\":\"asdasdasdas\",\"conclusions\":\"dasdasd\",\"createdby\":\"13\",\"createtime\":\"2021-08-09 09:06:00\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-08 23:36:00'),
(312, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-09\",\"time\":\"23:43:02\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 14:13:02'),
(313, 13, 'delete', 'Narrative Report', '{\"id\":\"1\",\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Testcxdsd\",\"activity_date\":\"2021-08-10\",\"reported_by\":\"verconics\",\"venue\":\"hall\",\"particiapnts_reached\":\"500\",\"objective_activity\":\"<p>sdsdfdsfsdfdsf<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"sdasdas\",\"way_forward\":\"dasdasdasd\",\"lesson_learnt\":\"dasdasdas\",\"recommendations\":\"asdasdasdas\",\"conclusions\":\"dasdasd\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-08-09 09:06:00\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"1\"', 'http://localhost/reporting/project_data/activity_reporting_tool/delete/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 14:29:11'),
(314, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Test Activity\",\"activity_date\":\"2021-08-17\",\"reported_by\":\"sdsdfdsf\",\"venue\":\"sdfsdfdsf\",\"particiapnts_reached\":\"sdfsdf\",\"objective_activity\":\"<p>sdfdsfsdf<\\/p>\",\"summary_events\":\"asasdasdas\",\"emerging_issues_activity\":\"dasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdsad\",\"conclusions\":\"asdsadas\",\"createdby\":\"13\",\"createtime\":\"2021-08-10 00:00:31\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 14:30:31'),
(315, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Test Activity\",\"activity_date\":\"2021-08-17\",\"reported_by\":\"sdsdfdsf\",\"venue\":\"sdfsdfdsf\",\"particiapnts_reached\":\"sdfsdf\",\"objective_activity\":\"<p>sdfdsfsdf<\\/p>\",\"summary_events\":\"asasdasdas\",\"emerging_issues_activity\":\"dasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdsad\",\"conclusions\":\"asdsadas\",\"createdby\":\"13\",\"createtime\":\"2021-08-10 00:02:55\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 14:32:55'),
(316, 13, 'delete', 'Narrative Report', '{\"id\":\"3\",\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Test Activity\",\"activity_date\":\"2021-08-17\",\"reported_by\":\"sdsdfdsf\",\"venue\":\"sdfsdfdsf\",\"particiapnts_reached\":\"0\",\"objective_activity\":\"<p>sdfdsfsdf<\\/p>\",\"summary_events\":\"asasdasdas\",\"emerging_issues_activity\":\"dasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdsad\",\"conclusions\":\"asdsadas\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-08-10 00:02:55\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"3\"', 'http://localhost/reporting/project_data/activity_reporting_tool/delete/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:40:08'),
(317, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Awareness Program\",\"activity_date\":\"2021-08-25\",\"reported_by\":\"Jacob\",\"venue\":\"Office Hall\",\"particiapnts_reached\":\"50\",\"objective_activity\":\"<p>Objective of the Activity<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"Emerging Issues from the Activity\",\"way_forward\":\"Way Forward\",\"lesson_learnt\":\"Lesson Learnt\",\"recommendations\":\"Recommendations\",\"conclusions\":\"Conclusions\",\"createdby\":\"13\",\"createtime\":\"2021-08-10 01:12:01\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:42:01'),
(318, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Awareness Program\",\"activity_date\":\"2021-08-25\",\"reported_by\":\"Jacob\",\"venue\":\"Office Hall\",\"particiapnts_reached\":\"50\",\"objective_activity\":\"<p>Objective of the Activity<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"Emerging Issues from the Activity\",\"way_forward\":\"Way Forward\",\"lesson_learnt\":\"Lesson Learnt\",\"recommendations\":\"Recommendations\",\"conclusions\":\"Conclusions\",\"createdby\":\"13\",\"createtime\":\"2021-08-10 01:13:42\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:43:42'),
(319, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"Awareness Program\",\"activity_date\":\"1969-12-31\",\"reported_by\":\"Jacob\",\"venue\":\"Office Hall\",\"particiapnts_reached\":\"50\",\"objective_activity\":\"<p>Objective of the Activity<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"Emerging Issues from the Activity\",\"way_forward\":\"Way Forward\",\"lesson_learnt\":\"Lesson Learnt\",\"recommendations\":\"Recommendations\",\"conclusions\":\"Conclusions\",\"createdby\":\"13\",\"createtime\":\"2021-08-10 01:15:03\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:45:03'),
(320, 13, 'update', 'Edit Activity Reporting Tool', '{\"activity_title\":\"Awareness Program\",\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"activity_title\":\"M&E Training\",\"updatedby\":\"13\",\"updatedtime\":\"2021-08-10 01:19:10\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:49:10'),
(321, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-08-10 01:19:10\"}', '{\"updatedtime\":\"2021-08-10 01:21:02\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:51:02'),
(322, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-08-10 01:21:02\"}', '{\"updatedtime\":\"2021-08-10 01:21:48\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:51:48'),
(323, 13, 'update', 'Edit Activity Reporting Tool', '{\"objective_activity\":\"<p>Objective of the Activity<\\/p>\",\"summary_events\":\"Summary of the Events\",\"emerging_issues_activity\":\"Emerging Issues from the Activity\",\"way_forward\":\"Way Forward\",\"lesson_learnt\":\"Lesson Learnt\",\"recommendations\":\"Recommendations\",\"conclusions\":\"Conclusions\",\"updatedtime\":\"2021-08-10 01:21:48\"}', '{\"objective_activity\":\"<ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<\\/li><li>Aenean quis velit quis ligula tristique porta at ac diam.<\\/li><li>Aenean ac risus aliquam, lacinia mi at, scelerisque odio<\\/li><li>Vivamus vel mi et nulla interdum lacinia.<\\/li><li>Fusce venenatis neque in eros consectetur efficitur.<\\/li><\\/ul>\",\"summary_events\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"emerging_issues_activity\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"way_forward\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"lesson_learnt\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"recommendations\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"conclusions\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"updatedtime\":\"2021-08-10 01:23:55\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-09 15:53:55'),
(324, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-11\",\"time\":\"22:49:37\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 13:19:37'),
(325, 13, 'insert', 'Add Activity', NULL, '{\"workflow_id\":\"2\",\"output_id\":\"2\",\"activity_type\":\"Non-Budget Activity\",\"activity_name\":\"Cases sorted for Women Violence\'s\",\"activity_code\":\"\",\"createdby\":\"13\",\"createdtime\":\"2021-08-12 01:25:18\"}', 'http://localhost/planning/project_me_plan/add_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 15:55:18'),
(326, 13, 'insert', 'Add Activity', NULL, '{\"workflow_id\":\"2\",\"output_id\":\"2\",\"activity_type\":\"Budget Activity\",\"activity_name\":\"1\",\"activity_code\":\"WVCFD\",\"createdby\":\"13\",\"createdtime\":\"2021-08-12 01:53:50\"}', 'http://localhost/planning/project_me_plan/add_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 16:23:50'),
(327, 13, 'update', 'Edit Activity', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-08-12 02:38:21\"}', 'http://localhost/planning/project_me_plan/edit_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 17:08:21'),
(328, 13, 'update', 'Edit Activity', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-08-12 02:38:41\"}', 'http://localhost/planning/project_me_plan/edit_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 17:08:41'),
(329, 13, 'update', 'Edit Activity', '{\"updatedtime\":\"2021-08-12 02:38:21\"}', '{\"updatedtime\":\"2021-08-12 03:07:19\"}', 'http://localhost/planning/project_me_plan/edit_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 17:37:19'),
(330, 13, 'update', 'Edit Activity', '{\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-08-12 03:07:40\"}', 'http://localhost/planning/project_annual_plan/update_plan/12/?activity_id=4&output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 17:37:40'),
(331, 13, 'insert', 'Add Activity', NULL, '{\"workflow_id\":\"2\",\"output_id\":\"2\",\"activity_type\":\"Budget Activity\",\"activity_name\":\"1\",\"activity_code\":\"WVCFD\",\"createdby\":\"13\",\"createdtime\":\"2021-08-12 04:49:50\"}', 'http://localhost/planning/project_me_plan/add_activity/2/?output_id=2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-11 19:19:50'),
(332, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-16\",\"time\":\"00:16:01\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', '2021-08-15 14:46:01'),
(333, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-08-18\",\"time\":\"23:57:39\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-08-18 14:27:39'),
(334, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-08-18\",\"time\":\"23:57:47\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-08-18 14:27:47'),
(335, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-08-19\",\"time\":\"00:05:05\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-08-18 14:35:05'),
(336, 1, 'insert', 'Add New Manage Users', NULL, '{\"base_id\":\"\",\"name\":\"vikas\",\"username\":\"wdvikas\",\"password\":\"$2y$10$8cAK8TnvppWUBmvt4Wo5AOVKD.8k6ftQZ0S55dgzaFaoowqLPAPee\",\"email\":\"wdvikas@gmail.com\",\"contact_number\":\"8802533984\",\"user_type\":\"FAWE User\",\"user_group_id\":\"16\",\"banned\":0,\"activated\":1,\"createdby\":\"1\",\"createtime\":\"2021-08-19 00:05:44\"}', 'http://localhost/user_management/users/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-08-18 14:35:44'),
(337, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-08\",\"time\":\"06:53:30\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', '2021-09-07 21:23:30'),
(338, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-08\",\"time\":\"23:13:19\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 13:43:19'),
(339, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"date\":\"2021-09-09\",\"case_type\":\"New\",\"case_number\":\"62495\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Male\",\"diversity\":\"PWD\",\"diversity_male\":\"10\",\"diversity_female\":\"5\",\"economic_status\":\"\",\"place_residence\":\"Loca\",\"county\":\"1\",\"marital_status\":\"Married\",\"case_status\":\"New\",\"comments\":\"\",\"createdby\":\"13\",\"createdtime\":\"2021-09-08 23:41:54\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:11:54'),
(340, 13, 'delete', 'cases_database', NULL, '\"5\"', 'http://localhost/reporting/organizational_data/cases_database/delete/5', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:12:16'),
(341, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"date\":\"2021-09-09\",\"case_type\":\"New\",\"case_number\":\"94857\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Male\",\"diversity\":\"PWD\",\"diversity_male\":\"5\",\"diversity_female\":\"10\",\"economic_status\":\"\",\"place_residence\":\"Agura\",\"county\":\"\",\"marital_status\":\"Divorced\",\"case_status\":\"Stood over Generally\",\"comments\":\"\",\"createdby\":\"13\",\"createdtime\":\"2021-09-08 23:42:56\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:12:56'),
(342, 13, 'update', 'Edit Organization Strategic Plans', '{\"updatedtime\":\"2021-07-31 00:40:58\"}', '{\"updatedtime\":\"2021-09-08 23:48:04\"}', 'http://localhost/planning/strategic_plans/edit_select/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:18:04'),
(343, 13, 'update', 'Edit Organization Strategic Plans', '{\"updatedtime\":\"2021-09-08 23:48:04\"}', '{\"updatedtime\":\"2021-09-08 23:48:13\"}', 'http://localhost/planning/strategic_plans/edit_select/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:18:13'),
(344, 13, 'insert', 'Organization Strategic Plans', NULL, '{\"base_id\":\"0\",\"plan_name\":\"asdasdas\",\"startyear\":\"2024\",\"endyear\":\"2028\",\"status\":1,\"createdby\":\"13\",\"createdtime\":\"2021-09-08 23:48:34\"}', 'http://localhost/planning/strategic_plans/select_list', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:18:34'),
(345, 13, 'delete', 'Organization Strategic Plans', '{\"id\":\"4\",\"base_id\":\"0\",\"plan_name\":\"asdasdas\",\"startyear\":\"2024\",\"endyear\":\"2028\",\"status\":\"1\",\"createdby\":\"13\",\"updatedby\":\"0\",\"createdtime\":\"2021-09-08 23:48:34\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"4\"', 'http://localhost/planning/strategic_plans/delete/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 14:27:58'),
(346, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-09\",\"time\":\"05:45:59\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 20:15:59'),
(347, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"2\",\"year\":\"2023\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:08:40\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:38:41'),
(348, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"2\",\"year\":\"2024\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:12:44\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:42:44'),
(349, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"2\",\"year\":\"2025\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:16:36\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:46:36'),
(350, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"2\",\"year\":\"2025\",\"quarter\":\"Q4\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:22:16\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:52:16'),
(351, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2022\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asdasdd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asas<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:25:48\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:55:48'),
(352, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2022\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asdasdd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asas<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-09 08:27:20\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-08 22:57:20'),
(353, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-10\",\"time\":\"02:25:34\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 16:55:34'),
(354, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2022\",\"quarter\":\"Q4\",\"key_highlights\":\"<p>t<\\/p>\",\"challenges_experienced\":\"<p>b<\\/p>\",\"success_stories\":\"<p>s<\\/p>\",\"activities_anticipated\":\"<p>l<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-10 02:27:02\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 16:57:03'),
(355, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-10\",\"time\":\"04:39:43\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 19:09:43'),
(356, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-10 05:47:13\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/15', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:17:13'),
(357, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-10 05:47:13\"}', '{\"updatedtime\":\"2021-09-10 05:47:27\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/15', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:17:27'),
(358, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-10 05:47:27\"}', '{\"updatedtime\":\"2021-09-10 05:47:41\"}', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/edit/15', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:17:41'),
(359, 13, 'delete', 'Narrative Report', '{\"id\":\"14\",\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2022\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asdasdd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asas<\\/p>\",\"file\":null,\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-09-09 08:27:20\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"14\"', 'http://localhost/reporting/organizational_data/org_quarterly_narrative_report/delete/14', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:17:45'),
(360, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"strategic_plan\":\"3\",\"year\":\"2023\",\"key_highlights\":\"<p>assaas<\\/p>\",\"challenges_experienced\":\"<p>asasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-10 06:24:32\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:54:33'),
(361, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-10 06:25:31\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:55:31'),
(362, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-10 06:25:31\"}', '{\"updatedtime\":\"2021-09-10 06:25:46\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:55:46'),
(363, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-10 06:25:46\"}', '{\"updatedtime\":\"2021-09-10 06:26:37\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:56:37'),
(364, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-10 06:26:37\"}', '{\"updatedtime\":\"2021-09-10 06:26:46\"}', 'http://localhost/reporting/organizational_data/org_annual_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-09 20:56:46'),
(365, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-10\",\"time\":\"23:55:34\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 14:25:34'),
(366, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 01:27:04\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 15:57:04'),
(367, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 01:27:47\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 15:57:47'),
(368, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-11 01:27:47\"}', '{\"updatedtime\":\"2021-09-11 01:27:59\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 15:57:59'),
(369, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2022\",\"quarter\":\"Q1+Q2\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asdasdasd<\\/p>\",\"success_stories\":\"<p>asdasdas<\\/p>\",\"activities_anticipated\":\"<p>asdasdasd<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 01:45:28\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 16:15:28'),
(370, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 01:46:35\"}', 'http://localhost/reporting/project_data/project_semi_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 16:16:35'),
(371, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2022\",\"key_highlights\":\"<p>asasdasd<\\/p>\",\"challenges_experienced\":\"<p>asasasdasas<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asdasdds<\\/p>\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 02:02:31\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 16:32:31'),
(372, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 02:03:19\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 16:33:19'),
(373, 13, 'update', 'Edit Narrative Report', '{\"updatedtime\":\"2021-09-11 02:03:19\"}', '{\"updatedtime\":\"2021-09-11 02:03:31\"}', 'http://localhost/reporting/project_data/project_annual_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 16:33:31'),
(374, 13, 'delete', 'Narrative Report', '{\"id\":\"1\",\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"M&E Training\",\"activity_date\":\"1969-12-31\",\"reported_by\":\"Jacob\",\"venue\":\"Office Hall\",\"particiapnts_reached\":\"50\",\"objective_activity\":\"<ul><li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<\\/li><li>Aenean quis velit quis ligula tristique porta at ac diam.<\\/li><li>Aenean ac risus aliquam, lacinia mi at, scelerisque odio<\\/li><li>Vivamus vel mi et nulla interdum lacinia.<\\/li><li>Fusce venenatis neque in eros consectetur efficitur.<\\/li><\\/ul>\",\"summary_events\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"emerging_issues_activity\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"way_forward\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"lesson_learnt\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"recommendations\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"conclusions\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt non lacus ut dignissim. Sed finibus et dolor in lobortis. Mauris congue purus in ex laoreet imperdiet. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse et dolor ac diam hendrerit ornare quis eget lectus. Mauris porta euismod finibus. Ut quis leo orci. Phasellus sagittis est convallis lorem consequat laoreet. Nulla lectus augue, lobortis quis tempor sed, sollicitudin at arcu. Donec ultrices, dolor nec eleifend dictum, justo turpis feugiat velit, vitae posuere magna mauris tincidunt augue. In dictum scelerisque turpis non porttitor. Donec interdum congue hendrerit. Vestibulum consequat eros auctor, laoreet libero id, faucibus neque.\",\"createdby\":\"13\",\"updatedby\":\"13\",\"createtime\":\"2021-08-10 01:15:03\",\"updatedtime\":\"2021-08-10 01:23:55\",\"flag\":\"0\"}', '\"1\"', 'http://localhost/reporting/project_data/activity_reporting_tool/delete/1', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:00:27'),
(375, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"aweqweqw\",\"activity_date\":\"2021-09-11\",\"reported_by\":\"qwqwe\",\"venue\":\"qweqwe\",\"particiapnts_reached\":\"qweqwe\",\"objective_activity\":\"<p>qweqweqwe<\\/p>\",\"summary_events\":\"assadsad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asdasdasdasda\",\"recommendations\":\"sdasdas\",\"conclusions\":\"dasdasd\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 02:31:06\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:01:06'),
(376, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 02:31:45\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:01:45'),
(377, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-11 02:31:45\"}', '{\"updatedtime\":\"2021-09-11 02:32:08\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:02:08'),
(378, 13, 'insert', 'Add Project Background', NULL, '{\"base_id\":\"0\",\"project_code\":\"TP002\",\"name\":\"Test Project -02\",\"start_date\":\"2021-05-01\",\"end_date\":\"2026-07-01\",\"duration\":\"5 year  0 month \",\"funding_partner\":\"2\",\"project_budget\":\"50000\",\"budget_currency\":\"2\",\"reporting_schedule\":\"Annual\",\"rs_monthly_jan\":\"January\",\"rs_monthly_jan_date\":\"\",\"rs_monthly_feb\":\"Februrary\",\"rs_monthly_feb_date\":\"\",\"rs_monthly_mar\":\"March\",\"rs_monthly_mar_date\":\"\",\"rs_monthly_apr\":\"April\",\"rs_monthly_apr_date\":\"\",\"rs_monthly_may\":\"May\",\"rs_monthly_may_date\":\"\",\"rs_monthly_june\":\"June\",\"rs_monthly_june_date\":\"\",\"rs_monthly_july\":\"July\",\"rs_monthly_july_date\":\"\",\"rs_monthly_aug\":\"August\",\"rs_monthly_aug_date\":\"\",\"rs_monthly_sep\":\"September\",\"rs_monthly_sep_date\":\"\",\"rs_monthly_oct\":\"October\",\"rs_monthly_oct_date\":\"\",\"rs_monthly_nov\":\"November\",\"rs_monthly_nov_date\":\"\",\"rs_monthly_dec\":\"December\",\"rs_monthly_dec_date\":\"\",\"rs_quarterly_q1_month\":\"\",\"rs_quarterly_q1_month_date\":\"\",\"rs_quarterly_q2_month\":\"\",\"rs_quarterly_q2_month_date\":\"\",\"rs_quarterly_q3_month\":\"\",\"rs_quarterly_q3_month_date\":\"\",\"rs_quarterly_q4_month\":\"\",\"rs_quarterly_q4_month_date\":\"\",\"rs_biannual1_month\":\"\",\"rs_biannual1_month_date\":\"\",\"rs_biannual2_month\":\"\",\"rs_biannual2_month_date\":\"\",\"rs_annual_month\":\"January\",\"rs_annual_month_date\":\"14\",\"person_responsible\":\"13\",\"implementing_partner\":\"1\",\"project_status\":\"Pipeline\",\"report_submission_date\":\"2021-09-22\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 02:42:15\"}', 'http://localhost/planning/project/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:12:15'),
(379, 13, 'insert', 'Project M&E Plan', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"status\":1,\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:42:27\"}', 'http://localhost/planning/project_me_plan/select_list', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:12:27'),
(380, 13, 'insert', 'Add Project M&E Plan Goal', NULL, '{\"workflow_id\":\"3\",\"project_id\":\"12\",\"name\":\"GOOL\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:42:49\"}', 'http://localhost/planning/project_me_plan/add_goal/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:12:49'),
(381, 13, 'insert', 'Add Project Goal Indicator', NULL, '{\"goal_id\":\"4\",\"indicator\":\"Gool Indicator-1\",\"indicator_category\":\"Quantitative\",\"unit\":\"1\",\"definition\":\"asasd\",\"means_of_verification\":\"sadasd\",\"baseline\":\"10\",\"target\":\"500\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:43:34\"}', 'http://localhost/planning/project_me_plan/add_goal_indicator/3/?goal_id=4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:13:34'),
(382, 13, 'insert', 'Add Project M&E Plan Outcome', NULL, '{\"goal_id\":\"4\",\"name\":\"ooooutcome\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:43:43\"}', 'http://localhost/planning/project_me_plan/add_outcome/3/?goal_id=4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:13:43'),
(383, 13, 'insert', 'Add Project Outcome Indicator', NULL, '{\"outcome_id\":\"3\",\"indicator\":\"ooooutcome Ind-01\",\"indicator_category\":\"Quantitative\",\"unit\":\"5\",\"definition\":\"asasd\",\"means_of_verification\":\"asas\",\"baseline\":\"0\",\"target\":\"600\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:44:33\"}', 'http://localhost/planning/project_me_plan/add_outcome_indicator/3/?outcome_id=3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:14:33'),
(384, 13, 'insert', 'Add Project M&E Plan Output', NULL, '{\"outcome_id\":\"3\",\"name\":\"ooooutput \",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:44:49\"}', 'http://localhost/planning/project_me_plan/add_output/3/?outcome_id=3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:14:50');
INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(385, 13, 'insert', 'Add Project M&E Plan Indicator', NULL, '{\"output_id\":\"3\",\"indicator\":\"ooooutput Ind-1\",\"indicator_category\":\"Quantitative\",\"unit\":\"2\",\"definition\":\"asasdasdas\",\"means_of_verification\":\"dasd\",\"baseline\":\"0\",\"target\":\"9800\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:45:32\"}', 'http://localhost/planning/project_me_plan/add_output_indicator/3/?output_id=3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:15:32'),
(386, 13, 'insert', 'Add Activity', NULL, '{\"workflow_id\":\"3\",\"output_id\":\"3\",\"activity_type\":\"Non-Budget Activity\",\"activity_name\":\"Test Non Budget Activity Project-2\",\"activity_code\":\"001\",\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:46:20\"}', 'http://localhost/planning/project_me_plan/add_activity/3/?output_id=3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:16:20'),
(387, 13, 'insert', 'Project Annual Plan', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2021\",\"status\":1,\"createdby\":\"13\",\"createdtime\":\"2021-09-11 02:47:27\"}', 'http://localhost/planning/project_annual_plan/select_list', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:17:27'),
(388, 13, 'update', 'Edit Activity', '{\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 02:48:00\"}', 'http://localhost/planning/project_annual_plan/update_plan/13/?activity_id=7&output_id=3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:18:00'),
(389, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"12\",\"year\":\"2021\",\"quarter\":\"Q1\",\"base_id\":\"0\",\"report_name\":\"sdsdf\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 02:49:53\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:19:53'),
(390, 13, 'update', 'Edit Project M&E Plan', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-11 03:03:29\"}', 'http://localhost/planning/project_me_plan/edit/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:33:29'),
(391, 13, 'insert', 'Add Project Quarterly Workplan Progress Report', NULL, '{\"year\":\"2021\",\"base_id\":\"0\",\"project\":\"12\",\"quarter\":\"Q1\",\"report_name\":\"asdasd\",\"createdby\":\"13\",\"createtime\":\"2021-09-11 03:15:05\"}', 'http://localhost/reporting/project_data/project_quarterly_workplan_progress_reports/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 17:45:06'),
(392, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-11\",\"time\":\"05:44:00\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-10 20:14:00'),
(393, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-13\",\"time\":\"00:10:44\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 14:40:44'),
(394, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-11 02:32:08\"}', '{\"updatedtime\":\"2021-09-13 02:58:28\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:28:28'),
(395, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 02:58:28\"}', '{\"updatedtime\":\"2021-09-13 03:00:14\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:30:14'),
(396, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:00:14\"}', '{\"updatedtime\":\"2021-09-13 03:00:46\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:30:46'),
(397, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:00:46\"}', '{\"updatedtime\":\"2021-09-13 03:01:55\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:31:55'),
(398, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:01:55\"}', '{\"updatedtime\":\"2021-09-13 03:11:40\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:41:40'),
(399, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:11:40\"}', '{\"updatedtime\":\"2021-09-13 03:19:41\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:49:41'),
(400, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:19:41\"}', '{\"updatedtime\":\"2021-09-13 03:20:00\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:50:00'),
(401, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:20:00\"}', '{\"updatedtime\":\"2021-09-13 03:22:06\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:52:06'),
(402, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:22:06\"}', '{\"updatedtime\":\"2021-09-13 03:22:22\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:52:22'),
(403, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:22:22\"}', '{\"updatedtime\":\"2021-09-13 03:23:01\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:53:01'),
(404, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:23:01\"}', '{\"updatedtime\":\"2021-09-13 03:23:49\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 17:53:49'),
(405, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:23:49\"}', '{\"updatedtime\":\"2021-09-13 03:36:58\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 18:06:58'),
(406, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:36:58\"}', '{\"updatedtime\":\"2021-09-13 03:37:21\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-12 18:07:21'),
(407, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 03:37:21\"}', '{\"updatedtime\":\"2021-09-13 11:42:05\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 02:12:05'),
(408, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 11:42:05\"}', '{\"updatedtime\":\"2021-09-13 11:45:44\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 02:15:44'),
(409, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-13\",\"time\":\"13:54:37\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:24:37'),
(410, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-13\",\"time\":\"13:55:37\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:25:37'),
(411, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-13\",\"time\":\"14:01:07\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:31:07'),
(412, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 11:45:44\"}', '{\"updatedtime\":\"2021-09-13 14:13:46\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:43:46'),
(413, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:13:46\"}', '{\"updatedtime\":\"2021-09-13 14:15:12\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:45:12'),
(414, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:15:12\"}', '{\"updatedtime\":\"2021-09-13 14:17:10\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:47:10'),
(415, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:17:10\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:17:50\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:47:50'),
(416, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:17:50\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:18:06\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:48:07'),
(417, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:18:06\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:18:31\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:48:31'),
(418, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:18:31\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:19:04\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:49:04'),
(419, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:19:04\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:19:22\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 04:49:22'),
(420, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:19:22\"}', '{\"updatedtime\":\"2021-09-13 14:42:30\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:12:30'),
(421, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:42:30\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:42:57\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:12:57'),
(422, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:42:57\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:43:19\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:13:19'),
(423, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:43:19\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:43:31\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:13:31'),
(424, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:43:31\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:44:23\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:14:23'),
(425, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:44:23\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:44:34\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:14:34'),
(426, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:44:34\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:45:08\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:15:08'),
(427, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:45:08\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:45:43\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:15:43'),
(428, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:45:43\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:46:01\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:16:01'),
(429, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:46:01\",\"report_status\":\"2\"}', '{\"updatedtime\":\"2021-09-13 14:46:13\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:16:14'),
(430, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 14:46:13\"}', '{\"updatedtime\":\"2021-09-13 15:01:40\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:31:40'),
(431, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-13 15:01:40\"}', '{\"updatedtime\":\"2021-09-13 15:02:15\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 05:32:15'),
(432, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-14\",\"time\":\"07:44:50\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-13 22:14:50'),
(433, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-14\",\"time\":\"13:15:37\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 03:45:37'),
(434, 13, 'update', 'Edit Organization Strategic Plans', '{\"updatedtime\":\"2021-09-08 23:48:13\"}', '{\"updatedtime\":\"2021-09-14 16:11:30\"}', 'http://localhost/planning/strategic_plans/edit_select/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 06:41:30'),
(435, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-14 18:04:20\",\"report_status\":\"3\"}', '{\"updatedtime\":\"2021-09-14 18:17:08\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 08:47:08'),
(436, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-14 18:17:08\",\"report_status\":\"3\"}', '{\"updatedtime\":\"2021-09-14 18:20:52\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 08:50:52'),
(437, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-14 18:20:52\",\"report_status\":\"3\"}', '{\"updatedtime\":\"2021-09-14 18:21:20\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 08:51:20'),
(438, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-14 18:21:20\",\"report_status\":\"3\"}', '{\"updatedtime\":\"2021-09-14 18:21:56\",\"report_status\":\"1\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 08:51:56'),
(439, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"Report activyt\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asdasdasd\",\"venue\":\"Hall\",\"particiapnts_reached\":\"20\",\"objective_activity\":\"<p>ssadasdsad<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"sadasdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdasd\",\"conclusions\":\"sadasdasd\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:41:52\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:11:52'),
(440, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"te\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"sddsf\",\"venue\":\"sdfsdf\",\"particiapnts_reached\":\"5\",\"objective_activity\":\"<p>sdfsdf<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasdasd\",\"recommendations\":\"asdasdas\",\"conclusions\":\"asdsad\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:44:16\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:14:16'),
(441, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"te\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"sddsf\",\"venue\":\"sdfsdf\",\"particiapnts_reached\":\"5\",\"objective_activity\":\"<p>sdfsdf<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasdasd\",\"recommendations\":\"asdasdas\",\"conclusions\":\"asdsad\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:45:46\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:15:46'),
(442, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"te\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"sddsf\",\"venue\":\"sdfsdf\",\"particiapnts_reached\":\"5\",\"objective_activity\":\"<p>sdfsdf<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasdasd\",\"recommendations\":\"asdasdas\",\"conclusions\":\"asdsad\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:46:19\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:16:19'),
(443, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"ghhh\",\"activity_date\":\"2021-09-20\",\"reported_by\":\"sdsdf\",\"venue\":\"sdfsdf\",\"particiapnts_reached\":\"10\",\"objective_activity\":\"<p>sdsdfsdf<\\/p>\",\"summary_events\":\"sdfsdf\",\"emerging_issues_activity\":\"sdfsdf\",\"way_forward\":\"dsfdsf\",\"lesson_learnt\":\"sdfdsf\",\"recommendations\":\"sdfdsf\",\"conclusions\":\"sdfdsf\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:47:14\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:17:14'),
(444, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"asasd\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asdasd\",\"venue\":\"asdasd\",\"particiapnts_reached\":\"asdasd\",\"objective_activity\":\"<p>asdasdasd<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdasd\",\"conclusions\":\"asdasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:50:44\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:20:44'),
(445, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"asasd\",\"activity_date\":\"1970-01-01\",\"reported_by\":\"asdasd\",\"venue\":\"asdasd\",\"particiapnts_reached\":\"asdasd\",\"objective_activity\":\"<p>asdasdasd<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdasd\",\"conclusions\":\"asdasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:52:32\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:22:32'),
(446, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"asasd\",\"activity_date\":\"1970-01-01\",\"reported_by\":\"asdasd\",\"venue\":\"asdasd\",\"particiapnts_reached\":\"asdasd\",\"objective_activity\":\"<p>asdasdasd<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdasd\",\"conclusions\":\"asdasd\",\"report_status\":1,\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:53:10\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:23:10'),
(447, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"activity_title\":\"asasd\",\"activity_date\":\"1970-01-01\",\"reported_by\":\"asdasd\",\"venue\":\"asdasd\",\"particiapnts_reached\":\"asdasd\",\"objective_activity\":\"<p>asdasdasd<\\/p>\",\"summary_events\":\"asdasd\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasd\",\"lesson_learnt\":\"asdasd\",\"recommendations\":\"asdasd\",\"conclusions\":\"asdasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-14 18:55:50\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:25:50'),
(448, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-14 18:56:03\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:26:03'),
(449, 13, 'update', 'Edit Activity Reporting Tool', '{\"updatedtime\":\"2021-09-14 18:56:03\"}', '{\"updatedtime\":\"2021-09-14 18:56:12\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/edit/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36', '2021-09-14 09:26:12'),
(450, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-15\",\"time\":\"07:48:02\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-14 22:18:02'),
(451, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2026\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>sdsdf<\\/p>\",\"challenges_experienced\":\"<p>sdfsdf<\\/p>\",\"success_stories\":\"<p>sdfsdf<\\/p>\",\"activities_anticipated\":\"<p>sdfsdfsfd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 10:03:38\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 00:33:38'),
(452, 13, 'delete', 'Narrative Report', '{\"id\":\"3\",\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>asasd<\\/p>\",\"challenges_experienced\":\"<p>asdasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"report_status\":\"0\",\"submitted_by\":\"0\",\"submitted_date\":null,\"submitted_to\":\"0\",\"reviwer_id\":\"0\",\"review_date\":null,\"report_file\":null,\"file\":null,\"createdby\":\"13\",\"updatedby\":\"13\",\"createtime\":\"2021-09-11 01:27:04\",\"updatedtime\":\"2021-09-11 01:27:59\",\"flag\":\"0\"}', '\"3\"', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/delete/3', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 00:33:45'),
(453, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2026\",\"quarter\":\"Q2\",\"key_highlights\":\"<p>zsdasdasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 10:04:33\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 00:34:33'),
(454, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2026\",\"quarter\":\"Q2\",\"key_highlights\":\"<p>zsdasdasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 10:08:39\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 00:38:39'),
(455, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2026\",\"quarter\":\"Q2\",\"key_highlights\":\"<p>zsdasdasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 10:09:29\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 00:39:29'),
(456, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-15\",\"time\":\"13:00:21\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 03:30:21'),
(457, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"assa\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asas\",\"venue\":\"\",\"particiapnts_reached\":\"asasd\",\"objective_activity\":\"<p>asdasd<\\/p>\",\"summary_events\":\"assad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asasdasd\",\"recommendations\":\"asdassd\",\"conclusions\":\"asasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 13:07:27\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 03:37:27'),
(458, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"assa\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asas\",\"venue\":\"\",\"particiapnts_reached\":\"asasd\",\"objective_activity\":\"<p>asdasd<\\/p>\",\"summary_events\":\"assad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asasdasd\",\"recommendations\":\"asdassd\",\"conclusions\":\"asasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 13:08:26\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 03:38:26'),
(459, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"assa\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asas\",\"venue\":\"\",\"particiapnts_reached\":\"asasd\",\"objective_activity\":\"<p>asdasd<\\/p>\",\"summary_events\":\"assad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asasdasd\",\"recommendations\":\"asdassd\",\"conclusions\":\"asasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 13:26:50\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 03:56:50'),
(460, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"assa\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asas\",\"venue\":\"\",\"particiapnts_reached\":\"asasd\",\"objective_activity\":\"<p>asdasd<\\/p>\",\"summary_events\":\"assad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asasdasd\",\"recommendations\":\"asdassd\",\"conclusions\":\"asasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 13:28:40\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 03:58:40'),
(461, 13, 'insert', 'Add Activity Reporting Tool', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"activity_title\":\"assa\",\"activity_date\":\"2021-09-15\",\"reported_by\":\"asas\",\"venue\":\"\",\"particiapnts_reached\":\"asasd\",\"objective_activity\":\"<p>asdasd<\\/p>\",\"summary_events\":\"assad\",\"emerging_issues_activity\":\"asdasd\",\"way_forward\":\"asdasdasd\",\"lesson_learnt\":\"asasdasd\",\"recommendations\":\"asdassd\",\"conclusions\":\"asasd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 13:33:20\"}', 'http://localhost/reporting/project_data/activity_reporting_tool/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 04:03:20'),
(462, 13, 'delete', 'Narrative Report', '{\"id\":\"4\",\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2026\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>sdsdf<\\/p>\",\"challenges_experienced\":\"<p>sdfsdf<\\/p>\",\"success_stories\":\"<p>sdfsdf<\\/p>\",\"activities_anticipated\":\"<p>sdfsdfsfd<\\/p>\",\"report_status\":\"1\",\"submitted_by\":\"0\",\"submitted_date\":null,\"submitted_to\":\"0\",\"reviwer_id\":\"0\",\"review_date\":null,\"report_file\":null,\"file\":null,\"createdby\":\"13\",\"updatedby\":\"0\",\"createtime\":\"2021-09-15 10:03:38\",\"updatedtime\":\"0000-00-00 00:00:00\",\"flag\":\"0\"}', '\"4\"', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/delete/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 05:02:13'),
(463, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2025\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>aasasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 14:32:29\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 05:02:30'),
(464, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2025\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>aasasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 14:47:00\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 05:17:01'),
(465, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2025\",\"quarter\":\"Q3\",\"key_highlights\":\"<p>aasasda<\\/p>\",\"challenges_experienced\":\"<p>sdasd<\\/p>\",\"success_stories\":\"<p>asdasda<\\/p>\",\"activities_anticipated\":\"<p>sdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 14:48:03\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 05:18:03'),
(466, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2023\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>sasd<\\/p>\",\"challenges_experienced\":\"<p>asasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 16:16:22\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 06:46:22'),
(467, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-15 16:16:34\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 06:46:34'),
(468, 13, 'update', 'Edit Narrative Report', '{\"project\":\"\",\"year\":\"\",\"quarter\":\"\",\"key_highlights\":\"\",\"challenges_experienced\":\"\",\"success_stories\":\"\",\"activities_anticipated\":\"\",\"report_status\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"project\":\"7\",\"year\":\"2023\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>sasd<\\/p>\",\"challenges_experienced\":\"<p>asasd<\\/p>\",\"success_stories\":\"<p>asdasd<\\/p>\",\"activities_anticipated\":\"<p>asdasd<\\/p>\",\"report_status\":\"1\",\"updatedby\":\"13\",\"updatedtime\":\"2021-09-15 16:17:54\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/11', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 06:47:54'),
(469, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2023\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>AS<\\/p>\",\"challenges_experienced\":\"<p>ASas<\\/p>\",\"success_stories\":\"<p>ASas<\\/p>\",\"activities_anticipated\":\"<p>ASas<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 16:19:12\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 06:49:12'),
(470, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-15 16:19:22\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/12', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 06:49:22'),
(471, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>Key highlights on your activities and interventions during this reporting period<\\/p>\",\"challenges_experienced\":\"<p>Challenges experienced and Mitigating measure<\\/p>\",\"success_stories\":\"<p>Success Stories\\/Best Practice\\/Lessons Learned<\\/p>\",\"activities_anticipated\":\"<p>Activities Anticipated for Next Reporting Period<\\/p>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 18:06:56\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 08:36:56'),
(472, 13, 'insert', 'Add Narrative Report', NULL, '{\"base_id\":\"0\",\"project\":\"12\",\"year\":\"2021\",\"quarter\":\"Q1\",\"key_highlights\":\"<p>a<\\/p>\",\"challenges_experienced\":\"<p>b<\\/p>\",\"success_stories\":\"<p>c<\\/p>\",\"activities_anticipated\":\"<ol><li>&nbsp;<\\/li><\\/ol>\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 18:17:45\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 08:47:45'),
(473, 13, 'update', 'Edit Narrative Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-15 18:18:04\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 08:48:04'),
(474, 13, 'update', 'Edit Narrative Report', '{\"report_status\":\"3\",\"updatedtime\":\"2021-09-15 18:18:31\"}', '{\"report_status\":\"1\",\"updatedtime\":\"2021-09-15 18:20:03\"}', 'http://localhost/reporting/project_data/project_quarterly_narrative_report/edit/2', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 08:50:03'),
(475, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1\",\"base_id\":\"0\",\"report_name\":\"First Report\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 20:12:40\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 10:42:41'),
(476, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"7\",\"year\":\"2021\",\"quarter\":\"Q1\",\"base_id\":\"0\",\"report_name\":\"First Report\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 20:14:17\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 10:44:17'),
(477, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"12\",\"year\":\"2022\",\"quarter\":\"Q2\",\"base_id\":\"0\",\"report_name\":\"sec-report\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 20:50:26\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:20:26'),
(478, 13, 'insert', 'Add Indicator Tracking Report', NULL, '{\"project\":\"12\",\"year\":\"2023\",\"quarter\":\"Q2\",\"base_id\":\"0\",\"report_name\":\"sdsd\",\"report_status\":\"1\",\"createdby\":\"13\",\"createtime\":\"2021-09-15 20:52:34\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:22:34'),
(479, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedby\":\"0\",\"updatedtime\":\"0000-00-00 00:00:00\"}', '{\"updatedby\":\"13\",\"updatedtime\":\"2021-09-15 20:52:47\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:22:47'),
(480, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-09-15 20:52:47\"}', '{\"updatedtime\":\"2021-09-15 20:53:48\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:23:48'),
(481, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-09-15 20:53:48\"}', '{\"updatedtime\":\"2021-09-15 20:56:39\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:26:39'),
(482, 13, 'update', 'Edit Indicator Tracking Report', '{\"updatedtime\":\"2021-09-15 20:57:08\"}', '{\"updatedtime\":\"2021-09-15 20:57:30\"}', 'http://localhost/reporting/project_data/project_quarterly_indicator_tracking_report/edit/4', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 11:27:30'),
(483, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"07:04:29\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 21:34:29'),
(484, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"127.0.0.1\",\"date\":\"2021-09-16\",\"time\":\"07:17:47\"}', 'http://localhost/auth/login', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-15 21:47:47'),
(485, 1, 'update', 'User Right', '{\"title\":\"monitoring_visit_report\"}', '{\"title\":\"project_annual_plan\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-15 21:50:25'),
(486, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"07:30:11\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:00:11'),
(487, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"07:30:19\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:00:19'),
(488, 1, 'update', 'User Right', '{\"title\":\"beneficiaries_report_county\"}', '{\"title\":\"change_password\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-15 22:27:08');
INSERT INTO `user_audit_trails` (`id`, `user_id`, `event`, `table_name`, `old_values`, `new_values`, `url`, `name`, `ip_address`, `user_agent`, `created_at`) VALUES
(489, 1, 'update', 'User Right', '{\"title\":\"project_annual_activity_performance\"}', '{\"title\":\"change_password\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-15 22:27:40'),
(490, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"07:58:02\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:28:02'),
(491, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"07:58:09\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:28:09'),
(492, 1, 'update', 'User Right', '{\"title\":\"cases_overall\"}', '{\"title\":\"change_password\"}', 'http://localhost/user_management/user_rights/edit/16', '', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:92.0) Gecko/20100101 Firefox/92.0', '2021-09-15 22:28:18'),
(493, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"07:58:23\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:28:23'),
(494, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"07:58:30\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:28:30'),
(495, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"08:02:16\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:32:16'),
(496, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"08:09:35\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:39:35'),
(497, 13, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"08:10:22\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:40:22'),
(498, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"08:10:30\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:40:30'),
(499, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"08:11:59\"}', 'http://localhost/auth/logout', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:41:59'),
(500, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"::1\",\"date\":\"2021-09-16\",\"time\":\"08:12:44\"}', 'http://localhost/auth/login', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 22:42:44'),
(501, 13, 'insert', 'Add Cases Details', NULL, '{\"base_id\":\"0\",\"date\":\"2021-09-16\",\"case_type\":\"New\",\"case_number\":\"07842\",\"file_number\":\"00007\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Others\",\"diversity\":\"PWD\",\"diversity_male\":\"1\",\"diversity_female\":\"2\",\"economic_status\":\"ES-1\",\"place_residence\":\"hhhh\",\"county\":\"2\",\"marital_status\":\"Cohabiting\",\"more_details_on_services_provided\":\"we have consulted with neorologist to  give the proper consultation\",\"case_status\":\"Ongoing\",\"comments\":\"no\",\"createdby\":\"13\",\"createdtime\":\"2021-09-16 09:25:29\"}', 'http://localhost/reporting/organizational_data/cases_database/add', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-15 23:55:29'),
(502, 13, 'update', 'Edit Cases Details', '{\"base_id\":\"\",\"date\":\"\",\"case_type\":\"\",\"case_number\":\"\",\"file_number\":\"\",\"field_office\":\"\",\"age_survivor\":\"\",\"gender\":\"\",\"diversity\":\"\",\"diversity_male\":\"\",\"diversity_female\":\"\",\"economic_status\":\"\",\"place_residence\":\"\",\"county\":\"\",\"marital_status\":\"\",\"more_details_on_services_provided\":\"\",\"case_status\":\"\",\"comments\":\"\",\"updatedby\":\"\",\"updatedtime\":\"\"}', '{\"base_id\":\"0\",\"date\":\"2021-09-16\",\"case_type\":\"New\",\"case_number\":\"7842\",\"file_number\":\"00007\",\"field_office\":\"2\",\"age_survivor\":\"18 yrs and Younger\",\"gender\":\"Others\",\"diversity\":\"PWD\",\"diversity_male\":\"1\",\"diversity_female\":\"2\",\"economic_status\":\"ES-1\",\"place_residence\":\"hhhh\",\"county\":\"2\",\"marital_status\":\"N\\/A\",\"more_details_on_services_provided\":\"we have consulted with neorologist to  give the proper consultation\",\"case_status\":\"Ongoing\",\"comments\":\"no\",\"updatedby\":\"13\",\"updatedtime\":\"2021-09-16 09:31:33\"}', 'http://localhost/reporting/organizational_data/cases_database/edit/8', '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 00:01:33'),
(503, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"47.31.160.59\",\"date\":\"2021-09-16\",\"time\":\"10:07:20\"}', 'https://www.FAWE.mandeonline.com/auth/login', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:07:20'),
(504, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"47.31.160.59\",\"date\":\"2021-09-16\",\"time\":\"10:21:43\"}', 'https://www.FAWE.mandeonline.com/auth/login', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:21:43'),
(505, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"10:28:57\"}', 'https://www.FAWE.mandeonline.com/auth/logout', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:28:57'),
(506, 1, 'Login', 'Login Auth', NULL, '{\"user_id\":\"admin@super\",\"ip_address\":\"47.31.160.59\",\"date\":\"2021-09-16\",\"time\":\"10:29:09\"}', 'https://www.FAWE.mandeonline.com/auth/login', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:29:09'),
(507, 1, 'Logout', 'Logout Auth', NULL, '{\"date\":\"2021-09-16\",\"time\":\"10:29:38\"}', 'https://www.FAWE.mandeonline.com/auth/logout', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:29:38'),
(508, 13, 'Login', 'Login Auth', NULL, '{\"user_id\":\"FAWE@user\",\"ip_address\":\"47.31.160.59\",\"date\":\"2021-09-16\",\"time\":\"10:30:00\"}', 'https://www.FAWE.mandeonline.com/auth/login', '', '47.31.160.59', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36', '2021-09-16 06:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `username`, `token`, `timemodified`) VALUES
(1, 'admin@super', 'ThA6w1uqIQ', '2021-09-16 07:29:09'),
(2, 'FAWE@user', '8NrOc5nh0F', '2021-09-16 07:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_reporting_comments_history`
--
ALTER TABLE `activity_reporting_comments_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_reporting_tool`
--
ALTER TABLE `activity_reporting_tool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_reporting_tool_documents`
--
ALTER TABLE `activity_reporting_tool_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_base_id` (`base_id`);

--
-- Indexes for table `activity_reporting_tool_map`
--
ALTER TABLE `activity_reporting_tool_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_reports`
--
ALTER TABLE `activity_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_database`
--
ALTER TABLE `cases_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases_map_case_context`
--
ALTER TABLE `cases_map_case_context`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`case_context`);

--
-- Indexes for table `cases_map_incidents_referred`
--
ALTER TABLE `cases_map_incidents_referred`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`incidents_referred`);

--
-- Indexes for table `cases_map_services_provided`
--
ALTER TABLE `cases_map_services_provided`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`services_provided`);

--
-- Indexes for table `cases_map_type_gbv`
--
ALTER TABLE `cases_map_type_gbv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`type_gbv`);

--
-- Indexes for table `ctbl_usergroups`
--
ALTER TABLE `ctbl_usergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctbl_users`
--
ALTER TABLE `ctbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctbl_user_access_model`
--
ALTER TABLE `ctbl_user_access_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_office`
--
ALTER TABLE `field_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final_evaluation_report`
--
ALTER TABLE `final_evaluation_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funding_partner`
--
ALTER TABLE `funding_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `implementing_partner`
--
ALTER TABLE `implementing_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_activities`
--
ALTER TABLE `import_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_activities_data`
--
ALTER TABLE `import_activities_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_county`
--
ALTER TABLE `mas_county`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_currency`
--
ALTER TABLE `mas_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_dimensions`
--
ALTER TABLE `mas_dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_district`
--
ALTER TABLE `mas_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_region`
--
ALTER TABLE `mas_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mas_unit`
--
ALTER TABLE `mas_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_visit_report`
--
ALTER TABLE `monitoring_visit_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_visit_report_agenda_map`
--
ALTER TABLE `monitoring_visit_report_agenda_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`agenda_date`);

--
-- Indexes for table `monitoring_visit_report_issue_action_map`
--
ALTER TABLE `monitoring_visit_report_issue_action_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`workflow_id`),
  ADD KEY `project_map_district_ibfk_2` (`issue_identified`(1024));

--
-- Indexes for table `monthly_monitoring_report`
--
ALTER TABLE `monthly_monitoring_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_progress_report`
--
ALTER TABLE `monthly_progress_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objective_indicator_target`
--
ALTER TABLE `objective_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_annual_indicator_tracking_report`
--
ALTER TABLE `org_annual_indicator_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_annual_indicator_tracking_report_map`
--
ALTER TABLE `org_annual_indicator_tracking_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_annual_narrative_report`
--
ALTER TABLE `org_annual_narrative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_data_strategic_plans_workflow`
--
ALTER TABLE `org_data_strategic_plans_workflow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_base_id` (`base_id`);

--
-- Indexes for table `org_intervention_indicator`
--
ALTER TABLE `org_intervention_indicator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_intervention_indicator_target`
--
ALTER TABLE `org_intervention_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_narrative_report_documents`
--
ALTER TABLE `org_narrative_report_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_base_id` (`base_id`);

--
-- Indexes for table `org_objective`
--
ALTER TABLE `org_objective`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_objective_indicator`
--
ALTER TABLE `org_objective_indicator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_quarterly_indicator_tracking_report`
--
ALTER TABLE `org_quarterly_indicator_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_quarterly_indicator_tracking_report_map`
--
ALTER TABLE `org_quarterly_indicator_tracking_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_quarterly_narrative_report`
--
ALTER TABLE `org_quarterly_narrative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `org_strategic_intervention`
--
ALTER TABLE `org_strategic_intervention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_activity` (`objective_id`);

--
-- Indexes for table `org_thematic_area`
--
ALTER TABLE `org_thematic_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_activity` (`mda_plan_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity`
--
ALTER TABLE `project_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity_annual_budget_map`
--
ALTER TABLE `project_activity_annual_budget_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity_annual_implementation_plan`
--
ALTER TABLE `project_activity_annual_implementation_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity_annual_plan`
--
ALTER TABLE `project_activity_annual_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity_reports`
--
ALTER TABLE `project_activity_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activity_reports_map`
--
ALTER TABLE `project_activity_reports_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_indicator_tracking_report`
--
ALTER TABLE `project_annual_indicator_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_indicator_tracking_report_map`
--
ALTER TABLE `project_annual_indicator_tracking_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_me_plan`
--
ALTER TABLE `project_annual_me_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_mda_plan` (`mande_plan_id`);

--
-- Indexes for table `project_annual_me_plan_workflow`
--
ALTER TABLE `project_annual_me_plan_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_narrative_report`
--
ALTER TABLE `project_annual_narrative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_plan_workflow`
--
ALTER TABLE `project_annual_plan_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_workplan_progress_report`
--
ALTER TABLE `project_annual_workplan_progress_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_annual_workplan_progress_report_mapping`
--
ALTER TABLE `project_annual_workplan_progress_report_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_baseline_report`
--
ALTER TABLE `project_baseline_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_beneficiaries_report`
--
ALTER TABLE `project_beneficiaries_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_goal`
--
ALTER TABLE `project_goal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workflow_constraint` (`workflow_id`);

--
-- Indexes for table `project_goal_indicator`
--
ALTER TABLE `project_goal_indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Outcome Constraints` (`goal_id`);

--
-- Indexes for table `project_goal_indicator_target`
--
ALTER TABLE `project_goal_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_implementation_plan_workflow`
--
ALTER TABLE `project_implementation_plan_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_indicator`
--
ALTER TABLE `project_indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Outcome Constraints` (`outcome_id`);

--
-- Indexes for table `project_indicator_target`
--
ALTER TABLE `project_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_map_county`
--
ALTER TABLE `project_map_county`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_map_district_ibfk_2` (`county_id`);

--
-- Indexes for table `project_map_district`
--
ALTER TABLE `project_map_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_map_region`
--
ALTER TABLE `project_map_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_map_thematic_area`
--
ALTER TABLE `project_map_thematic_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_map_district_ibfk_2` (`thematic_area_id`);

--
-- Indexes for table `project_me_plan_workflow`
--
ALTER TABLE `project_me_plan_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_midterm_evaluation_report`
--
ALTER TABLE `project_midterm_evaluation_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_monthly_progress_report_map`
--
ALTER TABLE `project_monthly_progress_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_narrative_report_documents`
--
ALTER TABLE `project_narrative_report_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `const_base_id` (`base_id`);

--
-- Indexes for table `project_notification_recepient_map`
--
ALTER TABLE `project_notification_recepient_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `project_map_district_ibfk_2` (`recepient_id`);

--
-- Indexes for table `project_outcome`
--
ALTER TABLE `project_outcome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Goal Constraints` (`goal_id`);

--
-- Indexes for table `project_outcome_indicator`
--
ALTER TABLE `project_outcome_indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Outcome Constraints` (`outcome_id`);

--
-- Indexes for table `project_outcome_indicator_target`
--
ALTER TABLE `project_outcome_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_outcome_journal_report`
--
ALTER TABLE `project_outcome_journal_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_output`
--
ALTER TABLE `project_output`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_output_indicator`
--
ALTER TABLE `project_output_indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Outcome Constraints` (`output_id`);

--
-- Indexes for table `project_output_indicator_target`
--
ALTER TABLE `project_output_indicator_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_indicator_tracking_report`
--
ALTER TABLE `project_quarterly_indicator_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_indicator_tracking_report_map`
--
ALTER TABLE `project_quarterly_indicator_tracking_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_narrative_report`
--
ALTER TABLE `project_quarterly_narrative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_progress_report_map`
--
ALTER TABLE `project_quarterly_progress_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_workplan_progress_reports`
--
ALTER TABLE `project_quarterly_workplan_progress_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_quarterly_workplan_progress_reports_mapping`
--
ALTER TABLE `project_quarterly_workplan_progress_reports_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_results_framework_workflow`
--
ALTER TABLE `project_results_framework_workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_semi_annual_indicator_tracking_report`
--
ALTER TABLE `project_semi_annual_indicator_tracking_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_semi_annual_indicator_tracking_report_map`
--
ALTER TABLE `project_semi_annual_indicator_tracking_report_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_semi_annual_narrative_report`
--
ALTER TABLE `project_semi_annual_narrative_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_semi_annual_workplan_progress_report`
--
ALTER TABLE `project_semi_annual_workplan_progress_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_semi_annual_workplan_progress_report_mapping`
--
ALTER TABLE `project_semi_annual_workplan_progress_report_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quarterly_progress_report`
--
ALTER TABLE `quarterly_progress_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_audit_trails`
--
ALTER TABLE `user_audit_trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_reporting_comments_history`
--
ALTER TABLE `activity_reporting_comments_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_reporting_tool`
--
ALTER TABLE `activity_reporting_tool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `activity_reporting_tool_documents`
--
ALTER TABLE `activity_reporting_tool_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_reporting_tool_map`
--
ALTER TABLE `activity_reporting_tool_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_reports`
--
ALTER TABLE `activity_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_database`
--
ALTER TABLE `cases_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_map_case_context`
--
ALTER TABLE `cases_map_case_context`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_map_incidents_referred`
--
ALTER TABLE `cases_map_incidents_referred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_map_services_provided`
--
ALTER TABLE `cases_map_services_provided`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cases_map_type_gbv`
--
ALTER TABLE `cases_map_type_gbv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ctbl_usergroups`
--
ALTER TABLE `ctbl_usergroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ctbl_users`
--
ALTER TABLE `ctbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `ctbl_user_access_model`
--
ALTER TABLE `ctbl_user_access_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `field_office`
--
ALTER TABLE `field_office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `final_evaluation_report`
--
ALTER TABLE `final_evaluation_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funding_partner`
--
ALTER TABLE `funding_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `implementing_partner`
--
ALTER TABLE `implementing_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `import_activities`
--
ALTER TABLE `import_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import_activities_data`
--
ALTER TABLE `import_activities_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mas_county`
--
ALTER TABLE `mas_county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `mas_currency`
--
ALTER TABLE `mas_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mas_dimensions`
--
ALTER TABLE `mas_dimensions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mas_district`
--
ALTER TABLE `mas_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `mas_region`
--
ALTER TABLE `mas_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `mas_unit`
--
ALTER TABLE `mas_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `monitoring_visit_report`
--
ALTER TABLE `monitoring_visit_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_visit_report_agenda_map`
--
ALTER TABLE `monitoring_visit_report_agenda_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_visit_report_issue_action_map`
--
ALTER TABLE `monitoring_visit_report_issue_action_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_monitoring_report`
--
ALTER TABLE `monthly_monitoring_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_progress_report`
--
ALTER TABLE `monthly_progress_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `objective_indicator_target`
--
ALTER TABLE `objective_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_annual_indicator_tracking_report`
--
ALTER TABLE `org_annual_indicator_tracking_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_annual_indicator_tracking_report_map`
--
ALTER TABLE `org_annual_indicator_tracking_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_annual_narrative_report`
--
ALTER TABLE `org_annual_narrative_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_data_strategic_plans_workflow`
--
ALTER TABLE `org_data_strategic_plans_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_intervention_indicator`
--
ALTER TABLE `org_intervention_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_intervention_indicator_target`
--
ALTER TABLE `org_intervention_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_narrative_report_documents`
--
ALTER TABLE `org_narrative_report_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_objective`
--
ALTER TABLE `org_objective`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_objective_indicator`
--
ALTER TABLE `org_objective_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_quarterly_indicator_tracking_report`
--
ALTER TABLE `org_quarterly_indicator_tracking_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_quarterly_indicator_tracking_report_map`
--
ALTER TABLE `org_quarterly_indicator_tracking_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_quarterly_narrative_report`
--
ALTER TABLE `org_quarterly_narrative_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_strategic_intervention`
--
ALTER TABLE `org_strategic_intervention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_thematic_area`
--
ALTER TABLE `org_thematic_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity`
--
ALTER TABLE `project_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity_annual_budget_map`
--
ALTER TABLE `project_activity_annual_budget_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity_annual_implementation_plan`
--
ALTER TABLE `project_activity_annual_implementation_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity_annual_plan`
--
ALTER TABLE `project_activity_annual_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity_reports`
--
ALTER TABLE `project_activity_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_activity_reports_map`
--
ALTER TABLE `project_activity_reports_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_indicator_tracking_report`
--
ALTER TABLE `project_annual_indicator_tracking_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_indicator_tracking_report_map`
--
ALTER TABLE `project_annual_indicator_tracking_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_me_plan`
--
ALTER TABLE `project_annual_me_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_me_plan_workflow`
--
ALTER TABLE `project_annual_me_plan_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_narrative_report`
--
ALTER TABLE `project_annual_narrative_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_annual_plan_workflow`
--
ALTER TABLE `project_annual_plan_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_workplan_progress_report`
--
ALTER TABLE `project_annual_workplan_progress_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_annual_workplan_progress_report_mapping`
--
ALTER TABLE `project_annual_workplan_progress_report_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_baseline_report`
--
ALTER TABLE `project_baseline_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_beneficiaries_report`
--
ALTER TABLE `project_beneficiaries_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_goal`
--
ALTER TABLE `project_goal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_goal_indicator`
--
ALTER TABLE `project_goal_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_goal_indicator_target`
--
ALTER TABLE `project_goal_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_implementation_plan_workflow`
--
ALTER TABLE `project_implementation_plan_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_indicator`
--
ALTER TABLE `project_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_indicator_target`
--
ALTER TABLE `project_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_map_county`
--
ALTER TABLE `project_map_county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_map_district`
--
ALTER TABLE `project_map_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project_map_region`
--
ALTER TABLE `project_map_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_map_thematic_area`
--
ALTER TABLE `project_map_thematic_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_me_plan_workflow`
--
ALTER TABLE `project_me_plan_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_midterm_evaluation_report`
--
ALTER TABLE `project_midterm_evaluation_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_monthly_progress_report_map`
--
ALTER TABLE `project_monthly_progress_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_narrative_report_documents`
--
ALTER TABLE `project_narrative_report_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_notification_recepient_map`
--
ALTER TABLE `project_notification_recepient_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_outcome`
--
ALTER TABLE `project_outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_outcome_indicator`
--
ALTER TABLE `project_outcome_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_outcome_indicator_target`
--
ALTER TABLE `project_outcome_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_outcome_journal_report`
--
ALTER TABLE `project_outcome_journal_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_output`
--
ALTER TABLE `project_output`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_output_indicator`
--
ALTER TABLE `project_output_indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_output_indicator_target`
--
ALTER TABLE `project_output_indicator_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_indicator_tracking_report`
--
ALTER TABLE `project_quarterly_indicator_tracking_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_indicator_tracking_report_map`
--
ALTER TABLE `project_quarterly_indicator_tracking_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_narrative_report`
--
ALTER TABLE `project_quarterly_narrative_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_progress_report_map`
--
ALTER TABLE `project_quarterly_progress_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_workplan_progress_reports`
--
ALTER TABLE `project_quarterly_workplan_progress_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_quarterly_workplan_progress_reports_mapping`
--
ALTER TABLE `project_quarterly_workplan_progress_reports_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_results_framework_workflow`
--
ALTER TABLE `project_results_framework_workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_semi_annual_indicator_tracking_report`
--
ALTER TABLE `project_semi_annual_indicator_tracking_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_semi_annual_indicator_tracking_report_map`
--
ALTER TABLE `project_semi_annual_indicator_tracking_report_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_semi_annual_narrative_report`
--
ALTER TABLE `project_semi_annual_narrative_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_semi_annual_workplan_progress_report`
--
ALTER TABLE `project_semi_annual_workplan_progress_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_semi_annual_workplan_progress_report_mapping`
--
ALTER TABLE `project_semi_annual_workplan_progress_report_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quarterly_progress_report`
--
ALTER TABLE `quarterly_progress_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_audit_trails`
--
ALTER TABLE `user_audit_trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
