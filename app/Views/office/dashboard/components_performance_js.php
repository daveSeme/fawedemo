<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 7.2
 * @ Decoder version: 1.0.4
 * @ Release: 01/09/2021
 */

echo "<script src=\"https://code.highcharts.com/highcharts.js\"></script>\r\n<script src=\"";
echo base_url();
echo "/public/js/table/jquery.highchartTable-min.js\"></script>\r\n<script src=\"https://code.highcharts.com/highcharts-more.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/exporting.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/export-data.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>\r\n\r\n \r\n\r\n<!--<script src=\"https://code.highcharts.com/highcharts.js\"></script>\r\n<script src=\"https://code.highcharts.com/highcharts-more.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/exporting.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/export-data.js\"></script>\r\n<script src=\"https://code.highcharts.com/modules/accessibility.js\"></script>\r\n-->\r\n\r\n\r\n<input type='hidden' id='wkt' value='' />\r\n\r\n";
echo "<script type=\"text/javascript\">\r\n\t\$(document).ready(function() {\r\n\t// \$('table.highchart').highchartTable();\r\n\t\$('table.highchart')\r\n\t  .bind('highchartTable.beforeRender', function(event, highChartConfig) {\r\n\t\thighChartConfig.colors = ['#0000FF', '#008000', '#FFFF00', '#FF0000', '#FFD700', '#3399CC'];\r\n\t  })\r\n\t  .highchartTable();\r\n\t  \r\n\t\t\t\t\t\r\n\t})\r\n console.log('In page--------------');</script>\r\n\r\n\r\n";
echo "<script type=\"text/javascript\">\r\n child_dept = [], xAxisTitle = 'Total number of Projects', yLabels = [], yLabelsFull = [], yLabelsFull1 = [], yLabelsFull2 = [], series=[], series1=[], series2=[], series3=[], series4=[], series5=[], series6=[], series7=[], series8=[], series9=[], series10=[], series11=[], series12=[], series13=[], yLabelsTotalProjects = [], redVals = [], orangeVals = [], yellowVals = [], greenVals = [], blueVals = [], blackVals = [];\r\n\r\n";

$db = Config\Database::connect();
$prjQuery = $db->query("select * from project where id = 3");
$prjResults = $prjQuery->getRowArray();

$query = $db->query("select pg.id, pg.name, COALESCE(pgi.target, 0) as target, pgi.unit from project_goal pg left join project_goal_indicator pgi on pgi.goal_id = pg.id where pg.project_id = \"" . $prjResults["id"] . "\" and pg.id is not null");
$results = $query->getResultArray();
foreach ($results as $k=>$row) {
    echo " yLabelsFull.push('";
    echo $row["name"];
    echo "');";
    //
   
    // // Push the values
    echo "series.push({";
    echo "name: '".$row["name"]."',";
    echo "data: [";
    echo $row["target"];
    echo "]";
    echo "});";
}
// Project Component Indicators
echo "\r\n\t\t Highcharts.chart('container2', {\r\n    chart: {\r\n        type: 'bar'\r\n    },\r\n    title: {\r\n        text: ' '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull\r\n    },\r\n    yAxis: {\r\n        min: 0,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    legend: {\r\n        reversed: true\r\n    },\r\n    plotOptions: {\r\n        series: {\r\n            stacking: 'normal'\r\n        }\r\n    },\r\n    series: series\r\n});\r\n \r\n    ";
// Project Targets
//echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements'\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// Get the reported results
// Quarterly
$qQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Goal Indicator'");
$qResults = $qQuery->getRowArray();
$qTotalAchievement = is_null($qResults["total_achievement"]) ? 0 : $qResults["total_achievement"];
$qTotalTarget = is_null($qResults["total_target"]) ? 0 : $qResults["total_target"];

echo "series2.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $qTotalAchievement;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $qTotalTarget;
echo "} ] });";

// Bi-annual
$bQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Goal Indicator'");
$bResults = $bQuery->getRowArray();
$bTotalAchievement = is_null($bResults["total_achievement"]) ? 0 : $bResults["total_achievement"];
$bTotalTarget = is_null($bResults["total_target"]) ? 0 : $bResults["total_target"];
echo "series8.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $bTotalAchievement;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $bTotalTarget;
echo "} ] });";

// Annual
$aQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Goal Indicator'");
$aResults = $aQuery->getRowArray();
$aTotalAchievement = is_null($aResults["total_achievement"]) ? 0 : $aResults["total_achievement"];
$aTotalTarget = is_null($aResults["total_target"]) ? 0 : $aResults["total_target"];

echo "series9.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $aTotalAchievement;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $aTotalTarget;
echo "} ] });";

