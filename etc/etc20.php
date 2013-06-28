<?php

require_once '../config.php';
require_once '../functions.php';

$link = db_connect();

$sql = "
select
	*
	, to_char(t1.result_date, 'dd'::text) AS result_date_dd
from
	(select 
		anken_no
		, kasitu_name
		, result_open_date 
		, result_close_date
		, result_open_date + '25 day' as added
		, result_close_date - result_open_date as result_date
		, raku_name
	from t_tenders) as t1
where
	t1.result_close_date < t1.added
order by 
	result_date_dd, t1.kasitu_name
";
$result = pg_query($sql);

$tenders = array();
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	$tender = array();
	
	$tender['anken_no'] = $row['anken_no'];
	$tender['kasitu_name'] = $row['kasitu_name'];
	$tender['result_open_date'] = $row['result_open_date'];
	$tender['result_close_date'] = $row['result_close_date'];
	$tender['added'] = $row['added'];
	$tender['result_date'] = $row['result_date'];
	$tender['raku_name'] = $row['raku_name'];
	$tender['result_date_dd'] = $row['result_date_dd'];
	
	array_push($tenders, $tender);
}

pg_close($link);

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<link href="../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<ul class="nav">
					<li><a href="../index.php">Home</a></li>
					<li><a href="../search/search.php">Search</a></li>
					<li><a href="../raku_name/raku_name_10.php">Raku_Name</a></li>
					<li><a href="../gyoumu_kbn/gyoumu_kbn_10.php">Gyoumu_Kbn</a></li>
					<li><a href="../chart/chart10.php">Chart</a></li>
					<li class="active"><a href="./etc10.php">etc</a></li>
					<li><a href="../help/help10.php">Help</a></li>
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
	  <div class="well sidebar-nav" data-spy="affix">
		<ul class="nav nav-list">
		  <li class="nav-header">Sidebar</li>
		  <li class="active"><a href="#">結果表示期間が1カ月未満の案件</a></li>
		  <li><a href="#">Link</a></li>
		  <li><a href="#">Link</a></li>
		  <li><a href="#">Link</a></li>
		  <li class="nav-header">Sidebar</li>
		  <li><a href="#">Link</a></li>
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
		<ul>
		<?php foreach($tenders as $tender): ?>
			<li>
				<a href="../search/search.php?q=<?php echo $tender['anken_no'] ?>">
					<?php echo $tender['anken_no'] ?>　[　<?php echo $tender['result_date_dd'] ?>　]
					<?php echo $tender['kasitu_name'] ?>
					<br><?php echo $tender['raku_name'] ?>
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</div><!--/span-->
  </div><!--/row-->
	
	<br>
	<br>
	<hr>
	
</div>
</div>

	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../css/bootstrap/js/bootstrap.js"></script>
	
</body>
</html>