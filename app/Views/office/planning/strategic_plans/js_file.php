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
echo "/public/js/formplugins/select2/select2.bundle.js\"></script>\r\n<script>\r\n\$(document).ready(function()\r\n{\r\n\t\$(function()\r\n\t{\r\n\t\t\$('.select2').select2();\r\n\r\n\t});\r\n});\r\n\r\n</script>\r\n \r\n<!--<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js\"></script>-->\r\n\r\n<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.js\"></script>\r\n<script>\r\n// Class definition\r\nvar controls = {\r\n\tleftArrow: '<i class=\"fal fa-angle-left\" style=\"font-size: 1.25rem\"></i>',\r\n\trightArrow: '<i class=\"fal fa-angle-right\" style=\"font-size: 1.25rem\"></i>'\r\n}\r\n\r\n\t\r\n\r\n    \$(function() {\r\n        \$( \"#start-date\" ).datepicker({\r\n\t\t       \r\n\t\t\t\t\t\t dateFormat: 'dd-mm-yy',\r\n   \r\n\t\t\t   changeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\r\n            onClose: function( selectedDate ) {\r\n                \$( \"#end-date\" ).datepicker( \"option\", \"minDate\", selectedDate ); \r\n                //how to change this so that the minDate is selectedDate + 1 day? \r\n            }\r\n        });\r\n        \$( \"#end-date\" ).datepicker({\r\n\t\t\t\t\t dateFormat: 'dd-mm-yy',\r\n\r\n\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true, \r\n            onClose: function( selectedDate ) {\r\n                \$( \"#start-date\" ).datepicker( \"option\", \"maxDate\", selectedDate );\r\n            }\r\n        });\r\n    });\r\n\t\r\n\t//\r\n\t\r\n\t    \$(function() {\r\n        \$( \"#start_date\" ).datepicker({\r\n\t\t       \r\n\t\t\t\t\t\t dateFormat: 'dd-mm-yy',\r\n   \r\n\t\t\t   changeMonth: true,\r\n\t\t\tchangeYear: true,\r\n\t\t\r\n            onClose: function( selectedDate ) {\r\n                \$( \"#end_date\" ).datepicker( \"option\", \"minDate\", selectedDate ); \r\n                //how to change this so that the minDate is selectedDate + 1 day? \r\n            }\r\n        });\r\n        \$( \"#end_date\" ).datepicker({\r\n\t\t\t\t\t dateFormat: 'dd-mm-yy',\r\n\r\n\t\tchangeMonth: true,\r\n\t\t\tchangeYear: true, \r\n            onClose: function( selectedDate ) {\r\n                \$( \"#start_date\" ).datepicker( \"option\", \"maxDate\", selectedDate );\r\n            }\r\n        });\r\n    });\r\n\t \r\n</script>";

?>