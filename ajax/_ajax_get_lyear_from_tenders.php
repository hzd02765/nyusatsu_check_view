<?php
require_once '../config.php';

$gyoumu_kbn_1 = $_POST['kbn1'];
$gyoumu_kbn_2 = $_POST['kbn2'];

$sql = "
	select 
		to_char(t_tenders.limit_date, 'yyyy'::text) AS l_year
	from 
		t_tenders 
	where 
		gyoumu_kbn_1 = '%s' and gyoumu_kbn_2 = '%s' 
	group by 
		l_year
	order by 
		l_year
";
$sql = sprintf($sql, $gyoumu_kbn_1, $gyoumu_kbn_2);

// var_dump($sql);
// exit();

$link = pg_connect('host='.HOST.' dbname='.DBNAME.' user='.USER.' password='.PASSWORD);
$result = pg_query($sql);
$l_year_list = array();
for($i = 0; $i < pg_num_rows($result); $i++){
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	array_push($l_year_list, $row['l_year']);
}
pg_close($link);

header("Content-type: text/javascript; charset=utf-8");
echo json_encode($l_year_list);