// $totalTarget = $qTotalTarget + $bTotalTarget + $aTotalTarget;
// $totalAchievement = $qTotalAchievement + $bTotalAchievement + $aTotalAchievement;

// echo "series2.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
// echo $totalAchievement;
// echo "}, {name: 'Target',  color: 'orange', y: ";
// echo $totalTarget;
// echo "} ] });";

//Project Targets/Achievements
echo "\r\n\t\t Highcharts.chart('container3', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series2, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container8', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series8, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container9', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series9, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

// Outcomes
$query1 = $db->query("select poc.id, poc.name, COALESCE(poi.target, 0) as target, poi.unit from project_outcome poc left join project_outcome_indicator poi on poi.outcome_id = poc.id left join project_goal pg  on poc.goal_id = pg.id where pg.project_id = \"" . $prjResults["id"] . "\" and pg.id is not null");
$results1 = $query1->getResultArray();
foreach ($results1 as $k=>$row) {
    echo " yLabelsFull1.push('";
    echo $row["name"];
    echo "');";
    //
   
    // // Push the values
    echo "series3.push({";
    echo "name: '".$row["name"]."',";
    echo "data: [";
    echo $row["target"];
    echo "]";
    echo "});";
}
// Project Component Indicators
echo "\r\n\t\t Highcharts.chart('container4', {\r\n    chart: {\r\n        type: 'bar'\r\n    },\r\n    title: {\r\n        text: ' '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull1\r\n    },\r\n    yAxis: {\r\n        min: 0,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    legend: {\r\n        reversed: true\r\n    },\r\n    plotOptions: {\r\n        series: {\r\n            stacking: 'normal'\r\n        }\r\n    },\r\n    series: series3\r\n});\r\n \r\n    ";
// Project Targets
//echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements'\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// Get the reported results
// Quarterly
$qQuery1 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Outcome Indicator'");
$qResults1 = $qQuery1->getRowArray();
$qTotalAchievement1 = is_null($qResults1["total_achievement"]) ? 0 : $qResults1["total_achievement"];
$qTotalTarget1 = is_null($qResults1["total_target"]) ? 0 : $qResults1["total_target"];
echo "series4.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $qTotalAchievement1;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $qTotalTarget1;
echo "} ] });";

// Bi-annual
$bQuery1 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Outcome Indicator'");
$bResults1 = $bQuery1->getRowArray();
$bTotalAchievement1 = is_null($bResults1["total_achievement"]) ? 0 : $bResults1["total_achievement"];
$bTotalTarget1 = is_null($bResults1["total_target"]) ? 0 : $bResults1["total_target"];

echo "series10.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $bTotalAchievement1;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $bTotalTarget1;
echo "} ] });";

// Annual
$aQuery1 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Outcome Indicator'");
$aResults1 = $aQuery1->getRowArray();
$aTotalAchievement1 = is_null($aResults1["total_achievement"]) ? 0 : $aResults1["total_achievement"];
$aTotalTarget1 = is_null($aResults1["total_target"]) ? 0 : $aResults1["total_target"];
echo "series11.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $aTotalAchievement1;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $aTotalTarget1;
echo "} ] });";

$totalTarget1 = $qTotalTarget1 + $bTotalTarget1 + $aTotalTarget1;
$totalAchievement1 = $qTotalAchievement1 + $bTotalAchievement1 + $aTotalAchievement1;

//General
// echo "series4.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
// echo $totalAchievement1;
// echo "}, {name: 'Target',  color: 'orange', y: ";
// echo $totalTarget1;
// echo "} ] });";

//Project Targets/Achievements
echo "\r\n\t\t Highcharts.chart('container5', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series4, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container10', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series10, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container11', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series11, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";


