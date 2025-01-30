<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/menu/ajax.js\"></script> \r\n\t\r\n<script>\r\n\r\n\r\n\t   // get the year data\r\n    \$('body').delegate('#project', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/reporting/project_data/project_semi_annual_workplan_progress_report";
echo "/get_year\",\r\n        \tdata:'project='+val ,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#year\").html(data);\r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\r\n\r\n\r\n\r\n\r\n\t// get the activity data\r\n    \$('body').delegate('#year', 'change', function () {\r\n\t\t\t\t\r\n\t\t\t\tif(\$(\"#project\").val() !=\"\") { project =  \$(\"#project\").val(); } else{project = 0}\r\n\t\t\t\tif(\$(\"#quarter\").val() !=\"\") { quarter =  \$(\"#quarter\").val(); } else{quarter = 0}\r\n\r\n \t\t \r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\t\t\r\n\tOpenAjaxPostCmd('";
echo base_url() . "/reporting/project_data/project_semi_annual_workplan_progress_report/get_activity_by_year/";
echo "'+val+'/'+project+'/'+quarter,'project_div','validate','loading','','2','2');\r\n\t\t\t\r\n\t\t\t \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\t\r\n\t\r\n\t\r\n\t\r\n\t// get the activity data\r\n    \$('body').delegate('#quarter', 'change', function () {\r\n\t\t\t\t\r\n\t\t\t\tif(\$(\"#project\").val() !=\"\") { project =  \$(\"#project\").val(); } else{project = 0}\r\n\t\t\t\tif(\$(\"#year\").val() !=\"\") { year =  \$(\"#year\").val(); } else{year = 0}\r\n\r\n \t\t \r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\t\t\r\n\tOpenAjaxPostCmd('";
echo base_url() . "/reporting/project_data/project_semi_annual_workplan_progress_report/get_activity_by_quarter/";
echo "'+val+'/'+project+'/'+year,'project_div','validate','loading','','2','2');\r\n\t\t\t\r\n\t\t\t \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\t\r\n\t \r\n\r\n\t\r\n</script>";

?>