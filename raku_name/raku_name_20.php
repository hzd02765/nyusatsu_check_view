<?php

require_once '../config.php';

$keyword = '';
if(!empty($_GET['raku_name_keyword'])){
	$keyword = $_GET['raku_name_keyword'];
	
	$link = pg_connect("host=".HOST." dbname=".DBNAME." user=".USER." password=".PASSWORD);
	if (!$link) {
		echo "An error occurred.\n";
		exit;
	}

	$sql = sprintf("select raku_name from v_raku_name where raku_name like '%%%s%%' order by raku_name", $keyword);
// var_dump($sql);
	$result = pg_query($sql);

	$raku_names = array();
	while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
		array_push($raku_names, $row['raku_name']);
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
<form method="GET" action="./raku_name_30.php">
	<p>keyword : <?php echo $keyword ?></p>
	<select name="raku_name" size="10">
		<?php foreach($raku_names as $index => $raku_name): ?>
		<?php $selected = ($index == 0) ? 'selected' : '' ?>
		<option value="<?php echo $raku_name ?>" <?php echo $selected ?>><?php echo $raku_name ?></option>
		<?php endforeach; ?>
	<select>
	<p><input type="submit" name="submit" value="決定"></p>
</form>
</body>
</html>