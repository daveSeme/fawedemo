<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"https://code.highcharts.com/highcharts.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/table/jquery.highchartTable-min.js\"></script>\r\n<script src=\"https://code.highcharts.com/highcharts-more.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/exporting.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/export-data.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>\r\n\r\n \r\n\r\n<!--<script src=\"https://code.highcharts.com/highcharts.js\"></script>\r\n<script src=\"https://code.highcharts.com/highcharts-more.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/exporting.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/export-data.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>\r\n-->\r\n\r\n\r\n<input type='hidden' id='wkt' value='' />\r\n\r\n<script type=\"text/javascript\">\r\n\t\$(document).ready(function() {\r\n\t// \$('table.highchart').highchartTable();\r\n\t\$('table.highchart')\r\n\t  .bind('highchartTable.beforeRender', function(event, highChartConfig) {\r\n\t\thighChartConfig.colors = ['#0000FF', '#008000', '#FFFF00', '#FF0000', '#FFD700', '#3399CC'];\r\n\t  })\r\n\t  .highchartTable();\r\n\t  \r\n\t\t\t\t\t\r\n\t})\r\n</script>\r\n\r\n\r\n<script type=\"text/javascript\">\r\n child_dept = [], xAxisTitle = 'Total number of Projects', yLabels = [], yLabelsFull = [], yLabelsTotalProjects = [], redVals = [], orangeVals = [], yellowVals = [], greenVals = [], blueVals = [], blackVals = [];\r\n\r\n";
$db = Config\Database::connect();
$query = $db->query("select name as county_name,tot_ongoing, tot_pipline,tot_tr,tot_comp,tot_not_started from implementing_partner left join (select count(*) as tot_ongoing,implementing_partner from project  \r\n\r\n\r\nleft join project_map_county on project_map_county.project_id = project.id  WHERE project_status=\"Ongoing\" group by implementing_partner) as ongoing on ongoing.implementing_partner = implementing_partner.id\r\n\r\n\r\nleft join (SELECT count(*) as tot_pipline,implementing_partner FROM project  left join project_map_county on project_map_county.project_id =project.id  WHERE project_status=\"Pipeline\" group by implementing_partner) as Pipeline on Pipeline.implementing_partner=implementing_partner.id\r\n\r\n\r\nleft join (SELECT count(*) as tot_tr,implementing_partner FROM project  left join project_map_county on project_map_county.project_id =project.id  WHERE project_status=\"Terminated\" group by implementing_partner) as termi on termi.implementing_partner=implementing_partner.id\r\n\r\n\r\nleft join (SELECT count(*) as tot_comp,implementing_partner FROM project  left join project_map_county on project_map_county.project_id =project.id  WHERE project_status=\"Completed\" group by implementing_partner) as comple on comple.implementing_partner=implementing_partner.id \r\n\r\n\r\nleft join (SELECT count(*) as tot_not_started,implementing_partner FROM project  left join project_map_county on project_map_county.project_id =project.id  WHERE project_status=\"Not-Started\" group by implementing_partner) as tbl_not_started on tbl_not_started.implementing_partner=implementing_partner.id  \r\n\r\n");
$results = $query->getResultArray();
foreach ($results as $row) {
    echo "\r\n\r\n \t\tredVals.push(parseFloat( ";
    echo $row["tot_tr"];
    echo "));\r\n        yellowVals.push(parseFloat(";
    echo $row["tot_pipline"];
    echo "));\r\n        greenVals.push(parseFloat(";
    echo $row["tot_ongoing"];
    echo "));\r\n        blueVals.push(parseFloat(";
    echo $row["tot_comp"];
    echo "));\r\n        blackVals.push(parseFloat(";
    echo $row["tot_not_started"];
    echo "));\r\n       \r\n        yLabelsFull.push('";
    echo $row["county_name"];
    echo "');\r\n        yLabelsTotalProjects.push(";
    echo $row["tot_tr"] + $row["tot_pipline"] + $row["tot_ongoing"] + $row["tot_comp"] + $row["tot_not_started"];
    echo ");\r\n\t\t\r\n\t\t // set check if child dept for disable link \t  \r\n\t\t child_dept.push('Yes');\t\r\n\t\t\r\n\t\t\r\n\t\t";
}
echo "\r\n\t\t Highcharts.chart('container', {\r\n    chart: {\r\n        type: 'bar'\r\n    },\r\n    title: {\r\n        text: ' '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull\r\n    },\r\n    yAxis: {\r\n        min: 0,\r\n        title: {\r\n            text: 'No. of Projects'\r\n        }\r\n    },\r\n    legend: {\r\n        reversed: true\r\n    },\r\n    plotOptions: {\r\n        series: {\r\n            stacking: 'normal'\r\n        }\r\n    },\r\n    series: [{\r\n        name: 'Pipeline',\r\n         data: yellowVals,\r\n        color: 'yellow',\r\n    }, {\r\n        name: 'On-going',\r\n        data: greenVals,\r\n       color: 'green',\r\n    }, {\r\n        name: 'Terminated',\r\n       data: redVals,\r\n       color: 'red',\r\n    }, {\r\n       \r\n        name: 'Completed',\r\n       data: blueVals,\r\n        color: 'blue',\r\n    },\r\n\t\r\n\t {\r\n        name: 'Not Started',\r\n        data: blackVals,\r\n        color: 'black',\r\n    }]\r\n});\r\n     \r\n\r\n \r\n\t\t \r\n\r\n</script>\r\n ";

?>