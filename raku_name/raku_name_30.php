<?php

require_once '../config.php';

$raku_name = '';
if(!empty($_GET['raku_name'])){
	$raku_name = $_GET['raku_name'];
	
	$link = pg_connect("host=".HOST." dbname=".DBNAME." user=".USER." password=".PASSWORD);
	if (!$link) {
		echo "An error occurred.\n";
		exit;
	}

	$sql = sprintf("select * from v_raku_name_year where raku_name like '%s' order by l_year", $raku_name);
// var_dump($sql);
	$result = pg_query($sql);

	$l_years = array();
	while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
		array_push($l_years, $row['l_year']);
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
	<select name="l_year" size="10">
		<?php foreach($l_years as $index => $l_year): ?>
		<?php $selected = ($index == 0) ? 'selected' : '' ?>
		<option value="<?php echo $l_year ?>" <?php echo $selected ?>><?php echo $l_year ?></option>
		<?php endforeach; ?>
	<select>
	<p><input type="submit" name="submit" value="決定"></p>
</form>
</body>
</html>