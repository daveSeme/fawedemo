<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<!-- END Color profile -->\r\n        <!-- base vendor bundle: \r\n                         DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations \r\n                                                + pace.js (recommended)\r\n                                                + jquery.js (core)\r\n                                                + jquery-ui-cust.js (core)\r\n                                                + popper.js (core)\r\n                                                + bootstrap.js (core)\r\n                                                + slimscroll.js (extension)\r\n                                                + app.navigation.js (core)\r\n                                                + ba-throttle-debounce.js (core)\r\n                                                + waves.js (extension)\r\n                                                + smartpanels.js (extension)\r\n                                                + src/../jquery-snippets.js (core) -->\r\n        <script src=\"";
echo base_url();
echo "/public/js/vendors.bundle.js\"></script>\r\n        <script src=\"";
echo base_url();
echo "/public/js/app.bundle.js\"></script>\r\n        <script>\r\n            \$(\"#js-login-btn\").click(function (event)\r\n            {\r\n\r\n                // Fetch form to apply custom Bootstrap validation\r\n                var form = \$(\"#js-login\")\r\n\r\n                if (form[0].checkValidity() === false)\r\n                {\r\n                    event.preventDefault()\r\n                    event.stopPropagation()\r\n                }\r\n\r\n                form.addClass('was-validated');\r\n                // Perform ajax submit here...\r\n            });\r\n\r\n        </script>\r\n    </body>\r\n    <!-- END Body -->\r\n</html>\r\n";

?>