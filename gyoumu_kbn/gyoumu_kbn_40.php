<?php

require_once '../config.php';
require_once '../functions.php';

$link = db_connect();

$sql = "
	select *
	from t_tenders
	where 
		gyoumu_kbn_1 = '%s'
		and gyoumu_kbn_2 = '%s'
		and limit_date between '%s' and '%s'
";

$kbn1 = $_GET['kbn1'];
$kbn2 = $_GET['kbn2'];
$l_year = $_GET['l_year'];

$from = $l_year.'-01-01';
$to = $l_year.'-12-31';

$sql = sprintf($sql, $kbn1, $kbn2, $from, $to);
// var_dump($sql);
// exit;
$result = pg_query($sql);

$anken_no_list = array();
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)){
	array_push($anken_no_list, $row['anken_no']);
}
pg_close($link);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<title>NYUSATSU_CHECK_VIEW</title>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#button').click(function(){
				// 業務小分類
				var url = $('#anken_no').val();
				url = '../search/search.php?q=' + url;
				// console.log(url);
				window.location = url;
			});
		});
	</script>
</head>
<body>
<form method="GET" action="./gyoumu_kbn_40.php">
	<p>大分類：<?php echo $_GET['kbn1'] ?></p>
	<p>小分類：<?php echo $_GET['kbn2'] ?></p>
	<p>履行期限(年)：<?php echo $_GET['l_year'] ?></p>
	<div>
		<p>案件番号</p>
		<select name="anken_no" id='anken_no' size="10">
		<?php foreach($anken_no_list as $index => $anken_no): ?>
			<?php echo $selected = ($index == 0) ? 'selected': ''; ?>
			<option <?php echo $selected ?>><?php echo $anken_no; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	<p><input type="button" name="button" id="button" value="選択"></p>
</form>
</body>
</html>