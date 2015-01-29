<?php
$anken_kbn2_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "
	select 
		gyoumu_kbn_2
	from 
		v_latest_tenders
	where
		keishu_cd = {$_POST['keishu_cd']}
		and public_flag = {$_POST['public_flag']}
		and gyoumu_kbn_1 = '{$_POST['gyoumu_kbn_1']}'
	group by
		gyoumu_kbn_2
	order by
		gyoumu_kbn_2
";
$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push($anken_kbn2_list, $row['gyoumu_kbn_2']);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($anken_kbn2_list);