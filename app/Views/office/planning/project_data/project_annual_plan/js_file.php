<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/datagrid/datatables/datatables.bundle.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/formplugins/select2/select2.bundle.js\"></script>\r\n<script>\r\n\$(document).ready(function()\r\n{\r\n\t\$(function()\r\n\t{\r\n\t\t\$('.select2').select2();\r\n\r\n\t});\r\n});\r\n\r\n</script>\r\n\r\n<script src=\"";
echo base_url();
echo "/public/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js\"></script>\r\n<script>\r\n// Class definition\r\nvar controls = {\r\n\tleftArrow: '<i class=\"fal fa-angle-left\" style=\"font-size: 1.25rem\"></i>',\r\n\trightArrow: '<i class=\"fal fa-angle-right\" style=\"font-size: 1.25rem\"></i>'\r\n}\r\n\r\n\t\r\n\$(function() {\r\n\t\$( \"#start_date\" ).datepicker({\r\n\t          \r\n\t\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\t\r\n\t \r\n\t \r\n\t   onClose: function( selectedDate ) {\r\n\t\t\$( \"#end_date\" ).datepicker( \"option\", \"minDate\", selectedDate );\r\n\t  }\r\n\t  \r\n\t});\r\n\t\$( \"#end_date\" ).datepicker({\r\n       \t  \r\n \t\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\t\r\n\t \r\n\t \r\n\t onClose: function( selectedDate ) {\r\n\t\t\$( \"#start_date\" ).datepicker( \"option\", \"maxDate\", selectedDate );\r\n\t  }\r\n\t \r\n\t});\r\n});\r\n\t              \r\n</script>\r\n\r\n<script>\r\nfunction getyear() {\r\n\r\n \r\n        var str='';\r\n        var val=document.getElementById('project');\r\n        for (i=0;i< val.length;i++) { \r\n            if(val[i].selected){\r\n                str += val[i].value + ','; \r\n            }\r\n        }         \r\n        var str=str.slice(0,str.length -1); \r\n        \r\n\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/planning/project_annual_plan";
echo "/get_year\",\r\n        \tdata:'project_id='+str,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#year\").html(data);\r\n\t\t\t\tconsole.log(data);\r\n        \t}\r\n\t});\r\n}\r\n</script>";

?>