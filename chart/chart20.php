<?php

require_once '../config.php';
require_once '../functions.php';

include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_line.php");


$link = db_connect();
/***********************************************************
	全体
***********************************************************/
$sql = "
	select
		t2.yyyy as open_year
		, t2.mm as open_month
		, count(*) anken_count
	from(
		select 
			anken_open_date
			, to_char(t1.anken_open_date, 'yyyy') as yyyy
			, to_char(t1.anken_open_date, 'mm') as mm
			, to_char(t1.anken_open_date, 'dd') as dd
		from 
			t_tenders t1
	)t2
	where t2.yyyy = '%s'
	group by t2.yyyy, t2.mm
	order by t2.yyyy, t2.mm
";

$sql2012 = sprintf($sql, '2012');
$sql2013 = sprintf($sql, '2013');

$y_data_2012 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$y_data_2013 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

$result = pg_query($sql2012);

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	$index = intval($row['open_month']) - 1;
	$y_data_2012[$index] = $row['anken_count'];
}

$result = pg_query($sql2013);

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	$index = intval($row['open_month']) - 1;
	$y_data_2013[$index] = $row['anken_count'];

}

$graph = new Graph(450, 300); 
$graph->SetScale("textlin");

$graph->xaxis->SetTickLabels(
	array(
		'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'
		, 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
	)
);

$graph->SetShadow();
$graph->img->SetMargin(40, 30, 20, 40);

$linePlot2012 = new LinePlot($y_data_2012);
$linePlot2012->value->Show();

$linePlot2013 = new LinePlot($y_data_2013);
$linePlot2013->value->Show();

$linePlot2012->SetLegend("2012");
$linePlot2013->SetLegend("2013");

$graph->Add($linePlot2012);
$graph->Add($linePlot2013);


$graph->Stroke("./chart20_1.png");

/***********************************************************
	情報処理
***********************************************************/

$sql = "
	select
		t2.yyyy as open_year
		, t2.mm as open_month
		, count(*) anken_count
	from(
		select 
			anken_open_date
			, to_char(t1.anken_open_date, 'yyyy') as yyyy
			, to_char(t1.anken_open_date, 'mm') as mm
			, to_char(t1.anken_open_date, 'dd') as dd
		from 
			t_tenders t1
		where
			t1.gyoumu_kbn_1 = '情報処理'
	)t2
	where t2.yyyy = '%s'
	group by t2.yyyy, t2.mm
	order by t2.yyyy, t2.mm
";

$sql2012 = sprintf($sql, '2012');
$sql2013 = sprintf($sql, '2013');

$y_data_2012 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$y_data_2013 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);



$result = pg_query($sql2012);

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	$index = intval($row['open_month']) - 1;
	$y_data_2012[$index] = $row['anken_count'];

}

$result = pg_query($sql2013);

while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	$index = intval($row['open_month']) - 1;
	$y_data_2013[$index] = $row['anken_count'];

}




// $data1y = array(-8, 8, 9, 3, 5, 6, -8, 8, 9, 3, 5, 6);
// $data2y = array(18, 2, 1, 7, 5, 4);

// $graph = new Graph(250, 200, "auto"); 
$graph = new Graph(450, 300); 
$graph->SetScale("textlin");

$graph->xaxis->SetTickLabels(
	array(
		'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June'
		, 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
	)
);

$graph->SetShadow();
$graph->img->SetMargin(40, 30, 20, 40);

// $b1plot = new BarPlot($y_data_2012);
$linePlot2012 = new LinePlot($y_data_2012);
// $b1plot->SetFillColor("orange");
$linePlot2012->value->Show();
// $b2plot = new BarPlot($data2y);
// $b2plot->SetFillColor("blue");
// $b2plot->value->Show();

// $gbplot = new AccBarPlot(array($b1plot, $b2plot));
// $gbplot = new AccBarPlot(array($b1plot));

// $graph->Add($gbplot);

$linePlot2013 = new LinePlot($y_data_2013);
$linePlot2013->value->Show();

$linePlot2012->SetLegend("2012");
$linePlot2013->SetLegend("2013");

$graph->Add($linePlot2012);
$graph->Add($linePlot2013);


// $graph->Stroke("auto");
$graph->Stroke("./chart20_2.png");

pg_close($link);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery-1.7.2.min.js"></script>
</head>
<body>
<div class="container">

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li><a href="./index.php">Home</a></li>
					<li><a href="./search/search.php">Search</a></li>
					<li><a href="./raku_name/raku_name_10.php">Raku_Name</a></li>
					<li><a href="./gyoumu_kbn/gyoumu_kbn_10.php">Gyoumu_Kbn</a></li>
					<li class="active"><a href="./chart/chart10.php">Chart</a></li>
					<li><a href="./etc/etc10.php">etc</a></li>
					<li><a href="./help/help10.php">Help</a></li>
				</ul>
			</div>
		</div>
	</div>

	<br>
	<br>
	<hr>
	
<div class="container-fluid">
	<div class="row-fluid">
	<div class="span3">
	  <div class="well sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header">test</li>
			<li><a href="./test_chart10.php">test</a></li>
			<li><a href="./test_chart20.php">test</a></li>
			<li><a href="./test_chart30.php">test</a></li>
			<li class="nav-header">Sidebar</li>
			<li class="active"><a href="chart20.php">月別案件</a></li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li class="nav-header">Sidebar</li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
			<li><a href="#">Link</a></li>
		</ul>
	  </div><!--/.well -->
	</div><!--/span-->

	<div class="span9">
		<h4>業務分類：全体</h4>
		<img src="./chart20_1.png"></img>
		<h4>業務分類：情報処理</h4>
		<img src="./chart20_2.png"></img>
	</div><!--/span-->
  </div><!--/row-->
	
	<br>
	<br>
	<hr>
	
</div>
</div>

</body>
</html>