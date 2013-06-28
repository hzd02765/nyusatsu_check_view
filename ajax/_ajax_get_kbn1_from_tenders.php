<?php
require_once '../config.php';

$anken_kbn1_list = array();

$link = pg_connect('host='.HOST.' dbname='.DBNAME.' user='.USER.' password='.PASSWORD);
$sql = "
	select gyoumu_kbn_1 from t_tenders group by gyoumu_kbn_1 order by gyoumu_kbn_1
";
$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push($anken_kbn1_list, $row['gyoumu_kbn_1']);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($anken_kbn1_list);