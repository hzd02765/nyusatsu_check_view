<?php

require_once '../config.php';

$raku_name = '';
if(!empty($_GET['raku_name'])){
	$raku_name = $_GET['raku_name'];
	$l_year = $_GET['l_year'];
	
	$link = pg_connect("host=".HOST." dbname=".DBNAME." user=".USER." password=".PASSWORD);
	if (!$link) {
		echo "An error occurred.\n";
		exit;
	}

	$sql = "
		select *
		from t_tenders
		where 
			raku_name like '%s'
			and limit_date between '%s' and '%s'
	";
	$from = $l_year.'-01-01';
	$to = $l_year.'-12-31';
	$sql = sprintf($sql, $raku_name, $from, $to);
// var_dump($sql);
// exit;
	$result = pg_query($sql);

	$anken_no_list = array();
	while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
		array_push($anken_no_list, $row['anken_no']);
	}

	pg_close($link);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
</head>
<body>
<form method="GET" action="./raku_name_40.php">
	<input type="hidden" name="raku_name" value="<?php echo $raku_name ?>">
	<p>keyword : <?php echo $raku_name ?></p>
	<p>limit year : <?php echo $l_year ?></p>
	<li>
		<?php foreach($anken_no_list as $index => $anken_no): ?>
		<ul><a href="../search.php?q=<?php echo $anken_no ?>"><?php echo $anken_no ?></a></ul>
		<?php endforeach; ?>
	</li>
</form>
</body>
</html>