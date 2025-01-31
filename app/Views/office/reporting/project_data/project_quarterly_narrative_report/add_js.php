<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/menu/ajax.js\"></script>\r\n<script>\r\n\r\n\r\n\t \r\n\t   // get the ndicator value\r\n    \$('body').delegate('#project', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/reporting/project_data/project_quarterly_narrative_report/";
echo "/get_plan\",\r\n        \tdata:'project='+val ,\r\n        \tsuccess: function(resp){\r\n   let data = JSON.parse(resp);     \t\t\$(\"#year\").html(data.years); \t\t$(\"#component\").html(data.components);\r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });";
echo "\$('body').delegate('#component', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/planning/Project_me_plan";
echo "/get_outcome\",\r\n        \tdata:'id='+val ,\r\n        \tsuccess: function(data){\r\n \t\t\$(\"#outcome\").html(data); \r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });";
echo "\$('body').delegate('#outcome', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/planning/Project_me_plan";
echo "/get_output\",\r\n        \tdata:'id='+val ,\r\n        \tsuccess: function(data){\r\n \t\t\$(\"#output\").html(data); \r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });";
echo "\$('body').delegate('#output', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/planning/Project_me_plan";
echo "/get_activity\",\r\n        \tdata:'id='+val ,\r\n        \tsuccess: function(data){\r\n \t\t\$(\"#activity\").html(data); \r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });";
echo "\r\n\r\n\t\r\n</script>";

?>