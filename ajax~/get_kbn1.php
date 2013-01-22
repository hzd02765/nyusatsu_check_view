<?php
$anken_kbn1_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "
	select 
		gyoumu_kbn_1
	from 
		t_nyusatsu
	where
		keishu_cd = {$_POST['keishu_cd']}
		and public_flag = {$_POST['public_flag']}
	group by
		gyoumu_kbn_1
	order by
		gyoumu_kbn_1
";
$result = pg_query($sql);
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push($anken_kbn1_list, $row['gyoumu_kbn_1']);
}
pg_close($link);

header("Content-type: application/xml");
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n" ?>
<Response>
	<Items>
		<?php foreach($anken_kbn1_list as $anken_kbn1): ?>
		<Item>
			<KBN_CD><?php echo $anken_kbn1 ?></KBN_CD>
			<KBN_NAME><?php echo $anken_kbn1 ?></KBN_NAME>
		</Item>
		<?php endforeach; ?>
	</Items>
</Response>