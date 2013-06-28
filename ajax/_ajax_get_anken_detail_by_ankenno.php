<?php
$anken_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "		
	select 
		*
	from 
		t_tenders
	where
		anken_no = '{$_POST['anken_no']}'
";

// var_dump($sql);

$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	$limit_date = $row['limit_date'];
	$limit_date = date('Y-m-d', strtotime($limit_date));
	
	$result_open_date = $row['result_open_date'];
	if(is_null($result_open_date)) $result_open_date = '';
	
	$result_close_date = $row['result_close_date'];
	if(is_null($result_close_date)) $result_close_date = '';
	
	$raku_name = $row['raku_name'];
	if(is_null($raku_name)) $raku_name = '';
	
	$price = $row['price'];
	if(is_null($price)) $price = '';
	
	$anken = array(
		'id' => $row['id']
		,'nyusatsu_system' => $row['nyusatsu_system']
		,'nyusatsu_type' => $row['nyusatsu_type']
		,'anken_no' => $row['anken_no']
		,'anken_url' => $row['anken_url']
		,'anken_name' => $row['anken_name']
		,'keishu_cd' => $row['keishu_cd']
		,'keishu_name' => $row['keishu_name']
		,'public_flag' => $row['public_flag']
		,'company_area' => $row['company_area']
		,'anken_open_date' => $row['anken_open_date']
		,'anken_close_date' => $row['anken_close_date']
		,'tender_date' => $row['tender_date']
		,'tender_place' => $row['tender_place']
		,'limit_date' => $limit_date
		,'gyoumu_kbn_1' => $row['gyoumu_kbn_1']
		,'gyoumu_kbn_2' => $row['gyoumu_kbn_2']
		,'kasitu_name' => $row['kasitu_name']
		,'tanto_name' => $row['tanto_name']
		,'notes' => $row['notes']
		,'result_open_date' => $result_open_date
		,'result_close_date' => $result_close_date
		,'raku_name' => $raku_name
		,'price' => $price
		,'version_no' => $row['version_no']
		,'delete_flag' => $row['delete_flag']
		,'ins_date' => $row['ins_date']
		,'upd_date' => $row['upd_date']
	);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($anken);