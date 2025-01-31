<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"";
echo base_url();
echo "/public/js/menu/ajax.js\"></script>\r\n";
echo "<script> $('body').delegate('#project', 'change', function () { if ($(this).val() != '') { val = $(this).val(); $.ajax({ type: \"GET\", \turl: \"";
echo base_url() . "/reporting/project_data/beneficiaries_report/get_plan" . "\",";
echo "data:'project='+val , success: function(data){ $(\"#year\").html(data); //console.log(data); \r\n} }); } }); </script> \r\n";
echo "<script>$(document).ready(function () { var val = $('#type_beneficiaries').val(); if (val == 'Direct Beneficiaries') {\r\n $(\"#DIV-direct-Benf\").fadeIn(); $(\"#DIV-Indirect-Benf\").fadeOut(); } if (val == 'Indirect Beneficiaries') { \r\n $(\"#DIV-Indirect-Benf\").fadeIn(); $(\"#DIV-direct-Benf\").fadeOut(); }  }); $('body').delegate('#type_beneficiaries', 'change', function () { if ($(this).val() != '') { //alert($(this).val()); \r\n if ($(this).val() == 'Direct Beneficiaries') { //alert($(this).val()); \r\n $(\"#DIV-direct-Benf\").fadeIn(); $(\"#DIV-Indirect-Benf\").fadeOut(); } if ($(this).val() == 'Indirect Beneficiaries') { //alert($(this).val()); \r\n $(\"#DIV-Indirect-Benf\").fadeIn(); $(\"#DIV-direct-Benf\").fadeOut(); } } }); </script>";

?>