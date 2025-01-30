<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.js\"></script>\r\n<link rel=\"stylesheet\" media=\"screen, print\" href=\"";
echo base_url();
echo "/public/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css\">\r\n<link href=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.css\" rel=\"stylesheet\"/>\r\n\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/menu/ajax.js\"></script> \r\n\t\r\n<script>\r\n\r\n\r\n\t   // get the year data\r\n    \$('body').delegate('#project', 'change', function () {\r\n\t\t\r\n\t\t\r\n\t\t\r\n        if (\$(this).val() != '') {\r\n\t\t\t\r\n\t\t\tval = \$(this).val();\r\n\t\t\t//alert(val);\r\n\t\t\t\r\n\t\t\t\r\n\t\t\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/reporting/project_data/activity_reporting_tool";
echo "/get_activity_by_project\",\r\n        \tdata:'project='+val ,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#ActivityData_div\").html(data);\r\n\t\t\t\t//console.log(data);\r\n        \t}\r\n\t}); \r\n\t\t\t\r\n\t\t\t}\r\n    });\r\n\r\n</script>\r\n\r\n\r\n<script>\r\n// Class definition\r\nvar controls = {\r\n\tleftArrow: '<i class=\"fal fa-angle-left\" style=\"font-size: 1.25rem\"></i>',\r\n\trightArrow: '<i class=\"fal fa-angle-right\" style=\"font-size: 1.25rem\"></i>'\r\n}\r\n\r\n\t\r\n\r\n    \$(function() {\r\n\t\t\r\n\t\t////\r\n\t\t\r\n        \$( \"#activity_date\" ).datepicker({\r\n\t\t       \r\n\t\t\t   changeMonth: true,\r\n\t\t\t   changeYear: true,\r\n\t\t\t   //minDate:0,\r\n\t\t\r\n        });\r\n\t\t\r\n\t\t\r\n\t\t\r\n\t\t\r\n\t\t\r\n    });\r\n</script>\r\n";

?>