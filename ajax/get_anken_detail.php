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
	
	array_push(
		$anken_list
		, array(
			$row['id']
			, $row['anken_no']
			, $row['nyusatsu_system']
			, $row['nyusatsu_type']
			, $row['keishu_cd']
			, $row['public_flag']
			, $row['gyoumu_kbn_1']
			, $row['gyoumu_kbn_2']
			, $row['anken_name']
			, $row['kasitu_name']
			, $row['tender_date']
			, $row['anken_url']
			, $row['version_no']
			, $row['delete_flag']
			, $row['ins_date']
			, $row['upd_date']
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
			<ANKEN_ID><?php echo $anken[0] ?></ANKEN_ID>
			<ANKEN_NO><?php echo $anken[1] ?></ANKEN_NO>
			<ANKEN_NYUSATSU_SYSTEM><?php echo $anken[2] ?></ANKEN_NYUSATSU_SYSTEM>
			<ANKEN_NYUSATSU_TYPE><?php echo $anken[3] ?></ANKEN_NYUSATSU_TYPE>
			<ANKEN_KEISHU_CD><?php echo $anken[4] ?></ANKEN_KEISHU_CD>
			<ANKEN_PUBLIC_FLAG><?php echo $anken[5] ?></ANKEN_PUBLIC_FLAG>
			<ANKEN_GYOUMU_KBN_1><?php echo $anken[6] ?></ANKEN_GYOUMU_KBN_1>
			<ANKEN_GYOUMU_KBN_2><?php echo $anken[7] ?></ANKEN_GYOUMU_KBN_2>
			<ANKEN_ANKEN_NAME><?php echo $anken[8] ?></ANKEN_ANKEN_NAME>
			<ANKEN_KASITU_NAME><?php echo $anken[9] ?></ANKEN_KASITU_NAME>
			<ANKEN_TENDER_DATE><?php echo $anken[10] ?></ANKEN_TENDER_DATE>
			<ANKEN_ANKEN_URL><?php echo $anken[11] ?></ANKEN_ANKEN_URL>
			<ANKEN_VERSION_NO><?php echo $anken[12] ?></ANKEN_VERSION_NO>
			<ANKEN_DELETE_FLAG><?php echo $anken[13] ?></ANKEN_DELETE_FLAG>
			<ANKEN_INS_DATE><?php echo $anken[14] ?></ANKEN_INS_DATE>
			<ANKEN_UPD_DATE><?php echo $anken[15] ?></ANKEN_UPD_DATE>
		</Item>
		<?php endforeach; ?>
	</Items>
</Response>