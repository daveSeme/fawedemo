<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/menu/division_project.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/notifications/sweetalert2/sweetalert2.bundle.js\"></script>\r\n\r\n<script type=\"text/javascript\">\r\n\r\n// DO NOT REMOVE : GLOBAL FUNCTIONS!\r\n\r\n\$(function () {\r\n    \$('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');\r\n    \$('.tree li.parent_li > span').on('click', function (e) {\r\n        var children = \$(this).parent('li.parent_li').find(' > ul > li');\r\n        if (children.is(\":visible\")) {\r\n            children.hide('fast');\r\n            \$(this).attr('title', 'Expand this branch').find(' > i').addClass('fa-plus-circle').removeClass('fa-minus-circle');\r\n        } else {\r\n            children.show('fast');\r\n            \$(this).attr('title', 'Collapse this branch').find(' > i').addClass('fa-minus-circle').removeClass('fa-plus-circle');\r\n        }\r\n        e.stopPropagation();\r\n    });\r\n});\r\n</script>\r\n\r\n <script>\r\n            \$(document).ready(function()\r\n            {\r\n  ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "  \r\n  Swal.fire(\"Alert!\", \"";
    echo $session->getFlashdata("feedback");
    echo "\", \"success\");\r\n  \r\n                  \r\n                  ";
}
echo " \r\n            });\r\n\r\n        </script>\r\n\r\n";

?>