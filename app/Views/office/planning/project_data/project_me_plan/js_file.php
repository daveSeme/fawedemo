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
echo "/public/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js\"></script>\r\n<script>\r\n// Class definition\r\nvar controls = {\r\n\tleftArrow: '<i class=\"fal fa-angle-left\" style=\"font-size: 1.25rem\"></i>',\r\n\trightArrow: '<i class=\"fal fa-angle-right\" style=\"font-size: 1.25rem\"></i>'\r\n}\r\n\r\n\t\r\n\$(function() {\r\n\t\$( \"#start_date\" ).datepicker({\r\n\t          \r\n\t\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\t\r\n\t \r\n\t \r\n\t   onClose: function( selectedDate ) {\r\n\t\t\$( \"#end_date\" ).datepicker( \"option\", \"minDate\", selectedDate );\r\n\t  }\r\n\t  \r\n\t});\r\n\t\$( \"#end_date\" ).datepicker({\r\n       \t  \r\n \t\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\t\r\n\t \r\n\t \r\n\t onClose: function( selectedDate ) {\r\n\t\t\$( \"#start_date\" ).datepicker( \"option\", \"maxDate\", selectedDate );\r\n\t  }\r\n\t \r\n\t});\r\n});\r\n\t              \r\n</script>";

?>