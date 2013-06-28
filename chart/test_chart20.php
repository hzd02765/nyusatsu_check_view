<?php

include ("jpgraph/jpgraph.php");
include ("jpgraph/jpgraph_line.php");

/*

$graph = new Graph(250, 200, "auto"); 
$graph->SetFrame(true);
$graph->SetScale("textlin");

$graph->img->SetMargin(30, 30, 30, 30);

$ydata = array(10, 4, 7, 9, 1, 3);
$lineplot = new LinePlot($ydata);

$graph->Add($lineplot);

$graph->Stroke();
*/

// Some data
// $ydata = array(11,3,8,12,5,1,9,13,5,7);
// $ydata = array(11,3,8,12,5,1,9,13,5,7,22,100,1000);
$ydata = array(1, 3, 9, 5);
 
// Create the graph. These two calls are always required
$graph = new Graph(350,250);
$graph->SetScale('textlin');

// $graph->xgrid->Show();
// $graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels(array('A','B','C','D'));
// $graph->xgrid->SetColor('#E3E3E3');

// Create the linear plot
$lineplot=new LinePlot($ydata);
// $lineplot->SetColor('blue');
 
// Add the plot to the graph
$graph->Add($lineplot);
 
// Display the graph
$graph->Stroke();
