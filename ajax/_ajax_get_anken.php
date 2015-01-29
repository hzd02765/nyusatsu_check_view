<?php
$anken_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "		
	select 
		*
	from 
		v_latest_tenders
	where
		keishu_cd = {$_POST['keishu_cd']}
		and public_flag = {$_POST['public_flag']}
		and gyoumu_kbn_1 = '{$_POST['gyoumu_kbn_1']}'
		and gyoumu_kbn_2 = '{$_POST['gyoumu_kbn_2']}'
	order by
		id
";
$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push(
		$anken_list, 
		array(
			'id' => $row['id'], 
			'anken_no' => $row['anken_no']
		)
	);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($anken_list);