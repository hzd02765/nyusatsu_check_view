<?php
$anken_kbn2_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "
	select 
		gyoumu_kbn_2
	from 
		t_nyusatsu
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

header("Content-type: application/xml");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<Response>
	<Items>
		<?php foreach($anken_kbn2_list as $anken_kbn2): ?>
		<Item>
			<KBN_CD><?php echo $anken_kbn2 ?></KBN_CD>
			<KBN_NAME><?php echo $anken_kbn2 ?></KBN_NAME>
		</Item>
		<?php endforeach; ?>
	</Items>
</Response>