// Outputs
$query2 = $db->query("select po.name, COALESCE(pwi.target, 0) as target, pwi.unit from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
$results2 = $query2->getResultArray();
foreach ($results2 as $k=>$row) {
    echo " yLabelsFull2.push('";
    echo $row["name"];
    echo "');";
    //
   
    // // Push the values
    echo "series5.push({";
    echo "name: '".$row["name"]."',";
    echo "data: [";
    echo $row["target"];
    echo "]";
    echo "});";
}
// Project Component Indicators
echo "\r\n\t\t Highcharts.chart('container6', {\r\n    chart: {\r\n        type: 'bar'\r\n    },\r\n    title: {\r\n        text: ' '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull2\r\n    },\r\n    yAxis: {\r\n        min: 0,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    legend: {\r\n        reversed: true\r\n    },\r\n    plotOptions: {\r\n        series: {\r\n            stacking: 'normal'\r\n        }\r\n    },\r\n    series: series5\r\n});\r\n \r\n    ";
// Project Targets
//echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements'\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// Get the reported results
// Quarterly
$qQuery2 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Output Indicator'");
$qResults2 = $qQuery2->getRowArray();
$qTotalAchievement2 = is_null($qResults2["total_achievement"]) ? 0 : $qResults2["total_achievement"];
$qTotalTarget2 = is_null($qResults2["total_target"]) ? 0 : $qResults2["total_target"];
echo "series7.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $qTotalAchievement2;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $qTotalTarget2;
echo "} ] });";

// Bi-annual
$bQuery2 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Output Indicator'");
$bResults2 = $bQuery2->getRowArray();
$bTotalAchievement2 = is_null($bResults2["total_achievement"]) ? 0 : $bResults2["total_achievement"];
$bTotalTarget2 = is_null($bResults2["total_target"]) ? 0 : $bResults2["total_target"];
echo "series12.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $bTotalAchievement2;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $bTotalTarget2;
echo "} ] });";

// Annual
$aQuery2 = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\" and pm.Category = 'Output Indicator'");
$aResults1 = $aQuery2->getRowArray();
$aTotalAchievement2 = is_null($aResults1["total_achievement"]) ? 0 : $aResults1["total_achievement"];
$aTotalTarget2 = is_null($aResults2["total_target"]) ? 0 : $aResults2["total_target"];

echo "series13.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $aTotalAchievement2;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $aTotalTarget2;
echo "} ] });";

// $totalTarget2 = $qTotalTarget2 + $bTotalTarget2 + $aTotalTarget2;
// $totalAchievement2 = $qTotalAchievement2 + $bTotalAchievement2 + $aTotalAchievement2;

// echo "series7.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
// echo $totalAchievement2;
// echo "}, {name: 'Target',  color: 'orange', y: ";
// echo $totalTarget2;
// echo "} ] });";

//Project Targets/Achievements
echo "\r\n\t\t Highcharts.chart('container7', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series7, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container12', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series12, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";
echo "\r\n\t\t Highcharts.chart('container13', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series13, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

// // Outcomes
// $query = $db->query("select pwi.* from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
// $results = $query->getResultArray();
// foreach ($results as $k=>$row) {
//     // Get the unit
//     $q=$db->query("select name from mas_unit where id = \"" . $row["unit"] . "\" ");
//     $r=$q->getRowArray();
//     // Push first as overall target
//     echo " yLabelsFull.push('";
//     echo "Overall" . $row["id"] . "(" . $r["name"] . ") - ". $row["indicator"];
//     echo "');";
//     //
   
//     // // Push the values
//     echo " series.push({";
//     echo "name: 'Overall " . $row["id"] . "(". $r["name"] .")',";
//     echo "data: [";
//     echo $row["target"];
//     echo "]";
//     echo "});";

//      // Test
//      if($k > 0) {
//         // Count the values of the previous array
//         echo "prevLen = series[";
//         echo $k - 1;
//         echo "].data.length;";
//         echo "arr = Array(prevLen).fill(null);";
//         echo "series[";
//         echo $k;
//         echo "].data.unshift(...arr);";
//     }

//     $query1 =  $db->query("select * from project_output_indicator_target where indicator_id = \"" . $row["id"] . "\" order by year asc");
//     $results1 = $query1->getResultArray();

//     foreach($results1 as $row1) {
//         // The subtargets
//         echo " yLabelsFull.push('";
//         echo $row1["year"];
//         echo "');";

//         // push the subtarget values
//         echo "series[";
//         echo $k;
//         echo "].data.push(";
//         echo $row1["target"];
//         echo ");";
//     }
// }
// // Project Output Indicators
// echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Project Output Indicator Targets '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull\r\n, labels: { formatter: function() { return this.value.includes('Overall') ? '<strong>' + this.value + '</strong>' : this.value; } }    },\r\n    yAxis: {\r\n        type:'logarithmic', min: 1,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    \r\n   series: series, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

// $now = time();
// $start = strtotime($prjResults["start_date"]);
// $end = strtotime($prjResults["end_date"]);

// if($now > $end) {
//     $now = $end;
// }

// $percentage = round((($end - $now) / ($end - $start)) * 100);

// echo "series1.push({'name': 'Current', data: [";
// echo $percentage;
// echo "], tooltip: {valueSuffix: ' percent'}});";

// // Project Timeline
// echo "\r\n\t\t Highcharts.chart('container2', {\r\n    chart: {\r\n        type: 'gauge'\r\n    },\r\n    title: {\r\n        text: 'Project Timeline '\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// // Get the reported results
// // Quarterly
// $qQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $qResults = $qQuery->getRowArray();
// $qTotalAchievement = $qResults["total_achievement"];
// $qTotalTarget = $qResults["total_target"];
// // Bi-annual
// $bQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $bResults = $bQuery->getRowArray();
// $bTotalAchievement = $bResults["total_achievement"];
// $bTotalTarget = $bResults["total_target"];
// // Annual
// $aQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $aResults = $aQuery->getRowArray();
// $aTotalAchievement = $aResults["total_achievement"];
// $aTotalTarget = $aResults["total_target"];

