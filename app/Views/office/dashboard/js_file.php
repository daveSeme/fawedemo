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
echo "<script type=\"text/javascript\">\r\n child_dept = [], xAxisTitle = 'Total number of Projects', yLabels = [], yLabelsFull = [], series=[], series1=[], series3=[], yLabelsTotalProjects = [], redVals = [], orangeVals = [], yellowVals = [], greenVals = [], blueVals = [], blackVals = [];\r\n\r\n";

$db = Config\Database::connect();
$prjQuery = $db->query("select * from project where id = 1");
$prjResults = $prjQuery->getRowArray();

$query = $db->query("select pwi.* from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
$results = $query->getResultArray();
foreach ($results as $k=>$row) {
    // Get the unit
    $q=$db->query("select name from mas_unit where id = \"" . $row["unit"] . "\" ");
    $r=$q->getRowArray();
    // Push first as overall target
    echo " yLabelsFull.push('";
    echo "Overall" . $row["id"] . "(" . $r["name"] . ") - ". $row["indicator"];
    echo "');";
    //
   
    // // Push the values
    echo " series.push({";
    echo "name: 'Overall " . $row["id"] . "(". $r["name"] .")',";
    echo "data: [";
    echo $row["target"];
    echo "]";
    echo "});";

     // Test
     if($k > 0) {
        // Count the values of the previous array
        echo "prevLen = series[";
        echo $k - 1;
        echo "].data.length;";
        echo "arr = Array(prevLen).fill(null);";
        echo "series[";
        echo $k;
        echo "].data.unshift(...arr);";
    }

    $query1 =  $db->query("select * from project_output_indicator_target where indicator_id = \"" . $row["id"] . "\" order by year asc");
    $results1 = $query1->getResultArray();

    foreach($results1 as $row1) {
        // The subtargets
        echo " yLabelsFull.push('";
        echo $row1["year"];
        echo "');";

        // push the subtarget values
        echo "series[";
        echo $k;
        echo "].data.push(";
        echo $row1["target"];
        echo ");";
    }
}
// Project Output Indicators
echo "\r\n\t\t Highcharts.chart('container1', {\r\n    chart: {\r\n        type: 'column'\r\n    },\r\n    title: {\r\n        text: 'Project Output Indicator Targets '\r\n    },\r\n    xAxis: {\r\n        categories: yLabelsFull\r\n, labels: { formatter: function() { return this.value.includes('Overall') ? '<strong>' + this.value + '</strong>' : this.value; } }    },\r\n    yAxis: {\r\n        type:'logarithmic', min: 1,\r\n        title: {\r\n            text: 'No. of Targets'\r\n        }\r\n    },\r\n    \r\n   series: series, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

$now = time();
$start = strtotime($prjResults["start_date"]);
$end = strtotime($prjResults["end_date"]);

if($now > $end) {
    $now = $end;
}

$percentage = round((($end - $now) / ($end - $start)) * 100);

echo "series1.push({'name': 'Current', data: [";
echo $percentage;
echo "], tooltip: {valueSuffix: ' percent'}});";

// Project Timeline
echo "\r\n\t\t Highcharts.chart('container2', {\r\n    chart: {\r\n        type: 'gauge'\r\n    },\r\n    title: {\r\n        text: 'Project Timeline '\r\n    },\r\npane: { startAngle: -150, endAngle: 150, background: [{ backgroundColor: Highcharts.defaultOptions.chart.backgroundColor, borderWidth: 0, outerRadius: '100%' }] },     yAxis: {\r\n    min: 0, max: 100, minorTickInterval: 'auto', tickInterval: 5,\r\n        title: {\r\n            text: 'Timeline'\r\n        }\r\n, plotBands: [{ from: 0, to: 50, color: '#55BF3B' }, { from: 50, to: 80, color: '#DDDF0D'  }, { from: 80, to: 100, color: '#DF5353' }]    },\r\n    \r\n   series: series1\r\n});\r\n    ";

// Get the reported results
// Quarterly
$qQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_quarterly_indicator_tracking_report_map pm left join project_quarterly_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
$qResults = $qQuery->getRowArray();
$qTotalAchievement = $qResults["total_achievement"];
$qTotalTarget = $qResults["total_target"];
// Bi-annual
$bQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_semi_annual_indicator_tracking_report_map pm left join project_semi_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
$bResults = $bQuery->getRowArray();
$bTotalAchievement = $bResults["total_achievement"];
$bTotalTarget = $bResults["total_target"];
// Annual
$aQuery = $db->query("select sum(pm.achievement) as total_achievement, sum(pm.target) as total_target from project_annual_indicator_tracking_report_map pm left join project_annual_indicator_tracking_report p on pm.workflow_id = p.id where p.project = \"" . $prjResults["id"] . "\"");
$aResults = $aQuery->getRowArray();
$aTotalAchievement = $aResults["total_achievement"];
$aTotalTarget = $aResults["total_target"];

//$totalTarget = $qTotalTarget + $bTotalTarget + $aTotalTarget;
$totalAchievement = $qTotalAchievement + $bTotalAchievement + $aTotalAchievement;

// Get the targets
$overallQuery = $db->query("select sum(pwi.target) as total_target from project_output_indicator pwi left join  project_output po on po.id = pwi.output_id right join project_outcome poc on poc.id = po.outcome_id right join project_goal pg on pg.id = poc.goal_id where pg.project_id = \"" . $prjResults["id"] . "\" and pwi.id is not null");
$overallResults = $overallQuery->getRowArray();

$totalTarget = $overallResults["total_target"];

echo "series3.push({ name: 'Performance', data: [ {name: 'Achievement', color: 'lime', y: ";
echo $totalAchievement;
echo "}, {name: 'Target',  color: 'orange', y: ";
echo $totalTarget;
echo "} ] });";

//Project Targets/Achievements
echo "\r\n\t\t Highcharts.chart('container3', {\r\n    chart: {\r\n        type: 'pie'\r\n    },\r\n    title: {\r\n        text: 'Targets/Achievements '\r\n    }, plotOptions: { pie: { innerSize: '50%', dataLabels: { enabled: true, format: '{point.name}: {point.y}' }, startAngle: -90, endAngle: 90, borderWidth: 0 } },\r\n   series: series3, tooltip: { pointFormat: '<b>{point.category}: {point.y}</b>' }\r\n});\r\n    ";

echo " \r\n\r\n \r\n\t\t \r\n\r\n</script>\r\n ";
?>