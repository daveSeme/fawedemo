<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/menu/ajax.js\"></script>\r\n<script>\r\n\r\n\t// get the project value\r\n    \$('body').delegate('#year', 'change', function () {\r\n\t\t\t\tif(\$(\"#strategic_plan\").val() !=\"\") { strategic_plan =  \$(\"#strategic_plan\").val(); } else{strategic_plan = 0}\r\n\r\n \t\t \r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\t\t\r\n\tOpenAjaxPostCmd('";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report/get_indicator_by_year/";
echo "'+val+'/'+strategic_plan,'project_div','validate','loading','','2','2');\r\n\t\t\t\r\n\t\t\t \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\t\r\n\t \r\n\t   // get the ndicator value\r\n    \$('body').delegate('#strategic_plan', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/reporting/organizational_data/org_quarterly_indicator_tracking_report";
echo "/get_plan\",\r\n        \tdata:'strategic_plan='+val ,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#year\").html(data);\r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\r\n\t\r\n</script>";

?>