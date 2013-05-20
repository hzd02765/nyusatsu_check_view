<?php

include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_bar.php");

$data1y = array(-8, 8, 9, 3, 5, 6);
$data2y = array(18, 2, 1, 7, 5, 4);

$graph = new Graph(250, 200, "auto"); 
$graph->SetScale("textlin");

$graph->SetShadow();
$graph->img->SetMargin(40, 30, 20, 40);

$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("orange");
$b1plot->value->Show();
$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("blue");
$b2plot->value->Show();

$gbplot = new AccBarPlot(array($b1plot, $b2plot));

$graph->Add($gbplot);

$graph->Stroke("auto");
// $graph->Stroke();

// var_dump($_SERVER);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
</head>
<body>
<!--
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
-->
	<img src="./test_chart30.png"></img>
<!--
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
	<p>chart</p>
-->
</body>
</html>