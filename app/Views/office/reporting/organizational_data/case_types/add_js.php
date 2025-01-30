<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "\r\n<script>\r\n// Example starter JavaScript for disabling form submissions if there are invalid fields\r\n(function ()\r\n{\r\n\t'use strict';\r\n\twindow.addEventListener('load', function ()\r\n\t{\r\n\t\t// Fetch all the forms we want to apply custom Bootstrap validation styles to\r\n\t\tvar forms = document.getElementsByClassName('needs-validation');\r\n\t\t// Loop over them and prevent submission\r\n\t\tvar validation = Array.prototype.filter.call(forms, function (form)\r\n\t\t{\r\n\t\t\tform.addEventListener('submit', function (event)\r\n\t\t\t{\r\n\t\t\t\tif (form.checkValidity() === false)\r\n\t\t\t\t{\r\n\t\t\t\t\tevent.preventDefault();\r\n\t\t\t\t\tevent.stopPropagation();\r\n\t\t\t\t}\r\n\t\t\t\tform.classList.add('was-validated');\r\n\t\t\t}, false);\r\n\t\t});\r\n\t}, false);\r\n})();\r\n\r\n</script> \r\n\r\n\r\n<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js\"></script>\r\n\r\n<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.1/jquery-ui.js\"></script>\r\n\r\n<script>\r\n// Class definition\r\nvar controls = {\r\n\tleftArrow: '<i class=\"fal fa-angle-left\" style=\"font-size: 1.25rem\"></i>',\r\n\trightArrow: '<i class=\"fal fa-angle-right\" style=\"font-size: 1.25rem\"></i>'\r\n}\r\n\r\n\t\r\n\r\n    \$(function() {\r\n        \$( \"#date\" ).datepicker({\r\n\t\t       \r\n\t\t\t     \r\n\t\t\t   \r\n\t\t\t   changeMonth: true,\r\n\t\t\t  changeYear: true,\r\n\t\t\t \r\n\t\t\t  maxDate:0, \r\n\t\t\r\n           \r\n        });\r\n        \r\n    });\r\n</script>\r\n\r\n\r\n\t\t<script>\r\nfunction getState() {\r\n\r\n \r\n        var str='';\r\n        var val=document.getElementById('region');\r\n        for (i=0;i< val.length;i++) { \r\n            if(val[i].selected){\r\n                str += val[i].value + ','; \r\n            }\r\n        }         \r\n        var str=str.slice(0,str.length -1);\r\n        \r\n\t\$.ajax({          \r\n        \ttype: \"GET\",\r\n        \turl: \"";
echo base_url() . "/planning/project";
echo "/get_district\",\r\n        \tdata:'region_id='+str,\r\n        \tsuccess: function(data){\r\n        \t\t\$(\"#district\").html(data);\r\n\t\t\t\tconsole.log(data);\r\n        \t}\r\n\t});\r\n}\r\n</script>\r\n";

?>