// //$totalTarget = $qTotalTarget + $bTotalTarget + $aTotalTarget;
// $totalAchievement = $qTotalAchievement + $bTotalAchievement + $aTotalAchievement;

// // Get the targets
// $overallQuery = $db->query("select sum(pwi.target) as total_target from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
// $overallResults = $overallQuery->getRowArray();

// $totalTarget = $overallResults["total_target"];

// echo "series3.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
// echo $totalAchievement;
// echo "}, {name: 'Target',  color: 'orange', y: ";
// echo $totalTarget;
// echo "} ] });";

// //Project Targets/Achievements
// echo "\r\n\t\t Highcharts.chart('container3', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series3, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";


// // Outputs
// $query = $db->query("select pwi.* from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
// $results = $query->getResultArray();
// foreach ($results as $k=>$row) {
//     // Get the unit
//     $q=$db->query("select name from mas_unit where id = \"" . $row["unit"] . "\" ");
//     $r=$q->getRowArray();
//     // Push first as overall target
//     echo " yLabelsFull.push('";
//     echo "Overall" . $row["id"] . "(" . $r["name"] . ") - ". $row["indicator"];
//     echo "');";
//     //
   
//     // // Push the values
//     echo " series.push({";
//     echo "name: 'Overall " . $row["id"] . "(". $r["name"] .")',";
//     echo "data: [";
//     echo $row["target"];
//     echo "]";
//     echo "});";

//      // Test
//      if($k > 0) {
//         // Count the values of the previous array
//         echo "prevLen = series[";
//         echo $k - 1;
//         echo "].data.length;";
//         echo "arr = Array(prevLen).fill(null);";
//         echo "series[";
//         echo $k;
//         echo "].data.unshift(...arr);";
//     }

//     $query1 =  $db->query("select * from project_output_indicator_target where indicator_id = \"" . $row["id"] . "\" order by year asc");
//     $results1 = $query1->getResultArray();

//     foreach($results1 as $row1) {
//         // The subtargets
//         echo " yLabelsFull.push('";
//         echo $row1["year"];
//         echo "');";

//         // push the subtarget values
//         echo "series[";
//         echo $k;
//         echo "].data.push(";
//         echo $row1["target"];
//         echo ");";
//     }
// }
// // Project Output Indicators
// echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Project Output Indicator Targets '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull\r\n, labels: { formatter: function() { return this.value.includes('Overall') ? '<strong>' + this.value + '</strong>' : this.value; } }    },\r\n    yAxis: {\r\n        type:'logarithmic', min: 1,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    \r\n   series: series, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

// $now = time();
// $start = strtotime($prjResults["start_date"]);
// $end = strtotime($prjResults["end_date"]);

// if($now > $end) {
//     $now = $end;
// }

// $percentage = round((($end - $now) / ($end - $start)) * 100);

// echo "series1.push({'name': 'Current', data: [";
// echo $percentage;
// echo "], tooltip: {valueSuffix: ' percent'}});";

// // Project Timeline
// echo "\r\n\t\t Highcharts.chart('container2', {\r\n    chart: {\r\n        type: 'gauge'\r\n    },\r\n    title: {\r\n        text: 'Project Timeline '\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// // Get the reported results
// // Quarterly
// $qQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $qResults = $qQuery->getRowArray();
// $qTotalAchievement = $qResults["total_achievement"];
// $qTotalTarget = $qResults["total_target"];
// // Bi-annual
// $bQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $bResults = $bQuery->getRowArray();
// $bTotalAchievement = $bResults["total_achievement"];
// $bTotalTarget = $bResults["total_target"];
// // Annual
// $aQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
// $aResults = $aQuery->getRowArray();
// $aTotalAchievement = $aResults["total_achievement"];
// $aTotalTarget = $aResults["total_target"];

// //$totalTarget = $qTotalTarget + $bTotalTarget + $aTotalTarget;
// $totalAchievement = $qTotalAchievement + $bTotalAchievement + $aTotalAchievement;

// // Get the targets
// $overallQuery = $db->query("select sum(pwi.target) as total_target from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
// $overallResults = $overallQuery->getRowArray();

// $totalTarget = $overallResults["total_target"];

// echo "series3.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
// echo $totalAchievement;
// echo "}, {name: 'Target',  color: 'orange', y: ";
// echo $totalTarget;
// echo "} ] });";

// //Project Targets/Achievements
// echo "\r\n\t\t Highcharts.chart('container3', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series3, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

echo " \r\n\r\n \r\n\t\t \r\n\r\n</script>\r\n ";
?>