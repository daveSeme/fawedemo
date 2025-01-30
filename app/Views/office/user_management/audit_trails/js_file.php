<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo " \r\n<!-- Init plugins only for page -->\r\n\r\n            <script src=\"";
echo base_url();
echo "/public/js/datagrid/datatables/datatables.bundle.js\"></script>\r\n\t\t\t<script src=\"";
echo base_url();
echo "/public/js/datagrid/datatables/datatables.export.js\"></script>\r\n          <script src=\"";
echo base_url();
echo "/public/js/notifications/sweetalert2/sweetalert2.bundle.js\"></script>\r\n        <script>\r\n            \$(document).ready(function()\r\n            {\r\n\r\n\r\n ";
$session = Config\Services::session();
if ($session->getFlashdata("feedback")) {
    echo "  \r\n  Swal.fire(\"Alert!\", \"";
    echo $session->getFlashdata("feedback");
    echo "\", \"success\");\r\n  \r\n                  \r\n                  ";
}
echo "     \r\n               \r\n\r\n            });\r\n\r\n        </script>\r\n\t\t   <script>\r\n            \$(document).ready(function()\r\n            {\r\n                // Setup - add a text input to each footer cell\r\n                \$('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');\r\n                \$('#dt-basic-example thead tr:eq(1) th').each(function(i)\r\n                {\r\n                    var title = \$(this).text();\r\n                    \$(this).html('<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Search ' + title + '\" />');\r\n\r\n                    \$('input', this).on('keyup change', function()\r\n                    {\r\n                        if (table.column(i).search() !== this.value)\r\n                        {\r\n                            table\r\n                                .column(i)\r\n                                .search(this.value)\r\n                                .draw();\r\n                        }\r\n                    });\r\n                });\r\n\r\n                var table = \$('#dt-basic-example').DataTable(\r\n                {\r\n                    //responsive: true,\r\n                    orderCellsTop: false,\r\n                    fixedHeader: true,\r\n\t\t\t\t\t scrollY: 400,\r\n                    scrollX: true,\r\n                    scrollCollapse: true,\r\n                    paging: false,\r\n\t\t\t\t\torder:[[8, 'desc']],\t\r\n\t\t\t\t\t \r\n                });\r\n\r\n            });\r\n\r\n        </script>\r\n\t\t\r\n  ";

?>