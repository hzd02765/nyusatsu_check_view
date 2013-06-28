<?php
require_once '../config.php';

$gyoumu_kbn_1 = $_POST['gyoumu_kbn_1'];

$sql = "
	select gyoumu_kbn_2 from t_tenders where gyoumu_kbn_1 = '%s' group by gyoumu_kbn_2 order by gyoumu_kbn_2
";
$sql = sprintf($sql, $gyoumu_kbn_1);

// var_dump($sql);
// exit();

$link = pg_connect('host='.HOST.' dbname='.DBNAME.' user='.USER.' password='.PASSWORD);
$result = pg_query($sql);
$anken_kbn2_list = array();
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push($anken_kbn2_list, $row['gyoumu_kbn_2']);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($anken_kbn2_list);