<?php
$anken_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "		
	select 
		*
	from 
		t_nyusatsu
	where
		id = {$_POST['anken_id']}
";
$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	$limit_date = $row['limit_date'];
	$limit_date = date('Y-m-d', strtotime($limit_date));
	
	array_push(
		$anken_list
		, array(
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
			,'result_open_date' => $row['result_open_date']
			,'result_close_date' => $row['result_close_date']
			,'raku_name' => $row['raku_name']
			,'price' => $row['price']
			,'version_no' => $row['version_no']
			,'delete_flag' => $row['delete_flag']
			,'ins_date' => $row['ins_date']
			,'upd_date' => $row['upd_date']
		)
	);
}
pg_close($link);

header("Content-type: application/xml");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<Response>
	<Items>
		<?php foreach($anken_list as $anken): ?>
		<Item>
			<ANKEN_ID><?php echo $anken['id'] ?></ANKEN_ID>
			<ANKEN_NYUSATSU_SYSTEM><?php echo $anken['nyusatsu_system'] ?></ANKEN_NYUSATSU_SYSTEM>
			<ANKEN_NYUSATSU_TYPE><?php echo $anken['nyusatsu_type'] ?></ANKEN_NYUSATSU_TYPE>
			<ANKEN_NO><?php echo $anken['anken_no'] ?></ANKEN_NO>
			<ANKEN_URL><?php echo $anken['anken_url'] ?></ANKEN_URL>
			<ANKEN_NAME><?php echo $anken['anken_name'] ?></ANKEN_NAME>
			<ANKEN_KEISHU_CD><?php echo $anken['keishu_cd'] ?></ANKEN_KEISHU_CD>
			<ANKEN_KEISHU_NAME><?php echo $anken['keishu_name'] ?></ANKEN_KEISHU_NAME>
			<ANKEN_PUBLIC_FLAG><?php echo $anken['public_flag'] ?></ANKEN_PUBLIC_FLAG>
			<ANKEN_COMPANY_AREA><?php echo $anken['company_area'] ?></ANKEN_COMPANY_AREA>
			<ANKEN_OPEN_DATE><?php echo $anken['anken_open_date'] ?></ANKEN_OPEN_DATE>
			<ANKEN_CLOSE_DATE><?php echo $anken['anken_close_date'] ?></ANKEN_CLOSE_DATE>
			<ANKEN_TENDER_DATE><?php echo $anken['tender_date'] ?></ANKEN_TENDER_DATE>
			<ANKEN_TENDER_PLACE><?php echo $anken['tender_place'] ?></ANKEN_TENDER_PLACE>
			<ANKEN_LIMIT_DATE><?php echo $anken['limit_date'] ?></ANKEN_LIMIT_DATE>
			<ANKEN_GYOUMU_KBN_1><?php echo $anken['gyoumu_kbn_1'] ?></ANKEN_GYOUMU_KBN_1>
			<ANKEN_GYOUMU_KBN_2><?php echo $anken['gyoumu_kbn_2'] ?></ANKEN_GYOUMU_KBN_2>
			<ANKEN_KASITU_NAME><?php echo $anken['kasitu_name'] ?></ANKEN_KASITU_NAME>
			<ANKEN_TANTO_NAME><?php echo $anken['tanto_name'] ?></ANKEN_TANTO_NAME>
			<ANKEN_NOTES><?php echo $anken['notes'] ?></ANKEN_NOTES>
			<ANKEN_RESULT_OPEN_DATE><?php echo $anken['result_open_date'] ?></ANKEN_RESULT_OPEN_DATE>
			<ANKEN_RESULT_CLOSE_DATE><?php echo $anken['result_close_date'] ?></ANKEN_RESULT_CLOSE_DATE>
			<ANKEN_RAKU_NAME><?php echo $anken['raku_name'] ?></ANKEN_RAKU_NAME>
			<ANKEN_PRICE><?php echo $anken['price'] ?></ANKEN_PRICE>
			<ANKEN_VERSION_NO><?php echo $anken['version_no'] ?></ANKEN_VERSION_NO>
			<ANKEN_DELETE_FLAG><?php echo $anken['delete_flag'] ?></ANKEN_DELETE_FLAG>
			<ANKEN_INS_DATE><?php echo $anken['ins_date'] ?></ANKEN_INS_DATE>
			<ANKEN_UPD_DATE><?php echo $anken['upd_date'] ?></ANKEN_UPD_DATE>
		</Item>
		<?php endforeach; ?>
	</Items>
</Response>