<?php
$anken_list = array();

$link = pg_connect('host=localhost dbname=nyusatsu_check user=nyusatsu_check password=nyusatsu_check');
$sql = "		
	select 
		*
	from 
		t_nyusatsu
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
	
	array_push($anken_list, array($row['id'], $row['anken_no']));
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
		</Item>
		<?php endforeach; ?>
	</Items>
</Response>